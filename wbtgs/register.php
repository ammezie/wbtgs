<?php 
/**
 * register.php
 * 
 * This is the registration page with which
 * students can register.
 */ 
require_once 'classes/students.php';
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
				<h4>School Of Part-Time Studies Evening (SPTSE)</h4>
				<h5>Student Transcript Generation System</h5>
			</div>
		</header>
    <div id="content" class="row">
			<div id="main" class="col-md-12">
				<div id="breadcrumb" class="row">
					<div class="col-md-12">
						<ul class="breadcrumb">
							<li><a href="index.php">Home</a></li>
							<li>Register</li>
						</ul>
					</div>
				</div>
				<div id="main-content">
					<?php
						if(form::exist()){
                                                    $validate = new validate();
                                                    $validation = $validate->check("post", array(
								'matric' => array(
									'required'  => true,
									'unique'    => 'unique',
									'numeric'   => true
								),
								'email' => array(
									'required'  => true,
								),
								'password' => array(
									'required'  => true,
									'min'       =>  6,
									'max'       =>  30
								),
								'comPass' => array(
									'matches' => 'password'
								)
							));
    
    						if($validation->passed()){
							$student = new students();
        						$register = $student->register(form::get('matric'), form::get('email'), form::get('password'));
    						}  else {
                                                       foreach ($validation->errors() as $errors) {
                                                            echo "<div class=\"alert alert-danger alert-dismissable\">" 
                                                              ."<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">" . "&times;" . "</button>" . $errors
                                                             ."</div>";
                                                        }
                                                }  
                                            }
                                        ?>
					<section id="guideline" class="col-md-6">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h3 class="panel-title">Users Guidelines</h3>
							</div>
							<div class="panel-body">
								<ol>
									<li>To use this Transcript Generation System, fill in your details accurately as required on the form. Please note that it is necessary to provide a valid email address. This will be used by the portal to send you status alerts of your application.</li>
									<li>If you are requesting for transcript, you are expected to fill the transcript request form and provide shipping details about the transcript you are requesting as follows: The name of the institution or Organization that the transcript is to be sent as well as its full address including City, State, ZIP/Postcode (for foreign addresses) and Country. Please note that the address you enter is the address that the courier will deliver your transcript to, therefore ensure that you are detailed and accurate as possible</li>
									<li>Follow the payment instruction to pay for your transcript. Please note that transcript will only be sent upon confirmation of your payment.</li>
								</ol>
							</div>
						</div>
					</section>
					<section id="login" class="col-md-6">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">Student Registration</h3>
							</div>
							<div class="panel-body">
								<form  class="form-horizontal" action="" method="post" role="form">
									<div class="form-group">
										<label for="matric" class="control-label col-xs-5">Matric</label>
										<div class="col-xs-7">
											<div class="input-group">
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-user"></span>
												</span>
                                                                                            <input type="text" class="form-control" id="matric" name="matric" value="<?php echo form::get('matric');?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="email" class="control-label col-xs-5">Email</label>
										<div class="col-xs-7">
											<div class="input-group">
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-envelope"></span>
												</span>
												<input type="email" class="form-control" id="email" name="email" value="<?php echo form::get('email');?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="password" class="control-label col-xs-5">Password</label>
										<div class="col-xs-7">
											<div class="input-group">
												<span class="input-group-addon">
												<span class="glyphicon glyphicon-lock"></span>
												</span>
												<input type="password" class="form-control" id="password" name="password">
											</div>	
										</div>
									</div>
									<div class="form-group">
										<label for="comPass" class="control-label col-xs-5">Comfirm Password</label>
										<div class="col-xs-7">
											<div class="input-group">
												<span class="input-group-addon">
												<span class="glyphicon glyphicon-lock"></span>
												</span>
												<input type="password" class="form-control" id="comPass" name="comPass">
											</div>	
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-offset-5 col-xs-7">
											<button type="submit" class="btn btn-success">
												<span class="glyphicon glyphicon-log-in"></span>
													Register
											</button>
										</div>
									</div>
									<span>Already registered? <a href="index.php">Login</a> here</span>
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