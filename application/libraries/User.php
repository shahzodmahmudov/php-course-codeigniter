<?php
class User{
        private $id;
        private $firstName;
        private $lastName;
        private $address;
        private $phoneNumber;

        public function setID($id){
            $this->id = $id;
        }
        public function getID(){
            return $this->id;
        }

        public function setFirstName($value){
            $this->firstName = $value;
        }
        public function getFirstName(){
            return $this->firstName;
        }

        public function setLastName($value){
            $this->lastName = $value;
        }
        public function getLastName(){
            return $this->lastName;
        }

        public function setAddress($value){
            $this->address = $value;
        }
        public function getAddress(){
            return $this->address;
        }

        public function setPhoneNumber($value){
            $this->phoneNumber = $value;
        }
        public function getPhoneNumber(){
            return $this->phoneNumber;
        }
}
?>
