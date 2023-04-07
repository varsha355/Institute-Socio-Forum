
<?php
include("header.php");
include("profilesql.php");
include("friends.php"); 
?>
<center>
<div class=container>
<div class=container>

<!-- head --><!-- navigation menu -->
<?php include("head.php"); ?>
<?php
include("menu.php"); 
$result = mysqli_query($con,"SELECT * FROM profile ORDER BY RAND()");
$i=0;
while($row = mysqli_fetch_assoc($result))
  {

$img[$i] = $row["image"];
$uid[$i] = $row["userid"];
$i++;
  }
  
  $result = mysqli_query($con,"SELECT * FROM stuacc where id");  
$id=$_SESSION["logid"];
$strec = mysqli_query($con,"SELECT * FROM stuacc WHERE email='$id' ");

while($row = mysqli_fetch_assoc($strec))
  {
$_SESSION["stuid"] =  $row["id"];

  }

$colrec = mysqli_query($con,"SELECT * FROM profile WHERE userid='$_SESSION[stuid]' ");

while($row = mysqli_fetch_assoc($colrec))
  {
$cname = $row["coluni"];
  }

$acrec1 = mysqli_query($con,"SELECT * FROM stuacc WHERE id='$uid[0]' ");

while($row = mysqli_fetch_assoc($acrec1))
  {
	  $stid1 = $row["id"];
$name1 = $row["firstname"];
$gen1= $row["iam"];
  }
  
  $acrec2 = mysqli_query($con,"SELECT * FROM stuacc WHERE id='$uid[1]' ");

while($row = mysqli_fetch_assoc($acrec2))
  {
	  	  $stid2 = $row["id"];
$name2 = $row["firstname"];
$gen2= $row["iam"];
  }
  
  $acrec3 = mysqli_query($con,"SELECT * FROM stuacc WHERE id='$uid[2]' ");

while($row = mysqli_fetch_assoc($acrec3))
  {
	  	  $stid3 = $row["id"];
$name3 = $row["firstname"];
$gen3= $row["iam"];
  }
  
  $acrec4 = mysqli_query($con,"SELECT * FROM stuacc WHERE id='$uid[3]' ");

while($row = mysqli_fetch_assoc($acrec4))
  {
	  	  $stid4 = $row["id"];
$name4 = $row["firstname"];
$gen4= $row["iam"];
  }
  
   $acrec4 = mysqli_query($con,"SELECT * FROM stuacc WHERE id='$uid[3]' ");

while($row = mysqli_fetch_assoc($acrec4))
  {
	  	  $stid4 = $row["id"];
$name4 = $row["firstname"];
$gen4= $row["iam"];
  }
  
   $acrec4 = mysqli_query($con,"SELECT * FROM stuacc WHERE id='$uid[3]' ");

while($row = mysqli_fetch_assoc($acrec4))
  {
	  	  $stid4 = $row["id"];
$name4 = $row["firstname"];
$gen4= $row["iam"];
  }
  
   $acrec4 = mysqli_query($con,"SELECT * FROM stuacc WHERE id='$uid[3]' ");

while($row = mysqli_fetch_assoc($acrec4))
  {
	  	  $stid4 = $row["id"];
$name4 = $row["firstname"];
$gen4= $row["iam"];
  }
  
?>


<div style="padding: 10px; text-align: left;">
<!-- body  content -->

    <table width="100%" height="382" border="0" >
  <tr>
    <td width="16%" height="143" align="left" valign="top" bgcolor="#CCCCCC"><?php include("profileleft.php"); ?></td>
    <td width="55%" valign="top"><table width="100%" border="1">
      <tr>
        <td height="23"><strong>View All Friends</strong></td>
        </tr>
      </table>
     </td>
  </tr>
  </table>
   

</div>
<center>



