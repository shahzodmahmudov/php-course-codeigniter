<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Abonent extends CI_Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('User');
        $this->load->model("AbonentModel");
        $this->data['title'] = "Список абонентов";
        $this->data['cur_page'] = "abonent";
    }

    public function newAbonent()
    {
        $this->data['operation'] = "new";
        $this->data['title'] = "Новый абонент";
        $this->load->view('header_page', $this->data);
        $this->load->view('abonent_page');
        $this->load->view('footer_page');
    }

    public function index()
    {
        try {
            $this->load->view('header_page', $this->data);

            $data['UserObj'] = $this->AbonentModel->getListOfAbonents();

            $this->load->view('abonent_page', $data);
            $this->load->view('footer_page');
        } catch (Exception $e) {
            $this->session->set_userdata('error', $e->getMessage());
            redirect('/abonent/');
        }
    }

    public function remove()
    {
        try {
            if (isset($_GET['user_id'])) {
                $user_id = $_GET['user_id'];
                $this->AbonentModel->deleteAbonent($user_id);
                $this->session->set_userdata('status', "Абонент был успешно удален из базы!");
                redirect('/abonent');
            } else {
                throw new Exception("user_id is not set");
            }
        } catch (Exception $e) {
            $this->session->set_userdata('error', $e->getMessage());
            redirect('/abonent');
        }

    }

    public function edit()
    {
        try {
            if (isset($_GET['user_id'])) {
                $user_id = $_GET['user_id'];
                $data['UserObj'] = $this->AbonentModel->getAbonentByID($user_id);
                $this->data['title'] = "Редактирование абонента";
                $this->data['operation'] = "edit";
                $this->load->view('header_page', $this->data);
                $this->load->view('abonent_page', $data);
                $this->load->view('footer_page');
            } else {
                throw new Exception("user_id is not set");
            }
        } catch (Exception $e) {
            $this->session->set_userdata('error', $e->getMessage());
            redirect('/abonent');
        }

    }

    public function save()
    {
        try {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $form_rules = array(
                array(
                    'field' => 'first_name',
                    'label' => 'Имя',
                    'rules' => 'required|min_length[4]|max_length[100]'
                ),
                array(
                    'field' => 'last_name',
                    'label' => 'Фамилия',
                    'rules' => 'required|min_length[4]|max_length[100]'
                ),
                array(
                    'field' => 'address',
                    'label' => 'Адрес',
                    'rules' => 'required|min_length[4]|max_length[100]'
                ),
                array(
                    'field' => 'phone_number',
                    'label' => 'Номер телефона',
                    'rules' => 'required|numeric'
                )
            );
            $this->form_validation->set_rules($form_rules);
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('header_page', $this->data);
                $this->load->view('abonent_page');
                $this->load->view('footer_page');
            } else {
                $arr = array(
                    'first_name'   => $this->input->post('first_name'), //$_POST['firstname'];
                    'last_name'    => $this->input->post('last_name'),
                    'address'      => $this->input->post("address"),
                    'phone_number' => $this->input->post("phone_number")
                );
                $this->AbonentModel->save($arr);
                $this->session->set_userdata('status', "Новый абонент был успешно добавлен в базу!");
                redirect('/abonent/newAbonent');
            }
        } catch (Exception $e) {
            $this->session->set_userdata('error', $e->getMessage());
            redirect('/abonent/newAbonent');
        }
    }

    public function update()
    {
        try {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $form_rules = array(
                array(
                    'field' => 'user_id',
                    'label' => 'User_ID',
                    'rules' => 'required'
                ), array(
                    'field' => 'first_name',
                    'label' => 'Имя',
                    'rules' => 'required|min_length[4]|max_length[100]'
                ),
                array(
                    'field' => 'last_name',
                    'label' => 'Фамилия',
                    'rules' => 'required|min_length[4]|max_length[100]'
                ),
                array(
                    'field' => 'address',
                    'label' => 'Адрес',
                    'rules' => 'required|min_length[4]|max_length[100]'
                ),
                array(
                    'field' => 'phone_number',
                    'label' => 'Номер телефона',
                    'rules' => 'required|numeric'
                )
            );
            $this->form_validation->set_rules($form_rules);
            if ($this->form_validation->run() == FALSE) {
                $user_id = $this->input->post("user_id");
                $data['UserObj'] = $this->AbonentModel->getAbonentByID($user_id);
                $this->data['title'] = "Редактирование абонента";
                $this->data['operation'] = "edit";
                $this->load->view('header_page', $this->data);
                $this->load->view('abonent_page', $data);
                $this->load->view('footer_page');
            } else {
                $arr = array(
                    'user_id'      => $this->input->post("user_id"),
                    'first_name'   => $this->input->post('first_name'), //$_POST['firstname'];
                    'last_name'    => $this->input->post('last_name'),
                    'address'      => $this->input->post("address"),
                    'phone_number' => $this->input->post("phone_number")
                );
                $this->AbonentModel->update($arr);
                $this->session->set_userdata('status', "Данные абонента былы успешно обновлены в базе!");
                redirect('/abonent');
            }
        } catch (Exception $e) {
            $this->session->set_userdata('error', $e->getMessage());
            redirect('/abonent');
        }
    }
}
