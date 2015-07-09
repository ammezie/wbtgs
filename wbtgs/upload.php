<?php
error_reporting(0);
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once 'config.php';

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                                                    if($conn->connect_error){
                                                        echo 'Unable to connect to database'.$conn->connect_error;
                                                    }  
?>
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
                                                        <li><a href="admin.php">Admin Area</a></li>
                                                        <li>Upload Result</li>
						</ul>
					</div>
				</div>
				<div id="main-content">
                                    <?php
										if(isset($_POST['result'])){
											$matric = $_POST['matric'];
											$section = $_POST['section'];
											$semester = $_POST['semester'];
											$level = $_POST['level'];
											$title = $_POST['title'];
											$code = $_POST['code'];
											$unit = $_POST['unit'];
											$score = $_POST['score'];
											
											if($matric == "" || $title == "" || $code == "" || $unit == "" || $score == ""){
				
                                                    echo "<div class=\"alert alert-danger alert-dismissable\">" 
                                                              ."<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">" . "&times;" . "</button>" . "All Fields Must be Filled."
                                                             ."</div>";
                                             }else{
												 $insert = $conn->query("INSERT INTO scores(matric, level, section, semester, course, code, unit, score) VALUES('$matric', '$level', '$section', '$semester', '$title', '$code', '$unit', '$score')");
												 }
												 if($insert){
													 header("location: upload-success.php");
													 }
	
										}
                                    ?>
					<section id='menu' class="col-md-3">
                                            <ul>
                                                <li><a href="upload.php">Upload Result</a></li>
                                            </ul>
					</section>
					<section class="col-md-9 well">
                                            <form class="form-horizontal" action="" enctype="multipart/form-data" method="post" role="form">
                                            <div class="form-group">
												<label for="matric" class="control-label col-md-2">Matric</label>
												<div class="col-md-10">
													<input type="text" class="form-control" name="matric">
												</div>
											</div>
											<div class="form-group">
												<label for="section" class="control-label col-md-2">Section</label>
												<div class="col-md-10">
													<select name="section" class="form-control">
														<option>---Select Section---</option>
														<option>2011/2012</option>
														<option>2012/2013</option>
														<option>2013/2014</option>
														<option>2014/2015</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="semester" class="control-label col-md-2">Semester</label>
												<div class="col-md-10">
													<select name="semester" class="form-control">
														<option>---Select Semester---</option>
														<option>First</option>
														<option>Second</option>
													</select>
												</div>
											</div>
                                            <div class="form-group">
												<label for="level" class="control-label col-md-2">Level</label>
												<div class="col-md-10">
													<select name="level" class="form-control">
														<option>---Select Level---</option>
														<option>ND1</option>
														<option>ND2</option>
                                                        <option>ND3</option>
													</select>
												</div>
											</div>
											<table class="table table-condensed">
                                            	<thead>
                                                	<tr>	
                                                    	<th>Course Title</th>
                                                        <th>Course Code</th>
                                                        <th>Unit</th>
                                                        <th>Score</th>
                                                    </tr>
                                                </thead>
                                                <tr>
                                                	<td><input type="text" class="form-control" name="title"></td>
                                                    <td><input type="text" class="form-control" name="code"></td>
                                                    <td><input type="text" class="form-control" name="unit"></td>
                                                    <td><input type="text" class="form-control" name="score"></td>
                                                </tr>
                                            </table>
                                                <div class="col-sm-offset-5 col-sm-7">
                                                	<button type="submit" name="result" class="btn btn-primary">Add Result</button>
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
  </body>
</html>