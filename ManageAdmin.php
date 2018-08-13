
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
    <title>Manage ADMINS</title>
    <script src="http://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="http://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <style>

.anchor1:hover:not(.active) {
background-color: transparent;
}

.anchor1{
    color: blue;
}
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
function changemaster(username,serial)
{
    document.getElementById('loadermaster'+serial).style.display = 'block';
    document.getElementById('masterdiv'+serial).style.display = 'none';
    var master='';
    if(document.getElementById("master"+serial).checked)
    {
        master='master';
    }
    else
    {
        master='admin';
    }
    
    var areq=new XMLHttpRequest();

    areq.onreadystatechange=function()
    {
        if(areq.readyState==4)
        {
            if(areq.responseText=='ok')
            {
                //alert("manageuserAJAX.php?type=update&username="+username+"&master="+master);
                document.getElementById('loadermaster'+serial).style.display = 'none';
                document.getElementById('masterdiv'+serial).style.display = 'block';                              
            }
        }
        
    };
    areq.open("get","manageuserAJAX.php?username="+username+"&master="+master,true);
    areq.send(null);
    
}
function deluser(username)
{
    var link = 'deleteuser.php?username='+username;
    window.open (link, 'newwindow', config='height=400, width=560, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');

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
          <a class="mdl-navigation__link" href="ManageNotice.php"> Notice</a>
          <?php

      require_once("dbcon.php");
    
        $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
        @mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases
        if($_SESSION['usertype']=='master')
        {
            echo '<a class="mdl-navigation__link currentpage" href="ManageAdmin.php">Manage Admin</a>';
            echo '<a class="mdl-navigation__link" href="deleteapplicationlog.php">Deleted Application Log</a>';
        }

          ?>
          <a class="mdl-navigation__link" href="uploadInstruction.php">Upload Instruction</a>
          <a class="mdl-navigation__link" href="ChangePassword.php">Change Password</a>
          <a class="mdl-navigation__link" href="login.php" style="background-color: #d5d9f5; color: #757575;">Logout</a>
        </nav>
      </div>
      <main class="mdl-layout__content" style="background-color: #deebf7;">
      <div id='p2' class="mdl-progress mdl-js-progress mdl-progress__indeterminate mdl-progress-red" style="display: none; width: 100%;"></div>
        <div class="page-content" style="padding: 2% 5%;">
  

<?php
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

$error = '';
if(isset($_POST['add']))
{

    if(!empty($_POST['username']) && !empty($_POST['email']))
    {
        $messageIdent = md5($_POST['username'] . $_POST['email']);
        $sessionMessageIdent = isset($_SESSION['messageIdent'])?$_SESSION['messageIdent']:'';
        
        if($messageIdent!=$sessionMessageIdent)
        {
        
            
            $username = $_POST['username'];
            $email = $_POST['email'];
            $master = $_POST['master'];
            
            $newpass_notencrpt=randomPassword();
            $newpass=md5(md5($newpass_notencrpt));
            
            if($master == 'on')
                $usertype = 'master';
            else
                $usertype = 'admin';
                
            $que="select * from user where username='$username'";
            $rs = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
            
            if(mysql_num_rows($rs) == 0)
            {
                $email=strtolower($email);
                $que="insert into user values('$username','$newpass','$usertype','$email')";
                @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
                
                $subject="Your Login Credentials has Generated";
                $message="Dear User, ".PHP_EOL."".PHP_EOL."Your login credentials for ADMIN LOGIN has created.".PHP_EOL.PHP_EOL."Your Username: $username".PHP_EOL."Password: $newpass_notencrpt".PHP_EOL.PHP_EOL."Please change your default password after login.".PHP_EOL.PHP_EOL." To login go to http://ayushgrant.in/sih/login.php";
                
                 $headers ='From: 	AYUSH <contact@ayushgrant.in>' . "\r\n" .
                 'Reply-To: contact@ayushgrant.in' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
                 mail($email, $subject, $message, $headers);
            
                $_SESSION['messageIdent'] = $messageIdent;            
            
            }
            else
            {
                $error = 'Username Already Exist!';
            }
        }

    }
    else
    {
        $error = 'All fiels are mandatory!';
    }
}
if($error!=''){
    if($master=='on')
        $masterval = 'checked';
    else
        $masterval = '';
}
else
{
    $username = "";
    $email = "";
}

?>
            <div style="float: left; width: 30%; padding: 0 2% 0 2.5%; background-color: white;border-radius: 0px 20px 20px 0px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);">
            <form method="post" enctype="multipart/form-data">
            <label style="padding: 5px; color: white; background-color: #681fde;">Add ADMIN</label><br /><br />
            
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  has-placeholder">
            <input class="mdl-textfield__input" type="text" id="username" name="username"  value="<?php echo $username ?>" placeholder="" required>
            <label class="mdl-textfield__label" for="username" style="font-size: 15px;">USERNAME</label>
            </div>
            
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  has-placeholder">
            <input class="mdl-textfield__input" type="email" id="email" name="email"  value="<?php echo $email ?>" placeholder="" required>
            <label class="mdl-textfield__label" for="email" style="font-size: 15px;">Email ID</label>
            </div>

                
            <div style='margin-top: 5px;margin-bottom: 20px;'>
          <label class='mdl-switch mdl-js-switch mdl-js-ripple-effect' for='master'><input type='checkbox' name='master' id='master' class='mdl-switch__input' style='float: right' <?php echo $masterval ?> ><span class='mdl-switch__label'>Provide <b>MASTER</b> Privilege</span></label>
          </div>
          
           <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="width: 100%;" name="add" id="add" onclick="">ADD ADMIN</button>

            </form>
<?php if($error!='')
        echo $error;
?>
            </div>





            <div style="width: 60%;padding: 0px 0px 0px 20px;font-family: Lato;text-align: center; float: left; font-size: 18px;">
            <br/><label style="font-size: 20px;margin-bottom: 25px; padding: 5px; color: white; background-color: #681fde;">Existing ADMIN</label><br/>
          <br/><br/>
          
<?php
$que="select * from user where user_type!='applicant'";
$rs = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
if(mysql_num_rows($rs)>0)
{
echo "<table class='mdl-data-table mdl-js-data-table mdl-shadow--2dp' style='width: 100%;white-space: normal; word-wrap: break-word;'>
      
      <thead>
        <tr>
          <th class='mdl-data-table__cell--non-numeric'>Username</th>
          <th class='mdl-data-table__cell--non-numeric'>Email ID</th>
          <th class='mdl-data-table__cell--non-numeric'><b>MASTER</b> Privilege</th>
          <th class='mdl-data-table__cell--non-numeric'>Delete</th>
        </tr>
      </thead>
      <tbody>";

$i=0;
while($row = mysql_fetch_array($rs))
{
    $i=$i+1;
    if($row[2]=='master')
        $masterval = 'checked';
    else
        $masterval = '';
        
    echo "<tr id='tr$i'><td class='mdl-data-table__cell--non-numeric'>$row[0]</td><td class='mdl-data-table__cell--non-numeric'>$row[3]</td>
          <td class='mdl-data-table__cell--non-numeric'>
          <div style='margin-top: 20px;margin-bottom: 20px;' id='masterdiv$i'>
          <label class='mdl-switch mdl-js-switch mdl-js-ripple-effect' for='master$i'><input id='master$i' type='checkbox' class='mdl-switch__input' onchange='changemaster(\"$row[0]\",\"$i\")' style='float: right' $masterval></label>
          </div>
          <div id='loadermaster$i' class='mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active' style='display: none;'></div>
          </td>
          <td class='mdl-data-table__cell--non-numeric'> <button id='del$i'  type='button' style='min-width: 32px; min-height:32px;height:32px;width: 32px; background-color: red'  class='mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored' onclick='deluser(\"$row[0]\");'><i class='material-icons'>delete_forever</i></button>
          <div id='loaderdel$i' class='mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active' style='display: none;'></div>
          
          </td>
          </tr>";
}

echo " </tbody>
      </table>
          ";
}
else{
    echo "No Notice Found";
}
?>   
          
          
          
          
          
          
          


          
          </div>

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
  </body>
</html> 







