<?php

namespace App\Models;

use CodeIgniter\Model;

class AppointmentModel extends Model
{
    protected $useAutoIncrement = false;
    protected $useSoftDeletes = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $table = 'appointments';
    protected $primaryKey = 'appt_id';
    protected $allowedFields = ['appt_id','patient_id', 'appt_date', 'appt_start', 'appt_end', 'is_completed', 'is_canceled', 'created_at', 'updated_at', 'deleted_at'];
    
}