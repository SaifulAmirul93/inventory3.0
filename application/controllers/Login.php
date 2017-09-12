<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Login extends CI_Controller {
	
		var $version = "Nasty Process System v2.3.7 Alpha";
	    function __construct() {
	        parent::__construct();
	        $this->load->library('session' , 'my_func');
	    }
	
	    // function index() {
	    //     $this->load->view("alpha r1.0/login");
	    // }

	    function index() {
	        $this->load->view("alpha r1.0/login_page");
	    }
	    public function raw()
	    {
	      $this->load->view("alpha r1.0/login");
	    }
	    public function finish()
	    {
	      redirect('http://localhost/inventoryR1.0_finish/login','refresh');
	    }
	    public function apparel()
	    {
	      redirect('http://localhost/inventoryR1.0_apparel/login','refresh');
	    }
	     public function lab()
	    {
	      redirect('http://localhost/inventoryR1.0_lab/login','refresh');
	    }
	    //sql injection alert ***
	    function signin(){
	    	//$this->load->library("encrypt");
	    	$username = $this->input->post('username');
	    	$pass = $this->input->post('pass');
			$this->load->database();
	    	$this->load->model('m_login');
	    	$data = $this->m_login->login($username,$pass);
	    	if ($data) {
	    		
	    		$array = array(
	    			'id' => $this->my_func->scpro_encrypt($data->id),
	    			'role' => $this->my_func->scpro_encrypt($data->role),
	    			'username' => $this->my_func->scpro_encrypt($data->username)
	    		);	    		
	    		$this->session->set_userdata( $array );

	    		redirect(site_url('Inventory'),'refresh');
	    	}else{
	    		$this->session->set_flashdata('error', 'Your username or password Is Wrong');
	    		redirect(site_url('login/raw'),'refresh');
	    	}
	    	
	    }

	    function signup(){
	    	$email = $this->input->post("email");
	        $pass = $this->input->post("pass");

	        $this->load->library("my_func");
	        $pass = $this->my_func->scpro_encrypt($pass);

	        //echo $email;
	        //echo $pass;

	        $this->load->model("m_login");

	        $data = array(
	        	"us_email" => $email , 
	        	"us_pass" => $pass
	        );
	        if (!$this->m_login->insert($data)) {
	        	echo "Not success";
	        }else{
	        	echo "success";
	        }
	    }
	    public function logout()
	    {
	      $this->session->unset_userdata('us_id');
	      $this->session->unset_userdata('us_lvl');
	      $this->session->sess_destroy();
	      redirect(site_url('login'),'refresh');
	    }
	}
	        
?>