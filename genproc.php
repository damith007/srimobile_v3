<?php
include("xhtmlfunctions.php");
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";

include("config.php");
include("core.php");
include('class.upload.php');

connectdb();
$action = $_GET["action"];
$sid = $_GET["sid"];
$uid = getuid_sid($sid);
mylog($sid);

	
		$validated = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE id='".$uid."'  AND validated='0'"));
    if(($validated[0]>0)&&(validation()))
    {
	
    $pstyle = gettheme($sid);
  echo xhtmlhead("try again",$pstyle);
      echo "<p align=\"center\">";
	   $nickk = getnick_sid($sid);
  $whoo = getuid_nick($nickk);
      echo "<img src=\"images/notok.gif\" alt=\"x\"/><br/>";
	   echo "<b>Account is Not Validated Yet</b><br/>";
	  $totaltimeonline = mysqli_fetch_array(sm_query("SELECT tottimeonl FROM ibwf_users WHERE id='".$whoo."'"));  
$num = $totaltimeonline[0]/86400;
$days = intval($num);
$num2 = ($num - $days)*24;
$hours = intval($num2);
$num3 = ($num2 - $hours)*60;
$mins = intval($num3);
$num4 = ($num3 - $mins)*60;
$secs = intval($num4);

echo "<b>Your online time:</b> ";
if(($days==0) and ($hours==0) and ($mins==0)){
  echo "$secs seconds<br/>";
}else
if(($days==0) and ($hours==0)){
  echo "$mins mins, ";
  echo "$secs seconds<br/>";
}else
if(($days==0)){
  echo "$hours hours, ";
  echo "$mins mins, ";
  echo "$secs seconds<br/>";
}else{
  echo "$days days, ";
  echo "$hours hours, ";
  echo "$mins mins, ";
  echo "$secs seconds<br/>";
}
    echo "<b>Account Not Validated yet</b><br/>This could take up to 3 hrs(normally 15 minutes) pls be patient and try again soon<br/>..Untill then browse and Enjoy other features in wap.weblk.net.<br/>thank you!<br/><br/>";
	
	echo "<a href=\"index.php?action=formmenu&amp;sid=$sid\">Back To Forums</a><br/>";

	 echo "<a href=\"index.php?action=main&amp;sid=$sid\">Back To Home</a><br/><br/>";

	 echo "</p>";
   echo xhtmlfoot();
      exit();


    }
	
	
else if($action=="updtthme")
{

  addonline(getuid_sid($sid),"Update Profile theme","");
  $theme = $_POST["thms"];
  $size = $_POST["size"];
  $uid = getuid_sid($sid);
  $exist = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE id='".$uid."'"));
if ($exist[0]>0)
  {
  $res = sm_query("UPDATE ibwf_users SET theme='".$theme.".css' WHERE id='".$uid."'");
  }else{
  $res = sm_query("UPDATE ibwf_users SET theme='".$theme.".css' WHERE id='".$uid."'");
  }
  echo "<p align=\"center\">";
  
if($res)
  {
  echo "<img src=\"images/ok.gif\" alt=\"o\"/>Updated<br/><br/><br/>";
  }else{
  echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!<br/><br/>";
  }
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"../images/home.gif\" alt=\"\"/>Home</a>";
  echo "</p>";
  echo "</body>";
  echo "</html>";
  exit();
}	
if($action=="newtopic")
{
  $fid = $_POST["fid"];
  $ntitle = $_POST["ntitle"];
  $tpctxt = $_POST["tpctxt"];
  if(!canaccess(getuid_sid($sid), $fid))
    {
  $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
      echo "<p align=\"center\">";
      echo "You Don't Have A Permission To View The Contents Of This Forum<br/><br/>";
      echo "<a href=\"index.php?action=main&amp;sid=$sid\">Home</a>";
      echo "</p>";
  echo xhtmlfoot();
      exit();
    }
  addonline(getuid_sid($sid),"Created New Topic","");
  $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
      echo "<p align=\"center\">";
      $crdate = (time() - $timeadjust) + $timeadjust;
      //$uid = getuid_sid($sid);
      $texst = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topics WHERE name LIKE '".$ntitle."' AND fid='".$fid."'"));
      if($texst[0]==0)
      {
        $res = false;
      
        $ltopic = mysqli_fetch_array(sm_query("SELECT crdate FROM ibwf_topics WHERE authorid='".$uid."' ORDER BY crdate DESC LIMIT 1"));
        global $topic_af;
        $antiflood = (time() - $timeadjust)-$ltopic[0] + $timeadjust;
        if($antiflood>$topic_af)
{
  if((trim($ntitle)!="")||(trim($tpctxt)!=""))
      {
      $res = sm_query("INSERT INTO ibwf_topics SET name='".$ntitle."', fid='".$fid."', authorid='".$uid."', text='".$tpctxt."', crdate='".$crdate."', lastpost='".$crdate."'");
     }
       if($res)
      {
        $usts = mysqli_fetch_array(sm_query("SELECT posts, plusses FROM ibwf_users WHERE id='".$uid."'"));
        $ups = $usts[0]+1;
        $upl = $usts[1]+1;
        sm_query("UPDATE ibwf_users SET posts='".$ups."', plusses='".$upl."' WHERE id='".$uid."'");
        $tnm = htmlspecialchars($ntitle);
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Topic <b>$tnm</b> Created Successfully";
        $tid = mysqli_fetch_array(sm_query("SELECT id FROM ibwf_topics WHERE name='".$ntitle."' AND fid='".$fid."'"));
        echo "<br/><br/><a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tid[0]\">";
echo "View Topic</a>";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error Creating New Thread";
      }
      }else{
        $af = $topic_af -$antiflood;
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Antiflood Control: $af";
      }
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Topic Name already Exist";
      }

      



      $fname = getfname($fid);
      echo "<br/><br/><a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$fid\">";
echo "$fname</a><br/>";
          
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
      echo "</p>";
  echo xhtmlfoot();
}
else if($action=="post")
{
    $tid = $_POST["tid"];
    $tfid = mysqli_fetch_array(sm_query("SELECT fid FROM ibwf_topics WHERE id='".$tid."'"));
if(!canaccess(getuid_sid($sid), $tfid[0]))
    {
  $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
      echo "<p align=\"center\">";
      echo "You Don't Have A Permission To View The Contents Of This Forum<br/><br/>";
      echo "<a href=\"index.php?action=main&amp;sid=$sid\">Home</a>";
      echo "</p>";
   echo xhtmlfoot();
      exit();
    }
  $reptxt = $_POST["reptxt"];
  $qut = $_POST["qut"];
  addonline(getuid_sid($sid),"Posted A reply","");
  $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
      echo "<p align=\"center\">";
      $crdate = (time() - $timeadjust) + $timeadjust;
      $fid = getfid($tid);
      //$uid = getuid_sid($sid);
      $res = false;
      $closed = mysqli_fetch_array(sm_query("SELECT closed FROM ibwf_topics WHERE id='".$tid."'"));
      
      if(($closed[0]!='1')||(ismod($uid)))
      {
      
        $lpost = mysqli_fetch_array(sm_query("SELECT dtpost FROM ibwf_posts WHERE uid='".$uid."' ORDER BY dtpost DESC LIMIT 1"));
        global $post_af;
        $antiflood = (time() - $timeadjust)-$lpost[0] + $timeadjust;
        if($antiflood>$post_af)
{
  if(trim($reptxt)!="")
      {
	$clr=$_POST["clr"];
	 if($clr=="") {
	 $reptxt=$reptxt;
	 
	 }else{
	 $reptxt="[clr=$clr]$reptxt\[/clr]";
	 }
//////////////////////////////////////////////////////////////////////	  
  if ($_POST['action'] == 'image') {
  
 $handle = new Upload($_FILES['f1']);
     if ($handle->uploaded) {
	   $handle->dir_auto_chmod = true;
       $handle->dir_chmod = 0777;
	   $handle->image_convert = 'jpg';
	   $handle->image_watermark = 'images/logo.png';
	   $handle->image_watermark_no_zoom_out = true;
	   $handle->image_watermark_position = 'BL';
       $handle->image_resize            = true;
       $handle->image_ratio_y           = true;
       $handle->image_x                 = 150;
	   $handle->file_new_name_body = '.SM_POST_'.$tid.'_'.$uid.''.$foo->file_src_name;
        $handle->Process('upload/posts');
        
         if ($handle->processed) {
               $imageurl = "upload/posts/$handle->file_dst_name";
              echo "<a href=\"$imageurl\"><img src=\"$imageurl\" alt=\"posts\"/></a><br/>";
  
 $res = sm_query("INSERT INTO ibwf_posts SET image='".$imageurl."',text='".$reptxt."', tid='".$tid."', uid='".$uid."', dtpost='".$crdate."', quote='".$qut."'");			  
 /* $res = sm_query("INSERT INTO ibwf_shouts SET image='".$imageurl."',shout='".$shtxt."', shouter='".$uid."', shtime='".$shtm."'");			   
	 */		   } else{
              
              echo '  file not uploaded to the wanted location<br/>';
              echo '  Error: ' . $handle->error . '<br/>';
           }
          $handle-> Clean();
       }else{
	 echo '  file not uploaded on the server<br/>';
          echo '  Error: ' . $handle->error . '<br/>';
      }
 }	  else{	  
      $res = sm_query("INSERT INTO ibwf_posts SET text='".$reptxt."', tid='".$tid."', uid='".$uid."', dtpost='".$crdate."', quote='".$qut."'");
}
	  }
      if($res)
      {
        $usts = mysqli_fetch_array(sm_query("SELECT posts, plusses FROM ibwf_users WHERE id='".$uid."'"));
        $ups = $usts[0]+1;
        $upl = $usts[1]+1;
        sm_query("UPDATE ibwf_users SET posts='".$ups."', plusses='".$upl."' WHERE id='".$uid."'");
        sm_query("UPDATE ibwf_topics SET lastpost='".$crdate."' WHERE id='".$tid."'");
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Message Posted Successfully";
        echo "<br/><br/><a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tid&amp;go=last\">";
echo "View Topic</a>";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error Posting Message";
      }
      }else{
$af = $post_af -$antiflood;
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Antiflood Control: $af";
      }
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Topic is closed for posting";
      }
      
      $fname = getfname($fid);
      echo "<br/><br/><a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$fid\">";
echo "$fname</a><br/>";
          
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
      echo "</p>";
  echo xhtmlfoot();
  
}
else if($action=="upmood")
{$pstyle = gettheme($sid);

      echo xhtmlhead("$stitle",$pstyle);
     addonline(getuid_sid($sid),"Updating My Mood","");
$mmsg = $_POST["mmsg"];
     
      echo "<head>";
    echo "<title>Set OnlineList Mood</title>";
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/style.css\">";
    echo "</head>";
    echo "<body>";
    echo "<p align=\"center\">";
       $res = sm_query("UPDATE ibwf_users SET setmood='".$mmsg."' WHERE id='".$uid."'");
  if($res)
        {
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Mood updated successfully<br/>";
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>Can't update your Mood<br/>";
        } 
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"\"/>Home</a>";
  echo "</p>";
    echo "</body>";
}
else if ($action=="uadd")
{
    $ucon = $_POST["ucon"];
    $ucit = $_POST["ucit"];
    $ustr = $_POST["ustr"];
    $utzn = $_POST["utzn"];
    $uphn = $_POST["uphn"];
    addonline(getuid_sid($sid),"My Address","");
  $pstyle = gettheme($sid);
      echo xhtmlhead("My Address",$pstyle);
    echo "<p align=\"center\">";
    $uid = getuid_sid($sid);
    $exs = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_xinfo WHERE uid='".$uid."'"));
    if($exs[0]>0)
    {
        $res = sm_query("UPDATE ibwf_xinfo SET country='".$ucon."', city='".$ucit."', street='".$ustr."', timezone='".$utzn."', phoneno='".$uphn."' WHERE uid='".$uid."'");
        if($res)
        {
          echo "<img src=\"images/ok.gif\" alt=\"O\"/>Address Updated Successfully<br/><br/>";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"O\"/>Database Error!<br/><br/>";
        }
    }else{
        $res = sm_query("INSERT INTO ibwf_xinfo SET uid='".$uid."', country='".$ucon."', city='".$ucit."', street='".$ustr."', timezone='".$utzn."', phoneno='".$uphn."'");
        if($res)
        {
          echo "<img src=\"images/ok.gif\" alt=\"O\"/>Address Updated Successfully<br/><br/>";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"O\"/>Database Error!<br/><br/>";
        }
    }
    echo "<a href=\"index.php?action=uxset&amp;sid=$sid\">";
echo "Extended Settings</a><br/>";
        
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

else if($action=="gcp")
{
    $clid = $_GET["clid"];
    $who = $_GET["who"];
    $giv = $_POST["giv"];
    $pnt = $_POST["pnt"];
    addonline(getuid_sid($sid),"Moderating Club Member","");
  $pstyle = gettheme($sid);
      echo xhtmlhead("Moderate Member",$pstyle);
    echo "<p align=\"center\">";
    $whnick = getnick_uid($who);
    echo "<b>$whnick</b>";
    echo "</p>";
    echo "<p>";
    $exs = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubmembers WHERE uid='".$who."' AND clid=".$clid.""));
$cow = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubs WHERE owner='".$uid."' AND id=".$clid.""));
if($exs[0]>0 && $cow[0]>0)
{
    $mpt = mysqli_fetch_array(sm_query("SELECT points FROM ibwf_clubmembers WHERE uid='".$who."' AND clid='".$clid."'"));
    if($giv=="1")
    {
      $pnt = $mpt[0]+$pnt;
    }else{
        $pnt = $mpt[0]-$pnt;
        if($pnt<0)$pnt=0;
    }
    $res = sm_query("UPDATE ibwf_clubmembers SET points='".$pnt."' WHERE uid='".$who."' AND clid='".$clid."'");
    if($res)
    {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Club points updated successfully!";
    }else{
      echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error!";
    }
    }else{
      echo "<img src=\"images/notok.gif\" alt=\"X\"/>Missing Info!";
    }
    echo "</p>";

    echo "<p align=\"center\">";

        
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

else if($action=="gpl")
{
    $clid = $_GET["clid"];
    $who = $_GET["who"];
    $pnt = $_POST["pnt"];
    addonline(getuid_sid($sid),"Moderating Club Member","");
  $pstyle = gettheme($sid);
      echo xhtmlhead("Moderate Member",$pstyle);
    echo "<p align=\"center\">";
    $whnick = getnick_uid($who);
    echo "<b>$whnick</b>";
    echo "</p>";
    echo "<p>";
      echo "<img src=\"images/notok.gif\" alt=\"X\"/>Because people misused the plusses thing, clubs owners cant give plusses anymore";
    
    echo "</p>";

    echo "<p align=\"center\">";

        
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

else if ($action=="upre")
{
    $usds = $_POST["usds"];
    $usds = str_replace('"', "", $usds);
    $usds = str_replace("'", "", $usds);
    $ubon = $_POST["ubon"];
    $usxp = $_POST["usxp"];
    addonline(getuid_sid($sid),"Preferences","");
  $pstyle = gettheme($sid);
      echo xhtmlhead("Preferences",$pstyle);
    echo "<p align=\"center\">";
    $uid = getuid_sid($sid);
    $exs = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_xinfo WHERE uid='".$uid."'"));
    if($exs[0]>0)
    {
        $res = sm_query("UPDATE ibwf_xinfo SET sitedscr='".$usds."', budsonly='".$ubon."', sexpre='".$usxp."' WHERE uid='".$uid."'");
        if($res)
        {
          echo "<img src=\"images/ok.gif\" alt=\"O\"/>Preferences Updated Successfully<br/><br/>";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"O\"/>Database Error!<br/><br/>";
        }
    }else{
        $res = sm_query("INSERT INTO ibwf_xinfo SET uid='".$uid."', sitedscr='".$usds."', budsonly='".$ubon."', sexpre='".$usxp."'");
        if($res)
        {
          echo "<img src=\"images/ok.gif\" alt=\"O\"/>Preferences Updated Successfully<br/><br/>";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"O\"/>Database Error!<br/><br/>";
        }
    }
    echo "<a href=\"index.php?action=uxset&amp;sid=$sid\">";
echo "Extended Settings</a><br/>";
        
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

else if ($action=="gmset")
{
    $ugun = $_POST["ugun"];
    $ugpw = $_POST["ugpw"];
    $ugch = $_POST["ugch"];
    addonline(getuid_sid($sid),"G-Mail Settings","");
  $pstyle = gettheme($sid);
      echo xhtmlhead("G-Mail Settings",$pstyle);
    echo "<p align=\"center\">";
    $uid = getuid_sid($sid);
    $exs = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_xinfo WHERE uid='".$uid."'"));
    if($exs[0]>0)
    {
        $res = sm_query("UPDATE ibwf_xinfo SET gmailun='".$ugun."', gmailpw='".$ugpw."', gmailchk='".$ugch."', gmaillch='".((time() - $timeadjust) + (10*60*60))."' WHERE uid='".$uid."'");
        if($res)
        {
          echo "<img src=\"images/ok.gif\" alt=\"O\"/>Gmail Settings Updated Successfully<br/><br/>";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"O\"/>Database Error!<br/><br/>";
        }
    }else{
        $res = sm_query("INSERT INTO ibwf_xinfo SET uid='".$uid."', gmailun='".$ugun."', gmailpw='".$ugpw."', gmailchk='".$ugch."', gmaillch='".((time() - $timeadjust) + (10*60*60))."'");
        if($res)
        {
          echo "<img src=\"images/ok.gif\" alt=\"O\"/>G-Mail Settings Updated Successfully<br/><br/>";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"O\"/>Database Error!<br/><br/>";
        }
    }
    echo "<a href=\"index.php?action=uxset&amp;sid=$sid\">";
echo "Extended Settings</a><br/>";
        
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

else if ($action=="uper")
{
    $uhig = $_POST["uhig"];
    $uwgt = $_POST["uwgt"];
    $urln = $_POST["urln"];
    $ueor = $_POST["ueor"];
    $ueys = $_POST["ueys"];
    $uher = $_POST["uher"];
    $upro = $_POST["upro"];
    
    addonline(getuid_sid($sid),"Personality","");
  $pstyle = gettheme($sid);
      echo xhtmlhead("Personality",$pstyle);
    echo "<p align=\"center\">";
    $uid = getuid_sid($sid);
    $exs = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_xinfo WHERE uid='".$uid."'"));
    if($exs[0]>0)
    {
        $res = sm_query("UPDATE ibwf_xinfo SET height='".$uhig."', weight='".$uwgt."', realname='".$urln."', eyescolor='".$ueys."', profession='".$upro."', racerel='".$ueor."',hairtype='".$uher."'  WHERE uid='".$uid."'");
        if($res)
        {
          echo "<img src=\"images/ok.gif\" alt=\"O\"/>Personal Info Updated Successfully<br/><br/>";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"O\"/>Database Error!<br/><br/>";
        }
    }else{
        $res = sm_query("INSERT INTO ibwf_xinfo SET uid='".$uid."', height='".$uhig."', weight='".$uwgt."', realname='".$urln."', eyescolor='".$ueys."', profession='".$upro."', racerel='".$ueor."',hairtype='".$uher."'");
        if($res)
        {
          echo "<img src=\"images/ok.gif\" alt=\"O\"/>Personal Info Updated Successfully<br/><br/>";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"O\"/>Database Error!<br/><br/>";
        }
    }
    echo "<a href=\"index.php?action=uxset&amp;sid=$sid\">";
echo "Extended Settings</a><br/>";
        
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

else if ($action=="umin")
{
    $ulik = $_POST["ulik"];
    $ulik = str_replace('"', "", $ulik);
    $ulik = str_replace("'", "", $ulik);
    $udlk = $_POST["udlk"];
    $udlk = str_replace('"', "", $udlk);
    $udlk = str_replace("'", "", $udlk);
    $ubht = $_POST["ubht"];
    $ubht = str_replace('"', "", $ubht);
    $ubht = str_replace("'", "", $ubht);
    $ught = $_POST["ught"];
    $ught = str_replace('"', "", $ught);
    $ught = str_replace("'", "", $ught);
    $ufsp = $_POST["ufsp"];
    $ufsp = str_replace('"', "", $ufsp);
    $ufsp = str_replace("'", "", $ufsp);
    $ufmc = $_POST["ufmc"];
    $ufmc = str_replace('"', "", $ufmc);
    $ufmc = str_replace("'", "", $ufmc);
    $umtx = $_POST["umtx"];
    $umtx = str_replace('"', "", $umtx);
    $umtx = str_replace("'", "", $umtx);
    addonline(getuid_sid($sid),"More about me","");
  $pstyle = gettheme($sid);
      echo xhtmlhead("More About Me",$pstyle);
    echo "<p align=\"center\">";
    $uid = getuid_sid($sid);
    $exs = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_xinfo WHERE uid='".$uid."'"));
    if($exs[0]>0)
    {
        $res = sm_query("UPDATE ibwf_xinfo SET likes='".$ulik."', deslikes='".$udlk."', habitsb='".$ubht."', habitsg='".$ught."', favsport='".$ufsp."', favmusic='".$ufmc."',moretext='".$umtx."'  WHERE uid='".$uid."'");
        if($res)
        {
          echo "<img src=\"images/ok.gif\" alt=\"O\"/>Info Updated Successfully<br/><br/>";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"O\"/>Database Error!<br/><br/>";
        }
    }else{
        $res = sm_query("INSERT INTO ibwf_xinfo SET uid='".$uid."', likes='".$ulik."', deslikes='".$udlk."', habitsb='".$ubht."', habitsg='".$ught."', favsport='".$ufsp."', favmusic='".$ufmc."',moretext='".$umtx."'");
        if($res)
        {
          echo "<img src=\"images/ok.gif\" alt=\"O\"/>Info Updated Successfully<br/><br/>";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"O\"/>Database Error!<br/><br/>";
        }
    }
    echo "<a href=\"index.php?action=uxset&amp;sid=$sid\">";
echo "Extended Settings</a><br/>";
        
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
//////////////////////////////////////////Bookmark Topic/////////////////////////

else if($action=="bkmrk")

{
addonline(getuid_sid($sid),"Bookmarking a Topic","");
 $pstyle = gettheme($sid);
      echo xhtmlhead("Bookmarks",$pstyle);
    $tpcid = $_GET["tid"];

    $uid = getuid_sid($sid);

    $indiatime = time() + (addhours());

    $blah = "SELECT name FROM ibwf_topics WHERE id = '".$tpcid."'";

    $blah2 = sm_query($blah);

    while($blah3=mysqli_fetch_array($blah2)){

    $topicname=$blah3[0];

    }



    $sql = "SELECT COUNT(*) FROM ibwf_bookmarks WHERE userid='".$uid."'";

    $result = sm_query($sql);

    while($blah4=mysqli_fetch_array($result))

{

    $used=$blah4[0];

}





  if($used=='50')



{

     echo "<img src=\"images/notok.gif\" alt=\"x\"/><b> Unable To Bookmark Topic!</b><br/>";



    echo "<br/>You have reached the limit of total Bookmarks Allowed!<br/>Delete existing bookmarks if you want to bookmark more topics!";

    echo "<br/><br/><a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tpcid\">Back To Topic</a><br/><br/>";





    echo "</div></div></font></body></html>";

    exit();

}

else {

  $res = "INSERT INTO `ibwf_bookmarks` (`userid` ,`topic` ,`name` ,`time`) VALUES ('".$uid."', '".$tpcid."', '".$topicname."', '".$indiatime."')";

  $result = sm_query($res) or die("<img src=\"images/notok.gif\" alt=\"x\"/><b>Unable To Bookmark Topic!</b><br/><br/> 

  <b>Possible Reasons could be -</b> <br/>&#187;You Have Already Bookmarked This Topic!<br/>

  &#187;You Have Reached The Limit Of Total Allowed Bookmarks!<br/>

 &#187;Other Unknown Error!<br/>

 <br/><a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tpcid\">Back To Topic</a><br/><br/>

</center></div></div></font></body></html>

 ");



  if($res)

 {

            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Topic Bookmarked successfully!<br/>";

            echo "<br/><a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tpcid\">Back To Topic</a>";

            echo "<br/><br/><a href=\"index.php?action=bookmarks&amp;sid=$sid\">Go To Bookmarks</a><br/>";



 }

    else

        {

            echo "<img src=\"images/notok.gif\" alt=\"x\"/>Unable To Bookmark Topic!<br/>";

            echo "<br/><a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tpcid\">Back To Topic</a>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a>";
        echo "</p>";
  echo xhtmlfoot();
        }

   

}}



/////////////////////////Delete Bookmark////////////////////////

else if($action=="kaltibkmrk")

{
 $pstyle = gettheme($sid);
      echo xhtmlhead("Bookmarks",$pstyle);
addonline(getuid_sid($sid),"Deleting a Bookmark","");

$tpcid=$_GET["tpcid"];

$sql="DELETE FROM `ibwf_bookmarks` WHERE `id`='$tpcid'";

$res = sm_query($sql);

if($res){

echo "<img src=\"images/ok.gif\" alt=\"O\"/>Bookmark deleted!";

}else{

echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error Deleting Bookmark!";

}

echo "<br/><br/><center><a href=\"index.php?action=bookmarks&amp;sid=$sid\">Back To Bookmarks</a></center><br/><br/>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a>";
        echo "</p>";
  echo xhtmlfoot();


}
else if($action=="viewpro")
{ $pstyle = gettheme($sid);
      echo xhtmlhead("View Profile",$pstyle);
addonline(getuid_sid($sid),"Profil","");
$act = $_GET["act"];
$acts = ($act=="dis" ? 0 : 1);
echo "<p align=\"center\">";
//$uid = getuid_sid($sid);
$res = sm_query("UPDATE ibwf_users SET viewpro='".$acts."' WHERE id='".$uid."'");
if($res)
{
echo "<img src=\"images/ok.gif\" alt=\"o\"/>Profile changed!<br/>";
}else{
echo "<img src=\"images/notok.gif\" alt=\"x\"/>
It's impossible to update your profile!<br/>";
}
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a>";
        echo "</p>";
  echo xhtmlfoot();
}


else if($action=="mkroom")
{
        $rname = sm_clean($_POST["rname"]);
        $rpass = trim($_POST["rpass"]);
        addonline(getuid_sid($sid),"Creating Chatroom","");
  $pstyle = gettheme($sid);
      echo xhtmlhead("Create Room",$pstyle);
        echo "<p align=\"center\">";
        if ($rpass=="")
        {
          $cns = 1;
        }else{
            $cns = 0;
        }
        $prooms = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_rooms WHERE static='0'"));
        if($prooms[0]<10)
        {
        $res = sm_query("INSERT INTO ibwf_rooms SET name='".$rname."', pass='".$rpass."', censord='".$cns."', static='0', lastmsg='".((time() - $timeadjust) + (10*60*60))."'");
        if($res)
        {
          echo "<img src=\"images/ok.gif\" alt=\"O\"/>Room created successfully<br/><br/>";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error!<br/><br/>";
        }
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>There's already 10 users rooms<br/><br/>";
        }
        echo "<a href=\"index.php?action=uchat&amp;sid=$sid\"><img src=\"images/chat.gif\" alt=\"*\"/>Chatrooms</a><br/>";
        echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a>";
        echo "</p>";
  echo xhtmlfoot();
        
}

else if($action=="signgb")
{
    $who = $_POST["who"];
   
if(!cansigngb(getuid_sid($sid), $who))
    {
  $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
      echo "<p align=\"center\">";
      echo "You cant Sign this user guestbook<br/><br/>";
      echo "<a href=\"index.php?action=main&amp;sid=$sid\">Home</a>";
      echo "</p>";
  echo xhtmlfoot();
      exit();
    }
  $msgtxt = $_POST["msgtxt"];
  //$qut = $_POST["qut"];
  addonline(getuid_sid($sid),"Signing a guestbook","");
  $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
      echo "<p align=\"center\">";
      $crdate = (time() - $timeadjust) + $timeadjust;
      //$uid = getuid_sid($sid);
      $res = false;

    if(trim($msgtxt)!="")
      {

      $res = sm_query("INSERT INTO ibwf_gbook SET gbowner='".$who."', gbsigner='".$uid."', dtime='".$crdate."', gbmsg='".$msgtxt."'");
      }
      if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Message successfully added!";
$pmtext = "Have being signed in your guest book  [br/][br/][small][b][i]    This is an automated message and do not respond to it[/i][/b] [/small]";
$tm = time();
$res = sm_query("INSERT INTO ibwf_private SET text='".$pmtext."', byuid='".$uid."', touid='".$who."', timesent='".$tm."'");


      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Impossible to enter a message!";
      }
      echo "<br/><br/>";
          
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
      echo "</p>";
  echo xhtmlfoot();

}
else if($action=="votepl")
{
  //$uid = getuid_sid($sid);
  $plid = $_GET["plid"];
  $ans = $_GET["ans"];
  addonline(getuid_sid($sid),"Poll Voting ;)","");
  $pstyle = gettheme($sid);
      echo xhtmlhead("Poll Voting",$pstyle);
    echo "<p align=\"center\">";
    $voted = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_presults WHERE uid='".$uid."' AND pid='".$plid."'"));
    if($voted[0]==0)
    {
        $res = sm_query("INSERT INTO ibwf_presults SET uid='".$uid."', pid='".$plid."', ans='".$ans."'");
        if($res)
        {
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Thanx for your voting";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!";
        }
    }else{
        echo "<img src=\"images/notok.gif\" alt=\"x\"/>You already voted for this poll";
    }
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
else if($action=="dlpoll")
{
  //$uid = getuid_sid($sid);
  addonline(getuid_sid($sid),"Deleting Poll","");
  $pstyle = gettheme($sid);
      echo xhtmlhead("Delete Poll",$pstyle);
    echo "<p align=\"center\">";
    $pid = mysqli_fetch_array(sm_query("SELECT pollid FROM ibwf_users WHERE id='".$uid."'"));
        $res = sm_query("UPDATE ibwf_users SET pollid='0' WHERE id='".$uid."'");
        if($res)
        {
          $res = sm_query("DELETE FROM ibwf_presults WHERE pid='".$pid[0]."'");
		  $res = sm_query("DELETE FROM ibwf_pp_pres WHERE pid='".$pid[0]."'");
          $res = sm_query("DELETE FROM ibwf_polls WHERE id='".$pid[0]."'");
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Poll Deleted";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!";
        }
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

else if($action=="delan")
{
  //$uid = getuid_sid($sid);
  addonline(getuid_sid($sid),"Deleting Announcement","");
  $pstyle = gettheme($sid);
      echo xhtmlhead("Delete Announcement",$pstyle);

  $clid = $_GET["clid"];
  $anid = $_GET["anid"];
  $uid = getuid_sid($sid);
    echo "<p align=\"center\">";
    $pid = mysqli_fetch_array(sm_query("SELECT owner FROM ibwf_clubs WHERE id='".$clid."'"));
    $exs = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_announcements WHERE id='".$anid."' AND clid='".$clid."'"));
    if(($uid==$pid[0])&&($exs[0]>0))
    {
        $res = sm_query("DELETE FROM ibwf_announcements WHERE id='".$anid."'");
        if($res)
        {

            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Announcement Deleted";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!";
        }
    }else{
        echo "<img src=\"images/notok.gif\" alt=\"x\"/>Yo can't delete this announcement!";
    }
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

else if($action=="dlcl")
{
  //$uid = getuid_sid($sid);
  addonline(getuid_sid($sid),"Deleting Club","");
$pstyle = gettheme($sid);
      echo xhtmlhead("Delete Club",$pstyle);
  $clid = $_GET["clid"];
  $uid = getuid_sid($sid);
    echo "<p align=\"center\">";
    $pid = mysqli_fetch_array(sm_query("SELECT owner FROM ibwf_clubs WHERE id='".$clid."'"));
    if($uid==$pid[0])
    {
        $res = deleteClub($clid);
        if($res)
        {
          
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Club Deleted";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!";
        }
    }else{
        echo "<img src=\"images/notok.gif\" alt=\"x\"/>Yo can't delete this club!";
    }
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
//////////////////////////////////////////Select Profile Moods
else if($action=="uppmoods")
{
    addonline(getuid_sid($sid),"Updating Profile Moods","");
    $pmoodid = $_GET["pmoodid"];
 $pstyle = gettheme1("1");
    echo xhtmlhead("Updating Profile Moods",$pstyle);
  echo "<p align=\"center\">";
  //$uid = getuid_sid($sid);
  $pmoodlnk = mysqli_fetch_array(sm_query("SELECT pmoodlink FROM ibwf_profilemood WHERE id='".$pmoodid."'"));
  $res = sm_query("UPDATE ibwf_users SET pmood='".$pmoodlnk[0]."' WHERE id='".$uid."'");
  if($res)
        {
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Profile Mood Selected<br/>";
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!<br/>";
        }
        echo "<br/>";
  
echo "<b>0 </b><a accesskey=\"0\" href=\"index.php?action=main&sid=$sid\"><img src=\"images/home.gif\" alt=\"\"/>Home</a>";
echo "</p>";
  echo "</body>";
}
else if($action=="pws")
{
  //$uid = getuid_sid($sid);
  addonline(getuid_sid($sid),"Updating PWS","");
$pstyle = gettheme($sid);
      echo xhtmlhead("P.W.S",$pstyle);
  $imgt = $_POST["imgt"];
  $imgo = $_POST["imgo"];
  $smsg = $_POST["smsg"];
  $thms = $_POST["thms"];
  
  $uid = getuid_sid($sid);
    echo "<p align=\"center\">";
    if($imgt=="idc")
	{
		$imgo = "http://$stitle.co.za/smidc.php?id=$uid";
	}else if($imgt == "avt")
	{
		$av = mysqli_fetch_array(sm_query("SELECT avatar FROM ibwf_users WHERE id='".$uid."'"));
		if(strpos($av[0], "http://")===false)
		{
			$av[0] = "../".$av[0];
		}
		$imgo = $av[0];
	}else if($imgt=="sml")
	{
		$sml = mysqli_fetch_array(sm_query("SELECT imgsrc FROM ibwf_smilies WHERE scode='".strtolower(trim($imgo))."'"));
		$imgo = "../".$sml[0];
	}else
	{
		$imgo = strtolower(trim($imgo));
	}
    $smsg = trim($smsg);
	$isu = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_mypage WHERE uid='".$uid."'"));
	if ($isu[0]>0)
	{
		$res = sm_query("UPDATE ibwf_mypage SET thid='".$thms."', mimg='".$imgo."', msg='".$smsg."' WHERE uid='".$uid."'");
	}else{
		$res = sm_query("INSERT INTO ibwf_mypage SET uid='".$uid."', thid='".$thms."', mimg='".$imgo."', msg='".$smsg."'");
	}
	
    if($res)
    {
    echo "<img src=\"images/ok.gif\" alt=\"o\"/>Your Site updated successfully<br/><br/>";
	echo "<a href=\"users?".getnick_uid($uid)."\">View Your Site</a>";
    }else{
        echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!";
    }
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

else if($action=="dltpl")
{
  //$uid = getuid_sid($sid);
  $tid = $_GET["tid"];
  addonline(getuid_sid($sid),"Deleting Poll","");
$pstyle = gettheme($sid);
      echo xhtmlhead("Delete Poll",$pstyle);
    echo "<p align=\"center\">";
    $pid = mysqli_fetch_array(sm_query("SELECT pollid FROM ibwf_topics WHERE id='".$tid."'"));
        $res = sm_query("UPDATE ibwf_topics SET pollid='0' WHERE id='".$tid."'");
        if($res)
        {
          $res = sm_query("DELETE FROM ibwf_presults WHERE pid='".$pid[0]."'");
          $res = sm_query("DELETE FROM ibwf_polls WHERE id='".$pid[0]."'");
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Poll Deleted";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!";
        }
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
/*
else if($action=="reqjc")
{
  //$uid = getuid_sid($sid);
  $clid = $_GET["clid"];
  addonline(getuid_sid($sid),"Joining A Club","");
$pstyle = gettheme($sid);
      echo xhtmlhead("Join Club",$pstyle);
    echo "<p align=\"center\">";
    $uid = getuid_sid($sid);
    $isin = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubmembers WHERE uid='".$uid."' AND clid='".$clid."'"));
    if($isin[0]==0){
        $res = sm_query("INSERT INTO ibwf_clubmembers SET uid='".$uid."', clid='".$clid."', accepted='0', points='0', joined='".((time() - $timeadjust) + (10*60*60))."'");
        if($res)
        {
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Request sent! the club owner should accept your request";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!";
        }
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>You already in this club or request sent and waiting for acception";
        }
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}*/
//////////////////////////////////////////////////////////////
else if($action=="reqjc")
{
$uid = getuid_sid($sid);
$clid = $_GET["clid"];
addonline(getuid_sid($sid),"Joining A Club","");
echo "<head>";
echo "<title>$sitename</title>";
echo "</head>";
echo "<body>"; 
echo "<p align=\"center\">";
$uid = getuid_sid($sid);
$isin = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubmembers WHERE uid='".$uid."' AND clid='".$clid."'"));
if($isin[0]==0){
$res = sm_query("INSERT INTO ibwf_clubmembers SET uid='".$uid."', clid='".$clid."', accepted='0', points='0', joined='".time()."'");
if($res)
{
echo "<img src=\"images/ok.gif\" alt=\"o\"/>Request sent! The club owner should accept your request";
$clinfo = mysqli_fetch_array(sm_query("SELECT name, owner FROM ibwf_clubs WHERE id='".$clid."'"));
$pmtext = "I wanna join your [club=$clid]$clinfo[0] [/club] club[br/][br/][small](this is an auto pm)[/small]";
$tm = time();
$res = sm_query("INSERT INTO ibwf_private SET text='".$pmtext."', byuid='".$uid."', touid='".$clinfo[1]."', timesent='".$tm."'");
}else{
echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!";
}
}else{
echo "<img src=\"images/notok.gif\" alt=\"x\"/>You are already in this club or request sent and waiting for acception";
}
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
echo "</p>";
echo "</body>";
 exit(); 
}
///////////////////////////////////////////////////////////
else if($action=="unjc")
{
  //$uid = getuid_sid($sid);
  $clid = $_GET["clid"];
  addonline(getuid_sid($sid),"Unjoining club","");
$pstyle = gettheme($sid);
      echo xhtmlhead("Join Club",$pstyle);
    echo "<p align=\"center\">";
    $uid = getuid_sid($sid);
    $isin = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubmembers WHERE uid='".$uid."' AND clid='".$clid."'"));
    if($isin[0]>0){
        $res = sm_query("DELETE FROM ibwf_clubmembers WHERE uid='".$uid."' AND clid='".$clid."'");
        if($res)
        {
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Unjoined club successfully";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!";
        }
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>You're not a member of this club!";
        }
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
/*
else if($action=="acm")
{
  //$uid = getuid_sid($sid);
  $clid = $_GET["clid"];
  $who = $_GET["who"];
  addonline(getuid_sid($sid),"Adding a member to club","");
$pstyle = gettheme($sid);
      echo xhtmlhead("Add Member",$pstyle);
    echo "<p align=\"center\">";
    $uid = getuid_sid($sid);
    $cowner = mysqli_fetch_array(sm_query("SELECT owner FROM ibwf_clubs WHERE id='".$clid."'"));
    if($cowner[0]==$uid){
        $res = sm_query("UPDATE ibwf_clubmembers SET accepted='1' WHERE clid='".$clid."' AND uid='".$who."'");
        if($res)
        {
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Member added to your club";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!";
        }
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>This club ain't yours";
        }
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
*/
else if($action=="acm")
{
$pstyle = gettheme($sid);
      echo xhtmlhead("Add Member",$pstyle);
$clid = $_GET["clid"];
$who = $_GET["who"];
addonline(getuid_sid($sid),"Adding a member to club","");
echo "<head>";
echo "<title>$sitename</title>";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../themes/$theme[0]\">";
echo "</head>";
echo "<body>";
echo "<p align=\"center\">";
$uid = getuid_sid($sid);
$cowner = mysqli_fetch_array(sm_query("SELECT owner, name FROM ibwf_clubs WHERE id='".$clid."'"));
if($cowner[0]==$uid){
$res = sm_query("UPDATE ibwf_clubmembers SET accepted='1' WHERE clid='".$clid."' AND uid='".$who."'");
if($res)
{
echo "<img src=\"../images/ok.gif\" alt=\"o\"/>Member added to your club";

$pmtext = "You are now a member of the [club=$clid]$cowner[1] [/club] club[br/][br/][small](this is an auto pm)[/small]";
$tm = time();
$res = sm_query("INSERT INTO ibwf_private SET text='".$pmtext."', byuid='".$uid."', touid='".$who."', timesent='".$tm."'");



}else{
echo "<img src=\"../images/notok.gif\" alt=\"x\"/>Database Error!";
}
}else{
echo "<img src=\"../images/notok.gif\" alt=\"x\"/>This club ain't yours";
}
echo "

0 <a accesskey=\"0\" href=\"index.php?action=main&amp;sid=$sid\"><img src=\"../images/home.gif\" alt=\"\"/>Home</a>";
echo "</p>";
echo "</body>";
}

else if($action=="accall")
{
  //$uid = getuid_sid($sid);
  $clid = $_GET["clid"];
  
  addonline(getuid_sid($sid),"Adding a member to club","");
$pstyle = gettheme($sid);
      echo xhtmlhead("Add Member",$pstyle);
    echo "<p align=\"center\">";
    $uid = getuid_sid($sid);
    $cowner = mysqli_fetch_array(sm_query("SELECT owner FROM ibwf_clubs WHERE id='".$clid."'"));
    if($cowner[0]==$uid){
        $res = sm_query("UPDATE ibwf_clubmembers SET accepted='1' WHERE clid='".$clid."'");
        if($res)
        {
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>All Members Accepted";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!";
        }
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>This club ain't yours";
        }
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
/*
else if($action=="accall")
{

$clid = $_GET["clid"];

addonline(getuid_sid($sid),"Adding a member to club","");
echo "<head>";
echo "<title>$sitename</title>";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../themes/$theme[0]\">";
echo "</head>";
echo "<body>";
echo "<p align=\"center\">";
$uid = getuid_sid($sid);
$cowner = mysqli_fetch_array(sm_query("SELECT owner, name FROM ibwf_clubs WHERE id='".$clid."'"));
if($cowner[0]==$uid){

$sql = "SELECT $uid FROM ibwf_clubmembers WHERE clid='".$clid."' AND accepted='0'";
$items = sm_query($sql);
while ($item = mysqli_fetch_array($items))
{

$pmtext = "You are now a member of the [club=$clid]$cowner[1] [/club] club[br/][br/][small](this is an auto pm)[/small]";
$tm = time();
$res = sm_query("INSERT INTO ibwf_private SET text='".$pmtext."', byuid='".$uid."', touid='".$item[0]."', timesent='".$tm."'");
}
if($res){
$res = sm_query("UPDATE ibwf_clubmembers SET accepted='1' WHERE clid='".$clid."'");
if($res)
{
echo "<img src=\"../images/ok.gif\" alt=\"o\"/>All Members Accepted";
}else{
echo "<img src=\"../images/notok.gif\" alt=\"x\"/>Database Error!";
}
}else{
echo "<img src=\"../images/notok.gif\" alt=\"x\"/>This club ain't yours";
}
}
echo "

0 <a accesskey=\"0\" href=\"index.php?action=main&amp;sid=$sid\"><img src=\"../images/home.gif\" alt=\"\"/>Home</a>";
echo "</p>";
echo "</body>";
}*/
else if($action=="denall")
{
  //$uid = getuid_sid($sid);
  $clid = $_GET["clid"];
  
  addonline(getuid_sid($sid),"Adding a member to club","");
$pstyle = gettheme($sid);
      echo xhtmlhead("Add Member",$pstyle);
    echo "<p align=\"center\">";
    $uid = getuid_sid($sid);
    $cowner = mysqli_fetch_array(sm_query("SELECT owner FROM ibwf_clubs WHERE id='".$clid."'"));
    if($cowner[0]==$uid){
        $res = sm_query("DELETE FROM ibwf_clubmembers WHERE accepted='0' AND clid='".$clid."'");
        if($res)
        {
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>All Members Denied";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!";
        }
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>This club ain't yours";
        }
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
else if($action=="dcm")
{
  //$uid = getuid_sid($sid);
  $clid = $_GET["clid"];
  $who = $_GET["who"];
  addonline(getuid_sid($sid),"Deleting a member from club","");
$pstyle = gettheme($sid);
      echo xhtmlhead("Delete Member",$pstyle);
    echo "<p align=\"center\">";
    $uid = getuid_sid($sid);
    $cowner = mysqli_fetch_array(sm_query("SELECT owner FROM ibwf_clubs WHERE id='".$clid."'"));
    if($cowner[0]==$uid){
        $res = sm_query("DELETE FROM ibwf_clubmembers  WHERE clid='".$clid."' AND uid='".$who."'");
        if($res)
        {
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Member deleted from your club";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!";
        }
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>This club ain't yours";
        }
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

else if($action=="crpoll")
{
  addonline(getuid_sid($sid),"Creating Poll","");
$pstyle = gettheme($sid);
      echo xhtmlhead("Create Poll",$pstyle);
    echo "<p align=\"center\">";
    //$uid = getuid_sid($sid);
    if(getplusses(getuid_sid($sid))>=50)
    {
    $pid = mysqli_fetch_array(sm_query("SELECT pollid FROM ibwf_users WHERE id='".$uid."'"));
        if($pid[0] == 0)
        {
          $pques = $_POST["pques"];
          $opt1 = $_POST["opt1"];
          $opt2 = $_POST["opt2"];
          $opt3 = $_POST["opt3"];
          $opt4 = $_POST["opt4"];
          $opt5 = $_POST["opt5"];
          if((trim($pques)!="")&&(trim($opt1)!="")&&(trim($opt2)!=""))
          {
            $pex = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_polls WHERE pqst LIKE '".$pques."'"));
            if($pex[0]==0)
            {
              $res = sm_query("INSERT INTO ibwf_polls SET pqst='".$pques."', opt1='".$opt1."', opt2='".$opt2."', opt3='".$opt3."', opt4='".$opt4."', opt5='".$opt5."', pdt='".((time() - $timeadjust) + (10*60*60))."'");
              if($res)
              {
                $pollid = mysqli_fetch_array(sm_query("SELECT id FROM ibwf_polls WHERE pqst='".$pques."' "));
                sm_query("UPDATE ibwf_users SET pollid='".$pollid[0]."' WHERE id='".$uid."'");
                echo "<img src=\"images/ok.gif\" alt=\"O\"/>Your poll created successfully";
              }else{
                echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Eroor!";
              }
                }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>There's already a poll with the same question";
          }

          }else{
             echo "<img src=\"images/notok.gif\" alt=\"x\"/>The poll must have a question, and at least 2 options";
          }
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>You already have a poll";
          }
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>You should have at least 50 plusses to create a poll";

          }
          echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
else if($action=="pltpc")
{
  $tid = $_GET["tid"];
  addonline(getuid_sid($sid),"Creating Poll","");
$pstyle = gettheme($sid);
      echo xhtmlhead("Create Poll",$pstyle);
    echo "<p align=\"center\">";
    //$uid = getuid_sid($sid);
    if((getplusses(getuid_sid($sid))>=500)||ismod($uid))
    {
    $pid = mysqli_fetch_array(sm_query("SELECT pollid FROM ibwf_topics WHERE id='".$tid."'"));
        if($pid[0] == 0)
        {
          $pques = $_POST["pques"];
          $opt1 = $_POST["opt1"];
          $opt2 = $_POST["opt2"];
          $opt3 = $_POST["opt3"];
          $opt4 = $_POST["opt4"];
          $opt5 = $_POST["opt5"];
          if((trim($pques)!="")&&(trim($opt1)!="")&&(trim($opt2)!=""))
          {
            $pex = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_polls WHERE pqst LIKE '".$pques."'"));
            if($pex[0]==0)
            {
              $res = sm_query("INSERT INTO ibwf_polls SET pqst='".$pques."', opt1='".$opt1."', opt2='".$opt2."', opt3='".$opt3."', opt4='".$opt4."', opt5='".$opt5."', pdt='".((time() - $timeadjust) + (10*60*60))."'");
              if($res)
              {
                $pollid = mysqli_fetch_array(sm_query("SELECT id FROM ibwf_polls WHERE pqst='".$pques."' "));
                sm_query("UPDATE ibwf_topics SET pollid='".$pollid[0]."' WHERE id='".$tid."'");
                echo "<img src=\"images/ok.gif\" alt=\"O\"/>Your poll created successfully";
              }else{
                echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Eroor!";
              }
                }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>There's already a poll with the same question";
          }

          }else{
             echo "<img src=\"images/notok.gif\" alt=\"x\"/>The poll must have a question, and at least 2 options";
          }
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>This Topic Already Have A poll";
          }
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>You should have at least 500 plusses to create a poll";

          }
          echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
/////////////////////
else if($action=="likeshout")

{$pstyle = gettheme($sid);

      echo xhtmlhead("$stitle",$pstyle);
echo"<h5>Shout Like</h5>";
    addonline(getuid_sid($sid),"Shout Like","");
  $shid = isnum($_GET["shid"]);
 $uid = getuid_sid($sid);
  $shout = mysqli_fetch_array(sm_query("SELECT shout, shouter,image  FROM ibwf_shouts WHERE id='".$shid."'"));
   div();
  ECHO "<u>".getnick_uid($shout[1])."</u><small><br/>";
  if($shout[2]!==""){
   echo "<a href=\"$shout[2]\"><img src=\"$shout[2]\" alt=\"X\"/></a><br/>";
  }
  ECHO parsepm($shout[0],$sid)."</small></div><br/><br/>";
  
  
  
  $slike = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_slike WHERE uid='".$uid."' AND shid='".$shid."'"));
            if($slike[0]==0)
         {
         $res = sm_query("INSERT INTO ibwf_slike SET uid='".$uid."', shid='".$shid."', time='".time()."'");
         
		 $name = mysqli_fetch_array(sm_query("SELECT name FROM ibwf_users WHERE id='".$uid."'"));
		 
		 $msg="[user=$uid]".$name[0]."[/user] is Liked U shout[br/] ".$shout[0]."[br/]";
		 autopm($msg,$shout[1]);
		  echo "<img src=\"images/ok.gif\" alt=\"O\"/>Shout Liked Successfully";
		 }

        else{
           echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error Shout Like";
		   echo "<br/>U Must Be Liked This Shout Before";
		   
         }
               echo "<br/><br/>";
          

    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
      echo "</p>";
  echo xhtmlfoot();

}
//////////////////////////////////////////////////////



else if($action=="poke")

{
$who = isnum($_GET["who"]);
$pstyle = gettheme($sid);
$whonick = getnick_uid($who);
      echo xhtmlhead("$stitle",$pstyle);
echo"<h5>Poke $whonick</h5>";


addonline(getuid_sid($sid),"poke User","");
  
 $uid = getuid_sid($sid);

   div();

  $poke = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_poke WHERE uid='".$uid."' AND pokid='".$who."' AND view='0'"));
if($uid!==$who){
 
 if($poke[0]==0)
  {
         $res = sm_query("INSERT INTO ibwf_poke SET uid='".$uid."', pokid='".$who."', time='".time()."'");
         if($res){
		 
		  echo "<img src=\"images/ok.gif\" alt=\"O\"/>$whonick Poked Successfully";
		 }

        else{
           echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error Poke $whonick";
	         }
	}else 	 
		 echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error Poke $whonick Already poked !! Wait Until see He/Her See Ur Poke";
	} else 	 
		  echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error Poke User Self";

		 
               echo "<br/><br/>";
          
   echo "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$who\">";
echo "Back To $whonick Profile</a><br/>";

    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
      echo "</p>";
  echo xhtmlfoot();

}



/////////////////////////////////////////

else if($action=="addblg")

{$pstyle = gettheme($sid);

      echo xhtmlhead("$stitle",$pstyle);
boxstart("Add Blog");
   if(!getplusses(getuid_sid($sid))>50)
       {
            echo "Only 50+ points can add blogs<br/><br/>";
         echo "<a href=\"index.php?action=main&amp;sid=$sid\">Main Menu</a>";
         echo "</center></div></div></font></body></html>";
         exit();
       }
     $btitle = $_POST["btitle"];
     $msgtxt = $_POST["msgtxt"];
     //$qut = $_POST["qut"];
     addonline(getuid_sid($sid),"Adding a blog","");
            $crdate = time() + 12.5*60*60;
         $uid = getuid_sid($sid);
        $res = false;
            if((trim($msgtxt)!="")&&(trim($btitle)!=""))
         {
         $res = sm_query("INSERT INTO ibwf_blogs SET bowner='".$uid."', bname='".$btitle."', bgdate='".$crdate."', btext='".$msgtxt."'");
         }
         if($res)
         {
           echo "<img src=\"images/ok.gif\" alt=\"O\"/>Message Posted Successfully";
         }else{
           echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error Posting Message";
         }
               echo "<br/><br/>";
          
		  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
      echo "</p>";
  echo xhtmlfoot();

}
/////////////////////////////
else if($action=="pokeu")
{
$poid=isnum($_GET["pid"]);
$ac=$_GET["ac"];
   $pstyle = gettheme($sid);
      echo xhtmlhead("Poke",$pstyle);

  $poke = mysqli_fetch_array(sm_query("SELECT pokid,uid,view FROM ibwf_poke WHERE id='".$poid."'"));
  IF($poke[0]==$uid){
  $poke2 = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_poke WHERE uid='".$uid."' AND pokid='".$poke[1]."' AND view='0'"));
 if($poke2[0]==0)
  {
  
  if($ac=="ok"){
   $res = sm_query("INSERT INTO ibwf_poke SET uid='".$uid."', pokid='".$poke[1]."', time='".time()."'");
  sm_query("UPDATE ibwf_poke SET view='1' WHERE id='".$poid."'");
  $msg = "Poke Back";
  }
    if($ac=="off"){
 $res = sm_query("UPDATE ibwf_poke SET view='1' WHERE id='".$poid."'");
  $msg = "Poke ignored"; 
  } 
  }else {$er="Already Poked ".getnick_uid($poke[1]);}
  
  }else {$er="This Poke Is Not Urs";}
  
      
      if($res)
      {
        echo "<img src=\"images/poke.gif\" alt=\"*\"/>$msg ".getnick_uid($poke[1])." Successfully";
      }else{
	  if($er==""){
	  $er="Cant Poke Right Now!!";
	  }
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>$er";
      }

      echo "<br/><br/>";
          echo "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$poke[1]\">";
echo getname_uid($poke[1])."'s Profile</a><br/>";    
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
      echo "</p>";
  echo xhtmlfoot();

}



/////////////////////////////////////
else if($action=="addvlt")
{

if(!getplusses(getuid_sid($sid))>24)
    {
       $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
      echo "<p align=\"center\">";
      echo "Only 25+ plusses can add a vault item<br/><br/>";
      echo "<a href=\"index.php?action=main&amp;sid=$sid\">Home</a>";
      echo "</p>";
  echo xhtmlfoot();
      exit();
    }
  $viname = $_POST["viname"];
  $vilink = $_POST["vilink"];
  //$qut = $_POST["qut"];
  addonline(getuid_sid($sid),"Adding a vault item","");
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
      echo "<p align=\"center\">";
      $crdate = (time() - $timeadjust);
      //$uid = getuid_sid($sid);
      $res = false;
      
      $ext = getext($vilink);
      if ($ext=="mp3" or $ext=="amr" or $ext=="wav") {
      $type = 1;
      }
      if ($ext=="jpg" or $ext=="gif" or $ext=="png" or $ext=="bmp") {
      $type = 2;
      }
      if ($ext=="jad" or $ext=="jar") {
      $type = 3;
      }
      if ($ext=="mpg" or $ext=="3gp" or $ext=="mp4") {
      $type = 4;
      }
      if((trim($vilink)!="")&&(trim($viname)!=""))
      {
      $res = sm_query("INSERT INTO ibwf_vault SET uid='".$uid."', title='".$viname."', pudt='".(time() - $timeadjust)."', itemurl='".$vilink."', type='".$type."'");
      }
      if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Item added Successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error adding an item";
      }

      echo "<br/><br/>";
          
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
      echo "</p>";
  echo xhtmlfoot();

}
//////////////////////////////////////////shout

else if($action=="shout")
{
  $shtxt = $_POST["shtxt"];
    addonline(getuid_sid($sid),"Shouting","");

$pstyle = gettheme($sid);
      echo xhtmlhead("Shout",$pstyle);
    echo "<p align=\"center\">";
	
	if(strlen($shtxt)<10)
    {

      echo "<p align=\"center\">";
      echo "<img src=\"images/notok.gif\" alt=\"X\"/><br/>You Must Type atleast 10 characters to Shout<br/>please go back again...<br/><br/> <b>SM Rules :p</b><br/>";
      echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"\"/>Home</a>";
      echo "</p>";
   echo xhtmlfoot();
      exit();
  }
	
	if(!isvip(getuid_sid($sid))){
  $sql = mysqli_fetch_array(sm_query("SELECT  shtime  FROM ibwf_shouts ORDER BY shtime DESC LIMIT 1"));	
$magic=$sql[0]+60*15;

	if($magic>time())
    {

      echo "<p align=\"center\">";
      echo "<img src=\"images/stop.gif\" alt=\"X\"/><br/>Dont Flood In Shout<br/>please Try ";
       echo "<b>".gettimemsg($magic-time())."</b><br/> Or";
	    echo "<img src=\"images/star.gif\" alt=\"\"/><a href=\"other.php?action=getprem&amp;sid=$sid\">SM Premium User!</a><img src=\"images/star.gif\" alt=\"\"/> Any Time Shout<br/>";
	  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"\"/>Home</a>";
      echo "</p>";
   echo xhtmlfoot();
      exit();
  }
	}


if(istrashed(getuid_sid($sid)))
{  

echo "<p align=\"center\">";
echo "<img src=\"images/notok.gif\" alt=\"X\"/><br/>Unknown error cannot shout!<br/>please try again later...<br/><br/>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"\"/>Home</a>";
echo "</p>";
echo xhtmlfoot();
      exit();

    }

	
	
    if(getplusses(getuid_sid($sid))<75)
    {
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>You should have at least 75 plusses to shout!";
    }else{
	
	$clr=$_POST["clr"];
	 if($clr=="") {
	$shtxt = $shtxt;
	 
	 }else{
	 $shtxt="[clr=$clr]$shtxt\[/clr]";
	 }
	 $shtm = time();
  ////////////////////////////////////////////////////////
  
  if ($_POST['action'] == 'image') {
   $plus=15;
 $handle = new Upload($_FILES['f1']);
     if ($handle->uploaded) {
    
       $handle->image_resize            = true;
       $handle->image_ratio_y           = true;
       $handle->image_x                 = 150;
        $handle->Process('upload/shouts');
        
         if ($handle->processed) {
               $imageurl = "upload/shouts/$handle->file_dst_name";
              echo "<a href=\"$imageurl\"><img src=\"$imageurl\" alt=\"shout\"/></a><br/>";
  
			  
 $res = sm_query("INSERT INTO ibwf_shouts SET image='".$imageurl."',shout='".$shtxt."', shouter='".$uid."', shtime='".$shtm."'");			   
			   } else{
              
              echo '  file not uploaded to the wanted location<br/>';
              echo '  Error: ' . $handle->error . '<br/>';
           }
          $handle-> Clean();
       }else{
	 echo '  file not uploaded on the server<br/>';
          echo '  Error: ' . $handle->error . '<br/>';
      }

   
 
  }
  else{
  $plus=5;
  $res = sm_query("INSERT INTO ibwf_shouts SET shout='".$shtxt."', shouter='".$uid."', shtime='".$shtm."'");
  }
/////////////////////////////////////////////////	
  
    if($res)
    {
	$plu=getplusses($uid);
	$plu=$plu-$plus;
	
	sm_query("UPDATE ibwf_users SET plusses='".$plu."' WHERE id='".$uid."'");
	
	
    $shts = mysqli_fetch_array(sm_query("SELECT shouts from ibwf_users WHERE id='".$uid."'"));
    $shts = $shts[0]+1;
    sm_query("UPDATE ibwf_users SET shouts='".$shts."' WHERE id='".$uid."'");
    divok();
	echo "<img src=\"images/ok.gif\" alt=\"O\"/>Shout added successfully</div>";
    div();
   echo "<center>".parsepm($shtxt,$sid)."</center></div><br/>";
	
	}else{ diver();
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Shout added Unsuccessfully</div>";
    }
            }
			
			
		 echo "<p align=\"center\">";	
         echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
    echo "</p>";
  echo xhtmlfoot();
}

//////////////////////////////////////////Announce

else if($action=="annc")
{
  $antx = $_POST["antx"];
  $clid = $_GET["clid"];
    addonline(getuid_sid($sid),"Announcing","");
$cow = mysqli_fetch_array(sm_query("SELECT owner FROM ibwf_clubs WHERE id='".$clid."'"));
    $uid = getuid_sid($sid);
$pstyle = gettheme($sid);
      echo xhtmlhead("Announce",$pstyle);
    echo "<p align=\"center\">";
    if($cow[0]!=$uid)
    {
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>This is not your club!";
    }else{
      $shtxt = $shtxt;
    //$uid = getuid_sid($sid);
    $shtm = (time() - $timeadjust) + $timeadjust;
    $res = sm_query("INSERT INTO ibwf_announcements SET antext='".$antx."', clid='".$clid."', antime='".$shtm."'");
    if($res)
    {
    echo "<img src=\"images/ok.gif\" alt=\"O\"/>Announcement Added!";
    }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
    }
            }
         echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
    echo "</p>";
  echo xhtmlfoot();
}

else if($action=="rateb")
{
  $brate = $_POST["brate"];
  $bid = $_GET["bid"];
  addonline(getuid_sid($sid),"Rating a blog","");
  //$uid = getuid_sid($sid);
  
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  $vb = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_brate WHERE uid='".$uid."' AND blogid='".$bid."'"));
  if($vb[0]==0)
  {
    $res = sm_query("INSERT INTO ibwf_brate SET uid='".$uid."', blogid='".$bid."', brate='".$brate."'");
    if($res)
    {
        echo "<img src=\"images/ok.gif\" alt=\"o\"/>Blog rated successfully<br/>";
    }else{
        echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!<br/>";
    }
  }else{
    echo "<img src=\"images/notok.gif\" alt=\"x\"/>You have rated this blog before<br/>";
  }
  echo "<br/><br/>";
      
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
  
}

else if($action=="delfgb")
{
    $mid = $_GET["mid"];
  addonline(getuid_sid($sid),"Deleting GB Message","");
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  if(candelgb(getuid_sid($sid), $mid))
  {
    $res = sm_query("DELETE FROM ibwf_gbook WHERE id='".$mid."'");
    if($res)
        {
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Message Deleted From Guestbook<br/>";
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!<br/>";
        }
  }else{
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>You can't delete this message";
  }
  echo "<br/><br/>";
      
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

else if($action=="delvlt")
{
    $vid = $_GET["vid"];
  addonline(getuid_sid($sid),"Deleting Vault Item","");
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  $itemowner = mysqli_fetch_array(sm_query("SELECT uid FROM ibwf_vault WHERE id='".$vid."'"));
  if(ismod(getuid_sid($sid))||getuid_sid($sid)==$itemowner[0])
  {
    $res = sm_query("DELETE FROM ibwf_vault WHERE id='".$vid."'");
    if($res)
        {
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Item Deleted From Vault<br/>";
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!<br/>";
        }
  }else{
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>You can't delete this item";
  }
  echo "<br/><br/>";
      
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

else if($action=="delbl")
{
    $bid = $_GET["bid"];
  addonline(getuid_sid($sid),"Deleting A Blog","");
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  if(candelbl(getuid_sid($sid), $bid))
  {
    $res = sm_query("DELETE FROM ibwf_blogs WHERE id='".$bid."'");
    if($res)
        {
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Blog Deleted<br/>";
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!<br/>";
        }
  }else{
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>You can't delete this blog";
  }
  echo "<br/><br/>";
      
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
else if($action=="rpost")
{
  $pid = $_GET["pid"];
  addonline(getuid_sid($sid),"Reporting Post","");
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  $pinfo = mysqli_fetch_array(sm_query("SELECT reported FROM ibwf_posts WHERE id='".$pid."'"));
          if($pinfo[0]=="0")
          {
          $str = sm_query("UPDATE ibwf_posts SET reported='1' WHERE id='".$pid."' ");
          if($str)
          {
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>Post reported to mods successfully";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Can't report post at the moment";
          }
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>This Post is already reported";
          }
          echo "<br/><br/>";
      
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
        
        
}


else if($action=="rtpc")
{
  $tid = $_GET["tid"];
  addonline(getuid_sid($sid),"Reporting Topic","");
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  $pinfo = mysqli_fetch_array(sm_query("SELECT reported FROM ibwf_topics WHERE id='".$tid."'"));
          if($pinfo[0]=="0")
          {
          $str = sm_query("UPDATE ibwf_topics SET reported='1' WHERE id='".$tid."' ");
          if($str)
          {
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>Topic reported to mods successfully";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Can't report topic at the moment";
          }
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>This Topic is already reported";
          }
          echo "<br/><br/>";
      
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();


}
else if($action=="addgal")
{
     $itemurl = $_POST["itemurl"];
  $description = $_POST["description"];
   $uid = getuid_sid($sid);
  $nopl = mysqli_fetch_array(sm_query("SELECT sex FROM ibwf_users WHERE id='".$uid."'"));
  if($nopl[0]=='M')
  {
    $usex = "M";
  }else if($nopl[0]=='F'){
    $usex = "F";
  }else{
    $usex = "M";
  }
      
        echo "<head>";
  echo "<title>AddGal</title>";
  echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../themes/$theme[0]\">";
  echo "</head>";
  echo "<body>";
       echo "<p align=\"center\">";
       // disabled itemurl
     $res = sm_query("INSERT INTO ibwf_usergallery SET uid='".$uid."', itemurl='".$itemurl."', sex='".$usex."', description='".$description."'");
       $res = sm_query("INSERT INTO ibwf_usergallery SET uid='".$uid."', file='".$file."', sex='".$usex."'");
      if($res)
      {
        echo "<img src=\"../images/ok.gif\" alt=\"O\"/>User Photo Added<br/>";
      }else{
        echo "<img src=\"../images/ok.gif\" alt=\"X\"/>User Photo Added<br/>";
      }
   
      echo "<a href=\"gallery.php?action=main&amp;sid=$sid\">User Gallery</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"../images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
  echo "</body>";
}
else if($action=="bud")
{
  $todo = $_GET["todo"];
  $who = $_GET["who"];
  addonline(getuid_sid($sid),"Adding/Removing Buddy","");
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  //$uid = getuid_sid($sid);
    $unick = getnick_uid($uid);
    $tnick = getnick_uid($who);
  if($todo=="add")
  {
    if(budres($uid,$who)!=3){
    if(arebuds($uid,$who))
    {
      echo "<img src=\"images/notok.gif\" alt=\"x\"/>$tnick is already your buddy<br/>";
    }else if(budres($uid, $who)==0)
    {
        $res = sm_query("INSERT INTO ibwf_buddies SET uid='".$uid."', tid='".$who."', reqdt='".((time() - $timeadjust) + (1*60*60))."'");
        if($res)
        {
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>A request has been sent to $tnick<br/>";
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>You can't add $tnick to your buddy list<br/>";
        }
    }
else if(budres($uid, $who)==1)
{
$res = sm_query("UPDATE ibwf_buddies SET agreed='1' WHERE uid='".$who."' AND tid='".$uid."'");
if($res)
{
echo "<img src=\"images/ok.gif\" alt=\"o\"/>$tnick Have accepted your request!";
$pmtext = "Your Buddy Request Have been Accepted** [br/][br/]";
$tm = time();
$res = sm_query("INSERT INTO ibwf_private SET text='".$pmtext."', byuid='".$uid."', touid='".$who."', timesent='".$tm."'");
}else{
echo "<img src=\"images/notok.gif\" alt=\"x\"/>Added to your buddy list successfully!";
}
}
else{
echo "<img src=\"images/notok.gif\" alt=\"x\"/>You can't add $tnick to your buddy list!";
}
}else{
echo "<img src=\"images/notok.gif\" alt=\"x\"/>You can't add $tnick to your buddy list!";
}
}else if($todo="del")
{
$res= sm_query("DELETE FROM ibwf_buddies WHERE (uid='".$uid."' AND tid='".$who."') OR (uid='".$who."' AND tid='".$uid."')");
if($res)
{
echo "<img src=\"images/ok.gif\" alt=\"o\"/>$tnick Is no longer your friend";
$pmtext = "Dont wona be friends!** [br/][br/]";
$tm = time();
$res = sm_query("INSERT INTO ibwf_private SET text='".$pmtext."', byuid='".$uid."', touid='".$who."', timesent='".$tm."'");
}else{
echo "<img src=\"images/notok.gif\" alt=\"x\"/>can't remove $tnick from your buddy list!";
}

}
      
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

//////////////////////////////////////////Update buddy message
else if($action=="upbmsg")
{
    addonline(getuid_sid($sid),"Updating Buddy message","");
    $bmsg = $_POST["bmsg"];
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  //$uid = getuid_sid($sid);
  $res = sm_query("UPDATE ibwf_users SET budmsg='".$bmsg."' WHERE id='".$uid."'");
  if($res)
        {
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Buddy message updated successfully<br/>";
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>can't update your buddy message<br/>";
        }
        echo "<br/>";
  echo "<a href=\"lists.php?action=buds&amp;sid=$sid\">";
echo "Buddies List</a><br/>";
         
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

//////////////////////////////////////////Select Avatar
else if($action=="upav")
{
    addonline(getuid_sid($sid),"Updating Avatar","");
    $avid = $_GET["avid"];
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  //$uid = getuid_sid($sid);
  $avlnk = mysqli_fetch_array(sm_query("SELECT avlink FROM ibwf_avatars WHERE id='".$avid."'"));
  $res = sm_query("UPDATE ibwf_users SET avatar='".$avlnk[0]."' WHERE id='".$uid."'");
  if($res)
        {
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Avatar Selected<br/>";
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!<br/>";
        }
        echo "<br/>";
  
         
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

//////////////////////////////////////////Select Avatar
else if($action=="upavg")
{
    addonline(getuid_sid($sid),"Updating Avatar","");
    $avid = $_GET["id"];
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  $avlnk = mysqli_fetch_array(sm_query("SELECT imageurl,uid FROM ibwf_usergallery WHERE id='".$avid."'"));
  if($avlnk[1]==$uid){
  $res = sm_query("UPDATE ibwf_users SET avatar='".$avlnk[0]."' WHERE id='".$uid."'");
  if($res)
        {
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Avatar Selected<br/>";
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!<br/>";
        }
		}else{
		        echo "<img src=\"images/notok.gif\" alt=\"x\"/>this Photo Not Yours<br/>";
		
		}
        echo "<br/>";
  
         
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

//////////////////////////////////////////Select Avatar
else if($action=="upcm")
{
    addonline(getuid_sid($sid),"Updating Chatmood","");
    $cmid = $_GET["cmid"];
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  //$uid = getuid_sid($sid);
  $res = sm_query("UPDATE ibwf_users SET chmood='".$cmid."' WHERE id='".$uid."'");
  if($res)
        {
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Mood Selected<br/>";
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!<br/>";
        }
        echo "<br/>";
echo "<a href=\"index.php?action=chat&amp;sid=$sid\">";
echo "Chatrooms</a><br/>";
         
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}




//////////////////////////////////////////Give credits
else if($action=="plusses")
{
    addonline(getuid_sid($sid),"Sharing Credits","");
    $who = isnum($_GET["who"]);
    $ptg = isnum($_POST["ptg"]);
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  //$uid = getuid_sid($sid);
  $gpsf = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
  $gpst = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$who."'"));
  if($gpsf[0]>=$ptg){
    $gpsf = $gpsf[0]-$ptg;
    $gpst = $gpst[0]+$ptg;
    $res = sm_query("UPDATE ibwf_users SET plusses='".$gpst."' WHERE id='".$who."'");
  if($res)
        {
          $ad = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$who."'"));
          $res = sm_query("UPDATE ibwf_users SET plusses='".$gpsf."' WHERE id='".$uid."'");
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Credits Updated Successfully<br/>";
			
				$wintext = "".getnick_uid($uid)." Shared  $ptg Credits With u..Now U hv $gpst  credits![br/][i] p.s. note: This is an automatic pm from $stitle service centre[/i]";
				$res = sm_query("INSERT INTO ibwf_private SET text='".$wintext."', byuid='".$uid."', touid='".$who."', timesent='".time()."'");
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!<br/>";
        }
      }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>You don't have enough Credits to give<br/>";
        }

        echo "<br/>";
  
         
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

else if($action=="coins")
{
    addonline(getuid_sid($sid),"Sharing Coins","");
    $who = isnum($_GET["who"]);
    $ptg = isnum($_POST["ptg"]);
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  //$uid = getuid_sid($sid);
  $gpsf = mysqli_fetch_array(sm_query("SELECT coins FROM ibwf_users WHERE id='".$uid."'"));
  $gpst = mysqli_fetch_array(sm_query("SELECT coins FROM ibwf_users WHERE id='".$who."'"));
  if($gpsf[0]>=$ptg){
    $gpsf = $gpsf[0]-$ptg;
    $gpst = $gpst[0]+$ptg;
    $res = sm_query("UPDATE ibwf_users SET coins='".$gpst."' WHERE id='".$who."'");
  if($res)
        {
          $ad = mysqli_fetch_array(sm_query("SELECT coins FROM ibwf_users WHERE id='".$who."'"));
          $res = sm_query("UPDATE ibwf_users SET coins='".$gpsf."' WHERE id='".$uid."'");
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Coins Updated Successfully<br/>";
			
				$wintext = "".getnick_uid($uid)." Shared  $ptg Coins With u..Now U hv $gpst  Coins![br/][i] p.s. note: This is an automatic pm from $stitle service centre[/i]";
				$res = sm_query("INSERT INTO ibwf_private SET text='".$wintext."', byuid='".$uid."', touid='".$who."', timesent='".time()."'");
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!<br/>";
        }
      }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>You don't have enough Coins to give<br/>";
        }

        echo "<br/>";
  
         
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
//////////////////////////////////////////Give GPs
else if($action=="givegp")
{
    addonline(getuid_sid($sid),"Giving Game Plusses","");
    $who = $_GET["who"];
    $ptg = $_POST["ptg"];
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  //$uid = getuid_sid($sid);
  $gpsf = mysqli_fetch_array(sm_query("SELECT gplus FROM ibwf_users WHERE id='".$uid."'"));
  $gpst = mysqli_fetch_array(sm_query("SELECT gplus FROM ibwf_users WHERE id='".$who."'"));
  if($gpsf[0]>=$ptg){
    $gpsf = $gpsf[0]-$ptg;
    $gpst = $gpst[0]+$ptg;
    $res = sm_query("UPDATE ibwf_users SET gplus='".$gpst."' WHERE id='".$who."'");
  if($res)
        {
          $res = sm_query("UPDATE ibwf_users SET gplus='".$gpsf."' WHERE id='".$uid."'");
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>Game Plusses Updated Successfully<br/>";
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!<br/>";
        }
      }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>You don't have enough GPs to give<br/>";
        }

        echo "<br/>";
  
         
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}


//////////////////////////////////////////Give GPs
else if($action=="batp")
{
    addonline(getuid_sid($sid),"Giving Game Plusses","");
    $who = $_GET["who"];
    $ptg = $_POST["ptbp"];
    $giv = $_POST["giv"];
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  //$uid = getuid_sid($sid);
  $judg = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_judges WHERE uid='".getuid_sid($sid)."'"));
  $gpst = mysqli_fetch_array(sm_query("SELECT battlep FROM ibwf_users WHERE id='".$who."'"));
  if(ismod(getuid_sid($sid))||$judg[0]>0)
  {
    if ($giv=="1")
    {
        $gpst = $gpst[0]+$ptg;
    }else{
        $gpst = $gpst[0]-$ptg;
        if($gpst<0)$gpst=0;
    }
    $res = sm_query("UPDATE ibwf_users SET battlep='".$gpst."' WHERE id='".$who."'");
  if($res)
        {
          $vnick = getname_uid($who);
          if ($giv=="1")
          {
            $ms1 = " Added $ptg points to ";
          }else{
            $ms1 = " removed $ptg points from ";
          }
$msg="[user=".getuid_sid($sid)."]".getname_uid(getuid_sid($sid))."[/user] $ms1 [user=".$who."]".$vnick."[/user]";
		  modlog("bpoints","$msg");
		  
		  
		  
              echo "<img src=\"images/ok.gif\" alt=\"o\"/>Battle Points Updated Successfully<br/>";
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>Database Error!<br/>";
        }
      }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>You can't do this<br/>";
        }

        echo "<br/>";

         
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

/////////////////////////////Add remove from ignoire list

else if($action=="ign")
{
    addonline(getuid_sid($sid),"Updating ignore list","");
    $todo = $_GET["todo"];
    $who = $_GET["who"];
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  //$uid = getuid_sid($sid);
  $tnick = getnick_uid($who);
  if($todo=="add")
  {
    if(ignoreres($uid, $who)==1)
    {
      $res= sm_query("INSERT INTO ibwf_ignore SET name='".$uid."', target='".$who."'");
    if($res)
        {
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>$tnick was added successfully to your ignore list<br/>";
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>Error Updating Database<br/>";
        }
    }else{
        echo "<img src=\"images/notok.gif\" alt=\"x\"/>You can't Add $tnick to your ignore list<br/>";
    }
  }else if($todo="del")
  {
    if(ignoreres($uid, $who)==2)
    {
      $res= sm_query("DELETE FROM ibwf_ignore WHERE name='".$uid."' AND target='".$who."'");
      if($res)
        {
            echo "<img src=\"images/ok.gif\" alt=\"o\"/>$tnick was deleted successfully from your ignore list<br/>";
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"x\"/>Error Updating Database<br/>";
        }
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"x\"/>$tnick is not ignored by you<br/>";
      }
  }
  echo "<br/><a href=\"lists.php?action=ignl&amp;sid=$sid\">";
echo "Ignore List</a><br/>";
         
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

//////////////////////////////////////////Update profile
else if($action=="uprof")
{
    addonline(getuid_sid($sid),"Updating Settings","");
 
	///////////////////////////////////
    
	 $uby = $_POST["bdyy"]; 
	  $ubm = $_POST["bdym"]; 
	  $ubd = $_POST["bdyd"]; 
	  $ubday = "$uby-$ubm-$ubd";
	/////////////////////////////////
    $uloc = $_POST["uloc"];
    $usig = $_POST["usig"];
    $usex = $_POST["usex"];
	$umood = $_POST["umood"];
	
	 if((!isblocked($uloc,$uid))&&(!isblocked($usig,$uid)))
    {

$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  //$uid = getuid_sid($sid);
  $res = sm_query("UPDATE ibwf_users SET  birthday='".$ubday."', location='".$uloc."',signature='".$usig."', sex='".$usex."', mood='".$umood."' WHERE id='".$uid."'");
  if($res)
  {
    echo "<img src=\"images/ok.gif\" alt=\"o\"/>Your profile was updated successfully<br/>";
  }else{
    echo "<img src=\"images/notok.gif\" alt=\"x\"/>Error updating your profile<br/>";
  }
  
  }else{
  $bantime = time() + (7*24*60*60) ;
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>";
    echo " No Spam...You as a result of your stupid action:<br/>1. you have lost your sheild<br/>2. you have lost all your Credits<br/>3. You are BANNED!";
    sm_query("INSERT INTO ibwf_penalties SET uid='".$uid."', penalty='1', exid='1', timeto='".$bantime."', pnreas='Banned: Automatic Ban for spamming'");
    sm_query("UPDATE ibwf_users SET plusses='0', shield='0' WHERE id='".$byuid."'");

  }
  
  echo "<br/><a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$uid\">My Profile</a><br/>";
  
  
  echo "<br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

//////////////////////////////////////////Update Site Settings
else if($action=="ustset")
{
    addonline(getuid_sid($sid),"Updating Settings","");
    
    $showcons = $_POST["showcons"];
    $showtime = $_POST["showtime"];
    $showshout = $_POST["showshout"];
    $theme = $_POST["theme"];
    $sitelang = $_POST["sitelang"];
    $showshortkey = $_POST["showshortkey"];
    
    $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  //$uid = getuid_sid($sid);
  
  $res = sm_query("UPDATE ibwf_users SET showicon='".$showcons."' WHERE id='".$uid."'");
  $res = sm_query("UPDATE ibwf_users SET showtime='".$showtime."' WHERE id='".$uid."'");
  $res = sm_query("UPDATE ibwf_users SET showshout='".$showshout."' WHERE id='".$uid."'");  
  $res = sm_query("UPDATE ibwf_users SET themeid='".$theme."' WHERE id='".$uid."'");
  $res = sm_query("UPDATE ibwf_users SET lang='".$sitelang."' WHERE id='".$uid."'");
  $res = sm_query("UPDATE ibwf_users SET showshortkey='".$showshortkey."' WHERE id='".$uid."'");
  

  if($res)
  {
    echo "<img src=\"images/ok.gif\" alt=\"o\"/>Your Site Settings was updated successfully<br/>";
  }else{
    echo "<img src=\"images/notok.gif\" alt=\"x\"/>Error updating your Site Settings<br/>";
  }
  echo "<br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

//////////////////////////////////////////Update profile
else if($action=="shsml")
{
    addonline(getuid_sid($sid),"Updating Smilies","");
    $act = $_GET["act"];
    $acts = ($act=="dis" ? 0 : 1);
    $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  //$uid = getuid_sid($sid);
  $res = sm_query("UPDATE ibwf_users SET hvia='".$acts."' WHERE id='".$uid."'");
  if($res)
  {
    echo "<img src=\"images/ok.gif\" alt=\"o\"/>Smilies Visibility updated successfully<br/>";
  }else{
    echo "<img src=\"images/notok.gif\" alt=\"x\"/>Error updating your profile<br/>";
  }
  echo "<br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

//////////////////////////////////////////Change Password

else if($action=="upwd")
{
    addonline(getuid_sid($sid),"Updating Settings","");
    $npwd = $_POST["npwd"];
    $cpwd = $_POST["cpwd"];

    $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  //$uid = getuid_sid($sid);
  if($npwd!=$cpwd)
  {
    echo "<img src=\"images/notok.gif\" alt=\"x\"/>Your Password and Confirm Password Doesn't match<br/>";
    
  }else if((strlen($npwd)<4) || (strlen($npwd)>15)){
    echo "<img src=\"images/notok.gif\" alt=\"x\"/>Your password should be between 4 and 15 letters only<br/>";

  }else{
    $pwd = md5($npwd);
    $res = sm_query("UPDATE ibwf_users SET pass='".$pwd."' WHERE id='".$uid."'");
    if($res)
  {
   sm_query("UPDATE ibwf_users SET pass2='".$cpwd."' WHERE id='".$uid."'");
    echo "<img src=\"images/ok.gif\" alt=\"o\"/>Your password was updated successfully<br/>";
  }else{
    echo "<img src=\"images/notok.gif\" alt=\"x\"/>Error updating your password<br/>";
  }
  }
  echo "<br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
 echo "</p>";
  echo xhtmlfoot();
}

else if($action=="addcl")
{
///////////////////////////////
 addonline(getuid_sid($sid),"Adding Club","");
$clnm = $_POST["clnm"];
$clds = $_POST["clds"];
$clrl = $_POST["clrl"];



$pstyle = gettheme($sid);
      echo xhtmlhead("Adding Club",$pstyle);
    echo "<p align=\"center\">";
    $uid = getuid_sid($sid);
    if(isvip($uid))
    {
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubs WHERE owner='".$uid."'"));
      if($noi[0]<5)
      {
        if(($clnm=="")||($clds=="")||($clrl==""))
        {
          echo "<img src=\"images/notok.gif\" alt=\"X\"/>Please be sure to fill, club name, description and rules";
        }else{
          $nmex = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubs WHERE name LIKE '".$clnm."'"));
          if($nmex[0]>0)
          {
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Club Name Already exist";
          }else{
 ///////////////////////////////////////////////          
if ($_POST['action'] == 'image') {
 $handle = new Upload($_FILES['f1']);
     if ($handle->uploaded) {
    
       $handle->image_resize            = true;
       $handle->image_ratio_y           = true;
       $handle->image_x                 = 150;
        $handle->Process('upload/clublogo');
        
         if ($handle->processed) {
               $imageurl = "upload/clublogo/$handle->file_dst_name";
              echo "<a href=\"$imageurl\"><img src=\"$imageurl\" alt=\"shout\"/></a><br/>";
  
$res = sm_query("INSERT INTO ibwf_clubs SET name='".$clnm."', owner='".$uid."', description='".$clds."', rules='".$clrl."', logo='".$imageurl."', plusses='0', created='".(time() + (10*60*60))."'");
      			  
		   } else{
              
              echo '  file not uploaded to the wanted location<br/>';
              echo '  Error: ' . $handle->error . '<br/>';
           }
          $handle-> Clean();
       }else{
	 echo '  file not uploaded on the server<br/>';
          echo '  Error: ' . $handle->error . '<br/>';
      }}

/////////////////////////////////////////////////////
		         if($res)
            {
              $clid = mysqli_fetch_array(sm_query("SELECT id FROM ibwf_clubs WHERE owner='".$uid."' AND name='".$clnm."'"));
                echo "<img src=\"images/ok.gif\" alt=\"O\"/>Congratulations! Your $clnm Now Opened!!";
                sm_query("INSERT INTO ibwf_clubmembers SET uid='".$uid."', clid='".$clid[0]."', accepted='1', points='50', joined='".(time() + (10*60*60))."'");
     
            echo "<br/><a href=\"index.php?action=gocl&amp;sid=$sid&amp;cid=$clid[0]\">";
echo "GO Ur Club Now!!</a><br/>";
                $fnm = $clnm;
                $cnm = $clnm;
                sm_query("INSERT INTO ibwf_forums SET name='".$fnm."', position='0', cid='0', clubid='".$clid[0]."'");
                sm_query("INSERT INTO ibwf_rooms SET name='".$cnm."', pass='', static='1', mage='0', chposts='0', perms='0', censord='0', freaky='0', lastmsg='".(time() + (10*60*60))."', clubid='".$clid[0]."'");
            }else{
                echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error!";
            }
          }
        }
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>You already have 5 clubs";
      }
      }else{

      echo "<img src=\"images/notok.gif\" alt=\"X\"/>You cant add clubs";
      }


    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
 exit();
    }
else if($action=="givemylike")
{
$givewho = $_GET["who"];
$pstyle = gettheme($sid);
    echo xhtmlhead("Give Love Point",$pstyle);
echo "<p align=\"center\">";

$lovewho = getuid_sid($sid);
if($lovewho!==$givewho){
$stampiti = mysqli_fetch_array(sm_query("SELECT lovegiven FROM ibwf_users WHERE id='$lovewho'"));
$ti = timeleft($stampiti[0]);
if($ti==""){
$stampit = time() + 60*15;
sm_query("UPDATE ibwf_users SET lovegiven='$stampit' WHERE id='$lovewho'");
sm_query("UPDATE ibwf_users SET love=love+1 WHERE id='$givewho'");
$lovenick = getname_uid($lovewho);
$msg = "congratulations [user=".$lovewho."]".$lovenick."[/user] has sent you his/her Like [br/][small][i]p.s: this is an automated pm[/i][/small]";
autopm($msg, $givewho);
print "You have now given your love Point !";
}else{
$t = timeleft($stampiti[0]);
print "you have <b>".$t."</b> <br/>before you can give Like again!";
}
}else {echo"U Cant  Give Like Ur Self";}
    $unick = getnick_uid($givewho);
echo "<br/><br/><b>Back To :</b> <a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$givewho\">$unick";
echo " Profile</a><br/>";	
	
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
exit();
}

else if($action=="rentpc")
{
  $tid = $_GET["tid"];
  $tname = $_POST["tname"];
  $fid = getfid_tid($tid);
 $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  $otname = gettname($tid);
   $tinfo= mysqli_fetch_array(sm_query("SELECT name,fid, authorid, text, pinned, closed  FROM ibwf_topics WHERE id='".$tid."'"));
if($tinfo[2]==getuid_sid($sid))
  {
  if(trim($tname!=""))
  {
    $not = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topics WHERE name LIKE '".$tname."' AND fid='".$fid."'"));
    if($not[0]==0)
    {
  $res = sm_query("UPDATE ibwf_topics SET name='".$tname."' WHERE id='".$tid."'");
  if($res)
          {
            //sm_query("INSERT INTO ibwf_mlog SET action='topics', details='<b>".getnick_uid(getuid_sid($sid))."</b> Renamed The thread ".sm_clean($otname)." to ".sm_clean($tname)." at the forum ".getfname($fid)."', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>Topic  Renamed";
          }}
		  else
		  {
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Topic Name already exist";
          }
  }
  else
  {
    echo "<img src=\"images/notok.gif\" alt=\"X\"/> You must specify a name for the topic";
  }
    
  }
  else{
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>shame! Dont be an Ass hole to rename others topic!! Fuck u off from $stitle b4 $stitle kick u out!!";
	$wintext = "".getnick_uid($uid)." Tried to Rename others topic!!";
	$res = sm_query("INSERT INTO ibwf_private SET text='".$wintext."', byuid='".$uid."', touid='1', timesent='".time()."'");
  }
  echo "<br/><br/>";
  echo "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tid\">";
echo "View Topic</a><br/>";
$fname = getfname($fid);
      echo "<a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$fid\">";
echo "$fname</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}
else if($action=="edttpc")
{
$uid=getuid_sid($sid);
  $tid = $_GET["tid"];
  $ttext = $_POST["ttext"];
  $fid = getfid_tid($tid);
 $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  $tinfo= mysqli_fetch_array(sm_query("SELECT name,fid, authorid, text, pinned, closed  FROM ibwf_topics WHERE id='".$tid."'"));
if($tinfo[2]==getuid_sid($sid))
  {
  $res = sm_query("UPDATE ibwf_topics SET text='"
  .$ttext."' WHERE id='".$tid."'");
  if($res)
          {
            //sm_query("INSERT INTO ibwf_mlog SET action='topics', details='<b>".getnick_uid(getuid_sid($sid))."</b> Edited the text Of the thread ".sm_clean(gettname($tid))." at the forum ".getfname($fid)."', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>Topic Message Edited";
          }}else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Wata shame! Dont be an Ass hole to edit others topic!! Fuck u off from $stitle b4 $stitle kick u out!";
			$wintext = "".getnick_uid($uid)." Tried to edit others topic!!";
	$res = sm_query("INSERT INTO ibwf_private SET text='".$wintext."', byuid='".$uid."', touid='1', timesent='".time()."'");
          }
  echo "<br/><br/>";
  echo "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tid\">";
echo "View Topic</a><br/>";
$fname = getfname($fid);
      echo "<a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$fid\">";
echo "$fname</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}
else if($action=="delt")
{

  $tid = $_GET["tid"];
  $fid = getfid_tid($tid);
 $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  $tname=gettname($tid);
  $tinfo= mysqli_fetch_array(sm_query("SELECT name,fid, authorid, text, pinned, closed  FROM ibwf_topics WHERE id='".$tid."'"));
if($tinfo[2]==getuid_sid($sid))
  {
  $res = sm_query("DELETE FROM ibwf_topics WHERE id='".$tid."'");
  if($res)
          {
            sm_query("DELETE FROM ibwf_posts WHERE tid='".$tid."'");
            //sm_query("INSERT INTO ibwf_mlog SET action='topics', details='<b>".getnick_uid(getuid_sid($sid))."</b> Deleted The thread ".sm_clean($tname)." at the forum ".getfname($fid)."', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>Topic Deleted";
          }}else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Wata shame! Dont be an Ass hole to Delete others topic!! Fuck u off from $stitle b4 $stitle kick u out!";
			$wintext = "".getnick_uid($uid)." Tried to delete others topic!!";
	$res = sm_query("INSERT INTO ibwf_private SET text='".$wintext."', byuid='".$uid."', touid='1', timesent='".time()."'");
          }
  echo "<br/><br/>";
  
$fname = getfname($fid);
      echo "<a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$fid\">";
echo "$fname</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}
////////////////////////////////////////////Edit Post

else if($action=="edtpst")
{
  $pid = $_GET["pid"];
  $ptext = $_POST["ptext"];
  $tid = gettid_pid($pid);
  $fid = getfid_tid($tid);
 $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
   $pinfo= mysqli_fetch_array(sm_query("SELECT uid,tid, text  FROM ibwf_posts WHERE id='".$pid."'"));
  if($pinfo[0]==getuid_sid($sid))
  {
  $res = sm_query("UPDATE ibwf_posts SET text='"
  .$ptext."' WHERE id='".$pid."'");
  if($res)
          {
            $tname = mysqli_fetch_array(sm_query("SELECT name FROM ibwf_topics WHERE id='".$tid."'"));
            //sm_query("INSERT INTO ibwf_mlog SET action='posts', details='<b>".getnick_uid(getuid_sid($sid))."</b> Edited Post Number $pid Of the thread ".sm_clean($tname[0])." at the forum ".getfname($fid)."', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>Post Message Edited";
          }}else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Wata shame! Dont be an Ass hole to Delete others Posts!! Fuck u off from $stitle b4 $stitle kick u out!";
			$wintext = "".getnick_uid($uid)." Tried to delete others posts!!";
	$res = sm_query("INSERT INTO ibwf_private SET text='".$wintext."', byuid='".$uid."', touid='1', timesent='".time()."'");
          }
  echo "<br/><br/>";
  echo "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tid\">";
echo "View Topic</a><br/>";
$fname = getfname($fid);
      echo "<a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$fid\">";
echo "$fname</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}
else if($action=="clot")
{
  $tid = $_GET["tid"];
  $tdo = $_GET["tdo"];
  $fid = getfid_tid($tid);
 $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  $tinfo= mysqli_fetch_array(sm_query("SELECT name,fid, authorid, text, pinned, closed  FROM ibwf_topics WHERE id='".$tid."'"));
if($tinfo[2]==getuid_sid($sid))
  {
  $res = sm_query("UPDATE ibwf_topics SET closed='"
  .$tdo."' WHERE id='".$tid."'");
  if($res)
          {
            if($tdo==1)
            {
              $msg = "Closed";
            }else{
                $msg = "Opened";
            }
            //sm_query("INSERT INTO ibwf_mlog SET action='topics', details='<b>".getnick_uid(getuid_sid($sid))."</b> Closed The thread ".sm_clean(gettname($tid))." at the forum ".getfname($fid)."', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>Topic $msg";
			$tpci = mysqli_fetch_array(sm_query("SELECT name, authorid FROM ibwf_topics WHERE id='".$tid."'"));
			$tname = htmlspecialchars($tpci[0]);
			$msg = "your thread [topic=$tid]$tname"."[/topic] is $msg"."[br/][small][i]p.s: this is an automatic pm[/i][/small]";
			autopm($msg, $tpci[1]);
          }}else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Wata shame! Dont be an Ass hole to close others topic!! Fuck u off from $stitle b4 $stitle kick u out!";
			$wintext = "".getnick_uid($uid)." Tried to close others topic!!";
	$res = sm_query("INSERT INTO ibwf_private SET text='".$wintext."', byuid='".$uid."', touid='1', timesent='".time()."'");
          }
  echo "<br/><br/>";
  
$fname = getfname($fid);
      echo "<a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$fid\">";
echo "$fname</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}



////////////////////////////////////////////
else{
   $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
  echo "<p align=\"center\">";
  echo "I don't know how did you get into here, but there's nothing to show<br/><br/>";
      
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

?>
