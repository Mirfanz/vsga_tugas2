<?php 

namespace App\Controllers;

use CodeIgniter\CodeIgniter;
use Config\Services;

class Account extends BaseController
{
  public function __construct()
  {
    $this->db = db_connect();
    // $this->accountModel = new AccountModel();
  }

  public function index ()
  {
    $nik = session()->get('nik');
    if($nik) return redirect()->back();
    $data = [
      'title' => 'Login',
      'validation' => Services::validation(),
    ];
    return view('account/login', $data);
  }

  public function loginManajemen ()
  {
    $nik = session()->get('nik');
    if(!$nik) return redirect()->to(base_url('login'));
    $user = $this->db->query("SELECT * FROM `user` WHERE `nik` = '$nik'")->getFirstRow();
    if($user->posisi !== 'Admin') throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Anda tidak memiliki otoritas yang valid.');
    $data = [
      'title' => 'Manajemen Login Pengguna',
      'page' => 'login-manajemen',
      'datas' => $this->db->query("SELECT * FROM `login` JOIN `user` WHERE `login`.`nik` = `user`.`nik` ORDER BY `time` DESC")->getResultArray(),
    ];
    return view('pages/login-manajemen',$data);
  }

  public function logout ()
  {
    session()->remove('nik');
    session()->remove('name');
    session()->remove('posisi');
    return redirect()->back();
  }

  public function register ()
  {
    $nik = session()->get('nik');
    if($nik) return redirect()->back();
    $data = [
      'title' => 'Register',
      'validation' => Services::validation(),
    ];
    return view('account/register',$data);
  }

  public function register2 ()
  {
    $nik = session()->get('nik');
    if(!$nik) return redirect()->back();
    $result = $this->db->query("SELECT `name` FROM `user` WHERE `nik` = '$nik'")->getNumRows();
    if($result) return redirect()->back();
    $data = [
      'title' => 'Register',
      'validation' => Services::validation(),
    ];
    return view('account/register2',$data);
  }

  // =======================================================================================================
  public function commitLogin ()
  {
    $nik = $this->request->getPost('nik');
    $rules = [
      'nik' => [
        'rules' => 'required|is_natural|exact_length[16]|is_not_unique[account.nik]',
        'errors'	=> [
          'is_not_unique' => 'nik tidak ditemukan.'
        ],
      ],
      'password' => [
        'rules' => 'required|is_not_unique[account.password,account.nik,'.$nik.']',
        'errors' => [
          'is_not_unique' => 'password salah.'
        ],
      ],
    ];
    if(!$this->validate($rules)) return redirect()->to(base_url('login'))->withInput();

    session()->set('nik', $nik);
    $result = $this->db->query("SELECT * FROM `user` WHERE nik = '$nik'")->getFirstRow();
    $time = time();
    $platform = $this->request->getUserAgent()->getPlatform();
    $ip = $this->request->getIPAddress();
    $this->db->query("INSERT INTO `login` (`nik`,`platform`,`time`,`ip`) VALUES ('$nik','$platform','$time','$ip')");
    if(!$result) return redirect()->to(base_url('register2'));
    session()->set('posisi',$result->posisi);
    session()->set('name', $result->name);
    return redirect()->to(base_url('profile'));
  }

  public function commitRegister ()
  {
    $rules = [
      'nik' => [
        'rules' => 'required|is_natural|exact_length[16]|is_unique[account.nik]',
        'errors' => [
          'is_unique' => 'nik telah terdaftar.'
        ],
      ],
      'password' => 'required|min_length[8]|matches[repeat_password]',
    ];
    if(!$this->validate($rules)) {
      return redirect()->to(base_url('register'))->withInput();
    }

    $nik = $this->request->getPost('nik');
    $pass = $this->request->getPost('password');
    $insert = $this->db->query("INSERT INTO `account` (`nik`, `password`) VALUES ('$nik', '$pass')");
    if(!$insert) {
      session()->setFlashdata('error', 'Terjaji kesalahan');
      return redirect()->to(base_url('register'))->withInput();
    }
    session()->set('nik', $nik);
    return redirect()->to(base_url('register2'));
  }

  public function commitRegister2 ()
  {
    $rules = [
      'name' => 'required|min_length[5]',
      'birth' => 'required|valid_date',
      'address' => 'required',
      'province' => 'required',
      'email' => 'required|valid_email|is_unique[user.email]',
      'accept' => 'required'
    ];
    if(!$this->validate($rules)) return redirect()->to(base_url('register2'))->withInput();
    $nik = session()->get('nik');
    $name = $this->request->getPost('name');
    $birth = $this->request->getPost('birth');
    $address = $this->request->getPost('address');
    $province = $this->request->getPost('province');
    $email = $this->request->getPost('email');
    $uid = uniqid();
    $result = $this->db->query("INSERT INTO `user` (`uid`,`nik`,`name`,`birth`,`address`,`province`,`email`) VALUES ('$uid','$nik','$name','$birth','$address','$province','$email')");
    session()->set('name', $name);
    if(!$result) {
      session()->setFlashdata('error' , 'Maaf gagal! mungkin sedang terjadi error pada server.');
      return redirect()->to(base_url('register2'));
    }
    session()->setFlashdata('success' , 'Selamat anda telah terdaftar');
    return redirect()->to(base_url('profile'));
  }
}