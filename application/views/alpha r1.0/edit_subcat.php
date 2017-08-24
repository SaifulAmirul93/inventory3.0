<body>

	<div id="wrapper">

	<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Sub-categories 
                            <small>Edit Sub-categories</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= site_url('Inventory/page/a1'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-plus-square"></i> Edit Sub-categories 
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                    <div class="col-lg-12">
                    <!-- /.col-lg-12 -->
                  
                       <form role="form" method="post" action="<?= site_url('Inventory/updateSubcat'); ?>">




                                                               <div class="row">
                                            <div class=" col-md-4">
                                                <h3 class="page-header">Sub-categories Details</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="form-group">
                                                

                                                    <div class="form-group">
                                                        <label class="col-md-2" >SKU Code :</label> 
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="su_sku" id="su_sku" value="<?= $arr->su_sku; ?>">
                                            
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>

                                        <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Sub-Category Name :</label> 
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="su_name" id="su_name" value="<?= $arr->su_name; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>
                                         <div class="row">
                                            <div class="form-group">
                                              <div class="form-group">
                                                        <label class="col-md-2" >Category :</label> 
                                                        <div class=" col-md-4">  
                                                                <select class="form-control" name="cat_id" id="cat_id">
                                                                <option value="-1" >Select Category</option>
                                                           <?php foreach ($lvl as $key) {
                                                                ?>
                                                                <option value="<?= $key->ct_id; ?>" <?php if($key->ct_id == $arr->cat_id){echo " selected ";} ?>> <?= $key->ct_name; ?></option>
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
                                                        <label class="col-md-2" >Place :</label> 
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="su_place" id="su_place" value="<?= $arr->su_place; ?>">
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
                                                <textarea name="su_descrp" id="su_descrp" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $arr->su_descrp; ?></textarea>
                                                       </div>
                                                    </div>
                                                </div>
                                        </div>


                                        

                                        
                        
                                        <div class="clear" style="height: 50px;"></div>
                                         <div class="row">
                                            <div class=" col-md-5">
                                                <input type="hidden" name="id" id="inputId" class="form-control" value="<?= $this->my_func->scpro_encrypt($arr->su_id); ?>">
                                                <button type="submit" class="btn btn-success">Save</button>
                                                <a href="<?= site_url('Inventory/page/r1'); ?>" name="c5">
                                                <button type="button" class="btn btn-warning">Back</button>
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