<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Abonent extends CI_Controller {
    private $data;

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("AbonentModel");
    }

	public function newAbonent(){
        $this->data['title'] = "Новый абонент";
        $this->data['cur_page'] = "createnew";
		$this->load->view('header_page', $this->data);
		$this->load->view('abonent_page');
		$this->load->view('footer_page');
	}

	public function listAbonent(){
        $this->data['title'] = "Список абонентов";
        $this->data['cur_page'] = "phonelisting";
		$this->load->view('header_page', $this->data);

        $data['result'] = $this->AbonentModel->getListOfAbonents();

		$this->load->view('abonent_page',$data);
		$this->load->view('footer_page');
	}

    public function save(){
        try{
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $form_rules = array(
                array(
                      'field'   => 'first_name',
                      'label'   => 'Имя',
                      'rules'   => 'required|min_length[4]|max_length[100]'
                ),
                array(
                      'field'   => 'last_name',
                      'label'   => 'Фамилия',
                      'rules'   => 'required|min_length[4]|max_length[100]'
                ),
                array(
                      'field'   => 'address',
                      'label'   => 'Адрес',
                      'rules'   => 'required|min_length[4]|max_length[100]'
                ),
                array(
                      'field'   => 'phone_number',
                      'label'   => 'Номер телефона',
                      'rules'   => 'required|numeric'
                )
            );
            $this->form_validation->set_rules($form_rules);
            if ($this->form_validation->run() == FALSE){
                $this->load->view('header_page', $this->data);
        		$this->load->view('abonent_page');
        		$this->load->view('footer_page');
            }else{
                $arr = array(
                    'first_name' => $this->input->post('first_name'), //$_POST['firstname'];
                    'last_name' => $this->input->post('last_name'),
                    'address' => $this->input->post("address"),
                    'phone_number' => $this->input->post("phone_number")
                );
                $this->AbonentModel->save($arr);
                $this->session->set_userdata('status', "Новый абонент был успешно добавлен в базу!");
                redirect('/abonent/newAbonent');
            }
        }catch (Exception $e) {
            $this->session->set_userdata('error', $e->getMessage());
            redirect('/abonent/newAbonent');
        }
    }
}
