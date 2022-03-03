<link  rel="stylesheet" href="css/bootstrap.min.css"/>
<link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<?php
include 'dbConnection.php';
if(@$_GET['id']!= NULL) {
  $eid=$_GET['id'];

	$sqll=mysqli_query($con,"select * from questions where eid='$eid'");
  echo "<table class='table table-striped' id='table'>
        <tr>
          <td colspan='5'><a class='btn btn-danger' href=\"dash.php?q=7\">Add Question </a> </td>
        </tr>
        <tr>
		<th class='text-primary'>S.No</th>
          <th class='text-primary'>Question ID</th>
          <th class='text-primary'>Question</th>
				  <th class='text-primary'>Update</th>
				  <th class='text-primary'>Delete</th>
        </tr>";
	$i=1;
	while($result=mysqli_fetch_array($sqll))
	{
		
    $id=$result['qid'];
  	echo "<tr>";
  	echo "<td>".$i++. "</td>";
	echo "<td>".$result['qid']. "</td>";
  	echo "<td>".$result['qns']."</td>";
  	echo "<td><a href='dash.php?qid=$id&q=8'><span class='glyphicon glyphicon-edit'></span></a></td>";
  	echo "<td><a href='quedelete.php?qid=$id'><span class='glyphicon glyphicon-trash'></span></a></td>";
  	echo "</tr>";
  	}
  	echo "</table>";

}
?>
