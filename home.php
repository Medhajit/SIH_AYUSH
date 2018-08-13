 <html>
  <head>
  <title>Grant Application Portal</title>
    <!-- Material Design Lite -->
    <script src="http://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="http://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    
<script>
/*
function loginstart_admin_or_master() {
    
     window.location = 'admin_home.php';
    } 
function loginstart_notadmin() {
    
     window.location = 'applicant_home.php';
    } 
    
*/    
function showloading() {
    var divpass=document.getElementById("p2");
    divpass.style.display = "";
    
     
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
  background: url('./img/home_banner.png') center / cover;
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
.a_notices{
   font-family: calibri; 
   font-size: 19px;
   color: darkblue;
}
    </style>

  </head>
  
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
            <a class="mdl-navigation__link" href="applynew.php">Apply</a>
            <a class="mdl-navigation__link" href="CheckStatus.php">Track</a>
            <a class="mdl-navigation__link" href="login.php" style="background-color: rgba(158, 59, 132, 0.64); border-radius: 8px;">Login</a>
          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Menu</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link currentpage" href="home.php">Home</a>
          <a class="mdl-navigation__link" href="applynew.php">Apply Online</a>
          <a class="mdl-navigation__link" href="CheckStatus.php">Check Status</a>
          <a class="mdl-navigation__link" href="print.php">Print Application</a>
          <a class="mdl-navigation__link" href="contact.php">Contact Us</a>
          <a class="mdl-navigation__link" href="login.php" style="background-color: #d5d9f5; color: #757575;">Login</a>
        </nav>
        </nav>
      </div>
      <main class="mdl-layout__content" style="background-color: #deebf7;">
      <div id='p2' class='mdl-progress mdl-js-progress mdl-progress__indeterminate mdl-progress-red' style="display: none; width: 100%"></div>
        <div class="page-content" style="padding: 2% 5%;">
  
  

  
  <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 65%;float: left;">
      <div class="mdl-card__title">

      </div>

      <div id="Container-body">
      <div class="mdl-card__actions mdl-card--border left" style="width: 100%;">   
         <ul>
           <li style="list-style-image: url('img/li_style1.png'); margin-top: 1em;"><a style="color: black; font-size: 35px" href="instruction/instruction.pdf">Instructions for filling application form</a></li><br />

         </ul>  
      </div>
      
      

      </div>
      <div class="mdl-card__menu">
     </div>
    </div>
    
    <div class="mdl-card__actions mdl-card--border right" style="box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12); margin-left:2%; width: 33%; float: left; background-color: #f1f1f1;">
          <center>
          <br/>
            <label style="font-family: 'Montserrat'; font-size: 23px;">Notice Board</label>
            <hr />
            <marquee scrolldelay="200"  behavior=" scroll" width="100%" height="350px" direction="up"  loop="-1" width="40%" onmouseover="stop()" onmouseout="start()">
<ul>
            <?php       
            	require_once("dbcon.php");
        
                $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
                @mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases
                
                $que="select * from notice";//schena titile, link, isnew
                $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());
                
                while($row=mysql_fetch_array($rs))
                {
                    echo "<li><a class='a_notices' target='_blank' href='notice/$row[1]'>$row[0]";
                    if($row[2]=='yes')
                    {
                        echo "<sup><img src='img\\newicon.gif' width='10%'></sup>";
                    }
                    echo "</a></li><br/>";
                }

            ?>
 </ul>

</marquee>           
          </center>

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

