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
							<li>Forgot Password</li>
						</ul>
					</div>
				</div>
				<div id="main-content">
					<section class="center-block well" style="width:450px;">
						<p>Enter the email address which you registered with and your password will be sent to your email.</p>
						<form  class="form-horizontal" action="" method="post" role="form">
							<div class="form-group">
								<label for="email" class="control-label col-xs-2">Email</label>
									<div class="col-xs-10">
										<div class="input-group">
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-envelope"></span>
											</span>
											<input type="email" class="form-control" id="email" name="email">
										</div>
									</div>
							</div>
							<div class="form-group">
								<div class="col-xs-offset-5 col-xs-7">
									<button type="submit" class="btn btn-success">
										<span class="glyphicon glyphicon-log-in"></span>
											Submit
									</button>
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
  </body>
</html>