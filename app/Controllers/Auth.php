<?php

namespace App\Controllers;

use CodeIgniter\Database\Query;
use App\Libraries\Hash;
use App\Libraries\Uuid;
use Uuid as GlobalUuid;

class Auth extends BaseController
{
	public function __construct()
	{
		//helper(['form']);
	}
	public function index()
	{
		helper('user');
		$is_loggedin = is_loggedin();
		if($is_loggedin){
			return redirect()->to('public/Admin/Dashboard')->with('logout', 'kdsadjsakfsdf');
		}
		return view('auth/login');
	}
	public function register()
	{
		return view('auth/register');
	}
	public function logout()
	{ 
		$session = session();
		$session->destroy();
		return redirect()->to('public/login')->with('logout', 'kdsadjsakfsdf');
		
		
	}
	public function save()
	{
		helper("Form");
		$validation = $this->validate([
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|valid_email|is_unique[users.email]',
			'password' => 'required|min_length[5]'
		]);
		if(!$validation){
			return view('auth/register', ['validation' => $this->validator]);
		}else{
			$first_name = $this->request->getPost('first_name');
			$last_name = $this->request->getPost('last_name');
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');
			$uuid = new Uuid();;
			$id = $uuid->v4();
			$id  = str_replace('-', '', $id);
			$values = [
				'id' => $id,
				'first_name' => $first_name,
				'last_name' => $last_name,
				'email' => $email,
				'password' => Hash::make($password),
			];
			$usersModel = new \App\Models\UsersModel();
			$query = $usersModel->insert($values);
			if(!$query){
				return redirect()->back()->with('fail', 'something went wrong');
				
			}else{
				return redirect()->to('register')->with('success', 'kdsadjsakfsdf');
			}
		}
	}
	public function verify_login(){
		$validation = $this->validate([
			'email' =>[
				'rules'=>'required|valid_email|is_not_unique[users.email]',
				'error'=>[
					'required' => 'Email is required',
					'valid_email' => 'Please enter a valid email',
					'is_not_unique' => 'Email does not exist'
						]	
					],
					'password' => [
						'rules' => 'required|min_length[5]',
						'error' => [
							'required' => 'Password is required',
							'min_length' => 'Password must have atleast 5 characters in length'
						]
					]
				]);
				if(!$validation){
					return view('auth/login', ['validation' => $this->validator]);
				}else{	
					$email = $this->request->getPost('email');
					$password = $this->request->getPost('password');
					$usersModel = new \App\Models\UsersModel();
					$user_info = $usersModel->where('email', $email)->first();
					$check_password = Hash::verify_login($password , $user_info['password']);
				
					if(!$check_password){
						session()->setFlashdata('fail', 'Incorrect Password');
						return redirect()->to('public/login')->withInput(); 
					}else{
						$user_id = $user_info['id'];
						session()->set('loggedUser', $user_info);
						return redirect()->to('public/Admin/dashboard'); 	
					}
				}

	}
}
