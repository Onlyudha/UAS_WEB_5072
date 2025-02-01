<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {


    public function login($username, $password) {

        $this->db->where('username', $username);
        $query = $this->db->get('user');
        $user = $query->row();


        if ($user && $user->password == $password) {
            return $user;
        } else {
            return false; 
        }
    }


}
