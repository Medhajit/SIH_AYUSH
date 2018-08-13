 <?php
 $appid = $_GET['appid'];
 require_once("dbcon.php");
date_default_timezone_set('Asia/Kolkata');    
$link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
@mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases

  $appid = str_replace("'","''",$appid);
  $que="UPDATE app_status SET unreadmes=0 where appid='$appid'";
  @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
?>