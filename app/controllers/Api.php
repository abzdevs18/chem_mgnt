<?php

/**
 * 
 */
class Api extends Controller
{
	private $salt = SECURE_SALT;
	private $date = DEF_DATE;
	private $time = DEF_TIME;
	
	function __construct() {
		$this->userApi = $this->model('apiModel');
		$this->userModel = $this->model('userModel');
	}

	public function api_login(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			
			$data = [
				'status'=> '',
				'adminUserName'=>trim($_POST['clientUserName']),
				'adminUserPass'=>$this->salt . trim($_POST['clientUserPass']),
				'adminUserName_err'=>'',
				'adminUserPass_err'=>''
			];


			// adminUserPass validation
			if (empty(trim($_POST['clientUserPass']))) {
				$data['adminUserPass_err'] = 'Please enter your password';
			}else{
				$data['adminUserPass'] = $this->salt . trim($_POST['clientUserPass']);
			}

			// siteName validation
			if (empty($data['adminUserName'])) {
				$data['adminUserName_err'] = 'Please enter Admin userName';
			}else{
				//First check if email is use to sign in
				if (filter_var($data['adminUserName'], FILTER_VALIDATE_EMAIL)) {
					if ($this->userModel->findUserEmail($data['adminUserName']) == false) {
						// $data['status'] = 0;
						$data['adminUserName_err'] = "Email/username doesn't exist!";
					}
				}
			}

			if (empty($data['adminUserName_err']) && empty($data['adminUserPass_err'])) {

				$loggedIn = $this->userApi->loginClient($data['adminUserName'], $data['adminUserPass']);
				if ($loggedIn) {
					$data['status'] = 1;
					$arr = [
						"data" => $data,
						"row" => $loggedIn
					];
					echo json_encode($arr);
				}else{
					$data['status'] = 2;

					$arr = [
						"data" => $data,
						"row" => ""
					];
					
					echo json_encode($arr);
				}
			} else {
				$data['status'] = 0;
				$arr = [
					"data" => $data,
					"row" => ""
				];
				echo json_encode($arr);
			}
		}	
	}

	public function api_register(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {	
			$salted_pass = $this->salt . trim($_POST['Pass']);
			$hashed = password_hash($salted_pass, PASSWORD_DEFAULT);

			$dept = $this->userApi->getDepartmentByName(trim($_POST['Department']));
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				"status"=>0,
				"norsuId"=>trim($_POST['norsuId']),
				"FirstName"=>trim($_POST['FirstName']),
				"LastName"=>trim($_POST['LastName']),
				"clientEmail"=>trim($_POST['clientEmail']),
				"client_pass"=>$hashed,
				"date"=> $this->date,
				"time"=> $this->time,
				"Department"=>$dept->id,
				"Account_type"=>trim($_POST['account_type']),
				"registrationMessage"=>"",
				"dev_err_info"=>""
			];
			// Check student existance as valid user
			// if($this->userApi->checkId($data['studentId'])){
				if(!$this->userModel->findUserEmail($data['clientEmail'])){
					$res = $this->userApi->registerClient($data);
					if ($res) {
						// Registration should check the id and the status of the student. if status 0 means that student not add by the admin and not yet allowed to request chemcals
						$data['status']=1;
						$data['registrationMessage']="Registration successful!";
						echo json_encode($data);
					}else{
						$data['dev_err_info'] = $res;
						$data['registrationMessage'] = "Something went wrong during registration. Admin is notified.";
						echo json_encode($data);
					}
				}else{
					$data['registrationMessage'] = "Email already in used, Kindly login using the email or reset your password.";
					echo json_encode($data);
				}
			}else{
				$data['registrationMessage'] = "Student ID number doesn't exist in the database of the system, kindly register to the main office of chemistry department.";
				echo json_encode($data);
			}
		// }
	}

	public function api_request(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
				"status"=>"",
				"quantity"=>trim($_POST['quantity']),
				"chem_id"=>trim($_POST['chem_id']),
				"stud_id"=>trim($_POST['stud_id']),
				"dateReq"=> $this->date,
				"timeReq"=> $this->time,
				"purpose"=>trim($_POST['purpose']),
				"account_type"=>trim($_POST['account_type']),
				// subject can be dynamic base on what will the admin will support
				"subject"=>trim($_POST['subject'])
			];

			if($this->userApi->chemicalRequest($data)){
				$data['status']=1;
				echo json_encode($data);
			}else{
				$data['status']=0;
				echo json_encode($data);
			}
		}
	}

	public function api_messaging(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
				"status" => "",
				"sender" => trim($_POST['sender']),
				"receiver" => trim($_POST['receiver']),
				"message" => trim($_POST['message']),
				"sendDate" => $this->date,
				"sendTime" => $this->time
			];
			if($this->userApi->sendMessage($data)){
				$data["status"] = 1;
				echo json_encode($data);
			}else{
				$data["status"] = 0;
				echo json_encode($data);
			}
		}
	}

	public function api_get_message(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$message = $this->userApi->getMessagesForCurrentUser(trim($_POST['session_user']));
			echo json_encode($message);
		}
	}

	public function api_get_chemicals(){
		if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$chemicals = $this->userApi->getChemicals();
			echo json_encode($chemicals);
		}
	}

	public function api_get_latest_message(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$message = $this->userApi->getLatestMessages(trim($_POST['msg_receiver']),trim($_POST['msg_sender']));
			echo json_encode($message);
		}
	}

	public function api_get_department(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			$dept = $this->userApi->getDepartment();
			echo json_encode($dept);
		}
	}

	public function api_account(){
	}
}