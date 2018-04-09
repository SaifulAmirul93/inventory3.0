<body>

	<div id="wrapper">

	<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Sub-category
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= site_url('Inventory/page/a1'); ?>">Dashboard</a>
                            </li>
                            <li>
                                    <i class="fa fa-list"></i><a href="<?= site_url('Inventory/page/r1'); ?>"> Sub-Category List</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-plus-square"></i> Add Sub-category 
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                    <div class="col-lg-12">
                    <!-- /.col-lg-12 -->
                  
                       <form role="form" method="post" action="<?= site_url('Inventory/addSubcat'); ?>">




                                                               <div class="row">
                                            <div class=" col-md-4">
                                                <h3 class="page-header">Sub-category Detail</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="form-group">
                                                

                                                    <div class="form-group">
                                                        <label class="col-md-2" >SKU Code :</label> 
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="sku_num" id="sku_num">
                                            
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>

                                        <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Sub-Category Name :</label> 
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="subcat_name" id="subcat_name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>
                                         <div class="row">
                                            <div class="form-group">
                                              <div class="form-group">
                                                        <label class="col-md-2" >Category :</label> 
                                                        <div class=" col-md-3">  
                                                                <select class="form-control" name="ct_id" id="ct_id">
                                                                <option value="-1" >Select Category</option>
                                                            <?php foreach ($lvl as $key) {
                                                                ?>
                                                                <option value="<?= $key->ct_id; ?>" > <?= $key->ct_name; ?></option>
                                                                <?php
                                                            } ?>
                                                            
                                                        </select>
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
                                                <a href="<?= site_url('Inventory/page/r1'); ?>">
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