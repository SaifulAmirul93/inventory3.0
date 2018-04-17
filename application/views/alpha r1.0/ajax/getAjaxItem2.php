<?php if(!empty($arr)){ ?>
<tr class="list_<?= $num; ?>">
  
    <td>
    <?= $arr->it_name ?></span> - <small><b><?= $arr->ty_name; ?></b></small><br><?= $arr->ct_name ?> - <?= $arr->su_name; ?>
    </td>
    <td>
    <div id="bal_<?= $num; ?>">
       <span style="color:green" name="balance" id="balance"><?= $arr->it_qty;?> <?php if(!empty($arr->un_desc)){echo $arr->un_desc;}else{ echo "Error";} ?></span> 
    </div>
    </td>
    <td>
    <input class="form-control qty_<?= $num; ?>" name="qty[]" id="qty" type="number"> 
    </td>
   
    <td><button type="button" class="delBtn<?= $num; ?> btn btn-danger btn-circle btn-xs" title="Delete"><i class="fa fa-close"></i></button>
    <input type="hidden" class="form-control" name="itemId[]" id="inputItemId[]" value="<?= $this->my_func->scpro_encrypt($arr->it_id);  ?>"></td>
</tr>

<script>
		$(document).ready(function() {

            
			$('.delBtn<?= $num; ?>').click(function() {
				$(".list_<?= $num; ?>").remove();
			});	

        $('.qty_<?= $num; ?>').keyup(function() {
                qty = <?= $arr->it_qty;?>;
                unit = "<?php if(!empty($arr->un_desc)){echo $arr->un_desc;}else{ echo "Error";} ?>";
                temp = $(this).val();
                total = qty-temp;
                if (total >= 0 ) {
                $('#bal_<?= $num; ?>').html('<span style="color:green" name="balance" id="balance">'+total+' '+unit+'</span> ');    
                }
                else{
                $('#bal_<?= $num; ?>').html('<span style="color:red" name="balance" id="balance">'+total+' '+unit+'</span> ');    
                    
                }
        
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