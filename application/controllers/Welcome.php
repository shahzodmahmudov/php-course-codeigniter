<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->data['title'] = "Главная страница";
        $this->data['cur_page'] = "home";
    }

    public function index()
    {
        $this->load->view('header_page', $this->data);
        $this->load->view('welcome_page');
        $this->load->view('footer_page');
    }
}
