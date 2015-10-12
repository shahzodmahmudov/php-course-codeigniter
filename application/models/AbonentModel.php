<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AbonentModel extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function getListOfAbonents(){
            return array(1,2,3);
    }

    public function save($arr){
        try{
            $this->db->trans_start(); //запускаем транзакцию
            //saving to db
            $data = array(
                "first_name" => $arr['first_name'],
                "last_name" => $arr['last_name'],
                "address" => $arr['address']
            );
            $this->db->insert("users", $data);

            /*$sql = "Insert into users(first_name, last_name, address) values(?,?,?)";
            $this->db->query($sql, array(
                $arr['first_name'],
                $arr['last_name'],
                $arr['address']));*/

            $user_id = $this->db->insert_id();
            $data = array(
                "user_id" => $user_id,
                "phonenumber" => $arr['phone_number']
            );
            $this->db->insert("phonenumbers", $data);

            $this->db->trans_complete(); //закрываем транзакцию
            return 1;
        }catch(Exception $e){
            throw new Exception ($e->getMessage());
        }
    }

}
