 <?php
 $appid = $_GET['appid'];
    require_once("dbcon.php");
date_default_timezone_set('Asia/Kolkata');    
        $link = @mysql_connect($host, $user, $pass) or die("<br/><br/>MySQL server not found");//to establish connection
        @mysql_select_db($dbname,$link) or die("<br/><br/>Requested database not found");//to select proper databases

 $appid = str_replace("'","''",$appid);
 $que="select change_datetime, change_by, comment, state from audit_trail where appid='$appid' and state='true' order by change_datetime asc";
          $rs=@mysql_query($que,$link) or die("<br/><br/>Error in query. <br/>System generated error messege: ".mysql_error());

            if(mysql_num_rows($rs)>0)
            {
                while($row=mysql_fetch_array($rs))
                {
                $row[0]=date_create($row[0]);
                $row[0]=date_format($row[0],"d M, Y H:i:s");

session_start();
$username=$_SESSION['chatuser'];
if($username!='::Answer by applicant::')
   {             
                if($row[1]!='::Answer by applicant::')
                echo "<div style='float: left'>
                        <span class='mdl-chip mdl-chip--contact'>
                        <span class='mdl-chip__contact mdl-color--red-50 mdl-color-text--black'>A</span>
                        <span class='mdl-chip__text'>".$row[1]."</span>
                        </span>
                        </div>
                           <div style='max-width: 60%; background-color:#ffd7d7; margin-left:16px;margin-top:2px; border-radius: 0px 15px 15px 15px; padding: 0px 15px 15px 15px; font-size: 18px'><span class='mdl-chip' style='background-color: transparent;'>
                            <span class='mdl-chip__text' style='color: #b19898'>$row[0]</span>
                            </span><br>$row[2]</div><br/>
                        ";
                
                else
                {
                    echo "<div style='float: right'>
                        <span class='mdl-chip mdl-chip--contact' style='padding-left: 15;padding-right: 0px;'><span class='mdl-chip__text' style='padding-right: 13px; padding-right: 13px'>Applicant</span><span class='mdl-chip__contact mdl-color--cyan-A100 mdl-color-text--black' style='margin-right: 0px;'>A</span>
                        </span>
                        </div>
                           <div style='max-width: 47%;background-color:#d7ffee;margin-right: 16px;margin-top:2px;border-radius: 15px 0px 15px 15px;padding: 0px 15px 15px 15px;font-size: 18px;float:  right;right: 13%;position: absolute;z-index:  -1;'><span class='mdl-chip' style='background-color: transparent;margin-right: 165px;'>
                            <span class='mdl-chip__text' style='color: #b19898'>$row[0]</span>
                            </span><br>$row[2]</div><br/>
                            ";
                            //following part is to occupy some space while applicant part will show on left
                            echo "
                            <div style='font-size: 18px;z-index:  -1;max-width: 60%;visibility:hidden'><span class='mdl-chip' style='background-color: transparent;margin-right: 165px;'>
                            <span class='mdl-chip__text' style='color: #b19898'>$row[0]</span>
                            </span><br>$row[2]</div><br/>
                        ";
                
                }
                
                }
                
                else
                {
                    if($row[1]=='::Answer by applicant::')
                echo "<div style='float: left'>
                        <span class='mdl-chip mdl-chip--contact'>
                        <span class='mdl-chip__contact mdl-color--red-50 mdl-color-text--black'>Y</span>
                        <span class='mdl-chip__text'>"."You"."</span>
                        </span>
                        </div>
                           <div style='max-width: 60%; background-color:#ffd7d7; margin-left:16px;margin-top:2px; border-radius: 0px 15px 15px 15px; padding: 0px 15px 15px 15px; font-size: 18px'><span class='mdl-chip' style='background-color: transparent;'>
                            <span class='mdl-chip__text' style='color: #b19898'>$row[0]</span>
                            </span><br>$row[2]</div><br/>
                        ";
                
                else
                {
                    echo "<div style='float: right'>
                        <span class='mdl-chip mdl-chip--contact' style='padding-left: 15;padding-right: 0px;'><span class='mdl-chip__text' style='padding-right: 13px; padding-right: 13px'>$row[1]</span><span class='mdl-chip__contact mdl-color--cyan-A100 mdl-color-text--black' style='margin-right: 0px;'>A</span>
         
                        </span>
                        </div>
                           <div style='max-width: 47%;background-color:#d7ffee;margin-right: 16px;margin-top:2px;border-radius: 15px 0px 15px 15px;padding: 0px 15px 15px 15px;font-size: 18px;float:  right;right: 13%;position: absolute;z-index:  -1;'><span class='mdl-chip' style='background-color: transparent;margin-right: 165px;'>
                            <span class='mdl-chip__text' style='color: #b19898'>$row[0]</span>
                            </span><br>$row[2]</div><br/>
                            ";
                            //following part is to occupy some space while applicant part will show on left
                            echo "
                            <div style='font-size: 18px;z-index:  -1;max-width: 60%;visibility:hidden'><span class='mdl-chip' style='background-color: transparent;margin-right: 165px;'>
                            <span class='mdl-chip__text' style='color: #b19898'>$row[0]</span>
                            </span><br>$row[2]</div><br/>
                        ";
                
                }
                
                }
                }
                }
                else
            {
                echo '<center><div class="material-icons mdl-badge mdl-badge--overlap" data-badge="0">message</div><br/><br/>No Chat History Found</center>';
            }

                
            
            
            ?>