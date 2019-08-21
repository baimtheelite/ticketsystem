<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
{
    public $id_user;

    //Variabel memilih Data my hajat milik user 
    public $id_user_myhajat;
    public $approval_myhajat;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Aksi_Admin2_m');
        $this->load->model('data_m');
        $this->load->model('comment_m');

        $id_user = NULL;
        if ($this->fungsi->user_login()->id_cabang != 46) {
            $this->id_user = $this->fungsi->user_login()->id_user;

            $this->id_user_myhajat = '= ' . $this->fungsi->user_login()->id_user;
            $this->approval_myhajat = 'IS NOT NULL';
        } else {
            $this->id_user = NULL;

            $this->id_user_myhajat = 'IS NOT NULL';
            $this->approval_myhajat = 'IS NOT NULL';
        }

        check_not_login();
    }

    public function list($produk, $kategori = NULL, $id = NULL)
    {
        if ($produk == "lead_management") {
            $data['data'] = $this->data_m->query("SELECT * 
                                                    FROM 
                                                tb_lead_management as A
                                                INNER JOIN tb_ticket as B
                                                ON A.id_lead = B.id_lead 
                                                ");
            $this->template->load('template2', 'lead_management/lead_management_list', $data);
        }

        if ($produk == "nst") {
            $data['data'] = $this->data_m->query("SELECT * 
                                                    FROM 
                                                tb_nst as A
                                                INNER JOIN tb_ticket as B
                                                ON A.id_nst = B.id_nst 
                                                ");
            $this->template->load('template2', 'nst/nst_list', $data);
        }

        ////////////////////////////// MY TA'LIM /////////////////////////////////////////
        //menampilkan status tiket produk mytalim yang telah COMPLETED oleh dan admin 2
        if ($produk == 'mytalim' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_talim', 'list', $this->id_user)->result();
            $this->template->load('template2', 'my_talim/my_talim_list', $data);
        }

        ////////////////////////////// MY HAJAT /////////////////////////////////////////
        if ($produk == 'myhajat' && $id == NULL) {
            $data['data'] = $this->data_m->get_myhajat($this->id_user_myhajat, '= 3');
            $this->template->load('template2', 'my_hajat/my_hajat_list', $data);
        }
        ///////////////// RENOVASI //////////////////
        //Menampilkan semua ticket yang COMPLETED pada produk my hajat kategori renovasi jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'renovasi' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_renovasi', 'list', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/renovasi/my_hajat_renovasi_list', $data);
        }

        ///////////////// SEWA //////////////////
        //Menampilkan semua ticket yang COMPLETED pada produk my hajat kategori sewa jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'sewa' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_sewa', 'list', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/sewa/my_hajat_sewa_list', $data);
        }

        ///////////////// WEDDING //////////////////
        //Menampilkan semua ticket yang COMPLETED pada produk my hajat kategori wedding jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'wedding' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_wedding', 'list', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/wedding/my_hajat_wedding_list', $data);
        }

        ///////////////// FRANCHISE //////////////////
        //Menampilkan semua ticket yang COMPLETED pada produk my hajat kategori franchise jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'franchise' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_franchise', 'list', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/franchise/my_hajat_franchise_list', $data);
        }

        ///////////////// LAINNYA //////////////////
        //Menampilkan semua ticket COMPLETED pada produk my hajat kategori lainnya jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'lainnya' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_lainnya', 'list', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/franchise/my_hajat_lainnya_list', $data);
        }

        ////////////////////////////// MY IHRAM /////////////////////////////////////////

        //menampilkan status tiket produk Ihram yang telah diapprove oleh admin 1 dan admin 2
        if ($produk == 'myihram' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_ihram', 'list', $this->id_user)->result();
            $this->template->load('template2', 'my_ihram/my_ihram_list', $data);
        }

        ////////////////////////////// MY Safar /////////////////////////////////////////

        //menampilkan status tiket produk Safar yang telah diapprove oleh admin 1 dan admin 2
        if ($produk == 'mysafar' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_safar', 'list', $this->id_user)->result();
            $this->template->load('template2', 'my_safar/my_safar_list', $data);
        }

        ////////////////////////////// Aktivasi Agent /////////////////////////////////////////
        if ($produk == 'aktivasi_agent' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_aktivasi_agent', 'list', $this->id_user)->result();
            $this->template->load('template2', 'aktivasi_agent/aktivasi_agent_list', $data);
        }

        ////////////////////////////// Mitra Kerja sama /////////////////////////////////////////
        if ($produk == 'mitra_kerjasama' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_mitra_kerjasama', 'list', $this->id_user)->result();
            $this->template->load('template2', 'mitra_kerjasama/mitra_kerjasama_list', $data);
        }

        ////////////////////////////// My Faedah /////////////////////////////////////////
        if ($produk == 'myfaedah' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_faedah', 'list ', $this->id_user)->result();
            $this->template->load('template2', 'my_faedah/my_faedah_list', $data);
        }

        ////////////////////////////// My cars /////////////////////////////////////////
        if ($produk == 'mycars' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_cars', 'list ', $this->id_user)->result();
            $this->template->load('template2', 'my_cars/my_cars_list', $data);
        }
    }

    public function detail($produk, $kategori, $id)
    {
        //Menampilkan ticket yang telah COMPLETED pada produk my ta'lim dengan $id tertentu
        if ($produk == 'mytalim' && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_talim', ['id_mytalim' => $id, 'id_approval' => 3])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_talim', 'id_mytalim', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_talim', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_mytalim = tb_my_talim.id_mytalim AND 
                                                                tb_my_talim.id_mytalim = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            $this->template->load('template2', 'my_talim/detail_status_my_talim', $data);
        }

        //Menampilkan ticket yang COMPLETED pada produk my hajat dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'renovasi' && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_hajat_renovasi', ['id_renovasi' => $id])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_hajat_renovasi', 'id_renovasi', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_renovasi', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_renovasi = tb_my_hajat_renovasi.id_renovasi AND 
                                                                tb_my_hajat_renovasi.id_renovasi = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            $this->template->load('template2', 'my_hajat/renovasi/detail_status_my_hajat_renovasi', $data);
        }

        //Menampilkan halaman ticket yang COMPLETED pada produk my hajat kategori sewa dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'sewa' && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_hajat_sewa', ['id_sewa' => $id])->row();
            // $data['data'] = $this->data_m->get_myhajat_by_id('tb_my_hajat_sewa', 'id_sewa', $id);
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_hajat_sewa', 'id_sewa', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_sewa', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_sewa = tb_my_hajat_sewa.id_sewa AND 
                                                                tb_my_hajat_sewa.id_sewa = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            $this->template->load('template2', 'my_hajat/sewa/detail_status_my_hajat_sewa', $data);
        }

        //Menampilkan ticket yang COMPLETED pada produk my hajat kategori wedding dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'wedding' && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_hajat_wedding', ['id_wedding' => $id])->row();
            // $data['data'] = $this->data_m->get_myhajat_by_id('tb_my_hajat_wedding', 'id_wedding', $id);
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_hajat_wedding', 'id_wedding', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_wedding', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_wedding = tb_my_hajat_wedding.id_wedding AND 
                                                                tb_my_hajat_wedding.id_wedding = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            $this->template->load('template2', 'my_hajat/wedding/detail_status_my_hajat_wedding', $data);
        }

        //Menampilkan ticket yang COMPLETED pada produk my hajat kategori franchise dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'franchise' && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_hajat_franchise', ['id_franchise' => $id])->row();
            // $data['data'] = $this->data_m->get_myhajat_by_id('tb_my_hajat_franchise', 'id_franchise', $id);
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_hajat_franchise', 'id_franchise', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_franchise', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_franchise = tb_my_hajat_franchise.id_franchise AND 
                                                                tb_my_hajat_franchise.id_franchise = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            $this->template->load('template2', 'my_hajat/franchise/detail_status_my_hajat_franchise', $data);
        }

        //Menampilkan ticket COMPLETED pada produk my hajat kategori franchise dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'lainnya' && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_hajat_lainnya', ['id_myhajat_lainnya' => $id])->row();
            // $data['data'] = $this->data_m->get_myhajat_by_id('tb_my_hajat_lainnya', 'id_myhajat_lainnya', $id);
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_hajat_lainnya', 'id_myhajat_lainnya', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_lainnya', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_myhajat_lainnya = tb_my_hajat_lainnya.id_myhajat_lainnya AND 
                                                                tb_my_hajat_lainnya.id_myhajat_lainnya = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            $this->template->load('template2', 'my_hajat/lainnya/detail_status_my_hajat_lainnya', $data);
        }

        //Menampilkan ticket apprvoed pada produk Ihram dengan $id tertentu
        if ($produk == 'myihram' && $kategori != NULL && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_ihram', ['id_myihram' => $id, 'id_approval' => 3])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_ihram', 'id_myihram', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_ihram', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_myihram = tb_my_ihram.id_myihram AND 
                                                                tb_my_ihram.id_myihram = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');

            $this->template->load('template2', 'my_ihram/detail_status_my_ihram', $data);
        }
        //Menampilkan ticket apprvoed pada produk safar dengan $id tertentu
        if ($produk == 'mysafar' && $kategori != NULL && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_safar', ['id_mysafar' => $id, 'id_approval' => 3])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_safar', 'id_mysafar', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_safar', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_mysafar = tb_my_safar.id_mysafar AND 
                                                                tb_my_safar.id_mysafar = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            $this->template->load('template2', 'my_safar/detail_status_my_safar', $data);
        }
        if ($produk == 'aktivasi_agent' && $kategori != NULL && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_aktivasi_agent', ['id_agent' => $id, 'id_approval' => 3])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_aktivasi_agent', 'id_agent', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_aktivasi_agent', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_agent = tb_aktivasi_agent.id_agent AND 
                                                                tb_aktivasi_agent.id_agent = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            $this->template->load('template2', 'aktivasi_agent/detail_status_aktivasi_agent', $data);
        }
        if ($produk == 'nst' && $kategori != NULL && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_nst', ['id_nst' => $id, 'id_approval' => 3])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_nst', 'id_nst', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_nst', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_nst = tb_nst.id_nst AND 
                                                                tb_nst.id_nst = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            $this->template->load('template2', 'nst/detail_status_nst', $data);
        }

        // Detail Lead Management 
        if ($produk == 'lead_management' && $kategori != NULL && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_lead_management', ['id_lead' => $id, 'id_approval' => 0])->row();
            $data['data'] = $this->data_m->query("SELECT *, C.nama_cabang as cabang_tujuan, B.nama_cabang as cabang_user, B.id_cabang as id_cabang_user, C.id_cabang as id_cabang_tujuan,
            DATE_FORMAT(date_created, '%d %M %Y %H:%i:%s') AS tanggal_dibuat,
                            DATE_FORMAT(date_approved, '%d %M %Y %H:%i:%s') AS tanggal_disetujui,
                            DATE_FORMAT(date_rejected, '%d %M %Y %H:%i:%s') AS tanggal_ditolak,
                            DATE_FORMAT(date_completed, '%d %M %Y %H:%i:%s') AS tanggal_diselesaikan,
                            DATE_FORMAT(date_modified, '%d %M %Y %H:%i:%s') AS tanggal_diubah                                               
                            FROM tb_lead_management A
                                                INNER JOIN tb_cabang as B ON B.id_cabang = A.id_cabang
                                                INNER JOIN tb_ticket as D ON D.id_lead = A.id_lead
                                                LEFT JOIN tb_cabang as C ON A.cabang_tujuan = C.id_cabang
                                                WHERE A.id_lead = $id
            ")->row();

            $data['cabang_tujuan'] = $this->data_m->get('tb_cabang');

            $data['komentar'] = $this->comment_m->get_comment('tb_lead_management', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_lead = tb_lead_management.id_lead AND 
                                                                tb_lead_management.id_lead = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');

            $this->template->load('template2', 'lead_management/detail_status_lead_management', $data);
        }

        if ($produk == 'mitra_kerjasama' && $kategori != NULL && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_mitra_kerjasama', ['id_mitra_kerjasama' => $id, 'id_approval' => 0])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_mitra_kerjasama', 'id_mitra_kerjasama', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_mitra_kerjasama', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_mitra_kerjasama = tb_mitra_kerjasama.id_mitra_kerjasama AND 
                                                                tb_mitra_kerjasama.id_mitra_kerjasama = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            $this->template->load('template2', 'mitra_kerjasama/detail_status_mitra_kerjasama', $data);
        }
        if ($produk == 'myfaedah' && $kategori != NULL && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_faedah', ['id_myfaedah' => $id, 'id_approval' => 0])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_faedah', 'id_myfaedah', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_faedah', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_myfaedah = tb_my_faedah.id_myfaedah AND 
                                                                tb_my_faedah.id_myfaedah = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            $this->template->load('template2', 'my_faedah/detail_status_my_faedah', $data);
        }
        if ($produk == 'mycars' && $kategori != NULL && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_cars', ['id_mycars' => $id, 'id_approval' => 0])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_cars', 'id_mycars', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_cars', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_mycars = tb_my_cars.id_mycars AND 
                                                                tb_my_cars.id_mycars = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            $this->template->load('template2', 'my_cars/detail_status_my_cars', $data);
        }
    }
}
