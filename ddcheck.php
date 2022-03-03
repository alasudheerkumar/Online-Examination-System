<html>

<head>
<script>
  var courses = {

		//"Telanaga": {"South Australia": ["Dunstan", "Mitchell"],"Victoria": ["Altona", "Euroa"]},
		"B.Tech": {"Iyear": ["CSE", "ECE","EEE", "CIV","CHE", "ME"],"IIyear": ["CSE", "ECE","EEE", "CIV","CHE", "ME"],"IIIyear": ["CSE", "ECE","EEE", "CIV","CHE", "ME"],"IVyear": ["CSE", "ECE","EEE", "CIV","CHE", "ME"],},
		"M.Tech": {"Iyear": ["CSE", "ECE","EEE", "CIV","CHE", "ME"],"IIyear": ["CSE", "ECE","EEE", "CIV","CHE", "ME"],},
		"M.C.A": {"Iyear": ["CSE"],"IIyear": ["CSE"],"IIIyear": ["CSE"],},
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
        document.getElementById("table").innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("POST","tabledata.php?x="+course1+"&y="+year1+"&z="+dep1,true);
    xmlhttp.send();
    //alert(course1);
    //alert(year1);
    //alert(dep1);
    
    //xmlhttp.open("POST","tabledata.php?x="+x+"?y="+y+"?z="+z,true);
  }

}
</script>
</head>
<body>

		<b>Select Course:</b> <select name="course" id="course" size="1" required onChange="showDetails()" >
        <option value="" selected="selected">Select Your Course</option>
            </select>
            <br>
            <br>
            <b>Select Year: </b><select name="year" id="year" size="1" onChange="showDetails()">
            <option value="" selected="selected">Select Your Year</option>
            </select>
            <br>
            <br>
            <b>Select Department: </b><select name="department" id="department" size="1" onChange="showDetails()">
            <option value="" selected="selected">Select Your Department</option>
            </select><br>

			<div id="details"></div>


			<?php
				$con= new mysqli("SERVER","USERNAME","PASSWORD","DATABASE") or die("Could not connect to mysql".mysqli_error($con));
				$sqll=mysqli_query($con,"select * from questions");
				echo "<table class='table table-striped' id='table'>";
	//echo "<tr><td colspan='4'><a class='btn btn-danger' href=\"dash.php?q=7\">Add Question </a> </td></tr>";

  echo '<form method="post" action="#">
            <div class="row">

                 <div class="col-sm-6 form-group">
                 <script>
                      function showDetails()
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
                        alert("HEllo");
                        var x=document.getElementById("course").val();
                        var y=document.getElementById("year").val();
                        var z=document.getElementById("department").val();
                      document.getElementById("table").innerHTML=xmlhttp.responseText;
                      alert(responseText);
                      }
                      }
                      xmlhttp.open("POST","tabledata.php?x="+x+"?y="+y+"?z="+z,true);
                      xmlhttp.send();
                      }


					  $("select option:selected").each(function() {
							selectedValues += $(this).val() + ",";
						});

						$.ajax({
							method: "POST",
							url: "tabledata.php",
							data: {values: selectedValues}
						});
						var course= $("#course").val();
						var year= $("#year").val();
						var dept= $("#dept").val();
						beforeSend : function()
						{
						$("#loader").css("display", "block");
						$("#loader").css("margin", "auto");
						$("body").append(course+" "+year+" "+dept);
						},
						success : function(res) {
							$("#success").css("display", "block");
						}

                  </script>';


                           echo '
                        <div id="details"></div>
                </div>

            </form>';

	echo "</table>";


			?>





























</body>
