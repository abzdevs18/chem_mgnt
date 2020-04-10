<?php
/**
 * Pages
 */
class Pages extends Controller
{
	
	function __construct()
	{
		if (file_exists( dirname(__FILE__) . '/../configs/config.php')) {
			$this->userModel = $this->model('userModel');
			$this->adminModel = $this->model('adminModel');
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
		redirect('admin/index');
	}

	public function about(){
		$data = [
			'title' => 'Fuckkkkk'
		];

		$this->view('pages/about', $data);
	}

}