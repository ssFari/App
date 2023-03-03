<?php

class Siswa_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_siswa() {
        $query = $this->db->get('siswa');
        return $query->result();
    }

    public function insert_siswa($data)
    {
        $this->db->insert('siswa', $data);
    }

}
