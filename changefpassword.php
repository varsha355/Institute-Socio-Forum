<?php
session_start();
include("header.php");
$res="";
$a=0;
include_once("mysql.php");
if(isset($_POST["btnchange"]))
{

$result = mysqli_query($con,"UPDATE stuacc SET password = '$_POST[password]'
WHERE email = '$_POST[emailid]'");

if($result == 1)
{
		$a=1;
		$res="Password Updated Successfully<br> <a href='login.php'> Click Here to Login</a>";
}
else
{
$res= "Wrong Email Id or Date of birth Entered";
}
}
?>

<center>
<div class=container>

<!-- head -->
<?php include("head.php"); ?>

<!-- navigation menu -->
<?php include("menu.php"); ?>

<div style="padding: 10px; text-align: left;">
<!-- body  content --><form id="form2" name="form2" method="post" action="">
<table cellpadding="10" width="100%" >
<tr>
	<td height="400" valign="top">
    
    <?php 
	if($a==1)
	{
		echo $res;
	}
	else
	{
	?>
    <table width="500" height="236" align="center" align="center" border="1">
<tr><td height="69" colspan="3"><div><strong><font size="+3">Type New password..!</font></strong></div></td>
  </tr>
  <tr >
    <td width="299" height="33"><div align="center">Email Id</div></td>
    <td width="513" colspan="2"><?php echo $_SESSION["emailidchngpass"];?> 
    <input type="hidden" name="emailid" value="<?php echo $_SESSION["emailidchngpass"];?>"  />
      &nbsp;</td>
  </tr>
  <tr>
    <td height="30"><div align="center">New password</div></td>
    <td colspan="2">
      <label for="textfield"></label>
      <input type="password" name="password" id="textfield" size="40"/>
  </td>
  </tr>
  <tr>
    <td height="24"><div align="center">Confirm password</div></td>
    <td colspan="2">
      <label for="textfield2"></label>
      <input name="cpassword" type="password" id="textfield2" size="40" />
    </td>
  </tr>
  <tr>
    <td colspan="3" align="center">

        <input type="submit" name="btnchange" id="button" value="Changepassword" />
 
    </td>
  </tr>
</table></form>
<?php
	}
	?>


   </td>
</tr>
</table>
 
</div>

