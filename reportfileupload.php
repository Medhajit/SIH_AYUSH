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
<script>

function alertFilename(labelname) {
    var filediv=document.getElementById('filename');
    var filename = document.getElementById(labelname).value;
    var name = filename.split("\\")
    var ext = filename.match(/\.([^\.]+)$/)[1];
    switch(ext)
    {
        case 'pdf':
            if(filename != "") {
            filediv.innerHTML = "<label style='font-family: Lato; color: gray;'>Selected file : </label><label style='font-family: Lato; color: black;'>"+name[name.length - 1]+"</label>";
            document.getElementById('upload').style.display = 'block';
            }
            else
            {
            document.getElementById('upload').style.display = 'none';    
            filediv.innerHTML = "";
            }
            break;
        default:
            filediv.innerHTML='<label style="color: red;">Please select pdf document</label>';
            document.getElementById(labelname).value = '';
            document.getElementById('upload').style.display = 'none';
    }
}
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
<style>
.fieldheader{
    color: #07006d;
    font-size: 20px;
}
</style>
</head>
<body onunload="javascript:refreshParent()" style="text-align: center;">
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

function fileuploader($uploadbtnname,$maxsize,$newfilename) {
    //echo $_FILES[$uploadbtnname]['name'];
    $errortype="0";
    if (!empty($_FILES[$uploadbtnname]['name']) && !file_exists("uploaded_reports/" . $newfilename)) {
        
        if ($_FILES[$uploadbtnname]["size"] > $maxsize)
        {
            $errortype="File is too large. Maximum permitted file size ".$maxsize." bytes.";
        }
        $filename = basename($_FILES[$uploadbtnname]["name"]);
        $FileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
        //echo strtolower(pathinfo($filename,PATHINFO_EXTENSION));
        if ($FileType != 'pdf')
        {
            $errortype="Please upload a file with pdf extention.";
        }
        if($errortype=="0")
        {
        $file_tmp = $_FILES[$uploadbtnname]['tmp_name'];
        move_uploaded_file($file_tmp,"uploaded_reports/" . $newfilename);
        return "ok";
        }
        
        else
        {
            return $errortype;
            //echo "$errortype";
        }
    }
    /*
    //this part is for file overwritting
    else if (!empty($_FILES[$uploadbtnname]['name']) && file_exists("temp_application_documents/" . $newfilename)) {
        $errortype="0";
        if ($_FILES[$uploadbtnname]["size"] > $maxsize)
        {
            $errortype="File is too large. Maximum permitted file size ".$maxsize." bytes.";
        }
        $filename = basename($_FILES[$uploadbtnname]["name"]);
        $FileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
        //echo strtolower(pathinfo($filename,PATHINFO_EXTENSION));
        if ($FileType != 'pdf')
        {
            $errortype="Please upload a file with pdf extention.";
        }
        if($errortype=="0")
        {
        if(file_exists("temp_application_documents/" . $newfilename)) 
            unlink("temp_application_documents/" . $newfilename);
        $file_tmp = $_FILES[$uploadbtnname]['tmp_name'];
        move_uploaded_file($file_tmp,"temp_application_documents/" . $newfilename);
        return "ok";
        }
        
        else
        {
            echo "<script>uploatalertbox();</script>";
            //echo "$errortype";
        }
    }
    */
    else
        return 'Either no file selected or File already exists.';
    
    echo "<script>uploatalertbox();</script>";
    
    
}

require_once("dbcon.php");
$link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
@mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases
$error = '';
if(isset($_POST['upload']))
{
    $que="select submissionNumber from progressReportsDetails where reportSerial='$reportserial' order by submissionNumber desc";
    $rs = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
    $attempt = 1;
    if(mysql_num_rows($rs)>0)
    {
        $row = mysql_fetch_array($rs);
        $attempt = $row[0] + 1;
    }
    //echo $attempt;
    $que="select submissionPending, report_hash from progressReportsBasic where reportSerial='$reportserial'";
    $rs = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
    $row=mysql_fetch_array($rs);
    if($row[0]=='true' && $row[1]==$_POST['validator'])
    {
        $fileuploadreturn = fileuploader('filetoupload',100000000,$reportserial.'_'.$attempt.'.pdf');
        if($fileuploadreturn=='ok')
        {
            $today = date("Y-m-d");
            $que="insert into progressReportsDetails values('$reportserial',$attempt,'$today','uploaded_reports/$reportserial"."_"."$attempt.pdf','')";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            $que="UPDATE progressReportsBasic set submissionPending='false',report_hash='',resubmissionRequired='false' where reportSerial='$reportserial'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            echo 'Form Uploaded. Please close the window<script>submitsucess();</script>';
        }
        else{
            $error = $fileuploadreturn ;
        }
        
    }
    else
        $error='Unable to submit form. Don\'t open multiple form submission window.';
        
    
    
}
if((!isset($_POST['sbt']) || $error!='') && isset($_COOKIE['reportserial']))
{
$newpass_notencrpt=randomPassword();
$newpass=md5(md5($newpass_notencrpt));
$que="UPDATE progressReportsBasic set report_hash='$newpass' where reportSerial='$reportserial'";
@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());


$form=<<<aa
$error

<form method="post" enctype="multipart/form-data">
<br />
<label class="fieldheader">Upload Report</label>
<br /><br />
    <input type="file" style="display:none" id="filetoupload" name="filetoupload" onchange="alertFilename('filetoupload')">
<label for="filetoupload" class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored" id="uploadselect">
  <i class="material-icons">attach_file</i>
</label>
<div class="mdl-tooltip" for="uploadselect">
click here to select file
</div>
<div id="filename"></div><br/><br/>
<button type='submit' class='mdl-button mdl-js-button mdl-button--raised mdl-button--colored' style='display:none;margin-left: 25%;margin-right: 25%;width: 50%;' name='upload' id='upload'>Upload</button>
<input type="text" name="validator" style="display: none;" value="$newpass"/>
</form>


aa;
echo $form;
}                        
?>

</body>
</html>