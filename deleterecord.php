
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

function nodirect()
{
    alert('Unable to find required parameters. The window will be closed now.');
    close();
}
function submitsucess()
{
    alert('Deletion Sucessful. The window will be closed now.');
    close();
}
</script>
</head>
<body onunload="javascript:refreshParent()" style="font-family: Lato; padding: 1%;">
<?php
$appid;
if(!isset($_GET['appid']))
{
    echo 'Unable to find required parameters. Close the window<script>nodirect();</script>';
}
else
{
    $appid=$_GET['appid'];
}



require_once("dbcon.php");
$link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
@mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases
$error = '';
if(isset($_POST['sbt']))
{

    if(!empty($_POST['pass']))
    {
    $uname=$_SESSION['username'];
    $que="select pass from user where username='$uname'";
    $rs = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
    $row=mysql_fetch_array($rs);   

    $pass=$_POST['pass'];
    $cmt=$_POST['cmt'];
            
    $cmt = str_replace("'","''",$cmt);  
    $enctpass = md5(md5($pass));
    $datetime= date("Y-m-d H:i:s");


    if($row[0]==$enctpass)
    {
        
        $que="select status from app_status where appid='$appid'";
        $rs = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        $row=mysql_fetch_array($rs);
        
        if($row[0]=='Closed' || $row[0]=='Rejected')
        {
            
            
            $que="select email from app_details where appid='$appid'";
            $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            $row=mysql_fetch_array($rs);
            $email = $row[0];

            //Database deletion started
            
            $que="delete from application_part_1 where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            
            $que="delete from application_part_1_sub1_coinvestigator where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            
            $que="delete from application_part_2 where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from application_part_3 where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
                            
            $que="delete from application_part_4 where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from application_part_4_budget_equipment where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from application_part_4_budget_nonrecurring where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
                                
            $que="delete from application_part_4_budget_nonrecurring_other where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            
            $que="delete from application_part_4_budget_recurring where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            
            $que="delete from application_part_4_sub_ref_book where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from application_part_4_sub_ref_encyclopedia where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from application_part_4_sub_ref_journal where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from application_part_4_sub_ref_newspaper where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from application_part_4_sub_ref_other where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());

            $que="delete from application_part_4_sub_ref_report where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from application_part_4_sub_ref_secondary where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from application_part_4_sub_ref_website where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            
            $que="delete from progressReportsBasic where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            
            $que="delete from progressReportsDetails where reportSerial like '$appid%'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from schedule_reports where reportserial like '$appid%'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
                                    
            $que="delete from audit_trail where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from app_status where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
            $que="delete from app_details where appid='$appid'";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        

            //File deletion started


            foreach (glob("application_documents/$appid*") as $filename) 
            {
                unlink($filename);
            } 
            
            
            
            foreach (glob("uploaded_reports/$appid*") as $filename) 
            {
                unlink($filename);
            }    
            
            $username=$_SESSION['username'];      
 
            $que="insert into delete_log values ('$appid','$username','$datetime','$cmt','$email')";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
        
                                                
            echo 'Deletion Sucessful<script>submitsucess();</script>';

                    
        }
        else                                
            $error='This is neither  an closed project nor a rejected application';
    }
    else
        $error='Wrong Password';
   }
   else               
    $error='Unable to Delete Project. Password is mandatory.';
    
    
}
if(!isset($_POST['sbt']) || $error!='')
{

$form=<<<aa
<label style='padding: 5px; background-color: red; color: white'>$error</label>
<br/><br/><br/><form method="post">
<div style='width:98%;' class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  has-placeholder">
                <input class="mdl-textfield__input" type="text" id="cmt" name="cmt" placeholder="">
                <label class="mdl-textfield__label" for="appid" style="font-size: 15px;">Comment</label>
            </div> <br/>
<div style="width:50%;float: left;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  has-placeholder">
                <input class="mdl-textfield__input" type="password" id="pass" name="pass" required placeholder="">
                <label class="mdl-textfield__label" for="appid" style="font-size: 15px;">Your Password</label>
            </div>
            <div style="width: 48%;float: left;text-align: center;">
            <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--colored' type="submit" name="sbt">DELETE</button>
</div>
</form>


aa;
echo $form;
}                        
?>

</body>
</html>