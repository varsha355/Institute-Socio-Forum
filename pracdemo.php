<script language="javascript">
function demo()
{
	if(document.practical.vname.value=="")
	{
		alert("Please enter video name");
		document.practical.vname.focus();
		document.practical.vname.select();
		return false;
	}

	
	else if(document.practical.vcat.value=="")
	{
		alert("Please enter video category");
		document.practical.vcat.focus();
		document.practical.vcat.select();
		return false;
	}
		else if(document.practical.uploadv.value=="")
	{
		alert("Please upload video");
		document.practical.uploadv.focus();
		document.practical.uploadv.select();
		return false;
	}
	else if(document.practical.discription.value=="")
	{
		alert("Please enter discriptionn");
		document.practical.discription.focus();
		document.practical.discription.select();
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
if(isset($_POST["button"]))
{
$sql="INSERT INTO pracdemo (videoname,videocategory,uploadvideo,description)
VALUES
('$_POST[vname]','$_POST[vcat]',
'$_POST[vlink]','$_POST[discription]')";
if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysql_error());
  }
  else
  {
echo "video uploaded Successfully";
  }

}
if(isset($_GET['prac'])) {
mysqli_query($con,"DELETE FROM pracdemo WHERE videoid='$_GET[prac]'");

}
$resrec = mysqli_query($con,"SELECT * FROM pracdemo");
?>
<?php
include("mysql.php");
$filename="";


$result = mysqli_query($con,"SELECT * FROM img");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>practical demonstration</title>
</head>

<body><center>
<h2> Practical Demonstration</h2>
<form id="practical" name="practical"  method="post" action="practical.php" onSubmit="return demo()">
<table width="100%" height="283" border="2">
  <tr>
    <td width="102" height="26">Video Name:</td>
    <td width="282">
      <label for="vname"></label>
      <input name="vname" type="text" id="vname" size="40" />
  </td>
  </tr>
  <tr>
    <td height="26"><p>Video Category</p></td>
    <td><input name="vcat" type="text" id="vcat" size="40" /></td>
  </tr>
  <tr>
    <td height="76">Upload Link</td>
    <td><textarea name="vlink" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td height="76">Description</td>
    <td>
      <label for="discription">
        <textarea name="discription" cols="45" rows="5"></textarea>
      </label></td>
  </tr>
  <tr>
    <td height="41" colspan="2" align="center"><input type="submit" name="button" id="button" value="Upload video" /></td>
    </tr>
</table></form>


<br>
<table width="535" border="1"align="center">
<?php
while($row = mysqli_fetch_assoc($resrec))
  {
  ?>
  <tr>
    <th width="37%" scope="col"><strong>Video Name</strong></th>
    <th width="31%" scope="col">&nbsp;<?php
  echo $row["videoname"];
  ?></th>
    <th width="32%" scope="col"><a href='practical.php?prac=<?php echo $row[videoid]; ?>'>Delete</a></th>
    </tr>
  <tr>
    <th colspan="3" scope="col">
	<?php
  echo $row["uploadvideo"];
  ?></th>
    </tr>
    <?php
  }
  ?>
  </table>
  
</center>
</body>
</html>