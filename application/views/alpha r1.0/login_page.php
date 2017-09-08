<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Nasty  Inventory - Alpha 1.0</title>
  
  
  
      <link rel="stylesheet" href="<?= base_url(); ?>css/style2.css">

  		<link href="<?= base_url(); ?>asset/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div class="wrapper">
	<div class="container">
	<img src="<?= base_url(); ?>/img/logo-3.png" alt="logo" class="logo-default"/>
		<h1 style="color: #fff">Login</h1>
		


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

<div class="row">
            <div class="col-md-12">
                  <div class="col-md-3">
                   <div style="height: 150px">
                      <img src="<?= base_url(); ?>/img/logo3x-login.png" alt="logo" width="152" height="144"/>
                  </div>
                  <div class="clearfix" style="height: 20px"></div>
                  <div class="row">
                    
                      <a href="<?= site_url('login/raw'); ?>">
                        <button type="button" class="form-button">Raw Material</button>
                      </a>
                  </div>
                  </div>
                   <div class="col-md-3">
                    <div style="height: 150px">
                        <img src="<?= base_url(); ?>/img/logo4x-login.png" alt="logo" width="162" height="130"/>
                    </div>
                        <div class="clearfix" style="height: 20px"></div>
                      <div class="row">
                            <a href="<?= site_url('login/finish'); ?>">
                            <button type="button" class="form-button">Finishing</button>
                            </a>
                          
                      </div> 
                  </div>
                  <div class="col-md-3">
                   <div style="height: 150px">
                    <img src="<?= base_url(); ?>/img/logo5x-login.png" alt="logo" width="152" height="143"/>
                  </div>
                  <div class="clearfix" style="height: 20px"></div>
                  <div class="row">
                      <button type="button" class="form-button">Lab</button>
                    
                  </div>
                  </div>
                  <div class="col-md-3">
                   <div style="height: 150px">
                    <img src="<?= base_url(); ?>/img/logo6x-login.png" alt="logo" width="162" height="130"/>
                    </div>
                  <div class="clearfix" style="height: 20px"></div>
                  <div class="row">
                    
                  <button type="button" class="form-button">Apparel</button>
                  
                  </div>
                  </div>
      </div>
 

	</div>

	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="<?= base_url(); ?>asset/plugin/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="<?= base_url(); ?>js/index.js"></script> -->

</body>
</html>
