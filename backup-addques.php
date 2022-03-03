<!-- Add Question Section -->
<?php
if(@$_GET['q']==7 || @$_GET['q']==7 && (@$_GET['x'])!=NULL && (@$_GET['y'])!= NULL && (@$_GET['z'])!= NULL) {

   if(@$_GET['q']==7 && @$_GET['z'] == NULL){
          echo '
          <div class="row" id="row">
            <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span>
            <br /><br />
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <form class="form-horizontal title1" name="form" action="update.php?q=addqns1&n=1&ch=4" method="POST">
            <fieldset>
          ';


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



              //xmlhttp.open("POST","dash.php?q=7+"x="+x+"?y="+y+"?z="+z,true);
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

      <div id="details"></div>';

    }
  }// Here comment
  else {
      $course=@$_GET['x'];
      $year=@$_GET['y'];
      $department=@$_GET['z'];
      echo $course."<br>".$year."<br>".$department;
    /*echo'
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
  </div>';*/

      for($i=1;$i<2;$i++)
      {

      echo '<b>Subject:</><br /><!-- Text input-->
      <div class="form-group">
        <label class="col-md-12 control-label" for="qns'.$i.' "></label>
        <div class="col-md-12">
          <select class="form-control" name="title" id="eid">';


      $conn = new mysqli("SERVER_NAME","USER_NAME","PASSWORD","DATABASE");
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
        </form></div>';

  }
}


?>
