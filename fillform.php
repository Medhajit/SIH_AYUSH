<?php

date_default_timezone_set('Asia/Kolkata');
session_start();

$progress= -1;
$appid;
if(isset($_SESSION['progress']) && isset($_SESSION['appid']))
{
    $progress= $_SESSION['progress'];
    //echo $progress;
    $currentshow = $_SESSION['currentshow'];
    //if($currentshow>4)
    //echo "<script>redirectreview();</script>";
    $appid = $_SESSION['appid'];
}
else
{
    
    header ("location: applynew.php");
  
}
?> 
 
 
 <html>
  <head>
  <title>Apply Online</title>
  <style>
  .dialog-substitute{
    z-index: 5;
    position: fixed;
    border: none;
    box-shadow: 0 9px 46px 8px rgba(0,0,0,.14), 0 11px 15px -7px rgba(0,0,0,.12), 0 24px 38px 3px rgba(0,0,0,.2);
    background-color: white;
  }
  
  </style>
    <!-- Material Design Lite -->
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<dialog id="wrongdialog1" class="mdl-dialog" style="text-align: center;">
  <h4 class="mdl-dialog__title"><i class="material-icons" style="font-size: 48px;">error</i></h4>
  <div class="mdl-dialog__content">
    <p>
      Please fill up all the necessary fields
    </p>
  </div>
  <div class="mdl-dialog__actions">
    <button type="button" class="mdl-button" >Ok</button>
  </div>
</dialog> 




<dialog id="fileerror" class="mdl-dialog" style="text-align: center;">
  <h4 class="mdl-dialog__title"><i class="material-icons" style="font-size: 48px;">error</i></h4>
  <div class="mdl-dialog__content">
    <p>
      File Error
    </p>
  </div>
  <div class="mdl-dialog__actions">
    <button type="button" class="mdl-button" >Ok</button>
  </div>
</dialog> 

<dialog id="instructiondialog_s2_title" style="width:60%" class="mdl-dialog" style="text-align: center;">
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

<dialog id="instructiondialog_s2_objectives" style="width:60%" class="mdl-dialog" style="text-align: center;">
  <h5 class="mdl-dialog__title" style="font-size: 20px; color: #406c95">Instructions</h5>
  <div class="mdl-dialog__content" style="color: black;">
    <ul>
    <li>Should meet SMART criteria - Specific, Measurable, Assignable, Realistic, Time related</li>
    <li>Primary &amp; Secondary objectives should be clearly and separately mentioned in respect of the topic selected for the study</li>
    </ul>
  </div>
  <div class="mdl-dialog__actions">
    <button type="button" class="mdl-button" >close</button>
  </div>
</dialog> 

<dialog id="instructiondialog_s2_introduction" style="width:60%" class="mdl-dialog" style="text-align: center;">
  <h5 class="mdl-dialog__title" style="font-size: 20px; color: #406c95">Instructions</h5>
  <div class="mdl-dialog__content" style="color: black;">
    <ul>
    <li>Clearly mention rationale of the research project</li>
    <li>Previous knowledge of about the subject</li>
    <li>Name and description of the investigational product(s)</li>
    <li>Summary of findings from non-clinical studies that potentially have clinical significance and from clinical trials that are relevant to the trial</li>
    <li>Description of the population to be studied</li>
    <li>Summary of the known and potential risks and benefits, if any, to human subjects</li>
    <li>Statement that the trial will be conducted in compliance with the protocol, GCP and the applicable regulatory requirement(s)</li>
    <li>Should have relevant epidemiological data</li>
    <li>Should clearly mention the solutions to bridge the existing knowledge gaps</li>
    </ul>
  </div>
  <div class="mdl-dialog__actions">
    <button type="button" class="mdl-button" >close</button>
  </div>
</dialog> 
    

<dialog id="instructiondialog_s2_review_lit" style="width:60%" class="mdl-dialog" style="text-align: center;">
  <h5 class="mdl-dialog__title" style="font-size: 20px; color: #406c95">Instructions</h5>
  <div class="mdl-dialog__content" style="color: black;">
    <ul>
    <li>References to literature and data that are relevant to the trial, and that provide background for the trial</li>
    <li>Classical &amp; Contemporary review relevant to the present research project</li>
    <li>Should specify existing knowledge gap for the stated problem</li>
    <li>Should justify title of the project</li>
    </ul>
  </div>
  <div class="mdl-dialog__actions">
    <button type="button" class="mdl-button" >close</button>
  </div>
</dialog>     

<div class="dialog-substitute" id="instructiondialog_s2_title_substitute" style="width:60%; right: 20%; top: 10%; display: none">
<h5 class="mdl-dialog__title" style="font-size: 20px; color: #406c95">Instructions</h5>
  <div class="mdl-dialog__content" style="color: black;">
    <ul>
    <li>Title should be clear, concise and brief</li>
    <li>Title should have mention important variables related to the project</li>
    <li>Title should reflect project design and primary objectives and target population</li>
    </ul>
  </div>
  <div class="mdl-dialog__actions">
    <button type="button" class="mdl-button" onclick="document.getElementById('instructiondialog_s2_title_substitute').style.display='none'">close</button>
  </div>
</div>     


<div class="dialog-substitute" id="instructiondialog_s2_objectives_substitute" style="width:60%; right: 20%; top: 10%; display: none">
<h5 class="mdl-dialog__title" style="font-size: 20px; color: #406c95">Instructions</h5>
  <div class="mdl-dialog__content" style="color: black;">
    <ul>
    <li>Should meet SMART criteria - Specific, Measurable, Assignable, Realistic, Time related</li>
    <li>Primary &amp; Secondary objectives should be clearly and separately mentioned in respect of the topic selected for the study</li>
    </ul>
  </div>
  <div class="mdl-dialog__actions">
    <button type="button" class="mdl-button" onclick="document.getElementById('instructiondialog_s2_objectives_substitute').style.display='none'">close</button>
  </div>
</div>     



    <div class="dialog-substitute" id="instructiondialog_s2_introduction_substitute" style="width:60%; right: 20%; top: 10%; display: none">

<h5 class="mdl-dialog__title" style="font-size: 20px; color: #406c95">Instructions</h5>
  <div class="mdl-dialog__content" style="color: black;">
    <ul>
    <li>Clearly mention rationale of the research project</li>
    <li>Previous knowledge of about the subject</li>
    <li>Name and description of the investigational product(s)</li>
    <li>Summary of findings from non-clinical studies that potentially have clinical significance and from clinical trials that are relevant to the trial</li>
    <li>Description of the population to be studied</li>
    <li>Summary of the known and potential risks and benefits, if any, to human subjects</li>
    <li>Statement that the trial will be conducted in compliance with the protocol, GCP and the applicable regulatory requirement(s)</li>
    <li>Should have relevant epidemiological data</li>
    <li>Should clearly mention the solutions to bridge the existing knowledge gaps</li>
    </ul>
  </div>
  <div class="mdl-dialog__actions">
    <button type="button" class="mdl-button" onclick="document.getElementById('instructiondialog_s2_introduction_substitute').style.display='none'">close</button>
  </div>
</div>     


   
<div class="dialog-substitute" id="instructiondialog_s2_review_lit_substitute" style="width:60%; right: 20%; top: 10%; display: none">

<h5 class="mdl-dialog__title" style="font-size: 20px; color: #406c95">Instructions</h5>
  <div class="mdl-dialog__content" style="color: black;">
    <ul>
    <li>References to literature and data that are relevant to the trial, and that provide background for the trial</li>
    <li>Classical &amp; Contemporary review relevant to the present research project</li>
    <li>Should specify existing knowledge gap for the stated problem</li>
    <li>Should justify title of the project</li>
    </ul>
  </div>
  <div class="mdl-dialog__actions">
    <button type="button" class="mdl-button" onclick="document.getElementById('instructiondialog_s2_review_lit_substitute').style.display='none'">close</button>
  </div>
</div>     

   
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
        



    var submitFormOkay = false;
    window.onbeforeunload = function(e) {
    if (submitFormOkay == false) {
        return "Changes you made will be lost if you don't save them";
        }
       
    };

    
    window.unload = function(e) {
       return "Changes you made will be lost if you don't save them";
    };
 
</script>    
<script>

//function for section 1
function initialtickbox(chk,progress)
{
    if(progress>1)
    {
        document.getElementById(chk).checked = true;
    }
    checker();
    
}
function alertFilename(labelname) {
    var filediv=document.getElementById(labelname+'filename');
    var filename = document.getElementById(labelname).value;
    var name = filename.split("\\")
    var ext = filename.match(/\.([^\.]+)$/)[1];
    switch(ext)
    {
        case 'pdf':
            if(filename != "") {
                
            filediv.innerHTML = "<label style='font-family: Lato; color: gray;'>Selected file : </label><label style='font-family: Lato; color: black;'>"+name[name.length - 1]+"</label>";
            }
            else
            {
            filediv.innerHTML = "";
            }
            break;
        default:
            filediv.innerHTML='<label style="color: red;">Please select pdf document</label>';
            document.getElementById(labelname).value = '';
    }
    
    if(labelname=='s1_ethics_file')
        document.getElementById('filechange').value = 1;
    
    
    
    
}


 function addcoinvestigator()
 {
    var count = document.getElementById("countcoinvestigator").value;
    count++;
    
  
   var htmlcode = '<div id="coinvestigator_'+count+'" style="padding: 0px 40px 0px 40px;text-align: center;border-radius: 5px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out;margin-bottom:10px; background-color: white; height: 350px;"><div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 20px"><i id="removebtn'+count+'" type="button" onclick="removecoinvestigator();" class="material-icons" style="font-size: 36px;margin: 0px;padding:  0px;float: left;color:  red;cursor:  pointer;">highlight_off</i><label style="background-color: white;padding: 5px 5px 15px 5px;font-size: 20px;">Details of Co-investigator '+count+'</label><br /><br /><label class="fieldheader">Name</label><br /><div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"><input class="mdl-textfield__input" type="text" id="section1_coivestigator_'+count+'_name" name="section1_coivestigator_'+count+'_name" required style="border-color: blue;"><span class="mdl-textfield__error">Please enter name of the co-investigator</span></div><br /><br /><br /><label class="fieldheader">Designation</label><br /><div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"><input class="mdl-textfield__input" type="text" id="section1_coivestigator_'+count+'_designation" name="section1_coivestigator_'+count+'_designation" required style="border-color: blue;"><span class="mdl-textfield__error">Please enter designation of the co-investigator</span></div></div><div style="text-align: left; float: right; width: 38%; padding: 20px 20px 20px 20px;"><label class="fieldheader">Email Id</label><br /><div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"><input class="mdl-textfield__input" type="email" id="section1_coivestigator_'+count+'_email" name="section1_coivestigator_'+count+'_email" required style="border-color: blue;"><span class="mdl-textfield__error">Please enter email id of the co-investigator</span></div><br /><br /><br /><label class="fieldheader">Address</label><br /><div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"><textarea class="mdl-textfield__input" type="text" rows= "4" id="section1_coivestigator_'+count+'_address" name="section1_coivestigator_'+count+'_address" style="border-color: blue; resize: none; outline: none;" required ></textarea>    <span class="mdl-textfield__error">Please enter the residential address of the co-investigator</span></div></div><br /><br /><div style="width: 100%; text-align: center;display: inline-block;height: 117px"><label class="fieldheader">Upload Bio Data</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" style="display:none" id="s1_coinvest_biodata_'+count+'" name="s1_coinvest_biodata_'+count+'" required="true" onchange="alertFilename(\'s1_coinvest_biodata_'+count+'\')"><label for="s1_coinvest_biodata_'+count+'" class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored" id="uploadselect"><i class="material-icons">attach_file</i></label><div class="mdl-tooltip" for="uploadselect">click here to select biodata in pdf format</div><div id="s1_coinvest_biodata_'+count+'filename" style></div><br />  <br />  <br /> </div></div>';
   document.getElementById("coinvestigator").insertAdjacentHTML('beforeend', htmlcode);
   document.getElementById("countcoinvestigator").value = count;
   for(var i=1;i<=count-1;i++)  {
   document.getElementById("removebtn"+i).style.display = "none";
   }

   //showorhideremovebutton();
   }
   

 function removecoinvestigator()
 {
    var count = document.getElementById("countcoinvestigator").value;
    var element = document.getElementById("coinvestigator_"+count);
    element.outerHTML = "";
    delete element;
    count--;
    if(count!=0)
    document.getElementById("removebtn"+count).style.display = "block";
    document.getElementById("countcoinvestigator").value = count;
    //showorhideremovebutton();
 }

 function initialcoinvestigatorload(htmlcode) {
     document.getElementById("coinvestigator").innerHTML =  htmlcode;
     
}

function sum(id) {
    splitted = id.split("_");
    total_sum=0.0;
    for(var i=1; i<=3; i++)
    {
        var name = splitted[0]+"_"+splitted[1]+"_yr"+i+"_"+splitted[3];
        if(document.getElementById(name).value != "")
        total_sum = total_sum + parseFloat(document.getElementById(name).value);
        console.log(document.getElementById(name).value);
    }
    
    var name = splitted[0]+"_"+splitted[1]+"_total_"+splitted[3];
    document.getElementById(name).value = total_sum;
    
}

function initialfileload(filebuttonname,filename)
{
    if(filename!="")
    {
        var filediv=document.getElementById(filebuttonname+'filename');
        filediv.innerHTML = "A file has already been uploaded. Click here to <a target='_blank' href='application_documents/"+filename+"'>view the file</a>";
        //filebuttonname.value='application_documents/'+filename;
        //alert("<a href='application_documents/"+filename+">viewfile</a>");
    }
} 

function checker() {
    if(document.getElementById('confirm').checked)
    {
        document.getElementById('s1_sbt').style.display = 'block';
    }
    else
    {
        document.getElementById('s1_sbt').style.display = 'none';
    }
}
//
//function for section 2
function focusonotherbox(nameoftheradio) {
    
    document.getElementById(nameoftheradio+"_others_label").style.display="block";
    document.getElementById(nameoftheradio+"_others").focus();

}
function unselectother(nameoftheradio) {
    document.getElementById(nameoftheradio+"_others").value="";
    document.getElementById(nameoftheradio+"_others_label").style.display="none";

}
function radioselector(radioname,valuestored)
{
var radios = document.getElementsByName(radioname);
var othersflag = 1;
for (var i = 0, length = radios.length; i < length; i++) {
    if (radios[i].value == valuestored) {
        //document.getElementByName(radios[i]).checked = true;
        radios[i].checked = true;
        othersflag = 0;
        break;
    }
}
if (othersflag == 1 && radios[radios.length - 1].value=='--Others--' && valuestored!=""){
    radios[radios.length - 1].checked = true;
    document.getElementById(radioname+"_others").value = valuestored;
    document.getElementById(radioname+"_others_label").style.display="block";
}
}
//
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


function wrongiddialog(errornumber){
    if(!isChrome())
    {
        alert('Please fill up all the necessary fields');
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

function uploadalertdialog() 
    {
        if(!isChrome())
    {
        alert('File error');
    }
    else
    {
        var dialog = document.querySelector('#fileerror');
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
function redirectinitial() {
    
     window.location = 'applynew.php';
}  
*/
function redirectreview() {
    window.location = 'review.php';
}

function buttonhighlighter(currentshow,progress) {
    if(progress>4)
        progress=4;
    for(var i=0;i<=progress;i++)
    {
        if(i==currentshow)
        {
            document.getElementById("b"+i).style.background = "white";
            document.getElementById("b"+i).style.color = "black";
        }
        else
        {
            document.getElementById("b"+i).style.background = "#005198";
            document.getElementById("b"+i).style.color = "white";
        }
    }
}

//for section 4
function toggletopintro(mode)
{
    if(mode==1)
    {
        document.getElementById('showtopintro').style.display='none';
        document.getElementById('showintro').style.display='block';
    }
    else if(mode==0)
    {
        document.getElementById('showtopintro').style.display='block';
        document.getElementById('showintro').style.display='none';
    }
}


//journal

function add_ref_journal()
 {
    var count = document.getElementById("s4_ref_journal_count").value;
    count++;
    
  
   var htmlcode = '<div id="ref_journal_'+count+'" style="padding: 0px 40px 0px 40px;text-align: center;border-radius: 5px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out;margin-bottom:10px; background-color: white; height: 350px;"> <div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 20px"> <i id="removebtn_ref_journal'+count+'" type="button" onclick="removerefjournal();" class="material-icons" style="font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;">highlight_off</i> <label style="background-color: white;padding: 5px 5px 15px 5px;font-size: 20px;">Reference Number <input type="text" id="section4_ref_journal_'+count+'_refnumber"  style="width: 50px;height: 29px;margin-left: 6px;border: 2px solid black;padding: 2px;font-size: 20px;text-align: center;" name="section4_ref_journal_'+count+'_refnumber"></label><br /><br /> <label class="fieldheader">Authors Name</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_journal_'+count+'_auth_name" name="section4_ref_journal_'+count+'_auth_name" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Title of the Article</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_journal_'+count+'_title_article" name="section4_ref_journal_'+count+'_title_article" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Abbreviated Title of journal</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_journal_'+count+'_abb_title" name="section4_ref_journal_'+count+'_abb_title" required style="border-color: blue;"> </div> </div> <div style="text-align: left; float: right; width: 38%; padding: 20px 20px 20px 20px;"> <label class="fieldheader">Date of publication in YYYY/MM Format</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_journal_'+count+'_date" name="section4_ref_journal_'+count+'_date" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Volume Number</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_journal_'+count+'_vol" name="section4_ref_journal_'+count+'_vol" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Issue Numbers</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_journal_'+count+'_issue" name="section4_ref_journal_'+count+'_issue" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Page Number</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_journal_'+count+'_page" name="section4_ref_journal_'+count+'_page" required style="border-color: blue;"> </div> </div>';
   document.getElementById("ref_journal").insertAdjacentHTML('beforeend', htmlcode);
   document.getElementById("s4_ref_journal_count").value = count;
   for(var i=1;i<=count-1;i++)  {
   document.getElementById("removebtn_ref_journal"+i).style.display = "none";
   }
}

function removerefjournal()
 {
    var count = document.getElementById("s4_ref_journal_count").value;
    var element = document.getElementById("ref_journal_"+count);
    element.outerHTML = "";
    delete element;
    count--;
    if(count!=0)
    document.getElementById("removebtn_ref_journal"+count).style.display = "block";
    document.getElementById("s4_ref_journal_count").value = count;
    //showorhideremovebutton();
 }
 
function initialref_journalload(htmlcode) {
     document.getElementById("ref_journal").innerHTML =  htmlcode;
     
}


//journal


//books

function add_ref_book()
 {
    var count = document.getElementById("s4_ref_book_count").value;
    count++;
    
  
   var htmlcode = '<div id="ref_book_'+count+'" style="padding: 0px 40px 0px 40px;text-align: center;border-radius: 5px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out;margin-bottom:10px; background-color: white; height: 350px;"> <div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 20px"> <i id="removebtn_ref_book'+count+'" type="button" onclick="removerefbook();" class="material-icons" style="font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;">highlight_off</i> <label style="background-color: white;padding: 5px 5px 15px 5px;font-size: 20px;">Reference Number <input type="text" id="section4_ref_book_'+count+'_refnumber"  style="width: 50px;height: 29px;margin-left: 6px;border: 2px solid black;padding: 2px;font-size: 20px;text-align: center;" name="section4_ref_book_'+count+'_refnumber"></label><br /><br /> <label class="fieldheader">Author\'s Name</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_book_'+count+'_auth_name" name="section4_ref_book_'+count+'_auth_name" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Title of Book</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_book_'+count+'_title_book" name="section4_ref_book_'+count+'_title_book" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Edition(if not first)</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_book_'+count+'_edition" name="section4_ref_book_'+count+'_edition" required style="border-color: blue;"> </div> </div> <div style="text-align: left; float: right; width: 38%; padding: 20px 20px 20px 20px;"> <label class="fieldheader">Place of Publication</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_book_'+count+'_place_publication" name="section4_ref_book_'+count+'_place_publication" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Publisher</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_book_'+count+'_publisher" name="section4_ref_book_'+count+'_publisher" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Year of Publication</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_book_'+count+'_year_publication" name="section4_ref_book_'+count+'_year_publication" required style="border-color: blue;"> </div> </div> <br /><br /> </div>';
   
   
   
   
   
   
   document.getElementById("ref_book").insertAdjacentHTML('beforeend', htmlcode);
   document.getElementById("s4_ref_book_count").value = count;
   for(var i=1;i<=count-1;i++)  {
   document.getElementById("removebtn_ref_book"+i).style.display = "none";
   }
}

function removerefbook()
 {
    var count = document.getElementById("s4_ref_book_count").value;
    var element = document.getElementById("ref_book_"+count);
    element.outerHTML = "";
    delete element;
    count--;
    if(count!=0)
    document.getElementById("removebtn_ref_book"+count).style.display = "block";
    document.getElementById("s4_ref_book_count").value = count;
    //showorhideremovebutton();
 }
 
function initialref_bookload(htmlcode) {
     document.getElementById("ref_book").innerHTML =  htmlcode;
     
}

//books

//reports

function add_ref_report()
 {
    var count = document.getElementById("s4_ref_report_count").value;
    count++;
    
  
   var htmlcode = '<div id="ref_report_'+count+'" style="padding: 0px 40px 0px 40px;text-align: center;border-radius: 5px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out;margin-bottom:10px; background-color: white; height: 350px;"> <div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 20px"> <i id="removebtn_ref_report'+count+'" type="button" onclick="removerefreport();" class="material-icons" style="font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;">highlight_off</i> <label style="background-color: white;padding: 5px 5px 15px 5px;font-size: 20px;">Reference Number <input type="text" id="section4_ref_report_'+count+'_refnumber"  style="width: 50px;height: 29px;margin-left: 6px;border: 2px solid black;padding: 2px;font-size: 20px;text-align: center;" name="section4_ref_report_'+count+'_refnumber"></label><br /><br /> <label class="fieldheader">Author\'s Name / Orgaanisation Name</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_report_'+count+'_auth_name" name="section4_ref_report_'+count+'_auth_name" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Title of Report</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_report_'+count+'_title_report" name="section4_ref_report_'+count+'_title_report" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Place of Publication</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_report_'+count+'_place_publication" name="section4_ref_report_'+count+'_place_publication" required style="border-color: blue;"> </div> </div> <div style="text-align: left; float: right; width: 38%; padding: 20px 20px 20px 20px;"><label class="fieldheader">Publisher</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_report_'+count+'_publisher" name="section4_ref_report_'+count+'_publisher" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Date of Publication</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_report_'+count+'_date_publication" name="section4_ref_report_'+count+'_date_publication" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Total Number of Pages</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_report_'+count+'_total_pages" name="section4_ref_report_'+count+'_total_pages" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Report Number</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_report_'+count+'_report_number" name="section4_ref_report_'+count+'_report_number" required style="border-color: blue;"> </div> </div> <br /><br /> </div>';
   document.getElementById("ref_report").insertAdjacentHTML('beforeend', htmlcode);
   document.getElementById("s4_ref_report_count").value = count;
   for(var i=1;i<=count-1;i++)  {
   document.getElementById("removebtn_ref_report"+i).style.display = "none";
   }
}

function removerefreport()
 {
    var count = document.getElementById("s4_ref_report_count").value;
    var element = document.getElementById("ref_report_"+count);
    element.outerHTML = "";
    delete element;
    count--;
    if(count!=0)
    document.getElementById("removebtn_ref_report"+count).style.display = "block";
    document.getElementById("s4_ref_report_count").value = count;
    //showorhideremovebutton();
 }
 function initialref_reportload(htmlcode) {
     document.getElementById("ref_report").innerHTML =  htmlcode;
     
}

//reports


//websites

function add_ref_website()
 {
    var count = document.getElementById("s4_ref_website_count").value;
    count++;
    
  
   var htmlcode = '<div id="ref_website_'+count+'" style="padding: 0px 40px 0px 40px;text-align: center;border-radius: 5px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out;margin-bottom:10px; background-color: white; height: 275px;"> <div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 20px"> <i id="removebtn_ref_website'+count+'" type="button" onclick="removerefwebsite();" class="material-icons" style="font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;">highlight_off</i> <label style="background-color: white;padding: 5px 5px 15px 5px;font-size: 20px;">Reference Number <input type="text" id="section4_ref_website_'+count+'_refnumber"  style="width: 50px;height: 29px;margin-left: 6px;border: 2px solid black;padding: 2px;font-size: 20px;text-align: center;" name="section4_ref_website_'+count+'_refnumber"></label><br /><br /> <label class="fieldheader">Author/Organisation Name</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_website_'+count+'_auth_name" name="section4_ref_website_'+count+'_auth_name" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Title of the Page</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_website_'+count+'_title_page" name="section4_ref_website_'+count+'_title_page" required style="border-color: blue;"> </div> </div> <div style="text-align: left; float: right; width: 38%; padding: 20px 20px 20px 20px;"> <label class="fieldheader">Place of Publication</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_website_'+count+'_place_publication" name="section4_ref_website_'+count+'_place_publication" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Publisher</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_website_'+count+'_publisher" name="section4_ref_website_'+count+'_publisher" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Date/Year of Publication</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_website_'+count+'_date_publication" name="section4_ref_website_'+count+'_date_publication" required style="border-color: blue;"> </div> </div> <br /><br /> </div>';
   document.getElementById("ref_website").insertAdjacentHTML('beforeend', htmlcode);
   document.getElementById("s4_ref_website_count").value = count;
   for(var i=1;i<=count-1;i++)  {
   document.getElementById("removebtn_ref_website"+i).style.display = "none";
   }
}

function removerefwebsite()
 {
    var count = document.getElementById("s4_ref_website_count").value;
    var element = document.getElementById("ref_website_"+count);
    element.outerHTML = "";
    delete element;
    count--;
    if(count!=0)
    document.getElementById("removebtn_ref_website"+count).style.display = "block";
    document.getElementById("s4_ref_website_count").value = count;
    //showorhideremovebutton();
 }
function initialref_websiteload(htmlcode) {
     document.getElementById("ref_website").innerHTML =  htmlcode;
     
}

//websites

//secondary

function add_ref_secondary()
 {
    var count = document.getElementById("s4_ref_secondary_count").value;
    count++;
    
  
   var htmlcode = '<div id="ref_secondary_'+count+'" style="padding: 0px 40px 0px 40px;text-align: center;border-radius: 5px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out;margin-bottom:10px; background-color: white; height: 320px;"> <div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 20px"> <i id="removebtn_ref_secondary'+count+'" type="button" onclick="removerefsecondary();" class="material-icons" style="font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;">highlight_off</i> <label style="background-color: white;padding: 5px 5px 15px 5px;font-size: 20px;">Reference Number <input type="text" id="section4_ref_secondary_'+count+'_refnumber"  style="width: 50px;height: 29px;margin-left: 6px;border: 2px solid black;padding: 2px;font-size: 20px;text-align: center;" name="section4_ref_secondary_'+count+'_refnumber"></label><br /><br /> <label class="fieldheader">Author\'s Name</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_secondary_'+count+'_auth_name" name="section4_ref_secondary_'+count+'_auth_name" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Title of Thesis</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_secondary_'+count+'_title_thesis" name="section4_ref_secondary_'+count+'_title_thesis" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Place of Publication</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_secondary_'+count+'_place_publication" name="section4_ref_secondary_'+count+'_place_publication" required style="border-color: blue;"> </div> </div> <div style="text-align: left; float: right; width: 38%; padding: 20px 20px 20px 20px;"><label class="fieldheader">Publisher</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_secondary_'+count+'_publisher" name="section4_ref_secondary_'+count+'_publisher" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Year of Publication</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_secondary_'+count+'_year_publication" name="section4_ref_secondary_'+count+'_year_publication" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader"> Number of Pages</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_secondary_'+count+'_number_pages" name="section4_ref_secondary_'+count+'_number_pages" required style="border-color: blue;"> </div> </div> <br /><br /> </div>';
   document.getElementById("ref_secondary").insertAdjacentHTML('beforeend', htmlcode);
   document.getElementById("s4_ref_secondary_count").value = count;
   for(var i=1;i<=count-1;i++)  {
   document.getElementById("removebtn_ref_secondary"+i).style.display = "none";
   }
}

function removerefsecondary()
 {
    var count = document.getElementById("s4_ref_secondary_count").value;
    var element = document.getElementById("ref_secondary_"+count);
    element.outerHTML = "";
    delete element;
    count--;
    if(count!=0)
    document.getElementById("removebtn_ref_secondary"+count).style.display = "block";
    document.getElementById("s4_ref_secondary_count").value = count;
    //showorhideremovebutton();
 }
 
 function initialref_secondaryload(htmlcode) {
     document.getElementById("ref_secondary").innerHTML =  htmlcode;
     
}

//secondary


//newspaper

function add_ref_newspaper()
 {
    var count = document.getElementById("s4_ref_newspaper_count").value;
    count++;
    
  
   var htmlcode ='<div id="ref_newspaper_'+count+'" style="padding: 0px 40px 0px 40px;text-align: center;border-radius: 5px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out;margin-bottom:10px; background-color: white; height: 400px;"> <div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 20px"> <i id="removebtn_ref_newspaper'+count+'" type="button" onclick="removerefnewspaper();" class="material-icons" style="font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;">highlight_off</i> <label style="background-color: white;padding: 5px 5px 15px 5px;font-size: 20px;">Reference Number <input type="text" id="section4_ref_newspaper_'+count+'_refnumber"  style="width: 50px;height: 29px;margin-left: 6px;border: 2px solid black;padding: 2px;font-size: 20px;text-align: center;" name="section4_ref_newspaper_'+count+'_refnumber"></label><br /><br /> <label class="fieldheader">Author\'s Name</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_newspaper_'+count+'_auth_name" name="section4_ref_newspaper_'+count+'_auth_name" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Title of Article</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_newspaper_'+count+'_title_article" name="section4_ref_newspaper_'+count+'_title_article" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Newspaper Title</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_newspaper_'+count+'_title_newspaper" name="section4_ref_newspaper_'+count+'_title_newspaper" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Place of Publication</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_newspaper_'+count+'_place_publication" name="section4_ref_newspaper_'+count+'_place_publication" required style="border-color: blue;"> </div> </div> <div style="text-align: left; float: right; width: 38%; padding: 20px 20px 20px 20px;"><label class="fieldheader">Date of Publication</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_newspaper_'+count+'_date_publication" name="section4_ref_newspaper_'+count+'_date_publication" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Section</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_newspaper_'+count+'_section" name="section4_ref_newspaper_'+count+'_section" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Location</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_newspaper_'+count+'_location" name="section4_ref_newspaper_'+count+'_location" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Cited on YYYY MM DD</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_newspaper_'+count+'_cited" name="section4_ref_newspaper_'+count+'_cited" required style="border-color: blue;"> </div> </div> <br /><br /> </div>';
   document.getElementById("ref_newspaper").insertAdjacentHTML('beforeend', htmlcode);
   document.getElementById("s4_ref_newspaper_count").value = count;
   for(var i=1;i<=count-1;i++)  {
   document.getElementById("removebtn_ref_newspaper"+i).style.display = "none";
   }
}

function removerefnewspaper()
 {
    var count = document.getElementById("s4_ref_newspaper_count").value;
    var element = document.getElementById("ref_newspaper_"+count);
    element.outerHTML = "";
    delete element;
    count--;
    if(count!=0)
    document.getElementById("removebtn_ref_newspaper"+count).style.display = "block";
    document.getElementById("s4_ref_newspaper_count").value = count;
    //showorhideremovebutton();
 }

function initialref_newspaperload(htmlcode) {
     document.getElementById("ref_newspaper").innerHTML =  htmlcode;
     
}
//newspaper


//encyclopedia

function add_ref_encyclopedia()
 {
    var count = document.getElementById("s4_ref_encyclopedia_count").value;
    count++;
    
  
   var htmlcode = '<div id="ref_encyclopedia_'+count+'" style="padding: 0px 40px 0px 40px;text-align: center;border-radius: 5px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out;margin-bottom:10px; background-color: white; height: 350px;"> <div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 20px"> <i id="removebtn_ref_encyclopedia'+count+'" type="button" onclick="removerefencyclopedia();" class="material-icons" style="font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;">highlight_off</i> <label style="background-color: white;padding: 5px 5px 15px 5px;font-size: 20px;">Reference Number <input type="text" id="section4_ref_encyclopedia_'+count+'_refnumber"  style="width: 50px;height: 29px;margin-left: 6px;border: 2px solid black;padding: 2px;font-size: 20px;text-align: center;" name="section4_ref_encyclopedia_'+count+'_refnumber"></label><br /><br /> <label class="fieldheader">Author\'s Name</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_encyclopedia_'+count+'_auth_name" name="section4_ref_encyclopedia_'+count+'_auth_name" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Title of encyclopedia</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_encyclopedia_'+count+'_title_encyclopedia" name="section4_ref_encyclopedia_'+count+'_title_encyclopedia" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Place of Publication</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_encyclopedia_'+count+'_place_publication" name="section4_ref_encyclopedia_'+count+'_place_publication" required style="border-color: blue;"> </div> </div> <div style="text-align: left; float: right; width: 38%; padding: 20px 20px 20px 20px;"> <label class="fieldheader">Publisher</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_encyclopedia_'+count+'_publisher" name="section4_ref_encyclopedia_'+count+'_publisher" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Year of Publication</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_encyclopedia_'+count+'_year_publication" name="section4_ref_encyclopedia_'+count+'_year_publication" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Title of Article</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_encyclopedia_'+count+'_title_article" name="section4_ref_encyclopedia_'+count+'_title_article" required style="border-color: blue;"> </div> <br /><br /><br /> <label class="fieldheader">Page Number</label><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_encyclopedia_'+count+'_page_number" name="section4_ref_encyclopedia_'+count+'_page_number" required style="border-color: blue;"> </div> </div> <br /><br /> </div>';
   document.getElementById("ref_encyclopedia").insertAdjacentHTML('beforeend', htmlcode);
   document.getElementById("s4_ref_encyclopedia_count").value = count;
   for(var i=1;i<=count-1;i++)  {
   document.getElementById("removebtn_ref_encyclopedia"+i).style.display = "none";
   }
}

function removerefencyclopedia()
 {
    var count = document.getElementById("s4_ref_encyclopedia_count").value;
    var element = document.getElementById("ref_encyclopedia_"+count);
    element.outerHTML = "";
    delete element;
    count--;
    if(count!=0)
    document.getElementById("removebtn_ref_encyclopedia"+count).style.display = "block";
    document.getElementById("s4_ref_encyclopedia_count").value = count;
    //showorhideremovebutton();
 }
 
 function initialref_encyclopediaload(htmlcode) {
     document.getElementById("ref_encyclopedia").innerHTML =  htmlcode;
     
}


//encyclopedia

//other

function add_ref_other()
 {
    var count = document.getElementById("s4_ref_other_count").value;
    count++;

   var htmlcode = '<div id="ref_other_'+count+'" style="padding: 0px 40px 0px 40px;text-align: center;border-radius: 5px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out;margin-bottom:10px; background-color: white; height: 120px;"> <div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 20px"> <i id="removebtn_ref_other'+count+'" type="button" onclick="removerefother();" class="material-icons" style="font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;">highlight_off</i> <label style="background-color: white;padding: 5px 5px 15px 5px;font-size: 20px;">Reference Number <input type="text" id="section4_ref_other_'+count+'_refnumber"  style="width: 50px;height: 29px;margin-left: 6px;border: 2px solid black;padding: 2px;font-size: 20px;text-align: center;" name="section4_ref_other_'+count+'_refnumber"></label> </div> <br /><br /> <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%"> <input class="mdl-textfield__input" type="text" id="section4_ref_other_'+count+'_details" name="section4_ref_other_'+count+'_details" required style="border-color: blue;"> </div> <br /><br /> </div>';
   document.getElementById("ref_other").insertAdjacentHTML('beforeend', htmlcode);
   document.getElementById("s4_ref_other_count").value = count;
   for(var i=1;i<=count-1;i++)  {
   document.getElementById("removebtn_ref_other"+i).style.display = "none";
   }
}

function removerefother()
 {
    var count = document.getElementById("s4_ref_other_count").value;
    var element = document.getElementById("ref_other_"+count);
    element.outerHTML = "";
    delete element;
    count--;
    if(count!=0)
    document.getElementById("removebtn_ref_other"+count).style.display = "block";
    document.getElementById("s4_ref_other_count").value = count;
    //showorhideremovebutton();
 }
 
 function initialref_otherload(htmlcode) {
     document.getElementById("ref_other").innerHTML =  htmlcode;
     
}

//other

</script>  


<script>



function initialValueLoaderSalary(serial,justification,year1,year2,year3,total) {

    
   var name = "s4_salary_justif"+serial;
   document.getElementById(name).value = justification;
   var name = "s4_salary_yr1_serial"+serial;
   document.getElementById(name).value = year1;
   var name = "s4_salary_yr2_serial"+serial;
   document.getElementById(name).value = year2;
   var name = "s4_salary_yr3_serial"+serial;
   document.getElementById(name).value = year3;
   var name = "s4_salary_total_serial"+serial;
   document.getElementById(name).value = total;
}

function initialValueLoaderNonRecurringOthers(serial,head,justification,year1,year2,year3,total) {

    
   var name = "s4_other_name"+serial;
   document.getElementById(name).value = head;
   var name = "s4_other_justif"+serial;
   document.getElementById(name).value = justification;
   var name = "s4_other_yr1_serial"+serial;
   document.getElementById(name).value = year1;
   var name = "s4_other_yr2_serial"+serial;
   document.getElementById(name).value = year2;
   var name = "s4_other_yr3_serial"+serial;
   document.getElementById(name).value = year3;
   var name = "s4_other_total_serial"+serial;
   document.getElementById(name).value = total;
}


function initialValueLoaderEquip(serial,justification,year1,year2,year3,total) {

    
   var name = "s4_equip_justif"+serial;
   document.getElementById(name).value = justification;
   var name = "s4_equip_yr1_serial"+serial;
   document.getElementById(name).value = year1;
   var name = "s4_equip_yr2_serial"+serial;
   document.getElementById(name).value = year2;
   var name = "s4_equip_yr3_serial"+serial;
   document.getElementById(name).value = year3;
   var name = "s4_equip_total_serial"+serial;
   document.getElementById(name).value = total;
}

	var index = 1;
    function insertRowSalary() {
                
                var table=document.getElementById("s4_salary");
                var row=table.insertRow(table.rows.length);
                var salary_count = document.getElementById("s4_salary_count").value;
                salary_count++;
                document.getElementById("s4_salary_count").value = salary_count ;
                var cell0=row.insertCell(0);
                
                var t0=document.createElement("div");
                t0.innerHTML=index+1;
                t0.setAttribute("class", "mdl-data-table__cell--non-numeric");
                var t01=document.createElement("div");
    			t01.setAttribute("class","sourceText");
    			t01.innerHTML = '<i class="material-icons" id="s4_removeIconSalary'+index+'" style="cursor:pointer;">highlight_off</i>'; 
    			t01.setAttribute("style","margin:-20 0 0 60");
    			t01.addEventListener("click", removeRowSalary);              
                t0.append(t01);
                cell0.appendChild(t0);

  		  		var cell1=row.insertCell(1);
                cell1.setAttribute("style","padding:0 20 12 0");
                var t1 = document.createElement("div");
    			t1.setAttribute("class", "mdl-textfield mdl-js-textfield");
    			t1.setAttribute("style","padding:0;width:150");
    			var textarea = document.createElement("textarea");
    			textarea.setAttribute("class", "mdl-textfield__input scrollable");
    			textarea.setAttribute("type", "text");
    			textarea.setAttribute("style","border-bottom-color:blue;height:40px;resize: none; outline: none; white-space:pre-wrap;");
                textarea.id = "s4_salary_justif"+(index+1);
                textarea.name = "s4_salary_justif"+(index+1);
                var spanEl = document.createElement("span");
                spanEl.setAttribute("class", "mdl-textfield__error");                
                txt = document.createTextNode("Please enter justification");
                spanEl.setAttribute("style","visibility:visible;");
                spanEl.append(txt);             
                t1.appendChild(textarea);
                t1.appendChild(spanEl);
                cell1.appendChild(t1);
                
                var cell2=row.insertCell(2);
                cell2.setAttribute("style","padding:0 20 5 0");
                var t2=document.createElement("div");
                t2.setAttribute("class", "mdl-textfield mdl-js-textfield");
                t2.setAttribute("style","padding:0;width:150");
				var input = document.createElement("input");
    			input.setAttribute("class", "mdl-textfield__input");
    			input.setAttribute("type", "text");
    			input.setAttribute("style","border-bottom: 1px solid blue;padding-bottom: 13px;");
    			input.setAttribute("pattern","-?[0-9]*(\.[0-9]+)?");
                input.setAttribute("required","true");
    			input.setAttribute("oninput","sum('s4_salary_yr1_serial"+(index+1)+"')"); 
    			input.id="s4_salary_yr1_serial"+(index+1);
                input.name="s4_salary_yr1_serial"+(index+1);
                var spanEl = document.createElement("span");
                spanEl.setAttribute("class", "mdl-textfield__error");                
                txt = document.createTextNode("Please enter a number");
                spanEl.setAttribute("style","visibility:visible;");
                spanEl.append(txt);             
                t2.appendChild(input);
                t2.appendChild(spanEl);
                cell2.appendChild(t2);

                var cell3=row.insertCell(3);
                cell3.setAttribute("style","padding:0 20 5 0");
                var t3=document.createElement("div");
                t3.setAttribute("class", "mdl-textfield mdl-js-textfield");
                t3.setAttribute("style","padding:0;width:150");
				var input = document.createElement("input");
    			input.setAttribute("class", "mdl-textfield__input");
    			input.setAttribute("type", "text");
    			input.setAttribute("style","border-bottom: 1px solid blue;padding-bottom: 13px;");
    			input.setAttribute("pattern","-?[0-9]*(\.[0-9]+)?");
                input.setAttribute("required","true");
    			input.setAttribute("oninput","sum('s4_salary_yr2_serial"+(index+1)+"')"); 
    			input.id="s4_salary_yr2_serial"+(index+1);
                input.name="s4_salary_yr2_serial"+(index+1);    			
                var spanEl = document.createElement("span");
                spanEl.setAttribute("class", "mdl-textfield__error");                
                txt = document.createTextNode("Please enter a number");
                spanEl.setAttribute("style","visibility:visible;");
                spanEl.append(txt);             
                t3.appendChild(input);
                t3.appendChild(spanEl);
                cell3.appendChild(t3);

                var cell4=row.insertCell(4);
                cell4.setAttribute("style","padding:0 20 5 0");
                var t4=document.createElement("div");
                t4.setAttribute("class", "mdl-textfield mdl-js-textfield");
                t4.setAttribute("style","padding:0;width:150");
				var input = document.createElement("input");
    			input.setAttribute("class", "mdl-textfield__input");
    			input.setAttribute("type", "text");
    			input.setAttribute("style","border-bottom: 1px solid blue;padding-bottom: 13px;");
    			input.setAttribute("pattern","-?[0-9]*(\.[0-9]+)?");
                input.setAttribute("required","true");
    			input.setAttribute("oninput","sum('s4_salary_yr3_serial"+(index+1)+"')");
    			input.id="s4_salary_yr3_serial"+(index+1);
                input.name="s4_salary_yr3_serial"+(index+1);    			
                var spanEl = document.createElement("span");
                spanEl.setAttribute("class", "mdl-textfield__error");                
                txt = document.createTextNode("Please enter a number");
                spanEl.setAttribute("style","visibility:visible;");
                spanEl.append(txt);             
                t4.appendChild(input);
                t4.appendChild(spanEl);
                cell4.appendChild(t4);

                var cell5=row.insertCell(5);
                cell2.setAttribute("style","padding:0 20 5 0");
                var t5=document.createElement("div");
                t5.setAttribute("class", "mdl-textfield mdl-js-textfield");
                t5.setAttribute("style","padding:0;width:150");
				var input = document.createElement("input");
    			input.setAttribute("class", "mdl-textfield__input");
    			input.setAttribute("type", "text");
    			input.setAttribute("style","border-bottom: 1px solid blue;padding-bottom: 13px;");
    			input.setAttribute("pattern","-?[0-9]*(\.[0-9]+)?");
    			input.setAttribute("oninput","sum('s4_salary_total_serial"+(index+1)+"')");
    			input.id="s4_salary_total_serial"+(index+1);
                input.name="s4_salary_total_serial"+(index+1);
    			t5.appendChild(input);
                cell5.appendChild(t5);
                i=1;
                while(i<index)
		    	{
		    		document.getElementById("s4_removeIconSalary"+i).style.display = "none";
		    		i++;
		    	}
          		index++;



    }

    function removeRowSalary() {
    	var table=document.getElementById("s4_salary");
        var salary_count = document.getElementById("s4_salary_count").value;
        salary_count--;
        document.getElementById("s4_salary_count").value = salary_count ;
        var row= table.rows.length;        
        table.deleteRow(row-1);
    	index--;
    	if(index>1)
    	document.getElementById("s4_removeIconSalary"+(index-1)).style.display = "block";
    }

    var index1 = 1;
    function insertRowEquip() {
                
                var table=document.getElementById("s4_equip");
                var row=table.insertRow(table.rows.length);
                var equip_count = document.getElementById("s4_equip_count").value;
                equip_count++;
                document.getElementById("s4_equip_count").value = equip_count ;
                var cell0=row.insertCell(0);
                var t0=document.createElement("div");
                t0.innerHTML=index1+1;
                t0.setAttribute("class", "mdl-data-table__cell--non-numeric");
                t0.setAttribute("style","padding:0 0 0 0");
                var t01=document.createElement("div");
    			t01.setAttribute("class","sourceText");
    			t01.innerHTML = '<i class="material-icons" id="s4_removeIconEquip'+index1+'" style="cursor:pointer;"style="cursor:pointer;">highlight_off</i>'; 
    			t01.setAttribute("style","margin:-20 0 0 60");
    			t01.addEventListener("click", removeRowEquip);
    			t0.appendChild(t01);
                cell0.appendChild(t0);

  		  		var cell1=row.insertCell(1);
                cell1.setAttribute("style","padding:0 20 16 0");
                var t1 = document.createElement("div");
    			t1.setAttribute("class", "mdl-textfield mdl-js-textfield");
    			t1.setAttribute("style","padding:0;width:150");
    			var textarea = document.createElement("textarea");
    			textarea.setAttribute("class", "mdl-textfield__input scrollable");
    			textarea.setAttribute("type", "text");
    			textarea.setAttribute("style","border-bottom-color:blue;height:40px;resize: none; outline: none; white-space:pre-wrap;");
                textarea.setAttribute("required","true");
                textarea.id = "s4_equip_justif"+(index1+1);
                textarea.name = "s4_equip_justif"+(index1+1);
                var spanEl = document.createElement("span");
                spanEl.setAttribute("class", "mdl-textfield__error");                
                txt = document.createTextNode("Please enter justification");
                spanEl.setAttribute("style","visibility:visible;");
                spanEl.append(txt);             
                t1.appendChild(textarea);
                t1.appendChild(spanEl);
                cell1.appendChild(t1);

                var cell2=row.insertCell(2);
                cell2.setAttribute("style","padding:0 20 12 0");
                var t2=document.createElement("div");
                t2.setAttribute("class", "mdl-textfield mdl-js-textfield");
                t2.setAttribute("style","padding:0;width:150");
				var input = document.createElement("input");
    			input.setAttribute("class", "mdl-textfield__input");
    			input.setAttribute("type", "text");
    			input.setAttribute("style","border-bottom: 1px solid blue;padding-bottom: 13px;");
    			input.setAttribute("oninput","sum('s4_equip_yr1_serial"+(index1+1)+"')");
                input.setAttribute("required","true");
    			input.setAttribute("pattern","-?[0-9]*(\.[0-9]+)?");
    			input.id="s4_equip_yr1_serial"+(index1+1);
                input.name="s4_equip_yr1_serial"+(index1+1);
                var spanEl = document.createElement("span");
                spanEl.setAttribute("class", "mdl-textfield__error");                
                txt = document.createTextNode("Please enter a number");
                spanEl.setAttribute("style","visibility:visible;");
                spanEl.append(txt);             
                t2.appendChild(input);
                t2.appendChild(spanEl);
                cell2.appendChild(t2);

                var cell3=row.insertCell(3);
                cell3.setAttribute("style","padding:0 20 12 0");
                var t3=document.createElement("div");
                t3.setAttribute("class", "mdl-textfield mdl-js-textfield");
                t3.setAttribute("style","padding:0;width:150");
				var input = document.createElement("input");
    			input.setAttribute("class", "mdl-textfield__input");
    			input.setAttribute("type", "text");
    			input.setAttribute("style","border-bottom: 1px solid blue;padding-bottom: 13px;");
    			input.setAttribute("oninput","sum('s4_equip_yr2_serial"+(index1+1)+"')");
    			input.setAttribute("pattern","-?[0-9]*(\.[0-9]+)?");
                input.setAttribute("required","true");
    			input.id="s4_equip_yr2_serial"+(index1+1);
                input.name="s4_equip_yr2_serial"+(index1+1);
                var spanEl = document.createElement("span");
                spanEl.setAttribute("class", "mdl-textfield__error");                
                txt = document.createTextNode("Please enter a number");
                spanEl.setAttribute("style","visibility:visible;");
                spanEl.append(txt);             
                t3.appendChild(input);
                t3.appendChild(spanEl);
                cell3.appendChild(t3);

                var cell4=row.insertCell(4);
                cell4.setAttribute("style","padding:0 20 12 0");
                var t4=document.createElement("div");
                t4.setAttribute("class", "mdl-textfield mdl-js-textfield");
                t4.setAttribute("style","padding:0;width:150");
				var input = document.createElement("input");
    			input.setAttribute("class", "mdl-textfield__input");
    			input.setAttribute("type", "text");
    			input.setAttribute("style","border-bottom: 1px solid blue;padding-bottom: 13px;");
    			input.setAttribute("oninput","sum('s4_equip_yr3_serial"+(index1+1)+"')");
    			input.setAttribute("pattern","-?[0-9]*(\.[0-9]+)?");
                input.setAttribute("required","true");
    			input.id="s4_equip_yr3_serial"+(index1+1);
                input.name="s4_equip_yr3_serial"+(index1+1);
                var spanEl = document.createElement("span");
                spanEl.setAttribute("class", "mdl-textfield__error");                
                txt = document.createTextNode("Please enter a number");
                spanEl.setAttribute("style","visibility:visible;");
                spanEl.append(txt);             
                t4.appendChild(input);
                t4.appendChild(spanEl);
                cell4.appendChild(t4);

                var cell5=row.insertCell(5);
                cell5.setAttribute("style","padding:0 20 12 0");
                var t5=document.createElement("div");
                t5.setAttribute("class", "mdl-textfield mdl-js-textfield");
                t5.setAttribute("style","padding:0;width:150");
				var input = document.createElement("input");
    			input.setAttribute("class", "mdl-textfield__input");
    			input.setAttribute("type", "text");
    			input.setAttribute("style","border-bottom: 1px solid blue;padding-bottom: 13px;");
    			input.setAttribute("oninput","sum('s4_equip_total_serial"+(index1+1)+"')");
    			input.setAttribute("pattern","-?[0-9]*(\.[0-9]+)?");
    			input.id="s4_equip_total_serial"+(index1+1);
                input.name="s4_equip_total_serial"+(index1+1);
    			t5.appendChild(input);
                cell5.appendChild(t5);
                i=1;
                while(i<index1)
		    	{
		    		document.getElementById("s4_removeIconEquip"+i).style.display = "none";
		    		i++;
		    	}
          		index1++;

    }
    function removeRowEquip() {
    	var table=document.getElementById("s4_equip");
        var equip_count = document.getElementById("s4_equip_count").value;
        equip_count--;
        document.getElementById("s4_equip_count").value = equip_count ;
        var row= table.rows.length;        
        table.deleteRow(row-1);
    	index1--;
    	if(index1>1)
    	document.getElementById("s4_removeIconEquip"+(index1-1)).style.display = "block";

    }
    var index2 = 1;
    function insertRowOther(mode) {

				var s4_other = document.getElementById("s4_other").value;
				if(s4_other || mode == 2)
				{
                    var other_count = document.getElementById("s4_other_count").value;
                    other_count++;
                    document.getElementById("s4_other_count").value = other_count ; 
                    //s4_other_count.setAttribute("value",other_count);
	                var table=document.getElementById("s4_other_non_rec");
	                var row = (table.rows.length);
	                console.log("No. of rows : "+row);
	                var row=table.insertRow(table.rows.length);

	                var cell0=row.insertCell(0);
                    cell0.setAttribute("style", "padding:0 37 0 0;");
	                var t0=document.createElement("div");
	                //t0.innerHTML=s4_other;
	                //t0.setAttribute("class", "mdl-data-table__cell--non-numeric");
                    t0.setAttribute("class", "mdl-textfield mdl-js-textfield");
                    t0.setAttribute("style", "padding:5 0 0 0;width:171");
                    var input = document.createElement("input");
                    input.setAttribute("class", "mdl-textfield__input");
                    input.setAttribute("type", "text");
                    input.setAttribute("style","border-bottom:none;font-size:13px;");
                    input.setAttribute("required","true");
                    input.setAttribute("value",s4_other) ; 
                    input.id = "s4_other_name"+(index2);
                    input.name = "s4_other_name"+(index2);              
	                var t01=document.createElement("div");
	    			t01.setAttribute("class","sourceText");
	    			t01.innerHTML = '<i class="material-icons" id="s4_removeIcon'+index2+'" style="cursor:pointer;">highlight_off</i>'; 
	    			t01.setAttribute("style","margin:-20 0 0 0");
	    			t01.addEventListener("click", removeRowOther);     
                    t0.appendChild(input);         
	                t0.appendChild(t01);
	                cell0.appendChild(t0);
	                cell0.appendChild(t01);

	  		  		var cell1=row.insertCell(1);
                    cell1.setAttribute("style", "padding:0 20 12 0");
	                var t1 = document.createElement("div");
	    			t1.setAttribute("class", "mdl-textfield mdl-js-textfield");
	    			t1.setAttribute("style","padding:0;width:150");
	    			var textarea = document.createElement("textarea");
	    			textarea.setAttribute("class", "mdl-textfield__input scrollable");
	    			textarea.setAttribute("type", "text");
	    			textarea.setAttribute("style","border-bottom-color:blue;height:40px;resize: none; outline: none; white-space:pre-wrap;");
                    textarea.setAttribute("required","true");
	                textarea.id = "s4_other_justif"+(index2);
                    textarea.name = "s4_other_justif"+(index2);
                    var spanEl = document.createElement("span");
                    spanEl.setAttribute("class", "mdl-textfield__error");                
                    txt = document.createTextNode("Please enter justification");
                    spanEl.setAttribute("style","visibility:visible;");
                    spanEl.append(txt);             
                    t1.appendChild(textarea);
                    t1.appendChild(spanEl);
                    cell1.appendChild(t1);
	                
	                var cell2=row.insertCell(2);
                    cell2.setAttribute("style", "padding:0 20 4 0");
	                var t2=document.createElement("div");
	                t2.setAttribute("class", "mdl-textfield mdl-js-textfield");
	                t2.setAttribute("style","padding:0;width:150");
					var input = document.createElement("input");
	    			input.setAttribute("class", "mdl-textfield__input");
	    			input.setAttribute("type", "text");
	    			input.setAttribute("style","border-bottom: 1px solid blue;padding-bottom: 13px;");
	    			input.setAttribute("oninput","sum('s4_other_yr1_serial"+(index2)+"')");
                    input.setAttribute("pattern","-?[0-9]*(\.[0-9]+)?");
	    			input.setAttribute("required","true");
	    			input.id="s4_other_yr1_serial"+(index2);
                    input.name="s4_other_yr1_serial"+(index2);
	    			var spanEl = document.createElement("span");
                    spanEl.setAttribute("class", "mdl-textfield__error");                
                    txt = document.createTextNode("Please enter a number");
                    spanEl.setAttribute("style","visibility:visible;");
                    spanEl.append(txt);             
                    t2.appendChild(input);
                    t2.appendChild(spanEl);
                    cell2.appendChild(t2);

	                var cell3=row.insertCell(3);
                    cell3.setAttribute("style", "padding:0 20 4 0");
	                var t3=document.createElement("div");
	                t3.setAttribute("class", "mdl-textfield mdl-js-textfield");
	                t3.setAttribute("style","padding:0;width:150");
					var input = document.createElement("input");
	    			input.setAttribute("class", "mdl-textfield__input");
	    			input.setAttribute("type", "text");
	    			input.setAttribute("style","border-bottom: 1px solid blue;padding-bottom: 13px;");
	    			input.setAttribute("oninput","sum('s4_other_yr2_serial"+(index2)+"')");
	    			input.setAttribute("pattern","-?[0-9]*(\.[0-9]+)?");
                    input.setAttribute("required","true");
	    			input.id="s4_other_yr2_serial"+(index2);
                    input.name="s4_other_yr2_serial"+(index2);
                    var spanEl = document.createElement("span");
                    spanEl.setAttribute("class", "mdl-textfield__error");                
                    txt = document.createTextNode("Please enter a number");
                    spanEl.setAttribute("style","visibility:visible;");
                    spanEl.append(txt);
                    t3.appendChild(input);             
                    t3.appendChild(spanEl);	
	                cell3.appendChild(t3);

	                var cell4=row.insertCell(4);
                    cell4.setAttribute("style", "padding:0 20 4 0");
	                var t4=document.createElement("div");
	                t4.setAttribute("class", "mdl-textfield mdl-js-textfield");
	                t4.setAttribute("style","padding:0;width:150");
					var input = document.createElement("input");
	    			input.setAttribute("class", "mdl-textfield__input");
	    			input.setAttribute("type", "text");
	    			input.setAttribute("style","border-bottom: 1px solid blue;padding-bottom: 13px;");
	    			input.setAttribute("oninput","sum('s4_other_yr3_serial"+(index2)+"')");
	    			input.setAttribute("pattern","-?[0-9]*(\.[0-9]+)?");
                    input.setAttribute("required","true");
	    			input.id="s4_other_yr3_serial"+(index2); 
                    input.name="s4_other_yr3_serial"+(index2);
                    var spanEl = document.createElement("span");
                    spanEl.setAttribute("class", "mdl-textfield__error");                
                    txt = document.createTextNode("Please enter a number");
                    spanEl.setAttribute("style","visibility:visible;");
                    spanEl.append(txt);
                    t4.appendChild(input);             
                    t4.appendChild(spanEl);
	                cell4.appendChild(t4);

	                var cell5=row.insertCell(5);
	                var t5=document.createElement("div");
	                t5.setAttribute("class", "mdl-textfield mdl-js-textfield");
	                t5.setAttribute("style","padding:0;width:150");
					var input = document.createElement("input");
	    			input.setAttribute("class", "mdl-textfield__input");
	    			input.setAttribute("type", "text");
	    			input.setAttribute("style","border-bottom: 1px solid blue;padding-bottom: 13px;");
	    			input.setAttribute("oninput","sum('s4_other_total_serial"+(index2)+"')");
	    			input.setAttribute("pattern","-?[0-9]*(\.[0-9]+)?");
	    			input.id="s4_other_total_serial"+(index2);
                    input.name="s4_other_total_serial"+(index2);

	    			t5.appendChild(input);
	                cell5.appendChild(t5);
	                i=1;
	                while(i<index2)
			    	{
			    		document.getElementById("s4_removeIcon"+i).style.display = "none";
			    		i++;
			    	}
	          		index2++;
	          		document.getElementById('s4_other').value='';
          		}
	          	else
	      		{
	      			alert("Please enter some heading..");
	      		}

    }

    function removeRowOther() {
    	var table=document.getElementById("s4_other_non_rec");
        var other_count = document.getElementById("s4_other_count").value;
        other_count--;
        document.getElementById("s4_other_count").value = other_count ;
        var row= table.rows.length;        
        table.deleteRow(row-1);
    	index2--;
    	if(index2>1)
    	document.getElementById("s4_removeIcon"+(index2-1)).style.display = "block";

    }
</script>
   
    
    
    
    
    
    <style>
dialog{
    border-radius: 5px 18px 18px 18px; 
}
input{
    outline: none;
}
form{
    margin: 0px;
}
.fieldheader{
    color: #07006d;
    font-size: 20px;
}
.subheader{
    background-color: white;
    padding: 5px;
}
.makebox{
    
    padding: 5px 5px 20px 5px;
    border-radius: 5px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);
    box-sizing: border-box;
    transition: .2s;
    transition-timing-function: ease-in-out;
    margin-bottom: 10px;
    background-color: white;
    text-align: left;
}
.makebox:hover{

    box-shadow: 0px 4px 6px 0px rgba(219, 224, 24, 0.65);
}
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
    </style>





  </head>
  
  
  <?php
  
  

function radiovaluefinder($radioname) {
            $radiovalue = $_POST[$radioname];
            if($radiovalue == '--Others--')
                $radiovalue = $_POST[$radioname.'_others'];
                
            return $radiovalue;
}
function fileuploader($uploadbtnname,$maxsize,$newfilename) {
    //echo $_FILES[$uploadbtnname]['name'];
    if (!empty($_FILES[$uploadbtnname]['name']) && !file_exists("application_documents/" . $newfilename)) {
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
        $file_tmp = $_FILES[$uploadbtnname]['tmp_name'];
        move_uploaded_file($file_tmp,"application_documents/" . $newfilename);
        return "ok";
        }
        
        else
        {
            echo "<script>uploadalertdialog();</script>";
            //echo "$errortype";
        }
    }
    else if (!empty($_FILES[$uploadbtnname]['name']) && file_exists("application_documents/" . $newfilename)) {
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
        if(file_exists("application_documents/" . $newfilename)) 
            unlink("application_documents/" . $newfilename);
        $file_tmp = $_FILES[$uploadbtnname]['tmp_name'];
        move_uploaded_file($file_tmp,"application_documents/" . $newfilename);
        return "ok";
        }
        
        else
        {
            echo "<script>uploadalertdialog();</script>";
            //echo "$errortype";
        }
    }
    if (empty($_FILES[$uploadbtnname]['name']) && file_exists("application_documents/" . $newfilename)) {
        return "ok";
        }
    
    echo "<script>uploadalertdialog();</script>";
    
    
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
  
<?php


if(isset($_POST['b1']))
    $_SESSION['currentshow']=1;
if(isset($_POST['b2']))
    $_SESSION['currentshow']=2;
if(isset($_POST['b3']))
    $_SESSION['currentshow']=3; 
if(isset($_POST['b4']))
    $_SESSION['currentshow']=4; 
if(isset($_POST['b0']))
    $_SESSION['currentshow']=0;


    
// All section submit button    
if(isset($_POST['s1_sbt']))
{

    $s1_ethics_docname = $appid.'_ethics_committee_approval.pdf';
    $s1_principal_bio_docname = $appid.'_principal_investigator_bio.pdf';
    $optionalupdatevalue = 'ok';
    if($_POST['filechange'] == 1)
    {
        if(!empty($_FILES['s1_ethics_file']['name']))
        {
            $optionalupdatevalue = fileuploader('s1_ethics_file',5000000,$s1_ethics_docname);
            if(empty($_POST['section1_ethics_date']))
                {
                $optionalupdatevalue = 'notok';
                echo "<script>alert('If you are uploading approval file, then also provide the approval date.')</script>";
                }
        }     
        else
            $s1_ethics_docname='';
    }
    //s1_principal_investigator_biography
    if(isset($_POST['confirm']) && !empty($_POST['section1_ethics_name']) && fileuploader('s1_principal_investigator_biography',5000000,$s1_principal_bio_docname)=="ok" && $optionalupdatevalue=='ok')
    //if(!empty($_POST['section1_countcoinvestigator']) && !empty($_POST['section1_ethics_name']) && !empty($_POST['section1_ethics_date']) )
    
    {
        
    
    $s1_countcoinvestigator = $_POST['section1_countcoinvestigator'];
    $s1_colab_institute_name=$_POST['section1_colabinstitute_name'];
    $s1_colab_institute_telephone=$_POST['section1_colabinstitute_telephone'];
    $s1_colab_institute_fax=$_POST['section1_colabinstitute_fax'];
    $s1_colab_institute_email=$_POST['section1_colabinstitute_email'];
    $s1_colab_institute_address=$_POST['section1_colabinstitute_address'];
    $s1_ethics_name=$_POST['section1_ethics_name'];
    $s1_ethics_date=$_POST['section1_ethics_date'];
    $s1_approvalstatus = radiovaluefinder('s1_approvalstatus'); 
    $s1_pretrialperiod=$_POST['s1_pretrialperiod'];
    $s1_datacollectingperiod=$_POST['s1_datacollectingperiod'];
    $s1_analysisperiod=$_POST['s1_analysisperiod'];
    if($_SESSION['isuntouched']==0)
    {
         
    $que="delete from application_part_1 where appid = '$appid'";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
     
    $que="delete from application_part_1_sub1_coinvestigator where appid='$appid'";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
    
    }
    
     
    $s1_principal_bio_docname = str_replace("'","''",$s1_principal_bio_docname);
    $s1_countcoinvestigator = str_replace("'","''",$s1_countcoinvestigator);
    $s1_colab_institute_name = str_replace("'","''",$s1_colab_institute_name);
    $s1_colab_institute_telephone = str_replace("'","''",$s1_colab_institute_telephone);
    $s1_colab_institute_fax = str_replace("'","''",$s1_colab_institute_fax);
    $s1_colab_institute_email = str_replace("'","''",$s1_colab_institute_email);
    $s1_colab_institute_address = str_replace("'","''",$s1_colab_institute_address);
    $s1_ethics_name = str_replace("'","''",$s1_ethics_name);
    $s1_ethics_date = str_replace("'","''",$s1_ethics_date);
    $s1_ethics_docname = str_replace("'","''",$s1_ethics_docname);
    $s1_approvalstatus = str_replace("'","''",$s1_approvalstatus);
    $s1_pretrialperiod = str_replace("'","''",$s1_pretrialperiod);
    $s1_datacollectingperiod = str_replace("'","''",$s1_datacollectingperiod);
    $s1_analysisperiod = str_replace("'","''",$s1_analysisperiod);
    $que="insert into application_part_1 values('$appid','$s1_principal_bio_docname',$s1_countcoinvestigator,'$s1_colab_institute_name','$s1_colab_institute_telephone','$s1_colab_institute_fax','$s1_colab_institute_email','$s1_colab_institute_address','$s1_ethics_name','$s1_ethics_date','$s1_ethics_docname','$s1_approvalstatus','$s1_pretrialperiod','$s1_datacollectingperiod','$s1_analysisperiod')";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
    for($i=1;$i<=$s1_countcoinvestigator;$i++)
    {
        $coinvest_name=$_POST['section1_coivestigator_'.$i.'_name'];
        $coinvest_designation=$_POST['section1_coivestigator_'.$i.'_designation'];
   
        //section1_coivestigator_1_designation
        $coinvest_email=$_POST['section1_coivestigator_'.$i.'_email'];
        $coinvest_address=$_POST['section1_coivestigator_'.$i.'_address'];
        $s1_biodata_docname = $appid.'_coinvest_biodata_'.$i.'.pdf';
        if(fileuploader("s1_coinvest_biodata_$i",5000000,$s1_biodata_docname)=="ok")
        {
         
         
        $coinvest_name = str_replace("'","''",$coinvest_name);
        $coinvest_designation = str_replace("'","''",$coinvest_designation);
        $coinvest_email = str_replace("'","''",$coinvest_email);
        $coinvest_address = str_replace("'","''",$coinvest_address);
        $s1_biodata_docname= str_replace("'","''",$s1_biodata_docname);    
        $que="insert into application_part_1_sub1_coinvestigator values('$appid',$i,'$coinvest_name','$coinvest_designation','$coinvest_email','$coinvest_address','$s1_biodata_docname')";
        @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
        }
    }
     
    if($progress<2)
    {
        $_SESSION['progress']=2;
         
        $que="update application_temp SET progress=".$_SESSION['progress']." WHERE appid='$appid'";
        @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
    }

    $_SESSION['currentshow']=2;    
    }
    else
    echo "<script>wrongiddialog(1)</script>";
    
              
}

if(isset($_POST['s2_sbt']))
{
    if(!empty($_POST['s2_titleproj']) && !empty($_POST['s2_aimsproj']) && !empty($_POST['s2_introproj']) && !empty($_POST['s2_reviewproj']))
    {
    $s2_title_proj = $_POST['s2_titleproj'];
    $s2_aims_proj = $_POST['s2_aimsproj'];
    $s2_intro_proj = $_POST['s2_introproj'];
    $s2_literature_review = $_POST['s2_reviewproj'];
    
    if($_SESSION['isuntouched']==0)
    {
     
    $que="delete from application_part_2 where appid = '$appid'";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
    }
     
    $s2_aims_proj = str_replace("'","''",$s2_aims_proj);
    $s2_intro_proj = str_replace("'","''",$s2_intro_proj);
    $s2_literature_review = str_replace("'","''",$s2_literature_review);
    $que="insert into application_part_2 values('$appid','$s2_aims_proj','$s2_intro_proj','$s2_literature_review')";
    //echo "<script>console.log('$que');</script>";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
     
    $s2_title_proj = str_replace("'","''",$s2_title_proj);
    $que="update application_temp set app_title='$s2_title_proj' where appid = '$appid'";
    //echo "<script>console.log('$que');</script>";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
    
    
    
    
    if($progress<3)
    {
        $_SESSION['progress']=3;
         
        $que="update application_temp SET progress=".$_SESSION['progress']." WHERE appid='$appid'";
        @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
    }

    $_SESSION['currentshow']=3; 
     
    }
    else
    echo "<script>wrongiddialog(1)</script>";
    
                 
}


if(isset($_POST['s3_sbt']))
{
    $s3_studytype = radiovaluefinder('s3_studytype');
    $s3_typeoftrial = radiovaluefinder('s3_typeoftrial');
    $s3_studydesign = radiovaluefinder('s3_studydesign');
    $s3_allocofconcealment = radiovaluefinder('s3_allocofconcealment');
    $s3_blinding = radiovaluefinder('s3_blinding');
    $s3_phase = radiovaluefinder('s3_phase');
    $s3_genrandomseq  = radiovaluefinder('s3_genrandomseq');
    $s3_targetsamplesize=$_POST['s3_targetsamplesize']; 
    $s3_dateofenrolment=$_POST['s3_dateofenrolment'];
    $s3_durationofparticipation=$_POST['s3_durationofparticipation'];
    $s3_sequence=$_POST['s3_sequence'];
    $s3_followup = $_POST['s3_followup'];
    $s3_intervention1=$_POST['s3_intervention1'];
    $s3_intervention2=$_POST['s3_intervention2'];
    $s3_intervention3=$_POST['s3_intervention3'];
   	$s3_withdrawal_1=$_POST['s3_withdrawal_1'];
	$s3_withdrawal_2=$_POST['s3_withdrawal_2'];
	$s3_withdrawal_3=$_POST['s3_withdrawal_3'];
	$s3_withdrawal_4=$_POST['s3_withdrawal_4'];
	$s3_assessment_1= $_POST['s3_assessment_1'];
    $s3_assessment_2 = $_POST['s3_assessment_2'];
    $s3_assessment_3 = $_POST['s3_assessment_3'];
    $s3_assessment_4 = $_POST['s3_assessment_4'];
    $s3_primaryoutcome = $_POST['s3_primaryoutcome'];
    $s3_secondaryoutcome = $_POST['s3_secondaryoutcome'];
    $s3_selec_sub=$_POST['s3_selec_sub'];
    $s3_incl_criteria=$_POST['s3_incl_criteria'];
    $s3_age=$_POST['s3_age'];
    $s3_gender = radiovaluefinder('s3_gender');
    $s3_other_details=$_POST['s3_other_details'];
    $s3_excl_criteria=$_POST['s3_excl_criteria'];
    
    //var_dump($s3_studytype,$s3_typeoftrial,$s3_studydesign,$s3_allocofconcealment,$s3_blinding,$s3_phase,$s3_genrandomseq,$_POST['s3_targetsamplesize'],$_POST['s3_dateofenrolment'],$_POST['s3_durationofparticipation'],$_POST['s3_sequence'],$_POST['s3_intervention1'],$_POST['s3_intervention2'],$_POST['s3_intervention3']);
    if($s3_studytype!=""&& !empty($_POST['s3_selec_sub']) && !empty($_POST['s3_incl_criteria']) && !empty($_POST['s3_age']) && $s3_gender!="" && !empty($_POST['s3_excl_criteria']) && $s3_typeoftrial!="" && $s3_studydesign!="" && $s3_allocofconcealment!="" && $s3_blinding!="" && $s3_phase!="" && $s3_genrandomseq!="" && !empty($_POST['s3_targetsamplesize']) && !empty($_POST['s3_dateofenrolment'])  && !empty($_POST['s3_durationofparticipation'])  && !empty($_POST['s3_sequence']) && !empty($_POST['s3_intervention1']) && !empty($_POST['s3_intervention2']) && !empty($_POST['s3_intervention3']) && !empty($_POST['s3_withdrawal_1']) && !empty($_POST['s3_withdrawal_2']) && !empty($_POST['s3_withdrawal_3']) && !empty($_POST['s3_withdrawal_4']) && !empty($_POST['s3_assessment_1']) && !empty($_POST['s3_assessment_2'])&& !empty($_POST['s3_assessment_3']) && !empty($_POST['s3_assessment_4'])&& !empty($_POST['s3_primaryoutcome']) && !empty($_POST['s3_secondaryoutcome']))
{
    if($_SESSION['isuntouched']==0)
    {
     
    $que="delete from application_part_3 where appid = '$appid'";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
    }
     
    $s3_studytype = str_replace("'","''",$s3_studytype);
    $s3_typeoftrial = str_replace("'","''",$s3_typeoftrial);
    $s3_studydesign = str_replace("'","''",$s3_studydesign);
    $s3_allocofconcealment = str_replace("'","''",$s3_allocofconcealment);
    $s3_blinding = str_replace("'","''",$s3_blinding);
    $s3_phase = str_replace("'","''",$s3_phase);
    $s3_genrandomseq = str_replace("'","''",$s3_genrandomseq);
    $s3_targetsamplesize = str_replace("'","''",$s3_targetsamplesize);
    $s3_dateofenrolment = str_replace("'","''",$s3_dateofenrolment);
    $s3_durationofparticipation = str_replace("'","''",$s3_durationofparticipation);
    $s3_sequence = str_replace("'","''",$s3_sequence);
    $s3_followup = str_replace("'","''",$s3_followup);
    $s3_intervention1 = str_replace("'","''",$s3_intervention1);
    $s3_intervention2 = str_replace("'","''",$s3_intervention2);
    $s3_intervention3 = str_replace("'","''",$s3_intervention3);
    $s3_withdrawal_1 = str_replace("'","''",$s3_withdrawal_1);
    $s3_withdrawal_2 = str_replace("'","''",$s3_withdrawal_2);
    $s3_withdrawal_3 = str_replace("'","''",$s3_withdrawal_3);
    $s3_withdrawal_4 = str_replace("'","''",$s3_withdrawal_4);
    $s3_assessment_1 = str_replace("'","''",$s3_assessment_1);
    $s3_assessment_2 = str_replace("'","''",$s3_assessment_2);
    $s3_assessment_3 = str_replace("'","''",$s3_assessment_3);
    $s3_assessment_4 = str_replace("'","''",$s3_assessment_4);
    $s3_primaryoutcome = str_replace("'","''",$s3_primaryoutcome);
    $s3_secondaryoutcome = str_replace("'","''",$s3_secondaryoutcome);
    $s3_selec_sub = str_replace("'","''",$s3_selec_sub);
    $s3_incl_criteria = str_replace("'","''",$s3_incl_criteria);
    $s3_age = str_replace("'","''",$s3_age);
    $s3_gender = str_replace("'","''",$s3_gender);
    $s3_other_details = str_replace("'","''",$s3_other_details);
    $s3_excl_criteria = str_replace("'","''",$s3_excl_criteria);
    $que="insert into application_part_3 values('$appid','$s3_studytype','$s3_typeoftrial','$s3_studydesign','$s3_allocofconcealment','$s3_blinding','$s3_phase','$s3_genrandomseq',$s3_targetsamplesize,'$s3_dateofenrolment','$s3_durationofparticipation','$s3_sequence','$s3_followup','$s3_intervention1','$s3_intervention2','$s3_intervention3','$s3_withdrawal_1','$s3_withdrawal_2','$s3_withdrawal_3','$s3_withdrawal_4','$s3_assessment_1','$s3_assessment_2', '$s3_assessment_3', '$s3_assessment_4', '$s3_primaryoutcome', '$s3_secondaryoutcome',$s3_selec_sub,'$s3_incl_criteria','$s3_age','$s3_gender','$s3_other_details','$s3_excl_criteria')";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
    
    if($progress<4)
    {
        $_SESSION['progress']=4;
         
        $que="update application_temp SET progress=".$_SESSION['progress']." WHERE appid='$appid'";
        @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
    }

    $_SESSION['currentshow']=4; 
     
    }
    else
    echo "<script>wrongiddialog(1)</script>";
    
                 
}


if(isset($_POST['s4_sbt']))
{
    if(!empty($_POST['s4_stat1']) && !empty($_POST['s4_stat2'])&& !empty($_POST['s4_stat3'])&& !empty($_POST['s4_stat4'])&& !empty($_POST['s4_stat5'])&& !empty($_POST['s4_stat6'])&& !empty($_POST['s4_stat7']) && !empty($_POST['s4_summary']))
    {
    $s4_stat1 = $_POST['s4_stat1'];
	$s4_stat2 = $_POST['s4_stat2'];
	$s4_stat3 = $_POST['s4_stat3'];
	$s4_stat4 = $_POST['s4_stat4'];
	$s4_stat5 = $_POST['s4_stat5'];
	$s4_stat6 = $_POST['s4_stat6'];
	$s4_stat7 = $_POST['s4_stat7'];
	$s4_summary=$_POST['s4_summary'];    
        
    $s4_ref_journal_count = $_POST['s4_ref_journal_count'];
    $s4_ref_book_count = $_POST['s4_ref_book_count'];
    $s4_ref_report_count = $_POST['s4_ref_report_count'];
    $s4_ref_website_count = $_POST['s4_ref_website_count'];
    $s4_ref_secondary_count = $_POST['s4_ref_secondary_count'];
    $s4_ref_newspaper_count = $_POST['s4_ref_newspaper_count'];
    $s4_ref_encyclopedia_count = $_POST['s4_ref_encyclopedia_count'];
    $s4_ref_other_count = $_POST['s4_ref_other_count'];
    
    $s4_salary_count = $_POST['s4_salary_count'];
    $s4_equip_count = $_POST['s4_equip_count'];
    $s4_other_count = $_POST['s4_other_count'];

    $s4_books_justif1= $_POST['s4_books_justif1'];
    $s4_books_yr1_serial1= $_POST['s4_books_yr1_serial1'];
    $s4_books_yr2_serial1= $_POST['s4_books_yr2_serial1'];
    $s4_books_yr3_serial1= $_POST['s4_books_yr3_serial1'];
    $s4_books_total_serial1= $_POST['s4_books_total_serial1'];
    
    $s4_tada_justif1= $_POST['s4_tada_justif1'];
    $s4_tada_yr1_serial1= $_POST['s4_tada_yr1_serial1'];
    $s4_tada_yr2_serial1= $_POST['s4_tada_yr2_serial1'];
    $s4_tada_yr3_serial1= $_POST['s4_tada_yr3_serial1'];
    $s4_tada_total_serial1= $_POST['s4_tada_total_serial1'];
    
    $s4_instsupport_justif1= $_POST['s4_instsupport_justif1'];
    $s4_instsupport_yr1_serial1= $_POST['s4_instsupport_yr1_serial1'];
    $s4_instsupport_yr2_serial1= $_POST['s4_instsupport_yr2_serial1'];
    $s4_instsupport_yr3_serial1= $_POST['s4_instsupport_yr3_serial1'];
    $s4_instsupport_total_serial1= $_POST['s4_instsupport_total_serial1'];
    
    $s4_misc_justif1= $_POST['s4_misc_justif1'];
    $s4_misc_yr1_serial1= $_POST['s4_misc_yr1_serial1'];
    $s4_misc_yr2_serial1= $_POST['s4_misc_yr2_serial1'];
    $s4_misc_yr3_serial1= $_POST['s4_misc_yr3_serial1'];
    $s4_misc_total_serial1= $_POST['s4_misc_total_serial1'];
    
    $s4_feeofPI_justif1= $_POST['s4_feeofPI_justif1'];
    $s4_feeofPI_yr1_serial1= $_POST['s4_feeofPI_yr1_serial1'];
    $s4_feeofPI_yr2_serial1= $_POST['s4_feeofPI_yr2_serial1'];
    $s4_feeofPI_yr3_serial1= $_POST['s4_feeofPI_yr3_serial1'];
    $s4_feeofPI_total_serial1= $_POST['s4_feeofPI_total_serial1'];
    
    $s4_expenses_justif1= $_POST['s4_expenses_justif1'];
    $s4_expenses_yr1_serial1= $_POST['s4_expenses_yr1_serial1'];
    $s4_expenses_yr2_serial1= $_POST['s4_expenses_yr2_serial1'];
    $s4_expenses_yr3_serial1= $_POST['s4_expenses_yr3_serial1'];
    $s4_expenses_total_serial1= $_POST['s4_expenses_total_serial1'];
  
    if($_SESSION['isuntouched']==0)
    {    
     
    $que="delete from application_part_4 where appid = '$appid'";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
     
    $que="delete from  application_part_4_budget_recurring where appid = '$appid'";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
     
    $que="delete from  application_part_4_budget_nonrecurring where appid = '$appid'";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
     
    $que="delete from  application_part_4_budget_equipment where appid = '$appid'";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
     
    $que="delete from  application_part_4_budget_nonrecurring_other where appid = '$appid'";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
     
    $que="delete from  application_part_4_sub_ref_journal where appid='$appid'";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
     
    $que="delete from  application_part_4_sub_ref_book where appid='$appid'";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
     
    $que="delete from  application_part_4_sub_ref_report where appid='$appid'";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
     
    $que="delete from  application_part_4_sub_ref_website where appid='$appid'";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
     
    $que="delete from  application_part_4_sub_ref_secondary where appid='$appid'";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
     
    $que="delete from  application_part_4_sub_ref_newspaper where appid='$appid'";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
     
    $que="delete from  application_part_4_sub_ref_encyclopedia where appid='$appid'";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
     
    $que="delete from  application_part_4_sub_ref_other where appid='$appid'";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
    }
     
    $s4_ref_journal_count = str_replace("'","''",$s4_ref_journal_count);
    $s4_ref_book_count = str_replace("'","''",$s4_ref_book_count);
    $s4_ref_report_count = str_replace("'","''",$s4_ref_report_count);
    $s4_ref_website_count = str_replace("'","''",$s4_ref_website_count);
    $s4_ref_secondary_count = str_replace("'","''",$s4_ref_secondary_count);
    $s4_ref_newspaper_count = str_replace("'","''",$s4_ref_newspaper_count);
    $s4_ref_encyclopedia_count = str_replace("'","''",$s4_ref_encyclopedia_count);
    $s4_ref_other_count = str_replace("'","''",$s4_ref_other_count);
    $s4_stat1 = str_replace("'","''",$s4_stat1);
    $s4_stat2 = str_replace("'","''",$s4_stat2);
    $s4_stat3 = str_replace("'","''",$s4_stat3);
    $s4_stat4 = str_replace("'","''",$s4_stat4);
    $s4_stat5 = str_replace("'","''",$s4_stat5);
    $s4_stat6 = str_replace("'","''",$s4_stat6);
    $s4_stat7 = str_replace("'","''",$s4_stat7);
    $s4_summary = str_replace("'","''",$s4_summary);
   
    $que="insert into application_part_4 values('$appid',$s4_ref_journal_count,$s4_ref_book_count,$s4_ref_report_count,$s4_ref_website_count,$s4_ref_secondary_count,$s4_ref_newspaper_count,$s4_ref_encyclopedia_count,$s4_ref_other_count,'$s4_stat1','$s4_stat2','$s4_stat3','$s4_stat4','$s4_stat5','$s4_stat6','$s4_stat7','$s4_summary')";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
    
     
    $s4_books_justif1 = str_replace("'","''",$s4_books_justif1);
    $s4_books_yr1_serial1 = str_replace("'","''",$s4_books_yr1_serial1);
    $s4_books_yr2_serial1 = str_replace("'","''",$s4_books_yr2_serial1);
    $s4_books_yr3_serial1 = str_replace("'","''",$s4_books_yr3_serial1);
    $s4_books_total_serial1 = str_replace("'","''",$s4_books_total_serial1);
    
    $que="insert into application_part_4_budget_nonrecurring values('$appid','Books','$s4_books_justif1','$s4_books_yr1_serial1','$s4_books_yr2_serial1','$s4_books_yr3_serial1','$s4_books_total_serial1')";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
    
     
    $s4_tada_justif1 = str_replace("'","''",$s4_tada_justif1);
    $s4_tada_yr1_serial1 = str_replace("'","''",$s4_tada_yr1_serial1);
    $s4_tada_yr2_serial1 = str_replace("'","''",$s4_tada_yr2_serial1);
    $s4_tada_yr3_serial1 = str_replace("'","''",$s4_tada_yr3_serial1);
    $s4_tada_total_serial1 = str_replace("'","''",$s4_tada_total_serial1);
    
    $que="insert into application_part_4_budget_nonrecurring values('$appid','TA/DA','$s4_tada_justif1','$s4_tada_yr1_serial1','$s4_tada_yr2_serial1','$s4_tada_yr3_serial1','$s4_tada_total_serial1')";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
    
     
    $s4_instsupport_justif1 = str_replace("'","''",$s4_instsupport_justif1);
    $s4_instsupport_yr1_serial1 = str_replace("'","''",$s4_instsupport_yr1_serial1);
    $s4_instsupport_yr2_serial1 = str_replace("'","''",$s4_instsupport_yr2_serial1);
    $s4_instsupport_yr3_serial1 = str_replace("'","''",$s4_instsupport_yr3_serial1);
    $s4_instsupport_total_serial1 = str_replace("'","''",$s4_instsupport_total_serial1);
    $que="insert into application_part_4_budget_nonrecurring values('$appid','Institutional Support','$s4_instsupport_justif1','$s4_instsupport_yr1_serial1','$s4_instsupport_yr2_serial1','$s4_instsupport_yr3_serial1','$s4_instsupport_total_serial1')";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
    
     
    $s4_feeofPI_justif1 = str_replace("'","''",$s4_feeofPI_justif1);
    $s4_feeofPI_yr1_serial1 = str_replace("'","''",$s4_feeofPI_yr1_serial1);
    $s4_feeofPI_yr2_serial1 = str_replace("'","''",$s4_feeofPI_yr2_serial1);
    $s4_feeofPI_yr3_serial1 = str_replace("'","''",$s4_feeofPI_yr3_serial1);
    $s4_feeofPI_total_serial1 = str_replace("'","''",$s4_feeofPI_total_serial1);
    $que="insert into application_part_4_budget_nonrecurring values('$appid','Fee of PI and Col','$s4_feeofPI_justif1','$s4_feeofPI_yr1_serial1','$s4_feeofPI_yr2_serial1','$s4_feeofPI_yr3_serial1','$s4_feeofPI_total_serial1')";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
    
     
    $s4_misc_justif1 = str_replace("'","''",$s4_misc_justif1);
    $s4_misc_yr1_serial1 = str_replace("'","''",$s4_misc_yr1_serial1);
    $s4_misc_yr2_serial1 = str_replace("'","''",$s4_misc_yr2_serial1);
    $s4_misc_yr3_serial1 = str_replace("'","''",$s4_misc_yr3_serial1);
    $s4_misc_total_serial1 = str_replace("'","''",$s4_misc_total_serial1);
    $que="insert into application_part_4_budget_nonrecurring values('$appid','Miscellaneous','$s4_misc_justif1','$s4_misc_yr1_serial1','$s4_misc_yr2_serial1','$s4_misc_yr3_serial1','$s4_misc_total_serial1')";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
    
     
    $s4_expenses_justif1 = str_replace("'","''",$s4_expenses_justif1);
    $s4_expenses_yr1_serial1 = str_replace("'","''",$s4_expenses_yr1_serial1);
    $s4_expenses_yr2_serial1 = str_replace("'","''",$s4_expenses_yr2_serial1);
    $s4_expenses_yr3_serial1 = str_replace("'","''",$s4_expenses_yr3_serial1);
    $s4_expenses_total_serial1 = str_replace("'","''",$s4_expenses_total_serial1);
    
    $que="insert into application_part_4_budget_nonrecurring values('$appid','Expenses','$s4_expenses_justif1','$s4_expenses_yr1_serial1','$s4_expenses_yr2_serial1','$s4_expenses_yr3_serial1','$s4_expenses_total_serial1')";
    @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
    
    
    
    for($i=1;$i<=$s4_salary_count;$i++)
    {
        $s4_salary_justif = $_POST['s4_salary_justif'.$i];
        $s4_salary_yr1 = $_POST['s4_salary_yr1_serial'.$i];
        $s4_salary_yr2 = $_POST['s4_salary_yr2_serial'.$i];
        $s4_salary_yr3 = $_POST['s4_salary_yr3_serial'.$i];
        $s4_salary_total = $_POST['s4_salary_total_serial'.$i];
        
         
         
        $s4_salary_justif = str_replace("'","''",$s4_salary_justif);
        $s4_salary_yr1 = str_replace("'","''",$s4_salary_yr1);
        $s4_salary_yr2 = str_replace("'","''",$s4_salary_yr2);
        $s4_salary_yr3 = str_replace("'","''",$s4_salary_yr3);
        $s4_salary_total = str_replace("'","''",$s4_salary_total);
        $que="insert into application_part_4_budget_recurring values('$appid',$i,'$s4_salary_justif','$s4_salary_yr1','$s4_salary_yr2','$s4_salary_yr3','$s4_salary_total')";
        @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
   
    }
    for($i=1;$i<=$s4_equip_count;$i++)
    {
        $s4_equip_justif = $_POST['s4_equip_justif'.$i];
        $s4_equip_yr1 = $_POST['s4_equip_yr1_serial'.$i];
        $s4_equip_yr2 = $_POST['s4_equip_yr2_serial'.$i];
        $s4_equip_yr3 = $_POST['s4_equip_yr3_serial'.$i];
        $s4_equip_total = $_POST['s4_equip_total_serial'.$i];
        
         
         
        $s4_equip_justif = str_replace("'","''",$s4_equip_justif);
        $s4_equip_yr1 = str_replace("'","''",$s4_equip_yr1);
        $s4_equip_yr2 = str_replace("'","''",$s4_equip_yr2);
        $s4_equip_yr3 = str_replace("'","''",$s4_equip_yr3);
        $s4_equip_total = str_replace("'","''",$s4_equip_total);
        $que="insert into application_part_4_budget_equipment values('$appid',$i,'$s4_equip_justif','$s4_equip_yr1','$s4_equip_yr2','$s4_equip_yr3','$s4_equip_total')";
        @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
   
    }
    for($i=1;$i<=$s4_other_count;$i++)
    {
        $s4_other_name = $_POST['s4_other_name'.$i];
        $s4_other_justif = $_POST['s4_other_justif'.$i];
        $s4_other_yr1 = $_POST['s4_other_yr1_serial'.$i];
        $s4_other_yr2 = $_POST['s4_other_yr2_serial'.$i];
        $s4_other_yr3 = $_POST['s4_other_yr3_serial'.$i];
        $s4_other_total = $_POST['s4_other_total_serial'.$i];
        
         
        $s4_other_name = str_replace("'","''",$s4_other_name);
        $s4_other_justif = str_replace("'","''",$s4_other_justif);
        $s4_other_yr1 = str_replace("'","''",$s4_other_yr1);
        $s4_other_yr2 = str_replace("'","''",$s4_other_yr2);
        $s4_other_yr3 = str_replace("'","''",$s4_other_yr3);
        $s4_other_total = str_replace("'","''",$s4_other_total);
        $que="insert into application_part_4_budget_nonrecurring_other values('$appid','$s4_other_name','$s4_other_justif','$s4_other_yr1','$s4_other_yr2','$s4_other_yr3','$s4_other_total')";
        @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
   
    }    
    
    
     for($i=1;$i<=$s4_ref_journal_count;$i++)
    {
        $section4_ref_journal_auth_name=$_POST['section4_ref_journal_'.$i.'_auth_name'];
        $section4_ref_journal_title_article=$_POST['section4_ref_journal_'.$i.'_title_article'];
        $section4_ref_journal_abb_title=$_POST['section4_ref_journal_'.$i.'_abb_title'];
        $section4_ref_journal_date=$_POST['section4_ref_journal_'.$i.'_date'];
        $section4_ref_journal_vol=$_POST['section4_ref_journal_'.$i.'_vol'];
        $section4_ref_journal_issue=$_POST['section4_ref_journal_'.$i.'_issue'];
        $section4_ref_journal_page=$_POST['section4_ref_journal_'.$i.'_page'];
        $section4_ref_journal_refnumber=$_POST['section4_ref_journal_'.$i.'_refnumber'];
        
         
         
        $section4_ref_journal_auth_name = str_replace("'","''",$section4_ref_journal_auth_name);
        $section4_ref_journal_title_article = str_replace("'","''",$section4_ref_journal_title_article);
        $section4_ref_journal_abb_title = str_replace("'","''",$section4_ref_journal_abb_title);
        $section4_ref_journal_date = str_replace("'","''",$section4_ref_journal_date);
        $section4_ref_journal_vol = str_replace("'","''",$section4_ref_journal_vol);
        $section4_ref_journal_issue = str_replace("'","''",$section4_ref_journal_issue);
        $section4_ref_journal_page = str_replace("'","''",$section4_ref_journal_page);
        $section4_ref_journal_refnumber = str_replace("'","''",$section4_ref_journal_refnumber);
        
        $que="insert into application_part_4_sub_ref_journal values('$appid',$i,'$section4_ref_journal_auth_name','$section4_ref_journal_title_article','$section4_ref_journal_abb_title','$section4_ref_journal_date','$section4_ref_journal_vol','$section4_ref_journal_issue','$section4_ref_journal_page',$section4_ref_journal_refnumber)";
        @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
        
    }
    
        for($i=1;$i<=$s4_ref_book_count;$i++)
    {
        $section4_ref_book_auth_name=$_POST['section4_ref_book_'.$i.'_auth_name'];
        $section4_ref_book_title_book=$_POST['section4_ref_book_'.$i.'_title_book'];
        $section4_ref_book_edition=$_POST['section4_ref_book_'.$i.'_edition'];
        $section4_ref_book_place_publication=$_POST['section4_ref_book_'.$i.'_place_publication'];
        $section4_ref_book_publisher=$_POST['section4_ref_book_'.$i.'_publisher'];
        $section4_ref_book_year_publication=$_POST['section4_ref_book_'.$i.'_year_publication'];
        $section4_ref_book_refnumber=$_POST['section4_ref_book_'.$i.'_refnumber'];
        
         
         
        $section4_ref_book_auth_name = str_replace("'","''",$section4_ref_book_auth_name);
        $section4_ref_book_title_book = str_replace("'","''",$section4_ref_book_title_book);
        $section4_ref_book_edition = str_replace("'","''",$section4_ref_book_edition);
        $section4_ref_book_place_publication = str_replace("'","''",$section4_ref_book_place_publication);
        $section4_ref_book_publisher = str_replace("'","''",$section4_ref_book_publisher);
        $section4_ref_book_year_publication = str_replace("'","''",$section4_ref_book_year_publication);
        $section4_ref_book_refnumber = str_replace("'","''",$section4_ref_book_refnumber);
           
        $que="insert into application_part_4_sub_ref_book values('$appid',$i,'$section4_ref_book_auth_name','$section4_ref_book_title_book','$section4_ref_book_edition','$section4_ref_book_place_publication','$section4_ref_book_publisher','$section4_ref_book_year_publication',$section4_ref_book_refnumber)";
        @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
        
    }
    
    
      for($i=1;$i<=$s4_ref_report_count;$i++)
    {
        $section4_ref_report_auth_name=$_POST['section4_ref_report_'.$i.'_auth_name'];
        $section4_ref_report_title_report=$_POST['section4_ref_report_'.$i.'_title_report'];
        $section4_ref_report_place_publication=$_POST['section4_ref_report_'.$i.'_place_publication'];
        $section4_ref_report_publisher=$_POST['section4_ref_report_'.$i.'_publisher'];
        $section4_ref_report_date_publication=$_POST['section4_ref_report_'.$i.'_date_publication'];
        $section4_ref_report_total_pages=$_POST['section4_ref_report_'.$i.'_total_pages'];
        $section4_ref_report_report_number=$_POST['section4_ref_report_'.$i.'_report_number'];
        $section4_ref_report_refnumber=$_POST['section4_ref_report_'.$i.'_refnumber'];
        
         
         
        $section4_ref_report_auth_name = str_replace("'","''",$section4_ref_report_auth_name);
        $section4_ref_report_title_report = str_replace("'","''",$section4_ref_report_title_report);
        $section4_ref_report_place_publication = str_replace("'","''",$section4_ref_report_place_publication);
        $section4_ref_report_publisher = str_replace("'","''",$section4_ref_report_publisher);
        $section4_ref_report_date_publication = str_replace("'","''",$section4_ref_report_date_publication);
        $section4_ref_report_total_pages = str_replace("'","''",$section4_ref_report_total_pages);
        $section4_ref_report_report_number = str_replace("'","''",$section4_ref_report_report_number);
        $section4_ref_report_refnumber = str_replace("'","''",$section4_ref_report_refnumber);
        $que="insert into application_part_4_sub_ref_report values('$appid',$i,'$section4_ref_report_auth_name','$section4_ref_report_title_report','$section4_ref_report_place_publication','$section4_ref_report_publisher','$section4_ref_report_date_publication','$section4_ref_report_total_pages','$section4_ref_report_report_number',$section4_ref_report_refnumber)";
        @mysql_query($que,$link) or die("<br/><br/>Error in query $que. <br/>System generated error messege: ".mysql_error());
        
    }
    
    //website
	 for($i=1;$i<=$s4_ref_website_count;$i++)
    {
        $section4_ref_website_auth_name=$_POST['section4_ref_website_'.$i.'_auth_name'];
        $section4_ref_website_title_page=$_POST['section4_ref_website_'.$i.'_title_page'];
        $section4_ref_website_place_publication=$_POST['section4_ref_website_'.$i.'_place_publication'];
        $section4_ref_website_publisher=$_POST['section4_ref_website_'.$i.'_publisher'];
        $section4_ref_website_date_publication=$_POST['section4_ref_website_'.$i.'_date_publication'];
        $section4_ref_website_refnumber=$_POST['section4_ref_website_'.$i.'_refnumber'];
        
         
         
        $section4_ref_website_auth_name = str_replace("'","''",$section4_ref_website_auth_name);
        $section4_ref_website_title_page = str_replace("'","''",$section4_ref_website_title_page);
        $section4_ref_website_place_publication = str_replace("'","''",$section4_ref_website_place_publication);
        $section4_ref_website_publisher = str_replace("'","''",$section4_ref_website_publisher);
        $section4_ref_website_date_publication = str_replace("'","''",$section4_ref_website_date_publication);
        $section4_ref_website_refnumber = str_replace("'","''",$section4_ref_website_refnumber);
        
        $que="insert into application_part_4_sub_ref_website values('$appid',$i,'$section4_ref_website_auth_name','$section4_ref_website_title_page','$section4_ref_website_place_publication','$section4_ref_website_publisher','$section4_ref_website_date_publication',$section4_ref_website_refnumber)";
        @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
        
    }
    
    for($i=1;$i<=$s4_ref_secondary_count;$i++)
    {
        $section4_ref_secondary_auth_name=$_POST['section4_ref_secondary_'.$i.'_auth_name'];
        $section4_ref_secondary_title_thesis=$_POST['section4_ref_secondary_'.$i.'_title_thesis'];
        $section4_ref_secondary_place_publication=$_POST['section4_ref_secondary_'.$i.'_place_publication'];
        $section4_ref_secondary_publisher=$_POST['section4_ref_secondary_'.$i.'_publisher'];
        $section4_ref_secondary_year_publication=$_POST['section4_ref_secondary_'.$i.'_year_publication'];
        $section4_ref_secondary_number_pages=$_POST['section4_ref_secondary_'.$i.'_number_pages'];
        $section4_ref_secondary_refnumber=$_POST['section4_ref_secondary_'.$i.'_refnumber'];
        
         
         
        $section4_ref_secondary_auth_name = str_replace("'","''",$section4_ref_secondary_auth_name);
        $section4_ref_secondary_title_thesis = str_replace("'","''",$section4_ref_secondary_title_thesis);
        $section4_ref_secondary_place_publication = str_replace("'","''",$section4_ref_secondary_place_publication);
        $section4_ref_secondary_publisher = str_replace("'","''",$section4_ref_secondary_publisher);
        $section4_ref_secondary_year_publication = str_replace("'","''",$section4_ref_secondary_year_publication);
        $section4_ref_secondary_number_pages = str_replace("'","''",$section4_ref_secondary_number_pages);
        $section4_ref_secondary_refnumber = str_replace("'","''",$section4_ref_secondary_refnumber);
        $que="insert into application_part_4_sub_ref_secondary values('$appid',$i,'$section4_ref_secondary_auth_name','$section4_ref_secondary_title_thesis','$section4_ref_secondary_place_publication','$section4_ref_secondary_publisher','$section4_ref_secondary_year_publication','$section4_ref_secondary_number_pages',$section4_ref_secondary_refnumber)";
        @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
        
    }   
    
    for($i=1;$i<=$s4_ref_newspaper_count;$i++)
    {
        $section4_ref_newspaper_auth_name=$_POST['section4_ref_newspaper_'.$i.'_auth_name'];
        $section4_ref_newspaper_title_article=$_POST['section4_ref_newspaper_'.$i.'_title_article'];
        $section4_ref_newspaper_title_newspaper=$_POST['section4_ref_newspaper_'.$i.'_title_newspaper'];
        $section4_ref_newspaper_place_publication=$_POST['section4_ref_newspaper_'.$i.'_place_publication'];
        $section4_ref_newspaper_date_publication=$_POST['section4_ref_newspaper_'.$i.'_date_publication'];
        $section4_ref_newspaper_section=$_POST['section4_ref_newspaper_'.$i.'_section'];
        $section4_ref_newspaper_location=$_POST['section4_ref_newspaper_'.$i.'_location'];
        $section4_ref_newspaper_cited=$_POST['section4_ref_newspaper_'.$i.'_cited'];
        $section4_ref_newspaper_refnumber=$_POST['section4_ref_newspaper_'.$i.'_refnumber'];
        
         
         
        $section4_ref_newspaper_auth_name = str_replace("'","''",$section4_ref_newspaper_auth_name);
        $section4_ref_newspaper_title_article = str_replace("'","''",$section4_ref_newspaper_title_article);
        $section4_ref_newspaper_title_newspaper = str_replace("'","''",$section4_ref_newspaper_title_newspaper);
        $section4_ref_newspaper_place_publication = str_replace("'","''",$section4_ref_newspaper_place_publication);
        $section4_ref_newspaper_date_publication = str_replace("'","''",$section4_ref_newspaper_date_publication);
        $section4_ref_newspaper_section = str_replace("'","''",$section4_ref_newspaper_section);
        $section4_ref_newspaper_location = str_replace("'","''",$section4_ref_newspaper_location);
        $section4_ref_newspaper_cited = str_replace("'","''",$section4_ref_newspaper_cited);
        $section4_ref_newspaper_refnumber = str_replace("'","''",$section4_ref_newspaper_refnumber);
        
        $que="insert into application_part_4_sub_ref_newspaper values('$appid',$i,'$section4_ref_newspaper_auth_name','$section4_ref_newspaper_title_article','$section4_ref_newspaper_title_newspaper','$section4_ref_newspaper_place_publication','$section4_ref_newspaper_date_publication','$section4_ref_newspaper_section','$section4_ref_newspaper_location','$section4_ref_newspaper_cited',$section4_ref_newspaper_refnumber)";
        @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
        
    }
    
    for($i=1;$i<=$s4_ref_encyclopedia_count;$i++)
    {
        $section4_ref_encyclopedia_auth_name=$_POST['section4_ref_encyclopedia_'.$i.'_auth_name'];
        $section4_ref_encyclopedia_title_encyclopedia=$_POST['section4_ref_encyclopedia_'.$i.'_title_encyclopedia'];
        $section4_ref_encyclopedia_place_publication=$_POST['section4_ref_encyclopedia_'.$i.'_place_publication'];
        $section4_ref_encyclopedia_publisher=$_POST['section4_ref_encyclopedia_'.$i.'_publisher'];
        $section4_ref_encyclopedia_year_publication=$_POST['section4_ref_encyclopedia_'.$i.'_year_publication'];
        $section4_ref_encyclopedia_title_article=$_POST['section4_ref_encyclopedia_'.$i.'_title_article'];
        $section4_ref_encyclopedia_page_number=$_POST['section4_ref_encyclopedia_'.$i.'_page_number'];
        $section4_ref_encyclopedia_refnumber=$_POST['section4_ref_encyclopedia_'.$i.'_refnumber'];
         
         
        $section4_ref_encyclopedia_auth_name = str_replace("'","''",$section4_ref_encyclopedia_auth_name);
        $section4_ref_encyclopedia_title_encyclopedia = str_replace("'","''",$section4_ref_encyclopedia_title_encyclopedia);
        $section4_ref_encyclopedia_place_publication = str_replace("'","''",$section4_ref_encyclopedia_place_publication);
        $section4_ref_encyclopedia_publisher = str_replace("'","''",$section4_ref_encyclopedia_publisher);
        $section4_ref_encyclopedia_year_publication = str_replace("'","''",$section4_ref_encyclopedia_year_publication);
        $section4_ref_encyclopedia_title_article = str_replace("'","''",$section4_ref_encyclopedia_title_article);
        $section4_ref_encyclopedia_page_number = str_replace("'","''",$section4_ref_encyclopedia_page_number);
        $section4_ref_encyclopedia_refnumber = str_replace("'","''",$section4_ref_encyclopedia_refnumber);
        
        $que="insert into application_part_4_sub_ref_encyclopedia values('$appid',$i,'$section4_ref_encyclopedia_auth_name','$section4_ref_encyclopedia_title_encyclopedia','$section4_ref_encyclopedia_place_publication','$section4_ref_encyclopedia_publisher','$section4_ref_encyclopedia_year_publication','$section4_ref_encyclopedia_title_article','$section4_ref_encyclopedia_page_number',$section4_ref_encyclopedia_refnumber)";
        @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
        
    }
    
    for($i=1;$i<=$s4_ref_other_count;$i++)
    {
        $section4_ref_other_details=$_POST['section4_ref_other_'.$i.'_details'];
        $section4_ref_other_refnumber=$_POST['section4_ref_other_'.$i.'_refnumber'];
         
         
        $section4_ref_other_details = str_replace("'","''",$section4_ref_other_details);
        $section4_ref_other_refnumber = str_replace("'","''",$section4_ref_other_refnumber);
        $que="insert into application_part_4_sub_ref_other values('$appid',$i,'$section4_ref_other_details',$section4_ref_other_refnumber)";
        @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
        
    }

    
     
    
    if($progress<5)
    {
        $_SESSION['progress']=5;
         
        $que="update application_temp SET progress=".$_SESSION['progress']." WHERE appid='$appid'";
        @mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());
    }

    $_SESSION['currentshow']=4; 
    echo "<script>window.location = 'review.php';</script>";
    
     
    }
    else
    echo "<script>wrongiddialog(1)</script>";
    
                 
}

if($_SESSION['currentshow'] == 4)
{
$que="select introduction_proj from  application_part_2 where appid='$appid'";
$rs10=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               
$row10 = mysql_fetch_array($rs10);
$row10[0] = nl2br($row10[0]);
    echo"<div id='showintro' style='overflow-y: scroll; display:none; padding:20px; width: 100%;height:30%;z-index: 10;position: fixed; top: 0px; left:0px; background-color: #fbfbfb; box-shadow: 0 2px 5px 0 rgba(0,0,0,.26); box-sizing: border-box;'>
<label style='color: blue; font-size: 20px;'>Introduction</label><br/>
<label style='color: black; font-size: 16px;'>$row10[0]</label>
<button type='button' onclick='toggletopintro(0);' class='mdl-button mdl-js-button mdl-button--fab' style='background: transparent;box-shadow: none;position:fixed; top: 5px; right: 5px;'>
<i class='material-icons'>
close
</i>
</button>


</div>";
}



?>

  
    <!-- Always shows a header, even in smaller screens. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header" style="min-width: 1360px;">
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
          <a class="mdl-navigation__link" href="login.php" style="background-color: #d5d9fd; color: #757575;">Login</a>
        </nav>
      </div>
      <main class="mdl-layout__content" style="background-color: #f7ffd5;">
      <div id='p2' class='mdl-progress mdl-js-progress mdl-progress__indeterminate mdl-progress-red' style="display: none; width: 100%"></div>
        <div class="page-content" style="padding: 2% 5%;">
  
  

  
  <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text"><label style="font-family: Lato; font-size: 28px; font-weight: 500;">
        <!--   Page Heading   -->
        Temporary Application Number <label style="background-color: white;padding: 5px 10px;color: black;border-radius: 50px;"><?php echo $_SESSION['appid']?></label></h2>
      </div>
      
     
      <form method="post">
      <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #ffd155; color: black; font-size: 20px; height: 50px;background-color: #3f51b5; padding: 0px; ">
        <!--   Page Sub Heading   -->

<?php
// START of generalized section

$progress= $_SESSION['progress'];
$currentshow = $_SESSION['currentshow'];
$appid = $_SESSION['appid'];


if($progress>=0)
{
echo '<button style=" margin: 0px; height: 50px; width: 20%;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect " name="b0" id="b0">
        Instructions
      </button>';
}
if($progress>=1)
{
echo '<button style="margin: 0px; height: 50px; width: 20%;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect " name="b1" id="b1">
        PART 1
      </button>';
}
if($progress>=2)
{
echo '<button style="margin: 0px; height: 50px; width: 20%;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect " name="b2" id="b2">
        PART 2
      </button>';
}
if($progress>=3)
{
echo '<button style="margin: 0px; height: 50px; width: 20%;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect " name="b3" id="b3">
        PART 3
      </button>';
}
if($progress>=4)
{
echo '<button style="margin: 0px; height: 50px; width: 20%;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect " name="b4" id="b4">
        PART 4
      </button>';
}
echo "<script>buttonhighlighter($currentshow,$progress);</script>";
if($progress<4)
{
echo '<div style="box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);background: #888888;color: #585858; margin: 0px;width: 20%;float: right;border: none;border-radius: 2px; position: relative;height: 36px; padding: 7 0px;display: inline-block;font-family: &quot;Roboto&quot;,&quot;Helvetica&quot;,&quot;Arial&quot;,sans-serif;font-size: 14px;font-weight: 500;text-transform: uppercase;letter-spacing: 0;overflow: hidden;outline: none;text-decoration: none;text-align: center;line-height: 36px;vertical-align: middle;">
       PART 4
      </div>';
}
if($progress<3)
{
echo '<div style="box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);background: #888888;color: #585858; margin: 0px;width: 20%;float: right;border: none;border-radius: 2px; position: relative;height: 36px; padding: 7 0px;display: inline-block;font-family: &quot;Roboto&quot;,&quot;Helvetica&quot;,&quot;Arial&quot;,sans-serif;font-size: 14px;font-weight: 500;text-transform: uppercase;letter-spacing: 0;overflow: hidden;outline: none;text-decoration: none;text-align: center;line-height: 36px;vertical-align: middle;">
       PART 3
      </div>';
}
if($progress<2)
{
echo '<div style="box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);background: #888888;color: #585858; margin: 0px;width: 20%;float: right;border: none;border-radius: 2px; position: relative;height: 36px; padding: 7 0px;display: inline-block;font-family: &quot;Roboto&quot;,&quot;Helvetica&quot;,&quot;Arial&quot;,sans-serif;font-size: 14px;font-weight: 500;text-transform: uppercase;letter-spacing: 0;overflow: hidden;outline: none;text-decoration: none;text-align: center;line-height: 36px;vertical-align: middle;">
       PART 2
      </div>';
}
if($progress<1)
{
echo '<div style="box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);background: #888888;color: #585858; margin: 0px;width: 20%;float: right;border: none;border-radius: 2px; position: relative;height: 36px; padding: 7 0px;display: inline-block;font-family: &quot;Roboto&quot;,&quot;Helvetica&quot;,&quot;Arial&quot;,sans-serif;font-size: 14px;font-weight: 500;text-transform: uppercase;letter-spacing: 0;overflow: hidden;outline: none;text-decoration: none;text-align: center;line-height: 36px;vertical-align: middle;">
       PART 1
      </div>';
}



echo "</div></form>";

    
if($currentshow == 0)
{
  echo "<script>submitFormOkay = true;</script>" ;
   
   //Blue Margin Below
  echo('<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Statutory Instructions

</div>

<div class="mdl-card__actions mdl-card--border" style="background-color: #f6fbff; display: inline-block; text-align: center">
<br />
 <label style="font-size: 20px;margin-bottom: 25px; padding: 5px; color: white; background-color: #681fde;">View Instruction Document</label>
                
<br>  
<br>
          <a style="outline: none;" id="exixtingDoc" target="_blank" href="instruction/instruction.pdf"><i style="font-size: 36px;background-color:  black;padding:  10px;border-radius: 100px;" class="material-icons">description</i></a>
          
          <div class="mdl-tooltip" for="exixtingDoc">
                click here to view instructions
          </div>
</div>
 ');
}
// Section 1 STARTS
if($currentshow == 1)
{
 
$que="select * from application_part_1 where appid='$appid'";
$rs=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               

$numberOfCoInvestigator = 0;
$s1_colab_institute_name="";
$s1_colab_institute_telephone="";
$s1_colab_institute_fax="";
$s1_colab_institute_email="";
$s1_colab_institute_address="";
$s1_ethics_name="";
$s1_ethics_date="";
$s1_ethics_doc="";
$s1_principal_bio_doc="";
$s1_approvalstatus="";
$s1_pretrialperiod="";
$s1_datacollectingperiod="";
$s1_analysisperiod="";

if(mysql_num_rows($rs)==1)
{
$_SESSION['isuntouched'] = 0;
$row = mysql_fetch_array($rs); 
$s1_principal_bio_doc=$row[1];
$numberOfCoInvestigator = $row[2];
$s1_colab_institute_name=$row[3];
$s1_colab_institute_telephone=$row[4];
$s1_colab_institute_fax=$row[5];
$s1_colab_institute_email=$row[6];
$s1_colab_institute_address=$row[7];
$s1_ethics_name=$row[8];
$s1_ethics_date=$row[9];
$s1_ethics_doc=$row[10];
$s1_approvalstatus=$row[11];
$s1_pretrialperiod=$row[12];
$s1_datacollectingperiod=$row[13];
$s1_analysisperiod=$row[14];
}
else
$_SESSION['isuntouched'] = 1;


$part1=<<<aa
<form id="form1" method="post" enctype="multipart/form-data">

<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Upload Bio Data of Principal Investigator

</div>

<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: #f6fbff; display: inline-block">
 
<label class="fieldheader">Upload File</label>
<br /><br />
    <input type="file" style="display:none" id="s1_principal_investigator_biography" name="s1_principal_investigator_biography" onchange="alertFilename('s1_principal_investigator_biography')">
<label for="s1_principal_investigator_biography" class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored" id="uploadselect">
  <i class="material-icons">attach_file</i>
</label>
<div class="mdl-tooltip" for="uploadselect">
click here to select file
</div>
<div id="s1_principal_investigator_biographyfilename" style></div>
<br />  <br />  <br /> 

</div>
 <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Information Regarding Co Investigator

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: #f6fbff; display: inline-block">
<div id="coinvestigator">

</div>
<button type="button" class="mdl-button mdl-js-button mdl-button--raised" style="background-color: green; color: white; margin-right: 20px" name="s1_coinvest_add" onclick="addcoinvestigator();">Add a Co-investigator</button>


<input type="number" id="countcoinvestigator" name="section1_countcoinvestigator" style="display: none;" value="$numberOfCoInvestigator"/>
</div>
<br>

<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Information Regarding Collaborating Institute (if any)

</div>

<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: #f6fbff; display: inline-block">
<div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 60px">
<label class="fieldheader">Name of the Institution</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
    <input value="$s1_colab_institute_name" class="mdl-textfield__input" type="text" id="section1_colabinstitute_name" name="section1_colabinstitute_name" style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter the name of the institution</span>
  </div>
  <br />  <br />  <br />
<label class="fieldheader">Postal Address</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
    <textarea class='mdl-textfield__input' rows= '4' id="section1_colabinstitute_address" name="section1_colabinstitute_address" style='border-color: blue; resize: none; outline: none; white-space:pre-wrap;' >$s1_colab_institute_address</textarea>
    <span class="mdl-textfield__error">Please enter the address of the institution</span>
  </div>
  

  
  
</div>
<div style="text-align: left; float: right; width: 38%; padding: 20px 60px 20px 20px;">


<label class="fieldheader">Telephone Number</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
    <input value="$s1_colab_institute_telephone" class="mdl-textfield__input" type="text" id="section1_colabinstitute_telephone" name="section1_colabinstitute_telephone" style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter the telephone number of the institution</span>
  </div>
  
  <br />  <br />  <br />
  
  <label class="fieldheader">FAX Number</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
    <input value="$s1_colab_institute_fax" class="mdl-textfield__input" type="text" id="section1_colabinstitute_fax" name="section1_colabinstitute_fax" style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter the fax number of the institution</span>
  </div>  
  
    <br />  <br />  <br />
    
    <label class="fieldheader">Email ID</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
    <input value="$s1_colab_institute_email" class="mdl-textfield__input" type="text" id="section1_colabinstitute_email" name="section1_colabinstitute_email" style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter the email address of the institution</span>
  </div> 
  
<br/><br/>
</div>

</div>

<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Ethics Committee

</div>

<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: #f6fbff; display: inline-block">
<div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 60px">

<label class="fieldheader">Name of the ethics committee</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
    <input value="$s1_ethics_name" class="mdl-textfield__input" type="text" id="section1_ethics_name" name="section1_ethics_name" style="border-color: blue;" required>
    <span class="mdl-textfield__error">Please enter the name of the ethics committee</span>
</div> 
<input type="number" style="display:none" name="filechange" id="filechange" value="0">
<br />  <br />  <br />
 
<label class="fieldheader">Approval Status</label>
<br /> <br /> 

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s1_approvalstatus_1" >
  <input type="radio" id="s1_approvalstatus_1" class="mdl-radio__button" name="s1_approvalstatus" value="Approved" required>
  <span class="mdl-radio__label">Approved</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s1_approvalstatus_2" >
  <input type="radio" id="s1_approvalstatus_2" class="mdl-radio__button" name="s1_approvalstatus" value="Not Approved" required>
  <span class="mdl-radio__label">Not Approved</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s1_approvalstatus_3" >
  <input type="radio" id="s1_approvalstatus_3" class="mdl-radio__button" name="s1_approvalstatus" value="In review" required>
  <span class="mdl-radio__label">In Review</span>
  
</label>
<br />
  
</div>
<div style="text-align: left; float: right; width: 38%; padding: 20px 60px 20px 20px;">
<label class="fieldheader">Approval Date</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
    <input value="$s1_ethics_date" class="mdl-textfield__input" type="date" id="section1_ethics_date" name="section1_ethics_date" style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter the approval date</span>
</div>  
<br />  <br />  <br />    
<label class="fieldheader">Approval File</label>
<br /><br />
    <input type="file" style="display:none" id="s1_ethics_file" name="s1_ethics_file" onchange="alertFilename('s1_ethics_file')">
<label for="s1_ethics_file" class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored" id="uploadselect">
  <i class="material-icons">attach_file</i>
</label>

<div id="s1_ethics_filefilename" style></div>
<br />  
</div>
</div>
<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Duration of Research Project

</div>

<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: #f6fbff; display: inline-block">
<div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 60px">


<label class="fieldheader">Period required for pre-trial preparations</label>
<br />
<div class="mdl-textfield mdl-js-textfield " style="padding: 0px;width: 100%">
    <input value="$s1_pretrialperiod" class="mdl-textfield__input" type="text" id="s1_pretrialperiod" name="s1_pretrialperiod" required style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter period required for pre-trial preparations</span>
  </div>
  <br /><br /><br />
<label class="fieldheader">Period which may be needed for collecting the data</label>
<br/>
<div class="mdl-textfield mdl-js-textfield " style="padding: 0px;width: 100%">
    <input value="$s1_datacollectingperiod" class="mdl-textfield__input" type="text" id="s1_datacollectingperiod" name="s1_datacollectingperiod" required style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter period which may be needed for collecting the data </span>
  </div>
  
</div>
<div style="text-align: left; float: right; width: 38%; padding: 20px 60px 20px 20px;">

  <label class="fieldheader">Period that may be required for analysing the data</label>
<br />
<div class="mdl-textfield mdl-js-textfield " style="padding: 0px;width: 100%">
    <input value="$s1_analysisperiod" class="mdl-textfield__input" type="text" id="s1_analysisperiod" name="s1_analysisperiod" required style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter Period that may be required for analysing the data</span>
  </div>

</div><br /><br />
</div>

<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Declaration and Attestation

</div>

<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: #f6fbff; display: inline-block">
<center>
<div style="width:1075px">

<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="confirm">
  <input type="checkbox" id="confirm" name="confirm" class="mdl-checkbox__input" onclick="checker()">
  <span class="mdl-checkbox__label" style="font-size: 18px"><b>I/We have read the provisions, terms and conditions, and I/we shall abide by the relevant provisions contained under Rules of Govt.</b></span>
</label>

</div>
<br /><br />
<div style="width:100%; text-align: center;">
<center>
<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="display:none" id="s1_sbt" name="s1_sbt" onclick="submitFormOkay = true;">Save & Go To next section</button>
</center>
</div>
</center>
</div>


</form>      




aa;
    
echo $part1;
    
$coinvestigatordiv_already_exist="";
if($numberOfCoInvestigator>0)
{
    for($i=1;$i<=$numberOfCoInvestigator;$i++)
    {
     
     
    $que="select * from application_part_1_sub1_coinvestigator where appid='$appid' and serial=$i";
    $rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               
    $row1 = mysql_fetch_array($rs1);
    $coinvestigatordiv_already_exist= $coinvestigatordiv_already_exist."<div id='coinvestigator_$i' style='padding: 0px 40px 0px 40px;text-align: center;border-radius: 5px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out;margin-bottom:10px; background-color: white; height: 350px;'>
   <div style='text-align: left; float: left; width: 38%; padding: 20px 20px 20px 20px'>";
    if($i==$numberOfCoInvestigator)
      $coinvestigatordiv_already_exist= $coinvestigatordiv_already_exist."<i id='removebtn$i' type='button' onclick='removecoinvestigator();' class='material-icons' style='font-size: 36px;margin: 0px;padding:  0px;float: left;color:  red;cursor:  pointer;'>highlight_off</i>";
    else
      $coinvestigatordiv_already_exist= $coinvestigatordiv_already_exist."<i id='removebtn$i' type='button' onclick='removecoinvestigator();' class='material-icons' style='font-size: 36px;margin: 0px;padding:  0px;display:none; float: left;color:  red;cursor:  pointer;'>highlight_off</i>";
      $address=nl2br($row1[5]);  
      $coinvestigatordiv_already_exist= $coinvestigatordiv_already_exist."<label style='background-color: white;padding: 5px 5px 15px 5px;font-size: 20px;'>Details of Co-investigator $i</label><br /><br /><label class='fieldheader'>Name</label><br />
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input class='mdl-textfield__input' type='text' id='section1_coivestigator_$i"."_name' name='section1_coivestigator_$i"."_name' required style='border-color: blue;' value ='$row1[2]'><span class='mdl-textfield__error'>Please enter name of the co-investigator</span></div>
      <br /><br /><br /><label class='fieldheader'>Designation</label><br />
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'><input class='mdl-textfield__input' type='text' id='section1_coivestigator_$i"."_designation' name='section1_coivestigator_$i"."_designation' required style='border-color: blue;' value ='$row1[3]'><span class='mdl-textfield__error'>Please enter designation of the co-investigator</span></div>
   </div>
   <div style='text-align: left; float: right; width: 38%; padding: 20px 20px 20px 20px;'>
      <label class='fieldheader'>Email Id</label><br />
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input class='mdl-textfield__input' type='email' id='section1_coivestigator_$i"."_email' name='section1_coivestigator_$i"."_email' required style='border-color: blue;'  value ='$row1[4]'><span class='mdl-textfield__error'>Please enter email id of the co-investigator</span></div>
      <br /><br /><br /><label class='fieldheader'>Address</label><br />
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'><textarea class='mdl-textfield__input' type='text' rows= '4' id='section1_coivestigator_$i"."_address' name='section1_coivestigator_$i"."_address' style='border-color: blue; resize: none; outline: none; white-space:pre-wrap;' required>$row1[5]</textarea>    <span class='mdl-textfield__error'>Please enter the residential address of the co-investigator</span></div>
   </div>
   <br><br>
    
 <div style='width: 100%; text-align: center;display: inline-block; height: 117px'><br><br>
<label class='fieldheader'>Upload Bio Data</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='file' style='display:none' id='s1_coinvest_biodata_$i"."' name='s1_coinvest_biodata_$i"."' onchange='alertFilename(\\\"s1_coinvest_biodata_$i\\\")'>
<label for='s1_coinvest_biodata_$i"."' class='mdl-button mdl-js-button mdl-button--fab mdl-button--colored' id='uploadselect'>
<i class='material-icons'>attach_file</i></label>
<div id='s1_coinvest_biodata_$i"."filename'>
</div><br />  <br />  <br />
 </div>   
    </div>
   ";    
    }

    echo '<script>initialcoinvestigatorload("'.trim(preg_replace('/\s\s+/', ' ', $coinvestigatordiv_already_exist)).'");</script>';
    for($i=1;$i<=$numberOfCoInvestigator;$i++)
    {
          
          
         $que="select * from application_part_1_sub1_coinvestigator where appid='$appid' and serial=$i";
         $rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               
         $row1 = mysql_fetch_array($rs1);
         echo "<script>initialfileload('s1_coinvest_biodata_$i','$row1[6]');</script>";
         //s1_principal_investigator_biography
    }
    //echo "<script>initialcoinvestigatorload('$coinvestigatordiv_already_exist')</script>";
    
}
    echo "<script>initialfileload('s1_principal_investigator_biography','$s1_principal_bio_doc');</script>";
    echo "<script>radioselector('s1_approvalstatus','$s1_approvalstatus')</script>";
    
    //echo '<script>console.log("'.trim(preg_replace('/\s\s+/', ' ', $coinvestigatordiv_already_exist)).'") </script>';
    echo "<script>initialfileload('s1_ethics_file','$s1_ethics_doc');</script>";
    echo "<script>initialtickbox('confirm',$progress);</script>";
    //echo "<script>showorhideremovebutton();</script>";
    }
// Section 1 ENDS

// Section 2 STARTS
if($currentshow == 2)
{
 
$que="select app_title from application_temp where appid='$appid'";
$rs=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               
$row = mysql_fetch_array($rs);     
$s2_title_proj = $row[0];
 
$que="select * from application_part_2 where appid='$appid'";
$rs=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               

$s2_aims_proj = "";
$s2_intro_proj = "";
$s2_literature_review = "";


if(mysql_num_rows($rs)==1)
{
$_SESSION['isuntouched'] = 0;
$row = mysql_fetch_array($rs); 
$s2_aims_proj = $row[1];
$s2_intro_proj = $row[2];
$s2_literature_review = $row[3];


}
else
$_SESSION['isuntouched'] = 1;
$part2=<<<aa
<form method="post">
 <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Information Regarding The Research Project

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: #f6fbff; padding: 5%; text-align: left">

<div class="makebox">
<label class="fieldheader" > <b>Title of the Research Project </b>&nbsp; &nbsp; <img src="img\instruction_icon.png" style="max-width: 3%; max-height: 3%; object-fit: contain; cursor: pointer" onclick="instruction('s2_title');"/></label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "2" cols="60" id="s2_titleproj" name="s2_titleproj" style="border-color: blue; resize: none; outline: none;" required >$s2_title_proj</textarea>    
    <span class="mdl-textfield__error">Please enter the title of your project</span>
</div>
</div> 
<br />
<br />
<br />
<div class="makebox">
<label class="fieldheader"> <b>Aims and Objectives </b> &nbsp; &nbsp; <img src="img\instruction_icon.png" style="max-width: 3%; max-height: 3%; object-fit: contain; cursor: pointer" onclick="instruction('s2_objectives');"/></label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "3" cols="60" id="s2_aimsproj" name="s2_aimsproj" style="border-color: blue; resize: none; outline: none;" required >$s2_aims_proj</textarea>    
    <span class="mdl-textfield__error">Please enter the aims and objectives of your project</span>
</div>
</div>  
<br />
<br />
<br /> 
<div class="makebox"> 
<label class="fieldheader"> <b>Introduction </b>&nbsp; &nbsp; <img src="img\instruction_icon.png" style="max-width: 3%; max-height: 3%; object-fit: contain; cursor: pointer" onclick="instruction('s2_introduction');"/><span style="font-size: 16px; float: right;">(Put reference numbers to the instruction. You can add references in section 4)</span></label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "8" cols="60" id="s2_introproj" name="s2_introproj" style="border-color: blue; resize: none; outline: none;" required >$s2_intro_proj</textarea>    
    <span class="mdl-textfield__error">Please enter the introduction of your project</span>
</div>
</div> 
<br />
<br />
<br />
<div class="makebox">
<label class="fieldheader"> <b>Review of literature </b> &nbsp; &nbsp; <img src="img\instruction_icon.png" style="max-width: 3%; max-height: 3%; object-fit: contain; cursor: pointer" onclick="instruction('s2_review_lit');"/>  </label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "8" cols="60" id="s2_reviewproj" name="s2_reviewproj" style="border-color: blue; resize: none; outline: none;" required >$s2_literature_review</textarea>
    <span class="mdl-textfield__error">Please enter the review of literature</span>
</div>
</div>
<br />
<br />
<br />




<div style="width:100%; text-align: center; float: left">
<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" name="s2_sbt" onclick="submitFormOkay = true;">Save & Go To next section</button>
</div>
</div>


</form>      
      

aa;
}

if($currentshow == 2)
{
    echo $part2;
}
// Section 2 ENDS


// Section 3 STARTS
if($currentshow == 3)
{
 
$que="select * from application_part_3 where appid='$appid'";
$rs=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error()); 
              
$s3_studytype = "";
$s3_typeoftrial = "";
$s3_studydesign = "";
$s3_allocofconcealment = "";
$s3_blinding = "";
$s3_phase = "";
$s3_genrandomseq="";
$s3_targetsamplesize="";
$s3_dateofenrolment="";
$s3_durationofparticipation="";
$s3_sequence="";
$s3_followup="";
$s3_intervention1="";
$s3_intervention2="";
$s3_intervention3="";
$s3_withdrawal_1="";
$s3_withdrawal_2="";
$s3_withdrawal_3="";
$s3_withdrawal_4="";
$s3_assessment_1= "";
$s3_assessment_2 = "";
$s3_assessment_3 = "";
$s3_assessment_4 = "";
$s3_primaryoutcome ="";
$s3_secondaryoutcome = "";
$s3_selec_sub = "";
$s3_incl_criteria = "";
$s3_age = "";
$s3_gender = "";
$s3_other_details = "";
$s3_excl_criteria = "";

if(mysql_num_rows($rs)==1)
{
$_SESSION['isuntouched'] = 0;
$row = mysql_fetch_array($rs); 
$s3_studytype = $row[1];
$s3_typeoftrial = $row[2];
$s3_studydesign = $row[3];
$s3_allocofconcealment = $row[4];
$s3_blinding = $row[5];
$s3_phase = $row[6];
$s3_genrandomseq = $row[7];
$s3_targetsamplesize = $row[8];
$s3_dateofenrolment = $row[9];
$s3_durationofparticipation= $row[10];
$s3_sequence = $row[11];
$s3_followup = $row[12];
$s3_intervention1=$row[13];
$s3_intervention2=$row[14];
$s3_intervention3=$row[15];
$s3_withdrawal_1=$row[16];
$s3_withdrawal_2=$row[17];
$s3_withdrawal_3=$row[18];
$s3_withdrawal_4=$row[19];
$s3_assessment_1=$row[20];
$s3_assessment_2 = $row[21];
$s3_assessment_3 = $row[22];
$s3_assessment_4 = $row[23];
$s3_primaryoutcome = $row[24];
$s3_secondaryoutcome = $row[25];
$s3_selec_sub = $row[26];
$s3_incl_criteria = $row[27];
$s3_age = $row[28];
$s3_gender = $row[29];
$s3_other_details = $row[30];
$s3_excl_criteria = $row[31];

}
else
$_SESSION['isuntouched'] = 1;
$part3=<<<aa
<form method="post">
 <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Methodology

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: #f6fbff; display: inline-block;">
<div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 60px">

<!--   Study Type  S -->
<label class="fieldheader">Study Type</label>
<br /> <br /> 

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_studytype_1">
  <input type="radio" id="s3_studytype_1" class="mdl-radio__button" name="s3_studytype" value="Post Graduate" required>
  <span class="mdl-radio__label">Post Graduate</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_studytype_2">
  <input type="radio" id="s3_studytype_2" class="mdl-radio__button" name="s3_studytype" value="Dept Research Project">
  <span class="mdl-radio__label">Dept Research Project</span>
  
</label>
<br/>
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_studytype_3">
  <input type="radio" id="s3_studytype_3" class="mdl-radio__button" name="s3_studytype" value="Inst. Research Project">
  <span class="mdl-radio__label">Inst. Research Project</span>
</label>
<br/>

<!--   Study Type   E --> 
<br /> <br /> <br />

<!--   Study Design   S --> 

<label class="fieldheader">Study Design</label>
<br /> <br /> 

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_studydesign_1" onclick="unselectother('s3_studydesign')">
  <input type="radio" id="s3_studydesign_1" class="mdl-radio__button" name="s3_studydesign" value="Single Arm Trial" required>
  <span class="mdl-radio__label">Single Arm Trial</span>
  
</label>
<br />

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_studydesign_2" onclick="unselectother('s3_studydesign')">
  <input type="radio" id="s3_studydesign_2" class="mdl-radio__button" name="s3_studydesign" value="Non-randomized, Placebo Controlled Trial" required>
  <span class="mdl-radio__label">Non-randomized, Placebo Controlled Trial </span>
  
</label>
<br />

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_studydesign_3" onclick="unselectother('s3_studydesign')">
  <input type="radio" id="s3_studydesign_3" class="mdl-radio__button" name="s3_studydesign" value="Non-randomized, Active Controlled Trial" required>
  <span class="mdl-radio__label">Non-randomized, Active Controlled Trial</span>
  
</label>
<br />

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_studydesign_4" onclick="unselectother('s3_studydesign')">
  <input type="radio" id="s3_studydesign_4" class="mdl-radio__button" name="s3_studydesign" value="Non-randomized, Multiple Arm Trial" required>
  <span class="mdl-radio__label">Non-randomized, Multiple Arm Trial</span>
  
</label>
<br />

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_studydesign_5" onclick="unselectother('s3_studydesign')">
  <input type="radio" id="s3_studydesign_5" class="mdl-radio__button" name="s3_studydesign" value="Randomized, Parallel Group Trial" required>
  <span class="mdl-radio__label">Randomized, Parallel Group Trial</span>
  
</label>
<br />

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_studydesign_6" onclick="unselectother('s3_studydesign')">
  <input type="radio" id="s3_studydesign_6" class="mdl-radio__button" name="s3_studydesign" value="Randomized, Parallel Group, Placebo Controlled Trial" required>
  <span class="mdl-radio__label">Randomized, Parallel Group, Placebo Controlled Trial</span>
  
</label>
<br />

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_studydesign_7" onclick="unselectother('s3_studydesign')">
  <input type="radio" id="s3_studydesign_7" class="mdl-radio__button" name="s3_studydesign" value=" Randomized, Parallel Group, Active Controlled Trial" required>
  <span class="mdl-radio__label"> Randomized, Parallel Group, Active Controlled Trial</span>
  
</label>
<br />

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_studydesign_8" onclick="unselectother('s3_studydesign')">
  <input type="radio" id="s3_studydesign_8" class="mdl-radio__button" name="s3_studydesign" value="Randomized, Parallel Group, Multiple Arm Trial" required>
  <span class="mdl-radio__label">Randomized, Parallel Group, Multiple Arm Trial </span>
  
</label>
<br />

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_studydesign_9" onclick="unselectother('s3_studydesign')">
  <input type="radio" id="s3_studydesign_9" class="mdl-radio__button" name="s3_studydesign" value="Randomised, Crossover Trial" required>
  <span class="mdl-radio__label">Randomised, Crossover Trial</span>
  
</label>
<br />

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_studydesign_10" onclick="unselectother('s3_studydesign')">
  <input type="radio" id="s3_studydesign_10" class="mdl-radio__button" name="s3_studydesign" value=" Cluster Randomised Trial" required>
  <span class="mdl-radio__label"> Cluster Randomized Trial</span>
  
</label>
<br />

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_studydesign_11" onclick="unselectother('s3_studydesign')">
  <input type="radio" id="s3_studydesign_11" class="mdl-radio__button" name="s3_studydesign" value=" Randomised Factorial Trial" required>
  <span class="mdl-radio__label"> Randomized Factorial Trial</span>
  
</label>
<br />

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_studydesign_12" style="float:left; padding-right: 4%" onclick="focusonotherbox('s3_studydesign')">
  <input type="radio" id="s3_studydesign_12" class="mdl-radio__button" name="s3_studydesign" value="--Others--" >
  <span class="mdl-radio__label">Others</span>
</label>
<div class="mdl-textfield mdl-js-textfield" style="width: 60%;float: left; padding-top: 0px">
    <input class="mdl-textfield__input" type="text" style="color: blue" id="s3_studydesign_others" name="s3_studydesign_others">
    <label id="s3_studydesign_others_label" class="mdl-textfield__label" for="s3_studydesign_others" style="display:none; color: red">Please Specify</label>
</div>

<br/>




<!--   Study Design   E --> 
  
<br /> <br /> <br /> <br /> 
<!--   Allocation of Concealment   S -->  
  
<label class="fieldheader"> Method for Allocation of Concealment </label>
<br /> <br /> 

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_allocofconcealment_1" onclick="unselectother('s3_allocofconcealment')">
  <input type="radio" id="s3_allocofconcealment_1" class="mdl-radio__button" name="s3_allocofconcealment" value="Alternate" required>
  <span class="mdl-radio__label">Alternate</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_allocofconcealment_2" onclick="unselectother('s3_allocofconcealment')">
  <input type="radio" id="s3_allocofconcealment_2" class="mdl-radio__button" name="s3_allocofconcealment" value="An Open list of random numbers" required>
  <span class="mdl-radio__label">An Open list of random numbers</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_allocofconcealment_3" onclick="unselectother('s3_allocofconcealment')">
  <input type="radio" id="s3_allocofconcealment_3" class="mdl-radio__button" name="s3_allocofconcealment" value="Case record numbers" required>
  <span class="mdl-radio__label">Case record numbers</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_allocofconcealment_4" onclick="unselectother('s3_allocofconcealment')">
  <input type="radio" id="s3_allocofconcealment_4" class="mdl-radio__button" name="s3_allocofconcealment" value="Centralized" required>
  <span class="mdl-radio__label">Centralized</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_allocofconcealment_5" onclick="unselectother('s3_allocofconcealment')">
  <input type="radio" id="s3_allocofconcealment_5" class="mdl-radio__button" name="s3_allocofconcealment" value="Dates of Birth or day of the week" required>
  <span class="mdl-radio__label">Date of Birth or day of the week</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_allocofconcealment_6" onclick="unselectother('s3_allocofconcealment')">
  <input type="radio" id="s3_allocofconcealment_6" class="mdl-radio__button" name="s3_allocofconcealment" value="On-site computer system" required>
  <span class="mdl-radio__label">On-site computer system</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_allocofconcealment_7" onclick="unselectother('s3_allocofconcealment')">
  <input type="radio" id="s3_allocofconcealment_7" class="mdl-radio__button" name="s3_allocofconcealment" value="Pharmacy-controlled Randomization" required>
  <span class="mdl-radio__label">Pharmacy-controlled Randomization</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_allocofconcealment_8" onclick="unselectother('s3_allocofconcealment')">
  <input type="radio" id="s3_allocofconcealment_8" class="mdl-radio__button" name="s3_allocofconcealment" value="Pre-numbered or coded identical containers" required>
  <span class="mdl-radio__label">Pre-numbered or coded identical containers</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_allocofconcealment_9" onclick="unselectother('s3_allocofconcealment')">
  <input type="radio" id="s3_allocofconcealment_9" class="mdl-radio__button" name="s3_allocofconcealment" value="Sequentially numbered, sealed, opaque envelopes" required>
  <span class="mdl-radio__label">Sequentially numbered, sealed, opaque envelopes</span>
  
</label>
<br />

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_allocofconcealment_10" onclick="unselectother('s3_allocofconcealment')">
  <input type="radio" id="s3_allocofconcealment_10" class="mdl-radio__button" name="s3_allocofconcealment" value="Not-Applicable" required>
  <span class="mdl-radio__label">Not-Applicable</span>
  
</label>
<br />


<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_allocofconcealment_11" style="float:left; padding-right: 4%" onclick="focusonotherbox('s3_allocofconcealment')">
  <input type="radio" id="s3_allocofconcealment_11" class="mdl-radio__button" name="s3_allocofconcealment" value="--Others--" >
  <span class="mdl-radio__label">Others</span>
</label>

<div class="mdl-textfield mdl-js-textfield" style="width: 60%;float: left; padding-top: 0px">
    <input class="mdl-textfield__input" type="text" style="color: blue" id="s3_allocofconcealment_others" name="s3_allocofconcealment_others">
    <label id="s3_allocofconcealment_others_label" class="mdl-textfield__label" for="s3_allocofconcealment_others" style="display:none; color: red">Please Specify</label>
</div>
<br/>



<br /><br /><br />

<label class="fieldheader">Target Sample Size</label>
<br />
<div class="mdl-textfield mdl-js-textfield " style="padding: 0px;width: 100%">
    <input value="$s3_targetsamplesize" class="mdl-textfield__input" type="number" id="s3_targetsamplesize" name="s3_targetsamplesize" required style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter Target Sample Size</span>
  </div>

<br /><br /><br /><br />

  <label class="fieldheader">Date of First Enrollment</label>
<br />
<div class="mdl-textfield mdl-js-textfield " style="padding: 0px;width: 100%">
    <input value="$s3_dateofenrolment" class="mdl-textfield__input" type="date" id="s3_dateofenrolment" name="s3_dateofenrolment" required style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter Date of First Enrollment</span>
  </div>


<br /><br /><br /><br />

<label class="fieldheader">Description of the sequence and duration of all trial periods</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" rows= "3" id="s3_sequence" name="s3_sequence" style="border-color: blue; resize: none; outline: none;" required >$s3_sequence</textarea>    
    <span class="mdl-textfield__error">Please enter Description of the sequence and duration of all trial periods</span>
</div> 


<br /><br /><br /><br />

  <label class="fieldheader">Estimated duration of subject participation</label>
<br />
<div class="mdl-textfield mdl-js-textfield " style="padding: 0px;width: 100%">
    <input value="$s3_durationofparticipation" class="mdl-textfield__input" type="text" id="s3_durationofparticipation" name="s3_durationofparticipation" required style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter estimated duration of subject participation</span>
  </div>
  

  
<!--   Allocation of Concealment  E -->  
  
</div>
<div style="text-align: left; float: right; width: 38%; padding: 20px 60px 20px 20px; margin-bottom: 35px;">

<!--   Type of Trial  S --> 
  <label class="fieldheader">Type of trial</label>
<br /> <br /> 

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_typeoftrial_1" onclick="unselectother('s3_typeoftrial')">
  <input type="radio" id="s3_typeoftrial_1" class="mdl-radio__button" name="s3_typeoftrial" value="Observational" required>
  <span class="mdl-radio__label">Observational</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_typeoftrial_2" onclick="unselectother('s3_typeoftrial')">
  <input type="radio" id="s3_typeoftrial_2" class="mdl-radio__button" name="s3_typeoftrial" value="Interventional" >
  <span class="mdl-radio__label">Interventional</span>
  
</label>
<br/>
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_typeoftrial_3" onclick="unselectother('s3_typeoftrial')">
  <input type="radio" id="s3_typeoftrial_3" class="mdl-radio__button" name="s3_typeoftrial" value="PMS (Post marketing Surveillance)" >
  <span class="mdl-radio__label">PMS (Post Marketing Surveillance)</span>
</label>
<br/>
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_typeoftrial_4" onclick="unselectother('s3_typeoftrial')">
  <input type="radio" id="s3_typeoftrial_4" class="mdl-radio__button" name="s3_typeoftrial" value="BA (Bioavailibility)" >
  <span class="mdl-radio__label">BA (Bioavailibility)</span>
</label>
<br/>
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_typeoftrial_5" onclick="unselectother('s3_typeoftrial')">
  <input type="radio" id="s3_typeoftrial_5" class="mdl-radio__button" name="s3_typeoftrial" value="BE (Bioequivalence)" >
  <span class="mdl-radio__label">BE (Bioequivalence)</span>
</label>
<br/>
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_typeoftrial_6" style="float:left; padding-right: 4%" onclick="focusonotherbox('s3_typeoftrial')">
  <input type="radio" id="s3_typeoftrial_6" class="mdl-radio__button" name="s3_typeoftrial" value="--Others--" >
  <span class="mdl-radio__label">Others</span>
</label>
<div class="mdl-textfield mdl-js-textfield" style="width: 60%;float: left; padding-top: 0px">
    <input class="mdl-textfield__input" type="text" style="color: blue" id="s3_typeoftrial_others" name="s3_typeoftrial_others">
    <label id="s3_typeoftrial_others_label" class="mdl-textfield__label" for="s3_typeoftrial_others" style="display:none; color: red">Please Specify</label>
</div>




<br/> <br /> <br /><br />
<!--   Type of Trial  E --> 


<!--   Blinding Masking  S -->
<label class="fieldheader">Method of Blinding/Masking</label>
<br /> <br /> 

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_blinding_1">
  <input type="radio" id="s3_blinding_1" class="mdl-radio__button" name="s3_blinding" value="Double Blind Double Dummy" required>
  <span class="mdl-radio__label">Double Blind Double Dummy </span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_blinding_2">
  <input type="radio" id="s3_blinding_2" class="mdl-radio__button" name="s3_blinding" value="Investigator Blinded">
  <span class="mdl-radio__label">Investigator Blinded</span>
  
</label>
<br/>
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_blinding_3">
  <input type="radio" id="s3_blinding_3" class="mdl-radio__button" name="s3_blinding" value="Open Label">
  <span class="mdl-radio__label">Open Label</span>
</label>
<br/>



<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_blinding_4">
  <input type="radio" id="s3_blinding_4" class="mdl-radio__button" name="s3_blinding" value="Outcome Assessor Blinded">
  <span class="mdl-radio__label">Outcome Assessor Blinded</span>
  
</label>
<br/>



<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_blinding_5">
  <input type="radio" id="s3_blinding_5" class="mdl-radio__button" name="s3_blinding" value="Participant and Investigator Blinded">
  <span class="mdl-radio__label">Participant and Investigator Blinded</span>
  
</label>
<br/>


<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_blinding_6">
  <input type="radio" id="s3_blinding_6" class="mdl-radio__button" name="s3_blinding" value="Participant Blinded">
  <span class="mdl-radio__label">Participant Blinded</span>
  
</label>
<br/>


<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_blinding_7">
  <input type="radio" id="s3_blinding_7" class="mdl-radio__button" name="s3_blinding" value="Participant, Investigator and Outcome Assessor Blinded">
  <span class="mdl-radio__label">Participant, Investigator and Outcome Assessor Blinded</span>
  
</label>
<br/>

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_blinding_8">
  <input type="radio" id="s3_blinding_8" class="mdl-radio__button" name="s3_blinding" value="Participant, Investigator, and Outcome assessor and date-entry operator blinded">
  <span class="mdl-radio__label">Participant, Investigator, and Outcome assessor and date-entry operator blinded</span>
  
</label>
<br/><br/>

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_blinding_9">
  <input type="radio" id="s3_blinding_9" class="mdl-radio__button" name="s3_blinding" value="Not Applicable">
  <span class="mdl-radio__label">Not Applicable</span>
  
</label>
<br/> <br /> <br /> <br />

<!--   Blinding Masking  E -->

<!--   Phase of Trial S -->

<label class="fieldheader">Phase of Trial</label>
<br /> <br /> 

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_phase_1">
  <input type="radio" id="s3_phase_1" class="mdl-radio__button" name="s3_phase" value="Phase 1" required>
  <span class="mdl-radio__label">Phase 1</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_phase_2">
  <input type="radio" id="s3_phase_2" class="mdl-radio__button" name="s3_phase" value="Phase 1, Phase 2">
  <span class="mdl-radio__label">Phase 1, Phase 2</span>
  
</label>
<br/>
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_phase_3">
  <input type="radio" id="s3_phase_3" class="mdl-radio__button" name="s3_phase" value="Phase 2">
  <span class="mdl-radio__label">Phase 2</span>
</label>
<br/>

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_phase_4">
  <input type="radio" id="s3_phase_4" class="mdl-radio__button" name="s3_phase" value="Phase 2, Phase 3">
  <span class="mdl-radio__label">Phase 2, Phase 3</span>
</label>
<br/>

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_phase_5">
  <input type="radio" id="s3_phase_5" class="mdl-radio__button" name="s3_phase" value="Phase 3">
  <span class="mdl-radio__label">Phase 3</span>
</label>
<br/>

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_phase_6">
  <input type="radio" id="s3_phase_6" class="mdl-radio__button" name="s3_phase" value="Phase 3, Phase 4">
  <span class="mdl-radio__label">Phase 3, Phase 4</span>
</label>
<br/>

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_phase_7">
  <input type="radio" id="s3_phase_7" class="mdl-radio__button" name="s3_phase" value="Phase 4">
    <span class="mdl-radio__label">Phase 4</span>
</label>
<br/>

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_phase_8">
  <input type="radio" id="s3_phase_8" class="mdl-radio__button" name="s3_phase" value="Phase 4, Not Applicable">
  <span class="mdl-radio__label">Phase 4, Not Applicable</span>
</label>
<br/>

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_phase_9">
  <input type="radio" id="s3_phase_9" class="mdl-radio__button" name="s3_phase" value="Post Marketing Surveillance">
  <span class="mdl-radio__label">Post Marketing Surveillance</span>
</label>


<!--   Phase of Trial E -->
<br /> <br /> <br /> <br /> 
<!--   Gen Seq S -->

<label class="fieldheader"> Method for Generating Randomization Sequence -</label>
<br /> <br /> 

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_genrandomseq_1" onclick="unselectother('s3_genrandomseq')">
  <input type="radio" id="s3_genrandomseq_1" class="mdl-radio__button" name="s3_genrandomseq" value="Adaptive Randomization: Minimization" required>
  <span class="mdl-radio__label">Adaptive Randomization: Minimization</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_genrandomseq_2" onclick="unselectother('s3_genrandomseq')">
  <input type="radio" id="s3_genrandomseq_2" class="mdl-radio__button" name="s3_genrandomseq" value="Adaptive Randomization: Coin Toss" required>
  <span class="mdl-radio__label">Adaptive Randomization: Coin Toss</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_genrandomseq_3" onclick="unselectother('s3_genrandomseq')">
  <input type="radio" id="s3_genrandomseq_3" class="mdl-radio__button" name="s3_genrandomseq" value="Lottery" required>
  <span class="mdl-radio__label">Lottery</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_genrandomseq_4" onclick="unselectother('s3_genrandomseq')">
  <input type="radio" id="s3_genrandomseq_4" class="mdl-radio__button" name="s3_genrandomseq" value="Roll of Dice" required>
  <span class="mdl-radio__label">Roll of Dice</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_genrandomseq_5" onclick="unselectother('s3_genrandomseq')">
  <input type="radio" id="s3_genrandomseq_5" class="mdl-radio__button" name="s3_genrandomseq" value="Shuffling Card" required>
  <span class="mdl-radio__label">Shuffling Card</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_genrandomseq_6" onclick="unselectother('s3_genrandomseq')">
  <input type="radio" id="s3_genrandomseq_6" class="mdl-radio__button" name="s3_genrandomseq" value="Computer Generated randomization" required>
  <span class="mdl-radio__label">Computer Generated Randomization</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_genrandomseq_7" onclick="unselectother('s3_genrandomseq')">
  <input type="radio" id="s3_genrandomseq_7" class="mdl-radio__button" name="s3_genrandomseq" value="Permuted Block Randomization: fixed" required>
  <span class="mdl-radio__label">Permuted Block Randomization: fixed</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_genrandomseq_8" onclick="unselectother('s3_genrandomseq')">
  <input type="radio" id="s3_genrandomseq_8" class="mdl-radio__button" name="s3_genrandomseq" value="Permuted Block Randomization: variable" required>
  <span class="mdl-radio__label">Permuted Block Randomization: variable</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_genrandomseq_9" onclick="unselectother('s3_genrandomseq')">
  <input type="radio" id="s3_genrandomseq_9" class="mdl-radio__button" name="s3_genrandomseq" value="Random Number Table" required>
  <span class="mdl-radio__label">Random Number Table</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_genrandomseq_10" onclick="unselectother('s3_genrandomseq')">
  <input type="radio" id="s3_genrandomseq_10" class="mdl-radio__button" name="s3_genrandomseq" value="Stratified Block Randomization" required>
  <span class="mdl-radio__label">Stratified Block Randomization</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_genrandomseq_11" onclick="unselectother('s3_genrandomseq')">
  <input type="radio" id="s3_genrandomseq_11" class="mdl-radio__button" name="s3_genrandomseq" value="Stratified Randomization" required>
  <span class="mdl-radio__label">Stratified Randomization</span>
  
</label>
<br />
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_genrandomseq_12" onclick="unselectother('s3_genrandomseq')">
  <input type="radio" id="s3_genrandomseq_12" class="mdl-radio__button" name="s3_genrandomseq" value="Not Applicable" required>
  <span class="mdl-radio__label">Not Applicable</span>
  
</label>
<br />



<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_genrandomseq_13" style="float:left; padding-right: 4%" onclick="focusonotherbox('s3_genrandomseq')">
  <input type="radio" id="s3_genrandomseq_13" class="mdl-radio__button" name="s3_genrandomseq" value="--Others--" >
  <span class="mdl-radio__label">Others</span>
</label>
<div class="mdl-textfield mdl-js-textfield" style="width: 60%;float: left; padding-top: 0px">
    <input class="mdl-textfield__input" type="text" style="color: blue" id="s3_genrandomseq_others" name="s3_genrandomseq_others">
    <label id="s3_genrandomseq_others_label" class="mdl-textfield__label" for="s3_genrandomseq_others" style="display:none; color: red">Please Specify</label>
</div>

<br /><br /><br /><br />

<!--   Gen Seq E -->


  <label class="fieldheader">Follow Up, if any</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" rows= "3" id="s3_followup" name="s3_followup" style="border-color: blue; resize: none; outline: none;" >$s3_followup</textarea>    
    <span class="mdl-textfield__error">Please enter Follow up</span>
</div> 

</div>
</div>
<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Intervention

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: #f6fbff; display: inline-block; padding: 5%; text-align: left">
<div class="makebox"> 
<label class="fieldheader">	Description of, and justification for, the route of administration, dosage, dosage regimen, and treatment period(s) </label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" rows= "4" id="s3_intervention1" name="s3_intervention1" style="border-color: blue; resize: none; outline: none;" required >$s3_intervention1</textarea>    
    <span class="mdl-textfield__error">Please enter the details </span>
</div></div> 



<div class="makebox"> 
<label class="fieldheader">	A description of the trial treatment(s) and the dosage and dosage regimen of the investigational product(s). Also include a description of the dosage form, packaging and labelling of the investigational product(s). </label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input"  rows= "4" id="s3_intervention2" name="s3_intervention2" style="border-color: blue; resize: none; outline: none;" required >$s3_intervention2</textarea>    
    <span class="mdl-textfield__error">Please enter the details </span>
</div> </div> 

<div class="makebox"> 
<label class="fieldheader"> A description of the “stopping rules" or “discontinuation criteria" for individual subjects, parts of trial and entire trial. </label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" rows= "4" id="s3_intervention3" name="s3_intervention3" style="border-color: blue; resize: none; outline: none;" required >$s3_intervention3</textarea>    
    <span class="mdl-textfield__error">Please enter the details </span>
</div> </div> 

<br /><br />
</div>

<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Subject withdrawal criteria
        <br />
        <label style="font-size: 16px;">
        i.e. terminating investigational product treatment/trial treatment and procedures specifying
        </label>

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: #f6fbff; display: inline-block; padding: 5%; text-align: left">
<div class="makebox"> 
<label class="fieldheader"> When and how to withdraw subjects from the trial/investigational product treatment  </label>

<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "3" id="s3_withdrawal_1" name="s3_withdrawal_1" style="border-color: blue; resize: none; outline: none;" required >$s3_withdrawal_1</textarea>    
    <span class="mdl-textfield__error">Please enter the details </span>
</div> </div> 

<div class="makebox"> 
<label class="fieldheader">The type and timing of the data to be collected for withdrawn subjects </label>

<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "3" id="s3_withdrawal_2" name="s3_withdrawal_2" style="border-color: blue; resize: none; outline: none;" required >$s3_withdrawal_2</textarea>    
    <span class="mdl-textfield__error">Please enter the details </span>
</div> </div> 

<div class="makebox"> 
<label class="fieldheader">Whether and how subjects are to be replaced </label>

<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "3" id="s3_withdrawal_3" name="s3_withdrawal_3" style="border-color: blue; resize: none; outline: none;" required >$s3_withdrawal_3</textarea>    
    <span class="mdl-textfield__error">Please enter the details </span>
</div> </div> 

<div class="makebox"> 
<label class="fieldheader">The follow-up for subjects withdrawn from investigational product treatment/trial treatment </label>

<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "3" id="s3_withdrawal_4" name="s3_withdrawal_4" style="border-color: blue; resize: none; outline: none;" required >$s3_withdrawal_4</textarea>    
    <span class="mdl-textfield__error">Please enter the details </span>
</div> </div> 

</div>




<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Assessment of safety of trial subjects/research participants

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: #f6fbff; display: inline-block; padding: 5%; text-align: left">
<div class="makebox"> 
<label class="fieldheader"> Assessment of safety of trial subjects/research participants</label>

<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   <textarea class="mdl-textfield__input" type="text" rows= "3" id="s3_assessment_1" name="s3_assessment_1" style="border-color: blue; resize: none; outline: none;" required >$s3_assessment_1</textarea>    
    <span class="mdl-textfield__error">Please enter the details </span>
</div>
</div> 

<div class="makebox"> 
<label class="fieldheader"> The methods and timing for assessing, recording, and analysing safety parameters </label>

<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "3" id="s3_assessment_2" name="s3_assessment_2" style="border-color: blue; resize: none; outline: none;" required >$s3_assessment_2</textarea>    
    <span class="mdl-textfield__error">Please enter the details </span>
</div>
</div> 

<div class="makebox"> 
<label class="fieldheader"> Procedures for eliciting report of and for recording and reporting adverse event and intercurrent illnesses</label>

<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "3" id="s3_assessment_3" name="s3_assessment_3" style="border-color: blue; resize: none; outline: none;" required >$s3_assessment_3</textarea>    
    <span class="mdl-textfield__error">Please enter the details </span>
</div> 
</div> 

<div class="makebox"> 
<label class="fieldheader"> The type and duration of the follow-up of subjects after adverse events </label>

<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "3" id="s3_assessment_4" name="s3_assessment_4" style="border-color: blue; resize: none; outline: none;" required >$s3_assessment_4</textarea>    
    <span class="mdl-textfield__error">Please enter the details </span>
</div> 
</div> 

</div>




<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Outcome and Time Points

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: #f6fbff; display: inline-block; padding: 5%; text-align: left">

<label class="fieldheader">Primary Outcome and time points</label>

<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   <textarea class="mdl-textfield__input" type="text" rows= "3" id="s3_primaryoutcome" name="s3_primaryoutcome" style="border-color: blue; resize: none; outline: none;" required >$s3_primaryoutcome</textarea>    
    <span class="mdl-textfield__error">Please enter the details </span>
</div> 
<br/>
<br/><br/>

<label class="fieldheader">Secondary Outcome and time points</label>
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   <textarea class="mdl-textfield__input" type="text" rows= "3" id="s3_secondaryoutcome" name="s3_secondaryoutcome" style="border-color: blue; resize: none; outline: none;" required >$s3_secondaryoutcome</textarea>    
    <span class="mdl-textfield__error">Please enter the details </span>
</div> 
</div> 


<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Selection of Subjects

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: #f6fbff; display: inline-block; padding: 5%; text-align: left">
<div style="width: 100%;display: inline-block;float: left">
<label class="fieldheader">	Inclusion Criteria </label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "3" id="s3_incl_criteria" name="s3_incl_criteria" style="border-color: blue; resize: none; outline: none;" required >$s3_incl_criteria</textarea>    
    <span class="mdl-textfield__error">Please enter the details </span>
</div>
<br /><br /><br /> 
</div>

<div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 0px">

<label class="fieldheader">Number of Selected Subjects</label>
<br />
<div class="mdl-textfield mdl-js-textfield " style="padding: 0px;width: 100%">
    <input value="$s3_selec_sub" class="mdl-textfield__input" type="number" id="s3_selec_sub" name="s3_selec_sub" required style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter the number of selected subjects</span>
  </div>
  
<br /><br /><br /> 
<label class="fieldheader">Age</label>
<br />
<div class="mdl-textfield mdl-js-textfield " style="padding: 0px;width: 100%">
    <input value="$s3_age" class="mdl-textfield__input" type="text" id="s3_age" name="s3_age" required style="border-color: blue;">
    <span class="mdl-textfield__error">Please enter the details</span>
  </div>

</div>
<div style="text-align: left; float: right; width: 38%; padding: 20px 0px 20px 20px; margin-bottom: 35px;">
<label class="fieldheader">Gender</label>
<br /> <br /> 

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_male">
  <input type="radio" id="s3_male" class="mdl-radio__button" name="s3_gender" value="Male" required>
  <span class="mdl-radio__label">Male</span>
  
</label>
<br />

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_female">
  <input type="radio" id="s3_female" class="mdl-radio__button" name="s3_gender" value="Female" required>
  <span class="mdl-radio__label">Female</span>
  
</label>
<br />

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="s3_both">
  <input type="radio" id="s3_both" class="mdl-radio__button" name="s3_gender" value="Both" required>
  <span class="mdl-radio__label">Both</span>
  
</label>
<br />

</div>

<div style="width: 100%;display: inline-block;float: left;">
<br /><br /><br />
<label class="fieldheader">	Other Details </label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "3" id="s3_other_details" name="s3_other_details" style="border-color: blue; resize: none; outline: none;" >$s3_other_details</textarea>    
    <span class="mdl-textfield__error">Please enter the details </span>
</div> 
<br /><br /><br />
<label class="fieldheader">	Exclusion Criteria </label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "3" id="s3_excl_criteria" name="s3_excl_criteria" style="border-color: blue; resize: none; outline: none;" required >$s3_excl_criteria</textarea>    
    <span class="mdl-textfield__error">Please enter the details </span>
</div> 
</div>

<div style="width:100%; text-align: center; float: left">
<br><br>
<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" name="s3_sbt" onclick="submitFormOkay = true;">Save & Go to next section</button>
</div>
</div>
</form>      
aa;
}

if($currentshow == 3)
{
    echo $part3;
    echo "<script>radioselector('s3_studytype','$s3_studytype')</script>";
    echo "<script>radioselector('s3_typeoftrial','$s3_typeoftrial')</script>";
    echo "<script>radioselector('s3_studydesign','$s3_studydesign')</script>";
    echo "<script>radioselector('s3_allocofconcealment','$s3_allocofconcealment')</script>";
    echo "<script>radioselector('s3_blinding','$s3_blinding')</script>";
    echo "<script>radioselector('s3_phase','$s3_phase')</script>";
    echo "<script>radioselector('s3_genrandomseq','$s3_genrandomseq')</script>";
    echo "<script>radioselector('s3_gender','$s3_gender')</script>";
    
}
// Section 3 ENDS s3_gender

// Section 4 STARTS
if($currentshow == 4)
{
     
$que="select * from application_part_4 where appid='$appid'";
$rs=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               

 
$que="select * from  application_part_4_budget_recurring where appid='$appid'";
$rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               

$numberOfNonRecurring = mysql_num_rows($rs1);
if($numberOfNonRecurring == 0)
    $numberOfNonRecurring = 1;
    
     
$que="select * from  application_part_4_budget_equipment where appid='$appid'";
$rs2=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               

$numberOfNonEquipment = mysql_num_rows($rs2);
if($numberOfNonEquipment == 0)
    $numberOfNonEquipment = 1;
    
     
$que="select * from  application_part_4_budget_nonrecurring_other where appid='$appid'";
$rs4=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               

$numberOfNonRecurringOther = mysql_num_rows($rs4);

    




  $s4_books_justif1= "";
  $s4_books_yr1_serial1= "";
  $s4_books_yr2_serial1= "";
  $s4_books_yr3_serial1= "";
  $s4_books_total_serial1= "";
  
   $s4_tada_justif1= "";
  $s4_tada_yr1_serial1= "";
  $s4_tada_yr2_serial1= "";
  $s4_tada_yr3_serial1= "";
  $s4_tada_total_serial1= "";
  
   $s4_instsupport_justif1= "";
  $s4_instsupport_yr1_serial1= "";
  $s4_instsupport_yr2_serial1= "";
  $s4_instsupport_yr3_serial1= "";
  $s4_instsupport_total_serial1= "";
  
   $s4_misc_justif1= "";
  $s4_misc_yr1_serial1= "";
  $s4_misc_yr2_serial1= "";
  $s4_misc_yr3_serial1= "";
  $s4_misc_total_serial1= "";
  
   $s4_feeofPI_justif1= "";
  $s4_feeofPI_yr1_serial1= "";
  $s4_feeofPI_yr2_serial1= "";
  $s4_feeofPI_yr3_serial1= "";
  $s4_feeofPI_total_serial1= "";
  
   $s4_expenses_justif1= "";
  $s4_expenses_yr1_serial1= "";
  $s4_expenses_yr2_serial1= "";
  $s4_expenses_yr3_serial1= "";
  $s4_expenses_total_serial1= "";
  
  $s4_stat1 = "";
$s4_stat2 = "";
$s4_stat3 = "";
$s4_stat4 = "";
$s4_stat5 = "";
$s4_stat6 = "";
$s4_stat7 = "";
$s4_summary="";
    

    
//book  
 
$que="select * from  application_part_4_budget_nonrecurring where appid='$appid' && head_of_expenses='Books'";
$rs3=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               
if(mysql_num_rows($rs3)==1)
{
$_SESSION['isuntouched'] = 0;
$row = mysql_fetch_array($rs3); 
$s4_books_justif1=$row[2];
$s4_books_yr1_serial1=$row[3];
$s4_books_yr2_serial1=$row[4];
$s4_books_yr3_serial1=$row[5];
$s4_books_total_serial1=$row[6];
}
//book  


//misc  
 
$que="select * from  application_part_4_budget_nonrecurring where appid='$appid' && head_of_expenses='Miscellaneous'";
$rs3=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               
if(mysql_num_rows($rs3)==1)
{
$_SESSION['isuntouched'] = 0;
$row = mysql_fetch_array($rs3); 
$s4_misc_justif1=$row[2];
$s4_misc_yr1_serial1=$row[3];
$s4_misc_yr2_serial1=$row[4];
$s4_misc_yr3_serial1=$row[5];
$s4_misc_total_serial1=$row[6];
}
//misc

// TADA
 
$que="select * from  application_part_4_budget_nonrecurring where appid='$appid' && head_of_expenses='TA/DA'";
$rs3=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               
if(mysql_num_rows($rs3)==1)
{
$_SESSION['isuntouched'] = 0;
$row = mysql_fetch_array($rs3); 
$s4_tada_justif1=$row[2];
$s4_tada_yr1_serial1=$row[3];
$s4_tada_yr2_serial1=$row[4];
$s4_tada_yr3_serial1=$row[5];
$s4_tada_total_serial1=$row[6];
}

// TADA

 ///instsupport 
 
$que="select * from  application_part_4_budget_nonrecurring where appid='$appid' && head_of_expenses='Institutional Support'";
$rs3=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               
if(mysql_num_rows($rs3)==1)
{
$_SESSION['isuntouched'] = 0;
$row = mysql_fetch_array($rs3); 
$s4_instsupport_justif1=$row[2];
$s4_instsupport_yr1_serial1=$row[3];
$s4_instsupport_yr2_serial1=$row[4];
$s4_instsupport_yr3_serial1=$row[5];
$s4_instsupport_total_serial1=$row[6];
}
///instsupport


///feeofPI
 
$que="select * from  application_part_4_budget_nonrecurring where appid='$appid' && head_of_expenses='Fee of PI and Col'";
$rs3=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               
if(mysql_num_rows($rs3)==1)
{
$_SESSION['isuntouched'] = 0;
$row = mysql_fetch_array($rs3); 
$s4_feeofPI_justif1=$row[2];
$s4_feeofPI_yr1_serial1=$row[3];
$s4_feeofPI_yr2_serial1=$row[4];
$s4_feeofPI_yr3_serial1=$row[5];
$s4_feeofPI_total_serial1=$row[6];
}
///feeofPI


///expenses
 
$que="select * from  application_part_4_budget_nonrecurring where appid='$appid' && head_of_expenses='Expenses'";
$rs3=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               
if(mysql_num_rows($rs3)==1)
{
$_SESSION['isuntouched'] = 0;
$row = mysql_fetch_array($rs3); 
$s4_expenses_justif1=$row[2];
$s4_expenses_yr1_serial1=$row[3];
$s4_expenses_yr2_serial1=$row[4];
$s4_expenses_yr3_serial1=$row[5];
$s4_expenses_total_serial1=$row[6];
}
///expenses

$numberOfjournal = "0";
$numberOfbook = "0";
$numberOfreport = "0";
$numberOfwebsite = "0";
$numberOfsecondary = "0";
$numberOfnewspaper = "0";
$numberOfencyclopedia = "0";
$numberOfother = "0";
if(mysql_num_rows($rs)==1)
{
$_SESSION['isuntouched'] = 0;
$row = mysql_fetch_array($rs); 
$numberOfjournal = $row[1];
$numberOfbook = $row[2];
$numberOfreport = $row[3];
$numberOfwebsite = $row[4];
$numberOfsecondary = $row[5];
$numberOfnewspaper = $row[6];
$numberOfencyclopedia = $row[7];
$numberOfother = $row[8];
$s4_stat1 = $row[9];
$s4_stat2 = $row[10];
$s4_stat3 = $row[11];
$s4_stat4 = $row[12];
$s4_stat5 = $row[13];
$s4_stat6 = $row[14];
$s4_stat7 = $row[15];
$s4_summary=$row[16];
}


else
$_SESSION['isuntouched'] = 1;





$part4=<<<aa

<form method="post" style="background-color: #f6fbff;">

<center>
<button type="button" class="mdl-button mdl-js-button mdl-button--raised" style="background-color: black;  margin-top: 20px; color: white;" id="showtopintro" onclick="toggletopintro(1);">SHOW INTRODUCTION SECTION</button>
 <center>
 <br>
 <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        References
</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; display: inline-block; background-color: #f6fbff;">
<label class="fieldheader subheader"  style="box-shadow: 0 2px 5px 0 rgba(0,0,0,.26); box-sizing: border-box;">Journal</label><br />
<div id="ref_journal">
</div>
<button type="button" class="mdl-button mdl-js-button mdl-button--raised" style="background-color: green;  margin-top: 20px; color: white;" name="s4_ref_journal_add" onclick="add_ref_journal();">Add</button>
<input type="number" id="s4_ref_journal_count" name="s4_ref_journal_count" style="display: none;" value="$numberOfjournal"/>
<br /><hr style="border: none; height: 3px; background-color: #0024a0;"><label class="fieldheader subheader"  style="box-shadow: 0 2px 5px 0 rgba(0,0,0,.26); box-sizing: border-box;">Books</label><br />
<div id="ref_book">
</div>
<button type="button" class="mdl-button mdl-js-button mdl-button--raised" style="background-color: green;  margin-top: 20px; color: white;" name="s4_ref_book_add" onclick="add_ref_book();">Add</button>
<input type="number" id="s4_ref_book_count" name="s4_ref_book_count" style="display: none;" value="$numberOfbook"/>
<br /><hr style="border: none; height: 3px; background-color: #0024a0;"><label class="fieldheader subheader"  style="box-shadow: 0 2px 5px 0 rgba(0,0,0,.26); box-sizing: border-box;">Govt. and Technical Reports</label><br />
<div id="ref_report">
</div>
<button type="button" class="mdl-button mdl-js-button mdl-button--raised" style="background-color: green;  margin-top: 20px; color: white;" name="s4_ref_report_add" onclick="add_ref_report();">Add</button>
<input type="number" id="s4_ref_report_count" name="s4_ref_report_count" style="display: none;" value="$numberOfreport"/>
<br /><hr style="border: none; height: 3px; background-color: #0024a0;"><label class="fieldheader subheader"  style="box-shadow: 0 2px 5px 0 rgba(0,0,0,.26); box-sizing: border-box;">Websites and Social Media</label><br />
<div id="ref_website">
</div>
<button type="button" class="mdl-button mdl-js-button mdl-button--raised" style="background-color: green;  margin-top: 20px; color: white;" name="s4_ref_website_add" onclick="add_ref_website();">Add</button>
<input type="number" id="s4_ref_website_count" name="s4_ref_website_count" style="display: none;" value="$numberOfwebsite"/>
<br /><hr style="border: none; height: 3px; background-color: #0024a0;"><label class="fieldheader subheader"  style="box-shadow: 0 2px 5px 0 rgba(0,0,0,.26); box-sizing: border-box;">Secondary sources &amp; Thesis/Dissertation</label><br />
<div id="ref_secondary">
</div>
<button type="button" class="mdl-button mdl-js-button mdl-button--raised" style="background-color: green;  margin-top: 20px; color: white;" name="s4_ref_secondary_add" onclick="add_ref_secondary();">Add</button>
<input type="number" id="s4_ref_secondary_count" name="s4_ref_secondary_count" style="display: none;" value="$numberOfsecondary"/>
<br /><hr style="border: none; height: 3px; background-color: #0024a0;"><label class="fieldheader subheader"  style="box-shadow: 0 2px 5px 0 rgba(0,0,0,.26); box-sizing: border-box;">Newspaper</label><br />
<div id="ref_newspaper">
</div>
<button type="button" class="mdl-button mdl-js-button mdl-button--raised" style="background-color: green;  margin-top: 20px; color: white;" name="s4_ref_newspaper_add" onclick="add_ref_newspaper();">Add</button>
<input type="number" id="s4_ref_newspaper_count" name="s4_ref_newspaper_count" style="display: none;" value="$numberOfnewspaper"/>
<br /><hr style="border: none; height: 3px; background-color: #0024a0;"><label class="fieldheader subheader"  style="box-shadow: 0 2px 5px 0 rgba(0,0,0,.26); box-sizing: border-box;">Encyclopedia</label><br />
<div id="ref_encyclopedia">
</div>
<button type="button" class="mdl-button mdl-js-button mdl-button--raised" style="background-color: green;  margin-top: 20px; color: white;" name="s4_ref_encyclopedia_add" onclick="add_ref_encyclopedia();">Add</button>
<input type="number" id="s4_ref_encyclopedia_count" name="s4_ref_encyclopedia_count" style="display: none;" value="$numberOfencyclopedia"/>
<br /><hr style="border: none; height: 3px; background-color: #0024a0;"><label class="fieldheader subheader"  style="box-shadow: 0 2px 5px 0 rgba(0,0,0,.26); box-sizing: border-box;">Others</label><br />
<div id="ref_other">
</div>
<button type="button" class="mdl-button mdl-js-button mdl-button--raised" style="background-color: green;  margin-top: 20px; color: white;" name="s4_ref_other_add" onclick="add_ref_other();">Add</button>
<input type="number" id="s4_ref_other_count" name="s4_ref_other_count" style="display: none;" value="$numberOfother"/>
<div style="width:100%; text-align: center; float: left">
</div>
</div>


<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        Statistics
</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; display: inline-block; background-color: #f6fbff;">


<div class="makebox">
<label class="fieldheader"> A description of the statistical methods to be employed, including timing of any
planned interim analysis</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "4" cols="60" id="s4_stat1" name="s4_stat1" style="border-color: blue; resize: none; outline: none;" required >$s4_stat1</textarea>    
    <span class="mdl-textfield__error">Please enter the required field</span>
</div>
</div>
<br />

<div class="makebox">
<label class="fieldheader"> The number of subjects planned to be enrolled. In multi-centre trials, the numbers of
enrolled subjects projected for each trial site should be specified. Reason for choice of
sample size, including reflections on (or calculations of) the power of the trial and clinical
justification</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "4" cols="60" id="s4_stat2" name="s4_stat2" style="border-color: blue; resize: none; outline: none;" required >$s4_stat2</textarea>    
    <span class="mdl-textfield__error">Please enter the required field</span>
</div>
</div>
<br />

<div class="makebox">
<label class="fieldheader"> The level of significance to be used</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "4" cols="60" id="s4_stat3" name="s4_stat3" style="border-color: blue; resize: none; outline: none;" required >$s4_stat3</textarea>    
    <span class="mdl-textfield__error">Please enter the required field</span>
</div>
</div>
<br />

<div class="makebox">
<label class="fieldheader"> Criteria for termination of the trial</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "4" cols="60" id="s4_stat4" name="s4_stat4" style="border-color: blue; resize: none; outline: none;" required >$s4_stat4</textarea>    
    <span class="mdl-textfield__error">Please enter the required field</span>
</div>
</div>
<br />

<div class="makebox">
<label class="fieldheader"> Procedure for accounting for missing, unused, and spurious data</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "4" cols="60" id="s4_stat5" name="s4_stat5" style="border-color: blue; resize: none; outline: none;" required >$s4_stat5</textarea>    
    <span class="mdl-textfield__error">Please enter the required field</span>
</div>
</div>
<br />

<div class="makebox">
<label class="fieldheader"> Procedures for reporting any deviation(s) from the original statistical plan (any deviation(s)
from the original statistical plan should be described and justified in protocol and/or in the
final report, as appropriate)</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "4" cols="60" id="s4_stat6" name="s4_stat6" style="border-color: blue; resize: none; outline: none;" required >$s4_stat6</textarea>    
    <span class="mdl-textfield__error">Please enter the required field</span>
</div>
</div>
<br />

<div class="makebox">
<label class="fieldheader">The selection of subjects to be included in the analysis (e.g. all randomized subjects, all
dosed subjects, all eligible subjects, evaluable subjects)</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "4" cols="60" id="s4_stat7" name="s4_stat7" style="border-color: blue; resize: none; outline: none;" required >$s4_stat7</textarea>    
   <span class="mdl-textfield__error">Please enter the required field</span>
</div>
</div>

</div>



<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
Summary
</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; display: inline-block; background-color: #f6fbff;">

<div class="makebox">
<label class="fieldheader">Summary of the proposed research project/Synopsis</label>
<br />
<div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 100%">
   
   <textarea class="mdl-textfield__input" type="text" rows= "3" id="s4_summary" name="s4_summary" style="border-color: blue; resize: none; outline: none;" required >$s4_summary</textarea>    
    <span class="mdl-textfield__error"></span>
</div> 
</div>

</div>


<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        Budget
</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; display: inline-block; background-color: #f6fbff;">



<!-- Table -->

<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" id="s4_salary" align="center" style="width:100%">
  <caption class="mdl-data-table__cell--non-numeric" style="text-align: center;background-color: silver;font-size: medium;padding-top: 15px;padding-bottom: 15px;" colspan="6">Recurring Expenditure</caption>

  <thead>
    <tr style="height:59px;background-color: #f8f4f4">
      <th class="mdl-data-table__cell--non-numeric" style="font-size:14px;padding-bottom:15px;">Salary</th>
      <th class="mdl-data-table__cell--non-numeric" style="font-size:14px;padding-bottom:15px;">Justification</th>
      <th style="font-size:14px;padding-bottom:15px;"> 1st Year </th>
      <th style="font-size:14px;padding-bottom:15px;"> 2nd Year </th>
      <th style="font-size:14px;padding-bottom:15px;"> 3rd Year </th>
      <th style="font-size:14px;padding-bottom:15px;"> Total </th>
    </tr>
  </thead>

    <tr>
    <td class="mdl-data-table__cell--non-numeric" style="padding:0 0 0 24;width: 150px">1</td>
      <td style="padding:0 20 16 0">
        <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 150px">
      <textarea class='mdl-textfield__input scrollable' id="s4_salary_justif1" name="s4_salary_justif1" required style='border-color: blue;height: 40px; resize: none; outline: none; white-space:pre-wrap;' ></textarea>
      <span class="mdl-textfield__error">Please enter justification</span>
      </div>
      </td>
      <td style="padding:0 20 12 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_salary_yr1_serial1')" class="mdl-textfield__input"  id="s4_salary_yr1_serial1" name="s4_salary_yr1_serial1" value="" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
      <span class="mdl-textfield__error">Please enter a number</span>
            </div>
    </td>
    <td style="padding:0 20 12 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_salary_yr2_serial1')" class="mdl-textfield__input" id="s4_salary_yr2_serial1" name="s4_salary_yr2_serial1" value="" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
      <span class="mdl-textfield__error">Please enter a number</span>
            </div>
    </td>
    <td style="padding:0 20 12 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_salary_yr3_serial1')" class="mdl-textfield__input" id="s4_salary_yr3_serial1" name="s4_salary_yr3_serial1" value="" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
      <span class="mdl-textfield__error">Please enter a number</span>
            </div>
    </td>
    <td style="padding:0 20 12 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_salary_total_serial1')" class="mdl-textfield__input"  id="s4_salary_total_serial1" name="s4_salary_total_serial1" value="" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
      
            </div>
    </td>
    </tr>
    </table>
    <div style="background-color:  white;padding: 6px;">
  <button type="button" class="mdl-button mdl-js-button mdl-button--raised" style="background-color: green; color: white;text-align: center" name="s4_salary_addbtn" onClick="insertRowSalary()">Add more rows</button>
    <input class="mdl-textfield__input" type="text" id="s4_salary_count" name="s4_salary_count" value="1" style="display:none;">
     </div>
  <br>
<br/>


<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" id="s4_equip" align="center" style="width:100%">
  <caption class="mdl-data-table__cell--non-numeric" style="text-align: center;background-color: silver;font-size: medium;padding-top: 15px;padding-bottom: 15px;" colspan="6">Non-Recurring Expenditure</caption>
  <thead>
      <tr style="height:59px;background-color: #f8f4f4">
        <th class="mdl-data-table__cell--non-numeric" style="font-size:14px;padding-bottom:15px;">Equipment</th>
        <th class="mdl-data-table__cell--non-numeric" style="font-size:14px;padding-bottom:15px;">Justification</th>
        <th style="font-size:14px;padding-bottom:15px;"> 1st Year </th>
        <th style="font-size:14px;padding-bottom:15px;"> 2nd Year </th>
        <th style="font-size:14px;padding-bottom:15px;"> 3rd Year </th>
        <th style="font-size:14px;padding-bottom:15px;"> Total </th>
      </tr>
    </thead>
    
      <tr>
      <td class="mdl-data-table__cell--non-numeric" style="padding:0 0 0 24;width: 150px">1</td>
        <td style="padding:0 20 16 0">
          <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 150px">
        <textarea class='mdl-textfield__input scrollable' id="s4_equip_justif1" name="s4_equip_justif1" required style='border-color: blue;height: 40px;resize: none; outline: none; white-space:pre-wrap;' ></textarea>
      <span class="mdl-textfield__error">Please enter justification</span>
        </div>
        </td>
        <td style="padding:0 20 12 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_equip_yr1_serial1')" class="mdl-textfield__input" id="s4_equip_yr1_serial1" name="s4_equip_yr1_serial1" 
            value="" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
      <span class="mdl-textfield__error">Please enter a number</span>
            </div>
    </td>
    <td style="padding:0 20 12 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_equip_yr2_serial1')" class="mdl-textfield__input" id="s4_equip_yr2_serial1" name="s4_equip_yr2_serial1" 
            value="" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
      <span class="mdl-textfield__error">Please enter a number</span>
            </div>
    </td>
    <td style="padding:0 20 12 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_equip_yr3_serial1')" class="mdl-textfield__input"  id="s4_equip_yr3_serial1" name="s4_equip_yr3_serial1" 
            value="" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?">
      <span class="mdl-textfield__error">Please enter a number</span>
            </div>
    </td>
    <td style="padding:0 20 12 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_equip_total_serial1')" class="mdl-textfield__input" id="s4_equip_total_serial1" name="s4_equip_total_serial1" value="" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
            </div>
    </td>
      </tr>
    </table>
    <div style="background-color:  white;padding: 6px;">
  <button type="button" class="mdl-button mdl-js-button mdl-button--raised" style="background-color: green; color: white;text-align: center" name="s4_equip_addbtn" onClick="insertRowEquip()">Add more rows</button>
    <input class="mdl-textfield__input" type="text" id="s4_equip_count" name="s4_equip_count" value="1" style="display:none;">
    </div>
    <br>
  
  <br>
  <br>


      <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" id="s4_other_non_rec" align="center" style="width:100%">
    <caption class="mdl-data-table__cell--non-numeric" style="text-align: center;background-color: silver;font-size: medium;padding-top: 15px;padding-bottom: 15px;" colspan="6">Other Non-Recurring Expenditure</caption>
  <thead>
      <tr style="height:59px;background-color: #f8f4f4">
        <th class="mdl-data-table__cell--non-numeric" style="font-size:14px;padding-bottom:15px;">Heading</th>
        <th class="mdl-data-table__cell--non-numeric" style="font-size:14px;padding-bottom:15px;">Justification</th>
        <th style="font-size:14px;padding-bottom:15px;"> 1st Year </th>
        <th style="font-size:14px;padding-bottom:15px;"> 2nd Year </th>
        <th style="font-size:14px;padding-bottom:15px;"> 3rd Year </th>
        <th style="font-size:14px;padding-bottom:15px;"> Total </th>
      </tr>
    </thead>
      
      <tr>
        <td class="mdl-data-table__cell--non-numeric" style="padding:24 80 20 20; width:150px">Books</td>
        <td style="padding:0 20 14 0">
            <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 150px">
          <textarea class='mdl-textfield__input scrollable' id="s4_books_justif1" name="s4_books_justif1" required style='border-color: blue;height: 40px;resize: none; outline: none; white-space:pre-wrap;' >$s4_books_justif1</textarea>
          <span class="mdl-textfield__error">Please enter justification</span>
          </div>
        </td>
          <td style="padding:0 20 9 0">
        <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
        <input oninput="sum('s4_books_yr1_serial1')" class="mdl-textfield__input"  id="s4_books_yr1_serial1" name="s4_books_yr1_serial1" value="$s4_books_yr1_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
        <span class="mdl-textfield__error">Please enter a number</span>
                </div>
      </td>
      <td style="padding:0 20 9 0">
        <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
        <input oninput="sum('s4_books_yr2_serial1')" class="mdl-textfield__input" id="s4_books_yr2_serial1" name="s4_books_yr2_serial1" value="$s4_books_yr2_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
        <span class="mdl-textfield__error">Please enter a number</span>
                </div>
      </td>
      <td style="padding:0 20 9 0">
        <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
        <input oninput="sum('s4_books_yr3_serial1')" class="mdl-textfield__input" id="s4_books_yr3_serial1" name="s4_books_yr3_serial1" value="$s4_books_yr3_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
        <span class="mdl-textfield__error">Please enter a number</span>
                </div>
      </td>
      <td style="padding:0 20 9 0">
        <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
        <input oninput="sum('s4_books_total_serial1')" class="mdl-textfield__input" id="s4_books_total_serial1" name="s4_books_total_serial1" value="$s4_books_total_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
        
        </div>
      </td>
      </tr>
    
    <tr>
      <td class="mdl-data-table__cell--non-numeric" style="padding:24 80 20 20">TA/DA</td>
      <td style="padding:0 20 14 0">
            <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 150px">
          <textarea class='mdl-textfield__input scrollable' id="s4_tada_justif1" name="s4_tada_justif1" required style='border-color: blue;height: 40px;resize: none; outline: none; white-space:pre-wrap;' >$s4_tada_justif1</textarea>
          <span class="mdl-textfield__error">Please enter justification</span>
          </div>
          </td>
          <td style="padding:0 20 9 0">
        <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
        <input oninput="sum('s4_tada_yr1_serial1')" class="mdl-textfield__input" id="s4_tada_yr1_serial1" name="s4_tada_yr1_serial1" value="$s4_tada_yr1_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
        <span class="mdl-textfield__error">Please enter a number</span>
                </div>
      </td>
      <td style="padding:0 20 9 0">
        <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
        <input oninput="sum('s4_tada_yr2_serial1')" class="mdl-textfield__input" id="s4_tada_yr2_serial1" name="s4_tada_yr2_serial1" value="$s4_tada_yr2_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
        <span class="mdl-textfield__error">Please enter a number</span>
                </div>
      </td>
      <td style="padding:0 20 9 0">
        <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
        <input oninput="sum('s4_tada_yr3_serial1')" class="mdl-textfield__input" id="s4_tada_yr3_serial1" name="s4_tada_yr3_serial1" value="$s4_tada_yr3_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
        <span class="mdl-textfield__error">Please enter a number</span>
                </div>
      </td>
      <td style="padding:0 20 9 0">
        <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
        <input oninput="sum('s4_tada_total_serial1')" class="mdl-textfield__input" id="s4_tada_total_serial1" name="s4_tada_total_serial1" value="$s4_tada_total_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
        </div>
      </td>
    </tr>
  <tr>
    <td class="mdl-data-table__cell--non-numeric" style="padding:24 80 20 20">Institutional Support</td>
    <td style="padding:0 20 14 0">
            <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 150px">
          <textarea class='mdl-textfield__input scrollable' id="s4_instsupport_justif1" name="s4_instsupport_justif1" required style='border-color: blue;height: 40px;resize: none; outline: none; white-space:pre-wrap;' >$s4_instsupport_justif1</textarea>
          <span class="mdl-textfield__error">Please enter justification</span>
          </div>
        </td>
          <td style="padding:0 20 9 0">
        <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
        <input oninput="sum('s4_instsupport_yr1_serial1')" class="mdl-textfield__input" id="s4_instsupport_yr1_serial1" name="s4_instsupport_yr1_serial1" value="$s4_instsupport_yr1_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
        <span class="mdl-textfield__error">Please enter a number</span>
                </div>
      </td>
      <td style="padding:0 20 9 0">
        <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
        <input oninput="sum('s4_instsupport_yr2_serial1')" class="mdl-textfield__input" id="s4_instsupport_yr2_serial1" name="s4_instsupport_yr2_serial1" value="$s4_instsupport_yr2_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
        <span class="mdl-textfield__error">Please enter a number</span>
                </div>
      </td>
      <td style="padding:0 20 9 0">
        <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
        <input oninput="sum('s4_instsupport_yr3_serial1')" class="mdl-textfield__input" id="s4_instsupport_yr3_serial1" name="s4_instsupport_yr3_serial1" value="$s4_instsupport_yr3_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
        <span class="mdl-textfield__error">Please enter a number</span>
                </div>
      </td>
      <td style="padding:0 20 9 0">
        <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
        <input oninput="sum('s4_instsupport_total_serial1')" class="mdl-textfield__input" id="s4_instsupport_total_serial1" name="s4_instsupport_total_serial1" value="$s4_instsupport_total_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
        </div>
      </td>
  </tr>
  <tr>
    <td class="mdl-data-table__cell--non-numeric" style="padding:24 80 20 20">Fee of PI and Col</td>
    <td style="padding:0 20 14 0">
          <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 150px">
        <textarea class='mdl-textfield__input scrollable' id="s4_feeofPI_justif1" name="s4_feeofPI_justif1" required style='border-color: blue;height: 40px;resize: none; outline: none; white-space:pre-wrap;' >$s4_feeofPI_justif1</textarea>
        <span class="mdl-textfield__error">Please enter justification</span>

        </div>
        </td>
        <td style="padding:0 20 9 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_feeofPI_yr1_serial1')" class="mdl-textfield__input" id="s4_feeofPI_yr1_serial1" name="s4_feeofPI_yr1_serial1" value="$s4_feeofPI_yr1_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
      <span class="mdl-textfield__error">Please enter a number</span>
            </div>
    </td>
    <td style="padding:0 20 9 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_feeofPI_yr2_serial1')" class="mdl-textfield__input" id="s4_feeofPI_yr2_serial1" name="s4_feeofPI_yr2_serial1" value="$s4_feeofPI_yr2_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
      <span class="mdl-textfield__error">Please enter a number</span>
            </div>
    </td>
    <td style="padding:0 20 9 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_feeofPI_yr3_serial1')" class="mdl-textfield__input" id="s4_feeofPI_yr3_serial1" name="s4_feeofPI_yr3_serial1" value="$s4_feeofPI_yr3_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
      <span class="mdl-textfield__error">Please enter a number</span>
            </div>
    </td>
    <td style="padding:0 20 9 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_feeofPI_total_serial1')" class="mdl-textfield__input" id="s4_feeofPI_total_serial1" name="s4_feeofPI_total_serial1" value="$s4_feeofPI_total_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
      </div>
    </td>
  </tr>
  <tr>
    <td class="mdl-data-table__cell--non-numeric" style="padding:24 80 20 20">Miscellaneous</td>
    <td style="padding:0 20 14 0">
          <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 150px">
        <textarea class='mdl-textfield__input scrollable' id="s4_misc_justif1" name="s4_misc_justif1" required style='border-color: blue;height: 40px;resize: none; outline: none; white-space:pre-wrap;' >$s4_misc_justif1</textarea>
        <span class="mdl-textfield__error">Please enter justification</span>
        </div>
        </td>
        <td style="padding:0 20 9 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_misc_yr1_serial1')" class="mdl-textfield__input" id="s4_misc_yr1_serial1" name="s4_misc_yr1_serial1" value="$s4_misc_yr1_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
      <span class="mdl-textfield__error">Please enter a number</span>
            </div>
    </td>
    <td style="padding:0 20 9 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_misc_yr2_serial1')" class="mdl-textfield__input" id="s4_misc_yr2_serial1" name="s4_misc_yr2_serial1" value="$s4_misc_yr2_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
      <span class="mdl-textfield__error">Please enter a number</span>
            </div>
    </td>
    <td style="padding:0 20 9 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_misc_yr3_serial1')" class="mdl-textfield__input" id="s4_misc_yr3_serial1" name="s4_misc_yr3_serial1" value="$s4_misc_yr3_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
      <span class="mdl-textfield__error">Please enter a number</span>
            </div>
    </td>
    <td style="padding:0 20 9 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_misc_total_serial1')" class="mdl-textfield__input"  id="s4_misc_total_serial1" name="s4_misc_total_serial1" value="$s4_misc_total_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
      </div>
    </td>
  </tr>
  <tr>
    <td class="mdl-data-table__cell--non-numeric" style="padding:24 80 20 20">Expenses</td>
    <td style="padding:0 20 14 0">
          <div class="mdl-textfield mdl-js-textfield" style="padding: 0px;width: 150px">
        <textarea class='mdl-textfield__input scrollable' id="s4_expenses_justif1" name="s4_expenses_justif1" required style='border-color: blue;height: 40px;resize: none; outline: none; white-space:pre-wrap;' >$s4_expenses_justif1</textarea>
        <span class="mdl-textfield__error">Please enter justification</span>

        </div>
        </td>
        <td style="padding:0 20 9 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_expenses_yr1_serial1')" class="mdl-textfield__input" id="s4_expenses_yr1_serial1" name="s4_expenses_yr1_serial1" value="$s4_expenses_yr1_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
      <span class="mdl-textfield__error">Please enter a number</span>
            </div>
    </td>
    <td style="padding:0 20 9 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_expenses_yr2_serial1')" class="mdl-textfield__input" id="s4_expenses_yr2_serial1" name="s4_expenses_yr2_serial1" value="$s4_expenses_yr2_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
      <span class="mdl-textfield__error">Please enter a number</span>
            </div>
    </td>
    <td style="padding:0 20 9 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_expenses_yr3_serial1')" class="mdl-textfield__input" id="s4_expenses_yr3_serial1" name="s4_expenses_yr3_serial1" value="$s4_expenses_yr3_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
      <span class="mdl-textfield__error">Please enter a number</span></div>
    </td>
    <td style="padding:0 20 9 0">
      <div class="mdl-textfield mdl-js-textfield" style="padding:0;width:150">
      <input oninput="sum('s4_expenses_total_serial1')"  class="mdl-textfield__input" id="s4_expenses_total_serial1" name="s4_expenses_total_serial1" value="$s4_expenses_total_serial1" type="text" style="border-bottom: 1px solid blue;padding-bottom: 13px;" required  pattern="-?[0-9]*(\.[0-9]+)?" >
      </div>
    </td>
  </tr>

  </table>
        <div style="background-color:  white;padding: 6px;">
  <div class="mdl-textfield mdl-js-textfield" style="margin-left:100;width:600px">
    <input placeholder="Head of Expenditure"" class="mdl-textfield__input" type="text" style="border-bottom: 1px solid blue;width:250;" id="s4_other">
    <button type="button" class="mdl-button mdl-js-button mdl-button--raised" style="background-color: green; color: white" name="s4_other_add" onClick="insertRowOther(1)">Add more Non-Recurring Expenditure</button>
    <input class="mdl-textfield__input" type="text" id="s4_other_count" name="s4_other_count" value="0" style="display:none;">
     </div>


    


  </div>
  
<br/><br>
<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" name="s4_sbt" onclick="submitFormOkay = true;">Save & Review</button>



</div>


</form>
     
aa;
echo $part4;

for($i=1;$i<=$numberOfNonRecurring;$i++)
{
    $row1 = mysql_fetch_array($rs1);
    if($i!=1)
    echo "<script>insertRowSalary()</script>";
    
    echo "<script>initialValueLoaderSalary($i,'$row1[2]','$row1[3]','$row1[4]','$row1[5]','$row1[6]')</script>";
    
}


for($i=1;$i<=$numberOfNonEquipment;$i++)
{
    $row1 = mysql_fetch_array($rs2);
    if($i!=1)
    echo "<script>insertRowEquip()</script>";
    
    echo "<script>initialValueLoaderEquip($i,'$row1[2]','$row1[3]','$row1[4]','$row1[5]','$row1[6]')</script>";
    
}

for($i=1;$i<=$numberOfNonRecurringOther;$i++)
{
    $row1 = mysql_fetch_array($rs4);
    echo "<script>insertRowOther(2)</script>";
    echo "<script>initialValueLoaderNonRecurringOthers($i,'$row1[1]','$row1[2]','$row1[3]','$row1[4]','$row1[5]','$row1[6]')</script>";
    
}


$ref_journal_div_already_exist="";
if($numberOfjournal>0)
{
    for($i=1;$i<=$numberOfjournal;$i++)
    {
     
     
    $que="select * from application_part_4_sub_ref_journal where appid='$appid' and serial=$i";
    $rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               
    $row1 = mysql_fetch_array($rs1);
    $ref_journal_div_already_exist= $ref_journal_div_already_exist."<div id='ref_journal_$i' style='padding: 0px 40px 0px 40px;text-align: center;border-radius: 5px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out;margin-bottom:10px; background-color: white; height: 350px;'>
        <div style='text-align: left; float: left; width: 38%; padding: 20px 20px 20px 20px'>";
    if($i==$numberOfjournal)
      $ref_journal_div_already_exist= $ref_journal_div_already_exist."<i id='removebtn_ref_journal$i' type='button' onclick='removerefjournal();' class='material-icons' style='font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;'>highlight_off</i>";
    else
      $ref_journal_div_already_exist= $ref_journal_div_already_exist."<i id='removebtn_ref_journal$i' type='button' onclick='removerefjournal();' class='material-icons' style='display:none; font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;'>highlight_off</i>"; 
     
      $ref_journal_div_already_exist= $ref_journal_div_already_exist."
       <label style='background-color: white;padding: 5px 5px 15px 5px;font-size: 20px;'>Reference Number <input type='text' value='$row1[9]' id='section4_ref_journal_$i"."_refnumber' required style='width: 50px;height: 29px;margin-left: 6px;border: 2px solid black;padding: 2px;font-size: 20px;text-align: center;' name='section4_ref_journal_$i"."_refnumber'></label>
      <br /><br /> <label class='fieldheader'>Authors Name</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[2]' class='mdl-textfield__input' type='text' id='section4_ref_journal_$i"."_auth_name' name='section4_ref_journal_$i"."_auth_name' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Title of the Article</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[3]' class='mdl-textfield__input' type='text' id='section4_ref_journal_$i"."_title_article' name='section4_ref_journal_$i"."_title_article' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Abbreviated Title of journal</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[4]' class='mdl-textfield__input' type='text' id='section4_ref_journal_$i"."_abb_title' name='section4_ref_journal_$i"."_abb_title' required style='border-color: blue;'>
      </div>
   </div>
   <div style='text-align: left; float: right; width: 38%; padding: 20px 20px 20px 20px;'>
      <label class='fieldheader'>Date of publication in YYYY/MM Format</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[5]' class='mdl-textfield__input' type='text' id='section4_ref_journal_$i"."_date' name='section4_ref_journal_$i"."_date' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Volume Number</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[6]' class='mdl-textfield__input' type='text' id='section4_ref_journal_$i"."_vol' name='section4_ref_journal_$i"."_vol' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Issue Numbers</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[7]' class='mdl-textfield__input' type='text' id='section4_ref_journal_$i"."_issue' name='section4_ref_journal_$i"."_issue' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Page Number</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[8]' class='mdl-textfield__input' type='text' id='section4_ref_journal_$i"."_page' name='section4_ref_journal_$i"."_page' required style='border-color: blue;'>
      </div>
   </div>
   <br /><br />
</div>
   ";    
    }
echo '<script>initialref_journalload("'.trim(preg_replace('/\s\s+/', ' ', $ref_journal_div_already_exist)).'");</script>';
}



//book
$ref_book_div_already_exist="";
if($numberOfbook>0)
{
    for($i=1;$i<=$numberOfbook;$i++)
    {
     
     
    $que="select * from application_part_4_sub_ref_book where appid='$appid' and serial=$i";
    $rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               
    $row1 = mysql_fetch_array($rs1);
    $ref_book_div_already_exist= $ref_book_div_already_exist."<div id='ref_book_$i' style='padding: 0px 40px 0px 40px;text-align: center;border-radius: 5px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out;margin-bottom:10px; background-color: white; height: 350px;'>
        <div style='text-align: left; float: left; width: 38%; padding: 20px 20px 20px 20px'>";
    if($i==$numberOfbook)
      $ref_book_div_already_exist= $ref_book_div_already_exist."<i id='removebtn_ref_book$i' type='button' onclick='removerefbook();' class='material-icons' style='font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;'>highlight_off</i>";
    else
      $ref_book_div_already_exist= $ref_book_div_already_exist."<i id='removebtn_ref_book$i' type='button' onclick='removerefbook();' class='material-icons' style='display:none; font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;'>highlight_off</i>"; 
     
      $ref_book_div_already_exist= $ref_book_div_already_exist."
       
      <label style='background-color: white;padding: 5px 5px 15px 5px;font-size: 20px;'>Reference Number <input type='text' value='$row1[8]' id='section4_ref_book_$i"."_refnumber' required style='width: 50px;height: 29px;margin-left: 6px;border: 2px solid black;padding: 2px;font-size: 20px;text-align: center;' name='section4_ref_book_$i"."_refnumber'></label>
      <br /><br /> <label class='fieldheader'>Author's Name</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value = '$row1[2]' class='mdl-textfield__input' type='text' id='section4_ref_book_$i"."_auth_name' name='section4_ref_book_$i"."_auth_name' required style='border-color: blue;'>
      </div>
      
      <br /><br /><br /> <label class='fieldheader'>Title of Book</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input  value = '$row1[3]' class='mdl-textfield__input' type='text' id='section4_ref_book_$i"."_title_book' name='section4_ref_book_$i"."_title_book' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Edition(if not first)</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value = '$row1[4]' class='mdl-textfield__input' type='text' id='section4_ref_book_$i"."_edition' name='section4_ref_book_$i"."_edition' required style='border-color: blue;'>
      </div>
   </div>
   <div style='text-align: left; float: right; width: 38%; padding: 20px 20px 20px 20px;'>
      <label class='fieldheader'>Place of Publication</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value = '$row1[5]' class='mdl-textfield__input' type='text' id='section4_ref_book_$i"."_place_publication' name='section4_ref_book_$i"."_place_publication' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Publisher</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value = '$row1[6]'class='mdl-textfield__input' type='text' id='section4_ref_book_$i"."_publisher' name='section4_ref_book_$i"."_publisher' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Year of Publication</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value = '$row1[7]'class='mdl-textfield__input' type='text' id='section4_ref_book_$i"."_year_publication' name='section4_ref_book_$i"."_year_publication' required style='border-color: blue;'>
      </div>
     
   </div>
   <br /><br />
</div>";   
    }
echo '<script>initialref_bookload("'.trim(preg_replace('/\s\s+/', ' ', $ref_book_div_already_exist)).'");</script>';
}

//report

$ref_report_div_already_exist="";
if($numberOfreport>0)
{
    for($i=1;$i<=$numberOfreport;$i++)
    {
     
     
    $que="select * from application_part_4_sub_ref_report where appid='$appid' and serial=$i";
    $rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               
    $row1 = mysql_fetch_array($rs1);
    $ref_report_div_already_exist= $ref_report_div_already_exist."<div id='ref_report_$i' style='padding: 0px 40px 0px 40px;text-align: center;border-radius: 5px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out;margin-bottom:10px; background-color: white; height: 350px;'>
        <div style='text-align: left; float: left; width: 38%; padding: 20px 20px 20px 20px'>";
    if($i==$numberOfreport)
      $ref_report_div_already_exist= $ref_report_div_already_exist."<i id='removebtn_ref_report$i' type='button' onclick='removerefreport();' class='material-icons' style='font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;'>highlight_off</i>";
    else
      $ref_report_div_already_exist= $ref_report_div_already_exist."<i id='removebtn_ref_report$i' type='button' onclick='removerefreport();' class='material-icons' style='display:none; font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;'>highlight_off</i>"; 
     
      $ref_report_div_already_exist= $ref_report_div_already_exist."
       
     <label style='background-color: white;padding: 5px 5px 15px 5px;font-size: 20px;'>Reference Number <input type='text' value='$row1[9]' id='section4_ref_report_$i"."_refnumber' required style='width: 50px;height: 29px;margin-left: 6px;border: 2px solid black;padding: 2px;font-size: 20px;text-align: center;' name='section4_ref_report_$i"."_refnumber'></label>
      <br /><br /> <label class='fieldheader'>Author's Name / Orgaanisation Name</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value = '$row1[2]' class='mdl-textfield__input' type='text' id='section4_ref_report_$i"."_auth_name' name='section4_ref_report_$i"."_auth_name' required style='border-color: blue;'>
      </div>
      
      <br /><br /><br /> <label class='fieldheader'>Title of Report</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value = '$row1[3]'class='mdl-textfield__input' type='text' id='section4_ref_report_$i"."_title_report' name='section4_ref_report_$i"."_title_report' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Place of Publication</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value = '$row1[4]'class='mdl-textfield__input' type='text' id='section4_ref_report_$i"."_place_publication' name='section4_ref_report_$i"."_place_publication' required style='border-color: blue;'>
      </div>
   </div>
   <div style='text-align: left; float: right; width: 38%; padding: 20px 20px 20px 20px;'>
      <label class='fieldheader'>Publisher</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value = '$row1[5]' class='mdl-textfield__input' type='text' id='section4_ref_report_$i"."_publisher' name='section4_ref_report_$i"."_publisher' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Date of Publication</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input  value = '$row1[6]'class='mdl-textfield__input' type='text' id='section4_ref_report_$i"."_date_publication' name='section4_ref_report_$i"."_date_publication' required style='border-color: blue;'>
      </div>
     <br /><br /><br /> <label class='fieldheader'>Total Number of Pages</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value = '$row1[7]' class='mdl-textfield__input' type='text' id='section4_ref_report_$i"."_total_pages' name='section4_ref_report_$i"."_total_pages' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Report Number</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value = '$row1[8]'class='mdl-textfield__input' type='text' id='section4_ref_report_$i"."_report_number' name='section4_ref_report_$i"."_report_number' required style='border-color: blue;'>
      </div>
   </div>
   <br /><br />
</div>";   
    }
echo '<script>initialref_reportload("'.trim(preg_replace('/\s\s+/', ' ', $ref_report_div_already_exist)).'");</script>';
}


//website
$ref_website_div_already_exist="";
if($numberOfwebsite>0)
{
    for($i=1;$i<=$numberOfwebsite;$i++)
    {
     
     
    $que="select * from application_part_4_sub_ref_website where appid='$appid' and serial=$i";
    $rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               
    $row1 = mysql_fetch_array($rs1);
    $ref_website_div_already_exist= $ref_website_div_already_exist."<div id='ref_website_$i' style='padding: 0px 40px 0px 40px;text-align: center;border-radius: 5px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out;margin-bottom:10px; background-color: white; height: 275px;'>
        <div style='text-align: left; float: left; width: 38%; padding: 20px 20px 20px 20px'>";
    if($i==$numberOfwebsite)
      $ref_website_div_already_exist= $ref_website_div_already_exist."<i id='removebtn_ref_website$i' type='button' onclick='removerefwebsite();' class='material-icons' style='font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;'>highlight_off</i>";
    else
      $ref_website_div_already_exist= $ref_website_div_already_exist."<i id='removebtn_ref_website$i' type='button' onclick='removerefwebsite();' class='material-icons' style='display:none; font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;'>highlight_off</i>"; 
     
      $ref_website_div_already_exist= $ref_website_div_already_exist."
       
      <label style='background-color: white;padding: 5px 5px 15px 5px;font-size: 20px;'>Reference Number <input type='text' value='$row1[7]' id='section4_ref_website_$i"."_refnumber' required style='width: 50px;height: 29px;margin-left: 6px;border: 2px solid black;padding: 2px;font-size: 20px;text-align: center;' name='section4_ref_website_$i"."_refnumber'></label>
      <br /> <label class='fieldheader'>Author/Organisation Name</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[2]' class='mdl-textfield__input' type='text' id='section4_ref_website_$i"."_auth_name' name='section4_ref_website_$i"."_auth_name' required style='border-color: blue;'>
      </div>
      
      <br /><br /><br /> <label class='fieldheader'>Title of the Page</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[3]' class='mdl-textfield__input' type='text' id='section4_ref_website_$i"."_title_page' name='section4_ref_website_$i"."_title_page' required style='border-color: blue;'>
      </div>
     
   </div>
   <div style='text-align: left; float: right; width: 38%; padding: 20px 20px 20px 20px;'>
       <label class='fieldheader'>Place of Publication</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[4]' class='mdl-textfield__input' type='text' id='section4_ref_website_$i"."_place_publication' name='section4_ref_website_$i"."_place_publication' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Publisher</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[5]' class='mdl-textfield__input' type='text' id='section4_ref_website_$i"."_publisher' name='section4_ref_website_$i"."_publisher' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Date/Year of Publication</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[6]' class='mdl-textfield__input' type='text' id='section4_ref_website_$i"."_date_publication' name='section4_ref_website_$i"."_date_publication' required style='border-color: blue;'>
      </div>
     
   </div>
   <br /><br />
</div>
";
   
    }
echo '<script>initialref_websiteload("'.trim(preg_replace('/\s\s+/', ' ', $ref_website_div_already_exist)).'");</script>';
}


//secondary
$ref_secondary_div_already_exist="";
if($numberOfsecondary>0)
{
    for($i=1;$i<=$numberOfsecondary;$i++)
    {
     
     
    $que="select * from application_part_4_sub_ref_secondary where appid='$appid' and serial=$i";
    $rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               
    $row1 = mysql_fetch_array($rs1);
    $ref_secondary_div_already_exist= $ref_secondary_div_already_exist."<div id='ref_secondary_$i' style='padding: 0px 40px 0px 40px;text-align: center;border-radius: 5px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out;margin-bottom:10px; background-color: white; height: 320px;'>
        <div style='text-align: left; float: left; width: 38%; padding: 20px 20px 20px 20px'>";
    if($i==$numberOfsecondary)
      $ref_secondary_div_already_exist= $ref_secondary_div_already_exist."<i id='removebtn_ref_secondary$i' type='button' onclick='removerefsecondary();' class='material-icons' style='font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;'>highlight_off</i>";
    else
      $ref_secondary_div_already_exist= $ref_secondary_div_already_exist."<i id='removebtn_ref_secondary$i' type='button' onclick='removerefsecondary();' class='material-icons' style='display:none; font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;'>highlight_off</i>"; 
     
      $ref_secondary_div_already_exist= $ref_secondary_div_already_exist."
       
      <label style='background-color: white;padding: 5px 5px 15px 5px;font-size: 20px;'>Reference Number <input type='text' value='$row1[8]' id='section4_ref_secondary_$i"."_refnumber' required style='width: 50px;height: 29px;margin-left: 6px;border: 2px solid black;padding: 2px;font-size: 20px;text-align: center;' name='section4_ref_secondary_$i"."_refnumber'></label>
      <br /><br /> <label class='fieldheader'>Author's Name</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[2]' class='mdl-textfield__input' type='text' id='section4_ref_secondary_$i"."_auth_name' name='section4_ref_secondary_$i"."_auth_name' required style='border-color: blue;'>
      </div>
      
      <br /><br /><br /> <label class='fieldheader'>Title of Thesis</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[3]' class='mdl-textfield__input' type='text' id='section4_ref_secondary_$i"."_title_thesis' name='section4_ref_secondary_$i"."_title_thesis' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Place of Publication</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[4]' class='mdl-textfield__input' type='text' id='section4_ref_secondary_$i"."_place_publication' name='section4_ref_secondary_$i"."_place_publication' required style='border-color: blue;'>
      </div>
   </div>
   <div style='text-align: left; float: right; width: 38%; padding: 20px 20px 20px 20px;'>
      <label class='fieldheader'>Publisher</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[5]' class='mdl-textfield__input' type='text' id='section4_ref_secondary_$i"."_publisher' name='section4_ref_secondary_$i"."_publisher' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Year of Publication</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[6]' class='mdl-textfield__input' type='text' id='section4_ref_secondary_$i"."_year_publication' name='section4_ref_secondary_$i"."_year_publication' required style='border-color: blue;'>
      </div>
     <br /><br /><br /> <label class='fieldheader'> Number of Pages</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[7]' class='mdl-textfield__input' type='text' id='section4_ref_secondary_$i"."_number_pages' name='section4_ref_secondary_$i"."_number_pages' required style='border-color: blue;'>
      </div>
      
   </div>
   <br /><br />
</div>";   
    }
echo '<script>initialref_secondaryload("'.trim(preg_replace('/\s\s+/', ' ', $ref_secondary_div_already_exist)).'");</script>';
}



//newspaper
$ref_newspaper_div_already_exist="";
if($numberOfnewspaper>0)
{
    for($i=1;$i<=$numberOfnewspaper;$i++)
    {
     
     
    $que="select * from application_part_4_sub_ref_newspaper where appid='$appid' and serial=$i";
    $rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               
    $row1 = mysql_fetch_array($rs1);
    $ref_newspaper_div_already_exist= $ref_newspaper_div_already_exist."<div id='ref_newspaper_$i' style='padding: 0px 40px 0px 40px;text-align: center;border-radius: 5px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out;margin-bottom:10px; background-color: white; height: 400px;'>
        <div style='text-align: left; float: left; width: 38%; padding: 20px 20px 20px 20px'>";
    if($i==$numberOfnewspaper)
      $ref_newspaper_div_already_exist= $ref_newspaper_div_already_exist."<i id='removebtn_ref_newspaper$i' type='button' onclick='removerefnewspaper();' class='material-icons' style='font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;'>highlight_off</i>";
    else
      $ref_newspaper_div_already_exist= $ref_newspaper_div_already_exist."<i id='removebtn_ref_newspaper$i' type='button' onclick='removerefnewspaper();' class='material-icons' style='display:none; font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;'>highlight_off</i>"; 
     
      $ref_newspaper_div_already_exist= $ref_newspaper_div_already_exist."
       
      <label style='background-color: white;padding: 5px 5px 15px 5px;font-size: 20px;'>Reference Number <input type='text' value='$row1[10]' id='section4_ref_newspaper_$i"."_refnumber' required style='width: 50px;height: 29px;margin-left: 6px;border: 2px solid black;padding: 2px;font-size: 20px;text-align: center;' name='section4_ref_newspaper_$i"."_refnumber'></label>
        <br /><br /> <label class='fieldheader'>Author's Name</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[2]' class='mdl-textfield__input' type='text' id='section4_ref_newspaper_$i"."_auth_name' name='section4_ref_newspaper_$i"."_auth_name' required style='border-color: blue;'>
      </div>
      
      <br /><br /><br /> <label class='fieldheader'>Title of Article</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[3]' class='mdl-textfield__input' type='text' id='section4_ref_newspaper_$i"."_title_article' name='section4_ref_newspaper_$i"."_title_article' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Newspaper Title</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[4]' class='mdl-textfield__input' type='text' id='section4_ref_newspaper_$i"."_title_newspaper' name='section4_ref_newspaper_$i"."_title_newspaper' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Place of Publication</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[5]' class='mdl-textfield__input' type='text' id='section4_ref_newspaper_$i"."_place_publication' name='section4_ref_newspaper_$i"."_place_publication' required style='border-color: blue;'>
      </div>
   </div>
   <div style='text-align: left; float: right; width: 38%; padding: 20px 20px 20px 20px;'>
      
      <label class='fieldheader'>Date of Publication</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[6]' class='mdl-textfield__input' type='text' id='section4_ref_newspaper_$i"."_date_publication' name='section4_ref_newspaper_$i"."_date_publication' required style='border-color: blue;'>
      </div>
     <br /><br /><br /> <label class='fieldheader'>Section</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[7]' class='mdl-textfield__input' type='text' id='section4_ref_newspaper_$i"."_section' name='section4_ref_newspaper_$i"."_section' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Location</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[8]' class='mdl-textfield__input' type='text' id='section4_ref_newspaper_$i"."_location' name='section4_ref_newspaper_$i"."_location' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Cited on YYYY/MM/DD</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[9]' class='mdl-textfield__input' type='text' id='section4_ref_newspaper_$i"."_cited' name='section4_ref_newspaper_$i"."_cited' required style='border-color: blue;'>
      </div>
   </div>
   <br /><br />
</div>";   
    }
echo '<script>initialref_newspaperload("'.trim(preg_replace('/\s\s+/', ' ', $ref_newspaper_div_already_exist)).'");</script>';
}


//encyclopedia
$ref_encyclopedia_div_already_exist="";
if($numberOfencyclopedia>0)
{
    for($i=1;$i<=$numberOfencyclopedia;$i++)
    {
     
     
    $que="select * from application_part_4_sub_ref_encyclopedia where appid='$appid' and serial=$i";
    $rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               
    $row1 = mysql_fetch_array($rs1);
    $ref_encyclopedia_div_already_exist= $ref_encyclopedia_div_already_exist."<div id='ref_encyclopedia_$i' style='padding: 0px 40px 0px 40px;text-align: center;border-radius: 5px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out;margin-bottom:10px; background-color: white; height: 350px;'>
        <div style='text-align: left; float: left; width: 38%; padding: 20px 20px 20px 20px'>";
    if($i==$numberOfencyclopedia)
      $ref_encyclopedia_div_already_exist= $ref_encyclopedia_div_already_exist."<i id='removebtn_ref_encyclopedia$i' type='button' onclick='removerefencyclopedia();' class='material-icons' style='font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;'>highlight_off</i>";
    else
      $ref_encyclopedia_div_already_exist= $ref_encyclopedia_div_already_exist."<i id='removebtn_ref_encyclopedia$i' type='button' onclick='removerefencyclopedia();' class='material-icons' style='display:none; font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;'>highlight_off</i>"; 
     
      $ref_encyclopedia_div_already_exist= $ref_encyclopedia_div_already_exist."
       
 <label style='background-color: white;padding: 5px 5px 15px 5px;font-size: 20px;'>Reference Number <input type='text' value='$row1[9]' id='section4_ref_encyclopedia_$i"."_refnumber' required style='width: 50px;height: 29px;margin-left: 6px;border: 2px solid black;padding: 2px;font-size: 20px;text-align: center;' name='section4_ref_encyclopedia_$i"."_refnumber'></label>
 <br /><br /> <label class='fieldheader'>Author's Name</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[2]' class='mdl-textfield__input' type='text' id='section4_ref_encyclopedia_$i"."_auth_name' name='section4_ref_encyclopedia_$i"."_auth_name' required style='border-color: blue;'>
      </div>
      
      <br /><br /><br /> <label class='fieldheader'>Title of encyclopedia</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input  value='$row1[3]' class='mdl-textfield__input' type='text' id='section4_ref_encyclopedia_$i"."_title_encyclopedia' name='section4_ref_encyclopedia_$i"."_title_encyclopedia' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Place of Publication</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input  value='$row1[4]'  class='mdl-textfield__input' type='text' id='section4_ref_encyclopedia_$i"."_place_publication' name='section4_ref_encyclopedia_$i"."_place_publication' required style='border-color: blue;'>
      </div>
   </div>
   <div style='text-align: left; float: right; width: 38%; padding: 20px 20px 20px 20px;'>
      <label class='fieldheader'>Publisher</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[5]' class='mdl-textfield__input' type='text' id='section4_ref_encyclopedia_$i"."_publisher' name='section4_ref_encyclopedia_$i"."_publisher' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Year of Publication</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input  value='$row1[6]'  class='mdl-textfield__input' type='text' id='section4_ref_encyclopedia_$i"."_year_publication' name='section4_ref_encyclopedia_$i"."_year_publication' required style='border-color: blue;'>
      </div>
     <br /><br /><br /> <label class='fieldheader'>Title of Article</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input  value='$row1[7]' class='mdl-textfield__input' type='text' id='section4_ref_encyclopedia_$i"."_title_article' name='section4_ref_encyclopedia_$i"."_title_article' required style='border-color: blue;'>
      </div>
      <br /><br /><br /> <label class='fieldheader'>Page Number</label><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input  value='$row1[8]'  class='mdl-textfield__input' type='text' id='section4_ref_encyclopedia_$i"."_page_number' name='section4_ref_encyclopedia_$i"."_page_number' required style='border-color: blue;'>
      </div>
   </div>
   <br /><br />
</div>";   
    }
echo '<script>initialref_encyclopediaload("'.trim(preg_replace('/\s\s+/', ' ', $ref_encyclopedia_div_already_exist)).'");</script>';
}


//other
$ref_other_div_already_exist="";
if($numberOfother>0)
{
    for($i=1;$i<=$numberOfother;$i++)
    {
     
     
    $que="select * from application_part_4_sub_ref_other where appid='$appid' and serial=$i";
    $rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query.  >> $que << <br/>System generated error messege: ".mysql_error());               
    $row1 = mysql_fetch_array($rs1);
    $ref_other_div_already_exist= $ref_other_div_already_exist."<div id='ref_other_$i' style='padding: 0px 40px 0px 40px;text-align: center;border-radius: 5px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);box-sizing: border-box;transition: .2s;transition-timing-function: ease-in-out;margin-bottom:10px; background-color: white; height: 120px;'>
        <div style='text-align: left; float: left; width: 38%; padding: 20px 20px 20px 20px'>";
    if($i==$numberOfother)
      $ref_other_div_already_exist= $ref_other_div_already_exist."<i id='removebtn_ref_other$i' type='button' onclick='removerefother();' class='material-icons' style='font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;'>highlight_off</i>";
    else
      $ref_other_div_already_exist= $ref_other_div_already_exist."<i id='removebtn_ref_other$i' type='button' onclick='removerefother();' class='material-icons' style='display:none; font-size: 36px;margin: 0px;padding: 0px;float: left;color: red;cursor: pointer;'>highlight_off</i>"; 
     
      $ref_other_div_already_exist= $ref_other_div_already_exist."
       <label style='background-color: white;padding: 5px 5px 15px 5px;font-size: 20px;'>Reference Number <input type='text' value='$row1[3]' id='section4_ref_other_$i"."_refnumber' required style='width: 50px;height: 29px;margin-left: 6px;border: 2px solid black;padding: 2px;font-size: 20px;text-align: center;' name='section4_ref_other_$i"."_refnumber'></label>
       </div>
        <br /><br /> 
      <div class='mdl-textfield mdl-js-textfield' style='padding: 0px;width: 100%'>
      <input value='$row1[2]' class='mdl-textfield__input' type='text' id='section4_ref_other_$i"."_details' name='section4_ref_other_$i"."_details' required style='border-color: blue;'>
      </div>
   <br /><br />
</div>
 ";   
    }
echo '<script>initialref_otherload("'.trim(preg_replace('/\s\s+/', ' ', $ref_other_div_already_exist)).'");</script>';
}



}
// Section 4 ENDS
?>

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

<!--#fffa8f!-->