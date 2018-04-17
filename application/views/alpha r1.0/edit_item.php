<style>
.imageupload {
                margin: 20px 0;
            }
</style>

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
                            <small>Edit Item</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= site_url('Inventory/page/a1'); ?>">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-cubes"></i>  <a href="<?= site_url('Inventory/page/i2'); ?>">Item List</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-plus-square"></i> Edit Item
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                    <div class="col-lg-12">
                    <!-- /.col-lg-12 -->
                  
                       <form role="form" method="post" action="<?= site_url('Inventory/updateItem'); ?>" enctype="multipart/form-data">




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

                                                                        <div class="panel-body">
                                                                            <button type="button" class="btn btnRemove btn-warning">Remove</button>
                                                                            <input type="hidden" name="file" id="file" value="<?= $arr->ii_url; ?>">
                                                                            
                                                                        </div>
                                                                    </center>
                                                                    <?php }else{?>
                                                                         <center>
                                                                        <div class="file-tab panel-body">


                                                                            <div class="btn btn-info btn-file">
                                                                                    <span style="color:white">Browse</span>
                                                                                    <input type="file" name="fileImg">
                                                                                </div>
                                                                                
                                                                            <button type="button" class="btn  btn-warning">Remove</button>
                                                                         
                                                                                
                                                                        </div>
                                                                    </center>
                                                                    <?php } ?>
                                                                    <div class="clearfix" style="height:20px"></div>
                                                                       
                                                             </div>
                                                  
                                                        </div>
                                                      </div>
                                                    </div>  
                                                        
                                                    <div class="col-md-7">
                                                        <div class="pull-right">
                                                            <div class="col-md-5">
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-database" aria-hidden="true"></i> Item Log
                                                                        <span class="caret"></span></button>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a href="<?= site_url('Inventory/page/il1?item=').$this->my_func->scpro_encrypt($arr->it_id).'&st=1';; ?>">Stock-In</a></li>
                                                                            <li><a href="<?= site_url('Inventory/page/il1?item=').$this->my_func->scpro_encrypt($arr->it_id).'&st=2'; ?>">Stock-Out</a></li>
                                                                            <li><a href="#">Price Change</a></li>
                                                                        </ul>
                                                                    </div>
                                                            </div>
                                                            
                                                            <div class="col-md-2">
                                                            
                                                                
                                                                    <button type="button" class="btn btn-md btn-default" name="barcode" id="barcode"><i class="fa fa-barcode" aria-hidden="true"></i> Print Barcode</button>
                                                               
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
                                                                <input class="form-control" name="sku" id="sku" value="<?= $arr->it_sku; ?>">
                                            
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>

                                        <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Item Name :</label> 
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="name" id="name" value="<?= $arr->it_name; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Label Color :</label> 
                                                        <div class=" col-md-2">  
                                                                <input class="form-control input-sm" type="text" id="holiday_color" name="color" value="<?= $arr->it_color; ?>" style="background-color: <?= $arr->it_color; ?>;">
                                                            
                                                      
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
                                                                <option value="<?= $key->ty_id; ?>" <?php if($arr->ty_id == $key->ty_id){echo "selected";} ?>><?= $key->ty_name; ?></option>
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
                                                                <select class="form-control" name="category" id="category" required>
                                                                <option value="-1" >Select Category</option>
                                                            <?php foreach ($lvl as $key) {
                                                                ?>
                                                                <option value="<?= $key->ct_id; ?>" <?php if($key->ct_id == $arr->ct_category){echo " selected ";} ?>> <?= $key->ct_name; ?></option>
                                                                <?php
                                                            } ?>
                                                            
                                                                </select>
                                                        </div>
                                                </div>
                                                        <div class="form-group" id="divSub">
                                                            <label class="col-md-2" >Sub-Category :</label> 
                                                                <div class=" col-md-3">  
                                                                        <select class="form-control" id="subcategory" name="subcategory" required>
                                                                            <option value="-1" >Select Sub-category</option>
                                                                                <?php foreach ($lvl2 as $key) {
                                                                                    if($key->cat_id == $arr->ct_category){
                                                                                    ?>
                                                                                    <option value="<?= $key->su_id; ?>" <?php if($key->su_id == $arr->su_category){echo " selected ";} ?>> <?= $key->su_name; ?></option>
                                                                                    <?php
                                                                                }
                                                                                } ?>
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
                                                                        <option value="<?= $key->un_id; ?>" <?php if($arr->un_id == $key->un_id){echo "selected";} ?> > <?= $key->un_desc; ?></option>
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
                                                                <input type="number" class="form-control" name="danger" id="danger" value="<?= $arr->it_danger; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Quantity on Hand:</label> 
                                                            <div class=" col-md-3">  
                                                                    <input class="form-control" name="qty" id="qty" value="<?= $arr->it_qty; ?>" disabled>
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
                                                                    <?php foreach ($curr as $key) {
                                                                        ?>
                                                                        <option value="<?= $key->cu_id; ?>" <?php if($arr->cu_id == $key->cu_id){echo "selected";} ?> > <?= $key->cu_acron; ?></option>
                                                                        <?php
                                                                    } ?>
                                                                  </select>
                                                        </div>  
                                                        <div class=" col-md-2">  
                                                                <input class="form-control" type="number" name="price" id="price" value="<?= $arr->it_price; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>

                                        <div class="clear" style="height: 50px;"></div>
                                      
                                         <div class="row">
                                            <div class=" col-md-5">
                                           
                                                <input type="hidden" name="id" id="inputId" class="form-control" value="<?= $this->my_func->scpro_encrypt($arr->it_id); ?>">
                                                
                                                <button type="submit" class="btn btn-success">Update</button>
                                                
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
    //bootstrap WYSIHTML5 - text editor
  //   $(".textarea").wysihtml5();
   });
</script>
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

        $("#barcode").click(function() {

                    bootbox.prompt("<i class='fa fa-barcode'></i> Enter Number of Pages", 
                    function(result){
                        if(result)
                        {
                            window.open("<?= site_url('Inventory/gen_barcode?num='); ?>"+result+"&id="+"<?= $this->my_func->scpro_encrypt($arr->it_id); ?>", '_blank');
                        }
                        

                    });

                });

        $(".btnRemove").click(function(){
                
                id = $("#inputId").val();
                file =$("#file").val();;
                bootbox.confirm({
                        message: "Are you sure that you want to delete this image?",
                        buttons: {
                            confirm: {
                                label: 'Yes',
                                className: 'btn-success'
                               
                            },
                            cancel: {
                                label: 'No',
                                className: 'btn-danger'
                            }
                        },
                        callback: function (result) {
                     if(result == true){
                                
                                $.post('<?= site_url('Inventory/del_pic'); ?>', {item: id,file:file}, function(data) {
                                    
                                    $(window).attr("location", "<?= site_url('Inventory/page/i1.1?edit=').$this->my_func->scpro_encrypt($arr->it_id); ?>");
                                    
                                });

                            }
                            
                            
                        }
                    });


        });

    });
</script>