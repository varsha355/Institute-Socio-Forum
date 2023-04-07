<?php>
<?php error_reporting(0);
session_start();
?>

<?php
if(!session_id()) session_start();
include("profilesql.php");
$id= $_SESSION["stuid"];
$result = mysqli_query($con,"SELECT * FROM addfriends where meid='$id'");
$uid1 = [];
$i=0;

?>