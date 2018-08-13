<?php

session_start();

if(!isset($_SESSION['islogin']) || $_SESSION['usertype']=='applicant')
{
header ("location: login.php");
}
?>
<html><head>
<title>Change or View Application Status</title>
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

 <dialog id="successdialog" class="mdl-dialog" style="text-align: center;">
  <h4 class="mdl-dialog__title"><i class="material-icons" style="font-size: 48px;">check_circle</i></h3>
  <div class="mdl-dialog__content">
    <p>
      Status Sucessfully Updated
    </p>
  </div>
  <div class="mdl-dialog__actions">
    <button type="button" class="mdl-button" >Ok</button>
  </div>
</dialog>

 <dialog id="quesdialog" class="mdl-dialog" style="text-align: center;">
  <h4 class="mdl-dialog__title"><i class="material-icons" style="font-size: 48px;">check_circle</i></h3>
  <div class="mdl-dialog__content">
    <p>
      Question Sucessfully Posted
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
function notlog()
{
     window.location = 'login.php'
}
function hidemes(appid){
    document.getElementById('mesbadge'+appid).style.display = "none";
    
}
function successdialog(){
    if(!isChrome())
    {
        alert('Status Sucessfully Updated');
    }
    else
    {
    var dialog = document.querySelector('#successdialog');
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

function quesdialog(){
    if(!isChrome())
    {
        alert('Question Sucessfully Posted');
    }
    else
    {
    var dialog = document.querySelector('#quesdialog');
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
function showapplication(appid)
{
    document.cookie = "appid="+appid;
    window.open('viewform.php', '_blank');
}
function showtoast(mes)
{
    var snackbarContainer = document.querySelector('#demo-toast-example');
    'use strict';
    var data = {message: mes};
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
}

function radioChange(appid, status)
{
    //alert(appid);
    //document.getElementById("test").innerHTML='<div class="mdl-textfield mdl-js-textfield"><input class="mdl-textfield__input" type="text" id="sample1"><label class="mdl-textfield__label" for="sample1">Text...</label></div>';
    
    
    var radval=document.getElementById("rad1"+appid).value
    if(radval!=status)
    {
    //alert("change");
    var tr = document.getElementById('radiodiv'+appid);
    var trcmt = document.getElementById('divcomment'+appid);
    trcmt.style.display = "";
    //alert('tr'+appid);
    tr.style.backgroundColor="#ffa6a6";
    trcmt.style.visibility = "visible";
    
    var divsave = document.getElementById('divsave'+appid);
    divsave.innerHTML='Status changed. Click Here <i class="material-icons" style="font-size: 2rem;height: 2.4rem;vertical-align: middle;">arrow_downward</i> to save';
    var divbutton = document.getElementById('buttondiv'+appid);
    var innerdivcode='';
    if(status=='Accepted')
    {
        innerdivcode='<input type="text" placeholder="Report Frequency" id="reportfrequency'+appid+'" style="margin-bottom:  6px;height: 25px;width: 150px;border-radius: 6px;padding-left: 10px;" required> days';
    }
    innerdivcode=innerdivcode+'<input type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="background-color: green;" id="savebtn'+appid+'"  name="savebtn'+appid+'" value="Change to '+status+'" onclick="buttonClickAjax('+"'"+appid+"','"+status+"'"+');"/>'; 
    divbutton.innerHTML = innerdivcode;
    //divbutton.innerHTML='<input type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="background-color: green;" id="savebtn'+appid+'"  name="savebtn'+appid+'" value="Change to '+status+'" onclick="buttonClickAjax('+"'"+appid+"','"+status+"'"+');"/>';
    var divchk = document.getElementById('chkdiv'+appid);
    divchk.style.display = "";
    var labelques = document.getElementById('queslabel'+appid);
    labelques.innerHTML = "Put your comment or question here. Comments and questions are visible in audit trail"
    }
    else
    {
    //alert("no change");
    var tr = document.getElementById('radiodiv'+appid);
    tr.style.backgroundColor="#e0feff";
    
    var divsave = document.getElementById('divsave'+appid);
    divsave.innerHTML="<input type='button' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent' width: 100px;' id='askbtn"+appid+"' name='askbtn"+appid+"' value='Ask a question to applicant' onclick='QbuttonClick("+'"'+appid+'","'+status+'"'+");'/>";
    var divbutton = document.getElementById('buttondiv'+appid);
    divbutton.innerHTML="";
    var trcmt = document.getElementById('divcomment'+appid);

    trcmt.style.display = "none";
    }
}

function QbuttonClick(appid, status)
{
    var trcmt = document.getElementById('divcomment'+appid);
    trcmt.style.display = "";
    trcmt.style.visibility = "visible";
    var divsave = document.getElementById('divsave'+appid);
    divsave.innerHTML="";
    var divchk = document.getElementById('chkdiv'+appid);
    divchk.style.display = "none";
    var divbutton = document.getElementById('buttondiv'+appid);
    divbutton.innerHTML='<input type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="background-color: blue;" id="finalask'+appid+'"  name="finalask'+appid+'" value="Ask Question" onclick="onlyquestionAjax('+"'"+appid+"'"+');"/>';
    var labelques = document.getElementById('queslabel'+appid);
    labelques.innerHTML = "Put your question here. Questions are visible in audit trail"
    
}
function buttonClickAjax(appid, status)
{
 
    var areq=new XMLHttpRequest();
    var d=document.getElementById("divsave"+appid).style.display = "none";
    var comment= document.getElementById('textcmt'+appid).value;
    var state= document.getElementById("chk"+appid).checked;
    var reportfrequency='-1';
    var reportfrequencyerror = 'noerror'
    if (status == "Accepted" )
    {
        reportfrequency= document.getElementById('reportfrequency'+appid).value;
        if(reportfrequency == '')
        {
            reportfrequencyerror = 'Report Frequency Needed';
        }
        var reg = new RegExp('^[0-9]+$');
        if(!reg.test(reportfrequency))
        {
            reportfrequencyerror = 'Report Frequency must be numeric type';
        }
        if(reportfrequency < 1)
        {
            reportfrequencyerror = 'Report Frequency must be greater than zero. You have entered '+reportfrequency;
        }
        
    }

    if(reportfrequencyerror == 'noerror')
    {
  
    //console.log(state);
    
    areq.onreadystatechange=function()
    {
        if(areq.readyState==4)
        {
            var d=document.getElementById("divsave"+appid);
            console.log(areq.responseText);
            if(areq.responseText=='ok')
            {
    
                var l=document.getElementById("loader"+appid);
                l.style.display = "none";
                d.style.display = "";               
                d.innerHTML="<input type='button' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent' width: 100px;' id='askbtn"+appid+"' name='askbtn"+appid+"' value='Ask a question to applicant' onclick='QbuttonClick("+'"'+appid+'","'+status+'"'+");'/>";

                document.getElementById("rad1"+appid).value=status;
                document.getElementById("rad2"+appid).value=status;
                document.getElementById("rad3"+appid).value=status;
                document.getElementById("rad4"+appid).value=status;
                var trcmt = document.getElementById('divcomment'+appid);
                trcmt.style.display = "none";
                var tr = document.getElementById('radiodiv'+appid);
                tr.style.backgroundColor="#e0feff";
                successdialog();
                document.getElementById("textcmt"+appid).value="";
                if(status == "Accepted")
                {
                    tr.innerHTML = "Application is "+status+" and moved to the <a href='OngoingProjects.php'>Ongoing Projects</a> section";
                    
                }
                else if(status == "Rejected")
                {
                       tr.innerHTML = "Application is "+status+" and moved to the <a href='OtherApplication.php'>Other Applications</a> section";
                   
                }
            }
        }
        else
        {
            var d=document.getElementById("loader"+appid);
            d.style.display = "";
        }
        
    };
    areq.open("get","statusupdaterAJAX.php?appid="+appid+"&status="+status+"&cmt="+comment+"&state="+state+"&reportfrequency="+reportfrequency,true);
    areq.send(null);
    }
    else 
    {
        alert(reportfrequencyerror);
    }
    
    
}

function onlyquestionAjax(appid)
{
 
    var areq=new XMLHttpRequest();

    var comment= document.getElementById('textcmt'+appid).value;
    ques=comment;
    areq.onreadystatechange=function()
    {
        if(areq.readyState==4)
        {
            var d=document.getElementById("divsave"+appid);
            //alert(areq.responseText);
            if(areq.responseText=='ok')
            {
                d.innerHTML="<input type='button' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent' width: 100px;' id='askbtn"+appid+"' name='askbtn"+appid+"' value='Ask a question to applicant' onclick='QbuttonClick("+'"'+appid+'","'+status+'"'+");'/>";
                var l=document.getElementById("loader"+appid);
                l.style.display = "none";
                var trcmt = document.getElementById('divcomment'+appid);
                trcmt.style.display = "none";
                var tr = document.getElementById('radiodiv'+appid);
                tr.style.backgroundColor="#e0feff";
                document.getElementById("textcmt"+appid).value="";
                quesdialog();
            }
        }
        else
        {
            var d=document.getElementById("loader"+appid);
            d.style.display = "";
        }
        
    };
    areq.open("get","onlyquesAJAX.php?appid="+appid+"&ques="+ques,true);
    areq.send(null);
    
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
            notmatch.innerHTML='<i class="material-icons">highlight_off</i> No live application found!';
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
            notmatch.innerHTML='No live application found!';

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
  background: -webkit-linear-gradient(top, rgba(52,86,106,1) 0%, rgba(11,25,34,1) 100%);
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
            <a class="mdl-navigation__link" href="OngoingProjects.php">Ongoing Projects</a>
            <a class="mdl-navigation__link" href="ManageNotice.php">Notice</a>
            <a class="mdl-navigation__link" href="login.php" style="background-color: rgba(158, 59, 132, 0.64); border-radius: 8px;">Logout</a>
          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Menu</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link currentpage" href="admin_home.php">Live Applications</a>
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
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text"><label style="font-family: Lato; font-size: 28px; font-weight: 500;">
Check or Update Status of Live Applications</label></h2>
      </div>
      <div class="mdl-card__supporting-text" style="background-color: #ffffff;color: black;font-size: 16px;width: 96%;padding: 1% 2% 1% 2%;">
        Please Note: The applications which are <b>Rejected</b> or <b>Accepted</b> will not be shown here and those will not be considered as live application.<br />You can change status of live applications from here. You can also accept/reject a live application from here. <br/><br/>
To view the Accepted Applications for which projects are live, please visit please visit <a href="OngoingProjects.php">Ongoing Projects</a> section. For closed projects or Rejected Applications,
 visit <a href="OtherApplication.php">Other Applications</a> section.</label>
      </div>
      <div class="mdl-card__actions mdl-card--border" style="text-align: center; padding: 0px 25px 0px 25px; background-color: #eae9ea;">
                        
                        
                        
      <br />



<?php


    date_default_timezone_set('Asia/Kolkata');
    
    
        $que="select app_details.date_of_submission, app_details.appid, app_status.status, app_details.app_title, app_details.keyword, app_status.unreadmes from app_status, app_details where app_details.appid=app_status.appid and app_status.status!='Rejected' and app_status.status!='Accepted' and app_status.status!='Closed' order by app_details.date_of_submission asc";
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
    </a>
    </span>

    <div class='mdl-tooltip' for='appid$row[1]'>
    click here to view the application
    </div>
    
      <span class='mdl-chip' style='background-color: transparent; float: right'>
    <span class='mdl-chip__text' style='font-size: 15px;'>Application Submitted On: $row[0]</span>
    </span>
      </div>
      
      <div class='mdl-card__title titleincard'>
        <h2 class='mdl-card__title-text' style='width: 100%;'>
        <div style='font-family: Lato;font-size: 28px;font-weight: 500;text-align:  left;width: 100%;padding-right: 30%;'>$row[3]</div><br/><br/>
        
        </h2>

      </div>
      <div class='mdl-card__supporting-text' style='text-align: left; width: inherit; background-color: #ffffff; color: black; padding: 5px'>
        <span class='mdl-chip' style='background-color: transparent;'>
            <span class='mdl-chip__text' >Keywords </span>
        </span>
        
       ";
        for($i=0;$i<sizeof($keywords);$i++)
        {
            
            echo "<span class='mdl-chip' style='color: white; background-color: #00158c; cursor:pointer' id='keyword$i$row[1]' onclick='addkeyword(\"".$keywords[$i]."\")'>
            <span class='mdl-chip__text'>$keywords[$i]</span>
            </span> 
            <div class='mdl-tooltip' for='keyword$i$row[1]'>
            click here to search with this keyword
            </div>
            ";
            
        }
        echo"
      </div>
      <div class='mdl-card__actions mdl-card--border' style='text-align: left; background-color: #e0feff;'>
          <div id='radiodiv$row[1]' style='height: 36px; padding: 5px 10px 5px 10px;border-radius: 3px;box-shadow: 0 0px 0px 0 rgba(0,0,0,.14), 0 0px 0px 0px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.42);'>
          <div style='padding-top: 6px;width: 65%;  float:  left; outline: none' id='radios$row[1]' class='animate' >
          ";
           
           
         if($row[2]=="Submitted")
            {
                echo "
                
                <label class='mdl-radio mdl-js-radio mdl-js-ripple-effect' for='rad1$row[1]' style=>
                <input type='radio' class='mdl-radio__button class$row[1]' name='rad$row[1]' id='rad1$row[1]' value='$row[2]' onclick='radioChange(\"".$row[1]."\",\"Submitted\");' checked='checked'>
                <span class='mdl-radio__label'>Submitted</span>
                </label>&nbsp;&nbsp;&nbsp;";
                
                ;}
            else
            {
                echo "
                
                <label class='mdl-radio mdl-js-radio mdl-js-ripple-effect' for='rad1$row[1]'>
                <input type='radio' class='mdl-radio__button class$row[1]' name='rad$row[1]' id='rad1$row[1]' value='$row[2]' onclick='radioChange(\"".$row[1]."\",\"Submitted\");'>
                <span class='mdl-radio__label'>Submitted</span>
                </label>&nbsp;&nbsp;&nbsp;";
            }
            
            if($row[2]=="Under Review")
            {
                echo "
                
                <label class='mdl-radio mdl-js-radio mdl-js-ripple-effect' for='rad2$row[1]'>
                <input type='radio' class='mdl-radio__button class$row[1]' name='rad$row[1]' id='rad2$row[1]' value='$row[2]' onclick='radioChange(\"".$row[1]."\",\"Under Review\");' checked='checked'>
                <span class='mdl-radio__label'>Under Review</span>
                </label>&nbsp;&nbsp;&nbsp;";
                
                ;}
            else
            {
                echo "
                
                <label class='mdl-radio mdl-js-radio mdl-js-ripple-effect' for='rad2$row[1]'>
                <input type='radio' class='mdl-radio__button class$row[1]' name='rad$row[1]' id='rad2$row[1]' value='$row[2]' onclick='radioChange(\"".$row[1]."\",\"Under Review\");'>
                <span class='mdl-radio__label'>Under Review</span>
                </label>&nbsp;&nbsp;&nbsp;";
            }
            
            
           
                echo "
                
                <label class='mdl-radio mdl-js-radio mdl-js-ripple-effect' for='rad3$row[1]'>
                <input type='radio' class='mdl-radio__button class$row[1]' name='rad$row[1]' id='rad3$row[1]' value='$row[2]' onclick='radioChange(\"".$row[1]."\",\"Accepted\");'>
                <span class='mdl-radio__label'>Accepted</span>
                </label>&nbsp;&nbsp;&nbsp;";
                
                
                echo "
                
                <label class='mdl-radio mdl-js-radio mdl-js-ripple-effect' for='rad4$row[1]'>
                <input type='radio' class='mdl-radio__button class$row[1]' name='rad$row[1]' id='rad4$row[1]' value='$row[2]' onclick='radioChange(\"".$row[1]."\",\"Rejected\");'>
                <span class='mdl-radio__label'>Rejected</span>
                </label>&nbsp;&nbsp;&nbsp;</div>
                <div class='mdl-tooltip' for='radios$row[1]'>
                Click on a new status to change it
                </div>";
          
                  
           echo "<div id='divsave$row[1]' name='divsave$row[1]' style='padding: 0px; float: right; width: 35%; color:#00000070'><input type='button' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent' width: 100px;' id='askbtn$appid' name='askbtn$appid' value='Ask a question to applicant' onclick='QbuttonClick(\"".$row[1]."\",\"".$row[2]."\");'/></div>";
           echo "<div id='loader$row[1]' class='mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active' style='display: none;'></div>";
           //echo "<td class='tdother1'><div id='divajax$row[1]' name='divsave$row[1]'></div></td>";   
          echo "</div>";
          echo "<div style='display: none;' id='divcomment$row[1]' name='divcomment$row[1]'>
          
          <div class='mdl-textfield mdl-js-textfield' style='width: 70%; float: left'>
          <input class='mdl-textfield__input' type='text' id='textcmt$row[1]'  name='textcmt$row[1]' style='width: 100%; outline:none' required> 
          <label class='mdl-textfield__label' for='textcmt$row[1]' style='color: red' id='queslabel$row[1]'></label> 
          
          </div> 
          <div id='buttondiv$row[1]' style='width: 29%; float: left; padding-left: 6px; padding-top: 8px'></div>
          <div style='float:right; padding-right: 11%' id='chkdiv$row[1]'>
          <label class='mdl-switch mdl-js-switch mdl-js-ripple-effect' for='chk$row[1]'><input type='checkbox' id='chk$row[1]' class='mdl-switch__input' style='float: right'><span class='mdl-switch__label'>Post as a question</span></label>
          </div>
          
          </div>";
     
           
           
           
           
          echo" 
           
                        
                        
      <br />
    




      </div>
      
       <div class='mdl-card__menu'>

    <br><br><br>
    ";
    if($row[5]>0)
    {
    echo"
    <a href='auditTrail.php?appid=$row[1]' target='_blank' style='outline:none; background-color: transparent;cursor: pointer;' onclick='hidemes(\"".$row[1]."\")' id='mesbadge$row[1]'><div class='material-icons mdl-badge mdl-badge--overlap' data-badge='$row[5]' style='margin-right: 10px;font-size: 36px;color: white;'>message</div></a>";
    }
    echo"
    <a href='auditTrail.php?appid=$row[1]' target='_blank'><button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent' id='auditbutton$row[1]'>
      View Audit Trail
    </button></a>
    <div class='mdl-tooltip' for='auditbutton$row[1]'>
    Audit Trail gives status history and question-answer record
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

