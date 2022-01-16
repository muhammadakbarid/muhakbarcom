<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model(array('Mv_ulangtahun', 'MMedia', 'MMahasiswa', 'MDosen', 'MJadwal'));
    $this->load->helper(array('dateina', 'whatsapp'));
  }

  public function index()
  {
    $data['ulth'] = $this->is_ultah();
    $data['ultah'] = $this->Mv_ulangtahun->get_all();
    $data['mhs'] = $this->MMahasiswa->get_all();
    $data['page'] = 'frontend/index';
    $data['title'] = 'Home';
    $this->load->view('template/frontend', $data);
  }

  public function is_ultah()
  {
    $nextulth = $this->Mv_ulangtahun->get_next();
    $selisih_hari = selisih_hari($nextulth->tgl_lahir);

    switch ($selisih_hari) {
      case $selisih_hari < 0:
        $status = 'Hari ini';
        $warna = 'success';
        break;
      case $selisih_hari  < 2:
        $status = 'Besok';
        $warna = 'warning';
        break;
      case $selisih_hari < 7:
        $status = $selisih_hari . ' hari lagi';
        $warna = 'warning';
        break;
      case $selisih_hari < 30:
        $status = 'Sebulan lagi';
        $warna = 'info';
        break;
    }
    $ulth = array(
      'nama' => $nextulth->nama,
      'tgl' => dateina($nextulth->tgl_lahir),
      'status' => $status,
      'warna' => $warna,
      'selisih' => $selisih_hari,
    );
    return $ulth;
  }

  public function about()
  {

    $data['page'] = 'frontend/about';
    $data['title'] = 'About';
    $this->load->view('template/frontend', $data);
  }

  public function media()
  {
    $media = $this->MMedia->get_all();
    $arrMedia[] = array();
    $i = 0;
    foreach ($media as $m) {
      $ex = $m->url;
      $mexplode = explode("/", $ex);
      $arrMedia[$i] = array($mexplode[5], $m->caption);
      $i++;
    };
    $data['media'] = $arrMedia;

    $data['page'] = 'frontend/media';
    $data['title'] = 'media';
    $this->load->view('template/frontend', $data);
  }

  public function dosen()
  {
    $data['page'] = 'frontend/dosen';
    $data['title'] = 'Dosen';
    $data['dosen'] = $this->MDosen->get_all();
    $this->load->view('template/frontend', $data);
  }

  public function jadwal()
  {

    $data['semester'] = $this->MJadwal->get_semester();

    $data['jadwal'] = $this->MJadwal->get_jadwal($data['semester']->semester);
    $data['page'] = 'frontend/jadwal';
    $data['title'] = 'jadwal';
    $this->load->view('template/frontend', $data);
  }

  public function ultah()
  {
    $data['ultah'] = $this->Mv_ulangtahun->get_all();
    $data['page'] = 'frontend/ultah';
    $data['title'] = 'ultah';
    $this->load->view('template/frontend', $data);
  }

  public function signin()
  {
    // $data['page']='auth/login';
    redirect('login');
  }

  public function signup()
  {
    $data['page'] = 'frontend/signup';
    $data['title'] = 'Signup';
    $this->load->view('template/frontend', $data);
  }
}
