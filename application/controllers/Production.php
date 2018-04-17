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
        $this->_checkSession();
		
		switch ($key) {
			case 'a1':
				$data['display']=$this->load->view($this->parent_page.'/dashboard','',true);
                $this->_show('display', $data, $key);
			break;
			case 'p1':
					$this->load->database();
                    $this->load->model('m_request');
                    $this->load->library('my_func');
                            
                    $this->load->library('pagination');
                            

                    $item = $this->input->get('item');
                    $st= $this->input->get('st');

                    $like = null;
                    $filter = null;
                    $limit_per_page = 10;

                    $arr['total'] = $this->m_request->count($filter,$like,$item);   

                    $page = $this->uri->segment(4,1);

                    $page--;

                    $arr['numPage'] = $page*10;
                    $arr['result'] = $this->m_request->get_curr($limit_per_page , $arr['numPage'] , $filter , $like , $item , $st);
                    $config['base_url'] = site_url('Production/page/p1');
                    $config['total_rows'] = $arr['total'];
                    $config['per_page'] = $limit_per_page;
                    $config["uri_segment"] =4;
                            
                    // custom paging configuration
                    $config['num_links'] = 3;
                    $config['use_page_numbers'] = TRUE;
                    $config['reuse_query_string'] = TRUE;
                            
                    $config['cur_tag_open'] = '<li><a class="current"><strong>';
                    $config['cur_tag_close'] = '</strong></a></li>';
                    $config['num_tag_open'] = '&nbsp;<li>';
                    $config['num_tag_close'] = '</li>&nbsp;';
                    $config['prev_tag_open'] = '<li>';
                    $config['prev_tag_close'] = '</li>';
                    $config['last_tag_open'] = '<li>';
                    $config['last_tag_close'] = '</li>';
                    $config['next_tag_open'] = '<li>';
                    $config['next_tag_close'] = '</li>';
                    $config['first_tag_open'] = '<li>';
                    $config['first_tag_close'] = '</li>';
                    $config['next_link'] = 'Next';
                    $config['prev_link'] = 'Previous';
                    $this->pagination->initialize($config);
                    $arr["link"] = $this->pagination->create_links();
                    $data['display']=$this->load->view($this->parent_page.'/request_list',$arr,true);
                    $this->_show('display', $data, $key);
			break;		
			case "p2":
                $this->load->database();
                $this->load->model('m_dept');

                $arr['supp'] = $this->m_dept->get();

                $data['display']=$this->load->view($this->parent_page.'/request_form',$arr,true);
                $this->_show('display', $data, 'p1');
      break;
      case 'p3':
              if ($this->input->get('edit')) 
              {
      
                $this->load->database();
                $this->load->model('m_request');
                $this->load->model('m_dept');
                $this->load->model('m_item');
                $this->load->library('my_func');
                
                $itemId = $this->my_func->scpro_decrypt($this->input->get('edit'));

                $data = $this->m_request->getList($itemId);
                $arr['arr'] = array_shift($data);

                $arr['supp'] = $this->m_dept->get();
                $arr['item2'] = $this->m_item->getAll();

                $data['display']=$this->load->view($this->parent_page.'/edit_request',$arr,true);
                $this->_show('display', $data, 'p1');
              }
        break;
			default:
                $this->_show();
			break;
		}
	}

	 function _checkSession()
              {
                $this->load->database();
                $this->load->model('m_login');
                $this->load->library('my_func');
                if ($this->session->userdata('id')) {
                  $id = $this->my_func->scpro_decrypt($this->session->userdata('id'));
                  if ($this->m_login->get($id)) {
                    return true;
                  }else{
                    redirect(site_url('login'),'refresh');
                  }
                }else{
                  redirect(site_url('login'),'refresh');
                }     
              }

}
