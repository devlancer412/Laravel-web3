<?php 
	define('BASE_URL',	base_url()); 
	define('ASSET_PATH',	base_url().'assets/adminarea/'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="Arise Admin Panel">
<meta name="keywords" content="Admin, Dashboard, Bootstrap3, Sass, transform, CSS3, HTML5, Web design, UI Design, Responsive Dashboard, Responsive Admin, Admin Theme, Best Admin UI, Bootstrap Theme, Themeforest, Bootstrap">
<meta name="author" content="Ramji">
<link rel="shortcut icon" href="img/fav.png">
<title>CRYPTO NEWS</title>
<link href="<?php echo ASSET_PATH ?>css/login.css" rel="stylesheet" media="screen">
<link href="<?php echo ASSET_PATH ?>css/animate.css" rel="stylesheet" media="screen">
<link href="<?php echo ASSET_PATH ?>fonts/icomoon/icomoon.css" rel="stylesheet">
<script src="<?php echo ASSET_PATH ?>js/jquery.min.js"></script>
<!--//pop-up-->	
 
<style>
.error{
	color:#F00;
	font:Verdana, Geneva, sans-serif; size:12 px;
	text-align:center;
	font-size:12px;
}
</style>
</head>
<body>
<form method="POST" action="<?php echo site_url('admin_login_check') ?>" id="wrapper">
  <div id="box" class="animated bounceIn">
    <div id="top_header"><img src="https://www.oxypey.com/original/assets/members_area/images/logo-black.png" class="logo" alt="ACCUBITS">
      <h5>Sign in to access to your admin </h5>
      <div class="divide-40" style="text-align:center; color:#F00;"><?php 
								if($this->session->flashdata('msg')) echo $this->session->flashdata('msg');?></div>
    </div>
	<?php echo validation_errors() ?>
    <div id="inputs">
      <div class="form-block">
        <input type="text" placeholder="Root ID" id="rootid" name="rootid" value=""><div class="error"><?php echo form_error('rootid'); ?></div>
        <i class="icon-email"></i></div>
      <div class="form-block">
        <input type="password" placeholder="Admin ID" id="adminid" name="adminid" value=""><div class="error"><?php echo form_error('adminid'); ?></div>
        <i class="icon-eye4"></i></div>
      <div class="form-block">
        <input type="password" placeholder="Password" id="c_password" name="password" value=""><div class="error"><?php echo form_error('password'); ?></div>
        <i class="icon-eye4"></i></div>        
        <div id="error"></div>				
      <input type="submit" id="members_login" value="Sign In">
    </div>
    <!--<div id="bottom" class="clearfix">
      <div class="pull-right">
        <label class="switch pull-right">
          <input type="checkbox" class="switch-input" checked="checked">
          <span class="switch-label" data-on="Yes" data-off="No"></span> <span class="switch-handle"></span></label>
      </div>
      <div class="pull-right"><span class="cb-label">Remember</span></div>
    </div>-->
  </div>
</form>
</body>

</html>