
<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
	if(!isset($_SESSION['islogin']) || $_SESSION['usertype']!='applicant')
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
<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<style>
.textarealong{
    resize: none;
    width: 1080px;
    height: 50px;
    border-radius: 5px;
    outline: none;
}
.header{
    font-size: 18px;
    color: blue;
}
</style>
<script>
function refreshParent() 
{
    window.opener.location.reload(true);
}
function submitsucess()
{
    alert('Your Report Has Submitted. The window will be closed now.');
    close();
}
function nodirect()
{
    alert('Unable to validate the user. The window will be closed now.');
    close();
}
</script>
</head>
<body onunload="javascript:refreshParent()" style="font-family: Lato; padding: 10px;">
<?php
$reportserial;
if(!isset($_COOKIE['reportserial']))
{
    echo 'User Not Validated. Close the window<script>nodirect();</script>';
}
else
{
    $reportserial=$_COOKIE['reportserial'];
}
function randomPassword() {
    $alphabet = 'abcdefghijklmnpqrst@uvwxyz-ABCDEFGHIJKLMNPQRSTUVWXYZ123456789&#';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}


require_once("dbcon.php");
$link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
@mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases
$error = '';
if(isset($_POST['sbt']))
{
    $que="select submissionNumber from schedule_reports where reportSerial='$reportserial' order by submissionNumber desc";
    $rs = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
    $attempt = 1;
    if(mysql_num_rows($rs)>0)
    {
        $row = mysql_fetch_array($rs);
        $attempt = $row[0] + 1;
    }
    //echo $attempt;
    if(!empty($_POST['otherScientific']) && !empty($_POST['nonScientific']) && !empty($_POST['datestart']) && !empty($_POST['duration']) && !empty($_POST['objectives']) && !empty($_POST['methodology']) && !empty($_POST['intmodification']) && !empty($_POST['summary']) && !empty($_POST['milestone']) && !empty($_POST['appliedvalue']) && !empty($_POST['researchwork']) && !empty($_POST['additional']))
    {
    
    $otherScientific=$_POST['otherScientific'];
    $nonScientific=$_POST['nonScientific'];
    $datestart=$_POST['datestart'];
    $duration=$_POST['duration'];
    $objectives=$_POST['objectives'];
    $methodology=$_POST['methodology'];
    $intmodification=$_POST['intmodification'];
    $summary=$_POST['summary'];
    $milestone=$_POST['milestone'];
    $appliedvalue=$_POST['appliedvalue'];
    $researchwork=$_POST['researchwork'];
    $additional=$_POST['additional'];
      
    $otherScientific = str_replace("'","''",$otherScientific);  
    $nonScientific= str_replace("'","''",$nonScientific);  
    $datestart = str_replace("'","''",$datestart);  
    $duration = str_replace("'","''",$duration);  
    $objectives = str_replace("'","''",$objectives);  
    $methodolgy = str_replace("'","''",$methodology);  
    $intmodification= str_replace("'","''",$intmodification);  
    $summary = str_replace("'","''",$summary);  
    $milestone = str_replace("'","''",$milestone);  
    $appliedvalue = str_replace("'","''",$appliedvalue);  
    $researchwork = str_replace("'","''",$researchwork);  
    $additional = str_replace("'","''",$additional);  
    
    
    $que="select submissionPending, report_hash, dueDate from progressReportsBasic where reportSerial='$reportserial'";
    $rs = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
    $row=mysql_fetch_array($rs);
    $duedate = $row[2];
    $today = date("Y-m-d");
    $windowopen = date('Y-m-d', strtotime($duedate. ' - 3 days'));
    
    if($row[0]=='true' && $row[1]==$_POST['validator'] && $today>=$windowopen)
    {
        $today = date("Y-m-d");
        $que="insert into progressReportsDetails values('$reportserial',$attempt,'$today','viewscheduledreport.php?reportserial=$reportserial&attempt=$attempt','')";
        @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        $que="UPDATE progressReportsBasic set submissionPending='false',report_hash='',resubmissionRequired='false' where reportSerial='$reportserial'";
        @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        $que="insert into schedule_reports values('$reportserial',$attempt,'$otherScientific','$nonScientific','$datestart',$duration,'$objectives','$methodology','$intmodification','$summary','$milestone','$appliedvalue','$researchwork','$additional')";
        @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        echo 'Form Submitted. Please close the window<script>submitsucess();</script>';
    }
    else
        $error='Unable to submit form. Don\'t open multiple form submission window. You can submit the form from 3 days before the due date.';
   }
   else
    $error='Unable to submit form. All fields are mandatory.';
    
    
}
if((!isset($_POST['sbt']) || $error!='') && isset($_COOKIE['reportserial']))
{
$newpass_notencrpt=randomPassword();
$newpass=md5(md5($newpass_notencrpt));
$que="UPDATE progressReportsBasic set report_hash='$newpass' where reportSerial='$reportserial'";
@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
$form=<<<aa
<label style='padding: 5px; background-color: red; color: white'>$error</label>
<br/><br/><br/><form method="post">

<label class="header">Other Scientific Staff Engaged in The Study</label><br />
<textarea class="textarealong" name="otherScientific" required ></textarea>

<br /><br />
<label class="header">Non-Scientific Staff engaged in the study</label><br />
<textarea class="textarealong" name="nonScientific" required ></textarea>

<br /><br />
<label class="header">Date of start</label><br />
<input type="date" name="datestart" required >

<br /><br />

<label class="header">Duration in days</label><br />
<input type="number" name="duration" required >

<br /><br />
<label class="header">Objectives of the proposal</label><br />
<textarea class="textarealong" name="objectives" required ></textarea>

<br /><br />
<label class="header">Methodology followed till end of period of reporting</label><br />
<textarea class="textarealong" name="methodology" required ></textarea>

<br /><br />
<label class="header">Interim modification of objectives/methodology, if any (with
justifications). In case of no modification, write N/A</label><br />
<textarea class="textarealong" name="intmodification"required ></textarea>

<br /><br />
<label class="header">Summary on progress (during the period of report)</label><br />
<textarea class="textarealong" name="summary" required ></textarea>

<br /><br />
<label class="header">Milestones with deliverables achieved during the reporting period
as proposed in the scheme</label><br />
<textarea class="textarealong" name="milestone" required ></textarea>

<br /><br />
<label class="header">Applied value of the project</label><br />
<textarea class="textarealong" name="appliedvalue" required ></textarea>

<br /><br />
<label class="header">Research work which remains to be done under the project</label><br />
<textarea class="textarealong" name="researchwork" required ></textarea>

<br /><br />
<label class="header">If additional budget or staff is required for the remaining part of
the research work, please give justifications and details. In case of no new requirement, write N/A</label><br />
<textarea class="textarealong" name="additional" required ></textarea>

<br /><br />
<button  class='mdl-button mdl-js-button mdl-button--raised mdl-button--colored' type="submit" name="sbt"/> Submit Report</button>
<input type="text" name="validator" style="display: none;" value="$newpass"/>
</form>


aa;
echo $form;
}                        
?>


</body>
</html>