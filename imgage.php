<script language="javascript">

 function reg()
{
		ml = document.registration.email.value;
		pos1 = ml.indexOf("@")
		pos = ml.indexOf(" ")
		pos2 = (pos1+1)
		server = ml.substring(pos2);
		server_pos = server.lastIndexOf(".")
		reqtype = server.substring(server_pos+1)
		type_end = reqtype.substring(reqtype.length-1)
		
	if(document.registration.fname.value=="")
	{
		alert("Please enter first name");
		document.registration.fname.focus();
		document.registration.fname.select();
		return false;
	}
	else if(document.registration.lname.value=="")
	{
		alert("Please enter last name");
		document.registration.lname.focus();
		document.registration.lname.select();
		return false;
	}
	else if(ml == "")
	{
		document.registration.email.focus();
		document.registration.email.select();
		alert("Email cannot be blank");
		return false;                
	}


		else if(ml.indexOf("@")==-1)
		{
			document.registration.email.focus();
			document.registration.email.select();
			alert("The Email Address must contain '@' sign");
			return false;  
		}
		else if(pos1<1)
		{
			document.registration.email.focus();
			document.registration.email.select();
			alert("Email address cannot start with '@' sign");
			return false;  
		}  
		else if(ml.indexOf(".")==-1)
		{
			document.registration.email.focus();
			document.registration.email.select();
			alert("The Email Address must contain '.' sign");
			return false;  
		}
		else if(pos!=-1)
		{
			document.registration.email.focus();
			document.registration.email.select();
			alert("The Email Address cannot contain spaces");
			return false;  
		}
		else if(server.indexOf("@")!=-1)
		{
			document.registration.email.focus();
			document.registration.email.select();
			alert("A valid Email must contain only one '@' sign");
			return false;  
		} 
		else if(server.indexOf(".")==0)
		{
			document.registration.email.focus();
			document.registration.email.select();
			alert("There should some text between '@' and '.' sign");
			return false;  
		} 
		else if(reqtype=="")
		{  
			document.registration.email.focus();
			document.registration.email.select();
			alert("Email Id should end with character(like .com,.net,.org)");
			return false;  
		}
		else if(type_end.toUpperCase()<"A" || type_end.toUpperCase()>"Z")
		{
			document.registration.email.focus();
			document.registration.email.select();
			alert("Email Id should not end with number or symbol");
			return false;  
		}
		
	else if(document.registration.pass.value=="")
	{
		alert("Please enter password");
		document.registration.pass.focus();
		document.registration.pass.select();
		return false;
	}
	else if(document.registration.pass.value.length<8)
	{
		alert("The minimum length of the password is 8 characters...");
		document.registration.pass.focus();
		document.registration.pass.select();
		return false;
	}
	else if(document.registration.pass.value != document.registration.cpass.value)
    {
		alert("Password and confirm password is not matching");
		document.registration.cpass.value="";
		document.registration.cpass.focus();
		document.registration.pass.select();
    	return false;
	}
	else if(document.registration.Date.value=="DD")
		{
			alert("Please select Date");
		document.registration.Date.focus();
		return false;
		}
		else if(document.registration.month.value=="Month")
		{
			alert("Please select Month");
		document.registration.month.focus();
		return false;
		}
		else if(document.registration.Year.value=="Year")
		{
			alert("Please select Year");
		document.registration.Year.focus();
		return false;
		}
		
	else
		{
		return true;
		}	
}
	</script>
	
<?php
include("mysql.php");
$result1 = mysqli_query($con,"SELECT * FROM college");

if(isset($_POST["button2"]))
{
echo 	$datee="$_POST[Year]-$_POST[month]-$_POST[Date]";
$sql="INSERT INTO stuacc (firstname,lastname,email,password,confirmpassword,iam,dob)
VALUES
('$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[pass]','$_POST[cpass]','$_POST[gen]','$datee')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysql_error());
  }
  else
  {
echo "User Registered Successfully...";
  }

}
 
include("header.php");
?>

<center>
<div class=container>

<!-- head -->
<?php include("head.php"); ?>

<!-- navigation menu -->
<?php include("menu.php"); ?>

<div style="padding: 10px; text-align: left;">
<!-- body  content -->
<table width=100% height="186" cellpadding=10>
<script language="javascript">
 function upimg()
{
	if(document.uploadimage.textfield.value=="")
	{
		alert("Please enter image name");
		document.uploadimage.textfield.focus();
		document.uploadimage.textfield.select();
		return false;
		}
	else if(document.uploadimage.textfield2.value=="")
	{
		alert("Please enter image category");
		document.uploadimage.textfield2.focus();
		document.uploadimage.textfield2.select();
		return false;
	}
	else if(document.uploadimage.textarea.value=="")
	{
		alert("Please enter image description");
		document.uploadimage.textarea.focus();
		document.uploadimage.textarea.select();
		return false;
	}
	else if(document.uploadimage.file.value=="")
	{
		alert("Please upload image");
		document.uploadimage.file.focus();
		document.uploadimage.file.select();
		return false;
	}
		else
		{
		return true;
		}	
}
	</script>
<?php
include("mysql.php");
$filename="";
if(isset($_POST["button"]))
{
if (($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
&& ($_FILES["file"]["size"] < 200000000))
{
	
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
}
else
{
//echo "Upload: " . $_FILES["file"]["name"] . "<br />";
//echo "Type: " . $_FILES["file"]["type"] . "<br />";
//echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
//echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
if (file_exists("upload/" . $_FILES["file"]["name"]))
{
echo $_FILES["file"]["name"] . " already exists. ";
}
else
{
move_uploaded_file($_FILES["file"]["tmp_name"],
"upload/" . $_FILES["file"]["name"]);
$filename= $_FILES["file"]["name"];
$sql="INSERT INTO img (imagname,imgcategory,description,uploadimage)VALUES('$_POST[textfield]','$_POST[textfield2]','$_POST[textarea]','$filename')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysql_error());
  }
  else
  {
echo "image uploaded Successfully";
  }
} 
}
}
}



if(isset($_GET["delimg"]))
{
mysqli_query($con,"DELETE FROM img WHERE imgid='$_GET[delimg]'");
}
$result = mysqli_query($con,"SELECT * FROM img");
?>

<form name="uploadimage" method="post" action="imgage.php" onSubmit="return upimg()" enctype="multipart/form-data">
<table width="90%" height="271" border="2" align="center">
  <tr>
    <td width="100">Image Name</td>
    <td width="300">
      <label for="textfield"></label>
      <input name="textfield" type="text" id="textfield" size="40" />
 </td>
  </tr>
  <tr>
    <td>Image Category</td>
    <td><input name="textfield2" type="text" id="textfield2" size="40" /></td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name="textarea" id="textarea" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>Upload Image</td>
    <td>
      <label for="fileField"></label>
      <input type="file" name="file" id="file" />
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Upload Image" /></td>
  </tr>
</table>

</form>
<br>
<table width="90%" border="1"align="center">
  <tr>
    <th width="23%" scope="col"><strong>Image Name</strong></th>
    <th width="26%" scope="col"><strong>Image Category</strong></th>
    <th width="23%" scope="col"><strong>Description</strong></th>
    <th width="22%" scope="col"><strong>Uploaded Image</strong></th>
       <td width="6%"><strong>Delete</strong></th></td>
  </tr>
  <?php
  while($row = mysqli_fetch_array($result))
  {
 echo "  <tr>";
echo "    <td height='34'>&nbsp; $row[imagname]</td>";
  echo "  <td>&nbsp; $row[imgcategory]</td>";
echo "    <td>&nbsp; $row[description]</td>";
echo "    <td>&nbsp; <img src='upload/$row[uploadimage]' width='75' height='75'></td>";
echo "<td><a href='imgage.php?delimg=$row[imgid]'><img src='images/del.jpg' width='100' height='100'></a></td>";
echo " </tr>";
  }
  ?>
</table>

<tr>
	<td width="70%">&nbsp;</td>
	<td width="30%" valign="top">&nbsp;</td>
</tr>
</table>

</div>

<center>

</body>
</html>
