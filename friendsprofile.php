<?php>
<?php error_reporting(0);
session_start();
?>
<?php
session_start();
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
if($_GET["addf"]=="t")
{
$stdid=$_SESSION["stuid"];
$sql="INSERT INTO addfriends(meid,friendid) VALUES
('$stdid','$_GET[fid]')";
if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysql_error());
  }
}
$result = mysqli_query($con,"SELECT * FROM stuacc where id=$_GET[fid]");
while($row = mysqli_fetch_assoc($result))
  {
$fname = $row["firstname"];
$lname = $row["lastname"];
  }
  
  $result1 = mysqli_query($con,"SELECT * FROM profile where userid=$_GET[fid]"); 
  
while($row = mysqli_fetch_assoc($result1))
  {
$usimg = $row["image"];
$city = $row["city"];
$state = $row["state"];
$pincode = $row["pincode"];
$country= $row["country"];
$hschoool= $row["hschool"];
$coluni= $row["coluni"];
$course= $row["course"];
  } 
$stdid=$_SESSION["stuid"];
$colrec = mysqli_query($con,"SELECT * FROM profile WHERE userid='$stdid' ");

while($row = mysqli_fetch_assoc($colrec))
  {
$cname = $row["coluni"];
  }
$result = mysqli_query($con,"SELECT * FROM profile ORDER BY RAND()");
$i=0;
while($row = mysqli_fetch_assoc($result))
  {

$img[$i] = $row["image"];
$uid[$i] = $row["userid"];
$i++;
  }
  
  $result = mysqli_query($con,"SELECT * FROM stuacc where id");  

$strec = mysqli_query($con,"SELECT * FROM stuacc WHERE email='$_SESSION[logid]' ");

while($row = mysqli_fetch_assoc($strec))
  {
$_SESSION["stuid"] =  $row["id"];

  }
$stdid=$_SESSION["stuid"];
$colrec = mysqli_query($con,"SELECT * FROM profile WHERE userid='$stdid' ");

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
?>


<div style="padding: 10px; text-align: left;">
<!-- body  content -->

    <table width="100%" height="382" border="0" >
  <tr>
    <td width="19%" rowspan="10" align="left" valign="top" bgcolor="#CCCCCC">
	
    <br /><center>
<a href="profile.php"><img src="<?php echo $usimg;?>" alt="" width="90" height="106" /></a><br>
      <font color="#000099"><strong>
	</strong></center>
     <hr /> <a href="friendsprofile.php?fid=<?php echo $_GET["fid"]; ?>&fmes=Added as friend&addf=t">
<img src="images/icon/profile.gif" width="23" height="22" align="absmiddle" />  Add As Friend</a><br />
     <p>&nbsp;</p>
    
    
    </td>
    <td width="50%" rowspan="10" valign="top"><table width="100%" border="1">
      <tr>
        <th colspan="2" scope="col"><br />            &nbsp;     <?php echo $fname. " " . $lname; ?></th>
        </tr>
      <tr>
        <td colspan="2"><strong>Number of visitors:
          <?php
if(isset($_SESSION['views']))
 $_SESSION['views']=$_SESSION['views']+1;
   else
 $_SESSION['views']=1;
 echo $_SESSION['views']; 
 ?>
          </strong></td>
        </tr>
      <tr>
        <td height="23"><strong>State:</strong></td>
        <td><?php echo $state; ?></td>
        </tr>
      <tr>
        <td height="23"><strong>Pincode:</strong></td>
        <td><?php echo $pincode; ?></td>
        </tr>
      <tr>
        <td height="23"><strong>Country:</strong></td>
        <td><?php echo $country; ?></td>
        </tr>
      <tr>
        <td height="23"><strong>High Shcool:</strong></td>
        <td><?php echo $hschoool; ?></td>
        </tr>
      <tr>
        <td height="23"><p><strong>College/Univesity:</strong></p></td>
        <td><?php echo $coluni; ?></td>
        </tr>
      </table>
      
    </td>
    <td height="23" colspan="2" background="" bgcolor="#CCCCCC"><strong><u>My friends</u></strong></td>
      </tr>
  <tr>
    <td width="14%" height="23" bgcolor="#CCCCCC" align="center" valign="top"><img src="<?php echo $img[0] ; ?>" alt="" width="71" height="53" /></td>
    <td width="15%" height="23" bgcolor="#CCCCCC" align="center" valign="top"><img src="<?php echo $img[1] ; ?>" alt="" width="71" height="53" /></td>
    </tr>
  <tr>
    <td height="4" align="center" valign="top" bgcolor="#CCCCCC"><img src="<?php echo $img[2] ; ?>" alt="" width="71" height="53" /><br />
      <br /></td>
    <td height="4" bgcolor="#CCCCCC" align="center" valign="top"><img src="<?php echo $img[3] ; ?>" alt="" width="71" height="53" /></td>
    </tr>
  <tr>
    <td height="21" colspan="2" align="center" valign="top" bgcolor="#CCCCCC"><strong>View all</strong></td>
  </tr>
  <tr>
    <td height="21" colspan="2" align="left" valign="top" bgcolor="#CCCCCC"><strong><u>Colleges</strong></td>
  </tr>
  <tr>
    <td height="36" bgcolor="#CCCCCC" align="center" ><img src="imagesCALAZIBU.jpg" alt="" width="71" height="53" /></td>
    <td height="36" bgcolor="#CCCCCC" align="center" ><img src="imagesCALAZIBU.jpg" alt="" width="71" height="53" /></td>
  </tr>
  <tr>
    <td height="36" bgcolor="#CCCCCC" align="center" ><img src="imagesCALAZIBU.jpg" alt="" width="71" height="53" /></td>
    <td height="36" bgcolor="#CCCCCC" align="center" ><img src="imagesCALAZIBU.jpg" alt="" width="71" height="53" /></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#CCCCCC" align="center"><strong>View all</strong></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#CCCCCC"><strong><u>Advertisement</u></strong></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
  </table>
   

</div>
<center>



