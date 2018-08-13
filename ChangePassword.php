
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
    <title>Change Password</title>
    <script src="http://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="http://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <style>

.pagebody{
min-width: 900px;
  font-family: Lato;
  width: calc(100% - 40px);
}
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
  height: 60px;
  background: -webkit-linear-gradient(top, rgba(52,86,106,1) 0%, rgba(11,25,34,1) 100%);
}
        .demo-card-wide > .mdl-card__menu {
          color: #fff;
        }
        .currentpage{
            background-color: #d5d9f5;
            
        }
        
        .mdl-progress-red > .progressbar {
            background-color: red !important;
        }
    </style>
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
        
    </script>
  </head>
  
  <body class="pagebody">
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
          <a class="mdl-navigation__link currentpage" href="ChangePassword.php">Change Password</a>
          <a class="mdl-navigation__link" href="login.php" style="background-color: #d5d9f5; color: #757575;">Logout</a>
        </nav>
      </div>
      <main class="mdl-layout__content" style="background-color: #deebf7;">
      <div id='p2' class="mdl-progress mdl-js-progress mdl-progress__indeterminate mdl-progress-red" style="display: none; width: 100%;"></div>
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


      <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #13809e; color: white; font-size: 20px; ">
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

      <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #13809e; color: white; font-size: 20px">
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


</div>

</center>
</form>        
    
</div>


aa;
echo $htmlcode;
?>

<?php

?>

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
  </body>
</html> 