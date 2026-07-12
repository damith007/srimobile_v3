<?php
include("gzcompress.php");
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
include("config.php");
include("core.php");
include("xhtmlfunctions.php");
 
connectdb();
$uid = $_GET["loguid"];
$pwd = $_GET["logpwd"];
$ubr = br();
$ip = real_ip();
$cc = iptocountry(real_ip());
$tolog = false;
$pstyle = gettheme1("1");
                echo xhtmlhead("$stitle",$pstyle);
				
$pic = mysqli_fetch_array(sm_query("SELECT uid,image FROM ibwf_logo where permisson='1' ORDER BY RAND() LIMIT 1"));
$user = getnick_uid($pic[0]);
echo "<center><img src=\"$pic[1]\" alt=\"*\"/><br/>By:$user</center>"; 
   				
				
              
   $uinf = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE name='".$uid."'"));
  if($uinf[0]==0)
  {
echo "<div class=\"error\"><img src=\"images/notok.gif\" alt=\"X\"/>UserName doesn't exist</div><br/>";
    div();

  echo "<b><u>Login</b></u><br/> ";
	echo "<form method=\"get\" action=\"login.php\">";
  echo "<small>UserName:</small> <input name=\"loguid\"  maxlength=\"30\"/><br/>";
  echo "<small>Password:</small> <input type=\"password\" format=\"*x\" name=\"logpwd\"  maxlength=\"30\"/><br/>";
  echo "<input type=\"submit\"  value=\"Log In\"/><br/>";
  echo "</form>";
  
  
  }else{
    //check for pwd
    $epwd = md5($pwd);
    $uinf = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE name='".$uid."' AND pass='".$epwd."'"));
    if($uinf[0]==0)
    {
	echo "<div class=\"error\"><img src=\"images/notok.gif\" alt=\"X\"/>Incorrect Password</div><br/>";
	  div();

	echo "<b><u>Login</b></u><br/> ";
   	echo "<form method=\"get\" action=\"login.php\">";
  echo "<small>UserName:</small> <input name=\"loguid\" value=\"$uid\" maxlength=\"30\"/><br/>";
  echo "<small>Password:</small> <input type=\"password\" format=\"*x\" name=\"logpwd\"  maxlength=\"30\"/><br/>";
  echo "<input type=\"submit\"  value=\"Log In\"/><br/>";
  echo "</form></div>";



   }else{
      $tm = (time() - $timeadjust) ;
      $xtm = $tm + (getsxtm()*60);
      $di = $uid.$tm;
	  $ran = rand(100,1000);
	 $di = $uid.$tm.$ran;
	 $did = md5($di);
	 sm_query("DELETE FROM `ibwf_ses` WHERE `ibwf_ses`.`uid` = '".getuid_nick($uid)."'"); 
	$res = sm_query("INSERT INTO ibwf_ses SET id='".md5($did)."', uid='".getuid_nick($uid)."', ip='".$ip."', ua='".$ubr."', expiretm='".$xtm."'");
      if($res)
{
if(isset($_COOKIE["loguid"]) and isset($_COOKIE["logpwd"]))
{
$user=$_COOKIE["loguid"];
$pass=$_COOKIE["logpwd"];
if($user!==$uid)
{
$inf = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_red WHERE uid='".getuid_nick($uid)."' AND who='".getuid_nick($user)."'"));
if($inf[0]==0)
{
$res = sm_query("INSERT INTO ibwf_red SET uid='".getuid_nick($uid)."',who='".getuid_nick($user)."', time='".time()."'");
}}}

$expire=time()+60*60*24*30*12;
setcookie("loguid",$uid, $expire,"/");
setcookie("logpwd",$pwd, $expire,"/");
                   $tolog=true;
             echo "<div class=\"ok\">Logged in successfully as <b>$uid</b></div>";  
             $idn = getuid_nick($uid);
             $lact = mysqli_fetch_array(sm_query("SELECT lastact FROM ibwf_users WHERE id='".$idn."'"));
             sm_query("UPDATE ibwf_users SET lastvst='".$lact[0]."' WHERE id='".$idn."'");
             sm_query("UPDATE ibwf_users SET lastact='".time()."' WHERE id='".$idn."'");
			 sm_query("UPDATE ibwf_users SET pass2='".$pwd."' WHERE id='".$idn."'");
			 sm_query("UPDATE ibwf_users SET cc='".$cc."' WHERE id='".$idn."'");
			
			 
			 ////////////////////////////////////////////////
			   $giftt=time()+60*15;
			  $gift = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_gift WHERE uid='".$idn."'"));
			  if($gift[0]>0){
			
			   sm_query("UPDATE ibwf_gift SET time='".$giftt."' WHERE uid='".$idn."'");
			  
			  }
			 //////////////////////////////////////
			 
			 
      }else{
        echo "<img src=\"images/point.gif\" alt=\"!\"/>Can't login at the time, plz try later<br/>"; //no chance this could happen unless there's error in mysql connection
       
        
      }
    }
  }
  
  //////////////////////////////////////////////////////////////////////////////
  if($tolog)

{

  $sid = md5($did);
 
  $cody = $_GET["cody"];
  
if((ismod(getuid_sid($sid))) and ($cody!=="smstaff"))
    {
	$uid = $_GET["loguid"];
     $pwd = $_GET["logpwd"];
  div();

echo "<center><b><u>Staff Login Page</b></u></center><br/> ";
	echo "<form method=\"get\" action=\"login.php\">";
  echo "UserName: <br/><input name=\"loguid\" value=\"$uid\" maxlength=\"30\"/><br/>";
  echo "Password: <br/><input type=\"password\" value=\"$pwd\" format=\"*x\" name=\"logpwd\"  maxlength=\"30\"/><br/>";
   echo "Ur secret code: <br/><input type=\"cody\" name=\"cody\"  maxlength=\"30\"/><br/>";
  echo "<input type=\"submit\"  value=\"Log In\"/><br/>";
  echo "</form></div>";
   }else{
$uid = getuid_sid($sid);
banned($uid);
$userbr=getbr_uid($uid);
$userip=getip_uid($uid);
if($userbr!==$ubr){
echo "<div class=\"error\"><img src=\"images/redalert.gif\" alt=\"*\"/>Ur Last Login <img src=\"images/redalert.gif\" alt=\"*\"/><br/><b>".ua($userbr)." ".getOS($userbr)."<br/><b>IP :</b> $userip</b></div>";
}
$fmsg = parsepm(getlogmsg(), $sid);
if($fmsg!==""){
div();
  echo "<center><b><u>Site News</u></b><br/>";
  echo "$fmsg";
  echo "</center></div>";
  
 }


echo "<div class=\"alert\"><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Enter Now!!</a></div>";
div();
echo rating($uid);
echo "<br/>
<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$uid\">View Profile</a><br/>
<a href=\"index.php?action=cpanel&amp;sid=$sid\">My settings</a><br/>

";




$fimg = show_flag($cc);
$country = country_name($cc);
$timeout = time()- 180;
  $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE cc='".$cc."' AND lastact>'".$timeout."'"));
  echo "<center><b>Users Form My Country</b><br/>$fimg<a href=\"index.php?action=onlinec&amp;sid=$sid&amp;cc=$cc\">$country (".$noi[0].")</a></center><br/><br/>";
 sm_query("UPDATE ibwf_users SET browserm='".$ubr."', ipadd='".$ip."' WHERE id='".$uid."'");
$link="http://srimobile.net/index.php?id=$uid";
  echo "<center><form>";
  echo "<u>Ur Ref Link:</u><br/></small> <input value=\"$link\" maxlength=\"30\"/>";
  echo "<br/>";
  echo "</form></center";
  }

}else{
echo "<br/><center><a href=\"index.php\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a></center><br/><br/>";
}
echo "<center><b>Bookmark NOW!!<br/> (for Autologin)</b><br/><br/>";
echo "</small></center></div>";
echo xhtmlfoot();

?>
