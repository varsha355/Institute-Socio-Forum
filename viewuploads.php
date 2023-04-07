<?php
session_start();
include("header.php");
include("profilesql.php");
include("friends.php"); 
?>
<center>
<div class=container>
<div class=container>

<!-- head --><!-- navigation menu -->
<?php
 include("head.php");
include("menu.php"); 
$result = mysqli_query($con,"SELECT * FROM qpaper");

?>


<div style="padding: 10px; text-align: left;">
<!-- body  content -->

    <table width="100%" height="382" border="0" >
  <tr>
    <td width="18%" height="164" align="left" valign="top" bgcolor="#CCCCCC">
      
      <br /><center>
  <a href="profile.php"><img src="<?php echo $usimg;?>" alt="" width="90" height="106" /></a><br>
        <font color="#000099"><strong>
          </strong></center>
      <hr />
      <br />
      <p>&nbsp;</p>
      
      
      </td>
    <td width="82%" valign="top"><table width="100%" border="1">
      <tr>
        <th colspan="2" scope="col">&nbsp;Question Paper and Articles</th>
        </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
        <?php
        while($row = mysqli_fetch_assoc($result))
  {
?>
        
      <tr>
        <td width="33%"><strong>PaperName</strong></td>
        <td width="67%">&nbsp;<?php echo $row["papername"]; ?></td>
        </tr>
      <tr>
        <td height="23"><strong>Description</strong></td>
        <td>&nbsp;<?php echo $row["description"] ; ?></td>
        </tr>
      <tr>
        <td height="23"><strong>Text</strong></td>
        <td>&nbsp;<?php echo $row["uploadtext"] ;?></td>
        </tr>
      <tr>
        <td height="23" colspan="2">&nbsp;</td>
        </tr>
        <?php
  }
  ?>
      </table>
      
    </td>
  </tr>
  </table>
   

</div>
<center>



