<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Patient extends BaseController
{ 

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
		$userData = session('loggedUser');
		
		$patientModel = new \App\Models\PatientModel();
		$data['patientData'] = $patientModel->orderBy('first_name', 'desc')->findAll();
		$data['userData'] = $userData;
        $data['selected'] = 'patient';
		return view('admin/patient', $data);
	}
	public function add_patient(){
		$userData = session('loggedUser');
		$data['userData'] = $userData;
        $data['selected'] = 'add_patient';
		return view('admin/add_patient', $data);
	}

	public function save(){
		$uuid = service('uuid');
		$uuid4 = $uuid->uuid4();
		$struuid = $uuid4->toString();
		$patientModel = new \App\Models\PatientModel();
		$patient = [
			'patient_id'=> $struuid,
			'first_name'=> $this->request->getPost('first_name'),
			'middle_initial'=> $this->request->getPost('middle_initial'),
			'last_name'=> $this->request->getPost('last_name'),
			'birthdate'=> $this->request->getPost('birthdate'),
			'sex'=> $this->request->getPost('sex'),
			'email'=> $this->request->getPost('email'),
			'contact'=> $this->request->getPost('contact'),
			'address'=> $this->request->getPost('address'),
			'created_at' => date("Y-m-d")
		];
		$patientModel->save($patient);
		$data = [
			'status' => 'Patient saved successfully'
		];
		return $this->response->setJSON($data);
	}
	public function update(){
		$patientModel = new \App\Models\PatientModel();
		$patient_id = $this->request->getPost('patient_id');
		$data = [
			'patient_id'=> $patient_id,
			'first_name'=> $this->request->getPost('first_name'),
			'middle_initial'=> $this->request->getPost('middle_initial'),
			'last_name'=> $this->request->getPost('last_name'),
			'birthdate'=> $this->request->getPost('birthdate'),
			'contact'=> $this->request->getPost('contact'),
			'address'=> $this->request->getPost('address'),
			'updated_at' =>  date("Y-m-d h:i:s")
		];
		$patientModel->update($patient_id, $data);
		$resp = [
			'status' => 'Patient updated successfully'
		];
		return $this->response->setJSON($resp);
	}
	public function delete(){
		$patientModel = new \App\Models\PatientModel();
        $patient_id = $this->request->getPost('patientId');
       $query =  $patientModel->where('patient_id', $patient_id)->delete();
        $data = [
			'status' => 'Patient Info deleted successfully',
			'query' => $query
		];
        return $this->response->setJSON($data);
    }
	public function patient_info($patient_id){
		$transactionModel = new \App\Models\TransactionModel();
		$data['transData'] =  $transactionModel->where('patient_id', $patient_id)->orderBy('transaction_date', 'desc')->findAll(5, 0);
		$patientModel = new \App\Models\PatientModel();
		$data['patientData'] = $patientModel->where('patient_id', $patient_id)->find();

		$userData = session('loggedUser');
		$data['userData'] = $userData;
        $data['selected'] = 'patient_info';
		return view('admin/patient_info', $data);
	}
	
	public function upload_profile_pic(){
		$uuid = service('uuid');
		$uuid4 = $uuid->uuid4();
		$struuid = $uuid4->toString();
		$file = $this->request->getFile('file');
		$patient_id = $this->request->getPost('patient_id');
		if($file->isValid() && !$file->hasMoved()){
			$PatientModel = new \App\Models\PatientModel();
			$file->move('./uploads/profile_pic' , $struuid );
				$photoData = [
					'photo_url' => $struuid,
				];
				$PatientModel->update($patient_id, $photoData);
				$data = [
					'success' => 'Profile Pic updated successfully'
				];
				return $this->response->setJSON($data);
			
			
		}
	}
}
