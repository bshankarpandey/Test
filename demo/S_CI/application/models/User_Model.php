<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User_Model extends CI_Model{

    public function __Construct(){
    	
    	parent::__Construct();
    }

    public function login($username, $password){

    	     $this->db->select('*');
           $this->db->from('login');
           $this->db->where('username' , $username);
           $this->db->where('password' , md5($password));
              $query = $this->db->get();
                  if($query->num_rows()==1){
                    return $query->result_array();
        
                  }
                  else{
                   return FALSE;
                  }
    	

    }



}
