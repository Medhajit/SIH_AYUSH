
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
    <title>Manage Notices</title>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>
function changeisnew(filename,serial,datetime)
{
    document.getElementById('loaderisnew'+serial).style.display = 'block';
    document.getElementById('isnewdiv'+serial).style.display = 'none';
    var isnew='';
    if(document.getElementById("isnew"+serial).checked)
    {
        isnew='yes';
    }
    else
    {
        isnew='no';
    }
    
    var areq=new XMLHttpRequest();

    areq.onreadystatechange=function()
    {
        if(areq.readyState==4)
        {
            if(areq.responseText=='ok')
            {
                document.getElementById('loaderisnew'+serial).style.display = 'none';
                document.getElementById('isnewdiv'+serial).style.display = 'block';                              
            }
        }
        
        
    };
    areq.open("get","managenoticeAJAX.php?type=update&filename="+filename+"&datetime="+datetime+"&isnew="+isnew,true);
    areq.send(null);
    
}
function delnotice(filename,serial,datetime)
{
    document.getElementById('loaderdel'+serial).style.display = 'block';
    document.getElementById('del'+serial).style.display = 'none';
    var areq=new XMLHttpRequest();

    areq.onreadystatechange=function()
    {
        if(areq.readyState==4)
        {
            if(areq.responseText=='ok')
            {
                document.getElementById('tr'+serial).style.display = 'none';          
            }
        }
        
        
    };
    areq.open("get","managenoticeAJAX.php?type=delete&filename="+filename+"&datetime="+datetime,true);
    areq.send(null);
}    
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
          <a class="mdl-navigation__link currentpage" href="ManageNotice.php">Notice</a>
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
          <a class="mdl-navigation__link" href="ChangePassword.php">Change Password</a>
          <a class="mdl-navigation__link" href="login.php" style="background-color: #d5d9f5; color: #757575;">Logout</a>
        </nav>
      </div>
      <main class="mdl-layout__content" style="background-color: #deebf7;">
      <div id='p2' class="mdl-progress mdl-js-progress mdl-progress__indeterminate mdl-progress-red" style="display: none; width: 100%;"></div>
        <div class="page-content" style="padding: 2% 5%;">
  

<?php
$error = '';
if(isset($_POST['upload']))
{


    $title = $_POST['nameofnotice'];
    $theFiles = $_FILES['filetoupload']['name'];
    //echo "<script>alert('$theFiles');</script>";
    //$fname=$theFiles;
    $file_tmp = $_FILES['filetoupload']['tmp_name'];
    $isnew = $_POST['isnew'];
    if($isnew == 'on')
        $isnew = 'yes';
    else
        $isnew = 'no';
        
    //$theFiles=str_replace(" ","%20",$theFiles);
    $datetime= date("Y-m-d H:i:s");
    if(!empty($_FILES['filetoupload']['name']) && !empty($_POST['nameofnotice']))
    {
        if(!file_exists("notice/".$theFiles))
        {
            move_uploaded_file($file_tmp,"notice/".$theFiles);
            $title = str_replace("'","''",$title);
            $theFiles = str_replace("'","''",$theFiles);
            $isnew = str_replace("'","''",$isnew);
            //echo "<script>alert('$theFiles');</script>";
            $username = $_SESSION['username'];
            
            
            $title = str_replace("'","''",$title);  
            $theFiles = str_replace("'","''",$theFiles);
            
            $que="insert into notice values('$title','$theFiles','$isnew','$datetime','$username')";
            @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());

        }
        else
        {
            $error = 'A file with same name already exists! Upload a file with different name!';
        }

    }
    else
    {
        $error = 'Selection of a pdf file and name of the notice is mandatory!';
    }
}
if($error!=''){
    $nameval = $title;
    if($isnew=='on')
        $isnewval = 'checked';
    else
        $isnewval = '';
}
else
{
    $nameval = '';
    $isnewval = '';
}

?>

            <div style="float: left; width: 25%; padding: 0 2% 0 2.5%; background-color: white;border-radius: 0px 20px 20px 0px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);">
            <form method="post" enctype="multipart/form-data">
            <label style="padding: 5px; color: white; background-color: #681fde;">Upload Notice</label><br /><br />
            
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  has-placeholder">
            <input class="mdl-textfield__input" type="text" id="nameofnotice" name="nameofnotice"  value="<?php echo $nameval ?>" placeholder="" required>
            <label class="mdl-textfield__label" for="nameofnotice" style="font-size: 15px;">Name of the notice</label>
            </div>
            

                <input type="file" style="display:none" id="filetoupload" name="filetoupload" onchange="alertFilename('filetoupload')" required>
                Select Notice File &nbsp;&nbsp;&nbsp;
                <label for="filetoupload" style="min-width: 32px; min-height:32px;height:  32px;width: 32px;" class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored" id="uploadselect">
                  <i class="material-icons">attach_file</i>
                </label>
                <div class="mdl-tooltip" for="uploadselect">
                click here to select file
                </div>
                <div id="filename"></div>
                
        <div style='margin-top: 20px;margin-bottom: 20px;'>
          <label class='mdl-switch mdl-js-switch mdl-js-ripple-effect' for='isnew'><input type='checkbox' name='isnew' id='isnew' class='mdl-switch__input' style='float: right' <?php echo $isnewval ?> ><span class='mdl-switch__label'>Mark it as <img src='img\\newicon.gif' style='width: 40px; height: 20px;'></span></label>
          </div>
          
           <button style="display: none;" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="width: 100%;" name="upload" id="upload" onclick="">Upload Notice</button>

            </form>
<?php if($error!='')
        echo $error;
?>
            </div>





 <div style="width: 65%;padding: 0px 0px 0px 20px;font-family: Lato;text-align: center; float: left; font-size: 18px;">
            <br/><label style="font-size: 20px;margin-bottom: 25px; padding: 5px; color: white; background-color: #681fde;">Existing Notices</label><br/>
          <br/><br/>
          
<?php
$que="select * from notice";
$rs = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
if(mysql_num_rows($rs)>0)
{
echo "<table class='mdl-data-table mdl-js-data-table mdl-shadow--2dp' style='width: 100%;white-space: normal; word-wrap: break-word;'>
      
      <thead>
        <tr>
          <th class='mdl-data-table__cell--non-numeric'>Date &amp; Time of Upload</th>
          <th class='mdl-data-table__cell--non-numeric'>Name of Notice</th>
          <th class='mdl-data-table__cell--non-numeric'>View</th>
          <th class='mdl-data-table__cell--non-numeric'>Show as <img src='img\\newicon.gif' style='width: 30px; height: 15px;'></th>
          <th class='mdl-data-table__cell--non-numeric'>Uploaded By</th>
          <th class='mdl-data-table__cell--non-numeric'>Delete</th>
        </tr>
      </thead>
      <tbody>";

$i=0;
while($row = mysql_fetch_array($rs))
{
    $i=$i+1;
    if($row[2]=='yes')
        $isnewval = 'checked';
    else
        $isnewval = '';
        
    echo "<tr id='tr$i'><td class='mdl-data-table__cell--non-numeric'>$row[3]</td><td class='mdl-data-table__cell--non-numeric'>$row[0]</td>
          <td class='mdl-data-table__cell--non-numeric'><a class='anchor1' href='notice/$row[1]' target='_blank'><i class='material-icons'>open_in_new</i></a></td>
          <td class='mdl-data-table__cell--non-numeric'>
          <div style='margin-top: 20px;margin-bottom: 20px;' id='isnewdiv$i'>
          <label class='mdl-switch mdl-js-switch mdl-js-ripple-effect' for='isnew$i'><input id='isnew$i' type='checkbox' class='mdl-switch__input' onchange='changeisnew(\"$row[1]\",\"$i\",\"$row[3]\")' style='float: right' $isnewval></label>
          </div>
          <div id='loaderisnew$i' class='mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active' style='display: none;'></div>
          </td>
          <td class='mdl-data-table__cell--non-numeric'>$row[4]</td>
          <td class='mdl-data-table__cell--non-numeric'> <button id='del$i'  type='button' style='min-width: 32px; min-height:32px;height:32px;width: 32px; background-color: red'  class='mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored' onclick='delnotice(\"$row[1]\",\"$i\",\"$row[3]\");'><i class='material-icons'>delete_forever</i></button>
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







