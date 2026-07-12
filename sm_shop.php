<?php
include("gzcompress.php");
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
include("config.php");
include("core.php");
include("xhtmlfunctions.php");
connectdb();
$action = $_GET["action"];
$sid = $_GET["sid"];
mylog($sid);
$uid = getuid_sid($sid);
$itemid = isnum($_GET["itemid"]);
$page = isnum($_GET["page"]);
if($action=="main")
{
  addonline(getuid_sid($sid),"$stitle Shop","");
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle shop",$pstyle);
  
echo"<h5>SriMobile Shop</h5><div class=\"mblock1\"><center><img src=\"images/shop.jpeg\" alt=\"*\"/><br/>";


  
  echo "<b><u>Hello ".getnick_uid($uid)."</u></b><br/>";
  echo "<i><b><u>Welcome to the $stitle-Shop</u></b></i></center><br/>";
echo "<p>Send a gift to your friends and make them surprise!<br/></p>";
  
   $credits = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
 dival();
  echo "My Credits:: <b>$credits[0]</b></div>";
   echo "<p>";
     echo "<img src=\"images/shop.gif\" alt=\"*\"/><a href=\"sm_shop.php?action=shops&amp;sid=$sid&amp;id=1\">Cards</a><br/>";
  echo "<img src=\"images/shop.gif\" alt=\"*\"/><a href=\"sm_shop.php?action=shops&amp;sid=$sid&amp;id=2\">Gifts</a><br/>";
  echo "<img src=\"images/shop.gif\" alt=\"*\"/><a href=\"sm_shop.php?action=shops&amp;sid=$sid&amp;id=3\">Moto Trader</a><br/>";
   echo "<img src=\"images/shop.gif\" alt=\"*\"/><a href=\"sm_shop.php?action=shops&amp;sid=$sid&amp;id=4\">Fun@Adults</a><br/>";
  
  echo "<a href=\"sm_shop.php?action=inventory&amp;sid=$sid\">My Inventory</a><br/><br/>";
      echo "</p>";
  ////// UNTILL HERE >> 
  echo "<p align=\"center\">";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
 echo xhtmlfoot();
}

else
if($action=="shops")
{
 addonline(getuid_sid($sid),"$stitle Shop","");
 $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle shop",$pstyle);
	  echo"<h5>SM SHOP</h5>";
 

  $id = isnum($_GET["id"]);
  dival();
  if($id==2){
  
  echo "<b><u>Gifts and Gadgets</u></b><br/>";
  echo "Send a gift to best friends and make them surprise!.<br/>";
}
  if($id==3){
  
    echo "<b><u>Moto Trader</u></b><br/>";
  echo "buy yourself a new Sport Car Status<br/>";

  }

 $credits = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
echo "U have <b>$credits[0]</b> Credits!<br/>";
echo "</div>";

  if($page=="" || $page<=0)$page=1;
    $nor = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_shop WHERE itemshopid='".$id."'"));
    $num_items = $nor[0]; //changable
    $items_per_page= 4;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

	


div(); 
  
    $sql = "SELECT itemid, itemname, itmeprice, itemshopid, avail,icon FROM ibwf_shop WHERE itemshopid='".$id."'ORDER BY itemid DESC LIMIT $limit_start, $items_per_page";

    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
       echo "<img src=\"$item[5]\" alt=\"*\"/><br/>";  
	   
	   
	   

    echo "$item[1]<br/>";
    echo " <small>Price: <b>$item[2] Credits</b></small><br/>";
    echo " Availible: <b>$item[4]</b><br/>";
    echo " <a href=\"sm_shop.php?action=buy&amp;itemid=$item[0]&amp;sid=$sid\">Buy Item</a><br/><br/>";
       
    }
    }

        
  
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
  $rets = "<form action=\"lists.php\" method=\"get\">";
      $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
         $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
         $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
		 $rets .= "<input type=\"hidden\" name=\"id\" value=\"$id\"/>";
         $rets .= "</form>";

        echo $rets;
    }
    echo "</p>";
  
  
  
  ////// UNTILL HERE >> 
  echo "<p align=\"center\">";
   echo "<a href=\"sm_shop.php?action=main&amp;sid=$sid\">Back to Shop</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
      echo "</p>";
  echo xhtmlfoot();
}


else
if($action=="inventory")
{
  addonline(getuid_sid($sid),"$stitle Shop","");
  $pstyle = gettheme($sid);
      echo xhtmlhead("inventory",$pstyle);
  echo"<h5>Inventory</h5>"; dival();
  
  
  echo "<i><b><u>Inventory:</u></b></i><br/>";

  echo "</div>";
div();
  if($page=="" || $page<=0)$page=1;
    $nor = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_shop_Inventory WHERE uid='".$uid."'"));
    $num_items = $nor[0]; //changable
    $items_per_page= 4;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

	
	
     $sql = "SELECT itemid FROM ibwf_shop_Inventory WHERE uid='".$uid."'ORDER BY time DESC LIMIT $limit_start, $items_per_page";

    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
    $shopitem = mysqli_fetch_array(sm_query("SELECT itemid, itemname, itemshopid,icon FROM ibwf_shop WHERE itemid='".$item[0]."'"));
      echo"<img src=\"$shopitem[3]\" alt=\"*\"/><br/>";
    echo "$shopitem[1]<br/>";

    if($shopitem[2]=='3'){
    echo " <small><a href=\"sm_shop.php?action=useitem&amp;itemid=$shopitem[0]&amp;sid=$sid\">Use Status</a></small><br/><br/>";
    }
    else
  {
    echo " <small><a href=\"sm_shop.php?action=useitem&amp;itemid=$shopitem[0]&amp;sid=$sid\">Use Item</a></small><br/><br/>";
    }
   
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
  echo "<a href=\"sm_shop.php?action=main&amp;sid=$sid\">Back to Shop</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
else if($action=="buy")
{
 addonline(getuid_sid($sid),"$stitle Shop","");
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle shop",$pstyle);
  echo"<h5>BUY</h5>"; dival();
  

  $credits = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
  $items = mysqli_fetch_array(sm_query("SELECT itemname, itmeprice, itemshopid, avail FROM ibwf_shop WHERE itemid='".$itemid."'"));
  

  echo "<b><u>$items[0]</u></b><br/>";

  echo "</div>";

  
  if($items[3]>0){
  
  if($items[1]>$credits[0]){
  diver();
  echo "You don't have enough credits to buy this itme.<br/></div>";
  }else{
  
  $reg = sm_query("INSERT INTO ibwf_shop_Inventory SET uid='".$uid."', itemid='".$itemid."', time='".time()."'");  
  
  $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
  $ugpl = $ugpl[0] - $items[1];
  sm_query("UPDATE ibwf_users SET plusses='".$ugpl."' WHERE id='".$uid."'");
  
  $totitems = mysqli_fetch_array(sm_query("SELECT avail FROM ibwf_shop WHERE itemid='".$itemid."'"));
  $totitems = $totitems[0] - 1;
  sm_query("UPDATE ibwf_shop SET avail='".$totitems."' WHERE itemid='".$itemid."'");
    divok();
  echo "Congrats, you have just bought the $items[0]<br/></div>";

  }
  }else{
      diver();
  echo "Out Of Stock, We Restock every Month</div>";
  }
  

  ////// UNTILL HERE >> 
  echo "<p align=\"center\">";
   echo "<a href=\"sm_shop.php?action=main&amp;sid=$sid\">Back to Shop</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
  }
 else

if($action=="useitem")
{
  addonline(getuid_sid($sid),"$stitle Shop","");
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle shop",$pstyle);
  echo "<p align=\"center\">";

  $credits = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
  $items = mysqli_fetch_array(sm_query("SELECT itemname, itmeprice, itemshopid,icon FROM ibwf_shop WHERE itemid='".$itemid."'"));
  
  $numberitems = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_shop_Inventory WHERE uid='".$uid."' and itemid='".$itemid."'"));
  
  if($numberitems[0]>0)
  {  
  echo"<img src=\"$items[3]\" alt=\"*\"/><br/>";
  echo "<b><u>Use $items[0]</u></b><br/>";
  if($items[2]==3){
  echo "<a href=\"sm_shop.php?action=changest&amp;sid=$sid&amp;itemid=$itemid\">Change Status</a>";
  }else{
  echo "<a href=\"sm_shop.php?action=sendtom&amp;sid=$sid&amp;itemid=$itemid\">Send to Member</a><br/>";
  }
  }else{
  echo "<b><u>You don't have this item in your Inventory.<br/>If you want to use it, go and buy it.</u></b><br/>";
  }
  
  echo "</p>";
  

  ////// UNTILL HERE >> 
  echo "<p align=\"center\">";
    echo "<a href=\"sm_shop.php?action=main&amp;sid=$sid\">Back to Shop</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
} 
 else

if($action=="changest")
{
  addonline(getuid_sid($sid),"$stitle Shop","");
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle shop",$pstyle);
  echo "<p align=\"center\">";
  


  $items = mysqli_fetch_array(sm_query("SELECT itemname, itmeprice, itemshopid,icon FROM ibwf_shop WHERE itemid='".$itemid."'"));  
  $numberitems = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_shop_Inventory WHERE uid='".$uid."' and itemid='".$itemid."'"));  
  
  if($numberitems[0]>0)
  {    
  
  $res = sm_query("UPDATE ibwf_users SET shopssid='".$itemid."' WHERE id='".$uid."'");
  if($res){
echo"<img src=\"$items[3]\" alt=\"*\"/><br/>";
    divok();
  echo "Your new Status is $items[0]</div>";
  $itemidd = mysqli_fetch_array(sm_query("SELECT itemid FROM ibwf_shop WHERE itemname='".$items[0]."'"));
  $delitem = sm_query("DELETE FROM ibwf_shop_Inventory WHERE uid='".$uid."' and itemid='".$itemidd[0]."'");
  }else{
  diver();
  echo "<b><u>Oops, Database fail.</u></b><br/></div>";
  }
  }else{
    diver();
  echo "<b><u>Oops, you can't use this status.</u></b><br/></div>";
  }
  
  
  echo "</p>";
  
  echo "<p>"; 
  
  echo "</p>";
  ////// UNTILL HERE >> 
  echo "<p align=\"center\">";
    echo "<a href=\"sm_shop.php?action=main&amp;sid=$sid\">Back to Shop</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
} 
 else

if($action=="sendtom")
{
  addonline(getuid_sid($sid),"$stitle Shop","");
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle shop",$pstyle);
  echo "<p align=\"center\">";
  



  $items = mysqli_fetch_array(sm_query("SELECT itemname, itmeprice, itemshopid,icon FROM ibwf_shop WHERE itemid='".$itemid."'"));  
  $numberitems = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_shop_Inventory WHERE uid='".$uid."' and itemid='".$itemid."'"));  
  
  if($numberitems[0]>0)
  {    
   echo"<img src=\"$items[3]\" alt=\"*\"/><br/>"; 
  echo "Send <i>$items[0]</i> to:<br/>";
  echo "<form action=\"sm_shop.php?action=sendto&amp;sid=$sid\" method=\"post\">";
  echo "User: <input name=\"who\" format=\"*x\" maxlength=\"15\"/><br/>";
  echo "Message: <input name=\"pmtext\" maxlength=\"500\"/><br/>";
    echo "<input type=\"hidden\" name=\"pmitem\" value=\"$items[0]\"/>";
echo "<input type=\"submit\" value=\"SEND\"/>";
echo "</form>";


  
  }else{
  echo "<b><u>Oops, you can't send this item.</u></b><br/>";
  }
  
  
  echo "</p>";
  
  echo "<p>"; 
  
  echo "</p>";
  ////// UNTILL HERE >> 
 echo "<p align=\"center\">";
  echo "<a href=\"sm_shop.php?action=main&amp;sid=$sid\">Back to Shop</a><br/>";
 echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
 echo "Home</a>";
 echo "</p>";
  echo xhtmlfoot();
} 
else if($action=="sendto")
{
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle shop",$pstyle);
echo "<p align=\"center\">";


  $pmtou = $_POST["pmtou"];
 $pmtext = $_POST["pmtext"];
 $pmitme = $_POST["pmitem"];
 

$nick = getname_uid($uid);

$who = $_POST["who"];
 $who = getuid_nick($who);
  

  if(!isuser($who))
  {
  echo "<img src=\"images/notok.gif\" alt=\"x\"/>User Does Not Exist<br/>";
  }else{
 $whonick = getnick_uid($who);
$byuid = $uid;
 $tm = time() ;
 $lastpm = mysqli_fetch_array(sm_query("SELECT MAX(timesent) FROM ibwf_private WHERE byuid='".$byuid."'"));
  $pmfl = $lastpm[0]+getpmaf();
  if($pmfl<$tm)
  {
  if(!isblocked($pmtext,$byuid))
  {
  if((!isignored($byuid, $who))&&(!istrashed($byuid)))
 {

 $pmitemtext = "[i][user=$who]$nick [/user] has sent  you a gift -[b] $pmitme [/b]check it in [u]SM-shop > My inventory[/u][/i]**[br/][br/]$pmtext";
 $res = sm_query("INSERT INTO ibwf_private SET text='".$pmitemtext."', byuid='".$byuid."', touid='".$who."', timesent='".$tm."'");
  }else{
    $res = true;
  }
  if($res)
  { divok();
    echo "<img src=\"images/ok.gif\" alt=\"O\"/>";
    echo "Item was sent successfully to $whonick<br/><br/>";
    echo parsepm($pmitemtext, $sid);
    $itemidd = mysqli_fetch_array(sm_query("SELECT itemid FROM ibwf_shop WHERE itemname='".$pmitme."'"));
    $delitem = sm_query("DELETE FROM ibwf_shop_Inventory WHERE uid='".$byuid."' and itemid='".$itemidd[0]."'");
    $reg = sm_query("INSERT INTO ibwf_shop_Inventory SET uid='".$who."', itemid='".$itemidd[0]."', time='".time()."'");  
echo"</div>";
  }else{
  diver();
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>";
    echo "Can't Send Item to $whonick<br/><br/></div>";
  }
  }
  }

    }
   echo "<br/><a href=\"sm_shop.php?action=main&amp;sid=$sid\">Back to ShoP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

else
{
  addonline(getuid_sid($sid),"Lost in Shop","");
  $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle shop",$pstyle);
  echo "<p align=\"center\">";
  echo "I don't know how did you get into here, but there's nothing to show<br/><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

?>