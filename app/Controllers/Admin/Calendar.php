<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Calendar extends BaseController
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
		$patientModel = new \App\Models\PatientModel();
        $data['patientData'] = $patientModel->select(['patient_id', 'first_name', 'last_name'])->findAll();
		$data['userData'] = $userData;
        $data['selected'] = 'calendar';
		return view('admin/calendar', $data);
	}
	public function save(){
		$uuid = service('uuid');
		$uuid4 = $uuid->uuid4();
		$struuid = $uuid4->toString();
		$appointmentModel = new \App\Models\AppointmentModel();
		$appointment = [
			'appt_id'=> $struuid,
			'patient_id'=> $this->request->getPost('patient_id'),
			'appt_date'=> $this->request->getPost('appt_date'),
			'appt_start'=> $this->request->getPost('appt_start'),
			'appt_end'=> $this->request->getPost('appt_end'),
			'is_completed'=> 'no',
			'is_canceled'=> 'no',
			'created_at' => date("Y-m-d h:i:s")
		];
		$appointmentModel->save($appointment);
		$data = [
			'status' => 'Appointment saved successfully'
		];
		return $this->response->setJSON($data);
	}
	public function get_today(){
		$appointmentModel = new \App\Models\AppointmentModel();
		$appt_today = $appointmentModel->where('appt_date' , date("Y-m-d"))->findAll();
		$patientModel = new \App\Models\PatientModel();
        $patientData = $patientModel->select(['patient_id', 'first_name', 'last_name'])->findAll();
		$i = 0;
		foreach($appt_today as $appt){
            
            $key = array_search($appt['patient_id'],  array_column($patientData, 'patient_id'));
            $appt_today[$i]['fullname'] = $patientData[$key]['first_name'] . ' ' . $patientData[$key]['last_name'] ;
            $i++;
        }
		return $this->response->setJSON($appt_today);
	}
	public function get_all(){
		$appointmentModel = new \App\Models\AppointmentModel();
		$appt_today = $appointmentModel->findAll();
		$patientModel = new \App\Models\PatientModel();
        $patientData = $patientModel->select(['patient_id', 'first_name', 'last_name'])->findAll();
		$i = 0;
		foreach($appt_today as $appt){
            
            $key = array_search($appt['patient_id'],  array_column($patientData, 'patient_id'));
            $appt_today[$i]['fullname'] = $patientData[$key]['first_name'] . ' ' . $patientData[$key]['last_name'] ;
            $i++;
        }
		return $this->response->setJSON($appt_today);
	}
	
}
