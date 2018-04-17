<div class="collapse navbar-collapse navbar-ex1-collapse">


                <ul class="nav navbar-nav side-nav">
                    <br>
                   
                         <center><img src="<?= base_url(); ?>/img/logo-2.png" alt="logo" class="logo-default" width="122" height="14"/></center>
                    
                    <br>
                    <li <?php if ($link == 'a1') { echo "class='active'";}?> >
                        <a href="<?= site_url('Inventory/page/a1'); ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li <?php if ($link == 'so1') { echo "class='active'";}?>>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-th-large"></i> Inventory</a>
                        <ul id="demo3" class="collapse">
                            <li>
                                <a href="<?= site_url('Inventory/page/so1'); ?>"><i class="fa fa-fw fa-caret-square-o-down"></i> Goods Received</a>
                                
                            </li>
                            <li>
                               <a href="<?= site_url('Inventory/page/so2'); ?>"><i class="fa fa-fw fa-caret-square-o-up"></i> Goods Discharged</a>
                            </li>
                            <li>
                               <a href="<?= site_url('Inventory/page/so3'); ?>"><i class="fa fa-fw fa-exchange"></i> Goods Diverted</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php if ($link == 'p1') { echo "class='active'";}?>>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-industry"></i> Production</a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a  href="<?= site_url('Production/page/a1'); ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="<?= site_url('Production/page/p1'); ?>"><i class="fa fa-fw fa-list-alt"></i> Request Material</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li <?php if ($link == 'w1') { echo "class='active'";}?>>
                        <a href="<?= site_url('Inventory/page/w1'); ?>"><i class="fa fa-fw fa-cubes"></i> Warehouse</a>
                    </li>
                    
                    <li <?php if ($link == 'lo1') { echo "class='active'";}?>>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-fw fa-eyedropper"></i> Lab</a>
                        <ul id="demo4" class="collapse">
                            <li>
                                <a href="<?= site_url('Inventory/page/so1'); ?>"><i class="fa fa-fw fa-caret-square-o-down"></i> Stock-In</a>
                                
                            </li>
                            <li>
                               <a href="<?= site_url('Inventory/page/so2'); ?>"><i class="fa fa-fw fa-caret-square-o-up"></i> Stock-Out</a>
                            </li>
                        </ul>
                    </li>
                    
                    <?php $us_lvl = $this->my_func->scpro_decrypt($this->session->userdata('role'));?>
                    <li <?php if ($link == 'l1') { echo "class='active'";}?>>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-list"></i> Logs</a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a  href="<?= site_url('Inventory/page/l1'); ?>"><i class="fa fa-fw fa-history"></i> Item Logs</a>
                            </li>
                            <?php if ($us_lvl == 1) { ?>
                            <li>
                                <a href="<?= site_url('Inventory/page/l1.2'); ?>"><i class="fa fa-fw fa-trash"></i> Deleted Item Logs</a>
                            </li>
                            <?php }?>
                            <li>
                                <a href="<?= site_url('Inventory/page/p1'); ?>"><i class="fa fa-fw fa-dollar"></i> Price Change</a>
                            </li>
                        </ul>
                    </li>
                     <li <?php if ($link == 'l1') { echo "class='active'";}?>>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-gear"></i> Setting</a>
                        <ul id="demo1" class="collapse">
                            <li <?php if ($link == 'ty1') { echo "class='active'";}?>>
                                <a href="<?= site_url('Inventory/page/ty1'); ?>"><i class="fa fa-fw fa-tasks"></i> Type</a>
                            </li>
                            <li <?php if ($link == 'i2') { echo "class='active'";}?>>
                                <a href="<?= site_url('Inventory/page/i2'); ?>"><i class="fa fa-fw fa-cubes"></i> Item</a>
                            </li>
                            <li <?php if ($link == 't1') { echo "class='active'";}?>>
                                <a href="<?= site_url('Inventory/page/t1'); ?>"><i class="fa fa-fw fa-tag"></i> Category</a>
                            </li>
                            <?php if ($us_lvl == 1) { ?>
                            <li <?php if ($link == 'r1' ) { echo "class='active'";}?>>
                                <a href="<?= site_url('Inventory/page/r1'); ?>"><i class="fa fa-fw fa-tags"></i> Sub-category</a>
                                
                            </li>
                            <?php }?>
                            
                            
                        </ul>
                    </li>
                     <!--   <li <?php if ($link == 't1') { echo "class='active'";}?>>
                        <a href="<?= site_url('Inventory/page/t1'); ?>"><i class="fa fa-fw fa-tags"></i> Categories</a>

                    </li>
                    <li <?php if ($link == 'r1' ) { echo "class='active'";}?>>
                        <a href="<?= site_url('Inventory/page/r1'); ?>"><i class="fa fa-fw fa-tags"></i> Sub-categories</a>
                    </li> -->
                 
                  
                </ul>
            </div>
          
        </nav>