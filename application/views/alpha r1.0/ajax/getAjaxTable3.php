<table class="table table-striped table-bordered table-hover"  width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Log status</th>
                                            <th>Item Name</th>

                                            <th>Category</th>
                                            <th>Sub-category</th>
                                            <th>Item Status</th>
                                            <th>Department</th>
                                            <th>From Qty</th>
                                            <th>To Qty</th>
                                            <th>Difference (Qty)</th>
                                            <th>Date Added</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                $n = 0; 
                                    if($arr != null){
                                    foreach ($arr as $log){
                                        $n++;
                                        ?>
                                        <tr>
                                            <td><?= $n ?></td>

                                           
                                            <td>
                                            <span class="label" style = "background-color : <?= $log->sta_color; ?>">
                                            <?= $log->sta_desc; ?>
                                            </span>
                                                
                                            </td>
                                            <td><?= $log->it_name; ?></td>
                                            <td><?= $log->ct_name; ?></td>
                                            <td><?= $log->su_name; ?></td>
                                            <td><?= $log->is_desc; ?></td>
                                            <td><?= $log->dp_dept; ?></td>
                                            <td><?= $log->lg_fromqty; ?></td>
                                            <td><?= $log->lg_toqty; ?></td>
                                            <td>

                                            <?php 
                                            if($log->lg_qtyDiff < 0)
                                            {
                                                echo $log->lg_qtyDiff;
                                            }
                                            else
                                            {
                                                echo "+".$log->lg_qtyDiff;
                                            }
                                            ?>

                                            
                                                
                                            </td>
                                           
                                            <td><?= $log->lg_date; ?></td>
                                            <td><?= $log->username; ?></td>
                                          
                                        </tr>
                                        
                                   <?php
                                           }
                                
                                        }
                                        else
                                        {
                                        ?>
                                        <tr>
                                        <td colspan="12" align="center"> --No Data-- </td>
                                        </tr>


                                        <?php } ?>

                        
                                    </tbody>
                                      <?php if (isset($page)) {?>
                            <tfoot>
                                <td colspan="12">
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
                                            <li class="prev <?= $prev; ?>"><a <?php if($prev!="disabled"){ ?>href="<?= site_url('Inventory/page/l1?page='.($page-10)); ?>"<?php } ?> title="Prev" ><i class="fa fa-angle-left"></i></a></li>                                            
                                            <li class="next <?= $next; ?>"><a <?php if($next!="disabled"){ ?>href="<?= site_url('Inventory/page/l1?page='.($page+10)); ?>"<?php } ?> title="Next"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                </td>
                            </tfoot> <?php 
                            } ?>
                                </table>