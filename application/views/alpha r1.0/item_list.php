



<script>

$(document).ready(function() {

    $('#category').change(function() {

            temp = $(this).val();
           
            $.post('<?= site_url('Inventory/getAjaxSearch'); ?>', {ct_id : temp}, function(data) {
               
                $("#divSub").html(data);
            });
        });


     

    });
</script>





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
                                <i class="fa fa-archive"></i> Item List
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                             <div class="row">                   
                        <div class="col-md-12">
                    <?php if($this->session->flashdata('success')){ ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong><i class="fa fa-check"></i>  Success!</strong> <?= $this->session->flashdata('success'); ?>
                            </div>
                    <?php } if($this->session->flashdata('warning')){
                    ?>
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong><i class="fa fa-exclamation-triangle"></i> Warning!</strong> <?= $this->session->flashdata('warning'); ?>
                            </div>
                    <?php } if($this->session->flashdata('info')){ ?>
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong><i class="fa fa-info-circle"></i> Info!</strong> <?= $this->session->flashdata('info'); ?>
                            </div>
                    <?php } if($this->session->flashdata('error')){ ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong><i class="fa fa-times-circle-o"></i> Error!</strong> <?= $this->session->flashdata('error'); ?> 
                            </div>
                    <?php } ?>
                        </div>
                </div>
<div class="col-md-12">
                            <div class="col-md-2">                
                               <a href="<?= site_url('Inventory/page/i1'); ?>">                             
                            <button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Add Item</button>
                            </a>
                            </div>                         
                            
                            
                       
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="input" class="col-sm-3 control-label">Category</label>
                                <div class="col-sm-9">
                                    <select name="category" id="category" class="form-control input-circle">
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
                        <div class="col-md-4">
                            <div class="form-group" id="divSub">
                                <label for="inputFilter" class="col-sm-2 control-label">Sub</label>
                                <div class="col-sm-10">
                                    <select id="subcategory" name="subcategory" class="form-control input-circle" disabled="" >
                                        <option value="-1">Select Sub-category</option>
                                       
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-default " id="sub"><i class="fa fa-search"></i> Search</button>
                        </div>
                        </div>
                        <div class="clearfix" style="height: 50px"></div>
                       
                <div class="row">
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                        <h4><strong>Item List</strong></h4>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <div class="table-responsive" id="dt">
                                <table class="table table-bordered table-striped flip-content" id="dataTables-example"  width="100%">
                                    <thead class="flip-content">
                                        <tr>
                                            <th>#</th>
                                            <!-- <th>Item Code</th> -->
                                            <th>Item Name</th>
                                            <th>Category</th>
                                            <th>Sub-category</th>
                                            <th>Quantity</th>
                                            <th>Price (RM)</th>
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

                                            <!-- <td><?= $item->it_id ?>
                                            </td> -->
                                            <td><?= $item->it_name; ?></td>
                                            <td><?= $item->ct_name; ?></td>
                                            <td><?= $item->su_name; ?></td>
                                            <td><?= $item->it_qty; ?></td>
                                            <td><?= number_format($item->it_price , 2); ?></td>
                                            <td>
                                            <?php $us_lvl = $this->my_func->scpro_decrypt($this->session->userdata('role'));?>
                                            <center>
                                            <?php if ($us_lvl != 5) { ?>
                                            &nbsp;&nbsp;&nbsp;
                                           
                                            <button type="button" class="Lorder btn btn-success btn-circle btn-xs" title="Check-In" id="L<?= $n; ?>" ><i class="fa fa-arrow-down"></i></button>

                                            &nbsp;&nbsp;&nbsp;
                                            
                                            <button type="button" class="Morder btn btn-primary btn-circle btn-xs" title="Check-Out" id="M<?= $n; ?>" ><i class="fa fa-arrow-up"></i></button>
                                            &nbsp;&nbsp;&nbsp;
                                            <br><br>
                                            <?php } ?>
                                            <a href="<?= site_url('Inventory/page/i1.2?view=').$this->my_func->scpro_encrypt($item->it_id); ?>">
                                            <button type="button" class="btn btn-info btn-circle btn-xs" title="View"><i class="fa fa-eye"></i></button></a>
                                            <?php if ($us_lvl != 5) { ?>
                                            &nbsp;&nbsp;&nbsp;
                                            <a href="<?= site_url('Inventory/page/i1.1?edit=').$this->my_func->scpro_encrypt($item->it_id); ?>">
                                            <button type="button" class="btn btn-warning btn-circle btn-xs" title="Edit"><i class="fa fa-pencil"></i></button></a>
                                            <?php } ?>

                                            <?php if (($us_lvl != 4) && ($us_lvl != 5)) { ?>
                                             &nbsp;&nbsp;&nbsp;
                                             <button type="button" class="delBtn btn btn-danger btn-circle btn-xs" title="Delete"  id="<?= $n.'del' ?>" name="<?= $n.'del' ?>"><i class="fa fa-close"></i></button>
                                             <input type="hidden" class="form-control <?= $n.'del' ?>" name="item_id" id="item_id" value="<?= $this->my_func->scpro_encrypt($item->it_id); ?>">
                                             <?php } ?>
                                             </center>
                                            </td>
                                        </tr>
                                        <tr class="L<?= $n; ?>" style="display : none;">
                                            <td colspan="8" >
                                            <form action="<?= site_url('inventory/updateQty'); ?>" method="POST">
                                                <div class="row">
                                                    <div class="col-md-10 col-md-offset-1">
                                                        <div class="row">
                                                                    <div class="col-md-4">
                                                                        <h3>Check-In</h3>
                                                                    </div>
                                                            </div>
                                                            <br>

                                                    <div class="row">
                                                            <div class="col-md-1">
                                                                <label class="control-label pull-right">Status </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                        <div class="form-group">
                                                                           
                                                                            <select class="form-control" name="status" id="status" required="">
                                                                                    <option value="-1" >Select</option>
                                                                                <?php foreach ($arr2 as $key) {
                                                                                    ?>
                                                                                    <option value="<?= $key->is_id; ?>" > <?= $key->is_desc; ?></option>
                                                                                    <?php
                                                                                } ?>
                                                                                
                                                                            </select>
                                                                             
                                                                        </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <label class="control-label pull-right">Department </label>
                                                            </div>
                                                            <div class="col-md-3">
                                                                        <div class="form-group">
                                                                           
                                                                             <select class="form-control" name="department" id="department" required="">
                                                                             <option value="" >Select Department</option>
                                                                                    <?php foreach ($arr3 as $key) {
                                                                                    ?>
                                                                                    <option value="<?= $key->dp_id; ?>" > <?= $key->dp_dept; ?></option>
                                                                                    <?php
                                                                                } ?>
                                                                            </select>
                                                                             
                                                                        </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="control-label pull-right">Quantity </label>
                                                            </div>
                                                                 <div class="col-md-2">

                                                                        <div class="form-group">
                                                                            
                                                                            <input type="number" id="qty" name="qty" class="form-control input-circle" step="0.0001"  required="">
                                                                            <div class="clearfix" style="height: 10px"></div>
                                                                            <input type="hidden" class="form-control" value ="<?= $this->my_func->scpro_encrypt($item->it_id); ?>" name="item_id">
                                                                            <input type="hidden" class="form-control" value ="1" name="st">
                                                                             <button type="submit" class="btn blue pull-right">

                                                                                <i class="fa fa-save"></i> Save
                                                                            </button>
                                                                            
                                                                        </div>
                                                                    </div>  


                                                        </div>

                                                    </div>                                      
                                                </div>
                                                </form>
                                            </td>
                                        </tr>

                                         <tr class="M<?= $n; ?>" style="display : none;">
                                            <td colspan="8" >
                                                <form action="<?= site_url('inventory/updateQty'); ?>" method="POST">
                                                        <div class="row">
                                                            <div class="col-md-10 col-md-offset-1">

                                                            <div class="row">
                                                                    <div class="col-md-4">
                                                                        <h3>Check-Out</h3>
                                                                    </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                    <div class="col-md-1">
                                                                        <label class="control-label pull-right">Status :</label>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                                <div class="form-group">
                                                                                   
                                                                                     <select class="form-control" name="status" id="status"  required="">
                                                                                    <option value="-1" >Select</option>
                                                                                <?php foreach ($arr2 as $key) {
                                                                                    ?>
                                                                                    <option value="<?= $key->is_id; ?>" > <?= $key->is_desc; ?></option>
                                                                                    <?php
                                                                                } ?>
                                                                                
                                                                            </select>
                                                                                     
                                                                                </div>
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <label class="control-label pull-right">Department :</label>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                   
                                                                                     <select class="form-control" name="department" id="department" required="">
                                                                                            <option value="" >Select Department</option>
                                                                                             <?php foreach ($arr3 as $key) {
                                                                                    ?>
                                                                                    <option value="<?= $key->dp_id; ?>" > <?= $key->dp_dept; ?></option>
                                                                                    <?php
                                                                                } ?>
                                                                            </select>
                                                                                  
                                                                                     
                                                                                </div>
                                                                    </div>


                                                                    <div class="col-md-2">
                                                                        <label class="control-label pull-right">Quantity :</label>
                                                                    </div>
                                                                         <div class="col-md-2">

                                                                                <div class="form-group">
                                                                                    
                                                                                    <input type="number" id="qty" name="qty" class="form-control input-circle" step="0.0001"  required="">
                                                                                    <div class="clearfix" style="height: 10px"></div>
                                                                                    <input type="hidden" class="form-control" value ="<?= $this->my_func->scpro_encrypt($item->it_id); ?>" name="item_id">
                                                                                    <input type="hidden" class="form-control" value ="2" name="st">
                                                                                     <button type="submit" class="btn blue pull-right">

                                                                                        <i class="fa fa-save"></i> Save
                                                                                    </button>
                                                                                    
                                                                                </div>
                                                                        </div>
                                                                </div>


                                                            </div>                                      
                                                        </div>
                                                </form>
                                            </td>
                                        </tr>
                                   <?php
                                           }
                                }else{
                    
                                        ?>
                                         <td colspan="8"><center>No Data</center></td>
                                        <?php } ?>

                        
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
                                            <li class="prev <?= $prev; ?>"><a <?php if($prev!="disabled"){ ?>href="<?= site_url('Inventory/page/i2?page='.($page-10)); ?>"<?php } ?> title="Prev" ><i class="fa fa-angle-left"></i></a></li>                                            
                                            <li class="next <?= $next; ?>"><a <?php if($next!="disabled"){ ?>href="<?= site_url('Inventory/page/i2?page='.($page+10)); ?>"<?php } ?> title="Next"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                </td>
                            </tfoot> <?php 
                            } ?>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                
                </div>
            </div>




            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
	</div>
     <script>
    $(document).ready(function() {

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
        $(".Morder").click(function() {
            temp = $(this).prop('id');

            temp2 = temp.substring(1, 2);

            temp3="L"+temp2;

            // alert(temp3);
    
            if ($("."+temp).is(':visible')) {

                $("."+temp).hide('slow');
            }else{

                $("."+temp).show('slow');
                $("."+temp3).hide('slow');

            }           
    
        });

        $(".delBtn").click(function() {

                    id = $(this).prop('id');
                    
                    itemid = $("."+id).val();
                
                    bootbox.confirm({
                        message: "Are you sure that you want to delete this item?",
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
                                
                                $.post('<?= site_url('Inventory/del_item'); ?>', {item: itemid,del: 1}, function(data) {
                                    
                                    $(window).attr("location", "<?= site_url('Inventory/page/i2'); ?>");
                                    
                                });

                            }
                            
                            
                        }
                    });


                });

        $('#sub').click(function() {

            cat = $('#category').val();

            sub = $('#subcategory').val();
           
            $.post('<?= site_url('Inventory/getAjaxTable2'); ?>', {cat_id : cat , sub_id : sub}, function(data) {
               
                $("#dt").html(data);
            });
        });

    });

        
    </script>   

 
