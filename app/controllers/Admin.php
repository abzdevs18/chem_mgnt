<?php

/**
 * Admin Account Controller
 */
class Admin extends Controller
{
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
		$data = [
			"one" => $this->breadcrump('/')
		];
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "home";

		$this->view('admin/index',$data);
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

	public function profile(){
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "profile";

		$this->view('admin/update-prof');
	}

	public function request(){
		$data = [
			"one" => $this->breadcrump()
		];
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "request";

		$this->view('admin/request',$data);
	}

	public function biddings(){
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "messages";

		$this->view('admin/messages');
	}

	public function chemical(){
		$chem = $this->chemModel->getChemicals();

		$data = [
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

		$data = [
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
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "privacy";

		$this->view('admin/privacy');
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


	public function userAdminAdd(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				/*check this first form*/
				"status" => "",
				"gender" => trim($_POST['gender']),
				"type" => trim($_POST['type']),
				"uname" => trim($_POST['uname']),
				"email" => trim($_POST['email']),
				"name" => trim($_POST['name']),
				"phone" => trim($_POST['phone']),
				"photo" => $_FILES['photo']['name']
			];

			if($_FILES['photo']['name']){
				$target = $_SERVER['DOCUMENT_ROOT'] . "/public/img/users/" . basename($_FILES['photo']['name']);
				
				if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target)) {

					$res = $this->adminModel->addUserAdmin($data);
					echo '$res';
				}
			}else{
				$res = $this->adminModel->addUserAdmin($data);
				echo "dd";
			}
		}
	}

	function breadcrump($delimiter = '/', $home = 'Home'){
		// This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
		$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

		// This will build our "base URL" ... Also accounts for HTTPS :)
		$base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

		// Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
		$breadcrumbs = Array("<a href=\"$base\">$home</a>");

		// Find out the index for the last value in our path array
		$last = end(array_keys($path));

		// Build the rest of the breadcrumbs
		foreach ($path AS $x => $crumb) {
			// Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
			$title = ucwords($crumb);
	
			// If we are not on the last index, then display an <a> tag
			if ($x != $last)
				$breadcrumbs[] = "<a href=\"$base$crumb\">$title</a>";
			// Otherwise, just display the title (minus)
			else
				$breadcrumbs[] = $title;
		}

		// Build our temporary array (pieces of bread) into one big string :)
		return implode($separator, $breadcrumbs);
	}
}