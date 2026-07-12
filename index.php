<?php
include("gzcompress.php");
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
include("config.php");
include("core.php");
include("xhtmlfunctions.php");
connectdb();
$action = $_GET["action"];
$sid = $_GET["sid"];
$page = $_GET["page"];
$who = $_GET["who"];
if(($action != "") && ($action!="terms"))
{mylog($sid);}
$uid = getuid_sid($sid);
$lang = mysqli_fetch_array(sm_query("SELECT lang FROM ibwf_users WHERE id='".$uid."'"));
include("language.php");

////////////////////////////////////////MAIN PAGE
if($action=="main")
{

  $showicons = mysqli_fetch_array(sm_query("SELECT showicon FROM ibwf_users WHERE id='".$uid."'"));
  $showtime = mysqli_fetch_array(sm_query("SELECT showtime FROM ibwf_users WHERE id='".$uid."'"));
  $showshout = mysqli_fetch_array(sm_query("SELECT showshout FROM ibwf_users WHERE id='".$uid."'"));

  

  if($showicons[0]=="1"){
$iconinn =       "<img src=\"images/inbox2.gif\" alt=\"*\"/>";
$iconino =       "<img src=\"images/inbox1.gif\" alt=\"*\"/>";
$iconbuddy =     "<img src=\"images/avatar.png\" alt=\"*\"/>";
$iconchat =      "<img src=\"images/chat.gif\" alt=\"*\"/>";
$iconforum =     "<img src=\"images/forum.gif\" alt=\"*\"/>";
$iconclub =      "<img src=\"images/clubs.png\" alt=\"*\"/>";
$icongames =     "<img src=\"images/casino.gif\" alt=\"*\"/>";
$icondownloads = "<img src=\"images/dwn.gif\" alt=\"*\"/>";
$iconcp =        "<img src=\"images/cpanel.gif\" alt=\"*\"/>";
$iconshop =      "<img src=\"images/shop.gif\" alt=\"*\"/>";
$iconupl =      "<img src=\"images/dwn.gif\" alt=\"*\"/>";
$iconfree =      "<img src=\"images/free.gif\" alt=\"*\"/>";
$iconextra =      "<img src=\"images/faq.gif\" alt=\"*\"/>";
$iconbank =      "<img src=\"images/dol.gif\" alt=\"*\"/>";
$iconwz =      "<img src=\"images/wz.gif\" alt=\"*\"/>";
$iconmdl =      "<img src=\"images/modl.gif\" alt=\"*\"/>";
  }else
  if($showicons[0]=="0"){ $iconinn =       "&#187;";$iconino =       "&#187;";$iconbuddy =     "&#187;";$iconchat =      "&#187;";$iconforum =     "&#187;";$iconclub =      "&#187;";$icongames =     "&#187;";$icondownloads = "&#187;";$iconusergall =  "&#187;";$iconcp =        "&#187;";$iconshop =      "&#187;";$iconupl =      "&#187;";$iconfree =      "&#187;";$iconextra =      "&#187;";$iconbank =      "&#187;";$iconwz =      "&#187;";$iconmdl =      "&#187;";}
 addvisitor();
  addonline(getuid_sid($sid),"Main Page - xHTML","index.php?action=$action");
  $pstyle = gettheme($sid);
  echo xhtmlhead("$stitle",$pstyle);
   $today = mysqli_fetch_array(sm_query("SELECT max(chat),uid FROM ibwf_maxchat"));
  if($today[0]!=""){
  divok();
  echo "<small><b>Today Top Chatter</b><br/><a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$who\">".getnick_uid($today[1])."</a> : Chat Post $today[0]</div></small><br/>";
  }
  
if(ismod(getuid_sid($sid)))
   {
 	 $no = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE validated='0' "));
  if($no[0]>0)

echo "<b><a href=\"modcp.php?action=validatelist&amp;sid=$sid&amp;who=$who\">Waiting to Validate!!($no[0]) </a></b><br/>";
}


/* echo"<h2>";

$viwed = mysqli_fetch_array(sm_query("SELECT COUNT(id) FROM ibwf_lastview WHERE whonick='".$uid."' and viwed='0'"));
if($viwed[0]>0){
echo"<a href=\"inbox.php?action=viewu&amp;sid=$sid\">My views [$viwed[0]]</a>";
}else{
echo"My views $viwed[0]";
}
echo"</h2>"; */


$fmsg = parsepm(getfmsg(), $sid);
if($fmsg!==""){
    div();
 echo "$fmsg";
  echo "</div>";
   echo "<br/>";
 }
 

///////////////////////////////////////////////
    if($showshout[0]=="1"){

 div();
  echo "<center><h2>$lang32</h2></center>";
  echo "<small>";
  echo getshoutbox($sid);
  echo "</small>";
  echo "</div>";
   echo "<br/>";
  }
  
  
  
  
  div();
  echo "<center><h2>$lang40</h2></center>";

 ///////////////////////
$poke = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_poke WHERE  pokid='".$uid."' AND view='0'"));
if($poke[0]>0){
$sql = "SELECT id, uid FROM ibwf_poke WHERE pokid='".$uid."' AND view='0' ORDER BY time LIMIT 1";
$items = sm_query($sql);
$item = mysqli_fetch_array($items);
dival();
ECHO'<div align="left">';
$lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[1]&amp;sid=$sid\">".getnick_uid($item[1])."</a>";
echo "$lnk : poked you!<br/>";
$lnkp = "<img src=\"images/poke.gif\" alt=\"*\"/><a href=\"genproc.php?action=pokeu&amp;pid=$item[0]&amp;sid=$sid&amp;ac=ok\">Poke Back</a>";
$lnkX = "<a href=\"genproc.php?action=pokeu&amp;pid=$item[0]&amp;sid=$sid&amp;ac=off\">[X]</a>";
echo "$lnkp | $lnkX </div></div>";}

/////////////////////////////////////////////////////// 
  
  $magictime = mysqli_fetch_array(sm_query("SELECT time FROM ibwf_gift WHERE uid='".$uid."'"));
if($magictime[0]<time())
{
  echo"<img src=\"images/credit.png\" alt=\"*\"/><a href=\"other.php?action=gift&amp;sid=$sid\">Get Bonus Crditz now !!</a><br/>";
}else{
dival();
  $msu=gettimemsg($magictime[0]-time());
echo"Wait to $msu Bonus Crditz</div>";
}




////////////////////////////////////

echo "<div class=\"catRow\"><a href=\"farm.php?action=main&amp;sid=$sid\">&#187;Farm game</a></div>";

echo "<div class=\"catRow\"><a href=\"sm_articles.php?action=main&amp;sid=$sid\">&#187;Sm Magazine</a></div>";
  $tmsg = getpmcount(getuid_sid($sid));
  $umsg = getunreadpm(getuid_sid($sid));
  if($umsg==1)
  {
  echo "<div class=\"catRow\"><a href=\"inbox.php?action=display&amp;sid=$sid&amp;view=urd\">$iconinn $lang21</a>[$umsg $lang21a]</div>";
  }
  if($umsg>1)
  {
  echo "<div class=\"catRow\"><a href=\"inbox.php?action=display&amp;sid=$sid&amp;view=urd\">$iconinn $lang21</a>[$umsg $lang21b]</div>";
  }
  if($umsg==0)
  {
  echo "<div class=\"catRow\"><a href=\"inbox.php?action=main&amp;sid=$sid\">$iconino $lang21</a>[$tmsg]</div>";
  }

  
  
  
  $uid = getuid_sid($sid);
  $mybuds = getnbuds($uid);
  $onbuds = getonbuds($uid);
  echo "<div class=\"catRow\"><a href=\"lists.php?action=buds&amp;sid=$sid\">$iconbuddy $lang22</a>[$onbuds|$mybuds]";
  $reqs = getnreqs($uid);
  if($reqs>0)
  {
    echo ":<font color=\"red\"> <a href=\"lists.php?action=reqs&amp;sid=$sid\">$reqs Req.</a></font></div>";
  }else{echo "</div>";}

  $chs = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_chonline"));
  echo "<div class=\"catRow\"><a href=\"index.php?action=chat&amp;sid=$sid\">$iconchat $lang23</a>[$chs[0]]</div>";
   $notc = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topics"));
    $nops = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_posts"));
  echo "<div class=\"catRow\"><a href=\"index.php?action=formmenu&amp;sid=$sid\">$iconforum $lang24</a>[$nops[0]]</div>";
   $chs = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubs"));
  echo "<div class=\"catRow\"><a href=\"index.php?action=clmenu&amp;sid=$sid\">$iconclub $lang25</a>[$chs[0]]</div>";
 echo "<div class=\"catRow\"><a href=\"lists.php?action=vault&amp;sid=$sid\">$icondownloads $lang27</a></div>";
    echo "<div class=\"catRow\"><a href=\"index.php?action=funm&amp;sid=$sid\">$icongames $lang26</a></div>";

   echo "<div class=\"catRow\"><a href=\"sm_shop.php?action=main&amp;sid=$sid\">$iconshop $lang45 !</a></div>";

  echo " <div class=\"catRow\"><a href=\"index.php?action=cpanel&amp;sid=$sid\">$iconcp $lang29</a></div>";
  echo "<div class=\"catRow\"><a href=\"sm_bank.php?action=main&amp;sid=$sid\">$iconbank $lang46</a></div>";
echo "<div class=\"catRow\"><a href=\"index.php?action=extra&amp;sid=$sid\">$iconextra $lang44</a></div>";
 
	

  echo "</div></div><br/>";


  div();
 echo "<center><h2>Latest Forum</h2></center>";

 echo "<a href=\"index.php?action=last10&amp;sid=$sid\">$lang51!!</a><br/>";

$top = mysqli_fetch_array(sm_query("SELECT max(views),id, name FROM ibwf_topics ORDER BY
lastpost DESC LIMIT 0,1"));
$toplnm = htmlspecialchars($top[2]);
echo "<b>TOP :</b><a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$top[1]&amp;go=last\">$toplnm</a><br/>";

$lpt = mysqli_fetch_array(sm_query("SELECT id, name FROM ibwf_topics ORDER BY
lastpost DESC LIMIT 0,1"));
$nops = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_posts"));
if($nops[0]==0)
{
$pinfo = mysqli_fetch_array(sm_query("SELECT authorid FROM ibwf_topics"));
$tluid = $pinfo[0];
}else{
$pinfo = mysqli_fetch_array(sm_query("SELECT uid FROM ibwf_posts ORDER BY dtpost
DESC LIMIT 0, 1"));
$tluid = $pinfo[0];
}
$tlnm = htmlspecialchars($lpt[1]);
$tlnick = getnick_uid($tluid);
$tpclnk = "<a
href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$lpt[0]&amp;go=last\">$tlnm</a>";
$vulnk = "<a
href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$tluid\">$tlnick</a>";
echo "<b>$lang52 :</b> $tpclnk<br/>";
echo " $lang52: $vulnk<br/>";


  echo "</div><br/>";

  div();
  echo "<center><h2>$lang41</h2></center>";

  $memberonline = "<a href=\"index.php?action=onlinec&amp;sid=$sid\">$lang33 ".getnumonline()."</a> | ";
  echo "$memberonline";
  $timeout = time()  - 180;
  $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE perm>'0' AND lastact>'".$timeout."'"));
  echo "<a href=\"index.php?action=stfol&amp;sid=$sid\">$lang34 ".$noi[0]."</a> | ";
  $timeout = time() - 180;
  $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE specialid>'0' AND lastact>'".$timeout."'"));
  echo "<a href=\"index.php?action=vipol&amp;sid=$sid\">$lang35 ".$noi[0]."</a><br/>";

  echo "</div>";

  echo "<br/>";




           echo "<p><small>";

 if (isadmin(getuid_sid($sid)))
  {
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\">&#187;Staff tool</a><br/>";
  }
  if(ismod($uid))
  {
    $tnor = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE reported='1'"));
    $tot = $tnor[0];
    $tnor = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_posts WHERE reported='1'"));
    $tot += $tnor[0];
    $tnor = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topics WHERE reported='1'"));
    $tot += $tnor[0];
    $tnol = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_mlog"));
    $tol = $tnol[0];
    if($tol+$tot>0)
    {
    echo "<a href=\"modcp.php?action=main&amp;sid=$sid\">$lang36</a>($tot|$tol)";

    }

  }
  echo "</small></p>";
 echo "<p align=\"center\">";



  $memid = mysqli_fetch_array(sm_query("SELECT id, name  FROM ibwf_users where validated='1' ORDER BY regdate DESC LIMIT 0,1"));
    echo "$lang50: <b><a href=\"index.php?action=viewuser&amp;who=$memid[0]&amp;sid=$sid\">$memid[1]</a></b><br/>";

  echo "<a href=\"index.php?action=stats&amp;sid=$sid\">[$iconstats$lang30] </a>";

  echo "<a href=\"index.php?action=search&amp;sid=$sid\">[$lang31]</a><br/>";
 

  //echo "* <a accesskey=\"*\" href=\"../index.php?action=main&amp;sid=$sid\">$lang37a</a><br/>";
  echo "0 <a accesskey=\"0\" href=\"index.php?action=logout&amp;sid=$sid\">$lang38</a>";

  echo "<br/></p>";
  echo "<div class=\"ad1\"><center>&#169;SriMobile-";
    echo "2012</center>";
  echo "</div>";

  echo xhtmlfoot();

 }
//////////////////////////////////extra

else if($action=="extra")
{
    addonline(getuid_sid($sid),"site Extras-xhtml","index.php?action=$action");
	$pstyle = gettheme($sid);
    echo xhtmlhead("Extra",$pstyle);

    echo "<p align=\"left\">";

    echo "<b>Site Extras</b><br/><br/>";
	
	echo "<a href=\"index.php?action=chapel&amp;sid=$sid\">$stitle-Chapel!</a><br/>";
echo "<a href=\"bank.php?action=main&amp;sid=$sid\">$iconbank $lang46</a><br/>";
echo "<a href=\"meragochi.php?action=main&amp;sid=$sid\">Meragotchi</a><br/>";
echo "<a href=\"index.php?action=jstaff&amp;sid=$sid\">join to $stitle STAFF!! </a><br/>";
echo "<a href=\"articles.php?action=articles&amp;sid=$sid\">Articles</a><br/>";
 echo "<a href=\"index.php?action=c2p&amp;sid=$sid\">C2P converter</a><br/>";
  
echo "<a href=\"index.php?action=bookmarks&amp;sid=$sid\">Bookmarks</a><br/>";
   echo "<a href=\"index.php?action=sitethms&amp;sid=$sid\">Profile Theme</a><br/>";

 echo "<a href=\"index.php?action=help&amp;sid=$sid\">";
echo "Help</a><br/>";
  echo "<a href=\"lists.php?action=faqs&amp;sid=$sid\">";
echo "F.A.Q.s</a><br/>";
  echo "<a href=\"index.php?action=terms&amp;sid=$sid\">Terms of Use</a><br/>";
  echo "<br/>";
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
    echo "</p>";
   echo xhtmlfoot();
}
////////////////////////////////////////////////superkido
else if($action=="rpg")
{
    $who = $_GET["who"];
    addonline(getuid_sid($sid),"RPG Stats","index.php?action=main");

   echo "<p align=\"center\">";
 $tnick = getnick_uid($who);

 echo "<a href=\"index.php?action=viewuser&amp;who=$who&amp;sid=$sid&amp;browse?\">$tnick</a>'s RPG Stats<br/>";

  $nopl = mysqli_fetch_array(sm_query("SELECT health FROM ibwf_users WHERE id='".$who."'"));
  $nopl2 = mysqli_fetch_array(sm_query("SELECT wins FROM ibwf_users WHERE id='".$who."'"));
   $noi = mysqli_fetch_array(sm_query("SELECT loss FROM ibwf_users WHERE id='".$who."'"));
echo "Health: $nopl[0]<br/>";
  echo "Wins: $nopl2[0]<br/>";
  echo "Loss: $noi[0]<br/>----<br/>";
  echo "<a href=\"kindatrpg.php?action=chal&amp;who=$who&amp;sid=$sid\">Challenge</a><br/>---<br/>";
  echo "<a href=\"kindatrpg.php?action=main&amp;sid=$sid\">Kindat RPG</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\">";
    echo "Main menu</a>";
  echo "</p>";
   echo "</body>";
}
////////////////////////////////Bookmarks//////////////////////
else if($action=="bookmarks"){
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
addonline($uid,"Viewing Bookmarks","index.php?action=$action");
$limit = 50;
$noi = "SELECT COUNT(*) FROM ibwf_bookmarks WHERE userid = '".$uid."'";
$noiq = sm_query($noi);
while($noinum=mysqli_fetch_array($noiq))
{ $total=$noinum[0]; }
$bal=$limit-$total;
 
echo "<p>Your Bookmarked Topics!<br/>You have $bal bookmarks remaining, out of a total of $limit allowed!<div class=\"iblock\" align=\"center\">";
if($page=="" || $page<1)$page=1;
$num_items = $total;
$items_per_page = 10;
$num_pages = ceil($num_items/$items_per_page);
if(($page>$num_pages)&&$page!=1)$page= $num_pages;
$limit_start = ($page-1)*$items_per_page;
$sql = "SELECT topic,name,id,time FROM ibwf_bookmarks WHERE userid = '".$uid."' ORDER BY time DESC LIMIT $limit_start, $items_per_page";
$items = sm_query($sql);
while($item=mysqli_fetch_array($items))
{
               $tlink = "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$item[0]\">".$item[1]."</a>";
               echo "$tlink [Added on ".date("d/m/Y", $item[3])." at ".date("h:i A", $item[3])."]<br/><a href=\"genproc.php?action=kaltibkmrk&amp;sid=$sid&amp;tpcid=$item[2]\">(Remove)</a><br/><br/>";
}
          echo "<p>";
    if($page>1)
    {
      $ppage = $page-1;
        $rets = "<form action=\"index.php?action=$action&amp;sid=$sid&amp;page=$ppage\" method=\"post\">";
        $rets .= "<input type=\"hidden\" name=\"sname\" value=\"$fname\"/>";
        $rets .= "<input type=\"hidden\" name=\"stype\" value=\"$ftype\"/>";
        $rets .= "<input type=\"hidden\" name=\"sdec\" value=\"$fdec\"/>";
        $rets .= "<input type=\"hidden\" name=\"sby\" value=\"$fby\"/>";
        $rets .= "<input type=\"submit\" value=\"Previous\"/></form> ";
        echo $rets;

    }
    if($page<$num_pages)
    {
      $npage = $page+1;
       $rets = "<form action=\"index.php?action=$action&amp;sid=$sid&amp;page=$npage\" method=\"post\">";
        $rets .= "<input type=\"hidden\" name=\"sname\" value=\"$fname\"/>";
        $rets .= "<input type=\"hidden\" name=\"stype\" value=\"$ftype\"/>";
        $rets .= "<input type=\"hidden\" name=\"sdec\" value=\"$fdec\"/>";
        $rets .= "<input type=\"hidden\" name=\"sby\" value=\"$fby\"/>";
          $rets .= "<input type=\"submit\" value=\"Next\"/></form> ";
        echo $rets;

    }
   /////////main menu footer
echo "<div class=\"footer\">";
   
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";

  echo xhtmlfoot();

echo "</div>";
}
else if($action=="clmop")
{
    $clid = $_GET["clid"];
    $who = $_GET["who"];
    addonline(getuid_sid($sid),"Moderating Club Member - xHTML","");
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
    echo "<a href=\"genproc.php?action=dcm&amp;sid=$sid&amp;who=$who&amp;clid=$clid\">&#187;Kick $whnick out</a><br/>";
    echo "<a href=\"index.php?action=gcp&amp;sid=$sid&amp;who=$who&amp;clid=$clid\">&#187;$whnick's Club Points</a><br/>";
    echo "<a href=\"index.php?action=gpl&amp;sid=$sid&amp;who=$who&amp;clid=$clid\">&#187;Give $whnick Credits</a><br/>";
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

else if($action=="gcp")
{
    $clid = $_GET["clid"];
    $who = $_GET["who"];
    addonline(getuid_sid($sid),"Moderating Club Member - xHTML","");
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
echo "<form action=\"genproc.php?action=gcp&amp;sid=$sid&amp;who=$who&amp;clid=$clid\" method=\"post\">";
    echo "Action: <select name=\"giv\">";
    echo "<option value=\"1\">Add</option>";
    echo "<option value=\"0\">Subtract</option>";
    echo "</select><br/>";
    echo "Points: <input name=\"pnt\" format=\"*N\" size=\"2\" maxlength=\"2\"/><br/>";
echo "<input type=\"submit\" value=\"GO\"/>";
echo "</form>";
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
    addonline(getuid_sid($sid),"Moderating Club Member - xHTML","");
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
    echo "<small><img src=\"images/point.gif\" alt=\"!\"/>You can only give Credits, these are real Credits, you can't subtract Credits<br/>";
    $cpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_clubs WHERE id='".$clid."'"));
    echo "<img src=\"images/point.gif\" alt=\"!\"/>Your club credits is $cpl[0]<br/>";
    echo "<img src=\"images/point.gif\" alt=\"!\"/>Do not abuse the giving of Credits, your club could be deleted<br/></small><br/>";

echo "<form action=\"genproc.php?action=gpl&amp;sid=$sid&amp;who=$who&amp;clid=$clid\" method=\"post\">";
echo "Credits: <input name=\"pnt\" format=\"*N\" size=\"2\" maxlength=\"2\"/><br/>";
echo "<input type=\"submit\" value=\"GO\"/>";
echo "</form>";

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
////////////////////////////////Profile Theme
else if($action=="sitethms")
{$pstyle = gettheme($sid);
    echo xhtmlhead("Control Panel",$pstyle);
 $theme = mysqli_fetch_array(sm_query("SELECT theme FROM ibwf_users WHERE id='".$who."'"));
      echo "<link rel=\"StyleSheet\" type=\"text/css\" href=\"style/$theme[0]\" />";
	  echo "<meta http-equiv=\"Cache-Control\" content=\"must-revalidate\" />\n";
      echo "<meta http-equiv=\"Cache-Control\" content=\"no-cache\" />\n";
      echo "<meta http-equiv=\"Pragma\" content=\"no-cache\" />\n";
    addonline(getuid_sid($sid),"Profile Theme","");
boxstart("Theme");
    echo "<p align=\"center\">";
        echo "</p>";
    echo "<p>";
    $tmsg = getpmcount(getuid_sid($sid));
  $umsg = getunreadpm(getuid_sid($sid));
  echo "<a href=\"inbox.php?action=main&amp;sid=$sid\">»Pm's($umsg/$tmsg)</a><br/>";
  $uid =getuid_sid($sid);
  
  echo "<p align=\"center\">";
  echo "<form action=\"genproc.php?action=updtthme&amp;sid=$sid\" method=\"post\">";
  include("set.php");
  echo "<input type=\"Submit\" name=\"submit\" Value=\"Save\"></form>";
  echo "</p>";

  echo "</p>";

    echo "<p align=\"center\">";

        echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();

}
///////////////////////////////////Control Panel

else if($action=="cpanel")
{
    addonline(getuid_sid($sid),"Control Panel - xHTML","index.php?action=$action");
        $pstyle = gettheme2(getuid_sid($sid));
    echo xhtmlhead("Control Panel - xHTML",$pstyle);
	
    echo "<p align=\"center\">";

    echo "<img src=\"images/cpanel.gif\" alt=\"CPanel\"/><br/>";
    echo "<b>Control Panel</b>";
    echo "</p>";
    echo "<p>";
div();
  $uid =getuid_sid($sid);
  
  echo "<a href=\"index.php?action=smidc&amp;sid=$sid\">&#187;$stitle ID card.</a><br/>";
  echo "<a href=\"index.php?action=myclub&amp;sid=$sid\">&#187;My Clubs</a><br/>";
  echo "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$uid\">&#187;Profile</a><br/>";
  echo "<a href=\"index.php?action=uset&amp;sid=$sid\">&#187;Profile Settings</a><br/>";
  echo "<a href=\"index.php?action=uxset&amp;sid=$sid\">&#187;User Settings</a><br/>";
  echo "<a href=\"index.php?action=stset&amp;sid=$sid\">&#187;Site Settings</a><br/>";
  echo "<a href=\"index.php?action=sitethms&amp;sid=$sid\">&#187;Profile Themes</a><br/>";
 
 $viewpro = mysqli_fetch_array(sm_query("SELECT viewpro FROM ibwf_users WHERE id = '".$uid."'"));

if($viewpro[0]=="1")
{
echo "<a href=\"genproc.php?action=viewpro&amp;sid=$sid&amp;act=dis\">Make Profile Public</a><br/>";
}else{
echo "<a href=\"genproc.php?action=viewpro&amp;sid=$sid&amp;act=enb\">Make Profile Private</a><br/>";
}
    echo "<br/><br/>";
	$sml = mysqli_fetch_array(sm_query("SELECT hvia FROM ibwf_users WHERE id='".getuid_sid($sid)."'"));
	if($sml[0]=="1")
	{
		echo "<a href=\"genproc.php?action=shsml&amp;sid=$sid&amp;act=dis\">Disable Smilies</a>";
	}else{
		echo "<a href=\"genproc.php?action=shsml&amp;sid=$sid&amp;act=enb\">Enable Smilies</a>";
	}
 
 
 
echo "<a href=\"lists.php?action=pmoods&sid=$sid\">&#187;Profile Moods</a><br/>";
  echo "<a href=\"index.php?action=pws&amp;sid=$sid\">&#187;My Wap site</a><br/>";
 echo "<a href=\"usergallery.php?action=help&amp;sid=$sid\">&#187;My personal Album</a><br/>";
  echo "<a href=\"index.php?action=search&amp;sid=$sid\">&#187;Search</a><br/>";
  $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_vault WHERE uid='".$uid."'"));
  echo "<a href=\"lists.php?action=vault&amp;sid=$sid&amp;who=$uid\">&#187;My Vault($noi[0])</a><br/>";
  $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_ignore WHERE name='".$uid."'"));
  echo "<a href=\"lists.php?action=ignl&amp;sid=$sid\">&#187;Ignore List($noi[0])</a><br/>";
  $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_gbook WHERE gbowner='".$uid."'"));
  echo "<a href=\"lists.php?action=gbook&amp;sid=$sid&amp;who=$uid\">&#187;Guestbook($noi[0])</a><br/>";
  echo "<a href=\"index.php?action=poll&amp;sid=$sid\">&#187;My Poll</a><br/>";
  $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_blogs WHERE bowner='".$uid."'"));
  echo "<a href=\"lists.php?action=blogs&amp;sid=$sid&amp;who=$uid\">&#187;Blogs($noi[0])</a><br/>";
  echo "<a href=\"lists.php?action=chmood&amp;sid=$sid\">&#187;Chatmood</a><br/>";
  echo "<a href=\"status.php?action=status&amp;sid=$sid\">&#187;Status</a><br/>";
  echo "<a href=\"lists.php?action=smilies&amp;sid=$sid\">&#187;Smilies</a><br/>";
  echo "<a href=\"lists.php?action=avatars&amp;sid=$sid\">&#187;Avatars</a><br/>";
  echo "<a href=\"lists.php?action=ecards&amp;sid=$sid\">&#187;E-Cards</a><br/>";
  echo "<a href=\"lists.php?action=bbcode&amp;sid=$sid\">&#187;BBCode</a><br/>";
  echo "<a href=\"lists.php?action=faqs&amp;sid=$sid\">&#187;F.A.Qs</a><br/>";
  
  echo "<a href=\"other.php?action=panel&amp;sid=$sid\">&#187;Help Menu</a><br/>";
 

 echo "<a href=\"index.php?action=terms&amp;sid=$sid\">&#187;Terms of use</a><br/>";

  echo "</p>";

    echo "<p align=\"center\">";


    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

///////////////////////////////////Control Panel

else if($action=="clmenu")
{
    addonline(getuid_sid($sid),"Clubs Menu - xHTML","index.php?action=$action");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Clubs Menu",$pstyle);
    echo "<p align=\"center\">";

    echo "<b>Clubs Menu</b>";
    echo "</p>";
    echo "<p>";
    $myid = getuid_sid($sid);
  echo "<a href=\"index.php?action=clubs&amp;sid=$sid\">&#187;All Clubs</a><br/>";
  echo "<a href=\"index.php?action=myclub&amp;sid=$sid\">&#187;My Clubs</a><br/>";
  echo "<a href=\"lists.php?action=clm&amp;who=$myid&amp;sid=$sid&amp;who=$uid\">&#187;Clubs I'm member of</a><br/>";
  echo "<a href=\"lists.php?action=pclb&amp;sid=$sid&amp;who=$uid\">&#187;Clubs By popularity</a><br/>";
  echo "<a href=\"lists.php?action=aclb&amp;sid=$sid&amp;who=$uid\">&#187;Clubs By Activity</a><br/>";
 
  $ncl = mysqli_fetch_array(sm_query("SELECT id, name FROM ibwf_clubs ORDER BY created DESC LIMIT 1"));
  echo "Newest Club: <a href=\"index.php?action=gocl&amp;clid=$ncl[0]&amp;sid=$sid\">".htmlspecialchars($ncl[1])."</a><br/>";

  echo "</p>";

    echo "<p align=\"center\">";

    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}


else if($action=="smidc")
{
    addonline(getuid_sid($sid),"$stitle ID - xHTML","index.php?action=$action");
    $pstyle = gettheme($sid);
    echo xhtmlhead("$stitle ID",$pstyle);
    echo "<p align=\"center\">";
    echo "<b>M! ID card</b><br/>";
    $uid = getuid_sid($sid);
    echo "<img src=\"smidc.php?id=$uid\" alt=\"M id\"/><br/><br/>";
    echo "This ID card is updated automatically everytime someone request it, the source to your card is http://srimobile.net/smidc.php?id=$uid<br/><br/>";
    echo "you can use it as an avatar in other sites<br/><br/>";
    echo "To look at others cards view the user profile then go to more information&gt;$stitle ID card.";
    echo "</p>";
    echo "<p align=\"center\">";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

///////////////////////////////////My Clubs

else if($action=="myclub")
{
    addonline(getuid_sid($sid),"My Clubs - xHTML","index.php?action=$action");
    $pstyle = gettheme($sid);
    echo xhtmlhead("My Clubs",$pstyle);
    echo "<p align=\"center\">";

    echo "<b>My Clubs</b>";
    echo "</p>";
    echo "<p>";
    $uid = getuid_sid($sid);
    if(getplusses($uid)<500)
    {
      echo "Clubs are small communities that users can create, every community should have things in common, for example a community for goths, blink 182 fans, rappers and anythin g you can think of, currently people who have more than 500 Credits only can create clubs, every user can create one club, to get Credits post in forms, or invite friends";
    }else{
      $uclubs = sm_query("SELECT id, name FROM ibwf_clubs WHERE owner='".$uid."'");
      while($club=mysqli_fetch_array($uclubs))
      {
        echo "<a href=\"index.php?action=gocl&amp;clid=$club[0]&amp;sid=$sid\">$club[1]</a>";
        echo ", <a href=\"genproc.php?action=dlcl&amp;clid=$club[0]&amp;sid=$sid\">[DELETE]</a><br/><br/>";
      }
      $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubs WHERE owner='".$uid."'"));
      if($noi[0]<1)
      {
      echo "<a href=\"index.php?action=addcl&amp;sid=$sid\">Add Club</a>";
      }
    }
  echo "</p>";

    echo "<p align=\"center\">";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

///////////////////////////////////My Clubs

else if($action=="clubs")
{
    addonline(getuid_sid($sid),"Clubs List - xHTML","index.php?action=$action");

    $pstyle = gettheme($sid);
    echo xhtmlhead("Clubs List",$pstyle);
    echo "<p align=\"center\">";
    echo "<b>Clubs List</b>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubs"));
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name, owner, description, created FROM ibwf_clubs ORDER BY created DESC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
        $item[1]=htmlspecialchars($item[1]);
        $mems = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubmembers WHERE clid='".$item[0]."' AND accepted='1'"));
      $lnk = "<a href=\"index.php?action=gocl&amp;clid=$item[0]&amp;sid=$sid\">$item[1]($mems[0])</a> <small>Owner: <a href=\"index.php?action=viewuser&amp;who=$item[2]&amp;sid=$sid\">".getnick_uid($item[2])."</a></small>";
      echo "$lnk<br/><small>";
      echo htmlspecialchars($item[3])."<br/>Creation Date: (".date("d/m/y", $item[4]).")</small><br/><br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"index.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;PREV</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"index.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {

        $rets = "<form action=\"index.php\" method=\"get\">";
      $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
        $rets .= "</form>";

        echo $rets;

    }
    echo "</p>";
    echo "<p align=\"center\">";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

else if($action=="gocl")
{
  $clid = $_GET["clid"];
  $clinfo = mysqli_fetch_array(sm_query("SELECT name, owner, description, rules, logo, plusses, created FROM ibwf_clubs WHERE id='".$clid."'"));
    addonline(getuid_sid($sid),"Viewing Club - xHTML","index.php?action=$action");
    $clnm = htmlspecialchars($clinfo[0]);
        $pstyle = gettheme($sid);
    echo xhtmlhead($clnm,$pstyle);
 
    echo "<h5>$clnm</h5><br/>";
    if(trim($clinfo[4])=="")
    {
      echo "<img src=\"images/logo.jpg\" alt=\"logo\"/>";
    }else{
        echo "<img src=\"$clinfo[4]\" alt=\"logo\"/>";
    }
    echo "</p>";
    echo "<p>";
    echo "Club ID: <b>$clid</b><br/>";
    $uid = getuid_sid($sid);
    $cango = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubmembers WHERE clid='".$clid."' AND uid='".$uid."' AND accepted='1'"));
    echo "Owner: <a href=\"index.php?action=viewuser&amp;who=$clinfo[1]&amp;sid=$sid\">".getnick_uid($clinfo[1])."</a><br/>";
      $mems = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubmembers WHERE clid='".$clid."' AND accepted='1'"));
      echo "Members: <a href=\"lists.php?action=clmem&amp;sid=$sid&amp;clid=$clid\">$mems[0]</a><br/>";
      echo "Created On: ".date("d/m/y", $clinfo[6])."<br/>";
      echo "Credits: $clinfo[5]<br/>";
      $fid = mysqli_fetch_array(sm_query("SELECT id FROM ibwf_forums WHERE clubid='".$clid."'"));
      $rid = mysqli_fetch_array(sm_query("SELECT id FROM ibwf_rooms WHERE clubid='".$clid."'"));
      $tps = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topics WHERE fid='".$fid[0]."'"));
      $pss = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_posts a INNER JOIN ibwf_topics b ON a.tid = b.id WHERE b.fid='".$fid[0]."'"));
    if(($cango[0]>0)||ismod($uid))
    {
        $noa = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_announcements WHERE clid='".$clid."'"));
        echo "<br/><a href=\"lists.php?action=annc&amp;sid=$sid&amp;clid=$clid\"><img src=\"images/annc.gif\" alt=\"!\"/>Announcements($noa[0])</a><br/>";
        $noa = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_chat WHERE rid='".$rid[0]."'"));
        echo "<a href=\"chat.php?sid=$sid&amp;rid=$rid[0]\"><img src=\"images/chat.gif\" alt=\"*\"/>$clnm Chat($noa[0])</a><br/>";
        echo "<a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$fid[0]\"><img src=\"images/1.gif\" alt=\"*\"/>$clnm Forum($tps[0]/$pss[0])</a><br/><br/>";
		$ismem = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubmembers WHERE clid='".$clid."' AND uid='".getuid_sid($sid)."'"));

		if($ismem[0]>0)
		{
			//unjoin
			if($clinfo[1]!=$uid)
			{
				echo "<a href=\"genproc.php?action=unjc&amp;sid=$sid&amp;clid=$clid\">Unjoin Club</a>";
			}
		}else{
			echo "<a href=\"genproc.php?action=reqjc&amp;sid=$sid&amp;clid=$clid\">Join Now!</a>";
		}
		if(isadmin(getuid_sid($sid)))
		{
			echo "<br/><a href=\"admincp.php?action=club&amp;sid=$sid&amp;clid=$clid\">Admin Tools</a>";
		}
        if($clinfo[1]==$uid)
      {
        //club owner
        $mems = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubmembers WHERE clid='".$clid."' AND accepted='0'"));
        echo "<br/><a href=\"lists.php?action=clreq&amp;sid=$sid&amp;clid=$clid\">&#187;Requests($mems[0])</a><br/>";
	 echo "<a href=\"index.php?action=pmallmem&amp;sid=$sid&amp;clid=$clid\">&#187;PM Club Members</a><br/>";

      }
    }else{
      echo "Topics: <b>$tps[0]</b>, Posts: <b>$pss[0]</b><br/>";
      echo "<b>Description:</b><br/>";
      echo htmlspecialchars($clinfo[2]);
      echo "<br/><br/>";
      echo "<b>Rules:</b><br/>";
      echo htmlspecialchars($clinfo[3]);
      echo "<br/><br/>";
      echo "Seems Good? <a href=\"genproc.php?action=reqjc&amp;sid=$sid&amp;clid=$clid\">Join Now!</a>";
    }
    echo "</p>";
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=clubs&amp;sid=$sid\">";
echo "Clubs list</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

else if($action=="addcl")
{
    addonline(getuid_sid($sid),"Adding Club - xHTML","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Add Club",$pstyle);
    
    echo "<h5>Add Club</h5>";
  
    if(isvip($uid))
    {
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubs WHERE owner='".$uid."'"));
      if($noi[0]==0)
      {
	  dival();
        echo "<small><img src=\"images/point.gif\" alt=\"*\"/>All Info are required except the logo<br/>";
        echo "<img src=\"images/point.gif\" alt=\"*\"/>Beside you, mods can moderate your club forums and chat<br/>";
        echo "<img src=\"images/point.gif\" alt=\"*\"/>Any leading spaces for description, name, logo, or rules will be removed<br/>";
        echo "<img src=\"images/point.gif\" alt=\"*\"/>Admins will delete your club and subtract your Credits if you abuse the using of the club<br/>";
        echo "<img src=\"images/point.gif\" alt=\"*\"/>Admins have the right to delete your club if it want active or if it was useless<br/></small></div>";
div();

echo "<form enctype=\"multipart/form-data\" action=\"genproc.php?action=addcl&amp;sid=$sid\" method=\"post\">";
 echo "Logo:<input type=\"file\" name=\"f1\" size=\"15\"><br/>";
echo "Club Name:<input name=\"clnm\" maxlength=\"30\"/><br/>";
        echo "Description:<input name=\"clds\" maxlength=\"200\"/><br/>";
        echo "Rules:<input name=\"clrl\" maxlength=\"500\"/><br/>";
echo "<input type=\"hidden\" name=\"action\" value=\"image\" /><br/>";		
echo "<input type=\"submit\" value=\"Create\"/>";
echo "</form></div>";


      }else{
        echo "You already club";
      }
      }else{

      echo "You cant add clubs";
      }


    echo "<p align=\"center\">";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}



///////////////////////////////////Search

else if($action=="search")
{
    addonline(getuid_sid($sid),"Search Menu - xHTML","index.php?action=$action");
        $pstyle = gettheme($sid);
    echo xhtmlhead("Search Menu",$pstyle);
    echo "<p align=\"center\">";

    echo "<img src=\"images/search.gif\" alt=\"*\"/><br/>";
    echo "<b>Search Menu</b>";
    echo "</p>";
    echo "<p>";
    echo "<a href=\"search.php?action=tpc&amp;sid=$sid\">&#0187;In Topics</a><br/>";
    echo "<a href=\"search.php?action=blg&amp;sid=$sid\">&#0187;In Blogs</a><br/>";
    echo "<a href=\"search.php?action=nbx&amp;sid=$sid\">&#0187;In My Inbox</a><br/>";
    echo "<a href=\"search.php?action=clb&amp;sid=$sid\">&#0187;In Clubs</a><br/><br/>";
	echo "Find Members:<br/>";
    echo "<a href=\"search.php?action=mbrn&amp;sid=$sid\">&#0187;In Nicknames</a><br/>";
	//echo "<a href=\"search.php?action=mbrl&amp;sid=$sid\">&#0187;In Location</a><br/>";
	//echo "<a href=\"search.php?action=mbrs&amp;sid=$sid\">&#0187;By sex orientation</a><br/>";
	echo "More search options for members are to come<br/>";
    echo "<br/><small>or you can just type the nickname of the member and view its profile</small><br/>";


    echo "<form method=\"post\" action=\"index.php?action=viewuser&amp;sid=$sid\">";
    echo "<br/>Nickname <input name=\"mnick\" maxlength=\"15\"/><br/>";
    echo "<input type=\"submit\" name=\"Submit\" value=\"View Profile\"/><br/>";
    echo "</form>";

  echo "</p>";

    echo "<p align=\"center\">";

    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

///////////////////////////////////Settings

else if($action=="uset")
{
    addonline(getuid_sid($sid),"User Settings - xHTML","index.php?action=$action");
    $pstyle = gettheme($sid);
    echo xhtmlhead("User Settings",$pstyle);
    echo "<onevent type=\"onenterforward\">";
    $uid = getuid_sid($sid);

    $email = mysqli_fetch_array(sm_query("SELECT email FROM ibwf_users WHERE id='".$uid."'"));
    $site = mysqli_fetch_array(sm_query("SELECT site FROM ibwf_users WHERE id='".$uid."'"));
	
	
    $bdy = mysqli_fetch_array(sm_query("SELECT birthday FROM ibwf_users WHERE id='".$uid."'"));
    $uloc = mysqli_fetch_array(sm_query("SELECT location FROM ibwf_users WHERE id='".$uid."'"));
    $usig = mysqli_fetch_array(sm_query("SELECT signature FROM ibwf_users WHERE id='".$uid."'"));
    $sx = mysqli_fetch_array(sm_query("SELECT sex FROM ibwf_users WHERE id='".$uid."'"));
    $rmsg = mysqli_fetch_array(sm_query("SELECT fmsg FROM ibwf_users WHERE id='".$uid."'"));
	$md = mysqli_fetch_array(sm_query("SELECT mood FROM ibwf_users WHERE id='".$uid."'"));
	$uloc[0] = htmlspecialchars($uloc[0]);

    echo "<p align=\"center\">";

    echo "<b>Settings</b>";
    echo "</p>";
    echo "<p>";
  echo "<form method=\"post\" action=\"genproc.php?action=uprof&amp;sid=$sid\">";

	echo "Mood: <select name=\"umood\" value=\"$md[0]\">";
    if($md[0]=="s"){
    echo "<option value=\"s\" selected=\"s\">Im Sweet</option>";
    }else{
    echo "<option value=\"s\">Im Sweet</option>";
    }
    if($md[0]=="x"){
    echo "<option value=\"x\" selected=\"x\">Im Sexy</option>";
    }else{
    echo "<option value=\"x\">Im Sexy</option>";
    }
	if($md[0]=="a"){
    echo "<option value=\"a\" selected=\"a\">Im Angry</option>";
    }else{
    echo "<option value=\"a\">Im Angry</option>";
    }
	if($md[0]=="h"){
    echo "<option value=\"h\" selected=\"h\">Im Happy</option>";
    }else{
    echo "<option value=\"h\">Im Happy</option>";
    }
	if($md[0]=="u"){
    echo "<option value=\"u\" selected=\"u\">Im Sad</option>";
    }else{
    echo "<option value=\"u\">Im Sad</option>";
    }
	if($md[0]=="f"){
    echo "<option value=\"f\" selected=\"f\">Looking For a Friend</option>";
    }else{
    echo "<option value=\"f\">Looking For a Friend</option>";
    }
	if($md[0]=="l"){
    echo "<option value=\"l\" selected=\"l\">Looking For a Lover</option>";
    }else{
    echo "<option value=\"l\">Looking For a Lover</option>";
    }
	if($md[0]=="0"){
    echo "<option value=\"0\" selected=\"0\">Leave me Alone</option>";
    }else{
    echo "<option value=\"0\">Leave me Alone</option>";
    }
	if($md[0]=="b"){
    echo "<option value=\"b\" selected=\"b\">Im Busy</option>";
    }else{
    echo "<option value=\"b\">Im Busy</option>";
    }
	if($md[0]=="x"){
    echo "<option value=\"e\" selected=\"e\">Enjoying $stitle</option>";
    }else{
    echo "<option value=\"e\">Enjoying $stitle</option>";
    }

    echo "</select><br/>";

    echo "Birthday:";
 $bbday= explode("-",$bdy[0]);
 
  $date=date("Y")-10;
   $date2=date("Y")-30;
 echo "<select name=\"bdyy\">";
  for($i=$date2;$i<=$date;$i++)
  {
  if($bbday[0]==$i){
   echo "<option value=\"$i\" selected=\"$i\">$i</option>";
  }else{
  echo"<option value=\"$i\">$i</option>";
  }}
  echo "</select>";
  /////////////////////////////////
 echo "-<select name=\"bdym\">";
   for($i=1;$i<=12;$i++)
   {
if($bbday[1]==$i){
   echo "<option value=\"$i\" selected=\"$i\">$i</option>";
  }else{
  echo"<option value=\"$i\">$i</option>";
  }}
 echo "</select>";
 
 //////////////////////////////////////////
 echo "-<select name=\"bdyd\">";
	for($i=1;$i<=30;$i++)
	{
 if($bbday[2]==$i){
   echo "<option value=\"$i\" selected=\"$i\">$i</option>";
  }else{
  echo"<option value=\"$i\">$i</option>";
  }}
 echo"</select><br/>";
//////////////////////////////////////////////////////////////////////


   echo "Location: <input name=\"uloc\" maxlength=\"50\" value=\"$uloc[0]\"/><br/>";
   
    echo "Signature: <input name=\"usig\" maxlength=\"100\" value=\"$usig[0]\"/><br/>";
   echo "Sex: <select name=\"usex\" value=\"$sx[0]\">";
    if($sx[0]=="M"){
    echo "<option value=\"M\" selected=\"M\">Male</option>";
    }else{
    echo "<option value=\"M\">Male</option>";
    }
    if($sx[0]=="F"){
    echo "<option value=\"F\" selected=\"F\">Female</option>";
    }else{
    echo "<option value=\"F\">Female</option>";
    }
    echo "</select><br/>";
    echo "<input type=\"submit\" name=\"Submit\" value=\"Update\"/><br/>";
    echo "</form>";
/////////////////////////////////////////////////////////////////
	echo "<br/><br/>";

	echo "<form method=\"post\" action=\"genproc.php?action=upwd&amp;sid=$sid\">";
    echo "New Password: <input type=\"password\" name=\"npwd\" format=\"*x\" maxlength=\"15\"/><br/>";
    echo " New Password Again: <input type=\"password\" name=\"cpwd\" format=\"*x\" maxlength=\"15\"/><br/>";
    echo "<input type=\"submit\" name=\"Submit\" value=\"Change\"/><br/>";
    echo "</form>";

    echo "</p>";
    echo "<p align=\"center\">";

    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

///////////////////////////////////Site Settings

else if($action=="stset")
{
    addonline(getuid_sid($sid),"Site Settings - xHTML","index.php?action=$action");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Site Settings",$pstyle);
    echo "<p align=\"center\">";
    echo "<b>Site View Settings</b>";
    echo "</p>";
    echo "<p>";
    echo "<form method=\"POST\" action=\"genproc.php?action=ustset&amp;sid=$sid\">";

    $uid = getuid_sid($sid);
 
    $showcons = mysqli_fetch_array(sm_query("SELECT showicon FROM ibwf_users WHERE id='".$uid."'"));
    $showtime = mysqli_fetch_array(sm_query("SELECT showtime FROM ibwf_users WHERE id='".$uid."'"));
    $showshout = mysqli_fetch_array(sm_query("SELECT showshout FROM ibwf_users WHERE id='".$uid."'"));
    $theme = mysqli_fetch_array(sm_query("SELECT themeid FROM ibwf_users WHERE id='".$uid."'"));
    $showshortkey = mysqli_fetch_array(sm_query("SELECT showshortkey FROM ibwf_users WHERE id='".$uid."'"));

    echo "<small>Select Site Language (Beta):</small> <select name=\"sitelang\" value=\"$sitelang[0]\">";
    echo "<option value=\"1\">English</option>";
    echo "<option value=\"2\">Sinhala</option>";
	echo "<option value=\"6\">Tamil</option>";
	 echo "<option value=\"3\">Afrikaans</option>";
   echo "<option value=\"4\">Indonesian</option>";
   echo "<option value=\"5\">Arabic</option>";

    echo "</select><br/><br/>";

    echo "<small>Theme:</small> <select name=\"theme\" value=\"$theme[0]\">";
    if (strstr($_SERVER['HTTP_USER_AGENT'], "MOT-")) {
	echo "<optgroup>";
	}
    if($theme[0]=="1"){
    echo "<option value=\"1\" selected=\"1\">$stitle</option>";
    }else{
    echo "<option value=\"1\">$stitle</option>";
    }
    if($theme[0]=="2"){
    echo "<option value=\"2\" selected=\"2\">Blue</option>";
    }else{
    echo "<option value=\"2\">Blue</option>";
    }
    if($theme[0]=="3"){
    echo "<option value=\"3\" selected=\"3\">Black to White</option>";
    }else{
    echo "<option value=\"3\">Black to White</option>";
    }
    if($theme[0]=="4"){
    echo "<option value=\"4\"  selected=\"4\">Red</option>";
    }else{
    echo "<option value=\"4\">Red</option>";
    }
    if($theme[0]=="5"){
    echo "<option value=\"5\"  selected=\"5\">Green</option>";
    }else{
    echo "<option value=\"5\">Green</option>";
    }
    if($theme[0]=="6"){
    echo "<option value=\"6\"  selected=\"6\">Steel</option>";
    }else{
    echo "<option value=\"6\">Steel</option>";
    }
    if($theme[0]=="7"){
    echo "<option value=\"7\"  selected=\"7\">Opera WML</option>";
    }else{
    echo "<option value=\"7\">Opera WML</option>";
    }
    if($theme[0]=="8"){
    echo "<option value=\"8\"  selected=\"8\">Error</option>";
    }else{
    echo "<option value=\"8\">Error</option>";
    }
    if($theme[0]=="9"){
    echo "<option value=\"9\"  selected=\"9\">Grey Orange</option>";
    }else{
    echo "<option value=\"9\">Grey Orange</option>";
    }
    if($theme[0]=="10"){
    echo "<option value=\"10\"  selected=\"10\">Pinky</option>";
    }else{
    echo "<option value=\"10\">Pinky</option>";
    }
    if($theme[0]=="11"){
    echo "<option value=\"11\"  selected=\"11\">Matrix</option>";
    }else{
    echo "<option value=\"11\">Matrix</option>";
    }
    if($theme[0]=="12"){
    echo "<option value=\"12\"  selected=\"12\">Goth</option>";
    }else{
    echo "<option value=\"12\">Goth</option>";
    }
    if($theme[0]=="13"){
    echo "<option value=\"13\"  selected=\"13\">Night Pink</option>";
    }else{
    echo "<option value=\"13\">Night Pink</option>";
    }
    if (strstr($_SERVER['HTTP_USER_AGENT'], "MOT-")) {
	echo "</optgroup>";
	}
    echo "</select><br/><br/>";

    echo "<small>Shorcut Key Number?:</small> <select name=\"showshortkey\" value=\"$showshortkey[0]\">";
    if($showshortkey[0]=="1"){
    echo "<option value=\"1\" selected=\"1\">Yes</option>";
    }else{
    echo "<option value=\"1\">Yes</option>";
    }
    if($showshortkey[0]=="0"){
    echo "<option value=\"0\" selected=\"0\">No</option>";
    }else{
    echo "<option value=\"0\">No</option>";
    }
    echo "</select><br/><br/>";

    echo "<small>Show Icons on Main Page?:</small> <select name=\"showcons\" value=\"$showcons[0]\">";
    if($showcons[0]=="1"){
    echo "<option value=\"1\" selected=\"1\">Yes</option>";
    }else{
    echo "<option value=\"1\">Yes</option>";
    }
    if($showcons[0]=="0"){
    echo "<option value=\"0\" selected=\"0\">No</option>";
    }else{
    echo "<option value=\"0\">No</option>";
    }
    echo "</select><br/><br/>";

    echo "<small>Show Time on Main Page?:</small> <select name=\"showtime\" value=\"$showtime[0]\">";
    if($showtime[0]=="1"){
    echo "<option value=\"1\" selected=\"1\">Yes</option>";
    }else{
    echo "<option value=\"1\">Yes</option>";
    }
    if($showtime[0]=="0"){
    echo "<option value=\"0\" selected=\"0\">No</option>";
    }else{
    echo "<option value=\"0\">No</option>";
    }
    echo "</select><br/><br/>";

    echo "<small>Show Shoutbox on Main Page?:</small> <select name=\"showshout\" value=\"$showshout[0]\">";
    if($showshout[0]=="1"){
    echo "<option value=\"1\" selected=\"1\">Yes</option>";
    }else{
    echo "<option value=\"1\">Yes</option>";
    }
    if($showshout[0]=="0"){
    echo "<option value=\"0\" selected=\"0\">No</option>";
    }else{
    echo "<option value=\"0\">No</option>";
    }
    echo "</select><br/><br/>";

    echo "<input type=\"submit\" name=\"Submit\" value=\"Update\"/><br/>";
    echo "</form>";
	echo "<br/><br/>";
    echo "</p>";
    echo "<p align=\"center\">";

    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}


///////////////////////////////////Poll Topic
else if($action=="poll")
{
    addonline(getuid_sid($sid),"Administrating Poll - xHTML","");
        $pstyle = gettheme($sid);
    echo xhtmlhead("Your Poll",$pstyle);
    echo "<p>";
 
    $uid = getuid_sid($sid);
    if(getplusses($uid)<50)
    {
      echo "Minimum Credits required to administrate your poll is 50 credits";
    }else{
        $pid = mysqli_fetch_array(sm_query("SELECT pollid FROM ibwf_users WHERE id='".$uid."'"));
        if($pid[0] == 0)
        {
          echo "<a href=\"index.php?action=crpoll&amp;sid=$sid\">Create Poll</a>";
        }else{
          echo "<a href=\"index.php?action=viewpl&amp;sid=$sid&amp;who=$uid\">View Your Poll</a><br/>";
            echo "<a href=\"genproc.php?action=dlpoll&amp;sid=$sid\">Delete Your Poll</a><br/>";
        }
    }
    echo "</p>";

    echo "<p align=\"center\">";

    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();

}else if($action=="crpoll")
{
    addonline(getuid_sid($sid),"Creating Poll - xHTML","");
    echo "<card id=\"main\" title=\"Create Poll\">";
    echo "<p>";
    if(getplusses(getuid_sid($sid))>=50)
    {
    $pid = mysqli_fetch_array(sm_query("SELECT pollid FROM ibwf_users WHERE id='".$uid."'"));
        if($pid[0] == 0)
        {

echo "<form action=\"genproc.php?action=crpoll&amp;sid=$sid\" method=\"post\">";
          echo "Question:<input name=\"pques\" maxlength=\"250\"/><br/>";
          echo "Option 1:<input name=\"opt1\" maxlength=\"100\"/><br/>";
          echo "Option 2:<input name=\"opt2\" maxlength=\"100\"/><br/>";
          echo "Option 3:<input name=\"opt3\" maxlength=\"100\"/><br/>";
          echo "Option 4:<input name=\"opt4\" maxlength=\"100\"/><br/>";
          echo "Option 5:<input name=\"opt5\" maxlength=\"100\"/><br/>";
echo "<input type=\"submit\" value=\"Create\"/>";
echo "</form>";


          }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>You already have a poll";
          }
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>You should have at least 50 Credits to create a poll";
          }
    echo "</p>";

    echo "<p align=\"center\">";

    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}
else if($action=="pws")
{
    addonline(getuid_sid($sid),"P.W.S - xHTML","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("P.W.S",$pstyle);
    echo "<p>";
    echo "&#187;Welcome Image<br/>";
	echo "<small>The image on main page<br/>";
	echo "In Image field: type smilie code for smilie like -hi-, the image URL for external image, leave blank for other options</small><br/>";
	echo "<form method=\"post\" action=\"genproc.php?action=pws&amp;sid=$sid\">";
	echo "<select name=\"imgt\">";
	echo "<option value=\"idc\">My ID Card</option>";
	echo "<option value=\"avt\">My Current Avatar</option>";
	echo "<option value=\"sml\">Smilie</option>";
	echo "<option value=\"ilk\">Image URL</option>";
	echo "</select><br/>";
	echo "Image:<input name=\"imgo\" maxlength=\"200\"/><br/><br/>";
	echo "&#187;Welcome Message<br/>";
	echo "<small>The message that appears on first page of your site, smilies are allowed</small><br/>";
	echo "Message:<input name=\"smsg\" maxlength=\"250\"/><br/><br/>";
	echo "&#187;Theme<br/>";
	echo "<small>Themes available only on phones supporting XHTML</small><br/>";
	echo "<select name=\"thms\">";
	$themes = sm_query("SELECT id, name FROM ibwf_themes");
	while ($theme = mysqli_fetch_array($themes))
	{
	echo "<option value=\"$theme[0]\">".htmlspecialchars($theme[1])."</option>";
	}
	echo "</select><br/>";
    echo "<input type=\"submit\" name=\"Submit\" value=\"Update\"/><br/>";
    echo "</form>";

    echo "</p>";
    echo "<p align=\"center\">";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
    echo "</p>";
    echo xhtmlfoot();
}

else if($action=="pltpc")
{
  $tid = $_GET["tid"];
    addonline(getuid_sid($sid),"Creating Poll - xHTML","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Create Poll",$pstyle);
    echo "<p>";
    if((getplusses(getuid_sid($sid))>=500)||ismod($uid))
    {
    $pid = mysqli_fetch_array(sm_query("SELECT pollid FROM ibwf_topics WHERE id='".$tid."'"));
        if($pid[0] == 0)
        {

          echo "<form method=\"post\" action=\"genproc.php?action=pltpc&amp;sid=$sid&amp;tid=$tid\">";
          echo "Question:<input name=\"pques\" maxlength=\"250\"/><br/>";
          echo "Option 1:<input name=\"opt1\" maxlength=\"100\"/><br/>";
          echo "Option 2:<input name=\"opt2\" maxlength=\"100\"/><br/>";
          echo "Option 3:<input name=\"opt3\" maxlength=\"100\"/><br/>";
          echo "Option 4:<input name=\"opt4\" maxlength=\"100\"/><br/>";
          echo "Option 5:<input name=\"opt5\" maxlength=\"100\"/><br/>";
          echo "<input type=\"submit\" name=\"Submit\" value=\"Create\"/><br/>";
          echo "</form>";


          }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>The topic already have a poll";
          }
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>You should have at least 500 Credits to create a poll";
          }
    echo "</p>";

    echo "<p align=\"center\">";

    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

else if($action=="stats")
{
    addonline(getuid_sid($sid),"Site statistics - xHTML","index.php?action=$action");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Site Statistics",$pstyle);
	echo"<h5>Site Statistics</h5>";
	
    echo "<p>";
    $norm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users"));

    $siteage = mysqli_fetch_array(sm_query("SELECT value  FROM ibwf_settings WHERE id='9'"));
    $sage = (time() - $timeadjust)-$siteage[0];
    $stage = ceil($sage/(24*60*60));
    echo "Site Age: <b>$stage Days</b><br/><br/>";
   $rmem = regmemcount() + 640;
 
  echo "Registered Members: <b>$rmem</b><br/>";
    $memid = mysqli_fetch_array(sm_query("SELECT id, name  FROM ibwf_users ORDER BY regdate DESC LIMIT 0,1"));
    echo "The Newest Member is: <b><a href=\"index.php?action=viewuser&amp;who=$memid[0]&amp;sid=$sid\">$memid[1]</a></b><br/><br/>";
    $mols = mysqli_fetch_array(sm_query("SELECT name, value FROM ibwf_settings WHERE id='2'"));
    echo "Most online: <b>$mols[1]</b> Members on $mols[0]<br/>";
    $mols = mysqli_fetch_array(sm_query("SELECT ppl, dtm FROM ibwf_mpot WHERE ddt='".date("d m y")."'"));
    echo "<br/>Most online(<a href=\"lists.php?action=moto&amp;sid=$sid\">today only</a>): <b>$mols[0]</b> Members at $mols[1]<br/>";
    $tm24 = (time() - $timeadjust) - (24*60*60) ;
    $aut = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE lastact>'".$tm24."'"));
    
    echo "<br/>Active users today <b>$aut[0]</b><br/>";
    $notc = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topics"));
    $nops = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_posts"));
    echo "Number of Topics: <b>$notc[0]</b><br/>";
    echo "Number of Posts: <b>$nops[0]</b><br/>";
    $nopm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private"));
    echo "Number of PMs: <b>$nopm[0]</b><br/>";
    $nopm = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='Counter'"));
    echo "Counter: <b>$nopm[0]</b><br/><br/>";
    echo "</small>";
    echo "</p>";
    echo "<p>";
    echo "<small>";
    /////
    echo "<br/><h2>General <b>Stats</b></h2><br/>";
    echo "<a href=\"index.php?action=l24&amp;sid=$sid\">&#187;What happend in the last 24 hours?</a><br/>";
    echo "<a href=\"lists.php?action=members&amp;sid=$sid\">&#187;Members($norm[0])</a><br/>";
    $norm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE sex='M'"));
    echo "<a href=\"lists.php?action=males&amp;sid=$sid\">--&#187;Males($norm[0])</a><br/>";
    $norm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE sex='F'"));
    echo "<a href=\"lists.php?action=fems&amp;sid=$sid\">--&#187;Females($norm[0])</a><br/>";

    echo "<br/><h2>Fun Stats</h2><br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_blogs"));
    echo "<a href=\"lists.php?action=allbl&amp;sid=$sid\">&#187;Blogs($noi[0])</a><br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE pollid>'0'"));
    echo "<a href=\"lists.php?action=polls&amp;sid=$sid\">&#187;Polls($noi[0])</a><br/>";
    $nobr=mysqli_fetch_array(sm_query("SELECT COUNT(DISTINCT browserm) FROM ibwf_users WHERE browserm IS NOT NULL "));
    echo "<a href=\"lists.php?action=brows&amp;sid=$sid\">&#187;Browsers($nobr[0])</a><br/>";

    echo "<br/><h2>Members Toplist</h2><br/>";
  
    echo "<a href=\"lists.php?action=longon&amp;sid=$sid\">&#187;Longest Online</a><br/>";
    echo "<a href=\"lists.php?action=mostc&amp;sid=$sid\">&#187;Most Credits</a><br/>";
    echo "<a href=\"lists.php?action=topp&amp;sid=$sid\">&#187;Top Posters</a><br/>";
    echo "<a href=\"lists.php?action=tchat&amp;sid=$sid\">&#187;Top Chatters</a><br/>";
    //echo "<a href=\"lists.php?action=topb&amp;sid=$sid\">&#187;Top Battlers</a><br/>";
    echo "<a href=\"lists.php?action=tshout&amp;sid=$sid\">&#187;Top Shouters</a><br/>";
    echo "<a href=\"lists.php?action=tthemes&amp;sid=$sid\">&#187;Top Themes</a><br/>";

    echo "<br/><h2>Permission Stats</h2><br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE perm>'0'"));
    echo "<a href=\"lists.php?action=staff&amp;sid=$sid\">&#187;Staff Members($noi[0])</a><br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE specialid>'0'"));
    echo "<a href=\"lists.php?action=vips&amp;sid=$sid\">&#187;V.I.P Members($noi[0])</a><br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_judges"));
    echo "<a href=\"lists.php?action=judg&amp;sid=$sid\">&#187;Chat Moderators ($noi[0])</a><br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_penalties WHERE penalty='1' OR penalty='2'"));

    echo "<br/><h2>Other Stats</h2><br/>";
    $tbday=mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users where month(`birthday`) = month(curdate()) and dayofmonth(`birthday`) = dayofmonth(curdate());"));
    echo "<a href=\"lists.php?action=bdy&amp;sid=$sid\">&#187;Today's Birthday($tbday[0])</a><br/>";
    echo "<a href=\"lists.php?action=banned&amp;sid=$sid\">&#187;Banned($noi[0])</a><br/>";
    if(ismod(getuid_sid($sid)))
{
  $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_penalties WHERE penalty='0'"));
    echo "<a href=\"lists.php?action=trashed&amp;sid=$sid\">&#187;Trashed($noi[0])</a><br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_penalties WHERE penalty='2'"));
    echo "<a href=\"lists.php?action=ipban&amp;sid=$sid\">&#187;Banned IPs($noi[0])</a><br/>";
    }

    echo "</p>";
    echo "<p align=\"center\">";

    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

else if($action=="l24")
{
    addonline(getuid_sid($sid),"24 Hour statistics - xHTML","index.php?action=$action");
    $pstyle = gettheme($sid);
    echo xhtmlhead("24 Hour Statistics",$pstyle);
    echo "<p>";
    echo "<small>";
    /////
    echo "Things happened in $stitle in the last 24 hours<br/><br/>";
    $tm24 = (time() - $timeadjust) - (24*60*60) ;
    $aut = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE lastact>'".$tm24."'"));
    echo "Active Members: <b>$aut[0]</b><br/>";
$aut = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE regdate>'".$tm24."'"));
    echo "Registered Members: <b>$aut[0]</b><br/>";
    $aut = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_blogs WHERE bgdate>'".$tm24."'"));
    echo "Blogs Created: <b>$aut[0]</b><br/>";
    $aut = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubmembers WHERE joined>'".$tm24."' AND accepted='1'"));
    echo "Members Joined Clubs: <b>$aut[0]</b><br/>";
    $aut = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubs WHERE created>'".$tm24."'"));
    echo "Clubs Created: <b>$aut[0]</b><br/>";
    $aut = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_buddies WHERE reqdt>'".$tm24."' AND agreed='1'"));
    echo "Buddies Added: <b>$aut[0]</b><br/>";
    $aut = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_gbook WHERE dtime>'".$tm24."'"));
    echo "Guestbooks Signed: <b>$aut[0]</b><br/>";
    if(ismod(getuid_sid($sid))){
    $aut = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_mlog WHERE actdt>'".$tm24."'"));
    echo "ModLog Actions: <b>$aut[0]</b><br/>";
  }
  $aut = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_polls WHERE pdt>'".$tm24."'"));
    echo "Polls Added: <b>$aut[0]</b><br/>";
    $aut = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_posts WHERE dtpost>'".$tm24."'"));
    echo "Posts: <b>$aut[0]</b><br/>";
    $aut = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE timesent>'".$tm24."'"));
    echo "PMs Sent: <b>$aut[0]</b><br/>";
    $aut = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_shouts WHERE shtime>'".$tm24."'"));
    echo "Shouts: <b>$aut[0]</b><br/>";
    $aut = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topics WHERE crdate>'".$tm24."'"));
    echo "Topics Created: <b>$aut[0]</b><br/>";
    $aut = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_vault WHERE pudt>'".$tm24."'"));
    echo "Vault Items Added: <b>$aut[0]</b><br/>;";
    echo "</small></p>";
    echo "<p align=\"center\">";
echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Statistics</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}



else if($action=="pmallmem")
{
	$clid=$_GET["clid"];
	$clinfo = mysqli_fetch_array(sm_query("SELECT name, owner, description, rules, logo, plusses, created FROM ibwf_clubs WHERE id='".$clid."'"));
	    addonline(getuid_sid($sid),"Xhtml - PMing Club Members","");
      $pstyle = gettheme($sid);
    echo xhtmlhead("PMing Club Members",$pstyle);
	if(isvip($uid)){
	if($clinfo[1]==$uid){
    echo "<p align=\"center\">";
    echo "<b>PM All Members Of The $clinfo[0] Club</b><br/><br/>";
	echo "Please enter the message You Wish To Send To ALL Members Below<br/>";
	 
	echo "<form action=\"index.php?action=sendclpm&amp;sid=$sid\" method=\"post\">";

echo '<textarea name="pmtext" cols="45" rows="5"></textarea><br/>';
    echo "<input type=\"hidden\" name=\"clid\" value=\"$clid\"/>";
	 echo "<input type=\"hidden\" name=\"cname\" value=\"$clinfo[0] \"/>";

echo "<input type=\"submit\" value=\"SEND\"/>";
echo "</form>";
    echo "<p align=\"center\">";
 $mems = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubmembers WHERE clid='".$clid."' AND accepted='1'"));
  $pluss=$mems[0]*15;
	
	echo "(Service costs $pluss Credits)<br/>";
	
	
	}else echo"Ur Not $clinfo[0] Owner <br/>";
	}else echo"Ur Not SM Premium User! <br/>";
    echo "<a href=\"index.php?action=clubs&amp;sid=$sid\">";
	echo "Clubs list</a><br/>";
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
	echo "Home</a>";
 	echo "</p>";
   echo xhtmlfoot();
    }
else if($action=="sendclpm")
{
$cname=$_POST["cname"];
	$clid=$_POST["clid"];
	$pmtext=$_POST["pmtext"];
	$clinfo = mysqli_fetch_array(sm_query("SELECT name, owner, description, rules, logo, plusses, created FROM ibwf_clubs WHERE id='".$clid."'"));
	$owner = $clinfo[1];
	    addonline(getuid_sid($sid),"Xhtml - PMing Club Members","");
      $pstyle = gettheme($sid);
    echo xhtmlhead("PMing Club Members",$pstyle);
	if(isvip($uid)){
	if($owner==$uid){
    echo "<p align=\"center\">";
    echo "<b>PM All Members Of The $clinfo[0] Club</b><br/><br/>";
	$mems = sm_query("SELECT uid FROM ibwf_clubmembers WHERE clid='".$clid."' AND accepted='1'");
	while($row=mysqli_fetch_array($mems))
	{
      $tm = time();
	  $pmtextn = "$pmtext [br/][br/]*[i] Automatic PM From [club=$clid] $cname [/club]Club![/i]*";
  $res = sm_query("INSERT INTO ibwf_private SET text='".$pmtextn."', byuid='".$owner."', touid='".$row[0]."', timesent='".$tm."'");
}
  if($res)
  {

    echo "<img src=\"images/ok.gif\" alt=\"O\"/>";
    echo "PMs sent successfully<br/><br/>";
    echo parsepm($pmtextn, $sid);
	 $mems = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubmembers WHERE clid='".$clid."' AND accepted='1'"));
  $plus =$mems[0]*15;
   $mypluss=getplusses($uid);
   $discharge=$mypluss-$plus;
	 sm_query("UPDATE ibwf_users SET plusses='".$discharge."' WHERE id='".$uid."'");
    echo "<br/><br/>-------<br/>$plus credits were subtracted from you<br/>";
    $nopl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
    echo "You now have: $nopl[0] credits";
  }else{
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>";
    echo "Can't Send PM<br/><br/>";
  }
  }else echo"Ur Not $clinfo[1] Owner";
  }else echo"Ur Not SM Premium User! ";
  echo "</p>";
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=clubs&amp;sid=$sid\">";
	echo "Clubs list</a><br/>";
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
	echo "Home</a>";
 	echo "</p>";
    echo xhtmlfoot();
    }


//////////////////////////////////View category

else if($action=="viewcat")
{
  $cinfo = mysqli_fetch_array(sm_query("SELECT name from ibwf_fcats WHERE id='".$cid."'"));
    $cid = $_GET["cid"];
    addonline(getuid_sid($sid),"xHTML-Viewing Category--$cinfo[0]","index.php?action=viewcat&amp;cid=$cid");
    $cinfo = mysqli_fetch_array(sm_query("SELECT name from ibwf_fcats WHERE id='".$cid."'"));
    $pstyle = gettheme($sid);
    echo xhtmlhead($cinfo[0],$pstyle);
    echo "<p>";

    $forums = sm_query("SELECT id, name FROM ibwf_forums WHERE cid='".$cid."' AND clubid='0' ORDER BY position, id, name");
    echo "<small>";
    while($forum = mysqli_fetch_array($forums))
    {
      if(canaccess(getuid_sid($sid), $forum[0]))
      {
        $notp = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topics WHERE fid='".$forum[0]."'"));
        $nops = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_posts a INNER JOIN ibwf_topics b ON a.tid = b.id WHERE b.fid='".$forum[0]."'"));
      $iml = "<img src=\"images/2.gif\" alt=\"*\"/>";
      echo "<a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$forum[0]\">$iml$forum[1]($notp[0]/$nops[0])</a><br/>";
      $lpt = mysqli_fetch_array(sm_query("SELECT id, name FROM ibwf_topics WHERE fid='".$forum[0]."' ORDER BY lastpost DESC LIMIT 0,1"));
      $nops = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_posts WHERE tid='".$lpt[0]."'"));
      if($nops[0]==0)
      {
        $pinfo = mysqli_fetch_array(sm_query("SELECT authorid FROM ibwf_topics WHERE id='".$lpt[0]."'"));
        $tluid = $pinfo[0];

      }else{
        $pinfo = mysqli_fetch_array(sm_query("SELECT  uid  FROM ibwf_posts WHERE tid='".$lpt[0]."' ORDER BY dtpost DESC LIMIT 0, 1"));

        $tluid = $pinfo[0];
      }
      $tlnm = htmlspecialchars($lpt[1]);
      $tlnick = getnick_uid($tluid);
      $tpclnk = "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$lpt[0]&amp;go=last\">$tlnm</a>";
      $vulnk = "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$tluid\">$tlnick</a>";
      echo "Last Post: $tpclnk, BY: $vulnk<br/><br/>";
      }
    }
    echo "</small>";
    echo "</p>";
    echo "<p align=\"center\">";
    $tmsg = getpmcount(getuid_sid($sid));
  $umsg = getunreadpm(getuid_sid($sid));
  if($umsg>0)
  {
  echo "<a href=\"inbox.php?action=main&amp;sid=$sid\">Inbox($umsg/$tmsg)</a><br/>";
  }
  
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////View Topic

else if($action=="viewtpc")
{

   $tinfo = mysqli_fetch_array(sm_query("SELECT name, text, authorid, crdate, views, fid, pollid from ibwf_topics WHERE id='".$tid."'"));
    $tnm = htmlspecialchars($tinfo[0]);
  addonline(getuid_sid($sid),"xHTML-Viewing Topic-$tnm ","index.php?action=viewtpc&amp;page=$page&amp;tid=$tid");
  $tid = $_GET["tid"];
  $go = $_GET["go"];
  $tfid = mysqli_fetch_array(sm_query("SELECT fid FROM ibwf_topics WHERE id='".$tid."'"));
  if(!canaccess(getuid_sid($sid), $tfid[0]))
    {
    $pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
      echo "<p align=\"center\">";
	  echo "<img src=\"images/stop.gif\" alt=\"*\"/><br/>";
	  
echo "You Don't Have A Permission To View The Contents Of This Forum<br/>";
	  
	  
$cid = mysqli_fetch_array(sm_query("SELECT clubid FROM ibwf_forums WHERE id='".$tfid[0]."'"));
$cinfo = mysqli_fetch_array(sm_query("SELECT name FROM ibwf_clubs WHERE id='".$cid[0]."'"));
$cname = htmlspecialchars($cinfo[0]);
$clublink="<a href=\"index.php?action=gocl&amp;sid=$sid&amp;clid=$cid[0]\">$cname Club</a>";
echo "<br/>You Have to Join with <b> $clublink</b> To View or Post<br/><br/>";
echo "<a href=\"genproc.php?action=reqjc&amp;sid=$sid&amp;clid=$cid[0]\">Join Now!</a><br/>";
echo "<img src=\"images/home.gif\" alt=\"*\"/><a href=\"index.php?action=main&amp;sid=$sid\">Home</a>";
echo "</p>";
echo xhtmlfoot();

      exit();
    }

    $tinfo = mysqli_fetch_array(sm_query("SELECT name, text, authorid, crdate, views, fid, pollid  from ibwf_topics WHERE id='".$tid."'"));
    $tnm = htmlspecialchars($tinfo[0]);
    $pstyle = gettheme($sid);
    echo xhtmlhead($tnm,$pstyle);
	echo"<h5>$tnm</h5>";
	/////////////////////////////////////////////////
	
	 
	 $ac=$_GET["ac"];
	 $pid=$_GET["pid"];
	 if($ac=="like"){
	 $like = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topiclike WHERE tid='".$pid."' and uid='".$uid."'"));
if($like[0]==0){
$lik =sm_query("INSERT INTO `ibwf_topiclike` (`tid`, `uid`, `time`) VALUES ('".$pid."','".$uid."', '".time()."')");
if($lik){
echo"<h3>Sucessfully Liked</h3>";
}
}else{
echo"<h3>You already liked this post</h3>";

}
	 
	 
	 }
	 /////////////////////////////////////////
	
    echo "<p align=\"center\">";

    $num_pages = getnumpages($tid);
    if($page==""||$page<1)$page=1;
    if($go!="")$page=getpage_go($go,$tid);
    $posts_per_page = 5;
    if($page>$num_pages)$page=$num_pages;
    $limit_start = $posts_per_page *($page-1);
  
$tid = $_GET["tid"];
    $tfid = mysqli_fetch_array(sm_query("SELECT fid FROM ibwf_topics WHERE id='".$tid."'"));
    $fid = $tfid[0];
    $qut = $_GET["qut"];

   
    echo "</p>";

    echo "<p>";
    ///fm here
    div();
    if($page==1)
    {
      $posts_per_page=4;
      sm_query("UPDATE ibwf_topics SET views='".$vws."' WHERE  id='".$tid."'");
      $ttext = mysqli_fetch_array(sm_query("SELECT authorid, text, crdate, pollid FROM ibwf_topics WHERE id='".$tid."'"));
      $unick = getnick_uid($ttext[0]);
      if(isonline($ttext[0]))
    {
      $iml = "<img src=\"images/onl.gif\" alt=\"+\"/>";
    }else{
        $iml = "<img src=\"images/ofl.gif\" alt=\"-\"/>";
    }
    $usl = "<br/><a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$ttext[0]\">$iml$unick</a>";
    $topt = "<a href=\"index.php?action=tpcopt&amp;sid=$sid&amp;tid=$tid\">*</a>";
    if($go==$tid)
    {
      $fli = "<img src=\"images/flag.gif\" alt=\"!\"/>";
    }else{
      $fli ="";
    }
    $pst = parsemsg($ttext[1],$sid);
    $dtot = date("d/m/y - H:i:s",$ttext[2]);
    echo "<small>$usl: $dtot</small><br/>$fli$pst $topt<br/>";
    if($ttext[3]>0)
    {
      echo "<a href=\"index.php?action=viewtpl&amp;sid=$sid&amp;who=$tid\">POLL</a><br/>";
    }
  }
  if($page>1)
  {
    $limit_start--;
  }
  $sql = "SELECT id, text, uid, dtpost, quote,image FROM ibwf_posts WHERE tid='".$tid."' ORDER BY dtpost LIMIT $limit_start, $posts_per_page";
  $posts = sm_query($sql);
  while($post = mysqli_fetch_array($posts))
  {
    $unick = getnick_uid($post[2]);
    if(isonline($post[2]))
    {
      $iml = "<img src=\"images/onl.gif\" alt=\"+\"/>";
    }else{
        $iml = "<img src=\"images/ofl.gif\" alt=\"-\"/>";
    }
    $usl = "<br/><a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$post[2]\">$iml$unick</a>";
    $pst = parsemsg($post[1], $sid);
    $topt = "<a href=\"index.php?action=pstopt&amp;sid=$sid&amp;pid=$post[0]&amp;page=$page&amp;fid=$tinfo[5]\">*</a>";
    if($post[4]>0)
    {
        $qtl = "<small><i><a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tid&amp;pst=\">(quote:p=blaze,d=16-04-2006)</a></i></small>";
    }
    if($go==$post[0])
    {
      $fli = "<img src=\"images/flag.gif\" alt=\"!\"/>";
    }else{
      $fli ="";
    }
    $dtot = cashtime($post[3]);
	
    ///////////////////////
		  $tlikeh = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topiclike WHERE tid='".$post[0]."' and uid='".$uid."'"));

	
	
	
	 $tlike = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topiclike WHERE tid='".$post[0]."'"));
	if($tlikeh[0]==0){
	if($page==""){
	$like = "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tid&amp;pid=$post[0]&amp;ac=like\">Like</a>";
	}else{
	 $like = "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tid&amp;pid=$post[0]&amp;page=$page&amp;ac=like\">Like</a>";
	 }
}else{
$like = "Like";

}

	if($tlikeh[0]==0){
	$likeh = "[$tlike[0]]";
	 }else{
	 $likeh = "<a href=\"lists.php?action=likepost&amp;sid=$sid&amp;pid=$post[0]\">[$tlike[0]]";
	}
	
	$image = $post[5];
	if($image==""){
	$img="";
	}else{
	$img="<a href=\"$post[5]\"><img src=\"$post[5]\" height=\"100\" width=\"100\" alt=\"*\"/></a><br/>";
	
	}
	////////////////////////
	echo "<small>$usl: $dtot </small><br/>$fli $img $pst $topt<br/><img src=\"images/like.png\" alt=\"!\"/> $like $likeh<hr/>";
  }
   echo "</div>";
    ///to here
	
	
	
    echo "</p>";
	 echo "<center><img src=\"images/write.png\" alt=\"*\"/><a href=\"index.php?action=post&amp;sid=$sid&amp;tid=$tid\">Post reply</a></center>";
      echo "<p align=\"center\">";
    $vws = $tinfo[4]+1;
    $rpls = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_posts WHERE tid='".$tid."'"));
    echo "Replies: $rpls[0] - Views: $vws<br/>";
    echo "</p>";
	
	
    echo "<p align=\"center\">";
    $tmsg = getpmcount(getuid_sid($sid));
  $umsg = getunreadpm(getuid_sid($sid));
  if($umsg>0)
  {
  echo "<a href=\"inbox.php?action=main&amp;sid=$sid\">Inbox($umsg/$tmsg)</a><br/>";
  }
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"index.php?action=viewtpc&amp;page=$ppage&amp;sid=$sid&amp;tid=$tid\">&#171;PREV</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"index.php?action=viewtpc&amp;page=$npage&amp;sid=$sid&amp;tid=$tid\">Next&#187;</a>";
    }
	
	
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {

        $rets = "<form action=\"index.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"tid\" value=\"$tid\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
        $rets .= "</form>";

        echo $rets;


    }
echo "<br/>";
     echo "</p>";
$tid = $_GET["tid"];
    $tfid = mysqli_fetch_array(sm_query("SELECT fid FROM ibwf_topics WHERE id='".$tid."'"));
    $fid = $tfid[0];
    $qut = $_GET["qut"];
      $lastlink = "<img src=\"images/forward.png\" alt=\"f\"/><a href=\"index.php?action=$action&amp;tid=$tid&amp;sid=$sid&amp;go=last\">Last Page</a>";
    $firstlink = "<img src=\"images/back.png\" alt=\"f\"/><a href=\"index.php?action=$action&amp;tid=$tid&amp;sid=$sid&amp;page=1\">First Page</a> ";
    $golink = "";
    if($page>1)
    {
      $golink = $firstlink;
    }
    if($page<$num_pages)
    {
      $golink .= $lastlink;
    }
    if($golink !="")
    {
      echo "<br/>$golink<br/>";
    }   
	echo "<form method=\"post\" action=\"genproc.php?action=shout&amp;sid=$sid\">
<input name=\"shtxt\"  value=\"folder. [topic=$tid] $tnm [/topic]\" type=\"hidden\" maxlength=\"500\"/>
<input type=\"submit\" name=\"Submit\" value=\"[( Shout This Topic )]\"/><br/>
</form>";
	
    echo "<p><small>";
    $fid = $tinfo[5];
    $fname = getfname($fid);
    $cid = mysqli_fetch_array(sm_query("SELECT cid FROM ibwf_forums WHERE id='".$fid."'"));
    $cinfo = mysqli_fetch_array(sm_query("SELECT name FROM ibwf_fcats WHERE id='".$cid[0]."'"));
    $cname = $cinfo[0];

    echo "<a href=\"index.php?action=main&amp;sid=$sid\">";
echo "Home</a>&gt;";
    echo "<a href=\"index.php?action=formmenu&amp;sid=$sid\">";
echo "Forums</a>&gt;";

$cid = mysqli_fetch_array(sm_query("SELECT cid FROM ibwf_forums WHERE id='".$fid."'"));
    if($cid[0]>0)
    {
    $cinfo = mysqli_fetch_array(sm_query("SELECT name FROM ibwf_fcats WHERE id='".$cid[0]."'"));
    $cname = htmlspecialchars($cinfo[0]);
    echo "<a href=\"index.php?action=viewcat&amp;sid=$sid&amp;cid=$cid[0]\">";
    echo "$cname</a><br/>";
    }else{
        $cid = mysqli_fetch_array(sm_query("SELECT clubid FROM ibwf_forums WHERE id='".$fid."'"));
        $cinfo = mysqli_fetch_array(sm_query("SELECT name FROM ibwf_clubs WHERE id='".$cid[0]."'"));
        $cname = htmlspecialchars($cinfo[0]);
    echo "<a href=\"index.php?action=gocl&amp;sid=$sid&amp;clid=$cid[0]\">";
    echo "$cname Club</a><br/>";
  }
  $fname = htmlspecialchars($fname);
    echo "&gt;<a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$fid\">$fname</a>&gt;$tnm";
  echo "</small></p>";
    echo xhtmlfoot();
}
/////////////////////////////////////////////////////////
else if($action=="imgpost")
{
 $pstyle = gettheme($sid);
  echo xhtmlhead("$stitle Image Post",$pstyle);
   

$tid = $_GET["tid"];
$tfid = mysqli_fetch_array(sm_query("SELECT fid FROM ibwf_topics WHERE id='".$tid."'"));
$fid = $tfid[0];
if(!canaccess(getuid_sid($sid), $fid))
    { 

 echo "<p align=\"center\">";
echo "You Don't Have A Permission To View The Contents Of This Forum<br/><br/>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\">Home</a>";
echo "</p>";
   echo xhtmlfoot();

exit();
}
    addonline(getuid_sid($sid),"Posting reply + image","");


  print'<h5>Post reply with Image</h5>';
   div();
    $qut = $_GET["qut"];

    echo "<br/><b>Pick a Photo to upload</b>";
    echo "<form enctype=\"multipart/form-data\" method=\"post\" action=\"genproc.php?action=post&amp;sid=$sid&amp;tid=$tid\">";
    echo "<input type=\"file\" name=\"f1\" size=\"15\"><br/>";
  
	  echo "<textarea name=\"reptxt\"  maxlength=\"485\" rows=\"3\" cols=\"20\"/></textarea><br/>";
	    echo "colour: <select name=\"clr\" value=\"\">
<option value=\"\">Black</option>
<option value=\"red\">Red</option>
<option value=\"blue\">Blue</option>
<option value=\"gold\">Gold</option>
<option value=\"green\">Green</option>
<option value=\"navy\">Navy</option>
<option value=\"brown\">Brown</option>
<option value=\"olive\">Olive</option>
<option value=\"chocolate\">Choco</option>
<option value=\"Orange\">Orange</option>
<option value=\"pink\">Pink</option>
<option value=\"rainbow\">Rainbow</option>
</select>";
    echo "<input type=\"hidden\" name=\"action\" value=\"image\" /><br/>";
    echo "<input type=\"hidden\" name=\"tid\" value=\"$tid\"/>";
    echo "<input type=\"hidden\" name=\"qut\" value=\"$qut\"/>";
    echo "<INPUT TYPE=\"submit\" name=\"upl\" VALUE=\"Post\"></form>";   
  echo "<br/><small>Note:<br/>";   
      echo "* File size limit 512kb. If your upload does not work, try a smaller Photo.<br/>";
      echo "* Allowed formats: <b>.jpg, .gif, .bmp, .png</b><br/>";
      
  echo "</div>"; 
    
  
    $fid = getfid($tid);
    $fname = getfname($fid);
    echo "<br/><a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tid\">Back to topic</a>";
    echo "<br/><a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$fid\">$fname</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"../images/home.gif\" alt=\"\"/>Home</a>";
   /////////////////////////////footer

echo xhtmlfoot();
exit();


}
//////////////////////////////////View Forum

else if($action=="viewfrm")
{

    $fid = $_GET["fid"];
	$view = $_GET["view"];
    if(!canaccess(getuid_sid($sid), $fid))
    {
      addonline(getuid_sid($sid),"Lost in forums - xHTML","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
      echo "<p align=\"center\">";
      echo "You Don't Have A Permission To View The Contents Of This Forum<br/><br/>";
      echo "<a href=\"index.php?action=main&amp;sid=$sid\">Home</a>";
      echo "</p>";
      echo xhtmlfoot();

      exit();
    }
	$finfo = mysqli_fetch_array(sm_query("SELECT name from ibwf_forums WHERE id='".$fid."'"));
    $fnm = htmlspecialchars($finfo[0]);
    addonline(getuid_sid($sid),"xHTML-Viewing Forum-$fnm","index.php?action=viewfrm&amp;fid=$fid");
    $finfo = mysqli_fetch_array(sm_query("SELECT name from ibwf_forums WHERE id='".$fid."'"));
    $fnm = htmlspecialchars($finfo[0]);
    $pstyle = gettheme($sid);
    echo xhtmlhead($fnm,$pstyle);
    echo "<p align=\"center\">";

    $norf = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_rss WHERE fid='".$fid."'"));
    if($norf[0]>0)
    {
        echo "<a href=\"rwrss.php?action=showfrss&amp;sid=$sid&amp;fid=$fid\"><img src=\"images/rss.gif\" alt=\"rss\"/>$finfo[0] Extras</a><br/>";
    }
echo "<a href=\"index.php?action=bookmarks&amp;sid=$sid\">Bookmarks</a><br/>";
    echo "<a href=\"index.php?action=newtopic&amp;sid=$sid&amp;fid=$fid\">New Topic</a><br/>";

  echo "<form method=\"get\" action=\"index.php\">";
  echo "View: <select name=\"vopt\">";
  echo "<option value=\"all\">All</option>";
  echo "<option value=\"new\">Since Last Visit</option>";
  echo "<option value=\"myps\">I posted In</option>";
  echo "</select>";
  echo "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
  echo "<input type=\"hidden\" name=\"fid\" value=\"$fid\"/>";
  echo "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
  echo "<input type=\"submit\" name=\"Submit\" value=\"[GO]\"/><br/>";
  echo "</form>";

	if($view=="new")
	{
		echo "<small>Viewing topics that has new posts since your last visit</small>";
	}else if($view=="myps")
	{
		echo "<small>Viewing topics contain posts by you</small>";
	}else {
	echo "<small>Viewing All topics</small>";
	}
    echo "</p>";
    echo "<p>";
    echo "<small>";
    if($page=="" || $page<=0)$page=1;
    if($page==1)
    {
      ///////////pinned topics
      $topics = sm_query("SELECT id, name, closed, views, pollid FROM ibwf_topics WHERE fid='".$fid."' AND pinned='1' ORDER BY lastpost DESC, name, id LIMIT 0,5");
      while($topic = mysqli_fetch_array($topics))
    {
      $iml = "<img src=\"images/normal.gif\" alt=\"*\"/>";
      $iml = "*";
      $atxt ="";
      if($topic[2]=='1')
      {
        //closed
        $atxt = "(X)";
      }
      if($topic[4]>0)
      {
        $pltx = "(P)";
      }else{
        $pltx = "";
      }
      $tnm = htmlspecialchars($topic[1]);
      $nop = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_posts WHERE tid='".$topic[0]."'"));
      echo "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$topic[0]\">$iml$pltx$tnm($nop[0])$atxt</a><br/>";

    }
    echo "<br/>";
  }
  $uid = getuid_sid($sid);
  if($view=="new")
  {

  $ulv = mysqli_fetch_array(sm_query("SELECT lastvst FROM ibwf_users WHERE id='".$uid."'"));
  $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topics WHERE fid='".$fid."' AND pinned='0' AND lastpost >='".$ulv[0]."'"));
  }
  else if($view=="myps")
  {
	$noi = mysqli_fetch_array(sm_query("SELECT COUNT(DISTINCT a.id) FROM ibwf_topics a INNER JOIN ibwf_posts b ON a.id = b.tid WHERE a.fid='".$fid."' AND a.pinned='0' AND b.uid='".$uid."'"));
  }
  else{
  $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topics WHERE fid='".$fid."' AND pinned='0'"));
  }
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if($page>$num_pages)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;
    if($limit_start<0)$limit_start=0;
	if($view=="new")
	{
	$ulv = mysqli_fetch_array(sm_query("SELECT lastvst FROM ibwf_users WHERE id='".$uid."'"));
    $topics = sm_query("SELECT id, name, closed, views, moved, pollid FROM ibwf_topics WHERE fid='".$fid."' AND pinned='0' AND lastpost >='".$ulv[0]."' ORDER BY lastpost DESC, name, id LIMIT $limit_start, $items_per_page");
	}
	else if($view=="myps"){
	$topics = sm_query("SELECT a.id, a.name, a.closed, a.views, a.moved, a.pollid FROM ibwf_topics a INNER JOIN ibwf_posts b ON a.id = b.tid WHERE a.fid='".$fid."' AND a.pinned='0' AND b.uid='".$uid."' GROUP BY a.id ORDER BY a.lastpost DESC, a.name, a.id  LIMIT $limit_start, $items_per_page");
	}
	else{
	$topics = sm_query("SELECT id, name, closed, views, moved, pollid FROM ibwf_topics WHERE fid='".$fid."' AND pinned='0' ORDER BY lastpost DESC, name, id LIMIT $limit_start, $items_per_page");
	}

    while($topic = mysqli_fetch_array($topics))
    {

      $nop = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_posts WHERE tid='".$topic[0]."'"));
      $iml = "<img src=\"images/normal.gif\" alt=\"*\"/>";
      if($nop[0]>24)
      {
        $iml = "<img src=\"images/hot.gif\" alt=\"*\"/>";
      }
      if($topic[4]=='1')
      {
        $iml = "<img src=\"images/moved.gif\" alt=\"*\"/>";
      }
      if($topic[2]=='1')
      {
        $iml = "<img src=\"images/closed.gif\" alt=\"*\"/>";
      }
      if($topic[5]>0)
      {
        $iml = "<img src=\"images/poll.gif\" alt=\"*\"/>";
      }
      $atxt ="";
      if($topic[2]=='1')
      {
        //closed
        $atxt = "(X)";
      }
      $tnm = htmlspecialchars($topic[1]);
      echo "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$topic[0]\">$iml$tnm($nop[0])$atxt</a><br/>";

    }

    echo "</small>";

    echo "</p>";
    echo "<p align=\"center\">";
$tmsg = getpmcount(getuid_sid($sid));
  $umsg = getunreadpm(getuid_sid($sid));
  if($umsg>0)
  {
  echo "<a href=\"inbox.php?action=main&amp;sid=$sid\">Inbox($umsg/$tmsg)</a><br/>";
  }
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"index.php?action=viewfrm&amp;page=$ppage&amp;sid=$sid&amp;fid=$fid&amp;view=$view\">&#171;PREV</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"index.php?action=viewfrm&amp;page=$npage&amp;sid=$sid&amp;fid=$fid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {

        $rets = "<form action=\"index.php\" method=\"get\">";
      $rets .= "Jump to page: <input name=\"page\" format=\"*N\" size=\"3\"/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"fid\" value=\"$fid\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
		$rets .= "<input type=\"hidden\" name=\"view\" value=\"$view\"/>";
        $rets .= "</form>";

        echo $rets;
    }

    echo "<br/><br/><a href=\"index.php?action=newtopic&amp;sid=$sid&amp;fid=$fid\">New Topic</a><br/>";
    $cid = mysqli_fetch_array(sm_query("SELECT cid FROM ibwf_forums WHERE id='".$fid."'"));
    if($cid[0]>0)
    {
    $cinfo = mysqli_fetch_array(sm_query("SELECT name FROM ibwf_fcats WHERE id='".$cid[0]."'"));
    $cname = htmlspecialchars($cinfo[0]);
    echo "<a href=\"index.php?action=viewcat&amp;sid=$sid&amp;cid=$cid[0]\">";
    echo "$cname</a><br/>";
    }else{
        $cid = mysqli_fetch_array(sm_query("SELECT clubid FROM ibwf_forums WHERE id='".$fid."'"));
        $cinfo = mysqli_fetch_array(sm_query("SELECT name FROM ibwf_clubs WHERE id='".$cid[0]."'"));
        $cname = htmlspecialchars($cinfo[0]);
    echo "<a href=\"index.php?action=gocl&amp;sid=$sid&amp;clid=$cid[0]\">";
    echo "$cname Club</a><br/>";
    }
  
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

else if($action=="mood")

     {
        $pstyle = gettheme($sid);
    echo xhtmlhead("Sign a Guestbook",$pstyle);
       echo "<p align=\"center\">";
        $mmsg = htmlspecialchars(getsetmood(getuid_sid($sid)));
    $uid = getuid_sid($sid);
 
echo "<form action=\"genproc.php?action=upmood&amp;sid=$sid\" method=\"post\">";
        echo "SET MOOD TO:<br/><input name=\"mmsg\" maxlength=\"30\"/><br/>";
    echo "<input type=\"Submit\" name=\"submit\" Value=\"Submit\"></form>";
    echo "</p>";
  /////////main menu footer
echo "<div class=\"footer\">";
   
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";

  echo xhtmlfoot();

echo "</div>";
}

else if($action=="prop")
{
 $whonick = getnick_uid($who);
  addonline(getuid_sid($sid),"$whonick's Property","");

$pstyle = gettheme($sid);
    echo xhtmlhead("user Property",$pstyle);
  echo "<p align=\"center\">";
 
  $nick = getnick_sid($sid);
  $whonick = getnick_uid($who);

  echo "<i><b><u><small>$whonick's Property:</small></u></b></i><br/>";

  echo "</p>";
  echo "<p>";

     $sql = "SELECT itemid FROM ibwf_shop_Inventory WHERE uid='".$who."'";

    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
    $shopitem = mysqli_fetch_array(sm_query("SELECT itemid, itemname, itemshopid FROM ibwf_shop WHERE itemid='".$item[0]."'"));

    echo "$shopitem[1], ";
    if($shopitem[2]=='1'){

    }


  }
 }


    echo "</p>";
  ////// UNTILL HERE >>
  echo "<p align=\"center\">";
  echo "<br/><a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$who\">";
$whonick = getnick_uid($who);
echo "Back to $whonick's Profile</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
  }




//////////////////////////////////ONLINE USERS
else if($action=="newtopic")
{
  $fid = $_GET["fid"];


  $validated = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE id='".$uid."'  AND validated='0'"));
    if(($validated[0]>0)&&(validation()))
    {

    $pstyle = gettheme($sid);
  echo xhtmlhead("try again",$pstyle);
      echo "<p align=\"center\">";
	   $nickk = getnick_sid($sid);
  $whoo = getuid_nick($nickk);
      echo "<img src=\"images/notok.gif\" alt=\"x\"/><br/>";
	   echo "<b>Ur Account is Not Validated Yet</b><br/>";
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
    echo "<br/>You have to Spend at least<u> 20 mins online</u> to get validated ur account. Plz be patient try again this option after 20 Minutes online here..Untill then Explorer and Enjoy other features in $stitle.<br/>thank you!<br/><br/>";

	echo "<a href=\"index.php?action=formmenu&amp;sid=$sid\">Back To Forums</a><br/>";

	 echo "<a href=\"index.php?action=main&amp;sid=$sid\">Back To Home</a><br/><br/>";

	 echo "</p>";
   echo xhtmlfoot();
      exit();


    }

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
    addonline(getuid_sid($sid),"Creating new topic - xHTML","index.php?action=online");
    $pstyle = gettheme($sid);
    echo xhtmlhead("New Topic",$pstyle);
    echo "<p align=\"center\">";
  echo "<form method=\"post\" action=\"genproc.php?action=newtopic&amp;sid=$sid\">";
    echo "Title:<input name=\"ntitle\" maxlength=\"30\"/><br/>";
    echo "Text:<input name=\"tpctxt\" maxlength=\"500\"/><br/>";
  echo "<input type=\"hidden\" name=\"fid\" value=\"$fid\"/>";
  echo "<input type=\"submit\" name=\"Submit\" value=\"Create\"/><br/>";
  echo "</form>";
    echo "<br/><br/><a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$fid\">";
    $fname = getfname($fid);
echo "$fname</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";

    echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////////////Post reply

else if($action=="post")
{
    $tid = $_GET["tid"];

    $tfid = mysqli_fetch_array(sm_query("SELECT fid FROM ibwf_topics WHERE id='".$tid."'"));
    $fid = $tfid[0];

		$validated = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE id='".$uid."'  AND validated='0'"));
    if(($validated[0]>0)&&(validation()))
    {

    $pstyle = gettheme($sid);
  echo xhtmlhead("try again",$pstyle);
      echo "<p align=\"center\">";
	   $nickk = getnick_sid($sid);
  $whoo = getuid_nick($nickk);
      echo "<img src=\"images/notok.gif\" alt=\"x\"/><br/>";
	   echo "<b>Ur Account is Not Validated Yet</b><br/>";
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
    echo "<br/>You have to Spend at least<u> 20 mins online</u> to get validated ur account. Plz be patient try again this option after 20 Minutes online here..Untill then Explorer and Enjoy other features in $stitle.<br/>thank you!<br/><br/>";

	echo "<a href=\"index.php?action=formmenu&amp;sid=$sid\">Back To Forums</a><br/>";

	 echo "<a href=\"index.php?action=main&amp;sid=$sid\">Back To Home</a><br/><br/>";

	 echo "</p>";
   echo xhtmlfoot();
      exit();


    }




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
    $tinfo = mysqli_fetch_array(sm_query("SELECT name, text, authorid, crdate, views, fid, pollid from ibwf_topics WHERE id='".$tid."'"));
    $tnm = htmlspecialchars($tinfo[0]);
    addonline(getuid_sid($sid),"xHTML-Posting Reply at $tnm","");

    $pstyle = gettheme($sid);
    echo xhtmlhead("Post Reply",$pstyle);
	 $tinfo = mysqli_fetch_array(sm_query("SELECT name from ibwf_topics WHERE id='".$tid."'"));
    $tnm = htmlspecialchars($tinfo[0]);
	echo"<h5>$tnm</h5>";
    echo "<onevent type=\"onenterforward\">";
  echo "<refresh>
        <setvar name=\"reptxt\" value=\"\"/>
        <setvar name=\"qut\" value=\"\"/>
   ";
  echo "</refresh></onevent>";
    $qut = $_GET["qut"];
    echo "<p align=\"center\">";
  echo "<form method=\"post\" action=\"genproc.php?action=post&amp;sid=$sid\">";
  echo "<textarea name=\"reptxt\"  maxlength=\"485\" rows=\"3\" cols=\"20\"/></textarea><br/>";
  echo "<input type=\"hidden\" name=\"tid\" value=\"$tid\"/>";
  echo "<input type=\"hidden\" name=\"qut\" value=\"$qut\"/>";
    echo "colour: <select name=\"clr\" value=\"\">
<option value=\"\">Black</option>
<option value=\"red\">Red</option>
<option value=\"blue\">Blue</option>
<option value=\"gold\">Gold</option>
<option value=\"green\">Green</option>
<option value=\"navy\">Navy</option>
<option value=\"brown\">Brown</option>
<option value=\"olive\">Olive</option>
<option value=\"chocolate\">Choco</option>
<option value=\"Orange\">Orange</option>
<option value=\"pink\">Pink</option>
<option value=\"rainbow\">Rainbow</option>
</select>";
  
  echo "<input type=\"submit\" name=\"Submit\" value=\"Reply\"/><br/>";
  echo "</form>";
   echo "<br/>";
  echo "<form method=\"post\" action=\"index.php?action=imgpost&amp;sid=$sid&amp;tid=$tid\">"; 
  echo "<input type=\"submit\" name=\"Submit\" value=\"Post+Image\"/><br/>";
  echo "</form>";
         $fid = getfid($tid);
         $fname = getfname($fid);
         echo "<br/><br/><a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tid\">";
echo "Back to topic</a>";
      echo "<br/><a href=\"index.php?action=viewfrm&amp;sid=$sid&amp;fid=$fid\">";
echo "$fname</a><br/>";
         
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
    echo "</p>";
    echo xhtmlfoot();
}


//////////////////////////////////////////shout
else if($action=="imageshout")
{
    addonline(getuid_sid($sid),"Image Shouting - xHTML","index.php?action=$action");

$pstyle = gettheme($sid);
    echo xhtmlhead("Shout",$pstyle);
    echo "<p align=\"center\">";
 
  	if(!isvip(getuid_sid($sid))){

      echo "<p align=\"center\">";
      echo "<img src=\"images/stop.gif\" alt=\"X\"/><br/>Dont Flood In Shout<br/>This Option Only For Premium User!";
       echo "<br/>";
	    echo "<img src=\"images/star.gif\" alt=\"\"/><a href=\"other.php?action=getprem&amp;sid=$sid\">SM Premium User!</a><img src=\"images/star.gif\" alt=\"\"/> Any Time Image Shout<br/>";
	  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"\"/>Home</a>";
      echo "</p>";
   echo xhtmlfoot();
      exit();

	}else{

	
	
  echo "<form enctype=\"multipart/form-data\"  method=\"post\" action=\"genproc.php?action=shout&amp;sid=$sid\">";
  echo "<input type=\"file\" name=\"f1\" size=\"15\"><br/>";
  echo "<textarea rows=\"2\" cols=\"20\" name=\"shtxt\"></textarea><br/>";
      echo "colour: <select name=\"clr\" value=\"\">
<option value=\"\">Black</option>
<option value=\"red\">Red</option>
<option value=\"blue\">Blue</option>
<option value=\"gold\">Gold</option>
<option value=\"green\">Green</option>
<option value=\"navy\">Navy</option>
<option value=\"brown\">Brown</option>
<option value=\"olive\">Olive</option>
<option value=\"chocolate\">Choco</option>
<option value=\"Orange\">Orange</option>
<option value=\"pink\">Pink</option>
<option value=\"rainbow\">Rainbow</option>
</select>";
  echo "<input type=\"hidden\" name=\"action\" value=\"image\" /><br/>";
  echo "<input type=\"submit\" name=\"Submit\" value=\"Shout\"/><br/>";
  echo "</form>";
            }
    
    
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
    echo "</p>";
    echo xhtmlfoot();
}
else if($action=="shout")
{
    addonline(getuid_sid($sid),"Shouting - xHTML","index.php?action=$action");

$pstyle = gettheme($sid);
    echo xhtmlhead("Shout",$pstyle);
    echo "<p align=\"center\">";
 
 	if(!isvip(getuid_sid($sid))){
  $sql = mysqli_fetch_array(sm_query("SELECT  shtime  FROM ibwf_shouts ORDER BY shtime DESC LIMIT 1"));	
$magic=$sql[0]+60*15;

	if($magic>time())
    {

      echo "<p align=\"center\">";
      echo "<img src=\"images/stop.gif\" alt=\"X\"/><br/>Dont Flood In Shout<br/>please Try ";
       echo "<b>".gettimemsg($magic-time())."</b><br/>";
	    echo "<img src=\"images/star.gif\" alt=\"\"/><a href=\"other.php?action=getprem&amp;sid=$sid\">SM Premium User!</a><img src=\"images/star.gif\" alt=\"\"/> Any Time Shout<br/>";
	  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"\"/>Home</a>";
      echo "</p>";
   echo xhtmlfoot();
      exit();
  }
	}
 
 
 
    if(getplusses(getuid_sid($sid))<75)
    {
        echo "You should have at least 75 Credits to shout!,just ask credits";
    }else{

  echo "<form method=\"post\" action=\"genproc.php?action=shout&amp;sid=$sid\">";
  echo "<textarea rows=\"2\" cols=\"20\" name=\"shtxt\"></textarea><br/>";
      echo "colour: <select name=\"clr\" value=\"\">
<option value=\"\">Black</option>
<option value=\"red\">Red</option>
<option value=\"blue\">Blue</option>
<option value=\"gold\">Gold</option>
<option value=\"green\">Green</option>
<option value=\"navy\">Navy</option>
<option value=\"brown\">Brown</option>
<option value=\"olive\">Olive</option>
<option value=\"chocolate\">Choco</option>
<option value=\"Orange\">Orange</option>
<option value=\"pink\">Pink</option>
<option value=\"rainbow\">Rainbow</option>
</select>";
  echo "<input type=\"submit\" name=\"Submit\" value=\"Shout\"/><br/>";
  echo "</form>";
  
  
  
    echo "<br/><br/><form method=\"post\" action=\"index.php?action=imageshout&amp;sid=$sid\">";
	echo "<input type=\"submit\" name=\"Submit\" value=\"Image+Shout\"/><br/>";
  echo "</form>";
  
  
            }
    
    
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
    echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////////////shout

else if($action=="annc")
{
    addonline(getuid_sid($sid),"Announcing! - xHTML","");
    $clid = $_GET["clid"];
    $pstyle = gettheme($sid);
    echo xhtmlhead("Announce!",$pstyle);
    echo "<p align=\"center\">";
 
    $cow = mysqli_fetch_array(sm_query("SELECT owner FROM ibwf_clubs WHERE id='".$clid."'"));
    $uid = getuid_sid($sid);
    if($cow[0]!=$uid)
    {
        echo "This club is not yours!";
    }else{


     echo "<form method=\"post\" action=\"genproc.php?action=annc&amp;sid=$sid&amp;clid=$clid\">";
     echo "Text:<input name=\"antx\" maxlength=\"200\"/><br/>";
     echo "<input type=\"submit\" name=\"Submit\" value=\"Announce\"/><br/>";
     echo "</form>";

            }
    
    
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
    echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////admin

else if($action=="jstaff")
{
    addonline(getuid_sid($sid),"trying to join $stitle staff","index.php?action=$action");
   $pstyle = gettheme($sid);
    echo xhtmlhead("join $stitle staff",$pstyle);
    echo "<p align=\"left\">";

    echo "<b>join $stitle staff</b><br/><br/>";
 echo "of course u can join our $stitle staff and work with us together.<br/>
Simply pm to <b>$stitle</b> that u'd like to join $stitle staff and why u suitable to be a staff member here. but u should have a some knowledge of $stitle and its all featuers.<br/> coz U will have to face a little test about $stitle and its contents. if u'll be able to get more than 75% marks from it., we select u as a staff member.<br/><br/>
<u>ABOUT staff test:</u>with ur pm to $stitle, u will get a questions PM . then u have one hour to reply it. its all about $stitle and wap features here! <br/><br/>and additionally u will be added some marks if have u these Qualifications..<br/>
* being a old $stitle waper<br/>
*signing others guest books<br/>
*always online in $stitle<br/>
*have A OWN wap site<br/>
*have a knowledge of WML codings<br/>
*having much buddies in $stitle<br/>
*inviting new freinds to $stitle and specially having a cute smile on ur face
<br/><br/>
<b> all the best! hope u will be a staff member here!! good luck!!</b>
<br/>";

    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
    echo "</p>";
   echo xhtmlfoot();
}

//////////////////////////////////////////Guestbook

else if($action=="addblg")
{


if(!getplusses(getuid_sid($sid))>50)
    {
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
      echo "<p align=\"center\">";
      echo "At least you should have 50 Credits to add a blog<br/><br/>";
      echo "<a href=\"index.php?action=main&amp;sid=$sid\">Home</a>";
      echo "</p>";
      echo xhtmlfoot();

      exit();
    }
    addonline(getuid_sid($sid),"Adding a blog - xHTML","");
 
$pstyle = gettheme($sid);
    echo xhtmlhead("Add Blog",$pstyle);
    echo "<onevent type=\"onenterforward\">";
  echo "<refresh>
        <setvar name=\"msgtxt\" value=\"\"/>
        <setvar name=\"btitle\" value=\"\"/>
   ";
  echo "</refresh></onevent>";

    echo "<p align=\"center\">";

      echo "<form method=\"post\" action=\"genproc.php?action=addblg&amp;sid=$sid\">";
    echo "Title:<input name=\"btitle\" maxlength=\"30\"/><br/>";
    echo "Text:<input name=\"msgtxt\" maxlength=\"500\"/><br/>";
  echo "<input type=\"submit\" name=\"Submit\" value=\"Add\"/><br/>";
  echo "</form>";

    
    
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
    echo "</p>";
    echo xhtmlfoot();
}
else if($action=="imgenable")
{
    $pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
    echo "<p align=\"center\">";
   $ncl = sm_query("UPDATE ibwf_users SET showicon='1' WHERE id='".$uid."'");
  echo "Main Page Images Have Been Enabled On your Profile Now.<br/>";
    echo "</p>";

    echo "<p align=\"center\">";

    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
   echo xhtmlfoot();
}
else if($action=="imgdisable")
{
   $pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
    echo "<p align=\"center\">";
   $ncl = sm_query("UPDATE ibwf_users SET showicon='0' WHERE id='".$uid."'");
  echo "Main Page Images Have Been Disabled On your Profile Now.<br/>";
    echo "</p>";

    echo "<p align=\"center\">";

    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
   echo xhtmlfoot();
}


//////////////////////////////////////////Guestbook

else if($action=="signgb")
{
$who=$_GET["who"];
addonline(getuid_sid($sid),"Signing a guestbook - xHTML","");
if(!cansigngb(getuid_sid($sid), $who))
    {
        $pstyle = gettheme($sid);
    echo xhtmlhead("Sign a Guestbook",$pstyle);
      echo "<p align=\"center\">";
      echo "You cant Sign this user guestbook<br/><br/>";
      echo "<a href=\"index.php?action=main&amp;sid=$sid\">Home</a>";
      echo "</p>";
      echo xhtmlfoot();

      exit();
    }

 
        $pstyle = gettheme($sid);
    echo xhtmlhead("Sign Guestbook",$pstyle);
    echo "<onevent type=\"onenterforward\">";
  echo "<refresh>
        <setvar name=\"msgtxt\" value=\"\"/>

   ";
  echo "</refresh></onevent>";

    echo "<p align=\"center\">";
    echo "<form method=\"post\" action=\"genproc.php?action=signgb&amp;sid=$sid\">";
    echo "Text:<input name=\"msgtxt\" maxlength=\"500\"/><br/>";
    echo "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
    echo "<input type=\"submit\" name=\"Submit\" value=\"Sign\"/><br/>";
    echo "</form>";

    
    
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
    echo "</p>";
    echo xhtmlfoot();
}

else if($action=="online")
{

  addonline(getuid_sid($sid),"Online List - xHTML","index.php?action=$action");
$pstyle = gettheme($sid);
    echo xhtmlhead("Online List",$pstyle);


  //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $num_items = getnumonline(); //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if($page>$num_pages)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;
 
    //changable sql
    $sql = "SELECT
            a.name, b.place, b.userid, sex FROM ibwf_users a
            INNER JOIN ibwf_online b ON a.id = b.userid
            GROUP BY 1,2 ORDER BY a.lastact DESC
            LIMIT $limit_start, $items_per_page
    ";
    echo "<p><small>";
    $mols = mysqli_fetch_array(sm_query("SELECT name, value FROM ibwf_settings WHERE id='2'"));
    print "Most online: <b>$mols[1]</b><br/>";
    $mols = mysqli_fetch_array(sm_query("SELECT ppl, dtm FROM ibwf_mpot WHERE ddt='".date("d m y")."'"));
    print "Most online today only: <b>$mols[0]</b><br/>";

    $items = sm_query($sql);
    
    while ($item = mysqli_fetch_array($items))
    {
$avlink = getavatar($item[2]);
if ($avlink!=""){
echo "<img src=\"$avlink\" height=\"25\" width=\"25\" alt=\"avatar\"/>";
}else{
echo "<img src=\"images/nopic.jpg\" height=\"25\" width=\"25\" alt=\"avatar\"/>";
}
      if ($item[3]=="M"){
      $icon = "<img src=\"images/male.gif\" alt=\"M\"/>";
      }else
      if ($item[3]=="F"){
      $icon = "<img src=\"images/female.gif\" alt=\"F\"/>";
      }

      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[2]&amp;sid=$sid\">$item[0]</a>";
      echo "$icon $lnk - $item[1] <br/>";

    }

    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"index.php?action=online&amp;page=$ppage&amp;sid=$sid\">&#171;PREV</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"index.php?action=online&amp;page=$npage&amp;sid=$sid\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      echo getjumper($action, $sid,"index");
    }
    echo "</p>";
  ////// UNTILL HERE >>

  echo "<p align=\"center\">";
  
    
     echo "<a href=\"lists.php?action=longon&amp;sid=$sid\">&#187;Longest Online</a><br/>";
	 echo "<a href=\"index.php?action=chat&amp;sid=$sid\">&#187;Chat Rooms</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
else if($action=="viewpl")
{
  $who = $_GET["who"];
  addonline(getuid_sid($sid),"Viewing a poll - xHTML","");
$pstyle = gettheme($sid);
    echo xhtmlhead("View A Poll",$pstyle);
    echo "<p>";
 
    $uid = getuid_sid($sid);
    $pollid = mysqli_fetch_array(sm_query("SELECT pollid FROM ibwf_users WHERE id='".$who."'"));
    if($pollid[0]>0)
    {
        $polli = mysqli_fetch_array(sm_query("SELECT id, pqst, opt1, opt2, opt3, opt4, opt5, pdt FROM ibwf_polls WHERE id='".$pollid[0]."'"));
        if(trim($polli[1])!="")
        {
            $qst = parsepm($polli[1], $sid);
            echo $qst."<br/><br/>";
            $vdone = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_presults WHERE uid='".$uid."' AND pid='".$pollid[0]."'"));
            $nov = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_presults WHERE pid='".$pollid[0]."'"));
            $nov = $nov[0];
            if($vdone[0]>0)
            {
              $voted= true;
            }else{
              $voted = false;
            }
            $opt1 = $polli[2];
            if (trim($opt1)!="")
            {
              $opt1 = htmlspecialchars($opt1);
              $nov1 = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_presults WHERE pid='".$pollid[0]."' AND ans='1'"));
              $nov1 = $nov1[0];
              if($nov>0)
              {
              $per = floor(($nov1/$nov)*100);
              $rests = "Votes: $nov1($per%)";
              }else{
                $rests = "Votes: 0(0%)";
              }
                if($voted)
                {
                  $lnk = "1.$opt1 <small>$rests</small><br/>";
                }else{
              $lnk = "1.<a href=\"genproc.php?action=votepl&amp;sid=$sid&amp;plid=$pollid[0]&amp;ans=1\">$opt1</a> <small>$rests</small><br/>";
              }
              echo "$lnk";
            }
            $opt2 = $polli[3];
            if (trim($opt2)!="")
            {
              $opt2 = htmlspecialchars($opt2);
              $nov2 = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_presults WHERE pid='".$pollid[0]."' AND ans='2'"));
              $nov2 = $nov2[0];
              if($nov>0)
              {
              $per = floor(($nov2/$nov)*100);
              $rests = "Votes: $nov2($per%)";
              }else{
                $rests = "Votes: 0(0%)";
              }
              if($voted)
                {
                  $lnk = "2.$opt2 <small>$rests</small><br/>";
                }else{
              $lnk = "2.<a href=\"genproc.php?action=votepl&amp;sid=$sid&amp;plid=$pollid[0]&amp;ans=2\">$opt2</a> <small>$rests</small><br/>";
              }
              echo "$lnk";
            }
            $opt3 = $polli[4];
            if (trim($opt3)!="")
            {
              $opt3 = htmlspecialchars($opt3);
              $nov3 = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_presults WHERE pid='".$pollid[0]."' AND ans='3'"));
              $nov3 = $nov3[0];
              if($nov>0)
              {
              $per = floor(($nov3/$nov)*100);
              $rests = "Votes: $nov3($per%)";
              }else{
                $rests = "Votes: 0(0%)";
              }
              if($voted)
                {
                  $lnk = "3.$opt3 <small>$rests</small><br/>";
                }else{
              $lnk = "3.<a href=\"genproc.php?action=votepl&amp;sid=$sid&amp;plid=$pollid[0]&amp;ans=3\">$opt3</a> <small>$rests</small><br/>";
              }
              echo "$lnk";
            }
            $opt4 = $polli[5];
            if (trim($opt4)!="")
            {
              $opt4 = htmlspecialchars($opt4);
              $nov4 = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_presults WHERE pid='".$pollid[0]."' AND ans='4'"));
              $nov4 = $nov4[0];
              if($nov>0)
              {
              $per = floor(($nov4/$nov)*100);
              $rests = "Votes: $nov4($per%)";
              }else{
                $rests = "Votes: 0(0%)";
              }
              if($voted)
                {
                  $lnk = "4.$opt4 <small>$rests</small><br/>";
                }else{
              $lnk = "4.<a href=\"genproc.php?action=votepl&amp;sid=$sid&amp;plid=$pollid[0]&amp;ans=4\">$opt4</a> <small>$rests</small><br/>";
              }
              echo "$lnk";
            }
            $opt5 = $polli[6];
            if (trim($opt5)!="")
            {
              $opt5 = htmlspecialchars($opt5);
              $nov5 = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_presults WHERE pid='".$pollid[0]."' AND ans='5'"));
              $nov5 = $nov5[0];
              if($nov>0)
              {
              $per = floor(($nov5/$nov)*100);
              $rests = "Votes: $nov5($per%)";
              }else{
                $rests = "Votes: 0(0%)";
              }
              if($voted)
                {
                  $lnk = "5.$opt5 <small>$rests</small><br/>";
                }else{
              $lnk = "5.<a href=\"genproc.php?action=votepl&amp;sid=$sid&amp;plid=$pollid[0]&amp;ans=5\">$opt5</a> <small>$rests</small><br/>";
              }
              echo "$lnk";
            }
            echo "<small>".date("d m y - H:i",$polli[7])."</small>";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>This poll doesn't exist";
        }
    }else{
        echo "<img src=\"images/notok.gif\" alt=\"x\"/>This user have no poll";
    }
    echo "</p>";
    echo "<p align=\"center\">";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();

}
//////////////////////////////////favttopic
else if($action=="favttopic")
{
  $who = $_GET["who"];
$tid = $_GET["tid"];
    addonline(getuid_sid($sid),"Viewing Users Favourite Topic","");
    echo "<head>";
    echo "<title>User Favourite Topic</title>";
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../themes/$theme[0]\">";
    echo "</head>";
    echo "<body>";
 
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_favtopic WHERE uid='".$who."'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

   $sql = "SELECT id ,tid, dtpost  FROM ibwf_favtopic  WHERE uid='".$who."'ORDER BY dtpost DESC LIMIT $limit_start, $items_per_page";


    echo "<p><small>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      $tid = gettid_pid($item[0]);
      $tname = gettname($tid);

        $tinfo = mysqli_fetch_array(sm_query("SELECT name, text, authorid, crdate, views, fid, pollid from ibwf_topics WHERE id='".$item[1]."'"));
    $tnm = htmlspecialchars($tinfo[0]);
    echo "";

    $lnk = "<a href=\"genproc.php?action=delfav&amp;sid=$sid&amp;tid=$item[1]\">[x]</a><br/>";
        echo "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$item[1]\">".htmlspecialchars($tnm)."</a> <small>".date("d m y-H:i:s",$item[2])." $lnk</small><br/>";

    }
    }
    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">«PREV</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next»</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
        $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "<input name=\"page\" style=\"-wap-input-format: '*N'\" size=\"2\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"submit\" value=\"Go To Page\"/>";
        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>

    echo "<p align=\"center\">";
    $unick = getnick_uid($who);
    echo "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$who\">$unick's Profile</a><br/>";
  echo "<b>0 </b><a accesskey=\"0\" href=\"index.php?action=main&amp;sid=$sid\"><img src=\"../images/home.gif\" alt=\"\"/>Home</a>";
  echo "</p>";
    echo "</body>";
}
else if($action=="viewtpl")
{
  $who = $_GET["who"];
  addonline(getuid_sid($sid),"Viewing a poll - xHTML","");
$pstyle = gettheme($sid);
    echo xhtmlhead("View A Poll",$pstyle);
    echo "<p>";
    $uid = getuid_sid($sid);
 
    $pollid = mysqli_fetch_array(sm_query("SELECT pollid FROM ibwf_topics WHERE id='".$who."'"));
    if($pollid[0]>0)
    {
        $polli = mysqli_fetch_array(sm_query("SELECT id, pqst, opt1, opt2, opt3, opt4, opt5, pdt FROM ibwf_polls WHERE id='".$pollid[0]."'"));
        if(trim($polli[1])!="")
        {
            $qst = parsepm($polli[1], $sid);
            echo $qst."<br/><br/>";
            $vdone = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_presults WHERE uid='".$uid."' AND pid='".$pollid[0]."'"));
            $nov = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_presults WHERE pid='".$pollid[0]."'"));
            $nov = $nov[0];
            if($vdone[0]>0)
            {
              $voted= true;
            }else{
              $voted = false;
            }
            $opt1 = $polli[2];
            if (trim($opt1)!="")
            {
              $opt1 = htmlspecialchars($opt1);
              $nov1 = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_presults WHERE pid='".$pollid[0]."' AND ans='1'"));
              $nov1 = $nov1[0];
              if($nov>0)
              {
              $per = floor(($nov1/$nov)*100);
              $rests = "Votes: $nov1($per%)";
              }else{
                $rests = "Votes: 0(0%)";
              }
                if($voted)
                {
                  $lnk = "1.$opt1 <small>$rests</small><br/>";
                }else{
              $lnk = "1.<a href=\"genproc.php?action=votepl&amp;sid=$sid&amp;plid=$pollid[0]&amp;ans=1\">$opt1</a> <small>$rests</small><br/>";
              }
              echo "$lnk";
            }
            $opt2 = $polli[3];
            if (trim($opt2)!="")
            {
              $opt2 = htmlspecialchars($opt2);
              $nov2 = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_presults WHERE pid='".$pollid[0]."' AND ans='2'"));
              $nov2 = $nov2[0];
              if($nov>0)
              {
              $per = floor(($nov2/$nov)*100);
              $rests = "Votes: $nov2($per%)";
              }else{
                $rests = "Votes: 0(0%)";
              }
              if($voted)
                {
                  $lnk = "2.$opt2 <small>$rests</small><br/>";
                }else{
              $lnk = "2.<a href=\"genproc.php?action=votepl&amp;sid=$sid&amp;plid=$pollid[0]&amp;ans=2\">$opt2</a> <small>$rests</small><br/>";
              }
              echo "$lnk";
            }
            $opt3 = $polli[4];
            if (trim($opt3)!="")
            {
              $opt3 = htmlspecialchars($opt3);
              $nov3 = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_presults WHERE pid='".$pollid[0]."' AND ans='3'"));
              $nov3 = $nov3[0];
              if($nov>0)
              {
              $per = floor(($nov3/$nov)*100);
              $rests = "Votes: $nov3($per%)";
              }else{
                $rests = "Votes: 0(0%)";
              }
              if($voted)
                {
                  $lnk = "3.$opt3 <small>$rests</small><br/>";
                }else{
              $lnk = "3.<a href=\"genproc.php?action=votepl&amp;sid=$sid&amp;plid=$pollid[0]&amp;ans=3\">$opt3</a> <small>$rests</small><br/>";
              }
              echo "$lnk";
            }
            $opt4 = $polli[5];
            if (trim($opt4)!="")
            {
              $opt4 = htmlspecialchars($opt4);
              $nov4 = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_presults WHERE pid='".$pollid[0]."' AND ans='4'"));
              $nov4 = $nov4[0];
              if($nov>0)
              {
              $per = floor(($nov4/$nov)*100);
              $rests = "Votes: $nov4($per%)";
              }else{
                $rests = "Votes: 0(0%)";
              }
              if($voted)
                {
                  $lnk = "4.$opt4 <small>$rests</small><br/>";
                }else{
              $lnk = "4.<a href=\"genproc.php?action=votepl&amp;sid=$sid&amp;plid=$pollid[0]&amp;ans=4\">$opt4</a> <small>$rests</small><br/>";
              }
              echo "$lnk";
            }
            $opt5 = $polli[6];
            if (trim($opt5)!="")
            {
              $opt5 = htmlspecialchars($opt5);
              $nov5 = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_presults WHERE pid='".$pollid[0]."' AND ans='5'"));
              $nov5 = $nov5[0];
              if($nov>0)
              {
              $per = floor(($nov5/$nov)*100);
              $rests = "Votes: $nov5($per%)";
              }else{
                $rests = "Votes: 0(0%)";
              }
              if($voted)
                {
                  $lnk = "5.$opt5 <small>$rests</small><br/>";
                }else{
              $lnk = "5.<a href=\"genproc.php?action=votepl&amp;sid=$sid&amp;plid=$pollid[0]&amp;ans=5\">$opt5</a> <small>$rests</small><br/>";
              }
              echo "$lnk";
            }
            echo "<small>".date("d m y - H:i",$polli[7])."</small>";
        }else{
            echo "<img src=\"images/notok.gif\" alt=\"x\"/>This poll doesn't exist";
        }
    }else{
        echo "<img src=\"images/notok.gif\" alt=\"x\"/>This user have no poll";
    }
    echo "</p>";
    echo "<p align=\"center\">";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();

}
else if($action=="stfol")
{

  addonline(getuid_sid($sid),"Staff online list - xHTML","index.php?action=$action");
$pstyle = gettheme($sid);
    echo xhtmlhead("Staff Online",$pstyle);


  //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $timeout = 180;
  $timeon = (time() - $timeadjust)  - $timeout;
  $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE perm>'0' AND lastact>'".$timeon."'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if($page>$num_pages)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;
    if($limit_start<0)$limit_start=0;
    //changable sql
    $sql = "
    SELECT name, perm, id FROM ibwf_users WHERE perm>'0' AND lastact>'".$timeon."'
            LIMIT $limit_start, $items_per_page
    ";
    echo "<p><small>";
 
    $items = sm_query($sql);
    
    while ($item = mysqli_fetch_array($items))
    {
      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[2]&amp;sid=$sid\">$item[0]</a>";
      if($item[1]==1)
      {
        $item[1] = "Moderator!";
        $icon = "<img src=\"images/mod.gif\" alt=\"M\"/>";
      }
      else if($item[1]==2)
      {
        $item[1] = "Admin!";
        $icon = "<img src=\"images/hadmin.gif\" alt=\"A\"/>";
      }
      else if($item[1]==3)
      {
        $item[1] = "Head Admin!";
        $icon = "<img src=\"images/admin.gif\" alt=\"O\"/>";
		 }
      else if($item[1]==4)
      {
        $item[1] = "Owner!";
        $icon = "<img src=\"images/owner.gif\" alt=\"O\"/>";
      }
      echo "$icon $lnk - $item[1] <br/>";
    }
    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"index.php?action=$action&amp;page=$ppage&amp;sid=$sid\">&#171;PREV</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"index.php?action=$action&amp;page=$npage&amp;sid=$sid\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      echo getjumper($action, $sid,"index");
    }
    echo "</p>";
  ////// UNTILL HERE >>

  echo "<p align=\"center\">";
  
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}


else if($action=="onlinec")
{

  addonline(getuid_sid($sid),"online list - xHTML","index.php?action=$action");
$pstyle = gettheme($sid);
    echo xhtmlhead("Online",$pstyle);

$timeout = 180;
  $timeon = time()- $timeout;
 
 $noi=mysqli_fetch_array(sm_query("SELECT COUNT(DISTINCT cc) FROM ibwf_users WHERE cc IS NOT NULL AND lastact>'".$timeon."'"));
    if($page=="" || $page<=0)$page=1;
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;
    //changable sql
        $sql = "SELECT cc, COUNT(*) as notl FROM ibwf_users WHERE cc!='' AND lastact>'".$timeon."' GROUP BY cc ORDER BY notl DESC LIMIT $limit_start, $items_per_page";
//$moderatorz=sm_query("SELECT tlphone, COUNT(*) as notl FROM users GROUP BY tlphone ORDER BY notl DESC LIMIT  ".$pagest.",5");




    echo "<p>";
	echo "Arranged By:<b>Country Flags!</b><br/>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {

    while ($item = mysqli_fetch_array($items))
    {
   $fimg = show_flag($item[0]);
   $country = country_name($item[0]);
      $lnk ="($item[1])";
      echo "$fimg <a href=\"?action=onlinecc&amp;sid=$sid&amp;cc=$item[0]\">$country</a> $lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"?action=$action&amp;page=$ppage&amp;sid=$sid\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"?action=$action&amp;page=$npage&amp;sid=$sid\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
       $rets = "<form action=\"index.php\" method=\"get\">";
      $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
         $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
         $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";


$rets .= "</form>";

        echo $rets;
    }

  ////// UNTILL HERE >>

  echo "<p align=\"center\">";
   echo "<a href=\"index.php?action=online&amp;sid=$sid\">";
echo "»Arrange by: Full Online List</a><br/>";
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

else if($action=="onlinecc")
{
$cc=$_GET["cc"];
if($cc==""){
$cc="ZZ";
}
 $country = country_name($item[1]);

  addonline(getuid_sid($sid),"$country online list - xHTML","index.php?action=$action");
$pstyle = gettheme($sid);
    echo xhtmlhead("Online",$pstyle);

$timeout = 180;
  $timeon = time()- $timeout;
 
 $noi=mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE cc='".$cc."' IS NOT NULL AND lastact>'".$timeon."'"));
    if($page=="" || $page<=0)$page=1;
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;
    //changable sql
        $sql = "SELECT id,cc FROM ibwf_users WHERE cc='".$cc."' AND lastact>'".$timeon."' LIMIT $limit_start, $items_per_page";



    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {

    while ($item = mysqli_fetch_array($items))
    {
   $fimg = show_flag($item[1]);
   $country = country_name($item[1]);

	  
  $who=$item[0]; 
 $avatar=getavatar($who);

echo "<table width=\"100%\" align=\"left\" border=\"0\"><tr>";
echo "<td width=\"5%\">";
echo"<img src=\"$avatar\" width=\"60\" height=\"60\" alt=\"\" />";
echo"</td>";
echo "<td valign=\"top\" align=\"left\"><small>";
echo "<a href=\"?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">".getnick_uid($item[0])."</a><br/>";
echo "$fimg $country</a><br/>";
echo "<b>Member's ID: </b>$who<br/>";
$noi = mysqli_fetch_array(sm_query("SELECT lastact FROM ibwf_users WHERE id='".$who."'"));$var1 = date("His",$noi[0]);$var2 = time();$var21 = date("His",$var2);$var3 = $var21 - $var1;$var4 = date("s",$var3);echo "Idle: ";$remain = time() - $noi[0];$idle = gettimemsg($remain);echo "$idle<br/>";
   $nopl = mysqli_fetch_array(sm_query("SELECT sex, birthday, location FROM ibwf_users WHERE id='".$who."'"));
  $uage = getage($nopl[1]);
  if($nopl[0]=='M')
  {
    $usex = "Male";
  }else if($nopl[0]=='F'){
    $usex = "Female";
  }else{
    $usex = "Shemale";
  }
  $nopl[2] = htmlspecialchars($nopl[2]);
  echo "<b>A|S|L: </b>$uage|$usex|$nopl[2]";
 echo"</small></td>";
echo"</tr></table>";
echo "<small><img src=\"images/inbox2.gif\" alt=\"like\"/><a href=\"inbox.php?action=sendpm&amp;who=$who&amp;sid=$sid\">Send PM</a></small><hr/>";

   }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"?action=$action&amp;page=$ppage&amp;sid=$sid&amp;cc=$cc\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"?action=$action&amp;page=$npage&amp;sid=$sid&amp;cc=$cc\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
       $rets = "<form action=\"index.php\" method=\"get\">";
      $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
         $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
         $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
$rets .= "<input type=\"hidden\" name=\"cc\" value=\"$cc\"/>";

$rets .= "</form>";

        echo $rets;
    }

  ////// UNTILL HERE >>

  echo "<p align=\"center\">";
  
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

//////////////////////////VIP Online Begin
else if($action=="vipol")
{

  addonline(getuid_sid($sid),"V.I.P online list - xHTML","index.php?action=$action");
$pstyle = gettheme($sid);
    echo xhtmlhead("V.I.P's Online",$pstyle);

 
  //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $timeout = 180;
  $timeon = (time() - $timeadjust)  - $timeout;
  $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE specialid>'0' AND lastact>'".$timeon."'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if($page>$num_pages)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;
    if($limit_start<0)$limit_start=0;
    //changable sql
    $sql = "SELECT name, specialid, id FROM ibwf_users WHERE specialid>'0' AND lastact>'".$timeon."' LIMIT $limit_start, $items_per_page";
    echo "<p>";
    $items = sm_query($sql);
    
    while ($item = mysqli_fetch_array($items))
    {
	$nick = getnick_uid($item[2]);
      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[2]&amp;sid=$sid\">$nick</a>";

  
          $tit = "SM Premium User!";
     
       echo "$lnk - $tit <br/>";
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"index.php?action=$action&amp;page=$ppage&amp;sid=$sid\">&#171;PREV</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"index.php?action=$action&amp;page=$npage&amp;sid=$sid\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      echo getjumper($action, $sid,"index");
    }
    echo "</p>";
  ////// UNTILL HERE >>

  echo "<p align=\"center\">";
  
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
//////////////////////////VIP ONLINE END


else if($action=="chbmsg")
{
  addonline(getuid_sid($sid),"Buddy Message - xHTML","");
$pstyle = gettheme($sid);
 
    echo xhtmlhead("Buddy Message",$pstyle);
    echo "<onevent type=\"onenterforward\">";
    $cmsg = htmlspecialchars(getbudmsg(getuid_sid($sid)));
    echo "<refresh>
        <setvar name=\"bmsg\" value=\"$cmsg\"/>";
    echo "</refresh></onevent>";
    echo "<p align=\"center\">";
    echo "<form method=\"post\" action=\"genproc.php?action=upbmsg&amp;sid=$sid\">";
    echo "Text:<input name=\"bmsg\" maxlength=\"100\" value=\"$cmsg\"/><br/>";
    echo "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
    echo "<input type=\"submit\" name=\"Submit\" value=\"Update\"/><br/>";
    echo "</form>";

            echo "<br/><br/>";
 echo "<a href=\"lists.php?action=buds&amp;sid=$sid\">";
echo "Buddies List</a><br/>";
     
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

/////////////////////////////////viewuser profile

else if($action=="viewuser")
{
 $whonick = getnick_uid($who);



if($who==""||$who==0){$mnick = $_POST["mnick"];$who = getuid_nick($mnick);}
  $whonick = getnick_uid($who);
  if($whonick!="")
  {
  
   addonline(getuid_sid($sid),"xHTML-Viewing Profile of $whonick","index.php?action=viewuser&amp;who=$who");
    $pstyle = gettheme2($who);
    echo xhtmlhead($whonick." Profile",$pstyle);
  
  echo "<h5>$whonick's Profile</h5>";

 ///////////////////////////////////////////////////

if($who!=$uid)
{
$lb = mysqli_fetch_array(sm_query("SELECT COUNT(id) FROM ibwf_lastview WHERE whonick='".$who."' and lastview='".$uid."'"));
if($lb[0]==0){
sm_query("INSERT INTO ibwf_lastview SET lastview='".$uid."', whonick='".$who."', ltime='".time()."'");
}
}
///////////////////////////

 

  
   if(ismod(getuid_sid($sid)))
   {
  if(cansee(getuid_sid($sid), $who))
  {

    $unol = mysqli_fetch_array(sm_query("SELECT lastpnreas FROM ibwf_users WHERE id='".$who."'"));
    if($unol[0]!="")
    {
      echo "Last Penalty Reason: $unol[0]<br/>";
    }
    $unol = mysqli_fetch_array(sm_query("SELECT lastplreas FROM ibwf_users WHERE id='".$who."'"));
    if($unol[0]!="")
    {
      echo "Last Credits Reason: $unol[0]<br/>";
    }
  }
  }
  $uid = getuid_sid($sid);


if (shad0w($uid,$who)) {

//////////////////////////////////////////////////////////////////////
 if(isvip($uid)){
  echo "<img src=\"images/star.gif\" alt=\"Premium\"/><a href=\"other.php?action=user&amp;who=$who&amp;sid=$sid\">SM Premium Panel!!</a><img src=\"images/star.gif\" alt=\"Premium\"/><br/>";
  }
///////////////////////////////////////////////////////////////////
 $noi = mysqli_fetch_array(sm_query("SELECT lastact FROM ibwf_users WHERE id='".$who."'"));$var1 = date("His",$noi[0]);$var2 = time();$var21 = date("His",$var2);$var3 = $var21 - $var1;$var4 = date("s",$var3);echo "Idle: ";$remain = time() - $noi[0];$idle = gettimemsg($remain);echo "$idle<br/>";

$stitle = mysqli_fetch_array(sm_query("SELECT id,lastseen, lastdet FROM ibwf_users WHERE id='".$who."'"));
if(isonline($stitle[0]))
   {$sitelocation = mysqli_fetch_array(sm_query("SELECT place FROM ibwf_online WHERE userid='".$who."'"));
     $iml = "Where: $sitelocation[0]";
   }else{
       $iml = "Offline: Last Seen at $stitle[1]";
    }
 echo "$iml";
 
if($stitle[2]!=="")
{
  echo "<a href=\"$stitle[2]&amp;sid=$sid\">go there</a><br/>";
}
 $avlink = getavatar($who);
 echo "<div align=\"left\"><img src=\"$avlink\" width=\"120\" height=\"120\" alt=\"avatar\"/></div><br/>";

	 

  
  /////////////////////////////////////////
  echo "<img src=\"images/inbox2.gif\" alt=\"like\"/><a href=\"inbox.php?action=sendpm&amp;who=$who&amp;sid=$sid\">Send PM</a> |";

   echo "<img src=\"images/poke.gif\" alt=\"like\"/><a href=\"genproc.php?action=poke&amp;who=$who&amp;sid=$sid\">Poke</a><br/>";

 
   if(budres($uid, $who)==0)
  {
    echo "<img src=\"images/addf.gif\" alt=\"like\"/><a href=\"genproc.php?action=bud&amp;who=$who&amp;sid=$sid&amp;todo=add\">Add to Friend</a><br/>";
  }else if(budres($uid, $who)==1)
  {
    echo "<img src=\"images/loading.gif\" alt=\"like\"/>Pending Friend Request<br/>";
  }else if(budres($uid, $who)==2)
  {
    echo "<img src=\"images/notok.gif\" alt=\"like\"/><a href=\"genproc.php?action=bud&amp;who=$who&amp;sid=$sid&amp;todo=del\">Remove From Friend</a><br/>";
  }
  


 if($uid==$who)
{
echo "<br/><b><a href=\"index.php?action=uset&amp;sid=$sid\">[ Edit My Profile ]</a></b>";
}
 //////////////////////////////////////////////
  echo "<p>";
////////////////////////////////////////////////////////////////////////////////  
  

 
  div();
  if(isvip($who)){
  echo "<img src=\"images/shield.png\" alt=\"Premium\"/><a href=\"other.php?action=prem2&amp;who=$who&amp;sid=$sid\">SM Premium User!!</a><br/>";
  }
  
   $admn = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_vip WHERE uid='".$who."'"));
  if($admn[0]>0)
  { 
  $sql = "SELECT id,vip FROM ibwf_vip  WHERE uid='".$who."'";
 $items = sm_query($sql);
    
if(mysqli_num_rows($items)>0)
    {
	 while ($item = mysqli_fetch_array($items))
    {
     $vip = mysqli_fetch_array(sm_query("SELECT name FROM ibwf_tag WHERE id='".$item[1]."'"));
	echo "<img src=\"images/award.png\" alt=\"Premium\"/><a href=\"lists.php?action=impo&amp;who=$who&amp;sid=$sid\">$vip[0]</a><br/>";
  
	}}} 
  
  ///////////////////////////////////////////////
  $judg = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_judges WHERE uid='".$who."'"));
  if($judg[0]>0)
  {
    echo "<b>Chat Moderator!</b><br/>";
  }
  
    ////////////////////////////////////////////////////
 $noi = mysqli_fetch_array(sm_query("SELECT love FROM ibwf_users WHERE id='".$who."'"));
echo "<a href=\"genproc.php?action=givemylike&amp;who=$who&amp;sid=$sid\">Like User</a><br/>";
echo "<img src=\"images/like.png\" alt=\"love\"/>[$noi[0]] Likes<br/>";
  
  ///////////////////////////////////////////////
  
  /////////////////////////////////////////////////
  
  echo "<b>Member's ID: </b>$who<br/>";
  $nopl = mysqli_fetch_array(sm_query("SELECT sex, birthday, location FROM ibwf_users WHERE id='".$who."'"));
  $uage = getage($nopl[1]);
if($nopl[0]=='M'){$usex = "Male";}else if($nopl[0]=='F'){$usex = "Female";}else{$usex = "Shemale";}
$nopl[2] = htmlspecialchars($nopl[2]);
echo "<b>A|S|L: </b>$uage|$usex|$nopl[2]<br/>";

  $nopl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$who."'"));
  $nop = mysqli_fetch_array(sm_query("SELECT bank FROM ibwf_users WHERE id='".$who."'"));
  $coin = mysqli_fetch_array(sm_query("SELECT coin FROM ibwf_users WHERE id='".$who."'"));
  echo "<b>Credits: </b>$nopl[0] + $nop[0](B)<br/>";
  echo "<b>Coin: </b>$coin[0]<br/>";

  $nopl = mysqli_fetch_array(sm_query("SELECT signature FROM ibwf_users WHERE id='".$who."'"));
  $sign = parsepm($nopl[0], $sid);
  echo "<b>Signature:</b> $sign<br/>";
 echo "</div>";
   
  if(ismod(getuid_sid($sid)))
   {
     $uipadd = mysqli_fetch_array(sm_query("SELECT ipadd FROM ibwf_users WHERE id='".$who."'"));
     echo "IP:<a href=\"lists.php?action=byip&amp;sid=$sid&amp;who=$who\">$uipadd[0]</a><br/>";
	 }
	 $judg = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_judges WHERE uid='".getuid_sid($sid)."'"));
	 if(ismod(getuid_sid($sid))||$judg[0]>0)
	  {
	  
$userbr=getbr_uid($who);
$userip=getip_uid($who);

 echo "<b>Browser:</b> ".ua($userbr)."<br/>";
  echo "<b>OS:</b> ".getOS($userbr)."<br/>";
  echo "<b>IP:</b> ".$userip."<br/>";
  if($userip!==""){
   $cc = iptocountry($userip);
   $country = country_name($cc);
   $fimg = show_flag($cc);
 echo "<b>Country:</b> $fimg".$country."<br/>";
}
   
   }
  

   
  echo "<br/><a href=\"uinfo.php?who=$who&amp;sid=$sid\">More Information</a><br/>";
 

   echo "<a href=\"index.php?action=plusses&amp;who=$who&amp;sid=$sid\">Share Credits</a><br/>";
   echo "<a href=\"index.php?action=plusses&amp;who=$who&amp;sid=$sid\">Share Coins</a><br/>";

  echo "</p>";
   echo "<p align=\"left\">";

  
 $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_shop_Inventory WHERE uid='".$who."'"));

   if($noi[0]>0)
   {
  echo "<a href=\"index.php?action=prop&amp;who=$who&amp;sid=$sid\">$whonick's Property! [ $noi[0] ]</a><br/>";
}


 $no = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM gallery WHERE uid='".$who."'"));
   if($no[0]>0)
   {
   echo "<a href=\"pics.php?action=gallery&amp;who=$who&amp;sid=$sid\">$whonick's Personal Album [$no[0]]</a><br/>";
}
 
 
   $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_gbook WHERE gbowner='".$who."'"));
   echo "<a href=\"lists.php?action=gbook&amp;who=$who&amp;sid=$sid\">Guestbook [$noi[0]]</a><br/>";
}else{
echo "<b>Privacy Profile !!!</b> <br/>
 This profile can only see members with a list of friends<br/> ";
 if(budres($uid, $who)==0)
  {
    echo "<img src=\"images/addf.gif\" alt=\"like\"/><a href=\"genproc.php?action=bud&amp;who=$who&amp;sid=$sid&amp;todo=add\">Add to Friend</a><br/>";
  }else if(budres($uid, $who)==1)
  {
    echo "<img src=\"images/loading.gif\" alt=\"like\"/>Pending Friend Request<br/>";
  }else if(budres($uid, $who)==2)
  {
    echo "<img src=\"images/notok.gif\" alt=\"like\"/><a href=\"genproc.php?action=bud&amp;who=$who&amp;sid=$sid&amp;todo=del\">Remove From Friend</a><br/>";
  }
  
}
   if (isheadadmin(getuid_sid($sid)))
  {
    echo "<a href=\"admincp.php?action=acui&amp;sid=$sid&amp;who=$who\">edit $whonick</a><br/>";


  }
  
  
  
  if(($uid=="1"))
    	{
        echo "<a href=\"index.php?action=batp&amp;who=$who&amp;sid=$sid\">Staff Points</a><br/>";
        }

 
   if(ismod(getuid_sid($sid)))
   {
    echo "<a href=\"admincp.php?action=botusrr&amp;sid=$sid&amp;who=$who\">Kick Out $whonick</a><br/>";
   }

 if(ismod(getuid_sid($sid)))
   {
     echo "<a href=\"modcp.php?action=user&amp;who=$who&amp;sid=$sid&amp;who=$who\">Mod CP</a><br/>";
	 $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE validated='0' AND id='".$who."'"));
if($noi[0]==1)
{
echo "<a href=\"modproc.php?action=validate&amp;sid=$sid&amp;who=$who\">[Validate] </a>";
echo "<a href=\"admproc.php?action=delu&amp;sid=$sid&amp;who=$who\">[Delete]</a><br/>";
}
}
   }else{
     echo "<img src=\"images/notok.gif\" alt=\"X\"/> Member dos not exist<br/>";
   }
    
    
    echo "<br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();

}

////////////////////////////////////////////////////////////
/////////////////////////////////viewuser profile2

else if($action=="viewuser2")
{
 $whonick = getnick_uid($who);addonline(getuid_sid($sid),"xHTML-Viewing Profile of $whonick","index.php?action=viewuser&amp;who=$who");
  $pstyle = gettheme($sid);
    echo xhtmlhead($whonick." Profile",$pstyle);

  if($who==""||$who==0)
  {
    $mnick = $_POST["mnick"];
    $who = getuid_nick($mnick);
  }
  $whonick = getnick_uid($who);
  if($whonick!="")
  {
  echo "<h5>$whonick's Profile</h5>";

  $uid = getuid_sid($sid);


if (shad0w($uid,$who)) {

///////////////////////////////////////////////////////////////////
 $noi = mysqli_fetch_array(sm_query("SELECT lastact FROM ibwf_users WHERE id='".$who."'"));$var1 = date("His",$noi[0]);$var2 = time();$var21 = date("His",$var2);$var3 = $var21 - $var1;$var4 = date("s",$var3);echo "Idle: ";$remain = time() - $noi[0];$idle = gettimemsg($remain);echo "$idle<br/>";

$stitle = mysqli_fetch_array(sm_query("SELECT id,lastseen, lastdet FROM ibwf_users WHERE id='".$who."'"));
if(isonline($stitle[0]))
   {$sitelocation = mysqli_fetch_array(sm_query("SELECT place FROM ibwf_online WHERE userid='".$who."'"));
     $iml = "Where: $sitelocation[0]";
   }else{
       $iml = "Offline: Last Seen at $stitle[1]";
    }
 echo "$iml";
 
if($stitle[2]!=="")
{
  echo "a href=\"$stitle[2]&amp;sid=$sid\">go there</a><br/>";
}
 $avlink = getavatar($who);
 echo "<div align=\"left\"><img src=\"$avlink\" width=\"120\" height=\"120\" alt=\"avatar\"/></div><br/>";

 
 if($uid==$who)
{
echo "<br/><b><a href=\"index.php?action=uset&amp;sid=$sid\">[ Edit My Profile ]</a></b>";
}
 //////////////////////////////////////////////
  echo "<p>";
  div();
  if(isvip($who)){
  echo "<img src=\"images/shield.png\" alt=\"Premium\"/><a href=\"other.php?action=prem2&amp;who=$who&amp;sid=$sid\">SM Premium User!!</a><br/>";
  }
  
  $judg = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_judges WHERE uid='".$who."'"));
  if($judg[0]>0)
  {
    echo "<b>Chat Moderator!</b><br/>";
  }
  
echo "<b>Member's ID: </b>$who<br/>";
$nopl = mysqli_fetch_array(sm_query("SELECT sex, birthday, location FROM ibwf_users WHERE id='".$who."'"));
  $uage = getage($nopl[1]);
if($nopl[0]=='M'){$usex = "Male";}else if($nopl[0]=='F'){$usex = "Female";}else{$usex = "Shemale";}
$nopl[2] = htmlspecialchars($nopl[2]);
echo "<b>A|S|L: </b>$uage|$usex|$nopl[2]<br/>";
$unol = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topics WHERE authorid='".$who."'"));
$unop1 = mysqli_fetch_array(sm_query("SELECT posts FROM ibwf_users WHERE id='".$who."'"));
$uq = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_posts WHERE uid='".$who."'"));
$plink1 = "<a href=\"lists.php?action=uposts&amp;sid=$sid&amp;who=$who\">$uq[0]</a>";
$tlink = "<a href=\"lists.php?action=tbuid&amp;sid=$sid&amp;who=$who\">$unol[0]</a>";
echo "<b>Topics|Posts :</b> $tlink | $plink1<br/>";
$nopl = mysqli_fetch_array(sm_query("SELECT chmsgs FROM ibwf_users WHERE id='".$who."'"));
echo "<b>Chat Posts: </b>$nopl[0]<br/>";
$nout = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_shouts WHERE shouter='".$who."'"));
$nopl = mysqli_fetch_array(sm_query("SELECT shouts FROM ibwf_users WHERE id='".$who."'"));
echo "<b>Shouts: </b><a href=\"lists.php?action=shouts&amp;sid=$sid&amp;who=$who\">$nout[0]</a>/$nopl[0]<br/>";
$nopl = mysqli_fetch_array(sm_query("SELECT regdate FROM ibwf_users WHERE id='".$who."'"));
$jdt = date("d m y-H:i:s",$nopl[0]);
echo "<b>Joined: </b>$jdt<br/>";
$shad0w = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE ref='".$who."'"));
echo "Reffered users: <b><a href=\"lists.php?action=ref&amp;sid=$sid&amp;who=$who\">$shad0w[0]</a></b><br/>"; 

$totaltimeonline = mysqli_fetch_array(sm_query("SELECT tottimeonl FROM ibwf_users WHERE id='".$who."'"));
$num = $totaltimeonline[0]/86400;$days = intval($num);$num2 = ($num - $days)*24;$hours = intval($num2);$num3 = ($num2 - $hours)*60;$mins = intval($num3);$num4 = ($num3 - $mins)*60;$secs = intval($num4);

echo "<b>Time Online:</b> ";
if(($days==0) and ($hours==0) and ($mins==0)){echo "$secs seconds<br/>";}elseif(($days==0) and ($hours==0)){echo "$mins mins, ";echo "$secs seconds<br/>";}elseif(($days==0)){echo "$hours hours, "; echo "$mins mins, ";echo "$secs seconds<br/>";}else{echo "$days days, ";echo "$hours hours, ";echo "$mins mins, ";echo "$secs seconds<br/>";}



  $nopl = mysqli_fetch_array(sm_query("SELECT signature FROM ibwf_users WHERE id='".$who."'"));
  $sign = parsepm($nopl[0], $sid);
  echo "<b>Signature:</b> $sign<br/>";
 echo "</div>";
    
echo "<a href=\"uinfo.php?who=$who&amp;sid=$sid\">More Information</a><br/>";
echo "<a href=\"index.php?action=plusses&amp;who=$who&amp;sid=$sid\">Share Credits</a><br/>";
echo "<a href=\"index.php?action=plusses&amp;who=$who&amp;sid=$sid\">Share Coins</a><br/>";
 echo "</p>";

 
   echo "<p align=\"left\">";
$noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_shop_Inventory WHERE uid='".$who."'"));
if($noi[0]>0)
{
  echo "<a href=\"index.php?action=prop&amp;who=$who&amp;sid=$sid\">$whonick's Property! [ $noi[0] ]</a><br/>";
}


 $no = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM gallery WHERE uid='".$who."'"));
   if($no[0]>0)
   {
   echo "<a href=\"pics.php?action=gallery&amp;who=$who&amp;sid=$sid\">$whonick's Personal Album [$no[0]]</a><br/>";
}
 
 
   $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_gbook WHERE gbowner='".$who."'"));
   echo "<a href=\"lists.php?action=gbook&amp;who=$who&amp;sid=$sid\">Guestbook [$noi[0]]</a><br/>";
}else{
echo "<b>Privacy Profile !!!</b><br/>
This profile can only see members with a list of friends<br/> ";
}
   }else{
     echo "<img src=\"images/notok.gif\" alt=\"X\"/> Member dos not exist<br/>";
   }
    
    
    echo "<br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();

}

//////////////////////////////////////C2P Converter
else if($action=="c2p")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("C2P",$pstyle);

 addonline(getuid_sid($sid),"Converting Chatpost","");
$chatpost = mysqli_fetch_array(sm_query("SELECT chmsgs FROM ibwf_users WHERE id='".$uid."'"));
$plusses = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));

 
echo "<p align=\"center\">";
echo "You currently have $chatpost[0] ChatPosts and $plusses[0] Plusses<br/>";
echo "5 ChatPost = 1 Plusses<br/>";
echo "Select number of ChatPosts you want to convert</br><br/>";
echo "<form action=\"index.php?action=convert&amp;sid=$sid\" method=\"post\">";
echo " <select name=\"cp\">";
echo "<option value=\"50\">50</option>";
echo "<option value=\"100\">100</option>";
echo "<option value=\"300\">300</option>";
echo "<option value=\"500\">500</option>";
echo "</select><br/>";
echo "<input type=\"submit\" value=\"convert\"/>";
echo "</form>";
echo "</p>";
echo "<p align=\"center\">";
echo "<a href=\"index.php?action=chat&amp;sid=$sid\">Chatrooms</a><br/>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\">Home</a>";
echo "</p>";
echo xhtmlfoot();;
}

/////////////////////////////////////////C2P Converter
else if($action=="convert")
{ addonline(getuid_sid($sid),"Converting ChatPost","");
echo "<head>";
$pstyle = gettheme($sid);
    echo xhtmlhead("Convert",$pstyle);

echo "<p align=\"center\">";
$chatpost = mysqli_fetch_array(sm_query("SELECT chmsgs FROM ibwf_users WHERE id='".$uid."'"));
$cp = $_POST["cp"];
if($chatpost[0] >= $cp)
{ if($cp=="50")
{ echo "$cp was deducted to your chatpost and<br/>";
echo "10 plusses was added to your account.<br/>";
echo "<br/><a href=\"index.php?action=viewuser&amp;who=$uid&amp;sid=$sid\">View Stats</a>";
$res = sm_query("UPDATE ibwf_users SET chmsgs=chmsgs-'$cp' WHERE id='".$uid."'"); sm_query ("UPDATE ibwf_users SET plusses=plusses+'10' WHERE id='".$uid."'");
} else if($cp=="100")
{ echo "$cp was deducted to your chatpost and<br/>";
echo "20 plusses was added to your account.<br/>";
echo "<br/><a href=\"index.php?action=viewuser&amp;who=$uid&amp;sid=$sid\">View Stats</a>";
$res = sm_query("UPDATE ibwf_users SET chmsgs=chmsgs-'$cp' WHERE id='".$uid."'"); sm_query ("UPDATE ibwf_users SET plusses=plusses+'20' WHERE id='".$uid."'");
} else if($cp=="300")
{ echo "$cp was deducted to your chatpost and<br/>";
echo "60 plusses was added to your account.<br/>";
echo "<br/><a href=\"index.php?action=viewuser&amp;who=$uid&amp;sid=$sid\">View Stats</a>";
$res = sm_query("UPDATE ibwf_users SET chmsgs=chmsgs-'$cp' WHERE id='".$uid."'"); sm_query ("UPDATE ibwf_users SET plusses=plusses+'60' WHERE id='".$uid."'");
} else if($cp=="500")
{ echo "$cp was deducted to your chatpost and<br/>";
echo "100 plusses added to your account.<br/>";
echo "<br/><a href=\"index.php?action=viewuser&amp;who=$uid&amp;sid=$sid\">View Stats</a>";
$res = sm_query("UPDATE ibwf_users SET chmsgs=chmsgs-'$cp' WHERE id='".$uid."'"); sm_query ("UPDATE ibwf_users SET plusses=plusses+'100' WHERE id='".$uid."'");
} }else{
echo "Stupid! Insufficient ChatPost,Dont cheat bastard!";
} echo "</p>";
echo "<p align=\"center\">";
echo "<a href=\"index.php?action=c2p&amp;sid=$sid\">Back</a><br/>";
echo "<br/>";
echo "<a href=\"index.php?action=chat&amp;sid=$sid\">Chatrooms</a><br/>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\">Home</a>";
echo "</p>";
echo xhtmlfoot();;
}





else if($action=="prop")
{
 $whonick = getnick_uid($who);
  addonline(getuid_sid($sid),"$whonick's Property","");

$pstyle = gettheme($sid);
    echo xhtmlhead("user Property",$pstyle);
  echo "<p align=\"center\">";
 
  $nick = getnick_sid($sid);
  $whonick = getnick_uid($who);

  echo "<i><b><u><small>$whonick's Property:</small></u></b></i><br/>";

  echo "</p>";
  echo "<p>";

     $sql = "SELECT itemid FROM ibwf_shop_Inventory WHERE uid='".$who."'";

    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
    $shopitem = mysqli_fetch_array(sm_query("SELECT itemid, itemname, itemshopid FROM ibwf_shop WHERE itemid='".$item[0]."'"));

    echo "$shopitem[1], ";
    if($shopitem[2]=='1'){

    }


  }
 }


    echo "</p>";
  ////// UNTILL HERE >>
  echo "<p align=\"center\">";
  echo "<br/><a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$who\">";
$whonick = getnick_uid($who);
echo "Back to $whonick's Profile</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
  }


/////////////////////////////last10
else if($action=="last10")
{
    addonline(getuid_sid($sid),"Last 10 Posts - xHTML","index.php?action=$action");
$pstyle = gettheme($sid);
    echo xhtmlhead("Last 10 Posts ",$pstyle);
dival();
 echo "<b>Top 3 Posters:</b><br/>";
if($page=="" || $page<=0)$page=1;
    $num_items = regmemcount(); //changable
    $items_per_page= 3;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name, posts FROM ibwf_users ORDER BY posts DESC LIMIT $limit_start, $items_per_page";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a> Posts: $item[2]";
      echo "$lnk<br/>";
    }
    }
  echo "</div>";

div();
    echo "<center><u><b>Last 20 PostS:</b></u></center><br/>";


	   if($page=="" || $page<=0)$page=1;
    $num_items = regmemcount(); //changable
    $items_per_page= 20;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name FROM ibwf_topics ORDER BY lastpost DESC LIMIT $limit_start, $items_per_page";


    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      //$lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a> <small>Staff Points: $item[2]</small>";
	  $lnk = "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$item[0]&amp;go=last\">$item[1]</a>";
      echo "$lnk<br/>";
    }
    }

    echo "</div>";
    echo "<p align=\"center\">";

    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

/* //////////////////////////////////////////User Personaliy





else if($action=="chpreqref")

{

               $id=$_GET["id"];



   addonline(getuid_sid($sid),"WAP - Chapel","index.php?action=$action");

  $pstyle = gettheme($sid);
      echo xhtmlheadchat("$stitle-Chapel",$pstyle);
 
               echo "<p align=\"center\">";

               echo "<u><b>$stitle Chapel</b></u>";

               echo "</p>";

               echo "<p align=\"center\">";

               $dbinfo=mysqli_fetch_array(sm_query("SELECT * FROM
ibwf_married WHERE id='".$id."'"));

               $frmnick=getnick_uid($dbinfo["frmuid"]);

               echo "Aww, We are sorry to hear about You Decision, your
proposer has been informed of your decison, thank you";

               $dbinfo2=sm_query("DELETE FROM ibwf_married WHERE
id='".$id."'");

               $tonick=getnick_uid($dbinfo["touid"]);



               $byuid = getuid_sid($sid);

               $person = getnick_sid($sid);

               $who=$dbinfo["frmuid"];

               $pmtext="Sorry, $tonick has refused your proposal. we are
sorry to hear this, but feel free to try again at a later date";



               $tm = time();

               $res = sm_query("INSERT INTO ibwf_private SET
text='".$pmtext."', byuid='".$byuid."', touid='".$who."',
timesent='".$tm."'");



               echo "</p>";

   echo "<p align=\"center\">";

   echo "<small>Please Note: This Marriage IS NOT Legally
Binding</small><br/>";

               echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img
src=\"images/home.gif\" alt=\"*\"/>";

   echo "Home</a>";

               echo "</p>";

               // DO NOT REMOVE THE LINE BELOW - DJSteve


			      echo "<p align=\"center\">";

		  echo "Copyrights: @Djsteve ";
echo "</p>";

 echo xhtmlfoot();

}

else if($action=="chpreqacc")

{

               $id=$_GET["id"];



   addonline(getuid_sid($sid),"WAP - Chapel","index.php?action=$action");

$pstyle = gettheme($sid);
      echo xhtmlheadchat("$stitle-Chapel",$pstyle);
 
               echo "<p align=\"center\">";

               echo "<u><b>$stitle Chapel</b></u>";

               echo "</p>";

               echo "<p align=\"center\">";

               $dbinfo=mysqli_fetch_array(sm_query("SELECT * FROM
ibwf_married WHERE id='".$id."'"));

               $frmnick=getnick_uid($dbinfo["frmuid"]);

               echo "Congratulations!. Your Marriage To $frmnick Is
Complete. We Hope You Are Both Happy in your new Relationship";

               $dbinfo2=sm_query("UPDATE ibwf_married SET agreed='1',
complete='1' WHERE id='".$id."'");

               $tonick=getnick_uid($dbinfo["touid"]);



               $byuid = getuid_sid($sid);

               $person = getnick_sid($sid);

               $who=$dbinfo["frmuid"];

               $pmtext="cheers2.  Congratulations!. Your Marriage To $tonick Is
Complete. We Hope You Are Both Happy in your new Relationship";



               $tm = time();

               $res = sm_query("INSERT INTO ibwf_private SET
text='".$pmtext."', byuid='".$byuid."', touid='".$who."',
timesent='".$tm."'");



               echo "</p>";

   echo "<p align=\"center\">";

   echo "<small>Please Note: This Marriage IS NOT Legally
Binding</small><br/>";

               echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img
src=\"images/home.gif\" alt=\"*\"/>";

   echo "Home</a>";

               echo "</p>";


 echo xhtmlfoot();

}

else if($action=="chapel")

{

   addonline(getuid_sid($sid),"WAP - Chapel","index.php?action=$action");

$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle-Chapel",$pstyle);

               echo "<p align=\"center\">";
 
               echo "<u><b>$stitle Chapel</b></u><br/>";
echo "<img src=\"smilies/pop.gif\"alt=\"*\"/>";
               echo "</p>";

               echo "<p align=\"center\">";

               echo "Welcome To $stitle Online Chapel. <br/>Here You Can
Get Married Online In Front Of Our Resident vicar PlasmA";

               echo "</p>";

               $uid=getuid_sid($sid);

               $chkcode=mysqli_fetch_array(sm_query("SELECT id,complete FROM ibwf_married WHERE touid='".$uid."'"));

               else if(($chkcode[0]>0)and($chkcode[1]==0))

                               {


$marriedinfo=mysqli_fetch_array(sm_query("SELECT * FROM ibwf_married WHERE
touid='".$uid."'"));

                                               echo "<p align=\"center\">";


$tonick=getnick_uid($marriedinfo['touid']);


$frmnick=getnick_uid($marriedinfo['frmuid']);


$mf=mysqli_fetch_array(sm_query("SELECT sex FROM ibwf_users WHERE
id='".$marriedinfo['frmnick']."'"));
if($mf[0]=="M")

{
$sex=="Him";
$husb=="Husband";

}else{
$sex=="Her";
$husb=="Wife";
}

 $i=$marriedinfo["ID"];

 echo "<strong>Marriage
Between $tonick and $frmnick</strong><br/><br/>";

                                               echo "Your Only one step
away from Marrying your true love. all you need to do is read and accept the
vows below<br/><br/>";

                                               echo "$tonick, do you take
$frmnick to be your wedded $husb to live together in marriage. Do you
promise to love, comfort, honor and keep $sex<br/>";

                                               echo "For better or worse,
for richer or poorer, in sickness and in health. And forsaking all others,
be faithful only to<br/>";

                                               echo "$sex so long as you
both shall live?<br/><br/>";

                                               echo "<a
href=\"index.php?action=chpreqacc&amp;sid=$sid&amp;id=$i\">I Do</a><br/>";

                                               echo "<a
href=\"index.php?action=chpreqref&amp;sid=$sid&amp;id=$i\">Sorry, I
Dont</a><br/>";

                                               echo "</p>";

                               }else{

                                               $nick=getnick_sid($sid);

                                               echo "<p align=\"center\">";

                                               echo "To Begin Please Enter
The Nickname Of The User You Want to Marry, A PM will be sent<br/>";

                                               echo "To them asking if they
wish to marry you and inviting them to the chapel to complete the
service.<br/>";

                                               echo "By Sending the message
below you agree to the below vows also";

                                               echo "<br/><br/>";

                                               echo "$nick, do you take
[user] to be your wedded [wife/husband] to live together in marriage. Do you
promise to love, comfort, honor and keep [him/her]<br/>";

                                               echo "For better or worse,
for richer or poorer, in sickness and in health. And forsaking all others,
be faithful only to<br/>";

                                               echo "[him/her] so long as
you both shall live?<br/><br/>";

                                               echo "Username:<br/>";
echo "<form action=\"index.php?action=chpsndreq&amp;sid=$sid\" method=\"post\">";
                                               echo "<input name=\"marusr\"
maxlength=\"25\"/><br/>";



                                             echo "<input type=\"submit\" value=\"I Do\"/>";
echo "</form>";

                                               echo "</p>";

                               }

       echo "<p align=\"center\">";

               echo "<small>Please Note: This Marriage IS NOT Legally
Binding</small><br/>";

                   echo "<a
href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\"
alt=\"*\"/>";

       echo "Home</a>";

                               echo "</p>";

               // DO NOT REMOVE THE LINE BELOW - DJSteve



		   echo "<p align=\"center\">";

		 echo "Copyrights: @Djsteve ";
		 echo "</p>";



 echo xhtmlfoot();

}

else if($action=="chpsndreq")

{

   addonline(getuid_sid($sid),"WAP - Chapel","index.php?action=$action");

$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle-Chapel",$pstyle);

               echo "<p align=\"center\">";

               echo "<u><b>$stitle Chapel</b></u>";

               echo "</p>";

               echo "<p align=\"center\">";

               echo "Welcome To $stitle Online Chapel. <br/>Here You Can
Get Married Online In Front Of Our Resident vicar";

               echo "</p>";

               $marusr = $_POST["marusr"];

               $who = getuid_nick($marusr);

               $whonick = getnick_uid($who);

               if($who=="")

               {

               echo "<p align=\"center\">";

               echo "Sorry this user does not exist, Please Try Again";

   echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img
src=\"images/home.gif\" alt=\"*\"/>";

               echo "Home</a>";

               echo "</p>";

               // DO NOT REMOVE THE LINE BELOW - DJSteve

   echo "<p align=\"center\">";

		 echo "Copyrights: @Djsteve ";
		 echo "</p>";



              echo xhtmlfoot();

               exit;

               }


			   else if($who==$uid)

               {

               echo "<p align=\"center\">";

               echo "lol.. Why do you wanna marry yourself?
PMPL..";

   echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img
src=\"images/home.gif\" alt=\"*\"/>";

               echo "Home</a>";

               echo "</p>";

               // DO NOT REMOVE THE LINE BELOW - DJSteve

   echo "<p align=\"center\">";

		 echo "Copyrights: @Djsteve ";
		 echo "</p>";



              echo xhtmlfoot();

               exit;

               }



                  $byuid = getuid_sid($sid);

                  $person = getnick_sid($sid);

  $sql=sm_query("INSERT INTO ibwf_married SET frmuid='".$byuid."',touid='".$who."'");

  $sql2=mysqli_fetch_array(sm_query("SELECT id FROM ibwf_married WHERE
frmuid='".$byuid."' AND touid='".$who."'"));

  $pmtext="firstmove. $person would like to To ask For your hand in marriage, to
accept or refuse visit the chapel link in the site extras page";



  $tm = time();

               $res = sm_query("INSERT INTO ibwf_private SET
text='".$pmtext."', byuid='".$byuid."', touid='".$who."',
timesent='".$tm."'");

 if($res)

 {

               echo "<p align=\"center\">";

   echo "<img src=\"images/ok.gif\" alt=\"O\"/>";

   echo "Marriage Request was sent successfully to $whonick<br/> please
wait for a response</p>";

 }else{

               echo "<p align=\"center\">";

   echo "<img src=\"images/notok.gif\" alt=\"X\"/>";

   echo "Can't Send Request to $whonick</p>";

 }

   echo "<p align=\"center\">";

   echo "<small>Please Note: This Marriage IS NOT Legally
Binding</small><br/>";

               echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img
src=\"images/home.gif\" alt=\"*\"/>";

   echo "Home</a>";

               echo "</p>";

               // DO NOT REMOVE THE LINE BELOW - DJSteve

              echo "<p align=\"center\">";
		 echo "Copyrights:@Djsteve ";
		 echo "</p>";



 echo xhtmlfoot();

}
 */

//////////////////////////////////////////Give credits

else if($action=="plusses")
{
  $who = $_GET["who"];
  addonline(getuid_sid($sid),"Sharing credits","");
$pstyle = gettheme($sid);
      echo xhtmlheadchat("$stitle",$pstyle);
   echo "<p align=\"center\">";
 
  echo "<b>Give Credits To ".getnick_uid($who)."</b><br/><br/>";
  $gps = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users
WHERE id='".getuid_sid($sid)."'"));
  echo "You have $gps[0] Credits<br/><br/>";
  echo "Credits to give<br/>";
echo "<form action=\"genproc.php?action=plusses&amp;sid=$sid&amp;who=$who\" method=\"post\">";
  echo "<input name=\"ptg\" format=\"*N\" maxlength=\"3\"/>";
echo "<input type=\"submit\" value=\"Give\"/>";
echo "</form>";
  echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"../images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

else if($action=="coin")
{
  $who = $_GET["who"];
  addonline(getuid_sid($sid),"Sharing coins","");
$pstyle = gettheme($sid);
      echo xhtmlheadchat("$stitle",$pstyle);
   echo "<p align=\"center\">";
 
  echo "<b>Give Credits To ".getnick_uid($who)."</b><br/><br/>";
  $gps = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users
WHERE id='".getuid_sid($sid)."'"));
  echo "You have $gps[0] Credits<br/><br/>";
  echo "Credits to give<br/>";
echo "<form action=\"genproc.php?action=plusses&amp;sid=$sid&amp;who=$who\" method=\"post\">";
  echo "<input name=\"ptg\" format=\"*N\" maxlength=\"3\"/>";
echo "<input type=\"submit\" value=\"Give\"/>";
echo "</form>";
  echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"../images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}
//////////////////////////////////////////Give Game Plusses
else if($action=="coin")
{
  $who = $_GET["who"];
  addonline(getuid_sid($sid),"Sharing coins","");
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
   echo "<p align=\"center\">";
 
  echo "<b>Give Coins To ".getnick_uid($who)."</b><br/><br/>";
  $gps = mysqli_fetch_array(sm_query("SELECT coins FROM ibwf_users
WHERE id='".getuid_sid($sid)."'"));
  echo "You have $gps[0] Credits<br/><br/>";
  echo "Credits to give<br/>";
echo "<form action=\"genproc.php?action=coins&amp;sid=$sid&amp;who=$who\" method=\"post\">";
  echo "<input name=\"ptg\" format=\"*N\" maxlength=\"3\"/>";
echo "<input type=\"submit\" value=\"Give\"/>";
echo "</form>";
  echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"../images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}



/////////////////////////////////////////
else if($action=="givegp")
{
  $who = $_GET["who"];
  addonline(getuid_sid($sid),"Giving Game Plusses","");
$pstyle = gettheme($sid);
      echo xhtmlheadchat("$stitle",$pstyle);
 
   echo "<p align=\"center\">";
  echo "<b>Give GPs To ".getnick_uid($who)."</b><br/><br/>";
  $gps = mysqli_fetch_array(sm_query("SELECT gplus FROM ibwf_users WHERE id='".getuid_sid($sid)."'"));
  echo "You have $gps[0] GP's<br/><br/>";
  echo "GP's to give<br/>";
echo "<form action=\"genproc.php?action=givegp&amp;sid=$sid&amp;who=$who\" method=\"post\">";
  echo "<input name=\"ptg\" format=\"*N\" maxlength=\"2\"/>";
echo "<input type=\"submit\" value=\"Give\"/>";
echo "</form>";
  echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"../images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////////////Give Battle points

else if($action=="batp")
{
  $who = $_GET["who"];
  addonline(getuid_sid($sid),"Giving Battle Points - xHTML","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Give BP",$pstyle);
 
    echo "<onevent type=\"onenterforward\">";
    echo "<refresh>
        <setvar name=\"tfbp\" value=\"0\"/>";
    echo "</refresh></onevent>";
  echo "<p align=\"center\">";
  $judg = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_judges WHERE uid='".getuid_sid($sid)."'"));
  if(ismod(getuid_sid($sid))||$judg[0]>0)
  {


  echo "<b>Give/Take BPs To ".getnick_uid($who)."</b><br/><br/>";
  echo "<input name=\"tfbp\" format=\"*N\" maxlength=\"2\"/>";
  echo "<br/><anchor>Add";
  echo "<go href=\"genproc.php?action=batp&amp;sid=$sid&amp;who=$who\" method=\"post\">";
  echo "<postfield name=\"ptbp\" value=\"$(tfbp)\"/>";
  echo "<postfield name=\"giv\" value=\"1\"/>";
  echo "</go></anchor><br/>";
  echo "<anchor>Remove";
  echo "<go href=\"genproc.php?action=batp&amp;sid=$sid&amp;who=$who\" method=\"post\">";
  echo "<postfield name=\"ptbp\" value=\"$(tfbp)\"/>";
  echo "<postfield name=\"giv\" value=\"0\"/>";
  echo "</go></anchor><br/><br/>";
  }else{
    echo "You Can't Do This";
  }
    
    
    echo "<br/><br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

//////////////////////////////////////////Post Options

else if($action=="pstopt")
{
  $pid = $_GET["pid"];
  $page = $_GET["page"];
  $fid = $_GET["fid"];
    addonline(getuid_sid($sid),"Post Options - xHTML","");
    $pinfo= mysqli_fetch_array(sm_query("SELECT uid,tid, text  FROM ibwf_posts WHERE id='".$pid."'"));
    $trid = $pinfo[0];
    $tid = $pinfo[1];
    $ptext = htmlspecialchars($pinfo[2]);
    $pstyle = gettheme($sid);
    echo xhtmlhead("Post Options",$pstyle);
 
    echo "<onevent type=\"onenterforward\">";
    echo "<refresh>
        <setvar name=\"ptext\" value=\"$ptext\"/>";
    echo "</refresh></onevent>";
  echo "<p align=\"center\">";
  echo "<b>Post Options</b>";

  echo "</p>";
  echo "<p>";
  $trnick = getnick_uid($trid);
  echo ";<a href=\"inbox.php?action=sendpm&amp;sid=$sid&amp;who=$trid\">&#187;Send PM to $trnick</a><br/>";
  echo "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$trid\">&#187;View $trnick's Profile</a><br/>";
  //echo "<a href=\"index.php?action=post&amp;sid=$sid&amp;tid=$tid&amp;qut=$pid\">&#187;Quote</a><br/>";
  echo "<a href=\"genproc.php?action=rpost&amp;sid=$sid&amp;pid=$pid\">&#187;Report</a><br/>";
  echo "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tid&amp;page=$page\">&#171;Back to topic</a><br/><br/>";


  if(ismod(getuid_sid($sid)))
  {

     echo "<form method=\"post\" action=\"modproc.php?action=edtpst&amp;sid=$sid&amp;pid=$pid\">";
     echo "Text: <input name=\"ptext\" value=\"$ptext\" maxlength=\"500\"/> ";
     echo "<input type=\"submit\" name=\"Submit\" value=\"Edit\"/><br/>";
     echo "</form>";

echo "<br/><a href=\"modproc.php?action=delp&amp;sid=$sid&amp;pid=$pid\">&#187;DELETE</a><br/>";
  }
  else if($pinfo[0]==getuid_sid($sid))
  {
  echo "<form method=\"post\" action=\"genproc.php?action=edtpst&amp;sid=$sid&amp;pid=$pid\">";
     echo "Text: <input name=\"ptext\" value=\"$ptext\" maxlength=\"500\"/> ";
     echo "<input type=\"submit\" name=\"Submit\" value=\"Edit\"/><br/>";
     echo "</form>";
	 }

  echo "</p>";
echo "<p align=\"center\">";
  
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

else if($action=="tpcopt")
{
    $tid = $_GET["tid"];
    addonline(getuid_sid($sid),"Topic Options - xHTML","");
    $tinfo= mysqli_fetch_array(sm_query("SELECT name,fid, authorid, text, pinned, closed  FROM ibwf_topics WHERE id='".$tid."'"));
    $trid = $tinfo[2];
    $ttext = htmlspecialchars($tinfo[3]);
    $tname = htmlspecialchars($tinfo[0]);
    $pstyle = gettheme($sid);
    echo xhtmlhead("Topic Options",$pstyle);
 
    echo "<onevent type=\"onenterforward\">";
    echo "<refresh>
        <setvar name=\"ttext\" value=\"$ttext\"/>
        <setvar name=\"tname\" value=\"$tname\"/>";
    echo "</refresh></onevent>";
  echo "<p align=\"center\">";
  echo "<b>Topic Options</b>";

  echo "</p>";
  echo "<p>";
  echo "Topic ID: <b>$tid</b><br/>";
  $trnick = getnick_uid($trid);
echo "<a href=\"genproc.php?action=bkmrk&amp;sid=$sid&amp;tid=$tid\">Bookmark This Topic</a><br/>";
  echo "<a href=\"inbox.php?action=sendpm&amp;sid=$sid&amp;who=$trid\">&#187;Send PM to $trnick</a><br/>";
  echo "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$trid\">&#187;View $trnick's Profile</a><br/>";
  //echo "<a href=\"index.php?action=post&amp;sid=$sid&amp;tid=$tid&amp;qut=$pid\">&#187;Quote</a><br/>";
  $plid = mysqli_fetch_array(sm_query("SELECT pollid FROM ibwf_topics WHERE id='".$tid."'"));
  if($plid[0]==0)
  {
  if(ismod($uid))
    {
  echo "<a href=\"index.php?action=pltpc&amp;sid=$sid&amp;tid=$tid\">&#187;Add Poll</a><br/>";
}
}else{
  if(ismod($uid))
  {
    echo "<a href=\"genproc.php?action=dltpl&amp;sid=$sid&amp;tid=$tid\">&#187;Delete Poll</a><br/>";
    }
}
  echo "<a href=\"genproc.php?action=rtpc&amp;sid=$sid&amp;tid=$tid\">&#187;Report</a><br/>";
  echo "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tid&amp;page=1\">&#171;Back to topic</a><br/>";
  if(ismod(getuid_sid($sid)))
  {
    echo "<form method=\"post\" action=\"modproc.php?action=rentpc&amp;sid=$sid&amp;tid=$tid\">";
    echo "<br/>Title: <input name=\"tname\" value=\"$tname\" maxlength=\"25\"/>";
    echo "<br/><input type=\"submit\" name=\"Submit\" value=\"Rename\"/><br/>";
    echo "</form>";

    echo "<form method=\"post\" action=\"modproc.php?action=edttpc&amp;sid=$sid&amp;tid=$tid\">";
    echo "<br/>Text: <input name=\"ttext\" value=\"$ttext\" maxlength=\"500\"/> ";
    echo "<br/><input type=\"submit\" name=\"Submit\" value=\"Edit\"/><br/>";
    echo "</form>";
if($trid ==$uid){
echo "<form action=\"genproc.php?action=edtpst&amp;sid=$sid&amp;pid=$pid\" method=\"post\">";
echo "User Text: <input name=\"ptext\" value=\"$ptext\" maxlength=\"500\"/> ";
  echo "<input type=\"submit\" name=\"Submit\" value=\"Edit\"/><br/>";
     echo "</form>";
}
echo "<a href=\"modproc.php?action=delt&amp;sid=$sid&amp;tid=$tid\">&#187;DELETE</a><br/>";
    echo "<br/>";
    if($tinfo[5]=='1')
    {
      $ctxt = "Open";
      $cact = "0";
    }else{
        $ctxt = "Close";
      $cact = "1";
    }
    echo "<a href=\"modproc.php?action=clot&amp;sid=$sid&amp;tid=$tid&amp;tdo=$cact\">&#187;$ctxt</a><br/>";
    if($tinfo[4]=='1')
    {
      $ptxt = "Unpin";
      $pact = "0";
    }else{
        $ptxt = "Pin";
      $pact = "1";
    }
  echo "<a href=\"modproc.php?action=pint&amp;sid=$sid&amp;tid=$tid&amp;tdo=$pact\">&#187;$ptxt</a><br/>";
  //echo "<a href=\"index.php?action=post&amp;sid=$sid&amp;tid=$tid&amp;qut=$pid\">&#187;Quote</a><br/>";
  echo "<br/>Move to:<br/>";
  echo "<form method=\"post\" action=\"modproc.php?action=mvt&amp;sid=$sid&amp;tid=$tid\">";
  $forums = sm_query("SELECT id, name FROM ibwf_forums WHERE clubid='0'");
  echo "<select name=\"mtf\">";
  while ($forum = mysqli_fetch_array($forums))
  {
    echo "<option value=\"$forum[0]\">$forum[1]</option>";
  }
  echo "</select><br/>";
  echo "<input type=\"submit\" name=\"Submit\" value=\"Move\"/><br/>";
  echo "</form>";
  }
  else if($tinfo[2]==getuid_sid($sid))
  {
   echo "<form method=\"post\" action=\"genproc.php?action=rentpc&amp;sid=$sid&amp;tid=$tid\">";
    echo "<br/>Title: <input name=\"tname\" value=\"$tname\" maxlength=\"25\"/>";
    echo "<br/><input type=\"submit\" name=\"Submit\" value=\"Rename\"/><br/>";
    echo "</form>";

    echo "<form method=\"post\" action=\"genproc.php?action=edttpc&amp;sid=$sid&amp;tid=$tid\">";
    echo "<br/>Text: <input name=\"ttext\" value=\"$ttext\" maxlength=\"500\"/> ";
    echo "<br/><input type=\"submit\" name=\"Submit\" value=\"Edit\"/><br/>";
    echo "</form>";

echo "<a href=\"genproc.php?action=delt&amp;sid=$sid&amp;tid=$tid\">&#187;DELETE</a><br/>";
    echo "<br/>";
    if($tinfo[5]=='1')
    {
      $ctxt = "Open";
      $cact = "0";
    }else{
        $ctxt = "Close";
      $cact = "1";
    }
    echo "<a href=\"genproc.php?action=clot&amp;sid=$sid&amp;tid=$tid&amp;tdo=$cact\">&#187;$ctxt</a><br/>";

   }
  echo "</p>";
echo "<p align=\"center\">";
  
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
else if ($action=="chat")           {
        addonline(getuid_sid($sid),"Chat Menu - xHTML","index.php?action=$action");
        $pstyle = gettheme($sid);
    echo xhtmlhead("Chat Menu",$pstyle);
        echo "<p align=\"center\">";
        echo "<img src=\"images/chat.gif\" alt=\"*\"/><br/>";
 dival();
 echo "<i><u>Top Chatter:</u></i><br/>";
//////////////////////////////////////////////////////////////// top chatters 
if($page=="" || $page<=0)$page=1;
    $num_items = regmemcount(); //changable
    $items_per_page= 3;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name, chmsgs FROM ibwf_users ORDER BY chmsgs DESC LIMIT $limit_start, $items_per_page";

    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a> -ChaT Posts: $item[2]";
      echo "$lnk<br/>";
    }
    }
 
        echo "</div><br/>";
div();

$item = mysqli_fetch_array(sm_query("SELECT id, scode, imgsrc, hidden FROM ibwf_smilies ORDER BY RAND()  LIMIT 1"));
echo "<small>Random smile</small><br>";
echo "$item[1] &#187; ";
        echo "<img src=\"$item[2]\" alt=\"$item[1]\"/><br/>";
 echo "<br/><a href=\"index.php?action=chat&amp;sid=$sid\">Refresh the smilie</a></div><br/>";


        	$unreadinbox=mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE unread='1' AND touid='".getuid_sid($sid)."'"));
        $pmtotl=mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE touid='".getuid_sid($sid)."'"));
        $unrd="(".$unreadinbox[0]."/".$pmtotl[0].")";
        echo "<a href=\"inbox.php?action=main&amp;sid=$sid&amp;page=1\">Inbox$unrd</a><br/> ";
        echo "<a href=\"index.php?action=uchat&amp;sid=$sid\">Users Rooms</a><br/>";
		


div();

		  $rooms = sm_query("SELECT id, name, pass FROM ibwf_rooms WHERE static='0'");
        $co=0;
        while ($room= mysqli_fetch_array($rooms))
        {
            $co++;
          if(canenter($room[0], $sid))
          {
            $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_chonline WHERE rid='".$room[0]."'"));
            if($room[2]=="")
            {
            echo "<a href=\"chat.php?sid=$sid&amp;rid=$room[0]\">".htmlspecialchars($room[1])."($noi[0])</a><br/>";
            }
          }

        }




        $rooms = sm_query("SELECT id, name, perms, mage, chposts FROM ibwf_rooms WHERE static='1' AND clubid='0'");
        while ($room= mysqli_fetch_array($rooms))
        {

          if(canenter($room[0], $sid))
          {
            $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_chonline WHERE rid='".$room[0]."'"));
            echo "<a href=\"chat.php?sid=$sid&amp;rid=$room[0]\">$room[1]($noi[0])</a><br/>";
          }

        }
echo "</div>";

        echo "<br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a><br/>";
        echo "</p>";
        echo xhtmlfoot();
                                           }
else if ($action=="uchat")           {
addonline(getuid_sid($sid),"Chat Menu - xHTML","");
$pstyle = gettheme($sid);
    echo xhtmlhead("Chat Menu",$pstyle);
        echo "<p align=\"center\">";
        echo "<img src=\"images/chat.gif\" alt=\"*\"/><br/>";
 
        echo "<br/>";


        	$unreadinbox=mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE unread='1' AND touid='".getuid_sid($sid)."'"));
        $pmtotl=mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE touid='".getuid_sid($sid)."'"));
        $unrd="(".$unreadinbox[0]."/".$pmtotl[0].")";
        echo "<a href=\"inbox.php?action=main&amp;sid=$sid&amp;page=1\">Inbox$unrd</a><br/><br/> ";
        echo "<a href=\"index.php?action=chat&amp;sid=$sid\">Public Rooms</a><br/>";
        echo "<a href=\"index.php?action=mkroom&amp;sid=$sid\">Create Room</a><br/><br/>";
        $rooms = sm_query("SELECT id, name, pass FROM ibwf_rooms WHERE static='0'");
        $co=0;
        while ($room= mysqli_fetch_array($rooms))
        {
            $co++;
          if(canenter($room[0], $sid))
          {
            $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_chonline WHERE rid='".$room[0]."'"));
            if($room[2]=="")
            {
            echo "<a href=\"chat.php?sid=$sid&amp;rid=$room[0]\">".htmlspecialchars($room[1])."($noi[0])</a><br/>";
            }else{

              //echo "($noi[0])";
echo "<form action=\"chat.php\" method=\"get\">";
              echo "<br/><input format=\"*x\" name=\"rpw\" maxlength=\"10\"/><br/>";
echo "<input type=\"submit\" value=\"$room[1]($noi[0])\"/>";
              echo "<input type=\"hidden\" name=\"rid\" value=\"$room[0]\"/>";
              echo "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
              echo "</form>";


            }
          }

        }


          
    
    echo "<br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";
        echo xhtmlfoot();
                                           }
else if($action=="mkroom")
{
    addonline(getuid_sid($sid),"Creating Chatroom - xHTML","");
$pstyle = gettheme($sid);
    echo xhtmlhead("Creating Room",$pstyle);
        echo "<p>";
 
        echo "<small><img src=\"images/point.gif\" alt=\"!\"/>Leave password empty if you dont want to lock the room</small><br/>";
        echo "<small><img src=\"images/point.gif\" alt=\"!\"/>Don't make the password too personal, it's visible in the database</small><br/><br/>";

		 echo "<form method=\"post\" action=\"genproc.php?action=mkroom&amp;sid=$sid\">";





        echo "Room Name: <input name=\"rname\" maxlength=\"30\"/><br/>";
        echo "Password: <input name=\"rpass\" format=\"*x\" maxlength=\"10\"/><br/>";

    echo "<input type=\"submit\" name=\"Submit\" value=\"Create\"/><br/>";
    echo "</form>";
        echo "</p>";
        echo "<p align=\"center\">";
          
    
        echo "<a href=\"index.php?action=chat&amp;sid=$sid\"><img src=\"images/chat.gif\" alt=\"*\"/>Chatrooms</a><br/>";
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";
        echo xhtmlfoot();
}

else if ($action=="formmenu")           {
addonline(getuid_sid($sid),"Forum Index - xHTML","index.php?action=$action");
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle Forums",$pstyle);
 
  echo "<p align=\"center\"><small>";
  $tmsg = getpmcount(getuid_sid($sid));
  $umsg = getunreadpm(getuid_sid($sid));

  if($umsg==1)
  {
  echo "<a href=\"inbox.php?action=main&amp;sid=$sid\">Inbox($umsg New Message)</a> <br/><br/>";
  }
  if($umsg>1)
  {
  echo "<a href=\"inbox.php?action=main&amp;sid=$sid\">Inbox($umsg New Messages)</a> <br/><br/>";
  }
  echo "</small></p>";



  echo "<h2><u><i>Forum <b>Categories:</b></i></u></h2><div class=\"mblock2\"><br/>";
    echo "<small>";
  echo "<a href=\"index.php?action=last10&amp;sid=$sid\">Last 10 posts!!</a><br/>";
  $fcats = sm_query("SELECT id, name FROM ibwf_fcats ORDER BY position, id");
  $iml = "<img src=\"images/1.gif\" alt=\"*\"/>";
  while($fcat=mysqli_fetch_array($fcats))
  {
    $catlink = "<div class=\"catRow\"><a href=\"index.php?action=viewcat&amp;sid=$sid&amp;cid=$fcat[0]\">$iml$fcat[1]</a></div>";
    echo "$catlink";


  }

  $norm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users"));
  $nops = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_posts"));
  echo "<br/><br/><b>$norm[0]</b> users have made a total of <b>$nops[0]</b> posts<br/><br/>";
  echo "</small></div>";
  echo "<p align=\"center\">";
  
    
    echo "<br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
    }



else if ($action=="funm")
 {
addonline(getuid_sid($sid),"Fun/Games Menu - xHTML","index.php?action=$action");
$pstyle = gettheme($sid);
    echo xhtmlhead("Fun/Games Menu",$pstyle);
	 echo "<h5>Fun/Games Menu</h5>";
	
        echo "<div class=\"alert\"><small>";
        echo "<img src=\"images/roll.gif\" alt=\"*\"/><br/>";
        echo "Hello, so you want to play some games and have fun? well you came into the right place";
        echo "</small></div>";
 
        echo "<p><small>";
echo "<a href=\"games.php?action=wwe&amp;sid=$sid\">&#187;WWE</a><br/>";
echo "<a href=\"games.php?action=harry&amp;sid=$sid\">&#187;Harry Potter</a><br/>";
echo "<a href=\"games.php?action=padventure&amp;sid=$sid\">Adventure</a><br/>";
echo "<a href=\"games.php?action=guessgm&amp;sid=$sid\">&#187;Guess The Number</a><br/>";
echo "<a href=\"lists.php?action=casino&amp;sid=$sid\">&#187;Casino</a><br/>";

        //echo "&#187;Dares Box<br/>";
        echo "</small></p>";
        echo "<p align=\"center\">";
  
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";
        echo xhtmlfoot();
}

else if ($action=="partners")
 {
addonline(getuid_sid($sid),"Partner List - xHTML","");
$pstyle = gettheme($sid);
    echo xhtmlhead("Partners",$pstyle);
        echo "<p align=\"center\"><small>";
        echo "$stitle Partners<br/><br/>";
        echo "</small></p>";
        echo "<p><small>";
            echo "</small></p>";
        echo "<p align=\"center\">";
  
    
    echo "<br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";
        echo xhtmlfoot();
}

///////////////////////////////view blog

else if($action=="viewblog")
{
  $bid = $_GET["bid"];
  addonline(getuid_sid($sid),"Viewing Blog - xHTML","");
$pstyle = gettheme($sid);
    echo xhtmlhead("View Blog",$pstyle);
  echo "<p>";
 
  $pminfo = mysqli_fetch_array(sm_query("SELECT btext, bname, bgdate,bowner, id FROM ibwf_blogs WHERE id='".$bid."'"));
    $bttl = htmlspecialchars($pminfo[1]);
    $btxt = parsemsg($pminfo[0], $sid);
    $bnick = getnick_uid($pminfo[3]);
  $vbbl = "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$pminfo[3]\">$bnick</a><br/>";
  echo "Club ID: <b>$bid</b><br/>";
    echo "<b>$bttl</b> by: $vbbl<br/>";
  echo "$btxt<br/>";
  $tmstamp = $pminfo[2];
  $tmdt = date("d m y - h:i:s", $tmstamp);
  echo "<small>$tmdt</small><br/><br/>";
  $vb = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_brate WHERE uid='".$uid."' AND blogid='".$bid."'"));
  if($vb[0]==0)
  {
  echo "Rate <form action=\"genproc.php?action=rateb&amp;sid=$sid&amp;bid=$pminfo[4]\" method=\"post\"><select id=\"inputText\" name=\"brate\">
  <option value=\"1\">1</option>
  <option value=\"2\">2</option>
  <option value=\"3\">3</option>
  <option value=\"4\">4</option>
  <option value=\"5\">5</option>
  </select>
  <input id=\"inputButton\" type=\"submit\" value=\"Submit\"/>
  </form>";

 echo "<br/>";
  }else{
    $rinfo = mysqli_fetch_array(sm_query("SELECT COUNT(*) as nofr, SUM(brate) as nofp FROM ibwf_brate WHERE blogid='".$bid."'"));
    $ther = $rinfo[1]/$rinfo[0];
    echo "Rate: $ther - Points: $rinfo[1]<br/>";
  }
  echo "</p>";
  echo "<p align=\"center\">";
  echo "<a href=\"lists.php?action=allbl&amp;sid=$sid\">Back to Blogs</a><br/>";
  $bnick = getnick_uid($pminfo[3]);
  echo "<a href=\"lists.php?action=blogs&amp;sid=$sid&amp;who=$pminfo[3]\">Back to $bnick's Blogs</a><br/>";
  
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();

}



/////////////////////////////////Terms of use
else if($action=="terms")
{
  $uid =getuid_sid($sid);
  if(isuser($uid))
  {
  addonline(getuid_sid($sid),"Terms of use - xHTML","index.php?action=$action");
  $pstyle = gettheme($sid);
    echo xhtmlhead("Terms Of Use",$pstyle);
  }else{
$pstyle = gettheme1("1");
    echo xhtmlhead("Terms Of Use",$pstyle);
	}
	  echo "<h5>Terms Of Use</h5>";
  echo "<p>";
  echo "<img src=\"images/point.gif\" alt=\"!\"/>Posts containing racism, links to other sites, spamming, flooding, adult content, hacking will be deleted immediately, and the posters will get warned or banned<br/>";
  echo "<img src=\"images/point.gif\" alt=\"!\"/>chatting, discriminating, posting off topics, posting useless posts (smilies only or one word post), and free posting results to delete the posts, substracting plusses and banning in some cases<br/>";
  echo "<img src=\"images/point.gif\" alt=\"!\"/>Registering more than one nickname, could result to delete all your accounts<br/>";
  echo "<img src=\"images/point.gif\" alt=\"!\"/>Never give your account password to anyone, except in some extreme cases and the admins should be informed about it<br/>";
  echo "<img src=\"images/point.gif\" alt=\"!\"/>Faking your personal information (like age, sex, location etc..) just to gain access to hidden forums or any other reason could result on banning, or a warning at least<br/>";
  echo "<img src=\"images/point.gif\" alt=\"!\"/>Females harassment, and racism will results on banning for 7 days at least without a warning, and an IP-Ban if this behavior continued<br/>";
  echo "<img src=\"images/point.gif\" alt=\"!\"/>Bumping topics (keep posting in them by the author of the topic just to keep it in first page and not for a good reason) will cause these topics to be deleted and the penalty could vary between warning, substracting plusses, or even a ban<br/>";
  echo "<img src=\"images/point.gif\" alt=\"!\"/>You can only speak in english in forums, and all the chatrooms except (International, Sinhala and Indian)<br/>";
  echo "<img src=\"images/point.gif\" alt=\"!\"/>Please report any spams, this is the only thing that we want from you for our free services<br/>";
   echo "<img src=\"images/point.gif\" alt=\"!\"/><b>The most important rule is to have fun here and enjoy your stay ;)</b><br/>";
  echo "<br/>Remeber, these rules were made for protecting you before protecting us, if you think they are a little restrictive then read <a href=\"lists.php?action=faqs&amp;sid=$sid\">our F.A.Qs</a> or ask any online staff member(only if you logged in), Thank you so much<br/>";
  echo "</p>";
  echo "<p align=\"center\">";
  if(isuser($uid))
  {
  
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
}else{
    echo "<a href=\"index.php\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
}
  echo "</p>";
  echo xhtmlfoot();
}





////////////////////////////////Terms of use
else if($action=="fsite")
{
  $uid =getuid_sid($sid);
  if($uid>0)
  {
  addonline(getuid_sid($sid),"Free Site - xHTML","index.php?action=$action");
  $pstyle = gettheme($sid);
    echo xhtmlhead("Site for free",$pstyle);
  }
$pstyle = gettheme1("1");
    echo xhtmlhead("Site for free",$pstyle);
  echo "<p><small>";


  echo "<b>Get your own Personal Site for free!</b><br/><br/>";

echo "When you sign up to $stitle as a member we automatically create a site for you, this is totally
free and will cost you nothing more than your support to us<br/><br/>The more you update your settings in your
 CPanel after loging in to $stitle, the more you update your site<br/><br/>after signup you can go to
http://$stitle.co.za/users?yournickname to view your site, you can also change the colours (themes) of your
site to suit you likes<br/><br/>Updating your site has never been easier, simply login to your $stitle
account, then point your browser to CPanel, all the settings you need is found there<br/><br/>We are currently
working on making the Personal sites better with more features to keep you, the $stitle user, happy!<br/>
<br/>Enjoy $stitle.co.za<br/>";




  echo "</small></p>";
  echo "<p align=\"center\">";
  if($uid>0)
  {
  
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
}else{
    echo "<a href=\"index.php\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
}
  echo "</p>";
  echo xhtmlfoot();
}



else if($action=="logout")
{
  $uid =getuid_sid($sid);
  $whonick = getnick_uid($uid);
  addonline(getuid_sid($sid),"loddeg out - xHTML","index.php?action=$action");
$pstyle = gettheme($sid);
    echo xhtmlhead("Log Out",$pstyle);
  echo "<p>";
  echo "<b>$whonick</b> are you sure you want to log out?<br/><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/notok.gif\" alt=\"No\"/>";
  echo "No</a><br/>";
  echo "<a href=\"index.php?action=logoutyes&amp;sid=$sid\"><img src=\"images/ok.gif\" alt=\"Yes\"/>";
  echo "Yes</a>";
  echo "</p>";
  echo xhtmlfoot();
}
else if($action=="logoutyes")
{
  $uid =getuid_sid($sid);
  $whonick = getnick_uid($uid);
  addonline(getuid_sid($sid),"Wants to Log Out - xHTML","");
        $pstyle = gettheme($sid);
    echo xhtmlhead("Log Out",$pstyle);
  echo "<p align=\"center\">";
  echo "Good bye <b>$whonick</b><br/><br/>";
  echo "<small>Whe hope you had a great time here, and hope to see you soon</small>";
  $logoutses = sm_query("DELETE FROM ibwf_ses WHERE uid='".$uid."'");
  $logoutonline = sm_query("DELETE FROM ibwf_online WHERE userid='".$uid."'");
  echo "<br/><br/><a href=\"http://$stitle.co.za\"><img src=\"images/ok.gif\" alt=\"OK\"/>";
  echo "Click Here To Continue</a>";
  echo "</p>";
  echo xhtmlfoot();
}
//////////////////////////////////////////


/////////////////////////////////////////////////
else{

   $pstyle = gettheme1("1");
      echo xhtmlhead("$stitle",$pstyle);



echo "<h5>Srimobile</h5>";
/////////////////////////////////////////////////////////
 
  $pic = mysqli_fetch_array(sm_query("SELECT uid,image FROM ibwf_logo where permisson='1' ORDER BY RAND() LIMIT 1"));
$user2 = getnick_uid($pic[0]);
  $shad0w= isnum($_GET["id"]);
$user = getnick_uid($shad0w);
 echo "<center><img src=\"$pic[1]\" alt=\"*\"/><br/>By:$user2</center>";
 if ($user!="")
{
echo "<div class=\"ok\">You were invited to SriMoBILE by <b> $user</b></div>";

}

 
  ////////////////////////////////////////////
  dival();
  echo "<center>";
    echo "<b><u>Welcome to the National MOBILE Community</b></u><br/>";
  echo "Connect With All Mobile And PC Users In One Place<br/>";
echo "<a href=\"register.php?id=$shad0w\">Join With Us!!</a> And EnJoy Our SriMobile Community<br/>";
   echo"<br/><br/><b><u>Create New Account</b></u><br/><a href=\"register.php?id=$shad0w\">Register Now !!</a><br/><small><b>(Free Of Charge)</small></b>";
  echo "</center></div><br/>";
  
  

 // Optional ...


 div();
  echo "<center><b><u>Login To Account</b></u>";
  echo "<form method=\"get\" action=\"login.php\">";
  echo "<img src=\"images/user.gif\" alt=\"*\"/>UserName: <br/><input name=\"loguid\" format=\"*x\" maxlength=\"30\"/><br/>";
  echo "<img src=\"images/pass.gif\" alt=\"*\"/>Password: <br/><input type=\"password\" name=\"logpwd\"  maxlength=\"30\"/><br/>";
  echo "<input type=\"submit\" value=\"Log In\"/><br/>";
  echo "</form>";
  echo "<a href=\"pass.php?\">Forget Password Or Username!!</a> <br/>";
  
  
  echo "<small><b><u>(only Registered Users Only)</b></u></small></div>";
  echo "</center><br/><br/>";
  echo "<small>";
  
 
//$two_letter_country_code=iptocountry("61.245.173.144");

//echo country_name(iptocountry("61.245.173.144"));

//ipto();

  echo "<a href=\"index.php?action=terms&amp;sid=$sid\">Terms Of Use</a> | ";

  $norm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users"));
  echo "Members: <b>$norm[0]</b><br/>";
 $count = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='Counter'"));
 $coun =$count[0]+1;
 sm_query("UPDATE ibwf_settings SET value='".$coun."' WHERE name='Counter'");
 
 echo"Hits: <b>$coun</b>";

  echo "<br/></small>";
  echo "</p>";
  echo "<p align=\"center\">";

 echo "<small><b><u>Srimobile by:<br/>";
	echo "Damith priyankara";
echo "</b></u></small></p>";

  echo "<h5>$stitle 2012-".date("Y")."</h5>";

  echo xhtmlfoot();
}


?>
