

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
                  
                       <form role="form" method="post" action="<?= site_url('Inventory/requestEdit'); ?>">




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
                                                                    <option value="1" <?php if($arr['request']->re_shift==1){ echo "selected";} ?>>A</option>
                                                                    <option value="2" <?php if($arr['request']->re_shift==2){ echo "selected";} ?>>B</option>
                                                                  </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Date :</label> 
                                                        <div class=" col-md-3">  
                                                                
                                                                <input class="form-control input-sm" type="text" id="date" name="date" value="<?=date_format(date_create($arr['request']->re_date) , 'd-m-Y' );?>" disabled>

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
                                                                    <option value="1" <?php if($arr['request']->re_plan==1){ echo "selected";} ?>>Night</option>
                                                                    <option value="2" <?php if($arr['request']->re_plan==2){ echo "selected";} ?>>Morning</option>
                                                                  </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Time :</label> 
                                                        <div class=" col-md-3">  
                                                                
                                                                <input class="form-control input-sm" type="text" id="date" name="date" value="<?=date_format(date_create($arr['request']->re_date) , 'G:i:s' );?>" disabled>

                                                        </div>
                                                    </div>
                                                </div>
                                         </div>
                                         <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                            <label class="col-md-2" >Shipment :</label> 
                                                            <div class=" col-md-3">  
                                                                <input class="form-control input-sm" type="text" id="ship" name="ship" value="<?= $arr['request']->re_ship; ?>">
                                                                   
                                                            </div>
                                                    </div>  
                                                    <div class="form-group">
                                                            <label class="col-md-2" >S.Zone / Department :</label> 
                                                            <div class=" col-md-3">  
                                                                    <select class="form-control" name="dept" id="dept">
                                                                    <option value="" >Select S.Zone/Department</option>
                                                                    <?php foreach ($supp as $key) { ?>
                                                                        <option value="<?= $key->dp_id; ?>" <?php if($arr['request']->dp_id == $key->dp_id){ echo "selected"; } ?>> <?= $key->dp_dept; ?> </option>
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
                                                                                                    <th class="col-md-6">Item Detail</th>
                                                                                                    <th class="col-md-2">Current Stock</th>
                                                                                                    <th>Qty Issued</th>    
                                                                                                    <th>Action</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody id="ItemList">
                                                                                            <?php 
                                                                                                foreach($arr['item'] as $key){
                                                                                            ?>
                                                                                              <td>
                                                                                                        <?= $num; ?>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                            <select class="item_<?= $num; ?> form-control input-md js-example-basic-single" name="item[]" id="item" required>
                                                                                                            <option value="">Select Item</option>
                                                                                                            <?php foreach ($item as $key) {?>
                                                                                                                <option value="<?= $key->it_id; ?>" > <?= $key->it_name; ?> | <?= $key->ct_name; ?> | <?= $key->su_name; ?></option>
                                                                                                            <?php } ?>               
                                                                                                            </select> 

                                                                                                    </td>

                                                                                                        <td class="tdQty_<?= $num; ?>">
                                                                                                            0
                                                                                                        </td>
                                                                                                        <td class="tdPrice_<?= $num; ?>">
                                                                                                        
                                                                                                            <div class="form-group input-group">
                                                                                                    
                                                                                                                <input class="form-control" name="qty[]" id="qty" type="number" value="0"> 
                                                                                                                <span class="input-group-addon">Error</span>
                                                                                                                
                                                                                                            </div>
                                                                                                        
                                                                                                        </td> 
                                                                                            <?php    
                                                                                                }
                                                                                            ?>
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
                                                <button type="submit" class="btn btn-success">Update</button>
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