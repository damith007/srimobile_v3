<?php
include("xhtmlfunctions.php");
/////SriMobile@Damith priyankara////////
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
?>

<?php
include("config.php");
include("core.php");
connectdb();
$action = $_GET["action"];
$sid = $_GET["sid"];
$page = $_GET["page"];
mylog($sid);
	if(!ismod(getuid_sid($sid)))
  {
   $pstyle = gettheme1("1");
      echo xhtmlhead("$stitle",$pstyle);
      echo "<p align=\"center\">";
      echo "You are not a mod<br/>";
      echo "<br/>";
      echo "<a href=\"index.php\">Home</a>";
      echo "</p>";
    echo xhtmlfoot();
      exit();
    }
    addonline(getuid_sid($sid),"Mod CP","");

   $pstyle = gettheme1("1");
      echo xhtmlhead("$stitle Mod CP",$pstyle);

if($action=="main")
{
   
   div();
    echo "<h2>Reports</h2>";
   
	 
	 echo "<b><a href=\"modcp.php?action=tops&amp;sid=$sid&amp;who=$who\">Top Staff Members in $stitle!</a></b><br/>";
	 $nop = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_logo WHERE permisson='0' "));
echo "<a href=\"modcp.php?action=logv&amp;sid=$sid\">validate logo ($nop[0])!</a><br/>";
	echo "<a href=\"modproc.php?action=mbrl&amp;sid=$sid\">Search by Ip!</a><br/>";
	  echo "<a href=\"modproc.php?action=4n&amp;sid=$sid\">Search by browser!</a><br/>";
	 	 $no = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE validated='0' "));

echo "<a href=\"modcp.php?action=validatelist&amp;sid=$sid&amp;who=$who\">waiting to Validate!!($no[0]) </a><br/>";
    $nrpm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE reported='1'"));
    echo "<a href=\"modcp.php?action=rpm&amp;sid=$sid\">&#187;Pr. Messages($nrpm[0])</a><br/>";
    $nrps = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_posts WHERE reported='1'"));
    echo "<a href=\"modcp.php?action=rps&amp;sid=$sid\">&#187;Posts($nrps[0])</a><br/>";
    $nrtp = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topics WHERE reported='1'"));
    echo "<a href=\"modcp.php?action=rtp&amp;sid=$sid\">&#187;Topics($nrtp[0])</a>";
    echo "</div>";
      div();
    echo "<h2>Logs</h2>";
 
    
    
$noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_mlog"));
    if($noi[0]>0){
    $nola = sm_query("SELECT DISTINCT (action)  FROM ibwf_mlog ORDER BY actdt DESC");

      while($act=mysqli_fetch_array($nola))
      {
        $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_mlog WHERE action='".$act[0]."'"));
        echo "<a href=\"modcp.php?action=log&amp;sid=$sid&amp;view=$act[0]\">$act[0]($noi[0])</a><br/>";
      }

    }
     echo "</div>";
  echo "<p align=\"center\">";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
   echo xhtmlfoot();
}


/////////////////////////////////top staff

else if($action=="tops")
{
    addonline(getuid_sid($sid),"Top Staff Members","");
    echo "<card id=\"main\" title=\"Top staff\">";
    echo "<p align=\"center\">";
    echo "<b>Top Staff members</b><br/>";
	echo "Here U can see Top Staff Members and their Staff points<br/> Dont be the last one in the list! lol";
    echo "</p>";
    //////ALL LISTS SCRIPT <<
    
        if($page=="" || $page<=0)$page=1;
    $num_items = regmemcount(); //changable
    $items_per_page= 11;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name, battlep FROM ibwf_users  ORDER BY battlep DESC LIMIT $limit_start, $items_per_page";

    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a> <small>Staff Points: $item[2]</small>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";

  ////// UNTILL HERE >>
    echo "<p align=\"center\">";

    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}


/////////////////////////////////Reported PMs

else if($action=="rpm")
{
  $page = $_GET["page"];
   
    echo "<p align=\"center\">";
    echo "<b>Reported PMs</b>";
    echo "</p>";
    echo "<p>";
    echo "<small>";
    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE reported ='1'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if($page>$num_pages)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;
    $sql = "SELECT id, text, byuid, touid, timesent FROM ibwf_private WHERE reported='1' ORDER BY timesent DESC LIMIT $limit_start, $items_per_page";
    $items = sm_query($sql);
    while ($item=mysqli_fetch_array($items))
    {
      $fromnk = getnick_uid($item[2]);
      $tonick = getnick_uid($item[3]);
      $dtop = date("d m y - H:i:s", $item[4]);
      $text = parsepm($item[1]);
      $flk = "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$item[2]\">$fromnk</a>";
      $tlk = "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$item[3]\">$tonick</a>";
      echo "From: $flk To: $tlk<br/>Time: $dtop<br/>";
       echo $text;
       echo "<br/>";
       echo "<a href=\"modproc.php?action=hpm&amp;sid=$sid&amp;pid=$item[0]\">Handle</a><br/><br/>";
    }
    echo "</small>";
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"modcp.php?action=$action&amp;page=$ppage&amp;sid=$sid\">&#171;PREV</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"modcp.php?action=$action&amp;page=$npage&amp;sid=$sid\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
    $rets = "<form action=\"modcp.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
        echo $rets;
    }
    echo "<br/><br/>";
    echo "<a href=\"modcp.php?action=main&amp;sid=$sid\">";
echo "Mod R/L</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
   echo xhtmlfoot();
}
else if($action=="validatelist")
{
addonline(getuid_sid($sid),"Staff Tools","");

echo "<p align=\"left\">";
echo "Dont be delay!! 1st <u>check user's Online time, Ip and details</u> ,then Validate him/her.<br/> After validate,plz send a Pm asking If she/he needs any help from u.<br/>** If u get any suspectable user,<br/>*if users ip begin with 124.43. or 58.<br/>*if users browser mozilla, opera, nokia6630 or fake browser<b> Dont't Validate him/her!</b><br/>, <u>*Delete </u> option works only for Admins.<br/>";

//////ALL LISTS SCRIPT <<
if($page=="" || $page<=0)$page=1;
$noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE validated='0'"));
$num_items = $noi[0]; //changable
$items_per_page= 10;
$num_pages = ceil($num_items/$items_per_page);
if(($page>$num_pages)&&$page!=1)$page= $num_pages;
$limit_start = ($page-1)*$items_per_page;

//changable sql

$sql = "SELECT id, name FROM ibwf_users WHERE validated='0' ORDER BY tottimeonl DESC LIMIT $limit_start, $items_per_page";


$items = sm_query($sql);

if(mysqli_num_rows($items)>0)
{
while ($item = mysqli_fetch_array($items))
{

$nopl = mysqli_fetch_array(sm_query("SELECT sex, birthday, location, tottimeonl FROM ibwf_users WHERE id='".$item[0]."'"));
$uage = getage($nopl[1]);
if($nopl[0]=='M')
{$usex = "Male";}else
if($nopl[0]=='F'){$usex = "Female";}
else{$usex = "DONT VALIDATE THIS User!!";}
$nopl[2] = htmlspecialchars($nopl[2]);

$lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]($uage/$usex/$nopl[2])</a>";

echo "$lnk ";
$num = $nopl[3]/86400;
$days = intval($num);
$num2 = ($num - $days)*24;
$hours = intval($num2);
$num3 = ($num2 - $hours)*60;
$mins = intval($num3);
$num4 = ($num3 - $mins)*60;
$secs = intval($num4);

echo " ";
if(($days==0) and ($hours==0) and ($mins==0)){
  echo "$secs s<br/>";
}else
if(($days==0) and ($hours==0)){
  echo "$mins m, ";
  echo "$secs s<br/>";
}else
if(($days==0)){
  echo "$hours h, ";
  echo "$mins m, ";
  echo "$secs s<br/>";
}else{
  echo "$days days, ";
  echo "$hours hours, ";
  echo "$mins mins, ";
  echo "$secs seconds<br/>";
}
}
}
echo "</p>";
echo "<p align=\"center\">";
if($page>1)
{
$ppage = $page-1;
echo "<a href=\"modcp.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">«Prev</a> ";
}
if($page<$num_pages)
{
$npage = $page+1;
echo "<a href=\"modcp.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next»</a>";
}
echo "<br/>$page/$num_pages<br/>";
if($num_pages>2)
{
  $rets = "<form action=\"modcp.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
        echo $rets;


}
echo "</p>";
echo "<p align=\"center\">";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"../images/home.gif\" alt=\"\"/>Home</a>";
echo "</p>";
echo xhtmlfoot();
}
/////////////////////////////////Reported Posts

else if($action=="rps")
{
  $page = $_GET["page"];
   
    echo "<p align=\"center\">";
    echo "<b>Reported Posts</b>";
    echo "</p>";
    echo "<p>";
    echo "<small>";
    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_posts WHERE reported ='1'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if($page>$num_pages)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;
    $sql = "SELECT id, text, tid, uid, dtpost FROM ibwf_posts WHERE reported='1' ORDER BY dtpost DESC LIMIT $limit_start, $items_per_page";
    $items = sm_query($sql);
    while ($item=mysqli_fetch_array($items))
    {
      $poster = getnick_uid($item[3]);
      $tname = htmlspecialchars(gettname($item[3]));
      $dtop = date("d m y - H:i:s", $item[4]);
      $text = parsemsg($item[1]);
      $flk = "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$item[3]\">$poster</a>";
      $tlk = "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$item[2]\">$tname</a>";
      echo "Poster: $flk<br/>In: $tlk<br/>Time: $dtop<br/>";
       echo $text;
       echo "<br/>";
       echo "<a href=\"modproc.php?action=hps&amp;sid=$sid&amp;pid=$item[0]\">Handle</a><br/><br/>";
    }
    echo "</small>";
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"modcp.php?action=$action&amp;page=$ppage&amp;sid=$sid\">&#171;PREV</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"modcp.php?action=$action&amp;page=$npage&amp;sid=$sid\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {

		
        $rets = "<form action=\"modcp.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
        echo $rets;
    }
    echo "<br/><br/>";
    echo "<a href=\"modcp.php?action=main&amp;sid=$sid\">";
echo "Mod R/L</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
   echo xhtmlfoot();
}

/////////////////////////////////Reported Posts

else if($action=="log")
{
  $page = $_GET["page"];
  $view = $_GET["view"];
   
    echo "<p align=\"center\">";
    echo "<b>$view</b>";
    echo "</p>";
    echo "<p>";
    echo "<small>";
    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_mlog WHERE  action='".$view."'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if($page>$num_pages)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;
    $sql = "SELECT  actdt, details FROM ibwf_mlog WHERE action='".$view."' ORDER BY actdt DESC LIMIT $limit_start, $items_per_page";
    $items = sm_query($sql);
    while ($item=mysqli_fetch_array($items))
    {
      
	  echo parsepm($item[1], $sid)."<br/>";
     echo "Time: ".date("d m y-h:i:A", $item[0])."<br/>";
   
       
    }
    echo "</small>";
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"modcp.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;PREV</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"modcp.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
		
    $rets = "<form action=\"modcp.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
         $rets .= "<input type=\"hidden\" name=\"view\" value=\"$view\"/>";
		$rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
  
        echo $rets;
    }
    echo "<br/><br/>";
    echo "<a href=\"modcp.php?action=main&amp;sid=$sid\">";
echo "Mod R/L</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo xhtmlfoot();
}

/////////////////////////////////Reported Topics

else if($action=="rtp")
{
  $page = $_GET["page"];
   
    echo "<p align=\"center\">";
    echo "<b>Reported Topics</b>";
    echo "</p>";
    echo "<p>";
    echo "<small>";
    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topics WHERE reported ='1'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if($page>$num_pages)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;
    $sql = "SELECT id, name, text, authorid, crdate FROM ibwf_topics WHERE reported='1' ORDER BY crdate DESC LIMIT $limit_start, $items_per_page";
    $items = sm_query($sql);
    while ($item=mysqli_fetch_array($items))
    {
      $poster = getnick_uid($item[3]);
      $tname = htmlspecialchars($item[1]);
      $dtop = date("d m y - H:i:s", $item[4]);
      $text = parsemsg($item[2]);
      $flk = "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$item[3]\">$poster</a>";
      $tlk = "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$item[0]\">$tname</a>";
      echo "Poster: $flk<br/>In: $tlk<br/>Time: $dtop<br/>";
       echo $text;
       echo "<br/>";
       echo "<a href=\"modproc.php?action=htp&amp;sid=$sid&amp;tid=$item[0]\">Handle</a><br/><br/>";
    }
    echo "</small>";
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"modcp.php?action=$action&amp;page=$ppage&amp;sid=$sid\">&#171;PREV</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"modcp.php?action=$action&amp;page=$npage&amp;sid=$sid\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
     $rets = "<form action=\"modcp.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        echo $rets;
    }
    echo "<br/><br/>";
    echo "<a href=\"modcp.php?action=main&amp;sid=$sid\">";
echo "Mod R/L</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
   echo xhtmlfoot();
}

///////////////////////////////////////////////Mod a user

else if($action=="user")
{
    $who = $_GET["who"];
   
    echo "<p align=\"center\">";
    $unick = getnick_uid($who);
    echo "<b>Moderating $unick</b>";
    echo "</p>";
    echo "<p>";
    echo "<a href=\"modcp.php?action=penopt&amp;sid=$sid&amp;who=$who\">&#187;Penalties</a><br/>";
    echo "<a href=\"modcp.php?action=plsopt&amp;sid=$sid&amp;who=$who\">&#187;Credits</a><br/><br/>";
	echo "<a href=\"modcp.php?action=cdsopt&amp;sid=$sid&amp;who=$who\">&#187;Bank Credits</a><br/><br/>";
    if(istrashed($who))
    {
      echo "<a href=\"modproc.php?action=untr&amp;sid=$sid&amp;who=$who\">&#187;Untrash</a><br/>";
    }
    if(isbanned($who))
    {
      echo "<a href=\"modproc.php?action=unbanArawaponley&amp;sid=$sid&amp;who=$who\">&#187;Unban</a><br/>";
    }
    if(!isshield($who))
    {
      echo "<a href=\"modproc.php?action=shld&amp;sid=$sid&amp;who=$who\">&#187;Shield</a><br/>";
    }else{
        echo "<a href=\"modproc.php?action=ushld&amp;sid=$sid&amp;who=$who\">&#187;Unshield</a><br/>";
    }
    echo "</p>";
    echo "<p align=\"center\">";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo xhtmlfoot();
}

//////////////////////////////////////Penalties Options

else if($action=="penopt")
{
    $who = $_GET["who"];
   
    echo "<p align=\"center\">";
    $unick = getnick_uid($who);
    echo "What do you want to do with $unick";
	echo "<br/>Dont Ip ban a user Without admins Permison.";
    echo "</p>";
    echo "<p>";

    
	
	  echo "<form action=\"modproc.php?action=punArawap1&amp;sid=$sid\" method=\"post\">";
	$pen[0]="Trash";
    $pen[1]="Ban";
    $pen[2]="Ban Ip";
    echo "Penalty: <select name=\"pid\">";
    for($i=0;$i<count($pen);$i++)
    {
      echo "<option value=\"$i\">$pen[$i]</option>";
    }
    echo "</select><br/>";
	  
	  
  echo "Reason: <input name=\"pres\" maxlength=\"100\"/><br/>";
  echo "Days: <input name=\"pds\" style=\"-wap-input-format: '*N'\" maxlength=\"4\"/><br/>";
  echo "Hours: <input name=\"phr\" style=\"-wap-input-format: '*N'\" maxlength=\"4\"/><br/>";
  echo "Minutes: <input name=\"pmn\" style=\"-wap-input-format: '*N'\" maxlength=\"2\"/><br/>";
  echo "Seconds: <input name=\"psc\" style=\"-wap-input-format: '*N'\" maxlength=\"2\"/><br/>";
  echo "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
  echo "<input type=\"Submit\" value=\"Ban\" Name=\"Submit\"/></form>";
	
	
	
	
	
	
	
	
	
	
     echo "<p align=\"center\">";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
   echo xhtmlfoot();
}

//////////////////////////////////////Penalties Options

else if($action=="plsopt")
{
    $who = $_GET["who"];
   
    echo "<p align=\"center\">";
    $unick = getnick_uid($who);
    echo "Add/Substract $unick's Credits";
    echo "</p>";
    echo "<p>";
  echo "<form action=\"modproc.php?action=pls&amp;sid=$sid\" method=\"post\">";
  $pen[0]="Substract";
  $pen[1]="Add";
  echo "Action: <select name=\"pid\">";
  for($i=0;$i<count($pen);$i++)
  {
  echo "<option value=\"$i\">$pen[$i]</option>";
  }
  echo "</select><br/>";
  echo "Reason: <input name=\"pres\" maxlength=\"100\"/><br/>";
  echo "Plusses: <input name=\"pval\" style=\"-wap-input-format: '*N'\" maxlength=\"3\"/><br/>";
  echo "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
  echo "<input type=\"Submit\" value=\"Edit User\" Name=\"Submit\"/></form>";
  
  echo "<br/><a accesskey=\"0\" href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"\"/>Home</a>";
  echo "</p></body>";  
  
  
  
}

else if($action=="cdsopt")
{
    $who = $_GET["who"];
   
    echo "<p align=\"center\">";
    $unick = getnick_uid($who);
    echo "Add/Substract $unick's bank Credits";
    echo "</p>";
    echo "<p>";


    echo "<form action=\"modproc.php?action=bnk&amp;sid=$sid\" method=\"post\">";
  $pen[0]="Substract";
  $pen[1]="Add";
  echo "Action: <select name=\"pid\">";
  for($i=0;$i<count($pen);$i++)
  {
  echo "<option value=\"$i\">$pen[$i]</option>";
  }
  echo "</select><br/>";
  echo "Reason: <input name=\"pres\" maxlength=\"100\"/><br/>";
  echo "Plusses: <input name=\"pval\" style=\"-wap-input-format: '*N'\" maxlength=\"3\"/><br/>";
  echo "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
  echo "<input type=\"Submit\" value=\"Edit User\" Name=\"Submit\"/></form>";
  
  echo "<br/><a accesskey=\"0\" href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"\"/>Home</a>";
  echo "</p></body>";
  echo xhtmlfoot();
}
//////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
else if($action=="logv")
{
 addonline(getuid_sid($sid),"manage logo","");
  div();
  echo "<small>";
  print'<h2>logo manage system</h2>';

    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_logo where permisson='0'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id,image,uid FROM ibwf_logo where permisson='0' ORDER BY time DESC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
   {
       $nameL = getnick_uid($item[2]);
        echo "<b><a href=\"index.php?action=viewuser&sid=$sid&who=$item[2]\">$nameL</A></b><br/><img src=\"$item[1]\" width=\"100\" height=\"100\" alt=\"LOGO\"/><br/>";
        echo "[[<a href=\"modproc.php?action=logov&sid=$sid&logoid=$item[0]&ac=add\">validate</a>]] |||";
           echo "[[<a href=\"modproc.php?action=logov&sid=$sid&logoid=$item[0]&ac=del\">delete</a>]]<hr/>";
	   echo "<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"?action=logv&page=$ppage&sid=$sid&view=$view\">&#171;PREV</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"?action=logv&page=$npage&sid=$sid&view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
        $rets = "<form action=\"modcp.php\" method=\"get\">";
        $rets .= "<input name=\"page\" style=\"-wap-input-format: '*N'\" size=\"2\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
        $rets .= "<input type=\"submit\" value=\"Go To Page\"/>";
        $rets .= "</form>";

        echo $rets;
    }
    echo "</div>";


     echo "<p align=\"center\">";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}




else{
   
  echo "<p align=\"center\">";
  echo "I don't know how did you get into here, but there's nothing to show<br/><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
 echo xhtmlfoot();
}
?>