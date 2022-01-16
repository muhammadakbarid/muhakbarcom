<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ultah extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Mv_ulangtahun', 'MMedia', 'MMahasiswa', 'MDosen', 'MJadwal'));
		$this->load->helper(array('dateina', 'sosmed'));
	}

	public function index()
	{
		$ulth = $this->is_ultah();
		$pesan = "[" . $ulth['tgl'] . "] " . $ulth['status'] . " " . $ulth['nama'] . " ulang tahunn!";
		$selisih = $ulth['selisih'];

		if ($selisih < 7) {
			// whatsapp('6289646817762', $pesan);
			telegram($pesan);
		}
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
				$status = $selisih_hari . ' hari lagi ';
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
}
