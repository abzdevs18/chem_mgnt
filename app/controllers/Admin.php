<?php

/**
 * Admin Account Controller
 */
class Admin extends Controller
{
	private $salt = SECURE_SALT;
	function __construct()
	{

		if (file_exists( dirname(__FILE__) . '/../configs/config.php')) {
			$this->chemModel = $this->model('chemModel');
			$this->adminModel = $this->model('adminModel');
			// $this->userModel = $this->model('user');
			if (!isLoggedIn()) {
				if (!$this->adminModel->isAdminFound() || $this->adminModel->connError()) {
					$this->setup();
					die();
				}else{
					$this->login();
					die();
				}
			}
		}else {
			$this->setup();
			die();
		}	
	}

	public function index(){
		$logs = $this->chemModel->getSysLogs();
		$account = $this->chemModel->getAccountInfo($_SESSION['uId']);
		$config = $this->chemModel->getConfigSecurity();
		$currentUser = $this->chemModel->getCurrentUser($_SESSION['uId']);
		$avg = $this->chemModel->getAvgReq();
		$pending = $this->chemModel->getPendingReq();
		$chem = $this->chemModel->getChemCount();
		$userCount = $this->chemModel->getUserCount();
		$data = [
			"config"=> $config,
			"user"=> $currentUser,
			"account"=> $account,
			"logs" => $logs,
			"avg"=>$avg,
			"pending"=>$pending,
			"chem"=>$chem,
			"user_count"=>$userCount
		];
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "home";

		$this->view('admin/index',$data);
	}

	public function profile(){
		$account = $this->chemModel->getAccountInfo($_SESSION['uId']);
		$config = $this->chemModel->getConfigSecurity();
		$currentUser = $this->chemModel->getCurrentUser($_SESSION['uId']);
		$data = [
			"config"=> $config,
			"user"=> $currentUser,
			"account"=> $account
		];	
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "profile";

		$this->view('admin/update-prof',$data);
	}

	public function request(){
		$getChemRequest = $this->chemModel->getRequest();
		$account = $this->chemModel->getAccountInfo($_SESSION['uId']);
		$config = $this->chemModel->getConfigSecurity();
		$currentUser = $this->chemModel->getCurrentUser($_SESSION['uId']);
		$data = [
			"config"=> $config,
			"user"=> $currentUser,
			"account"=> $account,
			"request"=>$getChemRequest
		];
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "request";

		$this->view('admin/request',$data);
	}

	public function messages(){
		$dept = $this->chemModel->getDepartment();
		$senderList = $this->chemModel->getMessageSenderList();
		$account = $this->chemModel->getAccountInfo($_SESSION['uId']);
		$config = $this->chemModel->getConfigSecurity();
		$currentUser = $this->chemModel->getCurrentUser($_SESSION['uId']);
		$data = [
			"config"=> $config,
			"user"=> $currentUser,
			"account"=> $account,
			"dept" => $dept,
			"list" => $senderList
		];
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "messages";

		$this->view('admin/messages',$data);
	}

	public function search(){
		$account = $this->chemModel->getAccountInfo($_SESSION['uId']);
		$config = $this->chemModel->getConfigSecurity();
		$currentUser = $this->chemModel->getCurrentUser($_SESSION['uId']);
		$data = [
			"config"=> $config,
			"user"=> $currentUser,
			"account"=> $account
		];	

		$this->view('admin/search',$data);
	}

	public function chemical(){
		$chem = $this->chemModel->getChemicals();
		$account = $this->chemModel->getAccountInfo($_SESSION['uId']);
		$config = $this->chemModel->getConfigSecurity();
		$currentUser = $this->chemModel->getCurrentUser($_SESSION['uId']);
		$data = [
			"config"=> $config,
			"user"=> $currentUser,
			"account"=> $account,
			'chem' => $chem
		];
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "chemicals";

		$this->view('admin/chemical',$data);
	}

	public function student(){
		$student = $this->chemModel->getStudent();
		$dept = $this->chemModel->getDepartment();
		$account = $this->chemModel->getAccountInfo($_SESSION['uId']);
		$config = $this->chemModel->getConfigSecurity();
		$currentUser = $this->chemModel->getCurrentUser($_SESSION['uId']);
		$data = [
			"config"=> $config,
			"user"=> $currentUser,
			"account"=> $account,
			'student' => $student,
			"dept" => $dept
		];

		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "student";

		$this->view('admin/student', $data);
	}

	public function privacy(){
		$stored_user = $this->chemModel->getUsers();
		$category = $this->chemModel->getCategory();
		
		$account = $this->chemModel->getAccountInfo($_SESSION['uId']);
		$config = $this->chemModel->getConfigSecurity();
		$currentUser = $this->chemModel->getCurrentUser($_SESSION['uId']);
		$data = [
			"config"=> $config,
			"user"=> $currentUser,
			"account"=> $account,
			'stored_user' => $stored_user,
			'category' => $category
		];
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "privacy";

		$this->view('admin/privacy', $data);
	}

	public function logs(){
		$logs = $this->chemModel->getSysLogs();
		
		$account = $this->chemModel->getAccountInfo($_SESSION['uId']);
		$config = $this->chemModel->getConfigSecurity();
		$currentUser = $this->chemModel->getCurrentUser($_SESSION['uId']);
		$data = [
			"config"=> $config,
			"user"=> $currentUser,
			"account"=> $account,
			'logs' => $logs
		];
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "logs";

		$this->view('admin/logs', $data);
	}

	public function updateConfig(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$val = $_POST['config'];
			$data =[
				"status"=>""
			];
			echo json_encode($this->adminModel->updateConfig($val));
			// print_r($val[0]);
			// if($this->adminModel->updateConfig($val)){
			// 	$data['status']=1;
			// 	echo json_encode($data);
			// }else{
			// 	$data['status']=0;
			// 	echo json_encode($data);
			// }
		}
	}

	public function login(){
		if (isLoggedIn() && $_SESSION['is_admin'] == 1) {
			$this->view('admin/index');
		}else if(isLoggedIn() && $_SESSION['user_type'] == 1){
			redirect("dashboard/index");
		}else{
			$logo = $this->adminModel->getLogo();

			$data = [
				'logo' => $logo
			];
			$this->view('admin/login', $data);
		}
	}

	public function setup(){
		$this->view('admin/setup/ch_admin');
	}

	public function notification(){
		$this->view('admin/templates/notifwrapper');
	}

	public function getJsonLogs()
	{
		$logs = $this->chemModel->getSysLogs();
		echo json_encode($logs);
	}
	public function getSignupReqLogs(){
		$getSignupReq = $this->chemModel->getClientSignUpReq();
		echo json_encode($getSignupReq);
	}
	public function getChemRequest(){
		$getChemRequest = $this->chemModel->getRequest();
		echo json_encode($getChemRequest);
	}

	public function logout(){
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);

		$this->view('admin/index');
	}

	public function add_student(){
		$dept = $this->chemModel->getDepartment();

		$data = [
			"dept" => $dept
		];

		$this->view('admin/add_student', $data);
	}

	public function add_user_ad(){
		$this->view('admin/add_user_ad');
	}

	public function form(){
		$brand = $this->chemModel->getBrand();
		// $label = $this->chemModel->getLabel();
		$category = $this->chemModel->getCategory();

		$data = [
			"brand" => $brand,
			// "label" => $label,
			"category" => $category
		];

		$this->view('admin/form', $data);
	}

	public function ajaxAddCat()
	{
		$brand = $this->chemModel->getBrand();
		// $label = $this->chemModel->getLabel();
		$category = $this->chemModel->getCategory();

		$data = [
			"brand" => $brand,
			// "label" => $label,
			"category" => $category
		];
		echo json_encode($category);
	}
	
	public function chemCatReload(){
		$category = $this->chemModel->getCategory();

		$data = [
			"category" => $category
		];

		$this->view('admin/templates/chemCatMeta', $data);
	}


	public function chemMeta(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$action = trim($_POST['action']);

			$data = [
				'status'=> '',
				'name'=>trim($_POST['name']),
				'value'=>trim($_POST['value'])
			];
			if($action == 'remove'){
				$this->chemModel->removeChemMeta($data);

			}else if($action == 'add'){
				$this->chemModel->addChemMeta($data);
			}
		}
	}

	public function add(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$v = '<p>H<sub>2</sub><span id=\"_mce_caret\" data-mce-bogus=\"1\" data-mce-type=\"format-caret\">O</span><br></p>';
			$data = [
				/*check this first form*/
				"status" => "",
				"category" => trim($_POST['category']),
				"label" => trim($_POST['label']),
				"chemName" => trim($_POST['chemName']),
				"chemWt" => trim($_POST['chemWt']),
				"chemAssay" => trim($_POST['chemAssay']),
				"chemQuantity" => trim($_POST['chemQuantity']),
				"chemExpiration" => trim($_POST['chemExpiration']),
				"chemBrand" => trim($_POST['chemBrand']),
				"chemFormula" => trim($_POST['mytextarea']),
				"note" => trim($_POST['note'])
			];

			$res = $this->chemModel->addChemical($data);

			if ($res) {
				echo $_POST['mytextarea'];
			}else {
				echo $res;
			}
			// echo json_encode($data)

			// echo "D";
		}else {
			echo "not";
		}
	}

	public function userStudentAdd(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				/*check this first form*/
				"status" => "",
				"gender" => trim($_POST['gender']),
				"studId" => trim($_POST['studId']),
				"department" => trim($_POST['department']),
				"birth" => trim($_POST['birth']),
				"name" => trim($_POST['name'])
			];
			$res = $this->adminModel->addUserStudent($data);
			if($res){

			}
		}
	}

	public function delUser(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				/*check this first form*/
				"status" => "",
				"reason" => trim($_POST['reason']),
				"desc" => trim($_POST['desc']),
				"user" => trim($_POST['user'])
			];
			$res = $this->chemModel->delUser($data);
			if($res){
				$data['status'] = 1;
				echo json_encode($data);
			}else{
				$data['status'] = 0;
				echo json_encode($data);
			}
		}
	}

	public function userAdminAdd(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$randomPass = rand(100000,999999);
			$salted_pass = $this->salt . $randomPass;
			$hashed = password_hash($salted_pass, PASSWORD_DEFAULT);
			$data = [
				/*check this first form*/
				"status" => "",
				"gender" => trim($_POST['gender']),
				"type" => trim($_POST['type']),
				"uname" => trim($_POST['uname']),
				"email" => trim($_POST['email']),
				"name" => trim($_POST['name']),
				"phone" => trim($_POST['phone']),
				"photo" => $_FILES['photo']['name'],
				"hash" => $hashed,
				"secure_pass_temp" => $randomPass
			];

			if($_FILES['photo']['name']){
				$target = $_SERVER['DOCUMENT_ROOT'] . "/public/img/users/" . basename($_FILES['photo']['name']);
				
				if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target)) {

					$res = $this->adminModel->addUserAdmin($data);
					if($res){
						$data['status'] = 1;
					}else {
						$data['Problem Occur adding the user!'];
					}
				}else{
					$data['status'] = "Problem uploading photo";
				}
			}else{
				$res = $this->adminModel->addUserAdmin($data);
				if($res){
					$data['status'] = 1;
				}else {
					$data['Problem Occur adding the user!'];
				}
			}

			echo json_encode($data);
		}
	}

	public function userAdPassUp(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$salted_pass = $this->salt.trim($_POST['newPass']);
			$hashed = password_hash($salted_pass, PASSWORD_DEFAULT);
			$data = [
				/*check this first form*/
				"status" => "",
				"currPass" => $this->salt.trim($_POST['currPass']),
				"userId" => $_SESSION['uId'],
				"newPass" => $hashed
			];

			$res = $this->adminModel->updateUsrPwd($data);
			if($res){
				$data['status'] = 1;
			}else {
				$data['status']= 'Problem during password update!';
			}
			echo json_encode($data);
		}
	}

	public function adminUpdateBio(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				/*check this first form*/
				"status" => "",
				"gender" => trim($_POST['gender']),
				"userId" => $_SESSION['uId'],
				"uname" => trim($_POST['uname']),
				"email" => trim($_POST['email']),
				"lname" => trim($_POST['lname']),
				"name" => trim($_POST['name']),
				"phone" => trim($_POST['phone'])
			];

			$res = $this->adminModel->updateUserAdminBio($data);
			if($res){
				$data['status'] = 1;
			}else {
				$data['Problem Occur adding the user!'];
			}

			echo json_encode($data);
		}
	}

	public function userPhotoUpdate(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				/*check this first form*/
				"status" => "",
				"userId" => $_SESSION['uId'],
				"photo" => $_FILES['photo']['name']
			];

			if($_FILES['photo']['name']){
				$target = $_SERVER['DOCUMENT_ROOT'] . "/public/img/users/" . basename($_FILES['photo']['name']);
				
				if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target)) {

					$res = $this->adminModel->updateUserPhoto($data);
					if($res){
						$data['status'] = 1;
					}else {
						$data['Problem Occur adding the user!'];
					}
				}else{
					$data['status'] = "Problem uploading photo";
				}
			}

			echo json_encode($data);
		}
	}

	public function approve_req(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				/*check this first form*/
				"status" => "",
				"req_usr_id" => trim($_POST['req_id'])
			];
			$res = $this->chemModel->set_req_approve(trim($_POST['req_id']));
			if($res){
				$data['status'] = 1;
				$data['req_usr_id'] = $res[0]->student_id;
				echo json_encode($data);
			}else{
				$data['status'] = 0;
				echo json_encode($data);
			}
		}
	}

	public function newRequest(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				/*check this first form*/
				"status" => "",
				"req_usr_id" => trim($_POST['usr_id'])
			];
			// echo trim($_POST['usr_id']);
			$res = $this->chemModel->getUserInfo(trim($_POST['usr_id']));
			if($res){
				$data['status'] = 1;
				$data['req_usr_id'] = $res;
				echo json_encode($data);
			}else{
				$data['status'] = 0;
				echo json_encode($data);
			}
		}
	}
}