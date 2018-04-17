<?php if(!empty($item)){ ?>
     <?= $item->it_qty; ?>
    <input type="hidden" class="form-control" name="itemId[]" id="inputItemId[]" value="<?= $item->it_id;  ?>">
<?php }else {?>
    0
<?php } ?>