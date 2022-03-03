<?php
//all the variables defined here are accessible in all the files that include this one
$con= new mysqli("SERVER","USERNAME","PASSWORD","DATABASE") or die("Could not connect to mysql".mysqli_error($con));

?>