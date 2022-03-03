<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>O E S  || ADMIN DASHBOARD </title>
	<link  rel="stylesheet" href="css/bootstrap.min.css"/>
	<link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
	<link rel="stylesheet" href="css/main.css">
	<link  rel="stylesheet" href="css/font.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js"  type="text/javascript"></script>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

	<script>
	$(function () {
		$(document).on( 'scroll', function(){
			console.log('scroll top : ' + $(window).scrollTop());
			if($(window).scrollTop()>=$(".logo").height())
			{
				 $(".navbar").addClass("navbar-fixed-top");
			}

			if($(window).scrollTop()<$(".logo").height())
			{
				 $(".navbar").removeClass("navbar-fixed-top");
			}
		});
	});
	</script>
</head>

<body style="background:#eee;">
	<div class="header">
		<div class="row">
			<div class="col-md-6">
				<span class="logo">Online Examination System</span>
			</div>
			<?php
				include_once 'dbConnection.php';
				session_start();
				$email=$_SESSION['email'];
				if(!(isset($_SESSION['email'])))
				{
					header("location:index.php");
				}
				else
				{
					$name = $_SESSION['name'];;
					include_once 'dbConnection.php';
					echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <span class="log log1">'.$name.'</span>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
				}
			?>
			<div class="col-md-6">	</div>
		</div>
	</div>		<!-- header div close -->
	
	<!-- admin start-->

	<!--navigation menu-->
	<nav class="navbar navbar-default title1">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
	
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">(Current)</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="dash.php?q=0"><b> </b></a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">

			<li <?php if(@$_GET['q']==0) echo'class="active"'; ?>><a href="dash.php?q=0">Home<span class="sr-only">(current)</span></a></li>
			<li <?php if(@$_GET['q']==1) echo'class="active"'; ?>><a href="dash.php?q=1">User</a></li>
			<li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="dash.php?q=2">Ranking</a></li>
			<li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="dash.php?q=3">Feedback</a></li>

			<li class="dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5) echo'active"'; ?>">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Subject<span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="dash.php?q=4">Add Subject</a></li>
				<li><a href="dash.php?q=5">Remove Subject</a></li>
				 <li><a href="dash.php?q=11">Subjects</a></li>

			  </ul>
			<li <?php if(@$_GET['q']==6) echo'class="active"'; ?>><a href="dash.php?q=6">Questions</a></li>
			</li><li class="pull-right"> <a href="logout.php?q=account.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></li>

		  </ul>
			  </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<!--navigation menu closed-->
	
	
	<div class="container">			<!--container start-->
	<div class="row">
	<div class="col-md-12">
	<!--home start-->

	<?php if(@$_GET['q']==0) {

	$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
	echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
	<tr><td><b>S.No</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td></tr>';
	$c=1;
	while($row = mysqli_fetch_array($result)) {
		$title = $row['title'];
		$total = $row['total'];
		$sahi = $row['sahi'];
		$time = $row['time'];
		$eid = $row['eid'];
	$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
	$rowcount=mysqli_num_rows($q12);
	if($rowcount == 0){
		echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td></tr>';
	}
	else
	{
	echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
		<td><b></td></tr>';
	}
	}
	$c=0;
	echo '</table></div></div>';

	}

	//ranking start
	if(@$_GET['q']== 2)
	{
	$q=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
	echo  '<div class="panel title"><div class="table-responsive">
	<table class="table table-striped title1" >
	<tr style="color:red"><td><b>Rank</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>College</b></td><td><b>Score</b></td></tr>';
	$c=0;
	while($row=mysqli_fetch_array($q) )
	{
	$e=$row['email'];
	$s=$row['score'];
	$q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
	while($row=mysqli_fetch_array($q12) )
	{
	$name=$row['name'];
	$gender=$row['gender'];
	$college=$row['college'];
	}
	$c++;
	echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$college.'</td><td>'.$s.'</td><td>';
	}
	echo '</table></div></div>';}

	?>


	<!--home closed-->
	<!--users start-->
	<?php if(@$_GET['q']==1) {

	$result = mysqli_query($con,"SELECT * FROM user") or die('Error');
	echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
	<tr><td><b>S.No</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>College</b></td><td><b>Email</b></td><td><b>Mobile</b></td><td></td></tr>';
	$c=1;
	while($row = mysqli_fetch_array($result)) {
		$name = $row['name'];
		$mob = $row['mob'];
		$gender = $row['gender'];
		$email = $row['email'];
		$college = $row['college'];

		echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$college.'</td><td>'.$email.'</td><td>'.$mob.'</td>
		<td><a title="Delete User" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
	}
	$c=0;
	echo '</table></div></div>';

	}?>
	<!--user end-->

	<!--feedback start-->
	<?php if(@$_GET['q']==3) {
	$result = mysqli_query($con,"SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC") or die('Error');
	echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
	<tr><td><b>S.No</b></td><td><b>Subject</b></td><td><b>Email</b></td><td><b>Date</b></td><td><b>Time</b></td><td><b>By</b></td><td></td><td></td></tr>';
	$c=1;
	while($row = mysqli_fetch_array($result)) {
		$date = $row['date'];
		$date= date("d-m-Y",strtotime($date));
		$time = $row['time'];
		$subject = $row['subject'];
		$name = $row['name'];
		$email = $row['email'];
		$id = $row['id'];
		 echo '<tr><td>'.$c++.'</td>';
		echo '<td><a title="Click to open feedback" href="dash.php?q=3&fid='.$id.'">'.$subject.'</a></td><td>'.$email.'</td><td>'.$date.'</td><td>'.$time.'</td><td>'.$name.'</td>
		<td><a title="Open Feedback" href="dash.php?q=3&fid='.$id.'"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
		echo '<td><a title="Delete Feedback" href="update.php?fdid='.$id.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>

		</tr>';
	}
	echo '</table></div></div>';
	}
	?>
	<!--feedback closed-->

	<!--feedback reading portion start-->
	<?php if(@$_GET['fid']) {
	echo '<br />';
	$id=@$_GET['fid'];
	$result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' ") or die('Error');
	while($row = mysqli_fetch_array($result)) {
		$name = $row['name'];
		$subject = $row['subject'];
		$date = $row['date'];
		$date= date("d-m-Y",strtotime($date));
		$time = $row['time'];
		$feedback = $row['feedback'];

	echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$subject.'</b></h1>';
	 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;'.$date.'</span>
	<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;'.$name.'</span><br />'.$feedback.'</div></div>';}
	}?>
	<!--Feedback reading portion closed-->

	<!--add quiz start-->
	<?php
	if(@$_GET['q']==4 && !(@$_GET['step']) ) {
	echo '
	<script>
	  var courses = {

		//"Telanaga": {"South Australia": ["Dunstan", "Mitchell"],"Victoria": ["Altona", "Euroa"]},
		"B.Tech": {"I year": ["Civil Engineering","Chemical Engineering","Computer Science Engineering", "Electronics Communication Engineering","Electical Electronic Engineering","Mechanical Engineering"],"II year": ["Civil Engineering","Chemical Engineering","Computer Science Engineering", "Electronics Communication Engineering","Electical Electronic Engineering","Mechanical Engineering"],"III year": ["Civil Engineering","Chemical Engineering","Computer Science Engineering", "Electronics & Communication Engineering","Electical Electronic Engineering","Mechanical Engineering"],"IV year": ["Civil Engineering","Chemical Engineering","Computer Science Engineering", "Electronics Communication Engineering","Electical Electronic Engineering","Mechanical Engineering"],},
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
	  /*department.onchange = function ()
	  {
		var course1=document.getElementById("course").value;
		var year1=document.getElementById("year").value;
		var dep1=document.getElementById("department").value;
		if (window.XMLHttpRequest)
		{
		  // code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		}
		else
		{
		  // code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		  {
			document.getElementById("table").innerHTML=xmlhttp.responseText;
		  }
		}
		xmlhttp.open("POST","tabledata.php?x="+course1+"&y="+year1+"&z="+dep1,true);
		xmlhttp.send();
		//alert(course1);
		//alert(year1);
		//alert(dep1);

		//xmlhttp.open("POST","tabledata.php?x="+x+"?y="+y+"?z="+z,true);
	  }*/

	}
	</script>
	<div class="row">
	<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
	 <div class="col-md-3"></div><div class="col-md-6">   
	 <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
	<fieldset>

		<!-- Course field-->
	<div class="form-group">
	  <label class="col-md-12 control-label" for="name"></label>
	  <div class="col-md-12">
	  <b>Select Course:</b>
	  <select name="course" id="course" size="1" required class="form-control input-md">
		  <option value="" selected="selected">Select Your Course</option>
	  </select>
	  </div>
	</div>

	<!-- Year field-->
	<div class="form-group">
	  <label class="col-md-12 control-label" for="name"></label>
	  <div class="col-md-12">
	  <b>Select Year: </b>
	  <select name="year" id="year" size="1" required class="form-control input-md">
		<option value="" selected="selected">Select Your Year</option>
	  </select>
	  </div>
	</div>

	<!-- Department field-->
	<div class="form-group">
	  <label class="col-md-12 control-label" for="name" ></label>
	  <div class="col-md-12">
	  <b>Select Department: </b>
	  <select name="department" id="department" size="1" required class="form-control input-md">
		<option value="" selected="selected">Select Your Department</option>
	  </select>
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-12 control-label" for="name"></label>
	  <div class="col-md-12">
	  <input id="name" name="name" placeholder="Enter Subject title" class="form-control input-md" type="text">

	  </div>
	</div>



	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-12 control-label" for="total"></label>
	  <div class="col-md-12">
	  <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-12 control-label" for="right"></label>
	  <div class="col-md-12">
	  <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-12 control-label" for="wrong"></label>
	  <div class="col-md-12">
	  <input id="wrong" name="wrong" placeholder="Enter marks on wrong answer without sign" class="form-control input-md" min="0" type="number">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-12 control-label" for="time"></label>
	  <div class="col-md-12">
	  <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">

	  </div>
	</div>


	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-12 control-label" for="desc"></label>
	  <div class="col-md-12">
	  <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Write description here..."></textarea>
	  </div>
	</div>


	<div class="form-group">
	  <label class="col-md-12 control-label" for=""></label>
	  <div class="col-md-12">
		<input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
	  </div>
	</div>

	</fieldset>
	</form></div>';



	}
	?>
	<!--add quiz end-->

	<!--add quiz step2 start-->
	<?php
	if(@$_GET['q']==4 && (@$_GET['step'])==2 ) {
	$course = @$_GET['course'];
	$year = @$_GET['year'];
	$department = @$_GET['department'];
	//echo $course;
	echo '
	<div class="row">
	<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
	 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
	<fieldset>';
		

	 for($i=1;$i<=@$_GET['n'];$i++)
	 {
	echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
	<div class="form-group">
	  <label class="col-md-12 control-label" for="qns'.$i.' "></label>
	  <div class="col-md-12">
	  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>
	  </div>
	</div>
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-12 control-label" for="'.$i.'1"></label>
	  <div class="col-md-12">
	  <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text">

	  </div>
	</div>
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-12 control-label" for="'.$i.'2"></label>
	  <div class="col-md-12">
	  <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text">

	  </div>
	</div>
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-12 control-label" for="'.$i.'3"></label>
	  <div class="col-md-12">
	  <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text">

	  </div>
	</div>
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-12 control-label" for="'.$i.'4"></label>
	  <div class="col-md-12">
	  <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text">

	  </div>
	</div>
	<br />
	<b>Correct answer</b>:<br />
	<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
	   <option value="a">Select answer for question '.$i.'</option>
	  <option value="a">option a</option>
	  <option value="b">option b</option>
	  <option value="c">option c</option>
	  <option value="d">option d</option> 
	 </select><br /><br />
	 ';
		//echo $course;
		echo "<input type='hidden' name='crse' value='$course' />";
		echo "<input type='hidden' name='yr' value='$year' />";
		echo "<input type='hidden' name='dept' value='$department' />";
	 }
		
			
	echo '<div class="form-group">
	  <label class="col-md-12 control-label" for=""></label>
	  <div class="col-md-12">
		<input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
		
		
	  </div>
	</div>

	</fieldset>
	</form></div>';



	}
	?>
	<!--add quiz step 2 end-->

	<!--remove quiz-->
	<?php if(@$_GET['q']==5) {

	$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
	echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
	<tr><td><b>S.No</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
	$c=1;
	while($row = mysqli_fetch_array($result)) {
		$title = $row['title'];
		$total = $row['total'];
		$sahi = $row['sahi'];
		$time = $row['time'];
		$eid = $row['eid'];
		echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
		<td><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
	}
	$c=0;
	echo '</table></div></div>';

	}
	?>

	<!-- Question retrieval -->
	<!--
	<?php /*if(@$_GET['q']==10) {
	  $x=$_POST['id'];
	  if(isset($_POST['id']))
	  {

		  $sql2=mysqli_query($con,"select * from questions where eid='$x'");
		 while($row= mysqli_fetch_array($sql2))
		{
		  echo "<table>";
		  echo "<tr><th class='text-primary'>ID</th><th class='text-primary'>Question</th>
				<th class='text-primary'>Update</th>
				<th class='text-primary'>Delete</th></tR>";
		  echo "<tr>";
		  echo "<td>".$result['qid']. "</td>";
		  echo "<td>".$result['qns']."</td>";
		  echo "<td><a href='dash.php?qid=$id&q=8'><span class='glyphicon glyphicon-edit'></span></a></td>";
		  echo "<td><a href='quedelete.php?qid=$id'><span class='glyphicon glyphicon-trash'></span></a></td>";
		  echo "</tr>";
		  }
		  echo "</table>";
		}
	  }*/
	?>
	-->


	<!-- Question Retrieval Section -->
	<?php
	//Used from tablefilter.php file (only for backup here)

	/*if(@$_GET['q']==10 && @$_GET['id']!= NULL) {
	  $eid=$_GET['id'];

		$sqll=mysqli_query($con,"select * from questions where eid='$eid'");
	  echo "<table class='table table-striped' id='table'>";
		echo "<tr>
			  <td><a class='btn btn-danger' href=\"dash.php?q=7\">Add Question </a> </td>
			</tr>
			<tr>
			  <th class='text-primary'>ID</th>
			  <th class='text-primary'>Question</th>
					  <th class='text-primary'>Update</th>
					  <th class='text-primary'>Delete</th>
			</tr>";

		while($result=mysqli_fetch_array($sqll))
		{
		$id=$result['qid'];
		echo "<tr>";
		echo "<td>".$result['qid']. "</td>";
		echo "<td>".$result['qns']."</td>";
		echo "<td><a href='dash.php?qid=$id&q=8'><span class='glyphicon glyphicon-edit'></span></a></td>";
		echo "<td><a href='quedelete.php?qid=$id'><span class='glyphicon glyphicon-trash'></span></a></td>";
		echo "</tr>";
		}
		echo "</table>";

	}*/
	?>





	<!-- Question section -->
	<?php if(@$_GET['q']==6) {
		$sqll=mysqli_query($con,"select * from questions");

		if(@$_GET['q']==6 && @$_GET['z'] == NULL)
		{
		echo "<table class='table table-striped' id='table'>";
		//echo "<tr><td colspan='5'><a class='btn btn-danger' href=\"dash.php?q=7\">Add Question </a> </td></tr>";

	    echo '<form method="post" action="dash.php?q=10">
				<div class="row" id="row">
					
					<div class="col-sm-3"></div>
				<div class="col-sm-6">
				<span class="title1" style="margin-left:22%;font-size:220%;"><b>Enter Course Details</b></span><br><br>
				
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
				department.onchange = function ()
				{
				  var course1=document.getElementById("course").value;
				  var year1=document.getElementById("year").value;
				  var dep1=document.getElementById("department").value;
				  if (window.XMLHttpRequest)
				  {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				  }
				  else
				  {
					// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				  xmlhttp.onreadystatechange=function()
				  {
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
					  document.getElementById("row").innerHTML=xmlhttp.responseText;
					}
				  }
				  //alert(course1);
				  //alert(year1);
				  //alert(dep1);
				  xmlhttp.open("POST","dash3.php?q=6&x="+course1+"&y="+year1+"&z="+dep1,true);
				  xmlhttp.send();



				  //xmlhttp.open("POST","dash2.php?q=7+"x="+x+"?y="+y+"?z="+z,true);
				}

			  }
				
			  </script>
			  <!-- Course field-->
		  <div class="form-group">
			<label class="col-md-12 control-label" for="course"></label>
			<div class="col-md-12">
			<b>Select Course:</b>
			<select name="course" id="course" size="1" required class="form-control input-md">
				<option value="" selected="selected">Select Your Course</option>
			</select>
			</div>
		  </div>

		  <!-- Year field-->
		  <div class="form-group">
			<label class="col-md-12 control-label" for="year"></label>
			<div class="col-md-12">
			<b>Select Year: </b>
			<select name="year" id="year" size="1" required class="form-control input-md">
			  <option value="" selected="selected">Select Your Year</option>
			</select>
			</div>
		  </div>

		  <!-- Department field-->
		  <div class="form-group">
			<label class="col-md-12 control-label" for="department" ></label>
			<div class="col-md-12">
			<b>Select Department: </b>
			<select name="department" id="department" size="1" required class="form-control input-md">
			  <option value="" selected="selected">Select Your Department</option>
			</select>
			</div>
		  </div>
		  </div>
					 <div class="col-sm-3 form-group"></div>
		  ';

						echo ' 
					
					 <script>
						  function showDetails(id)
						  {
						  if (window.XMLHttpRequest)
						  {// code for IE7+, Firefox, Chrome, Opera, Safari
						  xmlhttp=new XMLHttpRequest();
						  }
						  else
						  {// code for IE6, IE5
						  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						  }
						  xmlhttp.onreadystatechange=function()
						  {
						  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						  {
						  document.getElementById("table").innerHTML=xmlhttp.responseText;
						  alert(responseText);
						  }
						  }
						  xmlhttp.open("POST","tablefilter.php?id="+id,true);
						  xmlhttp.send();
						  }
					  </script>';
		}
		else{
			
			echo '<form method="post" action="dash.php?q=10">
				<div class="row" id ="row">
					<div class="col-sm-6">
				
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
				department.onchange = function ()
				{
				  var course1=document.getElementById("course").value;
				  var year1=document.getElementById("year").value;
				  var dep1=document.getElementById("department").value;
				  if (window.XMLHttpRequest)
				  {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				  }
				  else
				  {
					// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				  xmlhttp.onreadystatechange=function()
				  {
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
					  document.getElementById("row").innerHTML=xmlhttp.responseText;
					}
				  }
				  alert(course1);
				  alert(year1);
				  alert(dep1);
				  xmlhttp.open("POST","dash3.php?q=6&x="+course1+"&y="+year1+"&z="+dep1,true);
				  xmlhttp.send();



				  //xmlhttp.open("POST","dash2.php?q=6+"x="+x+"?y="+y+"?z="+z,true);
				}

			  }
			  </script>
			  <!-- Course field-->
		  <div class="form-group">
			<label class="col-md-12 control-label" for="name"></label>
			<div class="col-md-12">
			<b>Select Course:</b>
			<select name="course" id="course" size="1" required class="form-control input-md">
				<option value="" selected="selected">Select Your Course</option>
			</select>
			</div>
		  </div>

		  <!-- Year field-->
		  <div class="form-group">
			<label class="col-md-12 control-label" for="name"></label>
			<div class="col-md-12">
			<b>Select Year: </b>
			<select name="year" id="year" size="1" required class="form-control input-md">
			  <option value="" selected="selected">Select Your Year</option>
			</select>
			</div>
		  </div>

		  <!-- Department field-->
		  <div class="form-group">
			<label class="col-md-12 control-label" for="name" ></label>
			<div class="col-md-12">
			<b>Select Department: </b>
			<select name="department" id="department" size="1" required class="form-control input-md">
			  <option value="" selected="selected">Select Your Department</option>
			</select>
			</div>
		  </div><br>
		  ';
			
		echo'<label>Select Subject:</label>
					<select class="form-control" name="subject" required onChange="showDetails(this.value)" >';

								//Connection Establishment
								$conn = new mysqli("SERVER","USERNAME","PASSWORD","DATABASE");
								// Check connection
								if ($conn->connect_error) {
								  die("Connection failed: " . $conn->connect_error);
								}

								$sql = "SELECT eid,title,total FROM quiz";
								$result = $conn->query($sql);
								$sqlquiz="SELECT title FROM quiz";
								$result2 = $conn->query($sqlquiz);

								if ($result->num_rows > 0) {

								  // output data of each row

								  while($row = $result->fetch_assoc()) {

									$x=$row[eid];
									echo "<option value='$row[eid]' id='sid' >$row[title]</option>";

								  }
								} else {
								  echo "0 results";
								}

								$conn->close();
							echo '</select>
							<div id="details"></div>
					</div>

				  </div>
				</form>';
		
		echo "</table>";
	
	
	
	}
	}
	?>

	<!-- Add Question Section -->
	<?php
	if(@$_GET['q']==7 || @$_GET['q']==7 && (@$_GET['x'])!=NULL && (@$_GET['y'])!= NULL && (@$_GET['z'])!= NULL) {

	   if(@$_GET['q']==7 && @$_GET['z'] == NULL){

		 echo '
		 <div class="row" id="row">
			<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span>
				<br /><br />
				<div class="col-md-3"></div>
				<div class="col-md-6">';

			  echo '
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
				department.onchange = function ()
				{
				  var course1=document.getElementById("course").value;
				  var year1=document.getElementById("year").value;
				  var dep1=document.getElementById("department").value;
				  if (window.XMLHttpRequest)
				  {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				  }
				  else
				  {
					// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				  xmlhttp.onreadystatechange=function()
				  {
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
					  document.getElementById("row").innerHTML=xmlhttp.responseText;
					}
				  }
				  alert(course1);
				  alert(year1);
				  alert(dep1);
				  xmlhttp.open("POST","dash2.php?q=7&x="+course1+"&y="+year1+"&z="+dep1,true);
				  xmlhttp.send();



				  //xmlhttp.open("POST","dash2.php?q=7+"x="+x+"?y="+y+"?z="+z,true);
				}

			  }
			  </script>
			  <!-- Course field-->
		  <div class="form-group">
			<label class="col-md-12 control-label" for="name"></label>
			<div class="col-md-12">
			<b>Select Course:</b>
			<select name="course" id="course" size="1" required class="form-control input-md">
				<option value="" selected="selected">Select Your Course</option>
			</select>
			</div>
		  </div>

		  <!-- Year field-->
		  <div class="form-group">
			<label class="col-md-12 control-label" for="name"></label>
			<div class="col-md-12">
			<b>Select Year: </b>
			<select name="year" id="year" size="1" required class="form-control input-md">
			  <option value="" selected="selected">Select Your Year</option>
			</select>
			</div>
		  </div>

		  <!-- Department field-->
		  <div class="form-group">
			<label class="col-md-12 control-label" for="name" ></label>
			<div class="col-md-12">
			<b>Select Department: </b>
			<select name="department" id="department" size="1" required class="form-control input-md">
			  <option value="" selected="selected">Select Your Department</option>
			</select>
			</div>
		  </div>
		  </div>
		  <div class="col-md-3"></div>';


	  }// Here comment
	  else {
		  $course=@$_GET['x'];
		  $year=@$_GET['y'];
		  $department=@$_GET['z'];
		  //echo $course."<br>".$year."<br>".$department;

	  echo '
	  <div class="row" id="row">
		<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span>
		<br /><br />
		<div class="col-md-3"></div>
		<div class="col-md-6">
		<form class="form-horizontal title1" name="form" action="update.php?q=addqns1&n=1&ch=4" method="POST">
		<fieldset>
		
	  ';


		  for($i=1;$i<2;$i++)
		  {

		  echo '<b>Subject:</><br /><!-- Text input-->
		  <div class="form-group">
			<label class="col-md-12 control-label" for="qns'.$i.' "></label>
			<div class="col-md-12">
			  <select class="form-control" name="title" id="eid">';


		 	$conn = new mysqli("SERVER","USERNAME","PASSWORD","DATABASE");
		  // Check connection
		  if ($conn->connect_error)
		  {
			die("Connection failed: " . $conn->connect_error);
		  }
		  $sql = "SELECT eid,title,total FROM quiz WHERE course='$course' and year='$year' and department='$department' ";
		  $result = $conn->query($sql);
		  if ($result->num_rows > 0)
		  {
			// output data of each row
			while($row = $result->fetch_assoc())
			{
			  $x=$row[eid];
			  echo "<option value='$row[eid]'>$row[title]</option>";
			}
		  }
		  else
		  {
			echo "0 results";
		  }
		  $conn->close();
		  echo '</select></div>
			</div>
			<div class="form-group">
			  <label class="col-md-12 control-label" for="qns'.$i.' "></label>
			  <div class="col-md-12">
			  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question here..."></textarea>
			  </div>
			</div>
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-12 control-label" for="'.$i.'1"></label>
			  <div class="col-md-12">
			  <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text">
			  </div>
			</div>
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-12 control-label" for="'.$i.'2"></label>
			  <div class="col-md-12">
			  <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text">

			  </div>
			</div>
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-12 control-label" for="'.$i.'3"></label>
			  <div class="col-md-12">
			  <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text">

			  </div>
			</div>
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-12 control-label" for="'.$i.'4"></label>
			  <div class="col-md-12">
			  <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text">

			  </div>
			</div>
			<br />
			<b>Correct answer</b>:<br />
			<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
			   <option value="a">Select answer </option>
			  <option value="a">option a</option>
			  <option value="b">option b</option>
			  <option value="c">option c</option>
			  <option value="d">option d</option> </select><br /><br />';

	   echo '<div class="form-group">
			  <label class="col-md-12 control-label" for=""></label>
			  <div class="col-md-12">
				
				<input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
			  </div>
			  </div>
			  </fieldset>
			  </form>
			  </div>
			  <div class="col-md-3"></div>';

	  }
	}
	}


	?>


	<!-- Update Question Section -->
	<?php if(@$_GET['q']==8) {

	  include("dbConnection.php");
	  //extract($_REQUEST);
	  $id=$_GET['qid'];
	  //echo $id;
	  $q=mysqli_query($con,"select * from questions where qid='$id'");
	  $res=mysqli_fetch_assoc($q);
	  $o=mysqli_query($con,"select * from choices where qid='$id'");
	  $res1=mysqli_fetch_assoc($o);
	  $a=mysqli_query($con,"select * from answer where qid='$id'");
	  $res2=mysqli_fetch_assoc($a);


		echo '<form name="form1" method="post" action="update.php?q=updque&qid='.@$_GET['qid'].'">
		  <table class="table table-striped">

		 <tr>
				<td height="26"><div align="left"><strong> Enter the Question </strong></div></td>
				<td>&nbsp;</td>
				<td><input class="form-control" value="'; echo "$res[qns]"; echo'" name="updque" type="text" id="updque" size="85" maxlength="85"></td>

			</tr>
			<tr>
			  <td height="26"><div align="left"><strong>Enter Option 1 </strong></div></td>
			  <td>&nbsp;</td>
			  <td><input class="form-control" value="'; echo "$res1[option1]"; echo'" name="option1" type="text" id="ans1" size="85" maxlength="85"></td>
			</tr>
			<tr>
			  <td height="26"><strong>Enter Option 2 </strong></td>
			  <td>&nbsp;</td>
			  <td><input class="form-control" value="'; echo "$res1[option2]"; echo '" name="option2" type="text" id="ans2" size="85" maxlength="85"></td>
			</tr>
			<tr>
			  <td height="26"><strong>Enter Option 3 </strong></td>
			  <td>&nbsp;</td>
			  <td><input class="form-control" value="'; echo $res1['option3']; echo '" name="option3" type="text" id="ans3" size="85" maxlength="85"></td>
			</tr>
			<tr>
			  <td height="26"><strong>Enter Option 4</strong></td>
			  <td>&nbsp;</td>
			  <td><input class="form-control" value="'; echo $res1['option4']; echo'" name="option4" type="text" id="ans4" size="85" maxlength="85"></td>
			</tr>
			<tr>
			  <td height="26"><strong>Enter True Answer </strong></td>
			  <td>&nbsp;</td>
			  <td><input class="form-control"value="'; echo $res1['answer']; echo '" name="answer" type="text" id="anstrue" size="50" maxlength="50" placeholder="Please enter only a/b/c/d/A/B/C/D"></td>
			</tr>
			<tr>
			  <td height="26"></td>
			  <td>&nbsp;</td>
			  <td><input class="btn btn-primary" type="submit" name="update" value="UPDATE" ></td>
			</tr>
			</table>
		</form>';


	}
	?>

	<?php if(@$_GET['q']==11) 
		{
		
			$sqll=mysqli_query($con,"select * from quiz");

			echo "<table class='table table-striped' id='table'>";
			//echo "<tr><td colspan='4'><a class='btn btn-danger' href=\"dash.php?q=7\">Add Question </a> </td></tr>";

			echo "<tr><th class='text-primary'>S No</th>
					  <th class='text-primary'>Subject Title</th>
					  <th class='text-primary'>Subject Description</th>
					  
				  </tr>";

			$i=1;
			while($result=mysqli_fetch_array($sqll))
			{
				echo "<tr>";
				echo "<td>".$i++."</td>";
				echo "<td>".$result['title']."</td>";
				echo "<td>".$result['intro']."</td>";
				echo "</tr>";
			}
			echo "</table>";   
		}
	?>


	</div><!--container closed-->
	</div></div>
</body>
</html>
