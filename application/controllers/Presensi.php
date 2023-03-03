<?php
class Presensi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Presensi_model');
    }

    public function index() {
        // Mengambil data presensi dari model
        $data['presensi'] = $this->Presensi_model->get_presensi();
        // Memuat view presensi dan mengirim data presensi ke dalamnya
        $this->load->view('presensi', $data);
    }

    public function nis($nis) {
        $data['presensi'] = $this->Presensi_model->get_presensi_by_nis($nis);
        $this->load->view('presensi', $data);
    }

    public function edit($id) {
        $data['presensi'] = $this->Presensi_model->get_presensi_by_id($id);
        $this->load->view('presensi/edit', $data);
    }
}
