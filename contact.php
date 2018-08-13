<?php
date_default_timezone_set('Asia/Kolkata');
?>
<html>
  <head>
  <title>Contact Us</title>
    <!-- Material Design Lite -->
    <script src="http://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="http://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <style>
    @media print {
  .noPrint {
    display:none;
  }
  /*
  table { page-break-after:auto; word-break: keep-words }
  tr    { page-break-inside: auto; page-break-after:auto; word-break: keep-words; }
  td    { page-break-inside:auto; page-break-after:auto; word-break: keep-words; }
  thead { display:table-header-group; word-break: keep-words; }
  tfoot { display:table-footer-group; word-break: keep-words; }
  */
  .pagebreak{page-break-before: always;}
}
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
            background-color: #d5d9f5;
            
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
            window.open('viewform.php', '_blank');
        }
        function enableBtn(){
            document.getElementById("app").disabled = false;
        }
        function disableBtn(){
            document.getElementById("app").disabled = true;
        }
        function printform()
{
    var printContents = document.getElementById('printableArea').innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
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
          <a class="mdl-navigation__link currentpage" href="contact.php">Contact Us</a>
          <a class="mdl-navigation__link" href="login.php" style="background-color: #d5d9f5; color: #757575;">Login</a>
        </nav>
      </div>
      <main class="mdl-layout__content" style="background-color: #deebf7;">
      <div id='p2' class="mdl-progress mdl-js-progress mdl-progress__indeterminate mdl-progress-red" style="display: none; width: 100%;"></div>
        <div class="page-content" style="padding: 2% 5%;">

<div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 50%;float: left; height: 255px;">

      <div class="mdl-card__supporting-text" style="width: 100%;text-align: center; background-color: #13809E; color: white; font-size: 20px; overflow: visible;">Contact Us</div>
      <div class="mdl-card__actions mdl-card--border" style="text-align: center;">

<center>

<p><b>MINISTRY OF AYUSH</b><br>
AYUSH BHAWAN, B Block,<br>
GPO Complex, INA, NEW DELHI - 110023</p>
<p><b>MANAGER</b><br>
Email at: adv_ayush@moa.gov.in<br>
Contact:xxxxxxxx</p>





<br />
<br><br>
</center>


</div>


</div>
<div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 45%; margin-left: 5%; float: left; min-height: 125px">
<label style="font-size:18px; color: white; background-color: #13809e; color: white; padding: 5px 15px 6px 5px;">
<label style='padding: 5px;float: left;'>Website Developed By</label><label style='padding: 5px; background-color: white; color: black; float: right;'>The TechBots</label>
</label>
<table style="padding-top: 5px;">
<tr style="text-align: center;">
<td>Aniket Sen</td><td>Divya Kiran</td></tr>
<tr style="text-align: center;">
<td>Ankan Hore</td><td>Anisha Agarwal</td></tr>
<tr style="text-align: center;">
<td>Ankit Jhunjhunwala</td><td>Medhajit Choudhury</td></tr>

</table>
</div>

<div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 45%; margin-left: 5%; margin-top: 25px; float: left; min-height: 105px">
<label style="font-size:18px; color: white; background-color: #13809e;color: white; padding: 10px 20px 11px 10px; text-align: center;">
Project Directors
</label>
<table style="padding-top: 5px;">
<tr style="text-align: center;">
<td>Dr. Abhimanyu Kumar, Ex Director, AIIA</td></tr>
<tr style="text-align: center;">
<td>Dr. Tanuja Nesari, Director, AIIA</td></tr>
</table>
</div>

<div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 50%; margin-top: 25px; float: left; min-height: 5px">
<label style="font-size:22px; color: white; background-color: #13809e;padding: 10px 20px 10px 10px; text-align: center;">
This Website is Built Under the Funding from <b>AICTE</b> 
</label>
<label style="font-size:16px; color: black; background-color: white;padding: 10px 20px 10px 10px; text-align: center;">
Special Thanks to <b>Institute of Engineering and Management, Kolkata</b> for their continuous support.
</label>
</div>


<div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 45%; margin-left: 5%; margin-top: 25px; float: left; min-height: 75px">
<label style="font-size:18px; color: white; background-color: #13809e;color: white; padding: 10px 20px 11px 10px; text-align: center;">
Project Mentors
</label>
<table style="padding-top: 5px;">
<tr style="text-align: center;">
<td>Dr. Arun Mahapatra, AIIA</td><td>Dr. Shivakumar Harti, AIIA</td></tr>

</table>
</div>


<div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 45%; margin-left: 5%; margin-top: 25px; float: left; min-height: 75px">
<label style="font-size:18px; color: white; background-color: #13809e;padding: 10px 20px 11px 10px; text-align: center;">
Project Contributor
</label>
<table style="padding-top: 5px;">
<tr style="text-align: center;">
<td>Dr. Varnika Singh, AIIA</td></tr>

</table>
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