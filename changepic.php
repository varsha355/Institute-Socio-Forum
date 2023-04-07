<?php
session_start();
$updrec="";
include("header.php");
include_once("mysql.php");
include("profilesql.php");

$conrec = mysqli_query($con,"SELECT * FROM college");

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
if (file_exists("usersimg/" . $_FILES["file"]["name"]))
{
echo $_FILES["file"]["name"] . " already exists. ";
}
else
{
move_uploaded_file($_FILES["file"]["tmp_name"],
"usersimg/" . $_FILES["file"]["name"]);
//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
$filename=$_FILES["file"]["name"];
}
}
}
else
{
echo "Invalid file";
}
$iduser = $_SESSION['iduser'];
mysqli_query($con,"UPDATE profile SET image = 'usersimg/$filename'
WHERE userid = '$iduser' ");

}


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
    <td colspan="3" valign="top">
  <form id="edit" name="edit" method="post" action="changepic.php" enctype="multipart/form-data" ><br />
<table width="353" height="82" border="2" align="center">
  <tr>
    <td width="105" height="44">Upload Image</td>
    <td width="230">
      <input type="file" name="file" id="file" />
      </td>
  </tr>
  <tr>
    <td height="28">&nbsp;</td>
    <td><input type="submit" name="button" value="Upload Image" /></td>
  </tr>
</table>

</form>
 </td>
  </tr>
  </table>
   

</div>
<center>



