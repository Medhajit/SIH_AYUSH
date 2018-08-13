 <html>
  <head>
  <title>Login</title>
    <!-- Material Design Lite -->
    <script src="http://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="http://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    
<script>
/*
function loginstart_admin_or_master() {
    
     window.location = 'admin_home.php';
    } 
function loginstart_notadmin() {
    
     window.location = 'applicant_home.php';
    } 
    
*/    
function showloading() {
    var divpass=document.getElementById("p2");
    divpass.style.display = "";
    
     
}     

</script>  
    
    
    
    
    
    
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
  background: url('http://ayush.gov.in/sites/default/files/banner-1_0_0.jpg') center / cover;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
.currentpage{
    background-color: #d5d9f5;
}
.mdl-progress-red > .progressbar {
    background-color: red !important;
}
    </style>


</script>



  </head>
  
  
  <?php
date_default_timezone_set('Asia/Kolkata');
session_start();

//for future provision
if (isset($_COOKIE['redirect'])) 
{
    $goto = $_COOKIE['redirect'];
}
else
{
    $goto = 'admin_home.php';
}

//for future provision ends


if (isset($_POST['login'])) {

/*
    $host = 'mysql.hostinger.in';
    $user = 'u280481535_sih';
    $pass = 'techbot_63';*/
    
require_once("dbcon.php");

    $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found"); //to establish connection
    @mysql_select_db($dbname, $link) or die("<br/><br/>Requested database not found"); //to select proper databases

    $match = 0;
    if (!empty($_POST['uname']) && !empty($_POST['pass'])) {
        $password = $_POST['pass'];
        $username = $_POST['uname'];
        
        $username = str_replace("'","''",$username);
        $que = "select pass, user_type from user where username='$username'";
        $rs = @mysql_query($que, $link) or die("<br/><br/>Error in query. <br/>System generated error messege: " .
            mysql_error());
        while ($row = mysql_fetch_array($rs)) {
            if ($row[0] == md5(md5($password)))
                $match = 1;
            break;
        }


        if ($match == 1) {

            $_SESSION['islogin'] = 1;
            $_SESSION['usertype'] = $row[1];
            $_SESSION['username'] = $username;
            if ($row[1] == 'admin' || $row[1] == 'master')
                header ("location: $goto");
            else
                if ($row[1] == 'applicant')
                    header ("location: applicant_home.php");
        }


    }

} else
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
        <div class="page-content" style="padding: 2% 5%;">
  
  

  
  <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%">

      <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #13809e; color: white; font-size: 20px;">
        <!--   Page Sub Heading   -->
        Enter Your Credentials Here
      </div>
      <div class="mdl-card__actions mdl-card--border" style="text-align: center;">
 <form method="post" action="" enctype="multipart/form-data" onload="formload"> 
<img src="img/uname_icon.png" width="20px"/>&nbsp;&nbsp;
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 200px;">
    <input class="mdl-textfield__input" type="text" name="uname">
    <label class="mdl-textfield__label" for="uname" style="font-size: 15px;">Username</label>
    </div>
<br />
<img src="img/pass_icon.png" width="20px"/>&nbsp;&nbsp;
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 200px;">
    <input class="mdl-textfield__input" type="password" name="pass">
    <label class="mdl-textfield__label" for="pass" style="font-size: 15px;">Password</label>
    </div><br /><br/>
    <a href="forgetpassword.php">Forgot Password?</a>
    <br/><br/>
    <button type="submit" name="login" id="login" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="showloading();">
  L O G I N
</button>
  </form> 
  <?php

if(isset($_POST['login']))
{
if($match!=1)
{
echo "Wrong Username or Password";
}
}
?>                       
      </div>
      <div class="mdl-card__menu">
     </div>
    </div>



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

