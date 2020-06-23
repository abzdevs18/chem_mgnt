<?php

/**
 * 
 */
class userModel
{
	private $db;

	function __construct()
	{
		$this->db = Database::getInstance();
	}

	public function login($email, $password) {
		$this->db->query("SELECT user_email.user_id AS fId, user_email.email_add AS usrEmail, user.id AS usr_id, user.user_pass AS usrPass, user.is_admin AS is_admin, user.username AS usrName, user.user_type AS uType FROM user_email LEFT JOIN user ON user.id = user_email.user_id WHERE user.username = :email OR user_email.email_add = :email");

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

	public function syslog($data){	
		try {
			$this->db->beginTransaction();
			$user = $data['user'];
			$pos = $data['pos'];
			$action = $data['action'];
			$status = $data['status'];
			$date = date("M. d, Y");
			$time = date("h:i a");
			
			// $this->db->query("SELECT  FROM user WHERE id = $user");
			// $row = $this->db->resultSet();

			$this->db->query("INSERT INTO `system_log`(`name`, `position`, `event`, `date`, `time`, `status`) VALUES (:name,:pos,:event,:date,:time,:status)");
			$this->db->bind(":name", $user);
			$this->db->bind(":pos", $pos);
			// $this->db->bind(":type", $row[0]->user_type);
			$this->db->bind(":event", $action);
			$this->db->bind(":date", $date);
			$this->db->bind(":time", $time);
			$this->db->bind(":status", $status);
			$res = $this->db->execute();

			$this->db->commit();
			return true;

		} catch (Exception $e) {
			$this->db->rollBack();
			// return $e->getMessage();
			return false;
		}
	}

	public function findUserEmail($email){
		$this->db->query("SELECT * FROM user_email WHERE email_add = :email_add");
		$this->db->bind(':email_add', $email);

		$row = $this->db->single();

		if ($this->db->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
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
}