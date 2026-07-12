<?php
include("xhtmlfunctions.php");
/////SriMobile@Damith priyankara////////
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";

include("config.php");
include("core.php");

connectdb();
$action = $_GET["action"];
$sid = $_GET["sid"];

mylog($sid);
	
	if(!ismod(getuid_sid($sid)))
  {$pstyle = gettheme1("1");
      echo xhtmlhead("$stitle",$pstyle);
      div();
      echo "You are not a mod<br/>";
      echo "<br/>";
      echo "<a href=\"index.php\">Home</a>";
      echo "</p>";
      echo xhtmlfoot();
      exit();
    }
	
	
    addonline(getuid_sid($sid),"SM Control Room","");
	  $pstyle = gettheme($sid);
      echo xhtmlhead("SM Control Room",$pstyle);
	
	
if($action=="delp")
{
  $pid = $_GET["pid"];
  $tid = gettid_pid($pid);
  $fid = getfid_tid($tid);

  div();
  $res = sm_query("DELETE FROM ibwf_posts WHERE id='".$pid."'");
  if($res)
          {
            $tname = mysqli_fetch_array(sm_query("SELECT name FROM ibwf_topics WHERE id='".$tid."'"));
            sm_query("INSERT INTO ibwf_mlog SET action='posts', details='<b>".getnick_uid(getuid_sid($sid))."</b> Deleted Post Number $pid Of the thread ".sm_clean($tname[0])." at the forum ".getfname($fid)."', actdt='".time()."'");
            
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>Post Message Deleted";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }
  
  echo "<br/><br/><a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tid&amp;page=1000\">";
echo "View Topic</a><br/>";
$fname = getfname($fid);
      echo "<a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$fid\">";
echo "$fname</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}

////////////////////////////////////////////Edit Post

else if($action=="edtpst")
{
  $pid = $_GET["pid"];
  $ptext = $_POST["ptext"];
  $tid = gettid_pid($pid);
  $fid = getfid_tid($tid);

  div();
  $res = sm_query("UPDATE ibwf_posts SET text='"
  .$ptext."' WHERE id='".$pid."'");
  if($res)
          {
            $tname = mysqli_fetch_array(sm_query("SELECT name FROM ibwf_topics WHERE id='".$tid."'"));
            sm_query("INSERT INTO ibwf_mlog SET action='posts', details='<b>".getnick_uid(getuid_sid($sid))."</b> Edited Post Number $pid Of the thread ".sm_clean($tname[0])." at the forum ".getfname($fid)."', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>Post Message Edited";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }
  echo "<br/><br/>";
  echo "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tid\">";
echo "View Topic</a><br/>";
$fname = getfname($fid);
      echo "<a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$fid\">";
echo "$fname</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}
else if($action=="validate")
{

$uid = getuid_sid($sid);
$who = $_GET["who"];
$user = getnick_uid($who);
echo "<card id=\"main\" title=\"modTools\">";
div();
$res = sm_query("Update ibwf_users SET validated='1' WHERE id='".$who."'");
if($res)
{
sm_query("INSERT INTO ibwf_mlog SET action='validation', details='<b>".getnick_uid(getuid_sid($sid))."</b> validated $user', actdt='".time()."'");


 $ug = mysqli_fetch_array(sm_query("SELECT battlep FROM ibwf_users WHERE id='".$uid."'"));
  $ugp = $ug[0] + 2;
  sm_query("UPDATE ibwf_users SET battlep='".$ugp."' WHERE id='".$uid."'");

echo "<img src=\"../images/ok.gif\" alt=\"O\"/>$user validated successfully";
 
}else{
echo "<img src=\"../images/notok.gif\" alt=\"X\"/>Error validating $user";
}
echo "<br/>Plz Now Send a Pm to $user asking if  $user needs any help from u..";
echo "<br/><br/><a href=\"inbox.php?action=sendpm&amp;who=$who&amp;sid=$sid\">Send a Pm to $user</a><br/>";
echo "<br/><br/><a href=\"index.php?action=viewuser&amp;who=$who&amp;sid=$sid\">$user's Profile</a><br/>";
//echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"../images/admn.gif\" alt=\"\"/>admin Tools</a><br/>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"../images/home.gif\" alt=\"\"/>Home</a>";
echo "</p>";
echo xhtmlfoot();
}

////////////////////////////////////////////Edit Post

else if($action=="edttpc")
{
  $tid = $_GET["tid"];
  $ttext = $_POST["ttext"];
  $fid = getfid_tid($tid);

  div();
  $res = sm_query("UPDATE ibwf_topics SET text='"
  .$ttext."' WHERE id='".$tid."'");
  if($res)
          {
            sm_query("INSERT INTO ibwf_mlog SET action='topics', details='<b>".getnick_uid(getuid_sid($sid))."</b> Edited the text Of the thread ".sm_clean(gettname($tid))." at the forum ".getfname($fid)."', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>Topic Message Edited";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }
  echo "<br/><br/>";
  echo "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tid\">";
echo "View Topic</a><br/>";
$fname = getfname($fid);
      echo "<a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$fid\">";
echo "$fname</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}


if($action=="mbrl")
{
    addonline(getuid_sid($sid),"Members search by IP","");
 
    echo "<p>";
	echo "Some ppl change their browser and do naughty things in $stitle. but their IP is same. just pick up their Ips n paste here n get the result<br/>";
    
    echo "<form action=\"modproc.php?action=smbr&amp;sid=$sid\" method=\"post\">";
 echo "Suspectors IP: <input name=\"stext\" maxlength=\"15\"/><br/>";
   echo "Action: <select name=\"sor\">";
  echo "<option value=\"1\">name(A-Z)</option>";
  echo "<option value=\"2\">Last Active</option>";
echo "<option value=\"3\">Join Date</option>";
   
  echo "</select>";
  echo "<input type=\"submit\" value=\"Find It\"/>";
  echo "</form><br/>";




    echo "</p>";
  div();
  //echo "<a href=\"index.php?action=search&amp;sid=$sid\"><img src=\"images/search.gif\" alt=\"*\"/>";
//echo "Search Menu</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}
else if($action=="smbr")
{
	$stext = $_POST["stext"];
  $sin = $_POST["sin"];
  $sor = $_POST["sor"];
    addonline(getuid_sid($sid),"Member search","");
    echo "<card id=\"main\" title=\"Search\">";
    echo "<p>";

    
        if(trim($stext)=="")
        {
            echo "<br/>Failed to search for Members";
        }else{
          //begin search
          if($page=="" || $page<1)$page=1;
          
            $where_table = "ibwf_users";
			if($sin=="1")
            $cond = "name";
			else if($sin=="2")
			$cond = "ipadd";
            $select_fields = "id, name";
            if($sor=="1")
            {
				if($sin=="1")
              $ord_fields = "name";
			  else if($sin=="2")
			  $ord_fields = "ipadd";
            }else if($sor=="2"){
                $ord_fields = "lastact DESC";
            }else if($sor=="3"){
                $ord_fields = "regdate";
            }
     
          $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ".$where_table." WHERE ".$cond." LIKE '%".$stext."%'"));
		  
          $num_items = $noi[0];
          $items_per_page = 10;
          $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    $sql = "SELECT ".$select_fields." FROM ".$where_table." WHERE ".$cond." LIKE '%".$stext."%' ORDER BY ".$ord_fields." LIMIT $limit_start, $items_per_page";
          $items = sm_query($sql);
          while($item=mysqli_fetch_array($items))
          {
              $tlink = "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$item[0]\">".htmlspecialchars($item[1])."</a><br/>";

                echo  $tlink;

          }
          div();
		  if($page>1)
    {
      $ppage = $page-1;
      $rets = "<anchor>&#171;PREV";
        $rets .= "<go href=\"modproc.php?action=$action&amp;sid=$sid&amp;page=$ppage\" method=\"post\">";
        $rets .= "<postfield name=\"stext\" value=\"$stext\"/>";
        $rets .= "<postfield name=\"sin\" value=\"$sin\"/>";
        $rets .= "<postfield name=\"sor\" value=\"$sor\"/>";
        $rets .= "</go></anchor> ";

        echo $rets;
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      $rets = "<anchor>Next&#187;";
        $rets .= "<go href=\"modproc.php?action=$action&amp;sid=$sid&amp;page=$npage\" method=\"post\">";
        $rets .= "<postfield name=\"stext\" value=\"$stext\"/>";
        $rets .= "<postfield name=\"sin\" value=\"$sin\"/>";
        $rets .= "<postfield name=\"sor\" value=\"$sor\"/>";
        $rets .= "</go></anchor> ";

        echo $rets;
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "Jump to page: <input name=\"pg\" format=\"*N\" size=\"3\"/>";
        $rets .= "<anchor>[GO]";
        $rets .= "<go href=\"modproc.php?action=$action&amp;sid=$sid&amp;page=$(pg)\" method=\"post\">";
        $rets .= "<postfield name=\"stext\" value=\"$stext\"/>";
        $rets .= "<postfield name=\"sin\" value=\"$sin\"/>";
        $rets .= "<postfield name=\"sor\" value=\"$sor\"/>";
        $rets .= "</go></anchor>";

        echo $rets;
    }
    echo "</p>";
        }
    
echo "</p>";
  div();
  echo "<a href=\"index.php?action=search&amp;sid=$sid\"><img src=\"images/search.gif\" alt=\"*\"/>";
echo "Search Menu</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}




if($action=="4n")
{
    addonline(getuid_sid($sid),"Members search by 4n model","");
   
    echo "<p>";
	echo "Some ppl change their browser and do naughty things in $stitle. but u can type the browser name and get all the users who in u typed browser name<br/>";
        echo "<form action=\"modproc.php?action=4n2&amp;sid=$sid\" method=\"post\">";
 echo "Suspectors IP: <input name=\"stext\" maxlength=\"15\"/><br/>";
   echo "Action: <select name=\"sor\">";
  echo "<option value=\"1\">name(A-Z)</option>";
  echo "<option value=\"2\">Last Active</option>";
echo "<option value=\"3\">Join Date</option>";
   
  echo "</select>";
  echo "<input type=\"submit\" value=\"Find It\"/>";
  echo "</form><br/>";


   
    echo "</p>";
  div();
  //echo "<a href=\"index.php?action=search&amp;sid=$sid\"><img src=\"images/search.gif\" alt=\"*\"/>";
//echo "Search Menu</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}
else if($action=="4n2")
{
	$stext = $_POST["stext"];
  $sin = $_POST["sin"];
  $sor = $_POST["sor"];
    addonline(getuid_sid($sid),"Member search by 4n model","");
    echo "<card id=\"main\" title=\"Search\">";
    echo "<p>";

    
        if(trim($stext)=="")
        {
            echo "<br/>Failed to search for Members";
        }else{
          //begin search
          if($page=="" || $page<1)$page=1;
          
            $where_table = "ibwf_users";
			if($sin=="1")
            $cond = "name";
			else if($sin=="2")
			$cond = "browserm";
            $select_fields = "id, name";
            if($sor=="1")
            {
				if($sin=="1")
              $ord_fields = "name";
			  else if($sin=="2")
			  $ord_fields = "browserm";
            }else if($sor=="2"){
                $ord_fields = "lastact DESC";
            }else if($sor=="3"){
                $ord_fields = "regdate";
            }
     
          $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ".$where_table." WHERE ".$cond." LIKE '%".$stext."%'"));
		  
          $num_items = $noi[0];
          $items_per_page = 10;
          $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    $sql = "SELECT ".$select_fields." FROM ".$where_table." WHERE ".$cond." LIKE '%".$stext."%' ORDER BY ".$ord_fields." LIMIT $limit_start, $items_per_page";
          $items = sm_query($sql);
          while($item=mysqli_fetch_array($items))
          {
              $tlink = "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$item[0]\">".htmlspecialchars($item[1])."</a><br/>";

                echo  $tlink;

          }
          div();
		  if($page>1)
    {
      $ppage = $page-1;
      $rets = "<anchor>&#171;PREV";
        $rets .= "<go href=\"modproc.php?action=$action&amp;sid=$sid&amp;page=$ppage\" method=\"post\">";
        $rets .= "<postfield name=\"stext\" value=\"$stext\"/>";
        $rets .= "<postfield name=\"sin\" value=\"$sin\"/>";
        $rets .= "<postfield name=\"sor\" value=\"$sor\"/>";
        $rets .= "</go></anchor> ";

        echo $rets;
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      $rets = "<anchor>Next&#187;";
        $rets .= "<go href=\"modproc.php?action=$action&amp;sid=$sid&amp;page=$npage\" method=\"post\">";
        $rets .= "<postfield name=\"stext\" value=\"$stext\"/>";
        $rets .= "<postfield name=\"sin\" value=\"$sin\"/>";
        $rets .= "<postfield name=\"sor\" value=\"$sor\"/>";
        $rets .= "</go></anchor> ";

        echo $rets;
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "Jump to page: <input name=\"pg\" format=\"*N\" size=\"3\"/>";
        $rets .= "<anchor>[GO]";
        $rets .= "<go href=\"modproc.php?action=$action&amp;sid=$sid&amp;page=$(pg)\" method=\"post\">";
        $rets .= "<postfield name=\"stext\" value=\"$stext\"/>";
        $rets .= "<postfield name=\"sin\" value=\"$sin\"/>";
        $rets .= "<postfield name=\"sor\" value=\"$sor\"/>";
        $rets .= "</go></anchor>";

        echo $rets;
    }
    echo "</p>";
        }
    
echo "</p>";
  div();
  echo "<a href=\"index.php?action=search&amp;sid=$sid\"><img src=\"images/search.gif\" alt=\"*\"/>";
echo "Search Menu</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}
///////////////////////////////////////Close/ Open Topic

else if($action=="clot")
{
  $tid = $_GET["tid"];
  $tdo = $_GET["tdo"];
  $fid = getfid_tid($tid);

  div();
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
            sm_query("INSERT INTO ibwf_mlog SET action='topics', details='<b>".getnick_uid(getuid_sid($sid))."</b> Closed The thread ".sm_clean(gettname($tid))." at the forum ".getfname($fid)."', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>Topic $msg";
			$tpci = mysqli_fetch_array(sm_query("SELECT name, authorid FROM ibwf_topics WHERE id='".$tid."'"));
			$tname = htmlspecialchars($tpci[0]);
			$msg = "your thread [topic=$tid]$tname"."[/topic] is $msg"."[br/][small][i]p.s: this is an automatic pm[/i][/small]";
			autopm($msg, $tpci[1]);
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }
  echo "<br/><br/>";
  
$fname = getfname($fid);
      echo "<a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$fid\">";
echo "$fname</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}

///////////////////////////////////////Untrash user

else if($action=="untr")
{
  $who = $_GET["who"];

  div();
  $res = sm_query("DELETE FROM ibwf_penalties WHERE penalty='0' AND uid='".$who."'");
  if($res)
          {
            $unick = getnick_uid($who);
            sm_query("INSERT INTO ibwf_mlog SET action='penalties', details='<b>".getnick_uid(getuid_sid($sid))."</b> Untrashed The user <b>".$unick."', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>$unick Untrashed";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }
  echo "<br/><br/>";


  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}

///////////////////////////////////////Unban user

else if($action=="unbanArawaponley")
{
  $who = $_GET["who"];

  div();
  $res = sm_query("DELETE FROM ibwf_penalties WHERE (penalty='1' OR penalty='2') AND uid='".$who."'");
  if($res)
          {
            $unick = getnick_uid($who);
            sm_query("INSERT INTO ibwf_mlog SET action='penalties', details='<b>".getnick_uid(getuid_sid($sid))."</b> Unbanned The user <b>".$unick."</b>', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>$unick Unbanned";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }
  echo "<br/><br/>";


  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}

///////////////////////////////////////Delete shout

else if($action=="delsh")
{
  $shid = $_GET["shid"];

  div();
  $sht = mysqli_fetch_array(sm_query("SELECT shouter, shout FROM ibwf_shouts WHERE id='".$shid."'"));
  $msg = getnick_uid($sht[0]);
  $msg .= ": ".htmlspecialchars((strlen($sht[1])<20?$sht[1]:substr($sht[1], 0, 20)));
  $res = sm_query("DELETE FROM ibwf_shouts WHERE id ='".$shid."'");
  if($res)
          {
		  sm_query("INSERT INTO ibwf_mlog SET action='shouts', details='<b>".getnick_uid(getuid_sid($sid))."</b> Deleted the shout <b>".$shid."</b> - $msg', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>Shout deleted";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }
  echo "<br/><br/>";


  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}


///////////////////////////////////////Unban user

else if($action=="shld")
{
  $who = $_GET["who"];

  div();
  $res = sm_query("Update ibwf_users SET shield='1' WHERE id='".$who."'");
  if($res)
          {
            $unick = getnick_uid($who);
            sm_query("INSERT INTO ibwf_mlog SET action='penalties', details='<b>".getnick_uid(getuid_sid($sid))."</b> Shielded The user <b>".$unick."</b>', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>$unick is Shielded";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }
  echo "<br/><br/>";


  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}

///////////////////////////////////////Unban user

else if($action=="ushld")
{
  $who = $_GET["who"];

  div();
  $res = sm_query("Update ibwf_users SET shield='0' WHERE id='".$who."'");
  if($res)
          {
            $unick = getnick_uid($who);
            sm_query("INSERT INTO ibwf_mlog SET action='penalties', details='<b>".getnick_uid(getuid_sid($sid))."</b> Unshielded The user <b>".$unick."</b>', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>$unick is Unshielded";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }
  echo "<br/><br/>";


  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}

///////////////////////////////////////Pin/ Unpin Topic

else if($action=="pint")
{
  $tid = $_GET["tid"];
  $tdo = $_GET["tdo"];
  $fid = getfid_tid($tid);

  div();
  $pnd = getpinned($fid);
  if($pnd<=5)
  {
  $res = sm_query("UPDATE ibwf_topics SET pinned='"
  .$tdo."' WHERE id='".$tid."'");
  if($res)
          {
            if($tdo==1)
            {
              $msg = "Pinned";
            }else{
                $msg = "Unpinned";
            }
            sm_query("INSERT INTO ibwf_mlog SET action='topics', details='<b>".getnick_uid(getuid_sid($sid))."</b> $msg The thread ".sm_clean(gettname($tid))." at the forum ".getfname($fid)."', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>Topic $msg";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>You can only pin 5 topics in every forum";
          }
  echo "<br/><br/>";

$fname = getfname($fid);
      echo "<a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$fid\">";
echo "$fname</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}

///////////////////////////////////Delete the damn thing

else if($action=="delt")
{
  $tid = $_GET["tid"];
  $fid = getfid_tid($tid);

  div();
  $tname=gettname($tid);
  $res = sm_query("DELETE FROM ibwf_topics WHERE id='".$tid."'");
  if($res)
          {
            sm_query("DELETE FROM ibwf_posts WHERE tid='".$tid."'");
            sm_query("INSERT INTO ibwf_mlog SET action='topics', details='<b>".getnick_uid(getuid_sid($sid))."</b> Deleted The thread ".sm_clean($tname)." at the forum ".getfname($fid)."', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>Topic Deleted";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }
  echo "<br/><br/>";
  
$fname = getfname($fid);
      echo "<a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$fid\">";
echo "$fname</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}


////////////////////////////////////////////Edit Post

else if($action=="rentpc")
{
  $tid = $_GET["tid"];
  $tname = $_POST["tname"];
  $fid = getfid_tid($tid);

  div();
  $otname = gettname($tid);
  if(trim($tname!=""))
  {
    $not = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topics WHERE name LIKE '".$tname."' AND fid='".$fid."'"));
    if($not[0]==0)
    {
  $res = sm_query("UPDATE ibwf_topics SET name='"
  .$tname."' WHERE id='".$tid."'");
  if($res)
          {
            sm_query("INSERT INTO ibwf_mlog SET action='topics', details='<b>".getnick_uid(getuid_sid($sid))."</b> Renamed The thread ".sm_clean($otname)." to ".sm_clean($tname)." at the forum ".getfname($fid)."', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>Topic  Renamed";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }
  }else{
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>Topic Name already exist";
  }
    
  }else{
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>You must specify a name for the topic";
  }
  echo "<br/><br/>";
  echo "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tid\">";
echo "View Topic</a><br/>";
$fname = getfname($fid);
      echo "<a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$fid\">";
echo "$fname</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}

///////////////////////////////////////////////////Move topic



else if($action=="mvt")
{
  $tid = $_GET["tid"];
  $mtf = $_POST["mtf"];
  $fname = htmlspecialchars(getfname($mtf));
  //$fid = getfid_tid($tid);

  div();
  
    $not = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topics WHERE name LIKE '".$tname."' AND fid='".$mtf."'"));
    if($not[0]==0)
    {
  $res = sm_query("UPDATE ibwf_topics SET fid='"
  .$mtf."', moved='1' WHERE id='".$tid."'");
  if($res)
          {
            sm_query("INSERT INTO ibwf_mlog SET action='topics', details='<b>".getnick_uid(getuid_sid($sid))."</b> Moved The thread ".sm_clean($tname)." to forum ".getfname($fid)."', actdt='".time()."'");
			$tpci = mysqli_fetch_array(sm_query("SELECT name, authorid FROM ibwf_topics WHERE id='".$tid."'"));
			$tname = htmlspecialchars($tpci[0]);
			$msg = "your thread [topic=$tid]$tname"."[/topic] Was moved to $fname forum[br/][small][i]p.s: this is an automatic pm[/i][/small]";
			autopm($msg, $tpci[1]);
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>Topic Moved";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }
  }else{
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>Topic Name already exist";
  }


  echo "<br/><br/>";
  

      echo "<a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$mtf\">";
echo "$fname</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}

//////////////////////////////////////////Handle PM

else if($action=="hpm")
{
  $pid = $_GET["pid"];
  

  div();

    $info = mysqli_fetch_array(sm_query("SELECT byuid, touid FROM ibwf_private WHERE id='".$pid."'"));
  $res = sm_query("UPDATE ibwf_private SET reported='2' WHERE id='".$pid."'");
  if($res)
          {
            sm_query("INSERT INTO ibwf_mlog SET action='handling', details='<b>".getnick_uid(getuid_sid($sid))."</b> handled The PM ".$pid."', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>PM Handled";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }



  echo "<br/><br/>";
    
    echo "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$info[0]\">PM Sender's Profile</a><br/>";
      echo "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$info[1]\">PM Reporter's Profile</a><br/><br/>";
      echo "<a href=\"modcp.php?action=main&amp;sid=$sid\">";
echo "Mod R/L</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}

//////////////////////////////////////////Handle Post

else if($action=="hps")
{
  $pid = $_GET["pid"];


  div();

    $info = mysqli_fetch_array(sm_query("SELECT uid, tid FROM ibwf_posts WHERE id='".$pid."'"));
  $res = sm_query("UPDATE ibwf_posts SET reported='2' WHERE id='".$pid."'");
  if($res)
          {
            sm_query("INSERT INTO ibwf_mlog SET action='handling', details='<b>".getnick_uid(getuid_sid($sid))."</b> handled The Post ".$pid."', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>Post Handled";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }



  echo "<br/><br/>";
    $poster = getnick_uid($info[0]);
    echo "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$info[0]\">$poster's Profile</a><br/>";
      echo "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$info[1]\">View Topic</a><br/><br/>";
      echo "<a href=\"modcp.php?action=main&amp;sid=$sid\">";
echo "Mod R/L</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}

//////////////////////////////////////////Handle Topic

else if($action=="htp")
{
  $pid = $_GET["tid"];


  div();

    $info = mysqli_fetch_array(sm_query("SELECT authorid FROM ibwf_topics WHERE id='".$pid."'"));
  $res = sm_query("UPDATE ibwf_topics SET reported='2' WHERE id='".$pid."'");
  if($res)
          {
            sm_query("INSERT INTO ibwf_mlog SET action='handling', details='<b>".getnick_uid(getuid_sid($sid))."</b> handled The topic ".sm_clean(gettname($pid))."', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>Topic Handled";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }



  echo "<br/><br/>";
    $poster = getnick_uid($info[0]);
    echo "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$info[0]\">$poster's Profile</a><br/>";
      echo "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$pid\">View Topic</a><br/><br/>";
      echo "<a href=\"modcp.php?action=main&amp;sid=$sid\">";
echo "Mod R/L</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}

////////////////////////////////////////Punish

else if($action=="punArawap1")
{
    $pid = $_POST["pid"];
    $who = $_POST["who"];
    $pres = $_POST["pres"];
    $pds = $_POST["pds"];
    $phr = $_POST["phr"];
    $pmn = $_POST["pmn"];
    $psc = $_POST["psc"];
   
  div();
  
  $uip = "";
  $ubr = "";
  $pmsg[0]="Trashed";
  $pmsg[1]="Banned";
  $pmsg[2]="IP-Banned";
  if($pid=='2')
  {
    //ip ban
    $uip = getip_uid($who);
    $ubr = getbr_uid($who);
  }
  if(trim($pres)=="")
  {
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>You must Specify a reson for punishing the user";
  }else{
    $timeto = $pds*24*60*60;
    $timeto += $phr*60*60;
    $timeto += $pmn*60;
    $timeto += $psc;
    $ptime = $timeto + time();
    $unick = getnick_uid($who);
    $res = sm_query("INSERT INTO ibwf_penalties SET uid='".$who."', penalty='".$pid."', exid='".getuid_sid($sid)."', timeto='".$ptime."', pnreas='".sm_clean($pres)."', ipadd='".$uip."', browserm='".$ubr."'");
    if($res)
          {
            sm_query("UPDATE ibwf_users SET lastpnreas='".$pmsg[$pid].": ".sm_clean($pres)."' WHERE id='".$who."'");
            sm_query("INSERT INTO ibwf_mlog SET action='penalties', details='<b>".getnick_uid(getuid_sid($sid))."</b> $pmsg[$pid] The user <b>".$unick."</b> For ".$timeto." Seconds', actdt='".time()."'");
            
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>$unick is $pmsg[$pid] for $timeto Seconds";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }
  }
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}

////////////////////////////////////////Punish

else if($action=="pls")
{
    $pid = $_POST["pid"];
    $who = $_POST["who"];
    $pres = $_POST["pres"];
    $pval = $_POST["pval"];
   
  div();

$unick = getnick_uid($who);
$opl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$who."'"));

if($pid=='0')
{
  $npl = $opl[0] - $pval;
}else{
    $npl = $opl[0] + $pval;
}
if($npl<0)
{
  $npl=0;
}
  if(trim($pres)=="")
  {
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>You must Specify a reson for updating $unick's Plusses";
  }else{
    
    $res = sm_query("UPDATE ibwf_users SET lastplreas='".sm_clean($pres)."', plusses='".$npl."' WHERE id='".$who."'");
    if($res)
          {
            sm_query("INSERT INTO ibwf_mlog SET action='penalties', details='<b>".getnick_uid(getuid_sid($sid))."</b> Updated <b>".$unick."</b> plusses from ".$opl[0]." to $npl', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>$unick's Plusses Updated From $opl[0] to $npl";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }
  }
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}



////////////////////////////////////////Punish

else if($action=="bnk")
{
    $pid = $_POST["pid"];
    $who = $_POST["who"];
    $pres = $_POST["pres"];
    $pval = $_POST["pval"];
   
  div();

$unick = getnick_uid($who);
$opl = mysqli_fetch_array(sm_query("SELECT arabank FROM ibwf_users WHERE id='".$who."'"));

if($pid=='0')
{
  $npl = $opl[0] - $pval;
}else{
    $npl = $opl[0] + $pval;
}
if($npl<0)
{
  $npl=0;
}
  if(trim($pres)=="")
  {
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>You must Specify a reson for updating $unick's Bank credits";
  }else{
    
    $res = sm_query("UPDATE ibwf_users SET lastplreas='".sm_clean($pres)."', arabank='".$npl."' WHERE id='".$who."'");
    if($res)
          {
            sm_query("INSERT INTO ibwf_mlog SET action='penalties', details='<b>".getnick_uid(getuid_sid($sid))."</b> Updated <b>".$unick."</b> bank credits from ".$opl[0]." to $npl', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>$unick's bank credits Updated From $opl[0] to $npl";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }
  }
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}

else if($action=="logov")
{
  div();
  echo "<small>";
  print'<h2>logo validating system</h2>';
    $logoid = $_GET["logoid"];
    $add = $_GET["ac"];
   if($add=="add"){
   $res = sm_query("UPDATE ibwf_logo SET permisson='1' WHERE id='".$logoid."'");
   if($res)
          {
            sm_query("INSERT INTO ibwf_mlog SET action='Logo Validton', details='<b>".getnick_uid(getuid_sid($sid))."</b> validating Logo <b>".$logoid."</b> ', actdt='".time()."'");
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>Logo Validating is sussfully";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Database Error";
          }
   
   }else{
   
   
   
   }
    echo "</small></div><br/><br/>
<a href=\"modcp.php?action=logv&amp;sid=$sid\">validate logo</a>
	
	<br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}








else{
   
  div();
  echo "I don't know how did you get into here, but there's nothing to show<br/><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>"; echo xhtmlfoot();
}
?>