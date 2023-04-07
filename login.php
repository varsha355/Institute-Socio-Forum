<?php
include("header.php");
include_once("mysql.php");
if(isset($_SESSION["logid"]))
{
	header("Location: profile.php");
}
if(isset($_POST["logiin"]))
{
	echo "1";
	$logres = mysqli_query($con,"SELECT * FROM stuacc WHERE email='$_POST[username]' AND password='$_POST[pass]' ");

	if(mysqli_num_rows($logres) == 1)
	{
	$_SESSION["logid"] = $_POST["username"];
	header("Location: profile.php");
	}
	else
	{
	$_SESSION["logfa"] = "Invalid username or password";
	}
}

?>

<center>
<div class=container>

<!-- head -->
<?php include("loghead.php"); ?>

<!-- navigation menu -->
<?php include("menu.php"); ?>

<div style="padding: 10px; text-align: left;">
<!-- body  content -->
<table cellpadding=10 width=100%>
<tr>
	<td height=400 valign=top>
    <form method="post" action="login.php">
		<table width="100%" border="1">
	  <tr>
	    <th height="25" colspan="2" align="center" scope="col"><font size="3" color="#996600">Login Page
		<?php 
		if(isset($_SESSION["res"]))
		{
			echo "<br>"; 
		echo $_SESSION["res"]; 
		}
		elseif(isset($_SESSION["logfa"]))
		{
			echo "<br>"; 
			echo $_SESSION["logfa"];
		
		}
		else
		{
			echo "<br>"; 
			echo "Please Enter User Name And Password"; 
		}
		?></font></th>
	    </tr>

			
				  <td height="44"><strong>&nbsp;&nbsp; Email Id</strong></td>
				<td><strong>&nbsp;&nbsp;<input type="text" name="username" size="30" value="">
				</strong></td>
			</tr>
	  <tr>
	    <td height="48"><strong>&nbsp;&nbsp; Password</strong></td>
	    <td><strong>&nbsp;&nbsp;<input name="pass" type="password" id="pass" value="" size="30">
	    </strong></td>
	    </tr>
	  <tr>
	    <td height="23" colspan="2" align="center"><strong><a href="forgot1.php">Forgot Password</a></strong></td>
	    </tr>
	  <tr>
	    <td height="60" colspan="2" align="center">
	      <input name="logiin" type="submit" id="logiin" value="Click Here to Login">
	     </td>
	    </tr>
	  </table>
      </form>
      </td>
</tr>
</table>

</div>

