<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Nasty  Inventory - Alpha 1.0</title>
  
  
  
      <link rel="stylesheet" href="<?= base_url(); ?>css/style2.css">

  		<link href="<?= base_url(); ?>asset/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<style>
.mySlides {
  display:none;
  height: 300px;
  
}
/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding:0}
</style>
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
  <div class="w3-content w3-display-container" style="max-width:500px">
      <div class="mySlides" style="width:100%">
            <div class="col-md-12">

                
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
      </div>
      <div class="mySlides" style="width:100%">
            <div class="col-md-12">
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
      </div>
      <div class="mySlides" style="width:100%">
            <div class="col-md-12">
                     <div style="height: 150px">
                      <img src="<?= base_url(); ?>/img/logo5x-login.png" alt="logo" width="152" height="143"/>
                    </div>
                    <div class="clearfix" style="height: 20px"></div>
                      <div class="row">
                      <a href="<?= site_url('login/lab'); ?>">
                          <button type="button" class="form-button">Lab</button>
                      </a>   
                      </div>
            </div>
      </div>
      <div class="mySlides" style="width:100%">
            <div class="col-md-12">
                   <div style="height: 150px">
                    <img src="<?= base_url(); ?>/img/logo6x-login.png" alt="logo" width="162" height="130"/>
                    </div>
                  <div class="clearfix" style="height: 20px"></div>
                  <div class="row">
                  <a href="<?= site_url('login/apparel'); ?>">  
                  <button type="button" class="form-button">Apparel</button>
                  </a>
                  </div>
                  </div>
      </div>
      <div class="mySlides" style="width:100%">
            <div class="col-md-12">
                   <div style="height: 150px">
                    <img src="<?= base_url(); ?>/img/logo7x-login.png" alt="logo" width="131" height="146"/>
                    </div>
                  <div class="clearfix" style="height: 20px"></div>
                  <div class="row">
                  <a href="<?= site_url('login/event'); ?>">  
                  <button type="button" class="form-button">Event</button>
                  </a>
                  </div>
            </div>
      </div>
      <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
        <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
        <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(4)"></span>
        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(5)"></span>
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
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
</script>
</body>
</html>
