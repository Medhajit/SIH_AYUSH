<?php

session_start();

if(isset($_SESSION['islogin']) && $_SESSION['usertype']!='applicant' && isset($_GET['cmt']) && isset($_GET['reportserial']))
{
    
    require_once("dbcon.php");
    $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
    @mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases

    $cmt = $_GET['cmt'];  
      
    $reportserial = $_GET['reportserial'];   
    $que="select submissionNumber from progressReportsDetails where reportSerial='$reportserial' order by submissionNumber desc";
    $rs = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());

    if(mysql_num_rows($rs)>0)
    {
        $row = mysql_fetch_array($rs);
        $attempt = $row[0];
    }    
    
    
    $que="select submissionPending, resubmissionRequired from progressReportsBasic where reportSerial='$reportserial'";
    $rs = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
    $row=mysql_fetch_array($rs);
    if($row[0]=='false' && $row[1]=='false')
    {
        
        $cmt = str_replace("'","''",$cmt);
        $que="UPDATE progressReportsBasic set submissionPending='true',resubmissionRequired='true' where reportSerial='$reportserial'";
        //echo $que;
        @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        $que="UPDATE progressReportsDetails set comment='$cmt' where reportSerial='$reportserial' and submissionNumber='$attempt'";
        //echo $que;
        @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
        $que="select reportName, appid from progressReportsBasic where reportSerial='$reportserial'";
        $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
        $row=mysql_fetch_array($rs);
        
        $que="select email from app_details where appid='$row[1]'";
        $rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
        $row1=mysql_fetch_array($rs1);
        
        
        $subject="Resubmission Required";
        $message="Dear User, ".PHP_EOL."".PHP_EOL."A resubmission request has generated for the report titled '$row[0]'.".PHP_EOL."".PHP_EOL."Please login to your project panel to submit the report.".PHP_EOL."".PHP_EOL."Go to http://ayushgrant.in/sih/login.php to login.";

          $headers ='From: 	AYUSH <contact@ayushgrant.in>' . "\r\n" .
          'Reply-To: contact@ayushgrant.in' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();
          mail($row1[0], $subject, $message, $headers);
          
          
        echo 'ok';
    }
    else
        echo 'notok 1';
}
else
        echo 'notok 2';   


?>