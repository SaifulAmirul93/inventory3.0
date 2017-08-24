

<link href="<?= base_url(); ?>css/strength.css" rel="stylesheet" type="text/css" />
<script src="<?= base_url(); ?>js/strength.js"></script>
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

                 <!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        
                                 <form role="form" method="post" action="<?= site_url('Inventory/updateUser'); ?>">

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
                                                                <input class="form-control" name="name" id="name" value="<?= $arr->name; ?>">
                                            
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                        <label class="col-md-2" >Email</label> 
                                                        <div class=" col-md-3">  
                                                      
                                                            <input class="form-control" name="email" id="email" value="<?= $arr->email; ?>">
                                            
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                     
                                        <div class="row">
                                            <div class="form-group">
                                            
                                              <div class="form-group">
                                                        <label class="col-md-2" >Username</label> 
                                                        <div class=" col-md-3">  
                                                                <input class="form-control" name="username" id="username" value="<?= $arr->username; ?>" >
                                            
                                                    </div>
                                                </div>
                                                    

                            
                                              
                                                    

                                            </div>
                                           
                                        </div>

                                          <div class="row">
                                             <div class="form-group"> 
                                             <div class="form-group">
                                                        <label class="col-md-2" >Membership</label> 
                                                        <div class=" col-md-3">  
                                                      
                                                            
                                                            <select class="form-control" name="role" id="role">
                                                                <option value="-1" >Select Membership</option>
                                                            <?php foreach ($lvl as $key) {
                                                                ?>
                                                                <option value="<?= $key->ul_id; ?>" <?php if($key->ul_id == $arr->role){echo " selected ";} ?>> <?= $key->ul_desc; ?></option>
                                                                <?php
                                                            } ?>
                                                            
                                                        </select>
                                            
                                                    </div>
                                                </div>
                                                </div>

                                           
                                        </div>

                                <div class="clearfix" style="height: 20px"></div>

                                <div class="row">
                                                <div class=" col-md-4">
                                                    <h3 class="page-header">Password</h3>
                                                </div>
                                               
                                        </div>




                                <div class="row">   
                                <div class="form-group"> 
                                    <div class="form-group" id="p1">
                                        <label class="col-md-2 control-label">New Password :</label>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="password" name="password" id = "password" class="form-control input-circle-left" placeholder="New Password">
                                                <span class="input-group-addon input-circle-right">
                                                    <i class="fa fa-key"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <div class="row">  
                                <div class="form-group"> 
                                    <div class="form-group" id="p2">
                                        <label class="col-md-2 control-label">Re-password :</label>
                                        <div class="col-md-3">
                                                <input type="password" id = "pass2" class="form-control input-circle" placeholder="Re-password">                                    
                                        </div>
                                    </div>
                                    </div>
                                </div>


                        <div class="row">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="col-md-2 control-label"></label>
                                    <div id="pwd-container" class="col-md-3" style="border-color: #000000; ">
                                        <div class="pwstrength_viewport_progress" ></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                           
                         <input type="hidden" name="id" id="inputId" class="form-control" value="<?= $this->my_func->scpro_encrypt($arr->id); ?>">
                    
                           <div class="clear" style="height: 50px;"></div>
                               <div class="row">
                                     <div class="form-group">
                                      <div class=" col-md-3">  
                                            <button type="submit" class="btn btn-primary" name="btnSubmit">Save</button>
                                            <a href="<?= site_url('Inventory/page/a1'); ?>" name="c5">
                                            <button type="button" class="btn btn-success">Back to Home</button>
                                            </a>
                                        </div> 
                                    </div> 
                                </div>



                    </div>
                                                                
                </form>
                                    

                        
                    </div>
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
	</div>


    <script>

$(document).ready(function() {
        $('#password').keyup(function() {
                    if ($(this).val() == "") {
                        $("#p1").prop('class', 'form-group');
                        $("#pass2").val("");
                        $("#p2").prop('class', 'form-group');
                        $("#btnSubmit").removeProp('disabled');
                    }else{
                        $("#p1").prop('class', 'form-group has-warning');
                        $("#btnSubmit").prop('disabled', 'disabled');
                    }
                });
                $('#pass2').keyup(function() {
                    if ($(this).val() == "" || $(this).val() != $('#password').val()) {
                        $("#p1").prop('class', 'form-group has-warning');
                        $("#p2").prop('class', 'form-group has-error');
                        $("#btnSubmit").prop('disabled', 'disabled');
                    }else{
                        $("#p1").prop('class', 'form-group has-success');
                        $("#p2").prop('class', 'form-group has-success');
                        $("#btnSubmit").removeProp('disabled');
                    }
                });

    });
</script>