<?php
class Data_json extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_m');

        date_default_timezone_set('Asia/Jakarta');
    }

    public function get_lead_management()
    {
        $data = $this->data_m->get('tb_lead_management');
        echo json_encode($data->result());
    }

    public function test()
    {
        $end_date =  "2019-08-14 13:10:10";
        $now = date('Y-m-d H:i:s');

        $diff = strtotime($now) - strtotime($end_date);
        $fullDays    = floor($diff / (60 * 60 * 24));
        $fullHours   = floor(($diff - ($fullDays * 60 * 60 * 24)) / (60 * 60));
        $fullMinutes = floor(($diff - ($fullDays * 60 * 60 * 24) - ($fullHours * 60 * 60)) / 60);
        if ($fullDays == 0 && $fullHours == 0 && $fullMinutes == 0) {
            echo "Baru Saja.";
        } else if ($fullDays == 0 && $fullHours == 0) {
            echo "Difference is $fullMinutes minutes.";
        } else if ($fullDays == 0) {
            echo "Difference is $fullHours hours, $fullMinutes minutes .";
        } else if ($fullDays == 1) {
            echo "Difference is $fullDays days, $fullHours hours.";
        } else {
            echo "Difference is $fullDays days.";
        }
    }
}
