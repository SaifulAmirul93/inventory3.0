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
                            <li>
                                <i class="fa fa-list"></i> <a href="<?= site_url('Inventory/page/i2'); ?>">Item List</a>
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
                
                                        <div class="row">
                                            <div class=" col-md-4">
                                                <h3 class="page-header">Item Detail</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="form-group">
                                                    <div class="col-sm-5">
                                                        <div class="card">
                                                           
                                                            <div class="card-body">

                                                                <div class="imageupload panel panel-green">
                                                                    <div class="panel-heading clearfix">
                                                                        <h3 class="panel-title pull-left">Upload Image</h3>
                                                                    </div>
                                                                <div class="clearfix" style="height:20px"></div>
                                                                  <?php if (!empty($arr->ii_url)) {
                                                                                ?>
                                                                    <center>
                                                                            <img src="<?= base_url(); ?>/prod_img/<?= $arr->ii_url; ?>" alt="Image preview" class="thumbnail" style="max-width:250px;max-height:250px"/>

                                                                    </center>
                                                                    <?php }else{?>
                                                                         <center>
                                                                        <div class="file-tab panel-body">


                                                                            <img src="<?= base_url(); ?>/prod_img/128px-No_image_available.svg.png" alt="Image preview" class="thumbnail" style="max-width:250px;max-height:250px"/>
                                                                           
                                                                         
                                                                                
                                                                        </div>
                                                                    </center>
                                                                    <?php } ?>
                                                                    <div class="clearfix" style="height:20px"></div>
                                                                       
                                                             </div>
                                                  
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>  

                                        <div class="row">
                                                <div class="form-group">
                                                <div class="clear" style="height:10px;"></div>
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Barcode :</label> 
                                                        
                                                     <div class=" col-md-8"> 
                                                        <?php if(!empty($arr->ba_url)){?>
                                                            <img src="<?= base_url(); ?>barcode/<?= $arr->ba_url; ?>" alt="logo" class="img-thumbnail"/>
                                                        <?php }else{?>
                                                            <img src="<?= base_url(); ?>barcode/no_barcodes.gif" alt="logo" class="img-thumbnail"/>
                                                            
                                                        <?php }?>
                                                    </div>
                                                    </div>
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
                                                        <label class="col-md-2" >Type :</label> 
                                                        <div class=" col-md-4">     
                                                                        <?= $arr->ty_name; ?>  
                                                    </div>
                                                </div>
                                          </div>
                                        </div>
                                         <div class="row">
                                            <div class="form-group">
                                              <div class="form-group">
                                                        <label class="col-md-2" >Category :</label> 
                                                        <div class=" col-md-4">     
                                                                        <?= $arr->ct_name; ?>  
                                                    </div>
                                                </div>
                                          </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group">
                                                <div class="form-group">
                                                        <label class="col-md-2" >Sub-category :</label> 
                                                        <div class=" col-md-4">  
                                                            <?= $arr->su_name; ?> 
                                                        </div>
                                                </div>
                                          </div>
                                        </div>

                                        <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Danger Zone :</label> 
                                                        <div class=" col-md-3">  
                                                                <?= $arr->it_danger; ?> <?= $arr->un_desc; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>
                                          <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Quantity :</label> 
                                                        <div class=" col-md-3">  
                                                                <?= $arr->it_qty; ?> <?= $arr->un_desc; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>

                                          <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Purchase Price (Per Item) :</label> 
                                                        <div class=" col-md-3">  
                                                                <?= $arr->cu_acron; ?> <?= $arr->it_price; ?>
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
                                                            <div class=" col-md-3">  
                                                                <?= $arr->it_descrp; ?>
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
                   
                    </div>
                  
            </div>

            </div>
            <!-- /.container-fluid -->





        </div>
        <!-- /#page-wrapper -->
	</div>