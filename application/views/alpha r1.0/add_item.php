<style>
.imageupload {
                margin: 20px 0;
            }
</style>
<script src="<?= base_url(); ?>js/jquery.js"></script>
    <link href="<?= base_url(); ?>asset/plugin/dist/css/bootstrap-imageupload.css" rel="stylesheet">
    <script src="<?= base_url(); ?>asset/plugin/dist/js/bootstrap-imageupload.js"></script>


<body>

	<div id="wrapper">

	<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Item
                          
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= site_url('Inventory/page/a1'); ?>">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-cubes"></i>  <a href="<?= site_url('Inventory/page/i2'); ?>">Item List</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-plus-square"></i> Add Item
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                    <div class="col-lg-12">
                    <!-- /.col-lg-12 -->
                  
                       <form role="form" method="post" action="<?= site_url('Inventory/addItem'); ?>"  enctype="multipart/form-data">




                                    <div class="row">
                                            <div class=" col-md-4">
                                                <h3 class="page-header">Add Item</h3>
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
                                            <center>
                                                <div class="file-tab panel-body">

                                                    <div class="clearfix" style="height:20px"></div>
                                          
                                          
                                                        <div class="btn btn-info btn-file">
                                                            <span style="color:white">Browse</span>
                                                            <input type="file" name="fileImg">
                                                        </div>
                                                        <button type="button" class="btn btn-warning">Remove</button>
                                                    </div>
                                            </center>
                                            <div class="clearfix" style="height:20px"></div>
                                                <center>
                                                        <div class="url-tab panel-body">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control hasclear" placeholder="Image URL">
                                                                    <div class="input-group-btn">
                                                                        <button type="button" class="btn btn-info">Submit</button>
                                                                    </div>
                                                            </div>
                                                    
                                                                <button type="button" class="btn btn-warning">Remove</button>
                                                    
                                                            <div class="clearfix" style="height:20px"></div>
                                                            <input type="hidden" name="image-url">   
                                                        </div>
                                                </center>
                                     </div>
                          
                                </div>
                              </div>
                            </div>    
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
                                                        <label class="col-md-2" >Item Name :</label> 
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="name" id="name" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2" >Label Color :</label> 
                                                        <div class=" col-md-2">  
                                                                <input class="form-control input-sm" type="text" id="holiday_color" name="color" value="#fff">
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>
                                         <div class="row">
                                            <div class="form-group">
                                                <div class="form-group">
                                                        <label class="col-md-2" >Type :</label> 
                                                            <div class=" col-md-3">  
                                                                    <select class="form-control" name="type" id="type">
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
                                                <div class="form-group" id="divCat">
                                                        <label class="col-md-2" >Category :</label> 
                                                        <div class=" col-md-3">  
                                                                <select class="form-control" name="category" id="category" disabled>
                                                                <option value="-1" >Select Category</option>
                                                            <!-- <?php foreach ($lvl as $key) {
                                                                ?>
                                                                <option value="<?= $key->ct_id; ?>" > <?= $key->ct_name; ?></option>
                                                                <?php
                                                            } ?> -->
                                                            
                                                                </select>
                                                        </div>
                                                </div>

                                                <div class="form-group" id="divSub">
                                                        <label class="col-md-2" >Sub-Category :</label> 
                                                        <div class=" col-md-3">  
                                                                <select class="form-control" disabled=""  id="subcategory" name="subcategory" required>
                                                                    <option value="-1">Select Sub-category</option>
                                                                  </select>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>

                                

                                       

                                          <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Unit Quantity :</label> 
                                                        <div class=" col-md-2">  
                                                                 <select class="form-control" id="unit" name="unit" required>
                                                                    <option value="-1">Select Unit</option>
                                                                    <?php foreach ($unit as $key) {
                                                                        ?>
                                                                        <option value="<?= $key->un_id; ?>" > <?= $key->un_desc; ?></option>
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
                                                        <label class="col-md-2" >Danger Zone :</label> 
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="danger" id="danger" type="number" required>
                                                               
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label class="col-md-2" >Quantity on Hand :</label>
                                                       
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="qty" id="qty" type="number" required>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>

                                          <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Purchase Price (Per Item) :</label> 
                                                        <div class=" col-md-2">  
                                                                <select class="form-control" id="curr" name="curr" required>
                                                                    <option value="-1">Select Currency</option>
                                                                    <option value="1">MYR</option>
                                                                    <option value="1">USD</option>
                                                                  </select>
                                                        </div> 
                                                        <div class=" col-md-2">  
                                                                <input class="form-control" name="price" id="price" type="number" min="0.01" required>
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>


                        
                                        <div class="clear" style="height: 50px;"></div>
                                         <div class="row">
                                            <div class=" col-md-5">
                                                <button type="submit" class="btn btn-success">Save</button>
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                                <a href="<?= site_url('Inventory/page/i2'); ?>" name="c5">
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
    <script>

$(document).ready(function() {


    var $imageupload = $('.imageupload');
    $imageupload.imageupload();

    $('#type').change(function() {

            temp = $(this).val();
           
            $.post('<?= site_url('Inventory/getAjaxCat'); ?>', {ty_id : temp}, function(data) {
               
                $("#divCat").html(data);
            });
        });

    $('#category').change(function() {

            temp = $(this).val();
           
            $.post('<?= site_url('Inventory/getAjaxSub'); ?>', {ct_id : temp}, function(data) {
               
                $("#divSub").html(data);
            });
        });


     

    });
</script>
<script>

  $(function () {
      var demo1 = $('#holiday_color');

       demo1.colorpickerplus();
       demo1.on('changeColor', function(e,color){
          
            if(color==null){
              $(this).val('transparent').css('background-color', '#b59972');//tranparent
              }else{
            $(this).val(color).css('background-color', color);
          }
      });
  
   });
</script>