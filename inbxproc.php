<?php
include("xhtmlfunctions.php");
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
include("config.php");
include("core.php");
connectdb();
$action = $_GET["action"];
$sid = $_GET["sid"];
$pmtext = $_POST["pmtext"];
$who = $_GET["who"];
include('class.upload.php');


mylog($sid);

	$uid = getuid_sid($sid);

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
if($action=="sendpm")
{
  $pstyle = gettheme($sid);
      echo xhtmlhead("Inbox",$pstyle);
  echo "<p align=\"center\">";
  $whonick = getnick_uid($who);
  $byuid = getuid_sid($sid);
  $tm = (time() - $timeadjust);
  $lastpm = mysqli_fetch_array(sm_query("SELECT MAX(timesent) FROM ibwf_private WHERE byuid='".$byuid."'"));
  $pmfl = $lastpm[0]+getpmaf();
  if($byuid==1)$pmfl=0;
  if($pmfl<$tm)
  {
    if(!isblocked($pmtext,$byuid))
    {
    if((!isignored($byuid, $who))&&(!istrashed($byuid)))
    {
	$clr=$_POST["clr"];
	 if($clr=="") {
	 $pmtext=$pmtext;
	 
	 }else{
	 $pmtext="[clr=$clr]$pmtext\[/clr]";
	 }
//////////////////////////////////////	
  if ($_POST['action'] == 'image') {
  
 $handle = new Upload($_FILES['f1']);
     if ($handle->uploaded) {
    
       $handle->image_resize            = true;
       $handle->image_ratio_y           = true;
       $handle->image_x                 = 150;
        $handle->Process('upload/pmimages');
        
         if ($handle->processed) {
               $imageurl = "upload/pmimages/$handle->file_dst_name";
              echo "<a href=\"$imageurl\"><img src=\"$imageurl\" alt=\"pmimages\"/></a><br/>";
  
 $res = sm_query("INSERT INTO ibwf_private SET image='".$imageurl."',text='".$pmtext."', byuid='".$byuid."', touid='".$who."', timesent='".$tm."'");
	   } else{
              
              echo '  file not uploaded to the wanted location<br/>';
              echo '  Error: ' . $handle->error . '<br/>';
           }
          $handle-> Clean();
       }else{
	 echo '  file not uploaded on the server<br/>';
          echo '  Error: ' . $handle->error . '<br/>';
      }
 }	  else{	
	
///////////////////////////////////////	
  $res = sm_query("INSERT INTO ibwf_private SET text='".$pmtext."', byuid='".$byuid."', touid='".$who."', timesent='".$tm."'");
  }
  }else{
    $res = true;
  }
  if($res)
  {

    echo "<img src=\"images/ok.gif\" alt=\"O\"/>";
    echo "PM was sent successfully to ";
	echo "<a href=\"index.php?action=viewuser&amp;who=$who&amp;sid=$sid\">$whonick</a><br/><br/>";
    echo parsepm($pmtext, $sid);
 $uinf = mysqli_fetch_array(sm_query("SELECT id FROM ibwf_private WHERE text='".$pmtext."' and  byuid='".$byuid."' and touid='".$who."' and timesent='".$tm."' "));
echo "<br/><a href=\"inbxproc.php?action=dlpm&amp;pmid=$uinf[0]&amp;sid=$sid\" class=\"btn\">Edit+Delete PM</a><br/>";
   
	
  }else{
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>";
    echo "Can't Send PM to $whonick<br/><br/>";
  }
  }else{
    $bantime = (time() - $timeadjust) + (7*24*60*60) ;
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>";
    echo "Can't Send PM to $whonick<br/><br/>";
    echo "You just sent a link to one of the crapiest sites on earth<br/> The members of these sites spam here a lot, so go to that site and stay there if you don't like it here<br/> as a result of your stupid action:<br/>1. you have lost your sheild<br/>2. you have lost all your Credits<br/>3. You are BANNED!";
    sm_query("INSERT INTO ibwf_penalties SET uid='".$byuid."', penalty='1', exid='1', timeto='".$bantime."', pnreas='Banned: Automatic Ban for spamming for a crap site'");
    sm_query("UPDATE ibwf_users SET plusses='0', shield='0' WHERE id='".$byuid."'");
    sm_query("INSERT INTO ibwf_private SET text='".$pmtext."', byuid='".$byuid."', touid='1', timesent='".$tm."'");
  }
  }else{
    $rema = $pmfl - $tm;
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>";
    echo "Flood control: $rema Seconds<br/><br/>";
  }
   echo "<br/><br/>";
   if($page=="" || $page<=0)$page=1;
    $myid = getuid_sid($sid);
    $doit=false;
    $num_items = getpmcount($myid); //changable
    $items_per_page= 1
;
    $num_pages = ceil($num_items/$items_per_page);
    if($page>$num_pages)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;


$sql = "SELECT
            a.name, b.id, b.byuid, b.unread, b.starred FROM ibwf_users a
            INNER JOIN ibwf_private b ON a.id = b.byuid
            WHERE b.touid='".$myid."' AND b.unread='1'
            ORDER BY b.timesent
            LIMIT $limit_start, $items_per_page
    ";

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

      $lnk = "<a href=\"inbox.php?action=readpm&amp;pmid=$item[1]&amp;sid=$sid\">$iml $item[0]</a>";
      echo "$lnk<br/>";
    }

  echo "<a href=\"inbox.php?action=main&amp;sid=$sid\">Back to inbox</a><br/>";
   echo "<a href=\"index.php?action=chat&amp;sid=$sid\">Back to Chat</a><br/>";
      
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
else if($action=="dlpm")
{
  $pstyle = gettheme($sid);
      echo xhtmlhead("Inbox",$pstyle);
  echo "<p align=\"center\">";
 $pmid = $_GET["pmid"];
$pminfo = mysqli_fetch_array(sm_query("SELECT text, byuid, timesent,touid, reported FROM ibwf_private WHERE id='".$pmid."'"));
if($pminfo[1]==getuid_sid($sid))
  {
  ///////////////////////////////////////
  echo"<b><u>SeND  PM ".getnick_uid($pminfo[3])."</b></u><br/>";
 sm_query("DELETE FROM `ibwf_private` WHERE `ibwf_private`.`id` ='".$pmid."'");

  //////////////////////////////////////
 	echo "<form action=\"inbxproc.php?action=sendpm&amp;who=$pminfo[3]&amp;sid=$sid\" method=\"post\">";
  echo "<textarea rows=\"2\" cols=\"20\" name=\"pmtext\">$pminfo[0]</textarea><br/>";
      
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
  
  }else{
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>This PM ain't yours";
  }
  echo "<br/><br/><a href=\"inbox.php?action=main&amp;sid=$sid\">Back to inbox</a><br/>";
      
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}
else if($action=="sendto")
{
  $pstyle = gettheme($sid);
      echo xhtmlhead("Inbox",$pstyle);
  echo "<p align=\"center\">";
   $who = $_POST["who"];
  $who = getuid_nick($who);
    if(!isuser($who))
    {
      echo "<img src=\"images/notok.gif\" alt=\"x\"/>User Does Not exist<br/>";
    }else{
	
	
$whonick = getnick_uid($who);
  $byuid = getuid_sid($sid);
  $tm = (time() - $timeadjust) ;
  $lastpm = mysqli_fetch_array(sm_query("SELECT MAX(timesent) FROM ibwf_private WHERE byuid='".$byuid."'"));
  $pmfl = $lastpm[0]+getpmaf();
  if(($pmfl<$tm)and(!isvip($byuid)))
  {
    if(!isblocked($pmtext,$byuid))
    {
    if((!isignored($byuid, $who))&&(!istrashed($byuid)))
    {
  $res = sm_query("INSERT INTO ibwf_private SET text='".$pmtext."', byuid='".$byuid."', touid='".$who."', timesent='".$tm."'");
  }else{
    $res = true;
  }
  if($res)
  {
    echo "<img src=\"images/ok.gif\" alt=\"O\"/>";
       echo "PM was sent successfully to ";
	echo "<a href=\"index.php?action=viewuser&amp;who=$who&amp;sid=$sid\">$whonick</a><br/><br/>";
    echo parsepm($pmtext, $sid);

  }else{
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>";
    echo "Can't Send PM to $whonick<br/><br/>";
  }
  }else{
   $bantime = (time() - $timeadjust) + (7*24*60*60) ;
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>";
    echo "Can't Send PM to $whonick<br/><br/>";
    echo "You just sent a link to one of the crapiest sites on earth<br/> The members of these sites spam here a lot, so go to that site and stay there if you don't like it here<br/> as a result of your stupid action:<br/>1. you have lost your sheild<br/>2. you have lost all your plusses<br/>3. You are BANNED!";
    sm_query("INSERT INTO ibwf_penalties SET uid='".$byuid."', penalty='1', exid='1', timeto='".$bantime."', pnreas='Banned: Automatic Ban for spamming for a crap site'");
    sm_query("UPDATE ibwf_users SET plusses='0', shield='0' WHERE id='".$byuid."'");
    sm_query("INSERT INTO ibwf_private SET text='".$pmtext."', byuid='".$byuid."', touid='1', timesent='".$tm."', reported='1'");
  }
  }else{
    $rema = $pmfl - $tm;
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>";
    echo "Flood control: $rema Seconds<br/><br/>";
  }

    }

  echo "<br/><br/><a href=\"inbox.php?action=main&amp;sid=$sid\">Back to inbox</a><br/>";
      
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}

else if($action=="proc")
{
    $pmact = $_POST["pmact"];
    $pact = explode("-",$pmact);
    $pmid = $pact[1];
    $pact = $pact[0];
    $pstyle = gettheme($sid);
      echo xhtmlhead("Inbox",$pstyle);
    echo "<p align=\"center\">";
    $pminfo = mysqli_fetch_array(sm_query("SELECT text, byuid, touid, reported FROM ibwf_private WHERE id='".$pmid."'"));
    if($pact=="rep")
    {
      addonline(getuid_sid($sid),"Sending PM","");

      $whonick = getnick_uid($pminfo[1]);
  echo "Send PM to $whonick<br/><br/>";
  echo "<form action=\"inbxproc.php?action=sendpm&amp;who=$pminfo[1]&amp;sid=$sid\" method=\"post\">";
  echo "<input name=\"pmtext\" maxlength=\"500\"/><br/>";
  echo "<input type=\"submit\" value=\"Send\"/>";
echo "</form>";

    }else if($pact=="del")
    {
        addonline(getuid_sid($sid),"Deleting PM","");
        if(getuid_sid($sid)==$pminfo[2])
        {
          if($pminfo[3]=="1")
          {

            echo "<img src=\"images/notok.gif\" alt=\"X\"/>This PM is reported, thus it can't be deleted";
          }else{
          $del = sm_query("DELETE FROM ibwf_private WHERE id='".$pmid."' ");
          if($del)
          {
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>PM delted successfully";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Can't Delete PM at the moment";
          }
          }

        }else{
          echo "<img src=\"images/notok.gif\" alt=\"X\"/>This PM ain't yours";
        }
    }else if($pact=="str")
    {
        addonline(getuid_sid($sid),"Starring PM","");
        if(getuid_sid($sid)==$pminfo[2])
        {
          $str = sm_query("UPDATE ibwf_private SET starred='1' WHERE id='".$pmid."' ");
          if($str)
          {
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>PM starred successfully";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Can't star PM at the moment";
          }
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"X\"/>This PM ain't yours";
        }
    }else if($pact=="ust")
    {
        addonline(getuid_sid($sid),"Unstarring PM","");
        if(getuid_sid($sid)==$pminfo[2])
        {
          $str = sm_query("UPDATE ibwf_private SET starred='0' WHERE id='".$pmid."' ");
          if($str)
          {
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>PM unstarred successfully";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Can't unstar PM at the moment";
          }
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"X\"/>This PM ain't yours";
        }
    }else if($pact=="rpt")
    {
        addonline(getuid_sid($sid),"Reporting PM","");
        if(getuid_sid($sid)==$pminfo[2])
        {
          if($pminfo[3]=="0")
          {
          $str = sm_query("UPDATE ibwf_private SET reported='1' WHERE id='".$pmid."' ");
          if($str)
          {
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>PM reported to mods successfully";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Can't report PM at the moment";
          }
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>This PM is already reported";
          }
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"X\"/>This PM ain't yours";
        }
    }
	else if($pact=="frd")
    {
        addonline(getuid_sid($sid),"Forwarding PM","");
        if(getuid_sid($sid)==$pminfo[2]||getuid_sid($sid)==$pminfo[1])
        {

  echo "Forward to e-mail:<br/><br/>";
  echo "<input name=\"email\" maxlength=\"250\"/><br/>";
  echo "<anchor>Froward<go href=\"inbxproc.php?action=frdpm&amp;sid=$sid\" method=\"post\">";
  echo "<postfield name=\"email\" value=\"$(email)\"/>";
  echo "<postfield name=\"pmid\" value=\"$pmid\"/>";
  echo "</go></anchor>";
        }else{
          echo "<img src=\"images/notok.gif\" alt=\"X\"/>This PM ain't yours";
        }
    }

    echo "<br/><br/><a href=\"inbox.php?action=main&amp;sid=$sid\">Back to inbox</a><br/>";
      
     echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
    echo "</p>";
  echo xhtmlfoot();
  }

else if($action=="proall")
{
    $pact = $_POST["pmact"];
    $pstyle = gettheme($sid);
      echo xhtmlhead("Inbox",$pstyle);
    echo "<p align=\"center\">";
    addonline(getuid_sid($sid),"Deleting PMs","");
      $uid = getuid_sid($sid);
    if($pact=="ust")
    {

      $del = sm_query("DELETE FROM ibwf_private WHERE touid='".$uid."' AND reported !='1' AND starred='0' And unread='0'");
      if($del)
          {
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>All PMS except starred and unread are deleted successfully";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Can't Delete PM at the moment";
          }
    }else if($pact=="red")
    {

        $del = sm_query("DELETE FROM ibwf_private WHERE touid='".$uid."' AND reported !='1' and unread='0'");
      if($del)
          {
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>All PMS except unread, including starred are deleted successfully";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Can't Delete PM at the moment";
          }

    }else if($pact=="all")
    {
        $del = sm_query("DELETE FROM ibwf_private WHERE touid='".$uid."' AND reported !='1'");
      if($del)
          {
            echo "<img src=\"images/ok.gif\" alt=\"O\"/>All PMS except reported, including starred and unread are deleted successfully";
          }else{
            echo "<img src=\"images/notok.gif\" alt=\"X\"/>Can't Delete PM at the moment";
          }
    }

    echo "<br/><br/><a href=\"inbox.php?action=main&amp;sid=$sid\">Back to inbox</a><br/>";
      
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
    echo "</p>";
  echo xhtmlfoot();

  }
else if($action=="frdpm")
{
	$email = $_POST["email"];
	$pmid = $_POST["pmid"];
  addonline(getuid_sid($sid),"Forwarding PM","");
  $pstyle = gettheme($sid);
      echo xhtmlhead("Inbox",$pstyle);
  echo "<p align=\"center\">";

  $pminfo = mysqli_fetch_array(sm_query("SELECT text, byuid, timesent,touid, reported FROM ibwf_private WHERE id='".$pmid."'"));


  if(($pminfo[3]==getuid_sid($sid))||($pminfo[1]==getuid_sid($sid)))
  {
  $from_head = "From: noreplay@$stitle";
  $subject = "PM By ".getnick_uid($pminfo[1])." To ".getnick_uid($pminfo[3])." ($stitle)";
  $content = "Date: ".date("l d/m/y H:i:s", $pminfo[2])."\n\n";
  $content .= $pminfo[0]."\n------------------------\n";
  $content .= "$stitle: The best wap community!";
  mail($email, $subject, $content, $from_head);
 echo "<img src=\"images/ok.gif\" alt=\"X\"/>PM forwarded to $email";
  }else{
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>This PM ain't yours";
  }
  echo "<br/><br/><a href=\"inbox.php?action=main&amp;sid=$sid\">Back to inbox</a><br/>";
      
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
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