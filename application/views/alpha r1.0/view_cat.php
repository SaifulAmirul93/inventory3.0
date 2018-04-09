<body>

	<div id="wrapper">

	<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Category 
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= site_url('Inventory/page/a1'); ?>">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-list"></i> <a href="<?= site_url('Inventory/page/t1'); ?>">Category List</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-eye"></i> View Category
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
                                                <h3 class="page-header">Category Detail</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="form-group">
                                                

                                                    <div class="form-group">
                                                        <label class="col-md-2" >SKU Code :</label> 
                                                        <div class=" col-md-3">  
                                                                <?= $arr->ct_sku; ?>
                                            
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>

                                        <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Category Name :</label> 
                                                        <div class=" col-md-3">  
                                                                <?= $arr->ct_name; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>
                                         
                                          <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Type :</label> 
                                                        <div class=" col-md-3">  
                                                                <?= $arr->ty_name; ?>
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
                                                <?= $arr->ct_descrp; ?>
                                                       </div>
                                                    </div>
                                                </div>
                                        </div>

                        
                                        <div class="clear" style="height: 50px;"></div>
                                          <div class="row">
                                            <div class=" col-md-5">
                                            <a href="<?= site_url('Inventory/page/t3?edit=').$this->my_func->scpro_encrypt($arr->ct_id); ?>" >
                                                <button type="button" class="btn btn-success">Edit</button>
                                                </a>
                                                <a href="<?= site_url('Inventory/page/t1'); ?>">
                                                <button type="button" class="btn btn-warning">Back</button>
                                                </a>
                                            </div> 
                                        </div> 
                                        <div class="clear" style="height: 50px;"></div>                
                    
                
                
                    <!-- <div id="sprintcontainer"> -->
                    </div>
                  
            </div>

            </div>
            <!-- /.container-fluid -->





        </div>
        <!-- /#page-wrapper -->
	</div>