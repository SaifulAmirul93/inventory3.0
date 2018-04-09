<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Production extends CI_Controller {

	var $component_parent="alpha r1.0/component";
	var $parent_page = "alpha r1.0/production";
	function __construct() 
	{
	        parent::__construct();
	        $this->load->library('session');
	}
	
	// public function index()
	// {
	// 	$this->load->view('welcome_message');
	// }

	private function _show($page = 'display' , $data = null , $key = 'a1')
	{
    		$this->load->library('my_func');

        	$link['link'] = $key;
	     	$this->load->view($this->component_parent.'/head', FALSE);

	    	$this->load->view($this->component_parent.'/header', $link, FALSE);
        
	    	$this->load->view($this->component_parent.'/sidemenu',$link, FALSE);

        	$this->load->view($this->parent_page.'/'.$page, $data, false);
                
	    	$this->load->view($this->component_parent.'/footer', FALSE);

	}	

	public function page($key)
    {
		switch ($key) {
			case 'a1':
				$data['display']=$this->load->view($this->parent_page.'/dashboard','',true);
                $this->_show('display', $data, $key);
			break;
			
			default:
				# code...
				break;
		}
	}

}
