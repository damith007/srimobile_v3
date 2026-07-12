<?php
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
include("config.php");
include("core.php");
$bcon = connectdb();
include("xhtmlfunctions.php");
$action = $_GET["action"];
$sid = $_GET["sid"];
mylog($sid);
$uid = getuid_sid($sid);
/////////////////////////////////
 if($action == "padventure")
{
     addonline(getuid_sid($sid), "playing Adventure", "");
$pstyle = gettheme($sid);
    echo xhtmlhead("Adven",$pstyle);
     $view = $_GET["view"];
     if($view == "")$view = "date";
    
   
    
     echo "<p align=\"center\">";
     echo "<img src=\"images/roll.gif\" alt=\"*\"/><br/>";
     echo "<small>How great... Wanna play  Adventure? good luck and enjoy killing!</small>";
     echo "</p>";
     // ////ALL LISTS SCRIPT <<
    echo "<p align=\"center\">";
     echo "<a href=\"games.php?action=go&amp;sid=$sid\">&#187;Go</a><br/>";
     echo "</p>";
     // //// UNTILL HERE >>
    echo "<p align=\"center\">";
     echo "<a href=\"index.php?action=funm&amp;sid=$sid\"><img src=\"images/roll.gif\" alt=\"*\"/>";
    echo "Fun/Games</a><br/>";
     echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
    echo "Home</a>";
     echo "</p>";
    
     echo "<br/>";
     echo "</body>";
     echo "</html>";
    
    }
else if($action == "go")
{
     addonline(getuid_sid($sid), "playing Adventure", "");
$pstyle = gettheme($sid);
    echo xhtmlhead("Adven",$pstyle);
     $view = $_GET["view"];
     if($view == "")$view = "date";
    
    

    
     echo "<p align=\"center\">";
     echo "<big><b>ChatBeta Adventure</b></big><br/>";
     echo "<b><small>Mania!</small></b>";
     echo "</p>";
    
    
     if(getplusses(getuid_sid($sid)) < 100)
        {
         echo "You need at least 100 plusses to play adventure!";
         }
    
    // ////ALL LISTS SCRIPT <<
    echo "<p align=\"center\">";
    echo "<small><u>Choose Hero:</u></small><br/>";
    echo "<a href=\"games.php?action=a&amp;sid=$sid\">King SM</a><br/>";
    echo "<a href=\"games.php?action=b&amp;sid=$sid\">King Rohan</a><br/>";
    echo "<a href=\"games.php?action=c&amp;sid=$sid\">King Xyve</a><br/>";
    // echo "<a href=\"games.php?action=d&amp;sid=$sid\">King Richard</a>, <a href=\"games.php?action=e&amp;sid=$sid\">King Lothor</a>
    echo "</p>";
    
    
     // //// UNTILL HERE >>
    echo "<p align=\"center\">";
     echo "<a href=\"index.php?action=funm&amp;sid=$sid\">Fun N Games</a><br/>";
     echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
    echo "Home</a>";
     echo "</p>";
     echo "<br/>";
    
     echo "</body>";
     echo "</html>";
    
    }
if($action == "a")
{
     addonline(getuid_sid($sid), "Adventuring King SM", "");
$pstyle = gettheme($sid);
    echo xhtmlhead("Adven",$pstyle);
     echo "<head>";
     echo "<title>Adventure</title>";
     echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../themes/$theme[0]\">";
     echo "</head>";
     echo "<body>";
     echo "<p align=\"center\">";
    
     // ////ALL LISTS SCRIPT <<
    $num1 = rand(1, 5);
    
     $uid = mysqli_fetch_array(sm_query("SELECT uid FROM ibwf_ses WHERE id='" . $sid . "'"));
     $uid = $uid[0];
    $usrid = $uid;
     echo "<b><u>$adven $version</u></b><br/>";
     echo "<b>King SM $adven</b><br/>";
     echo "<small><u>You are armored with 3 sword and magical powers, try to kill your enemy!</u></small>";
     echo "<p align=\"center\">";
     echo "<a href=\"games.php?action=a&amp;sid=$sid\">Sword Attack</a><br/>";
     echo "<a href=\"games.php?action=a&amp;sid=$sid\">Kick</a><br/>";
     echo "<a href=\"games.php?action=a&amp;sid=$sid\">Magic</a><br/>";
     echo "</p>";
     $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
     $ugpl = $ugpl[0];
     echo "<p align=\"center\">";
     echo "Golden Plusses: <b>$ugpl</b><br/>";
     $power = rand(50, 100);
     echo "Power: <b>$power</b> <br/>";
     $damage = rand(0, 100);
     $evil = Monster;
     $gold = rand(30, 100);
    
    if ($num1 == 1){
         $num = rand(1, 3);
         echo "You hit $evil with damage $damage. You've Won $gold Gold!";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl + "$gold";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        
        echo "<br/>";
        }
    if ($num1 == 2){
         $num = rand(1, 3);
         echo "You hit $evil with damage $damage,but he return 2 kick for you with damage $gold. You've been attacked and Lost $gold gold!";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl - "$gold";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        
        echo "<br/>";
        }
    if ($num1 == 3){
         $num = rand(1, 3);
         echo "You hit $evil damaging him $damage %. Then $evil return magic attack to you, damaging you $damage %. You draw! Minus 10 plusses for that attack";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl - "10";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        
        echo "<br/>";
        }
    if ($num1 == 4){
         $num = rand(1, 3);
         echo "You hit $evil with a damage of $damage %. Then $evil return a scratch attack to you $gold %. You draw! Minus $gold plusses for that attack";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl - "$gold";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        echo "<br/>";
        }
    if ($num1 == 5){
         $num = rand(1, 3);
         echo "You hit $evil damaging him 0%. Miss... Miss! Miss! Minus 10 plusses for that attack";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl - "10";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        echo "</p>";
        echo "<br/>";
        }
    echo "<small><a href=\"index.php?action=funm&amp;sid=$sid\">Fun N Games</a></small>";
    echo "<br/>----------<br/>";
     echo "<a accesskey=\"0\" href=\"index.php?action=main&amp;sid=$sid\"><img src=\"../images/home.gif\" alt=\"\"/>Home</a>";
     echo "</p>";
    
    
     echo "</body>";
     echo "</html>";
    
    
    }
if($action == "b")
{
     addonline(getuid_sid($sid), "ADVENTURING Hero Rohan", "");
$pstyle = gettheme($sid);
    echo xhtmlhead("Adven",$pstyle);
     echo "<head>";
     echo "<title>Adventure</title>";
     echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../themes/$theme[0]\">";
     echo "</head>";
     echo "<body>";
     echo "<p align=\"center\">";
    
     // ////ALL LISTS SCRIPT <<
    $num2 = rand(1, 9);
    
     $uid = mysqli_fetch_array(sm_query("SELECT uid FROM ibwf_ses WHERE id='" . $sid . "'"));
     $uid = $uid[0];
    $usrid = $uid;
     echo "<b><u>$adven $version</u></b><br/>";
     echo "<b>King Rohan $adven</b><br/>";
     echo "<small><u>You are armored with Special Axe and magical powers, try to let your enemy with low lifepower!</u></small><br/>";
     echo "<p align=\"center\">";
     echo "<a href=\"games.php?action=b&amp;sid=$sid\">Sword Attack</a><br/>";
     echo "<a href=\"games.php?action=b&amp;sid=$sid\">Kick</a><br/>";
     echo "<a href=\"games.php?action=b&amp;sid=$sid\">Magic</a><br/>";
     echo "</p>";
     $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
     $ugpl = $ugpl[0];
     echo "<p align=\"center\">";
     echo "Golden Plusses: <b>$ugpl</b><br/>";
     $power = rand(50, 100);
     echo "Power: <b>$power</b><br/>";
     $damage = rand(0, 100);
     $evil2 = Darklord;
     $gold = rand(30, 100);
     $magic = rand(60, 93);
     $level = 2;
     $level2 = 3;
     $low = 1;
    if ($num2 == 1){
         $num = rand(1, 3);
         echo "You hit $evil2 with damage $damage. You've Won $gold Gold!";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl + "$gold";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        echo "<br/>";
        }
    if ($num2 == 2){
         $num = rand(1, 3);
         echo "You hit $evil2 with damage $damage,but he return 2 body and $low high kick for you with damage $gold. You've been attacked and Lost $gold gold!";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl - "$gold";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        echo "<br/>";
        }
    if ($num2 == 3){
         $num = rand(1, 3);
         echo "You cast magic $magic % with a hit to $evil2 damaging him $damage %. Then $evil2 return magic attack to you, damaging you $damage %. You draw! Minus 10 plusses for that attack";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl - "10";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        echo "<br/>";
        }
    if ($num2 == 4){
         $num = rand(1, 3);
         echo "You hit $evil2 with a damage of $damage %. Then $evil2 return <b>dark spell attack</b> to you $gold %. You draw! Minus $gold plusses for that attack";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl - "$gold";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        echo "<br/>";
        }
    if ($num2 == 5){
         $num = rand(1, 3);
         echo "You hit $evil2 damaging him 0%. Miss... Miss! Miss! Minus 10 plusses for that attack";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl - "10";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        echo "<br/>";
        }
    if ($num2 == 6){
         $num = rand(1, 3);
         echo "You hit $evil2 damaging him  100%. level up $level2. You are a GODLIKE! Plus 90 plusses for that attack";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl + "90";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        echo "<br/>";
        }
    if ($num2 == 7){
         $num = rand(1, 3);
         echo "You hit $evil2 damaging him 40%. Level up to $level You win 50 plusses for that attack";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl + "50";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        echo "<br/>";
        }
    if ($num2 == 8){
         $num = rand(1, 3);
         echo "You did not hit $evil2 . He jump faster than your attack! <b>Miss... Miss! Miss!</b> Minus 10 plusses for that attack";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl - "10";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        echo "<br/>";
        }
    if ($num2 == 9){
         $num = rand(1, 3);
         echo "You hit $evil2 $damage % damage, but he hit you 99 % damage. Minus 99 plusses for that attack";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl - "99";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        echo "<br/>";
        }
    echo "<small><a href=\"index.php?action=funm&amp;sid=$sid\">Fun N Games</a></small>";
    echo "<br/>----------<br/>";
     echo "<a accesskey=\"0\" href=\"index.php?action=main&amp;sid=$sid\"><img src=\"../images/home.gif\" alt=\"\"/>Home</a>";
     echo "</p>";
     echo "</body>";
     echo "</html>";
    
    
    }
if($action == "c")
{
     addonline(getuid_sid($sid), "ADVENTURING Hero Rohan", "");
$pstyle = gettheme($sid);
    echo xhtmlhead("Adven",$pstyle);
     echo "<head>";
     echo "<title>Adventure $version</title>";
     echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../themes/$theme[0]\">";
     echo "</head>";
     echo "<body>";
     echo "<p align=\"center\">";
    
     // ////ALL LISTS SCRIPT <<
    $num2 = rand(1, 9);
    
     $uid = mysqli_fetch_array(sm_query("SELECT uid FROM ibwf_ses WHERE id='" . $sid . "'"));
     $uid = $uid[0];
    $usrid = $uid;
     echo "<b><u>$adven $version</u></b><br/>";
     echo "<b>King Xyve $adven</b><br/>";
     echo "<small><u>You are armored with Two bladed Samorai and Fire powers, try to let your enemy with low life stat!</u></small><br/>";
    
     echo "<p align=\"center\">";
     echo "<a href=\"games.php?action=c&amp;sid=$sid\">Sword Attack</a><br/>";
     echo "<a href=\"games.php?action=c&amp;sid=$sid\">Kick</a><br/>";
     echo "<a href=\"games.php?action=c&amp;sid=$sid\">Magic</a><br/>";
    
     echo "</p>";
     $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
     $ugpl = $ugpl[0];
     echo "<p align=\"center\">";
     echo "Golden Plusses: <b>$ugpl</b><br/>";
     $power = rand(50, 100);
     echo "Power: <b>$power</b><br/>";
     $damage = rand(0, 100);
     $evil3 = HeadDragon;
     $gold = rand(30, 100);
     $magic = rand(60, 93);
     $level = 2;
     $level2 = 3;
     $low = 1;
    if ($num2 == 1){
         $num = rand(1, 3);
         echo "You hit $evil3 with damage $damage. You've Won $gold Gold!";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl + "$gold";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        echo "<br/>";
        }
    if ($num2 == 2){
         $num = rand(1, 3);
         echo "You hit $evil3 with damage $damage,but he return 2 kick for you with damage $magic . You've been attacked and Lost $gold gold!";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl - "$gold";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        echo "<br/>";
        }
    if ($num2 == 3){
         $num = rand(1, 3);
         echo "You cast magic $magic % with a hit to $evil3 damaging him $damage %. Then $evi3 return magic attack to you, damaging you $damage %. You draw! Minus 10 plusses for that attack";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl - "10";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        echo "<br/>";
        }
    if ($num2 == 4){
         $num = rand(1, 3);
         echo "You hit $evil3 with a damage of $damage %. Then $evil2 return <b>hold spell attack</b> to you $gold %. You draw! Minus $gold plusses for that attack";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl - "$gold";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        echo "<br/>";
        }
    if ($num2 == 5){
         $num = rand(1, 3);
         echo "You hit $evil3 damaging him 0%. Miss... Miss! Miss! Minus 10 plusses for that attack";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl - "10";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        echo "<br/>";
        }
    if ($num2 == 6){
         $num = rand(1, 3);
         echo "You hit $evil3 damaging him  100%. You are a GODLIKE! Plus 98 plusses for that attack";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl + "90";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        echo "<br/>";
        }
    if ($num2 == 7){
         $num = rand(1, 3);
         echo "You hit $evil3 damaging him 70%. Level up to $level2 You win 50 plusses for that attack";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl + "50";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        echo "<br/>";
        }
    if ($num2 == 8){
         $num = rand(1, 3);
         echo "You did not hit $evil3 . He ran faster than your attack! <b>Miss... Miss! Miss!</b> Minus 10 plusses for that attack";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl - "10";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        echo "<br/>";
        }
    if ($num2 == 9){
         $num = rand(1, 3);
         echo "You hit $evil3 $damage % damage, but he hit you 100 % damage. Minus 100 plusses for that attack";
         $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='" . $uid . "'"));
         $ugpl = $ugpl[0];
         $ugpl2 = $ugpl - "99";
         sm_query("UPDATE ibwf_users SET plusses='" . $ugpl2 . "' WHERE id='" . $uid . "'");
        
        echo "<br/>";
        }
    echo "<small><a href=\"index.php?action=funm&amp;sid=$sid\">Fun N Games</a></small>";
    echo "<br/>----------<br/>";
     echo "<a accesskey=\"0\" href=\"index.php?action=main&amp;sid=$sid\"><img src=\"../images/home.gif\" alt=\"\"/>Home</a>";
     echo "</p>";
     echo "</body>";
     echo "</html>";
    
    
    }   
/////////////////////////////////////////////////CASINO/////////////////////////////////////////   
else if($action=="casinoi")
{   
    addonline(getuid_sid($sid),"Playing Casino","");
    $view = $_GET["view"];
    if($view=="")$view="date";
    $pstyle = gettheme($sid);
    echo xhtmlhead("Casino",$pstyle);
    echo "<p align=\"center\">";
    echo "<img src=\"images/roll.gif\" alt=\"*\"/><br/>";
    echo "<small>Play our slots game to win some great prizes! Very fun game!</small>";
    echo "</p>";
    //////ALL LISTS SCRIPT <<

        echo "<p align=\"center\">";
    echo "<a href=\"games.php?action=casino&amp;sid=$sid\">&#187;Start spinning Slots</a><br/>";
    echo "</p>";
      ////// UNTILL HERE >>
    echo "<p align=\"center\">";
   echo "<br/><br/><a href=\"index.php?action=funm&amp;sid=$sid\">&#171;Back to Fun Menu</a><br/>";
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
/////////////////////////////////////////////////END OF CASINO/////////////////////////////////////////
else if($action=="casino")
{
    addonline(getuid_sid($sid),"Playing Casino","");
    $view = $_GET["view"];
    if($view=="")$view="date";
    $pstyle = gettheme($sid);
    echo xhtmlhead("Casino",$pstyle);
    echo "<p align=\"center\">";
        
    //////ALL LISTS SCRIPT <<
 
$num1 = rand(1, 9);
$num2 = rand(1, 9);
$num3 = rand(1, 9);
echo "<img src=\"images/casino.gif\" alt=\"*\"/><br/>";
echo "<b><u>These Are Your Cards:</u></b><br/>";
echo "<b>[$num1][$num2][$num3]</b><br/>";
$messege = "<small><b>Sorry, you lose!</b></small>";
if ($num1 == 7 and $num2 == 7 and $num3 == 7) {
  $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
  $gpl = rand(10, 30);
  $ugpl = $gpl + $ugpl[0];
  sm_query("UPDATE ibwf_users SET plusses='".$ugpl."' WHERE id='".$uid."'");
  $messege = "*<small>You Have Just Won $gpl Credits</small>";
}
if ($num1 == 1 and $num2 == 1 and $num3 == 1) {
  $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
  $gpl = rand(10, 30);
  $ugpl = $gpl + $ugpl[0];
  sm_query("UPDATE ibwf_users SET plusses='".$ugpl."' WHERE id='".$uid."'");
  $messege = "*<small>You Have Just Won $gpl Credits</small>";
}
if ($num1 == 3 and $num3 == 3) {
  $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
  $gpl = rand(1, 10);
  $ugpl = $gpl + $ugpl[0];
  sm_query("UPDATE ibwf_users SET plusses='".$ugpl."' WHERE id='".$uid."'");
  $messege = "*<small>You Have Just Won $gpl Credits</small>";
}
if ($num2 == 5 and $num1 == 5) {
  $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
  $gpl = rand(1, 10);
  $ugpl = $gpl + $ugpl[0];
  sm_query("UPDATE ibwf_users SET plusses='".$ugpl."' WHERE id='".$uid."'");
  $messege = "*<small>You Have Just Won $gpl Credits</small>";
}
if ($num1 == 6 and $num3 == 5) {
  $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
  $gpl = rand(1, 5);
  $ugpl = $ugpl[0] - $gpl;
  sm_query("UPDATE ibwf_users SET plusses='".$ugpl."' WHERE id='".$uid."'");
  $messege = "*<small>You Have Just Lost $gpl Credits</small>";
}
if ($num2 == 9 and $num1 == 5) {
  $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
  $gpl = rand(1, 5);
  $ugpl = $ugpl[0] - $gpl;
  sm_query("UPDATE ibwf_users SET plusses='".$ugpl."' WHERE id='".$uid."'");
  $messege = "*<small>You Have Just Lost $gpl Credits</small>";
}

echo "$messege";

echo "<br/><b><a href=\"games.php?action=casino&amp;sid=$sid\">Spin The Wheel!</a></b>";
   echo "<br/><br/><a href=\"index.php?action=funm&amp;sid=$sid\">&#171;Back to Fun Menu</a><br/>";
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
    echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
/////////////////////////////////////////////////END OF CASINO/////////////////////////////////////////


if($action=="guessgm")
{
    addonline(getuid_sid($sid),"Playing GTN","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Guess The Number",$pstyle);
    echo "<p align=\"center\">";
    $gid = $_POST["gid"];
    $un = $_POST["un"];

   if($gid=="")
  {
        sm_query("DELETE FROM ibwf_games WHERE uid='".$uid."'");
        mt_srand((double)microtime()*1000000);
        $rn = mt_rand(1,100);
        sm_query("INSERT INTO ibwf_games SET uid='".$uid."', gvar1='8', gvar2='".$rn."'");
        $tries = 8;
        $gameid = mysqli_fetch_array(sm_query("SELECT id FROM ibwf_games WHERE uid='".$uid."'"));
        $gid=$gameid[0];
  }else{
    $ginfo = mysqli_fetch_array(sm_query("SELECT gvar1,gvar2 FROM ibwf_games WHERE id='".$gid."' AND uid='".$uid."'"));
    $tries = $ginfo[0]-1;
    sm_query("UPDATE ibwf_games SET gvar1='".$tries."' WHERE id='".$gid."'");
    $rn = $ginfo[1];
  }
  if ($tries>0)
                {
                $gmsg = "<small>Just try to guess the number before you have no more tries, the number is between 1-100</small><br/><br/>";
                echo $gmsg;
                $tries = $tries-1;
                $gpl = $tries*3;
                echo "Tries:$tries, Credits:$gpl<br/><br/>";
                      if ($un==$rn){
                        $gpl = $gpl+3;
                        $ugpl = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
                        $ugpl = $gpl + $ugpl[0];
                        sm_query("UPDATE ibwf_users SET plusses='".$ugpl."' WHERE id='".$uid."'");
                        echo "<small>Congrats! the number was $rn, $gpl Credits has been added to your Credits, <a href=\"games.php?action=guessgm&amp;sid=$sid\">New Game</a></small><br/><br/>";
                      }else{
                        if($un <$rn)
                        {
                          echo "Try bigger number than $un !<br/><br/>";
                        }else{
                            echo "Try smaller number than $un !<br/><br/>";
                        }
echo "<form action=\"games.php?action=guessgm&amp;sid=$sid\" method=\"post\">";
echo "Your Guess: <input type=\"text\" name=\"un\" format=\"*N\" size=\"3\" value=\"$un\"/>";
		
		echo "<input type=\"submit\" value=\"Try\"/>";
		echo "<input type=\"hidden\" name=\"gid\" value=\"$gid\"/>";
		echo "</form><br/>";
                      }


                }else{
                    $gmsg = "<small>GAME OVER, <a href=\"games.php?action=guessgm&amp;sid=$sid\">New Game</a></small><br/><br/>";
                    echo $gmsg;
                }
   echo "<br/><br/><a href=\"index.php?action=funm&amp;sid=$sid\">&#171;Back to Fun Menu</a><br/>";
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

//////////////////////////////


if($action=="harry")
{
	$ac = $_GET["ac"];
	  addonline(getuid_sid($sid),"Playing harry potter","");
    $pstyle = gettheme($sid);
    echo xhtmlhead("Playing Harry pOtter",$pstyle);
	if($ac==""){
  
	echo "<h5>Harry pOtter</h5>";
    echo "<p align=\"center\">";
	echo"<img src=\"images/harry/hag.jpg\" alt=\"*\"/><br/>";
   echo "</p><p>";
	echo "<b>Hagrid :</b> Hi <u>".getnick_uid($uid)."</u> We Wait For U<br/>";
	   echo "Come with me The magic School<br/>";
	echo "<a href=\"?action=$action&amp;sid=$sid&amp;ac=school\">join tO School</a><br/>";
	    echo "<p align=\"center\">";
echo "<br/><br/><a href=\"index.php?action=funm&amp;sid=$sid\">&#171;Back to Fun Menu</a><br/>";
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
  }elseif($ac=="school"){
  /////////select da group//////////
 // sm_query("INSERT INTO `ibwf_harry_potter` (`uid`, `group`) VALUES ('".$uid."', '".$grop."')");
   echo "<p align=\"center\">";
	echo"<img src=\"images/harry/1.jpg\" alt=\"*\"/><br/>";
   echo "</p><p>";
	echo "<b>Professor Dumbledore:</b> Welcome <u>".getnick_uid($uid)."</u> After Long Time I see U<br/>";
  //Professor Albus Dumbledore
  
//Hermione Granger
  }
  
}
///////////////////////////

else{
    $pstyle = gettheme($sid);
    echo xhtmlhead("Lost",$pstyle);
  echo "<p align=\"center\">";
  echo "I don't know how did you get into here, but there's nothing to show<br/><br/>";
   echo "<br/><br/><a href=\"index.php?action=funm&amp;sid=$sid\">&#171;Back to Fun Menu</a><br/>";
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
?>