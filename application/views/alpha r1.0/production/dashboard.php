


<link href="<?= base_url(); ?>asset/plugin/bootstrap-datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">


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
                             Dashboard
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= site_url('Inventory/page/a1'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-archive"></i> Production
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
                    <div class="panel panel-primary">
                        <div class="panel-heading">                    
                            Production Item List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example"  width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Code</th>
                                            <th>Categories Name</th>
                                            <th>Place</th>
                                            <th>Description</th>
                                           <!--  <th>Date Added</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
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
    
  





        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

          $(".delBtn").click(function() {

                    id = $(this).prop('id');
                    catid = $("."+id).val();
                        
                    bootbox.confirm({
                        message: "Are you sure that you want to delete this category?",
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
                                
                                $.post('<?= site_url('Inventory/del_category'); ?>', {cat: catid,del: 1}, function(data) {
                                    
                                    $(window).attr("location", "<?= site_url('Inventory/page/t1'); ?>");
                                    
                                });

                            }
                            
                            
                        }
                    });


                });
    </script>
