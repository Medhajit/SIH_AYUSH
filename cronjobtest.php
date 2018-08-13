<?php

date_default_timezone_set('Asia/Kolkata');
require_once("dbcon.php");
    
$link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
@mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases
$datetime= date("Y-m-d H:i:s");
$que="insert into cronjob values('$datetime')";
@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
echo $datetime;
                
?>