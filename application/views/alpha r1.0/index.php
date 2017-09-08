<style>
#chartdiv,#chartdiv2,#chartdiv3 {
  width: 100%;
  height: 500px;
}
#chartdiv3 {
  width: 100%;
  height: 350px;
}

     
.elem {
    cursor: pointer;

      
}  

.display-none,
.display-hide {
  display: none; }                        
</style>
    <div id="wrapper">

       
        
            

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class='elem'></div> 
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    
                                    <div class="col-xs-9 text-left">
                                        <div class="huge"><?php echo $countItem ?></div>
                                        <div>Total Item In Inventory</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                <a href="<?= site_url('Inventory/page/i2'); ?>">
                                    <span class="pull-left">
                                    View Details
                                    </span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    
                                    <div class="col-xs-9 text-left">
                                        <div class="huge"><?php 
                                        if($totalQty[0]->it_qty==0)
                                        {
                                            echo 0;
                                        }
                                        else{
                                           echo $totalQty[0]->it_qty; 
                                        }
                                         ?></div>
                                        <div>Total Qty In Inventory</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                   
                                    <div class="col-xs-9 text-left">
                                        <div class="huge">RM <?php echo number_format((float) $totalVal[0]->price, 2, '.', ''); ?></div>
                                        <div>Total Value In Inventory (RM)</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-exclamation-triangle fa-fw"></i>Danger Zone</h3>
                            </div>
                            <div class="panel-body">

                            
                                <div class="row">
                                
                                    <div class="col-md-12">
                                        <div class="form-group">
                                         <div class="col-lg-5">
                                             <select name="category" id="category" class="form-control input-circle">
                                        <option value="-1" >Select Category</option>
                                                            <?php foreach ($lvl as $key) {
                                                                ?>
                                                                <option value="<?= $key->ct_id; ?>" > <?= $key->ct_name; ?></option>
                                                                <?php
                                                            } ?>
                                                            
                                    </select>
                                        </div>
                                        <div class="col-lg-5" id="divSub">
                                            <select id="subcategory" name="subcategory" class="form-control input-circle" disabled="" >
                                        <option value="-1">Select Sub-category</option>
                                       
                                    </select>
                                        </div>
                                       
                                        
                                        <div class="col-lg-2">
                                            <button type="button" id="checkBtn" class="btn btn-circle btn-success">Check</button>
                                        </div>                                            
                                        </div>
                                    </div>

                                </div>
                            
                                <div class="clearfix" style="height: 30px"></div>




                                <div class="table-responsive" id="dt">
                                <table class="table table-bordered table-striped flip-content" id="dataTables"  width="100%">
                                    <thead class="flip-content">
                                        <tr>
                                            <th>#</th>
                                            <th>Item Code</th>
                                            <th>Item Name</th>
                                            <th>Category</th>
                                            <th>Sub-category</th>
                                            <th>Quantity</th>
                                         
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                $n = 0; 
                                     if($arr != null){
                                    foreach ($arr as $item){
                                        $n++;
                                        ?>
                                        <tr>
                                            <td><?= $n ?></td>

                                            <td><?= $item->it_id ?>
                                            </td>
                                            <td><?= $item->it_name; ?></td>
                                            <td><?= $item->ct_name; ?></td>
                                            <td><?= $item->su_name; ?></td>
                                            <td><?= $item->it_qty; ?></td>
                                            
                                            <td>
                                            <center>
                                            <?php $us_lvl = $this->my_func->scpro_decrypt($this->session->userdata('role'));?>
                                           <?php if ($us_lvl != 5) { ?>
                                           
                                            <button type="button" class="Lorder btn btn-danger btn-circle btn-xs" title="Check-In" id="L<?= $n; ?>" >Update NOW!</button>
                                            <?php } ?>
                                           
                                             </center>
                                            </td>
                                        </tr>

                                        <tr class="L<?= $n; ?>" style="display : none;">
                                            <td colspan="7" >
                                                <div class="row">
                                                    <div class="col-md-10 col-md-offset-1">
                                                    <div class="col-md-6">
                                                    <label class="control-label pull-right">Check-In :</label>
                                                    </div>
                                                         <div class="col-md-5">

                                                                <div class="form-group">
                                                                    <form action="<?= site_url('inventory/updateQty'); ?>" method="POST">
                                                                    <input type="number" id="qty" name="qty" class="form-control input-circle" step="0.0001" >
                                                                    <div class="clearfix" style="height: 10px"></div>
                                                                    <input type="hidden" class="form-control" value ="<?= $this->my_func->scpro_encrypt($item->it_id); ?>" name="item_id">
                                                                    <input type="hidden" class="form-control" value ="1" name="st">
                                                                     <button type="submit" class="btn blue pull-right">

                                                                        <i class="fa fa-save"></i> Save
                                                                    </button>
                                                                    </form>
                                                                </div>
                                                            </div>                                          
                                                    </div>                                      
                                                </div>
                                                
                                            </td>
                                        </tr>
                                       
                                   <?php
                                           }
                                       }
                                        else{
                                        ?>
                                        <td colspan="8"><center>No Data</center></td>
                                    <?php }?>
                                    </tbody>
                                    <?php if (isset($page)) {?>
                            <tfoot>
                                <td colspan="8">
                                <div class="col-md-5 col-sm-5">
                                    <div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">Showing <?= ($page+1); ?> to <?= ($page+$row); ?> of <?= $total; ?> records</div>
                                </div>
                                <div class="col-md-7 col-sm-7" align="right">
                                    <div class="dataTables_paginate paging_bootstrap_full_number" id="sample_1_paginate">
                                        <ul class="pagination" style="visibility: visible;">
                                        <?php
                                        $prev = "";
                                        $next = "";
                                            if ($page == 0) {
                                                $prev = "disabled";
                                            }
                                            if ($total <= ($page + 10)) {
                                                $next = "disabled";
                                            }
                                        ?>
                                            <li class="prev <?= $prev; ?>"><a <?php if($prev!="disabled"){ ?>href="<?= site_url('Inventory/page/a1?page='.($page-10)); ?>"<?php } ?> title="Prev" ><i class="fa fa-angle-left"></i></a></li>                                            
                                            <li class="next <?= $next; ?>"><a <?php if($next!="disabled"){ ?>href="<?= site_url('Inventory/page/a1?page='.($page+10)); ?>"<?php } ?> title="Next"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                </td>
                            </tfoot> <?php 
                            } ?>
                                </table>
                            </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-line-chart"></i> Statistic for month of <?php echo date("F"); ?> <?php echo date("Y"); ?>
                            </li>
                        </ol>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    
                                    <div class="col-xs-9 text-left">
                                        <div class="huge"><?php echo $totalIn ?></div>
                                        <div>Total Check-In</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <a href="<?= site_url('Inventory/page/i2'); ?>">
                                    <span class="pull-left">
                                    View Details
                                    </span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    
                                    <div class="col-xs-9 text-left">
                                        <div class="huge"><?php echo $totalOut ?></div>
                                        <div>Total Check-Out</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                <a href="<?= site_url('Inventory/page/i2'); ?>">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                   
                                    <div class="col-xs-9 text-left">
                                        <div class="huge"><?php echo $totalDel ?></div>
                                        <div>Price Change</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                
             
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Item Statistic</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                         <div class="col-lg-3">
                                     <select name="category2" id="category2" class="form-control input-circle">
                                        <option value="-1" >Select Category</option>
                                                            <?php foreach ($lvl as $key) {
                                                                ?>
                                                                <option value="<?= $key->ct_id; ?>" > <?= $key->ct_name; ?></option>
                                                                <?php
                                                            } ?>
                                                            
                                    </select>
                                        </div>
                                        <div class="col-lg-3" id="divSub2">
                                            <select class="form-control input-circle" id="subcategory2"  name="subcategory2" >
                                        <option value=-1"">Select Sub-category</option>
                                       
                                    </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="number" name="year" id="year" class="form-control" min="2017" placeholder="Year">
                                        </div>
                                        <div class="col-lg-2">
                                            <select id="month" name="year" class="form-control">
                                                <option value="-1">-- All Month --</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="button" id="itemBtn" name="itemBtn" class="btn btn-circle btn-success">Search</button>
                                        </div>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix" style="height: 20px"></div>
                                <div id="site_statistics_loading2" class="display-none">
                                        <center><img src="<?= base_url(); ?>/img/01-progress.gif" alt="loading" width="250" height="188"/> </center>
                                        
                                        </div>
                                    <div id="code">
                                    <div class="clearfix" style="height: 100px"></div>
                                        </div>
                                        <div id="chartdiv" class="display-none"></div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    
<script type="text/javascript">
$(document).ready(function () {

 $(".elem").notify(
    "There are "+<?php echo $countDgr ?>+" items that need to update please check! ",

    { 
       
        style: 'bootstrap',
        gap: 2,
        position:"bottom right",
        autoHide: false,
    }

    ).show();

 

    $('#category').change(function() {

            temp = $(this).val();

            $.post('<?= site_url('Inventory/getAjaxSearch2'); ?>', {ct_id : temp}, function(data) {
               
                $("#divSub").html(data);
            });
        });

    $('#category2').change(function() {

            temp = $(this).val();
           
            $.post('<?= site_url('Inventory/getAjaxSearch3'); ?>', {ct_id : temp}, function(data) {
               
                $("#divSub2").html(data);
            });
        });

    $('#checkBtn').click(function() {

            cat = $('#category').val();

            sub = $('#subcategory').val();
           
            $.post('<?= site_url('Inventory/getAjaxTable'); ?>', {cat_id : cat , sub_id : sub}, function(data) {
               
                $("#dt").html(data);
            });
        });

    $(".Lorder").click(function() {

            temp = $(this).prop('id');

            temp2 = temp.substring(1, 2);

            temp3="M"+temp2;

            if ($("."+temp).is(':visible')) {
                $("."+temp).hide('slow');
            }else{
                $("."+temp).show('slow');
                $("."+temp3).hide('slow');
            }           
    
        });
$("#itemBtn").click(function() {
      
        cat2 = $('#category2').val();
        sub2 = $('#subcategory2').val();

        year = $('#year').val();
        month = $('#month').val();
       

        alert(cat2);
        alert(sub2);
       $.when($("#site_statistics_loading2").removeClass('display-none')).then(function(){        
        $.post('<?= site_url('Inventory/getAjaxGraph2') ?>', {year1 : year , month1 : month , cat1 : cat2 , sub1 : sub2}, function(data) 
        {
            $.when($('#code').html(data)).then(function(){
                $("#site_statistics_loading2").addClass('display-none');
                $("#chartdiv").removeClass('display-none');
                
            });
        });
    });
                  
    });


});

</script>