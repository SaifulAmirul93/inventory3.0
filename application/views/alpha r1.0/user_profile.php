<body>

	<div id="wrapper">

	<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             User
                            <small>Profile</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= site_url('Inventory/page/a1'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i> User Profile
                            </li>
                        </ol>
                    </div>
                </div>


                <!-- /.row -->

                    <div class="row">                   
                        <div class="col-md-12">
                    <?php if($this->session->flashdata('success')){ ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong><i class="fa fa-check"></i>  Success!</strong> <?= $this->session->flashdata('success'); ?>
                            </div>
                    <?php } if($this->session->flashdata('warning')){
                    ?>
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong><i class="fa fa-exclamation-triangle"></i> Warning!</strong> <?= $this->session->flashdata('warning'); ?>
                            </div>
                    <?php } if($this->session->flashdata('info')){ ?>
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong><i class="fa fa-info-circle"></i> Info!</strong> <?= $this->session->flashdata('info'); ?>
                            </div>
                    <?php } if($this->session->flashdata('error')){ ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong><i class="fa fa-times-circle-o"></i> Error!</strong> <?= $this->session->flashdata('error'); ?> 
                            </div>
                    <?php } ?>
                        </div>
                </div>



                 <!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        
                                 <form role="form">

                                        <div class="row">
                                            <div class=" col-md-4">
                                                <h3 class="page-header">Personal Info</h3>
                                            </div>
                                        </div>

                                        <div class="row">
                                                 <div class="form-group">
                                                  

                                             
                                                   
                                                    <div class="form-group">
                                                        <label class="col-md-2" >First Name</label> 
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="name" id="name" value="<?= $arr->name; ?>" disabled>
                                            
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                        <label class="col-md-2" >Email</label> 
                                                        <div class=" col-md-3">  
                                                      
                                                            <input class="form-control" name="email" id="email" value="<?= $arr->email; ?>" disabled>
                                            
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                     
                                        <div class="row">
                                            <div class="form-group">
                                            
                                              <div class="form-group">
                                                        <label class="col-md-2" >Username</label> 
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="username" id="username" value="<?= $arr->username; ?>" disabled>
                                            
                                                    </div>
                                                </div>
                                                    

                            
                                              
                                                    

                                            </div>
                                           
                                        </div>

                                          <div class="row">
                                             <div class="form-group"> 
                                             <div class="form-group">
                                                        <label class="col-md-2" >Membership</label> 
                                                        <div class=" col-md-3">  
                                                      
                                                            <input class="form-control" name="membership" id="membership" value="<?= $arr->ul_desc; ?>" disabled>
                                            
                                                    </div>
                                                </div>
                                                </div>

                                           
                                        </div>


                                                     
                        </form>

                
                          
                        
                                        <div class="clear" style="height: 50px;"></div>
                               <div class="row">
                                     <div class="form-group">
                                      <div class=" col-md-3"> 
                                      <a href="<?= site_url('Inventory/page/s2.1?edit=').$this->my_func->scpro_encrypt($arr->id); ?>" > 
                                            <button type="button" class="btn btn-primary">Edit</button>
                                        </a>
                                            <button type="reset" class="btn btn-danger">Cancel</button>
                                        </div> 
                                    </div> 
                                </div>
                        
                                        <div class="clear" style="height: 50px;"></div>

                        
                    </div>
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
	</div>