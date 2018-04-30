<div class="collapse navbar-collapse navbar-ex1-collapse">


                <ul class="nav navbar-nav side-nav">
                    <br>
                   
                         <center><img src="<?= base_url(); ?>/img/logo-2.png" alt="logo" class="logo-default" width="122" height="14"/></center>
                    
                    <br>
                    <li <?php if ($link == 'a1') { echo "class='active'";}?> >
                        <a href="<?= site_url('Inventory/page/a1'); ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                   
                    <li <?php if ($link == 'p1') { echo "class='active'";}?>>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-industry"></i> Production</a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a  href="<?= site_url('Production/page/p5'); ?>"><i class="fa fa-fw fa-dashboard"></i> Production Report</a>
                            </li>
                            <li>
                                <a href="<?= site_url('Production/page/p1'); ?>"><i class="fa fa-fw fa-list-alt"></i> Request Material</a>
                            </li>
                        </ul>
                    </li>
                
                  
                </ul>
            </div>
          
        </nav>