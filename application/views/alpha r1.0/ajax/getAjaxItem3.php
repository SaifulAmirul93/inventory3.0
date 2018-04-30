

<?php if(!empty($item)){ ?>
<tr class="list_<?= $num; ?>">
        <td>
            <?= $num; ?>
        </td>
        <td>
                <select class="item_<?= $num; ?> form-control input-md js-example-basic-single" name="item[]" id="item" required>
                <option value="">Select Item</option>
                <?php foreach ($item as $key) {?>
                    <option value="<?= $key->it_id; ?>" > <?= $key->it_name; ?> | <?= $key->ct_name; ?> | <?= $key->su_name; ?></option>
                 <?php } ?>               
                </select> 

        </td>

            <td class="tdQty_<?= $num; ?>">
                 0
            </td>
            <td class="tdPrice_<?= $num; ?>">
            
                <div class="form-group input-group">
        
                    <input class="form-control" name="qty[]" id="qty" type="number" value="0"> 
                    <span class="input-group-addon">Error</span>
                    
                </div>
            
            </td> 
      
        

        <td><button type="button" class="delBtn<?= $num; ?> btn btn-danger btn-circle btn-xs" title="Delete" id="" name=""><i class="fa fa-close"></i></button>
        
                                                                                                
</tr>

<script>
$(document).ready(function() {

            $('.js-example-basic-single').select2();
            
			$('.delBtn<?= $num; ?>').click(function() {
				$(".list_<?= $num; ?>").remove();
			});	

            $('.item_<?= $num; ?>').change(function() {

            temp = $(this).val();
            
            $.post('<?= site_url('Production/getAjaxTdQty'); ?>', {item : temp}, function(data) {
                
                $(".tdQty_<?= $num; ?>").html(data);
                
            });

             $.post('<?= site_url('Production/getAjaxTdPrice'); ?>', {item : temp}, function(data) {
                
                $(".tdPrice_<?= $num; ?>").html(data);
                
            });
        });
            
});	
</script>

<?php } ?>