<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once 'classes/admins.php';
require_once 'classes/form.php';
require_once 'classes/validate.php';

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Transcript Generation System</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/jquery-ui.css" rel="stylesheet">
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
                                                        <li><a href="admin.php">Admin Area</a></li>
                                                        <li>Add Student</li>
						</ul>
					</div>
				</div>
				<div id="main-content">
                                    <?php
                                        if(form::exist()){
                                             $validate = new validate();
                                                    $validation = $validate->check("post", array(
								'matric' => array(
									'add-unique'    => 'add-unique',
                                                                        
								)
							));
                                              if($validation->passed()){
                                               $add = new admins();
                                                $file_name = $_FILES['pic']['name'];
                                                $temp = $_FILES['pic']['tmp_name'];
                                                $location = "img/".$file_name;
                                                    if(form::get('fname') == "" || form::get('mname') == "" || form::get('lname') == "" || form::get('matric') == "" || form::get('phone') == "" || $file_name == "" || form::get('dob') == "" || form::get('lga') == "" || form::get('addr') == ""){
                                                        echo "<div class=\"alert alert-danger alert-dismissable\">" 
                                                              ."<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">" . "&times;" . "</button>" . "All Fields are required and must be filled before submitting" 
                                                             ."</div>";
                                                    }if(move_uploaded_file($temp, $location)){
                                                            $add->addStudent(form::get('fname'), form::get('mname'), form::get('lname'), form::get('matric'), form::get('dept'), form::get('phone'), $file_name, form::get('dob'), form::get('state'), form::get('lga'), form::get('addr'), form::get('gender'));
                                                            
                                                        } else{
                                                            echo 'sorry, problem occurred';
                                                        }
                                              } else {
                                                    foreach ($validation->errors() as $errors) {
                                                            echo "<div class=\"alert alert-danger alert-dismissable\">" 
                                                              ."<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">" . "&times;" . "</button>" . $errors
                                                             ."</div>";
                                                        }
                                              }
                                         }
                                    ?>
					<section id='menu' class="col-md-3">
                                            <ul>
                                                <li><a href="add-student.php">Add Student</a></li>
                                            </ul>
					</section>
					<section class="col-md-9 well">
                    	<form  class="form-horizontal" enctype="multipart/form-data" action="" method="post" role="form">
							<div class="form-group">
								<label for="fname" class="control-label col-md-2">First Name</label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="fname">
								</div>
							</div>
							<div class="form-group">
								<label for="flname" class="control-label col-md-2">Last Name</label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="lname">
								</div>
							</div>
							<div class="form-group">
								<label for="mname" class="control-label col-md-2">Other Name</label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="mname">
								</div>
							</div>
							<div class="form-group">
								<label for="matric" class="control-label col-md-2">Matric</label>
								<div class="col-md-10">
                                                                    <input type="text" class="form-control" name="matric">
								</div>
							</div>
							<div class="form-group">
													<label for="dept" class="control-label col-md-2">Department</label>
													<div class="col-md-10">
														<select class="form-control" id="dept" name="dept">
<option>Computer Science</option>

                                                                                                </select>
													</div>
												</div>
												<div class="form-group">
													<label for="pic" class="control-label col-md-2">Student Pic</label>
                                                    <div class="col-md-10">
														<input type="file" name="pic">
														<span class="help-block">Select a JPEG picture that is not above 20kb</span>
													</div>
                                                </div>
												<div class="form-group">
								<label for="dob" class="control-label col-md-2">Date Of Birth</label>
								<div class="col-md-10">
									<input id="dob" type="text" class="form-control" name="dob">
								</div>
							</div>
							<div class="form-group">
								<label for="gender" class="control-label col-md-2">Gender</label>
								<div class="col-md-10">
									<select class="form-control" name="gender">
										<option>---- Select Gender ----</option>
										<option>Female</option>
										<option>Male</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="state" class="control-label col-md-2">State Of Origin</label>
								<div class="col-md-10">
									<select class="form-control" name="state">
										<option>---- Select State ----</option>
										<option>Abuja</option>
										<option>Abia</option>
										<option>Adamawa</option>
										<option>Akwa Ibom</option>
										<option>Anambra</option>
										<option>Bauchi</option>
										<option>Bayelsa</option>
										<option>Benue</option>
										<option>Borno</option>
										<option>Cross River</option>
										<option>Delta</option>
										<option>Ebonyi</option>
										<option>Edo</option>
										<option>Ekiti</option>
										<option>Enugu</option>
										<option>Gombe</option>
										<option>Imo</option>
										<option>Jigawa</option>
										<option>Kaduna</option>
										<option>Kano</option>
										<option>Kastina</option>
										<option>Kebbi</option>
										<option>Kogi</option>
										<option>Kwara</option>
										<option>Lagos</option>
										<option>Nasarawa</option>
										<option>Niger</option>
										<option>Ogun</option>
										<option>Ondo</option>
										<option>Osun</option>
										<option>Oyo</option>
										<option>Plateau</option>
										<option>Rivers</option>
										<option>Sokoto</option>
										<option>Taraba</option>
										<option>Yobe</option>
										<option>Zamfara</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="lga" class="control-label col-md-2">LGA</label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="lga">
								</div>
							</div>
							<div class="form-group">
								<label for="phone" class="control-label col-md-2">Telephone</label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="phone">
								</div>
							</div>
							<div class="form-group">
								<label for="addr" class="control-label col-md-2">Address</label>
								<div class="col-md-10">
									<textarea class="form-control" name="addr"></textarea>
								</div>
							</div>
                                                        <div class="form-group">
                                                            <div class="col-sm-offset-2 col-sm-10">
                                                                <button type="submit" class="btn btn-primary">Add Student</button>
                                                            </div>
                                                        </div>
						</form>
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
	<script src="js/jquery-ui.js"></script>
	<script src="js/script.js"></script>
  </body>
</html>
