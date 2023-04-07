<?php
if(isset($_POST["btnlogin"]))
{
	$logres = mysqli_query($con,"SELECT * FROM stuacc WHERE email='$_POST[txtemail]' AND password='$_POST[txtpass]' ");

	if(mysql_num_rows($logres) == 1)
	{
		$_SESSION["logid"] = $_POST["txtemail"];
	header("Location: profile.php");
	}
	else
	{
header("Location: login.php");
	}
}
?>
<div class=head><div style="padding-top: 10px"><div style="background-image: url(images/bvrit2.jpeg); background-repeat: no-repeat; height: 100px;"> <div style="position: relative; left: 10px; top: 0px; text-align: left;">
<table width=65% >
	<tr>
		<td width="50%" style="text-align: left; font: 25px arial; color: #000000;"><img src="images/bvrit.jpg" width="150" height="120" /><br></td>
		<td width="40%" align=right>&nbsp;</td>
	</tr>
	</table>
	
</div></div></div></div>