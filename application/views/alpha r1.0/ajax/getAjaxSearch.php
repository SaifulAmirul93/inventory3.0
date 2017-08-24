<?php 
if ($cat == -1) { ?>

<label for="inputFilter" class="col-sm-2 control-label">Sub</label>
                                <div class="col-sm-10">
                                    <select id="subcategory" name="subcategory" class="form-control" disabled="" >
                                        <option value="-1">Select Sub-category</option>
                                       
                                    </select>
                                </div>
<?php }else{ ?>
<label for="inputFilter" class="col-sm-2 control-label">Sub</label>
         <div class=" col-md-10">  
                  <select class="form-control" id="subcategory" required name="subcategory">
                      <option value="-1">Select Sub-category</option>
                      <?php 
				foreach ($type as $key) { ?>
					<option value="<?= $key->su_id; ?>"> <?= $key->su_name; ?> </option>
				<?php }
				?>
                   </select>
                                                            
                                                      
        </div>


   <?php }
?>