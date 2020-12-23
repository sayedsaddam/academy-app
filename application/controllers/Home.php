<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
 * Filename: Home.php
 * File path: controllers / Home.php
 * Author: Saddam
 */
class Home extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
    }
    public function index(){
        $this->load->view('login');
    }
    // User login.
    public function login(){
        $username = $this->input->post('username'); 
        $password = sha1($this->input->post('password'));
        $valid_login = $this->home_model->login($username, $password);
        if($valid_login > '0'){
            $username = $valid_login->username;
            $user_id = $valid_login->user_id;
            $fullname = $valid_login->fullname;
            $this->session->set_userdata(array('id' => $user_id, 'username' => $username, 'fullname' => $fullname));
            echo "Hello: ".$this->session->userdata('fullname');
        }else{
            $this->session->set_flashdata('failed', 'The table has no data in it. Try inserting data into it.');
            redirect('home');
        }
    }
}
