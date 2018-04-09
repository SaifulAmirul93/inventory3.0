<?php 
if ($type == -1) { ?>


<label class="col-md-2" >Category :</label> 
         <div class=" col-md-3">  
                  <select class="form-control" id="category" name="category" disabled>
                      <option value="-1">Select Category</option>
                   </select>
                                                            
                                                      
        </div>

<script>

$(document).ready(function() {
 
            $.post('<?= site_url('Inventory/getAjaxSub'); ?>', {ct_id : -1}, function(data) 
            {
               
                $("#divSub").html(data);
            });
    });
</script>

<?php }else{ ?>
<label class="col-md-2" >Category :</label> 
         <div class=" col-md-3">  
                  <select class="form-control" id="category" name="category" required="true">
                      <option value="-1">Select Category</option>
                      <?php 
				foreach ($cat as $key) { ?>
					<option value="<?= $key->ct_id; ?>"> <?= $key->ct_name; ?> </option>
				<?php }?>
                   </select>
                                                            
                                                      
        </div>
<script>

$(document).ready(function() {

    $('#category').change(function() 
        {

            temp = $(this).val();
           
            $.post('<?= site_url('Inventory/getAjaxSub'); ?>', {ct_id : temp}, function(data) 
            {
               
                $("#divSub").html(data);
            });
        });
    });
</script>

   <?php }
?>

