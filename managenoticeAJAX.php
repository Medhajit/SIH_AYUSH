<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
if(isset($_SESSION['islogin']) && $_SESSION['usertype']!='applicant')
{
    $type=$_GET['type'];
    $filename=$_GET['filename'];
    $datetime = $_GET['datetime'];
    
    
    require_once("dbcon.php");
    $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
    @mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases
    
    if($type == 'delete')
    {
        $que="delete from notice where link='$filename' and uploadDateTime='$datetime'";
        @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
        unlink("notice/$filename");
        echo "ok";
    }
    else if($type == 'update')
    {
        $isnew = $_GET['isnew'];
        $que="UPDATE notice set isnew='$isnew' where link='$filename' and uploadDateTime='$datetime'";
        @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        echo "ok";
    }

}
?>