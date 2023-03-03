<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

var_dump(class_exists('PhpOffice\PhpSpreadsheet\IOFactory')); class Siswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Siswa_model');
    }    

    public function index() {
        $data['siswa'] = $this->Siswa_model->get_siswa();
        $this->load->view('siswa/index', $data);
    }
    public function insert_csv_data()
    {
        // Cek apakah file sudah diupload
        if(isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] == 0) {
            $file = $_FILES['csv_file']['tmp_name'];

            // Load file CSV menggunakan PHP Spreadsheet
            $reader = IOFactory::createReader('Csv');
            $reader->setDelimiter(',');
            $spreadsheet = $reader->load($file);
            $worksheet = $spreadsheet->getActiveSheet();

            // Looping baris pada file CSV
            foreach ($worksheet->getRowIterator() as $row) {
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE);

                // Ambil data dari setiap sel pada baris
                $data = [];
                foreach ($cellIterator as $cell) {
                    $data[] = $cell->getValue();
                }

                // Lakukan operasi INSERT ke database melalui model
                $this->Siswa_model->insert_siswa([
                    'nis' => $data[0],
                    'nama_lengkap' => $data[1],
                    'alamat' => $data[2],
                    'telpon' => $data[3],
                    'tgl_lahir' => $data[4],
                    'jenis_kelamin' => $data[5],
                    'nama_kelas' => $data[6],
                ]);
            }

            echo 'Data berhasil diinsert ke database';
        } else {
            echo 'Silahkan upload file CSV terlebih dahulu';
        }
    }
}
