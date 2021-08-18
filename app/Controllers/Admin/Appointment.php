<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Appointment extends BaseController
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
		$patientModel = new \App\Models\PatientModel();
        $data['patientData'] = $patientModel->select(['patient_id', 'first_name', 'last_name'])->findAll();
		$userData = session('loggedUser');
		$data['userData'] = $userData;
        $data['selected'] = 'appointment';
		return view('admin/appointment', $data);
		
	}
    public function get_all(){
        $appointmentModel = new \App\Models\AppointmentModel();
		$appt_today = $appointmentModel->orderby('appt_date', 'desc')->findAll();
		$patientModel = new \App\Models\PatientModel();
        $patientData = $patientModel->select(['patient_id', 'last_name', 'first_name'])->findAll();
		$i = 0;
		foreach($appt_today as $appt){
           
            $appt_today[$i]['appt_start_con'] =  date("g:i a", strtotime($appt_today[$i]['appt_start']));
            $appt_today[$i]['appt_end_con'] =  date("g:i a", strtotime($appt_today[$i]['appt_end']));
            $key = array_search($appt['patient_id'],  array_column($patientData, 'patient_id'));
            $appt_today[$i]['fullname'] = $patientData[$key]['last_name'] . ', ' . $patientData[$key]['first_name'];
            if($appt['is_canceled'] == 'yes'){
                $appt_today[$i]['status'] = 'Cancelled';
            }else if($appt['is_completed']== 'yes'){
                $appt_today[$i]['status'] = 'Completed';
            }else{
                $appt_today[$i]['status'] = 'Not Completed';
            }
            $i++;
        }
		return $this->response->setJSON($appt_today);
    }
    public function cancel_appointment(){
        $appt_id = $this->request->getPost('appt_id');
        $data = [
            'is_completed' => 'no',
            'is_canceled' => 'yes',
            'updated_at' => date("Y-m-d h:i:s")
        ];
        $appointmentModel = new \App\Models\AppointmentModel();
        $appointmentModel->update($appt_id, $data);
        $resp = [
			'status' => 'Appointment cancelled successfully'
		];
		return $this->response->setJSON($resp);
    }
    public function delete_appointment(){
        $appt_id = $this->request->getPost('appt_id');  
         
        $appointmentModel = new \App\Models\AppointmentModel();
        $appointmentModel->where('appt_id', $appt_id)->delete();
        $data = [
			'status' => 'Appointment deleted successfully', 
          
		];
		return $this->response->setJSON($data);
    }
    public function complete_appointment(){
        $appt_id = $this->request->getPost('appt_id');
        $data = [
            'is_completed' => 'yes',
            'is_canceled' => 'no',
            'updated_at' => date("Y-m-d h:i:s")
        ];
        $appointmentModel = new \App\Models\AppointmentModel();
        $appointmentModel->update($appt_id, $data);
        $resp = [
			'status' => 'Appointment marked as completed successfully'
		];
		return $this->response->setJSON($resp);
    }
    public function edit_appointment(){
        $appt_id = $this->request->getPost('appt_id');
        $appt_date = $this->request->getPost('appt_date');
        $appt_start = $this->request->getPost('appt_start');
        $appt_end = $this->request->getPost('appt_end');
        $appt_status = $this->request->getPost('appt_status');
        $status = "";
        $data = [];
        if($appt_status == 'completed'){
            $data = [
                'appt_date' => $appt_date,
                'appt_start' => $appt_start,
                'appt_end' => $appt_end,
                'is_completed' => 'yes',
                'is_canceled' => 'no',
                'updated_at' => date("Y-m-d h:i:s")
              
            ];
        }
        if($appt_status == 'not completed'){
            $data = [
                'appt_date' => $appt_date,
                'appt_start' => $appt_start,
                'appt_end' => $appt_end,
                'is_completed' => 'no',
                'is_canceled' => 'no',
                'updated_at' => date("Y-m-d h:i:s")
            ];
        }
        if($appt_status == 'canceled'){
            $data = [
                'appt_date' => $appt_date,
                'appt_start' => $appt_start,
                'appt_end' => $appt_end,
                'is_completed' => 'no',
                'is_canceled' => 'yes',
                'updated_at' => date("Y-m-d h:i:s")
              
            ];
        }
        $appointmentModel = new \App\Models\AppointmentModel();
        $appointmentModel->update($appt_id, $data);
        $resp = [
			'status' => 'Appointment Edited successfully'
		];
        return $this->response->setJSON($resp);
    }
    public function filter(){
        $min = strtotime($this->request->getPost('min'));
        $min = date('Y-m-d',$min);
        $max = strtotime($this->request->getPost('max'));
        $max = date('Y-m-d',$max);
        $patientModel = new \App\Models\PatientModel();
        $patientData = $patientModel->select(['patient_id', 'first_name', 'last_name'])->findAll();
        $appointmentModel = new \App\Models\AppointmentModel();
        $array = ['appt_date >=' => $min,'appt_date <=' => $max,];
        //$where = 'transaction_date >= '. $from_date . ' AND transaction_date <= ' . $to_date;
        $appt_today =  $appointmentModel
        ->where($array)
        ->orderBy('appt_date', 'desc')
        ->findAll();
        $i = 0;
        foreach($appt_today as $appt){
           
            $appt_today[$i]['appt_start_con'] =  date("g:i a", strtotime($appt_today[$i]['appt_start']));
            $appt_today[$i]['appt_end_con'] =  date("g:i a", strtotime($appt_today[$i]['appt_end']));
            $key = array_search($appt['patient_id'],  array_column($patientData, 'patient_id'));
            $appt_today[$i]['fullname'] = $patientData[$key]['last_name'] . ', ' . $patientData[$key]['first_name'];
            if($appt['is_canceled'] == 'yes'){
                $appt_today[$i]['status'] = 'Cancelled';
            }else if($appt['is_completed']== 'yes'){
                $appt_today[$i]['status'] = 'Completed';
            }else{
                $appt_today[$i]['status'] = 'Not Completed';
            }
            $i++;
        }
        return $this->response->setJSON($appt_today);
    }
}
