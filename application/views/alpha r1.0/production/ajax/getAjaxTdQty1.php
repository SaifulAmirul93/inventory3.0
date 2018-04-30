<?php if(!empty($item)){ ?>
     <?= $item->it_qty; ?>
    <input type="hidden" class="form-control" name="itemId1[]" id="inputItemId1[]" value="<?= $item->it_id;  ?>">
<?php }else {?>
    0
<?php } ?>