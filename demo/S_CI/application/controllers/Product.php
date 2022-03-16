<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Product extends CI_Controller{
	function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Product_Model');   
    }
    function ShowProduct(){
        $result['datas'] = $this->Product_Model->Get_Product();
        $this->load->view('show_products', $result);
        // print_r($result);
    }
    public function Get_product(){

        $cate_id = $this->input->post('cate_id');
        $prod['cate_id'] = $this->Product_Model->SelectProduct($cate_id);
            foreach ($prod['cate_id'] as $value){ ?>
            <option value="<?php echo $value['id'];?>"><?php echo $value['product_name'];?></option>
          <?php }

    }
    
    public function Add_Category(){
         
        $cate['cate_name'] = $this->Product_Model->SelectCategory();
         
             $this->form_validation->set_rules('category','Category','required');
             $this->form_validation->set_rules('product','Product','required');
             $this->form_validation->set_rules('quantity','Quantity','required');
             $this->form_validation->set_rules('price','Price','required');
             $this->form_validation->set_rules('productdetails','Product Details','required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('Add_product', $cate); 
        }
        else{             
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 10000;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;
                   
            
            $this->load->library('upload', $config);
            if( $this->upload->do_upload('image')){

                 $data = array(
                        
                   'cate_id'         => $this->input->post('category'),
                   'product_id'      => $this->input->post('product'),
                   'quantity'        => $this->input->post('quantity'),
                   'price'           => $this->input->post('price'),
                   'image'           => $_FILES['image']['name'],
                   'product_details' => $this->input->post('productdetails'),

                 );

                if($this->db->insert('all_products', $data)) {
                    // $this->load->view('show_products',$result); 
                    redirect('Product/ShowProduct');
                }
            }
            else{
                $this->session->set_flashdata("error" ," error uploading image");
            }
        }

    }  
    public function Delete($id){
       
       $result = $this->Product_Model->DeleteProduct($id);
       
        redirect('Product/ShowProduct');
    }

    public function Edit($id){
       
        $result['cate_name']   = $this->Product_Model->SelectCategory();
        $result['result']      = $this->Product_Model->EditProduct($id);
        $this->load->view('edit',$result);
        
    }

    public function Edit_All($id){
                //echo $id;
               $result = $this->Product_Model->Edit_Data($id);
               if($result)
               {
                    redirect('Product/ShowProduct');
               }
     

    }
    	
   

}