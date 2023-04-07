<?php
session_start();
$updrec="";
include("header.php");
include_once("mysql.php");
include("profilesql.php");
$dt = date("m-d-Y");
 $b = date("h:i:s"); 
$iduser = $_SESSION["iduser"];
$result = mysqli_query($con,"SELECT * FROM scrap
WHERE recieverid='$iduser'");

$result123 = mysqli_query($con,"SELECT * FROM stuacc");
if(isset($_POST["sndmsg"]))
{
	$iduser = $_SESSION["iduser"];
	$senderid = $_POST["senderid"];
	$textarea = $_POST["textarea"];
$sql="INSERT INTO scrap (senderid,recieverid,smessage,time,date) VALUES ('$iduser','$senderid','$textarea','$b','$dt')";
$res="";
if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysql_error());
  }
  else
  {
$res= "Message Sent Successfully";
  }

}
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
    <form id="form1" name="form1" method="post" action="">
<table cellpadding=10 width=100%>
<tr>
	<td height=400 valign=top>
		<table width="93%" border="1">
  <tr>
    <td colspan="2" align="center">&nbsp;<b> <?php echo $res; ?></b></td>
    </tr>
  <tr>
    <td>Name</td>
    <td>&nbsp;
    <?php
	if(isset($_GET["repid"]))
	{
		echo $_GET["repid"];
echo "<input type='hidden' value='$_GET[repid]' name='senderid'>";
	}
	else
	{
	echo "<select name='senderid'>";
	while($row = mysqli_fetch_assoc($result123))
  {

echo "	<option value='$row[id]'>$row[firstname] $row[lastname]</option>";
  }
echo "    </select>";
echo "<input type='hidden' value='$row[id]' name='senderid'>";
	}
	?>
    </td>
  </tr>
  <tr>
    <td>Message</td>
    <td>&nbsp;
    
    <textarea name="textarea" cols="45" rows="5"></textarea>
  </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <input type="submit" name="sndmsg" id="sndmsg" value="Send Message" />
    </td>
  </tr>
</table>
	</td>
  </tr>
  </table>
   </form>

</div>
<center>



