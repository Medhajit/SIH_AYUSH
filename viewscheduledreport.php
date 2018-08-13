<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
	if(!isset($_SESSION['islogin']) || $_SESSION['usertype']=='applicant')
  {
    header ("location: login.php");
  }

?>
<html>
<head>
<!-- Material Design Lite -->
<script src="http://code.getmdl.io/1.3.0/material.min.js"></script>
<link rel="stylesheet" href="http://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<!-- Material Design icon font -->
<link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
<style>
.content{
    font-size: 15px;
    color: black;
}
.header{
    font-size: 18px;
    color: blue;
}
</style>
<script>
function resubmit(reportserial)
{
 
    var areq=new XMLHttpRequest();

    var comment= document.getElementById('resubcmt').value;
    areq.onreadystatechange=function()
    {
        if(areq.readyState==4)
        {
            if(areq.responseText=='ok')
            {
                alert('Your Resubmission Request Has Submitted');
                location.reload();
            }
            else if(areq.responseText=='notok1')
            {
                alert('Resubmission already requested');
                location.reload();
            }
            else if(areq.responseText=='notok2')
            {
                alert('Problem in user validation and/or required parameters not found. The window will be closed now.');
                close();
            }
            else
            {
                alert('Something Went Wrong!');
                location.reload();
            }
        }
        
        
    };
    areq.open("get","resubmissionAJAX.php?cmt="+comment+"&reportserial="+reportserial,true);
    areq.send(null);
    
}
function refreshParent() 
{
    window.opener.location.reload(true);
}
function nodirect()
{
    alert('Unable to find required parameters. The window will be closed now.');
    close();
}
</script>
</head>
<body onunload="javascript:refreshParent()" style="font-family: Lato; padding: 10px;">
<?php
$reportserial;
if(!isset($_GET['reportserial']) || !isset($_GET['attempt']))
{
    echo 'Unable to find required parameters. Close the window<script>nodirect();</script>';
}
else
{
    $reportserial=$_GET['reportserial'];
    $attempt=$_GET['attempt'];
}


require_once("dbcon.php");
$link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
@mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases


$que="select * from schedule_reports where reportSerial='$reportserial' and submissionNumber='$attempt'";
$rs = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
$row=mysql_fetch_array($rs);

    $otherScientific=$row[2];
    $nonScientific=$row[3];
    $datestart=$row[4];
    $duration=$row[5];
    $objectives=$row[6];
    $methodology=$row[7];
    $intmodification=$row[8];
    $summary=$row[9];
    $milestone=$row[10];
    $appliedvalue=$row[11];
    $researchwork=$row[12];
    $additional=$row[13];
    
            
$form=<<<aa

<label style='padding: 5px; background-color: red; color: white'>$error</label>
<br/><br/><br/> 
<label class="header">Other Scientific Staff Engaged in The Study</label><br />
<label class="content">$otherScientific</label><br />

<br /><br />

<label class="header">Non-Scientific Staff engaged in the study</label><br />
<label class="content">$nonScientific</label><br />

<br /><br />

<label class="header">Date of start</label><br />
<label class="content">$datestart</label><br />

<br /><br />

<label class="header">Duration in days</label><br />
<label class="content">$duration</label><br />

<br /><br />

<label class="header">Objectives of the proposal</label><br />
<label class="content">$objectives</label><br />

<br /><br />

<label class="header">Methodology followed till end of period of reporting</label><br />
<label class="content">$methodology</label><br />

<br /><br />

<label class="header">Interim modification of objectives/methodology</label><br />
<label class="content">$intmodification</label><br />

<br /><br />

<label class="header">Summary on progress</label><br />
<label class="content">$summary</label><br />

<br /><br />

<label class="header">Milestones with deliverables achieved during the reporting period
as proposed in the scheme</label><br />
<label class="content">$milestone</label><br />

<br /><br />

<label class="header">Applied value of the project</label><br />
<label class="content">$appliedvalue</label><br />

<br /><br />
<label class="header">Research work which remains to be done under the project</label><br />
<label class="content">$researchwork</label><br />

<br /><br />

<label class="header">If additional budget or staff is required for the remaining part of
the research work</label><br />
<label class="content">$additional</label><br />

<br /><br />
aa;
echo $form;
$que="select submissionPending, resubmissionRequired from progressReportsBasic where reportSerial='$reportserial'";
$rs = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
$row=mysql_fetch_array($rs);
$que="select submissionNumber from schedule_reports where reportSerial='$reportserial' order by submissionNumber desc";
$rs1 = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());


    $maxattempt = 0;
    if(mysql_num_rows($rs1)>0)
    {
        $row1=mysql_fetch_array($rs1);
        $maxattempt = $row1[0];
    }


    if($row[0]=='false' && $row[1]=='false' && $maxattempt==$attempt)
    {
        echo "<form method='post'>
        <input type='text' placeholder='Comment for Resubmission' id='resubcmt' style='margin-bottom:  6px;height: 25px;width: 190px;border-radius: 6px;padding-left: 10px; outline: none'>
        <br/><button type='button' class='mdl-button mdl-js-button mdl-button--raised mdl-button--colored' name='resubmission' onclick='resubmit(\"$reportserial\");'>REQUEST RESUBMISSION</button></form>";
    }
                     
?>


</body>
</html>