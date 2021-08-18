<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientPhotosModel extends Model
{
    protected $useAutoIncrement = false;
    protected $useSoftDeletes = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $table = 'patient_photos';
    protected $primaryKey = 'photo_id';
    protected $allowedFields = ['photo_id','patient_id', 'photo_url', 'notes',  'created_at', 'updated_at', 'deleted_at'];
    
}