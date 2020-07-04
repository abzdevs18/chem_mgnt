<?php

/**
 * 
 */
class apiModel{

	private $db;
	
	public function __construct(){
		$this->db = Database::getInstance();
	}

	public function getApiUser(){
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
		$this->db->query("SELECT user_email.user_id AS fId, user_email.email_add AS usrEmail, client_users.id AS usr_id, client_users.password AS usrPass, client_users.account_type AS account_type FROM user_email LEFT JOIN client_users ON client_users.norsu_id = user_email.user_id WHERE user_email.email_add = :email");
		$this->db->bind(':email', $email);
		$row = $this->db->single();
		// $hashed_pass = $row->usrPass;
		if (password_verify($password,$row->usrPass)) {
			return $row;
		}else{
			return $row;
		}
	}

	public function registerClient($data){
		try {
			$this->db->beginTransaction();
			$this->db->query("INSERT INTO `client_users`(`norsu_id`, `firstname`, `lastname`, `password`, `date`,`time`, `department`, `account_type`) VALUES (:norsu_id, :fname, :lname, :upass, :dateReg, :timeReg, :department, :acc_type)");
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
	
	public function chemicalRequest($data){
		$this->db->query("INSERT INTO `request`(`student_id`, `chem_id`, `subject`, `date`, `time`,`quantity`, `purpose`, `account_type`) VALUES (:stud_id,:chem_id,:subject,:dateReq,:timeReq,:quantity,:purpose,:account_type)");
		$this->db->bind(':stud_id', $data['stud_id']);
		$this->db->bind(':chem_id', $data['chem_id']);
		$this->db->bind(':dateReq', $data['dateReq']);
		$this->db->bind(':timeReq', $data['timeReq']);
		$this->db->bind(':quantity', $data['quantity']);
		$this->db->bind(':purpose', $data['purpose']);
		$this->db->bind(':account_type', $data['account_type']);
		$this->db->bind(':subject', $data['subject']);

		if($this->db->execute()){
			return true;
		}else{
			return false;
		}
	}

	public function sendMessage($data){
		$this->db->query("INSERT INTO `messages`(`user_receiver_id`, `user_sender_id`, `msg_content`,`msg_date`, `msg_time`) VALUES (:receiver,:sender,:message, :sendDate, :sendTime)");
		$this->db->bind(":receiver", $data['receiver']);
		$this->db->bind(":sender", $data['sender']);
		$this->db->bind(":message", $data['message']);
		$this->db->bind(":sendDate", $data['sendDate']);
		$this->db->bind(":sendTime", $data['sendTime']);

		if ($this->db->execute()) {
			return true;
		}else{
			return false;
		}
	}

	
	public function getMessagesForCurrentUser($userSessionId){
		$this->db->query("SELECT DISTINCT user.username AS name, user.firstname AS fname, user.lastname AS lname, user_profile.img_path AS img_path, user.id AS id, 
(SELECT messages.msg_date FROM messages WHERE (messages.user_sender_id = user.id AND messages.user_receiver_id = :currentSessionUserId) OR (messages.user_sender_id = :currentSessionUserId AND messages.user_receiver_id = user.id) ORDER BY messages.timestamp DESC LIMIT 1) AS dateM,
(SELECT messages.msg_content FROM messages WHERE (messages.user_sender_id = user.id AND messages.user_receiver_id = :currentSessionUserId) OR (messages.user_sender_id = :currentSessionUserId AND messages.user_receiver_id = user.id) ORDER BY messages.timestamp DESC LIMIT 1) AS latestM
FROM user LEFT JOIN user_profile ON user.id = user_profile.user_id AND user_profile.profile_status = 1 LEFT JOIN messages on (messages.user_receiver_id = :currentSessionUserId AND messages.user_sender_id = user.id) OR (messages.user_receiver_id = user.id AND messages.user_sender_id = :currentSessionUserId) WHERE EXISTS(SELECT * FROM messages WHERE (messages.user_receiver_id = :currentSessionUserId AND messages.user_sender_id = user.id) OR (messages.user_receiver_id = user.id AND messages.user_sender_id = :currentSessionUserId)) ORDER BY latestM DESC");
		$this->db->bind(":currentSessionUserId", $userSessionId);
		$row = $this->db->resultSet();
		if($row){
			return $row;
		}else{
			return false;
		}
	}
	

	public function getLatestMessages($receiverId, $senderId){
		$this->db->query("SELECT messages.user_receiver_id AS userId, user.firstname AS firstN, user.lastname AS lastN, messages.user_receiver_id AS receiverId, messages.user_sender_id AS senderId, messages.msg_content as msgContent, messages.msg_date AS msgDate, user_profile.img_path AS sendIconImage FROM messages LEFT JOIN user ON user.id = messages.user_sender_id LEFT JOIN user_profile ON user_profile.user_id = messages.user_sender_id AND user_profile.profile_status = 1 WHERE (messages.user_receiver_id = :userReceiverId AND messages.user_sender_id = :userSenderId) OR (messages.user_receiver_id = :userSenderId AND messages.user_sender_id = :userReceiverId) ORDER BY messages.timestamp DESC");
		$this->db->bind(":userReceiverId", $receiverId);
		$this->db->bind(":userSenderId", $senderId);
		$row = $this->db->resultSet();
	   if ($row) {
		   return $row;
	   } else {
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

	public function getDepartmentByName($name){
		$this->db->query("SELECT * FROM department WHERE `name` = :deptName");
		$this->db->bind(":deptName",$name);
		$row = $this->db->single();
		if ($row) {
			return $row;
		}else {
			return false;
		}
	}
}