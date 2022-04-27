<?php
class registration_controller extends CI_Controller{

    public function collectRegistration(){
        // $this->load->view('login-page');
        // echo "hi";

        //loading library
        $this->load->library('form_validation');
        // required email
        $this->form_validation->set_rules('email' , 'Email' , 'required');
        // required password
        $this->form_validation->set_rules('password' , 'Password', 'required');
        //re-password
        $this->form_validation->set_rules('telephone' , 'Telephone', 'required');
        //for validating first name
        $this->form_validation->set_rules('firstname' , 'Firstname', 'required');
        // for validating second name
        $this->form_validation->set_rules('lastname' , 'Lastname' , 'required');
        //gender validation
        $this->form_validation->set_rules('gender' , 'Gender' , 'required');
        

        
        //variable catching
        $data['password'] = md5($this->input->post('password'));
        $data['email'] = $this->input->post('email');
        $data['firstname'] = $this->input->post('firstname');
        $data['lastname'] = $this->input->post('lastname');
        $data['gender'] = $this->input->post('gender');
        $data['mobile'] = $this->input->post('telephone');


        //validation
        if($this->form_validation->run()){
            // echo "Hi";
        
            // echo $password;
            // echo $email;
            // echo $firstname;
            // echo $lastname;
            // echo $gender;
            // echo $phone;

            $this->load->database();
            // loading model
            
			$this->load->model('modelRegistration');
			
			// sending data to model
			$response = $this->modelRegistration->putInDB_Registration($data);
            if($response){
                echo "Record Saved";
            }
            else{
                echo "Insertion error";
            }
        }
        else{
			$this->load->view('registration-login');
        }




    }
}

?>