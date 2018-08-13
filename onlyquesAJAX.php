<?php

date_default_timezone_set('Asia/Kolkata');      
session_start();
if(isset($_SESSION['chatuser']))
{
$username=$_SESSION['chatuser'];
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
   require_once("dbcon.php");
  
        $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
        @mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases

$appid = $_GET['appid'];
$comment=$_GET['ques'];
$accepted = 'false';
if(isset($_GET['acceptedapplication']))
    $accepted=$_GET['acceptedapplication'];


//session_start();
//$username=$_SESSION['username'];
$datetime= date("Y-m-d H:i:s");

$appid = str_replace("'","''",$appid);
$datetime = str_replace("'","''",$datetime);
$username = str_replace("'","''",$username);
$comment = str_replace("'","''",$comment);
$que="insert into audit_trail values('$appid','--no change--','$datetime','$username','$comment','true')";
@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
   if($username!='::Answer by applicant::')
   {            
                $appid = str_replace("'","''",$appid);
                $que="select email from app_details where appid='$appid'";
  
                $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
                $row=mysql_fetch_array($rs);
                $chatpass=randomPassword();
                $chatpass_encrypt = md5(md5($chatpass));
                $subject="You have a unread question or message";
                if($accepted == 'true')
                {
                    $message="Your application id is: ".$appid.PHP_EOL."".PHP_EOL."You have either a question to answer or a unread message.".PHP_EOL.PHP_EOL."To check that, login to your project panel or go to http://ayushgrant.in/sih/applicant_home.php";
                
                }
                else
                {
                   $message="Your application id is: ".$appid.PHP_EOL."".PHP_EOL."You have either a question to answer or a unread message.".PHP_EOL.PHP_EOL." Go to http://ayushgrant.in/sih/chat.php?appid=$appid".PHP_EOL.PHP_EOL."Use $chatpass as Passcode. Please Note: You can access the chat window with this Passcode until you recieve a new one.";
                 
                }
                
                
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
else
{   
    $appid = str_replace("'","''",$appid);
    $que="select unreadmes from app_status where appid='$appid'";
    $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
    $row=mysql_fetch_array($rs);
    
    $mes = $row[0] + 1;
    $mes = str_replace("'","''",$mes);
    $appid = str_replace("'","''",$appid);
    $que="UPDATE app_status SET unreadmes=$mes where appid='$appid'";
                
    @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());

}
echo "ok";  
}
?>