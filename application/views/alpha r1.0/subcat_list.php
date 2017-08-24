


<link href="<?= base_url(); ?>asset/plugin/bootstrap-datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
<!-- <script src="<?= base_url(); ?>asset/plugin/bootstrap-datatables/jquery-1.12.4.js"></script> -->

 <script src="<?= base_url(); ?>asset/plugin/bootstrap-datatables/jquery.dataTables.min.js"></script>
 
  <script src="<?= base_url(); ?>asset/plugin/bootstrap-datatables/dataTables.bootstrap.min.js"></script>

<body>

	<div id="wrapper">

	<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Sub-categories
                            <small>List</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= site_url('Inventory/page/a1'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-archive"></i> Sub-categories List
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




                <div class="row">
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                                            
                                                         
  
                            <a href="<?= site_url('Inventory/page/r2'); ?>">                             
                            <button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Add Sub-Categories</button>
                            </a>
                       


                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example"  width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sub-catgories Code</th>
                                            <th>Sub-categories Name</th>
                                            <th>Category</th>
                                            <!-- <th>Place</th>
                                            <th>Description</th> -->
                                           <!--  <th>Date Added</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                $n = 0; 
                                    if($arr != null){
                                    foreach ($arr as $sub){
                                        $n++;
                                        ?>
                                        <tr>
                                            <td><?= $n ?></td>

                                            <td><?= $sub->su_sku ?>
                                            </td>
                                            <td><?= $sub->su_name; ?></td>
                                            <td><?= $sub->ct_name; ?></td>
                                            <!-- <td><?= $sub->place; ?></td>
                                            <td><?= $sub->descrp; ?></td> -->
                                           <!--  <td><?= $sub->date_added; ?></td> -->
                                            <td>
                                            <center>
                                            
                                            <a href="<?= site_url('Inventory/page/r4?view=').$this->my_func->scpro_encrypt($sub->su_id); ?>">
                                            <button type="button" class="btn btn-info btn-circle btn-xs" title="View"><i class="fa fa-eye"></i></button></a>
                                            &nbsp;&nbsp;&nbsp;
                                            <a href="<?= site_url('Inventory/page/r3?edit=').$this->my_func->scpro_encrypt($sub->su_id); ?>">
                                            <button type="button" class="btn btn-warning btn-circle btn-xs" title="Edit"><i class="fa fa-pencil"></i></button></a>
                                             &nbsp;&nbsp;&nbsp;
                                             
                                             <button type="button" class="delBtn btn btn-danger btn-circle btn-xs" title="Delete" id="<?= $n.'del' ?>" name="<?= $n.'del' ?>"><i class="fa fa-close"></i></button><!-- </a> -->
                                             <input type="hidden" class="form-control <?= $n.'del' ?>" name="item_id" id="item_id" value="<?= $this->my_func->scpro_encrypt($sub->su_id); ?>">
                                             </center>
                                            </td>
                                        </tr>
                                            <?php
                                           }
                                }else{
                    
                                        ?>
                                         <td colspan="5"><center>No Data</center></td>
                                        <?php } ?>

                        
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
    
   $(".delBtn").click(function() {

                    id = $(this).prop('id');
                    subid = $("."+id).val();
                        
                    bootbox.confirm({
                        message: "Are you sure that you want to delete this sub-category?",
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
                                
                                $.post('<?= site_url('Inventory/del_subcat'); ?>', {sub: subid,del: 1}, function(data) {
                                    
                                    $(window).attr("location", "<?= site_url('Inventory/page/r1'); ?>");
                                    
                                });

                            }
                            
                            
                        }
                    });


                });





        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

         
    </script>

