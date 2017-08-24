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
                        <h4><strong>Item Logs</strong></h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example"  width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Log status</th>
                                            <th>Item Name</th>
                                            <th>Category</th>
                                            <th>From Qty</th>
                                            <th>To Qty</th>
                                            <th>Difference (Qty)</th>
                                            <th>Date Added</th>
                                            <th>Username</th>
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
                                            <span class="label" style = "background-color : <?= $log->sta_color; ?>">
                                            <?= $log->sta_desc; ?>
                                            </span>
                                                
                                            </td>
                                            <td><?= $log->it_name; ?></td>
                                            <td><?= $log->ct_name; ?></td>
                                            <td><?= $log->lg_fromqty; ?></td>
                                            <td><?= $log->lg_toqty; ?></td>
                                            <td>

                                            <?php 
                                            if($log->lg_qtyDiff < 0)
                                            {
                                                echo $log->lg_qtyDiff;
                                            }
                                            else
                                            {
                                                echo "+".$log->lg_qtyDiff;
                                            }
                                            ?>

                                            
                                                
                                            </td>
                                           
                                            <td><?= $log->lg_date; ?></td>
                                            <td><?= $log->username; ?></td>
                                          
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
        });
        </script>
