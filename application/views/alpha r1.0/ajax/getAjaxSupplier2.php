<?php if($arr){ ?>
<div class="row">    
    <div class="form-group">
        <div class="form-group">
                <label class="col-md-2" >Contact Number :</label> 
            <div class=" col-md-3">  
                <input class="form-control" name="number" id="number" value="<?= $arr->sup_contact; ?>" disabled>
            </div>
        </div> 
    </div>

    <div class="form-group">
        <div class="form-group">
            <label class="col-md-2" >Email :</label> 
                <div class=" col-md-3">  
                    <input class="form-control" name="email" id="email" value="<?= $arr->sup_email; ?>" disabled>
                </div>
        </div> 
    </div>
</div>
    <div class="row">
         <div class="form-group">
            <div class="form-group">
                <label class="col-md-2" >Address :</label> 
                    <div class=" col-md-8">  
                        <textarea class="form-control" name="address" id="address" disabled><?= $arr->sup_address; ?></textarea>
                    </div>
             </div> 
        </div>
    </div>   
</div>
<input type="hidden" name="supp" id="supp" value="<?= $this->my_func->scpro_encrypt($arr->sup_id); ?>">

<?php }else{ ?>
<div class="row">    
    <div class="form-group">
        <div class="form-group">
                <label class="col-md-2" >Contact Number :</label> 
            <div class=" col-md-3">  
                <input class="form-control" name="number" id="number">
            </div>
        </div> 
    </div>

    <div class="form-group">
        <div class="form-group">
            <label class="col-md-2" >Email :</label> 
                <div class=" col-md-3">  
                    <input class="form-control" name="email" id="email">
                </div>
        </div> 
    </div>
</div>
    <div class="row">
         <div class="form-group">
            <div class="form-group">
                <label class="col-md-2" >Address :</label> 
                    <div class=" col-md-8">  
                        <textarea class="form-control" name="address" id="address"></textarea>
                    </div>
             </div> 
        </div>
    </div>   
</div>
<?php } ?>