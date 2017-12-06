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
                        //start added
                        $this->load->database();
                        $this->load->model('m_category');
                        $arr['lvl'] = $this->m_category->getLvl();
                        
                        
                        $data['display']=$this->load->view($this->parent_page.'/add_item',$arr,true);
                        $this->_show('display',$data, 'i1');
                        
                        
                  break;

                  case "i1.1" :// edit item
                        $this->load->library('my_func');
                        if ($this->input->get('edit')) {
                        
                        $itemId = $this->my_func->scpro_decrypt($this->input->get('edit'));
                        //echo $staffId;
                        $this->load->database();
                        $this->load->model('m_item');
                       $this->load->model('m_category');
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
                        $arr['arr'] = $this->m_item->getAll($itemId);
                        

                      } 
                        
                        $data['display']=$this->load->view($this->parent_page.'/view_item',$arr,true);
                        $this->_show('display', $data, 'i1');
                        
                  break;  


                  case "i2" :// item list
                         if ($this->input->get('page')) {
                        $p = $this->input->get('page');
                        }else{
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
                  case "c1" :// dashboard
                        //start added
                       

                        
                        
                        $data['display']=$this->load->view($this->parent_page.'/check_in');
                        $this->_show('display', $data, 'c1');
                        
                  break;

                  case "c2" :// dashboard
                        //start added
                       

                        
                        
                        $data['display']=$this->load->view($this->parent_page.'/check_out');
                        $this->_show('display', $data, 'c2');
                        
                  break; 

                  case "l1" :// dashboard
                        //start added
                       

                        $this->load->database();
                        $this->load->model('m_log');
                        $this->load->library('my_func');

                        $arr['arr'] = $this->m_log->getAll();
                        
                        $data['display']=$this->load->view($this->parent_page.'/logs', $arr,true);
                        $this->_show('display', $data, 'l1');
                        
                  break;   

                  case "l1.2" :// dashboard
                        //start added
                       

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

                        // $arr = array('' => , );


                        $arr['arr'] = $this->m_log_price->getAll();
                        
                        $data['display']=$this->load->view($this->parent_page.'/price_log', $arr,true);
                        $this->_show('display', $data, 'l1');
                  break;   

                  case "t1" :// dashboard
                        //start added
                        $this->load->database();
                        $this->load->model('m_category');
                        $this->load->library('my_func');

                        $arr['arr'] = $this->m_category->getAll();

                        
                        
                        $data['display']=$this->load->view($this->parent_page.'/cat_list',$arr,true);
                        $this->_show('display',$data,'t1');
                        
                  break;  

                   case "t2" :// dashboard
                        //start added
                        // $this->load->database();
                        // $this->load->model('m_category');
                        // $this->load->library('my_func');

                        // $arr['arr'] = $this->m_category->getAll();

                        
                        
                        $data['display']=$this->load->view($this->parent_page.'/add_cat');
                        $this->_show('display', $data, 't1');
                        
                  break;  

                  case "t3" :// edit item
                        $this->load->library('my_func');
                        if ($this->input->get('edit')) {
                        
                        $itemId = $this->my_func->scpro_decrypt($this->input->get('edit'));
                        //echo $staffId;
                        $this->load->database();
                        $this->load->model('m_category');
                       
                        
                        $arr['arr'] = $this->m_category->getAll($itemId);
                        

                      } 
                        
                        $this->_show('display','t1');
                        
                        $data['display']=$this->load->view($this->parent_page.'/edit_cat',$arr);
                       
                        
                  break;   

                  case "t4" :// view item
                        $this->load->library('my_func');
                        if ($this->input->get('view')) {
                        
                        $itemId = $this->my_func->scpro_decrypt($this->input->get('view'));
                        //echo $staffId;
                        $this->load->database();
                        $this->load->model('m_category');
                       
                        
                        $arr['arr'] = $this->m_category->getAll($itemId);
                        

                      } 
                        $this->_show('display','t1');
                        $data['display']=$this->load->view($this->parent_page.'/view_cat',$arr);
                        
                        
                  break;   

                  case "r1" :// sub_cat list
                        //start added
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
                        
                        $this->_show('display','r1');
                        
                        $data['display']=$this->load->view($this->parent_page.'/edit_subcat',$arr);
                       
                        
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
                        $this->_show('display','t1');
                        $data['display']=$this->load->view($this->parent_page.'/view_subcat',$arr);
                        
                        
                  break;   

                  case "k1" :// dashboard
                        //start added
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
                        //start added
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
                        $arr = $this->input->post();          
                        $this->load->database();
                        $this->load->model('m_item');
                        //$this->load->library('my_func');
                        
                        $arr2 = array(
                            "it_sku" => $arr['sku'],
                            "it_name" => $arr['name'],                            
                            "ct_category" => $arr['category'],
                            "su_category" => $arr['subcategory'],
                            "it_danger" => $arr['danger'],
                            "it_color" => $arr['color'],
                            "it_qty" => $arr['qty'],                    
                            "it_price" => $arr['price'],
                            "it_descrp" => $arr['desc']
                        );

                        $result = $this->m_item->insert($arr2);

                          if($result)
                           {
                            $this->session->set_flashdata('success', 'Item are successfully inserted');
                            redirect(site_url('Inventory/page/i2'),'refresh');
                           }
                           else
                           {
                            $this->session->set_flashdata('error', 'Item are not inserted');
                            redirect(site_url('Inventory/page/i2'),'refresh');
                           }
                      }
              }


           
           


               public function addCat()
              {
                      if ($this->input->post()) {
                        $arr = $this->input->post();          
                        $this->load->database();
                        $this->load->model('m_category');
                        //$this->load->library('my_func');
                        
                        $arr2 = array(
                            "ct_sku" => $arr['sku'],
                            "ct_name" => $arr['name'],                            
                            "ct_place" => $arr['place'],
                            "ct_descrp" => $arr['descrp']
                            
                        );
                        $result = $this->m_category->insert($arr2);

                          if($result)
                           {
                            $this->session->set_flashdata('success', 'Category details are successfully inserted');
                            redirect(site_url('Inventory/page/t1'),'refresh');
                           }
                           else
                           {
                            $this->session->set_flashdata('error', 'Category details are not inserted');
                            redirect(site_url('Inventory/page/t1'),'refresh');
                           }
                      }
              }


               public function addSubcat()
              {
                      if ($this->input->post()) {
                        $arr = $this->input->post();          
                        $this->load->database();
                        $this->load->model('m_subcat');
                        //$this->load->library('my_func');
                        
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



              public function updateItem()
              {
                    if ($this->input->post()) {
                      $arr = $this->input->post();          
                      $this->load->database();
                      $this->load->model('m_item');
                      $this->load->library('my_func');
                      $id=$this->my_func->scpro_decrypt($arr['id']);
                      
                      $usid = $this->my_func->scpro_decrypt($this->session->userdata('id'));

                        

                      $arr2 = array(
                            "it_sku" => $arr['sku'],
                            "it_name" => $arr['name'],                            
                            "ct_category" => $arr['category'],
                            "su_category" => $arr['subcategory'],
                            "it_danger" => $arr['danger'],
                            "it_color" => $arr['color'],
                            "it_qty" => $arr['qty'],                    
                            "it_price" => $arr['price'],
                            "it_descrp" => $arr['desc']
                        );
                         

                          if($this->_checkPriceChange($id,$arr2))
                         {
                              $this->m_item->updatePrice($arr2 , $usid , $id);
                         }

                         $result = $this->m_item->update($arr2 , $id);
                      
                    if($result){
                    $this->session->set_flashdata('success', 'Item details are updated');
                    redirect(site_url('Inventory/page/i2'),'refresh');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Item details are not updated');
                    redirect(site_url('Inventory/page/i2'),'refresh');
                    }
               
                    
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
                            "ct_place" => $arr['place'],
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

                    //$result = $this->m_user->update($arr2 , $id);



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
                      //echo "<script>alert($catt_id);</script>";
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
                  
                  $this->load->view($this->parent_page."/ajax/getAjaxSearch3",$type );
                }
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
