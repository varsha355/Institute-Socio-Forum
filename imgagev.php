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
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/bmp")
|| ($_FILES["file"]["type"] == "image/png")
&& ($_FILES["file"]["size"] < 20000000))
{
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
}
else
{
if (file_exists("upload/" . $_FILES["file"]["name"]))
{
echo $_FILES["file"]["name"] . " already exists. ";
}
else
{
move_uploaded_file($_FILES["file"]["tmp_name"],
"upload/" . $_FILES["file"]["name"]);
//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
$filename=$_FILES["file"]["name"];
}
}
}
else
{
echo "Invalid file";
}

$sql="INSERT INTO img (imagname,imgcategory,description,uploadimage)VALUES('$_POST[textfield]','$_POST[textfield2]','$_POST[textarea]','$filename')";

if (!mysqli_query($con,$sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  else
  {
echo "image uploaded Successfully";
  }
}


if(isset($_GET["delimg"]))
{
mysqli_query($con,"DELETE FROM img WHERE imgid='$_GET[delimg]'");
}
$result = mysqli_query($con,"SELECT * FROM img");
?>

<form id="uploadimage" name="uploadimage" method="post" action="imgage.php" onSubmit="return upimg()" enctype="multipart/form-data">
<table width="1000" height="271" border="2" align="center">
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
<table width="1000" border="1"align="center">
  <tr>
    <th width="23%" scope="col"><strong>Image Name</strong></th>
    <th width="26%" scope="col"><strong>Image Category</strong></th>
    <th width="23%" scope="col"><strong>Description</strong></th>
    <th width="22%" scope="col"><strong>Uploaded Image</strong></th>
       <td width="6%"><strong>Delete</strong></th></td>
  </tr>
  <?php
  while($row = mysqli_fetch_assoc($result))
  {
 echo "  <tr>";
echo "    <td height='34'>&nbsp; $row[imagname]</td>";
  echo "  <td>&nbsp; $row[imgcategory]</td>";
echo "    <td>&nbsp; $row[description]</td>";
echo "    <td>&nbsp; <img src='upload/$row[uploadimage]' width='75' height='75'></td>";
echo "<td><a href='imgage.php?delimg=$row[imgid]'><img src='images/delete.jpg' width='32' height='30'></a></td>";
echo " </tr>";
  }
  ?>
</table>
