<html><head>
<title>Change or View Application Status</title>
<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<link rel="stylesheet" href="style1.css">
<script src='https://www.google.com/recaptcha/api.js'></script>

<script>
function notlog()
{
     window.location = 'login.php'
}
function SameCompare()
{
    var p1=document.getElementById("newpass").value;
    var p2=document.getElementById("newpass2").value;
      var divpass=document.getElementById("match");
    if(p1=="" || p2=="")
    divpass.innerHTML="";
    else
    {
    if(p1==p2)
    divpass.innerHTML="&nbsp;<img src='img/tick_icon.png' width='20%' height='60%'/>&nbsp;<label style='font-family: Segoe UI; color:green;  font-size: 13px; font-weight: 40;'>Matched</label>";
    else
    divpass.innerHTML="&nbsp;<img src='img/cross_icon.png' width='15%' height='40%'/>&nbsp;<label style='font-family: Segoe UI; color:red;  font-size: 13px; font-weight: 20;'>Not matched</label>";
    }
}
function updated()
{
    var formDiv = document.getElementById('login');
    var sbt = document.getElementById('sbt_app');
    sbt.visibility = false;
    document.getElementById('header').innerHTML = "<label style='color: black; font-family: Montserrat; font-size: 26px'>Your application is sucessfully submitted</label>";
    formDiv.innerHTML="";
    var text1 = "<br/><br/><label style='color: black; font-family: Montserrat; font-size: 23px'>Password sucessfully updated</label>";
    formDiv.innerHTML=text1;
}


</script>
<style>


body {
  margin: 0em;
  background-repeat: no-repeat;
  background-size: cover;
  background-color: #DEEBF7;
}
.button1 {
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
    background-color: white; 
    color: black; 
    border: 2px solid #052669;
    border-radius: 5px;
}

.button1:hover {
    background-color: #052669;
    color: white;
}

</style></head>
<?php
session_start();
	if(!isset($_SESSION['islogin']))
  {
    echo "<script>notlog();</script>";
  }
?>



<body>
<?php
date_default_timezone_set('Asia/Kolkata');


?>
<form method="post" action="" enctype="multipart/form-data" onload="formload">
<div id="top-container" style="float: left;height: 130px;width: 100%; background-image: url(img/back_top.png); background-size: contain; display:flex; justify-content:center; align-items:center;">
<div id="top-logo-ministry" style="float: left;height: 110px;width: 24%; display:flex; justify-content:center; align-items:center;">
<img src="img\emb.png" style="max-width: 100%; max-height: 100%; object-fit: contain"/>&nbsp;
<legend style="font-family: 'Noto Sans'; color: white; font-size: 22px; display:flex; justify-content:center; align-items:center;"><b>???? ????????
</b><br />
<span style="font-size: 20px; color: white;">MINISTRY OF</span>
<br /><span style="font-size: 38px; color: white;"><b>AYUSH</b></span>
</legend>

</div>
<div id="top-title" style="float: left;height: 110px;width: 74%; display:flex; justify-content:center; align-items:center;">
<legend style="font-size: 48px; color: white; font-family: arial;"><b>Grant Application Portal</b></legend>


</div>
</div>
<div id="menu" style="width: 100%; height: 47px; background-color: #052669; float: right;">
<ul style="list-style-type: none; margin: 0; padding: 0; width: 100%;">
  <li class="menuli"><a href="admin_home.php">Live Applications</a></li>
  <li class="menuli"><a href="OtherApplication.php">Other Applications</a></li>
  <li class="menuli"><a href="ManageNotice.php">Notice</a></li>
  <li class="menuli liactive"><a href="ChangePassword.php">Change Password</a></li>

  
   <li class="menuli" style='float: right; color: white; background-color: #CD0505; border-right: none;'><a href="login.php">L O G O U T</a></li>
</ul>
</div>
<br />
<div id="Container-body" style="min-height: 446px; width: 97%; display:flex; justify-content:center; align-items:center; margin-bottom: 0em;">
<div id="body-main" style="border-radius: 10px; float: left;margin-top: 0.5em; min-height: 400px;width: 90%; margin-left: 2.8em; font-family: Poppins; font-size: 22px;background-color:#ffffcc; align-items:center; justify-content:center; padding-top: 0.5em;" >
<center>
<legend id="header">Change Password</legend>
<hr />
<div id="login" style="min-height: 300px; width: 95%; font-family: calibri;align-items:center; justify-content:center; margin: 0em;">  <!application div height must be 100px lesser than body-main div>
<table><tr>
<td><label style='font-family: calibri;  font-size: 20px; font-weight: 40;'>Enter Current password: </label></td> <td> <input type="password" name="pass" placeholder="current password" required/></td> </tr>
<td><label style='font-family: calibri;  font-size: 20px; font-weight: 40;'>Enter New password: </label></td> <td> <input type="password" name="newpass" id="newpass" oninput="SameCompare()" placeholder="new password" required/></td> </tr>
<td><label style='font-family: calibri;  font-size: 20px; font-weight: 40;'>Confirm New password: </label></td> <td> <input type="password" name="newpass2" id="newpass2" oninput="SameCompare()" placeholder="confirm new password" required/></td> </tr>
<tr><td></td><td ><div id="match" style="height: 30px;width: 100px;"></div></td></tr>
</table>



<?php
date_default_timezone_set('Asia/Kolkata');
if(isset($_POST['update']))
{
	
    $host='mysql.hostinger.in';
        $user='u280481535_sih';
        $pass='techbot_63';
        $dbname='u280481535_sih';
    
    $newpass=$_POST['newpass'];
    $newpass2=$_POST['newpass2'];
    if($newpass!=$newpass2)
    echo "<label style='font-family: calibri;  font-size: 30px; font-weight: 40; color:red; '>New password in both fields not matched</label>";
    else
    {
       
    $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
    @mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases
    
    
        
        
            $pass=$_POST['pass'];
            $match=0;
            $que="select pass from user where username ='$_SESSION[username]'";
            $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            while($row=mysql_fetch_array($rs))
            {
                if($row[0]==md5(md5($pass)))
                $match=1;
            
            }
            if ($match==1)
            {
                $newpass=md5(md5($newpass));
                $que="UPDATE user SET pass='$newpass' where username = '$_SESSION[username]'";
                @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
                $que="select email from user where username = '$_SESSION[username]'";
                $rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
                $row1=mysql_fetch_array($rs1);
                
                //$to      = "$row1[0]";
                
                
                date_default_timezone_set('Asia/Kolkata');
                $timechange = date("h:i A");
                if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
                {
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                } 
                elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
                {
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                } 
                else 
                {
                    $ip = $_SERVER['REMOTE_ADDR'];
                }

                $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
                $city = $details->city;
   
                $message = 'Dear User,'. "<br/>" . "<br/>" ."Your password is changed recently.". "<br/>" . "<br/>" ."-----Details regarding the password change-----". "<br/>" . "<br/>" ."IP Address used to change password: $ip". "<br/>"."Time: $timechange". "<br/>" ."Approximate Location: $city". "<br/>" . "<br/>" ."--------------------------------------------------------------". "<br/>" ."If you have not changed the password then please reply us and change your password using 'forgot password' immediately.". "<br/>" . "<br/>" ."For any feedback/support write us at contact.attendancetraker@gmail.com". "<br/>" . "<br/>" ."Regards,". "<br/>" ."Attendance Tracker". "<br/>" ."by TECH 23.";
                $subject = 'Password Recently Changed';
                $headers ='From: 	AYUSH <test@westbengal7824.esy.es>' . "\r\n" .
                'Reply-To: test@westbengal7824.esy.es' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
                mail($row1[0], $subject, $message, $headers);
                
                /*
                
                require_once 'PHPMailer-master/PHPMailerAutoload.php';

                $mail = new PHPMailer;

                //$mail->SMTPDebug = 3;                               // Enable verbose debug output

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'contact.attendancetraker@gmail.com';                 // SMTP username
                $mail->Password = 'qaTaka101yuwnnn73';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                $mail->setFrom('contact.attendancetraker@gmail.com', 'Attendance Tracker');
                $mail->addAddress($row1[0]);               // Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = $subject;
                $mail->Body    = $message;
                $mail->AltBody = $message;
                
                $mail->send();
                
                
                //unlock it to debug
                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Message has been sent';
                 }

                */
                
                
                
                
                
                
                
                //setcookie("passchange","1");
                echo "<script>updated()</script>";
                
            }
            else
            {
                echo "<label style='font-family: calibri;  font-size: 30px; font-weight: 40; color:red; '>Password not matched</label>";
            }
        
    }
    }
?>

<br />
<input type="submit" class="button1" value="Update" name="sbt_app" id="sbt_app"/>
</div>
</form>

</center>
</div>

</div>

<div id="lower-banner" style="font-family:'Montserrat'; font-size: 17px; color: white; height: 25px;width: 100%;float: left; background-color: #5B9BD5; margin-bottom:10px; align-items:center; justify-content:center; ">
<center>

<label style="float: left;vertical-align: middle;">
&nbsp;&nbsp;Content provided by Ministry of AYUSH
</label>
<label style=" vertical-align: middle;">&copy;
<?php
  echo date("Y");
?>
</label>
<label style="float: right;vertical-align: middle;">
Site designed & maintained by The TechBots&nbsp;&nbsp;
</label>
</center>
</div>

</form>
</body></html>



