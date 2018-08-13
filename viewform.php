<html>
<head><title>View or Print Application</title>
<!-- Material Design Lite -->
    <script src="http://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="http://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    
<style>
@media print {
  .noPrint {
    display:none;
  }
  /*
  table { page-break-after:auto; word-break: keep-words }
  tr    { page-break-inside: auto; page-break-after:auto; word-break: keep-words; }
  td    { page-break-inside:auto; page-break-after:auto; word-break: keep-words; }
  thead { display:table-header-group; word-break: keep-words; }
  tfoot { display:table-footer-group; word-break: keep-words; }
  */
  .pagebreak{page-break-before: always;}
}
form{
margin: 0px;
}
.fieldheader{
    color: blue;
    font-size: 20px;
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
    background-color: #ffe66c;
}
.mdl-progress-red > .progressbar {
    background-color: red !important;
}
</style>
<script>
function printform()
{
    var printContents = document.getElementById('printableArea').innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>
    
</head>
<body class="pagebody">
<?php

$appid = $_COOKIE['appid'];

?>
<?php
require_once("dbcon.php");
$link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found"); //to establish connection
@mysql_select_db($dbname, $link) or die("<br/><br/>Requested database not found"); //to select proper databases

$formshowtype='postsubmission';

?>

  <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%; margin: 20px;background-color: white;" id="printableArea">
      <div class="mdl-card__title noPrint">
        <h2 class="mdl-card__title-text"><label style="font-family: Lato; font-size: 28px; font-weight: 500;">
        <!--   Page Heading   -->
        View or Print Application
        </h2>
      </div>
      
     
     
      <div class="mdl-card__supporting-text" style="text-align: center; width: inherit; background-color: #13809e; color: white; font-size: 20px; ">
        <!--   Page Sub Heading   -->
        Application Number <b><?php echo $appid ?></b>
        </div>
        

<?php
require_once('viewform_plugin.php');
?>

<div class="mdl-card__menu noPrint">
    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" onclick="printform();">
      <i class="material-icons" style="font-size: 30px;">print</i>
    </button>
  </div>




</div>
</body>
</html>