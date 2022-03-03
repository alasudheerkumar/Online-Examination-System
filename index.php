<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>O E S</title>
 <link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
 <link rel="stylesheet" href="css/main.css">
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
			<script>
			function validateForm()
			{
				var y = document.forms["form"]["name"].value;
				var letters = /^[A-Za-z]+$/;
				if (y == null || y == "")
				{
					alert("Name must be filled out.");
					return false;
				}
				
				var x = document.forms["form"]["email"].value;
				var atpos = x.indexOf("@");
				var dotpos = x.lastIndexOf(".");
				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
				{
					alert("Not a valid e-mail address.");
					return false;
				}
				var a = document.forms["form"]["password"].value;
				if(a == null || a == "")
				{
					alert("Password must be filled out");
					return false;
				}
				if(a.length<5 || a.length>25)
				{
					alert("Passwords must be 5 to 25 characters long.");
					return false;
				}
				var b = document.forms["form"]["cpassword"].value;
				if (a!=b)
				{
					alert("Passwords must match.");
					return false;
				}
			}
			</script>
</head>

<body>

<div class="header">
	<!-- Navbar Section -->
	<div class="navbar navbar-inverse navbar-fixed-top opaque-navbar">
	  <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navMain">
	  <span class="glyphicon glyphicon-chevron-right" style="color:white;"></span>

	  </button>
		  <a class="navbar-brand" href="#">Online Examination System</a>
		</div>
		<div class="collapse navbar-collapse" id="navMain">
		  <ul class="nav navbar-nav pull-right">
			<li class="size"><a href="index.php">Home</a></li>
			<li class="size"><a href="#" data-toggle="modal" data-target="#developers">Developer</a></li>
			<li class="size"><a href="feedback.php">Feedback</a></li>
			<li class="size"><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Sign in</b></span></a></li>
		  </ul>
		</div>
	  </div><!--container end-->
	</div><!-- Navbar Section Ends -->



	<!-- Modal For Developers-->
	<div class="modal fade title1" id="developers">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">Developers</span></h4>
		  </div>

		  <div class="modal-body">
			<p>
				<div class="row">
					<div class="col-md-4">
						<img src="image/sudheer.jpg" width=100 height=100 alt="Sudheer" class="img-rounded">
					</div>
					<div class="col-md-5">
						<a href="" style="color:#202020; font-family:'typo' ; font-size:18px" title="Find on Facebook">Sudheer Kumar</a>
						<h4 style="font-family:'typo' ">example@gmail.com</h4>
					
					</div>
				</div>
			</p>
			
		  </div>

		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


	<!--sign in modal start-->

	<div class="modal fade" id="myModal">
	  <div class="modal-dialog">
		<div class="modal-content title1">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title title1"><span style="color:orange">User Log In</span></h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="login.php?q=index.php" method="POST">
				<fieldset>
					<!-- Text input Mail Address-->
					<div class="form-group">
					  <label class="col-md-3 control-label" for="email"></label>
					  <div class="col-md-6">
					  <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">
					  </div>
					</div>

					<!-- Password input-->
					<div class="form-group">
					  <label class="col-md-3 control-label" for="password"></label>
					  <div class="col-md-6">
						<input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password">
					  </div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Log in</button>
					</div>
				</fieldset>
			</form>
		  </div>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!--sign in modal closed-->

</div><!--header row closed-->


<!-- SignUp form-->
<script>
				var courses = {

					//"Telanaga": {"South Australia": ["Dunstan", "Mitchell"],"Victoria": ["Altona", "Euroa"]},
					"B.Tech": {"I year": ["Civil Engineering","Chemical Engineering","Computer Science Engineering", "Electronics Communication Engineering","Electical Electronic Engineering","Mechanical Engineering"],"II year": ["Civil Engineering","Chemical Engineering","Computer Science Engineering", "Electronics Communication Engineering","Electical Electronic Engineering","Mechanical Engineering"],"III year": ["Civil Engineering","Chemical Engineering","Computer Science Engineering", "Electronics Communication Engineering","Electical Electronic Engineering","Mechanical Engineering"],"IV year": ["Civil Engineering","Chemical Engineering","Computer Science Engineering", "Electronics Communication Engineering","Electical Electronic Engineering","Mechanical Engineering"],},
					"M.Tech": {"I year": ["Civil Engineering","Chemical Engineering","Computer Science Engineering", "Electronics Communication Engineering","Electical Electronic Engineering","Mechanical Engineering"],"II year": ["Civil Engineering","Chemical Engineering","Computer Science Engineering", "Electronics Communication Engineering","Electical Electronic Engineering","Mechanical Engineering"],},
					"M.C.A": {"I year": ["Computer Science Engineering"],"II year": ["Computer Science Engineering"],"III year": ["Computer Science Engineering"],},
			  }
			  window.onload = function ()
			  {
				  var course = document.getElementById("course"),  year = document.getElementById("year"),  department = document.getElementById("department");
				  for (var country in courses)
				  {
					course.options[course.options.length] = new Option(country, country);
				  }
				course.onchange = function ()
				{
				  year.length = 1; // remove all options bar first
				  department.length = 1; // remove all options bar first
				  if (this.selectedIndex < 1) return; // done
				  for (var state in courses[this.value])
				  {
					year.options[year.options.length] = new Option(state, state);
				  }
				}
				course.onchange(); // reset in case page is reloaded
				year.onchange = function ()
				{
				  department.length = 1; // remove all options bar first
				  if (this.selectedIndex < 1) return; // done
				  var district = courses[course.value][this.value];

				  //alert(year1);
				  for (var i = 0; i < district.length; i++)
				  {
					department.options[department.options.length] = new Option(district[i], district[i]);
				  }
				}
			  }
				
</script>
	<div class="row">
		<div class="col-md-7"></div>
			<div class="col-md-4 panel">
			      <!-- Sign Up form Section -->
					<form class="form-horizontal" name="form" action="sign.php?q=account.php" onSubmit="return validateForm()" method="POST">
						<fieldset>
							<div class="form-group">
							  <label class="col-md-12 control-label" for="name"></label>
							  <div class="col-md-12">
							  <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text">

							  </div>
							</div>

							<div class="form-group">
							  <label class="col-md-12 control-label" for="gender"></label>
							  <div class="col-md-12">
								<select id="gender" name="gender" placeholder="Enter your gender" class="form-control input-md" >
								  <option value="">Select Gender</option>
								  <option value="M">Male</option>
								  <option value="F">Female</option> </select>
							  </div>
							</div>

							<div class="form-group">
							  <label class="col-md-12 control-label" for="name"></label>
							  <div class="col-md-12">
							  <input id="college" name="college" placeholder="JNTUACEA" value="JNTUACEA" class="form-control input-md" type="text" value="price to" readonly="readonly">

							  </div>
							</div>
							
							<div class="form-group">
							  <label class="col-md-12 control-label" for="course"></label>
							  <div class="col-md-12">
								<select name="course" id="course" size="1" required class="form-control input-md" required>
									<option value="" selected="selected">Select Your Course</option>
								</select>
							  </div>
							</div>

							<div class="form-group">
								<label class="col-md-12 control-label" for="year"></label>
								<div class="col-md-12">
								<select name="year" id="year" size="1" required class="form-control input-md" required>
								  <option value="" selected="selected">Select Your Year</option>
								</select>
								</div>
						    </div>

						  
							<div class="form-group">
							<label class="col-md-12 control-label" for="department" ></label>
							<div class="col-md-12">
							<select name="department" id="department" size="1" required class="form-control input-md" required>
							  <option value="" selected="selected">Select Your Department</option>
							</select>
							</div>
							</div>

							<div class="form-group">
							  <label class="col-md-12 control-label title1" for="email"></label>
							  <div class="col-md-12">
								<input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">

							  </div>
							</div>

							<div class="form-group">
							  <label class="col-md-12 control-label" for="mob"></label>
							  <div class="col-md-12">
							  <input id="mob" name="mob" placeholder="Enter your mobile number" class="form-control input-md" type="text">

							  </div>
							</div>

							<div class="form-group">
							  <label class="col-md-12 control-label" for="password"></label>
							  <div class="col-md-12">
								<input id="password" name="password" placeholder="Enter your password" class="form-control input-md" type="password">

							  </div>
							</div>

							<div class="form-group">
							  <label class="col-md-12control-label" for="cpassword"></label>
							  <div class="col-md-12">
								<input id="cpassword" name="cpassword" placeholder="Conform Password" class="form-control input-md" type="password">

							  </div>
							</div>

							<div class="form-group">
							  <label class="col-md-12 control-label" for=""></label>
							  <div class="col-md-12">
								<input type="submit" value="Sign Up" class="sub btn btn-primary"/>
							  </div>
							</div>
						</fieldset>
					</form>
			</div><!--col-md-6 end-->
	</div>
</body>
</html>
