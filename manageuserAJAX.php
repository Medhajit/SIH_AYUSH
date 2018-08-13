<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
if(isset($_SESSION['islogin']) && $_SESSION['usertype']=='master')
{

    $username=$_GET['username'];
    $master = $_GET['master'];
    
    
    require_once("dbcon.php");
    $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
    @mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases
    


    $que="UPDATE user set user_type='$master' where username='$username'";
    @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
    echo "ok";


}
?>