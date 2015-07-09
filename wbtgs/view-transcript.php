<?php
error_reporting(0);
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
	<style>
		table{font-size:12px;}
	</style>
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
					<section class="center-block well" style="width:850px">
                                            <?php
                                                if(isset($_SESSION['loggedIn']) && isset($_SESSION['matric'])){
                                                    $matric = $_SESSION['matric'];
                                                }  else {
                                                    header("location: index.php");
                                                }
                                                
                                            ?>
                                            <table class="table table-condensed">
                                                <caption><h3>Student's Transcript</h3></caption>
                                                <?php
                                                  $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                                                    if($conn->connect_error){
                                                        echo 'Unable to connect to database'.$conn->connect_error;
                                                    }  else {
                                                        $result = $conn->query("SELECT * FROM students_bio WHERE matric = $matric");
                                                        while($row = mysqli_fetch_assoc($result)){
                                                            $pic = $row['pic'];
                                                            
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
                                                    }  
													
                                                $query1 = $conn->query("SELECT * FROM scores WHERE matric = $matric");
												$query2 = $conn->query("SELECT * FROM scores WHERE matric = $matric");
												$query3 = $conn->query("SELECT * FROM scores WHERE matric = $matric");
												$query4 = $conn->query("SELECT * FROM scores WHERE matric = $matric");
												$query5 = $conn->query("SELECT * FROM scores WHERE matric = $matric");
												$query6 = $conn->query("SELECT * FROM scores WHERE matric = $matric");
												
												?>
                                                <table class="table table-condensed table-striped">
										  		<caption style="text-align:left"><strong>ND1 First Semester</strong></caption>
												<thead>
												<tr>
													<th>Course</th>
													<th>Course Code</th>
													<th>Credit Unit</th>
													<th>Score</th>
												</tr>
											</thead>
                                            <tbody>
											  
											<?php
												$ND1FScore1=$ND1FScore2=$ND1FScore3=$ND1FScore4=$ND1FScore5=$ND1FScore6=$ND1FScore7=$ND1FScore8=$ND1FScore9=$ND1FUnit1=$ND1FUnit2=$ND1FUnit3=$ND1FUnit4=$ND1FUnit5=$ND1FUnit6=$ND1FUnit7=$ND1FUnit8=$ND1FUnit9 = 0;
											  while($col = mysqli_fetch_assoc($query1)){
												
												  if($col['course'] == "Introduction to Computing"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND1FUnit1 = $col['unit'];
													  $ND1FScore1 = $col['score'];
												  }
												  if($col['course'] == "Introduction to Digital Electronics"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND1FUnit2 = $col['unit'];
													  $ND1FScore2 = $col['score'];
												  }
												  if($col['course'] == "Citizenship Education I"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND1FUnit3 = $col['unit'];
													  $ND1FScore3 = $col['score'];
												  }
												  if($col['course'] == "Library User Education"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND1FUnit4 = $col['unit'];
													  $ND1FScore4 = $col['score'];
												  }
												  if($col['course'] == "Introduction to Computer Programming"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND1FUnit5 = $col['unit'];
													  $ND1FScore5 = $col['score'];
												  }
												  if($col['course'] == "Descriptive Statistics I"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND1FUnit6 = $col['unit'];
													  $ND1FScore6 = $col['score'];
												  }
												  if($col['course'] == "Logic And Linear Algebra"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND1FUnit7 = $col['unit'];
													  $ND1FScore7 = $col['score'];
												  }
												  if($col['course'] == "Technical English I"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND1FUnit8 = $col['unit'];
													  $ND1FScore8 = $col['score'];
												  }
												  if($col['course'] == "Compulsory Computer Education I"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND1FUnit9 = $col['unit'];
													  $ND1FScore9 = $col['score'];
												  }
												  
											 }
											  
											if($ND1FScore1 >= 75){
												$grade = "4.00";
											 }												
											if($ND1FScore1 >= 70 && $ND1FScore1 < 75){
												$grade = "3.50";
											}
											if($ND1FScore1 >= 65 && $ND1FScore1 < 70){																						
												$grade = "3.25";																						
											}
											if($ND1FScore1 >= 60 && $ND1FScore1 < 65){
												$grade =  "3.00";
											}
											if($ND1FScore1 >= 55 && $ND1FScore1 < 60){
												$grade = "2.75";
											}
											if($ND1FScore1 >= 50 && $ND1FScore1 < 55){
												$grade = "2.50";
											}
											if($ND1FScore1 >= 45 && $ND1FScore1 < 50){
												$grade = "2.25";
											}											
											if($ND1FScore1 >= 40 && $ND1FScore1 < 45){
												$grade = "2.00";
											}
											if($ND1FScore1 >= 0 && $ND1FScore1 < 40){
												$grade = "0.00";
											}
											$ND1Fgp1  = $grade * $ND1FUnit1;
											
											if($ND1FScore2 >= 75){
												$grade = "4.00";
											 }												
											if($ND1FScore2 >= 70 && $ND1FScore2 < 75){
												$grade = "3.50";
											}
											if($ND1FScore2 >= 65 && $ND1FScore2 < 70){																						
												$grade = "3.25";																						
											}
											if($ND1FScore2 >= 60 && $ND1FScore2 < 65){
												$grade =  "3.00";
											}
											if($ND1FScore2 >= 55 && $ND1FScore2 < 60){
												$grade = "2.75";
											}
											if($ND1FScore2 >= 50 && $ND1FScore2 < 55){
												$grade = "2.50";
											}
											if($ND1FScore2 >= 45 && $ND1FScore2 < 50){
												$grade = "2.25";
											}											
											if($ND1FScore2 >= 40 && $ND1FScore2 < 45){
												$grade = "2.00";
											}
											if($ND1FScore2 >= 0 && $ND1FScore2 < 40){
												$grade = "0.00";
											}
											$ND1Fgp2  = $grade * $ND1FUnit2;
											
											if($ND1FScore3 >= 75){
												$grade = "4.00";
											 }												
											if($ND1FScore3 >= 70 && $ND1FScore3 < 75){
												$grade = "3.50";
											}
											if($ND1FScore3 >= 65 && $ND1FScore3 < 70){																						
												$grade = "3.25";																						
											}
											if($ND1FScore3 >= 60 && $ND1FScore3 < 65){
												$grade =  "3.00";
											}
											if($ND1FScore3 >= 55 && $ND1FScore3 < 60){
												$grade = "2.75";
											}
											if($ND1FScore3 >= 50 && $ND1FScore3 < 55){
												$grade = "2.50";
											}
											if($ND1FScore3 >= 45 && $ND1FScore3 < 50){
												$grade = "2.25";
											}											
											if($ND1FScore3 >= 40 && $ND1FScore3 < 45){
												$grade = "2.00";
											}
											if($ND1FScore3 >= 0 && $ND1FScore3 < 40){
												$grade = "0.00";
											}
											$ND1Fgp3  = $grade * $ND1FUnit3;
											
											if($ND1FScore4 >= 75){
												$grade = "4.00";
											 }												
											if($ND1FScore4 >= 70 && $ND1FScore4 < 75){
												$grade = "3.50";
											}
											if($ND1FScore4 >= 65 && $ND1FScore4 < 70){																						
												$grade = "3.25";																						
											}
											if($ND1FScore4 >= 60 && $ND1FScore4 < 65){
												$grade =  "3.00";
											}
											if($ND1FScore4 >= 55 && $ND1FScore4 < 60){
												$grade = "2.75";
											}
											if($ND1FScore4 >= 50 && $ND1FScore4 < 55){
												$grade = "2.50";
											}
											if($ND1FScore4 >= 45 && $ND1FScore4 < 50){
												$grade = "2.25";
											}											
											if($ND1FScore4 >= 40 && $ND1FScore4 < 45){
												$grade = "2.00";
											}
											if($ND1FScore4 >= 0 && $ND1FScore4 < 40){
												$grade = "0.00";
											}
											$ND1Fgp4  = $grade * $ND1FUnit4;
											
											if($ND1FScore5 >= 75){
												$grade = "4.00";
											 }												
											if($ND1FScore5 >= 70 && $ND1FScore5 < 75){
												$grade = "3.50";
											}
											if($ND1FScore5 >= 65 && $ND1FScore5 < 70){																						
												$grade = "3.25";																						
											}
											if($ND1FScore5 >= 60 && $ND1FScore5 < 65){
												$grade =  "3.00";
											}
											if($ND1FScore5 >= 55 && $ND1FScore5 < 60){
												$grade = "2.75";
											}
											if($ND1FScore5 >= 50 && $ND1FScore5 < 55){
												$grade = "2.50";
											}
											if($ND1FScore5 >= 45 && $ND1FScore5 < 50){
												$grade = "2.25";
											}											
											if($ND1FScore5 >= 40 && $ND1FScore5 < 45){
												$grade = "2.00";
											}
											if($ND1FScore5 >= 0 && $ND1FScore5 < 40){
												$grade = "0.00";
											}
											$ND1Fgp5  = $grade * $ND1FUnit5;
											
											if($ND1FScore6 >= 75){
												$grade = "4.00";
											 }												
											if($ND1FScore6 >= 70 && $ND1FScore6 < 75){
												$grade = "3.50";
											}
											if($ND1FScore6 >= 65 && $ND1FScore6 < 70){																						
												$grade = "3.25";																						
											}
											if($ND1FScore6 >= 60 && $ND1FScore6 < 65){
												$grade =  "3.00";
											}
											if($ND1FScore6 >= 55 && $ND1FScore6 < 60){
												$grade = "2.75";
											}
											if($ND1FScore6 >= 50 && $ND1FScore6 < 55){
												$grade = "2.50";
											}
											if($ND1FScore6 >= 45 && $ND1FScore6 < 50){
												$grade = "2.25";
											}											
											if($ND1FScore6 >= 40 && $ND1FScore6 < 45){
												$grade = "2.00";
											}
											if($ND1FScore6 >= 0 && $ND1FScore6 < 40){
												$grade = "0.00";
											}
											$ND1Fgp6  = $grade * $ND1FUnit6;
											
											if($ND1FScore7 >= 75){
												$grade = "4.00";
											 }												
											if($ND1FScore7 >= 70 && $ND1FScore7 < 75){
												$grade = "3.50";
											}
											if($ND1FScore7 >= 65 && $ND1FScore7 < 70){																						
												$grade = "3.25";																						
											}
											if($ND1FScore7 >= 60 && $ND1FScore7 < 65){
												$grade =  "3.00";
											}
											if($ND1FScore7 >= 55 && $ND1FScore7 < 60){
												$grade = "2.75";
											}
											if($ND1FScore7 >= 50 && $ND1FScore7 < 55){
												$grade = "2.50";
											}
											if($ND1FScore7 >= 45 && $ND1FScore7 < 50){
												$grade = "2.25";
											}											
											if($ND1FScore7 >= 40 && $ND1FScore7 < 45){
												$grade = "2.00";
											}
											if($ND1FScore7 >= 0 && $ND1FScore7 < 40){
												$grade = "0.00";
											}
											$ND1Fgp7  = $grade * $ND1FUnit7;
											
											if($ND1FScore8 >= 75){
												$grade = "4.00";
											 }												
											if($ND1FScore8 >= 70 && $ND1FScore8 < 75){
												$grade = "3.50";
											}
											if($ND1FScore8 >= 65 && $ND1FScore8 < 70){																						
												$grade = "3.25";																						
											}
											if($ND1FScore8 >= 60 && $ND1FScore8 < 65){
												$grade =  "3.00";
											}
											if($ND1FScore8 >= 55 && $ND1FScore8 < 60){
												$grade = "2.75";
											}
											if($ND1FScore8 >= 50 && $ND1FScore8 < 55){
												$grade = "2.50";
											}
											if($ND1FScore8 >= 45 && $ND1FScore8 < 50){
												$grade = "2.25";
											}											
											if($ND1FScore8 >= 40 && $ND1FScore8 < 45){
												$grade = "2.00";
											}
											if($ND1FScore8 >= 0 && $ND1FScore8 < 40){
												$grade = "0.00";
											}
											$ND1Fgp8  = $grade * $ND1FUnit8;
											
											if($ND1FScore9 >= 75){
												$grade = "4.00";
											 }												
											if($ND1FScore9 >= 70 && $ND1FScore9 < 75){
												$grade = "3.50";
											}
											if($ND1FScore9 >= 65 && $ND1FScore9 < 70){																						
												$grade = "3.25";																						
											}
											if($ND1FScore9 >= 60 && $ND1FScore9 < 65){
												$grade =  "3.00";
											}
											if($ND1FScore9 >= 55 && $ND1FScore9 < 60){
												$grade = "2.75";
											}
											if($ND1FScore9 >= 50 && $ND1FScore9 < 55){
												$grade = "2.50";
											}
											if($ND1FScore9 >= 45 && $ND1FScore9 < 50){
												$grade = "2.25";
											}											
											if($ND1FScore9 >= 40 && $ND1FScore9 < 45){
												$grade = "2.00";
											}
											if($ND1FScore9 >= 0 && $ND1FScore9 < 40){
												$grade = "0.00";
											}
											$ND1Fgp9  = $grade * $ND1FUnit9;
											
											$totalGP = $ND1Fgp1 + $ND1Fgp2 + $ND1Fgp3 + $ND1Fgp4 + $ND1Fgp5 + $ND1Fgp6 + $ND1Fgp7 + $ND1Fgp8 + $ND1Fgp9;
											$totalUnits = $ND1FUnit1 + $ND1FUnit2 + $ND1FUnit3 + $ND1FUnit4 + $ND1FUnit5 + $ND1FUnit6 + $ND1FUnit7 + $ND1FUnit8 + $ND1FUnit9;
											$GPA1 = round($totalGP / $totalUnits, 2);
											$CGPA = $GPA1;
											echo '<tr>'.'<td>'.'Your GPA For This Semester is: '.'<b>'.$GPA1.'</b>'.'</td>'.'</tr>';
											echo '<tr>'.'<td>'.'Your CGPA is: '.'<b>'.$CGPA.'</b>'.'</td>'.'</tr>';
                                          ?>	
											</tbody>
										 </table>
                                         <table class="table table-condensed table-striped">
										  		<caption style="text-align:left"><strong>ND1 Second Semester</strong></caption>
												<thead>
												<tr>
													<th>Course</th>
													<th>Course Code</th>
													<th>Credit Unit</th>
													<th>Score</th>
												</tr>
											</thead>
                                            <tbody>
											  
											<?php
												$ND2FScore1=$ND2FScore2=$ND2FScore3=$ND2FScore4=$ND2FScore5=$ND2FScore6=$ND2FScore7=$ND2FUnit1=$ND2FUnit2=$ND2FUnit3=$ND2FUnit4=$ND2FUnit5=$ND2FUnit6=$ND2FUnit7 = 0;
											  while($col = mysqli_fetch_assoc($query2)){
												
												  if($col['course'] == "Elementary Probabilty Theory"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND1SUnit1 = $col['unit'];
													  $ND1SScore1 = $col['score'];
												  }
												  if($col['course'] == "Function and Geometry"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND1SUnit2 = $col['unit'];
													  $ND1SScore2 = $col['score'];
												  }
												  if($col['course'] == "Introduction to The Internet"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND1SUnit3 = $col['unit'];
													  $ND1SScore3 = $col['score'];
												  }
												  if($col['course'] == "Computer Packages I"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND1SUnit4 = $col['unit'];
													  $ND1SScore4 = $col['score'];
												  }
												  if($col['course'] == "Citizenship Education II"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND1SUnit5 = $col['unit'];
													  $ND1SScore5 = $col['score'];
												  }
												  if($col['course'] == "Technical English II"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND1SUnit6 = $col['unit'];
													  $ND1SScore6 = $col['score'];
												  }if($col['course'] == "OO Java"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND1SUnit7 = $col['unit'];
													  $ND1SScore7 = $col['score'];
												  }
												  	
											 }
											if($ND1SScore1 >= 75){
												$grade = "4.00";
											 }												
											if($ND1SScore1 >= 70 && $ND1SScore1 < 75){
												$grade = "3.50";
											}
											if($ND1SScore1 >= 65 && $ND1SScore1 < 70){																						
												$grade = "3.25";																						
											}
											if($ND1SScore1 >= 60 && $ND1SScore1 < 65){
												$grade =  "3.00";
											}
											if($ND1SScore1 >= 55 && $ND1SScore1 < 60){
												$grade = "2.75";
											}
											if($ND1SScore1 >= 50 && $ND1SScore1 < 55){
												$grade = "2.50";
											}
											if($ND1SScore1 >= 45 && $ND1SScore1 < 50){
												$grade = "2.25";
											}											
											if($ND1SScore1 >= 40 && $ND1SScore1 < 45){
												$grade = "2.00";
											}
											if($ND1SScore1 >= 0 && $ND1SScore1 < 40){
												$grade = "0.00";
											}
											$ND1Sgp1  = $grade * $ND1SUnit1;
											
											if($ND1SScore2 >= 75){
												$grade = "4.00";
											 }												
											if($ND1SScore2 >= 70 && $ND1SScore2 < 75){
												$grade = "3.50";
											}
											if($ND1SScore2 >= 65 && $ND1SScore2 < 70){																						
												$grade = "3.25";																						
											}
											if($ND1SScore2 >= 60 && $ND1SScore2 < 65){
												$grade =  "3.00";
											}
											if($ND1SScore2 >= 55 && $ND1SScore2 < 60){
												$grade = "2.75";
											}
											if($ND1SScore2 >= 50 && $ND1SScore2 < 55){
												$grade = "2.50";
											}
											if($ND1SScore2 >= 45 && $ND1SScore2 < 50){
												$grade = "2.25";
											}											
											if($ND1SScore2 >= 40 && $ND1SScore2 < 45){
												$grade = "2.00";
											}
											if($ND1SScore2 >= 0 && $ND1SScore2 < 40){
												$grade = "0.00";
											}
											$ND1Sgp2  = $grade * $ND1SUnit2;
											
											if($ND1SScore3 >= 75){
												$grade = "4.00";
											 }												
											if($ND1SScore3 >= 70 && $ND1SScore3 < 75){
												$grade = "3.50";
											}
											if($ND1SScore3 >= 65 && $ND1SScore3 < 70){																						
												$grade = "3.25";																						
											}
											if($ND1SScore3 >= 60 && $ND1SScore3 < 65){
												$grade =  "3.00";
											}
											if($ND1SScore3 >= 55 && $ND1SScore3 < 60){
												$grade = "2.75";
											}
											if($ND1SScore3 >= 50 && $ND1SScore3 < 55){
												$grade = "2.50";
											}
											if($ND1SScore3 >= 45 && $ND1SScore3 < 50){
												$grade = "2.25";
											}											
											if($ND1SScore3 >= 40 && $ND1SScore3 < 45){
												$grade = "2.00";
											}
											if($ND1SScore3 >= 0 && $ND1SScore3 < 40){
												$grade = "0.00";
											}
											$ND1Sgp3  = $grade * $ND1SUnit3;
											
											if($ND1SScore4 >= 75){
												$grade = "4.00";
											 }												
											if($ND1SScore4 >= 70 && $ND1SScore4 < 75){
												$grade = "3.50";
											}
											if($ND1SScore4 >= 65 && $ND1SScore4 < 70){																						
												$grade = "3.25";																						
											}
											if($ND1SScore4 >= 60 && $ND1SScore4 < 65){
												$grade =  "3.00";
											}
											if($ND1SScore4 >= 55 && $ND1SScore4 < 60){
												$grade = "2.75";
											}
											if($ND1SScore4 >= 50 && $ND1SScore4 < 55){
												$grade = "2.50";
											}
											if($ND1SScore4 >= 45 && $ND1SScore4 < 50){
												$grade = "2.25";
											}											
											if($ND1SScore4 >= 40 && $ND1SScore4 < 45){
												$grade = "2.00";
											}
											if($ND1SScore4 >= 0 && $ND1SScore4 < 40){
												$grade = "0.00";
											}
											$ND1Sgp4  = $grade * $ND1SUnit4;
											
											if($ND1SScore5 >= 75){
												$grade = "4.00";
											 }												
											if($ND1SScore5 >= 70 && $ND1SScore5 < 75){
												$grade = "3.50";
											}
											if($ND1SScore5 >= 65 && $ND1SScore5 < 70){																						
												$grade = "3.25";																						
											}
											if($ND1SScore5 >= 60 && $ND1SScore5 < 65){
												$grade =  "3.00";
											}
											if($ND1SScore5 >= 55 && $ND1SScore5 < 60){
												$grade = "2.75";
											}
											if($ND1SScore5 >= 50 && $ND1SScore5 < 55){
												$grade = "2.50";
											}
											if($ND1SScore5 >= 45 && $ND1SScore5 < 50){
												$grade = "2.25";
											}											
											if($ND1SScore5 >= 40 && $ND1SScore5 < 45){
												$grade = "2.00";
											}
											if($ND1SScore5 >= 0 && $ND1SScore5 < 40){
												$grade = "0.00";
											}
											$ND1Sgp5  = $grade * $ND1SUnit5;
											
											if($ND1SScore6 >= 75){
												$grade = "4.00";
											 }												
											if($ND1SScore6 >= 70 && $ND1SScore6 < 75){
												$grade = "3.50";
											}
											if($ND1SScore6 >= 65 && $ND1SScore6 < 70){																						
												$grade = "3.25";																						
											}
											if($ND1SScore6 >= 60 && $ND1SScore6 < 65){
												$grade =  "3.00";
											}
											if($ND1SScore6 >= 55 && $ND1SScore6 < 60){
												$grade = "2.75";
											}
											if($ND1SScore6 >= 50 && $ND1SScore6 < 55){
												$grade = "2.50";
											}
											if($ND1SScore6 >= 45 && $ND1SScore6 < 50){
												$grade = "2.25";
											}											
											if($ND1SScore6 >= 40 && $ND1SScore6 < 45){
												$grade = "2.00";
											}
											if($ND1SScore6 >= 0 && $ND1SScore6 < 40){
												$grade = "0.00";
											}
											$ND1Sgp6  = $grade * $ND1SUnit6;
											
											if($ND1SScore7 >= 75){
												$grade = "4.00";
											 }												
											if($ND1SScore7 >= 70 && $ND1SScore7 < 75){
												$grade = "3.50";
											}
											if($ND1SScore7 >= 65 && $ND1SScore7 < 70){																						
												$grade = "3.25";																						
											}
											if($ND1SScore7 >= 60 && $ND1SScore7 < 65){
												$grade =  "3.00";
											}
											if($ND1SScore7 >= 55 && $ND1SScore7 < 60){
												$grade = "2.75";
											}
											if($ND1SScore7 >= 50 && $ND1SScore7 < 55){
												$grade = "2.50";
											}
											if($ND1SScore7 >= 45 && $ND1SScore7 < 50){
												$grade = "2.25";
											}											
											if($ND1SScore7 >= 40 && $ND1SScore7 < 45){
												$grade = "2.00";
											}
											if($ND1SScore7 >= 0 && $ND1SScore7 < 40){
												$grade = "0.00";
											}
											$ND1Sgp7  = $grade * $ND1SUnit7;
											
											
											
											$totalGP = $ND1Sgp1 + $ND1Sgp2 + $ND1Sgp3 + $ND1Sgp4 + $ND1Sgp5 + $ND1Sgp6 + $ND1Sgp7;
											$totalUnits = $ND1SUnit1 + $ND1SUnit2 + $ND1SUnit3 + $ND1SUnit4 + $ND1SUnit5 + $ND1SUnit6 + $ND1SUnit7;
											$GPA2 = round($totalGP / $totalUnits, 2);
											$CGPA = round((($GPA1 + $GPA2) / 2), 2);
											echo '<tr>'.'<td>'.'Your GPA For This Semester is: '.'<b>'.$GPA2.'</b>'.'</td>'.'</tr>'; 
											echo '<tr>'.'<td>'.'Your CGPA is: '.'<b>'.$CGPA.'</b>'.'</td>'.'</tr>';
											 
                                          ?>	
											</tbody>
										 </table>
                                         <table class="table table-condensed table-striped">
										  		<caption style="text-align:left"><strong>ND2 First Semester</strong></caption>
												<thead>
												<tr>
													<th>Course</th>
													<th>Course Code</th>
													<th>Credit Unit</th>
													<th>Score</th>
												</tr>
											</thead>
                                            <tbody>
											  
											<?php
												$ND1SScore1=$ND1SScore2=$ND1SScore3=$ND1SScore4=$ND1SScore5=$ND1SScore6=$ND1SScore7=$ND1SUnit1=$ND1SUnit2=$ND1SUnit3=$ND1SUnit4=$ND1SUnit5=$ND1SUnit6=$ND1SUnit7 = 0;
											  while($col = mysqli_fetch_assoc($query3)){
												
												  if($col['course'] == "Calculus"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND2FUnit1 = $col['unit'];
													  $ND2FScore1 = $col['score'];
												  }
												  if($col['course'] == "Data Structure And Algorithm"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND2FUnit2 = $col['unit'];
													  $ND2FScore2 = $col['score'];
												  }
												  if($col['course'] == "Computer Packages II"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND2FUnit3 = $col['unit'];
													  $ND2FScore3 = $col['score'];
												  } 
												  if($col['course'] == "System Analysis And Design"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND2FUnit4 = $col['unit'];
													  $ND2FScore4 = $col['score'];
												  }
												  if($col['course'] == "PC Upgrade and Maintenanace"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND2FUnit5 = $col['unit'];
													  $ND2FScore5 = $col['score'];
												  }
												  if($col['course'] == "Small Business Start-up"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND2FUnit6 = $col['unit'];
													  $ND2FScore6 = $col['score'];
												  }
												  if($col['course'] == "Compulsory Computer Education II"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND2FUnit7 = $col['unit'];
													  $ND2FScore7 = $col['score'];
												  }
											 }
											 if($ND2FScore1 >= 75){
												$grade = "4.00";
											 }												
											if($ND2FScore1 >= 70 && $ND2FScore1 < 75){
												$grade = "3.50";
											}
											if($ND2FScore1 >= 65 && $ND2FScore1 < 70){																						
												$grade = "3.25";																						
											}
											if($ND2FScore1 >= 60 && $ND2FScore1 < 65){
												$grade =  "3.00";
											}
											if($ND2FScore1 >= 55 && $ND2FScore1 < 60){
												$grade = "2.75";
											}
											if($ND2FScore1 >= 50 && $ND2FScore1 < 55){
												$grade = "2.50";
											}
											if($ND2FScore1 >= 45 && $ND2FScore1 < 50){
												$grade = "2.25";
											}											
											if($ND2FScore1 >= 40 && $ND2FScore1 < 45){
												$grade = "2.00";
											}
											if($ND2FScore1 >= 0 && $ND2FScore1 < 40){
												$grade = "0.00";
											}
											$ND2Fgp1  = $grade * $ND2FUnit1;
											
											if($ND2FScore2 >= 75){
												$grade = "4.00";
											 }												
											if($ND2FScore2 >= 70 && $ND2FScore2 < 75){
												$grade = "3.50";
											}
											if($ND2FScore2 >= 65 && $ND2FScore2 < 70){																						
												$grade = "3.25";																						
											}
											if($ND2FScore2 >= 60 && $ND2FScore2 < 65){
												$grade =  "3.00";
											}
											if($ND2FScore2 >= 55 && $ND2FScore2 < 60){
												$grade = "2.75";
											}
											if($ND2FScore2 >= 50 && $ND2FScore2 < 55){
												$grade = "2.50";
											}
											if($ND2FScore2 >= 45 && $ND2FScore2 < 50){
												$grade = "2.25";
											}											
											if($ND2FScore2 >= 40 && $ND2FScore2 < 45){
												$grade = "2.00";
											}
											if($ND2FScore2 >= 0 && $ND2FScore2 < 40){
												$grade = "0.00";
											}
											$ND2Fgp2  = $grade * $ND2FUnit2;
											
											if($ND2FScore3 >= 75){
												$grade = "4.00";
											 }												
											if($ND2FScore3 >= 70 && $ND2FScore3 < 75){
												$grade = "3.50";
											}
											if($ND2FScore3 >= 65 && $ND2FScore3 < 70){																						
												$grade = "3.25";																						
											}
											if($ND2FScore3 >= 60 && $ND2FScore3 < 65){
												$grade =  "3.00";
											}
											if($ND2FScore3 >= 55 && $ND2FScore3 < 60){
												$grade = "2.75";
											}
											if($ND2FScore3 >= 50 && $ND2FScore3 < 55){
												$grade = "2.50";
											}
											if($ND2FScore3 >= 45 && $ND2FScore3 < 50){
												$grade = "2.25";
											}											
											if($ND2FScore3 >= 40 && $ND2FScore3 < 45){
												$grade = "2.00";
											}
											if($ND2FScore3 >= 0 && $ND2FScore3 < 40){
												$grade = "0.00";
											}
											$ND2Fgp3  = $grade * $ND2FUnit3;
											
											if($ND2FScore4 >= 75){
												$grade = "4.00";
											 }												
											if($ND2FScore4 >= 70 && $ND2FScore4 < 75){
												$grade = "3.50";
											}
											if($ND2FScore4 >= 65 && $ND2FScore4 < 70){																						
												$grade = "3.25";																						
											}
											if($ND2FScore4 >= 60 && $ND2FScore4 < 65){
												$grade =  "3.00";
											}
											if($ND2FScore4 >= 55 && $ND2FScore4 < 60){
												$grade = "2.75";
											}
											if($ND2FScore4 >= 50 && $ND2FScore4 < 55){
												$grade = "2.50";
											}
											if($ND2FScore4 >= 45 && $ND2FScore4 < 50){
												$grade = "2.25";
											}											
											if($ND2FScore4 >= 40 && $ND2FScore4 < 45){
												$grade = "2.00";
											}
											if($ND2FScore4 >= 0 && $ND2FScore4 < 40){
												$grade = "0.00";
											}
											$ND2Fgp4  = $grade * $ND2FUnit4;
											
											if($ND2FScore5 >= 75){
												$grade = "4.00";
											 }												
											if($ND2FScore5 >= 70 && $ND2FScore5 < 75){
												$grade = "3.50";
											}
											if($ND2FScore5 >= 65 && $ND2FScore5 < 70){																						
												$grade = "3.25";																						
											}
											if($ND2FScore5 >= 60 && $ND2FScore5 < 65){
												$grade =  "3.00";
											}
											if($ND2FScore5 >= 55 && $ND2FScore5 < 60){
												$grade = "2.75";
											}
											if($ND2FScore5 >= 50 && $ND2FScore5 < 55){
												$grade = "2.50";
											}
											if($ND2FScore5 >= 45 && $ND2FScore5 < 50){
												$grade = "2.25";
											}											
											if($ND2FScore5 >= 40 && $ND2FScore5 < 45){
												$grade = "2.00";
											}
											if($ND2FScore5 >= 0 && $ND2FScore5 < 40){
												$grade = "0.00";
											}
											$ND2Fgp5  = $grade * $ND2FUnit5;
											
											if($ND2FScore6 >= 75){
												$grade = "4.00";
											 }												
											if($ND2FScore6 >= 70 && $ND2FScore6 < 75){
												$grade = "3.50";
											}
											if($ND2FScore6 >= 65 && $ND2FScore6 < 70){																						
												$grade = "3.25";																						
											}
											if($ND2FScore6 >= 60 && $ND2FScore6 < 65){
												$grade =  "3.00";
											}
											if($ND2FScore6 >= 55 && $ND2FScore6 < 60){
												$grade = "2.75";
											}
											if($ND2FScore6 >= 50 && $ND2FScore6 < 55){
												$grade = "2.50";
											}
											if($ND2FScore6 >= 45 && $ND2FScore6 < 50){
												$grade = "2.25";
											}											
											if($ND2FScore6 >= 40 && $ND2FScore6 < 45){
												$grade = "2.00";
											}
											if($ND2FScore6 >= 0 && $ND2FScore6 < 40){
												$grade = "0.00";
											}
											$ND2Fgp6  = $grade * $ND2FUnit6;
											
											if($ND2FScore7 >= 75){
												$grade = "4.00";
											 }												
											if($ND2FScore7 >= 70 && $ND2FScore7 < 75){
												$grade = "3.50";
											}
											if($ND2FScore7 >= 65 && $ND2FScore7 < 70){																						
												$grade = "3.25";																						
											}
											if($ND2FScore7 >= 60 && $ND2FScore7 < 65){
												$grade =  "3.00";
											}
											if($ND2FScore7 >= 55 && $ND2FScore7 < 60){
												$grade = "2.75";
											}
											if($ND2FScore7 >= 50 && $ND2FScore7 < 55){
												$grade = "2.50";
											}
											if($ND2FScore7 >= 45 && $ND2FScore7 < 50){
												$grade = "2.25";
											}											
											if($ND2FScore7 >= 40 && $ND2FScore7 < 45){
												$grade = "2.00";
											}
											if($ND2FScore7 >= 0 && $ND2FScore7 < 40){
												$grade = "0.00";
											}
											$ND2Fgp7  = $grade * $ND2FUnit7;
											
											
											
											$totalGP = $ND2Fgp1 + $ND2Fgp2 + $ND2Fgp3 + $ND2Fgp4 + $ND2Fgp5 + $ND2Fgp6 + $ND2Fgp7;
											$totalUnits = $ND2FUnit1 + $ND2FUnit2 + $ND2FUnit3 + $ND2FUnit4 + $ND2FUnit5 + $ND2FUnit6 + $ND2FUnit7;
											$GPA3 = round($totalGP / $totalUnits, 2);
											$CGPA = round((($GPA1 + $GPA2 + $GPA3) / 3), 2);
											echo '<tr>'.'<td>'.'Your GPA For This Semester is: '.'<b>'.$GPA3.'</b>'.'</td>'.'</tr>'; 
											echo '<tr>'.'<td>'.'Your CGPA is: '.'<b>'.$CGPA.'</b>'.'</td>'.'</tr>';
                                          ?>	
											</tbody>
										 </table>
												<table class="table table-condensed table-striped">
										  		<caption style="text-align:left"><strong>ND2 Second Semester</strong></caption>
												<thead>
												<tr>
													<th>Course</th>
													<th>Course Code</th>
													<th>Credit Unit</th>
													<th>Score</th>
												</tr>
											</thead>
                                            <tbody>
											  
											<?php
												$ND2SScore1=$ND2SScore2=$ND2SScore3=$ND2SScore4=$ND2SScore5=$ND2SUnit1=$ND2SUnit2=$ND2SUnit3=$ND2SUnit4=$ND2SUnit5 = 0;
											  while($col = mysqli_fetch_assoc($query4)){
												
												  if($col['course'] == "OO Basic"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND2SUnit1 = $col['unit'];
													  $ND2SScore1 = $col['score'];
												  }
												  if($col['course'] == "OO Cobol"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND2SUnit2 = $col['unit'];
													  $ND2SScore2 = $col['score'];
												  }
												  if($col['course'] == "Introduction to System programming"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND2SUnit3 = $col['unit'];
													  $ND2SScore3 = $col['score'];
												  }
												   if($col['course'] == "Introduction to Enterpreneurship"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND2SUnit4 = $col['unit'];
													  $ND2SScore4 = $col['score'];
												  }
												   if($col['course'] == "File Organization And Management"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND2SUnit5 = $col['unit'];
													  $ND2SScore5 = $col['score'];
												  }  	
											 }
											if($ND2SScore1 >= 75){
												$grade = "4.00";
											 }												
											if($ND2SScore1 >= 70 && $ND2SScore1 < 75){
												$grade = "3.50";
											}
											if($ND2SScore1 >= 65 && $ND2SScore1 < 70){																						
												$grade = "3.25";																						
											}
											if($ND2SScore1 >= 60 && $ND2SScore1 < 65){
												$grade =  "3.00";
											}
											if($ND2SScore1 >= 55 && $ND2SScore1 < 60){
												$grade = "2.75";
											}
											if($ND2SScore1 >= 50 && $ND2SScore1 < 55){
												$grade = "2.50";
											}
											if($ND2SScore1 >= 45 && $ND2SScore1 < 50){
												$grade = "2.25";
											}											
											if($ND2SScore1 >= 40 && $ND2SScore1 < 45){
												$grade = "2.00";
											}
											if($ND2SScore1 >= 0 && $ND2SScore1 < 40){
												$grade = "0.00";
											}
											$ND2Sgp1  = $grade * $ND2SUnit1;
											
											if($ND2SScore2 >= 75){
												$grade = "4.00";
											 }												
											if($ND2SScore2 >= 70 && $ND2SScore2 < 75){
												$grade = "3.50";
											}
											if($ND2SScore2 >= 65 && $ND2SScore2 < 70){																						
												$grade = "3.25";																						
											}
											if($ND2SScore2 >= 60 && $ND2SScore2 < 65){
												$grade =  "3.00";
											}
											if($ND2SScore2 >= 55 && $ND2SScore2 < 60){
												$grade = "2.75";
											}
											if($ND2SScore2 >= 50 && $ND2SScore2 < 55){
												$grade = "2.50";
											}
											if($ND2SScore2 >= 45 && $ND2SScore2 < 50){
												$grade = "2.25";
											}											
											if($ND2SScore2 >= 40 && $ND2SScore2 < 45){
												$grade = "2.00";
											}
											if($ND2SScore2 >= 0 && $ND2SScore2 < 40){
												$grade = "0.00";
											}
											$ND2Sgp2  = $grade * $ND2SUnit2;
											
											if($ND2SScore3 >= 75){
												$grade = "4.00";
											 }												
											if($ND2SScore3 >= 70 && $ND2SScore3 < 75){
												$grade = "3.50";
											}
											if($ND2SScore3 >= 65 && $ND2SScore3 < 70){																						
												$grade = "3.25";																						
											}
											if($ND2SScore3 >= 60 && $ND2SScore3 < 65){
												$grade =  "3.00";
											}
											if($ND2SScore3 >= 55 && $ND2SScore3 < 60){
												$grade = "2.75";
											}
											if($ND2SScore3 >= 50 && $ND2SScore3 < 55){
												$grade = "2.50";
											}
											if($ND2SScore3 >= 45 && $ND2SScore3 < 50){
												$grade = "2.25";
											}											
											if($ND2SScore3 >= 40 && $ND2SScore3 < 45){
												$grade = "2.00";
											}
											if($ND2SScore3 >= 0 && $ND2SScore3 < 40){
												$grade = "0.00";
											}
											$ND2Sgp3  = $grade * $ND2SUnit3;
											
											if($ND2SScore4 >= 75){
												$grade = "4.00";
											 }												
											if($ND2SScore4 >= 70 && $ND2SScore4 < 75){
												$grade = "3.50";
											}
											if($ND2SScore4 >= 65 && $ND2SScore4 < 70){																						
												$grade = "3.25";																						
											}
											if($ND2SScore4 >= 60 && $ND2SScore4 < 65){
												$grade =  "3.00";
											}
											if($ND2SScore4 >= 55 && $ND2SScore4 < 60){
												$grade = "2.75";
											}
											if($ND2SScore4 >= 50 && $ND2SScore4 < 55){
												$grade = "2.50";
											}
											if($ND2SScore4 >= 45 && $ND2SScore4 < 50){
												$grade = "2.25";
											}											
											if($ND2SScore4 >= 40 && $ND2SScore4 < 45){
												$grade = "2.00";
											}
											if($ND2SScore4 >= 0 && $ND2SScore4 < 40){
												$grade = "0.00";
											}
											$ND2Sgp4  = $grade * $ND2SUnit4;
											
											if($ND2SScore5 >= 75){
												$grade = "4.00";
											 }												
											if($ND2SScore5 >= 70 && $ND2SScore5 < 75){
												$grade = "3.50";
											}
											if($ND2SScore5 >= 65 && $ND2SScore5 < 70){																						
												$grade = "3.25";																						
											}
											if($ND2SScore5 >= 60 && $ND2SScore5 < 65){
												$grade =  "3.00";
											}
											if($ND2SScore5 >= 55 && $ND2SScore5 < 60){
												$grade = "2.75";
											}
											if($ND2SScore5 >= 50 && $ND2SScore5 < 55){
												$grade = "2.50";
											}
											if($ND2SScore5 >= 45 && $ND2SScore5 < 50){
												$grade = "2.25";
											}											
											if($ND2SScore5 >= 40 && $ND2SScore5 < 45){
												$grade = "2.00";
											}
											if($ND2SScore5 >= 0 && $ND2SScore5 < 40){
												$grade = "0.00";
											}
											$ND2Sgp5  = $grade * $ND2FUnit5;
											
											
											$totalGP = $ND2Sgp1 + $ND2Sgp2 + $ND2Sgp3 + $ND2Sgp4 + $ND2Sgp5;
											$totalUnits = $ND2SUnit1 + $ND2SUnit2 + $ND2SUnit3 + $ND2SUnit4 + $ND2SUnit5;
											$GPA4 = round($totalGP / $totalUnits, 2);
											$CGPA = round((($GPA1 + $GPA2 + $GPA3 + $GPA4) / 4), 2);
											echo '<tr>'.'<td>'.'Your GPA For This Semester is: '.'<b>'.$GPA4.'</b>'.'</td>'.'</tr>';
											echo '<tr>'.'<td>'.'Your CGPA is: '.'<b>'.$CGPA.'</b>'.'</td>'.'</tr>';
                                          ?>											
											</tbody>
										 </table>
                                              <table class="table table-condensed table-striped">
										  		<caption style="text-align:left"><strong>ND3 First Semester</strong></caption>
												<thead>
												<tr>
													<th>Course</th>
													<th>Course Code</th>
													<th>Credit Unit</th>
													<th>Score</th>
												</tr>
											</thead>
                                            <tbody>
											  
											<?php
												$ND3FScore1=$ND3FScore2=$ND3FScore3=$ND3FScore4=$ND3FScore5=$ND3FUnit1=$ND3FUnit2=$ND3FUnit3=$ND3FUnit4=$ND3FUnit5 = 0;
											  while($col = mysqli_fetch_assoc($query5)){
												
												  if($col['course'] == "OO Fortran"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND3FUnit1 = $col['unit'];
													  $ND3FScore1 = $col['score'];
												  }
												  if($col['course'] == "Computer System troubleshooting I"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND3FUnit2 = $col['unit'];
													  $ND3FScore2 = $col['score'];
												  }
												  if($col['course'] == "Basic Hardware Maintenance"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND3FUnit3 = $col['unit'];
													  $ND3FScore3 = $col['score'];
												  }
												  if($col['course'] == "Computer And Society"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND3FUnit4 = $col['unit'];
													  $ND3FScore4 = $col['score'];
												  }
												  if($col['course'] == "Practice of Enterpreneurship"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND3FUnit5 = $col['unit'];
													  $ND3FScore5 = $col['score'];
												  }
											 }
											if($ND3FScore1 >= 75){
												$grade = "4.00";
											 }												
											if($ND3FScore1 >= 70 && $ND3FScore1 < 75){
												$grade = "3.50";
											}
											if($ND3FScore1 >= 65 && $ND3FScore1 < 70){																						
												$grade = "3.25";																						
											}
											if($ND3FScore1 >= 60 && $ND3FScore1 < 65){
												$grade =  "3.00";
											}
											if($ND3FScore1 >= 55 && $ND3FScore1 < 60){
												$grade = "2.75";
											}
											if($ND3FScore1 >= 50 && $ND3FScore1 < 55){
												$grade = "2.50";
											}
											if($ND3FScore1 >= 45 && $ND3FScore1 < 50){
												$grade = "2.25";
											}											
											if($ND3FScore1 >= 40 && $ND3FScore1 < 45){
												$grade = "2.00";
											}
											if($ND3FScore1 >= 0 && $ND3FScore1 < 40){
												$grade = "0.00";
											}
											$ND3Fgp1  = $grade * $ND3FUnit1;
											
											if($ND3FScore2 >= 75){
												$grade = "4.00";
											 }												
											if($ND3FScore2 >= 70 && $ND3FScore2 < 75){
												$grade = "3.50";
											}
											if($ND3FScore2 >= 65 && $ND3FScore2 < 70){																						
												$grade = "3.25";																						
											}
											if($ND3FScore2 >= 60 && $ND3FScore2 < 65){
												$grade =  "3.00";
											}
											if($ND3FScore2 >= 55 && $ND3FScore2 < 60){
												$grade = "2.75";
											}
											if($ND3FScore2 >= 50 && $ND3FScore2 < 55){
												$grade = "2.50";
											}
											if($ND3FScore2 >= 45 && $ND3FScore2 < 50){
												$grade = "2.25";
											}											
											if($ND3FScore2 >= 40 && $ND3FScore2 < 45){
												$grade = "2.00";
											}
											if($ND3FScore2 >= 0 && $ND3FScore2 < 40){
												$grade = "0.00";
											}
											$ND3Fgp2  = $grade * $ND3FUnit2;
											
											if($ND3FScore3 >= 75){
												$grade = "4.00";
											 }												
											if($ND3FScore3 >= 70 && $ND3FScore3 < 75){
												$grade = "3.50";
											}
											if($ND3FScore3 >= 65 && $ND3FScore3 < 70){																						
												$grade = "3.25";																						
											}
											if($ND3FScore3 >= 60 && $ND3FScore3 < 65){
												$grade =  "3.00";
											}
											if($ND3FScore3 >= 55 && $ND3FScore3 < 60){
												$grade = "2.75";
											}
											if($ND3FScore3 >= 50 && $ND3FScore3 < 55){
												$grade = "2.50";
											}
											if($ND3FScore3 >= 45 && $ND3FScore3 < 50){
												$grade = "2.25";
											}											
											if($ND3FScore3 >= 40 && $ND3FScore3 < 45){
												$grade = "2.00";
											}
											if($ND3FScore3 >= 0 && $ND3FScore3 < 40){
												$grade = "0.00";
											}
											$ND3Fgp3  = $grade * $ND3FUnit3;
											
											if($ND3FScore4 >= 75){
												$grade = "4.00";
											 }												
											if($ND3FScore4 >= 70 && $ND3FScore4 < 75){
												$grade = "3.50";
											}
											if($ND3FScore4 >= 65 && $ND3FScore4 < 70){																						
												$grade = "3.25";																						
											}
											if($ND3FScore4 >= 60 && $ND3FScore4 < 65){
												$grade =  "3.00";
											}
											if($ND3FScore4 >= 55 && $ND3FScore4 < 60){
												$grade = "2.75";
											}
											if($ND3FScore4 >= 50 && $ND3FScore4 < 55){
												$grade = "2.50";
											}
											if($ND3FScore4 >= 45 && $ND3FScore4 < 50){
												$grade = "2.25";
											}											
											if($ND3FScore4 >= 40 && $ND3FScore4 < 45){
												$grade = "2.00";
											}
											if($ND3FScore4 >= 0 && $ND3FScore4 < 40){
												$grade = "0.00";
											}
											$ND3Fgp4  = $grade * $ND3FUnit4;
											
											if($ND3FScore5 >= 75){
												$grade = "4.00";
											 }												
											if($ND3FScore5 >= 70 && $ND3FScore5 < 75){
												$grade = "3.50";
											}
											if($ND3FScore5 >= 65 && $ND3FScore5 < 70){																						
												$grade = "3.25";																						
											}
											if($ND3FScore5 >= 60 && $ND3FScore5 < 65){
												$grade =  "3.00";
											}
											if($ND3FScore5 >= 55 && $ND3FScore5 < 60){
												$grade = "2.75";
											}
											if($ND3FScore5 >= 50 && $ND3FScore5 < 55){
												$grade = "2.50";
											}
											if($ND3FScore5 >= 45 && $ND3FScore5 < 50){
												$grade = "2.25";
											}											
											if($ND3FScore5 >= 40 && $ND3FScore5 < 45){
												$grade = "2.00";
											}
											if($ND3FScore5 >= 0 && $ND3FScore5 < 40){
												$grade = "0.00";
											}
											$ND3Fgp5  = $grade * $ND3FUnit5;
											
											
											$totalGP = $ND3Fgp1 + $ND3Fgp2 + $ND3Fgp3 + $ND3Fgp4 + $ND3Fgp5;
											$totalUnits = $ND3FUnit1 + $ND3FUnit2 + $ND3FUnit3 + $ND3FUnit4 + $ND3FUnit5;
											$GPA5 = round($totalGP / $totalUnits, 2);
											$CGPA = round((($GPA1 + $GPA2 + $GPA3 + $GPA4 + $GPA5) / 5), 2);
											echo '<tr>'.'<td>'.'Your GPA For This Semester is: '.'<b>'.$GPA5.'</b>'.'</td>'.'</tr>';
											echo '<tr>'.'<td>'.'Your CGPA is: '.'<b>'.$CGPA.'</b>'.'</td>'.'</tr>';
                                          ?>	
											</tbody>
										 </table>
                                         <table class="table table-condensed table-striped">
										  		<caption style="text-align:left"><strong>ND3 Second Semester</strong></caption>
												<thead>
												<tr>
													<th>Course</th>
													<th>Course Code</th>
													<th>Credit Unit</th>
													<th>Score</th>
												</tr>
											</thead>
                                            <tbody>
											  
											<?php
												$ND3SScore1=$ND3SScore2=$ND3SScore3=$ND3SScore4=$ND3SScore5=$ND3SUnit1=$ND3SUnit2=$ND3SUnit3=$ND3SUnit4=$ND3SUnit5 = 0;
											  while($col = mysqli_fetch_assoc($query6)){
												
												  if($col['course'] == "Management Information System"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND3SUnit1 = $col['unit'];
													  $ND3SScore1 = $col['score'];
												  }
												  if($col['course'] == "Web Technology"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND3SUnit2 = $col['unit'];
													  $ND3SScore2 = $col['score'];
												  }
												  if($col['course'] == "Basic Logic Design"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND3SUnit3 = $col['unit'];
													  $ND3SScore3 = $col['score'];
												  } 
												  if($col['course'] == "Computer System troubleshooting II"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND3SUnit4 = $col['unit'];
													  $ND3SScore4 = $col['score'];
												  }
												  if($col['course'] == "Project"){
													  echo '<tr>';
													  echo '<td>'.$col['course'].'</td>';
													  echo '<td>'.$col['code'].'</td>';
													  echo '<td>'.$col['unit'].'</td>';
													  echo '<td>'.$col['score'].'</td>';
													  echo '</tr>';
													  $ND3SUnit5 = $col['unit'];
													  $ND3SScore5 = $col['score'];
												  }
											 }
											 if($ND3SScore1 >= 75){
												$grade = "4.00";
											 }												
											if($ND3SScore1 >= 70 && $ND3SScore1 < 75){
												$grade = "3.50";
											}
											if($ND3SScore1 >= 65 && $ND3SScore1 < 70){																						
												$grade = "3.25";																						
											}
											if($ND3SScore1 >= 60 && $ND3SScore1 < 65){
												$grade =  "3.00";
											}
											if($ND3SScore1 >= 55 && $ND3SScore1 < 60){
												$grade = "2.75";
											}
											if($ND3SScore1 >= 50 && $ND3SScore1 < 55){
												$grade = "2.50";
											}
											if($ND3SScore1 >= 45 && $ND3SScore1 < 50){
												$grade = "2.25";
											}											
											if($ND3SScore1 >= 40 && $ND3SScore1 < 45){
												$grade = "2.00";
											}
											if($ND3SScore1 >= 0 && $ND3SScore1 < 40){
												$grade = "0.00";
											}
											$ND3Sgp1  = $grade * $ND3SUnit1;
											
											if($ND3SScore2 >= 75){
												$grade = "4.00";
											 }												
											if($ND3SScore2 >= 70 && $ND3SScore2 < 75){
												$grade = "3.50";
											}
											if($ND3SScore2 >= 65 && $ND3SScore2 < 70){																						
												$grade = "3.25";																						
											}
											if($ND3SScore2 >= 60 && $ND3SScore2 < 65){
												$grade =  "3.00";
											}
											if($ND3SScore2 >= 55 && $ND3SScore2 < 60){
												$grade = "2.75";
											}
											if($ND3SScore2 >= 50 && $ND3SScore2 < 55){
												$grade = "2.50";
											}
											if($ND3SScore2 >= 45 && $ND3SScore2 < 50){
												$grade = "2.25";
											}											
											if($ND3SScore2 >= 40 && $ND3SScore2 < 45){
												$grade = "2.00";
											}
											if($ND3SScore2 >= 0 && $ND3SScore2 < 40){
												$grade = "0.00";
											}
											$ND3Sgp2  = $grade * $ND3SUnit2;
											
											if($ND3SScore3 >= 75){
												$grade = "4.00";
											 }												
											if($ND3SScore3 >= 70 && $ND3SScore3 < 75){
												$grade = "3.50";
											}
											if($ND3SScore3 >= 65 && $ND3SScore3 < 70){																						
												$grade = "3.25";																						
											}
											if($ND3SScore3 >= 60 && $ND3SScore3 < 65){
												$grade =  "3.00";
											}
											if($ND3SScore3 >= 55 && $ND3SScore3 < 60){
												$grade = "2.75";
											}
											if($ND3SScore3 >= 50 && $ND3SScore3 < 55){
												$grade = "2.50";
											}
											if($ND3SScore3 >= 45 && $ND3SScore3 < 50){
												$grade = "2.25";
											}											
											if($ND3SScore3 >= 40 && $ND3SScore3 < 45){
												$grade = "2.00";
											}
											if($ND3SScore3 >= 0 && $ND3SScore3 < 40){
												$grade = "0.00";
											}
											$ND3Sgp3  = $grade * $ND3SUnit3;
											
											if($ND3SScore4 >= 75){
												$grade = "4.00";
											 }												
											if($ND3SScore4 >= 70 && $ND3SScore4 < 75){
												$grade = "3.50";
											}
											if($ND3SScore4 >= 65 && $ND3SScore4 < 70){																						
												$grade = "3.25";																						
											}
											if($ND3SScore4 >= 60 && $ND3SScore4 < 65){
												$grade =  "3.00";
											}
											if($ND3SScore4 >= 55 && $ND3SScore4 < 60){
												$grade = "2.75";
											}
											if($ND3SScore4 >= 50 && $ND3SScore4 < 55){
												$grade = "2.50";
											}
											if($ND3SScore4 >= 45 && $ND3SScore4 < 50){
												$grade = "2.25";
											}											
											if($ND3SScore4 >= 40 && $ND3SScore4 < 45){
												$grade = "2.00";
											}
											if($ND3SScore4 >= 0 && $ND3SScore4 < 40){
												$grade = "0.00";
											}
											$ND3Sgp4  = $grade * $ND3SUnit4;
											
											if($ND3SScore5 >= 75){
												$grade = "4.00";
											 }												
											if($ND3SScore5 >= 70 && $ND3SScore5 < 75){
												$grade = "3.50";
											}
											if($ND3SScore5 >= 65 && $ND3SScore5 < 70){																						
												$grade = "3.25";																						
											}
											if($ND3SScore5 >= 60 && $ND3SScore5 < 65){
												$grade =  "3.00";
											}
											if($ND3SScore5 >= 55 && $ND3SScore5 < 60){
												$grade = "2.75";
											}
											if($ND3SScore5 >= 50 && $ND3SScore5 < 55){
												$grade = "2.50";
											}
											if($ND3SScore5 >= 45 && $ND3SScore5 < 50){
												$grade = "2.25";
											}											
											if($ND3SScore5 >= 40 && $ND3SScore5 < 45){
												$grade = "2.00";
											}
											if($ND3SScore5 >= 0 && $ND3SScore5 < 40){
												$grade = "0.00";
											}
											$ND3Sgp5  = $grade * $ND3SUnit5;
											
											
											$totalGP = $ND3Sgp1 + $ND3Sgp2 + $ND3Sgp3 + $ND3Sgp4 + $ND3Sgp5;
											$totalUnits = $ND3SUnit1 + $ND3SUnit2 + $ND3SUnit3 + $ND3SUnit4 + $ND3SUnit5;
											$GPA6 = round($totalGP / $totalUnits, 2);
											$CGPA = round((($GPA1 + $GPA2 + $GPA3 + $GPA4 + $GPA5 + $GPA6) / 6), 2);
											echo '<tr>'.'<td>'.'Your GPA For This Semester is: '.'<b>'.$GPA6.'</b>'.'</td>'.'</tr>';
											echo '<tr>'.'<td>'.'Your CGPA is: '.'<b>'.$CGPA.'</b>'.'</td>'.'</tr>';
                                          ?>	
											</tbody>
										 </table>
                                         <?php
										 	if($CGPA >= 3.50 && $CGPA < 4.00){
												$class = "DISTINCTION";
											}
											if($CGPA >= 3.00 && $CGPA < 3.50){
												$class = "UPPER CREDIT";
											}
											if($CGPA >= 2.50 && $CGPA < 3.00){
												$class = "LOWER CREDIT";
											}if($CGPA >= 2.00 && $CGPA < 2.50){
												$class = "PASS";
											}if($CGPA >= 0 && $CGPA < 2.00) {
												$class = "FAIL";
											}
											
										 ?>
										 <span>Your CGPA is <strong><?php echo $CGPA; ?></strong> and you graduated with <strong><?php echo $class; ?></strong></span>
                                            <div class="links">
                                                <a onClick="window,print();" class="btn btn-primary">Print Transcript</a>
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