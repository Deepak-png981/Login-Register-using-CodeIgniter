<?php

    class ModelLogin extends CI_model{

        public function modelFunction($email , $password){
            // echo $email ;
            // echo $password;
            $qre=$this->db->where(['email'=>$email , ' password'=>$password])
                        ->get('user');
                        if($qre->num_rows()){
                            // echo "Login successfully";
                            // $title="login-successfully";
                            $data = array(
                                'title' => 'Login-Successfully',
                                // 'heading' => 'Heading',
                                // 'message' => ' Message'
                            );
                            $this->load->view('login-status', $data);
                            // $this->load->view('login-successfully');
                        }else {
                            $data = array(
                                'title' => 'Login-Unsuccessfull'
                            );
                            $this->load->view('login-page' , $data);
                        }



        }

    }


?>
