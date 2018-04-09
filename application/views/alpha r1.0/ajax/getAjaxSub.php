<?php 
if ($cat == -1) { ?>


<label class="col-md-2" >Sub-Category :</label> 
         <div class=" col-md-3">  
                  <select class="form-control" id="subcategory" name="subcategory" disabled>
                      <option value="-1">Select Sub-category</option>
                   </select>
                                                            
                                                      
        </div>
<?php }else{ ?>
<label class="col-md-2" >Sub-Category :</label> 
         <div class=" col-md-3">  
                  <select class="form-control" id="subcategory" name="subcategory" required="true">
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