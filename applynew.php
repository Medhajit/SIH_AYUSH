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
<dialog id="wrongdialog" class="mdl-dialog" style="text-align: center;">
  <h4 class="mdl-dialog__title"><i class="material-icons" style="font-size: 48px;">error</i></h3>
  <div class="mdl-dialog__content">
    <p>
      Wrong Application Id or Wrong Date of Birth
    </p>
  </div>
  <div class="mdl-dialog__actions">
    <button type="button" class="mdl-button" >Ok</button>
  </div>
</dialog>  
<script>
function isChrome()
{
    var a = !!window.chrome && !!window.chrome.webstore;
    return a;

}
  function dialogdisplay()
{
    if(!isChrome())
    {
        var alldialogs = document.getElementsByClassName("mdl-dialog");
        //console.log(alldialogs.length);
        for(var i=0; i<alldialogs.length; i++)
        {
            alldialogs[i].style.display = 'none';
            
        }
    }
}
dialogdisplay();  
    
    
function showloading() {
    var divpass=document.getElementById("p2");
    divpass.style.display = "";
    
     
}   
function appidvalidator()
{
    var appid= document.getElementById("appid").value;
    var dob= document.getElementById("dob").value;
    var ok1 = 0, ok2 = 0, ok3 = 0;
    var re = new RegExp("^[0-9]+$");
    if (re.test(appid)) {
    ok1 = 1;
    }
    else {
        ok1 =0;
    }
    var appstr = appid.toString();
    if (appstr.length == 15)
    {
     ok2 = 1;
    }
    else {
        ok2 =0;
    }
    console.log(dob);
    if (!dob)
    {
     ok3 = 0;
    }
    else {
        ok3 =1;
    }
    
    if (ok1==1 && ok2 == 1 && ok3 == 1)
    {
        document.getElementById("oldapp").disabled = false;
    }
    else
    {
        document.getElementById("oldapp").disabled = true;
    }
    
}
function wrongiddialog(){
    if(!isChrome())
    {
        alert('Wrong Application Id or Wrong Date of Birth');
    }
    else
    {
    var dialog = document.querySelector('#wrongdialog');
                if (! dialog.showModal) {
                dialogPolyfill.registerDialog(dialog);
                }
                dialog.showModal();
                dialog.querySelector('button:not([disabled])')
    .addEventListener('click', function() {
      dialog.close();
    });
    }
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
  background:  -webkit-linear-gradient(top, rgb(37,160,232)0%, rgba(11,25,34,1) 100%);
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
<script>
function formstart() {
    
     window.location = 'fillform.php'
    } 
function newformstart() {
    
     window.location = 'newform.php'
    } 
</script>



  </head>
  
  
  <?php
date_default_timezone_set('Asia/Kolkata');



/*
    $host = 'mysql.hostinger.in';
    $user = 'u280481535_sih';
    $pass = 'techbot_63';*/
    
require_once("dbcon.php");

    $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found"); //to establish connection
    @mysql_select_db($dbname, $link) or die("<br/><br/>Requested database not found"); //to select proper databases




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
          <a class="mdl-navigation__link currentpage" href="applynew.php">Apply Online</a>
          <a class="mdl-navigation__link" href="CheckStatus.php">Check Status</a>
          <a class="mdl-navigation__link" href="print.php">Print Application</a>
          <a class="mdl-navigation__link" href="contact.php">Contact Us</a>
          <a class="mdl-navigation__link" href="login.php" style="background-color: #d5d9f5; color: #757575;">Login</a>
        </nav>
      </div>
      <main class="mdl-layout__content" style="background-color: #deebf7;">
      <div id='p2' class='mdl-progress mdl-js-progress mdl-progress__indeterminate mdl-progress-red' style="display: none; width: 100%"></div>
        <div class="page-content" style="padding: 2% 5%;">
  
  

  
  <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text"><label style="font-family: Lato; font-size: 28px; font-weight: 500;">
        <!--   Page Heading   -->
        Fill Up Grant Application</label></h2>
      </div>
      <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #61b2b5; color: white; font-size: 20px;">
        <!--   Page Sub Heading   -->
        Choose Alternative
      </div>
      
      <?php
     
$section0=<<<aa
<form method="post">
    <div class="mdl-card__actions mdl-card--border" style="text-align: center; height: 210px;">
      <div style="width: 47%; float: left; background-color: #bfa3bf; height: 200px;border-radius: 6px;margin-right: 3%;">
       <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="background: #771f68;height: 150px;margin-top: 25px;" name="newapp">
        <i class="material-icons">description</i>
        <br />
        Start Filling New Application
       </button>
       </div>
       <div style="width: 47%; float: left; background-color: #b0c9e2; color: black; height: 200px;border-radius: 6px;margin-left: 3%;">
       <div class="mdl-textfield mdl-js-textfield" style="width: 340px; outline: none;">
        <input class="mdl-textfield__input" type="text" name="appid" style="outline: none; color: black" oninput="appidvalidator()" id="appid">
        <label class="mdl-textfield__label" for="appid" style="color: black">Enter Temporary Application Number</label>
        <span class="mdl-textfield__error">Please enter temporary application number</span>
       </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label has-placeholder" style="width: 340px;">
                <input class="mdl-textfield__input" type="date" name="dob" oninput="appidvalidator()" id="dob">
        <label style='font-size: 16px; color: black' class="mdl-textfield__label" for="dob">Enter Your Date of Birth</label>
        </div>
            
        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="margin-top: 20px; width: 340px;" name="oldapp" id="oldapp" disabled>
        Continue with Partly Filled Application
        </button>   
        </div>            
      </div>
      </form>

aa;

echo $section0;
if(isset($_POST['newapp']))
{
    $_SESSION['progress'] = 0;
    $_SESSION['currentshow'] = 0;
    echo "<script>newformstart();</script>";
}
if(isset($_POST['oldapp']))
{ 
    
    $appid = $_POST['appid'];
    $appid = str_replace("'","''",$appid);
    $que = "select progress, dob from application_temp where appid='$appid'";
    $rs = @mysql_query($que, $link) or die("<br/><br/>Error in query. <br/>System generated error messege: " .mysql_error());
    if(mysql_num_rows($rs)>0)
    {
    $row = mysql_fetch_array($rs); 
    if($row[1]==$_POST['dob'])
    {
        $_SESSION['progress'] = $row[0];
        $_SESSION['appid'] = $appid;
        $_SESSION['currentshow'] = $row[0];
        if($row[0]>4)
            $_SESSION['currentshow'] = 4;
        echo "<script>formstart();</script>";
    }
    else
    {
    echo "<script>wrongiddialog()</script>"    ;
    }
    }
    else
    {
    echo "<script>wrongiddialog()</script>"    ;
    }
}

if(!isset($_POST['oldapp']) && !isset($_POST['newapp']))
{
    session_destroy();
}


      ?>
  
      
      
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

