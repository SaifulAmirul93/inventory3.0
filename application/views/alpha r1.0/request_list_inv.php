


	<div id="wrapper">

	<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Request List
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= site_url('Inventory/page/a1'); ?>">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-th-large"></i> Inventory
                            </li>
                            <li class="active">
                                <i class="fa fa-list"></i> Request List
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
                                <h3 class="panel-title"><i class="fa fa-list fa-fw"></i> Request List</h3>                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover"  width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Request No.</th>
                                            <th>Date</th>
                                            <th>Shift</th>
                                            <th>Plan</th>
                                            <th>Shipment</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                        
                                    <tbody>
                                     <?php
									$n=0;
									foreach ($result as $key) {     
                                    $n++;
                                    ?>
                                        <tr>
                                            <td><?= $n; ?></td>
                                            <td>
                                            <?php 
                                            
                                            if ($key->re_id) 
                                            {
                                                $id='RE-'.(10000+$key->re_id);
                                            ?>
                                                 <a href="<?= site_url('Production/page/p3?edit=').$this->my_func->scpro_encrypt($key->re_id); ?>"><span style = "color : #3F6AFE;"><p style=" font-size:15px"><strong><?= $id; ?></strong></p></span></a>
                                            <?php
                                            }
                                            else{
                                            ?>
                                            --Not Set--
                                            <?php
                                            }
                                            ?>
                                            </td>
                                            <td><?= $key->re_date; ?></td>
                                            <td><?php
                                            if($key->re_shift==1){
                                                echo "A";
                                            }
                                            elseif ($key->re_shift==2) {
                                                echo "B";
                                            }
                                            else{
                                                echo "--Not Set--";
                                            } ?></td>
                                            <td>
                                                <?php
                                                if($key->re_plan==1){
                                                    echo "Night";
                                                }
                                                elseif ($key->re_plan==2) {
                                                    echo "Morning";
                                                }
                                                else{
                                                    echo "--Not Set--";
                                                }  ?>
                                            </td>
                                            <td><?= $key->re_ship; ?></td>
                                            <td>
                                            <span class="label" style = "background-color : <?= $key->rs_color; ?>;font-size:15px"><strong><?= $key->rs_desc; ?></strong></span>
                                            </td>
                                            <td>
                                            <center>
                                                <?php if($key->rs_id!=2 && $key->rs_id!=3){?>
                                                    <button type="button" class="recBtn btn btn-primary btn-xs" title="Received" name="<?= $n.'rec' ?>" id="<?= $n.'rec' ?>" ><i class="fa fa-thumbs-up"></i></button>
                                                    <input type="hidden" class="form-control <?= $n.'rec' ?>" value="<?= $this->my_func->scpro_encrypt($key->re_id); ?>">
                                                    
                                                    &nbsp;-&nbsp;
                                                <?php }?>
                                                <?php if($key->rs_id!=1){?>
                                                    <button type="button" class="priBtn btn btn-success btn-xs" title="Print" name="<?= $n.'pri' ?>" id="<?= $n.'pri' ?>"><i class="fa fa-print"></i></button>
                                                    <input type="hidden" class="form-control <?= $n.'pri' ?>" value="<?= $this->my_func->scpro_encrypt($key->re_id); ?>">                                                    
                                                    &nbsp;-&nbsp;
                                                <?php }?>
                                                <button type="button" class="delBtn btn btn-danger btn-circle btn-xs" title="Delete"  id="<?= $n.'del' ?>" name="<?= $n.'del' ?>" <?php if ($key->rs_id==2) { echo "disabled";} ?>><i class="fa fa-close"></i></button>
                                                <input type="hidden" class="form-control <?= $n.'del' ?>" value="<?= $this->my_func->scpro_encrypt($key->re_id); ?>">
                                            </center>
                                             </td>  
                                        </tr>
                                    <?php
									}
                                    ?>
                                    </tbody>

                                    <tfoot>
                                        <?php
                                            $lastRow = $numPage + sizeof($result);
                                        ?>
										<tr>
												<td colspan="8">
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


          $(".delBtn").click(function() {

                    id = $(this).prop('id');
                    reid = $("."+id).val();
                        
                    bootbox.confirm({
                        message: "Are you sure that you want to delete this request?",
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
                                
                                $.post('<?= site_url('Production/del_request'); ?>', {reid: reid}, function(data) {
                                    
                                    $(window).attr("location", "<?= site_url('Inventory/page/so4'); ?>");
                                    
                                });
                            }   
                        }
                    });
                });

                $(".priBtn").click(function() {
                    id = $(this).prop('id');
                    reid = $("."+id).val();
                            window.open("<?= site_url('Inventory/request_code?id='); ?>"+reid, '_blank');
                  
                });
        

                 $(".recBtn").click(function() {

                    id = $(this).prop('id');
                    reid = $("."+id).val();
                    
                    function growl(message, milliseconds){
                        var dialog = bootbox.dialog({ 
                            message: message,
                            closeButton: false
                        }); 

                        setTimeout(function(){ 
                            dialog.modal('hide'); 
                        }, milliseconds);
                        
                        
                    
                    }

                    growl("Request Status are Updated!", 2000);

                    $.post('<?= site_url('Inventory/request_status'); ?>', {reid: reid}, function(data) {
                                
                         $(window).attr("location", "<?= site_url('Inventory/page/so4'); ?>");
                                    
                        });
                   
                });

    });

        
    </script>

