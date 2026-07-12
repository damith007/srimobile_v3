<?php
////////////////ua////////////////////
include('core/agent.php');
error_reporting(0);
/////////////////////////////////
function sm_query($sql)
{
$rsql = mysqli_query($GLOBALS['condb'],$sql);
return $rsql;
}
///////////////////////////////////////////
function sm_clean($sql)
{
$csql = mysqli_real_escape_string($GLOBALS['condb'],$sql);
return $csql;
}

function connectdb()
{
//////////////////////connet db/////////////////////////////
   

if (!$GLOBALS['condb']){

    $pstyle = gettheme1("1");echo xhtmlhead("SriMobile (ERROR!)",$pstyle);echo "<p align=\"center\">";echo "<img src=\"images/exit.gif\" alt=\"*\"/><br/>";echo "<b><u>ERROR! cannot connect to database</b></u><br/><br/>";
    echo "This error happens the site database, please be patient, The site will be up any minute<br/><br/>";
    echo "<b>THANK YOU VERY MUCH</b>";echo "</p>";echo xhtmlfoot(); exit();
	}else{

/////////////////////////////////////////////
cleardata();$ubr = br();$uip = getip();
/////////////////////////////////////
if(isipbanned($uip,$ubr))
{$pstyle = gettheme1("1");echo xhtmlhead("IP address is blocked",$pstyle);echo "<p align=\"center\">";echo "<img src=\"images/notok.gif\" alt=\"x\"/><br/>";echo "<b><u>This IP address is blocked/<b></u><br/>";echo "<br/>";
     $banto = mysqli_fetch_array(sm_query("SELECT  timeto FROM ibwf_penalties WHERE  penalty='2' AND ipadd='".$uip."' AND browserm='".$ubr."' LIMIT 1 "));
	 $remain =  $banto[0] - time() ;
      $rmsg = gettimemsg($remain);
      echo "Time to unblock the IP: $rmsg<br/><br/>";
      echo "</p>";
      echo xhtmlfoot();
      exit();
}
}   
}




//////////////////
function cashtime($time){
$thisyear=date("Y");
$thismonth=date("m");
$thisday=date("d");
$ysterday=date("d",strtotime("-1 days"));
$ystermonth=date("m",strtotime("-1 days"));

////////////////////////////////
$enteryear=date("Y",$time);
$entermonth=date("m",$time);
$enterday=date("d",$time);


 if($thisyear!==$enteryear)
{
$year=date('Y M d -h:i A',$time);
 return $year;
}

else if(($ysterday==$enterday)and($ystermonth==$entermonth)){

$day=date ('h:i A',$time);
$day="Yesterday@".$day;
 return $day;
}


else if($thismonth!==$entermonth){
$month=date ('M d- h:i A',$time);
 return $month;
}

else if($thisday!==$enterday){

$day=date ('D- h:i A',$time);
 return $day;
}
else{
$loltime=date ('h:i A',$time);
$loltime="Today@".$loltime;
 return $loltime;
}

}
//////////////////////////////////////////////////
function timeleft($theTime){
$now = strtotime("now");
$timeLeft = $theTime - $now;
if($timeLeft > 0)
{
$days = floor($timeLeft/60/60/24);
$hours = $timeLeft/60/60%24;
$mins = $timeLeft/60%60;
$secs = $timeLeft%60;
if($days)
{
$theText = $days . " Day(s)";
if($hours)
{
$theText .= ", " .$hours . " Hour(s) ";
}}elseif($hours)
{$theText = $hours . " Hour(s)";
if($mins)
{$theText .= ", " .$mins . " Minute(s) ";}}
elseif($mins)
{$theText = $mins . " Minute(s)";
if($secs)
{$theText .= ", " .$secs . " Second(s) ";}}
elseif($secs)
{$theText = $secs . " Second(s)";}}
else{$theText = "";}

return $theText;
}




function timeremain($secs)
{
$mins=floor(($secs)/60);
$hours=floor(($mins)/60);
$days=floor(($hours)/24);
$weeks=floor(($days)/7);
if($secs>59)$secs=$secs-($mins*60);
if($mins>59)$mins=$mins-($hours*60);
if($hours>23)$hours=$hours-($days*24);
if($days>6)$days=$days-($weeks*7);
$msg="";
if($weeks>0)$msg.=$weeks." Weeks";
if($weeks>1)$msg.="";
if($weeks>0&&$days>0)$msg.=", ";
if($days>0)$msg.=$days." Days";
if($days>1)$msg.="";
if(($days>0||$weeks>0)&&$hours>0)$msg.=", ";
if($hours>0)$msg.=$hours." Hours";
if($hours>1)$msg.="";
if(($hours>0||$days>0)&&$mins>0)$msg.=", ";
if($mins>0)$msg.=$mins." mins";
if($mins>1)$msg.="";
if($mins>0&&$secs>0)$msg.=" ses  ";
if($secs>0)$msg.=$secs." sec";
if($secs>1)$msg.="";
if(!$secs&&!$mins&&!$hours&&!$days)$msg="0 ses";
return $msg;
}
///////////////////////////////////////////////////
////////////////////////////////////
function iptocountry($ip) {
    $numbers = preg_split( "/\./", $ip);
    include(@dirname(__FILE__)."/core/ip_files/".$numbers[0].".php");
    $code=($numbers[0] * 16777216) + ($numbers[1] * 65536) + ($numbers[2] * 256) + ($numbers[3]);
    foreach($ranges as $key => $value){
        if($key<=$code){
            if($ranges[$key][0]>=$code){$two_letter_country_code=$ranges[$key][1];break;}
            }
    }
    if ($two_letter_country_code==""){$two_letter_country_code="ZZ";}
    return $two_letter_country_code;
}
function country_name($two_letter_country_code)
    {
     include(@dirname(__FILE__)."/core/ip_files/countries.php");
    $country_name=$countries[$two_letter_country_code][1];
   return $country_name;
    }
function show_flag($two_letter_country_code)
      {
     $file_to_check='images/flags/'.$two_letter_country_code.'.gif';
     if (file_exists($file_to_check)){
                $FLAG= '<img src="'.$file_to_check.'" alt="'.$two_letter_country_code.'"/>';
                }else{
                $FLAG= '<img src="images/flags/ZZ.png" alt="'.$two_letter_country_code.'"/>';
                }
       return $FLAG;
       }
	   
/////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////	   
 function modlog($action,$msg){
 sm_query("INSERT INTO ibwf_mlog SET action='".$action."', details='".$msg."', actdt='".time()."'");
}





function isnum($string) 
{
 $string = preg_replace(array('/[^0-9]/'),array('', '', ''),$string);
 $string = $string; 
return $string;
 }

 /////////////////////////////////////////////////////////////////////////////////////////////
 
function isclean($str) 
{
 
$str = trim(strip_tags(htmlspecialchars(htmlentities($str,ENT_QUOTES,'UTF-8'))));      
    return $str; 
 }
//////////////////div/////////////////////////////////
function divok()
{echo"<div class=\"ok\">";}
function div()
{echo"<div class=\"mblock1\">";}

function dival()
{echo"<div class=\"alert\">";}

function diver()
{echo"<div class=\"error\">";}
/////////////////////////////////////
function mylog($sid)
{

    $uid = getuid_sid($sid);
    if((islogged($sid)==false)||($uid==0))
    {
      $pstyle = gettheme("1");
      echo xhtmlhead("Login",$pstyle);
	boxstart("Login Expired");
	 div();
    echo "Your session has been expired<br/><br/>";
      echo "<form method=\"get\" action=\"login.php\">";
  echo "<img src=\"images/user.gif\" alt=\"*\"/><small>UserName:</small> <input name=\"loguid\" format=\"*x\" maxlength=\"30\"/><br/>";
  echo "<img src=\"images/pass.gif\" alt=\"*\"/><small>Password:</small> <input type=\"password\" name=\"logpwd\"  maxlength=\"30\"/><br/>";
  echo "<input type=\"submit\" value=\"Log In\"/><br/>";
  echo "</form>";
      echo "</div>";
	  echo "<img src=\"images/home.gif\" alt=\"*\"/><a href=\"index.php\">HOME</a>";
	  
  echo xhtmlfoot();
      exit();
    }
banned($uid);


}
//////////////////////////////////////////////
function banned($uid){

  if(isbanned($uid))
    {
	   $pstyle = gettheme("1");
      echo xhtmlhead("Banned",$pstyle);
	
		boxstart("Banned"); div();
      echo "<center>";
      echo "<img src=\"images/notok.gif\" alt=\"x\"/><br/>";
      echo "You are <b>Banned</b><br/>";
      $banto = mysqli_fetch_array(sm_query("SELECT timeto,exid FROM ibwf_penalties WHERE uid='".$uid."' AND penalty='1'"));
	  $banres = mysqli_fetch_array(sm_query("SELECT lastpnreas FROM ibwf_users WHERE id='".$uid."'"));
	  
      $remain = $banto[0]- (time() - $timeadjust) ;
      $rmsg = gettimemsg($remain);
      echo "Time to finish your penalty: $rmsg<br/><br/>";
	  echo "Ban by:<u>".getnick_uid($banto[1])."</u><br/>";
	  echo "Ban Reason: $banres[0]";
	  $sid = $_GET["sid"];
     echo "<br/>This May be Mistake <a href=\"help.php?action=main&amp;sid=$sid\">Help Tricket</a>";
	 
      echo "</div></center>";
  echo xhtmlfoot();
      exit();
}
}






///////////////////////////////////////////



function findcard($tcode)
{
    $st =strpos($tcode,"[card=");
    if ($st === false)
    {
      return $tcode;
    }else
    {
      $ed =strpos($tcode,"[/card]");
      if($ed=== false)
      {
        return $tcode;
      }
    }
    $texth = substr($tcode,0,$st);
    $textf = substr($tcode,$ed+7);
    $msg = substr($tcode,$st+10,$ed-$st-10);
    $cid = substr($tcode,$st+6,3);
    $words = explode(' ',$msg);
    $msg = implode('+',$words);
  return "$texth<br/><img src=\"pmcard.php?cid=$cid&amp;msg=$msg\" alt=\"$cid\"/><br/>$textf";
}
function saveuinfo($sid)
{

    $headers = apache_request_headers();
    $alli = "";
    foreach ($headers as $header => $value)
    {
        $alli .= "$header: $value <br />\n";
    }
    $alli .= "IP: ".$_SERVER['REMOTE_ADDR']."<br/>";
    $alli .= "REFERRER: ".$_SERVER['HTTP_REFERER']."<br/>";
    $alli .= "REMOTE HOST: ".getenv('REMOTE_HOST')."<br/>";
    $alli .= "PROX: ".$_SERVER['HTTP_X_FORWARDED_FOR']."<br/>";
    $alli .= "HOST: ".getenv('HTTP_X_FORWARDED_HOST')."<br/>";
    $alli .= "SERV: ".getenv('HTTP_X_FORWARDED_SERVER')."<br/>";
    if(trim($sid)!="")
    {
        $uid = getuid_sid($sid);
        $fname = "tmp/".getnick_uid($uid).".rwi";
        $out = fopen($fname,"w");
        fwrite($out,$alli);
        fclose($out);
    }

    //return 0;
}
function registerform($ef)
{
  $ue = $errl = $pe = $ce = "";
  switch($ef)
  {
    case 1:
        $errl = "<div class=\"error\"><img src=\"images/point.gif\" alt=\"!\"/> Please type your  Nick";
        $ue = "</div>";
        break;
  case 2:
  $errl = "<div class=\"error\"><img src=\"images/point.gif\" alt=\"!\"/> Please type your password";
    $pe = "</div>";
     break;
 case 3:
    $errl = "<div class=\"error\"><img src=\"images/point.gif\" alt=\"!\"/> Please type your password again";
        $ce = "</div>";
        break;
    case 4:
        $errl = "<div class=\"error\"><img src=\"images/point.gif\" alt=\"!\"/> User Nick is invalid";
        $ue = "</div>";
        break;
    case 5:
        $errl = "<div class=\"error\"><img src=\"images/point.gif\" alt=\"!\"/> Password is invalid";
        $pe = "</div>";
        break;
    case 6:
        $errl = "<div class=\"error\"><img src=\"images/point.gif\" alt=\"!\"/> Passwords doesn't match";
        $ce = "</div>";
        break;
    case 7:
        $errl = "<div class=\"error\"><img src=\"images/point.gif\" alt=\"!\"/> Ur Nick must be 4 characters or more";
        $ue = "</div>";
        break;
    case 8:
        $errl = "<div class=\"error\"><img src=\"images/point.gif\" alt=\"!\"/> Password must be 4 characters or more";
        $pe = "</div>";
        break;
    case 9:
    $errl = "<div class=\"error\"><img src=\"images/point.gif\" alt=\"!\"/> your Nick already in use, choose a different one";
        $ue = "</div>";
        break;
    case 10:
        $errl = "<div class=\"error\"><img src=\"images/point.gif\" alt=\"!\"/> Unknown mysql error try registering later";

        break;
    case 11:
     $errl = "<div class=\"error\"><img src=\"images/point.gif\" alt=\"!\"/> User Nick must start with a letter from a-z";
        $ue = "</div>";
        break;
    case 12:
     $errl = "<div class=\"error\"><img src=\"images/point.gif\" alt=\"!\"/> User Nick is reserved for admins of the site";
        $ue = "</div>";
        break;
    case 13:
        $errl = "<div class=\"error\"><img src=\"images/point.gif\" alt=\"!\"/> Please choose an appropriate nickname";
  $ue = "</div>";
         break;  
		 
		 case 14:
        $errl = "<div class=\"error\"><img src=\"images/point.gif\" alt=\"!\"/> User Name and Password Cannot Same";
  $ue = "</div>";
         break;  
		 
		 
		 
 }
 $id= isnum($_GET["id"]);
$rform = "<small>$errl</small>$ue $pe $ce<br/><div class=\"mblock1\">";
  $rform .= "<form action=\"register.php?action=register&amp;id=$id\" method=\"post\">";
  $rform .= "<u>UserName: </u><br/><input name=\"uid\" maxlength=\"15\" format=\"*x\" maxlength=\"30\"/><br/>";
  $rform .= "<u>Password: </u><br/><input type=\"password\" name=\"pwd\" format=\"*x\" maxlength=\"30\"/><br/>";
  $rform .= "<u>Password Again : </u><br/><input type=\"password\" name=\"cpw\" format=\"*x\" maxlength=\"30\"/><br/>";
  $rform .= "<u>Birthday :</u><br/>";

  $date=date("Y")-10;
   $date2=date("Y")-30;

    $rform .= "<select name=\"bdyy\">";for($i=$date2;$i<=$date;$i++){$rform .= "<option value=\"$i\">$i</option>";}$rform .= "</select>";
   $rform .= "-<select name=\"bdym\">"; for($i=1;$i<=12;$i++){$rform .= "<option value=\"$i\">$i</option>";}$rform .= "</select>";
    $rform .= "-<select name=\"bdyd\">";for($i=1;$i<=30;$i++){$rform .= "<option value=\"$i\">$i</option>";}$rform .= "</select><br/>";

 $rform .= "<u>Sex:</u><br/>";
 $rform .= "<input type=\"radio\" name=\"usx\" value=\"M\" /> Male<br />
            <input type=\"radio\" name=\"usx\" value=\"F\" /> Female<br />";

  $rform .= "<u>Location[City]:</u><br/><input name=\"ulc\"  maxlength=\"100\"/><br/>";

    $rform .= "<u>Site Language:</u><br/>";
 $rform .= "<select name=\"lang\" value=\"1\">";
  $rform .= "<option value=\"1\">English</option>";
  $rform .= "<option value=\"2\">Sinhala</option>";
$rform .= "</select><br/>";

  $rform .= "<input type=\"submit\" value=\"Register\"/>";
  $rform .= "</form></div>";
 
  return $rform;
}
//////////////////////////////////////////// Search Id
function generate_srid($svar1,$svar2="", $svar3="", $svar4="", $svar5="")
{

  $res = mysqli_fetch_array(sm_query("SELECT id FROM ibwf_search WHERE svar1 like '".$svar1."' AND svar2 like '".$svar2."' AND svar3 like '".$svar3."' AND svar4 like '".$svar4."' AND svar5 like '".$svar5."'"));
  if($res[0]>0)
  {
    return $res[0];
  }
  $ttime = (time() + $timeadjust);
  sm_query("INSERT INTO ibwf_search SET svar1='".$svar1."', svar2='".$svar2."', svar3='".$svar3."', svar4='".$svar4."', svar5='".$svar5."', stime='".$ttime."'");
  $res = mysqli_fetch_array(sm_query("SELECT id FROM ibwf_search WHERE svar1 like '".$svar1."' AND svar2 like '".$svar2."' AND svar3 like '".$svar3."' AND svar4 like '".$svar4."' AND svar5 like '".$svar5."'"));
  return $res[0];
}

function candelvl($uid, $item)
{
  $candoit = mysqli_fetch_array(sm_query("SELECT  uid FROM ibwf_vault WHERE id='".$item."'"));
  if($uid==$candoit[0]||ismod($uid))
  {
    return true;
  }
  return false;
}

/////////////////////////////////// GET RATE

function geturate($uid)
{
  $pnts = 0;
  //by blogs, posts per day, chats per day, gb signatures
  if(ismod($uid))
  {
    return 5;
  }
  $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_blogs WHERE bowner='".$uid."'"));
  if($noi[0]>=5)
  {
    $pnts = 5;
  }else{
    $pnts = $noi[0];
  }
  $noi = mysqli_fetch_array(sm_query("SELECT regdate, plusses, chmsgs FROM ibwf_users WHERE id='".$uid."'"));
  $rwage = ceil(((time() + $timeadjust)- $noi[0])/(24*60*60) );
  $ppd = ceil($noi[1]/$rwage);
  if($ppd>=20)
  {
    $pnts+=5;
  }else{
    $pnts += floor($ppd/4);
  }
  $cpd = ceil($noi[2]/$rwage);
  if($cpd>=100)
  {
    $pnts+=5;
  }else{
    $pnts += floor($cpd/20);
  }
  return floor($pnts/3);



}
///////////////////////////////////function isuser

function isuser($uid)
{
  $cus = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE id='".$uid."'"));
  if($cus[0]>0)
  {
    return true;
  }
  return false;
}
////////////////////////////////////////////Spam filter

function isenta($text)
{
  $sfil[0] = "enttt";

  $text = str_replace(" ", "", $text);
  $text = strtolower($text);
  for($i=0;$i<count($sfil);$i++)
  {

    $nosf = substr_count($text,$sfil[$i]);
    if($nosf>0)
    {
      return true;
    }
  }

  return false;
}
////////////////////////////////////////////Can access forum

function canaccess($uid, $fid)
{
  $fex = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_forums WHERE id='".$fid."'"));
  if($fex[0]==0)
  {
    return false;
  }
  $persc = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_acc WHERE fid='".$fid."'"));
  if($persc[0]==0)
  {
    $clid = mysqli_fetch_array(sm_query("SELECT clubid FROM ibwf_forums WHERE id='".$fid."'"));
    if($clid[0]==0)
    {
      return true;
    }else{
      if(ismod($uid))
      {
        return true;
      }else{
        $ismm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubmembers WHERE uid='".$uid."' AND clid='".$clid[0]."' AND accepted='1'"));
        if($ismm[0]>0)
        {
          return true;
        }else{
          return false;
        }
      }
    }

  }else{
    $gid = mysqli_fetch_array(sm_query("SELECT gid FROM ibwf_acc WHERE fid='".$fid."'"));
    $gid = $gid[0];
    $ginfo = mysqli_fetch_array(sm_query("SELECT autoass, mage, userst, posts, plusses FROM ibwf_groups WHERE id='".$gid."'"));
    if($ginfo[0]=="1")
    {
      $uperms = mysqli_fetch_array(sm_query("SELECT birthday, perm, posts, plusses FROM ibwf_users WHERE id='".$uid."'"));

      if($ginfo[2]==4)
      {

        if(isowner($uid))
        {
            return true;
        }else{
          return false;
        }
      }
      if($ginfo[2]==3)
      {

        if(isheadadmin($uid))
        {
            return true;
        }else{
          return false;
        }
      }
      if($ginfo[2]==2)
      {

        if(isadmin($uid))
        {
            return true;
        }else{
          return false;
        }
      }

      if($ginfo[2]==1)
      {

        if(ismod($uid))
        {
            return true;
        }else{
          return false;
        }
      }
      if($uperms[1]>$ginfo[2])
      {
        return true;
      }
      $acc = true;
      if(getage($uperms[0])< $ginfo[1])
      {
        $acc =  false;
      }
      if($uperms[2]<$ginfo[3])
      {
        $acc =  false;
      }
      if($uperms[3]<$ginfo[4])
      {
        $acc =  false;
      }

    }
  }
  return $acc;
}

function unhtmlspecialchars2( $string )
{
  $string = str_replace ( '&amp;', '&', $string );
  $string = str_replace ( '&#039;', '\'', $string );
  $string = str_replace ( '&quot;', '"', $string );
  $string = str_replace ( '&lt;', '<', $string );
  $string = str_replace ( '&gt;', '>', $string );
  $string = str_replace ( '&uuml;', '?', $string );
  $string = str_replace ( '&Uuml;', '?', $string );
  $string = str_replace ( '&auml;', '?', $string );
  $string = str_replace ( '&Auml;', '?', $string );
  $string = str_replace ( '&ouml;', '?', $string );
  $string = str_replace ( '&Ouml;', '?', $string );
  return $string;
}

function getuage_sid($sid)
{
  $uid = getuid_sid($sid);
  $uage = mysqli_fetch_array(sm_query("SELECT birthday FROM ibwf_users WHERE id='".$uid."'"));
  return getage($uage[0]);
}

function canenter($rid, $sid)
{
    $rperm = mysqli_fetch_array(sm_query("SELECT mage, perms, chposts, clubid FROM ibwf_rooms WHERE id='".$rid."'"));
    $uperm = mysqli_fetch_array(sm_query("SELECT birthday, chmsgs FROM ibwf_users WHERE id='".getuid_sid($sid)."'"));
    if($rperm[3]!=0)
    {
      if(ismod(getuid_sid($sid)))
      {
        return true;
      }else{
        $ismm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubmembers WHERE uid='".getuid_sid($sid)."' AND clid='".$rperm[3]."'"));
        if($ismm[0]>0)
        {
          return true;
        }else{
          return false;
        }
      }
   }
    if($rperm[1]==1)
    {
      return ismod(getuid_sid($sid));
    }
    if($rperm[1]==2)
    {
      return isadmin(getuid_sid($sid));
    }
     if($rperm[1]==3)
    {
      return isheadadmin(getuid_sid($sid));
    }
    if($rperm[1]==4)
    {
      return isowner(getuid_sid($sid));
    }

    if(getuage_sid($sid)<$rperm[0])
    {
      return false;
    }
    if($uperm[1]<$rperm[2])
    {
      return false;
    }
    return true;
}
///////////////////clear data


function cleardata()
{


$now=time();
$start=date("Y-m-d")." 12:00:00";
$end=date("Y-m-d")." 12:01:00";
$tstamp1=strtotime($start);
$tstamp2=strtotime($end);
if($now>$tstamp1 && $now<$tstamp2)
{

$sql = 'UPDATE `ibwf_users` SET `bank` = `bank` * 1.01 WHERE `bank` > 100';
 sm_query($sql);
}







 $today = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='today'"));
 $tod = date("Y-m-d");
if($tod!==$today[0]){
sm_query("TRUNCATE `ibwf_maxchat`");
 $rooms = sm_query("SELECT uid, time FROM ibwf_premium WHERE time>'".time()."' AND c='0'");
  while ($pruim=mysqli_fetch_array($rooms))
  {
    $puid=$pruim[0];
	$ptime=$pruim[1];
	$ptim=$ptime-time();
	  $ds = floor($ptim/60/60/24);
  if($ds<6)
  {
 $msg = "U Have Only 1 week For Premium.Upgrade ur Premium as soon as.";
		autopm($msg,$puid);  
	  sm_query("UPDATE ibwf_users SET specialid='0' WHERE id='".$puid."'");	
  sm_query("UPDATE ibwf_premium SET c='1' WHERE uid='".$puid."'");
  }
	

}


$rooms = sm_query("SELECT uid FROM ibwf_premium WHERE time<'".time()."' AND c='1'");
  while ($pruim=mysqli_fetch_array($rooms))
  {
    $puid=$pruim[0];


 $msg = "Ur Premium was Expried.Renew ur Premium as soon as.";
		autopm($msg,$puid);  

  $exec = sm_query("DELETE FROM ibwf_premium WHERE uid='".$puid."'");
	

}



////////////////////////////////////////////////


sm_query("UPDATE `ibwf_settings` SET `value` = '".$tod."' WHERE `ibwf_settings`.`name` ='today'");
}

/////////////////////////////////////////////////////////////////////////////
///
 /////////////////////////////////////////////////////

  $timeto = 120;
  $timenw = time();
  $timeout = $timenw - $timeto;
  $exec = sm_query("DELETE FROM ibwf_chonline WHERE lton<'".$timeout."'");
  $timeto = 300;
  $timenw = time();
  $timeout = $timenw - $timeto;
  $exec = sm_query("DELETE FROM ibwf_chat WHERE timesent<'".$timeout."'");
  $timeto = 60*60;
  

  
  $timeout = $timenw - $timeto;
  $exec = sm_query("DELETE FROM ibwf_search WHERE stime<'".$timeout."'");
 
  ///delete expired rooms
  $timeto = 5*60;

  $timeout = $timenw - $timeto;
  $rooms = sm_query("SELECT id FROM ibwf_rooms WHERE static='0' AND lastmsg<'".$timeout."'");
  while ($room=mysqli_fetch_array($rooms))
  {
    $ppl = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_chonline WHERE rid='".$room[0]."'"));
    if($ppl[0]==0)
    {
        $exec = sm_query("DELETE FROM ibwf_rooms WHERE id='".$room[0]."'");
    }
  }
  $lbpm = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='lastbpm'"));
  $td = date("Y-m-d");
  //echo $lbpm[0];

  if ($td!=$lbpm[0])
  {
	//echo "boo";
	$sql = "SELECT id, name, birthday  FROM ibwf_users where month(`birthday`) = month(curdate()) and dayofmonth(`birthday`) = dayofmonth(curdate())";
	$ppl = sm_query($sql);
	while($mem = mysqli_fetch_array($ppl))
	{
		$msg = "Srimobile Team wish you a day full of joy and happiness and many happy returns[br/]";
		autopm($msg, $mem[0]);
	}
	sm_query("UPDATE ibwf_settings SET value='".$td."' WHERE name='lastbpm'");
  }
///////////////////////////////////////////////////////////////////////////////////////////////



/////////////////////////////////////////

/////////////////////////////////////////////



}
///////////////////////////////////////get file ext.

function getext($strfnm)
{
  $str = trim($strfnm);
  if (strlen($str)<4){
    return $str;
  }
  for($i=strlen($str);$i>0;$i--)
  {
    $ext .= substr($str,$i,1);
    if(strlen($ext)==3)
    {
      $ext = strrev($ext);
      return $ext;
    }
  }
}

///////////////////////////////////////get extension icon

function getextimg($ext)
{
    $ext = strtolower($ext);
    switch ($ext)
    {
      case "jpg":
      case "gif":
      case "png":
      case "bmp":
        return "<img src=\"images/image.gif\" alt=\"*\"/>";
        break;
      case "zip":
      case "rar":
        return "<img src=\"images/pack.gif\" alt=\"*\"/>";
        break;
      case "jad":
      case "jar":
        return "<img src=\"images/game.gif\" alt=\"*\"/>";
        break;
      case "amr":
      case "wav":
      case "mp3":
        return "<img src=\"images/music.gif\" alt=\"*\"/>";
        break;
      case "mpg":
      case "3gp":
	   case "mp4":
        return "<img src=\"images/video.gif\" alt=\"*\"/>";
        break;
      default:
        return "<img src=\"images/other.gif\" alt=\"*\"/>";
        break;
    }
}


//////////////////////////////////////RESIZE IMAGE
function imageResize($width, $height, $target) {

//takes the larger size of the width and height and applies the
//formula accordingly...this is so this script will work
//dynamically with any size image


$percentage = ($target / $width);


//gets the new value and applies the percentage, then rounds the value
$width = round($width * $percentage);
$height = round($height * $percentage);

//returns the new sizes in html image tag format...this is so you
//can plug this function inside an image tag and just get the

return "width=\"$width\" height=\"$height\"";

}

///////////////////////////////////////Add to chat

function addtochat($uid, $rid)
{
  $timeto = 220;
  $timenw = (time() + $timeadjust);
  $timeout = $timenw - $timeto;
  $exec = sm_query("DELETE FROM ibwf_chonline WHERE lton<'".$timeout."'");
  $ttime = (time() + $timeadjust);

  $ghost = mysqli_fetch_array(sm_query("SELECT ghost FROM ibwf_users WHERE id='".$uid."'"));
  if($ghost[0]==0){
 $text = "[clr=red][i][b]".getname_uid($uid)." ".strip_tags(getstatus($uid))." [/b][/i][i] Entered Chat Room [/i][/clr][br/]"; 
   $onlinecount = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_chonline WHERE rid='".$rid."' and uid='".$uid."'"));
if($onlinecount[0]=="0")
{
$chmsg = sm_query("SELECT msgtext FROM ibwf_chat WHERE rid='".$rid."' and who='0'");
if($chmsg[0]==$text)
  {
}else{
  $enter = sm_query("INSERT INTO ibwf_chat SET  chatter='0', who='0', timesent='".time()."', msgtext='".$text."', rid='".$rid."'");
}
}

}
   $res = sm_query("INSERT INTO ibwf_chonline SET lton='".$ttime."', uid='".$uid."', rid='".$rid."'");
  if(!$res)
  {
    $ttime = (time() + $timeadjust);
    sm_query("UPDATE ibwf_chonline SET lton='".$ttime."', rid='".$rid."' WHERE uid='".$uid."'");
  } 
  
}
////////////////////////////////////////////is mod

function ischatmod($uid)
{

 $perm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_judges WHERE uid='".$uid."'"));
  if($perm[0]>0)
  {
    return true;
  }
}
/////////////////////////////////
function ismod($uid)
{
  $perm = mysqli_fetch_array(sm_query("SELECT perm FROM ibwf_users WHERE id='".$uid."'"));

  if($perm[0]>0)
  {
    return true;
  }
}

function getstatusimg($uid)
{
  $info= mysqli_fetch_array(sm_query("SELECT perm, plusses FROM ibwf_users WHERE id='".$uid."'"));
  if(isbanned($uid))
  {
    return "<img src=\"images/banned.gif\" alt=\"\"/>";
  }
  if($info[0]=='4')
  {
    return "<img src=\"images/owner.jpg\" alt=\"\"/>";
  }else if($info[0]=='3')
  {
    return "<img src=\"images/hadmin.jpg\" alt=\"\"/>";
  }else if($info[0]=='2')
  {
    return "<img src=\"images/admin.jpg\" alt=\"\"/>";
  }else if($info[0]=='1')
  {
    return "<img src=\"images/mod.jpg\" alt=\"\"/>";
  }
}

///////////////////////////if registration is allowed

function cancre()
{
   $getreg = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='cc'"));
   if($getreg[0]=='1')
   {
     return true;
   }else
   {
     return false;
   }
}
////////////////////////////////////////////is mod

function ismod2($uid)
{
  $perm = mysqli_fetch_array(sm_query("SELECT perm FROM ibwf_users WHERE id='".$uid."'"));

  if($perm[0]==1)
  {
    return true;
  }
}

////////////////////////////////////////////is mod

function candelgb($uid,$mid)
{
  $minfo = mysqli_fetch_array(sm_query("SELECT gbowner, gbsigner FROM ibwf_gbook WHERE id='".$mid."'"));
  if($minfo[0]==$uid)
  {
    return true;
  }
  if($minfo[1]==$uid)
  {
    return true;
  }
  return false;
}

////////////////////////////////////////////Spam filter

function isspam($text)
{
  $sfil[0] = "www.";
  $sfil[1] = "http:";
 $sfil[2] = ".php";
 $sfil[3] = "i am a hacker";
  $text = str_replace(" ", "", $text);
  $text = strtolower($text);
  for($i=0;$i<count($sfil);$i++)
  {

    $nosf = substr_count($text,$sfil[$i]);
    if($nosf>0)
    {
      return true;
    }
  }

  return false;
}





//////////////////////////////////////////verbals(add more yours)
function uverbs($no)
{
		if($no==0)
			$utext = "Slapped<br/> and fell down...";
		else if($no==1)
			$utext = "Punched with kili Kili Shot...";
		else if($no==2)
			$utext = "swing and Kicked....";
		else if($no==3)
			$utext = "Jumped and swing the weapon....";
		else if($no==4)
			$utext = "Feel Something Wrong. <br/> howled and jumped....";
		else
			$utext = "Punched hard. <br/> howled....";
	return $utext;
}


function check_rpg($sid)
{
	$uid = getuid_sid($sid);
	$set="0";
	$checks = mysqli_fetch_array(sm_query("SELECT code FROM ibwf_rpg WHERE uid='".$uid."'"));
	$check = $checks[0];
	if($check!="")
	$set = "1";
	if($set!="1")
	{
		$checks = mysqli_fetch_array(sm_query("SELECT code FROM ibwf_rpg WHERE who='".$uid."'"));
		$check = $checks[0];
	}
	if($check!="0")
	{
		if($set=="1")
			$counts = sm_query("SELECT who FROM ibwf_rpg WHERE code='".$check."'");
		else
			$counts = sm_query("SELECT uid FROM ibwf_rpg WHERE code='".$check."'");
	}
	if(mysqli_num_rows($counts)!= "0")
	{
		$count = mysqli_fetch_array($counts);
		echo "<br/>";
		echo getshoutbox($sid);
		echo "<br/><br/>";
		$bet = mysqli_fetch_array(sm_query("SELECT bet FROM ibwf_rpg WHERE code='".$check."'"));
		$bets = $bet[0];
		echo "Battle between ".getnick_uid($uid)." and ".getnick_uid($count[0])." with $bets Credits";

		echo "<br/><a href=\"wz.php?action=erpg&amp;sid=$sid&amp;who=$count[0]&amp;set=$uid&amp;code=$check\">I Accept the Challenge!</a><br/>";
		echo "<a href=\"wz.php?action=reject&amp;sid=$sid&amp;who=$count[0]&amp;set=$uid&amp;code=$check\">I Reject the Challenge</a><br/>";
	}
}

///////////////////////////////////get page from go

function getpage_go($go,$tid)
{
  if(trim($go)=="")return 1;
  if($go=="last")return getnumpages($tid);
  $counter=1;

  $posts = sm_query("SELECT id FROM ibwf_posts WHERE tid='".$tid."'");
  while($post=mysqli_fetch_array($posts))
  {
    $counter++;
    $postid = $post[0];
    if($postid==$go)
    {
        $tore = ceil($counter/5);
        return $tore;
    }
  }
  return 1;
}

////////////////////////////get number of topic pages

function getnumpages($tid)
{
  $nops = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_posts WHERE tid='".$tid."'"));
  $nops = $nops[0]+1; //where did the 1 come from? the topic text, duh!
  $nopg = ceil($nops/5); //5 is the posts to show in each page
  return $nopg;
}
////////////////////////////////////////////can delete a blog?

function candelbl($uid,$bid)
{
  $minfo = mysqli_fetch_array(sm_query("SELECT bowner FROM ibwf_blogs WHERE id='".$bid."'"));
  if(ismod($uid))
  {
    return true;
  }
  if($minfo[0]==$uid)
  {
    return true;
  }

  return false;
}

//////////////////////////////////////////////////RAVEBABE
function PostToHost($host, $path, $data_to_send)
{

				$result = "";
        $fp = fsockopen($host,80,$errno, $errstr, 30);
        if( $fp)
        {
            fputs($fp, "POST $path HTTP/1.0\n");
        fputs($fp, "Host: $host\n");
        fputs($fp, "Content-type: application/x-www-form-urlencoded\n");
        fputs($fp, "Content-length: " . strlen($data_to_send) . "\n");
        fputs($fp, "Connection: close\n\n");
        fputs($fp, $data_to_send);

        while(!feof($fp)) {
					$result .=  fgets($fp, 128);
        }
        fclose($fp);

        return $result;
        }


}
/////////////////////////Get user plusses

function getplusses($uid)
{
    $plus = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
    return $plus[0];
}
/////////////////////////Can uid sign who's guestbook?

function cansigngb($uid, $who)
{
  if(arebuds($uid, $who))
  {
    return true;
  }
  if($uid==$who)
  {
    return false; //imagine if someone signed his own gbook o.O
  }
  if(getplusses($uid)>=75)
  {
    return true;
  }
  return false;
}

/////////////////////////Can uid rate who's photo?

function canratephoto($uid, $who)
{
  if($uid==$who)
  {
    return false; //imagine if someone signed his own gbook o.O
  }else
  return true;
}
/////////////////////////////////////////////Are buds?

function arebuds($uid, $tid)
{
    $res = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_buddies WHERE ((uid='".$uid."' AND tid='".$tid."') OR (uid='".$tid."' AND tid='".$uid."')) AND agreed='1'"));
    if($res[0]>0)
    {
      return true;
    }
    return false;
}

//////////////////////////////////function get n. of buds

function getnbuds($uid)
{
  $notb = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_buddies WHERE (uid='".$uid."' OR tid='".$uid."') AND agreed='1'"));
  return $notb[0];
}

/////////////////////////////get no. of requists

function getnreqs($uid)
{
  $notb = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_buddies WHERE  tid='".$uid."' AND agreed='0'"));
  return $notb[0];
}


/////////////////////////////get no. of online buds

function getonbuds($uid)
{
  $counter =0;
    $buds = sm_query("SELECT uid, tid FROM ibwf_buddies WHERE (uid='".$uid."' OR tid='".$uid."') AND agreed='1'");
    while($bud=mysqli_fetch_array($buds))
    {
      if($bud[0]==$uid)
      {
        $tid = $bud[1];
      }else{
        $tid = $bud[0];
      }
      if(isonline($tid))
      {
        $counter++;
      }
    }
    return $counter;
}

/////////////////////////////////////////////Function shoutbox

function getshoutbox($sid)
{
  $shout = sm_query("SELECT shout, shouter, id,image  FROM ibwf_shouts ORDER BY shtime DESC LIMIT 2");
  while ($lshout = mysqli_fetch_array($shout))
{
  $uid=getuid_sid($sid);
  $shnick = getnick_uid($lshout[1]);
  $shbox .= "<i><a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$lshout[1]\">".$shnick."</a></i>: ";
  if($lshout[3]!==""){
  $shbox .="<a href=\"$lshout[3]\"><img src=\"$lshout[3]\" alt=\"O\"/></a><br/>";
  }
  $shbox .= parsepm($lshout[0], $sid);
  $shbox .= "<br/>";
  $likeimg="<img src=\"images/like.png\" alt=\"O\"/>";

  $slike = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_slike WHERE shid='".$lshout[2]."'"));
  if($slike[0]==0){
  $like="0";
  }else{
   $like="<a href=\"lists.php?action=slike&amp;sid=$sid&amp;shid=$lshout[2]\">$slike[0]</a>";
  }
  
  $slike = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_slike WHERE uid='".$uid."' AND shid='".$lshout[2]."'"));
if($slike[0]==0){
 $shbox .= "$likeimg <a href=\"genproc.php?action=likeshout&amp;sid=$sid&amp;shid=$lshout[2]\">Like</a> [$like]";
 }else{
 $shbox .= "$likeimg Like [$like]";
 }

 
 
 
    if (ismod(getuid_sid($sid)))
  {
    $shbox .= " <a href=\"modproc.php?action=delsh&amp;sid=$sid&amp;shid=$lshout[2]\">[x]</a>";
  }
   $shbox .= "<br/>";
  }
  $shbox .= "<img src=\"images/history.png\" alt=\"O\"/><a href=\"lists.php?action=shouts&amp;sid=$sid\">history</a> ";
  $shbox .= "<img src=\"images/shout.png\" alt=\"O\"/><a href=\"index.php?action=shout&amp;sid=$sid\">shout</a>";

  //$shbox .= "<br/>";
  return $shbox;
}
/////////////////////////////////////////////get tid frm post id

function gettid_pid($pid)
{
  $tid = mysqli_fetch_array(sm_query("SELECT tid FROM ibwf_posts WHERE id='".$pid."'"));
  return $tid[0];
}

///////////////////////////////////////////is trashed?

function istrashed($uid)
{
 $ttime = (time() + $timeadjust);
  $del = sm_query("DELETE FROM ibwf_penalties WHERE timeto<'".$ttime."'");
  $not = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_penalties WHERE uid='".$uid."' AND penalty='0'"));
  if($not[0]>0)
  {
    return true;
  }else{
    return false;
  }
}

///////////////////////////////////////////is shielded?

function isshield($uid)
{
  $not = mysqli_fetch_array(sm_query("SELECT shield FROM ibwf_users WHERE id='".$uid."'"));
  if($not[0]=='1')
  {
    return true;
  }else{
    return false;
  }
}

///////////////////////////////////////////Get IP

function getip_uid($uid)
{
  $not = mysqli_fetch_array(sm_query("SELECT ipadd FROM ibwf_users WHERE id='".$uid."'"));
  return $not[0];

}

///////////////////////////////////////////Get Browser

function getbr_uid($uid)
{
  $not = mysqli_fetch_array(sm_query("SELECT browserm FROM ibwf_users WHERE id='".$uid."'"));
  return $not[0];

}

///////////////////////////////////////////is trashed?

function isbanned($uid)
{
$ttime = time();
  $del = sm_query("DELETE FROM ibwf_penalties WHERE timeto<'".$ttime."'");
  $not = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_penalties WHERE uid='".$uid."' AND (penalty='1' OR penalty='2')"));

  if($not[0]>0)
  {
    return true;
  }else{
    return false;
  }
}


/////////////////////////////////////////////get tid frm post id

function gettname($tid)
{
  $tid = mysqli_fetch_array(sm_query("SELECT name FROM ibwf_topics WHERE id='".$tid."'"));
  return $tid[0];
}

/////////////////////////////////////////////get tid frm post id

function getfid_tid($tid)
{
  $fid = mysqli_fetch_array(sm_query("SELECT fid FROM ibwf_topics WHERE id='".$tid."'"));
  return $fid[0];
}

/////////////////////////////////////////////is ip banned

function isipbanned($ipa, $brm)
{

  $pinf = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_penalties WHERE penalty='2' AND ipadd='".$ipa."' AND browserm='".$brm."'"));
  if($pinf[0]>0)
  {
  return true;
}
return false;
}
/////////////////////////////////////////////////////////////////////



////////////////get number of pinned topics in forum

function getpinned($fid)
{
  $nop = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topics WHERE fid='".$fid."' AND pinned ='1'"));
  return $nop[0];
}

/////////////////////////////////////////////can bud?

function budres($uid, $tid)
{
  //3 = can't bud
  //2 = already buds
  //1 = request pended
  //0 = can bud
  if($uid==$tid)
  {
    return 3;
  }

  if (arebuds($uid, $tid))
  {
    return 2;
  }
  $req = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_buddies WHERE ((uid='".$uid."' AND tid='".$tid."') OR (uid='".$tid."' AND tid='".$uid."')) AND agreed='0'"));
  if($req[0]>0)
  {
    return 1;
  }
  $notb = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_buddies WHERE (uid='".$tid."' OR tid='".$tid."') AND agreed='1'"));
  global $max_buds;
  if($notb[0]>=$max_buds)
  {

    return 3;
  }
  $notb = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_buddies WHERE (uid='".$uid."' OR tid='".$uid."') AND agreed='1'"));
  global $max_buds;
  if($notb[0]>=$max_buds)
  {

    return 3;
  }
  return 0;
}
////////////////////////////////////////////Session expiry time

function getsxtm()
{
   $getdata = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='sesexp'"));
   return $getdata[0];
}

////////////////////////////////////////////Get bud msg

function getbudmsg($uid)
{
   $getdata = mysqli_fetch_array(sm_query("SELECT budmsg FROM ibwf_users WHERE id='".$uid."'"));
   return $getdata[0];
}

////////////////////////////////////////////Get forum name

function getfname($fid)
{
  $fname = mysqli_fetch_array(sm_query("SELECT name FROM ibwf_forums WHERE id='".$fid."'"));
  return $fname[0];
}
////////////////////////////////////////////PM antiflood time

function getpmaf()
{
   $getdata = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='pmaf'"));
   return $getdata[0];
}

////////////////////////////////////////////PM antiflood time

function getfview()
{
   $getdata = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='fview'"));
   return $getdata[0];
}

////////////////////////////////////////////get forum message

function getfmsg()
{
   $getdata = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='4ummsg'"));
   return $getdata[0];
}

function getlogmsg()
{
   $getdata = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='logmsg'"));
   return $getdata[0];
}


//////////////////////////////////////////////is online

function isonline($uid)
{
  $uon = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_online WHERE userid='".$uid."'"));
  if($uon[0]>0)
  {
    return true;
  }else
  {
    return false;
  }
}
///////////////////////////if registration is allowed

function canreg()
{
   $getreg = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='reg'"));
   if($getreg[0]=='1')
   {
     return true;
   }else
   {
     return false;
   }
}

///////////////////////////////////////////Get Forum ID

function getfid($topicid)
{
  $fid = mysqli_fetch_array(sm_query("SELECT fid FROM ibwf_topics WHERE id='".$topicid."'"));
  return $fid[0];
}
////////////////////////////////////////////Parse PM
////anti spam
function parsepm($text, $sid="")
{
  $text = htmlspecialchars($text);
  $sml = mysqli_fetch_array(sm_query("SELECT hvia FROM ibwf_users WHERE id='".getuid_sid($sid)."'"));
  if ($sml[0]=="1")
  {
  $text = getsmilies($text);
  }
  $text = getbbcode($text, $sid);
  $text = findcard($text);
  return $text;
}


////////////////////////////////////////////Parse other msgs

function parsemsg($text,$sid="")
{
  $text = htmlspecialchars($text);
  $sml = mysqli_fetch_array(sm_query("SELECT hvia FROM ibwf_users WHERE id='".getuid_sid($sid)."'"));
  if ($sml[0]=="1")
  {
  $text = getsmilies($text);
  }
  $text = getbbcode($text, $sid);
  $text = findcard($text);
  return $text;
}
///////////////////////////////////////////Is site blocked

function isblocked($str,$sender)
{
  if(ismod($sender))
  {
    return false;
  }
  $str = str_replace(" ","",$str);
  $sites[0] = "Srimobile.com";
  $sites[1] = ".srimobile.com";
  $sites[2] = "sihalawap";
  $sites[3] = "Pamod.net";
  $sites[4] = "pamod.net";
  $sites[5] = "space.srimobile.com";
  $sites[6] = "srimObile.com";
  $sites[7] = "pamOd.net";
  $sites[8] = "sihalaWap";
  $sites[8] = "Sihalawap";

  for($i=0;$i<count($sites);$i++)
  {
        $nosf = substr_count($str,$sites[$i]);
    if($nosf>0)
    {
      return true;
    }
  }
  return false;
}

///////////////////////////////////////////Is pm starred

function isstarred($pmid)
{
  $strd = mysqli_fetch_array(sm_query("SELECT starred FROM ibwf_private WHERE id='".$pmid."'"));
  if($strd[0]=="1")
  {
    return true;
  }else{
    return false;
  }
}
////////////////////////////////////////////IS LOGGED?

function islogged($sid)
{
  //delete old sessions first


  $deloldses = sm_query("DELETE FROM ibwf_ses WHERE expiretm<'".time()."'");
  //does sessions exist?
  $sesx = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_ses WHERE id='".$sid."'"));

  if($sesx[0]>0)
  {
    if(!isuser(getuid_sid($sid)))
{
  return false;
}
    //yip it's logged in
    //first extend its session expirement time
    $xtm = ((time() + $timeadjust) + (60*getsxtm())) ;
    $extxtm = sm_query("UPDATE ibwf_ses SET expiretm='".$xtm."' WHERE id='".$sid."'");
    return true;
  }else{
    //nope its session must be expired or something
    return false;
  }
}

////////////////////////Get user nick from session id

function getnick_sid($sid)
{
  $uid = mysqli_fetch_array(sm_query("SELECT uid FROM ibwf_ses WHERE id='".$sid."'"));
  $uid = $uid[0];
  return getnick_uid($uid);
}

////////////////////////Get user id from session id

function getuid_sid($sid)
{
  $uid = mysqli_fetch_array(sm_query("SELECT uid FROM ibwf_ses WHERE id='".$sid."'"));
  $uid = $uid[0];
  return $uid;
}

/////////////////////Get total number of pms

function getpmcount($uid,$view="all")
{
  if($view=="all"){
    $nopm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE touid='".$uid."'"));
    }else if($view =="snt")
    {
        $nopm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE byuid='".$uid."'"));
    }else if($view =="str")
    {
        $nopm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE touid='".$uid."' AND starred='1'"));
    }else if($view =="urd")
    {
        $nopm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE touid='".$uid."' AND unread='1'"));
    }
	
	else if($view =="rd")
    {
        $nopm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE touid='".$uid."' AND unread='0'"));
    }
	
    return $nopm[0];
}

function deleteClub($clid)
{
    $fid = mysqli_fetch_array(sm_query("SELECT id FROM ibwf_forums WHERE clubid='".$clid."'"));
    $fid = $fid[0];
    $topics = sm_query("SELECT id FROM ibwf_topics WHERE fid=".$fid."");
    while($topic = mysqli_fetch_array($topics))
    {
      sm_query("DELETE FROM ibwf_posts WHERE tid='".$topic[0]."'");
    }
    sm_query("DELETE FROM ibwf_topics WHERE fid='".$fid."'");
    sm_query("DELETE FROM ibwf_forums WHERE id='".$fid."'");
    sm_query("DELETE FROM ibwf_rooms WHERE clubid='".$clid."'");
    sm_query("DELETE FROM ibwf_clubmembers WHERE clid='".$clid."'");
    sm_query("DELETE FROM ibwf_announcements WHERE clid='".$clid."'");
    sm_query("DELETE FROM ibwf_clubs WHERE id=".$clid."");
    return true;
}

function deleteMClubs($uid)
{
  $uclubs = sm_query("SELECT id FROM ibwf_clubs WHERE owner='".$uid."'");
  while($uclub=mysqli_fetch_array($uclubs))
  {
    deleteClub($uclub[0]);
  }
}
//////////////////////Function add user to online list :P
function addonline($uid,$place,$plclink)
{
  /////delete inactive users
  $tm = (time() + $timeadjust) ;
  $timeout = $tm - 420; //time out = 5 minutes
  $deloff = sm_query("DELETE FROM ibwf_online WHERE actvtime <'".$timeout."'");

  ///now try to add user to online list and add total time online
$invisible = mysqli_fetch_array(sm_query("SELECT invisible FROM ibwf_users WHERE id='".$uid."'"));
if($invisible[0]==1){
$plclink="";
$place="[Invisible]";
}

  $lastactive = mysqli_fetch_array(sm_query("SELECT lastact FROM ibwf_users WHERE id='".$uid."'"));
  $tolsla = (time() + $timeadjust) - $lastactive[0];
  $totaltimeonline = mysqli_fetch_array(sm_query("SELECT tottimeonl FROM ibwf_users WHERE id='".$uid."'"));
  $totaltimeonline = $totaltimeonline[0] + $tolsla;
  $res = sm_query("UPDATE ibwf_users SET tottimeonl='".$totaltimeonline."' WHERE id='".$uid."'");

   $ttime = (time() + $timeadjust);
  $res = sm_query("UPDATE ibwf_users SET lastact='".$ttime."' WHERE id='".$uid."'");
$res = sm_query("UPDATE ibwf_users SET lastact='".time()."' WHERE id='".$uid."'");
 $res = sm_query("UPDATE ibwf_users SET lastseen='".$place."' WHERE id='".$uid."'");
 $res = sm_query("UPDATE ibwf_users SET lastdet='".$plclink."' WHERE id='".$uid."'");

$res = sm_query("INSERT INTO ibwf_online SET userid='".$uid."', actvtime='".$ttime."', place='".$place."', placedet='".$plclink."'");
  if(!$res)
  {
    //most probably userid already in the online list
    //so just update the place and time
    $res = sm_query("UPDATE ibwf_online SET actvtime='".$ttime."', place='".$place."', placedet='".$plclink."' WHERE userid='".$uid."'");


  }
  
  
  $maxmem=mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE id='2'"));

            $result = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_online"));

          if($result[0]>=$maxmem[0])
          {
            $tnow = date("D d M Y - H:i", (time() + $timeadjust));
            sm_query("UPDATE ibwf_settings set name='".$tnow."', value='".$result[0]."' WHERE id='2'");
          }
          $maxtoday = mysqli_fetch_array(sm_query("SELECT ppl FROM ibwf_mpot WHERE ddt='".date("d m y")."'"));
          if($maxtoday[0]==0||$maxtoday=="")
          {
            sm_query("INSERT INTO ibwf_mpot SET ddt='".date("d m y")."', ppl='1', dtm='".date("H:i:s")."'");
            $maxtoday[0]=1;
          }
          if($result[0]>=$maxtoday[0])
          {
            sm_query("UPDATE ibwf_mpot SET ppl='".$result[0]."', dtm='".date("H:i:s")."' WHERE ddt='".date("d m y")."'");
          }
}

     /////////////////////Function add user to online list :P
/*
function addonline($uid,$place,$plclink)
{
  $tm = time();
  $timeout = $tm - 320; //time out = 5 minutes
  $deloff = sm_query("DELETE FROM ibwf_online WHERE actvtime <'".$timeout."'");
  ///now try to add user to online list
 $lastactive2 = mysqli_fetch_array(sm_query("SELECT resetime FROM ibwf_users WHERE id='".$uid."'"));
$tolsla2 = time() - $lastactive2[0];
$totaltimeonline2 = mysqli_fetch_array(sm_query("SELECT onlinetime FROM ibwf_users WHERE id='".$uid."'"));
$totaltimeonline2 = $totaltimeonline2[0] + $tolsla2;
$onlinetime = mysqli_fetch_array(sm_query("SELECT onlinetime FROM ibwf_users WHERE id='".$uid."'"));
$num = $onlinetime[0]/86400;
$days = intval($num);
$num2 = ($num - $days)*24;
$hours = intval($num2);
$num3 = ($num2 - $hours)*60;
$mins = intval($num3);
$num4 = ($num3 - $mins)*60;
$secs = intval($num4);
if(!onlinetime($uid))
    {
if($hours==1)
    {
$kano ="100";
$msg = "".getnick_uid(getuid_sid($sid))."Congratulation! You are lucky, coz even if you did not reach 1 hours. Youve got 100plusses n 100bp."."[br/][small]Note: This is an automated PM[/small]";
                        autopm($msg, $uid);
$res = sm_query("UPDATE ibwf_users SET plusses=plusses+'$kano' WHERE id='".$uid."'");
$res = sm_query("UPDATE ibwf_users SET onlinedone='1' WHERE id='".$uid."'");
$res = sm_query("UPDATE ibwf_users SET battlep=battlep+'$kano' WHERE id='".$uid."'");
}
}


 $ttime = time();
$res = sm_query("UPDATE ibwf_users SET resetime='".$ttime."' WHERE id='".$uid."'");
 $res = sm_query("UPDATE ibwf_users SET lastact='".time()."' WHERE id='".$uid."'");
  $res = sm_query("INSERT INTO ibwf_online SET userid='".$uid."', actvtime='".$tm."', place='".$place."', placedet='".$plclink."'");
  if(!$res)
  {
    //most probably userid already in the online list
    //so just update the place and time
    $res = sm_query("UPDATE ibwf_online SET actvtime='".$tm."', place='".$place."', placedet='".$plclink."' WHERE userid='".$uid."'");


  }
  $maxmem=mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE id='2'"));

            $result = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_online"));

          if($result[0]>=$maxmem[0])
          {
            $tnow = date("D d M Y - H:i");
            sm_query("UPDATE ibwf_settings set name='".$tnow."', value='".$result[0]."' WHERE id='2'");
          }
          $maxtoday = mysqli_fetch_array(sm_query("SELECT ppl FROM ibwf_mpot WHERE ddt='".date("d m y")."'"));
          if($maxtoday[0]==0||$maxtoday=="")
          {
            sm_query("INSERT INTO ibwf_mpot SET ddt='".date("d m y")."', ppl='1', dtm='".date("H:i:s")."'");
            $maxtoday[0]=1;
          }
          if($result[0]>=$maxtoday[0])
          {
            sm_query("UPDATE ibwf_mpot SET ppl='".$result[0]."', dtm='".date("H:i:s")."' WHERE ddt='".date("d m y")."'");
          }
}
*/
/////////////////////Get members online

function getnumonline()
{
    $nouo = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_online "));
    return $nouo[0];
}

//////////////////////////////////////is ignored

function isignored($tid, $uid)
{
  $ign = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_ignore WHERE target='".$tid."' AND name='".$uid."'"));
  if($ign[0]>0)
  {
    return true;
  }
  return false;
}

///////////////////////////////////////////GET IP

function getip()
{
    if (getenv('HTTP_X_FORWARDED_FOR'))
    {
      $ip=getenv('HTTP_X_FORWARDED_FOR');
    }
    else
    {
      $ip=getenv('REMOTE_ADDR');
    }
    return $ip;
}

//////////////////////////////////////////ignore result

function ignoreres($uid, $tid)
{
  //0 user can't ignore the target
  //1 yes can ignore
  //2 already ignored
  if($uid==$tid)
  {
    return 0;
  }
  if(ismod($tid))
  {
    //you cant ignore staff members
    return 0;
  }
  if(arebuds($tid, $uid))
  {
    //why the hell would anyone ignore his bud? o.O
    return 0;
  }
  if(isignored($tid, $uid))
  {
    return 2; // the target is already ignored by the user
  }
  return 1;
}

///////////////////////////////////////////Function getage

function getage($strdate)
{
    $dob = explode("-",$strdate);
    if(count($dob)!=3)
    {
      return 0;
    }
    $y = $dob[0];
    $m = $dob[1];
    $d = $dob[2];
    if(strlen($y)!=4)
    {
      return 0;
    }
    if(strlen($m)!=2)
    {
      return 0;
    }
    if(strlen($d)!=2)
    {
      return 0;
    }
  $y += 0;
  $m += 0;
  $d += 0;
  if($y==0) return 0;
  $rage = date("Y") - $y;
  if(date("m")<$m)
  {
    $rage-=1;

  }else{
    if((date("m")==$m)&&(date("d")<$d))
    {
      $rage-=1;
    }
  }
  return $rage;
}

/////////////////////////////////////////getavatar

function getavatar($uid)
{
  $av = mysqli_fetch_array(sm_query("SELECT avatar FROM ibwf_users WHERE id='".$uid."'"));

 IF($av[0]==""){
 $sex = mysqli_fetch_array(sm_query("SELECT sex FROM ibwf_users WHERE id='".$uid."'"));
  if($sex[0]=="M"){
   $avj="images/user_male.png";
   return $avj;
  }ELSE{
  $avj="images/user_female.png";
   return $avj;
  
  
  }
  }else{
    return $av[0];
  }
  
}

/////////////////////////////////////////Can see details?

function cansee($uid, $tid)
{
  if($uid==$tid)
  {
    return true;
  }
  if(ismod($uid))
  {
    return true;
  }
  return false;
}

//////////////////////////gettimemsg

function gettimemsg($sec)
{
  $ds = floor($sec/60/60/24);
  if($ds > 0)
  {
    return "$ds days";
  }
  $hs = floor($sec/60/60);
  if($hs > 0)
  {
    return "$hs hours";
  }
  $ms = floor($sec/60);
  if($ms > 0)
  {
    return "$ms minutes";
  }
  return "$sec Seconds";
}


function getchatstatus($uid){
$info = mysqli_fetch_array(sm_query("SELECT perm FROM ibwf_users WHERE id='".$uid."'"));
if($info[0]=='4')
  {
    return "<b>Site Owner!</b>";
	}else if($info[0]=='3')
  {
    return "<b>Head Admin!</b>";

  }else if($info[0]=='2')
  {
    return "<b>Administrator!</b>";
  }else if($info[0]=='1')
  {
    return "<b>Moderator!</b>";
  }

  $judg = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_judges WHERE uid='".$uid."'"));
  if($judg[0]>0)
  {
    return "<b>Chat Moderator!</b>";
  }
  
  
  
}


/////////////////////////////////////////get status

function getstatus($uid)
{
  $info = mysqli_fetch_array(sm_query("SELECT perm, plusses FROM ibwf_users WHERE id='".$uid."'"));

  if(isbanned($uid))
  {
    return "Banned! <br/>";
  }

if($info[0]=='4')
  {
return "<b>SM Owner!</b><br/>";
	}else if($info[0]=='3')
  {
 return "<b>Head Admin!</b><br/>";

  }else if($info[0]=='2')
  {
return"<b>Administrator!</b><br/>";
  }else if($info[0]=='1')
  {
return "<b>Moderator!</b><br/>";
  }
$judg = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_judges WHERE uid='".$who."'"));
  if($judg[0]>0)
  {
return  "<b>Chat Moderator!</b><br/>";
  }
  
}

/////////////////////Get Page Jumber
function getjumper($action, $sid,$pgurl)
{
  $rets = "<form action=\"$pgurl.php\" method=\"get\">";
      $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
        $rets .= "</form>";

        echo $rets;
}
/////////////////////Get unread number of pms

function getunreadpm($uid)
{
    $nopm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE touid='".$uid."' AND unread='1'"));
    return $nopm[0];
}

//////////////////////GET USER NICK FROM USERID

function getnick_uid($uid)
{
  $unick = mysqli_fetch_array(sm_query("SELECT name FROM ibwf_users WHERE id='".$uid."'"));
return "$unick[0]";
}

function getname_uid($uid)
{
  $unick = mysqli_fetch_array(sm_query("SELECT name FROM ibwf_users WHERE id='".$uid."'"));
return "$unick[0]";
}

///////////////////////////////////////////////Get the smilies

function getsmilies($text)
{
  $sql = "SELECT * FROM ibwf_smilies";
  $smilies = sm_query($sql);
  while($smilie=mysqli_fetch_array($smilies))
  {
    $scode = $smilie[1];
    $spath = $smilie[2];
    $text = str_replace($scode,"<img src=\"$spath\" alt=\"$scode\"/>",$text);
  }
  return $text;
}

////////////////////////////////////////////check nicks

function checknick($aim)
{
  $chk =0;
$aim = strtolower($aim);
  $nicks = sm_query("SELECT id, name, nicklvl FROM ibwf_nicks");

while($nick=mysqli_fetch_array($nicks))
{
    if($aim==$nick[1])
    {
      $chk = $nick[2];
    }else if(substr($aim,0,strlen($nick[1]))==$nick[1])
    {
      $chk = $nick[2];
    }else{
    $found = strpos($aim, $nick[1]);
    if($found!=0)
    {
        $chk = $nick[2];
    }
    }
}
return $chk;
}

function autopm($msg, $who)
{
    $ttime = time();
    sm_query("INSERT INTO ibwf_private SET text='".$msg."', byuid='1', touid='".$who."', unread='1', timesent='".$ttime."'");

}

////////////////////////////////////////////////////Register

function register($name,$pass,$usex,$bday,$uloc,$lang)
{
  $execms = sm_query("SELECT * FROM ibwf_users WHERE name='".$name."';");
$ip="";
$ubr=""; 
  
  if (mysqli_num_rows($execms)>0){
    return 1;
  }else{
    $pass = md5($pass);
	$validation = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='vldtn'"));
if($validation[0]==1)
{
$validated=0;
}else{
$validated=1;
}
    $reg = sm_query("INSERT INTO ibwf_users SET name='".$name."', pass='".$pass."', birthday='".$bday."', sex='".$usex."', location='".$uloc."', regdate='".time()."',validated='".$validated."', lang='".$lang."',ipadd='".$ip."', browserm='".$ubr."'");

    if ($reg)
    {
      $uid = mysqli_fetch_array(sm_query("SELECT id FROM ibwf_users WHERE name='".$name."'"));
      $msg = ".hi. /reader greetings from all  staff, we are happy to have you here, welcome. to our big happy family!  plz read  /faq and Explore other featurs. ENJOY Waplive! We do our best for U!! music. ";
      
      autopm($msg, $uid[0]);
      return 0;
    }else{
      return 2;

    }
  }

}

function validation()
{
$getval = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='vldtn'"));
if($getval[0]=='1')
{
return true;
}else
{
return false;
}
}

/////////////////////// GET ibwf_users user id from nickname

function getuid_nick($nick)
{
  $uid = mysqli_fetch_array(sm_query("SELECT id FROM ibwf_users WHERE name='".$nick."'"));
  return $uid[0];
}
function isheadadmin($uid)
{
  $admn = mysqli_fetch_array(sm_query("SELECT perm FROM ibwf_users WHERE id='".$uid."'"));
  if($admn[0]>=3)
  {
    return true;
  }else{
    return false;
  }
}

function isheadadmin2($uid)
{
  $admn = mysqli_fetch_array(sm_query("SELECT perm FROM ibwf_users WHERE id='".$uid."'"));
  if($admn[0]==3)
  {
    return true;
  }else{
    return false;
  }
}
/////////////////////////////////////////Is owner?

function isowner($uid)
{
  $own = mysqli_fetch_array(sm_query("SELECT perm FROM ibwf_users WHERE id='".$uid."'"));
  if($own[0]==4)
  {
    return true;
  }else{
    return false;
  }
}

function isvip($uid)
{
  $own = mysqli_fetch_array(sm_query("SELECT specialid FROM ibwf_users WHERE id='".$uid."'"));
  if($own[0]>0)
  {
    return true;
  }else{
    return false;
  }
}




/////////////////////////////////////////Is admin?

function isadmin($uid)
{
  $admn = mysqli_fetch_array(sm_query("SELECT perm FROM ibwf_users WHERE id='".$uid."'"));
  if($admn[0]>=2)
  {
    return true;
  }else{
    return false;
  }
}

function isadmin2($uid)
{
  $admn = mysqli_fetch_array(sm_query("SELECT perm FROM ibwf_users WHERE id='".$uid."'"));
  if($admn[0]==2)
  {
    return true;
  }else{
    return false;
  }
}

///////////////////////////////////parse bbcode

function getbbcode($text, $sid="")
{
        $unreadinbox=mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE unread='1' AND touid='".$uid."'"));
        $pmtotl=mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE touid='".$uid."'"));
        $unrd="[".$unreadinbox[0]."l".$pmtotl[0]."]";
        $text = preg_replace("/\[inbox]/is","<a href=\"inbox.php?action=main&amp;sid=$sid\">Inbox $unrd</a>",$text);
  $text = preg_replace("/\[updatepro]/is","<a href=\"index.php?action=uset&amp;sid=$sid\">Update Profie</a>",$text);
$text = preg_replace("/\[help]/is","<a href=\"help.php?action=main&amp;sid=$sid\">Help Tricket</a>",$text);
$text = preg_replace("/\[chat]/is","<a href=\"index.php?action=chat&amp;sid=$sid\">Chat menu</a>",$text);
 $text = preg_replace("/\/myshop/is","<a href=\"sm_shop.php?action=inventory&amp;sid=$sid\">My Inventory</a>",$text);  
   $text = preg_replace("/\/smmag/is","<a href=\"sm_articles.php?action=main&amp;sid=$sid\">Read The SM Magazine</a>",$text);  
   $text = preg_replace("/\/smfarm/is","<a href=\"farm.php?action=main&amp;sid=$sid\">SM Farm Game</a>",$text);  
  
  $text = preg_replace("/\[image\=((.*?)(.php|php4|php5|xhtml|html))\]/i","Im trying To Hack", $text);
  $text = preg_replace("/\[b\](.*?)\[\/b\]/i","<b>\\1</b>", $text);
  $text = preg_replace("/\[i\](.*?)\[\/i\]/i","<i>\\1</i>", $text);
  $text = preg_replace("/\[u\](.*?)\[\/u\]/i","<u>\\1</u>", $text);
  $text = preg_replace("/\[big\](.*?)\[\/big\]/i","<big>\\1</big>", $text);
  $text = preg_replace("/\[small\](.*?)\[\/small\]/i","<small>\\1</small>", $text);
  $text = preg_replace("/\[url\=(.*?)\](.*?)\[\/url\]/is","<a href=\"$1\">$2</a>",$text);
  $text = preg_replace("/\[clr\=(.*?)\](.*?)\[\/clr\]/is","<font color=\"$1\">$2</font>",$text);
  $text = preg_replace("/\[topic\=(.*?)\](.*?)\[\/topic\]/is","<a href=\"index.php?action=viewtpc&amp;tid=$1&amp;sid=$sid\">$2</a>",$text);
  $text = preg_replace("/\[forum\=(.*?)\](.*?)\[\/forum\]/is","<a href=\"index.php?action=viewfrm&amp;tid=$1&amp;sid=$sid\">$2</a>",$text);
  $text = preg_replace("/\[club\=(.*?)\](.*?)\[\/club\]/is","<a href=\"index.php?action=gocl&amp;clid=$1&amp;sid=$sid\">$2</a>",$text);
  $text = preg_replace("/\[blog\=(.*?)\](.*?)\[\/blog\]/is","<a href=\"index.php?action=viewblog&amp;bid=$1&amp;sid=$sid\">$2</a>",$text);
  $text = preg_replace("/\[art\=(.*?)\](.*?)\[\/art\]/is","<a href=\"sm_articles.php?action=viewart&amp;cid=$1&amp;sid=$sid\">$2</a>",$text);
    $text = preg_replace("/\[user\=(.*?)\](.*?)\[\/user\]/is","<a href=\"index.php?action=viewuser&amp;who=$1&amp;sid=$sid\">$2</a>",$text);
  $text = preg_replace("/\[chat\=(.*?)\](.*?)\[\/chat\]/is","<a href=\"chat.php?sid=$sid&amp;rid=$1&amp;sid=$sid\">$2</a>",$text);

  
  //$text = ereg_replace("http://[A-Za-z0-9./=?-_]+","<a href=\"\\0\">\\0</a>", $text);
  if(substr_count($text,"[br/]")<=5){
    $text = str_replace("[br/]","<br/>",$text);
  }

  return $text;
}




//////////////////////////////////////////////////MISC FUNCTIONS
function spacesin($word)
{
  $pos = strpos($word," ");
  if($pos === false)
  {
    return false;
  }else
  {
    return true;
  }
}

/////////////////////////////////Number of registered members
function regmemcount()
{
  $rmc = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users"));
  return $rmc[0];
}
///////

///////////////////////////function counter

function addvisitor()
{
  $cc = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='Counter'"));
  $cc = $cc[0]+1;
  $res = sm_query("UPDATE ibwf_settings SET value='".$cc."' WHERE name='Counter'");
}

function scharin($word)
{
  $chars = "abcdefghijklmnopqrstuvwxyz0123456789-_";
  for($i=0;$i<strlen($word);$i++)
  {
    $ch = substr($word,$i,1);
  $nol = substr_count($chars,$ch);
  if($nol==0)
  {
    return true;
  }
  }
  return false;
}

function isdigitf($word)
{
  $chars = "abcdefghijklmnopqrstuvwxyz";
    $ch = substr($word,0,1);
  $sres = ereg("[0-9]",$ch);

    $ch = substr($word,0,1);
  $nol = substr_count($chars,$ch);
  if($nol==0)
  {
    return true;
  }


  return false;

}
function boxstart($title){

	echo "<h5>

$title</h5>";

}

function boxend(){

	echo "</div></div>";

	}
function getpmood($uid)
{
  $pmood = mysqli_fetch_array(sm_query("SELECT pmood FROM ibwf_users WHERE id='".$uid."'"));
  return $pmood[0];
}
/////////////////////////////////////////////Get Mood
function getsetmood($uid)
{
   $getdata = mysqli_fetch_array(sm_query("SELECT setmood FROM ibwf_users WHERE id='".$uid."'"));
   return $getdata[0];
   $text = getsmilies($text);
}
function ischecker($uid)
{
  $admn = mysqli_fetch_array(sm_query("SELECT art FROM ibwf_users WHERE id='".$uid."'"));
  if($admn[0]=='1')
  {
    return true;
  }
  else if(ismod($uid))
    {
    return true;
  }
  
  else{
    return false;
  }
}
////////////////////////////get number of topic pages

function getnumpages2($artid)
{
  $nops = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_artpost WHERE artid='".$artid."'"));
  $nops = $nops[0]+1; //where did the 1 come from? the topic text, duh!
  $nopg = ceil($nops/5); //5 is the posts to show in each page
  return $nopg;
}
///////////////////////////////////get page from go

function getpage_go2($go,$artid)
{
  if(trim($go)=="")return 1;
  if($go=="last")return getnumpages2($artid);
  $counter=1;

  $posts = sm_query("SELECT id FROM ibwf_artpost WHERE artid='".$artid."'");
  while($post=mysqli_fetch_array($posts))
  {
    $counter++;
    $postid = $post[0];
    if($postid==$go)
    {
        $tore = ceil($counter/5);
        return $tore;
    }
  }
  return 1;
}
function canaddart($uid,$id)
{
  $minfo = mysqli_fetch_array(sm_query("SELECT authorid FROM ibwf_readart WHERE id='".$id."'"));
  if($minfo[0]==$uid||ismod($uid))
  {
    return true;
  }
  if($minfo[1]==$uid||ismod($uid))
  {
    return true;
  }
  return false;
}
////////////////////////////////////////////function pop up msg

function popup($sid)

{

 $uid = getuid_sid($sid);

          $unreadpopup=mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_popups WHERE unread='1' AND touid='".$uid."'"));





        if ($unreadpopup[0]>0)

        {



          $pminfo = mysqli_fetch_array(sm_query("SELECT id, text, byuid, timesent, touid, reported FROM ibwf_popups WHERE unread='1' AND touid='".$uid."'"));

          $pmfrm = getnick_uid($pminfo[2]);

          $ncl = sm_query("UPDATE ibwf_popups SET unread='0' WHERE id='".$pminfo[0]."'");

          $popmsgbox .= "<center><strong>POP-UP Message From $pmfrm</strong>";

          $popmsgbox .= "<br/>";

          $tmstamp = $pminfo[3];

         $tmdt = date("d m Y - H:i:s", $tmstamp);

          $popmsgbox .= "Sent At: $tmdt<br/>";

          $pmtext = parsepm($pminfo[1], $sid);

          $pmtext = str_replace("/llfaqs","<a href=\"lists.php?action=faqs&amp;sid=$sid\">$sitename F.A.Qs</a>", $pmtext);

          $pmtext = str_replace("/reader",getnick_uid($pminfo[4]), $pmtext);

          $pmid=$pminfo[0];

          $popmsgbox .= "Message: $pmtext";

          $popmsgbox .= "<br/>Send Reply to $pmfrm<br/></center>";

         $popmsgbox .= "<form action=\"inbxproc.php?action=sendpopup&amp;who=$pminfo[2]&amp;sid=$sid&amp;pmid=$pminfo[0]\" method=\"post\">";

         $popmsgbox .= "<center><input name=\"pmtext\" maxlength=\"500\"/><br/>";

         $popmsgbox .= "<input type=\"Submit\" name=\"submit\" Value=\"Send\"></center></form>";

          // $res = sm_query("INSERT INTO ibwf_online SET userid='".$uid."', actvtime='".$tm."', place='".$place."', placedet='".$plclink."'");

           $location = mysqli_fetch_array(sm_query("SELECT placedet FROM ibwf_online WHERE userid='".$uid."'"));

           $popmsgbox .= "<center><a href=\"$location[0]&amp;sid=$sid\">Skip Msg</a><br/>";

           $popmsgbox .= "<a href=\"inbxproc.php?action=rptpop&amp;sid=$sid&amp;pmid=$pminfo[0]\">Report</a></center>";


               }

           return $popmsgbox;

}
/////////////////////////mms hours
function addhours(){

        return 15*60*60;

 }
///////////////////////////////////////////is shielded?

function spinned($uid)
{
  $not = mysqli_fetch_array(sm_query("SELECT spinned FROM ibwf_users WHERE id='".$uid."'"));
  if($not[0]=='1')
  { return true;
  }else{
    return false;
  }
}
function pending($uid)
{
    $res = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_rpgame WHERE uid='".$uid."'"));
    if($res[0]>0)
    {
      return true;
    }
    return false;
}
/////////////////////Get pops

function isrpg($uid)
{
    $nopop = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_rpg WHERE touid='".$uid."' AND accept='1'"));
   return $nopop[0];
}
//////////////////////GET USER NICK FROM USERID

function ingame($uid)
{
  $unick = mysqli_fetch_array(sm_query("SELECT uid FROM ibwf_rpgame WHERE uid='".$uid."'"));
  return $unick[0];
}

/////////////////////Get pops

function ishit($uid)
{
    $nopop = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE id='".$uid."' AND hit='0'"));
   return $nopop[0];
}
/////////////////////Get pops

function isrpg2($uid)
{
    $nopop = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_rpg WHERE byuid='".$uid."' AND accept='2'"));
   return $nopop[0];
}
/////////////////////Get pops

function notactive($uid)
{
    $nopop = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE id='".$uid."' AND activate='1'"));
   return $nopop[0];
}
/////////////////////////Get user plusses

function health($uid)
{
    $plus = mysqli_fetch_array(sm_query("SELECT health FROM ibwf_users WHERE id='".$uid."'"));
    return $plus[0];
}
///////////////////////////////////////////is shielded?

function turn($uid)
{
  $not = mysqli_fetch_array(sm_query("SELECT hit FROM ibwf_users WHERE id='".$uid."'"));
  if($not[0]=='1')
  { return true;
  }else{
    return false;
  }
}
///////////////////////////////////////////is shielded?

function noact($uid)
{
  $not = mysqli_fetch_array(sm_query("SELECT hit FROM ibwf_users WHERE id='".$uid."'"));
  if($not[0]=='3')
  { return true;
  }else{
    return false;
  }
}
function have()
{
    $nopop = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_quiz"));
   return $nopop[0];
}
function correct($answer,$id)
{
  $uid = mysqli_fetch_array(sm_query("SELECT id FROM ibwf_quizrooms WHERE answer='".$answer."' AND id='".$id."'"));
  return $uid[0];
}
/////////////////////// GET ibwf_users user id from nickname

function getuid_hint($secure)
{
  $uid = mysqli_fetch_array(sm_query("SELECT uid FROM ibwf_bank WHERE hint='".$secure."'"));
  return $uid[0];
}
     ///////////////////////////////////////////is shielded?

function onlinetime($uid)
{
  $not = mysqli_fetch_array(sm_query("SELECT onlinedone FROM ibwf_users WHERE id='".$uid."'"));
  if($not[0]=='1')
  { return true;
  }else{
    return false;
  }
}
///////////////////////////////////////////is shielded?

function bank($uid)
{
  $not = mysqli_fetch_array(sm_query("SELECT done FROM ibwf_bank WHERE uid='".$uid."'"));
  if($not[0]=='1')
  {
    return true;
  }else{
    return false;
  }
}
function getbrip($sid){

$uid=getuid_sid($sid);

$HTTP_USER_AGENT = getenv("HTTP_USER_AGENT");

$REMOTE_ADDR = $_SERVER["REMOTE_ADDR"];

if($REMOTE_ADDR == "207.210.86.252"){

$REMOTE_ADDR = getenv("HTTP_X_FORWARDED_FOR");

}


}
function isdigitf3($word)
{
  $chars = "1234567890";
    $ch = substr($word,0,1);
  $sres = ereg("[0-9]",$ch);
   
    $ch = substr($word,0,1);
  $nol = substr_count($chars,$ch);
  if($nol==0)
  {
    return true;
  }


  return false;

}
function get_real_ua()
{

}
function real_ip()
{
   $ip = false;
     if(!empty($_SERVER['HTTP_CLIENT_IP']))
     {
          $ip = $_SERVER['HTTP_CLIENT_IP'];
     }
     if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
     {
          $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
          if($ip)
          {
               array_unshift($ips, $ip);
               $ip = false;
          }
          for($i = 0; $i < count($ips); $i++)
          {
               if(!preg_match("/^(10|172\.16|192\.168)\./i", $ips[$i]))
               {
                    if(version_compare(phpversion(), "5.0.0", ">="))
                    {
                         if(ip2long($ips[$i]) != false)
                         {
                              $ip = $ips[$i];
                              break;
                         }
                    }
                    else
                    {
                         if(ip2long($ips[$i]) != - 1)
                         {
                              $ip = $ips[$i];
                              break;
                         }
                    }
               }
          }
     }
     return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

function shad0w($uid, $who)
{

$pm = mysqli_fetch_array(sm_query("SELECT viewpro FROM ibwf_users WHERE id='".$who."'"));
if($pm[0]=='2')
{
if (ismod($uid))
{
return true;
}else{

return false;
}
return false;
}else if($pm[0]=='1')
{
if($uid==$who||arebuds($uid,$who)||ismod($uid))
{
return true;
}else{
return false;
}
}else if($pm[0]=='0')
{
return true;
}
}



function gettimemsg2($sec)
{

$years=0;
$months=0;
$weeks=0;
$days=0;
$mins=0;
$hours=0;
if ($sec>59)
{
$secs=$sec%60;
$mins=$sec/60;
$mins=(integer)$mins;
}

if ($mins>59)
{
$hours=$mins/60;
$hours=(integer)$hours;
$mins=$mins%60;
}

if ($hours>23)
{
$days=$hours/24;
$days=(integer)$days;
$hours=$hours%24;
}

if ($days>6)
{
$weeks=$days/7;
$weeks=(integer)$weeks;
$days=$days%7;
}

if ($weeks>3)
{
$months=$weeks/4;
$months=(integer)$months;
$weeks=$weeks%4;
}

if ($months>11)
{
$years=$months/12;
$years=(integer)$years;
$months=$months%12;
}

if($years>0)
{
if($years==1){$yearmsg="year";}else{$yearmsg="years";}
if($months==1){$monthsmsg="month";}else{$monthsmsg="months";}
if($days==1){$daysmsg="day";}else{$daysmsg="days";}
if($hours==1){$hoursmsg="hour";}else{$hoursmsg="hours";}
if($mins==1){$minsmsg="minute";}else{$minsmsg="minutes";}
if($secs==1){$secsmsg="second";}else{$secsmsg="seconds";}

if($months!=0){$monthscheck="$months $monthsmsg ";}else{$monthscheck="";}
if(($days!=0)&&($months==0)){$dayscheck="$days $daysmsg ";}else{$dayscheck="";}
if(($hours!=0)&&($months==0)&&($days==0)){$hourscheck="$hours $hoursmsg ";}else{$hourscheck="";}
if(($mins!=0)&&($months==0)&&($days==0)&&($hours==0)){$minscheck="$mins $minsmsg ";}else{$minscheck="";}
if(($secs!=0)&&($months==0)&&($days==0)&&($hours==0)&&($mins==0)){$secscheck="$secs $secsmsg";}else{$secscheck="";}

return "$years $yearmsg $monthscheck$dayscheck$hourscheck$minscheck$secscheck";
}

if(($years<1)&&($months>0))
{
if($months==1){$monthsmsg="month";}else{$monthsmsg="months";}
if($days==1){$daysmsg="day";}else{$daysmsg="days";}
if($hours==1){$hoursmsg="hour";}else{$hoursmsg="hours";}
if($mins==1){$minsmsg="minute";}else{$minsmsg="minutes";}
if($secs==1){$secsmsg="second";}else{$secsmsg="seconds";}

if($days!=0){$dayscheck="$days $daysmsg ";}else{$dayscheck="";}
if(($hours!=0)&&($days==0)){$hourscheck="$hours $hoursmsg ";}else{$hourscheck="";}
if(($mins!=0)&&($days==0)&&($hours==0)){$minscheck="$mins $minsmsg ";}else{$minscheck="";}
if(($secs!=0)&&($days==0)&&($hours==0)&&($mins==0)){$secscheck="$secs $secsmsg";}else{$secscheck="";}

return "$months $monthsmsg $dayscheck$hourscheck$minscheck$secscheck";
}

if(($months<1)&&($weeks>0))
{
if($weeks==1){$weeksmsg="week";}else{$weeksmsg="weeks";}
if($days==1){$daysmsg="day";}else{$daysmsg="days";}
if($hours==1){$hoursmsg="hour";}else{$hoursmsg="hours";}
if($mins==1){$minsmsg="minute";}else{$minsmsg="minutes";}
if($secs==1){$secsmsg="second";}else{$secsmsg="seconds";}

if($days!=0){$dayscheck="$days $daysmsg ";}else{$dayscheck="";}
if(($hours!=0)&&($days==0)){$hourscheck="$hours $hoursmsg ";}else{$hourscheck="";}
if(($mins!=0)&&($days==0)&&($hours==0)){$minscheck="$mins $minsmsg ";}else{$minscheck="";}
if(($secs!=0)&&($days==0)&&($hours==0)&&($mins==0)){$secscheck="$secs $secsmsg";}else{$secscheck="";}

return "$weeks $weeksmsg $dayscheck$hourscheck$minscheck$secscheck";
}

if(($weeks<1)&&($days>0))
{
if($days==1){$daysmsg="day";}else{$daysmsg="days";}
if($hours==1){$hoursmsg="hour";}else{$hoursmsg="hours";}
if($mins==1){$minsmsg="minute";}else{$minsmsg="minutes";}
if($secs==1){$secsmsg="second";}else{$secsmsg="seconds";}

if($hours!=0){$hourscheck="$hours $hoursmsg ";}else{$hourscheck="";}
if(($mins!=0)&&($hours==0)){$minscheck="$mins $minsmsg ";}else{$minscheck="";}
if(($secs!=0)&&($hours==0)&&($mins==0)){$secscheck="$secs $secsmsg";}else{$secscheck="";}

return "$days $daysmsg $hourscheck$minscheck$secscheck";
}

if(($days<1)&&($hours>0))
{
if($hours==1){$hoursmsg="hour";}else{$hoursmsg="hours";}
if($mins==1){$minsmsg="minute";}else{$minsmsg="minutes";}
if($secs==1){$secsmsg="second";}else{$secsmsg="seconds";}

if($mins!=0){$minscheck="$mins $minsmsg ";}else{$minscheck="";}
if(($secs!=0)&&($mins==0)){$secscheck="$secs $secsmsg";}else{$secscheck="";}

return "$hours $hoursmsg $minscheck$secscheck";
}

if(($hours<1)&&($mins>0))
{
if($mins==1){$minsmsg="minute";}else{$minsmsg="minutes";}
if(($secs==1)&&($mins==0)){$secsmsg="second";}else{$secsmsg="seconds";}

if($secs!=0){$secscheck="$secs $secsmsg";}else{$secscheck="";}

return "$mins $minsmsg $secscheck";
}

if(($mins<1)&&($sec>0))
{
if($sec==1){$secsmsg="second";}else{$secsmsg="seconds";}

if($sec!=0){$secscheck="$sec $secsmsg";}else{$secscheck="";}

return "$secscheck";
}else{
return "0!";
}
}
///////////////////////////////////////////////////////////////////////////////////////

function rating($uid)
{
$info = mysqli_fetch_array(sm_query("SELECT shouts, chmsgs, posts, gplus FROM ibwf_users WHERE id='".$uid."'"));
$pl = $info[0];
$gp = $info[1];
$sh = $info[2];
$ch = $info[3];
$infototal = ($pl + $gp + $sh + $ch);
if($infototal<=0)
{
return "<img src=\"images/rating/pro_rank_0p.gif\" alt=\"\"/>";
}
else if($infototal<=100)
{
return "<img src=\"images/rating/pro_rank_10p.gif\" alt=\"\"/>";
}
else if($infototal<=200)
{
return "<img src=\"images/rating/pro_rank_20p.gif\" alt=\"\"/>";
}
else if($infototal<=300)
{
return "<img src=\"images/rating/pro_rank_30p.gif\" alt=\"\"/>";
}
else if($infototal<=400)
{
return "<img src=\"images/rating/pro_rank_40p.gif\" alt=\"\"/>";
}
else if($infototal<=500)
{
return "<img src=\"images/rating/pro_rank_40p.gif\" alt=\"\"/>";
}
else if($infototal<=600)
{
return "<img src=\"images/rating/pro_rank_50p.gif\" alt=\"\"/>";
}
else if($infototal<=700)
{
return "<img src=\"images/rating/pro_rank_60p.gif\" alt=\"\"/>";
}
else if($infototal<=800)
{
return "<img src=\"images/rating/pro_rank_70p.gif\" alt=\"\"/>";
}
else if($infototal<=900)
{
return "<img src=\"images/rating/pro_rank_80p.gif\" alt=\"\"/>";
}
else if($infototal<=1000)
{
return "<img src=\"images/rating/pro_rank_90p.gif\" alt=\"\"/>";
}
else
{
return "<img src=\"images/rating/pro_rank_100p.gif\" alt=\"\"/>";
}
}
function br(){
$keyname_ua_arr = array('HTTP_X_DEVICE_USER_AGENT',
        'HTTP_X_OPERAMINI_PHONE_UA',
        'HTTP_X_ORIGINAL_USER_AGENT',
        'HTTP_X_SKYFIRE_PHONE',
        'HTTP_X_BOLT_PHONE_UA',
        'HTTP_DEVICE_STOCK_UA',
        'HTTP_X_UCBROWSER_DEVICE_UA',
		'HTTP_X_DEVICE_USER_AGENT',
        'HTTP_Q_UA'
		  );
 foreach ($keyname_ua_arr as $value)
  {
 if(isset($_SERVER[$value])){
 $br=$_SERVER[$value];
 break;
 }
}
 if ($br==""){
 $br=$_SERVER['HTTP_USER_AGENT'];
}

 return $br;
 
}

function ph(){
$keyname_ph_arr = array('HTTP_MSISDN',
 'HTTP_X_MSP_MSISDN',
 'HTTP_USER_IDENTITY_FORWARD_MSISDN',
 'HTTP_MIN',
 'HTTP_X_UP_CALLING_LINE_ID',
 'HTTP_X_HTS_CLID',
 'HTTP_X_NETWORK_INFO',
 'HTTP_X_MSISDN',
 'HTTP_X_NOKIA_MSISDN',
 'MSISDN_ATTRIBUTE_NAME',
'IMSI_ATTRIBUTE_NAME',
'MSISDN_ATTRIBUTE_NAME',
);
 
 foreach ($keyname_ph_arr as $value)
  {
 if(isset($_SERVER[$value])){
 $ph=$_SERVER[$value];
 break;
 }
if(isset($_COOKIE[$value])){
 $ph=$_COOKIE[$value];
 break;
 }

}
return $ph;
 }


 function isp($ip){
function ngegrab($url){$ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $url); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true); curl_setopt($ch,CURLOPT_ENCODING,'gzip'); curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true); curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$header[] = "Accept-Language: en"; 
$header[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:6.0) Gecko/20100101 Firefox/5.0"; 
$header[] = "Pragma: no-cache"; $header[] = "Cache-Control: no-cache"; $header[] = "Accept-Encoding: gzip,deflate"; $header[] = "Content-Encoding: gzip"; $header[] = "Content-Encoding: deflate"; curl_setopt($ch, CURLOPT_HTTPHEADER, $header); $load = curl_exec($ch); curl_close($ch); return $load;}
$url=ngegrab("http://whatismyipaddress.com/ip/$ip");
preg_match_all('/<th>(.*?)<\/th><td>(.*?)<\/td>/s',$url,$output,PREG_SET_ORDER);

$isp="<b>SIM:</b>".$output[3][2]."<br/>";
$city="<b>City:</b>".$output[11][2]."<br/>";
$state="<b>State:</b>".$output[10][2]."<br/>";
 $all="$isp $city $state";
return $all;
 }


function getOS($user_agent) { 

    $os_platform    =   "Unknown";

    $os_array       =   array(
	        '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}


?>