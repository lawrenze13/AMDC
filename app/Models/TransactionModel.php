<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $useSoftDeletes = true;
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['trans_id','patient_id', 'tooth_no', 'description', 'amount', 'transaction_date', 'created_at', 'updated_at', 'deleted_at'];
    
}