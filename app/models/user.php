<?php

/**
 * 
 */
class user
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

	public function modLog($data){
		$this->db->query("INSERT INTO `ch_log`(`user_id`, `is_admin`, `date_login`, `log_type`) VALUES (:user_id, :is_admin, :date_login, :log_type)");
		$this->db->bind(':user_id', $data['uId']);
		$this->db->bind(':is_admin', $data['is_admin']);
		$this->db->bind(':date_login', $data['date_login']);
		$this->db->bind(':log_type', $data['log_type']);

		if ($this->db->execute()) {
			return true;
		} else {
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