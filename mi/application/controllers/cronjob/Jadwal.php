<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Mv_ulangtahun', 'MMedia', 'MMahasiswa', 'MDosen', 'MJadwal'));
		$this->load->helper(array('dateina', 'sosmed'));
	}

	public function index()
	{
		$semester = $this->MJadwal->get_semester();
		$jadwal = $this->MJadwal->get_jadwal_hari_ini($semester->semester);
		$pembuka = "[" . dateina(date('Y-m-d')) . "] " . "Jadwal Hari ini : \n\n";
		$i = 1;
		$pesan = "";
		foreach ($jadwal as $jadwal) {
			$waktu_mulai = substr($jadwal->waktu_mulai, 0, 5);
			$waktu_akhir = substr($jadwal->waktu_akhir, 0, 5);
			$teks = "$i." . " " . "$jadwal->nama | $waktu_mulai - $waktu_akhir\n";
			$i++;
			$pesan = $pesan . $teks;
		}
		$pesan = $pembuka . $pesan;
		telegram($pesan);
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
