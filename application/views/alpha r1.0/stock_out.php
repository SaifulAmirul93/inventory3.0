
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
                             Stock-Out
                          
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= site_url('Inventory/page/a1'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-caret-square-o-down"></i> Stock-Out
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                    <div class="col-lg-12">
                    <!-- /.col-lg-12 -->
                  
                       <form role="form" method="post" action="<?= site_url('Inventory/stock-in'); ?>">




                                        <div class="row">
                                            <div class=" col-md-4">
                                                <h3 class="page-header">Stock-Out Form</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="form-group">
                                                        <div class="col-md-8"> 
                                                                <div class="form-group input-group">
                                                                    
                                                                    <!-- <div class="col-md-8"> -->
                                                                    
                                                                            <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                                                            <input class="form-control input-lg" name="barcode" id="barcode" placeholder="Product Barcode or Request code">
                                                        
                                                                        
                                                                    <!-- </div> -->           
                                                                </div>
                                                        </div>
                                                        <div class="col-md-4"> 
                                                        
                                                                <div class="form-group">
                                                                    
                                                                            <input class="form-control input-lg" name="shelf" id="shelf" placeholder="Shelf">
                                                        
                                                                
                                                                </div>
                                                        </div>
                                                    </div>
                                        </div>
                                         
                                         <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                            <div class="form-group">
                                                        
                                                        
                                                                <input class="form-control input-lg" name="request" id="request" placeholder="Request Number">

                                            
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                            <div class="form-group">
                                                        
                                                        
                                                                 <select class="form-control input-lg">
                                                                     <option>Send To</option>                                                                 
                                                                     <option>Inventory</option>
                                                                     <option>Production</option>
                                                                     <option>Marketing</option>
                                                                     <option>Distribution</option>
                                                                 </select> 
                                            
                                                            </div>
                                                        
                                                    </div>
                                                     <div class="col-md-4"> 
                                                        
                                                                <div class="form-group">
                                                                    
                                                                            <input class="form-control input-lg" name="date" id="date" value="<?= date("Y-m-d"); ?>">
                                                        
                                                                
                                                                </div>
                                                        </div>
                                                </div>

                                         </div>

                                <div class="row">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title"><i class="fa fa-list fa-fw"></i>Product List</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                    <div class="table-responsive">
                                                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example"  width="100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>#</th>
                                                                                        <th>Item Detail</th>
                                                                                        <th>Current Stock</th>
                                                                                        <th>Qty Stock-Out</th>   
                                                                                        <th>Balance</th>   
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                        1
                                                                                        </td>
                                                                                        <td>
                                                                                        <span>Wicked Haze TPD Outer box</span> - <small><b>Raw Material</b></small><br>
                                                                                        Color Box - Multipack
                                                                                        </td>
                                                                                        <td>10000</td>
                                                                                        <td>
                                                                                        <div class="form-group row">
                                                                                            <div class="col-xs-5">
                                                                                                <input class="form-control" name="qty" id="qty" type="number"> 
                                                                                            </div>
                                                                                        </div>
                                                                                        </td>
                                                                                        <td>
                                                                                        <span style="color:green">11000</span>
                                                                                        </td>
                                                                                        <td><button type="button" class="delBtn btn btn-danger btn-circle btn-xs" title="Delete" id="" name=""><i class="fa fa-close"></i></button>
                                                                                        <input type="hidden" class="form-control" name="item_id" id="item_id" value=""></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    

                                     
                                       

                                       


                                        



                                       


                                    
                                        


                                        

                                        
                        
                                        <div class="clear" style="height: 20px;"></div>
                                         <div class="row">
                                            <div class=" col-md-5">
                                                <button type="submit" class="btn btn-success">Input</button>
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                            </div> 
                                        </div>  
                                        <div class="clear" style="height: 50px;"></div>                
                    </form>
            
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
  
   });
</script>