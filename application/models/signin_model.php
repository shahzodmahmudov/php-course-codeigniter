<?php
class signin_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function checkUsernameAndPassword($login, $password){
        if ($login=="ahmad" && $password=="1"){
            return true;
        }else{
            return false;
        }
    }
}
?>
