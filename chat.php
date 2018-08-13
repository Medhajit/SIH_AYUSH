<?php
session_start();
if(isset($_GET['appid']))
            {
            $appid=$_GET['appid'];
            }
            else
            {
           echo ' <script> alert("We are unable to show this page as all expected parameters not found. We are redirecting you to home page"); </script>';
                header ("location: home.php");
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
    </style>

<script>
/*function nodirect() {
    alert("We are unable to show this page as all expected parameters not found. We are redirecting you to home page");
     window.location = 'home.php'
    } */
    
function chatstart() {
    
     window.location = 'startdiscussion.php';
    } 
</script>

<?php
$match = 0;

            
if(isset($_POST["btn"])) {
 echo "<script>console.log('dshds');</script>";


              
 
        require_once("dbcon.php");
    
        $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
        @mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases
   
    if(!empty($_POST['pass']))
    {
        $password=$_POST['pass'];
        $appid = str_replace("'","''",$appid);
        $que="select passtoken from app_status where appid='$appid'";
        $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            
        
$row=mysql_fetch_array($rs);
        //echo "<script>console.log('dbpass $row[0]. passenc ".md5(md5($password))."')</script>";
                      
        if($row[0]==md5(md5($password)))
        {
            
        $_SESSION['appid']=$appid;
        $_SESSION['chatuser']='::Answer by applicant::';
        $match = 1;
        //echo "<script>chatstart();</script>";
        header ("location: startdiscussion.php");
        }
        else
        {
           $match = 0;
        }
        
 
        
    }
    else
    {
        //echo "<script>console.log('not pass')</script>";
    }
    
}
else
{
     //echo "<script>console.log('not btn')</script>";
 session_destroy(); 
 }


?> 



  </head>
  <body>
    <!-- Always shows a header, even in smaller screens. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header" style="background-color: transparent; height: 110px">
        <div class="mdl-layout__header-row demo-layout" style="height: 110px">
          <!-- Title -->
          
          
          

           
          
          <div id="top-logo-ministry" style="float: left;height: 100px"><img src="img\emb.png" style="max-width: 100%; max-height: 100%; object-fit: contain"/>&nbsp;&nbsp;&nbsp;&nbsp;</div>
          
          <span class="mdl-layout-title" ><label style="font-size: 30px; margin-bottom: 10px;">Grant Application Portal</label><br /><br /> Ministry of AYUSH</span>
          <!-- Add spacer, to align navigation to the right -->
          <div class="mdl-layout-spacer"></div>
          <!-- Navigation. We hide it in small screens. -->
          <nav class="mdl-navigation mdl-layout--large-screen-only">
            <a class="mdl-navigation__link" href="">Home</a>
            <a class="mdl-navigation__link" href="">Apply</a>
            <a class="mdl-navigation__link" href="">Track</a>
            <a class="mdl-navigation__link" href="" style="background-color: rgba(158, 59, 132, 0.64); border-radius: 8px;">Login</a>
          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Menu</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="">Home</a>
          <a class="mdl-navigation__link" href="">Apply Online</a>
          <a class="mdl-navigation__link" href="">Check Status</a>
          <a class="mdl-navigation__link" href="">Print Application</a>
          <a class="mdl-navigation__link" href="">Contact Us</a>
          <a class="mdl-navigation__link" href="" style="background-color: rgba(158, 59, 132, 0.64); color: white;">Admin Login</a>
        </nav>
      </div>
      <main class="mdl-layout__content" style="background-color: #deebf7;">
      <div id='p2' class='mdl-progress mdl-js-progress mdl-progress__indeterminate' style="display: none; width: 100%;"></div>
        <div class="page-content" style="padding: 2% 5%;">
  
  
  
  
  
  <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text"><label style="font-family: Lato; font-size: 28px; font-weight: 500;">
        Welcome to Grant Application Portal | Chat System</label></h2>
      </div>
      <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #ffd155; color: black;">
        Enter Your Passcode
      </div>
      <div class="mdl-card__actions mdl-card--border" style="text-align: center;">
                        
                        
                        
      <br />
         
<form method="post" action="" enctype="multipart/form-data" onload="formload">

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" name="pass" required>
    <label class="mdl-textfield__label" for="pass">Passcode</label>
    </div>
<br />

<button type="submit" name="btn" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
  <i class="material-icons">message</i>
</button>
 <div class='mdl-tooltip' for='btn'>
    click here to start chat
 </div>
 
 <?php
 if(isset($_POST["btn"]) && $match == 0)
  echo "Wrong Passcode";
 ?>

</form>


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

