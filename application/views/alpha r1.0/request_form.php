
<script src="<?= base_url(); ?>js/jquery.js"></script>


<body>

	<div id="wrapper">

	<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Request
                          
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= site_url('Inventory/page/a1'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-plus-square"></i> Request Form
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
                                                <h3 class="page-header">Request Form</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="form-group">
                                                

                                                    <div class="form-group">
                                                        <label class="col-md-2" >Shift :</label> 
                                                        <div class=" col-md-3">  
                                                                <select class="form-control"  id="shift" name="shift" required>
                                                                    <option value="">--Select Shift--</option>
                                                                    <option value="1">A</option>
                                                                    <option value="2">B</option>
                                                                  </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Date :</label> 
                                                        <div class=" col-md-3">  
                                            
                                                                <input class="form-control input-sm" type="text" id="date" name="date" value="<?= date("Y-m-d"); ?>">

                                                        </div>
                                                    </div>
                                                </div>
                                         </div>

                                        <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Planning :</label> 
                                                        <div class=" col-md-3">  
                                                            <select class="form-control"  id="shift" name="shift" required>
                                                                    <option value="">--Select Planning--</option>
                                                                    <option value="1">Night</option>
                                                                    <option value="2">Morning</option>
                                                                  </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Time :</label> 
                                                        <div class=" col-md-3">  
                                                                
                                                                <input class="form-control input-sm" type="time" id="time" name="time" value="">

                                                        </div>
                                                    </div>
                                                </div>
                                         </div>
                                         <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                            <label class="col-md-2" >Shipment :</label> 
                                                            <div class=" col-md-3">  
                                                                <input class="form-control input-sm" type="text" id="ship" name="ship">
                                                                   
                                                            </div>
                                                    </div>  
                                                    <div class="form-group">
                                                            <label class="col-md-2" >S.Zone / Department :</label> 
                                                            <div class=" col-md-3">  
                                                                    <select class="form-control" name="category" id="category">
                                                                    <option value="" >Select S.Zone/Department</option>
                                                                    <option value="1" >Production</option>
                                                                    <option value="2" >Distribution</option>
                                                                    <option value="3" >Marketing</option>
                                                                 
                                                                
                                                                    </select>
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
                                                                                                    <th>Qty Issued</th>   
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
                                                                                                <tr>
                                                                                                <td colspan="6" align="center">
                                                                                                    <a href="">
                                                                                                        <i class="fa fa-fw fa-plus"></i> Add Item
                                                                                                    </a>
                                                                                                
                                                                                                </td>
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
                                    


                                         

                                         



                                    
                                      


                                        

                                        
                        
                                        <div class="clear" style="height: 50px;"></div>
                                         <div class="row">
                                            <div class=" col-md-5">
                                                <button type="submit" class="btn btn-success">Create</button>
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
  
   });
</script>