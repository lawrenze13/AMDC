<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
	protected $useAutoIncrement = false;
	    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $useSoftDeletes = true;
    protected $table = 'patient_info';
    protected $primaryKey = 'patient_id';
    protected $allowedFields = ['patient_id','first_name', 'middle_initial','last_name', 'birthdate', 'sex', 'email', 'contact', 'address', 'patient_type','photo_url' ,'created_at', 'updated_at', 'deleted_at'];
    
}