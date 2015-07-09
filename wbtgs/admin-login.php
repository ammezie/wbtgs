<?php 
require_once 'classes/admins.php';
require_once 'classes/form.php';
require_once 'classes/validate.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Transcript Generation System</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="libs/html5shiv.min.js"></script>
      <script src="libs/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="container">
		<header id="site-header" class="row">
			<div id="logo" class="col-md-3">
				<img src="img/laspotech.png" alt="logo">
			</div>
			<div id="site-name" class="col-md-9">
				<h2>LAGOS STATE POLYTECHNIC</h2>
				<h4>School Of Part-Time Studies Evening (SPTSE)</h5>
				<h5>Student Transcript Generation System</h5>
			</div>
		</header>
		<div id="content" class="row">
			<div id="main" class="col-md-12">
				<div id="breadcrumb" class="row">
					<div class="col-md-12">
						<ul class="breadcrumb">
							<li><a href="index.php">Home</a></li>
							<li>Admin Login</li>
						</ul>
					</div>
				</div>
				<div id="main-content">
					<?php
						if(form::exist()){
							$validate = new validate();
							$validation = $validate->check("post", array(
								'username'    => array(
									'required'  => true
								),
								'password'  => array(
									'required'  => true
								)
						));
    
    						if($validation->passed()){
							$admin = new admins();
        						$login = $admin->login(form::get('username'), form::get('password'), form::get('role'));
    						}  if($validation->errors()){
                                                       foreach ($validation->errors() as $errors) {
                                                            echo "<div class=\"alert alert-danger alert-dismissable\">" 
                                                              ."<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">" . "&times;" . "</button>" . $errors
                                                             ."</div>";
                                                        }
                                                } elseif($admin->logged_in()) {
                                                    header("location: admin.php");
                                                } else {
                                                    echo "<div class=\"alert alert-danger alert-dismissable\">" 
                                                              ."<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">" . "&times;" . "</button>" . "Username/Password/Role not correct"
                                                             ."</div>";
                                                }
                                            }
                                        ?>
					<section class="center-block well" style="width:550px;">
						<p>Welcome Admin, kindly provide your admin details and select your role to login to the Admin Area</p>
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">Admin Login</h3>
							</div>
							<div class="panel-body">
								<form  class="form-horizontal" action="" method="post" role="form">
									<div class="form-group">
										<label for="username" class="control-label col-xs-4">Username</label>
										<div class="col-xs-8">
											<div class="input-group">
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-user"></span>
												</span>
												<input type="text" class="form-control" id="username" name="username">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="password" class="control-label col-xs-4">Password</label>
										<div class="col-xs-8">
											<div class="input-group">
												<span class="input-group-addon">
												<span class="glyphicon glyphicon-lock"></span>
												</span>
												<input type="password" class="form-control" id="password" name="password">
											</div>	
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-offset-4 col-xs-8">
											<button type="submit" name ="login" class="btn btn-success">
												<span class="glyphicon glyphicon-log-in"></span>
													Login
											</button>
										</div>
									</div>
									
								</form>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
<footer id="site-footer" class="row">
			<section class="col-md-12">
				<p>&copy;2013 LASPOTECH SPTSE</p>
			</section>
		</footer>
	</div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="libs/jquery-1.10.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>