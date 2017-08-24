<body>

	<div id="wrapper">

	<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             logs
                            
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= site_url('Inventory/page/a1'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-list"></i> Logs
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4><strong>Deleted Item Logs</strong></h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example"  width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Item Name</th>
                                          
                                            <th>Date Deleted</th>
                                            <th>Deleted Status</th>
                                            <th>Reason</th>
                                            <th>Username</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                $n = 0; 
                                    if($arr != null){
                                    foreach ($arr as $log){
                                        $n++;
                                        ?>
                                        <tr>
                                            <td><?= $n ?></td>

                                           
                                            <td>
                                            <?= $log->it_name; ?>
                                                
                                            </td>
                                            <td><?= $log->dl_date; ?>  </td>
                                         
                                    
                                            <td>
                                            <span class="label" style = "background-color : <?= $log->sta_color; ?>">
                                            <?= $log->sta_desc; ?>
                                            </span>

                                            </td>
                                           
                                            
                                            <td></td>
                                            <td><?= $log->username; ?></td>
                                            <td>
                                            <center>
                                            <button type="button" class="btn btn-info btn-circle btn-xs" title="View"><i class="fa fa-eye"></i></button>
                                            
                                            <?php if($log->st_id != 5){?>
                                            &nbsp;&nbsp;&nbsp;
                                            <button type="button" class="delBtn btn btn-success btn-circle btn-xs" title="Undo Delete" id="<?= $n.'del' ?>" name="<?= $n.'del' ?>"><i class="fa fa-undo"></i></button>
                                            <input type="hidden" class="form-control <?= $n.'del' ?>" name="id" id="id" value="<?= $this->my_func->scpro_encrypt($log->it_id); ?>">
                                            <?php } ?>
                                            </center>
                                            </td>


                                        </tr>
                                        
                                   <?php
                                           }
                                
                                        }
                                        else
                                        {
                                        ?>
                                        <tr>
                                        <td colspan="8" align="center"> --No Data-- </td>
                                        </tr>


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

        $('#dataTables-example').DataTable({
            responsive: true
        
        });



        $(".delBtn").click(function() {

                    id = $(this).prop('id');
                    
                    itemid = $("."+id).val();

                   
                
                    bootbox.confirm({
                        message: "Are you sure that you want to restore this item?",
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
                                
                                $.post('<?= site_url('Inventory/res_item'); ?>', {item: itemid,del: 0}, function(data) {
                                    
                                    $(window).attr("location", "<?= site_url('Inventory/page/i2'); ?>");
                                    
                                });

                            }
                            
                            
                        }
                    });


                });




        });
        </script>
