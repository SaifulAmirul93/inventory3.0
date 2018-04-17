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
                             Warehouse
                          
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= site_url('Inventory/page/a1'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-archive"></i> Warehouse List
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

                <div class="clearfix" style="height: 50px"></div>
                       
                <div class="row">
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                        <h4><strong>Warehouse List</strong></h4>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <div class="table-responsive" id="dt">
                                <table class="table table-bordered table-striped flip-content" id="dataTables-example"  width="100%">
                                    <thead class="flip-content">
                                        <tr>
                                            <th>#</th>
                                            <th>Item Name</th>
                                            <th>Category</th>
                                            <th>Sub-category</th>
                                            <th>Quantity</th>
                                            <th>Price (RM)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                       
                                         

                        
                                    </tbody>
                                   
                         
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

 
