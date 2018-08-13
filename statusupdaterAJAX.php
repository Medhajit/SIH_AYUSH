<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
function randomPassword() {
    $alphabet = 'abcdefghijklmnpqrst@uvwxyz-ABCDEFGHIJKLMNPQRSTUVWXYZ123456789&#';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
if(isset($_SESSION['islogin']) && $_SESSION['usertype']!='applicant')
{
   require_once("dbcon.php");
    
        $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
        @mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases

$appid = $_GET['appid'];
$status= $_GET['status'];
$comment=$_GET['cmt'];
$state=$_GET['state'];
$reportfrequency=$_GET['reportfrequency'];
session_start();
$username=$_SESSION['username'];
$datetime= date("Y-m-d H:i:s");

$status = str_replace("'","''",$status);
$appid = str_replace("'","''",$appid);
$que="UPDATE app_status SET status='$status' where appid='$appid'";
@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
$appid = str_replace("'","''",$appid);
$status = str_replace("'","''",$status);
$datetime = str_replace("'","''",$datetime);
$username = str_replace("'","''",$username);
$comment = str_replace("'","''",$comment);
$state = str_replace("'","''",$state);
$que="insert into audit_trail values('$appid','$status','$datetime','$username','$comment','$state')";
@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
             
if($status=='Accepted')
{
                $newpass_notencrpt=randomPassword();
                $newpass=md5(md5($newpass_notencrpt));
                
                $appid = str_replace("'","''",$appid);
                $que="select email from app_details where appid='$appid'";
                $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
                $row=mysql_fetch_array($rs);
                $subject="Your application is Accepted.";
                $message="Congatulations! Your grant application is Accepted".PHP_EOL."".PHP_EOL."Your application id is: ".$appid.PHP_EOL."".PHP_EOL."Your project panel had been created.".PHP_EOL.PHP_EOL."Your Username: $appid".PHP_EOL."Password: $newpass_notencrpt".PHP_EOL.PHP_EOL."Please change your default password after login.".PHP_EOL.PHP_EOL." To login go to http://ayushgrant.in/sih/login.php";
               
                $appid = str_replace("'","''",$appid);
                $reportfrequency = str_replace("'","''",$reportfrequency);
                $today = date("Y-m-d");
                $nextduedate = date('Y-m-d', strtotime($today. ' + '.$reportfrequency.' days'));
                
                $que="UPDATE app_details set reportFrequency=$reportfrequency where appid='$appid'";
                @mysql_query($que,$link) or die("<br/><br/>Error in query.<<<$que>>> <br/>System generated error messege: ".mysql_error());
                
                
                $que="insert into progressReportsBasic values('$appid','$appid"."_scheduled_report_1','$nextduedate','Progress Report 1','true','false','')";
                @mysql_query($que,$link) or die("<br/><br/>Error in query.<<<$que>>> <br/>System generated error messege: ".mysql_error());
                
                $appid = str_replace("'","''",$appid);
                $newpass = str_replace("'","''",$newpass);
                $row[0] = str_replace("'","''",$row[0]);
                $que="insert into user values('$appid','$newpass','applicant','$row[0]')";
                @mysql_query($que,$link) or die("<br/><br/>Error in query.<<<$que>>> <br/>System generated error messege: ".mysql_error());
                
             
                $headers ='From: 	AYUSH <contact@ayushgrant.in>' . "\r\n" .
                'Reply-To: contact@ayushgrant.in' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
                mail($row[0], $subject, $message, $headers);
}

if($status=='Accepted' || $status=='Rejected')
{
                $appid = str_replace("'","''",$appid);
                $que="UPDATE app_status SET unreadmes=-1 where appid='$appid'";
                
                @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());

  
}
 if($state=='true')
 {  $appid = str_replace("'","''",$appid);
    $que="select email from app_details where appid='$appid'";
                $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
                $row=mysql_fetch_array($rs);
                $chatpass=randomPassword();
                $chatpass_encrypt = md5(md5($chatpass));
                $subject="You have a question to answer";
                $message="Your application id is: ".$appid.PHP_EOL."".PHP_EOL."You have a question to answer.".PHP_EOL.PHP_EOL." Go to http://ayushgrant.in/sih/chat.php?appid=$appid".PHP_EOL.PHP_EOL."Use $chatpass as Passcode. Please Note: You can access the chat window with this Passcode until you recieve a new one.";
                @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
  
                
                $headers ='From: 	AYUSH <contact@ayushgrant.in>' . "\r\n" .
                'Reply-To: contact@ayushgrant.in' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
                mail($row[0], $subject, $message, $headers);
                $chatpass_encrypt = str_replace("'","''",$chatpass_encrypt);
                $appid = str_replace("'","''",$appid);
                $que="UPDATE app_status SET unreadmes=0, passtoken='$chatpass_encrypt' where appid='$appid'";
                
                @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());


 }
 echo "ok"; 
}
?>