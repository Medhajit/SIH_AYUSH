<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
	if(!isset($_SESSION['islogin']) || $_SESSION['usertype']=='applicant')
  {
    header ("location: login.php");
  }
 $_SESSION['chatuser']=$_SESSION['username'];     
require_once("dbcon.php");
    
$link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
@mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases




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
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

<script>




function resubmission(reportserial)
{
 
    var areq=new XMLHttpRequest();

    var comment= document.getElementById('resubcmt'+reportserial).value;
    areq.onreadystatechange=function()
    {
        if(areq.readyState==4)
        {
            if(areq.responseText=='ok')
                location.reload();
            else
                alert('Something Went Wrong');
        }
        
        
    };
    areq.open("get","resubmissionAJAX.php?cmt="+comment+"&reportserial="+reportserial,true);
    areq.send(null);
    
}
function showapplication(appid)
{
    document.cookie = "appid="+appid;
    window.open('viewform.php', '_blank');
}
function viewreport(link)
{
    var res = link.substring(0, 23);
    if(res=='viewscheduledreport.php')
    {
        window.open (link, 'newwindow', config='height=600, width=1200, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');

    }
    else
    {
        window.open(link, '_blank');
    }
}
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
    areq.open("get","onlyquesAJAX.php?appid="+appid+"&ques="+ques+"&acceptedapplication=true",true);
    areq.send(null);
    }
    
}
/*function notlog()
{
     window.location = 'login.php'
}*/
function nodirect() {
    alert("We are unable to show this page as all expected parameters not found. We are redirecting you to Ongoing Projects page. Please click on 'Project Panel' option given to each application number to view the project panel.");
     window.location = 'OngoingProjects.php'
    }
function notaccepted() {
    alert("Project Panel is available only for Ongoing/Closed(completed) projects. We are redirecting you to Ongoing Projects page. Please click on 'Project Panel' option given to each application number to view the project panel.");
     window.location = 'OngoingProjects.php'
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
<?php 


?>

<body>
    <!-- Simple header with fixed tabs. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs" style="min-width: 1300px;">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title">Projet Panel for Application Id <label style="color: yellow;">
          <?php
          $statusofproject;
            $appid='';
            if(isset($_GET['appid']))
            {
            $appid=$_GET['appid'];
            echo $appid;
            $que="select status from app_status where appid='$appid'";
            $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            $row=mysql_fetch_array($rs);
            if($row[0]!='Accepted' && $row[0]!='Closed')
            {
                echo "<script>notaccepted();</script>";
            }
            else
             $statusofproject= $row[0];
            }
            else
            echo "<script>nodirect();</script>";
               
          
          $j=0;
        
        $appid = str_replace("'","''",$appid);
        $que="select app_details.date_of_submission, app_details.appid, app_status.status, app_details.app_title, app_details.keyword, app_details.fname, app_details.mname, app_details.lname, app_details.email, app_details.mob_1, app_details.dob from app_status, app_details where app_details.appid=app_status.appid and app_details.appid='$appid'";
        $rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        $row1=mysql_fetch_array($rs1);
        $date=date_create($row1[10]);
        $dobformatted=date_format($date,"d-m-Y");
         
        $appid = str_replace("'","''",$appid);
        $que="select unreadmes from app_status where appid='$appid'";
        $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        $row=mysql_fetch_array($rs);
        $unereadstat = $row[0];
        $que="select unreadmes from app_status where appid='$appid'";
        $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        $row=mysql_fetch_array($rs);
        $unereadstat = $row[0];
        
          ?>
          
          </label><button type="button" style="margin-left: 20px;background-color: white;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="showapplication('<?php echo $appid ?>');">View Application</button></span>
          <?
          if($statusofproject=='Closed')
          {
            echo "<label style='margin-left: 25px; padding: 8px 15px 8px 15px; background-color: red; color: white'>$statusofproject</label>";
          }
          
          ?>
        </div>
        <!-- Tabs -->
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect noprint">
          <a href="#fixed-tab-1" class="mdl-layout__tab is-active">Project Panel</a>
          <a href="#fixed-tab-2" class="mdl-layout__tab">Audit Trail</a>
          <a href="#fixed-tab-3" class="mdl-layout__tab" onclick="chathistoryshow('<?php echo $appid?>',0)"><span class="mdl-badge" data-badge="<?php echo $row[0]?>" id="withbadge" style="display: none;">Chat History</span><span id="withoutbadge">Chat History</span></a>
        <?php
        
        if($row[0]>0)
        {
            echo "<script>chathistoryshow('$appid',1);</script>";
        }

        ?>
        </div>
      </header>
      <main class="mdl-layout__content" id='mainbox'>
       <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">

          <div class="page-content" style="font-size: 20px;">
          <br />
            
<?php
$leftdiv1=<<<aa

<div style="float: left; width: 20%;">
            <div style="width: 80%;padding: 0 5% 2px 10%;background-color: whitesmoke;border-radius: 0px 20px 20px 0px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);">
            <br /><label style="padding: 5px; color: white; background-color: #681fde;">Request Document</label>
            <br /><br />
            <form  method="post">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="name" name="name" required>
                    <label class="mdl-textfield__label" for="name" style="font-size: 15px;">Name of the Report</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label has-placeholder">
                    <input class="mdl-textfield__input" type="date" name="duedate" id="duedate" required placeholder="">
                    <label class="mdl-textfield__label" for="duedate" style="font-size: 15px;">Please provide due date</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label has-placeholder">
                    <textarea class="mdl-textfield__input" type="text" rows= "3" id="instructions" name="instructions" style="resize: none; outline: none;"></textarea> 
                    <label class="mdl-textfield__label" for="instructions" style="font-size: 15px;">Instructions (Optional)</label>
                </div>
                
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="width: 100%;" name="askreport" onclick="">REQUEST REPORT</button>

            </form>

aa;
if($statusofproject=='Accepted')
    echo $leftdiv1;
//#fffbdb #eff6ff
if(isset($_POST['askreport']) && $statusofproject=='Accepted')
{
    if(!empty($_POST['name']) && !empty($_POST['duedate']))
    {
        $messageIdent = md5($_POST['name'] . $_POST['duedate']);
        $sessionMessageIdent = isset($_SESSION['messageIdent'])?$_SESSION['messageIdent']:'';
        if($messageIdent!=$sessionMessageIdent){
            $reportname = $_POST['name'];
            $duedate = $_POST['duedate'];
            $instructions = $_POST['instructions'];
            $instructions = preg_replace('~[\r\n]+~',PHP_EOL, $instructions);
            
            $reportname = str_replace("'","''",$reportname);
            $duedate = str_replace("'","''",$duedate);
            
            $que="select * from progressReportsBasic where reportSerial like '$appid"."_special_report%'";
            $rs = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            $num = mysql_num_rows($rs) + 1;
            
            $que="insert into progressReportsBasic values('$appid','$appid"."_special_report_".$num."','$duedate','$reportname','true','false','')";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
         
            $que="select email from app_details where appid='$appid'";
            $rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            
            $row1=mysql_fetch_array($rs1);
            
            
            $subject="Report Submission Requested";
            $message="Dear User, ".PHP_EOL."".PHP_EOL."A report submission request has generated for the report titled '$reportname'.".PHP_EOL."".PHP_EOL."Instructions: ".PHP_EOL.$instructions.PHP_EOL."".PHP_EOL."Please login to your project panel to submit the report. Please note, your report should be in a pdf format.".PHP_EOL."".PHP_EOL."Go to http://ayushgrant.in/sih/login.php to login.";
    
              $headers ='From: 	AYUSH <contact@ayushgrant.in>' . "\r\n" .
              'Reply-To: contact@ayushgrant.in' . "\r\n" .
              'X-Mailer: PHP/' . phpversion();
              mail($row1[0], $subject, $message, $headers);
                
            $_SESSION['messageIdent'] = $messageIdent;
        }         
        
    }
    else
        echo "<label style='color:red; font-size: 14px'>Missing Report Name or Due Date</label>";
    
}
if($statusofproject=='Accepted')
{
    echo '</div>
    <div style="width: 75%;padding: 0px 10% 2px 10%;font-family: Lato;text-align: center;">
            <br><label style="font-size: 20px;margin-bottom: 25px;">Report Frequency</label><br><br><br>
            <label style="font-size: 42px;padding: 5px 40px;background-color: black;color: white;">';

            
            $que="select reportFrequency from app_details where appid='$appid'";
            $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $row=mysql_fetch_array($rs);
            echo $row[0];
            
            
            echo '            </label><br><br>
            <label style="font-size: 26px;">days</label><br>
            </div>
            </div>';
            
            }
            ?>

            <div style="float: left; width: 
            
            <?php
            if($statusofproject=='Accepted')
                echo '75%';
            else
                echo '95%';
            
            ?>
            
            
            
            
            ; padding: 0 2.5% 0 2%; overflow-y: scroll; height: calc(100vh - 132px);">
            <form  method="post">
           <br /><label style="padding: 5px; color: white; background-color: #681fde;">Uploaded Report / Document History</label>
            <br /><br />
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width: 100%;white-space: normal; word-wrap: break-word;">
      
      <thead>
        <tr>
          <th style="min-width: 200px;" class="mdl-data-table__cell--non-numeric">Report Name</th>
          <th style="min-width: 108px;" class="mdl-data-table__cell--non-numeric">Due Date</th>
          <th style="min-width: 181px;" class="mdl-data-table__cell--non-numeric">Submission</th>
          <th style="min-width: 161px;" class="mdl-data-table__cell--non-numeric">Date of Submission</th>
          <th class="mdl-data-table__cell--non-numeric">Resubmission</th>
        </tr>
      </thead>
      <tbody>
<?php

$que="select * from progressReportsBasic where appid='$appid' order by dueDate asc";
$rs=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());

$j=0;   
while($row=mysql_fetch_array($rs))
{
        $j=$j+1;
        $que="select * from progressReportsDetails where reportSerial='$row[1]' order by submissionNumber asc";
        $rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
        $row1=mysql_fetch_array($rs1);
        $noofsubmission = mysql_num_rows($rs1);
        if($noofsubmission == 0)
            $noofsubmission = 1;
        
    if($j%2 == 0)
        echo "<tr style='background-color: #fffbdb;'>";
    else
        echo "<tr style='background-color: #eff6ff;'>";    
    
    echo "
          <td rowspan='$noofsubmission' class='mdl-data-table__cell--non-numeric'>$row[3]</td>
          <td rowspan='$noofsubmission' class='mdl-data-table__cell--non-numeric'>$row[2]</td>";
    if(mysql_num_rows($rs1) == 0)
    {
       echo "<td colspan='2' style='text-align: center;'>No Submission</td>";
       if($statusofproject=='Accepted')
       echo "<td class='mdl-data-table__cell--non-numeric'>You can ask for resubmission after initial submission</td></tr>";
       else
       echo "<td class='mdl-data-table__cell--non-numeric'>Project is Closed. Resubmission Not available</td></tr>";
       
    }
    else
    {
        for($i=0; $i<mysql_num_rows($rs1); $i++)
        {
        
        echo "<td class='mdl-data-table__cell--non-numeric'><a style='cursor:pointer' onclick='viewreport(\"$row1[3]\")'>View Uploaded Report</a></td><td class='mdl-data-table__cell--non-numeric'>$row1[2]</td>";
        if($row1[4] == '')
        {
            $row1[4] = '';
        }
        else
        {
           $row1[4] =  "<br><br>Comment: <label style='color: red'>$row1[4]</label>";
        }
        if($i == (mysql_num_rows($rs1)-1))
        {
            
            if($row[4]=='false' && $row[5]=='false')
            {
                if($statusofproject=='Accepted')
                {
                    echo "<td class='mdl-data-table__cell--non-numeric'>
                
                    <input type='text' placeholder='Comment for Resubmission' id='resubcmt$row[1]' style='margin-bottom:  6px;height: 25px;width: 190px;border-radius: 6px;padding-left: 10px; outline: none' required>
                    
                    <br/>
                    
                    <button type='button' class='mdl-button mdl-js-button mdl-button--raised mdl-button--colored' name='resubmission$row[1]' onclick='resubmission(\"$row[1]\")'>REQUEST RESUBMISSION</button></td></tr>";
                
                }
                else
                {
                    echo "<td class='mdl-data-table__cell--non-numeric'>Project is Closed. Resubmission Not available.</td></tr>";
                }
            }
            else
            {
                echo "<td class='mdl-data-table__cell--non-numeric'>Resubmission Requested $row1[4]</td></tr>";
            }
        }
        else
        {
            echo "<td class='mdl-data-table__cell--non-numeric'>Resubmission Requested $row1[4]</td></tr>";
            if($j%2 == 0)
                echo "<tr style='background-color: #fffbdb;'>";
            else
                echo "<tr style='background-color: #eff6ff;'>";    
        }
        $row1=mysql_fetch_array($rs1);
        }
    }
    
          
}


?>
      </tbody>
</table>
<br /><br /></form>
            </div>
    
        </section>
        <section class="mdl-layout__tab-panel" id="fixed-tab-2">
          <div class="page-content"><center><br />
           <?php

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
        <section class="mdl-layout__tab-panel" id="fixed-tab-3">
          <div id="content_chat" class="page-content"><!-- CHAT -->
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

                
                echo "<div id='asksection' style='width: 100%; position: fixed; bottom: 0; background-color:#3f51b5; padding: 0px 12% 0px 12%; color:white; font-family: lato'>";
                echo '<script>chatloadAJAX("'.$appid.'")</script>';
                
                   
                    
                    
          if($statusofproject!='Closed')
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
        
      </main>
    </div>
  </body>

</html>



