<?php
    class ModelRegistration extends CI_model{
        public function putInDB_Registration($data){
            // echo "";
            $this->db->insert('user' , $data);
            return true;
        }

    }
?>