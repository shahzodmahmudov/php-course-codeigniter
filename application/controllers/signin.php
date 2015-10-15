<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('signin_model');
    }

    public function index()
    {
        $this->load->view('signin_page');
    }

    public function login()
    {
        $login = $_POST['username'];
        $password = $_POST['password'];
        if ($this->signin_model->checkUsernameAndPassword($login, $password)) {
            $data['status'] = "Success";
            $data['message'] = "Welcome, " . $login;
        } else {
            $data['status'] = "Failed";
            $data['message'] = "Access denied";
        }
        $this->load->view('signin_page', $data);
    }

    public function logout()
    {
        die("Kor tamom");
    }

}
