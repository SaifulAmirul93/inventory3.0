                                               
<?php if($supp){ ?>                                      
                                                <div class="row">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <div class="col-lg-12">
                                                                    <div class="panel panel-green">
                                                                            <div class="panel-heading">
                                                                            <h3 class="panel-title"><i class="fa fa-user-circle fa-fw"></i> Supplier Info</h3>
                                                                        </div>
                                                                        <div class="panel-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="row">
                                                                                            <div class="form-group">
                                                                                                <div class="form-group">
                                                                                                    <label class="col-md-2" >Supplier Company :</label> 
                                                                                                    <div class=" col-md-3">  
                                                                                                             <select class="form-control input-lg js-example-basic-single" name="supp" id="supp" required>
                                                                                                                <option value="">New Supplier</option>
                                                                                                                <?php foreach ($supp as $key) {
                                                                                                                    ?>
                                                                                                                    <option value="<?= $key->sup_id; ?>" > <?= $key->sup_company; ?> </option>
                                                                                                                    <?php
                                                                                                                } ?>               

                                                                                                            </select> 
                                                                                                    </div>
                                                                                                </div> 
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                    <div class="form-group">
                                                                                                    <label class="col-md-2" >PO Number :</label> 
                                                                                                    <div class=" col-md-3">  
                                                                                                             <input class="form-control  input-lg" name="po" id="po" data-role="tagsinput">
                                                                                                    </div>
                                                                                                </div> 
                                                                                            </div>
                                                                                    </div>
                                                                                    <div id="supplierInfo">
                                                                                        <div class="row">
                                                                                                        <div class="form-group">
                                                                                                            <div class="form-group">
                                                                                                                <label class="col-md-2" >Contact Number :</label> 
                                                                                                                <div class=" col-md-3">  
                                                                                                                        <input class="form-control" name="number" id="number">
                                                                                                                </div>
                                                                                                            </div> 
                                                                                                        </div>

                                                                                                        <div class="form-group">
                                                                                                            <div class="form-group">
                                                                                                                <label class="col-md-2" >Email :</label> 
                                                                                                                <div class=" col-md-3">  
                                                                                                                        <input class="form-control" name="email" id="email">
                                                                                                                </div>
                                                                                                            </div> 
                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                        <div class="form-group">
                                                                                                            <div class="form-group">
                                                                                                                <label class="col-md-2" >Address :</label> 
                                                                                                                <div class=" col-md-8">  
                                                                                                                        <textarea class="form-control" name="address" id="address"></textarea>
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