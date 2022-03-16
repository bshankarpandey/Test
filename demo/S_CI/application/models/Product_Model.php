<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Product_Model extends CI_Model{

    public function __Construct(){
        parent::__Construct();
    }



    public function SelectCategory(){
   	    $query = $this->db->query("SELECT * FROM category");
		    $results = $query->result_array();
        return $results;
    }

    public function SelectProduct($cate_id){
    	 $query = $this->db->query("SELECT * FROM products WHERE cate_id = '$cate_id'");
    	 $results = $query->result_array();
    	 return $results;
    }

    public function Get_Product(){
          $query = $this->db->query("SELECT `category`.`cate_name`,`products`.`product_name`,`all_products`.`id`,`all_products`.`quantity`,`all_products`.`price`, `all_products`.`image`,`all_products`.`product_details`,`all_products`.`status` FROM `category`,`products`,`all_products`  WHERE `category`.`id` = `all_products`.`cate_id` AND `all_products`.`product_id` = `products`.`id`");
            $result = $query->result_array();
           return $result;

    }

    public function DeleteProduct($id){
    	 $result =$this->db->query("DELETE FROM all_products WHERE id = '$id'");
    	 
    	if($result){
    		return TRUE;
    	}
    	else{
    		return FALSE;
    	}

    }

    public function EditProduct($id){
    	
    	 $query =  $this->db->query("SELECT * FROM all_products WHERE id = $id");
    	 $result = $query->result_array();

          $c_name = $result[0]['cate_id'];
     
            if($c_name)
            {
         	      $query1 = $this->db->query("SELECT cate_name FROM category WHERE id = $c_name");
                $result1 = $query1->result_array();
            }

              $p_name = $result[0]['product_id'];

            if($p_name)
            {
               $query2 = $this->db->query("SELECT product_name FROM products WHERE id = $p_name");
     
               $result2 = $query2->result_array();
           
            }

             $f_result = array_merge($result, $result1, $result2);

    	       $result1 = $query1->result_array();
    	       return $f_result;
    }

  

    public function Edit_Data($id){

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 10000;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;
            $this->load->library('upload', $config);

            if( $this->upload->do_upload('image')){
    	             $category        = $this->input->post('category');
                   $product         = $this->input->post('product');
                   $quantity        = $this->input->post('quantity');
                   $price           = $this->input->post('price');
                   $image           = $_FILES['image']['name'];
                   $product_details = $this->input->post('productdetails');
            }       
    	        $query = $this->db->query("UPDATE `all_products` SET `cate_id`='$category',`product_id`='$product',`quantity` = '$quantity', `price` ='$price',`image`='$image',`product_details`='$product_details' WHERE `id` = '$id'");
    	
    	          if($query){
    	            	return TURE;

               	}
    	          else{
    		            return FALSE;
    	          }
    	
    }





} 
 