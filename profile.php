
<?php
include("mysql.php");
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
$id=$_SESSION["logid"];
while($row = mysqli_fetch_assoc($result))
{
	if($row["userid"] != $id )
	{ 
		$img[$i] = $row["image"];
		$uid[$i] = $row["userid"];
		$i++;
	}
}

$strec = mysqli_query($con,"SELECT * FROM stuacc WHERE email='$id'");

while($row = mysqli_fetch_assoc($strec))
  {
$_SESSION["stuid"] =  $row["id"];

  }
$stdid=$_SESSION["stuid"];
$colrec = mysqli_query($con,"SELECT * FROM profile WHERE userid='$stdid' ");
$cname = '';
$city = '';
$state = '';
$pincode = '';
$country = '';
while($row = mysqli_fetch_assoc($colrec))
  {
$cname = $row["coluni"];
$city = $row["city"];
$state = $row["state"];
$pincode = $row["pincode"];
$country = $row["country"];
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
    <td width="16%" rowspan="9" align="left" valign="top" bgcolor="#CCCCCC"><?php include("profileleft.php"); ?></td>
    <td width="55%" rowspan="9" valign="top"><table width="100%" border="1">
        <tr>
          <th scope="col"><strong>Welcome, <?php echo $_SESSION["logid"]; ?></strong></th>
          </tr>
        <tr>
          <td><strong>Number of visitors:
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
          <td><strong>College Name : </strong><b><?php echo $cname ; ?></b></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width=100%>
        
		<tr valign=top align=center>
		  <td colspan="4" align="left"><strong>Request Friends</strong></td>
		  </tr>
		<tr valign=top align=center>
			<td><a href="friendsprofile.php?fid=<?php echo $stid1 ; ?>"><img src="<?php echo $img[0] ; ?>" width="100" height="150" border="0" alt=""><br />
			 <?php echo $name1 ; ?><br />
           
			</a><br></td>
			<td><a href="friendsprofile.php?fid=<?php echo $stid2 ; ?>""><img src="<?php echo $img[1] ; ?>" width="100" height="150" border="0" alt=""><br />
			  <?php echo $name2 ; ?>
			</a><br></td>
			<td><a href="friendsprofile.php?fid=<?php echo $stid3 ; ?>""><img src="<?php echo $img[2] ; ?>" width="100" height="150" border="0" alt=""><br />
			 <?php echo $name3 ; ?>
			</a><br></td>
			<td><a href="friendsprofile.php?fid=<?php echo $stid4 ; ?>""><img src="<?php echo $img[3] ; ?>" width="100" height="150" border="0" alt=""><br />
			  <?php echo $name4 ; ?>
			</a><br></td>
       
		</tr>
		</table>
      <table width="100%" border="1">
      <tr>
        <th colspan="2" scope="col"><br />            &nbsp;     <?php echo $fname. " " . $lname; ?></th>
      </tr>
      <tr>
        <td colspan="2"><strong>College Name : </strong><b><?php echo $cname ; ?></b></td>
      </tr>
      <tr>
        <td width="51%"><strong>City :</strong></td>
        <td width="49%"><?php echo $city; ?></td>
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
      </table></td>
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
    <td height="21" colspan="2" align="center" valign="top" bgcolor="#CCCCCC"><strong><a href="viewall.php">View all</a></strong></td>
  </tr>
  <tr>
    <td height="36" bgcolor="#CCCCCC" align="center"><img src="images/alosious.jpg" alt="" width="77" height="75" /></td>
    <td height="36" bgcolor="#CCCCCC" align="center"><img src="images/alvas.jpg" alt="" width="96" height="96" /></td>
  </tr>
  <tr>
    <td height="36" bgcolor="#CCCCCC" align="center"><img src="images/canara.jpg" alt="" width="78" height="78" /></td>
    <td height="36" bgcolor="#CCCCCC"><img src="images/dhavala.jpg" alt="" width="96" height="74" /></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#CCCCCC" align="center"><strong>View all</strong></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#CCCCCC"><strong><u>Advertisement</u></strong></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#CCCCCC" align="center"  ><a href="http://www.admissionopen.com/" ><img src="images/advt.jpg" width="173" height="185" /></a></td>
  </tr>
  </table>
   

</div>
<center>



