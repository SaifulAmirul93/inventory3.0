<body>

	<div id="wrapper">

	<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Item
                            <small>View Item</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= site_url('Inventory/page/a1'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-plus-square"></i> View Item
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                    <div class="col-lg-12">
                    <!-- /.col-lg-12 -->
                  
                       <!-- <form role="form" method="post" action="<?= site_url('Inventory/addItem'); ?>"> -->




                                                               <div class="row">
                                            <div class=" col-md-4">
                                                <h3 class="page-header">Item Details</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="form-group">
                                                

                                                    <div class="form-group">
                                                        <label class="col-md-2" >SKU Code :</label> 
                                                        <div class=" col-md-3">  
                                                                <?= $arr->it_sku; ?>
                                            
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>

                                        <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Item Name :</label> 
                                                        <div class=" col-md-3">  
                                                                <?= $arr->it_name; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>
                                         <div class="row">
                                            <div class="form-group">
                                              <div class="form-group">
                                                        <label class="col-md-2" >Category :</label> 
                                                        <div class=" col-md-4">  
                                                                
                                                            <?php foreach ($lvl as $key) {
                                                                 if($key->ct_id == $arr->ct_category)
                                                                    {?>
                                                                        <?= $key->ct_name; ?> 
                                                            <?php
                                                                    } 
                                                            } ?>
                                                            
                                                        
                                                    </div>
                                                </div>
                                          </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group">
                                              <div class="form-group">
                                                        <label class="col-md-2" >Sub-category :</label> 
                                                        <div class=" col-md-4">  
                                                                
                                                            <?php foreach ($lvl2 as $key) {
                                                                 if($key->su_id == $arr->su_category)
                                                                    {?>
                                                                        <?= $key->su_name; ?> 
                                                            <?php
                                                                    } 
                                                            } ?>
                                                            
                                                        
                                                    </div>
                                                </div>
                                          </div>
                                        </div>

                                        <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Danger Zone :</label> 
                                                        <div class=" col-md-3">  
                                                                <?= $arr->it_danger; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>
                                          <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Quantity :</label> 
                                                        <div class=" col-md-3">  
                                                                <?= $arr->it_qty; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>

                                          <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Unit Price (Per Item) :</label> 
                                                        <div class=" col-md-3">  
                                                                <?= $arr->it_price; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>


                                    
                                        <div class="row">
                                                <div class="form-group">
                                                <div class="clear" style="height:10px;"></div>
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Description :</label> 
                                                        <div class="clear" style="height:20px;"></div>
                                                     <div class=" col-md-12">  
                                                <textarea name="item_desc" id="item_desc" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" disabled=""><?= $arr->it_descrp; ?></textarea>
                                                       </div>
                                                    </div>
                                                </div>
                                        </div>


                                        

                                        
                        
                                        <div class="clear" style="height: 50px;"></div>
                                         <div class="row">
                                            <div class=" col-md-5">
                                            <a href="<?= site_url('Inventory/page/i1.1?edit=').$this->my_func->scpro_encrypt($arr->it_id); ?>" >
                                                <button type="button" class="btn btn-success">Edit</button>
                                                </a>
                                                <a href="<?= site_url('Inventory/page/i2'); ?>">
                                                <button type="button" class="btn btn-warning">Back</button>
                                                </a>
                                            </div> 
                                        </div>  
                                        <div class="clear" style="height: 50px;"></div>                
                    <!-- </form> -->
                
                
                    <!-- <div id="sprintcontainer"> -->
                    </div>
                  
            </div>

            </div>
            <!-- /.container-fluid -->





        </div>
        <!-- /#page-wrapper -->
	</div>