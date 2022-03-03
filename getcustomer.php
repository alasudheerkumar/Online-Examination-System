<?php


//echo "<script>alert('hi');</script>";
$mysqli = new mysqli("SERVER","USERNAME","PASSWORD","DATABASE");
if($mysqli->connect_error) {
  exit('Could not connect');
}
$x=$_GET['str'];

$sql = "SELECT qid,qns FROM question WHERE eid = '$x'";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", '$x' );
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($qid,$qns);
$stmt->fetch();
$stmt->close();
echo "<script>alert('HHHHHHHHH');</script>";
echo "<table>";
echo "<tr>";
echo "<th>ID</th>";
echo "<td>" . $qid . "</td>";
echo "<th>Question</th>";
echo "<td>" . $qns . "</td>";
echo "</tr>";
echo "</table>";

?>
