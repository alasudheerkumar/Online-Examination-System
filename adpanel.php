<!DOCTYPE HTML>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>O E S</title>
 <link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/userpanel.css">
 <link rel="stylesheet" href="css/navbar.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>
 <script src="js/navbar.js" type="text/javascript"></script>
 <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
 <?php 
	 if(@$_GET['w'])
	 {
		 echo'<script>alert("'.@$_GET['w'].'");</script>';
	 }
  ?>
</head>
<body>
<br><br><br><br><br><br><br><br><br><br><br><br>
<div class="container">
		<div class="row" style="align:center;">
			<div class="col-md-4"></div>
				<div class="col-md-4" >
					<form role="form" method="post" action="admin.php?q=index.php" >
						<div class="form-group">
						<input type="text" name="uname" maxlength="20"  placeholder="Admin user id" class="form-control"/> 
						</div>
						<div class="form-group">
						<input type="password" name="password" maxlength="15" placeholder="Password" class="form-control"/>
						</div>
						<div class="form-group" align="center">
						<input type="submit" name="login" value="Login" class="btn btn-primary" />
						</div>
					</form>
				</div>
			<div class="col-md-4"></div>
		</div>
</div>
</body>