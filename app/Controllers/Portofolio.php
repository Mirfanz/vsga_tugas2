<?php 

namespace App\Controllers;

class Portofolio extends BaseController
{

  public function __construct()
  {
    $this->db = db_connect();
  }

  public function index ()
  {
    $nik = session()->get('nik');
    if(!$nik) return redirect()->to(base_url('login'));
    $user = $this->db->query("SELECT * FROM `user` JOIN `portfolio` WHERE `user`.`nik` = '$nik' AND `user`.`nik` = `portfolio`.`nik`")->getFirstRow();
    if(!$user) return redirect()->to('portofolio/post');
    $data = [
      'title' => 'My Portofolio',
      'page' => 'myportofolio',
      'user' => $user
    ];
    return view('pages/myportofolio',$data);
  }
  
  public function portofolio ($uid)
  {
    $user = $this->db->query("SELECT * FROM `user` JOIN `portfolio` WHERE `user`.`uid` = '$uid' AND `user`.`nik` = `portfolio`.`nik`")->getFirstRow();
    if(!$user) {
      session()->setFlashdata('warning', 'Mohon maaf, pengguna belum memiliki portofolio.');
      return redirect()->back();
    };
    $data = [
      'title' => 'Muhammad Irfan\'s Portofolio',
      'page' => 'users',
      'user' => $user
    ];
    return view('pages/portofolio',$data);
  }

  public function addPortofolio () 
  {
    $nik = session()->get('nik');
    if(!$nik) return redirect()->to(base_url('login'));
    $user = $this->db->query("SELECT * FROM `user` WHERE `user`.`nik` = '$nik'");
    if(!$user->getNumRows()) return redirect()->to(base_url('register2'));
    $data = [
      'title' => 'My Portofolio',
      'page' => 'myportofolio',
      'user' => $user->getFirstRow(),
      'validation' => \Config\Services::validation()
    ];
    
    return view('pages/add-portofolio', $data);
  }

  public function commitAddPortofolio ()
  {
    $rules = [
      'bidang' => 'required',
      'sertifikat' => [
        'rules' => 'ext_in[sertifikat,pdf]|mime_in[sertifikat,application/pdf]|max_size[sertifikat,3072]',
        'errors' => [
          'max_size' => 'ukuran file lebih dari 3mb.'
        ]
      ],
    ];
    if(!$this->validate($rules)) return redirect()->to(base_url('portofolio/post'))->withInput();

    $nik = session()->get('nik');
    $bidang = $this->request->getPost('bidang');
    $pelatihan = $this->request->getPost('pelatihan');
    $project = $this->request->getPost('project');
    $sertifikat = null;

    $fileSertifikat = $this->request->getFile('sertifikat');
    if($fileSertifikat->getError()!==4){
      // Generate nama file random
      $sertifikat = $fileSertifikat->getRandomName();
      // Upload file
      $fileSertifikat->move('assets/sertifikat',$sertifikat);
    }
    // Insert ke database
    $result = $this->db->query("INSERT INTO `portfolio` (`nik`, `bidang_keahlian`, `riwayat_pelatihan`, `sertifikat_dimiliki`, `riwayat_project`) VALUES ('$nik', '$bidang', '$pelatihan', '$sertifikat', '$project')");
    if(!$result){
      session()->setFlashdata('error', 'Anda telah memposting portoflio anda.');
      return redirect()->to(base_url('portofolio/post'))->withInput();
    }
    session()->setFlashdata('success', 'Anda telah memposting portoflio anda.');
    return redirect()->to(base_url('portofolio'));
  }

}