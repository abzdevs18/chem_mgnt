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

	public function getConfigSecurity(){
		$this->db->query("SELECT * FROM admin_config");
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

	public function getUsers(){
		$this->db->query("SELECT * FROM user WHERE user_type = 0");
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

	public function getDepartment(){
		$this->db->query("SELECT * FROM department");
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		}else {
			return false;
		}
	}

	public function getStudent(){
		$this->db->query("SELECT student.*, department.name AS department FROM student LEFT JOIN department ON department.id = student.dept_id");
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

	public function getSysLogs(){
		$this->db->query("SELECT * FROM system_log ORDER BY id DESC");
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		}else {
			return false;
		}
	}

	public function removeChemMeta($data){
		$name = $data['name'];
		$value = $data['value'];
		$this->db->query("DELETE FROM `$name` WHERE `id` = :value");
		$this->db->bind(":value",$data['value']);
		$res = $this->db->execute();
		
		return $res;
	}

	public function delUser($data){
		try {
			$this->db->beginTransaction();
			$user = $data['user'];
			$desc = $data['desc'];
			$reason = $data['reason'];
			$date = date("M. d, Y");
			$time = date("h:i a");
			
			$this->db->query("SELECT * FROM user WHERE id = $user");
			$row = $this->db->resultSet();

			$this->db->query("INSERT INTO `delete_user`(`firstname`, `lastname`, `date`) VALUES (:fname,:lname,:date)");
			$this->db->bind(":fname", $row[0]->firstname);
			$this->db->bind(":lname", $row[0]->lastname);
			$this->db->bind(":date", $date . ' at ' . $time);
			$res = $this->db->execute();

			$this->db->query("DELETE FROM `user` WHERE `id` = $user");
			$res = $this->db->execute();

			$this->db->commit();
			return true;

		} catch (Exception $e) {
			$this->db->rollBack();
			return false;
		}
	}
}