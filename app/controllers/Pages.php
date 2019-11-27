<?php
/**
 * Pages
 */
class Pages extends Controller
{
	
	function __construct()
	{
		if (file_exists( dirname(__FILE__) . '/../configs/config.php')) {
			$this->userModel = $this->model('User');
			$this->adminModel = $this->model('Admins');
			if (!$this->adminModel->isAdminFound()) {
				redirect('admin/sf_admin');
			}
		}else {
			setupRedirect('admin');
			die();
		}
	}

	public function index(){
		// $this->view('pages/index');
		$this->login();
	}

	public function login(){
		$this->view('pages/login');
	}

	public function about(){
		$data = [
			'title' => 'Fuckkkkk'
		];

		$this->view('pages/about', $data);
	}

}