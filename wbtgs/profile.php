<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once 'config.php';
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
							<li><a href='index.php'>Home</a></li>
                                                        <li>Student's Profile</li>
                                                        <li><a href="logout.php">Log Out</a></li>
						</ul>
					</div>
				</div>
				<div id="main-content">
					<section class="well center-block" style="width:850px">
                                            <?php
                                                if(isset($_SESSION['loggedIn']) && isset($_SESSION['matric'])){
                                                    $matric = $_SESSION['matric'];
                                                echo '<p>' . 'Welcome ' . '<b>' .$matric . '</b>' . '</p>';
                                                }  else {
                                                    header("location: index.php");
                                                }
                                                
                                            ?>
                                            <table class="table">
                                                <caption><h3>Student's Profile</h3></caption>
                                                <?php
                                                  $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                                                    if($conn->connect_error){
                                                        echo 'Unable to connect to database'.$conn->connect_error;
                                                    }  else {
                                                        $result = $conn->query("SELECT * FROM students_bio WHERE matric = $matric");
                                                        if($result->num_rows == 1){
                                                            while($row = mysqli_fetch_assoc($result)){
                                                            echo '<tr>';
                                                            echo '<td>'.'</td>';
                                                            echo '<td style="text-align: right">';
                                                            ?>
                                                                 <img class="profile-pic" src="img/<?php echo $row['pic'];?>" alt="Student Pic" class="img-thumbnail">
                                                                 <?php
                                                            echo '</td>';
                                                            echo '</tr>';
                                                            echo '<tr>';
                                                            echo '<td>Name:</td>';
                                                            echo '<td>'.$row['lname'].' '.$row['mname'].' '.$row['fname'].'</td>';
                                                            echo '</tr>';
                                                            echo '<tr>';
                                                            echo '<td>Department:</td>';
                                                            echo '<td>'.$row['dept'].'</td>';
                                                            echo '</tr>';
                                                            echo '<tr>';
                                                            echo '<td>Matric:</td>';
                                                            echo '<td>'.$row['matric'].'</td>';
                                                            echo '</tr>';
                                                            echo '</table>';
                                                        }
                                                        }  else {
                                                            header("location: no-profile.php");
                                                        }
                                                        
                                                    }  
                                                
                                                 
                                          ?>
										  <div class="links">
                                                <a href='view-transcript.php' class="btn btn-primary">View Transcript</a>
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