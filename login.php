<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Login Admin- CRM</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="asset/css/bootstrapawal.min.css" rel="stylesheet" type="text/css" />
<link href="asset/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="asset/css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="asset/css/style.css" rel="stylesheet" type="text/css">
<link href="asset/css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	<?php 
	  include 'sistem/core.php';
	  $root = new Utility();
	  session_start();
	  $root->diLoginPage('admin');
	?>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.html">
				SISTEM INFORMASI CRM TEMBIRING AUTO DEMAK			
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<img src="asset/img/logo-ubl.jpg" width="35" height="35" alt="">
					<!-- <li class="">						
						<a href="index.php" class="">
							<i class="icon-chevron-left"></i>
							Back to Homepage
						</a>
						
					</li> -->
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container">
	
	<div class="content clearfix">
		
		<form action="proses_login.php" method="post">
		
			<h1>Admin Login</h1>		
			
			<div class="login-fields">
				
				<p>Masukkan Data</p>
				
				<div class="field">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" autofocus/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Biarkan Saya Tetap Masuk</label>
				</span>
									
				<button class="button btn btn-success btn-large">Login</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->

<script src="asset/js/jquery-1.7.2.min.js"></script>
<script src="asset/js/bootstrap.js"></script>

<script src="asset/js/signin.js"></script>

</body>

</html>
