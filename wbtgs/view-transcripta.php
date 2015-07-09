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
												<tr>
													<td>Introduction to Computing</td>
													<td>COM 101</td>
													<td>3</td>
													<td>78</td>
												</tr>
												<tr>
													<td>Introduction to Digital Electronics</td>
													<td>COM 112</td>
													<td>3</td>
													<td>77</td>
												</tr>
												<tr>
													<td>Introduction to Computer Programming</td>
													<td>COM 113</td>
													<td>3</td>
													<td>65</td>
												</tr>
												<tr>
													<td>Descriptive Statistics</td>
													<td>STAT 111</td>
													<td>2</td>
													<td>76</td>
												</tr>
												<tr>
													<td>Logic And Linear Algebra</td>
													<td>MTH 112</td>
													<td>2</td>
													<td>78</td>
												</tr>
												<tr>
													<td>Technical English 1</td>
													<td>OTM 112</td>
													<td>2</td>
													<td>69</td>
												</tr>
												<tr>
													<td>Citizenship Education 1</td>
													<td>GNS 111</td>
													<td>2</td>
													<td>77</td>
												</tr>
												<tr>
													<td>Library User Education</td>
													<td>LIB 100</td>
													<td>1</td>
													<td>78</td>
												</tr>
												<tr>
													<td>Compulsory Computer Education</td>
													<td>COM 100</td>
													<td>0</td>
													<td>70</td>
												</tr>
												<tr>
													<td><strong>GPA: 3.79</strong></td>
												</tr>
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
												<tr>
													<td>Elementary Probability</td>
													<td>STAT 112</td>
													<td>3</td>
													<td>65</td>
												</tr>
												<tr>
													<td>Functions And Geomery</td>
													<td>MTH 112</td>
													<td>3</td>
													<td>77</td>
												</tr>
												<tr>
													<td>Programming Language Using OO JAVA</td>
													<td>COM 121</td>
													<td>4</td>
													<td>77</td>
												</tr>
												<tr>
													<td>Introduction to Internet</td>
													<td>COM 122</td>
													<td>3</td>
													<td>76</td>
												</tr>
												<tr>
													<td>Computer Application Package 1</td>
													<td>COM 123</td>
													<td>3</td>
													<td>76</td>
												</tr>
												<tr>
													<td>Citizenship Education 2</td>
													<td>GNS 121</td>
													<td>2</td>
													<td>66</td>
												</tr>
												<tr>
													<td>Technical English 2</td>
													<td>OTM 217</td>
													<td>2</td>
													<td>77</td>
												</tr>
												<tr>
													<td><strong>CGPA: 3.80</strong></td>
												</tr>
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
												<tr>
													<td>Introduction to System Analysis And Design</td>
													<td>COM 125</td>
													<td>3</td>
													<td>78</td>
												</tr>
												<tr>
													<td>PC Upgrade And Maintenace</td>
													<td>COM 126</td>
													<td>4</td>
													<td>77</td>
												</tr>
												<tr>
													<td>Small Business Start-Up</td>
													<td>EDP 100 101</td>
													<td>2</td>
													<td>65</td>
												</tr>
												<tr>
													<td>Calculus</td>
													<td>MTH 211</td>
													<td>1</td>
													<td>76</td>
												</tr>
												<tr>
													<td>Data Structure And Algorithm</td>
													<td>COM 124</td>
													<td>4</td>
													<td>78</td>
												</tr>
												<tr>
													<td>Computer Packages 2</td>
													<td>COM 215</td>
													<td>4</td>
													<td>69</td>
												</tr>
												<tr>
													<td><strong>CGPA: 3.79</strong></td>
												</tr>
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
												<tr>
													<td>Computer Programming Using OO Basic</td>
													<td>COM 211</td>
													<td>4</td>
													<td>76</td>
												</tr>
												<tr>
													<td>Introduction to System Programming</td>
													<td>COM 212</td>
													<td>3</td>
													<td>77</td>
												</tr>
												<tr>
													<td>Commercial Programming Using OO COBOL</td>
													<td>COM 213</td>
													<td>4</td>
													<td>70</td>
												</tr>
												<tr>
													<td>File Organization And Management</td>
													<td>COM 214</td>
													<td>3</td>
													<td>76</td>
												</tr>
												<tr>
													<td>Introduction to Enterpreneurship</td>
													<td>EED 216</td>
													<td>2</td>
													<td>60</td>
												</tr>
												<tr>
													<td>Compulsory Computer Education 2</td>
													<td>COM 100</td>
													<td>0</td>
													<td>70</td>
												</tr>
												<tr>
													<td><strong>CGPA: 3.78</strong></td>
												</tr>
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
												<tr>
													<td>Computer System Troubleshooting 1</td>
													<td>COM 216</td>
													<td>4</td>
													<td>78</td>
												</tr>
												<tr>
													<td>Computer Programming Using OO FORTRAN</td>
													<td>COM 221</td>
													<td>4</td>
													<td>77</td>
												</tr>
												<tr>
													<td>Seminar On Comouter And Society</td>
													<td>COM 222</td>
													<td>2</td>
													<td>70</td>
												</tr>
												<tr>
													<td>Basic Hardware Maintenance</td>
													<td>COM 223</td>
													<td>4</td>
													<td>76</td>
												</tr>
												<tr>
													<td>Practice of Enterpreneurship</td>
													<td>EED 216</td>
													<td>2</td>
													<td>78</td>
												</tr>
												<tr>
													<td><strong>CGPA: 3.81</strong></td>
												</tr>
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
												<tr>
													<td>Management Information System(MIS)</td>
													<td>COM 224</td>
													<td>3</td>
													<td>78</td>
												</tr>
												<tr>
													<td>Web Technology</td>
													<td>COM 225</td>
													<td>4</td>
													<td>77</td>
												</tr>
												<tr>
													<td>Computer Troubleshooting 2</td>
													<td>COM 226</td>
													<td>4</td>
													<td>65</td>
												</tr>
												<tr>
													<td>Basic Logic Design</td>
													<td>COM 227</td>
													<td>2</td>
													<td>76</td>
												</tr>
												<tr>
													<td>Project</td>
													<td>COM 229</td>
													<td>2</td>
													<td>78</td>
												</tr>
												<tr>
													<td><strong>CGPA: 3.81</strong></td>
												</tr>
											</tbody>
										 </table>
										 <span>Your CGPA is <strong>3.81</strong> and you graduated with <strong>Distinction</strong></span>
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