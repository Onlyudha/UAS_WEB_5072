<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {

    public function get_mahasiswa() {
        $this->db->select('mahasiswa.*, kelas.nama_kelas');
        $this->db->from('mahasiswa');
        $this->db->join('kelas', 'mahasiswa.id_kelas = kelas.id_kelas', 'left');
        return $this->db->get()->result_array();
    }

    public function get_nilai() {
        $this->db->select('
            mahasiswa.id_mahasiswa,
            mahasiswa.nama AS nama_mahasiswa,
            mahasiswa.nim AS NIM,
            kelas.nama_kelas AS kelas,
            nilai_mahasiswa.id_nilai,
            nilai_mahasiswa.tugas AS nilai_tugas,
            nilai_mahasiswa.responsi AS nilai_responsi,
            nilai_mahasiswa.uts AS nilai_uts,
            nilai_mahasiswa.uas AS nilai_uas
        ');
        $this->db->from('mahasiswa');
        $this->db->join('kelas', 'mahasiswa.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('nilai_mahasiswa', 'mahasiswa.id_mahasiswa = nilai_mahasiswa.id_mahasiswa', 'left');
        return $this->db->get()->result_array();
    }
    

    public function get_total_mahasiswa() {
        return $this->db->count_all('mahasiswa');
    }

    public function get_total_kelas() {
        return $this->db->count_all('kelas');
    }

    public function get_rata_rata_nilai() {
        $this->db->select('AVG((tugas + responsi + uts + uas)/4) AS avg_nilai', FALSE);
        $result = $this->db->get('nilai_mahasiswa')->row();
        return $result ? round($result->avg_nilai, 2) : 0;
    }

    public function get_mahasiswa_by_nim($nim) {
        $this->db->select('id_mahasiswa, nama, nim, id_kelas');
        $this->db->from('mahasiswa');
        $this->db->where('nim', $nim);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function insert_nilai($data) {
        $this->db->insert('nilai_mahasiswa', $data);
    }

    public function update_nilai($id, $data) {
    $this->db->where('id_nilai', $id);
    $this->db->update('nilai_mahasiswa', $data);
}

    public function delete_nilai($id) {
        $this->db->where('id_nilai', $id);
        $this->db->delete('nilai_mahasiswa');
    }
}
