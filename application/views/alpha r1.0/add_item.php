
<script src="<?= base_url(); ?>js/jquery.js"></script>

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
                          
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= site_url('Inventory/page/a1'); ?>">Dashboard</a>
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
                  
                       <form role="form" method="post" action="<?= site_url('Inventory/addItem'); ?>">




                                                               <div class="row">
                                            <div class=" col-md-4">
                                                <h3 class="page-header">Add Item</h3>
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
                                              <div class="form-group" id="divSub">
                                                        <label class="col-md-2" >Sub-Category :</label> 
                                                        <div class=" col-md-4">  
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
                                                        <label class="col-md-2" >Danger Zone :</label> 
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="danger" id="danger" type="number" required>
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>

                                         <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Quantity :</label> 
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="qty" id="qty" required>
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>

                                          <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Unit Price (Per Item) :</label> 
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="price" id="price" required>
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
                                                <textarea name="desc" id="desc" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                       </div>
                                                    </div>
                                                </div>
                                        </div>


                                        

                                        
                        
                                        <div class="clear" style="height: 50px;"></div>
                                         <div class="row">
                                            <div class=" col-md-5">
                                                <button type="submit" class="btn btn-success">Add Item</button>
                                                <button type="reset" class="btn btn-danger">Reset</button>
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