<?php
include("gzcompress.php");
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
include("config.php");
include("core.php");
connectdb();
include("xhtmlfunctions.php");

$action = $_GET["action"];
$sid = $_GET["sid"];
$page = $_GET["page"];
$who = $_GET["who"];
$pmid = $_GET["pmid"];
mylog($sid);
$uid = getuid_sid($sid);
banned($uid);
    
if($action=="sendpm")
{
 $whonick = getnick_uid($who);
 addonline(getuid_sid($sid),"Sending PM to $whonick","");
  $pstyle = gettheme($sid);
  echo xhtmlhead("Inbox",$pstyle);
echo"<h5>Send Massge</h5>";
 $avatar=getavatar($who);


		  echo "<table width=\"100%\" align=\"left\" border=\"0\"><tr>";
  
     echo "<td width=\"5%\">";
	 
	 
	   	echo"<img src=\"$avatar\" width=\"60\" height=\"60\" alt=\"\" />";
	 
	  echo"</td>";
  echo "<td valign=\"top\" align=\"left\"><small>";
  

echo "<b>".getchatstatus($who)."</b><br/>";
	 $noi = mysqli_fetch_array(sm_query("SELECT lastact FROM ibwf_users WHERE id='".$who."'"));$var1 = date("His",$noi[0]);$var2 = time();$var21 = date("His",$var2);$var3 = $var21 - $var1;$var4 = date("s",$var3);echo "Idle: ";$remain = time() - $noi[0];$idle = gettimemsg($remain);echo "$idle<br/>";

	  echo "<b>Member's ID: </b>$who<br/>";
   $unpm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE touid='".$who."' AND unread>0"));
  $unread = mysqli_fetch_array(sm_query("SELECT COUNT(DISTINCT unread) FROM ibwf_private WHERE byuid='".$uid."' AND touid='".$who."'"));
  if($unpm[0]==0)
  {
  echo "<b>Unread PM's:</b> None<br/>";
  }else{
  echo "<b>Unread PM's:</b> $unpm[0], $unread[0] from u<br/>";
  }
	  
	  echo"</small></td>";
	  
	  
	  
  echo"</tr>
</table>";

    echo parsemsg(getbudmsg($who), $sid);



  $whonick = getnick_uid($who);
  
  echo "<br/><b><u>Send PM to $whonick</u></b><br/>";
	echo "<form action=\"inbxproc.php?action=sendpm&amp;who=$who&amp;sid=$sid\" method=\"post\">";
  echo "<textarea rows=\"2\" cols=\"20\" name=\"pmtext\"></textarea><br/>";
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
</select><br/>";
  
  echo "<input type=\"submit\" value=\"Fast Reply &#187;\"/>";
echo "</form>";
echo "<a href=\"inbox.php?action=pmimage&amp;sid=$sid&amp;towho=$who\" class=\"btn\">Reply+Image</a><br/>";
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();

}
else if($action=="sendto")
{
  addonline(getuid_sid($sid),"Sending PM","");
  
  $pstyle = gettheme($sid);
  echo xhtmlhead("Inbox",$pstyle);
  echo "<p align=\"center\">";
  $whonick = getnick_uid($who);
  echo "Send PM to:<br/><br/>";
echo "<form action=\"inbxproc.php?action=sendto&amp;sid=$sid\" method=\"post\">";
  echo "User: <input name=\"who\" format=\"*x\" maxlength=\"15\"/><br/>";
  echo "Text: <input name=\"pmtext\" maxlength=\"500\"/><br/>";

echo "<input type=\"submit\" value=\"SEND\"/>";
echo "</form>";
  
  echo "<br/><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
   echo xhtmlfoot(); 

}


else if($action=="main")
{
  addonline(getuid_sid($sid),"User Inbox","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Inbox",$pstyle);
  echo "<h5>";
    echo "Inbox";
    echo "</h5>";
  div();
    echo "<small>";
    $uid = getuid_sid($sid);
    
    $umsg = getunreadpm(getuid_sid($sid));
    $tmsg = getpmcount(getuid_sid($sid));
    $read = $tmsg - $umsg;
	
	  $magictime = mysqli_fetch_array(sm_query("SELECT time FROM ibwf_gift WHERE uid='".$uid."'"));
if($magictime[0]<time())
{
  echo"<h3>
<img src=\"images/credit.png\" alt=\"*\"/><a href=\"other.php?action=gift&amp;sid=$sid\">Get Bonus Crditz now !!</a>
</h3>";

  }else{
  $msu=gettimemsg($magictime[0]-time());
  echo"<h3>Wait to
$msu Bonus Crditz
</h3>";
  }
	
	
	
echo "<img src=\"images/npm.gif\" alt=\"*\"/><a href=\"inbox.php?action=display&amp;sid=$sid&amp;view=urd\">New</a>(".getpmcount($uid,"urd").")<br/>";
echo "<img src=\"images/opm.gif\" alt=\"*\"/><a href=\"inbox.php?action=display&amp;sid=$sid&amp;view=rd\">Old</a>(".getpmcount($uid,"rd").")<br/><br/>";

echo "<br/><img src=\"images/inbox1.gif\" alt=\"*\"/><a href=\"inbox.php?action=display&amp;sid=$sid&amp;view=snt\">Outbox</a>(".getpmcount($uid,"snt").")<br/>";
echo "<img src=\"images/spm.gif\" alt=\"*\"/><a href=\"inbox.php?action=display&amp;sid=$sid&amp;view=str\">Starred </a>(".getpmcount($uid,"str").")<br/>";
  
    
    echo "<br/><br/>";
	
	 echo "<a accesskey=\"3\" href=\"inbxproc.php?action=proall&amp;sid=$sid\">Delete All</a><br/>";
	echo "Need Any Help? Go to<br/>
<a href=\"help.php?action=main&amp;sid=$sid\"> SM Help Center <br/>";
	
  
    echo "<center><a href=\"inbox.php?action=sendto&amp;sid=$sid\">*Send PM*</a></center>";
    echo "</small>";
    echo "</div>";
  ////// UNTILL HERE >>

    
    
  echo "<p align=\"center\">";
 echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

elseif($action=="display"){

  addonline(getuid_sid($sid),"User Inbox","");
    $pstyle = gettheme($sid);
  echo xhtmlhead("User Inbox",$pstyle);
    echo "<h5>";
    echo "User Inbox";
    echo "</h5>";
	div();
    $view = $_GET["view"];
    //////ALL LISTS SCRIPT <<
    if($view=="")$view="all";
    if($page=="" || $page<=0)$page=1;
    $myid = getuid_sid($sid);
    $doit=false;
    $num_items = getpmcount($myid,$view); //changable
    $items_per_page= 7;
    $num_pages = ceil($num_items/$items_per_page);
    if($page>$num_pages)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;
    if($num_items>0)
    {
      if($doit)
      {
        $exp = "&amp;rwho=$myid";
      }else
      {
        $exp = "";
      }
    //changable sql
    if($view=="all")
  {
    $sql = "SELECT
            a.name, b.id, b.byuid, b.unread, b.starred,b.text,b.image FROM ibwf_users a
            INNER JOIN ibwf_private b ON a.id = b.byuid
            WHERE b.touid='".$myid."' AND b.starred='0' AND b.unread='0' 
            ORDER BY b.timesent DESC
            LIMIT $limit_start, $items_per_page
    ";
  }else if($view=="snt")
  {
    $sql = "SELECT
            a.name, b.id, b.touid, b.unread, b.starred,b.text,b.image FROM ibwf_users a
            INNER JOIN ibwf_private b ON a.id = b.touid
            WHERE b.byuid='".$myid."'
            ORDER BY b.timesent DESC
            LIMIT $limit_start, $items_per_page
    ";
  }else if($view=="str")
  {
    $sql = "SELECT
            a.name, b.id, b.byuid, b.unread, b.starred,b.text,b.image FROM ibwf_users a
            INNER JOIN ibwf_private b ON a.id = b.byuid
            WHERE b.touid='".$myid."' AND b.starred='1'
            ORDER BY b.timesent DESC
            LIMIT $limit_start, $items_per_page
    ";
  }else if($view=="urd")
  {
    $sql = "SELECT
            a.name, b.id, b.byuid, b.unread, b.starred,b.text,b.image FROM ibwf_users a
            INNER JOIN ibwf_private b ON a.id = b.byuid
            WHERE b.touid='".$myid."' AND b.unread='1'
            ORDER BY b.timesent DESC
            LIMIT $limit_start, $items_per_page
    ";
  }else if($view=="rd")
  {
      $sql = "SELECT
            a.name, b.id, b.byuid, b.unread, b.starred,b.text,b.image FROM ibwf_users a
            INNER JOIN ibwf_private b ON a.id = b.byuid
            WHERE b.touid='".$myid."' AND b.starred='0' AND b.unread='0' 
            ORDER BY b.timesent DESC
            LIMIT $limit_start, $items_per_page
    ";
   }
  
  
  
  
    $items = sm_query($sql);
    
    while ($item = mysqli_fetch_array($items))
    {
      if($item[3]=="1")
      {
        $iml = "<img src=\"images/npm.gif\" alt=\"+\"/>";
      }else{
        if($item[4]=="1")
        {
            $iml = "<img src=\"images/spm.gif\" alt=\"*\"/>";
        }else{

        $iml = "<img src=\"images/opm.gif\" alt=\"-\"/>";
        }
      }
	  $image=$item[6];
	  if($image==""){
	  $msg = ":".htmlspecialchars((strlen($item[5])<25?$item[5]:substr($item[5], 0, 25)));}
else{
$msg = ":Image+PM";


}	  
	      $lnk = "<a href=\"inbox.php?action=readpm&amp;pmid=$item[1]&amp;sid=$sid\">$iml $item[0]</a>";
	
      echo "$lnk $msg<br/>";
    }
    echo "</div>";
    echo "<p align=\"center\">";
    
      $npage = $page+1;

    if($page>1)
    {
      $ppage = $page-1;

echo "<a href=\"inbox.php?action=display&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
	}
      
    }
    if($page<$num_pages)
    {
      $npage = $page+1;

	echo "<a href=\"inbox.php?action=display&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
	
    }
    echo "</p>";
    echo "<p align=\"center\">";
    echo "$page/$num_pages";
    echo "</p>";
    echo "<p align=\"center\">";
    if($num_pages>2)
    {

	    $rets = "<form action=\"inbox.php\" method=\"get\">";
	
	$rets .= "<input name=\"page\" style=\"-wap-input-format: '*N'\" size=\"3\"/>";
	$rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
	$rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
	$rets .= "<input type=\"hidden\" name=\"view\" value=\"$view\"/>";
	$rets .= "<input type=\"Submit\" value=\"Go To Page\" Name=\"Submit\"/></form>";

        echo $rets;
    }
  echo "<p align=\"center\">";
echo "<a href=\"inbox.php?action=main&amp;sid=$sid\">&#171;Back to Inbox</a><br/>";
echo "<a href=\"index.php?action=chat&amp;sid=$sid\">Back to Chat</a><br/>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

  
  
  
    else if($action=="readpm")
{
$pminfo = mysqli_fetch_array(sm_query("SELECT byuid FROM ibwf_private WHERE id='".$pmid."'"));
 addonline(getuid_sid($sid),"Reading PM from ".getname_uid($pminfo[0])."","");
$pstyle = gettheme($sid);
 echo xhtmlhead("Read PM",$pstyle);
 echo "<p>";

  $pminfo = mysqli_fetch_array(sm_query("SELECT text, byuid, timesent,touid, reported,image FROM ibwf_private WHERE id='".$pmid."'"));
  if(getuid_sid($sid)==$pminfo[3])
  {
    $chread = sm_query("UPDATE ibwf_private SET unread='0' WHERE id='".$pmid."'");
  }
  
  if(($pminfo[3]==getuid_sid($sid))||($pminfo[1]==getuid_sid($sid)))
  {
  
  if(getuid_sid($sid)==$pminfo[3])
  {
    if(isonline($pminfo[1]))
  {
    $iml = "<img src=\"images/onl.gif\" alt=\"+\"/>";
  }else{
    $iml = "<img src=\"images/ofl.gif\" alt=\"-\"/>";
  }
    $ptxt = "PM By: ";
    
        $bylnk = "<a href=\"index.php?action=viewuser&amp;who=$pminfo[1]&amp;sid=$sid\">$iml".getnick_uid($pminfo[1])."</a>";
 $who = $pminfo[1];

  }else{
    if(isonline($pminfo[3]))
  {
    $iml = "<img src=\"images/onl.gif\" alt=\"+\"/>";
  }else{
    $iml = "<img src=\"images/ofl.gif\" alt=\"-\"/>";
  }
    $ptxt = "PM To: ";
    
    $bylnk = "<a href=\"index.php?action=viewuser&amp;who=$pminfo[3]&amp;sid=$sid\">$iml".getnick_uid($pminfo[3])."</a>";
     $who = $pminfo[3];
  }
  //////////////////////////////////////////////

   $avatar=getavatar($who);
echo "<table width=\"100%\" align=\"left\" border=\"0\"><tr>";
echo "<td width=\"5%\">";
echo"<img src=\"$avatar\" width=\"60\" height=\"60\" alt=\"\" />";
echo"</td>";
echo "<td valign=\"top\" align=\"left\"><small>";
     echo "$ptxt $bylnk<br/>";
	echo getstatus($who);


  $tmstamp = $pminfo[2];
  $tremain = time()-$tmstamp;
  //$tmdt = date("d m Y - H:i:s", $tmstamp);
  $tmdt = gettimemsg($tremain)." ago"; ////////////////////this is the time thing
  echo "<i>$tmdt</i><br/><br/>";
  
  
  
  	  
echo"</small></td>";
echo"</tr>
</table>";
  
  
  ////////////////////////////////////////////////////////
 
  $pmtext = parsepm($pminfo[0], $sid);
    $pmtext = str_replace("/faq","<a href=\"lists.php?action=faqs&amp;sid=$sid\">Users Questions</a>", $pmtext);

  $pmtext = str_replace("/reader",getnick_uid($pminfo[3]), $pmtext);

  div();	
$image = $pminfo[5];	
if($image==""){}else{
echo"<a href=\"$pminfo[5]\"><img src=\"$pminfo[5]\" height=\"100\" width=\"100\" alt=\"*\"/></a><br/>";

}	
	
echo $pmtext;
	 	echo "</div><br/>";
   $pminfo = mysqli_fetch_array(sm_query("SELECT text, byuid, touid, reported FROM ibwf_private WHERE id='".$pmid."'"));
	echo "<form action=\"inbxproc.php?action=sendpm&amp;who=$pminfo[1]&amp;sid=$sid\" method=\"post\">";
  echo "<textarea rows=\"2\" cols=\"20\" name=\"pmtext\"></textarea><br/>";
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
</select><br/>";
  
  echo "<input type=\"submit\" value=\"Fast Reply &#187;\"/>";
echo "</form>";
echo "<a href=\"inbox.php?action=pmimage&amp;sid=$sid&amp;towho=$pminfo[1]\" class=\"btn\">Reply+Image</a><br/>";  
  echo "</p>";


	

  echo "<form action=\"inbxproc.php?action=proc&amp;sid=$sid\" method=\"post\">";
  echo "Action: <select name=\"pmact\">";
  echo "<option value=\"rep-$pmid\">Reply</option>";
  echo "<option value=\"del-$pmid\">Delete</option>";
  if(isstarred($pmid))
  {
    echo "<option value=\"ust-$pmid\">Unstar</option>";
  }else{
    echo "<option value=\"str-$pmid\">Star</option>";
  }
    echo "<option value=\"rpt-$pmid\">Report</option>";
   
  echo "</select>";
  echo "<input type=\"submit\" value=\"GO\"/>";
  echo "</form><br/>";
  
 
  
  echo "</p>";
  echo "<p align=\"center\">";
   $ires = ignoreres($uid, $pminfo[1]);
  if(es==2)
  {
    echo "<a href=\"genproc.php?action=ign&amp;who=$pminfo[1]&amp;sid=$sid&amp;todo=del\">Unblock PM</a><br/>";
  }else if($ires==1)
  {
    echo "<a href=\"genproc.php?action=ign&amp;who=$pminfo[1]&amp;sid=$sid&amp;todo=add\">Block PM</a><br/>";
  }
 
  
  
  echo "<br/><br/><a href=\"inbox.php?action=dialog&amp;sid=$sid&amp;who=$pminfo[1]\">Dialog</a>";
 
  }else{
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>This PM ain't yours";
  }
  echo "<br/><a href=\"index.php?action=chat&amp;sid=$sid\">Back to Chat</a><br/>";
    echo "<a href=\"inbox.php?action=main&amp;sid=$sid\">Back to inbox</a><br/>";
    
    
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>"; 
    echo "Home</a>";
    echo "</p>";
    
    echo xhtmlfoot();

}

   

else if($action=="dialog")
{
    addonline(getuid_sid($sid),"Viewing PM Dialog","");
          $pstyle = gettheme($sid);
  echo xhtmlhead("PM Dialog",$pstyle);
  $uid = getuid_sid($sid);
  if($page=="" || $page<=0)$page=1;
    $myid = getuid_sid($sid);
    $pms = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE (byuid=$uid AND touid=$who) OR (byuid=$who AND touid=$uid) ORDER BY timesent"));
    
    $num_items = $pms[0]; //changable
    $items_per_page= 7;
    $num_pages = ceil($num_items/$items_per_page);
    if($page>$num_pages)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;
    if($num_items>0)
    {
      echo "<p>";
      $pms = sm_query("SELECT byuid, text, timesent FROM ibwf_private WHERE (byuid=$uid AND touid=$who) OR (byuid=$who AND touid=$uid) ORDER BY timesent LIMIT $limit_start, $items_per_page");
      while($pm=mysqli_fetch_array($pms))
      {
            if(isonline($pm[0]))
  {
    $iml = "<img src=\"images/onl.gif\" alt=\"+\"/>";
  }else{
    $iml = "<img src=\"images/ofl.gif\" alt=\"-\"/>";
  }
  $bylnk = "<a href=\"index.php?action=viewuser&amp;who=$pm[0]&amp;sid=$sid\">$iml".getnick_uid($pm[0])."</a>";
  echo $bylnk;
  $tmopm = date("d m y - h:i:s",$pm[2]);
  echo " <small>$tmopm<br/>";
  
        echo parsepm($pm[1], $sid);

  
  echo "</small>";
  echo "<br/>--------------<br/>";
      }
      echo "</p><p align=\"center\">";
      if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"inbox.php?action=dialog&amp;page=$ppage&amp;sid=$sid&amp;who=$who\">&#171;PREV</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"inbox.php?action=dialog&amp;page=$npage&amp;sid=$sid&amp;who=$who\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
$rets = "<form action=\"inbox.php\" method=\"get\">";
      $rets .= "Jump to page: <input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
$rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
        $rets .= "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
$rets .= "</form>";
        echo $rets;
      }
      }else{
        echo "<p align=\"center\">";
        echo "NO DATA";
      }
      echo "<br/><br/>";
       echo "<a href=\"inbox.php?action=main&amp;sid=$sid\">Back to inbox</a><br/>";
 echo "<a href=\"index.php?action=chat&amp;sid=$sid\">Back to Chat</a><br/>";
      
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

else if($action=="pmimage")

{

$towho = $_GET["towho"];
$whose = getname_uid($towho);
addonline(getuid_sid($sid),"PM + image to $whose","");

   $pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);

  echo "<p align=\"center\">";
   
 echo "<br/><h2>Pick a Photo for send to $whose</h2>";
 div();
    echo "<form enctype=\"multipart/form-data\" method=\"post\" action=\"inbxproc.php?action=sendpm&amp;sid=$sid&amp;who=$towho\">";
    echo "<input type=\"file\" name=\"f1\" size=\"15\"><br/>";
    echo "<textarea rows=\"2\" cols=\"20\" name=\"pmtext\"></textarea><br/>";
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
    echo "<INPUT TYPE=\"submit\" name=\"upl\" VALUE=\"SenD PM\"></form>";   


  echo "</div><br/><small>Note:<br/>";   
      echo "* File size limit 512kb. If your upload does not work, try a smaller Photo.<br/>";
      echo "* Allowed formats: <b>.jpg, .gif, .bmp, .png</b><br/>";
      
  echo "</center></small></p>"; 

echo "<a href=\"inbox.php?action=main&amp;sid=$sid\">Inbox</a><br/>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"\"/>Home</a>";

    echo xhtmlfoot();

   /////////////////////////////footer

echo"</body>";
}  

else if($action=="viewu")

{

    addonline(getuid_sid($sid),"my view","");
    $pstyle = gettheme($sid);
      echo xhtmlhead("my view",$pstyle);
    //////ALL LISTS SCRIPT <<
  div();
	echo"<h2>";
    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(id) FROM ibwf_lastview WHERE whonick='".$uid."' and viwed='0'"));
echo"My views ";echo"</h2>";
    $num_items = $noi[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

    $sql = "SELECT lastview,ltime FROM ibwf_lastview  WHERE whonick='".$uid."' and viwed='0' ORDER BY id LIMIT $limit_start, $items_per_page";


    echo "<p><small>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
	
	
	
      $nick = getnick_uid($item[0]); 
     $tremain = time()-$item[1];
  //$tmdt = date("d m Y - H:i:s", $tmstamp);
  $tmdt = gettimemsg($tremain)." ago"; ////////////////////this is the time thing
	$lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">".$nick."</a> ($tmdt)<br/>";
      echo $lnk;
    
	sm_query("DELETE FROM ibwf_lastview WHERE whonick='".$uid."' and lastview='".$item[0]."'");
	}
    }
    echo "</small></div>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"inbox.php?action=$action&amp;page=$ppage&amp;sid=$sid\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"inbox.php?action=$action&amp;page=$npage&amp;sid=$sid\">Next&#187;</a>";
    }
    if($num_pages>1){
    echo "<br/>$page/$num_pages<br/>";
    }
    if($num_pages>2)
    {
 $rets = "<form action=\"inbox.php\" method=\"get\">";
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
 echo "<a href=\"inbox.php?action=main&amp;sid=$sid\">Inbox</a><br/>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"\"/>Home</a>";
    echo xhtmlfoot();

} 





    else{
      addonline(getuid_sid($sid),"Lost in inbox lol","");
            $pstyle = gettheme($sid);
  echo xhtmlhead("Inbox",$pstyle);
  echo "<p align=\"center\">";
  echo "I don't know how did you get into here, but there's nothing to show<br/><br/>";
      
     
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
    echo xhtmlfoot();
}

?>