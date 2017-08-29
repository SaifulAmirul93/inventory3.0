<div class="collapse navbar-collapse navbar-ex1-collapse">


                <ul class="nav navbar-nav side-nav">
                    <br>
                   
                         <center><img src="<?= base_url(); ?>/img/logo-2.png" alt="logo" class="logo-default" width="122" height="14"/></center>
                    
                    <br>
                    <li <?php if ($link == 'a1') { echo "class='active'";}?> >
                        <a href="<?= site_url('Inventory/page/a1'); ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li <?php if ($link == 'i1') { echo "class='active'";}?> >
                        <a href="<?= site_url('Inventory/page/i1'); ?>"><i class="fa fa-fw fa-plus-square"></i> New Item</a>
                    </li>
                    <li <?php if ($link == 'i2') { echo "class='active'";}?>>
                        <a href="<?= site_url('Inventory/page/i2'); ?>"><i class="fa fa-fw fa-archive"></i> Item List</a>
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
                            <!-- <li>
                                <a href="<?= site_url('Inventory/page/p1'); ?>"><i class="fa fa-fw fa-dollar"></i> Price Change</a>
                            </li> -->
                        </ul>
                    </li>
                       <li <?php if ($link == 't1') { echo "class='active'";}?>>
                        <a href="<?= site_url('Inventory/page/t1'); ?>"><i class="fa fa-fw fa-tags"></i> Categories</a>

                    </li>
                    <li <?php if ($link == 'r1' ) { echo "class='active'";}?>>
                        <a href="<?= site_url('Inventory/page/r1'); ?>"><i class="fa fa-fw fa-tags"></i> Sub-categories</a>
                    </li>
                 
                  
                </ul>
            </div>
          
        </nav>