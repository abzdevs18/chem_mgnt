<?php

/**
 * 
 */
class Api extends Controller
{
	private $salt = SECURE_SALT;
	
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
				'adminUserPass'=>trim($_POST['clientUserPass']),
				'adminUserName_err'=>'',
				'adminUserPass_err'=>''
			];


			// adminUserPass validation
			if (empty($data['adminUserPass'])) {
				$data['adminUserPass_err'] = 'Please enter your password';
			}else{
				$data['adminUserPass'] = $this->$salt . trim($_POST['clientUserPass']);
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

	public function api_request(){
		echo json_encode($this->userApi->getApiUser());
	}

	public function api_register(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {	
			$date = date("M. d, Y");
			$time = date("h:i a");
			$salted_pass = $this->salt . trim($_POST['Pass']);
			$hashed = password_hash($salted_pass, PASSWORD_DEFAULT);

			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				"status"=>0,
				"norsuId"=>trim($_POST['norsuId']),
				"FirstName"=>trim($_POST['FirstName']),
				"LastName"=>trim($_POST['LastName']),
				"clientEmail"=>trim($_POST['clientEmail']),
				"client_pass"=>$hashed,
				"date"=> $date,
				"time"=>$time,
				"Department"=>trim($_POST['Department']),
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

	public function api_messaging(){
	}

	public function api_account(){
	}
}