<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AbonentModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getListOfAbonents()
    {
        try {
            $sql = "select * from users t1, phonenumbers t2 where t1.user_id=t2.user_id";
            $query = $this->db->query($sql);
            $arr = array();
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row) {
                    $UserObj = new User();
                    $UserObj->setID($row['user_id']);
                    $UserObj->setFirstName($row['first_name']);
                    $UserObj->setLastName($row['last_name']);
                    $UserObj->setAddress($row['address']);
                    $UserObj->setPhoneNumber($row['phonenumber']);
                    $arr[] = $UserObj;
                    unset($UserObj);
                }
            }
            return $arr;
        } catch (Exception $e) {
            throw new Exception ($e->getMessage());
        }
    }

    public function getAbonentByID($user_id)
    {
        try {
            $sql = "select * from users t1, phonenumbers t2 where t1.user_id=t2.user_id and t1.user_id=?";
            $query = $this->db->query($sql, array($user_id));
            $UserObj = new User();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $UserObj->setID($row['user_id']);
                $UserObj->setFirstName($row['first_name']);
                $UserObj->setLastName($row['last_name']);
                $UserObj->setAddress($row['address']);
                $UserObj->setPhoneNumber($row['phonenumber']);
            }
            return $UserObj;
        } catch (Exception $e) {
            throw new Exception ($e->getMessage());
        }
    }

    public function save($arr)
    {
        try {
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
        } catch (Exception $e) {
            throw new Exception ($e->getMessage());
        }
    }

    public function update($arr)
    {
        try {
            $this->db->trans_start(); //запускаем транзакцию
            //saving to db
            $data = array(
                "first_name" => $arr['first_name'],
                "last_name" => $arr['last_name'],
                "address" => $arr['address']
            );
            $this->db->where('user_id', $arr['user_id']);
            $this->db->update("users", $data);

            $data = array(
                "phonenumber" => $arr['phone_number']
            );
            $this->db->where('user_id', $arr['user_id']);
            $this->db->update("phonenumbers", $data);

            $this->db->trans_complete(); //закрываем транзакцию
            return 1;
        } catch (Exception $e) {
            throw new Exception ($e->getMessage());
        }
    }

    public function deleteAbonent($user_id)
    {
        try {
            $this->db->trans_start(); //запускаем транзакцию

            $sql ="delete from users where user_id=?";
            $this->db->query($sql, array($user_id));

            $sql ="delete from phonenumbers where user_id=?";
            $this->db->query($sql, array($user_id));

            $this->db->trans_complete(); //закрываем транзакцию
            return 1;
        } catch (Exception $e) {
            throw new Exception ($e->getMessage());
        }
    }

}
