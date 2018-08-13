
<style>

td{
     vertical-align: top;
}
.heading{
    color: blue;
    padding-right: 6px;
}
.value{
    
}


</style>

<?php

      //app_temp table section 0
$que = '';
$noneditability = '';
if($formshowtype == 'presubmission')
{
    $que ="select * from application_temp where appid='$appid'"; //
    $noneditability = '(Uneditable)';
}
if($formshowtype == 'postsubmission')
{
    $que ="select * from app_details where appid='$appid'";
}


$rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());               
$row=mysql_fetch_array($rs);
$que="select * from application_part_1 where appid='$appid'";
$rs1=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());               
$row1=mysql_fetch_array($rs1);

$add=nl2br($row[11]);
$part1sec1=<<<aa

 <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Information Regarding Principal Investigator $noneditability

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white;">
<div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 60px">


<table cellspacing="20">
<tr>
<td><label class="heading">Name:</label> </td>
<td><label class="value">$row[0] $row[1] $row[2]</label></td>
</tr>
<tr>
<td><label class="heading">Date of Birth:</label> </td>
<td><label class="value">$row[6]</label></td>
</tr>
<tr>
<td><label class="heading">Contact Number:</label></td>
<td><label class="value">$row[5]</label></td>
</tr>
<tr>
<td><label class="heading">E-mail Id:</label></td>
<td> <label class="value">$row[4]</label></td>
</tr>
<tr>
<td><label class="heading">Biodata File: </label> </td>
<td><label class="value hyperlinkprint">File Uploaded </label><label class="value noPrint"><a target='_blank' href='application_documents/$row1[1]'> Click to view file</a></label></td>
</tr>
</table>
</div>
<div style="text-align: left; float: right; width: 38%; padding: 20px 60px 20px 20px;">

<table cellspacing="20">
<tr>
<td><label class="heading">Designation:</label> </td>
<td><label class="value">$row[12]</label></td>
</tr>
<tr>
<td><label class="heading">Residential Address:</label></td>
<td><label class="value">$add</label></td>
</tr>
</table>
</div>
</div>

aa;
echo $part1sec1;     
      
      
$add=nl2br($row[15]);   
$part0sec2=<<<aa

 <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Information Regarding Institution of Principal Investigator $noneditability

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white;">
<div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 60px">


<table cellspacing="20">
<tr>
<td><label class="heading">Institution Name: </label> </td>
<td><label class="value">$row[13]</label></td>
</tr>
<tr>
<td><label class="heading">Department:</label> </td>
<td><label class="value">$row[14]</label></td>
</tr>

</table>
</div>
<div style="text-align: left; float: right; width: 38%; padding: 20px 60px 20px 20px;">

<table cellspacing="20">

<tr>
<td><label class="heading">Address of the Institution:</label></td>
<td><label class="value">$add</label></td>
</tr>
</table>
    

</div>



</div>  
aa;
echo $part0sec2;       

$que="select * from application_part_2 where appid='$appid'";
$rs2=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());               
$row2=mysql_fetch_array($rs2);
$row2[1] = nl2br($row2[1]);
$row2[2] = nl2br($row2[2]);
$row2[3] = nl2br($row2[3]);
$part2sec1=<<<aa
<div class="pagebreak"> </div>
 <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Brief Description of the Project

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white; padding: 20px 60px 20px 60px">



<table cellspacing="20">
<tr>
<td><label class="heading">Title: </label> </td>
<td><label class="value">$row[7]</label></td>
</tr>
<tr>
<td><label class="heading">Aims and Objectives: </label> </td>
<td><label class="value">$row2[1]</label></td>
</tr>
<tr>
<td><label class="heading">Introduction: </label> </td>
<td><label class="value">$row2[2]</label></td>
</tr>
<tr>
<td><label class="heading">Review of literature: </label> </td>
<td><label class="value">$row2[3]</label></td>
</tr>

</table>


</div>  
aa;
echo $part2sec1; 


$abstract=nl2br($row[9]);
$part0sec4=<<<aa

 <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Abstract &amp; Keywords of the Project $noneditability

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white; padding: 20px 60px 20px 60px">



<table cellspacing="20">
<tr>
<td><label class="heading">Abstract:</label> </td>
<td><label class="value">$abstract</label></td>
</tr>
<tr>
<td><label class="heading">Keywords:</label> </td>
<td><label class="value">$row[10]</label></td>
</tr>

</table>


</div>  
aa;
echo $part0sec4;      


//coinvestigator

function coninvestigatorAdd($i,$name,$designation,$email,$address,$biodata)
{
 $htmlcode=<<<aa

<label style="padding: 5px 0px 5px 20px; background-color: white; font-size: 14px;">Co-Investigator $i</label>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white;">
<div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 60px">

<table cellspacing="20">
<tr>
<td><label class="heading">Name: </label> </td>
<td><label class="value">$name</label></td>
</tr>
<tr>
<td><label class="heading">Designation: </label> </td>
<td><label class="value">$designation</label></td>
</tr>
<tr>
<td><label class="heading">Email-id: </label> </td>
<td><label class="value">$email</label></td>
</tr>
</table>
</div> 

<div style="text-align: left; float: right; width: 38%; padding: 20px 60px 20px 20px;">

<table cellspacing="20">
<tr>
<td><label class="heading">Address: </label> </td>
<td><label class="value">$address</label></td>
</tr>
<tr>
<td><label class="heading">Biodata: </label> </td>
<td><label class="value hyperlinkprint">File Uploaded </label><label class="value noPrint"><a target='_blank' href='application_documents/$biodata'> Click to view file</a></label></td>
</tr>
</table>
</div> 

</div>  
aa;

return $htmlcode;  
}
echo '<div class="pagebreak"> </div>
<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Information Regarding Coinvestigators (if any)
</div>';

for($i=1;$i<=$row1[2];$i++)
{
    $que="select * from application_part_1_sub1_coinvestigator where appid='$appid' && serial=$i";
    $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());               
    $row=mysql_fetch_array($rs);
    echo coninvestigatorAdd($i,$row[2],$row[3],$row[4],nl2br($row[5]),$row[6]);
}
  
if($row1[2]==0)
 echo '<label style="padding: 20px 0px 20px 0px; text-align: center; color:red">No Co-Investigator Added</label>';
//coinvestigator ends

$row1[7]=nl2br($row1[7]); 
//Information Regarding Collaborating Institute (if any)
$part1sec3=<<<aa

 <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Information Regarding Collaborating Institute (if any)

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white;">
<div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 60px">


<table cellspacing="20">
<tr>
<td><label class="heading">Name of the Institution: </label> </td>
<td><label class="value">$row1[3]</label></td>
</tr>

<tr>
<td><label class="heading">Postal Address: </label></td>
<td> <label class="value">$row1[7]</label></td>
</tr>
</table>
</div>
<div style="text-align: left; float: right; width: 38%; padding: 20px 60px 20px 20px;">

<table cellspacing="20">
<tr>
<td><label class="heading">Telephone Number: </label> </td>
<td><label class="value">$row1[4]</label></td>
</tr>
<tr>
<td><label class="heading">Fax Number: </label></td>
<td><label class="value">$row1[5]</label></td>
</tr>
<tr>
<td><label class="heading">E-mail Id: </label></td>
<td> <label class="value">$row1[6]</label></td>
</tr>
</table>
</div>
</div>

aa;
echo $part1sec3;     

//Ethics Committee

if($row1[10]!='')
$filedetail = "<label class='value hyperlinkprint'>File Uploaded </label><label class='value noPrint'><a target='_blank' href='application_documents/$row1[1]'> Click to view file</a></label>";
else
$filedetail = "<label class='value hyperlinkprint'>No File Uploaded </label>";

$part1sec4=<<<aa

 <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Ethics Committee

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white;">
<div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 60px">


<table cellspacing="20">
<tr>
<td><label class="heading">Name of the ethics committee: </label> </td>
<td><label class="value">$row1[8]</label></td>
</tr>
<tr>
<td><label class="heading">Approval Status: </label> </td>
<td><label class="value">$row1[11]</label></td>
</tr>
</table>
</div>
<div style="text-align: left; float: right; width: 38%; padding: 20px 60px 20px 20px;">
<table cellspacing="20">
<tr>
<td><label class="heading">Approval Date: </label> </td>
<td><label class="value">$row1[9]</label></td>
</tr>
<tr>
<td><label class="heading">Approval File: </label></td>
<td>$filedetail</td>
</tr>
</table>
</div>
</div>

aa;
echo $part1sec4;   


//Duration of Research Project
$part1sec5=<<<aa
 <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Duration of Research Project

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white; padding: 20px 60px 20px 60px">



<table cellspacing="20">
<tr>
<td><label class="heading">Period required for pre-trial preparations: </label> </td>
<td><label class="value">$row1[12]</label></td>
</tr>
<tr>
<td><label class="heading">Period that may be required for analysing the data: </label> </td>
<td><label class="value">$row1[14]</label></td>
</tr>
<tr>
<td><label class="heading">Period which may be needed for collecting the data: </label> </td>
<td><label class="value">$row1[13]</label></td>
</tr>
</table>
</div>  



aa;
echo $part1sec5; 


$que="select * from application_part_3 where appid='$appid'";
$rs3=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());               
$row3=mysql_fetch_array($rs3);

//Methodology
$part3sec1=<<<aa
<div class="pagebreak"> </div>
 <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Methodology

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white;">
<div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 60px">


<table cellspacing="20">
<tr>
<td><label class="heading">Study Type: </label> </td>
<td><label class="value">$row3[1]</label></td>
</tr>
<tr>
<td><label class="heading">Study Design:  </label> </td>
<td><label class="value">$row3[3]</label></td>
</tr>
<tr>
<td><label class="heading">Method for Allocation of Concealment: </label> </td>
<td><label class="value">$row3[4]</label></td>
</tr>
<tr>
<td><label class="heading">Target Sample Size: </label> </td>
<td><label class="value">$row3[8]</label></td>
</tr>
<tr>
<td><label class="heading">Date of First Enrollment: </label> </td>
<td><label class="value">$row3[9]</label></td>
</tr>


</table>
</div>
<div style="text-align: left; float: right; width: 38%; padding: 20px 60px 20px 20px;">
<table cellspacing="20">
<tr>
<td><label class="heading">Estimated duration of subject participation: </label> </td>
<td><label class="value">$row3[10]</label></td>
</tr>
<tr>
<td><label class="heading">Type of trial: </label> </td>
<td><label class="value">$row3[2]</label></td>
</tr>
<tr>
<td><label class="heading">Method of Blinding/Masking: </label> </td>
<td><label class="value">$row3[5]</label></td>
</tr>
<tr>
<td><label class="heading">Phase of Trial:  </label> </td>
<td><label class="value">$row3[6]</label></td>
</tr>
<tr>
<td><label class="heading">Method for Generating Randomization Sequence: </label> </td>
<td><label class="value">$row3[7]</label></td>
</tr>
</table>
</div>
</div>
 <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; height:0px; background-color: #07006d; color:white; font-size: 20px; padding: 0px;">
        <!--   Fake div for printing allignment   -->

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white; padding: 0px 60px 20px 60px">
<table cellspacing="20">

<tr>
<td><label class="heading">Description of the sequence and duration of all trial periods: </label> </td>
<td><label class="value">$row3[11]</label></td>
</tr>
<tr>
<td><label class="heading">Follow Up, if any: </label> </td>
<td><label class="value">$row3[12]</label></td>
</tr>
</table>
</div>  

aa;
echo $part3sec1;    

//Intervention
$row3[13] = nl2br($row3[13]);
$row3[14] = nl2br($row3[14]);
$row3[15] = nl2br($row3[15]);
$part3sec2=<<<aa
<div class="pagebreak"> </div>
 <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Intervention

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white; padding: 20px 60px 20px 60px">


<table cellspacing="20">
<tr>
<td style="width: 50%"><label class="heading">Description of, and justification for, the route of administration, dosage, dosage regimen, and treatment period(s):</label> </td>
<td style="width: 50%"><label class="value">$row3[13]</label></td>
</tr>
<tr>
<td><label class="heading">A description of the trial treatment(s) and the dosage and dosage regimen of the investigational product(s). Also include a description of the dosage form, packaging and labelling of the investigational product(s):  </label> </td>
<td><label class="value">$row3[14]</label></td>
</tr>
<tr>
<td><label class="heading">A description of the “stopping rules” or “discontinuation criteria” for individual subjects, parts of trial and entire trial: 
 </label> </td>
<td><label class="value">$row3[15]</label></td>
</tr>
</table>
</div>  

aa;
echo $part3sec2; 
//Subject Withdrawal Criteria

   
   $row3[16]=nl2br($row3[16]);
   $row3[17]=nl2br($row3[17]);
   $row3[18]=nl2br($row3[18]);
   $row3[19]=nl2br($row3[19]);
$part3sec3=<<<aa
<div class="pagebreak"> </div>
 <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Subject withdrawal criteria 
i.e. terminating investigational product treatment/trial treatment and procedures specifying

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white; padding: 20px 60px 20px 60px">


<table cellspacing="20">
<tr >
<td><label class="heading">When and how to withdraw subjects from the trial/investigational product treatment:</label> </td>
<td><label class="value">$row3[16]</label></td>
</tr>
<tr>
<td><label class="heading">The type and timing of the data to be collected for withdrawn subjects :</label></td>
<td><label class="value">$row3[17]</label></td>
</tr>
<tr>
<td><label class="heading">Whether and how subjects are to be replaced : </label></td>
<td> <label class="value">$row3[18]</label></td>
</tr>
<tr>
<td><label class="heading"> The follow-up for subjects withdrawn from investigational product treatment/trial treatment: </label></td>
<td> <label class="value">$row3[19]</label></td>
</tr>
</table>
</div>

aa;
echo $part3sec3;  

//Assessment

$row3[20]=nl2br($row3[20]);
   $row3[21]=nl2br($row3[21]);
   $row3[22]=nl2br($row3[22]);
   $row3[23]=nl2br($row3[23]);
$part3sec4=<<<aa

 <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Assessment of safety of trial subjects/research participants
</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white; padding: 20px 60px 20px 60px">



<table cellspacing="20">
<td><label class="heading">Assessment of safety of trial subjects/research participants:</label> </td>
<td><label class="value">$row3[20]</label></td>
</tr>
<tr>
<td><label class="heading">The methods and timing for assessing, recording, and analysing safety parameters: </label></td>
<td><label class="value">$row3[21]</label></td>
</tr>
<tr>
<td><label class="heading">Procedures for eliciting report of and for recording and reporting adverse event and intercurrent illnesses :</label></td>
<td><label class="value">$row3[22]</label></td>
</tr>
<tr>
<td><label class="heading">The type and duration of the follow-up of subjects after adverse events: </label></td>
<td><label class="value">$row3[23]</label></td>
</tr>
</table>
</div>

aa;
echo $part3sec4; 

// part 4
//if($formshowtype == 'presubmission')
//{
    

$que="select * from application_part_4 where appid='$appid'";
$rs4=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());               
$row4=mysql_fetch_array($rs4);
// JOurnal 
function JournalAdd($i,$auth_name,$title_of_article,$abb_title_journal,$date_of_pub,$vol_number,$issue_number,$page_number,$refnumber)
{
 $htmlcode=<<<aa

<label style="padding: 5px 0px 5px 20px; font-size: 14px; background-color: white;">Reference $refnumber</label>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white;">
<div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 60px">

<table cellspacing="20">
<tr>
<td><label class="heading">Author's Name: </label> </td>
<td><label class="value">$auth_name</label></td>
</tr>
<tr>
<td><label class="heading">Title of the article: </label> </td>
<td><label class="value">$title_of_article</label></td>
</tr>
<tr>
<td><label class="heading">Abbreviated Title of Journal: </label> </td>
<td><label class="value">$abb_title_journal</label></td>
</tr>
<tr>
<td><label class="heading">Date of publication: </label> </td>
<td><label class="value">$date_of_pub</label></td>
</tr>
</table>
</div> 

<div style="text-align: left; float: right; width: 38%; padding: 20px 60px 20px 20px;">

<table cellspacing="20">
<tr>
<td><label class="heading">Volume Number : </label> </td>
<td><label class="value">$vol_number</label></td>
</tr>
<tr>
<td><label class="heading">Issue Numbers: </label> </td>
<td><label class="value">$issue_number</label></td>
</tr>
<tr>
<td><label class="heading">Page Number(s): </label> </td>
<td><label class="value">$page_number</label></td>
</tr>
</table>
</div> 

</div>  
aa;

return $htmlcode;  
}
$countreferences = 0;
echo '<div class="pagebreak"> </div>
<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        <b>References</b>
</div>';
$countreferences = $countreferences + $row4[1];
if($row4[1]>0)
{echo '

<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #abaece; color:white; font-size: 16px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Journal
</div>';}

for($i=1;$i<=$row4[1];$i++)
{
    $que="select * from application_part_4_sub_ref_journal where appid='$appid' && serial=$i";
    $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());               
    $row=mysql_fetch_array($rs);
    echo JournalAdd($i,$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9]);
}
  

//Journal ends

//Books

function BooksAdd($i,$authors_name,$title_of_book,$edition,$place_of_pub,$publisher,$yearofpublication,$refnumber)
{
 $htmlcode=<<<aa

<label style="padding: 5px 0px 5px 20px; font-size: 14px; background-color: white;">Reference $refnumber</label>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white;">
<div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 60px">

<table cellspacing="20">
<tr>
<td><label class="heading">Author's Name: </label> </td>
<td><label class="value">$authors_name</label></td>
</tr>
<tr>
<td><label class="heading">Title of Book: </label> </td>
<td><label class="value">$title_of_book</label></td>
</tr>
<tr>
<td><label class="heading">Edition: </label> </td>
<td><label class="value">$edition</label></td>
</tr>
</table>
</div> 

<div style="text-align: left; float: right; width: 38%; padding: 20px 60px 20px 20px;">

<table cellspacing="20">
<tr>
<td><label class="heading">Place of Publication: </label> </td>
<td><label class="value">$place_of_pub</label></td>
</tr>
<tr>
<td><label class="heading">Publisher: </label> </td>
<td><label class="value">$publisher</label></td>
</tr>
<tr>
<td><label class="heading">Year of Publication: </label> </td>
<td><label class="value">$yearofpublication</label></td>
</tr>
</table>
</div> 

</div>  
aa;

return $htmlcode;  
}
$countreferences = $countreferences + $row4[2];
if($row4[2]>0)
{echo '
<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #abaece; color:white; font-size: 16px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Books
</div>';}

for($i=1;$i<=$row4[2];$i++)
{
    $que="select * from application_part_4_sub_ref_book where appid='$appid' && serial=$i";
    $rs=@mysql_query($que,$link) or die("<r/><br/>Error in query. <br/>System generated error messege: ".mysql_error());               
    $row=mysql_fetch_array($rs);
    echo BooksAdd($i,$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
}

//books ends
 
 //report

function ReportAdd($i,$author_name,$title_report,$palce_of_pub,$publisher,$dateofpublication, $totalpages, $reportnumber,$refnumber)
{
 $htmlcode=<<<aa

<label style="padding: 5px 0px 5px 20px; font-size: 14px; background-color: white;">Reference $refnumber</label>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white;">
<div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 60px">

<table cellspacing="20">
<tr>
<td><label class="heading">Author's Name/Organisation Name: </label> </td>
<td><label class="value">$author_name</label></td>
</tr>
<tr>
<td><label class="heading">Title of Report: </label> </td>
<td><label class="value">$title_report</label></td>
</tr>
<tr>
<td><label class="heading">Place of Publication: </label> </td>
<td><label class="value">$palce_of_pub</label></td>
</tr>
</table>
</div> 

<div style="text-align: left; float: right; width: 38%; padding: 20px 60px 20px 20px;">

<table cellspacing="20">
<tr>
<td><label class="heading">Publisher: </label> </td>
<td><label class="value">$publisher</label></td>
</tr>
<tr>
<td><label class="heading">Date of Publication: </label> </td>
<td><label class="value">$dateofpublication</label></td>
</tr>
<tr>
<td><label class="heading">Total Number of Pages: </label> </td>
<td><label class="value">$totalpages</label></td>
</tr>
<tr>
<td><label class="heading">Report Number: </label> </td>
<td><label class="value">$reportnumber</label></td>
</tr>
</table>
</div> 

</div>  
aa;

return $htmlcode;  
}
$countreferences = $countreferences + $row4[3];
if($row4[3]>0)
{echo '
<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #abaece; color:white; font-size: 16px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Govt. and Technical Reports
</div>';}

for($i=1;$i<=$row4[3];$i++)
{
    $que="select * from application_part_4_sub_ref_report where appid='$appid' && serial=$i";
    $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());               
    $row=mysql_fetch_array($rs);
    echo ReportAdd($i,$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9]);
}
  

//Report ends  

//Websites and Social Media

function WebMediaAdd($i,$author_name,$title_page,$place_of_pub,$publisher,$date_of_pub,$refnumber)
{
 $htmlcode=<<<aa

<label style="padding: 5px 0px 5px 20px; font-size: 14px; background-color: white;">Reference $refnumber</label>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white;">
<div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 60px">

<table cellspacing="20">
<tr>
<td><label class="heading">Author/Organisation Name: </label> </td>
<td><label class="value">$author_name</label></td>
</tr>
<tr>
<td><label class="heading">Title of the Page: </label> </td>
<td><label class="value">$title_page</label></td>
</tr>
</table>
</div> 

<div style="text-align: left; float: right; width: 38%; padding: 20px 60px 20px 20px;">

<table cellspacing="20">
<tr>
<td><label class="heading">Place of Publication: </label> </td>
<td><label class="value">$place_of_pub</label></td>
</tr>
<tr>
<td><label class="heading">Publisher: </label> </td>
<td><label class="value">$publisher</label></td>
</tr>
<tr>
<td><label class="heading">Date/Year of Publication: </label> </td>
<td><label class="value">$date_of_pub</label></td>
</tr>
</table>
</div> 

</div>  
aa;

return $htmlcode;  
}
$countreferences = $countreferences + $row4[4];
if($row4[4]>0)
{echo '
<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #abaece; color:white; font-size: 16px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Websites and Social Media
</div>';}

for($i=1;$i<=$row4[4];$i++)
{
    $que="select * from application_part_4_sub_ref_website where appid='$appid' && serial=$i";
    $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());               
    $row=mysql_fetch_array($rs);
    echo WebMediaAdd($i,$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]);
}

//Websites and Social Media ends  



//Thesis



function ThesisAdd($i,$author_name,$title_thesis,$place_of_pub,$publisher,$year,$number_of_pages,$refnumber)
{
 $htmlcode=<<<aa

<label style="padding: 5px 0px 5px 20px; font-size: 14px; background-color: white;">Reference $refnumber</label>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white;">
<div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 60px">

<table cellspacing="20">
<tr>
<td><label class="heading">Author's Name: </label> </td>
<td><label class="value">$author_name</label></td>
</tr>
<tr>
<td><label class="heading">Title of Thesis: </label> </td>
<td><label class="value">$title_thesis</label></td>
</tr>
<tr>
<td><label class="heading">Place of Publication: </label> </td>
<td><label class="value">$place_of_pub</label></td>
</tr>
</table>
</div> 

<div style="text-align: left; float: right; width: 38%; padding: 20px 60px 20px 20px;">

<table cellspacing="20">
<tr>
<td><label class="heading">Publisher: </label> </td>
<td><label class="value">$publisher</label></td>
</tr>
<tr>
<td><label class="heading">Year of Publication: </label> </td>
<td><label class="value">$year</label></td>
</tr>
<tr>
<td><label class="heading">Number of Pages: </label> </td>
<td><label class="value">$number_of_pages</label></td>
</tr>
</table>
</div> 

</div>  
aa;

return $htmlcode;  
}
$countreferences = $countreferences + $row4[5];
if($row4[5]>0)
{echo '
<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #abaece; color:white; font-size: 16px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Secondary Sources - Thesis/Dissertation
</div>';}

for($i=1;$i<=$row4[5];$i++)
{
    $que="select * from application_part_4_sub_ref_secondary where appid='$appid' && serial=$i";
    $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());               
    $row=mysql_fetch_array($rs);
    echo ThesisAdd($i,$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
}
  

//thesis ends    
      
     
 //Newspaper
 
 



function NewspaperAdd($i,$author_name,$title_of_article,$newspaper_title,$place_of_pub,$date_of_publication,$section,$location,$cited_on,$refnumber)
{
 $htmlcode=<<<aa

<label style="padding: 5px 0px 5px 20px; font-size: 14px; background-color: white;">Reference $refnumber</label>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white;">
<div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 60px">

<table cellspacing="20">
<tr>
<td><label class="heading">Author's Name: </label> </td>
<td><label class="value">$author_name</label></td>
</tr>
<tr>
<td><label class="heading">Title of Article: </label> </td>
<td><label class="value">$title_of_article</label></td>
</tr>
<tr>
<td><label class="heading">Newspaper Title: </label> </td>
<td><label class="value">$newspaper_title</label></td>
</tr>
<tr>
<td><label class="heading">Place of Publication: </label> </td>
<td><label class="value">$place_of_pub</label></td>
</tr>
</table>
</div> 

<div style="text-align: left; float: right; width: 38%; padding: 20px 60px 20px 20px;">

<table cellspacing="20">
<tr>
<td><label class="heading">Date of Publication: </label> </td>
<td><label class="value">$date_of_publication</label></td>
</tr>
<tr>
<td><label class="heading">Section: </label> </td>
<td><label class="value">$section</label></td>
</tr>
<tr>
<td><label class="heading">Location: </label> </td>
<td><label class="value">$location</label></td>
</tr>
<tr>
<td><label class="heading">Cited On: </label> </td>
<td><label class="value">$cited_on</label></td>
</tr>
</table>
</div> 

</div>  
aa;

return $htmlcode;  
}
$countreferences = $countreferences + $row4[6];
if($row4[6]>0)
{echo '
<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #abaece; color:white; font-size: 16px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Newspaper
</div>';}

for($i=1;$i<=$row4[6];$i++)
{
    $que="select * from application_part_4_sub_ref_newspaper where appid='$appid' && serial=$i";
    $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());               
    $row=mysql_fetch_array($rs);
    echo NewspaperAdd($i,$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10]);
}

//newspaper ends   

//Encyclopedia

function EncyclopediaAdd($i,$author_name,$title_encyclopedia,$place_of_publication,$publisher,$year,$title_article,$page_number,$refnumber)
{
 $htmlcode=<<<aa

<label style="padding: 5px 0px 5px 20px; font-size: 14px; background-color: white;">Reference $refnumber</label>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white;">
<div style="text-align: left; float: left; width: 38%; padding: 20px 20px 20px 60px">

<table cellspacing="20">
<tr>
<td><label class="heading">Author's Name: </label> </td>
<td><label class="value">$author_name</label></td>
</tr>
<tr>
<td><label class="heading">Title of encyclopedia: </label> </td>
<td><label class="value">$title_encyclopedia</label></td>
</tr>
<tr>
<td><label class="heading">Place of Publication: </label> </td>
<td><label class="value">$place_of_publication</label></td>
</tr>
</table>
</div> 

<div style="text-align: left; float: right; width: 38%; padding: 20px 60px 20px 20px;">

<table cellspacing="20">
<tr>
<td><label class="heading">Publisher: </label> </td>
<td><label class="value">$publisher</label></td>
</tr>
<tr>
<td><label class="heading">Year of Publication: </label> </td>
<td><label class="value">$year</label></td>
</tr>
<tr>
<td><label class="heading">Title of Article: </label> </td>
<td><label class="value">$title_article</label></td>
</tr>
<tr>
<td><label class="heading">Page Number: </label> </td>
<td><label class="value">$page_number</label></td>
</tr>
</table>
</div> 

</div>  
aa;

return $htmlcode;  
}
$countreferences = $countreferences + $row4[7];
if($row4[7]>0)
{echo '
<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #abaece; color:white; font-size: 16px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Encyclopedia
</div>';}

for($i=1;$i<=$row4[7];$i++)
{
    $que="select * from application_part_4_sub_ref_encyclopedia where appid='$appid' && serial=$i";
    $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());               
    $row=mysql_fetch_array($rs);
    echo EncyclopediaAdd($i,$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9]);
}
  

//Encyclopedia ends

//others

function OtherAdd($i,$other,$refnumber)
{
 $htmlcode=<<<aa

<label style="padding: 5px 0px 5px 20px; font-size: 14px; background-color: white;">Reference $refnumber</label>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white; padding: 20px 60px 20px 60px">


<table cellspacing="20">
<tr>
<td><label class="heading">Others: </label> </td>
<td><label class="value">$other</label></td>
</tr>
</table>
</div>  
aa;

return $htmlcode;  
}
$countreferences = $countreferences + $row4[8];
if($row4[8]>0)
{echo '
<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #abaece; color:white; font-size: 16px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
       Other
</div>';}

for($i=1;$i<=$row4[8];$i++)
{
    $que="select * from application_part_4_sub_ref_other where appid='$appid' && serial=$i";
    $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());               
    $row=mysql_fetch_array($rs);
    echo OtherAdd($i,$row[2],$row[3]);
}

//other ends 
//}
if($countreferences == 0)
    echo '<label style="padding: 20px 0px 20px 0px; text-align: center; color:red">No References Added</label>'; 
//Statistics

$row4[9] = nl2br($row4[9]);
$row4[10] = nl2br($row4[10]);
$row4[11] = nl2br($row4[11]);
$row4[12] = nl2br($row4[12]);
$row4[13] = nl2br($row4[13]);
$row4[14] = nl2br($row4[14]);
$row4[15] = nl2br($row4[15]);
$part4sec2=<<<aa
<div class="pagebreak"> </div>
 <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Statistics

</div>
<div class="mdl-card__actions mdl-card--border" style="text-align: center; background-color: white; padding: 20px 60px 20px 60px">

<table cellspacing="20">
<tr>
<td style="width: 50%"><label class="heading">A description of the statistical methods to be employed, including timing of any planned interim analysis:</label> </td>
<td style="width: 50%"><label class="value">$row4[9]</label></td>
</tr>
<tr>
<td><label class="heading">The number of subjects planned to be enrolled. In multi-centre trials, the numbers of enrolled subjects projected for each trial site should be specified. Reason for choice of sample size, including reflections on (or calculations of) the power of the trial and clinical justification:  </label> </td>
<td><label class="value">$row4[10]</label></td>
</tr>
<tr>
<td><label class="heading"> The level of significance to be used: </label> </td>
<td><label class="value">$row4[11]</label></td>
</tr>
<tr>
<td><label class="heading"> Criteria for the termination of the trial:</label> </td>
<td><label class="value">$row4[12]</label></td>
</tr>
<tr>
<td><label class="heading">Procedure for accounting for missing, unused, and spurious data :</label> </td>
<td><label class="value">$row4[13]</label></td>
</tr>
<tr>
<td><label class="heading">Procedures for reporting any deviation(s) from the original statistical plan:</label> </td>
<td><label class="value">$row4[14]</label></td>
</tr>
<tr>
<td><label class="heading">The selection of subjects to be included in the analysis :
</label> </td>
<td><label class="value">$row4[15]</label></td>
</tr>
</table>

</div>  

aa;
echo $part4sec2; 
//Statistics end

//Summary
$row4[16] = nl2br($row4[16]);
$part4sec3=<<<aa

 <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
       Summary

</div>
<div class="mdl-card__actions mdl-card--border" style="page-break-after: always;text-align: center; background-color: white; padding: 20px 60px 20px 60px">

<table cellspacing="20">
<tr>
<td><label class="heading">Summary of the proposed research Project/Synopsis :</label> </td>
<td><label class="value">$row4[16]</label></td>
</tr> 
</table>
</div>  

aa;
echo $part4sec3;
//Summary ends
       




// part 4_budget_recurring salary 

$que="select * from application_part_4_budget_recurring where appid='$appid'";

$rs4_rec = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
               
// Recurring Expenditure (salary)


function SalaryAdd($serial,$justification,$yr1,$yr2,$yr3,$total)
{
 $htmlcode=<<<aa

        <tr style="background-color: #eeeff9;">
            <td style="border-bottom: 1px solid gray;width:150px"><label class="value">$serial</label></td>
            <td style="border-bottom: 1px solid gray;width:320px;padding-right:10px;"><label class="value">$justification</label></td>        
            <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;"><label class="value">$yr1</label></td>     
            <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;"><label class="value">$yr2</label></td>
            <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;"><label class="value">$yr3</label></td>
            <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;"><label class="value">$total</label></td>
        </tr>

aa;

return $htmlcode;  
}
echo '

<div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #07006d; color:white; font-size: 20px; padding: 0px; padding: 7px;">
        <!--   Page Sub Heading   -->
        Budget
</div>
<br><br>
<div style="text-align: center; background-color:#abaece; color:white; font-size: 17px;height:25px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);margin: 0px 60px 0px 60px; padding-top: 5px">
     Recurring Expenditure   
</div>
<table cellspacing="0" cellpadding="10" style="box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);margin: 0px 60px 0px 60px;">
<thead style="background-color: white;">
    <td style="border-bottom: 1px solid gray;width:150px">Salary</td>
    <td style="border-bottom: 1px solid gray;width:320px;padding-right:10px;">Justification</td>
    <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;">1st Year</td>
    <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;">2nd Year</td>
    <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;">3rd Year</td>
    <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;">Total</td>
</thead>


';
            
while($row4_rec=mysql_fetch_array($rs4_rec))
{
    $row4_rec[2]=nl2br($row4_rec[2]);
    echo SalaryAdd($row4_rec[1],$row4_rec[2],$row4_rec[3],$row4_rec[4],$row4_rec[5],$row4_rec[6]);
}
echo "</table><br><br>";

//Recurring table(salary) ends


// part 4_budget_equipment starts

$que="select * from application_part_4_budget_equipment where appid='$appid'";
$rs4_eq = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
               
function EquipAdd($serial,$justification,$yr1,$yr2,$yr3,$total)
{
 $htmlcode=<<<aa

        <tr style="background-color: #eeeff9;">
            <td style="border-bottom: 1px solid gray;width:150px"><label class="value">$serial</label></td>
            <td style="border-bottom: 1px solid gray;width:320px;padding-right:10px;"><label class="value">$justification</label></td>        
            <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;"><label class="value">$yr1</label></td>     
            <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;"><label class="value">$yr2</label></td>
            <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;"><label class="value">$yr3</label></td>
            <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;"><label class="value">$total</label></td>
        </tr>

aa;

return $htmlcode;  
}
echo '

<div style="text-align: center; background-color:#abaece; color:white; font-size: 17px;height:25px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);margin: 0px 60px 0px 60px; padding-top: 5px">
     Non-Recurring Expenditure   
</div>
<table cellspacing="0" cellpadding="10" style="box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);margin: 0px 60px 0px 60px;">
<thead style="background-color: white;">
    <td style="border-bottom: 1px solid gray;width:150px">Equipment</td>
    <td style="border-bottom: 1px solid gray;width:320px;padding-right:10px;">Justification</td>
    <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;">1st Year</td>
    <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;">2nd Year</td>
    <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;">3rd Year</td>
    <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;">Total</td>
</thead>


';
            
while($row4_eq=mysql_fetch_array($rs4_eq))
{
    $row4_eq[2]=nl2br($row4_eq[2]);
    echo EquipAdd($row4_eq[1],$row4_eq[2],$row4_eq[3],$row4_eq[4],$row4_eq[5],$row4_eq[6]);
}

echo "</table><br><br>";
//part 4_budget_equipment ends



//part_4_budget_non-recur starts




$que="select * from application_part_4_budget_nonrecurring where appid='$appid'";
$rs4_nonrec = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
               
function NonRecAdd($heading,$justification,$yr1,$yr2,$yr3,$total)
{
 $htmlcode=<<<aa

        <tr style="background-color: #eeeff9;">
            <td style="border-bottom: 1px solid gray;width:150px"><label class="value">$heading</label></td>
            <td style="border-bottom: 1px solid gray;width:320px;padding-right:10px;"><label class="value">$justification</label></td>        
            <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;""><label class="value">$yr1</label></td>     
            <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;""><label class="value">$yr2</label></td>
            <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;"><label class="value">$yr3</label></td>
            <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;"><label class="value">$total</label></td>
        </tr>
 
aa;

return $htmlcode;  
}
echo '

<div style="text-align: center; background-color:#abaece; color:white; font-size: 17px;height:25px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);margin: 0px 60px 0px 60px; padding-top:5px">
     Non-Recurring Expenditure   
</div>

<table cellspacing="0" cellpadding="10" style="box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);margin: 0px 60px 0px 60px;">
<thead style="background-color: white;">
    <td style="border-bottom: 1px solid gray;width:150px">Heading</td>
    <td style="border-bottom: 1px solid gray;width:320px;padding-right:10px;">Justifications</td>
    <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;">1st Year</td>
    <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;">2nd Year</td>
    <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;">3rd Year</td>
    <td style="border-bottom: 1px solid gray;width:200px;padding-right:10px;">Total</td>
</thead>

';
            
while($row4_nonrec=mysql_fetch_array($rs4_nonrec))
{
    $row4_nonrec[2]=nl2br($row4_nonrec[2]);
    echo NonRecAdd($row4_nonrec[1],$row4_nonrec[2],$row4_nonrec[3],$row4_nonrec[4],$row4_nonrec[5],$row4_nonrec[6]);
}

// part_4_budget_non-recur ends


// part_4_budget_non-recur_other starts

$que="select * from application_part_4_budget_nonrecurring_other where appid='$appid'";
$rs4_nonrecother = @mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
               
function NonRecOtherAdd($heading,$justification,$yr1,$yr2,$yr3,$total)
{
 $htmlcode=<<<aa

        <tr style="background-color: #eeeff9;">
            <td style="width:150px"><label class="value">$heading</label></td>
            <td style="width:320px;padding-right:10px;"><label class="value">$justification</label></td>        
            <td style="width:200px;padding-right:10px;"><label class="value">$yr1</label></td>     
            <td style="width:200px;padding-right:10px;"><label class="value">$yr2</label></td>
            <td style="width:200px;padding-right:10px;"><label class="value">$yr3</label></td>
            <td style="width:200px;padding-right:10px;"><label class="value">$total</label></td>
        </tr>

aa;

return $htmlcode;  
}
            
while($row4_nonrecother=mysql_fetch_array($rs4_nonrecother))
{
    $row4_nonrecother[2]=nl2br($row4_nonrecother[2]);
    echo NonRecOtherAdd($row4_nonrecother[1],$row4_nonrecother[2],$row4_nonrecother[3],$row4_nonrecother[4],$row4_nonrecother[5],$row4_nonrecother[6]);
}
    
echo "</table><br><br>";

// part_4_budget_non-recur_other ends

?>