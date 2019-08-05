<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_m');
	}

	public function index()
	{
		// Jika bukan admin maka tampilkan data sesuai dengan cabang masing-masing
		if ($this->fungsi->user_login()->id_cabang != 46) {
			$where = 'id_user = ' . $this->fungsi->user_login()->id_user;
			$id_cabang = 'AND id_user = ' . $this->fungsi->user_login()->id_user;
		} else {
			if ($this->fungsi->user_login()->level == 2) {
				$where = 'id_approval IS NOT NULL';
			} else if ($this->fungsi->user_login()->level == 3) {
				$where = 'id_approval = 2';
			} else if ($this->fungsi->user_login()->level == 4 || $this->fungsi->user_login()->level == 5) {
				$where = 'id_approval IS NOT NULL ';
			}
			$id_cabang = '';
		}

		// if ($this->fungsi->user_login()->level == 2) {
		// 	$where = 'id_approval = 0';
		// } else if ($this->fungsi->user_login()->level == 3) {
		// 	$where = 'id_approval = 2';
		// }

		check_not_login();
		//Total Status My'Talim
		$total_pending_mytalim = $this->data_m->count_data("tb_my_talim", "id_approval = 0 $id_cabang");
		$total_approved_mytalim = $this->data_m->count_data("tb_my_talim", "id_approval = 2 $id_cabang");
		$total_rejected_mytalim = $this->data_m->count_data("tb_my_talim", "id_approval = 1 $id_cabang");

		//Total Status My Hajat
		$total_pending_myhajat = $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_hajat_lainnya", "id_approval = 0 $id_cabang");
		$total_approved_myhajat = $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_hajat_lainnya", "id_approval = 2 $id_cabang");
		$total_rejected_myhajat = $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_hajat_lainnya", "id_approval = 1 $id_cabang");

		//Total Status My'ihram
		$total_pending_myihram = $this->data_m->count_data("tb_my_ihram", "id_approval = 0 $id_cabang");
		$total_approved_myihram = $this->data_m->count_data("tb_my_ihram", "id_approval = 2 $id_cabang");
		$total_rejected_myihram = $this->data_m->count_data("tb_my_ihram", "id_approval = 1 $id_cabang");

		//Total Status My Safar
		$total_pending_mysafar = $this->data_m->count_data("tb_my_safar", "id_approval = 0 $id_cabang");
		$total_approved_mysafar = $this->data_m->count_data("tb_my_safar", "id_approval = 2 $id_cabang");
		$total_rejected_mysafar = $this->data_m->count_data("tb_my_safar", "id_approval = 1 $id_cabang");

		//Total Status Aktivasi Agent
		$total_pending_aktivasi_agent = $this->data_m->count_data("tb_aktivasi_agent", "id_approval = 0 $id_cabang");
		$total_approved_aktivasi_agent = $this->data_m->count_data("tb_aktivasi_agent", "id_approval = 2 $id_cabang");
		$total_rejected_aktivasi_agent = $this->data_m->count_data("tb_aktivasi_agent", "id_approval = 1 $id_cabang");

		//Total Status NST
		$total_pending_nst = $this->data_m->count_data("tb_nst", "id_approval = 0 $id_cabang");
		$total_approved_nst = $this->data_m->count_data("tb_nst", "id_approval = 2 $id_cabang");
		$total_rejected_nst = $this->data_m->count_data("tb_nst", "id_approval = 1 $id_cabang");

		//Total Status Lead Management
		$total_pending_lead_management = $this->data_m->count_data("tb_lead_management", "id_approval = 0 $id_cabang");
		$total_approved_lead_management = $this->data_m->count_data("tb_lead_management", "id_approval = 2 $id_cabang");
		$total_rejected_lead_management = $this->data_m->count_data("tb_lead_management", "id_approval = 1 $id_cabang");

		//Total Pending
		$total_pending = $total_pending_myhajat + $total_pending_mytalim + $total_pending_myihram + $total_pending_mysafar + $total_pending_aktivasi_agent + $total_pending_nst + $total_pending_lead_management;
		//Total Approved
		$total_approved = $total_approved_myhajat + $total_approved_mytalim + $total_approved_myihram + $total_approved_mysafar + $total_approved_aktivasi_agent + $total_approved_nst + $total_approved_lead_management;
		//Total Rejected
		$total_rejected = $total_rejected_myhajat + $total_rejected_mytalim + $total_rejected_myihram + $total_rejected_mysafar + $total_rejected_aktivasi_agent + $total_rejected_nst + $total_rejected_lead_management;

		$data = [
			//Pending Status
			'pending_myhajat_renovasi' 		=> $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 0 $id_cabang"),
			'pending_myhajat_sewa' 			=> $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 0 $id_cabang"),
			'pending_myhajat_wedding' 		=> $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 0 $id_cabang"),
			'pending_myhajat_franchise' 	=> $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 0 $id_cabang"),
			'pending_myhajat_lainnya' 		=> $this->data_m->count_data("tb_my_hajat_lainnya", "id_approval = 0 $id_cabang"),
			'pending_mytalim' 				=> $this->data_m->count_data("tb_my_talim", "id_approval = 0 $id_cabang"),
			'pending_myihram' 				=> $this->data_m->count_data("tb_my_ihram", "id_approval = 0 $id_cabang"),
			'pending_mysafar' 				=> $this->data_m->count_data("tb_my_safar", "id_approval = 0 $id_cabang"),
			'pending_aktivasi_agent' 		=> $this->data_m->count_data("tb_aktivasi_agent", "id_approval = 0 $id_cabang"),
			'pending_nst' 					=> $this->data_m->count_data("tb_nst", "id_approval = 0 $id_cabang"),
			'pending_lead_management' 		=> $this->data_m->count_data("tb_lead_management", "id_approval = 0 $id_cabang"),
			'total_pending_myhajat' 		=> $total_pending_myhajat,

			//Approved Status
			'approved_myhajat_renovasi' 	=> $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 2 $id_cabang"),
			'approved_myhajat_sewa' 		=> $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 2 $id_cabang"),
			'approved_myhajat_wedding' 		=> $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 2 $id_cabang"),
			'approved_myhajat_franchise' 	=> $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 2 $id_cabang"),
			'approved_myhajat_lainnya' 		=> $this->data_m->count_data("tb_my_hajat_lainnya", "id_approval = 2 $id_cabang"),
			'approved_mytalim' 				=> $this->data_m->count_data("tb_my_talim", "id_approval = 2 $id_cabang"),
			'approved_myihram' 				=> $this->data_m->count_data("tb_my_ihram", "id_approval = 2 $id_cabang"),
			'approved_mysafar' 				=> $this->data_m->count_data("tb_my_safar", "id_approval = 2 $id_cabang"),
			'approved_aktivasi_agent' 		=> $this->data_m->count_data("tb_aktivasi_agent", "id_approval = 2 $id_cabang"),
			'approved_nst' 					=> $this->data_m->count_data("tb_nst", "id_approval = 2 $id_cabang"),
			'approved_lead_management' 		=> $this->data_m->count_data("tb_lead_management", "id_approval = 2 $id_cabang"),
			'total_approved_myhajat' 		=> $total_approved_myhajat,

			//Rejected Status
			'rejected_myhajat_renovasi' 	=> $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 1 $id_cabang"),
			'rejected_myhajat_sewa' 		=> $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 1 $id_cabang"),
			'rejected_myhajat_wedding' 		=> $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 1 $id_cabang"),
			'rejected_myhajat_franchise' 	=> $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 1 $id_cabang"),
			'rejected_myhajat_lainnya' 		=> $this->data_m->count_data("tb_my_hajat_lainnya", "id_approval = 1 $id_cabang"),
			'rejected_mytalim' 				=> $this->data_m->count_data("tb_my_talim", "id_approval = 1 $id_cabang"),
			'rejected_myihram' 				=> $this->data_m->count_data("tb_my_ihram", "id_approval = 1 $id_cabang"),
			'rejected_mysafar' 				=> $this->data_m->count_data("tb_my_safar", "id_approval = 1 $id_cabang"),
			'rejected_aktivasi_agent'		=> $this->data_m->count_data("tb_aktivasi_agent", "id_approval = 1 $id_cabang"),
			'rejected_nst' 					=> $this->data_m->count_data("tb_nst", "id_approval = 1 $id_cabang"),
			'rejected_lead_management' 		=> $this->data_m->count_data("tb_lead_management", "id_approval = 1 $id_cabang"),
			'total_rejected_myhajat' 		=> $total_rejected_myhajat,

			//Total Pending
			'total_pending' => $total_pending,
			'total_approved' => $total_approved,
			'total_rejected' => $total_rejected
		];

		$data['mytalim_records'] 			= $this->data_m->get_product('tb_my_talim', 'tb_my_talim.' . $where, 'id_mytalim DESC');
		// $data['myhajat_records']			= $this->data_m->query('SELECT *,
		// 										tb_my_hajat_renovasi.nama_konsumen as nama_konsumen_renovasi,
		// 										tb_my_hajat_sewa.nama_konsumen as nama_konsumen_sewa,
		// 										tb_my_hajat_wedding.nama_konsumen as nama_konsumen_wedding,
		// 										tb_my_hajat_franchise.nama_konsumen as nama_konsumen_franchise,
		// 										tb_my_hajat_lainnya.nama_konsumen as nama_konsumen_lainnya,

		// 										tb_my_hajat_renovasi.jenis_konsumen as jenis_konsumen_renovasi,
		// 										tb_my_hajat_sewa.jenis_konsumen as jenis_konsumen_sewa,
		// 										tb_my_hajat_wedding.jenis_konsumen as jenis_konsumen_wedding,
		// 										tb_my_hajat_franchise.jenis_konsumen as jenis_konsumen_franchise,
		// 										tb_my_hajat_lainnya.jenis_konsumen as jenis_konsumen_lainnya,
		// 										CASE
		// 											WHEN tb_my_hajat.id_renovasi IS NOT NULL THEN "My Hajat Renovasi"
		// 											WHEN tb_my_hajat.id_sewa IS NOT NULL THEN "My Hajat Sewa"
		// 											WHEN tb_my_hajat.id_wedding IS NOT NULL THEN "My Hajat Wedding"
		// 											WHEN tb_my_hajat.id_franchise IS NOT NULL THEN "My Hajat Franchise"
		// 											WHEN tb_my_hajat.id_myhajat_lainnya IS NOT NULL THEN "My Hajat Lainnya"
		// 										END AS produk

		// 										FROM tb_my_hajat

		// 										LEFT JOIN tb_my_hajat_renovasi
		// 										ON tb_my_hajat.id_renovasi = tb_my_hajat_renovasi.id_renovasi

		// 										LEFT JOIN tb_my_hajat_sewa
		// 										ON tb_my_hajat.id_sewa = tb_my_hajat_sewa.id_sewa

		// 										LEFT JOIN tb_my_hajat_wedding
		// 										ON tb_my_hajat.id_wedding = tb_my_hajat_wedding.id_wedding

		// 										LEFT JOIN tb_my_hajat_franchise
		// 										ON tb_my_hajat.id_franchise = tb_my_hajat_franchise.id_franchise

		// 										LEFT JOIN tb_my_hajat_lainnya
		// 										ON tb_my_hajat.id_myhajat_lainnya = tb_my_hajat_lainnya.id_myhajat_lainnya

		// 										WHERE ' . $where . '
		// ');
		$data['myhajat_renovasi_records'] 	= $this->data_m->get_product('tb_my_hajat_renovasi', 'tb_my_hajat_renovasi.' . $where, 'id_renovasi DESC');
		$data['myhajat_sewa_records'] 		= $this->data_m->get_product('tb_my_hajat_sewa', 'tb_my_hajat_sewa.' . $where, 'id_sewa DESC');
		$data['myhajat_wedding_records'] 	= $this->data_m->get_product('tb_my_hajat_wedding', 'tb_my_hajat_wedding.' . $where, 'id_wedding DESC');
		$data['myhajat_franchise_records'] 	= $this->data_m->get_product('tb_my_hajat_franchise', 'tb_my_hajat_franchise.' . $where, 'id_franchise DESC');
		$data['myhajat_lainnya_records'] 	= $this->data_m->get_product('tb_my_hajat_lainnya', 'tb_my_hajat_lainnya.' . $where, 'id_myhajat_lainnya DESC');
		$data['myihram_records'] 			= $this->data_m->get_product('tb_my_ihram', 'tb_my_ihram.' . $where, 'id_myihram DESC');
		$data['mysafar_records'] 			= $this->data_m->get_product('tb_my_safar', 'tb_my_safar.' . $where, 'id_mysafar DESC');
		$data['aktivasi_agent_records'] 	= $this->data_m->get_product('tb_aktivasi_agent', 'tb_aktivasi_agent.' . $where, 'id_agent DESC');
		$data['nst_records'] 				= $this->data_m->get_product('tb_nst', 'tb_nst.' . $where, 'id_nst DESC');
		$data['lead_management_records'] 	= $this->data_m->get_product('tb_lead_management', 'tb_lead_management.' . $where, 'id_lead DESC');

		$this->template->load('template2', 'dashboard', $data);
	}

	public function template()
	{
		$this->template->load('template2', 'dashboard');
	}
}
