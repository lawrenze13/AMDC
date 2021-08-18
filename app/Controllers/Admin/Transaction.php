<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Transaction extends BaseController
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
        $transactionModel = new \App\Models\TransactionModel();
        $data['transactionData'] = $transactionModel->orderBy('transaction_date', 'desc')->findAll();
        $patientModel = new \App\Models\PatientModel();
        $data['patientData'] = $patientModel->select(['patient_id', 'first_name', 'last_name'])->findAll();
        $i = 0;
        foreach($data['transactionData'] as $transaction){
            
            $key = array_search($transaction['patient_id'],  array_column($data['patientData'], 'patient_id'));
            $data['transactionData'][$i]['fullname'] = $data['patientData'][$key]['first_name'] . ' ' . $data['patientData'][$key]['last_name'] ;
            $i++;
        }
		$userData = session('loggedUser');
		$data['userData'] = $userData;
        $data['selected'] = 'transaction';
		return view('admin/transaction', $data);
	}
    public function save(){
		$uuid = service('uuid');
		$uuid4 = $uuid->uuid4();
		$struuid = $uuid4->toString();
		$transactionModel = new \App\Models\TransactionModel();
		$patient = [
			'trans_id'=> $struuid,
			'patient_id'=> $this->request->getPost('patient_id'),
			'tooth_no'=> $this->request->getPost('tooth_no'),
			'description'=> $this->request->getPost('description'),
			'amount'=> $this->request->getPost('amount'),
			'transaction_date'=> $this->request->getPost('transaction_date'),
			'created_at' => date("Y-m-d h:i:s")
		];
		$transactionModel->save($patient);
		$data = [
			'status' => 'Transaction saved successfully'
		];
		return $this->response->setJSON($data);
	}
    public function delete(){
        $transactionModel = new \App\Models\TransactionModel();
        $trans_id = $this->request->getPost('transId');
       $transactionModel->where('trans_id', $trans_id)->delete();
        $data = [
			'status' => 'Transaction deleted successfully',
          
		];
        return $this->response->setJSON($data);
    }
    public function load_table(){
        $transactionModel = new \App\Models\TransactionModel();
        $transData =  $transactionModel->orderBy('transaction_date', 'desc')->findAll();
        $patientModel = new \App\Models\PatientModel();
        $data['patientData'] = $patientModel->select(['patient_id', 'first_name', 'last_name'])->findAll();
        $i = 0;
        foreach($transData as $transaction){
            $key = array_search($transaction['patient_id'],  array_column($data['patientData'], 'patient_id'));
            $transData[$i]['fullname'] = $data['patientData'][$key]['last_name'] . ', ' . $data['patientData'][$key]['first_name'] ;
            $i++;
        }
        return $this->response->setJSON($transData);
    }
    public function generate_report(){
        $from_date = $this->request->getPost('from_date');
        $to_date = $this->request->getPost('to_date');
        $transactionModel = new \App\Models\TransactionModel();
        $array = ['transaction_date >=' => $from_date,'transaction_date <=' => $to_date,];
        //$where = 'transaction_date >= '. $from_date . ' AND transaction_date <= ' . $to_date;
        $transData =  $transactionModel
        ->where($array)
        ->orderBy('transaction_date', 'desc')
        ->findAll();
        $patientModel = new \App\Models\PatientModel();
        $data['patientData'] = $patientModel->select(['patient_id', 'first_name', 'last_name'])->findAll();
        $i = 0;
        foreach($transData as $transaction){
            $key = array_search($transaction['patient_id'],  array_column($data['patientData'], 'patient_id'));
            $transData[$i]['fullname'] = $data['patientData'][$key]['last_name'] . ' ' . $data['patientData'][$key]['first_name'] ;
            $i++;
        }
        $transData['from_date'] = $from_date;
        $transData['to_date'] = $to_date;
        return $this->response->setJSON($transData);
    }
}
