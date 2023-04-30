<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
    // echo 'hh'; die;
        parent::__construct();
        $this->load->database();
       $this->load->helper('file');
      $this->load->library('upload');
        $this->load->library('form_validation');
        
//        $this->load->helper(array('form','url'));
    }

	public function index(){
		$data['user'] = $this->db->get('user')->result_array();
		// $this->load->view('welcome_message');
		$this->load->view('admin1/table',$data);
		// $this->load->view('admin/table');
	}

	public function adduser()
	{
		// $this->load->view('welcome_message');
		$this->load->view('admin1/add_view');
		// $this->load->view('admin1/table');
	}


	public function add(){
		$data['username'] = implode(',', $this->input->post('username'));
		$data['user_email'] = implode(',', $this->input->post('uemail'));
		$data['usermob'] = implode(',', $this->input->post('mobno'));
		$data['address'] = implode(',', $this->input->post('location'));
		// print_r($data); die;
		$result=$this->db->insert('user',$data);
		 if ($result) {
                // $_SESSION['success_message'] = "Admin Login successfully";
                $this->session->set_flashdata('success', 'Add Record successfully');
                // redirect('Login');
                // echo "success";
            } else {
              $this->session->set_flashdata('danger', ' Failed');
                  // $_SESSION['error_message'] = "Error";
               
            }
		redirect('Welcome');
	}




     public function edituser($id){
     	 $this->db->where('user_id', $id);
     	$data['userdata'] = $this->db->get('user')->result_array();
		// $this->load->view('welcome_message');
		$this->load->view('admin1/edit',$data);
		// $this->load->view('admin1/table');
	}



       public function edit($id){
		$data['username'] = implode(',', $this->input->post('username'));
		$data['user_email'] = implode(',', $this->input->post('uemail'));
		 $data['usermob'] = implode(',', $this->input->post('mobno'));
		  $data['address'] = implode(',', $this->input->post('location'));
		// print_r($data); die;
		 $this->db->where('user_id',$id);
		$this->db->update('user',$data);
		 if ($result) {
                $this->session->set_flashdata('success', 'Edit Record successfully');
            } else {
              $this->session->set_flashdata('danger', ' Failed');
            }
		redirect('Welcome');
	}


      public function deleteuser($id){
		 $this->db->where('user_id',$id);
		$result = $this->db->delete('user');
		 if ($result) {
                $this->session->set_flashdata('success', 'Delete Record successfully');
                // echo "success";
            } else {
              $this->session->set_flashdata('danger', ' Failed');
                // echo"failed";
            }
		redirect('Welcome');

     	
      }


      public function show($id){
      	 $this->db->where('user_id', $id);
     	$data['userdata'] = $this->db->get('user')->result_array();
		// $this->load->view('welcome_message');
		$this->load->view('admin1/view_page',$data);
      }




}
