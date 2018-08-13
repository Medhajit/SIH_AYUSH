<html><head> 
<title>Answer Question</title>
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


function autoScrolling() {
   window.scrollTo(0,document.body.scrollHeight);
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
            autoScrolling();
           
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
/*
function nodirect() {
    alert("We are unable to show this page as all expected parameters not found. We are redirecting you to home page");
     window.location = 'home.php';
    } 
    */
</script>
<body style="background-color: white; min-width: 0px;" >







 <?php
 session_start();
            if(isset($_SESSION['appid']))
            {
            $appid=$_SESSION['appid'];
            //echo $appid;
            }
            else
            {
                
                header ("location: home.php");
            }
            
            
                   
           require_once("dbcon.php");
    
        $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
        @mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases
      
               
?>

<div style="height: 50px;color: white;background-color: #3f51b5;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);text-align: center;padding-top:  25px;position:  fixed;width: 100%;font-family:  lato;font-size: 20px;">Applicant Chat Window. Application Id <?php echo $appid ?><br /><i class="material-icons" onclick="chatloadAJAX('<?php echo $appid ?>')">sync</i></div>
<br /><br />
          <div id="chatbox" style="width: 76%; padding: 70px 12% 100px 12%;"></div>
          
           <div id="loader" style="width: 100%; padding: 70px 0% 0px 0%;"><center><div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active" style="height: 400px; width: 400px;;"></div></center></div>
          
          
  
          <?php
          $appid = str_replace("'","''",$appid);
          $que="select change_datetime, change_by, comment, state from audit_trail where appid='$appid' and state='true' order by change_datetime asc";
          $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());

            if(mysql_num_rows($rs)>0)
    
            {
                $appid = str_replace("'","''",$appid);
                $que="select status from app_status where appid='$appid'";
                $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
                $row=mysql_fetch_array($rs);
                
            }
            
            
            
            
          ?>
          

        <div id="chatlower">




<?php
echo "<div id='asksection' style='width: 100%; position: fixed; bottom: 0; background-color:#3f51b5; padding: 0px 12% 0px 12%; color:white; font-family: lato'>";

          echo '<script>chatloadAJAX("'.$appid.'")</script>';
    
                if($row[0]!='Accepted' && $row[0]!='Rejected')
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

</body>
</html>