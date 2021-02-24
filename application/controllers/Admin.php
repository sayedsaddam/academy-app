<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
 * Filename: Admin_model.php
 * File path: model / admin_model.php
 * Author: Saddam
 */
class Admin extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');        
    }
    public function index(){
        $this->load->view('login');
    }
    // Admin Login
    public function admin_login(){
        $response = array('msg' => 'Interal Server Error', 'status_code' => 500);
        $username = $this->input->post('username');
        $password = sha1($this->input->post('password'));
        $valid_login = $this->admin_model->login($username, $password);
        if($valid_login > '0'){
            $username = $valid_login->username;
            $id = $valid_login->id;
            $fullname = $valid_login->fullname;
            $this->session->set_userdata(array('id' => $id, 'username' => $username, 'fullname' => $fullname));
            header('Content-Type: application/json');
            $array = ['username'=>$this->session->userdata('username'), 'fullname'=> $this->session->userdata('fullname')];
            echo json_encode($array);
        }else{
            $this->session->set_flashdata('failed', 'Username or password might not be correct. Try again!');
            redirect('admin');
        }
    }
    // Sign up 
    public function signup(){
        $response = array('msg' => 'Internal Server Error.', 'status_code' => 500);
        $data = array(
            'fullname' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => sha1($this->input->post('password')),
            'location' => $this->input->post('location'),
            'cnic' => $this->input->post('cnic')
        );
        $return = $this->admin_model->signup($data);
        // $data = json_decode(file_get_contents('php://input'), true);
        if($return == TRUE){
            $response['msg'] = 'Sign up was successful.';
            $response['status_code'] = 200;
        }
        echo json_encode($response);
    }
    // List users
    public function list_users(){
        $users = $this->admin_model->get_users();
        echo json_encode($users);
    }
    // Register for a course.
    public function add_course(){
        $response = array('msg' => 'Internal Server Error.', 'status_code' => 500);
        $data = array(
            'course_name' => $this->input->post('course_name'),
            'link' => $this->input->post('link'),
            'duration' => $this->input->post('duration'),
            'author' => $this->input->post('author'),
            'category' => $this->input->post('category'),
            'added_by' => $this->session->userdata('id')
        );
        $return = $this->admin_model->add_course($data);
        if($return == TRUE){
            $response['msg'] = "Course was added successfully.";
            $response['status_code'] = 200;
        }
        echo json_encode($response);
    }
    // List courses
    public function list_courses(){
        $courses = $this->admin_model->get_courses();
        echo json_encode($courses);
    }
    // Add categories
    public function add_category(){
        $response = array('msg' => 'Internal Server Error.', 'status_code' => 500);
        $data = array(
            'cat_name' => $this->input->post('cat_name')
        );
        $return = $this->admin_model->add_category($data);
        if($return == true){
            $response['msg'] = 'Category was added successfully.';
            $response['status_code'] = 200;
        }
        echo json_encode($response);
    }
    // List categories
    public function list_categories(){
        $categories = $this->admin_model->get_categories();
        echo json_encode($categories);
    }
}
