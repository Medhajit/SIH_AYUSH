<?php

date_default_timezone_set('Asia/Kolkata');
session_start();
$progress= -1;
$appid;
if(isset($_SESSION['progress']))
{
    $progress= $_SESSION['progress'];
}
else
{
    
    header ("location: applynew.php");
  
}
if(isset($_POST['gotofiiling']))
{
    header ("location: fillform.php");
}

?> 
 
 <html>
  <head>
  <title>Apply Online</title>
    <!-- Material Design Lite -->
    <script src="http://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="http://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    
      <style>
  .dialog-substitute{
    z-index: 5;
    position: fixed;
    border: none;
    box-shadow: 0 9px 46px 8px rgba(0,0,0,.14), 0 11px 15px -7px rgba(0,0,0,.12), 0 24px 38px 3px rgba(0,0,0,.2);
    background-color: white;
  }
  
  </style>
   <dialog id="instructiondialog_title" style="width:60%; border-radius: 5px 18px 18px 18px; " class="mdl-dialog" style="text-align: center;">
  <h5 class="mdl-dialog__title" style="font-size: 20px; color: #406c95">Instructions</h5>
  <div class="mdl-dialog__content" style="color: black;">
    <ul>
    <li>Title should be clear, concise and brief</li>
    <li>Title should have mention important variables related to the project</li>
    <li>Title should reflect project design and primary objectives and target population</li>
    </ul>
  </div>
  <div class="mdl-dialog__actions">
    <button type="button" class="mdl-button" >close</button>
  </div>
</dialog> 


<div class="dialog-substitute" id="instructiondialog_title_substitute" style="width:60%; right: 20%; top: 10%; display: none">
<h5 class="mdl-dialog__title" style="font-size: 20px; color: #406c95">Instructions</h5>
  <div class="mdl-dialog__content" style="color: black;">
    <ul>
    <li>Title should be clear, concise and brief</li>
    <li>Title should have mention important variables related to the project</li>
    <li>Title should reflect project design and primary objectives and target population</li>
    </ul>
  </div>
  <div class="mdl-dialog__actions">
    <button type="button" class="mdl-button" onclick="document.getElementById('instructiondialog_title_substitute').style.display='none'">close</button>
  </div>
</div>     

 
  <dialog id="wrongdialog1" class="mdl-dialog" style="text-align: center;">
  <h4 class="mdl-dialog__title"><i class="material-icons" style="font-size: 48px;">error</i></h3>
  <div class="mdl-dialog__content">
    <p>
      Please fill up all the necessary fields
    </p>
  </div>
  <div class="mdl-dialog__actions">
    <button type="button" class="mdl-button" >Ok</button>
  </div>
</dialog>    
    
      <dialog id="wrongdialog2" class="mdl-dialog" style="text-align: center;">
  <h4 class="mdl-dialog__title"><i class="material-icons" style="font-size: 48px;">error</i></h3>
  <div class="mdl-dialog__content">
    <p>
      Captcha Error
    </p>
  </div>
  <div class="mdl-dialog__actions">
    <button type="button" class="mdl-button" >Ok</button>
  </div>
</dialog> 
    
    
 <script src='http://www.google.com/recaptcha/api.js'></script>
<script>

function isChrome()
{
    var a = !!window.chrome && !!window.chrome.webstore;
    return a;

}
function dialogdisplay()
{
    if(!isChrome())
    {
        var alldialogs = document.getElementsByClassName("mdl-dialog");
        //console.log(alldialogs.length);
        for(var i=0; i<alldialogs.length; i++)
        {
            alldialogs[i].style.display = 'none';
            
        }
    }
}
dialogdisplay();



function wrongiddialog(errornumber) {
    if(!isChrome())
    {
        if(errornumber==1)
            alert('Please fill up all the necessary fields');
        else if(errornumber==2)
            alert('Captcha error');
    }
    else
    {
        var dialog = document.querySelector('#wrongdialog'+errornumber);
                if (! dialog.showModal) {
                dialogPolyfill.registerDialog(dialog);
                }
                dialog.showModal();
                dialog.querySelector('button:not([disabled])')
    .addEventListener('click', function() {
      dialog.close();
    });
}
}
/* 
function fillrestform()
{
    window.location = 'fillform.php';
}
*/
//CAPTCHA
function capenable() {
    document.getElementById("sbt_app").style.display="";
}
function capdisable() {
    document.getElementById("sbt_app").style.display="none";
}
//CAPTCHA 
function noKeyWordError()
{
    var key=document.getElementById("key");
    if(key.value=='')
    {
        document.getElementById("Keywords").innerHTML="<label style='color:white; font-size: 14px'>We need atleast one key word to proceed. Either click on a suggested keyword or put your own keyword using add keyword box. Suggested keywords will apper after you start writing the abstract</label>";
        
    }
    else
    {
        document.getElementById("Keywords").innerHTML="";
        
    }
}

function addtotextbox(suggestion)
{
    
    var key=document.getElementById("key");
    if (iskeywordalreadypresent(key.value,suggestion))
    {
    var blank = 0;
    var keystr = '';
    if(key.value=='')
    {
        blank = 1;
        noKeyWordError();
        
    }
    if(blank == 1)
    {
        key.value=suggestion;
        keystr=suggestion
    }
    else
    {
        var pastval=key.value;
        key.value=pastval+", "+suggestion;
        keystr = pastval+", "+suggestion;
    }
    
    var keys = keystr.split(", ");
    var keysinhtml = "";
    for(var i=0; i<keys.length; i++)
    {
        keysinhtml=keysinhtml+'<span class="mdl-chip mdl-chip--deletable" style="margin: 2px 2px 2px 2px;" onclick="deletekeyword('+"'"+keys[i]+"'"+')"><span class="mdl-chip__text">'+keys[i]+'</span><button type="button" class="mdl-chip__action"><i class="material-icons">cancel</i></button></span>'
    }
    Keywords.innerHTML=keysinhtml;
    }
    
}

function instruction(divname) {
    
        if(!isChrome())
    {
        //instructiondialog_s2_review_lit_substitute
        var dialog = document.getElementById('instructiondialog_'+divname+'_substitute');
        dialog.style.display = 'block';
    }
    else
    {
        var dialog = document.querySelector('#instructiondialog_'+divname);
                if (! dialog.showModal) {
                dialogPolyfill.registerDialog(dialog);
                }
                dialog.showModal();
                dialog.querySelector('button:not([disabled])')
    .addEventListener('click', function() {
      dialog.close();
    });
    }

}   
function iskeywordalreadypresent(listofkey, newkey)
{
    var keys = listofkey.split(", ");
    var match = 0;
    for(i=0; i<keys.length; i++)
    {
        if(keys[i]==newkey)
        {
            match = 1;
            break;
        }
    }
    if (match==1)
    return false;
    else
    return true;
    
}
function deletekeyword(delkeyword){
    var key=document.getElementById("key");
    var pastval=key.value;
    var keys = pastval.split(", ");
    var newkeys = "";
    var numberofnewkeys = 0;
    for(i=0; i<keys.length; i++)
    {
        if(keys[i]!=delkeyword)
        {
            if(numberofnewkeys>=1)
            newkeys=newkeys+", "+keys[i];
            else
            newkeys=newkeys+keys[i];
        numberofnewkeys++;
        }
        
    }
    key.value=newkeys;
    var newkeys = newkeys.split(", ");
    var keysinhtml = "";
    if(numberofnewkeys>0)
    {
    for(var i=0; i<newkeys.length; i++)
    {
        keysinhtml=keysinhtml+'<span class="mdl-chip mdl-chip--deletable" style="margin: 2px 2px 2px 2px;" onclick="deletekeyword('+"'"+newkeys[i]+"'"+')"><span class="mdl-chip__text">'+newkeys[i]+'</span><button type="button" class="mdl-chip__action"><i class="material-icons">cancel</i></button></span>'
    }
    document.getElementById("Keywords").innerHTML=keysinhtml;
    }
    else
    noKeyWordError();
}
function addmanualkeyword(keyword)
{
    var textboxkey = document.getElementById("addkey").value;
    var newkeys = textboxkey.split(" ");
    for(var i=0; i<newkeys.length; i++)
    {
        if(newkeys[i]!="" && newkeys[i]!=" ")
        addtotextbox(newkeys[i]);
    }
    document.getElementById("addkey").value = "";
}
/*function redirectinitial() {
    
     window.location = 'applynew.php';
}  
*/
function checker() {
    if(document.getElementById('confirm').checked)
    {
        document.getElementById('btndiv').innerHTML = '<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" name="proceed">Proceed</button>';
    }
    else
    {
        document.getElementById('btndiv').innerHTML = '';
    }
}

function suggestKeyword(){
    var areq=new XMLHttpRequest();
    var abs = document.getElementById("abstract").value;
    var title = document.getElementById("title").value;
    if(abs!="" && title!="")
        abs=title+" "+abs;
    if(abs!="")
    {
        document.getElementById("keywordpredictdiv").style.display="";
    }
    else
    {
        document.getElementById("keywordpredictdiv").style.display="none";
    }
    if(abs.substr(abs.length - 1) == " " || abs.substr(abs.length - 1) == "." || abs == "" )
    //alert(abs);
    {
    abs = abs.replace(/\s+/g,' ').trim();
    console.log(abs);
    areq.onreadystatechange=function()
    {
        if(areq.readyState==4)
        {
                //alert('ok found')
                var suggest=document.getElementById("suggestKeyword");
                //console.log(areq.responseText);
                suggest.innerHTML=areq.responseText;
        }
       
        
    };
    areq.open("get","suggestKeywordAJAX.php?abstract="+abs,true);
    areq.send(null);
    }
    
}


</script>  
    
    
    
    
    
    
    <style>
body{
    
  font-family: Lato;
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
  height: 176px;
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
.fieldheader{
    color: blue;
    font-size: 20px;
}
    </style>





  </head>
  
  
  <?php

function appidgenator()
{
    //this function is used to genarate uniqueapplication id. To make it unique, we will use timestamp+3 random numbers
    $alphabet = '1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 3; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    $last3= implode($pass);
    $today = date("dmyHis");
    return $today.$last3;
    
}
/*
    $host = 'mysql.hostinger.in';
    $user = 'u280481535_sih';
    $pass = 'techbot_63';*/
    
require_once("dbcon.php");

    $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found"); //to establish connection
    @mysql_select_db($dbname, $link) or die("<br/><br/>Requested database not found"); //to select proper databases




?>
  
  <body>
  

  
  
  
  
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
            <a class="mdl-navigation__link" href="home.php">Home</a>
          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Menu</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="home.php">Home</a>
          <a class="mdl-navigation__link currentpage" href="applynew.php">Apply Online</a>
          <a class="mdl-navigation__link" href="CheckStatus.php">Check Status</a>
          <a class="mdl-navigation__link" href="print.php">Print Application</a>
          <a class="mdl-navigation__link" href="contact.php">Contact Us</a>
          <a class="mdl-navigation__link" href="login.php" style="background-color: #d5d9f5; color: #757575;">Login</a>
        </nav>
      </div>
      <main class="mdl-layout__content" style="background-color: #deebf7;">
      <div id='p2' class='mdl-progress mdl-js-progress mdl-progress__indeterminate mdl-progress-red' style="display: none; width: 100%"></div>
        <form method="post">
        <div class="page-content" style="padding: 2% 5%;">
  
  

  
  <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%; background: white;">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text"><label style="font-family: Lato; font-size: 28px; font-weight: 500;">
        <!--   Page Heading   -->
        Fill Up Grant Application</label></h2>
      </div>
      
     
 <?php
 $instruction=<<<aa
 
      <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #ffd155; color:white; font-size: 20px; background-color: #3f51b5; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Read the Instructions Carefully

      </div>
<form method="post">
<div class="mdl-card__actions mdl-card--border" style="text-align: center;  background-color: white; text-align: center;">
<br />
 <label style="font-size: 20px;margin-bottom: 25px; padding: 5px; color: white; background-color: #681fde;">View Instruction Document</label>
                
<br>  
<br>
          <a style="outline: none;" id="exixtingDoc" target="_blank" href="instruction/instruction.pdf"><i style="font-size: 36px;background-color:  black;padding:  10px;border-radius: 100px;" class="material-icons">description</i></a>
          
          <div class="mdl-tooltip" for="exixtingDoc">
                click here to view instructions
          </div>
<br /><br />
<center>
<div style="text-align: center; width: 480px;">
<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="confirm">
  <input type="checkbox" id="confirm" class="mdl-checkbox__input" onclick="checker()">
  <span class="mdl-checkbox__label"> I confirm that I have read all the instructions & ready to proceed</span>
</label>
</div>
<br /><br />
<div id="btndiv" style="text-align: center;"></div>
<br />
</center>
</div> 
</form>
 
 
 
aa;




$form0=<<<aa


      <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #ffd155; color:white; font-size: 20px; background-color: #3f51b5; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Information Regarding Principal Investigator

      </div>

<div class="mdl-card__actions mdl-card--border" style="text-align: center;  background-color: white; text-align: left; height: auto;">
<div style="float: left; width: 38%; padding: 20px 20px 20px 60px">
<label class="fieldheader">First Name</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
    <input class="mdl-textfield__input" type="text" id="fname" name="fname" required style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter your first name</span>
  </div>
  
  
<br /><br /><br />
<label class="fieldheader">Last Name</label>
<br />
<div class="mdl-textfield mdl-js-textfield " style="padding: 0px;width: 100%">
    <input class="mdl-textfield__input" type="text" id="lname" name="lname" required style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter your Last name</span>
  </div>
  
  
<br /><br /><br />
<label class="fieldheader">Contact Number</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
    <input class="mdl-textfield__input" type="number" id="mob" name="mob" min="5000000000" max="9999999999" required style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter your 10 digit mobile number</span>
  </div>  
  
<br /><br /><br />

  
<label class="fieldheader">Residential Address</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "3" id="address" name="address" style="border-color: blue; resize: none; outline: none;" required ></textarea>    
    <span class="mdl-textfield__error">Please enter your address</span>
  </div>   
  
</div>
<div style="float: right; width: 38%; padding: 20px 60px 20px 20px;">


<label class="fieldheader">Middle Name</label>
<br />
<div class="mdl-textfield mdl-js-textfield " style="padding: 0px;width: 100%">
    <input class="mdl-textfield__input" type="text" id="mname" name="mname" style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter your middle name</span>
  </div>


<br /><br /><br />
<label class="fieldheader">Date of Birth</label>
<br />
<div class="mdl-textfield mdl-js-textfield " style="padding: 0px;width: 100%">
    <input class="mdl-textfield__input" type="date" id="dob" name="dob" required style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter your Date of Birth</span>
  </div>
  
<br /><br /><br /><br />
<label class="fieldheader">E-mail Id</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
    <input class="mdl-textfield__input" type="email" id="email" name="email" required style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter your e-mail id</span>
  </div>    
  
  
<br /><br /><br />
<label class="fieldheader">Designation</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
    <input class="mdl-textfield__input" type="text" id="designation" name="designation" required style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter your designation</span>
  </div>  

</div>
</div> 





<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #ffd155; color:white; font-size: 20px; background-color: #3f51b5; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Information Regarding Institution of Principal Investigator

      </div>

<div class="mdl-card__actions mdl-card--border" style="text-align: center;  background-color: #white; text-align: left; height: auto;">
<div style="float: left; width: 38%; padding: 20px 20px 20px 60px">
<label class="fieldheader">Institution Name</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
    <input class="mdl-textfield__input" type="text" id="institute" name="institute" required style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter the name of your Institution</span>
  </div>
  
  
<br /><br /><br />
<label class="fieldheader">Department</label>
<br />
<div class="mdl-textfield mdl-js-textfield " style="padding: 0px;width: 100%">
    <input class="mdl-textfield__input" type="text" id="dept" name="dept" required style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter the Department, to which you belong</span>
  </div>

  
</div>
<div style="float: right; width: 38%; padding: 20px 60px 20px 20px;">

<label class="fieldheader">Address of the Institution</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "4" id="intitute_address" name="intitute_address" style="border-color: blue; resize: none; outline: none;" required ></textarea>    
    <span class="mdl-textfield__error">Please enter the address of your institution</span>
  </div>    

</div>
</div>
<br/><br/>

<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #ffd155; color:white; font-size: 20px; background-color: #3f51b5; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Information Regarding Project

      </div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center;  background-color: white; text-align: left; height: auto;">
<div style="float: left;padding: 20px 60px 20px 60px; width: calc(100% - 120px);">
<label class="fieldheader" > <b>Title of the Research Project</b>&nbsp; &nbsp; <img src="img\instruction_icon.png" style="max-width: 3%; max-height: 3%; object-fit: contain; cursor: pointer" onclick="instruction('title');"/></label>
<br />

<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   <textarea class="mdl-textfield__input" type="text" rows= "2" cols="60"  id="title" name="title" required style="border-color: blue; resize: none; outline: none;" required ></textarea>    
    <span class="mdl-textfield__error">Please enter the title of your project</span>
</div>  
  
  
  
  
<br /><br /><br />
<label class="fieldheader">Abstract</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px; width: 100%">
    <textarea class="mdl-textfield__input" type="text" rows= "3" id="abstract" name="abstract" style="border-color: blue; resize: none; outline: none;" oninput="suggestKeyword()" required ></textarea>
    <span class="mdl-textfield__error">Please enter abstract of your project</span>
  </div>
  
 
<br /><br /><br />
<div id="keywordpredictdiv" style="border-radius: 5px 18px 18px 18px; background-color: rgb(135, 88, 177);width: 100%;min-height: 70px;padding: 5px;box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out; display: none;">
<div style="width: 35%; float: left;">
<label class="fieldheader" style="color: white;">Suggested keywords</label><br /><label style="font-size: 14px; color: #dadada;">Click on suggested keywords to add them</label>
<br />
 </div>
 <div id="suggestKeyword" style="width: 100%;"></div>

  </div>
  
<br />
<div style="border-radius: 5px 18px 18px 18px; background-color: #2d0303; width: 60%;min-height: 104px;padding: 5px; float: left;    box-shadow: 0 2px 5px 0 rgba(0, 39, 253, 0.47);margin-bottom: 15px;box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out;">

<label class="fieldheader" style="color: white;">Keywords</label>&nbsp;&nbsp;
<br /><br />
 <div id="Keywords" style="width: 100%;"></div>
 <input type="text" name="key" id="key" style="width: 98.8%;display: none;" required="true"/>
 </div>
 <div style="border-radius: 18px 5px 18px 18px; box-shadow: 0 2px 5px 0 rgba(0, 39, 253, 0.47);box-sizing: border-box;background-color: #2d0303; width: 37%;min-height: 59px;padding: 5px; margin-bottom: 10px; float: left;text-align: center; color: white;">Add keyword
 <br /><br />
 <input  type="text" id="addkey" style="border-radius: 5px;height: 50px;font-size: 20px;width: 60%; outline: none;">
 <button type="button" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" id="addkeybutton" onclick="addmanualkeyword()">
  <i class="material-icons">add</i>
</button>
 </div>

 <center><div style="margin: 10px;" class="g-recaptcha" data-sitekey="6LeEZU8UAAAAACF8ztgsCdZ9suO8JAObo0XGFcq4" id="captcha" data-callback="capenable" data-expired-callback="capdisable"></div>
 
 <br />
 <div id="sbtbtndiv" style="margin-top: 90px; width: 100%; float: left;">
 <button type="submit" style="display: none;" name="sbt_app" id="sbt_app" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" >
  Save & Continue
</button>
</div>
<br />
 </center>
 
</div>

</div>  

<script>noKeyWordError();</script>

aa;

if(isset($_POST['proceed']))
{
    echo $form0;
    $_SESSION['progress'] = 0;
}
else if(!isset($_POST['sbt_app']) && !isset($_POST['gotofiiling']))
{
    $_SESSION['progress'] = 0;
    echo  $instruction;
}
else if(isset($_POST['sbt_app']))
{
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']) )
        {
        
        //captcha part start
         $secret="6LeEZU8UAAAAAL1kM4pslvAax6K-1DtIeQb3oUDY";   
         $ip = $_SERVER['REMOTE_ADDR'];
         $captcha = $_POST['g-recaptcha-response'];
         $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip?$ip");
         $captcharesult= json_decode($response,true);
         //captcha part end
         if($captcharesult['success'])
            {
                
            $appid = appidgenator();
             if(!empty($_POST['key']) && !empty($_POST['intitute_address']) && !empty($_POST['dept']) && !empty($_POST['institute']) && !empty($_POST['designation']) && !empty($_POST['address']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['mob']) && !empty($_POST['email']) && !empty($_POST['title']) && !empty($_POST['dob']) && !empty($_POST['abstract']))
                {
                $fname=$_POST['fname'];
                $abstract=$_POST['abstract']; 
                $mname=$_POST['mname']; 
                $lname=$_POST['lname'];
                $mob=$_POST['mob'];
                $dob=$_POST['dob']; 
                $email=$_POST['email']; 
                $title=$_POST['title']; 
                $key=$_POST['key']; 
                $address=$_POST['address']; 
                $designation=$_POST['designation']; 
                $inst_name=$_POST['institute']; 
                $inst_dept=$_POST['dept']; 
                $inst_address=$_POST['intitute_address']; 
                $today = date("Y-m-d");
                $datetime= date("Y-m-d H:i:s");
                $date=date_create($today);
                $todayformat=date_format($date,"d-m-Y");
                
                $date=date_create($_POST['dob']);
                $dateformat=date_format($date,"d-m-Y");
                
                $fname = str_replace("'","''",$fname);
                $mname = str_replace("'","''",$mname);
                $lname = str_replace("'","''",$lname);
                $appid = str_replace("'","''",$appid);
                $email = str_replace("'","''",$email);
                $mob = str_replace("'","''",$mob);
                $dob = str_replace("'","''",$dob);
                $title= str_replace("'","''",$title);
                $today = str_replace("'","''",$today);
                $abstract = str_replace("'","''",$abstract);
                $key = str_replace("'","''",$key);
                $address = str_replace("'","''",$address);
                $designation = str_replace("'","''",$designation);
                $inst_name = str_replace("'","''",$inst_name);
                $inst_dept = str_replace("'","''",$inst_dept);
                $inst_address = str_replace("'","''",$inst_address);
                
                
                $email=strtolower($email);
                
                $que="insert into application_temp values('$fname','$mname','$lname','$appid','$email','$mob','$dob','$title','$today','$abstract','$key','$address','$designation','$inst_name' ,'$inst_dept' ,'$inst_address',1)";
                //echo '<script>console.log("$que");</script>';
               
                @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
                $_SESSION['progress'] = 1;
                $_SESSION['appid'] = $appid;
                $_SESSION['currentshow'] = 1;
                
                echo "<div style='width: 100%; text-align: center; padding-bottom: 2px;'>
                        <label><i style='font-size: 64px; color: green;' class='material-icons'>done</i></label>
                        <br /><label style='font-size: 24px;'>Your Temporary Application Number: <b>$appid</b></label>
                        <br /><label>Please note it down for future reference</label>
                        <br /><br />
                        <div style='background-color: white;padding: 5px;border-radius: 2px;'>This temporary application number will be valid for next 28 days. <br />You have to fill the application completely and submit it within next 28 days.</div>
     
                        <button type='submit' name='gotofiiling' style='margin-top: 9px;' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent'>
                        Proceed to fill rest of the application
                        </button>
                        <br />
                        <label><b> | O R | </b></label>
                        <br />
                        <label> You can fill it within next 28 days by visiting <a href='applynew.php'>this link</a></label>
                        <br />
                        </div>";
               
                }
                else
                {
                echo "<script>wrongiddialog(1)</script><a href='newform.php'>Fill Application Form</a>";
                }
            }
            else
            {
                echo "<script>wrongiddialog(2)</script><a href='newform.php'>Fill Application Form</a>";
            }
            
            }
            else
            {
                echo "<script>wrongiddialog(2)</script><a href='newform.php'>Fill Application Form</a>";
            }
            
}

 ?>     


    </div>



        </div>
        
        </form>
        
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

