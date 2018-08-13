<?php
date_default_timezone_set('Asia/Kolkata');
?>
<html>
  <head>
    <title>Forgot Application Id</title>
    <!-- Material Design Lite -->
    <script src="http://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="http://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <style>

.pagebody{
min-width: 900px;
  font-family: Lato;
  width: calc(100% - 40px);
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
  height: 60px;
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
    </style>
    <script src='http://www.google.com/recaptcha/api.js'></script>
    <script>
    //CAPTCHA
        function capenable() {
            document.getElementById("app").style.display="";
        }
        function capdisable() {
            document.getElementById("app").style.display="none";
        }
    //CAPTCHA 
        function showapplication(appid)
        {
            document.cookie = "appid="+appid;
        }
        function enableBtn(){
            document.getElementById("app").disabled = false;
        }
        function disableBtn(){
            document.getElementById("app").disabled = true;
        }
        function copyToClipboard(appid){
          var copyText = document.getElementById("copybox");
          copyText.value = appid;
          console.log(copyText.value);
          copyText.select();
          document.execCommand("copy");

        }

    </script>
  </head>
  
  <body class="pagebody">
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
          <a class="mdl-navigation__link" href="login.php" style="background-color: rgba(158, 59, 132, 0.64); color: white;">Login</a>
        </nav>
      </div>
      <main class="mdl-layout__content" style="background-color: #deebf7;">
      <div id='p2' class="mdl-progress mdl-js-progress mdl-progress__indeterminate mdl-progress-red" style="display: none; width: 100%;"></div>
        <div class="page-content" style="padding: 2% 5%;">
  
  
  



<?php
$flag=0;
$error = '';
if(isset($_POST['app']))
{

    
    require_once("dbcon.php");
            
    $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
    @mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases

      if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
      {
          
          //captcha part start
           $secret="6LeEZU8UAAAAAL1kM4pslvAax6K-1DtIeQb3oUDY";   
           $ip = $_SERVER['REMOTE_ADDR'];
           $captcha = $_POST['g-recaptcha-response'];
           $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip?$ip");
           $captcharesult= json_decode($response,true);
           //captcha part end
           if($captcharesult['success'])
           {
            if(isset($_POST['email']) && isset($_POST['dob']))
            {
              $email=$_POST['email'];
              $dob=$_POST['dob'];
              
              $email = str_replace("'","''",$email);
              $email=strtolower($email);
              $que = "select dob, appid from app_details where email='$email'" ;
              $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
              $count1 = 0;
              if(mysql_num_rows($rs)>0)
              {
                
                while($row=mysql_fetch_array($rs)){
                    //$row=mysql_fetch_array($rs);
                    //echo "result: ".$row[0]." --  input:".$dob;
                    if($row[0]==$dob)
                    {
                      $count1 = $count1 + 1;
                      if($count1==1)
                      {
                            echo '<div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%; margin: 20px;background-color: white;" id="printableArea">
                            <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #13809e; color: white; font-size: 20px; ">
                            <!--   Page Sub Heading   -->
                            Your Applications
                            </div>
                            <div class="mdl-card__actions mdl-card--border" style="text-align: center;">';
                            echo '<label style="font-size:  18px;background-color: #3F51B5;color: white;padding: 5px;border-radius: 5px;">Submitted Applications</label><br><br><table style="padding: 0 35% 0 35%;">';
                      }  

                        echo "<tr><td>Application Number</td><td style='background-color:white;padding: 10px;border-radius: 20px;'>$row[1]</td></tr>";
                    
                    }
                    
                }
                if($count1>0)
                        echo '</table>';
              }
              
              
              //temp applications
              $que = "select dob, appid from application_temp where email='$email'" ;
              //echo $que;
              $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
              $count2 = 0;
              if(mysql_num_rows($rs)>0)
              {
                
                
                while($row=mysql_fetch_array($rs)){
                    //$row=mysql_fetch_array($rs);
                    //echo "result: ".$row[0]." --  input:".$dob;
                    if($row[0]==$dob)
                    {
                      $count2 = $count2 + 1;
                      if($count1 == 0 && $count2 == 1)
                      {
                            echo '<div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%; margin: 20px;background-color: white;" id="printableArea">
                            <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #13809e; color: white; font-size: 20px; ">
                            <!--   Page Sub Heading   -->
                            Your Applications
                            </div>
                            <div class="mdl-card__actions mdl-card--border" style="text-align: center;">';
                      }
                      else if($count1 > 0 && $count2 == 1)
                        echo '<hr/>';
                      if($count2==1)
                      {
                        echo '<label style="font-size:  18px;background-color: #3F51B5;color: white;padding: 5px;border-radius: 5px;">Partly Filled Applications</label><br><br><table style="padding: 0 30% 0 30%;">';
                      }  

                        echo "<tr><td>Temporary Application Number</td><td style='background-color:white;padding: 10px;border-radius: 20px;'>$row[1]</td></tr>";
                    
                    }
                    
                }
                if($count2>0)
                        echo '</table>'; 
              }
              else
                $error = "<br/>Wrong Email Id!"; 
              
              
              $totalcount = $count1 + $count2;
              if($totalcount == 0)
                 $error = "<br/>Wrong Date of Birth!";
              else
                 echo "<input type='text' id='copybox' name='copybox' style='display:none;'>";     
          }
          else
          {
          $error = 'Captcha Error!';

          }
        }
        else
        {
         $error = 'Captcha Error!';

        }
        
    }
    echo '</div>';
    }





if(!isset($_POST['app']) || $error!=''){
$htmlcode=<<<aa

  <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%">

      <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #13809e; color: white; font-size: 20px">
        <!--   Page Sub Heading   -->
        Forgot Application Id
      </div>
      <div class="mdl-card__actions mdl-card--border" style="text-align: center;">
                        
        <!--   YOUR MAIN CONTENT  -->
          
         <form method="post" action="" enctype="multipart/form-data">
            
            <center>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="email" id="email" name="email" required>
                <label class="mdl-textfield__label" for="email" style="font-size: 15px;">Email Id</label>
            </div> <br/>
     
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label has-placeholder">
                <input class="mdl-textfield__input" type="date" name="dob" id="dob" required placeholder="">
                <label class="mdl-textfield__label" for="dob" style="font-size: 15px;">Date of Birth</label>
            </div>
            
            <br/><br/>
            
            <center><div class="g-recaptcha" data-sitekey="6LeEZU8UAAAAACF8ztgsCdZ9suO8JAObo0XGFcq4" id="captcha" data-callback="capenable" data-expired-callback="capdisable"></div>

aa;
}
echo $htmlcode;
if($error!='')
{
    echo "<label style='margin: 10px 0px 10px 0px; color: red;'>$error</label>";
}
$htmlcode=<<<aa
</center>
            
 <br><br>

<button type="submit" name="app" id="app" style="display: none; " class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  Show Application Id       
</button>
</div>

</center>

</form>        
    
</div>


aa;
echo $htmlcode;
?>

<?php

?>

</div>
        
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