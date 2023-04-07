<?php
session_start();
include("header.php");
$res="";
include_once("mysql.php");
if(isset($_POST["btnrec"]))
{
$dat= "$_POST[year]-$_POST[month]-$_POST[date]";
$result = mysqli_query($con,"SELECT * FROM stuacc
WHERE email='$_POST[txtemail]' AND dob='$dat'");
if(mysqli_num_rows($result) == 1)
{
	$_SESSION["emailidchngpass"] = $_POST["txtemail"];
	header("Location: changefpassword.php");
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
<table cellpadding=10 width=100%>
<tr>
	<td height=400 valign=top><table width="75%" height="170" border="1"align="center">
	  <tr>
	    <td height="53" colspan="3" align="center"><div><strong><font size="+3">Recover password..!</font></strong><br /><b><font color="#FF0000"><?php echo $res; ?></font></b>
	    </div></td>
	    </tr>
	  <tr >
	    <td height="30"><div align="center">Email Id</div></td>
	    <td colspan="2">
	      <label for="textfield"></label>
	      <input name="txtemail" type="text" id="textfield" size="40" />
	     </td>
	    </tr>
	  <tr>
	    <td height="26"><div align="center">Date Of Birth</div></td>
	    <td colspan="2"><select name="date" >
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
          <select name="year">
            <option>Year</option>
            <?php
for($i=1975; $i< 2011; $i++)
{
echo "<option value='$i'>$i</option>";
}
?>
          </select></td>
	    </tr>
	  <tr>
	    <td height="49" colspan="3" align="center" valign="middle">

	        <input type="submit" name="btnrec" id="button" value="Recover password" />

	      </td>
	    </tr>
	  </table></form></td>
</tr>
</table>

</div>

