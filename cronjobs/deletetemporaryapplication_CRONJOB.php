<?php

date_default_timezone_set('Asia/Kolkata');
require_once("../dbcon.php");
    
$link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
@mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases
$que="select appid, date_of_submission from application_temp";
$rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());


$today=date("Y-m-d");
$deletedate = date('Y-m-d', strtotime($today. ' - 35 days'));
echo "Deleting application older than ".$deletedate;
while($row = mysql_fetch_array($rs))
{
    
    $tempArr=explode('-', $row[1]);
    $submissionDate = date("Y-m-d", mktime(0, 0, 0, $tempArr[1], $tempArr[2], $tempArr[0]));
    $appid = $row[0];
   
    if($submissionDate<$deletedate)
    {
            $que="delete from application_part_1 where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            
            $que="delete from application_part_1_sub1_coinvestigator where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            
            $que="delete from application_part_2 where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from application_part_3 where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
                            
            $que="delete from application_part_4 where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from application_part_4_budget_equipment where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from application_part_4_budget_nonrecurring where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
                                
            $que="delete from application_part_4_budget_nonrecurring_other where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            
            $que="delete from application_part_4_budget_recurring where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            
            $que="delete from application_part_4_sub_ref_book where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from application_part_4_sub_ref_encyclopedia where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from application_part_4_sub_ref_journal where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from application_part_4_sub_ref_newspaper where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from application_part_4_sub_ref_other where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());

            $que="delete from application_part_4_sub_ref_report where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from application_part_4_sub_ref_secondary where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from application_part_4_sub_ref_website where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            
            $que="delete from application_temp where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
        
        echo "<br>Application Deleted $row[0]. Date of submission: $submissionDate <br><br>";
    }
}
                
?>