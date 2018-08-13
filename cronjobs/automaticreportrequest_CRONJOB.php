<?php

date_default_timezone_set('Asia/Kolkata');
require_once("../dbcon.php");
    
$link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
@mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases
$que="select appid from app_status where status='Accepted'";
$rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());

while($row = mysql_fetch_array($rs))
{
    $que="select reportSerial from progressReportsBasic where reportSerial like '$row[0]_scheduled_report_%'";
    $rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
    //print_r($row1);
    //echo "$row[0] ".mysql_num_rows($rs1)."<br><br>";
    $numberofreports = mysql_num_rows($rs1);
    
    $que="select dueDate from progressReportsBasic where reportSerial = '$row[0]_scheduled_report_$numberofreports'";
    $rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
    $row1=mysql_fetch_array($rs1);
    
    $today=date("Y-m-d");
    $tempArr=explode('-', $row1[0]);
    $lastDueDate = date("Y-m-d", mktime(0, 0, 0, $tempArr[1], $tempArr[2], $tempArr[0]));
    if($today>$lastDueDate)
    {
        $que="select reportFrequency from app_details where appid = '$row[0]'";
        $rs2=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        $row2=mysql_fetch_array($rs2);
        $nextduedate = date('Y-m-d', strtotime($lastDueDate. ' + '.$row2[0].' days'));
        if($nextduedate<$today)
        {
            $nextduedate = date('Y-m-d', strtotime($today. ' + 1 days'));
        }
        $nextreportserial = $numberofreports + 1;
        $que="insert into progressReportsBasic values('$row[0]','$row[0]_scheduled_report_$nextreportserial','$nextduedate','Progress Report $nextreportserial','true','false','')";
        @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
        echo "Report Request Generated for $row[0]. Due Date: $nextduedate <br><br>";
    }
}
                
?>