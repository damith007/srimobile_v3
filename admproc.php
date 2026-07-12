<?php
include("core.php");
include("config.php");
include("xhtmlfunctions.php");
include('class.upload.php');
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\"\"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">";


connectdb();
$action = $_GET["action"];
$sid = $_GET["sid"];
mylog($sid);
$uid=getuid_sid($sid);
banned($uid);
if(!isadmin(getuid_sid($sid)))
  {$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("action");
      echo "<p align=\"center\">";
      echo "You are not an admin<br/>";
      echo "<br/>";
      echo "<a href=\"index.php\">Home</a>";
      echo "</p>";
      echo "</body>";
      echo "</html>";
      exit();
    }


    addonline(getuid_sid($sid),"Admin CP","");
if($action=="general")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);

  $xtm = $_POST["sesp"];
  $fmsg = $_POST["fmsg"];
  $areg = $_POST["areg"];
  $pmaf = $_POST["pmaf"];
  $fvw = $_POST["fvw"];
  if($areg=="d")
  {
    $arv = 0;
  }else{
    $arv = 1;
  }
   echo "<p align=\"center\">";
      
      
      $res = sm_query("UPDATE ibwf_settings SET value='".$fmsg."' WHERE name='4ummsg'");
      if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Forum Message  updated successfully<br/>";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error Updating Forum message<br/>";
      }
      
      
      $res = sm_query("UPDATE ibwf_settings SET value='".$xtm."' WHERE name='sesxp'");
      if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Session Period updated successfully<br/>";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error Updating Session Period<br/>";
      }
      
       $res = sm_query("UPDATE ibwf_settings SET value='".$pmaf."' WHERE name='pmaf'");
      if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>PM antiflood is $pmaf seconds<br/>";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error Updating PM antiflood value<br/>";
      }
      
      $res = sm_query("UPDATE ibwf_settings SET value='".$arv."' WHERE name='reg'");
      
      if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Registration updated successfully<br/>";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error Updating Registration<br/>";
      }
      
      $res = sm_query("UPDATE ibwf_settings SET value='".$fvw."' WHERE name='fview'");

      if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Forums View updated successfully<br/>";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error Updating Forums View<br/>";
      }
      echo "<br/>";
      
      echo "<a href=\"admincp.php?action=general&amp;sid=$sid\">";
  echo "Edit general settings</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p></body>";
}

//////////////////////////Add moderating
else if($action=="pmall")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
 echo "<p align=\"center\">";
$who = $_POST["who"];
$pmtou = $_POST["pmtou"];
$byuid = getuid_sid($sid);

$tm = time();
if($who=="all"){
$lastpm = mysqli_fetch_array(sm_query("SELECT MAX(timesent) FROM ibwf_private WHERE byuid='".$byuid."'"));
echo "All users has been send a pm<br/>";
$pms = sm_query("SELECT id, name FROM ibwf_users WHERE lastact>'".$tm24."'");
$tm = time();
while($pm=mysqli_fetch_array($pms))
{
sm_query("INSERT INTO ibwf_private SET text='Public Anouncment:[br/]".$pmtou."[br/]This message was sent to all the members', byuid='".$byuid."', touid='".$pm[0]."', timesent='".$tm."'");
}
}else if($who=="staff"){
$lastpm = mysqli_fetch_array(sm_query("SELECT MAX(timesent) FROM ibwf_private WHERE byuid='".$byuid."'"));
echo "All users has been send a pm<br/>";
$pms = sm_query("SELECT id, name FROM ibwf_users WHERE perm>0");
$tm = time();
while($pm=mysqli_fetch_array($pms))
{
sm_query("INSERT INTO ibwf_private SET text='Staff Anouncment:[br/]".$pmtou."[br/]This message was sent to all staff', byuid='".$byuid."', touid='".$pm[0]."', timesent='".$tm."'");
}
}

else if($who=="mods"){
$lastpm = mysqli_fetch_array(sm_query("SELECT MAX(timesent) FROM ibwf_private WHERE byuid='".$byuid."'"));
echo "All users has been send a pm<br/>";
$pms = sm_query("SELECT id, name FROM ibwf_users WHERE perm>1");
$tm = time();
while($pm=mysqli_fetch_array($pms))
{
sm_query("INSERT INTO ibwf_private SET text='Staff Anouncment:[br/]".$pmtou."[br/]This message was sent to all Mods', byuid='".$byuid."', touid='".$pm[0]."', timesent='".$tm."'");
}
}
else if($who=="owners"){
$lastpm = mysqli_fetch_array(sm_query("SELECT MAX(timesent) FROM ibwf_private WHERE byuid='".$byuid."'"));
echo "All users has been send a pm<br/>";
$pms = sm_query("SELECT id, name FROM ibwf_users WHERE perm>4");
$tm = time();
while($pm=mysqli_fetch_array($pms))
{
sm_query("INSERT INTO ibwf_private SET text='Staff Anouncment:[br/]".$pmtou."[br/]This message was sent to all owners', byuid='".$byuid."', touid='".$pm[0]."', timesent='".$tm."'");
}
}
else if($who=="admin"){
$lastpm = mysqli_fetch_array(sm_query("SELECT MAX(timesent) FROM ibwf_private WHERE byuid='".$byuid."'"));
echo "All users has been send a pm<br/>";
$pms = sm_query("SELECT id, name FROM ibwf_users WHERE perm>2");
$tm = time();
while($pm=mysqli_fetch_array($pms))
{
sm_query("INSERT INTO ibwf_private SET text='Staff Anouncment:[br/]".$pmtou."[br/]This message was sent to all admin', byuid='".$byuid."', touid='".$pm[0]."', timesent='".$tm."'");
}
}
else if($who=="headadmin"){
$lastpm = mysqli_fetch_array(sm_query("SELECT MAX(timesent) FROM ibwf_private WHERE byuid='".$byuid."'"));
echo "All users has been send a pm<br/>";
$pms = sm_query("SELECT id, name FROM ibwf_users WHERE perm>3");
$tm = time();
while($pm=mysqli_fetch_array($pms))
{
sm_query("INSERT INTO ibwf_private SET text='Staff Anouncment:[br/]".$pmtou."[br/]This message was sent to all head admin', byuid='".$byuid."', touid='".$pm[0]."', timesent='".$tm."'");
}
}
else if($who=="online"){
  $lastpm = mysqli_fetch_array(sm_query("SELECT MAX(timesent) FROM ibwf_private WHERE byuid='".$byuid."'"));
echo "<p align=\"center\">";
  echo "All online users where sent this pm<br/>";
  $pms = sm_query("SELECT userid FROM ibwf_online");
  $tm = time();
  while($pm=mysqli_fetch_array($pms))
  {
  sm_query("INSERT INTO ibwf_private SET text='[b]Public Anouncment:[/b][br/]".$pmtou."[br/][i]This message was sent to online users at this moment in time[/i]', byuid='".$byuid."', touid='".$pm[0]."', timesent='".$tm."'");
  }
}
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p></body>";
}

////////////////////////////////////
else if($action=="addfmod")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("addfmod");
   $mid = $_POST["mid"];
  $fid = $_POST["fid"];
      echo "<p align=\"center\">";
      $res = sm_query("INSERT INTO ibwf_modr SET name='".$mid."', forum='".$fid."'");
      if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Moding Privileges Added<br/>";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error<br/>";
      }
      echo "<br/><br/><a href=\"admincp.php?action=manmods&amp;sid=$sid\">";
  echo "Manage Moderators</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p></body>";
}
else if($action=="delclub")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("delclub");
  $clid = $_GET["clid"];
      echo "<p align=\"center\">";
      $res = deleteClub($clid);
      if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Club Deleted<br/>";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error<br/>";
      }
      
      echo "<br/><br/><a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p></body>";
}

else if($action=="gccp")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("gccp");
  $clid = $_GET["clid"];
  $plss = $_POST["plss"];
      echo "<p align=\"center\">";
      $nop = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_clubs WHERE id='".$clid."'"));
	  $newpl = $nop[0] + $plss;
	  $res = sm_query("UPDATE ibwf_clubs SET plusses='".$newpl."' WHERE id='".$clid."'");
      if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Club plusses updated<br/>";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error<br/>";
      }
      
      echo "<br/><br/><a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p></body>";
}

else if($action=="delfmod")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("delfmod");
    $mid = $_POST["mid"];
  $fid = $_POST["fid"];
       echo "<p align=\"center\">";
      $res = sm_query("DELETE FROM ibwf_modr WHERE name='".$mid."' AND forum='".$fid."'");
      if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Moding Privileges Deleted<br/>";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error<br/>";
      }
      echo "<br/><br/><a href=\"admincp.php?action=manmods&amp;sid=$sid\">";
  echo "Manage Moderators</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p></body>";
}
///////////////////////////////////////

else if($action=="addcat")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("addcat");
  $fcname = $_POST["fcname"];
  $fcpos = $_POST["fcpos"];
        echo "<p align=\"center\">";
        echo $fcname;
        echo "<br/>";
        $res = sm_query("INSERT INTO ibwf_fcats SET name='".$fcname."', position='".$fcpos."'");
        
        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Forum Category added successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error adding Forum Category";
      }

      echo "<br/><br/><a href=\"admincp.php?action=fcats&amp;sid=$sid\">";
  echo "Forum Categories</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}
else if($action=="addfrm")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("addfrm");
  $frname = $_POST["frname"];
  $frpos = $_POST["frpos"];
  $fcid = $_POST["fcid"];
       echo "<p align=\"center\">";
        echo $frname;
        echo "<br/>";
        $res = sm_query("INSERT INTO ibwf_forums SET name='".$frname."', position='".$frpos."', cid='".$fcid."'");

        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Forum  added successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error adding Forum ";
      }

      echo "<br/><br/><a href=\"admincp.php?action=forums&amp;sid=$sid\">";
  echo "Forums</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}

else if($action=="addsml")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("addsml");
  $smlcde = $_POST["smlcde"];
  /////////////////////////////////////////////////////////
  if ($_POST['action'] == 'image') {
 $handle = new Upload($_FILES['f1']);
     if ($handle->uploaded) {
    
       $handle->image_resize            = true;
       $handle->image_ratio_y           = true;
       $handle->image_x                 = 150;
        $handle->Process('smilies');
        
         if ($handle->processed) {
               $imageurl = "smilies/$handle->file_dst_name";
              echo "<a href=\"$imageurl\"><img src=\"$imageurl\" alt=\"shout\"/></a><br/>";
  
 $res = sm_query("INSERT INTO ibwf_smilies SET scode='".$smlcde."', imgsrc='".$imageurl."', hidden='0'");
   			  
		   } else{
              
              echo '  file not uploaded to the wanted location<br/>';
              echo '  Error: ' . $handle->error . '<br/>';
           }
          $handle-> Clean();
       }else{
	 echo '  file not uploaded on the server<br/>';
          echo '  Error: ' . $handle->error . '<br/>';
      }}

  
  
  
  //////////////////////////////////////////////////////////////////////////////
        echo "<p align=\"center\">";
        echo "<br/>";
        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Smilie  added successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error adding Smilie ";
      }

      echo "<br/><br/><a href=\"admincp.php?action=addsml&amp;sid=$sid\">";
  echo "Add Another Smilie</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}

else if($action=="addavt")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("addavt");
  $avtsrc = $_POST["avtsrc"];
        echo "<p align=\"center\">";
	  echo "Source: ".$avtsrc;

        echo "<br/>";
        $res = sm_query("INSERT INTO ibwf_avatars SET avlink='".$avtsrc."'");

        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Avatar  added successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error adding Avatar ";
      }

      echo "<br/><br/><a href=\"admincp.php?action=addavt&amp;sid=$sid\">";
  echo "Add Another Avatar</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}

else if($action=="addjdg")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("addjdg");
  $who = $_GET["who"];
       echo "<p align=\"center\">";
        echo "<br/>";
        $res = sm_query("INSERT INTO ibwf_judges SET uid='".$who."'");

        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Judge  added successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error adding Judge ";
      }

      echo "<br/><br/><a href=\"admincp.php?action=chuinfo&amp;sid=$sid\">";
  echo "Users Info</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}

else if($action=="deljdg")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("deljdg");
  $who = $_GET["who"];
      echo "<p align=\"center\">";
        echo "<br/>";
        $res = sm_query("DELETE FROM ibwf_judges WHERE uid='".$who."'");

        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Judge  deleted successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error deleting Judge ";
      }

      echo "<br/><br/><a href=\"admincp.php?action=chuinfo&amp;sid=$sid\">";
  echo "Users Info</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}

else if($action=="delsm")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("delete SM");
  $smid = $_GET["smid"];
      echo "<p align=\"center\">";
        echo "<br/>";
  $res = sm_query("DELETE FROM ibwf_smilies WHERE id='".$smid."'");
       //$res = sm_query("UPDATE `ibwf_smilies` SET `hidden` = '1' WHERE `ibwf_smilies`.`id` ='".$smid."'");
        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Smilie  deleted successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error deleting smilie ";
      }

      echo "<br/><br/><a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}

else if($action=="addrss")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("addrss");
  $rssnm = $_POST["rssnm"];
  $rsslnk = $_POST["rsslnk"];
  $rssimg = $_POST["rssimg"];
  $rssdsc = $_POST["rssdsc"];
  $fid = $_POST["fid"];
  
       echo "<p align=\"center\">";
        echo $rssnm;
        echo "<br/>";
        $res = sm_query("INSERT INTO ibwf_rss SET title='".$rssnm."', link='".$rsslnk."', imgsrc='".$rssimg."', dscr='".$rssdsc."', fid='".$fid."'");

        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Source added successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error adding RSS Source";
      }

      echo "<br/><br/><a href=\"admincp.php?action=manrss&amp;sid=$sid\">";
  echo "Manage RSS</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}

else if($action=="addchr")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("addchr");
  $chrnm = $_POST["chrnm"];
  $chrage = $_POST["chrage"];
  $chrpst = $_POST["chrpst"];
  $chrprm = $_POST["chrprm"];
  $chrcns = $_POST["chrcns"];
  $chrfun = $_POST["chrfun"];
  
  

       echo "<p align=\"center\">";
        echo $chrnm;
        echo "<br/>";
        $res = sm_query("INSERT INTO ibwf_rooms SET name='".$chrnm."', static='1', pass='', mage='".$chrage."', chposts='".$chrpst."', perms='".$chrprm."', censord='".$chrcns."' , freaky='".$chrfun."'");

        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Chatroom added successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error adding Chat room";
      }

      echo "<br/><br/><a href=\"admincp.php?action=chrooms&amp;sid=$sid\">";
  echo "Chatrooms</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}

else if($action=="edtrss")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("edtrss");
  $rssnm = $_POST["rssnm"];
  $rsslnk = $_POST["rsslnk"];
  $rssimg = $_POST["rssimg"];
  $rssdsc = $_POST["rssdsc"];
  $fid = $_POST["fid"];
  $rssid = $_POST["rssid"];
       echo "<p align=\"center\">";
        echo $rssnm;
        echo "<br/>";
        $res = sm_query("UPDATE ibwf_rss SET title='".$rssnm."', link='".$rsslnk."', imgsrc='".$rssimg."', dscr='".$rssdsc."', fid='".$fid."' WHERE id='".$rssid."'");

        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Source updated successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error updating RSS Source";
      }

      echo "<br/><br/><a href=\"admincp.php?action=manrss&amp;sid=$sid\">";
  echo "Manage RSS</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}

else if($action=="addperm")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("addperm");
  $fid = $_POST["fid"];
  $gid = $_POST["gid"];
      echo "<p align=\"center\">";
        echo "<br/>";
        $res = sm_query("INSERT INTO ibwf_acc SET fid='".$fid."', gid='".$gid."'");

        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Permission  added successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error adding permission ";
      }

      echo "<br/><br/><a href=\"admincp.php?action=addperm&amp;sid=$sid\">";
  echo "Add Permission</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}

//////////////////////////////////////////Update profile

else if($action=="uprof")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("uprof");
    
    $who = $_GET["who"];
    $unick = $_POST["unick"];
    $perm = $_POST["perm"];
    $savat = $_POST["savat"];
    $semail = $_POST["semail"];
    $usite = $_POST["usite"];
    $ubday = $_POST["ubday"];
    $uloc = $_POST["uloc"];
    $usig = $_POST["usig"];
    $usex = $_POST["usex"];
    echo "<p align=\"center\">";
  $onk = mysqli_fetch_array(sm_query("SELECT name FROM ibwf_users WHERE id='".$who."'"));
  $exs = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE name='".$unick."'"));
  if($onk[0]!=$unick)
  {
	  if($exs[0]>0)
	  {
		echo "<img src=\"images/notok.gif\" alt=\"x\"/>New nickname already exist, choose another one<br/>";
	  }else
  {
  $res = sm_query("UPDATE ibwf_users SET avatar='".$savat."', email='".$semail."', site='".$usite."', birthday='".$ubday."', location='".$uloc."', signature='".$usig."', sex='".$usex."', name='".$unick."', perm='".$perm."' WHERE id='".$who."'");
  if($res)
  {
    echo "<img src=\"images/ok.gif\" alt=\"o\"/>$unick's profile was updated successfully<br/>";
  }else{
    echo "<img src=\"images/notok.gif\" alt=\"x\"/>Error updating $unick's profile<br/>";
  }
  }
  }else
  {
  $res = sm_query("UPDATE ibwf_users SET avatar='".$savat."', email='".$semail."', site='".$usite."', birthday='".$ubday."', location='".$uloc."', signature='".$usig."', sex='".$usex."', name='".$unick."', perm='".$perm."' WHERE id='".$who."'");
  if($res)
  {
    echo "<img src=\"images/ok.gif\" alt=\"o\"/>$unick's profile was updated successfully<br/>";
  }else{
    echo "<img src=\"images/notok.gif\" alt=\"x\"/>Error updating $unick's profile<br/>";
  }
  }
  echo "<br/><a href=\"admincp.php?action=chuinfo&amp;sid=$sid\">";
  echo "Users Info</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p></body>";
}
/////////////user password
else if($action=="upwd")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("upwd");
    
    $npwd = $_POST["npwd"];
    $who = $_GET["who"];
    echo "<p align=\"center\">";
  
   if((strlen($npwd)<4) || (strlen($npwd)>15)){
    echo "<img src=\"images/notok.gif\" alt=\"x\"/>password should be between 4 and 15 letters only<br/>";

  }else{
    $pwd = md5($npwd);
    $res = sm_query("UPDATE ibwf_users SET pass='".$pwd."' WHERE id='".$who."'");
    if($res)
  {
    echo "<img src=\"images/ok.gif\" alt=\"o\"/>password was updated successfully<br/>";
  }else{
    echo "<img src=\"images/notok.gif\" alt=\"x\"/>Error updating password<br/>";
  }
}
echo "<br/><a href=\"admincp.php?action=chuinfo&amp;sid=$sid\">";
  echo "Users Info</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p></body>";
}
///////////////add group
else if($action=="addgrp")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("addgrp");
  $frname = $_POST["ugname"];
  $ugaa = $_POST["ugaa"];
  $allus = $_POST["allus"];
  $mage = $_POST["mage"];
  $mpst = $_POST["mpst"];
  $mpls = $_POST["mpls"];
  
        echo "<p align=\"center\">";
        echo $ugname;
        echo "<br/>";
        $res = sm_query("INSERT INTO ibwf_groups SET name='".$ugname."', autoass='".$ugaa."', userst='".$allus."', mage='".$mage."', posts='".$mpst."', plusses='".$mpls."'");

        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>User group  added successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error adding User group";
      }

      echo "<br/><br/><a href=\"admincp.php?action=ugroups&amp;sid=$sid\">";
  echo "UGroups</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}
else if($action=="edtfrm")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("edtfrm");
  $fid = $_POST["fid"];
  $frname = $_POST["frname"];
  $frpos = $_POST["frpos"];
  $fcid = $_POST["fcid"];
        echo "<p align=\"center\">";
        echo $frname;
        echo "<br/>";
        $res = sm_query("UPDATE ibwf_forums SET name='".$frname."', position='".$frpos."', cid='".$fcid."' WHERE id='".$fid."'");

        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Forum  updated successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error updating Forum ";
      }

      echo "<br/><br/><a href=\"admincp.php?action=forums&amp;sid=$sid\">";
  echo "Forums</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}
else if($action=="edtcat")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("edtcat");
  $fcid = $_POST["fcid"];
  $fcname = $_POST["fcname"];
  $fcpos = $_POST["fcpos"];
       echo "<p align=\"center\">";
        echo $fcname;
        echo "<br/>";
        $res = sm_query("UPDATE ibwf_fcats SET name='".$fcname."', position='".$fcpos."' WHERE id='".$fcid."'");

        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Forum Category updated successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error updating Forum Category";
      }

      echo "<br/><br/><a href=\"admincp.php?action=fcats&amp;sid=$sid\">";
  echo "Forum Categories</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}
else if($action=="delfrm")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("delfrm");
  $fid = $_POST["fid"];
      echo "<p align=\"center\">";
        
        echo "<br/>";
        $res = sm_query("DELETE FROM ibwf_forums WHERE id='".$fid."'");

        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Forum  deleted successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error deleting Forum ";
      }

      echo "<br/><br/><a href=\"admincp.php?action=forums&amp;sid=$sid\">";
  echo "Forums</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}
else if($action=="delpms")
{
  $pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("delpms");
       echo "<p align=\"center\">";

        echo "<br/>";
        $res = sm_query("DELETE FROM ibwf_private WHERE reported!='1' AND starred='0' AND unread='0'");

        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>All PMS except starred, reported, and unread were deleted";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error!";
      }

      echo "<br/><br/><a href=\"admincp.php?action=clrdta&amp;sid=$sid\">";
  echo "Clear Data</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}

else if($action=="clrmlog")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("clrmlog");
      echo "<p align=\"center\">";

        echo "<br/>";
        $res = sm_query("DELETE FROM ibwf_mlog");
        
        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>ModLog Cleared Successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error!";
      }

      echo "<br/><br/><a href=\"admincp.php?action=clrdta&amp;sid=$sid\">";
  echo "Clear Data</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}

else if($action=="delsht")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("delsht");

          echo "<p align=\"center\">";
        $altm = time()-(5*24*60*60);
        echo "<br/>";
        $res = sm_query("DELETE FROM ibwf_shouts WHERE shtime<'".$altm."'");

        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Shouts Older Than 5 days were deleted";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error!";
      }

      echo "<br/><br/><a href=\"admincp.php?action=clrdta&amp;sid=$sid\">";
  echo "Clear Data</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}

else if($action=="delgrp")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("delgrp");
  $ugid = $_POST["ugid"];
     echo "<p align=\"center\">";

        echo "<br/>";
        $res = sm_query("DELETE FROM ibwf_groups WHERE id='".$ugid."'");

        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>UGroup  deleted successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error deleting UGroup";
      }

      echo "<br/><br/><a href=\"admincp.php?action=ugroups&amp;sid=$sid\">";
  echo "UGroups</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}

else if($action=="delrss")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("delrss");
  $rssid = $_POST["rssid"];
       echo "<p align=\"center\">";
        echo "<br/>";
        $res = sm_query("DELETE FROM ibwf_rss WHERE id='".$rssid."'");

        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Source  deleted successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
      }

      echo "<br/><br/><a href=\"admincp.php?action=manrss&amp;sid=$sid\">";
  echo "Manage RSS</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}

else if($action=="delchr")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("delchr");
  $chrid = $_POST["chrid"];
       echo "<p align=\"center\">";
        echo "<br/>";
        $res = sm_query("DELETE FROM ibwf_rooms WHERE id='".$chrid."'");

        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Room  deleted successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
      }

      echo "<br/><br/><a href=\"admincp.php?action=chrooms&amp;sid=$sid\">";
  echo "Chatrooms</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}

else if($action=="delu")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("delu");
  $who = $_GET["who"];
        echo "<p align=\"center\">";

        echo "<br/>";
   $res = sm_query("DELETE FROM ibwf_buddies WHERE tid='".$who."' OR uid='".$who."'");
    $res = sm_query("DELETE FROM ibwf_gbook WHERE gbowner='".$who."' OR gbsigner='".$who."'");
    $res = sm_query("DELETE FROM ibwf_ignore WHERE name='".$who."' OR target='".$who."'");
    $res = sm_query("DELETE FROM ibwf_mangr WHERE uid='".$who."'");
    $res = sm_query("DELETE FROM ibwf_modr WHERE name='".$who."'");
    $res = sm_query("DELETE FROM ibwf_penalties WHERE uid='".$who."' OR exid='".$who."'");
    $res = sm_query("DELETE FROM ibwf_posts WHERE uid='".$who."'");
    $res = sm_query("DELETE FROM ibwf_private WHERE byuid='".$who."' OR touid='".$who."'");
    $res = sm_query("DELETE FROM ibwf_shouts WHERE shouter='".$who."'");
    $res = sm_query("DELETE FROM ibwf_topics WHERE authorid='".$who."'");
    $res = sm_query("DELETE FROM ibwf_brate WHERE uid='".$who."'");
    $res = sm_query("DELETE FROM ibwf_games WHERE uid='".$who."'");
    $res = sm_query("DELETE FROM ibwf_presults WHERE uid='".$who."'");
    $res = sm_query("DELETE FROM ibwf_vault WHERE uid='".$who."'");
    $res = sm_query("DELETE FROM ibwf_blogs WHERE bowner='".$who."'");
    $res = sm_query("DELETE FROM ibwf_chat WHERE chatter='".$who."'");
    $res = sm_query("DELETE FROM ibwf_chat WHERE who='".$who."'");
    $res = sm_query("DELETE FROM ibwf_chonline WHERE uid='".$who."'");
    $res = sm_query("DELETE FROM ibwf_online WHERE userid='".$who."'");
    $res = sm_query("DELETE FROM ibwf_ses WHERE uid='".$who."'");
    $res = sm_query("DELETE FROM ibwf_xinfo WHERE uid='".$who."'");
    deleteMClubs($who);
      $res = sm_query("DELETE FROM ibwf_users WHERE id='".$who."'");

        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>User  deleted successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error deleting User";
      }

      echo "<br/><br/><a href=\"admincp.php?action=chuinfo&amp;sid=$sid\">";
  echo "User info</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}


//////////// Delete users posts
else if($action=="delxp")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("delxp");
  $who = $_GET["who"];
      echo "<p align=\"center\">";

        echo "<br/>";
    $res = sm_query("DELETE FROM ibwf_posts WHERE uid='".$who."'");
    $res = sm_query("DELETE FROM ibwf_topics WHERE authorid='".$who."'");
      

        if($res)
      {
	  sm_query("UPDATE ibwf_users SET plusses='0' where id='".$who."'");
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>User Posts deleted successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error deleting UPosts";
      }

      echo "<br/><br/><a href=\"admincp.php?action=chuinfo&amp;sid=$sid\">";
  echo "User info</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}
else if($action=="delcat")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("delcat");
  $fcid = $_POST["fcid"];
      echo "<p align=\"center\">";
        echo $fcname;
        echo "<br/>";
        $res = sm_query("DELETE FROM ibwf_fcats WHERE id='".$fcid."'");

        if($res)
      {
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Forum Category deleted successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error deleting Forum Category";
      }

      echo "<br/><br/><a href=\"admincp.php?action=fcats&amp;sid=$sid\">";
  echo "Forum Categories</a><br/>";
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}
//////////////////////////////
else if($action=="logo")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("Uploding logo");
 if ($_POST['action'] == 'image') {
 $handle = new Upload($_FILES['f1']);
     if ($handle->uploaded) {
    
       $handle->image_resize            = true;
       $handle->image_ratio_y           = true;
       $handle->image_x                 = 150;
        $handle->Process('logo');
        
         if ($handle->processed) {
               $imageurl = "logo/$handle->file_dst_name";
              echo "<a href=\"$imageurl\"><img src=\"$imageurl\" alt=\"shout\"/></a><br/>";
  
			  
   $res = sm_query("INSERT INTO ibwf_logo SET image='".$imageurl."',uid='".$uid."', permisson='1', time='".time()."'");
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

 if($res)
      {
	 
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Logo Uploaded successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error Logo Uploding";
      }

      echo "<br/><a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}
////////////////////////////////////////////
else if($action=="avatar")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("Uploding avatar");
 if ($_POST['action'] == 'image') {
 $handle = new Upload($_FILES['f1']);
     if ($handle->uploaded) {
    
       $handle->image_resize            = true;
       $handle->image_ratio_y           = true;
       $handle->image_x                 = 150;
        $handle->Process('avatars');
        
         if ($handle->processed) {
               $imageurl = "avatars/$handle->file_dst_name";
              echo "<a href=\"$imageurl\"><img src=\"$imageurl\" alt=\"shout\"/></a><br/>";
  
			  
   $res = sm_query("INSERT INTO ibwf_avatars SET avlink='".$imageurl."'");
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

 if($res)
      {
	 
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Avatar Uploaded successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error avatar Uploding";
      }

      echo "<br/><a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}

///////////////////////////////////
else if($action=="shop")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
	
	$itemname = $_POST["itemname"];
  $itmeprice = $_POST["itmeprice"];
  $itemshopid = $_POST["itemshopid"];
  $avail = $_POST["avail"];

	
boxstart("Uploding shop");
 if ($_POST['action'] == 'image') {
 $handle = new Upload($_FILES['f1']);
     if ($handle->uploaded) {
    
       $handle->image_resize            = true;
       $handle->image_ratio_y           = true;
       $handle->image_x                 = 150;
        $handle->Process('images/shop');
        
         if ($handle->processed) {
               $imageurl = "images/shop/$handle->file_dst_name";
              echo "<a href=\"$imageurl\"><img src=\"$imageurl\" alt=\"shout\"/></a><br/>";
  
		$res = sm_query("INSERT INTO `ibwf_shop` (`itemid`, `icon`, `itemname`, `itmeprice`, `itemshopid`, `avail`) VALUES (NULL, '".$imageurl."', '".$itemname."', '".$itmeprice."', '".$itemshopid."', '".$avail."')");	  
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

 if($res)
      {
	 
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Shop Uploaded successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error Shop Uploding";
      }

      echo "<br/><a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}
/////////////////////////////
///////////////////////////////////
else if($action=="chatmoods")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
	
	$text = $_POST["text"];
  $desr = $_POST["desr"];


	
boxstart("Uploding moods");
 if ($_POST['action'] == 'image') {
 $handle = new Upload($_FILES['f1']);
     if ($handle->uploaded) {
    
       $handle->image_resize            = true;
       $handle->image_ratio_y           = true;
       $handle->image_x                 = 150;
        $handle->Process('moods');
        
         if ($handle->processed) {
               $imageurl = "moods/$handle->file_dst_name";
              echo "<a href=\"$imageurl\"><img src=\"$imageurl\" alt=\"shout\"/></a><br/>";
  
		$res = sm_query("INSERT INTO `ibwf_moods` (`id`, `text`, `img`, `dscr`) VALUES (NULL, '".$text."', '".$imageurl."', '".$desr."')");	  
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

 if($res)
      {
	 
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>Chatmoods Uploaded successfully";
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error Chatmoods Uploding";
      }

      echo "<br/><a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}

///////////////////////////////////
////////////////////////////
else if($action=="upprem")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("Add Premium");
  $who = isnum($_GET["who"]);
    $SP = isnum($_POST["specialid"]);
	$tolog = false;
	$tolo = false; 
	 
if($SP==12){
$ss = "1 year";
$sy=1*12*30*24*60*60;
$altm = time()+$sy;
 $tolog = true;
}
else if($SP==20){
$ss = "Life Time";
$tolog = false;
}
else if($SP==0){
$ss = "removed";
$tolog = false;
$tolo = true;

}

else{

$ss="$SP month";
$sy=$SP*30*24*60*60;
$altm = time()+$sy;
 $tolog = true;
}	
      echo "<p align=\"center\">";
   
   
   
   
 $res = sm_query("UPDATE ibwf_users SET specialid='".$SP."' WHERE id='".$who."'");

        if($res)
      {
	  if($tolog){
	     $uinf = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_premium WHERE uid='".$who."'"));
  if($uinf[0]==0)
  {
	 sm_query("INSERT INTO `ibwf_premium` (`uid` ,`time`)VALUES ('".$who."', '".$altm."')");
	 }else{
	
	 sm_query("UPDATE `ibwf_premium` SET `time` = '".$altm."' WHERE `ibwf_premium`.`uid` ='".$who."'");
	 }
	  
	   }
	  
	
	  if($tolo){
	  $msg="Your Premium User Post Has Been Removed BY Staff";
	  $ee="";
	  
	  }else{
	  $msg=".cheers. You are Now [b]".$ss."[/b] Premium User.All hidden items.Premium Tool Are Added.Enjoy The Premium in SriMobile";
	    $ee="Added";
	  
	  }
	  
	  
	  autopm($msg,$who);
 
        echo "<img src=\"images/ok.gif\" alt=\"O\"/>$ss $ee Premium User to ".getnick_uid($who);
      }else{
        echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error Add Premium User";
      }

	  //////////////////////////////////////
      echo "<br/><br/><a href=\"admincp.php?action=fcats&amp;sid=$sid\">";
  echo "Forum Categories</a><br/>";
  //////////////////////////////////////////////
      echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

      echo "</p></body>";
}






else{
    echo "<p align=\"center\">";
  echo "I don't know how did you get into here, but there's nothing to show<br/><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p></body>";
}
?>
</html>

