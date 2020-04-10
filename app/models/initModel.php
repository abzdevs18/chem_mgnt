<?php

/**
 * 
 */
class initModel
{
	private $db;
	private $error;
	
	function __construct()
	{
		
		$this->db = Database::getInstance();
		$this->error = Database::conError();

	}

	public function connError(){
		return $this->error;
	}

	public function dbLoad(){
		$query = file_get_contents(dirname(__FILE__) . "/../lib/ch_site.sql");
		$this->db->query($query);
		if ($this->db->execute()) {
			return true;
		}else{
			return false;
		}
	}

	public function setSite($data){

		try {
			$this->db->beginTransaction();
			$this->db->query("INSERT INTO `ch_site` (`site_name`) VALUES (:site_name)");
			$this->db->bind(':site_name', $data['siteName']);
			$this->db->execute();

			$this->db->query("INSERT INTO `user` (`username`, `user_pass`, `user_type`, `is_admin`) VALUES (:username, :user_pass, 1, 1)");
			$this->db->bind(':username', $data['adminUserName']);
			$this->db->bind(':user_pass', $data['adminUserPass']);
			$this->db->execute();

			$lastInsertId = $this->db->lastInsert();
			$this->db->query("INSERT INTO `user_email`(`user_id`, `email_add`, `email_status`) VALUES ($lastInsertId, :email_add, 1)");
			$this->db->bind(':email_add', $data['adminEmail']);
			$this->db->execute();

			/**
			*	Warning: The way we upload the file. we didn't check the file type this 
			*	therefore we let file upload vulnerability exist in this project.
			*
			*	Notice: status is not check during Site Logo Upload
			*/

			$this->db->query("INSERT INTO `ch_logo`(`site_fk`, `path`, `status`) VALUES ($lastInsertId, :logoPath, 1)");
			$this->db->bind(':logoPath', $data['siteLogo']);
			$this->db->execute();

			$this->db->commit();

			return true;

		} catch (Exception $e) {
			$this->db->rollBack();
			return false;
		}
		// return json_encode($response);
		// print_r($this->db->query("SELECT * FROM sf_site"));
	}
}