<?php
include("xhtmlfunctions.php");
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
include("config.php");
include("core.php");
connectdb();
$action = $_GET["action"];
$sid = $_GET["sid"];
mylog($sid);
$uid = getuid_sid($sid);

    
if($action=="main")
{
  addonline(getuid_sid($sid),"$stitle Bank","sm_bank.php?action=main");
 $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle Bank",$pstyle);
  echo "<h5>SM Bank</h5><p>";
  
  $nick = getnick_sid($sid);
  $who = getuid_nick($nick);
   echo "<img src=\"images/ayu.gif\" alt=\"\"/><br/>";
  echo "<b><u>AYubOwan $nick!!</u></b><br/>";
  echo "<br/>";

 echo "<i>Welcome to SriMobile Bank!! </i><br/>";
  echo "Deposit Ur Credits in $stitle bank and get <b>1% interest Daily!!</b><br/>";
$credits = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$who."'"));
$bank = mysqli_fetch_array(sm_query("SELECT bank FROM ibwf_users WHERE id='".$who."'"));
 echo"<br/>";
 echo "<img src=\"images/star.gif\" alt=\"*\"/><a href=\"sm_bank.php?action=by&amp;sid=$sid\">Buy Credits!</a><img src=\"images/star.gif\" alt=\"*\"/><br/>";
 echo "U have <b>$credits[0]</b> Credits in Pocket!<br/>";
    echo "U have <b>$bank[0]</b> Credits in Bank!<br/>"; 
	div();
   echo "<a href=\"sm_bank.php?action=dep&amp;sid=$sid\">&#187; Deposit Credits</a><br/>";
   echo "<a href=\"sm_bank.php?action=get&amp;sid=$sid\">&#187; Withdraw Credits</a><br/>";
   echo "<a href=\"sm_bank.php?action=by&amp;sid=$sid\">&#187; Buy Credits!</a><br/>";
    echo "<a href=\"sm_bank.php?action=topt&amp;sid=$sid\">&#187; Top Transactors!</a><br/>";
   echo "<a href=\"sm_bank.php?action=mis&amp;sid=$sid\">&#187; Our Aim</a><br/>";
 echo"</div></p>";
  ////// UNTILL HERE >> 
  echo "<p align=\"center\">";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";

  echo "</p>";
 echo xhtmlfoot();
}else


if($action=="dep1")
{
  addonline(getuid_sid($sid),"$stitle Bank","sm_bank.php?action=main");
 $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle Bank",$pstyle);
  echo "<h5>SM Bank</h5><p>";
  
  $nick = getnick_sid($sid);
  $who = getuid_nick($nick);
  
  echo "<b><u>Deposit Credits!</u></b><br/>";
  echo "Here You are about to Deposit Your Hardly Earned Credits in $stitle bank!<br/>";
$credits = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$who."'"));
$bank = mysqli_fetch_array(sm_query("SELECT bank FROM ibwf_users WHERE id='".$who."'"));
 
  echo "U have <b>$credits[0]</b> Credits in Pocket!<br/>";
    echo "U have <b>$bank[0]</b> Credits in Bank!<br/>";
  echo "</p>";
  echo "<p>";  
  
    
  
    echo " <b>Type here the Amount U gonna deposit</b>  <br/>";

echo "<form action=\"sm_bank.php?action=dep2&amp;sid=$sid\" method=\"post\">";
echo "<input name=\"ptg\" format=\"*N\" maxlength=\"5\"/>";
echo "<input type=\"submit\" value=\"Deposit now!\"/>";
echo "</form>";
  
	
	
  
  echo "</p>";
  ////// UNTILL HERE >> 
  echo "<p align=\"center\">";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
 echo xhtmlfoot();
}else
if($action=="get")
{
  addonline(getuid_sid($sid),"$stitle Bank","sm_bank.php?action=main");
$pstyle = gettheme($sid);
      echo xhtmlhead("$stitle Bank",$pstyle);
  echo "<h5>SM Bank</h5><p>";
  
  $nick = getnick_sid($sid);
  $who = getuid_nick($nick);
  
  echo "<b><u>Withdraw Credits</u></b><br/>";
  echo "U can Get Back Ur Credits From AW Bank now.<br/>";
$credits = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$who."'"));
$bank = mysqli_fetch_array(sm_query("SELECT bank FROM ibwf_users WHERE id='".$who."'"));
 
  echo "U have <b>$credits[0]</b> Credits in Pocket!<br/>";
    echo "U have <b>$bank[0]</b> Credits in Bank!<br/>";
  echo "</p>";
  echo "<p>";  
  
    
   
  
    echo " <b>Type here the Amount U gonna Withdraw</b>  <br/>";
	echo "<form action=\"sm_bank.php?action=get2&amp;sid=$sid\" method=\"post\">";
echo "<input name=\"ptg\" format=\"*N\" maxlength=\"5\"/>";
echo "<input type=\"submit\" value=\"withdraw now\"/>";
echo "</form>";
  
  
	
	
  
  echo "</p>";
  ////// UNTILL HERE >> 
  echo "<p align=\"center\">";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
 echo xhtmlfoot();
}else

if($action=="dep")
{
  addonline(getuid_sid($sid),"$stitle Bank","sm_bank.php?action=main");
 $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle Bank",$pstyle);
  echo "<h5>SM Bank</h5><p>";

  
  echo "<b><u>Deposit Credits!</u></b><br/>";
  echo "
  
   *if u dont have much credits to deposit contact an online staff member and ask how to earn much credits.<br/>
  *U can deposit any amount of credits.<br/>
 *we add u 1% intersts in everyday.<br/>
 *U can withdraw ur Credits+interest in any time.<br/>

  
  <br/>";

  echo "<a href=\"sm_bank.php?action=dep1&amp;sid=$sid\">OK, I want to Deposit My credits Now</a>";
  
  echo "</p>";
  ////// UNTILL HERE >> 
  echo "<p align=\"center\">";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
 echo xhtmlfoot();
}else


if($action=="mis")
{
  addonline(getuid_sid($sid),"$stitle Shop","sm_bank.php?action=main");
  $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle Bank",$pstyle);
  echo "<h5>SM Bank</h5><p>";
  
  
  echo "<b><u>Our Aim</u></b><br/>";
  echo " Hello $nick we r proud to say dat u r in da <i>1st wap-bank 
 in the world </i>, U can get an interests for ur hardly earned credits.Our target is to make wealthy ppl in da wap as wel as in real life,
 so be the best Transactor in our bank..Now other noobs may Copy us, but we Promise u, We do more than them! Maximum fUn from $stitle! 
 <br/><b> Good Luck!! </b><br/>
 
 <i>-$stitle team-</i><br/>";

  echo "</p>";
  
  ////// UNTILL HERE >> 
  echo "<p align=\"center\">";
   echo "<a href=\"sm_bank.php?action=main&amp;sid=$sid\">Back to Bank</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
 echo xhtmlfoot();
}
else


if($action=="by")
{
  addonline(getuid_sid($sid),"$stitle Shop","sm_bank.php?action=main");
  $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle Bank",$pstyle);
  echo "<h5>SM Bank</h5><p>";

 
  echo "Buy Credits<br/><br/>

You Can buy SM Credits for this prices<br/><br/>

<img src=\"images/star.gif\" alt=\"*\"/> 100,000 Crdtz - Rs.50<br/><br/>

If u in Sri Lanka U can send Airtel/dialog/Mobitel Pins for the value of u buying creditz <br/><br/>


PM to Cash If u want to BUY Credits.. <br/><br/>
 
 <i>-$stitle team-</i><br/>";

  echo "</p>";
  
  ////// UNTILL HERE >> 
  echo "<p align=\"center\">";
   echo "<a href=\"sm_bank.php?action=main&amp;sid=$sid\">Back to Bank</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
 echo xhtmlfoot();
}
else if($action=="get2")
{
  addonline(getuid_sid($sid),"$stitle Bank","");
 $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle Bank",$pstyle);
  echo "<p align=\"center\">";
  

   
	 $ptg = isnum($_POST["ptg"]);
 
  $credits = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
  $bank = mysqli_fetch_array(sm_query("SELECT bank FROM ibwf_users WHERE id='".$uid."'"));
  
 
  
  

  echo "<b><u>Withdraw credits!</u></b><br/>";

  echo "</p>";
  echo "<p>";  
  
 
  if($bank[0]>=$ptg){


 
 
  
  $ugpl = mysqli_fetch_array(sm_query("SELECT bank FROM ibwf_users WHERE id='".$uid."'"));
  $ugpl = $ugpl[0] - $ptg;
  sm_query("UPDATE ibwf_users SET bank='".$ugpl."' WHERE id='".$uid."'");
  
  
  
    $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
  $ugpl = $ugpl[0] + $ptg;

  sm_query("UPDATE ibwf_users SET plusses='". $ugpl."' WHERE id='".$uid."'");
   
  
  

  
  echo "U Have Successfully withdraw $ptg credits from the bank<br/>";

  }else{
         echo "<img src=\"images/notok.gif\" alt=\"x\"/>You don't have
enough Credits to withdraw<br/>";
       }

  

  
  echo "</p>";
  ////// UNTILL HERE >> 
  echo "<p align=\"center\">";
   echo "<a href=\"sm_bank.php?action=main&amp;sid=$sid\">Back to Bank</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
 echo xhtmlfoot();
}

//////////////////////////////////Most Credits List

else if($action=="topt")
{
    addonline(getuid_sid($sid),"Top transactors","sm_bank.php?action=$action");
  $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle Bank",$pstyle);
    echo "<p align=\"center\">";
    echo "<b>Top transactors in SM bank (Top Ten)</b>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<
    
        if($page=="" || $page<=0)$page=1;
    $num_items = regmemcount(); //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

    //changable sql

        $sql = "SELECT id, name, bank FROM ibwf_users WHERE perm='0' ORDER BY bank DESC LIMIT $limit_start, $items_per_page";

    echo "<p>";
    $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
      $lnk = "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">$item[1]</a> <small>Deposits: $item[2]</small>";
      echo "$lnk<br/>";
    }
    }
    echo "</p>";

  ////// UNTILL HERE >>
    echo "<p align=\"center\">";
    echo "<a href=\"sm_bank.php?action=main&amp;sid=$sid\">";
echo "Back to Bank</a><br/>";
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
   echo xhtmlfoot();
}
else

if($action=="dep2")
{
  addonline(getuid_sid($sid),"$stitle Bank","");
 $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle Bank",$pstyle);
  echo "<p align=\"center\">";
 

	 $ptg = isnum($_POST["ptg"]);
  $nick = getnick_sid($sid);
  $who = getuid_nick($nick);
  $credits = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
  $bank = mysqli_fetch_array(sm_query("SELECT bank FROM ibwf_users WHERE id='".$uid."'"));
  
 
  
  

  echo "<b><u>Deposit Credits!</u></b><br/>";

  echo "</p>";
  echo "<p>";  
  
 
  if($credits[0]>=$ptg){


 
 
  
  $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
  $ugpl = $ugpl[0] - $ptg;
  sm_query("UPDATE ibwf_users SET plusses='".$ugpl."' WHERE id='".$uid."'");
  
  
  
    $ugpl = mysqli_fetch_array(sm_query("SELECT bank FROM ibwf_users WHERE id='".$uid."'"));
  $ugpl = $ugpl[0] + $ptg;

  sm_query("UPDATE ibwf_users SET bank='". $ugpl."' WHERE id='".$uid."'");
   
  
  

  
  echo "U Have Successfully deposit $ptg credits in the bank<br/>";

  }else{
         echo "<img src=\"images/notok.gif\" alt=\"x\"/>You don't have
enough Credits to Deposit in the Bank<br/><br/>Dont worry, Plz contact an online Staff member and ask How to earn much Credits..<br/>";
       }

  

  
  echo "</p>";
  ////// UNTILL HERE >> 
  echo "<p align=\"center\">";
   echo "<a href=\"sm_bank.php?action=main&amp;sid=$sid\">Back to Bank</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
 echo xhtmlfoot();
}


else
{
  addonline(getuid_sid($sid),"Lost in Bank","");
 $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle Bank",$pstyle);
  echo "<p align=\"center\">";
  echo "I don't know how did you get into here, but there's nothing to show<br/><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
   echo xhtmlfoot();
}

?>