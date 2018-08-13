<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
$usertype;
if(!isset($_SESSION['islogin']) || $_SESSION['usertype']=='applicant')
{
header ("location: login.php");
}
else
{
    $usertype=$_SESSION['usertype'];
}
?>
<html><head>
<title>Other Applications</title>
<link href="http://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
 <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel="stylesheet" href="style1.css">
<!-- Material Design Lite -->
    <script src="http://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="http://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
<script src='http://www.google.com/recaptcha/api.js'></script>



<script>

function showapplication(appid)
{
    document.cookie = "appid="+appid;
    window.open('viewform.php', '_blank');
}
function searchSort(errordiv)
{
    var headtr = document.getElementById('headtr'+errordiv);
    headtr.style.display = "";
    var notmatch=document.getElementById(errordiv+'notmatch');
    notmatch.innerHTML='';
    var val= document.getElementById(errordiv+'search').value;
    //alert(val);
    if(val != '')
    {
        var trs=document.getElementsByClassName(errordiv+'alltr');
        for(var i=0, len=trs.length; i<len; i++)
        {
            trs[i].style.display = "none";
        }
        var showtrs = document.querySelectorAll('*[id^="'+errordiv+'tr"][id*="'+val+'"]');
        for(var i=0, len=showtrs.length; i<len; i++)
        {
            showtrs[i].style.display = "";
        }
        if(showtrs.length==0)
        {
            var headtr = document.getElementById('headtr'+errordiv);
            headtr.style.display = "none";
            var notmatch=document.getElementById(errordiv+'notmatch');
            notmatch.innerHTML='No application found! To view the live applications <a href="admin_home.php">Live Applications</a> section';
        }
    }
    else
    {
        var trs=document.getElementsByClassName(errordiv+'alltr');
        for(var i=0, len=trs.length; i<len; i++)
        {
            trs[i].style.display = "";
        }
    }
    
    
}
<?php
if($usertype=='master')
{
$masterspecialscript=<<<aa


function delRecord(appid)
{
    var link = 'deleterecord.php?appid='+appid;
    window.open (link, 'newwindow', config='height=400, width=560, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');

}
function projectreopen(appid)
{
    var link = 'reopenproject.php?appid='+appid;
    window.open (link, 'newwindow', config='height=400, width=560, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');

}


aa;
echo $masterspecialscript;
}
?>


</script>
<style>
/*
.closebtn:hover{
    width: 200px;
    transition: 1.2s;
    transition-timing-function: ease-in-out;
}
.closebtn{
    transition: 1.2s;
    transition-timing-function: ease-in-out;
}

*/
.anchor1:hover:not(.active) {
background-color: transparent;
}

.anchor1{
    color: blue;
}
.headerlabel{
    background-color: white;
    color: black;
    padding: 5px;
    font-size: 20px;
}
tr{
    transition-duration: 0.4s;
}
.search {
    width: 230px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('img/searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    transition: 0.4s;
}

.search:focus {
      border: 2px solid #8e5de0;
}
.search:hover {
    border: 2px solid #8e5de0;
}
.tdother1{
    
    font-weight: 200;
    font-size: 15px;
    font-family: Roboto Condensed;
    padding: 10px;
    color: black;
    text-align: center;
    }    
.tdhead{
    padding: 10px;
    background-color:purple;
    font-weight: 400;
    font-size: 15px;
    font-family: lato;
    color: white;
    text-align: center;
    
    }

    
    
.titleincard {
  color: #ffffff;
  font-size: 18px;
background: -moz-linear-gradient(24deg, #000000 0%, #000000 13%, #3B3B3B 100%); /* ff3.6+ */
background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, #000000), color-stop(13%, #000000), color-stop(100%, #3B3B3B)); /* safari4+,chrome */
background: -webkit-linear-gradient(24deg, #000000 0%, #000000 13%, #3B3B3B 100%); /* safari5.1+,chrome10+ */
background: -o-linear-gradient(24deg, #000000 0%, #000000 13%, #3B3B3B 100%); /* opera 11.10+ */
background: -ms-linear-gradient(24deg, #000000 0%, #000000 13%, #3B3B3B 100%); /* ie10+ */
background: linear-gradient(66deg, #000000 0%, #000000 13%, #3B3B3B 100%); /* w3c */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#3B3B3B',GradientType=1 ); /* ie6-9 */
}    
.cardtop{
    background: -moz-linear-gradient(45deg, #ddeaea 12%, #1d4d5f 45%, #FFFFFF 45%, #FFFFFF 100%); /* ff3.6+ */
background: -webkit-gradient(linear, left bottom, right top, color-stop(12%, #ddeaea), color-stop(45%, #1d4d5f), color-stop(45%, #FFFFFF), color-stop(100%, #FFFFFF)); /* safari4+,chrome */
background: -webkit-linear-gradient(45deg, #ddeaea 12%, #1d4d5f 45%, #FFFFFF 45%, #FFFFFF 100%); /* safari5.1+,chrome10+ */
background: -o-linear-gradient(45deg, #ddeaea 12%, #1d4d5f 45%, #FFFFFF 45%, #FFFFFF 100%); /* opera 11.10+ */
background: -ms-linear-gradient(45deg, #ddeaea 12%, #1d4d5f 45%, #FFFFFF 45%, #FFFFFF 100%); /* ie10+ */
background: linear-gradient(45deg, #ddeaea 12%, #1d4d5f 45%, #FFFFFF 45%, #FFFFFF 100%); /* w3c */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#FFFFFF', endColorstr='#fdff6c',GradientType=1 ); /* ie6-9 */
}
.animate{
    transition-duration: 0.4s;
}



body {
  margin: 0em;
  min-width:1000px; /* suppose you want minimun width of 1000px */
  width: auto !important; 
  width: 100px;
}
/*Mandatory layout part*/
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
/*Mandatory layout part ends*/



</style></head>

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
            <a class="mdl-navigation__link" href="admin_home.php">Live Applications</a>
            <a class="mdl-navigation__link" href="OngoingProjects.php">Ongoing Projects</a>
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
          <a class="mdl-navigation__link currentpage" href="OtherApplication.php">Other Applications</a>
          <a class="mdl-navigation__link" href="ManageNotice.php">Notice</a>
          <?php

      require_once("dbcon.php");
    
        $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
        @mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases
        if($_SESSION['usertype']=='master')
        {
            echo '<a class="mdl-navigation__link" href="ManageAdmin.php">Manage Admin</a>';
            echo '<a class="mdl-navigation__link" href="deleteapplicationlog.php">Deleted Application Log</a>';
        }

          ?>
          <a class="mdl-navigation__link" href="uploadInstruction.php">Upload Instruction</a>
          <a class="mdl-navigation__link" href="ChangePassword.php">Change Password</a>
          <a class="mdl-navigation__link" href="login.php" style="background-color: #d5d9f5; color: #757575;">Logout</a>
        </nav>
      </div>
      <main class="mdl-layout__content">
      <div id='p2' class='mdl-progress mdl-js-progress mdl-progress__indeterminate' style="display: none; width: 100%;"></div>
        <div class="page-content" style="padding: 2% 5%; font-family: calibri">
  
  
  
  
  
  <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%">

      <div class="mdl-card__supporting-text" style="background-color: #13809e;color: white;font-size: 26px;width: 96%;padding: 2% 2% 1% 2%;text-align:  center;height: 30px;">
       Other Application (Contains Rejected Applications and Closed Projects)
      </div>
      <div class="mdl-card__actions mdl-card--border" style="text-align: center; padding: 0px 25px 0px 25px; background-color: white;">
      <br />





<div id="acceptedapplication" style="min-height: 150px; width: 95%; font-family: calibri;align-items:center; justify-content:center; margin: 0em;">  <!application div height must be 100px lesser than body-main div>
<center>
<label class="headerlabel">Closed Projects</label>
<br /><br />

<?php

$que="select app_details.date_of_submission, app_details.appid, app_details.email, app_details.app_title from app_status, app_details where app_details.appid=app_status.appid and app_status.status='Closed' order by app_details.date_of_submission asc";
        $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        if(mysql_num_rows($rs)>0)
        {
        echo '<input type="text" class="search" id="Accsearch" name="Accsearch" placeholder="Search Application Id" oninput="searchSort('."'Acc'".');"/><div id="Accnotmatch"></div></form><form method="post" action="" enctype="multipart/form-data" onload="formload">';
        $j=0;
        echo "<br/><center><table style='width: 97%;'><tr id='headtrAcc'>";
        if($usertype=='master')
        {
            echo "<td class='tdhead'>Reopen</td>";
        }
        
        echo "<td class='tdhead'>Date of Submission</td><td class='tdhead'>Application Id</td><td class='tdhead'>Project Panel</td><td class='tdhead'>Email</td><td class='tdhead'>Title</td>";
        if($usertype=='master')
        {
            echo "<td class='tdhead'>Delete</td>";
        }
        echo '</tr>';
        while($row=mysql_fetch_array($rs))
        {
   
          if($j%2==0)
            {
            $trcolor="#e5e8ec";    
            echo "<tr id='Acctr$row[1]' class='Acctrclass$row[1] Accalltr' style='background-color:$trcolor;'>";
            }
            else
            {
            $trcolor="#e5f2ff";   
            echo "<tr id='Acctr$row[1]' class='Acctrclass$row[1] Accalltr' style='background-color:$trcolor;'>";
            }
            if($usertype=='master')
            {
                echo "<td class='tdother1'><button type='button' class='mdl-button mdl-js-button mdl-button--raised mdl-button--colored' onclick='projectreopen(\"".$row[1]."\");'>Reopen</td>";
            }
          echo "<td class='tdother1'>$row[0]</td><td class='tdother1'>
          
              <span class='mdl-chip chiphover' style='background-color: white;cursor: pointer;' id='appid$row[1]' onclick='showapplication(\"$row[1]\");'>
    
    <span class='mdl-chip__text' style='font-weight: 700;font-family: lato;'>$row[1]</span>
    
    </span>

    <div class='mdl-tooltip' for='appid$row[1]'>
    click here to view the application
    </div>
          
          </td><td class='tdother1'><a class='anchor1' href='projectpanel.php?appid=$row[1]' target='_blank'><i class='material-icons'>open_in_new</i></a></td><td class='tdother1'><a class='anchor1' href='mailto:$row[2].pdf'>$row[2]</a></td><td class='tdother1'>$row[3]</td>";
          if($usertype=='master')
            {
                 echo "<td class='tdother1'>
                 <button  type='button' style='min-width: 32px; min-height:32px;height:  32px;width: 32px; background-color: red'  class='mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored' onclick='delRecord(\"".$row[1]."\");'><i class='material-icons'>delete_forever</i></button></td>";
            }
          
          echo "</tr>";
          $j++;
           }
           
        echo "</table></center>";
        }
        else
        echo "No application found.";
       

?>
</center>
</div>
<div id="rejectedapplication" style="min-height: 150px; width: 95%; font-family: calibri;align-items:center; justify-content:center; margin: 0em;">  <!application div height must be 100px lesser than body-main div>
<center>
<hr />
<label class="headerlabel">Rejected Applications</label>
<br /><br />
<?php
$que="select app_details.date_of_submission, app_details.appid, app_details.email, app_details.app_title from app_status, app_details where app_details.appid=app_status.appid and app_status.status='Rejected' order by app_details.date_of_submission asc";
        $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        if(mysql_num_rows($rs)>0)
        {
        $j=0;
        echo '<input type="text" class="search" id="Rejsearch" name="Rejsearch" placeholder="Search Application Id" oninput="searchSort('."'Rej'".');"/><div id="Rejnotmatch"></div></form><form method="post" action="" enctype="multipart/form-data" onload="formload">';
        echo "<br/><center><table style='width: 97%;'><tr id='headtrRej'>
        <td class='tdhead'>Date of Submission</td><td class='tdhead'>Application Id</td><td class='tdhead'>Audit Trail</td><td class='tdhead'>Email</td><td class='tdhead'>Title</td>
        ";
        if($usertype=='master')
        {
        echo "<td class='tdhead'>Delete</td>";
        }

        echo "</tr>";
        
        while($row=mysql_fetch_array($rs))
        {
   
          if($j%2==0)
            {
            $trcolor="#e5e8ec";    
            echo "<tr id='Rejtr$row[1]' class='Rejtrclass$row[1] Rejalltr' style='background-color:$trcolor;'>";
            }
            else
            {
            $trcolor="#e5f2ff";   
            echo "<tr id='Rejtr$row[1]' class='Rejtrclass$row[1] Rejalltr' style='background-color:$trcolor;'>";
            }
            
          echo "<td class='tdother1'>$row[0]</td><td class='tdother1'>
          
          <span class='mdl-chip chiphover' style='background-color: white;cursor: pointer;' id='appid$row[1]' onclick='showapplication(\"$row[1]\");'>
    
    <span class='mdl-chip__text' style='font-weight: 700;font-family: lato;'>$row[1]</span>
    
    </span>

    <div class='mdl-tooltip' for='appid$row[1]'>
    click here to view the application
    </div>
          
          </td><td class='tdother1'><a class='anchor1' href='auditTrail.php?appid=$row[1]' target='_blank'><i class='material-icons'>open_in_new</i></a></td><td class='tdother1'><a class='anchor1' href='mailto:$row[2].pdf'>$row[2]</a></td><td class='tdother1'>$row[3]</td>";
          if($usertype=='master')
            {
          echo "<td class='tdother1'>
                 <button  type='button' style='min-width: 32px; min-height:32px;height:  32px;width: 32px; background-color: red'  class='mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored' onclick='delRecord(\"".$row[1]."\");'><i class='material-icons'>delete_forever</i></button></td>";
            }
          echo "</tr>";
          $j++;
           }
           
        echo "</table></center>";
        }
        else
        echo "No application found.";
       

?>
</center>
</div>













        </div>
                                                                                                                                            
        </div></div>
  
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

