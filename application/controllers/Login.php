<?php

class Login extends CI_Controller {

    public function index()
	{
        // echo "hi";
		
		$this->load->view('login-page',['title'=>'']);
	}
	public function collectData(){
		// echo "<pre>"; print_r($_POST); die;
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email' , 'Email','required|valid_email');
		$this->form_validation->set_rules('password' , 'Password', 'required');
		if($this->form_validation->run()){
			// echo "hi";
			// // return redirect 'login-page';
			
			//for catching the email and password coming from the form
			$email_var = $this->input->post('email');
			$pass_var = $this->input->post('password');

			$this->load->model('ModelLogin');
			
			// sending data to model
			$this->ModelLogin->modelFunction($email_var,md5($pass_var));

			// $login_details = 


		}
		else{
				$this->load->view('login-page',['title'=>'']);
		}
	}
	public function revertToRegistration(){
		$this->load->view('registration-login');
	}
	
}
?>