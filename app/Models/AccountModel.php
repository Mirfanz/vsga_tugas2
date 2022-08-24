<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
  protected $table = 'account';
  protected $primaryKey = 'uid';

  protected $useAutoIncrement = true;

  // protected $returnType = 'array';
  protected $useSoftDeletes = false;

  protected $allowedFields = ['uid','name'];

  protected $useTimestamps = false;
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';
  // protected $useTimestamps = 'deleted_at';

  protected $validationRules = [
    'nik' => 'required|is_natural|exact_length[16]',
    'password' => 'required'
  ];
  // protected $validationMessages = [];
  // protected $skipValidation = false;
}