<?PHP

include ("functions.php");

//if the user is logged in.
if (is_logged_in($user)) {

     include ("header.php");
      $cookie_read = explode("|", base64_decode($user));
      $username = $cookie_read[1];
      //put your code here (protected page).
      echo "Welcome <b>$username</b>.</p>";
echo "<h2 class=\"bigger\">Downloads</h2><br /><p align=\"center\">Pilot Operating Handbook (WIP)<br /><a href=\"pdf/ophandbook_v1.pdf\" target=\"_blank\">Operations System Handbook (v1)</a><br /><br /><a href=\"pdf/airlines_fleet.pdf\" target=\"_blank\">Airline & Fleet Information</a></p>";


include ("footer.php");



//if the user is not logged in, then tell him to login.
}else{

      include ("header.php");
     //header("Location: users.php");  die();
     echo "Welcome visitor, please <a href=\"users.php\">login</a>.";

     include ("footer.php");

}
?>