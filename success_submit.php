<?php

date_default_timezone_set('Asia/Kolkata');
session_start();

?> 
 
 <html>
  <head>
  <title>Apply Online</title>
    <!-- Material Design Lite -->
    <script src="http://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="http://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
     <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   
    
    <style>
body{
    
  font-family: Lato;
}
.demo-layout{
  background-color: #25344e;
}
.demo-layout-transparent .mdl-layout__header,
.demo-layout-transparent .mdl-layout__drawer-button {
  /* This background is dark, so we set text to white. Use 87% black instead if
     your background is light. */
  color: white;
}

.demo-card-wide.mdl-card {
  width: 512px;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 176px;
  background: -webkit-linear-gradient(top, rgba(52,86,106,1) 0%, rgba(11,25,34,1) 100%);
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
.currentpage{
    background-color: #ffe66c;
}
.mdl-progress-red > .progressbar {
    background-color: red !important;
}
.fieldheader{
    color: blue;
    font-size: 20px;
}
    </style>


<script>
function showapplication(appid)
{
    document.cookie = "appid="+appid;
    window.open('viewform.php', '_blank');
}
</script>


  </head>
  
  
  <?php
date_default_timezone_set('Asia/Kolkata');
$progress= -1;
$appid;
if(isset($_SESSION['progress']) && isset($_SESSION['appid']))
{
    $progress= $_SESSION['progress'];
    //echo $currentshow;
    $appid = $_SESSION['appid'];
    if($progress!='submit')
    header ("location: applynew.php");
    
}
else
{
    
    header ("location: applynew.php");
  
}

$datetime= date("Y-m-d H:i:s");   

require_once("dbcon.php");

    $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found"); //to establish connection
    @mysql_select_db($dbname, $link) or die("<br/><br/>Requested database not found"); //to select proper databases
    
    $appid = str_replace("'","''",$appid);
    $que="select * from application_temp where appid = '$appid'";
    $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
    $row=mysql_fetch_array($rs);
        
        $row[8] = date("Y-m-d");

        $que="insert into app_details values('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]',$row[5],'$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]','$row[12]','$row[13]','$row[14]','$row[15]',-1)";
        $appid = str_replace("'","''",$appid);
        $que=$que.";delete from application_temp where appid = '$appid'";
        $row[3] = str_replace("'","''",$row[3]);
        $que=$que.";insert into app_status values('Submitted','$row[3]',0,'')";
        $row[3] = str_replace("'","''",$row[3]);
        $datetime = str_replace("'","''",$datetime);
        $que=$que.";insert into audit_trail values('$row[3]','Submitted','$datetime','N/A','*Submitted by applicant*','false')";
    
        $con=mysqli_connect($host,$user,$pass,$dbname);
        mysqli_multi_query($con,$que);
    
    
session_destroy();

?>
  
  <body>
  

  
  
  
  
    <!-- Always shows a header, even in smaller screens. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header" style="min-width: 963px;">
      <header class="mdl-layout__header" style="background-color: transparent; height: 110px">
        <div class="mdl-layout__header-row demo-layout" style="height: 110px">
          <!-- Title -->
          <div id="top-logo-ministry" style="float: left;height: 100px"><img src="img\emb.png" style="max-width: 100%; max-height: 100%; object-fit: contain"/>&nbsp;&nbsp;&nbsp;&nbsp;</div>
          
          <span class="mdl-layout-title" ><label style="font-size: 30px; margin-bottom: 10px;">Grant Application Portal</label><br /><br /> Ministry of AYUSH</span>
          <!-- Add spacer, to align navigation to the right -->
          <div class="mdl-layout-spacer"></div>
          <!-- Navigation. We hide it in small screens. -->
          <nav class="mdl-navigation mdl-layout--large-screen-only">
            <a class="mdl-navigation__link" href="home.php">Home</a>
            <a class="mdl-navigation__link" href="applynew.php">Apply</a>
            <a class="mdl-navigation__link" href="CheckStatus.php">Track</a>
            <a class="mdl-navigation__link" href="login.php" style="background-color: rgba(158, 59, 132, 0.64); border-radius: 8px;">Login</a>
          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Menu</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="home.php">Home</a>
          <a class="mdl-navigation__link" href="applynew.php">Apply Online</a>
          <a class="mdl-navigation__link" href="CheckStatus.php">Check Status</a>
          <a class="mdl-navigation__link" href="print.php">Print Application</a>
          <a class="mdl-navigation__link" href="contact.php">Contact Us</a>
          <a class="mdl-navigation__link currentpage" href="login.php" >Login</a>
        </nav>
      </div>
      <main class="mdl-layout__content" style="background-color: #deebf7;">
      <div id='p2' class='mdl-progress mdl-js-progress mdl-progress__indeterminate mdl-progress-red' style="display: none; width: 100%"></div>
        <form method="post">
        <div class="page-content" style="padding: 2% 5%;">
  
  

  
  <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%; background: white;">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text"><label style="font-family: Lato; font-size: 28px; font-weight: 500;">
        <!--   Page Heading   -->
        Your Application Has Submitted</label></h2>
      </div>
      
     <div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white;">
     
     <?php
     
     
     
     echo "<div style='width: 100%; text-align: center; padding-bottom: 2px;'>
                        <label><i style='font-size: 64px; color: green;' class='material-icons'>done</i></label>
                        <br /><label style='font-size: 20px;'>Your Application Number: <b>$appid</b></label>
                        <br /><label style='font-size: 16px;'>Please note it down for future reference</label>
                        <br /><br />
                        <div style='background-color: #ffebe2;padding: 5px;border-radius: 2px;'>You can track your application by visiting <a href='CheckStatus.php'>this link</a></div>
     
                        
                        </div>";
                        
                        
            $que="select email from app_details where appid='$appid'";
            $rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            
            $row1=mysql_fetch_array($rs1);
            
            
            $subject="Your Application Has Submitted";
            $message="Dear User, ".PHP_EOL."".PHP_EOL."Your application number is $appid.Please note it down for future reference.".PHP_EOL."".PHP_EOL."You can track your application by visiting http://ayushgrant.in/sih/CheckStatus.php";
    
              $headers ='From: 	AYUSH <contact@ayushgrant.in>' . "\r\n" .
              'Reply-To: contact@ayushgrant.in' . "\r\n" .
              'X-Mailer: PHP/' . phpversion();
              mail($row1[0], $subject, $message, $headers);
     
     ?>
     <br />
     <button type="button" style="margin-left: 20px;background-color: white;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="showapplication('<?php echo $appid ?>');">View Application</button>
     </div>
   


    </div>



        </div>
        
        </form>
        
      </main>
      
              <footer class="mdl-mini-footer" style="height: 0.5px; padding-top: 7px;">
  <div class="mdl-mini-footer__left-section">
   	&copy; Ministry of AYUSH 2017 - 2018
  </div>
  <div class="mdl-mini-footer__right-section">
    Website designed by: The TechBots
  </div>
</footer>    
        
    </div>
    
    

    
    
    
  </body>
</html> 

