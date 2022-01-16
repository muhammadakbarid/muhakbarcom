<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('dateIna')) {

	function selisih_hari($tgl)
	{
		$tgl = date('Y') . "-" . substr($tgl, 5);
		$tgl2 = date('y-m-d');
		$tgl = explode("-", $tgl);
		$tgl = date('Y') . "-" . $tgl[1] . "-" . $tgl[2];
		$startdate = $tgl2;
		$enddate =  $tgl;
		$tgl1 = new DateTime($startdate);
		$tgl2 = new DateTime($enddate);
		$d = $tgl2->diff($tgl1)->days;
		return $d;
	}

	function dateIna($data, $simple = false, $getMonth = false)
	{
		// day
		$hari = date("D", strtotime($data));
		$haris = array(
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu',
			'Sun' => 'Minggu',
		);

		$bulan = substr($data, 5, 2);
		$bulans = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		);
		if ($simple) {
			return substr($data, 8, 2) . " " . $bulans[$bulan] . " " . substr($data, 0, 4);
		} elseif ($getMonth) {
			return substr($bulans[$bulan], 0, 3);
		} else {
			//return "-";
			if ($data == "0000-00-00 00:00:00") {
				echo "-";
			} else {
				return substr($data, 8, 2) . " " . $bulans[$bulan] . " " . substr($data, 0, 4);
			}
		}
	}

	function hariapa($hari)
	{
		switch ($hari) {
			case '1':
				echo "Senin";
				break;

			case '2':
				echo "Selasa";
				break;

			case '3':
				echo "Rabu";
				break;

			case '4':
				echo "Kamis";
				break;

			case '5':
				echo "Jum'at";
				break;

			case '6':
				echo "Sabtu";
				break;

			case '7':
				echo "Minggu";
				break;
		}
	}

	function date_surat($data, $simple = false, $getMonth = false)
	{



		$bulan = substr($data, 5, 2);
		$bulans = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		);
		if ($simple) {
			return substr($data, 8, 2) . " " . $bulans[$bulan] . " " . substr($data, 0, 4);
		} elseif ($getMonth) {
			return substr($bulans[$bulan], 0, 3);
		} else {
			//return "-";
			if ($data == "0000-00-00 00:00:00") {
				echo "-";
			} else {
				return "Bandung, " . substr($data, 8, 2) . " " . $bulans[$bulan] . " " . substr($data, 0, 4);
			}
		}
	}
}
