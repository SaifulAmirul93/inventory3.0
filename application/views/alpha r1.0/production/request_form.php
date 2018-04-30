

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
                                <i class="fa fa-dashboard"></i>  <a href="<?= site_url('Production/page/a1'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-list"></i>  <a href="<?= site_url('Production/page/p1'); ?>">Request List</a>
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
                  
                       <form role="form" method="post" action="<?= site_url('Production/request'); ?>">




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
                                            
                                                                <input class="form-control input-sm" type="text" id="date" name="date" value="<?= date("Y-m-d"); ?>" disabled>

                                                        </div>
                                                    </div>
                                                </div>
                                         </div>

                                        <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Planning :</label> 
                                                        <div class=" col-md-3">  
                                                            <select class="form-control"  id="plan" name="plan" required>
                                                                    <option value="">--Select Planning--</option>
                                                                    <option value="1">Night</option>
                                                                    <option value="2">Morning</option>
                                                                  </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Time :</label> 
                                                        <div class=" col-md-3">  
                                                                
                                                                <div id="txt"></div>

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
                                                                    <select class="form-control" name="dept" id="dept">
                                                                    <option value="" >Select S.Zone/Department</option>
                                                                    <?php foreach ($supp as $key) { ?>
                                                                        <option value="<?= $key->dp_id; ?>" > <?= $key->dp_dept; ?> </option>
                                                                    <?php } ?>  
                                                                 
                                                                
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
                                                                    <h3 class="panel-title"><i class="fa fa-list fa-fw"></i>Item List</h3>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                                <div class="table-responsive">
                                                                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example"  width="100%">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>#</th>
                                                                                                    <th class="col-md-6">Item Detail</th>
                                                                                                    <th class="col-md-2">Current Stock</th>
                                                                                                    <th>Qty Issued</th>    
                                                                                                    <th>Action</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody id="ItemList">
                                                                                            </tbody>
                                                                                                <tfoot>
                                                                                                    <tr>
                                                                                                        <td colspan="6" align="center">
                                                                                                            <button type="button" class="addBtn btn btn-default btn-circle btn-md" title="Add Item" id="addBtn" name="addBtn"><i class="fa fa-fw fa-plus"></i> Add Item</button>   

                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tfoot>
                                                                                               
                                                                                            
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
                                            <div class=" col-md-6">
                                                <button type="submit" class="btn btn-success">Create</button>
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                                <a href="<?= site_url('Production/page/p1'); ?>">
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
<script>
function startTime() 
        {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;

            var t = setTimeout(startTime, 500);
        }
        function checkTime(i) 
        {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
$(document).ready(function () {
        num = 1;
        
        $('#addBtn').click(function() {
                
                    $.post('<?= site_url('Inventory/getAjaxItem3'); ?>', {num : num}, function(data) {
                        
                        $("#ItemList").append(data);
                    });
         num ++;
                });
});
</script>