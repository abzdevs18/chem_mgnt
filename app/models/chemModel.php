<?php

/**
 * 
 */
class chemModel
{
	private $db;
	
	public function __construct()
	{
		$this->db = Database::getInstance();
	}

	public function addChemical($data){
		/*We begin using transaction  because out note is dependent to the chemical. We do not want our note to be submitted to the DB if we fail to store the Chemical itself*/
		try {
			$this->db->beginTransaction();
			$this->db->query("INSERT INTO `chemicals`(`brand_id`, `cat_id`, `label_id`, `chemical_name`, `chemical_formula`, `mol_wt`, `assay`, `quantity`, `expiry_date`) VALUES (:brand_id, :cat_id, :label_id, :chemical_name, :chemical_formula, :mol, :assay, :quantity, :expiry_date)");
			$this->db->bind(":brand_id", $data['chemBrand']);
			$this->db->bind(":cat_id", $data['category']);
			$this->db->bind(":label_id", $data['label']);
			$this->db->bind(":chemical_name", $data['chemName']);
			$this->db->bind(":chemical_formula", $data['chemFormula']);
			$this->db->bind(":mol", $data['chemWt']);
			$this->db->bind(":assay", $data['chemAssay']);
			$this->db->bind(":quantity", $data['chemQuantity']);
			$this->db->bind(":expiry_date", $data['chemExpiration']);

			$this->db->execute();

			$lastInsert = $this->db->lastInsert();		
			$genNum = date("Ymdhi");

			$this->db->query("UPDATE `chemicals` SET chemId = :chemId WHERE id = $lastInsert");
			$this->db->bind(":chemId", $genNum.$lastInsert);
            $this->db->execute();

			$this->db->query("INSERT INTO `chem_note`(`chem_id`, `note`) VALUES(:chem_id, :note)");
			$this->db->bind(':chem_id', $lastInsert);
			$this->db->bind(':note', $data['note']);

			$this->db->execute();

			$this->db->commit();
			return true;

		} catch (Exception $e) {
			$this->db->rollBack();
			return $e->getMessage();
		}
		// $this->db->query("INSERT INTO `chemicals`(`brand_id`, `cat_id`, `label_id`, `chemical_name`, `chemical_formula`, `mol.wt`, `assay`, `quantity`, `expiry_date`) VALUES ()")
		// $this->db->query("SELECT * FROM posts");

		// return $this->db->resultSet();
	}

	public function getBrand(){
		$this->db->query("SELECT * FROM brand");
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		}else {
			return false;
		}
	}

	public function getLabel(){
		$this->db->query("SELECT * FROM chem_label");
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		}else {
			return false;
		}
	}

	public function getChemicals(){
		$this->db->query("SELECT chemicals.*,brand.name AS brand FROM chemicals LEFT JOIN brand ON chemicals.brand_id = brand.id");
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		}else {
			return false;
		}
	}

	public function getCategory(){
		$this->db->query("SELECT * FROM category");
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		}else {
			return false;
		}
	}

	public function addChemMeta($data){
		$name = $data['name'];
		$value = $data['value'];
		$this->db->query("INSERT INTO `$name`(`name`) VALUES (:value)");
		$this->db->bind(":value",$data['value']);
		$res = $this->db->execute();
		
		return $res;
	}

	public function removeChemMeta($data){
		$name = $data['name'];
		$value = $data['value'];
		$this->db->query("DELETE FROM `$name` WHERE `id` = :value");
		$this->db->bind(":value",$data['value']);
		$res = $this->db->execute();
		
		return $res;
	}
}