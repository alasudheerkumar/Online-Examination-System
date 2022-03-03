<?php
session_start();
?>
<html>
<head>
<title>O E S</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include("dbConnection.php");
 $id=$_GET['qid'];

$sql=mysqli_query($con,"delete from questions where qid='$id'");
$sql2=mysqli_query($con,"delete from answer where qid='$id'");
$sql3=mysqli_query($con,"delete from choices where qid='$id'");
echo "hi";
header('location:dash.php?q=6.php');
?>
