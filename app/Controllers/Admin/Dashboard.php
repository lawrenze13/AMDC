<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public $userData;
	public function __construct()
	{
		date_default_timezone_set('Asia/Manila');
	
	}
	public function index()
	{
		helper('user');
		$is_loggedin = is_loggedin();
		if(!$is_loggedin){
			return redirect()->to('public/login')->with('logout', 'kdsadjsakfsdf');
		}
		$patientModel = new \App\Models\PatientModel();
		$data['patientCount'] = $patientModel->countAllResults();
		$userData = session('loggedUser');
		$data['userData'] = $userData;
        $data['selected'] = 'dashboard';
		return view('admin/dashboard', $data);
		
	}
}
