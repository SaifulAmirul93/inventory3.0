<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Nasty  Inventory - ver 4.0</title>
  
  
  
      <link rel="stylesheet" href="<?= base_url(); ?>css/style.css">

  		<link href="<?= base_url(); ?>asset/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div class="wrapper">
	<div
	 class="container">
	<img src="<?= base_url(); ?>/img/logo-3.png" alt="logo" class="logo-default"/>
		<h1 style="color: #fff">Version 4.0</h1>
		


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





		<form class="form" action="<?= site_url('Login/signin'); ?>" method="post">
			<input type="text" placeholder="Username" name="username" id="username">
			<input type="password" placeholder="Password" name="pass" id="pass">
			<select name="access" id="access">
                <option value="">Raw Material</option>
                <option value="">Apparel</option>
                <option value="">Merchandise</option>
                <option value="">Event</option>
                <option value="">Project X</option>
                <option value="">Lab</option>
                
                
            </select>
			<button type="submit" id="login-button">Login</button>
		</form>
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
