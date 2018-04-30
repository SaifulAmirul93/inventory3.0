<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Production extends CI_Controller {

  var $component_parent="alpha r1.0/component/production";
	var $parent_page = "alpha r1.0/production";
	function __construct() 
	{
	        parent::__construct();
	        $this->load->library('session');
	}
  public function index()
	{
		$this->page('a1');
	}

	private function _show($page = 'display' , $data = null , $key = 'a1')
	{
    		$this->load->library('my_func');
        $arr['title'] = "Nasty  Inventory - Beta 4.0";
        $link['link'] = $key;

	     	$this->load->view($this->component_parent.'/head',$arr, FALSE);

	    	$this->load->view($this->component_parent.'/header', $link, FALSE);
        
	    	$this->load->view($this->component_parent.'/sidemenu',$link, FALSE);

        $this->load->view($this->parent_page.'/'.$page, $data, false);
                
	    	$this->load->view($this->component_parent.'/footer', FALSE);

	}	

	public function page($key)
    {
        $this->_checkSession();
		
		switch ($key) {
			case 'p5':
				$data['display']=$this->load->view($this->parent_page.'/dashboard','',true);
                $this->_show('display', $data, 'p1');
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

  public function request()
  {
          if ($this->input->post()) 
          {
                $arr = $this->input->post();
                
                $this->load->database();
                $this->load->model('m_request');
                $this->load->model('m_request_item');
                $this->load->model('m_request_barcode');
                $this->load->library('my_func');
                //load library
                $this->load->library('zend');
                  //load in folder Zend
                $this->zend->load('Zend/Barcode');
                      //generate barcode
                $this->load->library('barcode_library');

                $us_id = $this->my_func->scpro_decrypt($this->session->userdata('id'));

                      $arr2 = array(
                        're_shift' => $arr['shift'],
                        're_plan' => $arr['plan'],
                        're_ship' => $arr['ship'],
                        'dp_id' => $arr['dept'],
                        'us_id' => $us_id,
                        'rs_id' => 1 
                      );

                $id = $this->m_request->insert($arr2);
                $re_id ='RE-'.(10000+$id);

                $barcode = $this->barcode_library->set_barcode($re_id,"barcode/request");

                $arr4 = array(
                            're_id' => $id,
                            'rb_code' => $barcode,
                        );

                $this->m_request_barcode->insert($arr4);

                $sizeArr = sizeof($arr['itemId']);

                    for ($i=0; $i < $sizeArr; $i++) 
                    { 
                        $arr3 = array(
                            're_id' => $id,
                            'it_id' => $arr['itemId'][$i],
                            'ri_qty' => $arr['qty'][$i]  
                        );

                        $this->m_request_item->insert($arr3);   
                    }
                      
              $this->session->set_flashdata('success', 'Request details are successfully inserted');
              redirect(site_url('Production/page/p2'),'refresh');    
          }
    }



  
  public function requestEdit()
  {
        if ($this->input->post()) 
        {
                $arr = $this->input->post();

                $this->load->database();

                $this->load->model('m_request');

                $this->load->model('m_request_item');
                
                $this->load->library('my_func');

                $re_id = $this->my_func->scpro_decrypt($this->input->post('id'));

                  if (isset($arr['itemId1'])) 
                  {
                        if (sizeof($arr['itemId1']) != 0) 
                        {
                                for ($i=0; $i < sizeof($arr['itemId1']); $i++) 
                                { 
                                    $ri_id = $arr['riId1'][$i];

                                    $item = array(
                                                        
                                      'it_id' => $arr['itemId1'][$i], 
                                      'ri_qty' => $arr['qty1'][$i], 
                                    );
                                    
                                    $this->m_request_item->update($item,$ri_id);
                                }
                        } 
                  }

                  if (isset($arr['itemId'])) 
                  {
                        $sizeArr = sizeof($arr['itemId']);
                        if (sizeof($arr['itemId'])) 
                        {
                              for ($i=0; $i < $sizeArr; $i++) 
                              { 
                                  $arr3 = array(
                                      're_id' => $re_id,
                                      'it_id' => $arr['itemId'][$i],
                                      'ri_qty' => $arr['qty'][$i]  
                                  );

                                  $this->m_request_item->insert($arr3);   
                              }
                        }    
                  }
        
                  $arr2 = array(
                        're_shift' => $arr['shift'],
                        're_plan' => $arr['plan'],
                        're_ship' => $arr['ship'],
                        'dp_id' => $arr['dept']
                  );

                  $this->m_request->update($arr2,$re_id);

              $this->session->set_flashdata('success', 'Request details are successfully updated');
              redirect(site_url('Production/page/p1'),'refresh');   
        }
  }

  public function del_item()
  {
      if ($this->input->post('delete')) 
      {
        $this->load->database();
        $this->load->model('m_request_item');
        $this->load->library('my_func');

        $ri_id = $this->my_func->scpro_decrypt($this->input->post('delete'));
        $result = $this->m_request_item->delete($ri_id);

        if ($result) 
        {
          echo true;
        }
        else 
        {
          echo false;
        }
        
      }
  }
  public function del_request()
  {
      if ($this->input->post('reid')) 
      {
        $this->load->database();
        $this->load->model('m_request');
        $this->load->library('my_func');
        
        $re_id = $this->my_func->scpro_decrypt($this->input->post('reid'));
        
        $result = $this->m_request->delete($re_id);

        $this->session->set_flashdata('success', 'Request order are successfully deleted');
        redirect(site_url('Production/page/p1'),'refresh');   
        
      }
  }



  public function getAjaxTdQty1()
  {
                $this->load->database();
                $this->load->model('m_item');
                $this->load->library('my_func');
                
                $item = $this->input->post('item');

                $temp['item'] = $this->m_item->getAll($item);

                $this->load->view($this->parent_page."/ajax/getAjaxTdQty1",$temp);  

  }

  public function getAjaxTdPrice1()
  {
                $this->load->database();
                $this->load->model('m_item');
                $this->load->library('my_func');
                
                $item = $this->input->post('item');

                $temp['item'] = $this->m_item->getAll($item);

                $this->load->view($this->parent_page."/ajax/getAjaxTdPrice1",$temp);  

  }

  public function getAjaxTdQty()
  {
                $this->load->database();
                $this->load->model('m_item');
                $this->load->library('my_func');
                
                $item = $this->input->post('item');

                $temp['item'] = $this->m_item->getAll($item);

                $this->load->view($this->parent_page."/ajax/getAjaxTdQty",$temp);  

  }

  public function getAjaxTdPrice()
  {
                $this->load->database();
                $this->load->model('m_item');
                $this->load->library('my_func');
                
                $item = $this->input->post('item');

                $temp['item'] = $this->m_item->getAll($item);

                $this->load->view($this->parent_page."/ajax/getAjaxTdPrice",$temp);  

  }

	 function _checkSession()
              {
                $this->load->database();

                $this->load->model('m_login');

                $this->load->library('my_func');

                      if ($this->session->userdata('id')) 
                      {
                              $id = $this->my_func->scpro_decrypt($this->session->userdata('id'));
                              if ($this->m_login->get($id)) 
                              {
                                  return true;
                              }else
                              {
                                  redirect(site_url('login'),'refresh');
                              }
                      }else
                      {
                              redirect(site_url('login'),'refresh');
                      }     
              }

}
