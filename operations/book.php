<?php
$id=$_POST['id'];
?>

<?PHP

include ("functions.php");

//if the user is logged in.
if (is_logged_in($user)) {

     include ("header.php");
      $cookie_read = explode("|", base64_decode($user));
      $username = $cookie_read[1];
      //put your code here (protected page).
      echo "Welcome <b>$username</b>.</p>";

include ("config_ex.php");

$query="SELECT * FROM `routes` WHERE id='$id'";
$result=mysql_query($query);
$num=mysql_numrows($result);

mysql_close();

$i=0;
while ($i < $num) {

$flightno=mysql_result($result,$i,"flightno");
$ac=mysql_result($result,$i,"ac");
$origin=mysql_result($result,$i,"origin");
$arrive=mysql_result($result,$i,"arrive");
$dept_time=mysql_result($result,$i,"dept_time");
$arr_time=mysql_result($result,$i,"arr_time");
$duration=mysql_result($result,$i,"duration");

$i++;
}

include ("config_ex.php");

$fix_origin = mysql_real_escape_string($origin);
$fix_arrive = mysql_real_escape_string($arrive);

mysql_query("INSERT INTO `bookings` (pilot, flightno, ac, origin, arrive, dept_time, arr_time, duration) VALUES ('$username', '$flightno', '$ac', '$fix_origin', '$fix_arrive', '$dept_time', '$arr_time', '$duration')");

echo "<center><br /><b>Flight Successfully Booked.</b><br /><br /><a href=\"bookings.php?action=file\">File a Flight</a></center><br /><br />"; 


      include ("footer.php");



//if the user is not logged in, then tell him to login.
}else{

      include ("header.php");
     //header("Location: users.php");  die();
     echo "Welcome visitor, please login.";

     include ("footer.php");

}

?>
