
<?php

date_default_timezone_set('Asia/Kolkata');
session_start();

if(!isset($_SESSION['islogin']) || $_SESSION['usertype']!='master')
  {
    header ("location: login.php");
  }
?> 

<html>
  <head>
    <!-- Material Design Lite -->
    <title>Deleted Applications Log</title>
    <script src="http://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="http://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
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
            background-color: #d5d9f5;
            
        }
        
        .mdl-progress-red > .progressbar {
            background-color: red !important;
        }
    </style>

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
            <a class="mdl-navigation__link" href="admin_home.php">Live Applications</a>
            <a class="mdl-navigation__link" href="ManageNotice.php">Notice</a>
            <a class="mdl-navigation__link" href="login.php" style="background-color: rgba(158, 59, 132, 0.64); border-radius: 8px;">Logout</a>
          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Menu</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="admin_home.php">Live Applications</a>
          <a class="mdl-navigation__link" href="OngoingProjects.php">Ongoing Projects</a>
          <a class="mdl-navigation__link" href="OtherApplication.php">Other Applications</a>
          <a class="mdl-navigation__link" href="ManageNotice.php">Notice</a>
          <?php

      require_once("dbcon.php");
    
        $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
        @mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases
        if($_SESSION['usertype']=='master')
        {
            echo '<a class="mdl-navigation__link" href="ManageAdmin.php">Manage Admin</a>';
            echo '<a class="mdl-navigation__link currentpage" href="deleteapplicationlog.php">Deleted Application Log</a>';
        }

          ?>
          <a class="mdl-navigation__link" href="uploadInstruction.php">Upload Instruction</a>
          <a class="mdl-navigation__link" href="ChangePassword.php">Change Password</a>
          <a class="mdl-navigation__link" href="login.php" style="background-color: #d5d9f5; color: #757575;">Logout</a>
        </nav>
      </div>
      <main class="mdl-layout__content" style="background-color: #deebf7;">
      <div id='p2' class="mdl-progress mdl-js-progress mdl-progress__indeterminate mdl-progress-red" style="display: none; width: 100%;"></div>
        <div class="page-content" style="padding: 2% 5%;">
   <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%; margin: 20px;background-color: white;" id="printableArea">


      <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #13809e; color: white; font-size: 20px; ">
        <!--   Page Sub Heading   -->
        Deleted Applications Log
        </div>
        <div class="mdl-card__actions mdl-card--border" style="text-align: center;">
      
        <?php
        
require_once("dbcon.php");
            
$link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
@mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases

$que="select * from delete_log";            
$rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
//$row = mysql_fetch_array($rs); 
if(mysql_num_rows($rs) > 0)
{
    echo '<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width: 100%;">
  <thead>
    <tr style="border-bottom: 1px solid black;">
      <th class="mdl-data-table__cell--non-numeric">Date &amp; Time</th>
      <th class="mdl-data-table__cell--non-numeric">Application Number</th>
      <th class="mdl-data-table__cell--non-numeric">Deleted by</th>
      <th class="mdl-data-table__cell--non-numeric">Email Id of Applicant</th>
      <th class="mdl-data-table__cell--non-numeric">Comment</th>
    </tr>
  </thead>
  <tbody>';
  
  while($row = mysql_fetch_array($rs))
  {
    echo "<tr>
      <th class='mdl-data-table__cell--non-numeric'>$row[2]</th>
      <th class='mdl-data-table__cell--non-numeric'>$row[0]</th>
      <th class='mdl-data-table__cell--non-numeric'>$row[1]</th>
      <th class='mdl-data-table__cell--non-numeric'><a href='mailto:$row[4]'>$row[4]</a></th>
      <th class='mdl-data-table__cell--non-numeric'>$row[3]</th>
    </tr>";
  }
  
  echo '  </tbody>
        </table>';
}
else
{
    echo '<br/>No log available';
}   
        ?>

         </div>
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







