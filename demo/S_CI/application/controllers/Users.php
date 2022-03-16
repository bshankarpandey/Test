<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Users extends CI_Controller{
	function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_Model');
        $this->lang->load('message' , 'english');
    }  

    public function index(){
    	 $this->load->view('User_login');
    }
 
	public function login(){
            
			      $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'required|min_length[5]');
              if ($this->form_validation->run() == FALSE) {
            	 $this->load->view('User_login'); 
            	
              } 
             else{
                    // print_r($this->input->post()); exit;

                	if($this->input->post('login') ){

                        $username = $this->input->post('username');
                        $password = $this->input->post('password');
                		    $result   = $this->User_Model->login($username, $password);
                         
                       if($result){
                          $session = array(
                            'username'  => $username
                            
                            );
                          $this->session->set_userdata($session);
                          // $this->load->view('show_products');
                           redirect('Product/ShowProduct');
                	    }
                	     else{
                        $this->session->set_flashdata('error_msg', '<div class="alert alert-danger text-center">Invalid Username And Password!</div>');
                          redirect(uri_string().'?'.(empty($_SERVER['REDIRECT_QUERY_STRING']) == false ? $_SERVER['REDIRECT_QUERY_STRING'] : $_SERVER['QUERY_STRING']), 'Refresh');  
                         }       
                

        		    }else{
                        $this->session->set_flashdata('err_msg', '<div class="alert alert-danger text-center">Error in log in!</div>');
                         redirect(uri_string().'?'.(empty($_SERVER['REDIRECT_QUERY_STRING']) == false ? $_SERVER['REDIRECT_QUERY_STRING'] : $_SERVER['QUERY_STRING']), 'Refresh'); 
                    }

            }

		
	}

  function SwitchLanguage($language = "") {

        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $language);
        // echo "hiiii";exit;
        redirect($_SERVER['HTTP_REFERER']);

  }
  
   public function logout(){
      $this->session->unset_userdata('username');
      redirect('Users/login');
   }

}