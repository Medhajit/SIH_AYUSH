<?php
date_default_timezone_set('Asia/Kolkata');
session_start();

if(!isset($_SESSION['islogin']) || $_SESSION['usertype']=='applicant')
{
header ("location: login.php");
}
?>
<html><head>
<title>Ongoing Projects</title>
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

function showtoast(mes)
{
    var snackbarContainer = document.querySelector('#demo-toast-example');
    'use strict';
    var data = {message: mes};
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
}

function hidemes(appid){
    document.getElementById('mesbadge'+appid).style.display = "none";
    
}

function showapplication(appid)
{
    document.cookie = "appid="+appid;
    window.open('viewform.php', '_blank');
}

function closeproject(appid)
{
    var link = 'closeproject.php?appid='+appid;
    window.open (link, 'newwindow', config='height=269, width=560, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');

}



function searchSort()
{
    var notmatch=document.getElementById('notmatch');
    notmatch.innerHTML='';
    var val= document.getElementById('search').value;
    document.getElementById('searchKEY').value="";
    var clearkeytoast=document.getElementById('notmatchKEY');
    clearkeytoast.innerHTML='';
    //alert(val);
    if(val != '')
    {
        var trs=document.getElementsByClassName('allcard');
        var brs=document.getElementsByClassName('allbr');
        for(var i=0, len=trs.length; i<len; i++)
        {
            trs[i].style.display = "none";
            brs[i].style.display = "none";
            
        }
       
        var showtrs = document.querySelectorAll('*[id^="cardid"][id*="'+val+'"]');
        var showbrs = document.querySelectorAll('*[id^="break"][id*="'+val+'"]');
        for(var i=0, len=showtrs.length; i<len; i++)
        {
            
            showtrs[i].style.display = "";
            showbrs[i].style.display = "";
           
        }
       
        if(showtrs.length==0)
        {
            
            var notmatch=document.getElementById('notmatch');
            notmatch.innerHTML='<i class="material-icons">highlight_off</i> No ongoing project found!';
        }
    }
    else
    {
        var trs=document.getElementsByClassName('allcard');
        var brs=document.getElementsByClassName('allbr');
        for(var i=0, len=trs.length; i<len; i++)
        {
            trs[i].style.display = "";
            brs[i].style.display = "";
        }
    }
    
    
}
function searchSortKey()
{
    var notmatch=document.getElementById('notmatchKEY');
    notmatch.innerHTML='';
    var val= document.getElementById('searchKEY').value;
    document.getElementById('search').value="";
    //alert(val);
    if(val != '')
    {
        var trs=document.getElementsByClassName('allcard');
        var brs=document.getElementsByClassName('allbr');
        for(var i=0, len=trs.length; i<len; i++)
        {
            trs[i].style.display = "none";
            brs[i].style.display = "none";
            
        }
        
       
        //var showtrs = document.querySelectorAll('tr[class^="'+val+'"]');
        //var showtr1s = document.querySelectorAll('*[class^="keyo"][id*="'+val+'"]');
        
        //var showtrscmt = document.querySelectorAll('*[class^="commenttr"][class*="'+val+'"]');
        showtrs=document.getElementsByClassName(val);
        for(var i=0, len=showtrs.length; i<len; i++)
        {
            
            showtrs[i].style.display = "";
            //showtr1s[i].style.display = "";
            //showtrscmt[i].style.display = "";
        }
        if(showtrs.length==0)
        {
            
            var notmatch=document.getElementById('notmatchKEY');
            notmatch.innerHTML='No ongoing project found!';

        }
        else
          {
            var notmatch=document.getElementById('notmatchKEY');
            var valtrim = val.trim();
            var keys = valtrim.split(" ");
            //console.log(keys.length);
            var keywordchips = "";
            for(var i=0, len=keys.length; i<len; i++)
            {
                keywordchips = keywordchips + ' <span class="mdl-chip mdl-chip--deletable"><span class="mdl-chip__text">'+keys[i]+'</span><button type="button" class="mdl-chip__action" onclick="refinekeyword('+i+')"><i class="material-icons">cancel</i></button></span>'
                
            }
            notmatch.innerHTML=keywordchips;
        }
    }
    else
    {
        var trs=document.getElementsByClassName('allcard');
        var brs=document.getElementsByClassName('allbr');
        for(var i=0, len=trs.length; i<len; i++)
        {
            trs[i].style.display = "";
            brs[i].style.display = "";
        }
    }
    
    
}

function refinekeyword(keytodelete)
{
    var keys="";
    var val= document.getElementById('searchKEY').value;
    var valtrim = val.trim();
    var allkey = valtrim.split(" ");   
    for(var i=0, len=allkey.length; i<len; i++)
    {
        if(i!=keytodelete)
        {
            keys = keys + allkey[i] + " ";
        }
    }
    document.getElementById('searchKEY').value = keys;
    searchSortKey();
}

function addkeyword(newkey)
{
    var val= document.getElementById('searchKEY').value;
    var val = val.trim();
    var flag = 0;
    newkey = newkey.trim();
    var keys = val.split(" ");
    if(keys.length>0)
    {
    for(var i=0, len=keys.length; i<len; i++)
    {
       if(keys[i] == newkey)
       {
        flag++;
        break;
       }      
    }
    if (flag==0)
    {
    var keys = val + " " + newkey
    document.getElementById('searchKEY').value = keys;
    showtoast("Keyword added");
    searchSortKey(); 
    }
    else
    {
        showtoast("Keyword is already added");
    }
    }
    else
    {
    var keys = newkey
    document.getElementById('searchKEY').value = keys;
    showtoast("Keyword added");
    }

}


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
            <a class="mdl-navigation__link" href="ManageNotice.php">Notice</a>
            <a class="mdl-navigation__link" href="login.php" style="background-color: rgba(158, 59, 132, 0.64); border-radius: 8px;">Logout</a>
          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Menu</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="admin_home.php">Live Applications</a>
          <a class="mdl-navigation__link currentpage" href="OngoingProjects.php">Ongoing Projects</a>
          <a class="mdl-navigation__link" href="OtherApplication.php">Other Applications</a>
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

      <div class="mdl-card__supporting-text" style="background-color: #13809E;color: white;font-size: 26px;width: 96%;padding: 2% 2% 1% 2%;text-align:  center;height: 30px;">
       Ongoing Projects
      </div>
      <div class="mdl-card__actions mdl-card--border" style="text-align: center; padding: 0px 25px 0px 25px; background-color: #eae9ea;">
                        
                        
                        
      <br />



<?php

    
        $que="select app_details.date_of_submission, app_details.appid, app_status.status, app_details.app_title, app_details.keyword, app_status.unreadmes from app_status, app_details where app_details.appid=app_status.appid and app_status.status='Accepted' order by app_details.date_of_submission asc";
 
        //$que="select app_details.date_of_submission, app_details.appid, app_status.status, app_details.app_title, app_details.keyword, app_status.unreadmes from app_status, app_details where app_details.appid=app_status.appid and app_status.status!='Rejected' and app_status.status!='Accepted' order by app_details.date_of_submission asc";
        $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
        
        if(mysql_num_rows($rs)>0)
        {
        
        echo 'To view a application click on application number.<br /><br/><div><input type="text" class="search" id="search" name="search" placeholder="Search Application Id" oninput="searchSort();"/><div id="notmatch"></div></div>';
        echo '<div><input type="text" class="search" id="searchKEY" name="searchKEY" placeholder="Search Keyword" oninput="searchSortKey();"/><br/><div id="notmatchKEY"></div></div>';
        $j=0;
        echo "<br/>";
        
        while($row=mysql_fetch_array($rs))
        {
        $r2=str_replace(', ',' ',$row[4]);
        $keywords = explode(",",$row[4]);
        $maxlength = 193;
        if(strlen($row[3])>$maxlength)
        {
            $posofspace=$maxlength+1;
            for($i=($maxlength+1);$i>=0;$i--)
            {
                if(substr($row[3], $i, 1)==' '){
                    $posofspace=$i;
                    break;
                }
            }
            $row[3]=(substr($row[3], 0, ($posofspace))).' ...';
        }
echo "

  <div class='mdl-card mdl-shadow--2dp allcard card$row[1] $r2' id='cardid$row[1]' style='width: 100%'>

  
  
      <div class='mdl-card__supporting-text cardtop topdiv$row[1]' style='text-align: left; width: inherit; background-color: #ef594e; color: white; padding: 5px'>
     
     <span class='mdl-chip' style='background-color: transparent;'>
    <span class='mdl-chip__text' style='font-size: 15px;'>Application Number </span>
    </span>
    
    <span class='mdl-chip chiphover' style='background-color: white;cursor: pointer;' id='appid$row[1]' onclick='showapplication(\"$row[1]\");'>
    
    <span class='mdl-chip__text' style='color: #18098a'>$row[1]</span>
    
    </span>

    <div class='mdl-tooltip' for='appid$row[1]'>
    click here to view the application
    </div>
    
      <div style='float:right;' >
    <button type='button' class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent closebtn' style='background-color: red; color: white' id='closebutton$row[1]' onclick='closeproject(\"$row[1]\")'>
      Close Project
    </button>
</div>
      </div>
      
      <div class='mdl-card__title titleincard'>
        <h2 class='mdl-card__title-text' style='width: 100%;'>
        <div style='font-family: Lato;font-size: 28px;font-weight: 500;text-align:  left;width: 100%;padding-right: 30%;'>$row[3]</div><br/><br/>
        
        </h2>

      </div>
      <div class='mdl-card__supporting-text' style='text-align: left; width: inherit; background-color: white ;'>
        <span class='mdl-chip' style='background-color: transparent;'>
            <span class='mdl-chip__text' >Keywords </span>
        </span>
        
       ";
        for($i=0;$i<sizeof($keywords);$i++)
        {
            
            echo "<span class='mdl-chip' style='color: white; background-color: #00158c; cursor:pointer' id='keyword$i$row[1]' onclick='addkeyword(\"".$keywords[$i]."\")'>
            <span class='mdl-chip__text'>$keywords[$i]</span>
            </span> 
            
            ";
            
        }
        echo"
      </div>
      
       <div class='mdl-card__menu' style='top: 46px'>

    <br>
    ";
    if($row[5]>0)
    {
    echo"
    <a href='projectpanel.php?appid=$row[1]' target='_blank' style='outline:none; background-color: transparent;cursor: pointer;' onclick='hidemes(\"".$row[1]."\")' id='mesbadge$row[1]'><div class='material-icons mdl-badge mdl-badge--overlap' data-badge='$row[5]' style='margin-right: 10px;font-size: 36px;color: white;'>message</div></a>";
    }
    echo"
    <a href='projectpanel.php?appid=$row[1]' target='_blank'><button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent' id='auditbutton$row[1]'>
      View Project Panel
    </button></a>
    <div class='mdl-tooltip' for='auditbutton$row[1]'>
    Project Panel helps you to track progress of the project
    </div>
    <div class='mdl-tooltip' for='mesbadge$row[1]'>
    $row[5] unread reply for these application
    </div>
    
  </div>
    </div>
<br id='break$row[1]' class='allbr $r2'/>
";






        }
           
        }
        else
        echo "<br/><br/>No live application found";
         
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
    
   <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
      <div class="mdl-snackbar__text"></div>
      <button class="mdl-snackbar__action" type="button"><i class="material-icons">check_circle</i>&nbsp;</button>
 </div>    
    
 
  </body>
</html> 

