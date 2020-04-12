<?php

/**
 * 
 */
class adminModel
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

	public function isAdminFound(){
		$this->db->query("SELECT * FROM user WHERE is_admin = 1");
		$row = $this->db->single();

		if ($this->db->rowCount() > 0) {
			return true;
		}

		return false;
		// echo $this->db;
	}

	public function getLogo(){
		$this->db->query("SELECT * FROM `ch_logo`");
		$row = $this->db->single();
		if ($row) {
			return $row;
		} else {
			return false;
		}
	}

	public function addUserAdmin($data){
		try {
			$this->db->beginTransaction();
			$this->db->query("INSERT INTO `user`(`username`, `firstname`, `gender`, `user_pass`, `is_admin`) VALUES (:uname, :name, :gender, :upass, :type)");
			$this->db->bind(":gender", $data['gender']);
			$this->db->bind(":type", $data['type']);
			$this->db->bind(":uname", $data['uname']);
			$this->db->bind(":name", $data['name']);
			$this->db->bind(":upass", "Temporary");

			$this->db->execute();

			$lastInsert = $this->db->lastInsert();		

			$this->db->query("INSERT INTO `user_email`(`user_id`, `email_add`, `email_status`) VALUES(:userId, :email, :emailStatus)");
			$this->db->bind(':userId', $lastInsert);
			$this->db->bind(":email", $data['email']);
			$this->db->bind(':emailStatus', 1);

			$this->db->execute();	

			$this->db->query("INSERT INTO `user_contact`(`user_id`, `contact`, `status`) VALUES(:userId, :phone, :phoneStatus)");
			$this->db->bind(':userId', $lastInsert);
			$this->db->bind(":phone", $data['phone']);
			$this->db->bind(':phoneStatus', 1);

			$this->db->execute();

			if($data['photo']){	

				$this->db->query("INSERT INTO `user_profile`(`user_id`, `img_path`, `profile_status`) VALUES(:userId, :path, :photoStatus)");
				$this->db->bind(':userId', $lastInsert);
				$this->db->bind(":path", $data['photo']);
				$this->db->bind(':photoStatus', 1);
	
				$this->db->execute();
			}

			$this->db->commit();
			return true;

		} catch (Exception $e) {
			$this->db->rollBack();
			return $e->getMessage();
			// return false;
		}
	}

	public function addUserStudent($data){
		try {
			$this->db->beginTransaction();
			$this->db->query("INSERT INTO `student`(`dept_id`, `student_id`, `student_name`, `sex`, `birth_date`) VALUES (:dept, :studentId, :name, :gender, :birth)");
			$this->db->bind(":gender", $data['gender']);
			$this->db->bind(":dept", $data['department']);
			$this->db->bind(":studentId", $data['studId']);
			$this->db->bind(":name", $data['name']);
			$this->db->bind(":birth", $data['birth']);

			$this->db->execute();

			$this->db->commit();
			return true;

		} catch (Exception $e) {
			$this->db->rollBack();
			return $e->getMessage();
			// return false;
		}
	}
}