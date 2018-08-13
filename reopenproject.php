
<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
	if(!isset($_SESSION['islogin']) || $_SESSION['usertype']!='master')
  {
    header ("location: login.php");
  }
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
?>
<html>
<head>
<!-- Material Design Lite -->
<script src="http://code.getmdl.io/1.3.0/material.min.js"></script>
<link rel="stylesheet" href="http://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<!-- Material Design icon font -->
<link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<style>
.textarealong{
    resize: none;
    width: 1080px;
    height: 50px;
    border-radius: 5px;
    outline: none;
}
.header{
    font-size: 18px;
    color: blue;
}
</style>
<script>
function refreshParent() 
{
    window.opener.location.reload(true);
}

function nodirect()
{
    alert('Unable to find required parameters. The window will be closed now.');
    close();
}
function submitsucess()
{
    alert('This Project is reopened and moved to Ongoing Projects section. The window will be closed now.');
    close();
}
</script>
</head>
<body onunload="javascript:refreshParent()" style="font-family: Lato; padding: 1%;">
<?php
$appid;
if(!isset($_GET['appid']))
{
    echo 'Unable to find required parameters. Close the window<script>nodirect();</script>';
}
else
{
    $appid=$_GET['appid'];
}



require_once("dbcon.php");
$link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
@mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases
$error = '';
if(isset($_POST['sbt']))
{

    if(!empty($_POST['pass']))
    {
    $uname=$_SESSION['username'];
    $que="select pass from user where username='$uname'";
    $rs = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
    $row=mysql_fetch_array($rs);   

    $pass=$_POST['pass'];
    $cmt=$_POST['cmt'];
            
    $cmt = str_replace("'","''",$cmt);  
    $enctpass = md5(md5($pass));
    $datetime= date("Y-m-d H:i:s");


    if($row[0]==$enctpass)
    {
        
        $que="select status from app_status where appid='$appid'";
        $rs = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        $row=mysql_fetch_array($rs);
        
        if($row[0]=='Closed')
        {
           
            $newpass_notencrpt=randomPassword();
            $newpass=md5(md5($newpass_notencrpt));
            
            $que="select email from app_details where appid='$appid'";
            $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            $row=mysql_fetch_array($rs);
            
            $subject="Your Project is Reopened.";
            $message="Dear User, ".PHP_EOL."".PHP_EOL."Your project (in connection to application id $appid) is reopened.".PHP_EOL."".PHP_EOL."Your project panel had been restored.".PHP_EOL.PHP_EOL."Your Username: $appid".PHP_EOL."Password: $newpass_notencrpt".PHP_EOL.PHP_EOL."Please change your default password after login.".PHP_EOL.PHP_EOL." To login go to http://ayushgrant.in/sih/login.php";
            
            
               
             
             $headers ='From: 	AYUSH <contact@ayushgrant.in>' . "\r\n" .
             'Reply-To: contact@ayushgrant.in' . "\r\n" .
             'X-Mailer: PHP/' . phpversion();
             mail($row[0], $subject, $message, $headers);
            
            $que="insert into user values('$appid','$newpass','applicant','$row[0]')";
            @mysql_query($que,$link) or die("<br/><br/>Error in query.<<<$que>>> <br/>System generated error messege: ".mysql_error());
             
            $que="UPDATE app_status set status='Accepted' where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            
            $que="insert into audit_trail values('$appid','Accepted','$datetime','$uname','**Reopened** $cmt','false')";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            
            echo 'This Project is reopened and moved to Ongoing Projects section. Please close the window<script>submitsucess();</script>';
        }
        else                                     
            $error='This is not an closed project. ';
    }
    else
        $error='Wrong Password';
   }
   else               
    $error='Unable to Reopen Project. Password is mandatory.';
    
    
}
if(!isset($_POST['sbt']) || $error!='')
{

$form=<<<aa
<label style='padding: 5px; background-color: red; color: white'>$error</label>
<br/><br/><br/><form method="post">
<div style='width:98%;' class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  has-placeholder">
                <input class="mdl-textfield__input" type="text" id="cmt" name="cmt" placeholder="">
                <label class="mdl-textfield__label" for="appid" style="font-size: 15px;">Comment</label>
            </div> <br/>
<div style="width:50%;float: left;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  has-placeholder">
                <input class="mdl-textfield__input" type="password" id="pass" name="pass" required placeholder="">
                <label class="mdl-textfield__label" for="appid" style="font-size: 15px;">Your Password</label>
            </div>
            <div style="width: 48%;float: left;text-align: center;">
            <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--colored' type="submit" name="sbt">Reopen Project</button>
</div>
</form>


aa;
echo $form;
}                        
?>

</body>
</html>