<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
	if(!isset($_SESSION['islogin']) || $_SESSION['usertype']!='applicant' || !isset($_SESSION['username']))
  {
    header ("location: login.php");
  }
  $appid = $_SESSION['username'];
$_SESSION['chatuser']='::Answer by applicant::';
?>
<html><head>
<title>Change or View Application Status</title>
<link href="http://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<link rel="stylesheet" href="style1.css">
<!-- Material Design Lite -->
<script src="http://code.getmdl.io/1.3.0/material.min.js"></script>
<link rel="stylesheet" href="http://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<!-- Material Design icon font -->
<link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
 
<script src='http://www.google.com/recaptcha/api.js'></script>

<script>
function SameCompare()
{
    var p1=document.getElementById("newpass").value;
    var p2=document.getElementById("newpass2").value;
    var divpass=document.getElementById("match");
    if(p1=="" || p2=="")
    {   
        document.getElementById('change_pass').style.display = 'none';   
        divpass.innerHTML="";
                        
    }
    else if(p1.length < 8 && p2.length > 0)
    {
        document.getElementById('change_pass').style.display = 'none';   
        divpass.innerHTML="Minimum Password Length is 8 characters";
    }
    else
    {
        if(p1==p2)
        {
            document.getElementById('change_pass').style.display = 'block';
            divpass.innerHTML="&nbsp;<img src='img/tick_icon.png' style='width: 20px; height: 18px'/>&nbsp;<label style='font-family: Segoe UI; color:green;  font-size: 13px; font-weight: 40;'>Matched</label>";
        } 
        else
        {
            document.getElementById('change_pass').style.display = 'none';                
            divpass.innerHTML="&nbsp;<img src='img/cross_icon.png' style='width: 20px; height: 18px'/>&nbsp;<label style='font-family: Segoe UI; color:red;  font-size: 13px; font-weight: 20;'>Not matched</label>";
        }
    }
}
        
function submitreport(reportserial)    {
    document.cookie = "reportserial="+reportserial;
    window.open ('scheduledreportfillup.php', 'newwindow', config='height=600, width=1200, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');

}
function submitfile(reportserial)    {
    document.cookie = "reportserial="+reportserial;
    window.open ('reportfileupload.php', 'newwindow', config='height=269, width=560, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');

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
function logout()
{
     window.location = 'login.php'
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
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs" style="min-width: 1300px;">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title">Projet Panel for Application Id <label style="color: yellow;">
          <?php
               
            echo $appid;
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
         
        $appid = str_replace("'","''",$appid);
        $que="select unreadmes from app_status where appid='$appid'";
        $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        $row=mysql_fetch_array($rs);
        $unereadstat = $row[0];
          ?>
          
          </label></span><button type='button' class='mdl-button mdl-js-button mdl-button--raised mdl-button--colored' style='background-color: red; color: white;margin-left: 50px;' name='schedule' onclick="logout();">L O G O U T</button>
        </div>
        <!-- Tabs -->
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect noprint">
          <a href="#fixed-tab-1" class="mdl-layout__tab
          <?php if(!isset($_POST['change_pass']))
          echo ' is-active';
          ?>
            ">Project Panel</a>
          <a href="#fixed-tab-2" class="mdl-layout__tab
          <?php if(isset($_POST['change_pass']))
          echo ' is-active';
          ?>
          ">Change Password</a>
          <a href="#fixed-tab-3" class="mdl-layout__tab" onclick="chatloadAJAX('<?php echo $appid?>')"><span id="withoutbadge">Chat History</span></a>

        </div>
      </header>
      <main id='mainbox' class="mdl-layout__content">
       <section class="mdl-layout__tab-panel
       <?php if(!isset($_POST['change_pass']))
          echo ' is-active';
       ?>
       " id="fixed-tab-1">
          <div class="page-content" style="font-size: 20px;">
          <div style="border-radius: 2px 10px 10px 2px;margin: 2% 1% 2% 2%; float: left; width: 45%;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12); padding: 1%;">
          <br /><label style="padding: 5px; color: white; background-color: #681fde;">Progress Reports</label><br /><br /><br />
<?php

        
$que="select * from progressReportsBasic where reportSerial like '$appid"."_scheduled_report%' order by duedate desc";
$rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
$row=mysql_fetch_array($rs);
if($row[4]=='true' && $row[5]=='false')
{
    echo "<label style='padding: 5px 5px 6px 5px; font-size:22px; color: white; background-color: black;'>Next Progess Report Due Date</label><label style='padding: 5px;border: 2px solid black;'>$row[2]</label><br/><br/>";

    $duedate = $row[2];
    $today = date("Y-m-d");
    $windowopen = date('Y-m-d', strtotime($duedate. ' - 7 days'));
    if($today<$windowopen)
        echo "<label style='font-size: 14px;'>Submission Window will open 7 days before the due date</label><br /><br /><br />";
}

$countpendingsubmission = 0;
for($i=0; $i<mysql_num_rows($rs); $i++)
{
    $duedate = $row[2];
    $today = date("Y-m-d");
    $windowopen = date('Y-m-d', strtotime($duedate. ' - 7 days'));
    
    if($row[4]=='true')
    {
        $countpendingsubmission = $countpendingsubmission+1;
        if($countpendingsubmission == 1)
        {
            echo '<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width: 100%;white-space: normal; word-wrap: break-word;">
          
          <thead>
            <tr>
              <th class="mdl-data-table__cell--non-numeric" style="width: 150px">Report Name</th>
              <th class="mdl-data-table__cell--non-numeric" style="width: 108px">Due Date</th>
              <th class="mdl-data-table__cell--non-numeric">Submission</th>
          
            </tr>
          </thead>
          <tbody>';
        }
    echo "<tr><td class='mdl-data-table__cell--non-numeric'>$row[3]</td><td class='mdl-data-table__cell--non-numeric'>$row[2]</td><td class='mdl-data-table__cell--non-numeric'>";
        if($row[5]=='true')
        {
            echo '<label style="color: red;padding: 5px;background-color: #eaeaea;">Resubmission Required</label><br/><br/>';
        }
    if($today>=$windowopen)
        echo "<button type='button' class='mdl-button mdl-js-button mdl-button--raised mdl-button--colored' style='width: 100%;' name='schedule' onclick='submitreport(\"$row[1]\");'>Submit Report</button></td></tr>";
    else
        echo "Submission window not opened";
   
    }
    
    $row=mysql_fetch_array($rs);
}    
if($countpendingsubmission>0)
{
    echo '</tbody></table>';
}

if($countpendingsubmission == 0)
{
    echo "<label style='padding: 5px 5px 6px 5px; font-size:22px; color: white; background-color: black;'>No Pending Submission</label>";
}
?>
            
            
            
            
            
            </div>
            <div style="border-radius: 10px 2px 2px 10px;margin: 2% 2% 2% 1%; float: left; width: 45%;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12); padding: 1%;">
            <br /><label style="padding: 5px; color: white; background-color: #681fde;">Other Reports / Documents</label><br /><br />
            <label style='font-size: 14px;'>Only reports in pdf format is supported in this section</label>
            <br /><br /><br />
<?php  
$que="select * from progressReportsBasic where reportSerial like '$appid"."_special_report%' order by duedate desc";
$rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());


$countpendingsubmission = 0;
for($i=0; $i<mysql_num_rows($rs); $i++)
{
    $row=mysql_fetch_array($rs);
    if($row[4]=='true')
    {
        $countpendingsubmission = $countpendingsubmission+1;
        if($countpendingsubmission == 1)
        {
            echo '<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width: 100%;white-space: normal; word-wrap: break-word;">
          
          <thead>
            <tr>
              <th class="mdl-data-table__cell--non-numeric" style="width: 150px">Report Name</th>
              <th class="mdl-data-table__cell--non-numeric" style="width: 108px">Due Date</th>
              <th class="mdl-data-table__cell--non-numeric">Submission</th>
          
            </tr>
          </thead>
          <tbody>';
        }
    echo "<tr><td class='mdl-data-table__cell--non-numeric'>$row[3]</td><td class='mdl-data-table__cell--non-numeric'>$row[2]</td><td class='mdl-data-table__cell--non-numeric'> ";
        if($row[5]=='true')
        {
            echo '<label style="color: red;padding: 5px;background-color: #eaeaea;">Resubmission Required</label><br/><br/>';
        }
    echo "<button type='button' class='mdl-button mdl-js-button mdl-button--raised mdl-button--colored' style='width: 100%;' name='schedule' onclick='submitfile(\"$row[1]\");'>Submit Report</button></td></tr>";
    }
}    
if($countpendingsubmission>0)
{
    echo '</tbody></table>';
}

if($countpendingsubmission == 0)
{
    echo "<label style='padding: 5px 5px 6px 5px; font-size:22px; color: white; background-color: black;'>No Pending Submission</label>";
}

?>            
            
            
            </div>
        </section>
        <section class="mdl-layout__tab-panel
        <?php if(isset($_POST['change_pass']))
          echo ' is-active';
       ?>
        " id="fixed-tab-2">
          <div class="page-content">
                  <div class="page-content" style="padding: 2% 5%;">
  
  
  



<?php
$flag=0;
$error = '';
if(isset($_POST['change_pass']))
{
    
    require_once("dbcon.php");
            
    $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
    @mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases

   
            if(isset($_POST['pass']) && isset($_POST['newpass']) && isset($_POST['newpass2']) )
            {
                if($_POST['newpaass2'] == $_POST['newpaass'])
                {
                    require_once("dbcon.php");
            
                  $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
                  @mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases
                  
                  $pass=$_POST['newpass'];
                  $oldpass=$_POST['pass'];
                  $match=0;
                  $username = $_SESSION['username'];
                  $que="select pass from user where username ='$username'";
                  $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
                  $row = mysql_fetch_array($rs);
                  if($row[0] == md5(md5($oldpass)))
                  {
                    $newpass=md5(md5($pass));
                    $que="UPDATE user SET pass='$newpass' where username = '$username'";
                    @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
                    $flag = 1;
                  }
                  else
                  {
                    $error = 'Wrong Old Password!';
                  }
                }
                else
                {
                    $error = 'New password in both the fields not matched';
                }
                                
          }
          else
          {
          $error = 'All fiels are mandatory!';

          }
        



if($flag==1){
    $resulthtml=<<<aa
  <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%; margin: 20px;background-color: #fffa8f;" id="printableArea">


      <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #ffd155; color: black; font-size: 20px; ">
        <!--   Page Sub Heading   -->
        Done!
        </div>
        <div class="mdl-card__actions mdl-card--border" style="text-align: center;">
        <!--   Page Sub Heading   -->
        <br/>
            <i style='font-size: 64px; color: green;' class='material-icons'>done</i><br/>
            <label style='color: black; font-family: Lato; font-size: 26px'>Password Successfully Updated</label>
  </div>
      
        
        
aa;
echo $resulthtml;


}

}
if(!isset($_POST['change_pass']) || $error!=''){
$htmlcode=<<<aa

  <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%">

      <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #ffd155; color: black; font-size: 20px">
        <!--   Page Sub Heading   -->
        Change Password
      </div>
      <div class="mdl-card__actions mdl-card--border" style="text-align: center;">
                        
        <!--   YOUR MAIN CONTENT  -->
          
         <form method="post" action="" enctype="multipart/form-data">
            
            <center>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="password" id="pass" name="pass" required>
                <label class="mdl-textfield__label" for="appid" style="font-size: 15px;">Old Password</label>
            </div> <br/>
     
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="password" name="newpass" id="newpass" oninput="SameCompare()" required>
                <label class="mdl-textfield__label" for="newpass" style="font-size: 15px;">New Password</label>
            </div> <br/>
            
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="password" name="newpass2" id="newpass2" oninput="SameCompare()" required>
                <label class="mdl-textfield__label" for="newpass2" style="font-size: 15px;">Retype New Password</label>
            </div> <br/>
            <div id="match" style="height: 30px;width: 400px;"></div>
            
            <center>

aa;
}
echo $htmlcode;
if($error!='')
{
    echo "<label style='margin: 10px 0px 10px 0px; color: red;'>$error</label>";
}
$htmlcode=<<<aa
</center>
            
 <br><br>

<button type="submit" name="change_pass" id="change_pass" style="display: none;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  Change Password
</button>



</center>
</form>        
    
</div>


aa;
echo $htmlcode;
?>

<?php

?>

</div>
           
          </div>
        </section>
        <section class="mdl-layout__tab-panel" id="fixed-tab-3">
          <div id="content" class="page-content"><!-- CHAT -->
          <div id="chatbox" style="width: 76%; padding: 70px 12% 100px 12%;"></div>
          
           <div id="loader" style="width: 100%; padding: 70px 0% 0px 0%;"><center><div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active" style="height: 400px; width: 400px;;"></div></center></div>

        <div id="chatlower">

<?php
echo "<div id='asksection' style='width: 100%; position: fixed; bottom: 0; background-color:#3f51b5; padding: 0px 12% 0px 12%; color:white; font-family: lato'>";

          //echo '<script>chatloadAJAX("'.$appid.'")</script>';
    
               
                echo "<br/>Post Your Reply<br/> 
                        <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label' style='float: left; width: 76%; padding: 5px; border-radius: 5px;background-color: white'>
                        <textarea id='ques' class='mdl-textfield__input' type='text' name='ques' style='color:black; height: 45px; resize: none;white-space: pre-wrap'></textarea>
                        </div> &nbsp;&nbsp;
                        <button class='mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect' onclick='onlyquestionAjax(\"".$appid."\")' id='askbtn'>
                        <i class='material-icons' style='color:white'>send</i>
                        </button><br><br>
                        </div>";

?>
</div>
          </div>
        </section>
        
      </main>
    </div>
  </body>

</html>



