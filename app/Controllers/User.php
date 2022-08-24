<?php 

namespace App\Controllers;

use CodeIgniter\CodeIgniter;

class User extends BaseController
{

  public function __construct ()
  {
    $this->db = db_connect();
  }

  public function index ()
  {
    $nik = session()->get('nik');
    if(!$nik) return redirect()->to(base_url('login'));
    $user = $this->db->query("SELECT * FROM `user` WHERE `user`.`nik` = '$nik'");
    if(!$user->getNumRows()) return redirect()->to(base_url('register2'));
    $data = [
      'title' => 'My Profile',
      'page' => 'myprofile',
      'user' => $user->getFirstRow(),
    ];
    return view('pages/myprofile', $data);
  }

  private function _getQuery ($role = null): string
  {
    $query = '';
    switch ($role) {
      case 'Admin':
        $query = "SELECT * FROM `user`";
        break;
      case 'Sekretariat':
        $query = "SELECT * FROM `user` WHERE user.posisi = 'Pendaftar' OR  user.posisi = 'Anggota'";
        break;
      default:
        $query = "SELECT * FROM `user` WHERE user.posisi = 'Anggota'";
        break;
    }
    return $query;
  }
  public function profile ($uid)
  {
    $user = db_connect()->query("SELECT * FROM `user` WHERE `uid` = '$uid'");
    if(!$user->getNumRows()) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pengguna Tidak Ditemukan');
    $user = $user->getFirstRow();
    $data = [
      'title' => $user->name,
      'page' => 'users',
      'user' => $user,
    ];
    return view('pages/profile', $data);
  }

  public function users ()
  {
    $nik = session()->get('nik');
    if(!$nik) return redirect()->to(base_url('login'));
    $user = db_connect()->query("SELECT * FROM `user` WHERE `nik` = '$nik'")->getFirstRow();
    if(!$user) return redirect()->to(base_url('register2'));

    $data = [
      'title' => 'Daftar Pengguna',
      'page' => 'users',
      'posisi' => $user->posisi,
      'datas' => $this->db->query($this->_getQuery($user->posisi))->getResultArray()
    ];

    return view('pages/pengguna.php', $data);
  }

  public function jadiAnggota ($uid = null)
  {
    if(!$uid) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    $nik = session()->get('nik');
    if(!$nik) return redirect()->to(base_url('login'));
    $admin = $this->db->query("SELECT * FROM user WHERE user.nik = '$nik'")->getFirstRow();
    if(!$admin) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Anda tidak memiliki otoritas yang valid.');
    $hasAccess = [
      'Admin',
      'Sekretariat',
    ];
    if(!in_array($admin->posisi, $hasAccess)) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Anda tidak memiliki otoritas yang valid.');
    $user = $this->db->query("SELECT * FROM user WHERE user.uid = '$uid'")->getFirstRow();
    if(!$user) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    if($user->posisi === 'Admin'){
      session()->setFlashdata('warning', "Anda tidak dapat mengubah posisi Admin, disini Admin = Dewa.");
      return redirect()->back();
    }
    elseif($admin->posisi === 'Sekretariat' && $user->posisi !== 'Pendaftar'){
      session()->setFlashdata('warning', "Anda hanya dapat menerima pendaftar menjadi anggota.");
      return redirect()->back();
    }

    $update = $this->db->query("UPDATE `user` SET `user`.`posisi` = 'Anggota' WHERE `user`.`uid` = '$uid'");
    if($update) session()->setFlashdata('success', $user->name .' sekarang adalah Anggota The Programmer.');
    else session()->setFlashdata('error', 'Mohon Maaf! terjadi kesalahan pada server.');
    return redirect()->back();
  }

  public function jadiKetua ($uid = null)
  {
    if(!$uid) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    $nik = session()->get('nik');
    if(!$nik) return redirect()->to(base_url('login'));

    $admin = $this->db->query("SELECT * FROM user WHERE user.nik = '$nik'")->getFirstRow();
    if(!$admin) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Anda tidak memiliki otoritas yang valid.');
    if($admin->posisi !== 'Admin') throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Anda tidak memiliki otoritas yang valid.');
    
    $user = $this->db->query("SELECT * FROM user WHERE user.uid = '$uid'")->getFirstRow();
    if(!$user) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    if($user->posisi === 'Admin'){
      session()->setFlashdata('warning', "Anda tidak dapat mengubah posisi Admin, disini Admin = Dewa.");
      return redirect()->back();
    }

    $update = $this->db->query("UPDATE `user` SET `user`.`posisi` = 'Ketua' WHERE `user`.`uid` = '$uid'");
    if($update) session()->setFlashdata('success', $user->name .' sekarang adalah Ketua The Programmer.');
    else session()->setFlashdata('error', 'Mohon Maaf! terjadi kesalahan pada server.');
    return redirect()->back();
  }

  public function jadiSekretariat ($uid = null)
  {
    if(!$uid) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    $nik = session()->get('nik');
    if(!$nik) return redirect()->to(base_url('login'));
    
    $admin = $this->db->query("SELECT * FROM user WHERE user.nik = '$nik'")->getFirstRow();
    if(!$admin) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Anda tidak memiliki otoritas yang valid.');
    if($admin->posisi !== 'Admin') throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Anda tidak memiliki otoritas yang valid.');
    
    $user = $this->db->query("SELECT * FROM user WHERE user.uid = '$uid'")->getFirstRow();
    if(!$user) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    if($user->posisi === 'Admin'){
      session()->setFlashdata('warning', "Anda tidak dapat mengubah posisi Admin, disini Admin = Dewa.");
      return redirect()->back();
    }

    $update = $this->db->query("UPDATE `user` SET `user`.`posisi` = 'Sekretariat' WHERE `user`.`uid` = '$uid'");
    if($update) session()->setFlashdata('success', $user->name .' sekarang adalah Sekretariat The Programmer.');
    else session()->setFlashdata('error', 'Mohon Maaf! terjadi kesalahan pada server.');
    return redirect()->back();
  }

  public function editProfile ()
  {
    $nik = session()->get('nik');
    if(!$nik) return redirect()->to('login');
    $user = $this->db->query("SELECT * FROM `user` WHERE `user`.`nik` = '$nik'")->getFirstRow();
    if(!$user) return redirect()->to(base_url('register2'));
    $data = [
      'title' => 'Edit Profil',
      'page' => 'edit-profile',
      'user' => $user,
      'validation' => \Config\Services::validation(),
    ];
    return view('pages/edit-profil', $data);
  }

  public function commitEditProfile ()
  {
    $rules = [
      'name' => 'required|min_length[5]',
      'birth' => 'required|valid_date',
      'address' => 'required',
      'province' => 'required',
    ];

    if(!$this->validate($rules)) return redirect()->to(base_url('edit-profile'))->withInput();
    $nik = session()->get('nik');
    $name = $this->request->getPost('name');
    $birth = $this->request->getPost('birth');
    $address = $this->request->getPost('address');
    $province = $this->request->getPost('province');

    $update = $this->db->query("UPDATE `user` SET `name` = '$name', `birth` = '$birth', `address` = '$address', `province` = '$province' WHERE `nik` = '$nik'");

    if($update) session()->setFlashdata('success', 'Profil sudah diperbarui.');
    else session()->setFlashdata('error','Terjadi kesalahan pada server.');
    session()->set('name', $name);
    return redirect()->to(base_url('profile'));
  }

}