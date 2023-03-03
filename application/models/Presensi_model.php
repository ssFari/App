<?php
class Presensi_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_presensi() {
        // Mengambil data presensi dari database
        $this->db->select('*');
        $this->db->from('presensi');
        $query = $this->db->get();
        return $query->result();
    }


    public function get_presensi_by_nis($nis) {
        // Mengambil data presensi berdasarkan NIS siswa
        $this->db->select('*');
        $this->db->from('presensi');
        $this->db->where('nis', $nis);
        $query = $this->db->get();

        // Mengembalikan data presensi dalam bentuk array of object
        return $query->result();
    }

    public function get_presensi_by_id($id) {
        $this->db->where('id_presensi', $id);
        $query = $this->db->get('presensi');
        return $query->row();
    }
}
