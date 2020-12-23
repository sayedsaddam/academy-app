<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
 * Filename: Home_model.php
 * File path: models / home_model.php
 * Author: Saddam
 */
class Home_model extends CI_Model{
    function __construct()
    {
        parent::__construct();        
    }
    // User sign up - Insert data.
    public function signup($data){
        $this->db->insert('users', $data);
        if($this->db->affected_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    // User login.
    public function login($username, $password){
        $this->db->select('user_id, fullname, username, password');
        $this->db->from('users');
        $this->db->where(array('username' => $username, 'password' => $password));
        return $this->db->get()->row();
    }
}
