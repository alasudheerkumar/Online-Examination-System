
	<!-- Question section -->
	<?php if(@$_GET['q']==6) 
	{	
		include 'dbConnection.php';
		$sqll=mysqli_query($con,"select * from questions");

		if(@$_GET['q']==6 && @$_GET['z']== NULL)
		{
		echo "<table class='table table-striped' id='table'>";
		//echo "<tr><td colspan='5'><a class='btn btn-danger' href=\"dash.php?q=7\">Add Question </a> </td></tr>";

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
		  </div>
		  ';

						echo '
					</div>
					 <div class="col-sm-6 form-group">
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
			$course=@$_GET['x'];
			$year=@$_GET['y'];
			$department=@$_GET['z'];
			//echo $course."<br>".$year."<br>".$department; // For testing purpose
			echo "Course:<b> ".$course."</b>&nbsp;&nbsp;&nbsp;&nbsp; Year:<b> ".$year."</b>&nbsp;&nbsp;&nbsp;&nbsp; Department: <b>".$department."</b>";
			echo "<br>";
			echo '<form method="post" action="dash.php?q=10">
				<div class="row" id ="row">
					<div class="col-sm-5">
				
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
				  
				  xmlhttp.open("POST","dash3.php?q=6&x="+course1+"&y="+year1+"&z="+dep1,true);
				  xmlhttp.send();
				}
				

			  }
			  </script>';
			
			
			echo'</div>
			<div class="col-sm-2" style="text-align:right;"><label ></label></div>
			<div class="col-sm-5 form-group">
					<select class="form-control" name="subject" required onChange="showDetails(this.value)" >';

								//Connection Establishment
								$conn = new mysqli("SERVER","USERNAME","PASSWORD","DATABASE");
								// Check connection
								if ($conn->connect_error) {
								  die("Connection failed: " . $conn->connect_error);
								}
                                echo $course;
								$sql = "SELECT eid,title,total FROM quiz WHERE course='$course' and year='$year' and department='$department'";
								$result = $conn->query($sql);
								echo "<option value=''>Select Subject</option>";

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
		
	}
			
			
				
}
	
	?>