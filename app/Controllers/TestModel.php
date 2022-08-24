<?php 

namespace App\Controllers;
use App\Models\AccountModel;


class TestModel extends BaseController
{
  public function __construct()
  {
    $this->db = new AccountModel();
  }

  public function index ()
  {
    $db = new AccountModel();
    $db->set('uid','UUID', false);
    $data = [
      'nik' => 1234567890111111,
      'password' => 'fdsfffdsfdfds'
    ];
    $db->save($data);
  }

}