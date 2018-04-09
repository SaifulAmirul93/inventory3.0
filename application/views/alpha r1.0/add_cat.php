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
                            <li class="active">
                                <i class="fa fa-list"></i> Category List
                            </li>
                            <li class="active">
                                <i class="fa fa-plus-square"></i> Add Category
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                    <div class="col-lg-12">
                    <!-- /.col-lg-12 -->
                  
                       <form role="form" method="post" action="<?= site_url('Inventory/addCat'); ?>">




                                                               <div class="row">
                                            <div class=" col-md-4">
                                                <h3 class="page-header">Add Category</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >SKU Code :</label> 
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="sku" id="sku">
                                            
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>

                                        <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Category Name :</label> 
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="name" id="name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>
                                         
                                          <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Type :</label> 
                                                        <div class=" col-md-3">  
                                                                <select class="form-control" name="type" id="type" required>
                                                                    <option value="-1" >Select Type</option>
                                                                    <?php foreach ($type as $key) {
                                                                        ?>
                                                                        <option value="<?= $key->ty_id; ?>" > <?= $key->ty_name; ?></option>
                                                                        <?php
                                                                    } ?>
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>

                                        
                                    
                                        <div class="row">
                                                <div class="form-group">
                                                
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Description :</label> 
                                                        <div class="clear" style="height:20px;"></div>
                                                        <div class=" col-md-3">  
                                                            <textarea name="descrp" id="descrp" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                       </div>
                                                    </div>
                                                </div>
                                        </div>


                                        

                                        
                        
                                        <div class="clear" style="height: 50px;"></div>
                                         <div class="row">
                                            <div class=" col-md-5">
                                                <button type="submit" class="btn btn-success">Save</button>
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                                <a href="<?= site_url('Inventory/page/t1'); ?>" name="c5">
                                                <button type="button" class="btn btn-warning">Back</button>
                                                </a>
                                            </div> 
                                        </div>  
                                        <div class="clear" style="height: 50px;"></div>                
                    </form>
                
                
                    <!-- <div id="sprintcontainer"> -->
                    </div>
                  
            </div>

            </div>
            <!-- /.container-fluid -->





        </div>
        <!-- /#page-wrapper -->
	</div>