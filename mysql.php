<?php
# $con = mysqli_connect("localhost","root","password1234","collegenetworking");
$con = mysqli_connect("localhost","root","","collegenetworking(6)");

if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

?>
