
<table class="table table-bordered table-striped flip-content" id="dataTables"  width="100%">
                                    <thead class="flip-content">
                                        <tr>
                                            <th>#</th>
                                            <th>Item Code</th>
                                            <th>Item Name</th>
                                            <th>Category</th>
                                            <th>Sub-category</th>
                                            <th>Quantity</th>
                                         
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                $n = 0; 
                                     if($arr != null){
                                    foreach ($arr as $item){
                                        $n++;
                                        ?>
                                        <tr>
                                            <td><?= $n ?></td>

                                            <td><?= $item->it_id ?>
                                            </td>
                                            <td><?= $item->it_name; ?></td>
                                            <td><?= $item->ct_name; ?></td>
                                            <td><?= $item->su_name; ?></td>
                                            <td><?= $item->it_qty; ?></td>
                                            
                                            <td>
                                            <center>
                                            <?php $us_lvl = $this->my_func->scpro_decrypt($this->session->userdata('role'));?>
                                           <?php if ($us_lvl != 5) { ?>
                                           
                                           
                                            <button type="button" class="Lorder btn btn-danger btn-circle btn-xs" title="Check-In" id="L<?= $n; ?>" >Update NOW!</button>
                                            <?php } ?>
                                           
                                             </center>
                                            </td>
                                        </tr>

                                        <tr class="L<?= $n; ?>" style="display : none;">
                                            <td colspan="7" >
                                                <div class="row">
                                                    <div class="col-md-10 col-md-offset-1">
                                                    <div class="col-md-6">
                                                        <label class="control-label pull-right">Check-In :</label>
                                                    </div>
                                                         <div class="col-md-5">

                                                                <div class="form-group">
                                                                    <form action="<?= site_url('inventory/updateQty'); ?>" method="POST">
                                                                    <input type="number" id="qty" name="qty" class="form-control input-circle" step="0.0001" >
                                                                    <div class="clearfix" style="height: 10px"></div>
                                                                    <input type="hidden" class="form-control" value ="<?= $this->my_func->scpro_encrypt($item->it_id); ?>" name="item_id">
                                                                    <input type="hidden" class="form-control" value ="1" name="st">
                                                                     <button type="submit" class="btn blue pull-right">

                                                                        <i class="fa fa-save"></i> Save
                                                                    </button>
                                                                    </form>
                                                                </div>
                                                        </div>                                          
                                                    </div>                                      
                                                </div>
                                                
                                            </td>
                                        </tr>

                                       
                                   <?php
                                           }
                                       }
                                        else{
                                        ?>
                                        <td colspan="8"><center>No Data</center></td>
                                    <?php }?>
                                    </tbody>
                                    <?php if (isset($page)) {?>
                            <tfoot>
                                <td colspan="8">
                                <div class="col-md-5 col-sm-5">
                                    <div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">Showing <?= ($page+1); ?> to <?= ($page+$row); ?> of <?= $total; ?> records</div>
                                </div>
                                <div class="col-md-7 col-sm-7" align="right">
                                    <div class="dataTables_paginate paging_bootstrap_full_number" id="sample_1_paginate">
                                        <ul class="pagination" style="visibility: visible;">
                                        <?php
                                        $prev = "";
                                        $next = "";
                                            if ($page == 0) {
                                                $prev = "disabled";
                                            }
                                            if ($total <= ($page + 10)) {
                                                $next = "disabled";
                                            }
                                        ?>
                                            <li class="prev <?= $prev; ?>"><a <?php if($prev!="disabled"){ ?>href="<?= site_url('Inventory/page/a1?page='.($page-10)); ?>"<?php } ?> title="Prev" ><i class="fa fa-angle-left"></i></a></li>                                            
                                            <li class="next <?= $next; ?>"><a <?php if($next!="disabled"){ ?>href="<?= site_url('Inventory/page/a1?page='.($page+10)); ?>"<?php } ?> title="Next"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                </td>
                            </tfoot> <?php 
                            } ?>
                                </table>

<script type="text/javascript">
$(document).ready(function () {

      $(".Lorder").click(function() {

            temp = $(this).prop('id');

            temp2 = temp.substring(1, 2);

            temp3="M"+temp2;

            if ($("."+temp).is(':visible')) {
                $("."+temp).hide('slow');
            }else{
                $("."+temp).show('slow');
                $("."+temp3).hide('slow');
            }           
    
        });
        });
</script>