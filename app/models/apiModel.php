<?php

/**
 * 
 */
class apiModel
{
	private $db;
	
	public function __construct(){
		$this->db = Database::getInstance();
	}

	public function getApiUser()
	{
		$this->db->query("SELECT * FROM user");
		return $this->db->resultSet();
	}

	public function findUserName($userName){
		$this->db->query("SELECT * FROM user WHERE username = :userName");
		$this->db->bind(':userName', $userName);

		$row = $this->db->single();

		if ($this->db->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function checkId($studentId){
		$this->db->query("SELECT student_id FROM student WHERE student_id = :studentId AND status=1");
		$this->db->bind(':studentId', $studentId);

		$row = $this->db->single();

		if ($this->db->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function loginClient($email, $password) {
			$this->db->query("SELECT user_email.user_id AS fId, user_email.email_add AS usrEmail, client_req_signup.id AS usr_id, client_req_signup.password AS usrPass, client_req_signup.account_type AS account_type FROM user_email LEFT JOIN client_req_signup ON client_req_signup.norsu_id = user_email.user_id WHERE user_email.email_add = :email");

			$this->db->bind(':email', $email);
			$row = $this->db->single();


		// if ($row->id == $user_id->user_id) {
			$hashed_pass = $row->usrPass;
			if (password_verify($password,$row->usrPass)) {
				return $row;
				// return true;

			}else{
				return false;
			}
		// }
	}

	public function registerClient($data){
		try {
			$this->db->beginTransaction();
			$this->db->query("INSERT INTO `client_req_signup`(`norsu_id`, `firstname`, `lastname`, `password`, `date`,`time`, `department`, `account_type`) VALUES (:norsu_id, :fname, :lname, :upass, :dateReg, :timeReg, :department, :acc_type)");
			$this->db->bind(":norsu_id", $data['norsuId']);
			$this->db->bind(":fname", $data['FirstName']);
			$this->db->bind(":lname", $data['LastName']);
			$this->db->bind(":upass", $data['client_pass']);
			$this->db->bind(":dateReg", $data['date']);
			$this->db->bind(":timeReg", $data['time']);
			$this->db->bind(":department", $data['Department']);
			$this->db->bind(":acc_type", $data['Account_type']);

			$this->db->execute();

			//$lastInsert = $this->db->lastInsert();		

			$this->db->query("INSERT INTO `user_email`(`user_id`, `email_add`, `email_status`) VALUES(:userId, :email, :emailStatus)");
			$this->db->bind(':userId', $data['norsuId']);
			$this->db->bind(":email", $data['clientEmail']);
			$this->db->bind(':emailStatus', 1);

			$this->db->execute();	

			$this->db->commit();
			return true;

		} catch (Exception $e) {
			$this->db->rollBack();
			// return $e->getMessage();
			return false;
		}
	}
	
}