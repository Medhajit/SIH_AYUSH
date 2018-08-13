<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
	if(!isset($_SESSION['islogin']) || $_SESSION['usertype']=='applicant')
  {
    header ("location: login.php");
  }
  $_SESSION['chatuser']=$_SESSION['username'];
?>
<html><head>
<title>Change or View Application Status</title>
<link href="http://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

<!-- Material Design Lite -->
<script src="http://code.getmdl.io/1.3.0/material.min.js"></script>
<link rel="stylesheet" href="http://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<!-- Material Design icon font -->
<link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>

function makeReadAJAX(appid)
{
    
    var areq=new XMLHttpRequest();
      areq.onreadystatechange=function()
    {
        if(areq.readyState==4)
        {
           
        }
        
        
    };
    areq.open("get","makeReadAJAX.php?appid="+appid,true);
    areq.send(null);
}
function chatloadAJAX(appid)
{
    var d=document.getElementById("chatbox");       
    d.style.display = "none";
    var s=document.getElementById("asksection");       
    s.style.display = "none";
    var areq=new XMLHttpRequest();
      areq.onreadystatechange=function()
    {
        if(areq.readyState==4)
        {
           var a=document.getElementById("loader");
            a.style.display = "none";
            d.style.display = "";
            var s=document.getElementById("asksection");       
            s.style.display = "";
            d.innerHTML=areq.responseText;
            
            $(function () {
             $('#mainbox').animate({
                  scrollTop: $("#mainbox").offset().top + $("#chatbox").height()  
              });
              return false;
            });
            
        }
        else
        {
            var a=document.getElementById("loader");
            a.style.display = "";
        }
        
    };
    areq.open("get","chatLoaderAJAX.php?appid="+appid,true);
    areq.send(null);
}
function onlyquestionAjax(appid)
{
 
    var areq=new XMLHttpRequest();
    
    var ques= document.getElementById('ques').value.replace(/[\r\n]/g, "<br />");
    if(ques!='')
    {
    var s=document.getElementById("asksection");       
    s.style.display = "none";
         
 
    var d=document.getElementById("chatbox");       
    d.style.display = "none";
    areq.onreadystatechange=function()
    {
        if(areq.readyState==4)
        {
           
            if(areq.responseText=='ok')
            {
                document.getElementById('ques').value="";
                
                var a=document.getElementById("loader");
                a.style.display = "none";
                chatloadAJAX(appid)
                
            }
        }
        else
        {
             var a=document.getElementById("loader");
            a.style.display = "";
        }
        
    };
    areq.open("get","onlyquesAJAX.php?appid="+appid+"&ques="+ques,true);
    areq.send(null);
    }
    
}
/*function notlog()
{
     window.location = 'login.php'
}*/
function nodirect() {
    alert("We are unable to show this page as all expected parameters not found. We are redirecting you to live aplication page. Please click on 'view' option given to each application number to view the audit trail.");
     window.location = 'admin_home.php'
    } 
function chathistoryshow(appid,state)
{
    if(state == 1)
    {
    document.getElementById("withbadge").style.display = "";
    document.getElementById("withoutbadge").style.display = "none";
    }
    else if(state == 0)
    {
        if(document.getElementById("withbadge").style.display == "")    
        {
            makeReadAJAX(appid);
            chatloadAJAX(appid);
        }
        else
        {
            chatloadAJAX(appid);
        }
        
    document.getElementById("withbadge").style.display = "none";
    document.getElementById("withoutbadge").style.display = "";
    }
}


</script>
<style>

body {
 
  
  background-color:white;
  }
  
@media print {
.noPrint {
    display:none;
  }
}
.mdl-layout.is-upgraded .mdl-layout__tab.is-active:hover{
    color: black;

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
    background: -moz-linear-gradient(45deg, #fdff6c 0%, #27afb0 45%, #FFFFFF 45%, #FFFFFF 100%); /* ff3.6+ */
background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, #fdff6c), color-stop(45%, #27afb0), color-stop(45%, #FFFFFF), color-stop(100%, #FFFFFF)); /* safari4+,chrome */
background: -webkit-linear-gradient(45deg, #fdff6c 0%, #27afb0 45%, #FFFFFF 45%, #FFFFFF 100%); /* safari5.1+,chrome10+ */
background: -o-linear-gradient(45deg, #fdff6c 0%, #27afb0 45%, #FFFFFF 45%, #FFFFFF 100%); /* opera 11.10+ */
background: -ms-linear-gradient(45deg, #fdff6c 0%, #27afb0 45%, #FFFFFF 45%, #FFFFFF 100%); /* ie10+ */
background: linear-gradient(45deg, #fdff6c 0%, #27afb0 45%, #FFFFFF 45%, #FFFFFF 100%); /* w3c */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#FFFFFF', endColorstr='#fdff6c',GradientType=1 ); /* ie6-9 */
}
.animate{
    transition-duration: 0.4s;
}
</style></head>


<body>
    <!-- Simple header with fixed tabs. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs" style="min-width: 963px;">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title">Audit Trail for Application Id <label style="color: yellow;">
          <?php
            if(isset($_GET['appid']))
            {
            $appid=$_GET['appid'];
            echo $appid;
            }
            else
            echo "<script>nodirect();</script>";
               
          
          $j=0;
              
           require_once("dbcon.php");
    
        $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
        @mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases
        
        $appid = str_replace("'","''",$appid);
        $que="select app_details.date_of_submission, app_details.appid, app_status.status, app_details.app_title, app_details.keyword, app_details.fname, app_details.mname, app_details.lname, app_details.email, app_details.mob_1, app_details.dob from app_status, app_details where app_details.appid=app_status.appid and app_details.appid='$appid'";
        $rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        $row1=mysql_fetch_array($rs1);
        $date=date_create($row1[10]);
        $dobformatted=date_format($date,"d-m-Y");
        echo "<label style='margin-left: 25px; padding: 8px 15px 8px 15px; background-color: white; color: black'>$row1[2]</label>";
        
        $appid = str_replace("'","''",$appid);
        $que="select unreadmes from app_status where appid='$appid'";
        $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        $row=mysql_fetch_array($rs);
        $unereadstat = $row[0];
          ?>
          
          </label></span>
        </div>
        <!-- Tabs -->
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect noprint">
          <a href="#fixed-tab-1" class="mdl-layout__tab is-active">Update History</a>
          <a href="#fixed-tab-2" class="mdl-layout__tab" onclick="chathistoryshow('<?php echo $appid?>',0)"><span class="mdl-badge" data-badge="<?php echo $row[0]?>" id="withbadge" style="display: none;">Chat History</span><span id="withoutbadge">Chat History</span></a>
          <a href="#fixed-tab-3" class="mdl-layout__tab">Application Details</a>
        </div>
      </header>
      <main class="mdl-layout__content" id="mainbox">
        <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
          <div class="page-content"><center><br />
           <?php

        if($row[0]>0)
        {
            echo "<script>chathistoryshow('$appid',1);</script>";
        }
        $appid = str_replace("'","''",$appid);
        $que="select change_datetime, changeto_status, change_by, comment, state from audit_trail where appid='$appid' and (state='false' or (changeto_status!='--no change--' and changeto_status!='--Unchanged--')) order by change_datetime asc";
        $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        //$roll=str_replace("r","",$table);
        
       
       echo "<a href='javascript:window.print()'><label class='noprint'>Print this page</label></a><br/><br/><img src='img\\emb.png' style='width:46px; height:auto;'/>
       <br/><br/>
       <table class='mdl-data-table mdl-js-data-table mdl-shadow--2dp' style='width: 90%;margin-bottom: 15px;'>
      <thead>
        <tr>
          <th class='mdl-data-table__header--sorted-descending'>Date & Time</th>
          <th>Status</th>
          <th>Updated By</th>
          <th>Comment</th>
        </tr>
      </thead><tbody>";
        while($row=mysql_fetch_array($rs))
        {
          echo "<tr>";
           for($i=0;$i<mysql_num_fields($rs)-1;$i++)
           {
            
            if($i==0)
            {
                $row[$i]=date_create($row[$i]);
                $row[$i]=date_format($row[$i],"d-m-Y H:m:s");
            }
            if($i==3)
            {   
                if($row[4]=='true')
                $row[$i]="-*- Question Posted to Applicant. Check Chat History -*-";
            }
            echo "<td>$row[$i]</td>";
           }
          echo "</tr>";
           }
        echo "</table></center>";
        ?>
          
          </div>
        </section>
        <section class="mdl-layout__tab-panel" id="fixed-tab-2">
          <div id="content" class="page-content"><!-- CHAT -->
          <?php
          /*
              <span class="mdl-chip mdl-chip--contact">
        <span class="mdl-chip__text" style="padding-left: 13px; padding-right: 13px">Contact Chip</span><span class="mdl-chip__contact mdl-color--teal mdl-color-text--white">A</span>
             
          */
          ?><br /><br />
          <div id="chatbox" style="width: 76%; padding: 0px 12% 100px 12%;"></div>
          
           <div id="loader" style="width: 100%;"><center><div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active" style="height: 400px; width: 400px;;"></div></center></div>
          
       
          <div id="chatlower">
          <?php
          $appid = str_replace("'","''",$appid);
          $que="select change_datetime, change_by, comment, state from audit_trail where appid='$appid' and state='true' order by change_datetime asc";
          $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());

                $appid = str_replace("'","''",$appid);
                $que="select status from app_status where appid='$appid'";
                $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
                $row=mysql_fetch_array($rs);
                echo "<div id='asksection' style='width: 100%; position: fixed; bottom: 0; background-color:#3f51b5; padding: 0px 12% 0px 12%; color:white; font-family: lato'>";
                echo '<script>chatloadAJAX("'.$appid.'")</script>';
                
                   
                    
                    
          if($row[0]!='Accepted' && $row[0]!='Rejected' && $row[0]!='Closed')
                {
                echo "<br/>Post Your Reply<br/> 
                        <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label' style='float: left; width: 76%; padding: 5px; border-radius: 5px;background-color: white'>
                        <textarea id='ques' class='mdl-textfield__input' type='text' name='ques' style='color:black; height: 45px; resize: none;white-space: pre-wrap'></textarea>
                        </div> &nbsp;&nbsp;
                        <button class='mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect' onclick='onlyquestionAjax(\"".$appid."\")' id='askbtn'>
                        <i class='material-icons' style='color:white'>send</i>
                        </button><br><br>
                        ";
              
                }
                 echo "</div>";
            
            
            
            
            
          ?>
          
          
</div>
          
          
          </div>
        </section>
        <section class="mdl-layout__tab-panel" id="fixed-tab-3">
          <div class="page-content" style="padding: 20px 60px 20px 60px;"><!-- Application Details -->
          <?php
            $r2=str_replace(', ',' ',$row1[4]);
            $keywords = explode(",",$row1[4]);
            echo " 
          
            <div class='mdl-card mdl-shadow--2dp allcard card$row1[1] $r2' id='cardid$row1[1]' style='width: 100%'>

  
  
         <div class='mdl-card__supporting-text cardtop topdiv$row1[1]' style='text-align: left; width: inherit; background-color: #ef594e; color: white; padding: 5px'>
     
        
    
    <span class='mdl-chip chiphover' style='background-color: white;' id='appid$row1[1]'>
    <a href='application/$row1[1].pdf' target='_blank'>
    <span class='mdl-chip__text' style='color: #18098a'>View Application</span>
    </a>
    </span>

    <div class='mdl-tooltip' for='appid$row1[1]'>
    click here to view the application
    </div>
    
      <span class='mdl-chip' style='background-color: transparent; float: right'>
    <span class='mdl-chip__text' style='font-size: 15px;'>Application Submitted On: $row1[0]</span>
    </span>
      </div>
      
      <div class='mdl-card__title titleincard'>
        
  
        <h2 class='mdl-card__title-text' style='width: 100%;'>
        <div style='font-family: Lato;font-size: 28px;font-weight: 500;text-align:  left;width: 100%;padding-right: 30%;'>$row1[3]</div><br/><br/>
        
        </h2>

      </div>
      <div class='mdl-card__supporting-text' style='text-align: left; width: inherit; background-color: #ffd155; color: black; padding: 5px'>
        <span class='mdl-chip' style='background-color: transparent;'>
            <span class='mdl-chip__text' >Keywords </span>
        </span>
        
       ";
        for($i=0;$i<sizeof($keywords);$i++)
        {
            
            echo "<span class='mdl-chip' style='color: white; background-color: #00158c;' id='keyword$i$row1[1]'>
            <span class='mdl-chip__text'>$keywords[$i]</span>
            </span> 
    
            ";
            
        }
        echo"
      </div>
      <div class='mdl-card__actions mdl-card--border' style='text-align: left; background-color: #e0feff;'>
      
      <label style='font-size: 20px; font-family: calibri;'>Application Submitted by: <b>$row1[5]"." "."$row1[6]"." "."$row1[7]</b><br />Email ID: <b>$row1[8]</b><br />Mobile Number: <b>$row1[9]</b><br />Date of Birth: <b>$dobformatted</b><br /><br />
      </div>
    </div>";
          
          
          ?>
          
          </div>
        </section>
      </main>
    </div>
  </body>

</html>



