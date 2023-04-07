<?php
session_start();
$updrec="";
include("header.php");
include_once("mysql.php");
include("profilesql.php");
$id=$_SESSION["iduser"];
$result = mysqli_query($con,"SELECT * FROM scrap WHERE recieverid='$id'");
?>
<script language="javascript">

 function edt()
{
	
	if(document.edit.fname.value=="")
	{
		alert("Please enter first name");
		document.edit.fname.focus();
		document.edit.fname.select();
		return false;
	}
	else if(document.edit.lname.value=="")
	{
		alert("Please enter last name");
		document.edit.lname.focus();
		document.edit.lname.select();
		return false;
	}
	else if(document.edit.city.value=="")
	{
		alert("Please enter city");
		document.edit.city.focus();
		document.edit.city.select();
		return false;
	}

else if(document.edit.state.value=="")
	{
		alert("Please enter state");
		document.edit.state.focus();
		document.edit.state.select();
		return false;
		
		
	}
	else if(document.edit.pincode.value=="")
	{
		alert("Please enter pin code");
		document.edit.pincode.focus();
		document.edit.pincode.select();
		return false;
	}
	else if(document.edit.loc.value=="Country")
		{
			alert("Please select Your Country");
		document.edit.coll.focus();
		return false;
		}
	else if(document.edit.img.value=="")
	{
		alert("Please insert image");
		document.edit.img.focus();
		document.edit.img.select();
		return false;
	}
	else if(document.edit.hschool.value=="")
	{
		alert("Please enter school name");
		document.edit.hschool.focus();
		document.edit.hschool.select();
		return false;
	}

		
		
	else if(document.edit.coll.value=="college")
		{
			alert("Please select college");
		document.edit.coll.focus();
		return false;
		}
		else if(document.edit.course.value=="course")
		{
			alert("Please select course");
		document.edit.course.focus();
		return false;
		}
		
		
	else
		{
		return true;
		}	
}
	</script>


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
    <td colspan="3" valign="top">
    <strong>&nbsp; <a href="msgdetail.php">Compose Message </a></strong><br />
    <br />
<table width="99%" border="1">
  <tr bgcolor="#99CCFF">
    <th width="10%" scope="col">Select</th>
    <th width="14%" scope="col">Sender</th>
    <th width="50%" scope="col">Message</th>
    <th width="16%" scope="col">Date/Time</th>
    <th width="10%" scope="col">Reply</th>
  </tr>
  <?php
while($row = mysqli_fetch_assoc($result))
  {
  ?>
  <tr>
    <td><input type="checkbox" name="checkbox" id="checkbox" /></td>
    <td>&nbsp; <?php echo $row["senderid"]; ?></td>
    <td>&nbsp; <?php echo $row["smessage"]; ?></td>
    <td>&nbsp; <?php echo $row["date"]; ?> <?php echo $row["time"]; ?></td>
    <td><a href="msgdetail.php?repid=<?php echo $row["senderid"]; ?>"><img src="images/reply.jpg" width="32" height="31" /></a></td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td colspan="5">&nbsp;</td>
    </tr>
</table>
</td>
  </tr>
  </table>
   

</div>
<center>



