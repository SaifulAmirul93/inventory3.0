
<div class="col-md-4">
        <div class="form-group">                                                                                                           
            <input class="form-control input-lg" name="request" id="request" placeholder="Request Number" disabled value="<?= 'RE-'.(10000+$arr->re_id); ?>">
        </div>
</div>
<div class="col-md-4">
        <div class="form-group">
            <select class="form-control input-lg" name="dept" id="dept">
                        <option value="">Send To</option>                                                                 
                        <?php foreach ($supp as $key) { ?>
                            <option value="<?= $key->dp_id; ?>" <?php if($arr->dp_id == $key->dp_id){ echo "selected"; } ?>> <?= $key->dp_dept; ?> </option>
                        <?php } ?>  
            </select> 
        </div>
</div>
                                                                