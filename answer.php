<?php
session_start();
$updrec="";
include("header.php");
include_once("mysql.php");
include("profilesql.php");
?>

<center>
<div class=container>
<div class=container>

<!-- head --><!-- navigation menu -->
<?php include("head.php"); ?>
<?php include("menu.php"); ?>

<div style="padding: 10px; text-align: left;">
<!-- body  content -->

    <table width="100%" height="462" border="0" >
  <tr>
    <td width="17%" rowspan="7" align="left" valign="top" bgcolor="#CCCCCC"><?php include("profileleft.php"); ?></td>
    <td colspan="3" valign="top"><?php include("ans.php"); ?></td>
  </tr>
  </table>
   

</div>
<center>



