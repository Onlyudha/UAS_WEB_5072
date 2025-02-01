<?php
class Admin_model extends CI_Model {

    // Get all mahasiswa
    public function get_mahasiswa() {
        $this->db->select('mahasiswa.*, kelas.nama_kelas');
        $this->db->from('mahasiswa');
        $this->db->join('kelas', 'mahasiswa.id_kelas = kelas.id_kelas');
        return $this->db->get()->result_array();
    }

    // Get all kelas
    public function get_kelas() {
        return $this->db->get('kelas')->result_array();
    }

    // Insert mahasiswa
    public function insert_mahasiswa($data) {
        $this->db->insert('mahasiswa', $data);
    }

    // Update mahasiswa
    public function update_mahasiswa($id, $data) {
        $this->db->where('id_mahasiswa', $id);
        $this->db->update('mahasiswa', $data);
    }

    // Delete mahasiswa
    public function delete_mahasiswa($id) {
        $this->db->delete('mahasiswa', ['id_mahasiswa' => $id]);
    }

    public function get_dosen() {
        return $this->db->get('dosen')->result_array();
    }
    
    public function insert_dosen($data) {
        return $this->db->insert('dosen', $data);
    }
    
    public function update_dosen($id, $data) {
        $this->db->where('id_dosen', $id);
        return $this->db->update('dosen', $data);
    }
    
    public function delete_dosen($id) {
        $this->db->where('id_dosen', $id);
        return $this->db->delete('dosen');
    }
    
}
