<?

//skip the config file if somebody call it from the browser.
if (stristr($_SERVER['PHP_SELF'], "config.php")) {
    Header("Location: index.php");
    die();
}

$db_host = "localhost";
$db_username = "kylan_kylan";
$db_password = "GreenBlaDE''9256809";
$databse_name = "kylan_rpvu";
$prefix = "maaking";

?>
