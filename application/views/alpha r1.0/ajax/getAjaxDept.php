                                               
<?php if($supp){ ?>                                      
                                                <div class="row">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <div class="col-lg-12">
                                                                    <div class="panel panel-red">
                                                                            <div class="panel-heading">
                                                                            <h3 class="panel-title"><i class="fa fa-user-circle fa-fw"></i> Department Info</h3>
                                                                        </div>
                                                                        <div class="panel-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="row">
                                                                                            <div class="form-group">
                                                                                                <div class="form-group">
                                                                                                    <label class="col-md-2" >Department :</label> 
                                                                                                    <div class=" col-md-3">  
                                                                                                             <select class="form-control input-lg js-example-basic-single" name="dept" id="dept" required>
                                                                                                                <option value="">Select Department</option>
                                                                                                                <?php foreach ($supp as $key) {
                                                                                                                    ?>
                                                                                                                    <option value="<?= $key->dp_id; ?>" > <?= $key->dp_dept; ?> </option>
                                                                                                                    <?php
                                                                                                                } ?>               

                                                                                                            </select> 
                                                                                                    </div>
                                                                                                </div> 
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">                                
                                                                                            <div class="form-group">
                                                                                                    <div class="form-group">
                                                                                                    <label class="col-md-2" >Reason :</label> 
                                                                                                    <div class=" col-md-3">  
                                                                                                            <select class="form-control input-lg js-example-basic-single" name="reason" id="reason" required>
                                                                                                                <option value="">Select Reason</option>
                                                                                                                <option value="1">Damage Item</option>
                                                                                                                <option value="2">Excess Stock</option>
                                                                                                                <option value="3">Other</option>
                                                                                                                              

                                                                                                            </select> 
                                                                                                    </div>
                                                                                                </div> 
                                                                                            </div>
                                                                                        </div>
                                                                                   
                                                                                            
                                                                                </div>
                                                                             </div>
                                                                         </div>
                                                                    </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                    </div>
<?php }?>
<script src="<?= base_url(); ?>asset/plugin/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>

<script>
$(document).ready(function() {
        $('.js-example-basic-single').select2();

         $('#supp').change(function() {
            temp = $(this).val();
 
                $.post('<?= site_url('inventory/getAjaxSupplier2'); ?>', {supplier : temp}, function(data) {
                    $('#supplierInfo').html(data);
                });
            });
});
</script>