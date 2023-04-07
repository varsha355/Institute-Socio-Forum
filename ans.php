<script language="javascript">
function questionare()
{
	if(document.question.textarea.value=="")
	{
		alert("Please enter your question");
		document.question.textarea.focus();
		document.question.textarea.select();
		return false;
	}
	if(document.question.textarea3.value=="")
	{
		alert("Please enter enter Option 1");
		document.question.textarea3.focus();
		document.question.textarea3.select();
		return false;
	}
	if(document.question.textarea4.value=="")
	{
		alert("Please enter enter Option 2");
		document.question.textarea4.focus();
		document.question.textarea4.select();
		return false;
	}
		if(document.question.textarea5.value=="")
	{
		alert("Please enter Option 3");
		document.question.textarea5.focus();
		document.question.textarea5.select();
		return false;
	}
		if(document.question.textarea6.value=="")
	{
		alert("Please enter Option 4");
		document.question.textarea6.focus();
		document.question.textarea6.select();
		return false;
	}
	else if(document.question.select2.value=="Select Correct option")
		{
			alert("Please select option");
		document.question.select2.focus();
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
$result1 = mysqli_query($con,"SELECT * FROM qanswer ORDER BY RAND()
");
while($row = mysqli_fetch_assoc($result1))
  {
$qid = $row["qid"];
$qtn = $row["question"];
$option1 = $row["option1"];
$option2 = $row["option2"];
$option3 = $row["option3"];
$option4 = $row["option4"];
$ans = $row["answer"];
  }

if(isset($_POST["button1"]))
{
$sql="INSERT INTO qanswer (question,option1,option2,option3,option4,answer,visible)
VALUES
('$_POST[textarea]','$_POST[textarea3]','$_POST[textarea4]','$_POST[textarea5]','$_POST[textarea6]', '$_POST[select2]', '$_POST[select]')";

if (!mysqli_query($con,$sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  else
  {
echo "Answer submitted Successfully";
  }

}
?>

<form id="question" name="question"  method="post" action="answer.php" onSubmit="return questionare()">
<table width="77%" height="327" align="center" border="1">
  <tr>
    <td height="39" colspan="2" align="center">
    <h2> Place your Question Here</h2>
    </td>
  </tr>
  <tr>
    <td width="97">Question</td>
    <td width="287"><textarea name="textarea" id="textarea" cols="45" rows="2"></textarea></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>Option 1 :</td>
    <td><textarea name="textarea3" id="textarea3" cols="45" rows="2"></textarea></td>
  </tr>
  <tr>
    <td>Option 2 :</td>
    <td><textarea name="textarea4" id="textarea4" cols="45" rows="2"></textarea></td>
  </tr>
  <tr>
    <td>Option 3: </td>
    <td><textarea name="textarea5" id="textarea5" cols="45" rows="2"></textarea></td>
  </tr>
  <tr>
    <td>Option 4:</td>
    <td><textarea name="textarea6" id="textarea6" cols="45" rows="2"></textarea></td>
  </tr>
  <tr>
    <td>
      <label for="select2">Correct Answer</label></td>
    <td><select name="select2" id="select2">
      <option value="Select Correct option">Select Correct option</option>
      <option value="option1">option1</option>
      <option value="option2">option2</option>
      <option value="option3">option3</option>
      <option value="option4">option4</option>
    </select></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="button1" id="button2" value="Submit Question &amp;  Answer" /></td>
  </tr>
</table></form>
<br /><br />

<form method="post" action="answer.php">
<table width="77%" height="248" align="center" border="1">
  <tr>
    <td height="28" colspan="2" align="center">
        <h2> Answer for Favourite Question</h2>
  </td>
  </tr>
  <?php
  if(isset($_POST["ansans"]))
  {
  ?>
   <tr>
     <td height="22" colspan="2">&nbsp;
     <?php
	 if($_POST["radio"] == $_POST["cans"])
	 {
	 echo "<b><font color='#003300'> Correct Answer</font></b><br><a href='answer.php' >Click Here to Continue</a> ";
	 }
	 else
	 {
		 echo "<b><font color='red'>Wrong Answer ... <br> Correct Answer is : ".  $_POST["radio"]. "</font></b><br><a href='answer.php' >Click Here to Continue</a>"; 
	 }
	 ?>
     </td>
    </tr>
    
    <?php
	}
	else
	{
	?>
    
   <tr>
    <td width="69" height="22"><strong>Question</strong></td>
    <td width="298">&nbsp;<?php echo $qtn; ?></td>
  </tr>
  <tr>
    <td height="21" colspan="2">&nbsp;</td>
  </tr> 
  <tr>
    <td height="21"><strong>Option 1 :</strong></td>
    <td><input type="hidden" name="questid" value="<?php echo $qid; ?>"  />
    <input type="radio" name="radio" id="radio" value="<?php echo $option1; ?>" /> <?php echo $option1; ?></td>
  </tr>
  <tr>
    <td height="21"><strong>Option 2 :</strong></td>
    <td><input type="radio" name="radio" value="<?php echo $option2; ?>" /> <?php echo $option2; ?></td>
  </tr>
  <tr>
    <td height="21"><strong>Option 3: </strong></td>
    <td><input type="radio" name="radio" id="radio3" value="<?php echo $option3; ?>" /> <?php echo $option3; ?></td>
  </tr>
  <tr>
    <td height="21"><strong>Option 4:</strong></td>
    <td><input type="radio" name="radio" id="radio4" value="<?php echo $option4; ?>" /> <?php echo $option4; ?>
    <input type="hidden" value="<?php echo $ans; ?>"  name="cans"/> </td>
  </tr>
  <tr>
    <td height="21" colspan="2" align="right"><label for="select3"><strong><a href="answer.php">Skip Question&gt;&gt;&gt; </a></strong></label></td>
  </tr>
  <?php
  }
  ?>
  
  <tr>
    <td height="26" colspan="2" align="center"><input type="submit" name="ansans" value="Submit Question &amp;  Answer" /></td>
  </tr>
</table>
<br />
</form>
