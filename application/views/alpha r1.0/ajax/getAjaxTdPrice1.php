<?php if(!empty($item)){ ?>
              <td>
            
                <div class="form-group input-group">
        
                    <input class="form-control" name="qty1[]" id="qty1" type="number" value=""> 
                    <span class="input-group-addon"><?php if(!empty($item->un_desc)){echo $item->un_desc;}else{ echo "Error";} ?></span>
                    
                </div>
            
            </td> 

<?php }else{ ?>
            <td>
                <div class="form-group input-group">
        
                    <input class="form-control" name="qty[]" id="qty" type="number" value="0"> 
                    <span class="input-group-addon">error</span>
                    
                </div>
            </td>
<?php } ?>