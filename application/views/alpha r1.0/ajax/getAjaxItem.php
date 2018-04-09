
<?php if(!empty($arr)){ ?>
<tr class="list_<?= $num; ?>">
  
    <td><span><?= $arr->it_name ?></span> - <small><b><?= $arr->ty_name; ?></b></small><br><?= $arr->ct_name ?> - <?= $arr->su_name; ?></td>
    <td><input class="form-control" name="shelf[]" id="shelf" type="text" value="<?= $arr->sh_code; ?>"></td>
    <td><?= $arr->it_qty;?> <?php if(!empty($arr->un_desc)){echo $arr->un_desc;}else{ echo "Error";} ?></td>
    <td><input class="form-control" name="qty[]" id="qty" type="number"> </td>
    <!-- <td><?php if(!empty($arr->cu_acron)){echo $arr->cu_acron;}else{ echo "Error";} ?> <?= $arr->it_price; ?></td> -->
    <td>
    <label class="col-md-3 pull-left" ><?php if(!empty($arr->cu_acron)){echo $arr->cu_acron;}else{ echo "Error";} ?></label>
    <div class="col-md-8 pull-right">
        <input class="form-control" name="price[]" id="price" type="number" value="<?= $arr->it_price; ?>">           
    </div>
    </td>
    <td><button type="button" class="delBtn<?= $num; ?> btn btn-danger btn-circle btn-xs" title="Delete"><i class="fa fa-close"></i></button>
    <input type="hidden" class="form-control" name="itemId[]" id="inputItemId[]" value="<?= $this->my_func->scpro_encrypt($arr->it_id);  ?>"></td>
</tr>

<script>
		$(document).ready(function() {
			$('.delBtn<?= $num; ?>').click(function() {
				$(".list_<?= $num; ?>").remove();
			});	
		});	
</script>

<?php } else{
    
    ?>
<script>
		$(document).ready(function() {
            function growl(message, milliseconds){
                var dialog = bootbox.dialog({ 
                    message: message,
                    closeButton: false
                }); 

                setTimeout(function(){ 
                    dialog.modal('hide');
                }, milliseconds);
            
            }

            growl("This Item Does Not Exist in Inventory!", 1500);
			
		});	
</script>
<?php } ?>