<?PHP

include ("functions.php");

// the Default function.
//note for functions: if you want to include a value of some variables inside the funtions,
//then you have to GLOBAL it first.
function index($user) {
     global $db, $prefix;

     //check if the user is logged in or not.
     if (is_logged_in($user)) {
          include("header.php");

          //get_my_info($user);
          $cookie_read = explode("|", base64_decode($user));
          //define variables to hold cookie values.
          $userid = $cookie_read[0];
          $username = $cookie_read[1];
          $password = $cookie_read[2];
          $ipaddress = $cookie_read[3];
          $lastlogin_date = $cookie_read[4];
          $lastlogin_time = $cookie_read[5];
          if($ipaddress == "") $ipaddress = ""._NOT_YET."";
          
          //print wilcome message
          echo "Welcome <b>$username</b>!";
          echo "<h2 class=\"bigger\">Operations Home</h2><br /><p><marquee>Have you joined the forums yet? <a href=\"/forums\" target=\"_blank\">Click here</a> to join and stay up to date with virtual airline operations.</marquee><center><img src=\"/images/opscenter.gif\" /></center>";

include ("config_ex.php");

$query="SELECT * FROM `maaking_users` WHERE username='$username'";
$result=mysql_query($query);
$num=mysql_numrows($result);

mysql_close();

$i=0;
while ($i < $num) {

$rank=mysql_result($result,$i,"manager");

$i++;
}

if ($rank=='yes') 
	{
	echo "<br /><br /><br /><center><b><u>Management Functions</u></b><br /><br /><a href=\"manage.php?action=pireps\">Manage Pending PIREP Reports</a><br /><a href=\"promote.php?admin_check=admintrue\">Manage Pending Promotions</a><br />";
	}
else
	{
	echo "&nbsp;";
	}
          
          include("footer.php");
     }else{
         //if the user is not logged in then show the login form.
         //  header("Location: index.php?maa=Login");  die();
         include("header.php");
         login_form();
         include("footer.php");
    }
}
################################################################################
#------------------------------------------------------------------------------#
#  login
#------------------------------------------------------------------------------#
################################################################################
//the login form
// in this form there is hidden field (<input type=\"hidden\" name=\"maa\" value=\"do_login\">)
//this used to do the login process
function login_form(){
         global $username,$user_err,$pass_err,$error_msg;

echo "
<center>
      <form method=\"POST\" action=\"index.php\" name=\"loginform\">
        <table border=\"0\" cellspacing=\"2\" cellpadding=\"4\" class=\"login\">
        <tr>
            <td bgcolor=\"#E2E2E2\">Pilot ID : </td>
            <td bgcolor=\"#E2E2E2\"><input type=\"text\" name=\"username\" value=\"$username\" size=\"11\"> $user_err</td>
        </tr>
        <tr>
            <td bgcolor=\"#E2E2E2\">Password : </td>
            <td bgcolor=\"#E2E2E2\"><input type=\"password\" name=\"password\" size=\"11\"> $pass_err</td>
        </tr>
        <tr>
             <td colspan=2>Remember me? <input type=\"checkbox\" name=\"remember\" value=\"ON\"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td> <input type=\"hidden\" name=\"maa\" value=\"do_login\">
                 <input type=\"submit\" value=\"Login!\"></p>
            </td>
        </tr>
        </table> $error_msg
      </form><br /><br />";
}

//a login function to call the login form.
function Login(){
        include("header.php");
        login_form();
        include("footer.php");
}

//this function will do the login porcess for you.
function do_login(){
// define the values from the form.
//note for functions: if you want to include a value of some variables inside the funtions,
//then you have to GLOBAL it first.
         global $prefix,$db,$username,$password, $remember, $user_err,$pass_err,$error_msg,$REMOTE_ADDR;

         //check username and password fields.
         if((!$username) || (!$password)){
                include("header.php");

                $reqmsg= "(<font class=\"error\">"._REQUIRED."</font>)";
                if(trim(empty($username))){
                   $user_err= $reqmsg;
                }
                if(empty($password)){
                   $pass_err= $reqmsg;
                }

                //load the login form again.
                login_form();
                include("footer.php");
                exit();
         }

         ##--nothing empty? lets do the login
         //encyrpt  password for more Security
         $md5_pass = md5($password);
         $sql = $db->sql_query("SELECT * FROM ".$prefix."_users WHERE username='$username' AND password='$md5_pass'");
         $login_check = $db->sql_numrows($sql);
         ///////////////////////////////////////////////////////////////////////
         //if the entered informations are correct, then login and create the cookies.
         if($login_check > 0){
            while($row = $db->sql_fetchrow($sql)){

                 $userid = $row['userid'];
                 $username = $row['username'];
                 $password = $row['password'];
                 $ipaddress = $row['ipaddress'];

                 $lastlogin = explode(" ", $row['lastlogin']);
                 $lastlogin_date =  $lastlogin[0];
                 $lastlogin_time = $lastlogin[1];

                 $info = base64_encode("$userid|$username|$password|$ipaddress|$lastlogin_date|$lastlogin_time");
                 if (isset($remember)){
                     setcookie("user","$info",time()+1209600);
                 }else{
                     setcookie("user","$info",0);
                 }
                 $db->sql_query("UPDATE ".$prefix."_users SET ipaddress='$REMOTE_ADDR', lastlogin=NOW() WHERE userid='$userid'");

                 //print success message and redirect browser
                 msg_redirect(""._LOGIN_SUCCESS."","index.php","0");
            }
         //if the entered informations are wrong, then print error message.
         }else{
                //include("header.php");
                $error_msg = "<font class=\"error\">"._LOGIN_ERROR."</font>";
                unset($username);
                unset($password);

                include("header.php");
                login_form();
                include("footer.php");
                exit();
         }
}
################################################################################
#------------------------------------------------------------------------------#
#  logout
#------------------------------------------------------------------------------#
################################################################################
function Logout($user) {
         global $db, $prefix;
         
         unset($user);
         setcookie("user", false);
         $user = "";
         header("Location: index.php");
    
}
################################################################################
#------------------------------------------------------------------------------#
#  Change Password
#------------------------------------------------------------------------------#
################################################################################
function change_pwd_form(){
         global $user;
  if (is_logged_in($user)) {
   navigation_menu();
   
   echo "<center><font class=\"title\">"._CHANGE_MY_PWD."</font>
         <br /> "._ONCE_CHANGED_LOGOUT."
         <form method='POST' action='index.php'>
         <table border='0' cellpadding='4'>
         <tr>
                <td bgcolor='#E2E2E2'>"._OLD_PWD." :</td>
                <td bgcolor='#E2E2E2'><input type='password' name='old_pwd' size='11'></td>
         </tr>
         <tr>
                <td bgcolor='#E2E2E2'>"._NEW_PWD." :</td>
                <td bgcolor='#E2E2E2'><input type='password' name='new_pwd1' size='11'></td>
         </tr>
         <tr>
                <td bgcolor='#E2E2E2'>"._CONFIRM_NEW_PWD." :</td>
                <td bgcolor='#E2E2E2'><input type='password' name='new_pwd2' size='11'></td>
         </tr>
         <tr>
                <td align=center colspan=2>
                    <input type='hidden' name='maa' value='do_ChangePWD'>
                    <input type='submit' value='"._CHANGE_PWD."'></p>
                </td>
         </tr>
         </table>
         </form>";
  }else{
        echo "<br /><center><font class=\"title\">"._NOT_AUTHORIZED."</font>";
  }
}
function ChangePWD(){
         global $user, $prefix, $db;

         include("header.php");
         change_pwd_form();
         include("footer.php");
}
function do_ChangePWD(){
         global $user, $prefix, $db, $old_pwd, $new_pwd1, $new_pwd2;

  if (is_logged_in($user)) {

         //check empty fields
         if((empty($old_pwd)) or (empty($new_pwd1)) or (empty($new_pwd2))){
            include("header.php");
            change_pwd_form();
            echo "<center><font class=\"error\">"._ERROR_PLEASE_FILL_FIELDS."</font>";
            include("footer.php");
            exit();
         }
         
         $cookie_read = explode("|", base64_decode($user));
         $userid = $cookie_read[0];
         
         $old_pwd_md5 = md5($old_pwd);
         $result = $db->sql_query("SELECT userid,password FROM ".$prefix."_users WHERE userid='$userid' AND password='$old_pwd_md5'");

         if($db->sql_numrows($result) == 0){
         
               include("header.php");
               change_pwd_form();
               echo "<center><font class=\"error\">"._OLD_PWD_DONT_MATCH."</font></center><br />";
               include("footer.php");
               exit();
               
         }else{

               if($new_pwd1 != $new_pwd2){

                     include("header.php");
                     change_pwd_form();
                     echo "<center><font class=\"error\">"._ERROR_NEW_PWD_DOESNT_MATCH."</font></center><br />";
                     include("footer.php");
                     exit();
                     
               }else{

                     $md5_password = md5($new_pwd1);
                     $sql = $db->sql_query("UPDATE ".$prefix."_users SET password='$md5_password' WHERE userid='$userid'");

                     $msg = ""._SUCCESS_PWD_CHANGED." <br /> "._PLZ_REMEBER_NEW_PWS." ";
                     //print success message and redirect browser
                     msg_redirect("$msg","index.php","10");
               }
         }
  }else{
        echo "<br /><center><font class=\"title\">"._NOT_AUTHORIZED."</font>";
  }

}
################################################################################
#------------------------------------------------------------------------------#
#  a switch  for switching between functions
#------------------------------------------------------------------------------#
################################################################################
switch ($maa){

       case "ChangePWD":
            ChangePWD();
            break;

       case "do_ChangePWD":
            do_ChangePWD();
            break;
            
       case "Logout":
            Logout($user);
            break;
            
       case "Login":
            Login();
            break;

       case "do_login":
            do_login();
            break;
       //load the default function.
       Default:
               index($user);
               Break;
}
?>
