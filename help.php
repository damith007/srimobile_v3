<?php
include("gzcompress.php");
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
include("config.php");
include("core.php");
include("xhtmlfunctions.php");
?>

<?php
connectdb();
$action = $_GET["action"];
$sid = $_GET["sid"];
$page = $_GET["page"];
$who = isnum($_GET['who']);
$id = isnum($_GET['id']);
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
    };


 $pstyle = gettheme($sid);
echo xhtmlhead("Support Ticket",$pstyle);
addonline(getuid_sid($sid),"Create A Support Ticket","");
if($action=="main")
 {

echo "<h5><b>SM Help Desk</b></h5><div class=\"mblock2\" align=\"center\">";

 echo "<a href=\"?action=createt&amp;sid=$sid\">Create Help Tricket</a><br/>";	  

 $pm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_tickets WHERE creator='".$uid."' AND open='0'"));
 if($pm[0]>0){
  echo "<a href=\"?action=myt&amp;sid=$sid\">My Tickets </a> ($pm[0]) Tickets<br/>";
 }
 
 
 
 echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" />Home</a>";

echo xhtmlfoot();
}
if($action=="myt")
 {

echo "<h5><b>My Tickets</b></h5><div class=\"mblock2\">";
    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_tickets WHERE creator='".$uid."'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id,sub,open FROM ibwf_tickets WHERE creator='".$uid."' ORDER BY time LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
	if($item[0]==0){
	 $lin= "<b>Open</b>";
	}else{
	$lin= "<b>Closed(x)</b>";
	}
	
	
 $link= "<b>Subject:</b><a href=\"?action=opent&amp;id=$item[0]&amp;sid=$sid\">$item[1]</a> $lin<hr/>";
echo"$link";
    }
  }
 
    echo "</div>";
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
      $rets = "<form action=\"help.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }

   echo "<a href=\"?action=main&amp;sid=$sid\">Go Help center</a><br/>";
 echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" />Home</a></p>";

echo xhtmlfoot();
}

if($action=="opent")
 {

echo "<h5><b>Create Tickets</b></h5><div class=\"mblock2\">";
 $noi = mysqli_fetch_array(sm_query("SELECT creator, sub , text ,time ,open FROM ibwf_tickets WHERE id='".$id."'"));
if($noi[0]==$uid){

if($item[4]==0){
	 $lin= "Open";
	}else{
	$lin= "Closed(x)";
	}
echo"<center><h2>Subject:</h2>$noi[1]<br/></center>";
echo"<b>creator:</b> <a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$noi[0]\">".getnick_uid($noi[0])."</a><br/>";
echo"<b>status:</b>$lin<br/>";

echo"<b>msg:</b>".parsepm($noi[2], $sid);
echo"<br/>";
////////////////////////////////////////////////////////
$shtxt = $_POST["shtxt"];

  $lastpm = mysqli_fetch_array(sm_query("SELECT time FROM ibwf_tktcomments WHERE tktid='".$id."' ORDER BY time LIMIT 1"));

 
 
  $pmfl = $lastpm[0]+10;
  
if((isset($shtxt))and($shtxt!=="")and($pmfl<time())){
 sm_query("INSERT INTO `ibwf_tktcomments` (`tktid`, `tktcomments`, `uid`, `time`) VALUES ('".$id."', '".$shtxt."', '".$uid."', '".time()."')");
 }
//////////////////////////////////////////////////////////////////////

if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_tktcomments WHERE tktid='".$id."'"));
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT tktcomments,uid FROM ibwf_tktcomments WHERE tktid='".$id."' ORDER BY time DESC LIMIT $limit_start, $items_per_page";


    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {

	
$msg= parsepm($item[0], $sid)."<br/>";
 $link= "<a href=\"index.php?action=viewuser&amp;who=$item[1]&amp;sid=$sid\">".getnick_uid($item[1])."</a>:<br/> $msg<br/>";
echo"$link";
    }
  }
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo "<form method=\"post\" action=\"help.php?action=opent&amp;sid=$sid&amp;id=$id\">";
echo "<textarea rows=\"2\" cols=\"20\" name=\"shtxt\"></textarea><br/>";
echo "<input type=\"submit\" name=\"Submit\" value=\"Reply\"/><br/>";
echo "</form>";
 

 /////////////////////////////////////////////////////////////////////////////////////////
    echo "</div>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"?action=$action&amp;page=$ppage&amp;sid=$sid&amp;id=$id\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"?action=$action&amp;page=$npage&amp;sid=$sid&amp;id=$id\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"help.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
$rets .= "<input type=\"hidden\" name=\"id\" value=\"$id\"/>";
        $rets .= "</form>";

        echo $rets;
    }



/////////////////////////////////////////////////////////////
}
  
   echo "<a href=\"?action=main&amp;sid=$sid\">Go Help center</a><br/>";
 echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" />Home</a>";

echo xhtmlfoot();
}


if($action=="addtricket")
 {

echo "<h5><b>Add Tickets</b></h5><div class=\"mblock2\" align=\"center\">";
$sub=$_POST["sub"];
$text=$_POST["shtxt"];
if($sub==""){

echo"Subject Can'ts Be Empty<br/>";

}else if($text==""){

echo"Problem Can'ts be empty<br/>";

}else{
echo"<img src=\"images/ok.gif\" />Ur Tricket Has Been Created<br/>
Plz Wait for Ur Unswer<br/>";
sm_query("INSERT INTO `ibwf_tickets` (`id`, `creator`, `sub`, `text`, `time`, `open`) VALUES (NULL, '".$uid."', '".$sub."', '".$text."', '".time()."', '0')");
$timeout = 300;
$tm24 = time()-$timeout;
///////////////////////////////////////////////////////////////
$pm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE lastact>'".$tm24."' AND perm>'0'"));
if($pm[0]>0){
   $pms = sm_query("SELECT id, name FROM ibwf_users WHERE lastact>'".$tm24."' AND perm>'0'");
  $tm = time();
  while($pm=mysqli_fetch_array($pms))
  {
     $msg="[b]Help Tricket:[/b][br/][user=$uid]".getname_uid($uid)."[/user] Was Created Help Tricket.[help].plz Handle It Soon.";
  autopm($msg,$pm[0]);
  
  } 
}else{

$pms = sm_query("SELECT id, name FROM ibwf_users WHERE perm>'0'");
  $tm = time();
  while($pm=mysqli_fetch_array($pms))
  {
  $msg="[b]Help Tricket:[/b][br/][user=$uid]".getname_uid($uid)."[/user] Was Created Help Tricket.[help].plz Handle It Soon..Becouse When U see this Tricket Created time no staff one is Online";
  autopm($msg,$pm[0]);  
  
  } 

}
}
/////////////////////////////////////////////////////////////////	
 echo "<a href=\"?action=main&amp;sid=$sid\">Go Help center</a><br/>";
    
 echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" />Home</a>";

echo xhtmlfoot();
}
    
        
    else{
addonline(getuid_sid($sid),"Error","");
	echo "<h5><b>SM Help Desk</b></h5><div class=\"mblock2\" align=\"center\">";
  echo "I don't know how did you get into here, but there's nothing to show<br/>";
  echo "<h2><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"\"/>Home</a>";
  echo "</h2>";echo xhtmlfoot();

}

?>
</html>