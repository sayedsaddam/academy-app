<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
 * Filename: Admin_model.php
 * File path: model / admin_model.php
 * Author: Saddam
 */
class Admin_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    // Sign up - Insert data.
    public function signup($data){
        $this->db->insert('admin', $data);
        if($this->db->affected_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    // Admin Login
    public function login($username, $password){
        $this->db->select('id, fullname, username, password');
        $this->db->from('admin');
        $this->db->where(array('username' => $username, 'password' => $password));
        return $this->db->get()->row();
    }
    // Get all users
    public function get_users(){
        $this->db->select('user_id, fullname, email, username, location, cnic, created_at');
        $this->db->from('users');
        return $this->db->get()->result();
    }
    // Register for course
    public function add_course($data){
        $this->db->insert('courses', $data);
        if($this->db->affected_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    // Get courses
    public function get_courses(){
        $this->db->select('courses.course_id,
                            courses.course_name,
                            courses.link,
                            courses.duration,
                            courses.author,
                            courses.category,
                            courses.added_by,
                            courses.created_at,
                            admin.id,
                            admin.fullname');
        $this->db->from('courses');
        $this->db->join('admin', 'courses.added_by = admin.id', 'left');
        return $this->db->get()->result();
    }
    // Add Category
    public function add_category($data){
        $this->db->insert('categories', $data);
        if($this->db->affected_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    // List categories
    public function get_categories(){
        $this->db->select('cat_id, cat_name, created_at');
        $this->db->from('categories');
        return $this->db->get()->result();
    }
}
