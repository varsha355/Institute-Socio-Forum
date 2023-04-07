<?php
include("header.php");
include("mysql.php");
$result = mysqli_query($con,"SELECT * FROM profile ORDER BY RAND()");
if(isset($_SESSION["logid"]))
{
	header("Location: profile.php");
}
$i=0;
while($row = mysqli_fetch_assoc($result))
  {
$img[$i] = $row["image"];
$uid[$i] = $row["userid"];
$i++;
  }
  

?>
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
$datee="$_POST[Year]-$_POST[month]-$_POST[Date]";
$sql="INSERT INTO stuacc (firstname,lastname,email,password,confirmpassword,iam,dob)
VALUES
('$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[pass]','$_POST[cpass]','$_POST[gen]','$datee')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . mysql_error());
  }
  else
  {
$_SESSION["res"] =  "User Registered Successfully...";
header("Location: login.php");
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
<!-- body  content -->
<table cellpadding=10 width=100%>
<tr>
	<td width="70%">
		<img src="images/pic.png" width="518" height="137" border="0" alt="">
		<h2>Meet New Friends </h2>

		<table width=100%>
        
		<tr valign=top align=center>
			<td><a href=""><img src="<?php echo $img[0] ; ?>" width="100" height="150" border="0" alt=""></a><br></td>
			<td><a href=""><img src="<?php echo $img[1] ; ?>" width="100" height="150" border="0" alt=""></a><br></td>
			<td><a href=""><img src="<?php echo $img[2] ; ?>" width="100" height="150" border="0" alt=""></a><br></td>
			<td><a href=""><img src="<?php echo $img[3] ; ?>" width="100" height="150" border="0" alt=""></a><br></td>
       
		</tr>
		</table>

		<h2>About Us</h2>		
		Institute Socio Forum is college networking site for students to interact with other students and faculty. </td>
	<td width="30%" valign="top"><img src="images/imaa.png" width="100%" height="199"><br>
	<h2>Register Free</h2>
		<table width="208" border="0" cellpadding="5" cellspacing="0">
<form id="registration" name="registration" method="post" action="index.php" onSubmit="return reg()">
			<tr>
			  <td width="59">First Name</td>
			  <td width="91"><input name="fname" type="text" id="fname" value="" size="20"></td>
			  </tr>
			<tr>
			  <td>Last Name</td>
			  <td><input name="lname" type="text" id="lname" value="" size="20"></td>
			  </tr>
			<tr>
			  <td>Email</td>
			  <td><input name="email" type="text" id="email" value="" size="20"></td>
			  </tr>
			<tr>
			  <td>Password</td>
			  <td><input name="pass" type="Password" id="pass" size="20"></td>
			  </tr>
			<tr>
			  <td>Confirm</td>
			  <td><input name="cpass" type="Password" id="cpass" size="20"></td>
			  </tr>
			<tr>
			  <td>I am</td>
			  <td><label>
			    <input name="gen" type="radio"  value="Male" checked="checked" />
			    Male</label>
                <input type="radio" name="gen"  value="Female" />
                Female</td>
			  </tr>
			<tr>
			  <td colspan="2">DOB&nbsp;&nbsp;&nbsp; 
			    <select name="Date" >
			      <option>DD</option>
			      <?php
for($i=1; $i<= 31; $i++)
{
echo "<option value='$i'>$i</option>";
}
?>
			      </select>
			    <select name="month">
			      <option>Month</option>
			      <option value="01">Jan</option>
			      <option value="02">Feb</option>
			      <option value="03">Mar</option>
			      <option value="04">Apr</option>
			      <option value="05">May</option>
			      <option value="06">Jun</option>
			      <option value="07">Jul</option>
			      <option value="08">Aug</option>
			      <option value="09">Sep</option>
			      <option value="10">Oct</option>
			      <option value="11">Nov</option>
			      <option value="12">Dec</option>
			      </select>
			    <select name="Year">
			      <option value="Year">Year</option>
			      <?php
for($i=1975; $i< 2011; $i++)
{
echo "<option value='$i'>$i</option>";
}
?>
		        </select></td>
			  </tr>
			<tr> 
				<td><input class=button type="submit" name="button2" value="Register"></td>
			</tr>

			</form>
		  </table>
	</td>
</tr>
</table>

</div>

