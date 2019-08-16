<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin2 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Aksi_Admin2_m');
		$this->load->model('data_m');
	}

	//menyelesaikan support ticket
	public function complete($produk = NULL, $kategori = NULL, $id)
	{
		//Produk My Ta'lim
		if ($produk == 'mytalim') {
			$this->Aksi_Admin2_m->complete('tb_my_talim', ['id_mytalim' => $id]);
			$this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Talim!</div>');
			redirect('/');
		}

		if ($produk == 'myhajat' && $kategori == 'renovasi') {
			$this->Aksi_Admin2_m->complete('tb_my_hajat_renovasi', ['id_renovasi' => $id]);
			$this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Hajat!</div>');
			redirect('/');
		}
		if ($produk == 'myhajat' && $kategori == 'sewa') {
			$this->Aksi_Admin2_m->complete('tb_my_hajat_sewa', ['id_sewa' => $id]);
			$this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Hajat!</div>');
			redirect('/');
		}
		if ($produk == 'myhajat' && $kategori == 'wedding') {
			$this->Aksi_Admin2_m->complete('tb_my_hajat_wedding', ['id_wedding' => $id]);
			$this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Hajat!</div>');
			redirect('/');
		}
		if ($produk == 'myhajat' && $kategori == 'franchise') {
			$this->Aksi_Admin2_m->complete('tb_my_hajat_franchise', ['id_franchise' => $id]);
			$this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Hajat!</div>');
			redirect('/');
		}

		if ($produk == 'myhajat' && $kategori == 'lainnya') {
			$this->Aksi_Admin2_m->complete('tb_my_hajat_lainnya', ['id_myhajat_lainnya' => $id]);
			$this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Hajat!</div>');
			redirect('/');
		}

		if ($produk == 'myihram') {
			$this->Aksi_Admin2_m->complete('tb_my_ihram', ['id_myihram' => $id]);
			$this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Ihram!</div>');
			redirect('/');
		}

		if ($produk == 'mysafar') {
			$this->Aksi_Admin2_m->complete('tb_my_safar', ['id_mysafar' => $id]);
			$this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Safar!</div>');
			redirect('/');
		}

		if ($produk == 'nst') {
			$this->Aksi_Admin2_m->complete('tb_nst', ['id_nst' => $id]);
			$this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support NST!</div>');
			redirect('/');
		}

		if ($produk == 'lead_management') {
			$this->Aksi_Admin2_m->complete('tb_lead_management', ['id_lead' => $id]);
			$this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support Lead Management!</div>');
			redirect('/');
		}

		if ($produk == 'aktivasi_agent') {
			$this->Aksi_Admin2_m->complete('tb_aktivasi_agent', ['id_agent' => $id]);
			$this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support Aktivasi Agent!</div>');
			redirect('/');
		}

		if ($produk == 'mitra_kerjasama') {
			$this->Aksi_Admin2_m->complete('tb_mitra_kerjasama', ['id_mitra_kerjasama' => $id]);
			$this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support Mitra Kerjasama!</div>');
			redirect('/');
		}

		if ($produk == 'mycars') {
			$this->Aksi_Admin2_m->complete('tb_my_cars', ['id_mycars' => $id]);
			$this->session->set_flashdata('berhasil_completed', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My CarS!</div>');
			redirect('/');
		}

		if ($produk == 'myfaedah') {
			$this->Aksi_Admin2_m->complete('tb_my_faedah', ['id_myfaedah' => $id]);
			$this->session->set_flashdata('berhasil_completed', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Faedah!</div>');
			redirect('/');
		}
	}

	//menyelesaikan support ticket
	public function reject($produk = NULL, $kategori = NULL, $id)
	{
		//Produk My Ta'lim
		if ($produk == 'mytalim') {
			$this->Aksi_Admin2_m->reject('tb_my_talim', ['id_mytalim' => $id]);
			$this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Talim!</div>');
			redirect('/');
		}

		if ($produk == 'myhajat' && $kategori == 'renovasi') {
			$this->Aksi_Admin2_m->reject('tb_my_hajat_renovasi', ['id_renovasi' => $id]);
			$this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Hajat!</div>');
			redirect('/');
		}
		if ($produk == 'myhajat' && $kategori == 'sewa') {
			$this->Aksi_Admin2_m->reject('tb_my_hajat_sewa', ['id_sewa' => $id]);
			$this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Hajat!</div>');
			redirect('/');
		}
		if ($produk == 'myhajat' && $kategori == 'wedding') {
			$this->Aksi_Admin2_m->reject('tb_my_hajat_wedding', ['id_wedding' => $id]);
			$this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Hajat!</div>');
			redirect('/');
		}
		if ($produk == 'myhajat' && $kategori == 'franchise') {
			$this->Aksi_Admin2_m->reject('tb_my_hajat_franchise', ['id_franchise' => $id]);
			$this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Hajat!</div>');
			redirect('/');
		}

		if ($produk == 'myhajat' && $kategori == 'lainnya') {
			$this->Aksi_Admin2_m->reject('tb_my_hajat_lainnya', ['id_myhajat_lainnya' => $id]);
			$this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Hajat!</div>');
			redirect('/');
		}

		if ($produk == 'myihram') {
			$this->Aksi_Admin2_m->reject('tb_my_ihram', ['id_myihram' => $id]);
			$this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Ihram!</div>');
			redirect('/');
		}

		if ($produk == 'mysafar') {
			$this->Aksi_Admin2_m->reject('tb_my_safar', ['id_mysafar' => $id]);
			$this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Safar!</div>');
			redirect('/');
		}

		if ($produk == 'nst') {
			$this->Aksi_Admin2_m->reject('tb_nst', ['id_nst' => $id]);
			$this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support NST!</div>');
			redirect('/');
		}

		if ($produk == 'lead_management') {
			$this->Aksi_Admin2_m->reject('tb_lead_management', ['id_lead' => $id]);
			$this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support Lead Management!</div>');
			redirect('/');
		}

		if ($produk == 'aktivasi_agent') {
			$this->Aksi_Admin2_m->reject('tb_aktivasi_agent', ['id_agent' => $id]);
			$this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support Aktivasi Agent!</div>');
			redirect('/');
		}

		if ($produk == 'mitra_kerjasama') {
			$this->Aksi_Admin2_m->reject('tb_mitra_kerjasama', ['id_mitra_kerjasama' => $id]);
			$this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support Mitra Kerjasama!</div>');
			redirect('/');
		}

		if ($produk == 'mycars') {
			$this->Aksi_Admin2_m->reject('tb_my_cars', ['id_mycars' => $id]);
			$this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My CarS!</div>');
			redirect('/');
		}

		if ($produk == 'myfaedah') {
			$this->Aksi_Admin2_m->reject('tb_my_faedah', ['id_myfaedah' => $id]);
			$this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Faedah!</div>');
			redirect('/');
		}
	}
}
