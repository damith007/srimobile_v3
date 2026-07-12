<?php
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
include("config.php");
include("core.php");
include("xhtmlfunctions.php");

 connectdb();
$action = $_GET["action"];
$sid = $_GET["sid"];
$page = $_GET["page"];
$who = $_GET["who"];

cleardata();
mylog($sid);
$uid = getuid_sid($sid);


	
 if($action=="gift")
{
 $pstyle = gettheme($sid);
echo xhtmlhead("SM Gift",$pstyle);
///////////////////////////////////////////////////////////
 echo"<h5>SM Gift</h5>";
 div();
 echo"<p><center>Bonus credit 1n every 15 mintus...<br/>it may be sometime 100 credits some time 200 credits or 300 credits</center></p>";
 
 
/*

*/
$magictime = mysqli_fetch_array(sm_query("SELECT time FROM ibwf_gift WHERE uid='".$uid."'"));
if($magictime[0]<time())
{
////////////////////////////////////////////////////////////////////////////////////////
 $coin = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
 $ran = rand(1,3);
 $cer= $ran*100;
 
 
 
 $cointotal=$coin[0]+$cer;
  $magictimez=time()+60*15;
 
  $gift = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_gift WHERE uid='".$uid."'"));
if($gift[0]==0){
	  $res = sm_query("INSERT INTO ibwf_gift SET uid='".$uid."',time='".$magictimez."',win='".$cer."'");		  
 }else{  
 sm_query("UPDATE ibwf_gift SET time='".$magictimez."',win='".$cer."' WHERE uid='".$uid."'");
 }
 

$sql="UPDATE `ibwf_users` SET `plusses` = '".$cointotal."' WHERE `ibwf_users`.`id` ='".$uid."'";
$res = sm_query($sql);
if($res){
divok();
echo "<img src=\"images/credit.png\" alt=\"X\"/>You win <b>$cer</b> plusses..<br/> try again in 15 min<br/>$starimg<b>Total:</b>$cointotal<br/></div>";
}else{
echo "<img src=\"images/notok.gif\" alt=\"X\"/>db Error!<br/>";
}



}else{

  $msu=gettimemsg($magictime[0]-time());
  dival();
  echo"Wait to $msu Bonus Crditz</div>";
}





   echo "</div><p align=\"center\">";
      echo "<br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a></p>";

////////////////////////////////////////////////////////////
  echo xhtmlfoot();
}	
else if($action=="startlove")
{
addonline(getuid_sid($sid),"Using Love Calculator","");
 $pstyle = gettheme($sid);
echo xhtmlhead("Using Love Calculator",$pstyle);

      echo "<p align=\"center\">";
        echo "<img src=\"smilies/love.gif\" alt=\"*\"/><br/>";
        echo "Your Name:<br/>";
        echo "<input name=\"name\" maxlength=\"12\"/><br/>";
        echo "partner's Name:<br/>";
        echo "<input name=\"partner\" maxlength=\"12\"/><br/>";
         echo "<a href=\"?action=results&amp;sid=$sid\">Calculate Your Love!</a><br/>";
        echo "</small></p>";
        

   echo "<p align=\"center\">";
   echo "<br/><a href=\"index.php?action=funm&amp;sid=$sid\">Back To Home</a><br/>";
   echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
   echo "Home</a><br/>";

      echo "</p>";
  echo xhtmlfoot();
}

else if($action=="results")
{
 addonline(getuid_sid($sid),"Getting Results From Love Calculator","");
   $pstyle = gettheme($sid);
echo xhtmlhead("Getting Results From Love Calculator",$pstyle);
      echo "<p align=\"center\">";

 $lovecalc=rand (40,100);
 $jeez     = "48";
 $wow      = "67";
 
 echo "<small>";

 echo "You Love Your Partner <b>$lovecalc %</b><br/>";

if($lovecalc < $jeez) echo "<b>Jeez Do Better Than That!</b>";
	elseif($lovecalc > $wow) echo "<b>WOW Thats Cool Keep It Up!</b>";
	else echo "<b>Obviously I Dont Know What To Say!</b>";

    echo "<br/><br/><br/><a href=\"index.php?action=funm&amp;sid=$sid\">Back To Home</a><br/>";
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a><br/>";

      echo "</p>";
  echo xhtmlfoot();;
}


else if($action=="panel")
{
 addonline(getuid_sid($sid),"SM Premium User! ","");
   $pstyle = gettheme($sid);
echo xhtmlhead("SM Premium User!",$pstyle);
echo "<p align=\"center\">";

echo"<u><b>SM Premium Panel</b></u><br/>
Hi,".getnick_uid($uid)." When u become a SM premium user , u get alot of hiddend features,</p><br/>"; 
echo"<img src=\"images/star.gif\" alt=\"*\"/>Ghost mode in chat<br/>";
$ghost = mysqli_fetch_array(sm_query("SELECT ghost FROM ibwf_users WHERE id='".$uid."'"));
if($ghost[0]==0){
 echo "[<a href=\"other.php?action=ghost&amp;sid=$sid&amp;ac=ok\">ON</a>/OFF]<br/>";
}else{
 echo "[<a href=\"other.php?action=ghost&amp;sid=$sid&amp;ac=off\">OFF</a>/ON]<br/>";
}
///////////////////////////////////////////////////
echo"<img src=\"images/star.gif\" alt=\"*\"/>Invisible Profile<br/>";

$invisible = mysqli_fetch_array(sm_query("SELECT invisible FROM ibwf_users WHERE id='".$uid."'"));
if($invisible[0]==0){
 echo "[<a href=\"other.php?action=invisible&amp;sid=$sid&amp;ac=ok\">ON</a>/OFF]<br/>";
}else{
 echo "[<a href=\"other.php?action=invisible&amp;sid=$sid&amp;ac=off\">OFF</a>/ON]<br/>";
}

/////////////////////

    echo "<br/><br/><br/><a href=\"index.php?action=cpanel&amp;sid=$sid\">Back To Cpanel</a><br/>";
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a><br/>";

      echo "</p>";
  echo xhtmlfoot();;
}	
///////////////////////////////////////////////////////////////////////////////////
else if($action=="ghost")
{ $pstyle = gettheme($sid);
      echo xhtmlhead("View Profile",$pstyle);
addonline(getuid_sid($sid),"Profil","");
$ac = $_GET["ac"];
if($ac=="ok"){
$acts = 1;
$act = "Actived";
}else{
$acts = 0;
$act = "dectived";
}
echo "<p align=\"center\">";
$res = sm_query("UPDATE ibwf_users SET ghost='".$acts."' WHERE id='".$uid."'");
if($res)
{
echo "<img src=\"images/ok.gif\" alt=\"o\"/>Ghost Mod In chat $act!<br/>";
}else{
echo "<img src=\"images/notok.gif\" alt=\"x\"/>
It's impossible to update your profile!<br/>";
}
echo "<a href=\"?action=panel&amp;sid=$sid\">Back To Premium Panel</a><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a>";
        echo "</p>";
  echo xhtmlfoot();
}
/////////////////////////////////////
else if($action=="invisible")
{ $pstyle = gettheme($sid);
      echo xhtmlhead("View Profile",$pstyle);
addonline(getuid_sid($sid),"Profil","");
$ac = $_GET["ac"];
if($ac=="ok"){
$acts = 1;
$act = "invisible";
}else{
$acts = 0;
$act = "visible";
}
echo "<p align=\"center\">";
$res = sm_query("UPDATE ibwf_users SET invisible='".$acts."' WHERE id='".$uid."'");
if($res)
{
echo "<img src=\"images/ok.gif\" alt=\"o\"/>You Are Now $act In SriMobile!<br/>";
}else{
echo "<img src=\"images/notok.gif\" alt=\"x\"/>
It's impossible to update your profile!<br/>";
}
echo "<a href=\"?action=panel&amp;sid=$sid\">Back To Premium Panel</a><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a>";
        echo "</p>";
  echo xhtmlfoot();
}
////////////////////////////////////////////////////////////////

else if($action=="user")
{ $pstyle = gettheme($sid);
      echo xhtmlhead("View Profile",$pstyle);
addonline(getuid_sid($sid),"Profil","");
$who= $_GET["who"];
//////////////////////////////////////////
$userbr=getbr_uid($who);
$userip=getip_uid($who);
$ip="61.245.173.144";
 echo "<b>Browser:</b> ".ua($userbr)."<br/>";
  echo "<b>OS:</b> ".getOS($userbr)."<br/>";
  echo "<b>IP:</b> ".$userip."<br/>";
    if($userip!==""){
  $cc = iptocountry($userip);
   $country = country_name($cc);
   $fimg = show_flag($cc);
 echo "<b>Country:</b>".$country."$fimg<br/>";
echo isp($userip)."<br/>";
}else{
echo "<br/>";

}



 $red = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_red WHERE uid='".$who."'"));
if($red[0]==0){
echo"<font color=\"green\"><b>Green Light User</b></font><br/>";
}else{
echo"<font color=\"red\"><b>Red Light User</b></font><br/>";
}


///////////////////////////////////////////
echo "<b>Back To:</b><a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$who\">".getnick_uid($who)." Profile</a><br/><b>Back To:</b><a href=\"?action=panel&amp;sid=$sid\">Premium Panel</a><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a>";
        echo "</p>";
  echo xhtmlfoot();
}


////////////////////////////////////////////////////////////////////////////	

else if($action=="getprem")
{ $pstyle = gettheme($sid);
      echo xhtmlhead("View Profile",$pstyle);
addonline(getuid_sid($sid),"Profil","");


///////////////////////////////////////////
echo "<b>Back To:</b><a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$who\">".getnick_uid($who)." Profile</a><br/><b>Back To:</b><a href=\"?action=panel&amp;sid=$sid\">Premium Panel</a><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a>";
        echo "</p>";
  echo xhtmlfoot();
}

?>