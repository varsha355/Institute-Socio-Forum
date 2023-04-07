<?php
include_once("mysql.php");
$loginid= $_SESSION["logid"];
$profilerec = mysqli_query($con,"SELECT * FROM stuacc WHERE email ='$loginid'");

while($row = mysqli_fetch_array($profilerec))
  {
$usid  = $row["id"];
$fname = $row["firstname"];
$lname = $row["lastname"];
$gend = $row["iam"];
  }
  $_SESSION["iduser"] = $usid;

?>