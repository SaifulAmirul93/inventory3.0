<body>

	<div id="wrapper">

	<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Item Log
                            
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= site_url('Inventory/page/a1'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-database"></i> Item Log
                            </li>
                            <li>
                                <i class="fa fa-list"></i> Stock-In
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4>
                            <!-- <strong>Stock-In (<?= $arr->ty_name; ?>)</strong> -->
                            
                        </h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <!-- <h4>(<?= $arr->it_sku; ?>) <?= $arr->it_name; ?> | <?= $arr->ct_name; ?> | <?= $arr->su_name; ?></h4> -->
                            <div class="clearfix" style="height:5px">    
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example"  width="100%">
                                    <thead>
                                        <tr>
                                            
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>PO Number</th>
                                            <th>Department</th>
                                            <th>From Qty</th>
                                            <th>To Qty</th>
                                            <th>Diff (Qty)</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$n=0;
									foreach ($result as $key) { 
									$po="-";
									$company="-";
									$dept="-";
                                        
                                    $n++;
                                    ?>
                                        <tr>
                                            <td><?= $key->lo_date; ?></td>
                                            <td>
                                            <?= $key->is_desc;  ?>
                                               
                                            </td>
                                            <td><?php  if(!empty($key->po_number)){ $po=$key->po_number; } echo $po; ?></td>
                                            <td><?php  if(!empty($key->dp_dept)){ $dept=$key->dp_dept; } echo $dept; ?></td>
                                            <td><?= $key->lo_from; ?> <?= $key->un_desc; ?></td>
                                            <td><?= $key->lo_to; ?> <?= $key->un_desc; ?></td>
                                            <td><?php 
                                            if($key->sta_id == 1)
                                            {
                                                echo "+";
                                            }
                                            elseif ($key->sta_id == 2) 
                                            {
                                                 echo "-";
                                            }  
                                            ?><?= $key->lo_diff; ?> <?= $key->un_desc; ?></td>
                                            <td><?= $key->username; ?></td>
                                         </tr>   
                                    <?php } ?>

                                    </tbody>
                                    <tfoot>
                                        <?php
                                            $lastRow = $numPage + sizeof($result);
                                        ?>
										<tr>
												<td colspan="9">
													<ul class="pagination">
													<li>
													<div class="pull-right">
														<?= $link; ?>
													</div>
														
													</li>
														
													</ul>
													<div class="pull-right">
														<span class="btn disabled">Showing <?= ($numPage+1); ?> to <?= $lastRow; ?> of <?= $total; ?> records</span>
													</div> 
												</td>
										</tr>
									</tfoot>
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
