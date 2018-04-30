<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Inventory extends CI_Controller {

	var $component_parent="alpha r1.0/component";
	var $parent_page = "alpha r1.0";

	function __construct() {
	        parent::__construct();
	        $this->load->library('session');
	    }
	
	public function index()
	{
		$this->page('a1');
	}



	 private function _show($page = 'display' , $data = null , $key = 'a1'){
    $this->load->library('my_func');



        $link['link'] = $key;

        

	     	$this->load->view($this->component_parent.'/head', FALSE);

	    	$this->load->view($this->component_parent.'/header', $link, FALSE);
        
        $this->load->view($this->component_parent.'/sidemenu',$link, FALSE);
        
        if (isset($data['title'])) {

          $T['title'] = $data['title'];

          $this->load->view($this->component_parent.'/title',$T, FALSE);
          
	    	}else{
	    		$T = null;
	    	}

        $this->load->view($this->parent_page.'/'.$page, $data, false);
                
	    	$this->load->view($this->component_parent.'/footer', FALSE);

	
	    }	

	    public function page($key)
    	{


          $this->_checkSession();
    		 switch ($key) {



                


                case "a1" :// dashboard
                        
                        if ($this->input->get('page')) {
                        $p = $this->input->get('page');
                        }else{
                            $p = 0;
                        }

                        $this->load->model('m_item');
                        $this->load->model('m_log');
                        $this->load->model('m_category');
                        $this->load->model('m_status_item');
                        $this->load->model('m_dept');

                        $arr['countItem'] = $this->m_item->countItem();
                        $arr['countDgr'] = $this->m_item->countDgr();
                        $arr['totalVal'] = $this->m_item->totalVal();
                        $arr['totalQty'] = $this->m_item->totalQty();

                        $arr['totalIn'] = $this->m_log->total_stat(1);
                        $arr['totalOut'] = $this->m_log->total_stat(2);
                        $arr['totalDel'] = $this->m_log->total_stat(3);

                        $arr['lvl'] = $this->m_category->getLvl();
                        $arr['arr2'] = $this->m_status_item->get();
                        $arr['arr3'] = $this->m_dept->get();

                        $ver = $this->m_item->orderCount2(1);

                        $arr['arr'] = $this->m_item->getAll3(10 , $p , 1);
                        $result1 = sizeof($arr['arr']);
                        $arr['page'] = $p;
                        $arr['total'] = $ver;
                        $arr['row'] = $result1;
                        $data['display']=$this->load->view($this->parent_page.'/index',$arr,true);
                        $this->_show('display', $data, $key);
                        
                  break; 

                  case "i1" :// add item
                        
                        $this->load->database();
                        $this->load->model('m_category');
                        $this->load->model('m_unit');
                        $this->load->model('m_type');
                        $arr['lvl'] = $this->m_category->getLvl();
                        $arr['unit'] = $this->m_unit->get();
                        $arr['type'] = $this->m_type->get();
                        
                        
                        $data['display']=$this->load->view($this->parent_page.'/add_item',$arr,true);
                        $this->_show('display',$data, 'i1');
                        
                        
                  break;

                  case "i1.1" :// edit item
                        $this->load->library('my_func');
                        if ($this->input->get('edit')) 
                        {
                        
                            $itemId = $this->my_func->scpro_decrypt($this->input->get('edit'));
                            
                            $this->load->database();

                            $this->load->model('m_item');
                            $this->load->model('m_category');
                            $this->load->model('m_type');
                            $this->load->model('m_unit');
                            $this->load->model('m_currency');
                            $this->load->model('m_item_img');

                            $arr['type'] = $this->m_type->get();
                            $arr['unit'] = $this->m_unit->get();
                            $arr['curr'] = $this->m_currency->get();
                            $arr['lvl'] = $this->m_item->getLvl();
                            $arr['lvl2'] = $this->m_category->getLvl2();
                            $arr['arr'] = $this->m_item->getAll($itemId);
                        

                        } 
                        $data['display']=$this->load->view($this->parent_page.'/edit_item',$arr,true);
                        $this->_show('display', $data, 'i1');
                        
                  break;  

                  case "i1.2" :// view item
                        $this->load->library('my_func');
                        if ($this->input->get('view')) {
                        
                        $itemId = $this->my_func->scpro_decrypt($this->input->get('view'));
                        //echo $staffId;
                        $this->load->database();
                        $this->load->model('m_item');
                        $this->load->model('m_category');
                        $arr['lvl'] = $this->m_item->getLvl();
                        $arr['lvl2'] = $this->m_category->getLvl2();
                        $arr['arr'] = $this->m_item->getAll($itemId,true);
                        

                      } 
                        
                        $data['display']=$this->load->view($this->parent_page.'/view_item',$arr,true);
                        $this->_show('display', $data, 'i1');
                        
                  break;  


                  case "i2" :// Warehouse Shelf

                        if ($this->input->get('page')) 
                        {
                          $p = $this->input->get('page');
                        }
                        else
                        {
                            $p = 0;
                        }
                        $this->load->database();
                        $this->load->model('m_item');
                        $this->load->library('my_func');
                        $this->load->model('m_category');
                        $this->load->model('m_status_item');
                        $this->load->model('m_dept');

                        $ver = $this->m_item->orderCount();
                        $arr['arr'] = $this->m_item->getAll2(10 , $p);
                        $arr['lvl'] = $this->m_category->getLvl();
                        $arr['arr2'] = $this->m_status_item->get();
                        $arr['arr3'] = $this->m_dept->get();
                        $result1 = sizeof($arr['arr']);


                        $arr['page'] = $p;
                        $arr['total'] = $ver;
                        $arr['row'] = $result1;
                        $data['display']=$this->load->view($this->parent_page.'/item_list',$arr,true);
                        $this->_show('display', $data, $key);
 
                  break; 
                  
                  case "l1" :// log item

                        $this->load->database();
                        $this->load->model('m_log');
                        $this->load->library('my_func');

                        $arr['arr'] = $this->m_log->getAll();
                        
                        $data['display']=$this->load->view($this->parent_page.'/logs', $arr,true);
                        $this->_show('display', $data, 'l1');
                        
                  break;   

                  case "l1.2" :// delete logs

                        $this->load->database();
                        $this->load->model('m_del');
                        $this->load->library('my_func');

                        $arr['arr'] = $this->m_del->getAll();
                        
                        $data['display']=$this->load->view($this->parent_page.'/del_logs', $arr,true);
                        $this->_show('display', $data, 'l1');
                        
                  break; 


                  case "p1" :
                         $this->load->database();
                        $this->load->model('m_log_price');
                        $this->load->library('my_func');

                        $arr['arr'] = $this->m_log_price->getAll();
                        
                        $data['display']=$this->load->view($this->parent_page.'/price_log', $arr,true);
                        $this->_show('display', $data, 'l1');
                  break;   

                  case "t1" :// category
                        //start added
                        $this->load->database();
                        $this->load->model('m_category');
                        $this->load->library('my_func');

                        $arr['arr'] = $this->m_category->getAll();

                        
                        
                        $data['display']=$this->load->view($this->parent_page.'/cat_list',$arr,true);
                        $this->_show('display',$data,'t1');
                        
                  break;  

                   case "t2" :// add category
                        $this->load->database();
                        $this->load->model('m_type');

                        $arr['type'] = $this->m_type->get();
                        $data['display']=$this->load->view($this->parent_page.'/add_cat',$arr,true);
                        $this->_show('display', $data, 't1');
                        
                  break;  

                  case "t3" :// edit item
                        $this->load->library('my_func');
                        if ($this->input->get('edit')) {
                        
                        $itemId = $this->my_func->scpro_decrypt($this->input->get('edit'));
                      
                        $this->load->database();
                        $this->load->model('m_category');
                        $this->load->model('m_type');
                          
                        
                        $arr['arr'] = $this->m_category->getAll($itemId);
                        $arr['type'] = $this->m_type->get();
                        
                        $data['display']=$this->load->view($this->parent_page.'/edit_cat',$arr,true);
                        $this->_show('display', $data, 't1');
                        }      
                  break;   

                  case "t4" :// view item
                        $this->load->library('my_func');
                        if ($this->input->get('view')) {
                        
                        $itemId = $this->my_func->scpro_decrypt($this->input->get('view'));
                        //echo $staffId;
                        $this->load->database();
                        $this->load->model('m_category');
                       
                        
                        $arr['arr'] = $this->m_category->getAll($itemId);
                        
                        $data['display']=$this->load->view($this->parent_page.'/view_cat',$arr,true);
                        $this->_show('display',$data,'t1');
                      } 
                        
                        
                        
                  break;   

                  case "r1" :// sub_cat list
                        
                        $this->load->database();
                        $this->load->model('m_subcat');
                        $this->load->library('my_func');

                        $arr['arr'] = $this->m_subcat->getAll();

                        
                        
                        $data['display']=$this->load->view($this->parent_page.'/subcat_list',$arr,true);
                        $this->_show('display', $data,'r1');
                        
                  break;  

                  case "r2" :// Add sub_cat
                      $this->load->database();
                        $this->load->model('m_category');
                        $this->load->library('my_func');
                      $arr['lvl'] = $this->m_category->getLvl();


                       $data['display']=$this->load->view($this->parent_page.'/add_subcat',$arr,true);
                        $this->_show('display', $data, 'r2');
                        
                        
                  break;  

                   case "r3" :// edit item
                        $this->load->library('my_func');
                        if ($this->input->get('edit')) {
                        
                        $itemId = $this->my_func->scpro_decrypt($this->input->get('edit'));
                        //echo $staffId;
                        $this->load->database();
                        $this->load->model('m_subcat');
                       
                        $arr['lvl'] = $this->m_subcat->getLvl();
                        $arr['arr'] = $this->m_subcat->getAll($itemId);
                        

                      } 
                        
                        
                        $data['display']=$this->load->view($this->parent_page.'/edit_subcat',$arr,true);
                        $this->_show('display',$data,'r1');
  
                  break;   
                     case "r4" :// view item
                        $this->load->library('my_func');
                        if ($this->input->get('view')) {
                        
                        $itemId = $this->my_func->scpro_decrypt($this->input->get('view'));
                        //echo $staffId;
                        $this->load->database();
                        $this->load->model('m_subcat');
                       
                        $arr['lvl'] = $this->m_subcat->getLvl(); 
                        $arr['arr'] = $this->m_subcat->getAll($itemId);
                        

                      } 
                        
                        $data['display']=$this->load->view($this->parent_page.'/view_subcat',$arr,true);
                        $this->_show('display',$data,'r1');
                        
                        
                  break;   

                  case "k1" :// type

                        $this->load->database();
                        $this->load->model('m_category');
                        $this->load->library('my_func');

                        $arr['arr'] = $this->m_category->getAll();

                        
                        
                        $data['display']=$this->load->view($this->parent_page.'/type_list',$arr,true);
                        $this->_show('display',$data,'t1');
                        
                  break;  
                   case "a24" :// adduser
                     

                        $this->load->database();
                        $this->load->model('m_user');
                        $this->load->library('my_func');
                        $arr['lvl'] = $this->m_user->getLvl(); 
                        $data['display']=$this->load->view($this->parent_page.'/add_user',$arr,true);
                        $this->_show('display', $data, 't1');
                        
                  break;  
                  case "s1" :
                        //user list
                       
                        $this->load->database();
                        $this->load->model('m_user');
                        
                        $arr['arr'] = $this->m_user->getAll();

                        $data['display']=$this->load->view($this->parent_page.'/users',$arr,true);
                        $this->_show('display', $data, 's1');
                        
                  break;  

                   case "s2" :// user profile
                        
                        $this->load->database();
                        $this->load->model('m_user');
                        $this->load->library('my_func');

                        $id = $this->my_func->scpro_decrypt($this->session->userdata('id'));
                        $arr['arr'] = $this->m_user->getAll2($id);

                        
                        
                        $data['display']=$this->load->view($this->parent_page.'/user_profile',$arr,true);
                        $this->_show('display', $data, 's1');
                        
                  break; 

                   case "s2.1" :// edit profile
                        
                        $this->load->database();
                        $this->load->model('m_user');
                        $this->load->library('my_func');

                        $id = $this->my_func->scpro_decrypt($this->session->userdata('id'));
                        $arr['lvl'] = $this->m_user->getLvl(); 
                        $arr['arr'] = $this->m_user->getAll2($id);

                        
                        
                        $data['display']=$this->load->view($this->parent_page.'/edit_user',$arr,true);
                        $this->_show('display', $data, 's1');
                        
                  break; 

                  case "s2.2" :// edit profile
                       ;
                        $this->load->database();
                        $this->load->model('m_user');
                        $this->load->library('my_func');

                        $id = $this->my_func->scpro_decrypt($this->input->get('edit'));
                        $arr['lvl'] = $this->m_user->getLvl(); 
                        $arr['arr'] = $this->m_user->getAll2($id);

                        
                        
                        $data['display']=$this->load->view($this->parent_page.'/edit_user',$arr,true);
                        $this->_show('display', $data, 's1');
                        
                  break; 

                  case "s2.3" :// user profile
                        
                        $this->load->database();
                        $this->load->model('m_user');
                        $this->load->library('my_func');

                        $id = $this->my_func->scpro_decrypt($this->input->get('view'));
                        $arr['arr'] = $this->m_user->getAll2($id);

                        
                        
                        $data['display']=$this->load->view($this->parent_page.'/user_view',$arr,true);
                        $this->_show('display', $data, 's1');
                        
                  break;
                  
                  case "so1":
                        $data['display']=$this->load->view($this->parent_page.'/stock_in','',true);
                        $this->_show('display', $data, 'so1');
                  break;

                  case "so2":
                        $this->load->database();
                        $this->load->model('m_dept');

                        $arr['supp'] = $this->m_dept->get();
                        $data['display']=$this->load->view($this->parent_page.'/stock_out',$arr,true);
                        $this->_show('display', $data, 'so2');
                  break;

                  case 'so4':
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
                        $config['base_url'] = site_url('Inventory/page/so4');
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
                        $data['display']=$this->load->view($this->parent_page.'/request_list_inv',$arr,true);
                        $this->_show('display', $data, $key);
                  break;

                  case "p2":
                        $this->load->database();
                        $this->load->model('m_dept');

                        $arr['supp'] = $this->m_dept->get();

                        $data['display']=$this->load->view($this->parent_page.'/request_form',$arr,true);
                        $this->_show('display', $data, 'p2');
                  break;

                  case 'il1':
                        // if ($this->input->get()) 
                        // {
                            $this->load->database();
                            $this->load->model('m_log2');
                            $this->load->model('m_item');
                            $this->load->library('my_func');
                            
                            $this->load->library('pagination');
                            

                            $item = $this->my_func->scpro_decrypt($this->input->get('item'));
                            $st= $this->input->get('st');

                            $like = null;
                            $filter = null;
                            $limit_per_page = 10;

                            $arr['total'] = $this->m_log2->count($filter,$like,$item,$st);   

                            $page = $this->uri->segment(4,1);

                            $page--;

                            $arr['numPage'] = $page*10;
                            $arr['result'] = $this->m_log2->get_curr($limit_per_page , $arr['numPage'] , $filter , $like , $item , $st);
                            $arr['arr'] = $this->m_item->getAll($item); 
                            $config['base_url'] = site_url('inventory/page/il1');
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
                            $data['display']=$this->load->view($this->parent_page.'/item_log',$arr,true);
                            
                        // }
                            $this->_show('display', $data, 'il1');
                  break;


                  case 'ty1':
                        $data['title'] = '<i class="fa fa-fw fa-list"></i>Type';

                        $this->_loadCrud();
                        $crud = new grocery_CRUD();
                        $crud->set_table('type');
                        $crud->set_subject('Type');
                        $crud->required_fields('ty_name');
                        $crud->columns('ty_id','ty_name','ty_desc');

                        $crud->display_as('ty_id','No')
                        ->display_as('ty_name','Type Name')
                        ->display_as('ty_desc','Description');


                        $output = $crud->render();
                        
                        
                        $data['display'] = $this->load->view($this->parent_page.'/crud' , $output , true);
		    		            $this->_show('display' , $data , $key); 
                  break;

                  case 'w1':
                      $data['display']=$this->load->view($this->parent_page.'/warehouse_list','',true);
                      $this->_show('display', $data, 'w1');
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


              public function addItem()
              {
                      if ($this->input->post()) {
                        $this->load->database();
                        $this->load->model('m_item');

                        $arr = $this->input->post();  

                        
                        
                        

                        $arr2 = array(
                            "it_sku" => $arr['sku'],
                            "it_name" => $arr['name'], 

                            "ty_id" => $arr['type'],
                            "su_category" => $arr['subcategory'],
                            "un_id" => $arr['unit'], 

                            "it_danger" => $arr['danger'],
                            "it_color" => $arr['color'],
                            "it_qty" => $arr['qty'],

                            "cu_id" => $arr['curr'],                                                
                            "it_price" => $arr['price'],
                            "ver" => 1

                        );

                          $itemid = $this->m_item->insert($arr2);


                          $this->load->model('m_barcode');
                          $this->load->model('m_item_img');
                          if($itemid) 
                          {
                              $arr4 = array(
                                'item_id' => $itemid,
                                'ii_url' => $this->do_upload('fileImg','./prod_img')
                                );
                                $this->m_item_img->insert($arr4);

                              $arr3 = array(
                                'item_id' => $itemid,
                                'ba_url' => $this->set_barcode($arr['sku'])
                                );
                                $this->m_barcode->insert($arr3);
                          }
                            $this->session->set_flashdata('success', 'Item are successfully inserted');
                            redirect(site_url('Inventory/page/i2'),'refresh');
                      }
                      else 
                      {
                            $this->session->set_flashdata('error', 'Item are not inserted');
                            redirect(site_url('Inventory/page/i2'),'refresh');
                      }
              }

              
           
               public function addCat()
              {
                      if ($this->input->post()) 
                      {
                        $arr = $this->input->post();          
                        $this->load->database();
                        $this->load->model('m_category');
                        
                        $arr2 = array(
                            "ct_sku" => $arr['sku'],
                            "ct_name" => $arr['name'],                            
                            "ty_id" => $arr['type'],
                            "ct_descrp" => $arr['descrp']
                        );
                        $result = $this->m_category->insert($arr2);

                          
                        $this->session->set_flashdata('success', 'Category details are successfully inserted');
                        redirect(site_url('Inventory/page/t1'),'refresh');    
                      }
                      else
                      {
                        $this->session->set_flashdata('error', 'Category details are not inserted');
                        redirect(site_url('Inventory/page/t1'),'refresh');
                      }
              }


               public function addSubcat()
              {
                      if ($this->input->post()) {
                        $arr = $this->input->post();          
                        $this->load->database();
                        $this->load->model('m_subcat');

                        
                        foreach ($arr as $key => $value) 
                        {
                          if ($value != null) 
                          {
                        
                            $arr2[$key] = $value;             
                          }
                        }
                        $result = $this->m_subcat->insert($arr2);

                          if($result)
                           {
                            $this->session->set_flashdata('success', 'Category details are successfully inserted');
                            redirect(site_url('Inventory/page/r1'),'refresh');
                           }
                           else
                           {
                            $this->session->set_flashdata('error', 'Category details are not inserted');
                            redirect(site_url('Inventory/page/r1'),'refresh');
                           }
                      }
              }

              public function stock_in()
              {
                if ($this->input->post()) 
                {
                      $arr = $this->input->post();

                      $this->load->database();
                      
                      $this->load->model('m_received');
                      $this->load->model('m_received_item');
                      $this->load->model('m_received_supplier');
                      $this->load->model('m_received_department');
                      $this->load->model('m_shelf');
                      $this->load->model('m_item');
                      $this->load->library('my_func');

                      
                      $arr2 = array(
                            'is_id' => $arr['status'], 
                            "us_id" => $this->my_func->scpro_decrypt($this->session->userdata('id'))
                        );
                      
                      $rec_id = $this->m_received->insert($arr2);
                        
                      if ($arr['status'] == 1)
                        {
                            $supp = array(
                              'rec_id' => $rec_id, 
                              'po_number' => $arr['po'], 
                              'sup_id' => $this->my_func->scpro_decrypt($arr['supp']) 
                            );
                          
                          $this->m_received_supplier->insert($supp);  
                        }
                      elseif ($arr['status'] == 2) 
                        {
                            $dept = array(
                              'rec_id' => $rec_id, 
                              'dp_id' => $arr['dept'], 
                              'res_id' => $arr['reason'] 
                            );
                          
                          $this->m_received_department->insert($dept); 
                        }
                        $sizeArr = sizeof($arr['itemId']);

                        for ($i=0; $i < $sizeArr; $i++) { 

                            $itemId = $this->my_func->scpro_decrypt($arr['itemId'][$i]);

                            $item = array(
                              'rec_id' => $rec_id, 
                              'it_id' => $itemId, 
                              'ri_qty' => $arr['qty'][$i], 
                              'ri_price' => $arr['price'][$i] 
                            );
                            
                            $this->m_received_item->insert($item);

                            $sh_id = $this->_checkShelf($arr['shelf'][$i]);

                      
                            $this->_stockUpdate($itemId,$arr['qty'][$i],$arr['price'][$i],1,$rec_id,null);
                            
                           
                            
                        }

                        $this->session->set_flashdata('success', 'Stock items have been updated.');
                        redirect(site_url('Inventory/page/so1'),'refresh');

                }
              }

              public function stock_out()
              {
                if ($this->input->post()) 
                {
                      $arr = $this->input->post();

                      $this->load->database();
                      
                      $this->load->model('m_released');
                      $this->load->model('m_released_item');
                      $this->load->model('m_released_department');                      
                      $this->load->model('m_shelf');
                      $this->load->model('m_item');
                      $this->load->library('my_func');

                     

                      $arr2 = array(
                            "is_id" => 3,                            
                            "re_id" => $arr['request'],                            
                            "us_id" => $this->my_func->scpro_decrypt($this->session->userdata('id'))
                            
                        );
                      
                      $rel_id = $this->m_released->insert($arr2);

                        $dept = array(
                            "rel_id" => $rel_id,                            
                            "dp_id" => $arr['dept']
                            
                        );

                        $this->m_released_department->insert($dept); 
                        
                        $sizeArr = sizeof($arr['itemId']);

                        for ($i=0; $i < $sizeArr; $i++) { 

                            $itemId = $this->my_func->scpro_decrypt($arr['itemId'][$i]);
                            $item = array(
                              'rel_id' => $rel_id, 
                              'it_id' => $itemId, 
                              'ri2_qty' => $arr['qty'][$i]
                            );
                            
                            $this->m_released_item->insert($item);

                            $this->_stockUpdate($itemId,$arr['qty'][$i],null,2,null,$rel_id);
                                
                        }

                        $this->session->set_flashdata('success', 'Stock items have been Check-Out.');
                        redirect(site_url('Inventory/page/so2'),'refresh');

                }
              }

              private function _stockUpdate($item = null, $qty = null, $price = null,$st = null,$rec = null,$rel = null)
              {
                      $this->load->database();

                      $this->load->model('m_item');
                      $this->load->model('m_log2');
                      $this->load->model('m_log_status');
                      $this->load->model('m_log_rec');
                      $this->load->model('m_log_rel');

                      $data=$this->m_item->getAll($item);
                      $id = $this->my_func->scpro_decrypt($this->session->userdata('id'));

                      if($st == 1)
                      {
                          if ($data->it_qty != $qty) 
                          {
                            $total = $data->it_qty + $qty;
                          }
                          
                      }
                      else if($st == 2)
                      {
                          if ($data->it_qty != $qty) 
                          {
                            $total = $data->it_qty - $qty;
                          }
                        
                      }
                     
                      $arr1 = array('it_qty' => $total);
                      $this->m_item->update($arr1,$data->it_id);
                      
                     
                        $arr2 = array(
                          'it_id' => $data->it_id,
                          'lo_from' => $data->it_qty,
                          'lo_to' => $total,
                          'lo_diff' => $qty,
                          'us_id' => $id,
                          'sta_id' => $st
                        );

                        $lo_id = $this->m_log2->insert($arr2);
                        
                        
                              if ($st == 1) 
                              {
                                      $arr4 = array(
                                      'rec_id' => $rec,
                                      'lo_id' => $lo_id,    
                                      );

                                      $this->m_log_rec->insert($arr4);                        
                              }
                              elseif ($st == 2) 
                              {
                                      $arr4 = array(
                                      'rel_id' => $rel,
                                      'lo_id' => $lo_id,    
                                      );

                                      $this->m_log_rel->insert($arr4);   
                              }

                        
                        return true;
              }
              public function updateItem()
              {
                    if ($this->input->post()) {
                      $arr = $this->input->post();

                      $this->load->database();

                      $this->load->model('m_item');
                      $this->load->model('m_barcode');
                      $this->load->model('m_item_img');

                      $this->load->library('my_func');

                      $id=$this->my_func->scpro_decrypt($arr['id']);
                      
                      $usid = $this->my_func->scpro_decrypt($this->session->userdata('id'));

                           

                      $arr2 = array(
                            "it_sku" => $arr['sku'],
                            "it_name" => $arr['name'],                            
                            "ty_id" => $arr['type'],
                            "su_category" => $arr['subcategory'],
                            "it_danger" => $arr['danger'],
                            "it_color" => $arr['color'],                   
                            "un_id" => $arr['unit'],
                            "cu_id" => $arr['curr'],
                            "it_price" => $arr['price']
                        );

                        if ($this->_checkBarcode($id,$arr['sku'])) 
                        {
                            $result1 = $this->m_item_img->get($id);
                            if (!$result1) 
                            {
                                $arr4 = array(
                                    'item_id' => $id,
                                    'ii_url' => $this->do_upload('fileImg','./prod_img')
                                );
                                $this->m_item_img->insert($arr4);
                            }

                            $result = $this->m_item->update($arr2 , $id);
                        }                   
                          $this->session->set_flashdata('success', 'Item details are updated');
                          redirect(site_url('Inventory/page/i2'),'refresh');

                    }
                    else
                    {
                          $this->session->set_flashdata('error', 'Item details are not updated');
                          redirect(site_url('Inventory/page/i2'),'refresh');
                    }
                   
            }

            private function _checkBarcode($id = null,$sku = null)
            {
                    $this->load->database();
                    $this->load->model('m_item');
                    $this->load->model('m_barcode');

                    $data=$this->m_item->get($id);
                    $bar=$this->m_barcode->get($id);
                    
                    
                    if ($bar)
                    {
                      if($sku != $data->it_sku)
                        {
                          unlink('./barcode/'.$bar->ba_url);
                          
                          $arr3 = array(
                                    'ba_url' => $this->set_barcode($sku)
                                );
                          $this->m_barcode->update($arr3,$id); 

                          return true;
                        }
                      }  
                      else 
                      {
                          $arr3 = array(
                            'item_id' => $id,
                            'ba_url' => $this->set_barcode($sku)
                          );
                          
                          $this->m_barcode->insert($arr3);

                      return true;  
                      }
                    return true;
                    
            }

            private function _checkShelf($shelf = null)
            {
                    $this->load->database();
                    $this->load->model('m_shelf');

                    $arr = array('sh_code' => $shelf);
                    $data=$this->m_shelf->get($arr);
                    
                    if(empty($data))
                    {
                        $sh_id = $this->m_shelf->insert($arr);
                        return $sh_id;  
                    }
                    else
                    {
                        return $data->sh_id;  
                        
                    }
            }

            public function updateCat()
              {
                      if ($this->input->post()) {
                      $arr = $this->input->post();          
                      $this->load->database();
                      $this->load->model('m_category');
                      $this->load->library('my_func');
                      $id=$this->my_func->scpro_decrypt($arr['id']);
                      $arr2 = array(
                            "ct_sku" => $arr['sku'],
                            "ct_name" => $arr['name'],                            
                            "ty_id" => $arr['type'],
                            "ct_descrp" => $arr['descrp']
                            
                        );
                      $result = $this->m_category->update($arr2 , $id);
                      
                          
                      

                    if($result){
                    $this->session->set_flashdata('success', 'Category details have been updated');
                    redirect(site_url('Inventory/page/t1'),'refresh');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Category details not updated');
                    redirect(site_url('Inventory/page/t1'),'refresh');
                    }
               
                    
                    }
                    
            }

            public function updateSubcat()
              {
                      if ($this->input->post()) {
                      $arr = $this->input->post();          
                      $this->load->database();
                      $this->load->model('m_subcat');
                      $this->load->library('my_func');
                      foreach ($arr as $key => $value) {
                        if ($value != null) {
                        
                          if ($key == 'id') {
                            $id = $this->my_func->scpro_decrypt($value);
                          }else{
                            $arr2[$key] = $value;
                          }             
                        }
                      }
                      $result = $this->m_subcat->update($arr2 , $id);
                      
                          
                      

                    if($result){
                    $this->session->set_flashdata('success', 'Category details have been updated');
                    redirect(site_url('Inventory/page/r1'),'refresh');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Category details not updated');
                    redirect(site_url('Inventory/page/r1'),'refresh');
                    }
               
                    
                    }
                    else
                    {
                      redirect(site_url('Inventory/page/r1'),'refresh');
                    }
            }

            public function updateQty()
            {
                
                if ($this->input->post()) {
                    
                    $item_id = $this->input->post('item_id'); 
                    $status = $this->input->post('status'); 
                    $dept = $this->input->post('department'); 
                    $qty = $this->input->post('qty'); 
                    $st = $this->input->post('st');

                    $this->load->database();
                    
                    $this->load->library('my_func');
                    $this->load->model('m_item');
                    $item_id = $this->my_func->scpro_decrypt($item_id);
                    $id = $this->my_func->scpro_decrypt($this->session->userdata('id'));



                    $result=$this->m_item->updateQty1($qty , $item_id, $id, $st , $status , $dept);
                    if($result)
                    {
                      $this->session->set_flashdata('success', 'The item quantity are Updated!!');
                    redirect(site_url('Inventory/page/i2'),'refresh');
                    }
                    else
                    {
                      $this->session->set_flashdata('error', 'The item quantity are not Updated!! Please check again');
                    redirect(site_url('Inventory/page/i2'),'refresh'); 
                    }
                    
                }

            }

              public function request_status()
              {
                  if ($this->input->post('reid')) 
                  {
                      $this->load->database();
                      $this->load->model('m_request');
                      $this->load->library('my_func');

                      $re_id = $this->my_func->scpro_decrypt($this->input->post('reid'));
                      $us_id = $this->my_func->scpro_decrypt($this->session->userdata('id'));
                      $rs_id = array(
                        'rs_id' => 2,
                        've_id' => $us_id,
                      );

                      $result = $this->m_request->update($rs_id,$re_id);

                      $this->session->set_flashdata('success', 'Request order are successfully Updated');
                      redirect(site_url('Inventory/page/so4'),'refresh');
                  }   
              }
              public function request_code()
              {
                  if ($this->input->get('id')) 
                  {
                        $this->load->database();
                        $this->load->model('m_request');
                        $this->load->model('m_dept');
                        $this->load->model('m_item');
                        $this->load->library('my_func');
                        
                        $itemId = $this->my_func->scpro_decrypt($this->input->get('id'));

                        $data = $this->m_request->getList($itemId);
                        $arr['arr'] = array_shift($data);

                        $arr['supp'] = $this->m_dept->get();
                        $arr['item2'] = $this->m_item->getAll();
                        $this->load->view($this->parent_page."/A4/request_code",$arr);   
                        
                  }
                        
                
              }

              public function request_email()
              {
                $this->load->library('my_func');
                
                $this->load->view($this->parent_page."/email/request_email");  
              }

              public function getAjaxCat()
              {
                 
                  if ($this->input->post('ty_id')) 
                  {
                  $ty_id = $this->input->post('ty_id');
                  
                   $this->load->database();

                  $this->load->model('m_category');
                  if ($ty_id == -1) 
                  {
                      $type['type'] = $ty_id;
                  } else 
                  {

                      $type['cat'] = $this->m_category->getList1($ty_id);
                      

                      $type['type'] = $ty_id;
               
                  }         
                  
                  $this->load->view($this->parent_page."/ajax/getAjaxCat",$type );
                }
              }

             public function getAjaxSub()
              {
                 
                  if ($this->input->post('ct_id')) {
                  $ct_id = $this->input->post('ct_id');
                  
                   $this->load->database();

                  $this->load->model('m_subcat');
                  if ($ct_id == -1) {
                      $type['cat'] = $ct_id;
                  } else {

                      $type['type'] = $this->m_subcat->getList($ct_id);
                      

                      $type['cat'] = $ct_id;
                      //echo "<script>alert($catt_id);</script>";
                  }         
                  
                  $this->load->view($this->parent_page."/ajax/getAjaxSub",$type );
                }
              }

              public function getAjaxGraph2()
              {
                  $arr1 = $this->input->post();
                  $this->load->database();
                  $this->load->model('m_item');
                  $this->load->model('m_category');
                  $this->load->model('m_subcat'); 
                  $arr['cat'] = $this->m_category->getName($arr1['cat1']);
                  $arr['sub'] = $this->m_subcat->getName($arr1['sub1']);

                  $arr['status'] = $arr1['status'];

                  $arr['year'] = $arr1['year1'];
                  $arr['month'] = $arr1['month1'];


                
                  $arr['arr'] = $this->m_item->totalByItem($arr1['year1'] , $arr1['month1'] , $arr1['cat1'] , $arr1['sub1'] , $arr1['status']);                      
              
                 $this->load->view($this->parent_page.'/ajax/getAjaxGraph2', $arr);
              }

              public function getAjaxSearch()
              {
                 
                  if ($this->input->post('ct_id')) {
                  $ct_id = $this->input->post('ct_id');
                  
                   $this->load->database();

                  $this->load->model('m_subcat');
                  if ($ct_id == -1) {
                      $type['cat'] = $ct_id;
                  } else {

                      $type['type'] = $this->m_subcat->getList($ct_id);
                      

                      $type['cat'] = $ct_id;
                  }         
                  
                  $this->load->view($this->parent_page."/ajax/getAjaxSearch",$type );
                }
              }

              public function getAjaxSearch2()
              {
                 
                  if ($this->input->post('ct_id')) {
                  $ct_id = $this->input->post('ct_id');


                  
                   $this->load->database();

                  $this->load->model('m_subcat');
                  if ($ct_id == -1) {
                      $type['cat'] = $ct_id;
                  } else {

                      $type['type'] = $this->m_subcat->getList($ct_id);
                      
                  
                      $type['cat'] = $ct_id;
                    
                  }         
                  
                  $this->load->view($this->parent_page."/ajax/getAjaxSearch2",$type );
                }
              }

              public function getAjaxSearch3()
              {
                 
                  if ($this->input->post('ct_id')) 
                  {
                      $this->load->view($this->parent_page."/ajax/getAjaxSearch3",$type );
                  }
              }

              public function getAjaxSupplier()
              {
                $this->load->database();
                $this->load->model('m_supplier');
                $this->load->model('m_dept');
                
                $receive = $this->input->post('receive2');
                
                
                if ($receive == 1) 
                {
                      $arr['supp'] = $this->m_supplier->get();
                      $this->load->view($this->parent_page."/ajax/getAjaxSupplier",$arr);  
                }
                elseif ($receive == 2) {
                      $arr['supp'] = $this->m_dept->get();
                      $this->load->view($this->parent_page."/ajax/getAjaxDept",$arr); 
                }
               
              }
              public function getAjaxSupplier2()
              {
                $this->load->database();
                $this->load->model('m_supplier');
                $this->load->library('my_func');
                
                $supp = $this->input->post('supplier');
                $arr['arr'] = $this->m_supplier->get($supp);
                
                $this->load->view($this->parent_page."/ajax/getAjaxSupplier2",$arr);  
               
              }
              public function getAjaxItem()
              {
                $this->load->database();
                $this->load->model('m_item');
                $this->load->library('my_func');
                
                $temp['num'] = $this->input->post('num');

                $arr2 = array('it.it_sku' => $this->input->post('search') );
                $temp['arr'] = $this->m_item->getAll($arr2);
                

                $this->load->view($this->parent_page."/ajax/getAjaxItem",$temp);  

              }
              public function getAjaxRequest()
              {

                  $this->load->database();
                  $this->load->model('m_request');
                  $this->load->model('m_dept');
                  $this->load->library('my_func');

                  $request = $this->input->post('search');
                  
                  $re_id2 = str_replace("RE-","",$request);
                  $re_id = $re_id2-10000;
                  $temp['supp']= $this->m_dept->get();
                  $temp['arr'] = $this->m_request->get($re_id);

                  $this->load->view($this->parent_page."/ajax/getAjaxRequest",$temp);  
                
              }
              public function getAjaxItem2()
              {
                $this->load->database();
                $this->load->model('m_item');
                $this->load->library('my_func');
                
                $temp['num'] = $this->input->post('num');

                $arr2 = array('it.it_sku' => $this->input->post('search') );
                $temp['arr'] = $this->m_item->getAll($arr2);
                

                $this->load->view($this->parent_page."/ajax/getAjaxItem2",$temp);  

              }
              public function getAjaxItem3()
              {
                $this->load->database();
                $this->load->model('m_item');
                $this->load->library('my_func');
                
                $temp['num'] = $this->input->post('num');

                $temp['item'] = $this->m_item->getAll();
                

                $this->load->view($this->parent_page."/ajax/getAjaxItem3",$temp);  

              }

              
               public function getAjaxTable()
              {
                 
                  if ($this->input->post()) {

                    if ($this->input->get('page')) {
                        $p = $this->input->get('page');
                        }else{
                            $p = 0;
                        }


                  $cat_id = $this->input->post('cat_id');
                  $sub_id = $this->input->post('sub_id');
                   $this->load->database();

                  $this->load->model('m_item');
                  $this->load->library('my_func');
               
                      
                      $ver = $this->m_item->orderCount2(1,$cat_id,$sub_id);
                      $arr['arr'] = $this->m_item->getAll4($ver , $p , 1 , $cat_id , $sub_id);
                      $result1 = sizeof($arr['arr']);
                        $arr['page'] = $p;
                        $arr['total'] = $ver;
                        $arr['row'] = $result1;

                   
                  $this->load->view($this->parent_page."/ajax/getAjaxTable",$arr );
                }
              }

               public function getAjaxTable2()
              {
                 
                  if ($this->input->post()) {

                    if ($this->input->get('page')) {
                        $p = $this->input->get('page');
                        }else{
                            $p = 0;
                        }


                  $cat_id = $this->input->post('cat_id');
                  $sub_id = $this->input->post('sub_id');
                   $this->load->database();

                  $this->load->model('m_item');
                  $this->load->model('m_status_item');
                  $this->load->model('m_dept');
                  $this->load->library('my_func');
               
                      
                      $ver = $this->m_item->orderCount2(0,$cat_id,$sub_id);
                      $arr['arr'] = $this->m_item->getAll4($ver, $p,0, $cat_id , $sub_id);
                      $arr['arr2'] = $this->m_status_item->get();
                      $arr['arr3'] = $this->m_dept->get();
                      $result1 = sizeof($arr['arr']);
                        $arr['page'] = $p;
                        $arr['total'] = $ver;
                        $arr['row'] = $result1;

                   
                  $this->load->view($this->parent_page."/ajax/getAjaxTable2",$arr );
                }
              }

                public function del_item()
                { 
                      $this->load->library('my_func');
                  
                      $item_id = $this->my_func->scpro_decrypt($this->input->post('item'));
                      $us_id= $this->my_func->scpro_decrypt($this->session->userdata('id'));
                      $del_id = $this->input->post('del');  
                      $this->load->database();

                      $this->load->model('m_item');
                      $this->load->model('m_del');

                          $arr = $this->m_item->getAll($item_id);

                          $arr2 = array(
                            "it_id" => $arr->it_id,
                            "st_id" => 4,                      
                            "us_user" => $us_id
                        );


                          $result=$this->m_item->del($del_id, $item_id);
                          if($result)
                          {
                          $this->m_del->insert($arr2);
                          $this->session->set_flashdata('success', 'Item are successfully deleted');
                          redirect(site_url('Inventory/page/i2'),'refresh');
                          }
                          else
                          {
                              $this->session->set_flashdata('error', 'Item are not deleted');
                          redirect(site_url('Inventory/page/i2'),'refresh');
                          }           
                }

                public function addUser()
              {
                      if ($this->input->post()) {
                      $arr = $this->input->post();          
                      $this->load->database();
                      $this->load->model('m_user');
                      $this->load->library('my_func');

                       $arr2 = array(
                            "username" => $arr['username'],
                            "password" => $this->my_func->scpro_encrypt($arr['pass']),                      
                            "name" => $arr['name'],
                            "email" => $arr['email'],
                            "role" => $arr['role']
                        );

                   

                      $result = $this->m_user->insert($arr2);
                      
                      $this->session->set_flashdata('success', 'User details are successfully added');       
                      redirect(site_url('Inventory/page/s1'),'refresh');
                    
                    }
            }

             public function del_user(){
                    if ($this->input->post('user')) {
                     $userID = $this->input->post('user');
                     $this->load->database();
                     $this->load->model('m_user');

                     $result=$this->m_user->delete($userID);
                     if($result)
                     {
                      $this->session->set_flashdata('success', 'User details are successfully deleted'); 
                     redirect(site_url('purchase_v1/dashboard/page/s1'),'refresh');

                     }
                     else{
                      $this->session->set_flashdata('error', 'User details are not deleted'); 
                     redirect(site_url('purchase_v1/dashboard/page/s1'),'refresh');
                     }
                     
                     
                      } 
                    }

             public function updateUser()
              {
                      if ($this->input->post()) {
                      $arr = $this->input->post();          
                      $this->load->database();
                      $this->load->model('m_user');
                      $this->load->library('my_func');


                     foreach ($arr as $key => $value) {
                        if ($value != null) {
                          if ($key == 'password') {
                            $value = $this->my_func->scpro_encrypt($value);
                          }
                          if ($key == 'id') {
                            $id = $this->my_func->scpro_decrypt($value);
                          }else{
                            $arr2[$key] = $value;
                          }             
                        }
                      }

                      $result = $this->m_user->update($arr2 , $id);
                      
                      $this->session->set_flashdata('success', 'User are successfully updated');       
                      redirect(site_url('Inventory/page/a1'),'refresh');
                    
                    }
            }

                public function del_category()
                { 
                      $this->load->library('my_func');
                  
                      $cat_id = $this->my_func->scpro_decrypt($this->input->post('cat'));
                      $us_id= $this->my_func->scpro_decrypt($this->session->userdata('id'));
                      $del_id = $this->input->post('del');  
                      $this->load->database();

                      $this->load->model('m_category');
                      $this->load->model('m_del');

                          $arr = $this->m_category->getAll($cat_id);

                          $arr2 = array(
                            "it_id" => $arr->ct_id,
                            "st_id" => 4,                      
                            "us_user" => $us_id
                        );


                          $result=$this->m_category->del($del_id, $cat_id);
                          if($result)
                          {
                          // $this->m_del->insert($arr2);
                          $this->session->set_flashdata('success', 'Category are successfully deleted');
                          redirect(site_url('Inventory/page/t1'),'refresh');
                          }
                          else
                          {
                              $this->session->set_flashdata('error', 'Category are not deleted');
                          redirect(site_url('Inventory/page/t1'),'refresh');
                          }           
                }

                public function del_subcat()
                { 
                      $this->load->library('my_func');
                  
                      $sub_id = $this->my_func->scpro_decrypt($this->input->post('sub'));
                      $us_id= $this->my_func->scpro_decrypt($this->session->userdata('id'));
                      $del_id = $this->input->post('del');  
                      $this->load->database();

                      $this->load->model('m_subcat');
                      $this->load->model('m_del');

                          $arr = $this->m_subcat->getAll($sub_id);

                          $arr2 = array(
                            "it_id" => $arr->ct_id,
                            "st_id" => 4,                      
                            "us_user" => $us_id
                        );


                          $result=$this->m_subcat->del($del_id, $sub_id);
                          if($result)
                          {
                          // $this->m_del->insert($arr2);
                          $this->session->set_flashdata('success', 'Category are successfully deleted');
                          redirect(site_url('Inventory/page/r1'),'refresh');
                          }
                          else
                          {
                              $this->session->set_flashdata('error', 'Category are not deleted');
                          redirect(site_url('Inventory/page/r1'),'refresh');
                          }           
                }


                 public function res_item()
                { 
                      $this->load->library('my_func');
                  
                       $this->load->model('m_item');
                      $this->load->model('m_del');

                      $item_id =$this->my_func->scpro_decrypt($this->input->post('item'));
                      $us_id= $this->my_func->scpro_decrypt($this->session->userdata('id'));
                      $del_id = $this->input->post('del');  
                      $this->load->database();

                     

                          $arr = $this->m_item->getAll($item_id);

                          $arr2 = array(
                            "it_id" => $arr->it_id,
                            "st_id" => 5,                      
                            "us_user" => $us_id
                          );


                          $result=$this->m_item->del($del_id, $item_id);

                          if($result)
                          {
                          $this->m_del->insert($arr2);
                          $this->session->set_flashdata('success', 'Item are successfully restored');
                          redirect(site_url('Inventory/page/i2'),'refresh');
                          }
                          else
                          {
                          $this->session->set_flashdata('error', 'Item are not restored');
                          redirect(site_url('Inventory/page/i2'),'refresh');
                          }           
                }
                public function do_upload($img = null,$file_url = null)
                {
                    
                        $config = array(
                                    'upload_path' => $file_url,
                                    'allowed_types' => "gif|jpg|png|jpeg",
                                    'overwrite' => TRUE,
                                    'max_size' => "4000", // Can be set to particular file size , here it is 4 MB(4000 Kb)
                                    'max_height' => "4000",
                                    'max_width' => "4000",
                                    'encrypt_name' => true
                                    );

                        $this->load->library('Upload', $config);
                        
                        
                        $this->upload->initialize($config);
                        $result = $this->upload->do_upload($img);
                        if (!$result) {
                          $error = $this->upload->display_errors();
                          $this->session->set_flashdata('warning',$error);
                          
                          return false;
                        }
                        else {
                          $data = $this->upload->data();
                          $background=$data['raw_name'].$data['file_ext'];

                          return $background;
                        }
                }
                public function gen_barcode()
                {
                  $this->load->database();
                  
                  $this->load->model('m_item');
                  $this->load->model('m_barcode');
                  

                  $this->load->library('my_func');
                  
                  if (($this->input->get('num')||$this->input->post('num')) && ($this->input->get('id')||$this->input->post('id'))) 
                  {
                      if ($this->input->post('num') && $this->input->post('id')) 
                      {
                        $arr['num'] = $this->input->post('num');
                        
                        $id= $this->my_func->scpro_decrypt($this->input->post('id'));
                      }
                      else if($this->input->get('num') && $this->input->get('id'))
                      {
                        $arr['num'] = $this->input->get('num');
                        $id= $this->my_func->scpro_decrypt($this->input->get('id'));  
                      }

                      $result=$this->m_barcode->get($id);
                      $arr['arr']=$this->m_item->getAll($id);

                      if(!empty($result))
                      {
                        $this->load->view($this->parent_page."/A4/barcode",$arr);   
                      }
                      else {
                        $this->session->set_flashdata('error', 'There is something wrong with the item detail, please contact it@nastyjuice.com.my for information');
                          redirect(site_url('Inventory/page/i2'),'refresh');
                      }
                      
                  }
                }

                public function del_pic()
                {
                  if ($this->input->post('item')) 
                  {
                      $this->load->library('my_func');
                      
                      $this->load->database();
                  
                      $this->load->model('m_item_img');

                      $path_file='/prod_img';
                 
                      $id = $this->my_func->scpro_decrypt($this->input->post('item')); 
                      $file = $this->input->post('file'); 

                      $this->m_item_img->delete($id);

                      unlink('./prod_img/'.$file);
                         
                      redirect(site_url('Inventory/page/i1.1'),'refresh');
                      
                  }
                }
                public function set_barcode($id  = null)
                {
                      //load library
                      $this->load->library('zend');
                      //load in folder Zend
                      $this->zend->load('Zend/Barcode');
                      //generate barcode
                      $file = Zend_Barcode::draw('code128', 'image', array('text'=>$id), array());
                      $id = time().$id;
                      $store_image = imagepng($file,"barcode/{$id}.png");
                      return $id.'.png';

                      
                }

                private function _loadCrud()
                {
                  $this->load->database();
                  $this->load->library('grocery_CRUD');
                }


                private function _checkPriceChange($id = null, $arr1 = null)
                {
                    $this->load->database();
                    $this->load->model('m_item');

                    $data=$this->m_item->get($id);

                    if( $arr1['it_price'] != $data->it_price )
                    {
                         return true;
                    }
                    else
                    {
                         return false;
                    }
                }



                public function logout()
                {
                        
                        
                        //$this->session->sess_destroy();
                        $this->session->unset_userdata('id');
                        $this->session->unset_userdata('role');
                        $this->session->unset_userdata('username');
                        



                        $this->load->driver('cache');
                        $this->session->sess_destroy();
                        $this->cache->clean();
                        // $this->load->view("main/login");

                        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
                        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
                        $this->output->set_header('Pragma: no-cache');
                        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

                        redirect(site_url('login'),'refresh');
                    
                  
                }

                



}
