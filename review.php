<?php

date_default_timezone_set('Asia/Kolkata');
session_start();
$progress= -1;
$appid;
if(isset($_SESSION['progress']) && isset($_SESSION['appid']))
{
    $progress= $_SESSION['progress'];
    //echo $currentshow;
    $appid = $_SESSION['appid'];
    if($progress!=5)
    //echo "<script>redirectinitial();</script>";
    header ("location: applynew.php");
    
}
else
{
    
    //echo "<script>redirectinitial();</script>";
    header ("location: applynew.php");
  
}

?>
<html>
  <head>
  <title>Review Your Application</title>
    <!-- Material Design Lite -->
    <script src="http://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="http://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    
<dialog id="wrongdialog1" class="mdl-dialog" style="text-align: center;">
  <h4 class="mdl-dialog__title"><i class="material-icons" style="font-size: 48px;">error</i></h3>
  <div class="mdl-dialog__content">
    <p>
      Please fill up all the necessary fields
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

    
function wrongiddialog(errornumber) {
    if(!isChrome())
    {
        alert('Please fill up all the necessary fields');
    }
    else
    {
    
        var dialog = document.querySelector('#wrongdialog1'+errornumber);
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


 
/*     
function redirectinitial() {
    
     window.location = 'applynew.php';
}  
*/

function checker() {
    if(document.getElementById('confirm').checked)
    {
        document.getElementById('back').style.display = 'none';
        document.getElementById('sbt').style.display = 'block';
    }
    else
    {
        document.getElementById('back').style.display = 'block';
        document.getElementById('sbt').style.display = 'none';
    }
}

/*function backtoedit() {
     window.location = 'fillform.php';
}

function sbt() {
     window.location = 'success_submit.php';
}*/
</script>  
    
    
    
    
    
    
    <style>
form{
    margin: 0px;
}
.fieldheader{
    color: blue;
    font-size: 20px;
}
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

    </style>





  </head>
  
  
  <?php

if(isset($_POST['sbt']))
{
    $_SESSION['progress']='submit';
     header ("location: success_submit.php");
}
if(isset($_POST['back']))
{

     header ("location: fillform.php");
}

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
  
  

  
  <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%;background-color: white;">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text"><label style="font-family: Lato; font-size: 28px; font-weight: 500;">
        <!--   Page Heading   -->
        Temporary Application Number <label style="background-color: white;padding: 5px 10px;color: black;border-radius: 50px;"><?php echo $_SESSION['appid']?></label></h2>
      </div>
      
     
     
      <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #13809e; color: white; font-size: 20px; ">
        <!--   Page Sub Heading   -->
        Review Your Application
        </div>
        <!--div class="demo-card-wide mdl-card mdl-shadow--2dp" style="background-color: #white; width: 100%;"-->

<?php
$formshowtype='presubmission';
require_once('viewform_plugin.php');
?>


<form method="post">
 <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: white; color:black; font-size: 20px;padding: 2px 0px 20px 30px; height: 90px; text-align: left;">
<br />
<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="confirm">
  <input type="checkbox" id="confirm" class="mdl-checkbox__input" onclick="checker()">
  <span class="mdl-checkbox__label"> I confirm that I had all the provided details are true</span>
</label>        
<!--button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="background: #790000; margin: 15px 0px 0px 0px" id="back" name="back" onclick="backtoedit();"> <!--i class="material-icons" style="font-size: 36px;">keyboard_arrow_left</i>Back to Edit</button-->
<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="background: #790000; margin: 15px 0px 0px 0px" id="back" name="back" onclick="backtoedit();"> <i class="material-icons" style="font-size: 36px;">keyboard_arrow_left</i>Back to Edit</button>

<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="display:none; background: rgb(0, 142, 63); margin: 15px 0px 0px 0px;" id="sbt" name="sbt"> Submit the form <i class="material-icons" style="font-size: 36px;">keyboard_arrow_right</i></button>

</div>

 </form>
 <!--/div-->




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