<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Patient_photos extends BaseController
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
		$data['patientData'] = $patientModel->orderBy('first_name', 'desc')->findAll();
        $userData = session('loggedUser');
		$data['userData'] = $userData;
        $data['selected'] = 'patient_photos';
		return view('admin/patient_photos', $data);
		
	}
	public function records($patient_id){
		$patientModel = new \App\Models\PatientModel();
		$data['patientData'] = $patientModel->where('patient_id', $patient_id)->find();
		$userData = session('loggedUser');
		$data['userData'] = $userData;
		$data['selected'] = 'patient_photos';
		return view('admin/records', $data);
	}
	public function save_record(){
		$uuid = service('uuid');
		$uuid4 = $uuid->uuid4();
		$struuid = $uuid4->toString();
		$file = $this->request->getFile('file');
		$patient_id = $this->request->getPost('patient_id');
		$notes = $this->request->getPost('note');
		$filename = $file->getName();
		if($file->isValid() && !$file->hasMoved()){
			$patientPhotosModel = new \App\Models\PatientPhotosModel();
			$array = ['photo_url =' => $filename,'patient_id =' => $patient_id,];
			$ifExist = $patientPhotosModel->selectCount('photo_url')->where($array)->findAll();
			if($ifExist[0]['photo_url'] > 0 ){
				$data = [
					'success' => '',
					'error' => 'File name already exist',
					'count' => $ifExist[0]['photo_url']
				];
				return $this->response->setJSON($data);
			}else{
				$file->move('./uploads/' . $patient_id  );
				$photoData = [
					'photo_id' => $struuid,
					'patient_id' => $patient_id,
					'photo_url' => $filename,
					'notes' => $notes,
					'created_at' => date("Y-m-d h:i:s")
				];
				$patientPhotosModel->save($photoData);
				$data = [
					'success' => 'Record saved successfully',
					'error' => '',
					'count' => $ifExist[0]['photo_url']
				];
				return $this->response->setJSON($data);
			}
			
		}
      

	}
	public function get_records(){
		$patient_id = $this->request->getPost('patient_id');
		$patientPhotosModel = new \App\Models\PatientPhotosModel();
		$patientData = $patientPhotosModel->where('patient_id' , $patient_id)->findAll();
		$data = [
			'patientData' => $patientData
		];
		return $this->response->setJSON($data);
	}
	public function delete(){
		$photo_id = $this->request->getPost('photo_id');
		$patientPhotosModel = new \App\Models\PatientPhotosModel();
		$patientPhotosModel->where('photo_id', $photo_id)->delete();
        $data = [
			'status' => 'Photo deleted successfully',
		];
        return $this->response->setJSON($data);
	}
}
