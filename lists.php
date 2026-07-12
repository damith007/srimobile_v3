<?php
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
include("config.php");
include("core.php");
include("xhtmlfunctions.php");
connectdb();

$action = $_GET["action"];
$sid = $_GET["sid"];
$page = $_GET["page"];
mylog($sid);

$uid = getuid_sid($sid);




//////////////////////////////////Members List

if($action=="members")
{
    addonline(getuid_sid($sid),"Members List","");
    $view = $_GET["view"];
    if($view=="")$view="date";
    $pstyle = gettheme($sid);
      echo xhtmlhead("Members List",$pstyle);
    echo "<p align=\"center\">";
    echo "<img src=\"images/bdy.gif\" alt=\"*\"/><br/>";
    echo "<a href=\"lists.php?action=members&amp;view=name&amp;sid=$sid\">Order By Name</a><br/>";
    echo "<a href=\"lists.php?action=members&amp;view=date&amp;sid=$sid\">Order By Join Date</a><br/>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $num_items = regmemcount(); //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql
    if($view=="name")
    {
        $sql = "SELECT id, name, regdate FROM ibwf_users ORDER BY name LIMIT $limit_start, $items_per_page";
    }else{
        $sql = "SELECT id, name, regdate FROM ibwf_users ORDER BY regdate DESC LIMIT $limit_start, $items_per_page";
    }

    echo "<p>";
    $items = sm_query($sql);

    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      $jdt = date("d-m-y", $item[2]);
      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a> <small>joined: $jdt</small>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=members&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=members&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
        $rets = "<form action=\"lists.php\" method=\"get\">";
      $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
        $rets .= "<input type=\"hidden\" name=\"view\" value=\"$view\"/>";
        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
////////////////////////////////////////////
else if($action=="ref")
{
$who = $_GET["who"];
$uid = getuid_sid($sid);
  addonline(getuid_sid($sid),"Reffered users","");
   $pstyle = gettheme($sid);
      echo xhtmlhead("Reffered users",$pstyle);
  echo "<p align=\"left\">";

if($page=="" || $page<=0)$page=1;
$castigatori = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE ref='".$who."'"));
$num_items = $castigatori[0];
$items_per_page= 20;
$num_pages = ceil($num_items/$items_per_page);
if(($page>$num_pages)&&$page!=1)$page= $num_pages;
$limit_start = ($page-1)*$items_per_page;
$adusi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE ref='".$who."'"));
$nume = getnick_uid($who);
echo "<small>Users reffered by $nume :</small><br/>";
$sql = "SELECT id, regdate FROM ibwf_users WHERE ref='".$who."' ORDER BY id DESC LIMIT $limit_start, $items_per_page";
$items = sm_query($sql);
while ($item = mysqli_fetch_array($items))
{
$cou++;
$user = getnick_uid($item[0]);
$datainregistrare = "".date(d,$item[1]).".".date(m,$item[1]).".".date(y,$item[1])."";
$couw = $cou+($page-1)*$items_per_page;
$lnk = "<small>$couw)<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$user</a> ($datainregistrare)</small>";
echo "$lnk<br/>"; 
}

#pagini
if($page>1)
{
$ppage = $page-1;
echo "<small>«<a href=\"list.php?action=ref&amp;who=$who&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">PREV</a></small><br/> ";
}
if($page<$num_pages)
{
$npage = $page+1;
echo "<small>»<a href=\"list.php?action=ref&amp;who=$who&amp;page=$npage&amp;sid=$sid&amp;view=$view\">NEXT</a></small>";
}
   if($num_pages>2)
    {
        $rets = "<form action=\"lists.php\" method=\"get\">";
      $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
		$rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"hidden\" name=\"view\" value=\"$view\"/>";
        $rets .= "</form>";

        echo $rets;
    }


if ($adusi[0] == 0)
{
echo "No reffered users.<br/>";
}

      echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
  echo "</p><p align=\"center\">";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\">Main page</a>";
  echo "<br/><br/>(c) Cash(2010)";
  echo "</p>";
  echo xhtmlfoot();
}

else if($action=="slike")
{
    addonline(getuid_sid($sid),"Viwing Shout Like","");

$shid=isnum($_GET["shid"]);

   $pstyle = gettheme($sid);
      echo xhtmlhead("Shout Likes",$pstyle);
    //////ALL LISTS SCRIPT <<
 echo"<h5>Shout Likes</h5>";
 
 
    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_slike where shid='".$shid."'"));
  
	
	$num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;
/////////////////////////////////////////////////////////////////////
  $shout = mysqli_fetch_array(sm_query("SELECT shout, shouter,image  FROM ibwf_shouts WHERE id='".$shid."'"));
   echo "<div class=\"mblock1\"><h2>Original shout</h2><center>";
  ECHO "<u><a href=\"index.php?action=viewuser&who=$shout[1]&sid=$sid\">".getnick_uid($shout[1])."</a></u><small><br/>";
  if($shout[2]!==""){
   echo "<a href=\"$shout[2]\"><img src=\"$shout[2]\" alt=\"X\"/></a><br/>";
  }
  ECHO parsepm($shout[0],$sid)."<br/>
  Total Like:$noi[0]</small></center></div>";

    if($noi[0]==0){
	
	echo"NO One Like This Shout<br/>";
   echo "<a href=\"index.php?action=main&sid=$sid\"><img src=\"images/home.gif\" alt=\"\"/>Back To Home</a>";

    echo "</body>";
	EXIT();
	}
  
////////////////////////////////////////////////
    //changable sql

        $sql = "SELECT uid,time FROM ibwf_slike where shid='".$shid."' ORDER BY id ASC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
   {
   $tms= gettimemsg(time()-$item[1]);
   
$name= getnick_uid($item[0]);
  
 
	
	
	 $avatar=getavatar($item[0]);


		  echo "<table width=\"100%\" align=\"left\" border=\"0\"><tr>";
  
     echo "<td width=\"5%\">";
	
	 
	   	echo"<img src=\"$avatar\" width=\"60\" height=\"60\" alt=\"\" />";
	 
	  echo"</td>";
  echo "<td valign=\"top\" align=\"left\"><small>";
   echo"<a href=\"index.php?action=viewuser&who=$item[0]&sid=$sid\">$name</a><br/>";
    echo "<b>Member's ID: </b>$item[0]<br/>";
  $noi = mysqli_fetch_array(sm_query("SELECT lastact FROM ibwf_users WHERE id='".$who."'"));$var1 = date("His",$noi[0]);$var2 = time();$var21 = date("His",$var2);$var3 = $var21 - $var1;$var4 = date("s",$var3);echo "Idle: ";$remain = time() - $noi[0];$idle = gettimemsg($remain);echo "$idle<br/>";
   echo "Like Shout in<br/>".$tms." Ago<br/>";
	
	  echo"</small></td>";
	  
	  
	  
  echo"</tr>
</table><br/>";
	
	
	
	
	
	
	
	
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&page=$ppage&sid=$sid&view=$view\">&#171;PREV</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&page=$npage&sid=$sid&view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
        $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "<input name=\"page\" style=\"-wap-input-format: '*N'\" size=\"2\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
        $rets .= "<input type=\"submit\" value=\"Go To Page\"/>";
        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";

  echo "<a accesskey=\"0\" href=\"index.php?action=main&sid=$sid\"><img src=\"images/home.gif\" alt=\"\"/>Home</a>";
  echo "</p>";
    echo "</body>";

}










//////////////////////////////////Profile Moods

else if($action=="pmoods")
{
    addonline(getuid_sid($sid),"Viwing The Profile Moods List","");



   $pstyle = gettheme($sid);
      echo xhtmlhead("Profile Moods List",$pstyle);
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_profilemood"));
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, pmoodlink FROM ibwf_profilemood ORDER BY id DESC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
   {
   
   $item[1] = str_replace("../","",$item[1]);
   
        echo "<img src=\"$item[1]\" width=\"119\" height=\"30\" alt=\"Profile Moods\"/><br/>";
        echo "<a href=\"genproc.php?action=uppmoods&sid=$sid&pmoodid=$item[0]\">SELECT</a><br/>";
        echo "<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=pmoods&page=$ppage&sid=$sid&view=$view\">&#171;PREV</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=pmoods&page=$npage&sid=$sid&view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
        $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "<input name=\"page\" style=\"-wap-input-format: '*N'\" size=\"2\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
        $rets .= "<input type=\"submit\" value=\"Go To Page\"/>";
        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=cpanel&sid=$sid\">Settings</a><br/>";
  echo "<b>0 </b><a accesskey=\"0\" href=\"index.php?action=main&sid=$sid\"><img src=\"../images/home.gif\" alt=\"\"/>Home</a>";
  echo "</p>";
    echo "</body>";

}
//////////////////////////////////List users by IP

if($action=="byip")
{
    addonline(getuid_sid($sid),"Mods CP","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Mods CP",$pstyle);
    //////ALL LISTS SCRIPT <<
    $who = $_GET["who"];
    $whoinfo = mysqli_fetch_array(sm_query("SELECT ipadd, browserm FROM ibwf_users WHERE id='".$who."'"));
    if(ismod(getuid_sid($sid))){
    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE ipadd='".$whoinfo[0]."' AND browserm='".$whoinfo[1]."'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name FROM ibwf_users WHERE ipadd='".$whoinfo[0]."' AND browserm='".$whoinfo[1]."' ORDER BY name  LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);

    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
        $rets .= "<form action=\"lists.php\" method=\"get\">";
      $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
    }else{
      echo "<p align=\"center\">";
      echo "You can't view this list";
      echo "</p>";
    }
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

//////////////////////////////////Most Credits List

else if($action=="mostc")
{
    addonline(getuid_sid($sid),"Most Credits","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Most Credits",$pstyle);
    echo "<p align=\"center\">";
    echo "<b>Most Credits (Top Ten)</b>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<

        if($page=="" || $page<=0)$page=1;
    $num_items = regmemcount(); //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name, plusses FROM ibwf_users WHERE perm='0' ORDER BY plusses DESC LIMIT $limit_start, $items_per_page";

    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a> <small>Credits: $item[2]</small>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";

  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}


//////////////////////////////////Longest Online

else if($action=="longon")
{
    addonline(getuid_sid($sid),"Longest Online","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Longest Online",$pstyle);

    //////ALL LISTS SCRIPT <<
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE tottimeonl>'0'"));

    if($page=="" || $page<=0)$page=1;
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name, tottimeonl FROM ibwf_users WHERE tottimeonl>'0' ORDER BY tottimeonl DESC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

    $num = $item[2]/86400;
$days = intval($num);
$num2 = ($num - $days)*24;
$hours = intval($num2);
$num3 = ($num2 - $hours)*60;
$mins = intval($num3);
$num4 = ($num3 - $mins)*60;
$secs = intval($num4);


      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a>: <b>$days</b> days, <b>$hours</b> hours, <b>$mins</b> mins, <b>$secs</b> seconds";
      echo "<small>$lnk</small><br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=longon&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=longon&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
        $rets = "<form action=\"lists.php\" method=\"get\">";
      $rets .= "Jump to page: <input name=\"page\" format=\"*N\" size=\"3\"/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
        $rets .= "<input type=\"hidden\" name=\"view\" value=\"$view\"/>";
        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}




else if($action=="mquizm")
{
    addonline(getuid_sid($sid),"Quiz Masters","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Quiz Master",$pstyle);

    //////ALL LISTS SCRIPT <<
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE specialid='2'"));

    if($page=="" || $page<=0)$page=1;
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name, specialid FROM ibwf_users WHERE specialid='2' ORDER BY name LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=staff&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=staff&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
        $rets = "<form action=\"lists.php\" method=\"get\">";
      $rets .= "Jump to page: <input name=\"page\" format=\"*N\" size=\"3\"/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
        $rets .= "<input type=\"hidden\" name=\"view\" value=\"$view\"/>";
        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
//////////////////////////////////$stitle Prince and Princess

else if($action=="mpandps")
{
    addonline(getuid_sid($sid),"Prince and Princess","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Prince and Princess",$pstyle);

    //////ALL LISTS SCRIPT <<
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE specialid>'7'"));

    if($page=="" || $page<=0)$page=1;
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name, specialid FROM ibwf_users WHERE specialid>'7' ORDER BY name LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
        if($item[2]=='8')
        {
          $tit = "Prince!";
        }
        if($item[2]=='9')
        {
          $tit = "Princess!";
        }
      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a> <small>$tit</small>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=staff&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=staff&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
        $rets = "<form action=\"lists.php\" method=\"get\">";
      $rets .= "Jump to page: <input name=\"page\" format=\"*N\" size=\"3\"/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
        $rets .= "<input type=\"hidden\" name=\"view\" value=\"$view\"/>";
        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}


//////////////////////////////////Top Posters List


else if($action=="topp")
{
    addonline(getuid_sid($sid),"Top Posters","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Top Posters",$pstyle);
    echo "<p align=\"center\">";
    echo "<b>Our Top Posters</b><br/><small>Thank you all for keeping this site alive<br/>";
    $weekago = ((time() - $timeadjust)  );
    $weekago -= 7*24*60*60;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(DISTINCT uid) FROM ibwf_posts WHERE dtpost>'".$weekago."';"));
    echo "<a href=\"lists.php?action=tpweek&amp;sid=$sid\">This week($noi[0])</a><br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(DISTINCT uid)  FROM ibwf_posts ;"));
    echo "<a href=\"lists.php?action=tptime&amp;sid=$sid\">All the time($noi[0])</a></small><br/>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $num_items = regmemcount(); //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name, posts FROM ibwf_users ORDER BY posts DESC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a> <small>Posts: $item[2]</small>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=topp&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=topp&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
        $rets = "<form action=\"lists.php\" method=\"get\">";
      $rets .= "Jump to page: <input name=\"page\" format=\"*N\" size=\"3\"/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
        $rets .= "<input type=\"hidden\" name=\"view\" value=\"$view\"/>";
        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////Most online daily list

else if($action=="moto")
{
    addonline(getuid_sid($sid),"Daily Most Online","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Daily Most online",$pstyle);
    echo "<p align=\"center\">";
    echo "<small>Maximum number of users was online in the last 10 Days<br/>";


    echo "</small>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<







    //changable sql

        $sql = "SELECT ddt, dtm, ppl FROM ibwf_mpot ORDER BY id DESC LIMIT 10";


    echo "<p>";
    $items = sm_query($sql);

    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

      $lnk = "<small>$item[0]($item[1]) Members: $item[2]</small>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";


  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}


//////////////////////////////////Top Chatters

else if($action=="tchat")
{
    addonline(getuid_sid($sid),"Top Chatters","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Top Chatters",$pstyle);
    echo "<p align=\"center\">";
    echo "<b>Top Chatters</b>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $num_items = regmemcount(); //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name, chmsgs FROM ibwf_users ORDER BY chmsgs DESC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a> <small>Chat Posts: $item[2]</small>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=tchat&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=tchat&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
        $rets = "<form action=\"lists.php\" method=\"get\">";
      $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input name=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input name=\"hidden\" name=\"sid\" value=\"$sid\"/>";
        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////requists

else if($action=="reqs")
{
    addonline(getuid_sid($sid),"Requests List","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Requests",$pstyle);
    echo "<p align=\"center\">";
    global $max_buds;
    $uid = getuid_sid($sid);
    echo "<small>The following members want you to add them to your buddy list<br/>";
    $remp = $max_buds - getnbuds($uid);
    echo "you have <b>$remp</b> Places left</small>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $nor = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_buddies WHERE tid='".$uid."' AND agreed='0'"));
    $num_items = $nor[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT uid  FROM ibwf_buddies WHERE tid='".$uid."' AND agreed='0' ORDER BY reqdt DESC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
        $rnick = getnick_uid($item[0]);
      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$rnick</a>: <a href=\"genproc.php?action=bud&amp;who=$item[0]&amp;sid=$sid&amp;todo=add\">Accept</a>, <a href=\"genproc.php?action=bud&amp;who=$item[0]&amp;sid=$sid&amp;todo=del\">Decline</a>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
  $rets = "<form action=\"lists.php\" method=\"get\">";
      $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
         $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
         $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
         $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}




//////////////////////////////////shouts

else if($action=="shouts")
{
    addonline(getuid_sid($sid),"Shouts","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Shouts",$pstyle);
    $who = $_GET["who"];
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    if($who=="")
    {
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_shouts"));
    }else{
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_shouts WHERE shouter='".$who."'"));
    }
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql
    if($who =="")
    {
        $sql = "SELECT id, shout, shouter, shtime,image  FROM ibwf_shouts ORDER BY shtime DESC LIMIT $limit_start, $items_per_page";
}else{
    $sql = "SELECT id, shout, shouter, shtime,image  FROM ibwf_shouts  WHERE shouter='".$who."'ORDER BY shtime DESC LIMIT $limit_start, $items_per_page";
}

   div();
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
        $shnick = getnick_uid($item[2]);
        $sht = parsepm($item[1],$sid);
		
        $shdt = cashtime($item[3]);
		if($item[4]!==""){
		  $shimg="<a href=\"$item[4]\"><img src=\"$item[4]\" alt=\"O\"/></a><br/>";
		}
		else{
		  $shimg="";
		}

      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[2]&amp;sid=$sid\">$shnick</a>:$shimg $sht<br/>$shdt";
	  
	    $likeimg="<img src=\"images/like.png\" alt=\"O\"/>";

  $slike = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_slike WHERE shid='".$item[0]."'"));
  if($slike[0]==0){
  $like="0";
  }else{
   $like="<a href=\"lists.php?action=slike&amp;sid=$sid&amp;shid=$item[0]\">$slike[0]</a>";
  }
  
  $slike = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_slike WHERE uid='".$uid."' AND shid='".$item[0]."'"));
if($slike[0]==0){
 echo "$lnk <br>$likeimg <a href=\"genproc.php?action=likeshout&amp;sid=$sid&amp;shid=$item[0]\">Like</a> [$like]";
 }else{
 echo "$lnk <br>$likeimg Like [$like]";
 }
 
 /////////////////////////////////////////////////////////////
     $retsk = "<form action=\"genproc.php?action=shout&amp;sid=$sid\" method=\"post\">";
      $retsk .= "<input type=\"hidden\" name=\"shtxt\" value=\"$item[1]\"/>";
		   $retsk .= "<input type=\"submit\" value=\"Re Shout\"/>";
         $retsk .= "</form>";
 
 
 
 ///////////////////////////////////
 
	  
      if(ismod(getuid_sid($sid)))
      {
      $dlsh = "<a href=\"modproc.php?action=delsh&amp;sid=$sid&amp;shid=$item[0]\">[x]</a>";
      }else{
        $dlsh = "";
      }
      echo "$dlsh <br/>$retsk <hr/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
	 echo "<a href=\"lists.php?action=shouts&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">&#171;Prev</a> ";
	 }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=shouts&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next&#187;</a>";
   }
////////////////////////////////////
 echo "<br/>";

for ($i=1; $i<=5; $i++)
  {
  if($i==1){
  if($page==$i){
  echo "First ";
  }else{
echo "<a href=\"lists.php?action=shouts&amp;page=$i&amp;sid=$sid&amp;who=$who\">First</a> ";
}
 }else{
 
 
  echo "The number is " . $i . "<br />";
  }
  }

/////////////////////////////////////////	
	

	
	
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
  $rets = "<form action=\"lists.php\" method=\"get\">";
      $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
         $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
         $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
         $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
         $rets .= "</form>";

        echo $rets;
    }
    echo "</div>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}


//////////////////////////////////User Clubs

else if($action=="ucl")
{
    addonline(getuid_sid($sid),"User Clubs","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("User Clubs",$pstyle);
    $who = $_GET["who"];
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubs WHERE owner='".$who."'"));

    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

    $sql = "SELECT id  FROM ibwf_clubs  WHERE owner='".$who."' ORDER BY id LIMIT $limit_start, $items_per_page";


    echo "<p><small>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
        $nom = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubmembers WHERE clid='".$item[0]."' AND accepted='1'"));
		$clinfo = mysqli_fetch_array(sm_query("SELECT name, description FROM ibwf_clubs WHERE id='".$item[0]."'"));
      $lnk = "<a href=\"index.php?action=gocl&amp;clid=$item[0]&amp;sid=$sid\">".htmlspecialchars($clinfo[0])."</a>($nom[0])<br/>".htmlspecialchars($clinfo[1])."<br/>";
      echo $lnk;
    }
    }
    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next&#187;</a>";
    }
    if($num_pages>1){
    echo "<br/>$page/$num_pages<br/>";
    }
    if($num_pages>2)
    {
 $rets = "<form action=\"lists.php\" method=\"get\">";
      $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";

 $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";

 $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";

 $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    $whonick = getnick_uid($who);
    echo "<a href=\"index.php?action=viewuser&amp;who=$who&amp;sid=$sid\">$whonick's Profile</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}


//////////////////////////////////User Clubs

else if($action=="clm")
{
    addonline(getuid_sid($sid),"Viewing Member's Club","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Clubs Of A Users",$pstyle);
    $who = $_GET["who"];
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubmembers WHERE uid='".$who."' AND accepted='1'"));

    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

    $sql = "SELECT  clid  FROM ibwf_clubmembers  WHERE uid='".$who."' AND accepted='1' ORDER BY joined DESC  LIMIT $limit_start, $items_per_page";


    echo "<p><small>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
        $clnm = mysqli_fetch_array(sm_query("SELECT name FROM ibwf_clubs WHERE id='".$item[0]."'"));
      $lnk = "<a href=\"index.php?action=gocl&amp;clid=$item[0]&amp;sid=$sid\">".htmlspecialchars($clnm[0])."</a><br/>";
      echo $lnk;
    }
    }
    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next&#187;</a>";
    }
    if($num_pages>1){
    echo "<br/>$page/$num_pages<br/>";
    }
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    $whonick = getnick_uid($who);
    echo "<a href=\"index.php?action=viewuser&amp;who=$who&amp;sid=$sid\">$whonick's Profile</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////Popular clubs

else if($action=="pclb")
{
    addonline(getuid_sid($sid),"Popular Clubs","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Popular Clubs",$pstyle);
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubs"));

    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

    $sql = "SELECT clid, COUNT(*) as notl FROM ibwf_clubmembers WHERE accepted='1' GROUP BY clid ORDER BY notl DESC LIMIT $limit_start, $items_per_page";


    echo "<p><small>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
        $clnm = mysqli_fetch_array(sm_query("SELECT name, description FROM ibwf_clubs WHERE id='".$item[0]."'"));

      $lnk = "<a href=\"index.php?action=gocl&amp;clid=$item[0]&amp;sid=$sid\">".htmlspecialchars($clnm[0])."</a>($item[1])<br/>".htmlspecialchars($clnm[1])."<br/>";
      echo $lnk;
    }
    }
    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next&#187;</a>";
    }
    if($num_pages>1){
    echo "<br/>$page/$num_pages<br/>";
    }
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=clmenu&amp;sid=$sid\">Clubs Menu</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////Active clubs

else if($action=="aclb")
{
    addonline(getuid_sid($sid),"Active Clubs","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Active Clubs",$pstyle);
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubs"));

    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

    $sql = "SELECT COUNT(*) as notp, b.clubid FROM ibwf_topics a INNER JOIN ibwf_forums b ON a.fid = b.id WHERE b.clubid >'0'  GROUP BY b.clubid ORDER BY notp DESC LIMIT $limit_start, $items_per_page";


    echo "<p><small>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
        $clnm = mysqli_fetch_array(sm_query("SELECT name, description FROM ibwf_clubs WHERE id='".$item[1]."'"));

      $lnk = "<a href=\"index.php?action=gocl&amp;clid=$item[1]&amp;sid=$sid\">".htmlspecialchars($clnm[0])."</a>($item[0] Topics)<br/>".htmlspecialchars($clnm[1])."<br/>";
      echo $lnk;
    }
    }
    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next&#187;</a>";
    }
    if($num_pages>1){
    echo "<br/>$page/$num_pages<br/>";
    }
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=clmenu&amp;sid=$sid\">Clubs Menu</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////Random clubs

else if($action=="rclb")
{
    addonline(getuid_sid($sid),"Random Clubs","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Random Clubs",$pstyle);
    //////ALL LISTS SCRIPT <<

    $sql = "SELECT id, name, description FROM ibwf_clubs ORDER BY RAND()  LIMIT 5";


    echo "<p><small>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

      $lnk = "<a href=\"index.php?action=gocl&amp;clid=$item[0]&amp;sid=$sid\">".htmlspecialchars($item[1])."</a><br/>".htmlspecialchars($item[2])."<br/>";
      echo $lnk;
    }
    }
    echo "</small></p>";


  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=clmenu&amp;sid=$sid\">Clubs Menu</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}
//////////////////////////////////shouts

else if($action=="annc")
{
    addonline(getuid_sid($sid),"Announcements","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Annoucements",$pstyle);
    $clid = $_GET["clid"];
    //////ALL LISTS SCRIPT <<
    $uid = getuid_sid($sid);
    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_announcements WHERE clid='".$clid."'"));

    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql
        $sql = "SELECT id, antext, antime  FROM ibwf_announcements WHERE clid='".$clid."' ORDER BY antime DESC LIMIT $limit_start, $items_per_page";

    $cow = mysqli_fetch_array(sm_query("SELECT owner FROM ibwf_clubs WHERE id='".$clid."'"));
    echo "<p><small>";
    $items = sm_query($sql);
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      if($cow[0]==$uid)
      {
      $dlan = "<a href=\"genproc.php?action=delan&amp;sid=$sid&amp;anid=$item[0]&amp;clid=$clid\">[x]</a>";
      }else{
        $dlan = "";
      }
      $annc = htmlspecialchars($item[1])."<br/>".date("d/m/y (H:i)", $item[2]);
      echo "$annc $dlan<br/>";
    }
    }
    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;clid=$clid\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;clid=$clid\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"clid\" value=\"$clid\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    if($cow[0]==$uid)
      {
      $dlan = "<a href=\"index.php?action=annc&amp;sid=$sid&amp;clid=$clid\">Announce!</a><br/><br/>";
      echo $dlan;
      }
    echo "<a href=\"index.php?action=gocl&amp;sid=$sid&amp;clid=$clid\">";
echo "Back to club</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}
//////////////////////////////////clubs requests

else if($action=="clreq")
{
    addonline(getuid_sid($sid),"Club Requests","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Club Requests",$pstyle);
    $clid = $_GET["clid"];
    $uid = getuid_sid($sid);
    $cowner = mysqli_fetch_array(sm_query("SELECT owner FROM ibwf_clubs WHERE id='".$clid."'"));
    //////ALL LISTS SCRIPT <<
    if($cowner[0]==$uid)
    {
    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubmembers WHERE clid='".$clid."' AND accepted='0'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql
        $sql = "SELECT uid  FROM ibwf_clubmembers WHERE clid='".$clid."' AND accepted='0' ORDER BY joined DESC LIMIT $limit_start, $items_per_page";
    echo "<p><small>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
        $shnick = getnick_uid($item[0]);
      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$shnick</a>: <a href=\"genproc.php?action=acm&amp;who=$item[0]&amp;sid=$sid&amp;clid=$clid\">accept</a>, <a href=\"genproc.php?action=dcm&amp;who=$item[0]&amp;sid=$sid&amp;clid=$clid\">deny</a><br/>";
      echo "$lnk";
    }
    }
    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;clid=$clid\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;clid=$clid\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"clid\" value=\"$clid\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
	echo "<br/><br/><a href=\"genproc.php?action=accall&amp;clid=$clid&amp;sid=$sid\">Accept All</a>, ";
	echo "<a href=\"genproc.php?action=denall&amp;clid=$clid&amp;sid=$sid\">Deny All</a>";
    echo "</p>";
    }else{
      echo "<p align=\"center\">This club isnt yours</p>";
    }
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=gocl&amp;sid=$sid&amp;clid=$clid\">";
echo "Back to club</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////clubs members

else if($action=="clmem")
{
    addonline(getuid_sid($sid),"Club Members","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Club Members",$pstyle);
    $clid = $_GET["clid"];
    $uid = getuid_sid($sid);
    $cowner = mysqli_fetch_array(sm_query("SELECT owner FROM ibwf_clubs WHERE id='".$clid."'"));
    //////ALL LISTS SCRIPT <<
    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_clubmembers WHERE clid='".$clid."' AND accepted='1'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql
        $sql = "SELECT uid, joined, points  FROM ibwf_clubmembers WHERE clid='".$clid."' AND accepted='1' ORDER BY joined DESC LIMIT $limit_start, $items_per_page";
    echo "<p><small>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      if($cowner[0]==$uid)
      {
        $oop = ": <a href=\"index.php?action=clmop&amp;sid=$sid&amp;who=$item[0]&amp;clid=$clid\">Options</a>";
      }else{
        $oop = "";
      }
        $shnick = getnick_uid($item[0]);
      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$shnick</a>$oop<br/>";
      $lnk .= "Joined: ".date("d/m/y", $item[1])." - Club Points: $item[2]";

      echo "$lnk<br/>";
    }
    }
    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;clid=$clid\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;clid=$clid\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"clid\" value=\"$clid\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";

  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=gocl&amp;sid=$sid&amp;clid=$clid\">";
echo "Back to club</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}


//////////////////////////////////User topics

else if($action=="tbuid")
{
  $who = $_GET["who"];
    addonline(getuid_sid($sid),"User Topics","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("User Topics",$pstyle);

    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_topics WHERE authorid='".$who."'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

    $sql = "SELECT id, name, crdate  FROM ibwf_topics  WHERE authorid='".$who."'ORDER BY crdate DESC LIMIT $limit_start, $items_per_page";


    echo "<p><small>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      if(canaccess(getuid_sid($sid),getfid_tid($item[0])))
      {
        echo "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$item[0]\">".htmlspecialchars($item[1])."</a> <small>".date("d m y-H:i:s",$item[2])."</small><br/>";
        }else{
          echo "Private Topic<br/>";
        }
    }
    }
    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    $unick = getnick_uid($who);
    echo "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$who\">";
echo "$unick's Profile</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}
////////////////////////////User Popup(owner)

else if($action=="readpopup")
{$pstyle = gettheme($sid);
      echo xhtmlhead("Inbox",$pstyle);
boxstart("Posts Per Page");
  $who = $_GET["who"];
    addonline(getuid_sid($sid),"Owner Tools","");
if(!isowner(getuid_sid($sid)))
  {
      boxstart("Error!");
      echo "<p align=\"center\">";
      echo "You are not an owner<br/>";
      echo "<br/>";
      echo "<a href=\"index.php\">Home</a>";
      echo "</p>";
 
    }else{

    
    $uid = getuid_sid($sid);
    if($page=="" || $page<=0)$page=1;
    $myid = getuid_sid($sid);
    $pms = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_popup WHERE byuid=$who ORDER BY id"));
    
    $num_items = $pms[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if($page>$num_pages)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;
    if($num_items>0)
    {
      echo "<p>";
      $pms = sm_query("SELECT byuid, touid, text, timesent FROM ibwf_popup WHERE byuid=$who ORDER BY id LIMIT $limit_start, $items_per_page");
      while($pm=mysqli_fetch_array($pms))
      {
            if(isonline($pm[0]))
  {
    $onlby = "<img src=\"../images/onl.gif\" alt=\"+\"/>";
  }else{
    $onlby = "<img src=\"../images/ofl.gif\" alt=\"-\"/>";
  }
            if(isonline($pm[1]))
  {
    $onlto = "<img src=\"../images/onl.gif\" alt=\"+\"/>";
  }else{
    $onlto = "<img src=\"../images/ofl.gif\" alt=\"-\"/>";
  }
  $bylnk = "<a href=\"index.php?action=viewuser&amp;who=$pm[0]&amp;sid=$sid\">$onlby".getnick_uid($pm[0])."</a>";
  $tolnk = "<a href=\"index.php?action=viewuser&amp;who=$pm[1]&amp;sid=$sid\">$onlto".getnick_uid($pm[1])."</a>";
  echo "$bylnk <img src=\"../moods/in.gif\" alt=\"-\"/> $tolnk";
  $tmopm = date("d m y - h:i:s",$pm[3]);
  echo " $tmopm<br/>";
  echo parsepm($pm[2], $sid);
  echo "<br/>--------------<br/>";
      }
      echo "</p><p align=\"center\">";
      if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=readmsgs&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=readmsgs&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
    $rets = "<form action=\"lists.php\" method=\"get\">";
      $rets .= "<input name=\"page\" style=\"-wap-input-format: '*N'\" size=\"2\"/>";
      $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\">";
      $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\">";
      $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\">";
      $rets .= "<input type=\"Submit\" name=\"Submit\" Value=\"Go To Page\"></form>";
      echo $rets;
      }
      }else{
        echo "<p align=\"center\">";
        echo "NO DATA";
      }
    echo "<p align=\"center\">";
    $unick = getnick_uid($who);
    echo "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$who\">$whonick's Profile</a><br/>";

    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";


}
}

//////////////////////////////////User Inboxes(owner)

else if($action=="readmsgs")
{$pstyle = gettheme($sid);
      echo xhtmlhead("Inbox",$pstyle);
boxstart("Posts Per Page");
  $who = $_GET["who"];
    addonline(getuid_sid($sid),"Owner Tools","");
if(!isowner(getuid_sid($sid)))
  {
      boxstart("Error!");
      echo "<p align=\"center\">";
      echo "You are not an owner<br/>";
      echo "<br/>";
      echo "<a href=\"index.php\">Home</a>";
      echo "</p>";
      boxend();
    }else{

      boxstart("Reading Inbox!");
    $uid = getuid_sid($sid);
    if($page=="" || $page<=0)$page=1;
    $myid = getuid_sid($sid);
    $pms = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE byuid=$who ORDER BY timesent"));
    
    $num_items = $pms[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if($page>$num_pages)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;
    if($num_items>0)
    {
      echo "<p>";
      $pms = sm_query("SELECT byuid, touid, text, timesent FROM ibwf_private WHERE byuid=$who ORDER BY timesent LIMIT $limit_start, $items_per_page");
      while($pm=mysqli_fetch_array($pms))
      {
            if(isonline($pm[0]))
  {
    $onlby = "<img src=\"../images/onl.gif\" alt=\"+\"/>";
  }else{
    $onlby = "<img src=\"../images/ofl.gif\" alt=\"-\"/>";
  }
            if(isonline($pm[1]))
  {
    $onlto = "<img src=\"../images/onl.gif\" alt=\"+\"/>";
  }else{
    $onlto = "<img src=\"../images/ofl.gif\" alt=\"-\"/>";
  }
  $bylnk = "<a href=\"index.php?action=viewuser&amp;who=$pm[0]&amp;sid=$sid\">$onlby".getnick_uid($pm[0])."</a>";
  $tolnk = "<a href=\"index.php?action=viewuser&amp;who=$pm[1]&amp;sid=$sid\">$onlto".getnick_uid($pm[1])."</a>";
  echo "$bylnk <img src=\"../moods/in.gif\" alt=\"-\"/> $tolnk";
  $tmopm = date("d m y - h:i:s",$pm[3]);
  echo " $tmopm<br/>";
  echo parsepm($pm[2], $sid);
  echo "<br/>--------------<br/>";
      }
      echo "</p><p align=\"center\">";
      if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=readmsgs&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=readmsgs&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
	$rets = "<form action=\"lists.php\" method=\"get\">";
      $rets .= "<input name=\"page\" style=\"-wap-input-format: '*N'\" size=\"2\"/>";
      $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\">";
      $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\">";
      $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\">";
      $rets .= "<input type=\"Submit\" name=\"Submit\" Value=\"Go To Page\"></form>";
      echo $rets;
      }
      }else{
        echo "<p align=\"center\">";
        echo "NO DATA";
      }
    echo "<p align=\"center\">";
    $unick = getnick_uid($who);
    echo "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$who\">$whonick's Profile</a><br/>";
 boxend();
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
    boxend();

}
}
//////////////////////////////////User topics

else if($action=="uposts")
{
  $who = $_GET["who"];
    addonline(getuid_sid($sid),"User Posts","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("User Posts",$pstyle);

    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_posts WHERE uid='".$who."'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

    $sql = "SELECT id, dtpost  FROM ibwf_posts  WHERE uid='".$who."'ORDER BY dtpost DESC LIMIT $limit_start, $items_per_page";


    echo "<p><small>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      $tid = gettid_pid($item[0]);
      $tname = gettname($tid);
      if(canaccess(getuid_sid($sid),getfid_tid($tid)))
      {
        echo "<a href=\"index.php?action=viewtpc&amp;sid=$sid&amp;tid=$tid&amp;go=$item[0]\">".htmlspecialchars($tname)."</a> <small>".date("d m y-H:i:s",$item[1])."</small><br/>";
        }else{
          echo "Private Post<br/>";
        }
    }
    }
    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>

    echo "<p align=\"center\">";
    $unick = getnick_uid($who);
    echo "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$who\">";
echo "$unick's Profile</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////Top Gammers

else if($action=="tgame")
{
    addonline(getuid_sid($sid),"Top Gammers","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Top Gammers",$pstyle);
    echo "<p align=\"center\">";
    echo "<b>Top Gammers</b>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $num_items = regmemcount(); //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name, gplus FROM ibwf_users ORDER BY gplus DESC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a> <small>Game Credits: $item[2]</small>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=tgame&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=tgame&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////Top Gammers

else if($action=="topb")
{
    addonline(getuid_sid($sid),"Top Battlers","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Top Battlers",$pstyle);
    echo "<p align=\"center\">";
    echo "<b>Top Battlers</b>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $num_items = regmemcount(); //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name, battlep FROM ibwf_users ORDER BY battlep DESC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a> <small>Battle Points: $item[2]</small>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=topb&amp;page=$ppage&amp;sid=$sid\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=topb&amp;page=$npage&amp;sid=$sid\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}


//////////////////////////////////Banned

else if($action=="banned")
{
    addonline(getuid_sid($sid),"Banned List","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Bammed List",$pstyle);
    echo "<p align=\"center\">";
    echo "<b>Banned List</b>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_penalties WHERE penalty='1' OR penalty='2'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT uid, penalty, pnreas, exid FROM ibwf_penalties WHERE penalty='1' OR penalty='2' ORDER BY timeto LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">".getnick_uid($item[0])."</a> (".htmlspecialchars($item[2]).")";
      if($item[1]=="1")
      {
        $bt = "Normal Ban";
      }else{
        $bt = "IP Ban";
      }
      if(ismod(getuid_sid($sid)))
      {
        $bym = "By ".getnick_uid($item[3]);
      }else{
        $bym = "";
      }
      echo "<small>$lnk $bt $bym</small><br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=banned&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=banned&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////Trashed

else if($action=="trashed")
{
    addonline(getuid_sid($sid),"Trashed List","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Trashed List",$pstyle);
    echo "<p align=\"center\">";
    echo "<b>Trashed List</b>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<
    if(ismod(getuid_sid($sid)))
    {
    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_penalties WHERE penalty='0'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT uid, penalty, pnreas, exid FROM ibwf_penalties WHERE penalty='0' ORDER BY timeto LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">".getnick_uid($item[0])."</a> (".htmlspecialchars($item[2]).")";
      if(ismod(getuid_sid($sid)))
      {
        $bym = "By ".getnick_uid($item[3]);
      }else{
        $bym = "";
      }
      echo "<small>$lnk $bym</small><br/>";
    }
  }
  }else{
    echo "You can't view this list";
  }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=trashed&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=trashed&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////Trashed

else if($action=="ipban")
{
    addonline(getuid_sid($sid),"Banned IPs List","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Banned IPs List",$pstyle);

    echo "<p align=\"center\">";
    echo "<b>Banned IP's List</b>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<
    if(ismod(getuid_sid($sid)))
    {
    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_penalties WHERE penalty='2'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT uid, penalty, pnreas, exid, ipadd FROM ibwf_penalties WHERE penalty='2' ORDER BY timeto LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">".getnick_uid($item[0])."</a> (".htmlspecialchars($item[2]).")";
      if(ismod(getuid_sid($sid)))
      {
        $bym = "By ".getnick_uid($item[3]);
      }else{
        $bym = "";
      }
      $ipl = "IP:<a href=\"lists.php?action=byip&amp;sid=$sid&amp;who=$item[0]\">$item[4]</a>";
      echo "<small>$lnk $bym ($ipl)</small><br/>";
    }
  }
  }else{
    echo "You can't view this list";
  }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}
//////////////////////////////////Smilies :)
else if($action=="smilies")
{
    addonline(getuid_sid($sid),"Smilies List","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Smilies List",$pstyle);
	  
$noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_smilies where cat='1' and hidden='0'"));
echo "<a href=\"?action=smilie&amp;sid=$sid&amp;cat=english\">English</a>($noi[0])<br/>";
 $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_smilies where cat='2' and hidden='0'"));
echo "<a href=\"?action=smilie&amp;sid=$sid&amp;cat=sinhala\">Sinhala</a>($noi[0])<br/>";
 $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_smilies where cat='0' and hidden='1'"));

 echo "<a href=\"?action=smilie&amp;sid=$sid&amp;cat=adults\">Adults</a>($noi[0])<br/>";

    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=chat&amp;sid=$sid\">";
echo "Chatrooms</a><br/>";
    echo "<a href=\"index.php?action=cpanel&amp;sid=$sid\">";
echo "CPanel</a><br/>";
    
     echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();

}

else if($action=="smilie")
{
    addonline(getuid_sid($sid),"Smilies List","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Smilies List",$pstyle);
	  $cat = $_GET["cat"];  
	  
if($cat=="english"){
 $catx = "1"; 
 $hide = "0"; 
}
if($cat=="sinhala"){
 $catx = "2"; 
 $hide = "0"; 
}
if($cat=="adults"){
 $catx = "0"; 
 $hide = "1"; 
}

    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_smilies where cat='".$catx."' and hidden='".$hide."'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, scode, imgsrc FROM ibwf_smilies WHERE cat='".$catx."' and hidden='".$hide."' ORDER BY id DESC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);

    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
   {
		if(isadmin(getuid_sid($sid)))
		{
			$delsl = "<a href=\"admproc.php?action=delsm&amp;sid=$sid&amp;smid=$item[0]\">[x]</a>";
		}else{
			$delsl = "";
		}
        echo "$item[1] &#187; ";
        echo "<img src=\"$item[2]\" alt=\"$item[1]\"/> $delsl<br/>";
     
   }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=smilie&amp;page=$ppage&amp;sid=$sid&amp;view=$view&amp;cat=$cat\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=smilie&amp;page=$npage&amp;sid=$sid&amp;view=$view&amp;cat=$cat\">Next&#187;</a>";
    }
	

    echo "<br/>$page/$num_pages<br/>";
	
	
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
     $rets .= "<input type=\"hidden\" name=\"cat\" value=\"$cat\"/>";
        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=cpanel&amp;sid=$sid\">";
echo "CPanel</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////Moods :)

else if($action=="chmood")
{
    addonline(getuid_sid($sid),"Moods List","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Moods List",$pstyle);


    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_moods"));
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT text, img, dscr, id FROM ibwf_moods ORDER BY id DESC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
   {
        echo "<small><a href=\"genproc.php?action=upcm&amp;sid=$sid&amp;cmid=$item[3]\">$item[0]</a> &#187; ";
        echo "<img src=\"$item[1]\" alt=\"$item[0]\"/> &#187; $item[2] </small><br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    echo "<a href=\"genproc.php?action=upcm&amp;sid=$sid&amp;cmid=0\">Disable Chatmood</a><br/><br/>";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=chmood&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=chmood&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=chat&amp;sid=$sid\">";
echo "Chatrooms</a><br/>";
    echo "<a href=\"index.php?action=cpanel&amp;sid=$sid\">";
echo "CPanel</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////Avatars

else if($action=="avatars")
{
    addonline(getuid_sid($sid),"Avatars List","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Avatars List",$pstyle);


    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_avatars"));
    $num_items = $noi[0]; //changable
    $items_per_page= 2;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, avlink FROM ibwf_avatars ORDER BY id DESC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
   {
        echo "<img src=\"$item[1]\" alt=\"avatar\"/><br/>";
        echo "<a href=\"genproc.php?action=upav&amp;sid=$sid&amp;avid=$item[0]\">SELECT</a><br/>";
        echo "<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=avatars&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=avatars&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=cpanel&amp;sid=$sid\">";
echo "CPanel</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////E-cards

else if($action=="ecards")
{
    addonline(getuid_sid($sid),"E-Cards List","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("E-Cards List",$pstyle);


    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_cards"));
    $num_items = $noi[0]; //changable
    $items_per_page= 2;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id FROM ibwf_cards ORDER BY id DESC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
   {

		
		$msg = "SriMobile.Net";
        echo "<img src=\"pmcard.php?cid=$item[0]&amp;msg=$msg\" alt=\"$item[0]\"/><br/>";
        echo "<small>[card=$item[0]]$msg"."[/card]</small>";
        echo "<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=cpanel&amp;sid=$sid\">";
echo "CPanel</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////Buddies

else if($action=="buds")
{
    addonline(getuid_sid($sid),"Buddies List","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Buddies",$pstyle);
echo"<h5>Frinds List</h5>";
    $uid = getuid_sid($sid);
    echo "<p align=\"center\">";
    echo "<u><b>Your Buddy Message</b></u><br/>";
  
	if(getbudmsg($uid)==""){
	echo"Empty Your Buddy Message";
	}else{
	echo parsemsg(getbudmsg($uid), $sid);
	
	}
	
	
  echo "<br/><a href=\"index.php?action=chbmsg&amp;sid=$sid\">";
echo "Add Buddy Message</a><br/>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $num_items = getnbuds($uid); //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

        $sql = "SELECT a.lastact, a.name, a.id, b.uid, b.tid, b.reqdt FROM ibwf_users a INNER JOIN ibwf_buddies b ON (a.id = b.uid) OR (a.id=b.tid) WHERE (b.uid='".$uid."' OR b.tid='".$uid."') AND b.agreed='1' GROUP BY 2,1  ORDER BY a.lastact DESC LIMIT $limit_start, $items_per_page";


 div();
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
        if($uid!=$item[2])
        {
          if(isonline($item[2]))
  {
    $iml = "<img src=\"images/onl.gif\" alt=\"+\"/>(Online)";
    $uact = "<b><u>WHERE:</b></u> <br/>";
    $plc = mysqli_fetch_array(sm_query("SELECT place FROM ibwf_online WHERE userid='".$item[2]."'"));
    $uact .= $plc[0];
  }else{
    $iml = "<img src=\"images/ofl.gif\" alt=\"-\"/>(Offline)";
    $uact = "<b><u>Last Active:</b></u><br/> ";
    $ladt = date("Y/m/d--h:i A", $item[0]);
    $uact .= $ladt;
  }
  
   $avatar=getavatar($item[2]);
  echo "<small>";

		  echo "<table width=\"100%\" align=\"left\" border=\"0\"><tr>";
  
     echo "<td width=\"5%\">";
	 
	 
	   	echo"<img src=\"$avatar\" width=\"60\" height=\"60\" alt=\"\" />";
	     $lnk = "<br/>$iml<a href=\"index.php?action=viewuser&amp;who=$item[2]&amp;sid=$sid\">$item[1]</a>";
      echo "$lnk<br/>";
	  echo"</td>";
   echo "<td valign=\"top\" align=\"left\"><small>";
  

  
    
      $bs = cashtime($item[5]);
	  
	  
	  
      echo "<b><u>Buddy since:</b></u><br/>$bs<br/>";
      echo "$uact<br/>";
	    $lnk = "<a href=\"inbox.php?action=sendpm&amp;who=$item[2]&amp;sid=$sid\">SEND msg to $item[1]</a>";
echo "$lnk<br/>";
	  	  echo"</small></td>";
echo"</tr>
</table>";

	  
      echo "Says: ";
      $bmsg = parsemsg(getbudmsg($item[2]), $sid);
      echo "$bmsg<br/>";
  echo "-----------------------------------<br/>";

      echo "</small>";
      }
    }
    }
    echo "</div>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=buds&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=buds&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=chbmsg&amp;sid=$sid\">";
echo "Buddy Message</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////Buddies

else if($action=="gbook")
{
    $who = $_GET["who"];
    addonline(getuid_sid($sid),"Guestbook","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Guestbook",$pstyle);
    $uid = getuid_sid($sid);

    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_gbook WHERE gbowner='".$who."'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;


        $sql = "SELECT gbowner, gbsigner, gbmsg, dtime, id FROM ibwf_gbook WHERE gbowner='".$who."' ORDER BY dtime DESC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

          if(isonline($item[1]))
  {
    $iml = "<img src=\"images/onl.gif\" alt=\"+\"/>";

  }else{
    $iml = "<img src=\"images/ofl.gif\" alt=\"-\"/>";
  }
    $snick = getnick_uid($item[1]);
      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[1]&amp;sid=$sid\">$iml$snick</a>";
      $bs = date("d m y-H:i:s",$item[3]);
      echo "$lnk<br/><small>";
      if(candelgb($uid, $item[4]))
      {
        $delnk = "<a href=\"genproc.php?action=delfgb&amp;sid=$sid&amp;mid=$item[4]\">[x]</a>";
      }else{
        $delnk = "";
      }
      $text = parsepm($item[2], $sid);
      echo "$text<br/>$bs $delnk<br/>";
      echo "</small>";

    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    if(cansigngb($uid, $who))
    {
    echo "<a href=\"index.php?action=signgb&amp;sid=$sid&amp;who=$who\">";
echo "Add Your Message</a><br/>";
}
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}


//////////////////////////////////Buddies


////////////////////////////////////////////VAULT MAIN
else if($action=="vault")
{
    $who = $_GET["who"];
    addonline(getuid_sid($sid),"Browsing Downloads","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Vault",$pstyle);

    $uid = getuid_sid($sid);
        echo "<p><small>";
        $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_vault WHERE type='1'"));
        echo "<a href=\"lists.php?action=vaultmusic&amp;sid=$sid\"><img src=\"images/music.gif\" alt=\"*\"/> Music($noi[0])</a><br/>";
        $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_vault WHERE type='4'"));
        echo "<a href=\"lists.php?action=vaultvideos&amp;sid=$sid\"><img src=\"images/video.gif\" alt=\"*\"/> Videos($noi[0])</a><br/>";
        $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_vault WHERE type='2'"));
        echo "<a href=\"lists.php?action=vaultpics&amp;sid=$sid\"><img src=\"images/image.gif\" alt=\"*\"/> Pics($noi[0])</a><br/>";
        $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_vault WHERE type='3'"));
        echo "<a href=\"lists.php?action=vaultgames&amp;sid=$sid\"><img src=\"images/game.gif\" alt=\"*\"/> Apps/Games($noi[0])</a><br/>";
        $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_vault WHERE type='0'"));
        echo "<a href=\"lists.php?action=vaultother&amp;sid=$sid\"><img src=\"images/other.gif\" alt=\"*\"/> Other($noi[0])</a><br/><br/>";
		echo "<a href=\"index.php?action=addvlt&amp;sid=$sid\">Add item!</a><br/>";


		echo "</small></p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    if($uid==$who && getplusses($uid)>25)
    {
    echo "<a href=\"index.php?action=addvlt&amp;sid=$sid\">";
echo "Add Item</a><br/>";
}
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

else if($action=="tthemes")
{
    addonline(getuid_sid($sid),"Themes Top List","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Themes Top List",$pstyle);
    echo "<p align=\"center\">";
    echo "<b>Staff List</b><br/><small>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE themeid='1'"));
    echo "$stitle($noi[0])<br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE themeid='2'"));
    echo "Blue($noi[0])<br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE themeid='3'"));
    echo "Black to White($noi[0])<br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE themeid='4'"));
    echo "Red($noi[0])<br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE themeid='5'"));
    echo "Green($noi[0])<br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE themeid='6'"));
    echo "Steal($noi[0])<br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE themeid='7'"));
    echo "Opera WML($noi[0])<br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE themeid='8'"));
    echo "Error($noi[0])<br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE themeid='9'"));
    echo "Grey Orange($noi[0])<br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE themeid='10'"));
    echo "Pinky($noi[0])<br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE themeid='11'"));
    echo "Matrix($noi[0])<br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE themeid='12'"));
    echo "Goth($noi[0])<br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE themeid='13'"));
    echo "Night Pink($noi[0])</small>";
    echo "</p>";
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}



////////////////////////////////////////VAULT MUSIC
else if($action=="vaultmusic")
{
    $who = $_GET["who"];
    addonline(getuid_sid($sid),"Browsing Downloads","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Vault",$pstyle);
    $uid = getuid_sid($sid);



    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    if($who!="")
    {
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_vault WHERE uid='".$who."' AND type='1'"));
    }else{
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_vault WHERE type='1'"));
    }
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    if($who!="")
    {
        $sql = "SELECT id, title, itemurl, uid, downloads, pudt FROM ibwf_vault WHERE uid='".$who."' AND type='1' ORDER BY pudt DESC LIMIT $limit_start, $items_per_page";
        }else{
$sql = "SELECT id, title, itemurl, uid, downloads, pudt FROM ibwf_vault WHERE type='1' ORDER BY pudt DESC LIMIT $limit_start, $items_per_page";
        }


    echo "<p><small>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      $ext = getext($item[2]);
        $ime = getextimg($ext);
        $lnk = "<a href=\"download.php?id=$item[0]\">$ime".htmlspecialchars($item[1])."</a>";
        $downloads = "Downloads: <b>$item[4]</b>";
        $dateadded = date("d/m/y", $item[5]);
        $dateadded1 = "Date Added: <b>$dateadded</b>";


      if(candelvl($uid, $item[0]))
      {
        $delnk = "<a href=\"genproc.php?action=delvlt&amp;sid=$sid&amp;vid=$item[0]\">[x]</a>";
      }else{
        $delnk = "";
      }
      if($who!="")
      {
        $byusr="";
      }else{
        $unick = getnick_uid($item[3]);
        $ulnk = "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$item[3]\">$unick</a>";
        $byusr = "Added By: $ulnk";
      }
      echo "$lnk <br/>$byusr $delnk<br/>$dateadded1<br/>$downloads<br/><br/>";

    }
    }
    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    if($uid==$who && getplusses($uid)>25)
    {
    echo "<a href=\"index.php?action=addvlt&amp;sid=$sid\">";
echo "Add Item</a><br/>";
}
    echo "<a href=\"lists.php?action=vault&amp;sid=$sid&amp;who=$who\">&#171;Back to Vault</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

////////////////////////////////////////VAULT MUSIC
else if($action=="vaultpics")
{
    $who = $_GET["who"];
    addonline(getuid_sid($sid),"Browsing Downloads","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Vault",$pstyle);
    $uid = getuid_sid($sid);



    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    if($who!="")
    {
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_vault WHERE uid='".$who."' AND type='2'"));
    }else{
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_vault WHERE type='2'"));
    }
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    if($who!="")
    {
        $sql = "SELECT id, title, itemurl, uid, downloads, pudt FROM ibwf_vault WHERE uid='".$who."' AND type='2' ORDER BY pudt DESC LIMIT $limit_start, $items_per_page";
        }else{
$sql = "SELECT id, title, itemurl, uid, downloads, pudt FROM ibwf_vault WHERE type='2' ORDER BY pudt DESC LIMIT $limit_start, $items_per_page";
        }


    echo "<p><small>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      $ext = getext($item[2]);
        $mysock = getimagesize("$item[2]");
        $imagesizeWH = imageResize($mysock[0], $mysock[1], 150);
        $ime = "<img src=\"$item[2]\" $imagesizeWH alt=\"*\"/>";
        $lnk = "<a href=\"download.php?id=$item[0]\">$ime<br/>$item[1] - Download</a>";
        $downloads = "Downloads: <b>$item[4]</b>";
        $dateadded = date("d/m/y", $item[5]);
        $dateadded1 = "Date Added: <b>$dateadded</b>";

      if(candelvl($uid, $item[0]))
      {
        $delnk = "<a href=\"genproc.php?action=delvlt&amp;sid=$sid&amp;vid=$item[0]\">[x]</a>";
      }else{
        $delnk = "";
      }
      if($who!="")
      {
        $byusr="";
      }else{
        $unick = getnick_uid($item[3]);
        $ulnk = "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$item[3]\">$unick</a>";
        $byusr = "Added By: $ulnk";
      }
      echo "$lnk <br/>$byusr $delnk<br/>$dateadded1<br/>$downloads<br/><br/>";

    }
    }
    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    if($uid==$who && getplusses($uid)>25)
    {
    echo "<a href=\"index.php?action=addvlt&amp;sid=$sid\">";
echo "Add Item</a><br/>";
}
    echo "<a href=\"lists.php?action=vault&amp;sid=$sid&amp;who=$who\">&#171;Back to Vault</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}




else if($action=="sendto")
{
  addonline(getuid_sid($sid),"Viewing buddy","index.php?action=viewbud&amp;who=$who");

  echo "<p>";

$sql = "SELECT a.lastact, a.name, a.id, b.uid, b.tid, b.reqdt FROM ibwf_users a INNER JOIN ibwf_buddies b ON (a.id = b.uid) OR (a.id=b.tid) WHERE (b.uid='".$uid."' OR b.tid='".$uid."') AND b.agreed='1' AND a.id!='".$uid."'";

$items = sm_query($sql);

    while ($item = mysqli_fetch_array($items))
    {

          if(isonline($item[2]))
  {
    $iml = "<img src=\"images/onl.gif\" alt=\"+\"/>";

    $plc = mysqli_fetch_array(sm_query("SELECT place FROM ibwf_online WHERE userid='".$item[2]."'"));
    $uact .= $plc[0];
  }else{
    $iml = "<img src=\"images/ofl.gif\" alt=\"-\"/>";
    $uact = "Last Active: ";
    $ladt = date("d m y-H:i:s", $item[0]);
    $uact .= $ladt;
  }
}


$whonick = getnick_uid($who);
echo "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$who\">$whonick</a><br/>";
echo "($uact)<br/>";
echo "pop-up message:<br/>";
echo "<form action=\"popup.php?action=send&amp;sid=$sid\" method=\"post\">";
echo "<input type=\"text\" name=\"msg\" maxlength=\"150\"/>";
echo "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
echo "<input type=\"submit\" value=\"send\"/>";

echo "</form>";

echo "<br/><a href=\"index.php?action=sendpm&amp;who=$who&amp;sid=$sid\">+ send message</a>";
echo "<br/><a href=\"genproc.php?action=bud&amp;who=$who&amp;sid=$sid&amp;todo=del\">- remove from buddylist</a>";
  echo "<br/>0 <a accesskey=\"0\" href=\"index.php?action=main&amp;sid=$sid\">Home</a>";
  echo "</p>";


}
//////////////////////////VAULT GAMES
else if($action=="vaultgames")
{
    $who = $_GET["who"];
    addonline(getuid_sid($sid),"Browsing Downloads","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Vault",$pstyle);
    $uid = getuid_sid($sid);



    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    if($who!="")
    {
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_vault WHERE uid='".$who."' AND type='3'"));
    }else{
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_vault WHERE type='3'"));
    }
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    if($who!="")
    {
        $sql = "SELECT id, title, itemurl, uid, downloads, pudt FROM ibwf_vault WHERE uid='".$who."' AND type='3' ORDER BY pudt DESC LIMIT $limit_start, $items_per_page";
        }else{
$sql = "SELECT id, title, itemurl, uid, downloads, pudt FROM ibwf_vault WHERE type='3' ORDER BY pudt DESC LIMIT $limit_start, $items_per_page";
        }


    echo "<p><small>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      $ext = getext($item[2]);
        $ime = getextimg($ext);
        $lnk = "<a href=\"download.php?id=$item[0]\">$ime".htmlspecialchars($item[1])."</a>";
        $downloads = "Downloads: <b>$item[4]</b>";
        $dateadded = date("d/m/y", $item[5]);
        $dateadded1 = "Date Added: <b>$dateadded</b>";

      if(candelvl($uid, $item[0]))
      {
        $delnk = "<a href=\"genproc.php?action=delvlt&amp;sid=$sid&amp;vid=$item[0]\">[x]</a>";
      }else{
        $delnk = "";
      }
      if($who!="")
      {
        $byusr="";
      }else{
        $unick = getnick_uid($item[3]);
        $ulnk = "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$item[3]\">$unick</a>";
        $byusr = "Added By: $ulnk";
      }
      echo "$lnk <br/>$byusr $delnk<br/>$dateadded1<br/>$downloads<br/><br/>";

    }
    }
    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    if($uid==$who && getplusses($uid)>25)
    {
    echo "<a href=\"index.php?action=addvlt&amp;sid=$sid\">";
echo "Add Item</a><br/>";
}
    echo "<a href=\"lists.php?action=vault&amp;sid=$sid&amp;who=$who\">&#171;Back to Vault</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////VAULT Videos
else if($action=="vaultvideos")
{
    $who = $_GET["who"];
    addonline(getuid_sid($sid),"Browsing Downloads","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Vault",$pstyle);
    $uid = getuid_sid($sid);



    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    if($who!="")
    {
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_vault WHERE uid='".$who."' AND type='4'"));
    }else{
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_vault WHERE type='4'"));
    }
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    if($who!="")
    {
        $sql = "SELECT id, title, itemurl, uid, downloads, pudt FROM ibwf_vault WHERE uid='".$who."' AND type='4' ORDER BY pudt DESC LIMIT $limit_start, $items_per_page";
        }else{
$sql = "SELECT id, title, itemurl, uid, downloads, pudt FROM ibwf_vault WHERE type='4' ORDER BY pudt DESC LIMIT $limit_start, $items_per_page";
        }


    echo "<p><small>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      $ext = getext($item[2]);
        $ime = getextimg($ext);
        $lnk = "<a href=\"download.php?id=$item[0]\">$ime".htmlspecialchars($item[1])."</a>";
        $downloads = "Downloads: <b>$item[4]</b>";
        $dateadded = date("d/m/y", $item[5]);
        $dateadded1 = "Date Added: <b>$dateadded</b>";

      if(candelvl($uid, $item[0]))
      {
        $delnk = "<a href=\"genproc.php?action=delvlt&amp;sid=$sid&amp;vid=$item[0]\">[x]</a>";
      }else{
        $delnk = "";
      }
      if($who!="")
      {
        $byusr="";
      }else{
        $unick = getnick_uid($item[3]);
        $ulnk = "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$item[3]\">$unick</a>";
        $byusr = "Added By: $ulnk";
      }
      echo "$lnk <br/>$byusr $delnk<br/>$dateadded1<br/>$downloads<br/><br/>";

    }
    }
    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    if($uid==$who && getplusses($uid)>25)
    {
    echo "<a href=\"index.php?action=addvlt&amp;sid=$sid\">";
echo "Add Item</a><br/>";
}
    echo "<a href=\"lists.php?action=vault&amp;sid=$sid&amp;who=$who\">&#171;Back to Vault</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////VAULT OTHER
else if($action=="vaultother")
{
    $who = $_GET["who"];
    addonline(getuid_sid($sid),"Browsing Downloads","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Vault",$pstyle);
    $uid = getuid_sid($sid);



    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    if($who!="")
    {
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_vault WHERE uid='".$who."' AND type='0'"));
    }else{
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_vault WHERE type='0'"));
    }
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    if($who!="")
    {
        $sql = "SELECT id, title, itemurl, uid, downloads, pudt FROM ibwf_vault WHERE uid='".$who."' AND type='0' ORDER BY pudt DESC LIMIT $limit_start, $items_per_page";
        }else{
$sql = "SELECT id, title, itemurl, uid, downloads, pudt FROM ibwf_vault WHERE type='0' ORDER BY pudt DESC LIMIT $limit_start, $items_per_page";
        }


    echo "<p><small>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      $ext = getext($item[2]);
        $ime = getextimg($ext);
        $lnk = "<a href=\"download.php?id=$item[0]\">$ime".htmlspecialchars($item[1])."</a>";
        $downloads = "Downloads: <b>$item[4]</b>";
        $dateadded = date("d/m/y", $item[5]);
        $dateadded1 = "Date Added: <b>$dateadded</b>";

      if(candelvl($uid, $item[0]))
      {
        $delnk = "<a href=\"genproc.php?action=delvlt&amp;sid=$sid&amp;vid=$item[0]\">[x]</a>";
      }else{
        $delnk = "";
      }
      if($who!="")
      {
        $byusr="";
      }else{
        $unick = getnick_uid($item[3]);
        $ulnk = "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$item[3]\">$unick</a>";
        $byusr = "Added By: $ulnk";
      }
      echo "$lnk <br/>$byusr $delnk<br/>$dateadded1<br/>$downloads<br/><br/>";

    }
    }
    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    if($uid==$who && getplusses($uid)>25)
    {
    echo "<a href=\"index.php?action=addvlt&amp;sid=$sid\">";
echo "Add Item</a><br/>";
}
    echo "<a href=\"lists.php?action=vault&amp;sid=$sid&amp;who=$who\">&#171;Back to Vault</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}


//////////////////////////////////Ignore list

else if($action=="ignl")
{
    addonline(getuid_sid($sid),"Ignore List","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Ignore List",$pstyle);;
    $uid = getuid_sid($sid);
    echo "<p align=\"center\">";
    echo "<b>Ignore List</b>";

    echo "</p>";
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_ignore WHERE name='".$uid."'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql
/*
$sql = "SELECT
            a.name, b.place, b.userid FROM ibwf_users a
            INNER JOIN ibwf_online b ON a.id = b.userid
            GROUP BY 1,2
            LIMIT $limit_start, $items_per_page
    ";
*/
        $sql = "SELECT target FROM ibwf_ignore WHERE name='".$uid."' LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
        $tnick = getnick_uid($item[0]);
          if(isonline($item[0]))
  {
    $iml = "<img src=\"images/onl.gif\" alt=\"+\"/>";

  }else{
    $iml = "<img src=\"images/ofl.gif\" alt=\"-\"/>";

  }
      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$iml$tnick</a>";
      echo "$lnk: ";
      echo "<small><a href=\"genproc.php?action=ign&amp;who=$item[0]&amp;sid=$sid&amp;todo=del\">Remove From Ignore list</a></small><br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=ignl&amp;page=$ppage&amp;sid=$sid\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=ignl&amp;page=$npage&amp;sid=$sid\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=cpanel&amp;sid=$sid\">";
echo "CPanel</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////Blogs

else if($action=="blogs")
{
    addonline(getuid_sid($sid),"Viewing User Blogs","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Blogs List",$pstyle);
    $uid = getuid_sid($sid);
    $who = $_GET["who"];
    $tnick = getnick_uid($who);
    echo "<p align=\"center\">";
    echo "<b>$tnick's Blogs</b>";

    echo "</p>";
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_blogs WHERE bowner='".$who."'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

        $sql = "SELECT id, bname FROM ibwf_blogs WHERE bowner='".$who."' ORDER BY bgdate DESC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
        $bname = htmlspecialchars($item[1]);
    if(candelbl($uid,$item[0]))
    {
      $dl = "<a href=\"genproc.php?action=delbl&amp;sid=$sid&amp;bid=$item[0]\">[X]</a>";
    }else{
      $dl = "";
    }
      $lnk = "<a href=\"index.php?action=viewblog&amp;bid=$item[0]&amp;sid=$sid\">&#187;$bname</a>";
      echo "$lnk $dl<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    if($who==$uid)
    {
        echo "<a href=\"index.php?action=addblg&amp;sid=$sid\">";
echo "Add a blog</a><br/>";
echo "<a href=\"index.php?action=cpanel&amp;sid=$sid\">";
echo "CPanel</a><br/>";
    }
    echo "<a href=\"lists.php?action=allbl&amp;sid=$sid\">";
echo "All Blogs</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////Blogs

else if($action=="allbl")
{
    addonline(getuid_sid($sid),"Blogs list","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Blogs List",$pstyle);
    $uid = getuid_sid($sid);
    $view = $_GET["view"];
    if($view =="")$view="time";
    echo "<p align=\"center\"><small>";
    if($view!="time")
    {
      echo "<a href=\"lists.php?action=allbl&amp;sid=$sid&amp;view=time\">View Newest</a><br/>";
    }
    if($view!="points")
    {
      echo "<a href=\"lists.php?action=allbl&amp;sid=$sid&amp;view=points\">View by points</a><br/>";
    }
    if($view!="rate")
    {
      echo "<a href=\"lists.php?action=allbl&amp;sid=$sid&amp;view=rate\">View most rated</a><br/>";
    }
    if($view!="votes")
    {
      echo "<a href=\"lists.php?action=allbl&amp;sid=$sid&amp;view=votes\">View most voted</a>";
    }
    echo "</small></p>";
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_blogs"));
    $num_items = $noi[0]; //changable
    $items_per_page= 7;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;
if($view=="time")
{
  $ord = "a.bgdate";
}else if($view=="votes")
{
  $ord = "nofv";
}else if($view=="rate")
{
  $ord = "avv";
}else if($view=="points")
{
  $ord = "nofp";
}
if ($view=="time"){
  $sql = "SELECT id, bname, bowner FROM ibwf_blogs ORDER by bgdate DESC LIMIT $limit_start, $items_per_page";
}else{
        $sql = "SELECT a.id, a.bname, a.bowner, COUNT(b.id) as nofv, SUM(b.brate) as nofp, AVG(b.brate) as avv FROM ibwf_blogs a INNER JOIN ibwf_brate b ON a.id = b.blogid GROUP BY a.id ORDER BY $ord DESC LIMIT $limit_start, $items_per_page";
}
    echo "<p><small>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      $bname = htmlspecialchars($item[1]);
      if($view=="time")
      {
      $bonick = getnick_uid($item[2]);

        $byview = "by <a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$item[2]\">$bonick</a>";
        }else if($view=="votes")
        {
          $byview = "Votes: $item[3]";
        }else if($view=="rate")
        {
          $byview = "Rate: $item[5]";
        }else if($view=="points")
        {
          $byview = "Points: $item[4]";
        }
      $lnk = "<a href=\"index.php?action=viewblog&amp;bid=$item[0]&amp;sid=$sid\">&#187;$bname</a> $byview";
      echo "$lnk<br/>";
    }
    }
    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"view\" value=\"$view\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";

    echo "<a href=\"index.php?action=stats&amp;sid=$sid\">";
echo "<img src=\"images/stat.gif\" alt=\"*\"/>Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}//////////////////////////////////Blogs

else if($action=="polls")
{
    addonline(getuid_sid($sid),"Polls list","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Polls List",$pstyle);
    $uid = getuid_sid($sid);
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE pollid>'0'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

  $sql = "SELECT id, name FROM ibwf_users WHERE pollid>'0' ORDER by pollid DESC LIMIT $limit_start, $items_per_page";

    echo "<p><small>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      echo "By <a href=\"index.php?action=viewpl&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a><br/>";
    }
    }
    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"view\" value=\"$view\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";

    echo "<a href=\"index.php?action=stats&amp;sid=$sid\">";
echo "<img src=\"images/stat.gif\" alt=\"*\"/>Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}



else if($action=="casino")

{

   addonline(getuid_sid($sid),"WAP - Playing Casino","lists.php?action=$action");


    $pstyle = gettheme($sid);
    echo xhtmlhead("Casino",$pstyle);


   echo "<p align=\"center\">";



   //////ALL LISTS SCRIPT <<



$num1 = rand(1, 9);

$num2 = rand(1, 9);

$num3 = rand(1, 9);

 $uid = mysqli_fetch_array(sm_query("SELECT uid FROM ibwf_ses WHERE
id='".$sid."'"));

 $uid = $uid[0];

$usrid = $uid;
 $plss = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".getuid_sid($sid)."'"));
  echo "<i>You have $plss[0] Credits</i><br/>";

echo "<b><u>These Are Your Cards:</u></b><br/>";

echo "<b>[$num1][$num2][$num3]</b><br/>";

if ($num1 == 7 and $num2 == 7 and $num3 == 7) {

 $num = rand(1, 5);

 echo "Congratz! You've Won 100 Credits";

                       $ugpl = mysqli_fetch_array(sm_query("SELECT
plusses FROM ibwf_users WHERE id='".$uid."'"));

                       $ugpl = $ugpl[0];

                                                       $ugpl2 = $ugpl +
"100";

                       sm_query("UPDATE ibwf_users SET
plusses='".$ugpl2."' WHERE id='".$uid."'");



echo "<br/>";

}

if ($num1 == 1 and $num2 == 1 and $num3 == 1) {

 $num = rand(1, 10);

 echo "Sorry You've Lost 80 Credits";

                       $ugpl = mysqli_fetch_array(sm_query("SELECT
plusses FROM ibwf_users WHERE id='".$uid."'"));

                       $ugpl = $ugpl[0];

                       $ugpl2 = $ugpl - "80";

                       sm_query("UPDATE ibwf_users SET
plusses='".$ugpl2."' WHERE id='".$uid."'");



echo "<br/>";

}

if ($num2 == 1 and $num3 == 1) {

 $num = rand(1, 10);

 echo "Sorry You've Lost 20 Credits";

                       $ugpl = mysqli_fetch_array(sm_query("SELECT
plusses FROM ibwf_users WHERE id='".$uid."'"));

                       $ugpl = $ugpl[0];

                       $ugpl2 = $ugpl - "20";

                       sm_query("UPDATE ibwf_users SET
plusses='".$ugpl2."' WHERE id='".$uid."'");



echo "<br/>";

}

if ($num3 == 1) {

 $num = rand(1, 10);

 echo "Sorry You've Lost 3 Credits";

                       $ugpl = mysqli_fetch_array(sm_query("SELECT
plusses FROM ibwf_users WHERE id='".$uid."'"));

                       $ugpl = $ugpl[0];

                       $ugpl2 = $ugpl - "3";

                       sm_query("UPDATE ibwf_users SET
plusses='".$ugpl2."' WHERE id='".$uid."'");



echo "<br/>";
}

if ($num1 == 3 and $num2 == 3 and $num3 == 3) {

 $num = rand(1, 10);

   echo "Congratz! You've Won 30 Credits";

                       $ugpl = mysqli_fetch_array(sm_query("SELECT
plusses FROM ibwf_users WHERE id='".$uid."'"));

                       $ugpl = $ugpl[0];

                       $ugpl2 = $ugpl + "30";

                       sm_query("UPDATE ibwf_users SET
plusses='".$ugpl2."' WHERE id='".$uid."'");



echo "<br/>";

}

if ($num2 == 7 and $num3 == 7) {

 $num = rand(1, 15);

   echo "Congratz! You've Won 10 Credits";

                       $ugpl = mysqli_fetch_array(sm_query("SELECT
plusses FROM ibwf_users WHERE id='".$uid."'"));

                       $ugpl = $ugpl[0];

                       $ugpl2 = $ugpl + "10";

                       sm_query("UPDATE ibwf_users SET
plusses='".$ugpl2."' WHERE id='".$uid."'");



echo "<br/>";

}

if ($num3 == 7) {

 $num = rand(1, 15);

 echo "Congratz! You've Won 5 Credits";

                       $ugpl = mysqli_fetch_array(sm_query("SELECT
plusses FROM ibwf_users WHERE id='".$uid."'"));

                       $ugpl = $ugpl[0];

                       $ugpl2 = $ugpl + "5";

                       sm_query("UPDATE ibwf_users SET
plusses='".$ugpl2."' WHERE id='".$uid."'");

echo "<br/>";

}

echo "<b><a href=\"lists.php?action=casino&amp;sid=$sid&amp;time=";

       echo date('dmHis');

       echo "\">Spin The Wheel!</a></b><br/><br/>";
echo "<small><a href=\"helpcas.php?&amp;sid=$sid\">Help</a></small><br/>";

echo "<small><a href=\"index.php?action=funm&amp;sid=$sid\">Back To Fun
Zone</a></small>";



echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img
src=\"images/home.gif\" alt=\"*\"/>";

echo "Home</a><br/>";


  echo "</p>";
    echo xhtmlfoot();
}
//////////////////////////////////Top Gammers

else if($action=="tshout")
{
    addonline(getuid_sid($sid),"Top Shouters","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Top Shouters",$pstyle);
    echo "<p align=\"center\">";
    echo "<b>Top Shouters</b>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $num_items = regmemcount(); //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name, shouts FROM ibwf_users ORDER BY shouts DESC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a> <small>Shouts: $item[2]</small>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=tshout&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=tshout&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////Top Gammers

else if($action=="bbcode")
{
    addonline(getuid_sid($sid),"BBcode List","");
   $pstyle = gettheme($sid);
    echo xhtmlhead("BBcode List",$pstyle);
    echo "<p align=\"center\">";
    echo "<b>BBcode</b>";
    echo "</p>";
    echo "<p>";
    echo "<b>WARNING:</b> Misusing the bbcodes may cause display errors<br/><br/>";
    echo "[b]TEXT[/b]: <b>TEXT</b><br/>";
    echo "[i]TEXT[/i]: <i>TEXT</i><br/>";
    echo "[u]TEXT[/u]: <u>TEXT</u><br/>";
    echo "[big]TEXT[/big]: <big>TEXT</big><br/>";
    echo "[small]TEXT[/small]: <small>TEXT</small><br/><br/>";

    echo "[img=<i>http://$stitle.co.za/images/logo.gif</i>]: <img src=\"http://$stitle.co.za/images/logo.gif\"><br/>";
    echo "<small>replace http://$stitle.co.za/images/logo.gif with any image url. NOTE: don't use large images!</small><br/><br/>";

    echo "[clr=<i>red</i>]<i>TEXT</i>[/clr]: <font color=\"red\">TEXT</font><br/>";
    echo "<small>replace red with any other colour, and replace TEXT with any word you want</small><br/><br/>";

    echo "[url=<i>http://$stitle.co.za</i>]<i>$stitle.co.za</i>[/url]: <a href=\"http://$stitle.co.za\">$stitle.co.za</a><br/>";
    echo "<small>replace http://$stitle.co.za with any other link, and replace $stitle.co.za with any word you want</small><br/><br/>";

    echo "[topic=<i>1501</i>]<i>Topic Name</i>[/topic]: <a href=\"index.php?action=viewtpc&amp;tid=1501&amp;sid=$sid\">Topic Name</a><br/>";
    echo "<small>replace 1501 with the topic id, and replace Topic Name with any word you want</small><br/><br/>";

    echo "[blog=<i>1</i>]<i>Blog Name</i>[/blog]: <a href=\"index.php?action=viewblog&amp;bid=1&amp;sid=$sid\">Blog Name</a><br/>";
    echo "<small>replace 1 with the blog id, and replace Blog Name with any word you want</small><br/><br/>";

    echo "[club=<i>1</i>]<i>Club Name</i>[/club]: <a href=\"index.php?action=gocl&amp;clid=1501&amp;sid=$sid\">Club Name</a><br/>";
    echo "<small>replace 1 with the club id, and replace Club Name with any word you want</small><br/><br/>";

    echo "[br/]: to insert new line, like:";
    echo "hello[br/]world!:<br/>hello<br/>world!<br/><br/>";

    echo "/rwfaqs: <a href=\"lists.php?action=faqs&amp;sid=$sid\">F.A.Qs</a> <small>in PMs only</small>";

    echo "</p>";
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=cpanel&amp;sid=$sid\">";
echo "CPanel</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}


//////////////////////////////////Top Gammers

else if($action=="faqs")
{
    addonline(getuid_sid($sid),"F.A.Qs","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("F.A.Qs",$pstyle);
    echo "<p align=\"center\">";
    echo "<b>F.A.Qs</b>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_faqs"));
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT question, answer FROM ibwf_faqs ORDER BY id LIMIT $limit_start, $items_per_page";


    echo "<p><small>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
        $item[0] = parsepm($item[0], $sid);
        $item[1] = parsepm($item[1], $sid);
      echo "<b>Q. $item[0]</b><br/>";
      echo "A. $item[1]<br/>";
    }
    }
    echo "</small></p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}


//////////////////////////////////Staff



else if($action=="staff")

{
addonline(getuid_sid($sid),"Staff list","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Staff List",$pstyle);

    echo "<p align=\"center\">";

    echo "<img src=\"smilies/order.gif\" alt=\"*\"/><br/>";

    echo "<b>Staff List</b><br/><small>";

    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE perm='4'"));
    echo "<a href=\"lists.php?action=owns&amp;sid=$sid\">Owners($noi[0])</a><br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE perm='3'"));
    echo "<a href=\"lists.php?action=hadms&amp;sid=$sid\">Head Admins($noi[0])</a><br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE perm='2'"));

    echo "<a href=\"lists.php?action=admns&amp;sid=$sid\">Admins($noi[0])</a><br/>";

    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE perm='1'"));

    echo "<a href=\"lists.php?action=modr&amp;sid=$sid\">Moderators($noi[0])</a></small>";

    echo "</p>";

    //////ALL LISTS SCRIPT <<

    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE perm>'0'"));



    if($page=="" || $page<=0)$page=1;

    $num_items = $noi[0]; //changable

    $items_per_page= 10;

    $num_pages = ceil($num_items/$items_per_page);

    if(($page>$num_pages)&&$page!=1)$page= $num_pages;

    $limit_start = ($page-1)*$items_per_page;



    //changable sql



        $sql = "SELECT id, name, perm FROM ibwf_users WHERE perm>'0' ORDER BY name LIMIT $limit_start, $items_per_page";





    echo "<p>";

    $items = sm_query($sql);

    

    if(mysqli_num_rows($items)>0)

    {

    while ($item = mysqli_fetch_array($items))

    {

          if($item[2]=='1')
      {
        $tit = "Moderator";
      }else if($item[2]=='2')
      {
        $tit = "Admin";
      }else if($item[2]=='3')
      {
        $tit = "Head Admin";
      }else if($item[2]=='4')
      {
        $tit = "Owner";
      }
        /*if($item[2]=='1')

        {

          $tit = "Moderator";

        }else{

          $tit = "Admin";

        }
*/
      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a> <small>$tit</small>";

      echo "$lnk<br/>";

    }

    }

    echo "</p>";

    echo "<p align=\"center\">";

    if($page>1)

    {

      $ppage = $page-1;

      echo "<a href=\"lists.php?action=staff&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;PREV</a> ";

    }

    if($page<$num_pages)

    {

      $npage = $page+1;

      echo "<a href=\"lists.php?action=staff&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";

    }

     echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";



        echo $rets;







    }

    echo "</p>";

  ////// UNTILL HERE >>

    echo "<p align=\"center\">";

    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";

echo "Site Stats</a><br/>";

    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";

echo "Home</a>";

  echo "</p>";

 echo xhtmlfoot();

}



//////////////////////////////////Staff



else if($action=="owns")
{
    addonline(getuid_sid($sid),"Owners list","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Owners List",$pstyle);
    echo "<p align=\"center\">";
    echo "<img src=\"smilies/order.gif\" alt=\"*\"/><br/>";
    echo "<b>Owners List</b><br/>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE perm='4'"));
    if($page=="" || $page<=0)$page=1;
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name FROM ibwf_users WHERE perm='4' ORDER BY name LIMIT $limit_start, $items_per_page";

    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=owns&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;PREV</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=owns&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
     echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";
        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
   echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
else if($action=="hadms")
{
    addonline(getuid_sid($sid),"xhtml-Head Admin list","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Head Admin List",$pstyle);
    echo "<p align=\"center\">";
    echo "<img src=\"smilies/order.gif\" alt=\"*\"/><br/>";
    echo "<b>Head Admins List</b><br/>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE perm='3'"));
    if($page=="" || $page<=0)$page=1;
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name FROM ibwf_users WHERE perm='3' ORDER BY name LIMIT $limit_start, $items_per_page";

    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=hadmns&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;PREV</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=hadmns&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
     echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";
        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
   echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

else if($action=="admns")

{

 addonline(getuid_sid($sid),"xhtml-Admin list","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Admin List",$pstyle);

    echo "<p align=\"center\">";

    echo "<img src=\"smilies/order.gif\" alt=\"*\"/><br/>";

    echo "<b>Admins List</b><br/>";

    echo "</p>";

    //////ALL LISTS SCRIPT <<

    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE perm='2'"));



    if($page=="" || $page<=0)$page=1;

    $num_items = $noi[0]; //changable

    $items_per_page= 10;

    $num_pages = ceil($num_items/$items_per_page);

    if(($page>$num_pages)&&$page!=1)$page= $num_pages;

    $limit_start = ($page-1)*$items_per_page;



    //changable sql



        $sql = "SELECT id, name FROM ibwf_users WHERE perm='2' ORDER BY name LIMIT $limit_start, $items_per_page";





    echo "<p>";

    $items = sm_query($sql);

    

    if(mysqli_num_rows($items)>0)

    {

    while ($item = mysqli_fetch_array($items))

    {



      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a>";

      echo "$lnk<br/>";

    }

    }

    echo "</p>";

    echo "<p align=\"center\">";

    if($page>1)

    {

      $ppage = $page-1;

      echo "<a href=\"lists.php?action=admns&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;PREV</a> ";

    }

    if($page<$num_pages)

    {

      $npage = $page+1;

      echo "<a href=\"lists.php?action=admns&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";

    }

     echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";



        echo $rets;

    }

    echo "</p>";

  ////// UNTILL HERE >>

    echo "<p align=\"center\">";

    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";

echo "Site Stats</a><br/>";

    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";

echo "Home</a>";

  echo "</p>";

    echo xhtmlfoot();

}
//////////////////////////////////Vips

else if($action=="vips")
{
    addonline(getuid_sid($sid),"V.I.P list","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("V.I.P List",$pstyle);

    //////ALL LISTS SCRIPT <<
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE specialid>'0'"));

    if($page=="" || $page<=0)$page=1;
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name, specialid FROM ibwf_users WHERE specialid>'0' ORDER BY name LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
        $nic = getnick_uid($item[0]);
          $tit = "SM Premium User!";
       

      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$nic</a> $tit";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=staff&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=staff&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}


//////////////////////////////////judges

else if($action=="judg")
{
    addonline(getuid_sid($sid),"Chat mods list","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Chat Moderators List",$pstyle);
    echo "<p align=\"center\">";
    echo "<b>Chat Moderators </b><br/>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_judges"));

    if($page=="" || $page<=0)$page=1;
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT uid FROM ibwf_judges LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">".getnick_uid($item[0])."</a>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=judg&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=judg&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////Staff

else if($action=="modr")
{
    addonline(getuid_sid($sid),"Mods list","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Mods List",$pstyle);
    echo "<p align=\"center\">";
    echo "<b>Moderators List</b><br/>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_users WHERE perm='1'"));

    if($page=="" || $page<=0)$page=1;
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name FROM ibwf_users WHERE perm='1' ORDER BY name LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=modr&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=modr&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}


//////////////////////////////////Top Posters List

else if($action=="tpweek")
{
    addonline(getuid_sid($sid),"Top Posters of the week","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Top Posters",$pstyle);
    echo "<p align=\"center\">";
    echo "Top Posters of The week<br/><small>Thank you, you brought the life to this site in the last 7 days</small>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;
    $weekago = ((time() - $timeadjust)  );
    $weekago -= 7*24*60*60;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(DISTINCT uid)  FROM ibwf_posts WHERE dtpost>'".$weekago."';"));
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql


        $sql = "SELECT uid, COUNT(*) as nops FROM ibwf_posts  WHERE dtpost>'".$weekago."'  GROUP BY uid ORDER BY nops DESC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
        $unick = getnick_uid($item[0]);
      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$unick</a> <small>Posts: $item[1]</small>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=tpweek&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=tpweek&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
  $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////Top Posters List

else if($action=="tptime")
{
    addonline(getuid_sid($sid),"Top Posters all the time","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Top Posters",$pstyle);
    echo "<p align=\"center\">";
    echo "Top Posters of all the time";
    echo "</p>";
    //////ALL LISTS SCRIPT <<

    if($page=="" || $page<=0)$page=1;

    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(DISTINCT uid)  FROM ibwf_posts ;"));
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql


        $sql = "SELECT uid, COUNT(*) as nops FROM ibwf_posts   GROUP BY uid ORDER BY nops DESC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
        $unick = getnick_uid($item[0]);
      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$unick</a> <small>Posts: $item[1]</small>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=tptime&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=tptime&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"lists.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}


//////////////////////////////////Males List

else if($action=="males")
{
    addonline(getuid_sid($sid),"Males List","");

    $pstyle = gettheme($sid);
    echo xhtmlhead("Males List",$pstyle);
    echo "<p align=\"center\">";
    echo "<img src=\"images/male.gif\" alt=\"*\"/><br/>";
    echo "<b>Males</b>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE sex='M'"));
    if($page=="" || $page<=0)$page=1;
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql
        $sql = "SELECT id, name, birthday FROM ibwf_users WHERE sex='M' ORDER BY name LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      $uage = getage($item[2]);
      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a> <small>Age: $uage</small>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=males&amp;page=$ppage&amp;sid=$sid\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=males&amp;page=$npage&amp;sid=$sid\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
        $rets = "<form action=\"lists.php\" method=\"get\">";
      $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";


 $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////Males List

else if($action=="fems")
{
    addonline(getuid_sid($sid),"Females List","");

    $pstyle = gettheme($sid);
    echo xhtmlhead("Females List",$pstyle);
    echo "<p align=\"center\">";
    echo "<img src=\"images/female.gif\" alt=\"*\"/><br/>";
    echo "<b>Females</b>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE sex='F'"));
    if($page=="" || $page<=0)$page=1;
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql
        $sql = "SELECT id, name, birthday FROM ibwf_users WHERE sex='F' ORDER BY name LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      $uage = getage($item[2]);
      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a> <small>Age: $uage</small>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=fems&amp;page=$ppage&amp;sid=$sid\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=fems&amp;page=$npage&amp;sid=$sid\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
        $rets = "<form action=\"lists.php\" method=\"get\">";
      $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";


 $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

//////////////////////////////////Today's Birthday'

else if($action=="bdy")
{
    addonline(getuid_sid($sid),"Today's Birthday","");

    $pstyle = gettheme($sid);
    echo xhtmlhead("Today's Birthday",$pstyle);
    echo "<p align=\"center\">";
    echo "<img src=\"images/cake.gif\" alt=\"*\"/><br/>";
    echo "Happy Birthday to:";
    echo "</p>";
    //////ALL LISTS SCRIPT <<
    $noi =mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users where month(`birthday`) = month(curdate()) and dayofmonth(`birthday`) = dayofmonth(curdate());"));
    if($page=="" || $page<=0)$page=1;
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql
        $sql = "SELECT id, name, birthday  FROM ibwf_users where month(`birthday`) = month(curdate()) and dayofmonth(`birthday`) = dayofmonth(curdate()) ORDER BY name LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      $uage = getage($item[2]);
      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a> <small>Age: $uage</small>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=bdy&amp;page=$ppage&amp;sid=$sid\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=bdy&amp;page=$npage&amp;sid=$sid\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
 $rets = "<form action=\"lists.php\" method=\"get\">";
      $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
         $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
         $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

 $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}


//////////////////////////////////Browsers

else if($action=="brows")
{
    addonline(getuid_sid($sid),"Browsers List","");

    $pstyle = gettheme($sid);
    echo xhtmlhead("Browser List",$pstyle);
    echo "<p align=\"center\">";
    echo "<b>browsers List</b>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<
    $noi=mysqli_fetch_array(sm_query("SELECT COUNT(DISTINCT browserm) FROM ibwf_users WHERE browserm IS NOT NULL "));
    if($page=="" || $page<=0)$page=1;
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql
        $sql = "SELECT browserm, COUNT(*) as notl FROM ibwf_users    WHERE browserm!='' GROUP BY browserm ORDER BY notl DESC LIMIT $limit_start, $items_per_page";
//$moderatorz=sm_query("SELECT tlphone, COUNT(*) as notl FROM users GROUP BY tlphone ORDER BY notl DESC LIMIT  ".$pagest.",5");
    $cou = $limit_start;
    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {

    while ($item = mysqli_fetch_array($items))
    {
      $cou++;
      $lnk = "$cou-$item[0] <b>$item[1]</b>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=brows&amp;page=$ppage&amp;sid=$sid\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=brows&amp;page=$npage&amp;sid=$sid\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
       $rets = "<form action=\"lists.php\" method=\"get\">";
      $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
         $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
         $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";


$rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=stats&amp;sid=$sid\"><img src=\"images/stat.gif\" alt=\"*\"/>";
echo "Site Stats</a><br/>";
    
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

else if($action=="critop"){

    addonline(getuid_sid($sid),"Viewing Top Cricket Scorers","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("Viewing Top Cricket Scorers",$pstyle);

echo "<h5>CRICKET TOP RANK USERS</h5>";
echo '<center><img src="images/cri/cup.jpeg"><br/><br/><b>This Is A Weekly Status</b><br/></center>';
if($page=="" || $page<=0)$page=1;
    $pms = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top"));
    
    $num_items = $pms[0]; //changable
    $items_per_page=7;
    $num_pages = ceil($num_items/$items_per_page);
    if($page>$num_pages)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;
    if($num_items>0)
    {
      echo "<p>";$j=$limit_start;
      $pms = sm_query("SELECT uid,win,loss,md FROM cri_top ORDER BY win DESC LIMIT $limit_start, $items_per_page");
      while($pm=mysqli_fetch_array($pms))
      {$j++;
            if(isonline($pm[0]))
  {
    $onlby = "<img src=\"images/on.gif\" alt=\"+\"/>";
  }else{
    $onlby = "<img src=\"images/off.gif\" alt=\"-\"/>";
  }
    $tolink=getnick_uid($pm[0]);        
  echo "<b>$j) </b><a href=\"index.php?action=viewuser&amp;who=$pm[0]&amp;sid=$sid\">$onlby";
  if($j<4)echo "<b><font color=\"red\">$tolink</font></b></a><br/>";
  else echo "$tolink</font></a><br/>";
  $per=($pm[1]/($pm[1]+$pm[2]+$pm[3]))*100;$per=round($per);
  echo "<b>Win :</b>$pm[1]<br/><b>Lost :</b>$pm[2]<br/><b>Tie :</b>$pm[3]<br/><b>Win(%) :</b>$per";
  echo "<br/>--------------<br/>";
      }
      echo "</p><p align=\"center\">";
      if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"lists.php?action=critop&amp;page=$ppage&amp;sid=$sid\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"lists.php?action=critop&amp;page=$npage&amp;sid=$sid\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
	$rets = "<form action=\"lists.php\" method=\"get\">";
      $rets .= "<input name=\"page\" style=\"-wap-input-format: '*N'\" size=\"2\"/>";
      $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\">";
      $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\">";
      $rets .= "<input type=\"Submit\" name=\"Submit\" Value=\"Go To Page\"></form>";
      echo $rets;
      }
      }else{
        echo "<p align=\"center\">";
        echo "NO DATA</p>";
      }
	  $rid = $_GET["rid"];
	  echo "<center><a href=\"chat.php?action=&amp;sid=$sid&amp;rid=$rid&amp;rpw=\">Back To PlayGround</a></center>";
	
	  
	  }

/*
  $married=mysqli_fetch_array(sm_query("SELECT * from
ibwf_married WHERE frmuid='".$who."' OR touid='".$who."'"));

  if($married['frmuid']==$who)

  {

                  if($married['agreed']==1)

                               {

                                               if($married['complete']==1)

                                                               {


$unick=getnick_uid($who);


$mnick=getnick_uid($married['touid']);


echo "<strong>$unick is Married To $mnick</strong><br/><br/>";

                                                               }

                               }

  }else{

                  if($married['agreed']==1)

                               {

                                               if($married['complete']==1)

                                                               {


$unick=getnick_uid($who);


$mnick=getnick_uid($married['frmuid']);


echo "<strong>$unick is Married To $mnick</strong><br/>";

                                                               }

                               }

  }
*/

?>