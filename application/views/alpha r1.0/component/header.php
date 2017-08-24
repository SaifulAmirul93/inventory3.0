 <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?= site_url('Inventory/page/a1'); ?>"><img src="<?= base_url(); ?>/img/logo.png" alt="logo" class="logo-default" width="200" height="24"/></a>



            </div>
            <!-- Top Menu Items -->

            <?php $us_lvl = $this->my_func->scpro_decrypt($this->session->userdata('role'));?>
            <ul class="nav navbar-right top-nav">
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <?= $this->my_func->scpro_decrypt($this->session->userdata('username')); ?>  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?= site_url('Inventory/page/s2'); ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>

                        <?php if ($us_lvl == 1) { ?>
                       <li>
                            <a href="<?= site_url('Inventory/page/s1'); ?>"><i class="fa fa-fw fa-users"></i> User List</a>
                        </li>
                        <?php } ?>

                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?= site_url('Inventory/logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>