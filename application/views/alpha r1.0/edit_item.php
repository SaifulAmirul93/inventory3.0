
<script>

$(document).ready(function() {

    $('#category').change(function() {

            temp = $(this).val();
           
            $.post('<?= site_url('Inventory/getAjaxSub'); ?>', {ct_id : temp}, function(data) {
               
                $("#divSub").html(data);
            });
        });

    });
</script>

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
                  
                       <form role="form" method="post" action="<?= site_url('Inventory/updateItem'); ?>">




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
                                                                <input class="form-control" name="name" id="name" value="<?= $arr->it_name; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>
                                         <div class="row">
                                            <div class="form-group">
                                              <div class="form-group">
                                                        <label class="col-md-2" >Category :</label> 
                                                        <div class=" col-md-4">  
                                                                <select class="form-control" name="category" id="category">
                                                                <option value="-1" >Select Category</option>
                                                            <?php foreach ($lvl as $key) {
                                                                ?>
                                                                <option value="<?= $key->ct_id; ?>" <?php if($key->ct_id == $arr->ct_category){echo " selected ";} ?>> <?= $key->ct_name; ?></option>
                                                                <?php
                                                            } ?>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                          </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group">
                                              <div class="form-group" id="divSub">
                                                        <label class="col-md-2" >Sub-Category :</label> 
                                                        <div class=" col-md-4">  
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
                                                        <label class="col-md-2" >Danger Zone :</label> 
                                                        <div class=" col-md-3">  
                                                                <input type="number" class="form-control" name="danger" id="danger" value="<?= $arr->it_danger; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>

                                          <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Quantity :</label> 
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="qty" id="qty" value="<?= $arr->it_qty; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>

                                          <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Unit Price (Per Item) :</label> 
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="price" id="price" value="<?= $arr->it_price; ?>">
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
                                                <textarea name="desc" id="item_desc" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $arr->it_descrp; ?></textarea>
                                                       </div>
                                                    </div>
                                                </div>
                                        </div>


                                        

                                        
                        
                                        <div class="clear" style="height: 50px;"></div>
                                         <div class="row">
                                            <div class=" col-md-5">
                                            <input type="hidden" name="id" id="inputId" class="form-control" value="<?= $this->my_func->scpro_encrypt($arr->it_id); ?>">
                                                <button type="submit" class="btn btn-success">Save</button>
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