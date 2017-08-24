
<?php 
if ($cat == -1) { ?>

<select id="subcategory2"  name="subcategory2" class="form-control input-circle" disabled="" >
                                        <option value="-1">Select Sub-category</option>
                                       
                                    </select>
<?php }else{ ?>

                  <select class="form-control" id="subcategory2"  name="subcategory2" >
                      <option value="">Select Sub-category</option>
                      <?php 
				foreach ($type as $key) { ?>
					<option value="<?= $key->su_id; ?>"> <?= $key->su_name; ?> </option>
				<?php }
				?>
                   </select>
                                                            
                                                      
      


   <?php }
?>

