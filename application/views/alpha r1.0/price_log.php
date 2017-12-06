<body>

	<div id="wrapper">

	<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Price Change
                            
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= site_url('Inventory/page/a1'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-list"></i> Price Change
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4><strong>Price Change</strong></h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example"  width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>status</th>
                                            <th>Item Name</th>
                                            <th>Category</th>
                                            <th>Sub-category</th>
                                            <th>From Price (RM)</th>
                                            <th>To Price (RM)</th>
                                            <th>Difference (RM)</th>
                                            <th>Date Added</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                $n = 0; 
                                    if($arr != null){
                                    foreach ($arr as $pi){
                                        $n++;
                                        ?>
                                        <tr>
                                            <td><?= $n ?></td>

                                           
                                            <td>
                                            <span class="label" style = "background-color : <?= $pi->sta_color; ?>">
                                            <?= $pi->sta_desc; ?>
                                            </span>
                                                
                                            </td>
                                            <td><?= $pi->it_name; ?></td>
                                            <td><?= $pi->ct_name; ?></td>
                                            <td><?= $pi->su_name; ?></td>
                                            <td><?= number_format($pi->pi_frprice, 2); ?></td>
                                            <td><?= number_format($pi->pi_toprice, 2); ?></td>
                                            <td>

                                            <?php 
                                            if($pi->pi_prDiff < 0)
                                            {
                                                echo number_format($pi->pi_prDiff, 2);
                                            }
                                            else
                                            {
                                                echo "+".number_format($pi->pi_prDiff, 2);
                                            }
                                            ?>

                                            
                                                
                                            </td>
                                           
                                            <td><?= $pi->pi_date; ?></td>
                                            <td><?= $pi->username; ?></td>
                                          
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
