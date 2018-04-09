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
                                <i class="fa fa-pencil"></i> Edit Category
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                    <div class="col-lg-12">
                    <!-- /.col-lg-12 -->
                  
                       <form role="form" method="post" action="<?= site_url('Inventory/updateCat'); ?>">




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
                                                                <input class="form-control" name="sku" id="sku" value="<?= $arr->ct_sku; ?>">
                                            
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>

                                        <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Category Name :</label> 
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="name" id="name" required  value="<?= $arr->ct_name; ?>">
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
                                                                            <option value="<?= $key->ty_id; ?>" <?php if( $key->ty_id==$arr->ty_id){ echo "selected"; } ?>> <?= $key->ty_name; ?></option>
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
                                                <textarea name="descrp" id="descrp" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $arr->ct_descrp; ?></textarea>
                                                       </div>
                                                    </div>
                                                </div>
                                        </div>


                                        

                                        
                        
                                        <div class="clear" style="height: 50px;"></div>
                                          <div class="row">
                                            <div class=" col-md-5">
                                            <input type="hidden" name="id" id="inputId" class="form-control" value="<?= $this->my_func->scpro_encrypt($arr->ct_id); ?>">
                                                <button type="submit" class="btn btn-success">Save</button>
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