<?
###########################################
#-----------Users login system------------#
###########################################
/*=========================================\
Author      :  Mohammed Ahmed             \\
Version     :  1.2                        \\
Date Created:  Aug 20  2005               \\
----------------------------              \\
Last Update:    26-APR-2008               \\
----------------------------              \\
Country    :   Palestine                  \\
City       :   Gaza                       \\
E-mail     :   m@maaking.com              \\
WWW        :   http://www.maaking.com     \\
Skype      :   maaking                    \\
                                          \\
===========================================\
------------------------------------------*/

//skip the functions file if somebody call it directly from the browser.
if (eregi("functions.php", $_SERVER['SCRIPT_NAME'])) {
    Header("Location: index.php"); die();
}


// Report all errors and ignor notices
error_reporting(E_ALL ^ E_NOTICE);

// Disable magic_quotes_runtime
set_magic_quotes_runtime(0);

if (!ini_get("register_globals")) {
    import_request_variables('GPC');
}

$phpver = phpversion();
if ($phpver < '4.1.0') {
	$_GET = $HTTP_GET_VARS;
	$_POST = $HTTP_POST_VARS;
	$_SERVER = $HTTP_SERVER_VARS;
}
$phpver = explode(".", $phpver);
$phpver = "$phpver[0]$phpver[1]";
if ($phpver >= 41) {
	$PHP_SELF = $_SERVER['PHP_SELF'];
}


if(isset($admin)){
$admin = base64_decode($admin);
$admin = addslashes($admin);
$admin = base64_encode($admin);
}
if(isset($user)){
$user = base64_decode($user);
$user = addslashes($user);
$user = base64_encode($user);
}

foreach ($_GET as $sec_key => $secvalue) {
	if ((eregi("<[^>]*script*\"?[^>]*>", $secvalue)) ||
	(eregi("<[^>]*object*\"?[^>]*>", $secvalue)) ||
	(eregi("<[^>]*iframe*\"?[^>]*>", $secvalue)) ||
	(eregi("<[^>]*applet*\"?[^>]*>", $secvalue)) ||
	(eregi("<[^>]*meta*\"?[^>]*>", $secvalue)) ||
	(eregi("<[^>]*style*\"?[^>]*>", $secvalue)) ||
	(eregi("<[^>]*form*\"?[^>]*>", $secvalue)) ||
	(eregi("<[^>]*img*\"?[^>]*>", $secvalue)) ||
	(eregi("<[^>]*onmouseover*\"?[^>]*>", $secvalue)) ||
	(eregi("\([^>]*\"?[^)]*\)", $secvalue)) ||
	(eregi("\"", $secvalue))) {
		die ("not allowed");
	}
}
foreach ($_POST as $secvalue) {
	if ((eregi("<[^>]*onmouseover*\"?[^>]*>", $secvalue)) ||
        (eregi("<[^>]script*\"?[^>]*>", $secvalue)) ||
        (eregi("<[^>]meta*\"?[^>]*>", $secvalue)) ||
        (eregi("<[^>]style*\"?[^>]*>", $secvalue))) {
		die ("not allowed");
	}
}

//set root path
$ROOT_DIR = realpath(dirname(__FILE__));
$ROOT_DIR = str_replace('\\', '/', $ROOT_DIR);

include ("$ROOT_DIR/config.php");

include("$ROOT_DIR/mysql.class.php");

$db = new sql_db($db_host, $db_username, $db_password, $databse_name, false);
if(!$db->db_connect_id) {
      include("header.php");

      //if connection to database/login faild, print error.
      echo "<br><font color=\"red\"><h5><br><center>Error:</b><br><hr><br>
            <b>Connection to database has faild!<br>
            check mysql server/database name/username/password </center>
            <br><br><br><br><br><br><br><br><br>";
              echo mysql_error();
      include("footer.php");
      die();
}
//load the site options and info from db.
$options_sql = $db->sql_query("SELECT * FROM ".$prefix."_options");
$options = $db->sql_fetchrow($options_sql);

$site_name = stripslashes($options['site_name']);
$site_email= stripslashes($options['site_email']);
$site_url = stripslashes($options['site_url']);
$site_info = stripslashes($options['site_info']);
$language = stripslashes($options['language']);
$tmp_header = stripslashes($options['tmp_header']);
$tmp_footer = stripslashes($options['tmp_footer']);
$validate = intval($options['validate']);

//load the language
include ("$ROOT_DIR/lang/$language.php");

//global function for checkig whethar user is logged in or not.
//you will notice we will use it everwhere in the script.
function is_logged_in($user) {
    global $db,$prefix;

    $read_cookie = explode("|", base64_decode($user));
    $userid = addslashes($read_cookie[0]);
    $passwd = $read_cookie[2];
    $userid = intval($userid);
    
    if ($userid != "" AND $passwd != "") {
        $result = $db->sql_query("SELECT password FROM ".$prefix."_users WHERE userid='$userid'");
	$row = $db->sql_fetchrow($result);
        $pass = $row['password'];
	if($pass == $passwd && $pass != "") {
           return 1;
	}
    }
    return 0;
}

function is_logged_in_admin($admin) {
    global $db,$prefix;

    $read_cookie = explode("|", base64_decode($admin));
    $adminid = addslashes($read_cookie[0]);
    $passwd = $read_cookie[2];
    $adminid = intval($adminid);
        
    if ($adminid != "" AND $passwd != "") {
        $result = $db->sql_query("SELECT password FROM ".$prefix."_admin WHERE adminid='$adminid'");
	$row = $db->sql_fetchrow($result);
        $pass = $row['password'];
	if($pass == $passwd && $pass != "") {
           return 1;
	}
    }
    return 0;
}


function msg_redirect($msg,$url,$seconds){
         global $site_name, $site_url;

         echo "<html dir=\""._LTR_RTL."\">\n"
              ."<head>\n"
              ."<title>$site_name</title>\n"
              ."<meta http-equiv=\"Refresh\" content=\"$seconds; URL=$url\">\n"
              ."<meta http-equiv=\"Content-Type\" content=\"text/html; charset="._CHARSET."\">\n"
              ."<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\">\n"
              ."</head>\n\n"
              ."<body>\n"
              ."<br />\n"
              ."<br />\n"
              ."<br />\n"
              ."<br />\n\n\n"
              ."<div align=\"center\">\n"
              ."<table cellpadding=\"6\" cellspacing=\"1\" border=\"0\" width=\"70%\" bgcolor=\"#E1E1E1\">"
              ."<tr>"
	      ."<td bordercolor=\"#808080\">"._REDIRECTING."</td>"
              ."</tr> "
              ."<tr> "
	      ."<td align=\"center\" bgcolor=\"#FFFFFF\">"
	      ."<blockquote> "
              ."<p>&nbsp;</p>"
	      ."<p><h3>$msg</h3></p>"
              ."<p><a href=\"$url\"> "
	      .""._CLICK_HERE_BROWSER_REDIRECT."</a></p><br />"
              ."</blockquote>"
	      ."</div>\n"
	      ."</td>\n"
              ."</tr>\n"
              ."</table>\n\n\n"
              ."</body>\n"
              ."</html>";
}


?>
