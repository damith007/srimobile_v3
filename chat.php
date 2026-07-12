<?php
include("gzcompress.php");
include("config.php"); 
include("core.php"); 
include("xhtmlfunctions.php");

echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
//8152
?>

<?php

connectdb();
$action=$_GET["action"];
$id=$_GET["id"];
$sid = $_GET["sid"];
$rid=$_GET["rid"];
$rpw=$_GET["rpw"];
$page=$_GET["page"];
$ac=$_GET["ac"];
$who=$_GET["who"];
$uid = getuid_sid($sid);
  
 $uexist = isuser($uid);

mylog($sid);
banned($uid);


    $isroom = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_rooms WHERE id='".$rid."'"));
    if($isroom[0]==0)
    {
      $pstyle = gettheme($sid);
      echo xhtmlheadchat("$stitle",$pstyle);
      echo "<p align=\"center\">";
      echo "This room doesn't exist anymore<br/>";
      echo ":P see in another room<br/><br/>";
      echo "<a href=\"index.php?action=chat&amp;sid=$sid\">Chatrooms</a>";
      echo "</p>";
      echo xhtmlfoot();
      exit();
    }
    $passworded = mysqli_fetch_array(sm_query("SELECT pass FROM ibwf_rooms WHERE id='".$rid."'"));
    if($passworded[0]!="")
    {
      if($rpw!=$passworded[0])
      {
      $pstyle = gettheme($sid);
      echo xhtmlheadchat("$stitle",$pstyle);
      echo "<p align=\"center\">";
      echo "You can't enter this room<br/>";
      echo ":P stay away<br/><br/>";
      echo "<a href=\"index.php?action=chat&amp;sid=$sid\">Chatrooms</a>";
      echo "</p>";
      echo xhtmlfoot();
      exit();
      }
    }
    if(!canenter($rid,$sid))
    {
      $pstyle = gettheme($sid);
      echo xhtmlheadchat("$stitle",$pstyle);
      echo "<p align=\"center\">";
      echo "You can't enter this room<br/>";
      echo ":P stay away<br/><br/>";
      echo "<a href=\"index.php?action=chat&amp;sid=$sid\">Chatrooms</a>";
      echo "</p>";
      echo xhtmlfoot();
      exit();
    }
    addtochat($uid, $rid);

        $timeto = 500;
            $timenw = time();
            $timeout = $timenw-$timeto;
      $deleted = sm_query("DELETE FROM ibwf_chat WHERE timesent<".$timeout."");
         
		$inside = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_chonline WHERE rid='".$rid."'"));
if($inside[0]>1){

sm_query("UPDATE ibwf_settings SET value='on' WHERE name='magic'");
}else{
sm_query("UPDATE ibwf_settings SET value='off' WHERE name='magic'");

}


$magic = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='magic'"));
if($magic[0]=="off"){
$magictimez=time()+60*15;
sm_query("UPDATE ibwf_settings SET value='".$magictimez."' WHERE name='magictime'");
}

		
        if ($action=="")
                         {
////////////////////////////////////////////////////////////////////////////////						 
					 
//////////////////////////////////////////////////////////////////////////////////////						 
          
        $pstyle = gettheme($sid);
        echo xhtmlheadchat1("$stitle Chat",$pstyle,$rid,$sid);

        echo "<timer value=\"500\"/><p align=\"center\">";

        addonline($uid,"Chatrooms","");
        echo "
        <a href=\"chat.php?action=say&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">Options</a> / ";
        $time = date('His');
        echo "<a href=\"chat.php?time=$time&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">Refresh</a><br/>";
		/////////////////////////////////////////////////////
						



 $chats = mysqli_fetch_array(sm_query("SELECT chatter FROM ibwf_chat WHERE id='".$id."'"));

						if($ac=="del"){

$id=$_GET["id"];

 if((ismod($uid))or(ischatmod($uid)))
				  {$sql="DELETE FROM `ibwf_chat` WHERE `id`='$id'";}

else if($uid==$chats[0])
				  {$sql="DELETE FROM `ibwf_chat` WHERE `id`='$id'";}else{}


         




   $chatexit = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_chat WHERE id='".$id."'"));
  if($chatexit[0]>0)
  {
$res = sm_query($sql);
if($res){echo "<img src=\"images/ok.gif\" alt=\"O\"/>chat msg deleted!";}else{echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error Deleting chat msg!";}
echo"<br/>";

}

}			 
/////////////////////////////////////////////////////////////////

if($ac=="kick"){
$namekick=getnick_uid($who);


if($uid!==$who){
if((ismod($uid))or(ischatmod($uid)))
				  {
$sql="DELETE FROM `ibwf_ses` WHERE `uid`='$who'";
}
$res = sm_query($sql);
if($res){echo "<img src=\"images/ok.gif\" alt=\"O\"/>$namekick was kicked!";}else{echo "<img src=\"images/notok.gif\" alt=\"X\"/>Error $namekick not kicked!";}
}
echo"<br/>";
}

	///////////////////////////////////////
echo(date("h:i A") . "<br />");		
		
		
		/////////////////////////////////////////////////////////
        echo "<p align=\"center\">";
            echo "<form action=\"chat.php?sid=$sid&amp;rid=$rid&amp;rpw=$rpw\" method=\"post\">";
          echo "<textarea name=\"message\" id=\"textarea\" cols=\"20\" rows=\"2\"></textarea><br/>";
			
			    echo "<select name=\"clr\" value=\"\">
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
			
			
			echo "<input type=\"submit\" value=\"Say\"/>";
            echo "</form>";
	////////////////////////////		
$magic = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='magic'"));
if($magic[0]=="on"){

$magictime = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='magictime'"));
if($magictime[0]<time())
{

   echo "<br/>$coinimg <small><a href=\"chat.php?action=coin&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\"><b>Hurry Up Catch coin NOW!!!</b></a></small><br/>";

}

}			
	///////////////////////////////////////////////////////////////////		
            echo "</p>";
        $unreadinbox=mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE unread='1' AND touid='".$uid."'"));
        $pmtotl=mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE touid='".$uid."'"));
        $unrd="(".$unreadinbox[0]."/".$pmtotl[0].")";
        if ($unreadinbox[0]>0)
        {
        echo "<br/><a href=\"inbox.php?action=main&amp;sid=$sid\">Inbox$unrd</a>";
      }
      echo "</small></p>";
     ////////////////////////////  

 if($rid==2353)
{			
$xyz = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
echo "You Have:<b> $xyz[0]</b> credits<br/>";
$frc = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cric_match WHERE
uid='".$uid."'"));

$psna = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cric_mat WHERE who='".$uid."' AND accept='1'"));
$rtqa = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cric_mat WHERE uid='".$uid."' AND accept='1'"));
$psn = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cric_mat WHERE who='".$uid."' AND accept='0'"));
$rtq = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cric_mat WHERE uid='".$uid."' AND accept='0'"));
$rtc = mysqli_fetch_array(sm_query("SELECT mtype FROM cric_match WHERE uid='".$uid."'"));
if($psna[0]>0||$rtqa[0]>0)
{

$scr = mysqli_fetch_array(sm_query("SELECT uid, who, bet, id, balls, wickets FROM cric_mat WHERE accept='1' AND who='".$uid."' OR uid='".$uid."'"));
$mat = mysqli_fetch_array(sm_query("SELECT wickets, ball, score FROM cricket WHERE uid='".$scr[0]."'"));
$mata = mysqli_fetch_array(sm_query("SELECT wickets, ball, score FROM cricket WHERE uid='".$scr[1]."'"));
$remw1 = $scr[5] - $mata[0];
$remw2 = $scr[5] - $mat[0]; 

$remb1 = $scr[4] - $mata[1];
$remb2 = $scr[4] - $mat[1]; 

if($uid==$scr[0])
{
$reda = $scr[1];
}else{
$reda = $scr[0];
}
$new = mysqli_fetch_array(sm_query("SELECT ball, score, wickets FROM cricket WHERE uid='".$uid."'"));
$newa = mysqli_fetch_array(sm_query("SELECT ball, score, wickets FROM cricket WHERE uid='".$reda."'"));
$wkla = $scr[5] - $new[2];
$wklb = $scr[5] - $newa[2];

$bxla = $scr[4] - $new[0];
$bxlb = $scr[4] - $newa[0];
div();
echo "<u>[[ Score Board]]</u><br/>";
$nicka = getnick_uid($uid);
$nick = getnick_uid($reda);
echo "<u>$nicka Vs $nick</u><br/>&#187;Bet : $scr[2]<br/>
<u>Total Score</u><br/>&#187;$nicka:  $new[1] | $nick:  $newa[1]<br/>";
echo "<u>Remaining Wickets</u><br/>&#187;$nicka:  $wkla | $nick:  $wklb<br/>";

echo "<u>Remaining Balls</u><br/>&#187; $nicka:  $bxla | $nick: $bxlb</div><br/>";
echo "<a href=\"chat.php?action=cri2&amp;rid=$rid&amp;sid=$sid\">(((-HiT BaLL-)))</a><br/>";
}
else if($rtc[0]==1)
{
$score = mysqli_fetch_array(sm_query("SELECT tscore, totscr, rball,bet FROM cric_match WHERE uid='".$uid."'"));
echo "<div>";
echo "Ur Bet:  $score[3]<br/>Ur Score:  $score[1]<br/>Target Score: 
$score[0]<br/>Remaining Balls:  $score[2]/6</div><br/>";
echo "<a href=\"chat.php?action=cri&amp;sid=$sid&amp;rid=$rid&amp;who=$who\">(((-HiT BaLL-)))</a><br/>";
}
else if($rtq[0]>=1)
{
$mwd = mysqli_fetch_array(sm_query("SELECT who, bet, balls, wickets FROM cric_mat WHERE accept='0'"));
$whom = getnick_uid($mwd[0]);
 echo "You made a cricket challenge with $whom for $mwd[1]
credits!<br/>Its a $mwd[2]balls Match with $mwd[3] wickets<br/>Highest
scored user will win!<br/>Pls wait until ur opponent accept ur
challenge or <a href=\"chat.php?action=ccan&amp;sid=$sid&amp;rid=$rid&amp;who=$who\">Click here to</a> cancel the challenge";
}
else if($psn[0]>=1)
{
$bmr = mysqli_fetch_array(sm_query("SELECT uid, bet, balls, wickets FROM cric_mat WHERE accept='0' AND who='".$uid."'"));
$whom = getnick_uid($bmr[0]);
echo "You have a challenge from $whom for $bmr[1] credits! <br/>Its a
$bmr[2] balls match with $bmr[3] wickets.<br/>";
echo "<a href=\"chat.php?action=chl&amp;sid=$sid&amp;rid=$rid&amp;who=$who\">Click here to</a> accept request or <a href=\"chat.php?action=ccan&amp;sid=$sid&amp;rid=$rid&amp;who=$who\">Click here to</a> cancel the challenge";
}else{
echo "Bet: <form action=\"chat.php?action=match&amp;sid=$sid&amp;rid=$rid&amp;who=$who\" method=\"post\">";
echo "<input name=\"bet\" size=\"3\" maxlength=\"5\" value=\"100\"/>";
echo "<br/>to get more than 15 runs in one over six balls<br/>";
echo "<input type=\"submit\" value=\"Start\"/></form>";
 
}
}

///////////////////////////////////////////jackmate
 if($rid==2358)
{
/////////////////////////////////////////////////////////////////////////////////////////////////
        $otp = mysqli_fetch_array(sm_query("SELECT `on`,`poker`,`bet`,`time`,`total`,`card` FROM ibwf_rooms WHERE id='2358'"));
        $xyz = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
        $player = mysqli_fetch_array(sm_query("SELECT COUNT(uid) FROM ibwf_jakemate"));
        $player = $player[0];
        $max = mysqli_fetch_array(sm_query("SELECT uid,MAX(card) FROM ibwf_jakemate"));
        $max2 = mysqli_fetch_array(sm_query("SELECT uid,MAX(card2) FROM ibwf_jakemate"));
		if($max[1]>$max2[1]){
		$maxcard= $max[1];
		$winuid= $max[0];
		$winnick= getnick_uid($max[0]);
		$credit=getplusses($max[0]);
	
		$msg = "Totally $player Players Joined the Game and $otp[5] Cards issued. Max Valued Winning Card is $maxcard .Winner is  $winnick with $otp[4] Credits!! congratz!!";                  
						   }else if($max2[1]>$max[1]){
		$maxcard= $max2[1];
		$winuid= $max2[0];
		$winnick= getnick_uid($max2[0]);
		$msg = "Totally $player Players Joined the Game and $otp[5] Cards issued. Max Valued Winning Card is $maxcard .Winner is $winnick with $otp[4] Credits!! congratz!!";                                             
		$credit=getplusses($max2[0]);	
			}
		
		
		
        $jake = mysqli_fetch_array(sm_query("SELECT `card`,`card2`,`take` FROM ibwf_jakemate WHERE uid='".$uid."'"));  
/////////////////////////////////////////////////////////////////////////////////
$otp = mysqli_fetch_array(sm_query("SELECT `on`,`poker`,`bet`,`time`,`total`,`card` FROM ibwf_rooms WHERE id='2358'"));

        echo "&#187;U hv:<b> $xyz[0] Crdtz </b><br/>";
       if(($otp[3]<=time()) and ($otp[0]==1)){
      
       sm_query("INSERT INTO ibwf_chat SET  chatter='5', who='', timesent='".time()."', msgtext='".$msg."', rid='2358'");
       sm_query("UPDATE `ibwf_rooms` SET `total` = '0',`card` = '0',`on` = '0',`poker` = '0',`bet` = '0',`time` = '0' WHERE `ibwf_rooms`.`id` ='".$rid."'");
       sm_query("TRUNCATE TABLE ibwf_jakemate");
       $plu = $credit+$otp[4];
		sm_query("UPDATE ibwf_users SET plusses='".$plu."' WHERE id='".$winuid."'");

		}


		
//////////////////////////////////////////
 if($otp[0]==0){
      echo "&#187;Bet:<form action=\"chat.php?action=bett&amp;sid=$sid&amp;rid=$rid\" method=\"post\">";
      echo "<input name=\"bet\" size=\"3\" maxlength=\"5\" value=\"100\"/>";
      echo "<br/>";
      echo "<input type=\"submit\" value=\"Start\"/></form>";
             }else{
			 if($otp[0]==1){ 
			 
$nick=getnick_uid($otp[1]);
echo"&#171;$nick started the game. one card for $otp[2] Crdtz<br/>";
if($jake[2]==0){
echo "&#171;<a href=\"chat.php?action=card&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">Take a Card </a>(costs $otp[2] Crdtz)<br/><br/>";
    
               }else if($jake[2]==1) {
			   
		echo "&#171; your card:<b>$jake[0]</b><br/>";	   
	echo "&#171;Take Another Card? NO | ";
echo "<a href=\"chat.php?action=card2&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">YES</a>(costs $otp[2] Crdtz)<br/><br/>";
                                }else{
			echo "&#171; your card:<b>$jake[0]</b> and <b>$jake[1]</b><br/>";	 					
								   }
$timde=gettimemsg2($otp[3]-time());
echo"&#171;Remain Time to Win:<b>$timde</b>| Pot Crdts: <b>$otp[4]</b><br/>";
                             }
				  }
}
///////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////// 
////////////////////////////////////////////

	   $message=$_POST["message"];
        $who = $_POST["who"];
        $rinfo = mysqli_fetch_array(sm_query("SELECT censord, freaky FROM ibwf_rooms WHERE id='".$rid."'"));
        if (trim($message) != "")
        {
		
		$clr=$_POST["clr"];
	 if($clr=="") {
	 $message=$message;
	 
	 }else{
	 $message="[clr=$clr]$message\[/clr]";
	 }
		

		
          $nosm = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_chat WHERE msgtext='".$message."'"));
          if($nosm[0]==0){
            
			
			
			$validated = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE id='".$uid."'  AND validated='0'"));
    if(($validated[0]>0)&&(validation()))
    {
echo "<img src=\"images/notok.gif\" alt=\"x\"/><br/>";
	echo "ur chat msg wont dispaly here,coz Ur Are Unvalidate user!!<br/>";

		  }else{
            $chatok = sm_query("INSERT INTO ibwf_chat SET  chatter='".$uid."', who='".$who."', timesent='".(time() - $timeadjust)."', msgtext='".$message."', rid='".$rid."';");
              $uinf = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_maxchat WHERE uid='".$uid."'"));
  if($uinf[0]==0)
  {
 $maxcha = sm_query("INSERT INTO `ibwf_maxchat` (`uid`, `chat`, `time`) VALUES ('".$uid."', '1', '".time()."')");
		   
}else{

 sm_query("UPDATE `ibwf_maxchat` SET `chat` = `chat` + 1 WHERE `uid`= '".$uid."'");
}

		   $lstmsg = sm_query("UPDATE ibwf_rooms SET lastmsg='".(time() - $timeadjust)."' WHERE id='".$rid."'");
            
            $hehe=mysqli_fetch_array(sm_query("SELECT chmsgs FROM ibwf_users WHERE id='".$uid."'"));
            $totl = $hehe[0]+1;
            $msgst= sm_query("UPDATE ibwf_users SET chmsgs='".$totl."' WHERE id='".$uid."'");
			
					
	if(!cancre())
{
$hehee=mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));
            $totll = $hehee[0]+1;
            $msgst= sm_query("UPDATE ibwf_users SET plusses='".$totll."' WHERE id='".$uid."'");
}

			
			
			}
			
			
			
			
            if($rinfo[1]==2)
            {
              //oh damn i gotta post this message to ravebabe :(
              //will it succeed?
              $botid = "f2fa743c8e36fa8f";
              $hostname = "www.pandorabots.com";
              $hostpath = "/pandora/talk-xml";
              $sendData = "botid=".$botid."&input=".urlencode($message)."&custid=".$custid;
              
              $result = PostToHost($hostname, $hostpath, $sendData);
              
              $pos = strpos($result, "custid=\"");
              $pos = strpos($result, "<that>");
    	if ($pos === false) {
    		$reply = "";
    	} else {
    		$pos += 6;
    		$endpos = strpos($result, "</that>", $pos);
    		$reply = unhtmlspecialchars2(substr($result, $pos, $endpos - $pos));
    		$reply = sm_clean($reply);
    	}
    	
    	$chatok = sm_query("INSERT INTO ibwf_chat SET  chatter='9', who='', timesent='".(time() - $timeadjust)."', msgtext='".$reply." @".getnick_uid($uid)."', rid='".$rid."';");
            }
          }
          $message = "";
            }
            
            echo "<div class=\"mblock2\"><small>";
        
		
		
		
		
		///////////////////////////////////
		if($page=="" || $page<=0)$page=1;
$castigatori = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_chat WHERE rid='".$rid."'"));
$num_items = $castigatori[0];
$items_per_page= 15;
$num_pages = ceil($num_items/$items_per_page);
if(($page>$num_pages)&&$page!=1)$page= $num_pages;
$limit_start = ($page-1)*$items_per_page;

		
	////////////////////////////////////////////////////	
		
            $chats = sm_query("SELECT chatter, who, timesent, msgtext, exposed, id FROM ibwf_chat WHERE rid='".$rid."' ORDER BY timesent DESC, id DESC LIMIT $limit_start, $items_per_page");
            


            while($chat = mysqli_fetch_array($chats))
            {
                $canc = true;
               
                
            
                  if(istrashed($chat[0])){
                        if($uid!=$chat[0])
                        {
                          $canc = false;
                        }
                  }
                //////good
                if(isignored($chat[0],$uid)){
                  $canc = false;
                }
                //////////good
                if($chat[0]!=$uid)
                {
                  if($chat[1]!=0)
                  {
                    if($chat[1]!=$uid)
                    {
                      $canc = false;
                    }
                  }
                }
                if (isowner($uid))
                {
                  $canc = true;
                }
                if($canc)
                {
                   $cmid = mysqli_fetch_array(sm_query("SELECT  chmood FROM ibwf_users WHERE id='".$chat[0]."'"));
                   
                   $iml = "";
                if(($cmid[0]!=0))
                {
                  $mlnk = mysqli_fetch_array(sm_query("SELECT img, text FROM ibwf_moods WHERE id='".$cmid[0]."'"));
                  $iml = "<img src=\"$mlnk[0]\" alt=\"$mlnk[1]\"/>";

                }
                  $chnick = getnick_uid($chat[0]);
                    $optlink = $iml.$chnick;
                  if(($chat[1]!=0)&&($chat[0]==$uid))
                  {
                    ///out
                    $iml = "<img src=\"moods/out.gif\" alt=\"!\"/>";
                    $chnick = getnick_uid($chat[1]);
                    $optlink = $iml."PM to ".$chnick;
                  }
                  if($chat[1]==$uid)
                  {
                    ///out
                    $iml = "<img src=\"moods/in.gif\" alt=\"!\"/>";
                    $chnick = getnick_uid($chat[0]);
                    $optlink = $iml."PM by ".$chnick;
                  }
                    if($chat[4]=='1')
                  {
                    ///out
                    $iml = "<img src=\"moods/point.gif\" alt=\"!\"/>";
                    $chnick = getnick_uid($chat[0]);
                    $tonick = getnick_uid($chat[1]);
                    $optlink = "$iml by ".$chnick." to ".$tonick;
                  }
                  
                  $ds= date("H.i.s", $chat[2]);
                  $text = parsepm($chat[3], $sid);
                  $nos = substr_count($text,"<img src=");
                  if(isspam($text))
                  {
                    $chnick = getnick_uid($chat[0]);
                    echo "<b>Chat system:&#187;<i>*oi! $chnick, no spamming*</i></b><br/>";
                  }
				  else if(isenta($text))
                  {
                    $chnick = getnick_uid($chat[0]);
                    echo "<font color=\"red\"><b><i>*$chnick enterd*</font></i></b></font><br/>";
                  }
                  else if($nos>2){
                    $chnick = getnick_uid($chat[0]);
                    echo "<b>Chat system:&#187;<i>*hey! $chnick, you can only use 2 smilies per msg*</i></b><br/>";
                  }else{
                    $sres = substr($chat[3],0,3);
                    
                    if($sres == "/sm")
                    {
                        $chco = strlen($chat[3]);
                        $goto = $chco - 3;
                        $rest = substr($chat[3],3,$goto);
                        $tosay = parsepm($rest, $sid);
                        
                        echo "<b><i>*$chnick $tosay*</i></b><br/>";
                    }else{
                      
                      $tosay = parsepm($chat[3], $sid);
                      
                      if($rinfo[0]==1)
                      {
                         
                         $tosay = $tosay;
                    					
					   }
                      
                      if($rinfo[1]==1)
                      {
                          $tosay = htmlspecialchars($chat[3]);
                          $tosay = strrev($tosay);
                        }
                  echo "<a href=\"chat.php?action=say2&amp;sid=$sid&amp;who=$chat[0]&amp;rid=$rid&amp;rpw=$rpw\">$optlink</a>&#187;";
                  echo $tosay;
               
			    if((ismod($uid))or(ischatmod($uid)))
				  {
				  $ex= " <a href=\"chat.php?ac=del&amp;sid=$sid&amp;id=$chat[5]&amp;rid=$rid&amp;rpw=$rpw\">[x]</a> <a href=\"chat.php?ac=kick&amp;sid=$sid&amp;who=$chat[0]&amp;rid=$rid&amp;rpw=$rpw\">[k]</a>";
				  
				  }else if($chat[0]==$uid){
				 
				  $ex= " <a href=\"chat.php?ac=del&amp;sid=$sid&amp;id=$chat[5]&amp;rid=$rid&amp;rpw=$rpw\">[x]</a>";
				  
				  }else{
				    $ex= "";
				  
				  }
			     $op= " <a href=\"chat.php?action=option&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw&amp;who=$chat[0]\">(*)</a>";
				  
			   echo"$ex $op<br/>";
			   
			   
				  }
                }
               
              
                }
                
            }
        //////////////////////////////////////////////////////////////////
		
		if($page>1)
{
$ppage = $page-1;
echo "«<a href=\"chat.php?page=$ppage&amp;sid=$sid&amp;rid=$rid\">PREV</a><br/>";
}
if($page<$num_pages)
{
$npage = $page+1;
echo "»<a href=\"chat.php?page=$npage&amp;sid=$sid&amp;rid=$rid\">NEXT</a><br/>";
}
		
		
		
		////////////////////////////////////////////////
            echo "</small></div>";
        

            echo "<p align=\"center\">";
        $chatters=mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_chonline where rid='".$rid."'"));
        echo "<br/><a href=\"chat.php?action=inside&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">Who's Inside($chatters[0])</a><br/>";
        echo "<a href=\"index.php?action=chat&amp;sid=$sid\">Chatrooms</a><br/>";
        echo "<a href=\"index.php?action=main&amp;sid=$sid\">Home</a></p>";
        
      echo xhtmlfoot();
}
if($rid==8)
        { 

$tries2 = mysqli_fetch_array(sm_query("SELECT cards FROM ibwf_spincard"));
$mama2= $tries2[0];
if($mama2>0)
{
if($spin==2)
        {

  $tm = time();
  $lastpm = mysqli_fetch_array(sm_query("SELECT MAX(spintime) FROM ibwf_users WHERE id='".$uid."'"));
  $pmfl = $lastpm[0]+15;
  if($pmfl<$tm)
  {

     }else{

$rema = $pmfl - $tm;
echo "Chat system:&#187;*you can spin cards again after <b>$rema</b> seconds.*<br/>";
}
if(!spinned($uid))
    {
$rpgd = sm_query("SELECT id, no FROM ibwf_getcards ORDER by RAND() LIMIT 1");
while($rpgds=mysqli_fetch_array($rpgd))
  {

$cards =$rpgds[1];
}
if(getplusses(getuid_sid($sid))<10)
    {
        echo "You need 10 plusses in order to spin the wheel!";
    }else{
sm_query("UPDATE ibwf_users SET cards=cards+'$cards' WHERE id='".$uid."'");
sm_query("UPDATE ibwf_spincard SET cards=cards-'$cards'");
sm_query("UPDATE ibwf_users SET plusses=plusses-'1' WHERE id='".$uid."'");
sm_query("UPDATE ibwf_users SET spintime='".time()."' WHERE id='".$uid."'");
sm_query("UPDATE ibwf_users SET spinned='1' WHERE id='".$uid."'");
$mycards = mysqli_fetch_array(sm_query("SELECT cards FROM ibwf_users WHERE id='".$uid."'"));
echo "Chat system:&#187;*you got $cards card(s) for that spin wait after 20 sec to spin cards again. You have $mycards[0] total of cards.*<br/>";
  }

}
}else{

  $tm = time();
  $lastpm = mysqli_fetch_array(sm_query("SELECT MAX(spintime) FROM ibwf_users WHERE id='".$uid."'"));
  $pmfl = $lastpm[0]+20;
  if($pmfl<$tm)
  {
sm_query("UPDATE ibwf_users SET spinned='0' WHERE id='".$uid."'");
$cinfo = mysqli_fetch_array(sm_query("SELECT cards from ibwf_spincard"));
echo "<a href=\"index.php?action=viewuser&amp;who=1&amp;sid=$sid\">system</a>&#187;There are $cinfo[0] remaining cards. Click <a href=\"chat.php?spin=1&amp;sid=$sid&amp;rid=$rid\">spin the wheel</a> spin cards to get some cards. Each spin will cost 1 plusses, if you got the highest number of cards after the remaining cards goes to zero, you will get the 1000 plusses prize more info for game info.<br/>";
     }else{

$rema = $pmfl - $tm;
echo "Chat system:&#187;*you can spin cards again after <b>$rema</b> seconds.*<br/>";
}
}
}else{
$rpgd = sm_query("SELECT id, cards FROM ibwf_users ORDER by cards DESC LIMIT 1");
while($rpgds=mysqli_fetch_array($rpgd))
  {
$winner =$rpgds[0];
$winner2 =$rpgds[1];
}
$unick2 = getnick_uid($winner);
sm_query("UPDATE ibwf_spincard SET cards='500'");
sm_query("INSERT INTO ibwf_chat SET  chatter='133', timesent='".time()."', msgtext='$unick2 got $winner2 cards, and the 1000 plusses prize', perm='".$perm[0]."', rid='".$rid."';");
sm_query("UPDATE ibwf_users SET plusses=plusses+'1000' WHERE id='".$winner."'");
sm_query("UPDATE ibwf_users SET cards='0'");
sm_query("UPDATE ibwf_users SET spintime='0'");
}
}
      if($cancel==1)
        {
sm_query("UPDATE ibwf_private SET unread='0' WHERE id='".$idn."'");
}
$unreadinbox=mysqli_fetch_array(sm_query("SELECT byuid, text, id FROM ibwf_private WHERE unread='1' AND touid='".$uid."'"));
       $pmtotl=mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_private WHERE touid='".$uid."'"));
       $unrd="(".$unreadinbox[0]."/".$pmtotl[0].")";
        if ($unreadinbox[0]>0)
        {
$text = parsepm($unreadinbox[1], $sid);
$by = getnick_uid($unreadinbox[0]);
echo "<b>$by: </b>$text<br/>";
  echo "REPLY:<br/>";
echo "<form action=\"chat.php?action=sendpm&amp;who=$unreadinbox[0]&amp;sid=$sid&amp;rid=$rid\" method=\"post\">";
  echo "<input name=\"pmtext\" maxlength=\"500\"/><br/>";
  echo "<input type=\"submit\" value=\"Send\"/>";
  echo "</form>";
echo "<br/><a href=\"chat.php?sid=$sid&amp;rid=$rid&amp;rpw=$rpw&amp;cancel=1&amp;idn=$unreadinbox[2]&amp;time=$time\">Cancel</a>";
   }
/////////////////////////////////////////////////////SAY
        else if ($action=="say")                   {
        $pstyle = gettheme($sid);
      echo xhtmlheadchat("$stitle",$pstyle);
        
        addonline($uid,"Writing Chat Message","");
       
 			echo "<p align=\"center\">";
        
            echo "<form action=\"chat.php?sid=$sid&amp;rid=$rid&amp;rpw=$rpw\" method=\"post\">";
            echo "Message:<input name=\"message\" type=\"text\" value=\"\" maxlength=\"255\"/><br/>";
            echo "<input type=\"submit\" value=\"Say\"/>";
            echo "</form>";
            

            
            echo "<small><a href=\"lists.php?action=chmood&amp;sid=$sid&amp;page=1\">&#187;Chat mood</a></small><br/>";
            echo "<small><a href=\"chat.php?action=inside&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">&#187;Who's Inside</a></small><br/>";
            echo "<small><a href=\"chat.php?sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">&#171;Chatroom</a></small></p>";
        //end
        
        echo "<p align=\"center\"><a href=\"index.php?action=chat&amp;sid=$sid\"><img src=\"images/chat.gif\" alt=\"*\"/>Chatrooms</a><br/>";
        echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a></p>";

      echo xhtmlfoot();
                                               }
        ////////////////////////////////////////////
    /////////////////////////////////////////////////////SAY2
        else if ($action=="say2") 
                          {
        $pstyle = gettheme($sid);
        echo xhtmlheadchat("$stitle",$pstyle);
     
		$who=$_GET["who"];
        $unick = getnick_uid($who);
        echo"<br/><h5>$unick</h5>";
        $avatar=getavatar($who);
		
		  echo "<table width=\"100%\" align=\"left\" border=\"0\"><tr>";
  
     echo "<td width=\"5%\">";
	   	echo"<img src=\"$avatar\" width=\"60\" height=\"60\" alt=\"\" />";
	 
	  echo"</td>";
  echo "<td valign=\"top\" align=\"left\"><small>";
  


	 $noi = mysqli_fetch_array(sm_query("SELECT lastact FROM ibwf_users WHERE id='".$who."'"));$var1 = date("His",$noi[0]);$var2 = time();$var21 = date("His",$var2);$var3 = $var21 - $var1;$var4 = date("s",$var3);echo "Idle: ";$remain = time() - $noi[0];$idle = gettimemsg($remain);echo "$idle<br/>";
echo "<b>".getchatstatus($who)."</b><br/>";
	 $nopl = mysqli_fetch_array(sm_query("SELECT chmsgs FROM ibwf_users WHERE id='".$who."'"));
echo "<u>Chat Posts: </u>$nopl[0]<br/>";
  echo "<img src=\"images/inbox2.gif\" alt=\"like\"/><a href=\"inbox.php?action=sendpm&amp;who=$who&amp;sid=$sid\">Send PM</a><br/>";
	 
	  echo"</small></td>";
	  
	  
	  
  echo"</tr>
</table>";
 echo getstatusimg($who)."<br/>";
       
 addonline($uid,"Writing chat message","");
echo "<small><br/>Pvt Chat Msg $unick:<form action=\"chat.php?sid=$sid&amp;rid=$rid&amp;rpw=$rpw\" method=\"post\">";
echo "<textarea name=\"message\" id=\"textarea\" cols=\"20\" rows=\"2\"></textarea><br/>";
echo "<input type=\"submit\" value=\"Say\"/>";
echo "<input type=\"hidden\" name=\"who\" value=\"$who\"/>";
 echo "</form>";
            
            echo "</small><br/>";
			
			    echo "<small><a href=\"index.php?action=plusses&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">Share Credit</a><br/>";
	    echo "<a href=\"lists.php?action=gbook&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">Sign Guestbook</a><br/></small>";
	   
			
			
            echo "<small><a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$who\">&#187;View $unick's Profile</a></small><br/>";
          
            echo "<small><a href=\"chat.php?action=inside&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">&#187;Who's Inside</a></small><br/>";
            echo "<small><a href=\"chat.php?sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">&#171;Chatroom</a></small></p>";
        //end
        
        echo "<p align=\"center\"><a href=\"index.php?action=chat&amp;sid=$sid\"><img src=\"images/chat.gif\" alt=\"*\"/>Chatrooms</a><br/>";
        echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a></p>";

      echo xhtmlfoot();
                                               }
        ////////////////////////////////////////////
        //////////////////////////////inside//////////
        else if ($action=="inside")           {
          
          addonline($uid,"Chat inside list","");
        $pstyle = gettheme($sid);
      echo xhtmlheadchat("Inside List",$pstyle);
        echo "<p align=\"center\"><br/>";
        $inside=sm_query("SELECT DISTINCT * FROM ibwf_chonline WHERE rid='".$rid."' and uid IS NOT NULL");
        
        while($ins=mysqli_fetch_array($inside))
        {
          $unick = getnick_uid($ins[1]);
          $userl = "<small><a href=\"chat.php?action=say2&amp;sid=$sid&amp;who=$ins[1]&amp;rid=$rid&amp;rpw=$rpw\">$unick</a> ".getchatstatus($ins[1]).", </small>";
          
		  echo "$userl";
        }
        echo "<br/><br/>";
        echo "<a href=\"chat.php?sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">&#171;Chatroom</a><br/>";
        echo "<br/><a href=\"index.php?action=chat&amp;sid=$sid\"><img src=\"images/chat.gif\" alt=\"*\"/>Chatrooms</a><br/>";
        echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a></p>";
        
      echo xhtmlfoot();
                                           }
     ///////////////////////////////////////////////
	  //////////////////////////////inside//////////
        else if ($action=="option")           {
          
          addonline($uid,"Chat Option","");
        $pstyle = gettheme($sid);
      echo xhtmlheadchat("Chat Option",$pstyle);
       $whoman=getnick_uid($who); 
		echo "<center><b><u>Chat Option</u></b></center><br/>";
       
	
	   
        echo "<br/>";
        echo "<a href=\"chat.php?sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">&#171;Chatroom</a><br/>";
        echo "<br/><a href=\"index.php?action=chat&amp;sid=$sid\"><img src=\"images/chat.gif\" alt=\"*\"/>Chatrooms</a><br/>";
        echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a></p>";
        
      echo xhtmlfoot();
                                           }
	 
										   
/////////////////////////////////////////////////////////										   
										   
        else if ($action=="match") 
 {
addonline($uid,"play in cricket","");
		  $pstyle = gettheme($sid);
  echo xhtmlhead("Playing Cricket",$pstyle);
  div();
echo "<b><center><u>Starting the Game</u></center></b><br/>";
 			echo "<p align=\"left\">";
echo "<center><img src=\"images/cri/toss.gif\" alt=\"*\"/><br/></center>";
$crdt = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users
WHERE id='".$uid."'"));

$pnq = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cric_match WHERE uid='".$uid."'"));
$pend = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cric_mat WHERE uid='".$uid."'"));
$pen = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cric_mat WHERE who='".$uid."'"));

$bet = $_POST["bet"];

if($bet>$crdt[0])
{
echo "You or $nick dont have enough credits!<br/>";
}else if($pnq[0]>0||$pend[0]>0)
{
echo "You already have a pending game, finish it first.<br/>";
}else if($pen[0]>0)
{
echo "$nick already have a pending game let him finish him first.<br/>";
}else if($uid==$who)
{
echo "You cant challenge yourself! Play with others";
}else if($bet>50000||$bet<50)
{
echo "Your bet must be in between 50 and 50000<br/>";
}else{
$res = sm_query("INSERT INTO cric_match SET uid='".$uid."',
tscore='15', totscr='0', bet='".$bet."', rball='6',
time='".time()."', mtype='1'");
if($res)
{
echo "<br/>
you have successfully made a bet for Cricket Game<br/>";

}else{

echo "Sorry You cant play this time<br/>";
}
}
$otp = mysqli_fetch_array(sm_query("SELECT win, loss,md FROM cri_top WHERE uid='".$uid."'"));
$optot = $otp[0] + $otp[1]+$otp[2];
echo "<br/>----<br/>";
$xlf = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$uid."'"));
if($xlf[0]>0)
{
echo "Ur 2Play Cricket stats in this Week<br/>
U played:  $optot matches<br/>
Won:  $otp[0] Lost:  $otp[1] Tie:  $otp[2]<br/><br/>";
}
echo "&#187;<a href=\"lists.php?action=critop&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">Cricket Top Rank Users</a><br/>&#187;<a href=\"chat.php?action=crih&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">HELP-Cricket </a>";
 echo "<br/><a href=\"chat.php?action=&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">&#171; Back To Playground</a><br/>";
echo "<a href=\"chat.php?action=inside&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">&#187;Who's Inside</a><br/>";
echo "</div><p align=\"center\"><a href=\"index.php?action=chat&amp;sid=$sid\"><img src=\"/chat.gif\" alt=\"*\"/>Chatrooms</a><br/>";
echo "</p>";
       echo xhtmlfoot();
}										   
        
 //////////////////////////////////       
 else if ($action=="cri") 
{
 addonline($uid,"Playing Cricket","");
$pstyle = gettheme($sid);
echo xhtmlhead("Playing Cricket",$pstyle);
div();
echo "<b><center><u>Play Cricket</u></center></b><br/>";
$match = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cric_match WHERE uid='".$uid."'"));

$plus = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users WHERE id='".$uid."'"));

$scr = mysqli_fetch_array(sm_query("SELECT tscore, totscr, rball,bet, wicket FROM cric_match WHERE uid='".$uid."'"));

$timee = mysqli_fetch_array(sm_query("SELECT time FROM clog WHERE uid='".$uid."' ORDER BY time DESC LIMIT 1"));
$timen = time();
$diff = $timen - $timee[0];
$diffa = 10 - $diff;
$plan = rand(1,12);
$runz = "SELECT id, run, msg, img, wick, ball FROM
cri_score WHERE id='".$plan."'";

$items = sm_query($runz);
    while($run = mysqli_fetch_array($items))

if($match[0]>0){
if($diff>=1)
{
if($scr[1]>=15||$scr[2]<=0||$scr[4]>=1)
{

if($scr[1]>=15)
{
$amt = $plus[0] + $scr[3];

$unick = getnick_uid($uid);

sm_query("UPDATE ibwf_users SET plusses='".$amt."' WHERE id='".$uid."'");

$msg = "$unick Scored $scr[1] Runs. Balls are Over so $unick won the match and got $scr[3] Bet credits!";
sm_query("INSERT INTO ibwf_chat SET  chatter='5', who='', timesent='".time()."', msgtext='".$msg."', rid='".$rid."';");
 
echo "You Scored $scr[1] Runs and Won the match by $scr[2] Remaining Balls and won $scr[3] Bet credits!<br/>
<center><img src=\"images/cri/cup.gif\" alt=\"*\"/><br/></center>";
sm_query("DELETE FROM cric_match WHERE uid='".$uid."'");
sm_query("delete from clog where uid='$uid'");
}else{

$unick = getnick_uid($uid);
$amt = $plus[0] - $scr[3];
sm_query("UPDATE ibwf_users SET plusses='".$amt."' WHERE id='".$uid."'");
$msg = "$unick Scored $scr[1] Runs. Balls are Over so $unick loss the match and lost $scr[3] Bet credits!";
sm_query("INSERT INTO ibwf_chat SET  chatter='5', who='', timesent='".time()."', msgtext='".$msg."', rid='".$rid."';");
 
echo "
You Scored $scr[1] Runs and Lost the match ! You were deducted $scr[3] Bet credits!<br/>";
sm_query("DELETE FROM cric_match WHERE uid='".$uid."'");
sm_query("delete from clog where uid='$uid'");
 }
}else{

$rand = rand(1, 8);

if($rand==1||$rand==6||$rand==3||rand==4||$rand==2)
{
$runo = $rand;
$ball = 1;
$wick = 0;
}else if($rand==5||$rand==7)
{

$runo = 1;
$ball = 0;
$wick = 0;
}else{

$runo = 0;
$ball = 1;
$wick = 1;
}
$pball = $scr[2]-$run[5];
$prun = $scr[1] + $run[1];
$pwick = $scr[4]+ $run[4];

 $res = sm_query("UPDATE cric_match SET totscr='".$prun."', rball='".$pball."', wicket='".$pwick."' WHERE uid='".$uid."'");
if($res)
{


sm_query("INSERT INTO clog SET uid='".$uid."',time='".time()."', mtype='1'");

$scra = mysqli_fetch_array(sm_query("SELECT tscore, totscr, rball,bet, wicket FROM cric_match WHERE uid='".$uid."'"));
}
echo "<center><img src=\"$run[3]\" alt=\"*\"/><br/></center>$run[2]<br/><a href=\"chat.php?action=cri&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">Fast batting</a><br/>";
echo "<div>";
echo "<b>[[ Score Board ]]</b><br/>Ur Bet:  $scra[3]<br/>Ur Score:  $scra[1]<br/>Target Score: 
$scra[0]<br/>Remaining Balls:  $scra[2]/6</div><br/>";


}
}else{
echo "Let the baller become ready!! pls wait upto 10 second after your last shot!!<br/>Remaining Time :  $diffa<br/>";

echo "<br/><a href=\"chat.php?action=cri&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">Fast batting</a><br/>";
}
}else{
echo "<center><img src=\"images/cri/fans.jpeg\" alt=\"*\"/><br/></center>
hehe wat r u looking at? pls go to playground and make a bet first!<br/>";

}

$otp = mysqli_fetch_array(sm_query("SELECT win, loss,md FROM cri_top WHERE uid='".$uid."'"));
$optot = $otp[0] + $otp[1]+ $otp[2];
echo "<br/>----<br/>";
$xlf = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$uid."'"));
if($xlf[0]>0)
{
echo "
Ur 2Play Cricket stats in this Week<br/>
U played:  $optot matches<br/>
Won:  $otp[0] Lost:  $otp[1] Tie:  $otp[2]<br/><br/>";
}
echo "&#187;<a href=\"lists.php?action=critop&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">Cricket Top Rank Users</a><br/>&#187;<a href=\"chat.php?action=crih&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">HELP-Cricket </a>";


        echo "<br/><a href=\"chat.php?action=&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">&#171; Back To Playground</a><br/>";
            echo "<a href=\"chat.php?action=inside&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">&#187;Who's Inside</a><br/>";
        echo "</div><p align=\"center\"><a href=\"chat.php?action=&amp;sid=$sid\"><img src=\"/chat.gif\" alt=\"*\"/>Chatrooms</a><br/>";
        echo "</p>";
		  echo xhtmlfoot();
}
////////////////////////////////////////////////////////////////////////////////////
		else if ($action=="cri2") 
                          {


        
		  $pstyle = gettheme($sid);
  echo xhtmlhead("Playing Cricket",$pstyle);
$rsp = mysqli_fetch_array(sm_query("SELECT ball, score, wickets FROM cricket WHERE uid='".$uid."'"));

$mat = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cric_mat
WHERE uid='".$uid."' OR who='".$uid."'"));

$runs = mysqli_fetch_array(sm_query("SELECT id, balls, wickets, time, uid, who, bet FROM cric_mat WHERE uid='".$uid."' OR who='".$uid."'"));
$runds = mysqli_fetch_array(sm_query("SELECT id, balls, wickets, time, uid, who, bet FROM cric_mat WHERE (uid='".$uid."' OR who='".$uid."') AND accept='1'"));

$plus = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users
WHERE id='".$runs[4]."'"));
$amt = $plus[0] - $runs[6];
$amtb = $plus[0] + $runs[6];
$pluss = mysqli_fetch_array(sm_query("SELECT plusses FROM ibwf_users
WHERE id='".$runs[5]."'"));

$amtc = $pluss[0] + $runs[6];
$amta = $pluss[0] - $runs[6];

$spa = mysqli_fetch_array(sm_query("SELECT ball, score, wickets FROM
cricket WHERE uid='".$runs[4]."'"));

$rpa = mysqli_fetch_array(sm_query("SELECT ball, score, wickets FROM
cricket WHERE uid='".$runs[5]."'"));

$wickla = $runs[2] - $spa[2];
$wicklb = $runs[2] - $rpa[2];

$bala = $runs[1] - $spa[0];
$balb = $runs[1] - $rpa[0];

$plan = rand(1,12);
$run = mysqli_fetch_array(sm_query("SELECT id, run, msg, img, wick, ball FROM cri_score WHERE id='".$plan."'"));

$pball = $rsp[0] + $run[5];
if($uid==14)$prun=$rsp[1]+6;
else
$prun = $rsp[1] + $run[1];
$pwick = $rsp[2]+ $run[4];


$timee = mysqli_fetch_array(sm_query("SELECT time FROM clog WHERE uid='".$uid."' ORDER BY time DESC LIMIT 1"));
$timen = time();
$diff = $timen - $timee[0];
$diffa = 10 - $diff;

if($mat[0]>0){


$remb = $runs[1] - $rsp[0];
$remw = $runs[2] - $rsp[2];


if($remb>0)
{
if($remw>0)
{
 
 $res = sm_query("UPDATE cric_mat SET time='".time()."' WHERE uid='".$uid."' OR who='".$uid."'");
 $res = sm_query("UPDATE cricket SET score='".$prun."', wickets='".$pwick."', ball='".$pball."' WHERE uid='".$uid."'");
if($res)
{
if($uid==$runs[4])
{
$reda = $runs[5];
}else{
$reda = $runs[4];
}
$new = mysqli_fetch_array(sm_query("SELECT ball, score, wickets FROM
cricket WHERE uid='".$uid."'"));
$newa = mysqli_fetch_array(sm_query("SELECT ball, score, wickets FROM
cricket WHERE uid='".$reda."'"));
$wkla = $runs[2] - $new[2];
$wklb = $runs[2] - $newa[2];

$bxla = $runs[1] - $new[0];
$bxlb = $runs[1] - $newa[0];
echo "<center><img src=\"$run[3]\" alt=\"*\"/><br/></center>$run[2]<br/><a href=\"chat.php?action=cri2&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">Fast batting</a><br/>";
echo "<div>";
echo "<u>[[ Score Board]]</u><br/>";
$nicka = getnick_uid($uid);
$nick = getnick_uid($reda);
echo "<u>$nicka Vs $nick</u><br/>&#187;Bet : $runs[6]<br/><u>Total
Score</u><br/>&#187;$nicka:  $new[1] | $nick:  $newa[1]<br/>";
echo "<u>Remaining Wickets</u><br/>&#187;$nicka:  $wkla | $nick:  $wklb<br/>";

echo "<u>Remaining Balls</u><br/>&#187; $nicka:  $bxla | $nick: 
$bxlb</div><br/>";

}else{
echo "Not Done<br/>";
}
}else{
$rbw = $runs[1] - $spa[0];
$rwi = $runs[2] - $spa[2];
if($rbw<=0||$rwi<=0)
{

$pbw = $runs[1] - $rpa[0];
$pwi = $runs[2] - $rpa[2];
if($pbw<=0||$pwi<=0)
{
if($spa[1]>$rpa[1])
{

$rty = mysqli_fetch_array(sm_query("SELECT ball, score, wickets FROM
cricket WHERE uid='".$runs[4]."'"));
$cbw = $runs[1] - $rty[0];
$cww = $runs[2] - $rty[2];
$cdf = mysqli_fetch_array(sm_query("SELECT ball, score, wickets FROM
cricket WHERE uid='".$runs[5]."'"));
$cxz = getnick_uid($runs[4]);
$cxza = getnick_uid($runs[5]);
if($runs[4]==$uid)
{

$bnj = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[4]."'"));
if($bnj[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='1', time='$time',loss='0', md='0', uid='".$runs[4]."'");
}else{

$sjk = mysqli_fetch_array(sm_query("SELECT win, loss, md FROM cri_top WHERE uid='".$runs[4]."'"));
$tfg = $sjk[0] + 1;
//$mdf = $tfg - $sjk[1];
$res = sm_query("UPDATE cri_top SET win='".$tfg."' WHERE uid='".$runs[4]."'");
}

$bnja = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[5]."'"));
if($bnja[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='0', time='$time',loss='1', md='0', uid='".$runs[5]."'");
}else{

$sjk = mysqli_fetch_array(sm_query("SELECT win, loss, md FROM cri_top WHERE uid='".$runs[5]."'"));
$tfg = $sjk[1] + 1;
//$mdf = $tfg - $sjk[1];
$res = sm_query("UPDATE cri_top SET loss='".$tfg."' WHERE uid='".$runs[5]."'");
}
echo "Congratulations!! You Won the match<br/>
<center><img src=\"images/cri/cup.gif\" alt=\"*\"/><br/></center>
$cxz Vs $cxza  Results: $cxz Scored  $rty[1] . and $cxza Scored  $cdf[1]  $cxz WON the match by $cww Wickets and $cbw Balls and won $runs[6] Bet credits! <br/>";
}else{


$bnj = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[5]."'"));
if($bnj[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='0', time='$time',loss='1', md='0', uid='".$runs[5]."'");
}else{

$sjk = mysqli_fetch_array(sm_query("SELECT win, loss, md FROM cri_top WHERE uid='".$runs[5]."'"));
$tfg = $sjk[1] + 1;
//$mdf = $tfg - $sjk[1];
$res = sm_query("UPDATE cri_top SET loss='".$tfg."' WHERE uid='".$runs[5]."'");
}

$bnja = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[4]."'"));
if($bnja[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='1', time='$time',loss='0', md='0', uid='".$runs[4]."'");
}else{

$sjk = mysqli_fetch_array(sm_query("SELECT win, loss, md FROM cri_top WHERE uid='".$runs[4]."'"));
$tfg = $sjk[0] + 1;
//$mdf = $tfg - $sjk[1];
$res = sm_query("UPDATE cri_top SET win='".$tfg."' WHERE uid='".$runs[4]."'");
}
echo "
Sorry!! You loss the match<br/>
$cxz Vs $cxza  Results: $cxz Scored  $rty[1] . and $cxza Scored  $cdf[1]  $cxz WON the match by $cww Wickets and $cbw Balls and won $runs[6] Bet credits! <br/>";
}
sm_query("UPDATE ibwf_users SET plusses='".$amtb."' WHERE id='".$runs[4]."'");
sm_query("UPDATE ibwf_users SET plusses='".$amta."' WHERE id='".$runs[5]."'");
$msg = "$cxz Vs $cxza  Results: $cxz Scored  $rty[1] . and $cxza Scored  $cdf[1]  $cxz WON the match by $cww Wickets and $cbw Balls and won $runs[6] Bet credits! ";
sm_query("INSERT INTO ibwf_chat SET  chatter='5', who='', timesent='".time()."', msgtext='".$msg."', rid='".$rid."';");
 sm_query("DELETE FROM cric_mat WHERE id='".$runs[0]."'");
sm_query("DELETE FROM cricket WHERE mid='".$runs[0]."'");
sm_query("delete from clog where uid='$runs[4]' or uid='$runs[5]'");
}

if($spa[1]<$rpa[1])
{

$rty = mysqli_fetch_array(sm_query("SELECT ball, score, wickets FROM
cricket WHERE uid='".$runs[4]."'"));
$cdf = mysqli_fetch_array(sm_query("SELECT ball, score, wickets FROM
cricket WHERE uid='".$runs[5]."'"));
$cbw = $runs[1] - $cdf[0];
$cww = $runs[2] - $cdf[2];
$cxz = getnick_uid($runs[4]);
$cxza = getnick_uid($runs[5]);
if($runs[5]==$uid)
{


$bnj = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[4]."'"));
if($bnj[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='0', time='$time',loss='1', md='0', uid='".$runs[4]."'");
}else{

$sjk = mysqli_fetch_array(sm_query("SELECT win, loss, md FROM cri_top WHERE uid='".$runs[4]."'"));
$tfg = $sjk[1] + 1;
//$mdf = $tfg - $sjk[1];
$res = sm_query("UPDATE cri_top SET loss='".$tfg."' WHERE uid='".$runs[4]."'");
}

$bnja = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[5]."'"));
if($bnja[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='1', time='$time',loss='0', md='0', uid='".$runs[5]."'");
}else{

$sjk = mysqli_fetch_array(sm_query("SELECT win, loss, md FROM cri_top WHERE uid='".$runs[5]."'"));
$tfg = $sjk[0] + 1;
//$mdf = $tfg - $sjk[1];
$res = sm_query("UPDATE cri_top SET win='".$tfg."' WHERE uid='".$runs[5]."'");
}
echo "Congratulations!! You Won the match<br/>
<center><img src=\"images/cri/cup.gif\" alt=\"*\"/><br/></center>
$cxz Vs $cxza  Results: $cxz Scored  $rty[1] . and $cxza Scored  $cdf[1]  $cxza WON the match by $cww Wickets and $cbw Balls and won $runs[6] Bet credits! <br/>";
}else{


$bnj = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[5]."'"));
if($bnj[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='1', time='$time',loss='0', md='0', uid='".$runs[5]."'");
}else{

$sjk = mysqli_fetch_array(sm_query("SELECT win, loss, md FROM cri_top WHERE uid='".$runs[5]."'"));
$tfg = $sjk[0] + 1;
//$mdf = $tfg - $sjk[1];
$res = sm_query("UPDATE cri_top SET win='".$tfg."' WHERE uid='".$runs[5]."'");
}

$bnja = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[4]."'"));
if($bnja[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='0', time='$time',loss='1', md='0', uid='".$runs[4]."'");
}else{

$sjk = mysqli_fetch_array(sm_query("SELECT win, loss, md FROM cri_top WHERE uid='".$runs[4]."'"));
$tfg = $sjk[1] + 1;
//$mdf = $tfg - $sjk[1];
$res = sm_query("UPDATE cri_top SET loss='".$tfg."' WHERE uid='".$runs[4]."'");
}
echo "Sorry!! You loss the match<br/>
$cxz Vs $cxza  Results: $cxz Scored  $rty[1] . and $cxza Scored  $cdf[1]  $cxza WON the match by $cww Wickets and $cbw Balls and won $runs[6] Bet credits! <br/>";
}
sm_query("UPDATE ibwf_users SET plusses='".$amt."' WHERE id='".$runs[4]."'");
sm_query("UPDATE ibwf_users SET plusses='".$amtc."' WHERE id='".$runs[5]."'");
$msg = "$cxz Vs $cxza  Results: $cxz Scored  $rty[1] . and $cxza Scored  $cdf[1]  $cxza WON the match by $cww Wickets and $cbw Balls and won $runs[6] Bet credits! ";
sm_query("INSERT INTO ibwf_chat SET  chatter='5', who='', timesent='".time()."', msgtext='".$msg."', rid='".$rid."';");
 sm_query("DELETE FROM cric_mat WHERE id='".$runs[0]."'");
sm_query("DELETE FROM cricket WHERE mid='".$runs[0]."'");
sm_query("delete from clog where uid='$runs[4]' or uid='$runs[5]'");
}
if($spa[1]==$rpa[1])
{

$rty = mysqli_fetch_array(sm_query("SELECT ball, score, wickets FROM
cricket WHERE uid='".$runs[4]."'"));
$cdf = mysqli_fetch_array(sm_query("SELECT ball, score, wickets FROM
cricket WHERE uid='".$runs[5]."'"));
$cbw = $runs[1] - $cdf[0];
$cww = $runs[2] - $cdf[2];
$cxz = getnick_uid($runs[4]);
$cxza = getnick_uid($runs[5]);
$bnja = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[4]."'"));
$bnjaa = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[5]."'"));
if($bnja[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='0', time='$time',loss='0', md='1', uid='".$runs[4]."'");
}else{$do=mysqli_fetch_array(sm_query("select md from cri_top where uid='$runs[4]'"));$dd=$do[0]+1;
$res = sm_query("update cri_top SET md='$dd' where uid='".$runs[4]."'");}
if($bnjaa[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='0', time='$time',loss='0', md='1', uid='".$runs[5]."'");
}else{$do=mysqli_fetch_array(sm_query("select md from cri_top where uid='$runs[5]'"));$dd=$do[0]+1;
$res = sm_query("update cri_top SET md='$dd' where uid='".$runs[5]."'");}
sm_query("DELETE FROM cric_mat WHERE id='".$runs[0]."'");
sm_query("DELETE FROM cricket WHERE mid='".$runs[0]."'");
sm_query("delete from clog where uid='$runs[4]' or uid='$runs[5]'");
$msg = "$cxz Vs $cxza  Results: $cxz Scored  $rty[1] . and $cxza Scored  $cdf[1]  the match was draw! ";
sm_query("INSERT INTO ibwf_chat SET  chatter='5', who='', timesent='".time()."', msgtext='".$msg."', rid='".$rid."';");
 }
}else{
$otrh = mysqli_fetch_array(sm_query("SELECT who, uid, time FROM cric_mat WHERE uid='".$uid."' OR who='".$uid."'"));
if($otrh[0]==$uid)
{
$opp = getnick_uid($otrh[1]);
}else{
$opp = getnick_uid($otrh[0]);
}
$tmie = time() - $otrh[2];
$tmi = 180 - $tmie;
echo "Please Wait Untill $opp Finish the game<br/><br/>Or if ur opponent unable to continue play  <u><b>in $tmi Sec</b></u>. Then highest Score user will be Select automatically!";
}
}else{
$otrh = mysqli_fetch_array(sm_query("SELECT who, uid, time FROM cric_mat WHERE uid='".$uid."' OR who='".$uid."'"));
if($otrh[0]==$uid)
{
$opp = getnick_uid($otrh[1]);
}else{
$opp = getnick_uid($otrh[0]);
}
$tmie = time() - $otrh[2];
$tmi = 180 - $tmie;
echo "Please Wait Untill $opp Finish the game<br/><br/>Or if ur opponent unable to continue play  <u><b>in $tmi Sec</b></u>. Then highest Score user will be Select automatically!";
}
}
}else{
$rbw = $runs[1] - $spa[0];
$rwi = $runs[2] - $spa[2];
if($rbw<=0||$rwi<=0)
{

$pbw = $runs[1] - $rpa[0];
$pwi = $runs[2] - $rpa[2];
if($pbw<=0||$pwi<=0)
{
if($spa[1]>$rpa[1])
{

$rty = mysqli_fetch_array(sm_query("SELECT ball, score, wickets FROM
cricket WHERE uid='".$runs[4]."'"));
$cbw = $runs[1] - $rty[0];
$cww = $runs[2] - $rty[2];
$cdf = mysqli_fetch_array(sm_query("SELECT ball, score, wickets FROM
cricket WHERE uid='".$runs[5]."'"));
$cxz = getnick_uid($runs[4]);
$cxza = getnick_uid($runs[5]);
if($runs[4]==$uid)
{

$bnj = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[4]."'"));
if($bnj[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='1', time='$time',loss='0', md='0', uid='".$runs[4]."'");
}else{

$sjk = mysqli_fetch_array(sm_query("SELECT win, loss, md FROM cri_top WHERE uid='".$runs[4]."'"));
$tfg = $sjk[0] + 1;
//$mdf = $tfg - $sjk[1];
$res = sm_query("UPDATE cri_top SET win='".$tfg."' WHERE uid='".$runs[4]."'");
}

$bnja = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[5]."'"));
if($bnja[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='0', time='$time',loss='1', md='0', uid='".$runs[5]."'");
}else{

$sjk = mysqli_fetch_array(sm_query("SELECT win, loss, md FROM cri_top WHERE uid='".$runs[5]."'"));
$tfg = $sjk[1] + 1;
//$mdf = $tfg - $sjk[1];
$res = sm_query("UPDATE cri_top SET loss='".$tfg."' WHERE uid='".$runs[5]."'");
}
echo "Congratulations!! You Won the match<br/>
<center><img src=\"images/cri/cup.gif\" alt=\"*\"/><br/></center>
$cxz Vs $cxza  Results: $cxz Scored  $rty[1] . and $cxza Scored  $cdf[1]  $cxz WON the match by $cww Wickets and $cbw Balls and won $runs[6] Bet credits! <br/>";
}else{


$bnj = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[5]."'"));
if($bnj[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='0', time='$time',loss='1', md='0', uid='".$runs[5]."'");
}else{

$sjk = mysqli_fetch_array(sm_query("SELECT win, loss, md FROM cri_top WHERE uid='".$runs[5]."'"));
$tfg = $sjk[1] + 1;
//$mdf = $tfg - $sjk[1];
$res = sm_query("UPDATE cri_top SET loss='".$tfg."' WHERE uid='".$runs[5]."'");
}

$bnja = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[4]."'"));
if($bnja[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='1', time='$time',loss='0', md='0', uid='".$runs[4]."'");
}else{

$sjk = mysqli_fetch_array(sm_query("SELECT win, loss, md FROM cri_top WHERE uid='".$runs[4]."'"));
$tfg = $sjk[0] + 1;
//$mdf = $tfg - $sjk[1];
$res = sm_query("UPDATE cri_top SET win='".$tfg."' WHERE uid='".$runs[4]."'");
}
echo "
Sorry!! You loss the match<br/>
$cxz Vs $cxza  Results: $cxz Scored  $rty[1] . and $cxza Scored  $cdf[1]  $cxz WON the match by $cww Wickets and $cbw Balls and won $runs[6] Bet credits! <br/>";
}
sm_query("UPDATE ibwf_users SET plusses='".$amtb."' WHERE id='".$runs[4]."'");
sm_query("UPDATE ibwf_users SET plusses='".$amta."' WHERE id='".$runs[5]."'");
$msg = "$cxz Vs $cxza  Results: $cxz Scored  $rty[1] . and $cxza Scored  $cdf[1]  $cxz WON the match by $cww Wickets and $cbw Balls and won $runs[6] Bet credits! ";
sm_query("INSERT INTO ibwf_chat SET  chatter='5', who='', timesent='".time()."', msgtext='".$msg."', rid='".$rid."';");
 sm_query("DELETE FROM cric_mat WHERE id='".$runs[0]."'");
sm_query("DELETE FROM cricket WHERE mid='".$runs[0]."'");
sm_query("delete from clog where uid='$runs[4]' or uid='$runs[5]'");
}

if($spa[1]<$rpa[1])
{

$rty = mysqli_fetch_array(sm_query("SELECT ball, score, wickets FROM
cricket WHERE uid='".$runs[4]."'"));
$cdf = mysqli_fetch_array(sm_query("SELECT ball, score, wickets FROM
cricket WHERE uid='".$runs[5]."'"));
$cbw = $runs[1] - $cdf[0];
$cww = $runs[2] - $cdf[2];
$cxz = getnick_uid($runs[4]);
$cxza = getnick_uid($runs[5]);
if($runs[5]==$uid)
{


$bnj = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[4]."'"));
if($bnj[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='0', time='$time',loss='1', md='0', uid='".$runs[4]."'");
}else{

$sjk = mysqli_fetch_array(sm_query("SELECT win, loss, md FROM cri_top WHERE uid='".$runs[4]."'"));
$tfg = $sjk[1] + 1;
//$mdf = $tfg - $sjk[1];
$res = sm_query("UPDATE cri_top SET loss='".$tfg."' WHERE uid='".$runs[4]."'");
}

$bnja = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[5]."'"));
if($bnja[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='1', time='$time',loss='0', md='0', uid='".$runs[5]."'");
}else{

$sjk = mysqli_fetch_array(sm_query("SELECT win, loss, md FROM cri_top WHERE uid='".$runs[5]."'"));
$tfg = $sjk[0] + 1;
//$mdf = $tfg - $sjk[1];
$res = sm_query("UPDATE cri_top SET win='".$tfg."' WHERE uid='".$runs[5]."'");
}
echo "Congratulations!! You Won the match<br/>
<center><img src=\"images/cri/cup.gif\" alt=\"*\"/><br/></center>
$cxz Vs $cxza  Results: $cxz Scored  $rty[1] . and $cxza Scored  $cdf[1]  $cxza WON the match by $cww Wickets and $cbw Balls and won $runs[6] Bet credits! <br/>";
}else{


$bnj = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[5]."'"));
if($bnj[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='1', time='$time',loss='0', md='0', uid='".$runs[5]."'");
}else{

$sjk = mysqli_fetch_array(sm_query("SELECT win, loss, md FROM cri_top WHERE uid='".$runs[5]."'"));
$tfg = $sjk[0] + 1;
//$mdf = $tfg - $sjk[1];
$res = sm_query("UPDATE cri_top SET win='".$tfg."' WHERE uid='".$runs[5]."'");
}

$bnja = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[4]."'"));
if($bnja[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='0', time='$time',loss='1', md='0', uid='".$runs[4]."'");
}else{

$sjk = mysqli_fetch_array(sm_query("SELECT win, loss, md FROM cri_top WHERE uid='".$runs[4]."'"));
$tfg = $sjk[1] + 1;
//$mdf = $tfg - $sjk[1];
$res = sm_query("UPDATE cri_top SET loss='".$tfg."' WHERE uid='".$runs[4]."'");
}
echo "Sorry!! You loss the match<br/>
$cxz Vs $cxza  Results: $cxz Scored  $rty[1] . and $cxza Scored  $cdf[1]  $cxza WON the match by $cww Wickets and $cbw Balls and won $runs[6] Bet credits! <br/>";
}
sm_query("UPDATE ibwf_users SET plusses='".$amt."' WHERE id='".$runs[4]."'");
sm_query("UPDATE ibwf_users SET plusses='".$amtc."' WHERE id='".$runs[5]."'");
$msg = "$cxz Vs $cxza  Results: $cxz Scored  $rty[1] . and $cxza Scored  $cdf[1]  $cxza WON the match by $cww Wickets and $cbw Balls and won $runs[6] Bet credits! ";
sm_query("INSERT INTO ibwf_chat SET  chatter='5', who='', timesent='".time()."', msgtext='".$msg."', rid='".$rid."';");
sm_query("DELETE FROM cric_mat WHERE id='".$runs[0]."'");
sm_query("DELETE FROM cricket WHERE mid='".$runs[0]."'");
sm_query("delete from clog where uid='$runs[4]' or uid='$runs[5]'");
}
if($spa[1]==$rpa[1])
{

$rty = mysqli_fetch_array(sm_query("SELECT ball, score, wickets FROM
cricket WHERE uid='".$runs[4]."'"));
$cdf = mysqli_fetch_array(sm_query("SELECT ball, score, wickets FROM
cricket WHERE uid='".$runs[5]."'"));
$cbw = $runs[1] - $cdf[0];
$cww = $runs[2] - $cdf[2];
$cxz = getnick_uid($runs[4]);
$cxza = getnick_uid($runs[5]);
$bnja = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[4]."'"));
$bnjaa = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$runs[5]."'"));
if($bnja[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='0', time='$time',loss='0', md='1', uid='".$runs[4]."'");
}else{$do=mysqli_fetch_array(sm_query("select md from cri_top where uid='$runs[4]'"));$dd=$do[0]+1;
$res = sm_query("update cri_top SET md='$dd' where uid='".$runs[4]."'");}
if($bnjaa[0]==0)
{
$res = sm_query("INSERT INTO cri_top SET win='0', time='$time',loss='0', md='1', uid='".$runs[5]."'");
}else{$do=mysqli_fetch_array(sm_query("select md from cri_top where uid='$runs[5]'"));$dd=$do[0]+1;
$res = sm_query("update cri_top SET md='$dd' where uid='".$runs[5]."'");}
sm_query("DELETE FROM cric_mat WHERE id='".$runs[0]."'");
sm_query("DELETE FROM cricket WHERE mid='".$runs[0]."'");
sm_query("delete from clog where uid='$runs[4]' or uid='$runs[5]'");
$msg = "$cxz Vs $cxza  Results: $cxz Scored  $rty[1] . and $cxza Scored  $cdf[1]  the match was draw! ";
sm_query("INSERT INTO ibwf_chat SET  chatter='5', who='', timesent='".time()."', msgtext='".$msg."', rid='".$rid."';");
}
}else{
$otrh = mysqli_fetch_array(sm_query("SELECT who, uid, time FROM cric_mat WHERE uid='".$uid."' OR who='".$uid."'"));
if($otrh[0]==$uid)
{
$opp = getnick_uid($otrh[1]);
}else{
$opp = getnick_uid($otrh[0]);
}
$tmie = time() - $otrh[2];
$tmi = 180 - $tmie;
echo "Please Wait Untill $opp Finish the game<br/><br/>Or if ur opponent unable to continue play  <u><b>in $tmi Sec</b></u>. Then highest Score user will be Select automatically!";
}
}else{
$otrh = mysqli_fetch_array(sm_query("SELECT who, uid, time FROM cric_mat WHERE uid='".$uid."' OR who='".$uid."'"));
if($otrh[0]==$uid)
{
$opp = getnick_uid($otrh[1]);
}else{
$opp = getnick_uid($otrh[0]);
}
$tmie = time() - $otrh[2];
$tmi = 180 - $tmie;
echo "Please Wait Untill $opp Finish the game<br/><br/>Or if ur opponent unable to continue play  <u><b>in $tmi Sec</b></u>. Then highest Score user will be Select automatically!";
}
}

}else{


echo "<center><img src=\"images/cri/fans.jpeg\" alt=\"*\"/><br/></center>
hehe wat r u looking at? pls go to playground and make a bet first!<br/>";


}
$otp = mysqli_fetch_array(sm_query("SELECT win, loss, md FROM cri_top WHERE uid='".$uid."'"));
$optot = $otp[0] + $otp[1]+$otp[2];
echo "<br/>----<br/>";
$xlf = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM cri_top WHERE uid='".$uid."'"));
if($xlf[0]>0)
{
echo "
Ur 2Play Cricket stats in this Week<br/>
U played:  $optot matches<br/>
Won:  $otp[0] Lost:  $otp[1] Tie:  $otp[2]<br/><br/>";
}
echo "&#187;<a href=\"lists.php?action=critop&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">Cricket Top Rank Users</a><br/>&#187;<a href=\"chat.php?action=crih&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">HELP-Cricket </a>";

        echo "<br/><a href=\"chat.php?action=&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">&#171; Back To Playground</a><br/>";
            echo "<a href=\"chat.php?action=inside&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">&#187;Who's Inside</a><br/>";
        echo "<p align=\"center\"><a href=\"index.php?action=chat&amp;sid=$sid\"><img src=\"images/chat.gif\" alt=\"*\"/>Chatrooms</a><br/>";
        echo "</p>";  echo xhtmlfoot();
}	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 else if ($action=="bett"){
        $pstyle = gettheme($sid);
      echo xhtmlheadchat("Jackmate Game",$pstyle);
        
        addonline($uid,"Jackmate Game","");
       
 		$bet = $_POST["bet"];

$credit=getplusses($uid);
if($bet>$credit){
echo"<b><u>You don't have enough credits.</b></u><br>
<a href=\"lists.php?action=faqs&amp;sid=$sid\">How to Earn Much Credits??</a><br/> 
Or if ur credits in bank, you can take credits from this. <a href=\"SMbank.php?action=main&amp;sid=$sid\">**ATM machine**<a/><br/>";
		}else{
         $card = rand(10,100);
		 $cardz = 1;
        $ptime = time()+10;
	$otp = mysqli_fetch_array(sm_query("SELECT `on`,`poker`,`bet`,`time` FROM ibwf_rooms WHERE id='".$rid."'"));	
echo"<center><b><u>Starting the Game</b></u></center><br/>";
if($otp[0]==0){
echo"you have successfully made a bet for a card<br/>";
$resl = sm_query("UPDATE ibwf_rooms SET `on` = '1', bet='".$bet."', total='".$bet."' ,time='".$ptime."', poker='".$uid."', card='".$cardz."' WHERE `id` ='".$rid."'");
$plu = $credit-$bet;
		  $res = sm_query("UPDATE ibwf_users SET plusses='".$plu."' WHERE id='".$uid."'");
if($resl){
$res =sm_query("INSERT INTO `ibwf_jakemate` (`uid`, `card`,`take`) VALUES ('".$uid."', '".$card."','1');");
echo"your Card is : <b>$card</b><br/>";
echo "&#171;Take Another Card?<a href=\"chat.php?sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">NO</a> | ";
echo "<a href=\"chat.php?action=card2&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">YES</a>(costs $bet Crdtz)<br/><br/>";
 }else{
 $nick=getnick_uid($otp[1]);
 $tin=gettimemsg($otp[3]-time());
 echo"Game was started by $nick<br/>Remain Time :$tin<br/>";
  echo "<a href=\"chat.php?action=card&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">PickUp The Card</a>(costs $otp[2] Crdtz)<br/>";
 } 
}}
           echo "<small><a href=\"chat.php?sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">&#171;Go Back</a></small></p>";
          echo "<p align=\"center\"><a href=\"index.php?action=chat&amp;sid=$sid\"><img src=\"images/chat.gif\" alt=\"*\"/>Chatrooms</a><br/>";
        echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a></p>";

      echo xhtmlfoot();
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////Card/////////////////////////////////////////////

else if ($action=="card"){
        $pstyle = gettheme($sid);
        echo xhtmlheadchat("Jackmate Game",$pstyle);
        addonline($uid,"Jackmate Game","");
        $card = rand(10,100);
        $otp = mysqli_fetch_array(sm_query("SELECT `on`,`poker`,`bet`,`time`,`total`,`card` FROM ibwf_rooms WHERE id='".$rid."'"));	
        
		$credit=getplusses($uid);
if($otp[2]>$credit){
echo"<b><u>You don't have enough credits.</b></u><br>
<a href=\"lists.php?action=faqs&amp;sid=$sid\">How to Earn Much Credits??</a><br/> 
Or if ur credits in bank, you can take credits from this. <a href=\"SMbank.php?action=main&amp;sid=$sid\">**ATM machine**<a/><br/>";
	}else{
		
		
		$bet = $otp[2]+$otp[4];
		$cardz = $otp[5]+1;
        $jake = mysqli_fetch_array(sm_query("SELECT `card`,`card2`,`take` FROM ibwf_jakemate WHERE uid='".$uid."'"));

echo"<center><b><u>Starting the Game</b></u></center><br/>";
if($otp[0]==1){
    if($jake[2]==1){
        $nick=getnick_uid($otp[1]);
        $tin=gettimemsg($otp[3]-time());
        echo"Game was started by  $nick<br/>Remain Time :$tin<br/>";
        echo "&#171;Take Another Card?<a href=\"chat.php?sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">NO</a> | ";
        echo "<a href=\"chat.php?action=card2&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">YES</a>(costs $otp[2] Crdtz)<br/><br/>";
}else{
        $res2 = sm_query("UPDATE ibwf_rooms SET  total='".$bet."',card='".$cardz."'  WHERE `id` ='".$rid."'");
        $plu = $credit-$otp[2];
		 $res = sm_query("UPDATE ibwf_users SET plusses='".$plu."' WHERE id='".$uid."'");
		$res =sm_query("INSERT INTO `ibwf_jakemate` (`uid`, `card`,`take`) VALUES ('".$uid."', '".$card."','1');");
if($res){
        echo"you have successfully pickup a card<br/>";
        echo"your Card is : <b>$card</b><br/>";
        echo "&#171;Take Another Card?<a href=\"chat.php?sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">NO</a> | ";
        echo "<a href=\"chat.php?action=card2&amp;sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">YES</a>(costs $bet Crdtz)<br/><br/>";
		}}}} 

        echo "<small><a href=\"chat.php?sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">&#171;Go Back</a></small></p>";
        echo "<p align=\"center\"><a href=\"index.php?action=chat&amp;sid=$sid\"><img src=\"images/chat.gif\" alt=\"*\"/>Chatrooms</a><br/>";
        echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a></p>";
        echo xhtmlfoot();
}
///////////////////////////////////////////////////////////////////////////////////////
////////////////////////////card 2/////////////////////////////////
/////////////////////////////////////////////////////////


else if ($action=="card2"){
         $pstyle = gettheme($sid);
         echo xhtmlheadchat("Jackmate Game",$pstyle);
         addonline($uid,"Jackmate Game","");
         $card = rand(10,100);
	     $otp = mysqli_fetch_array(sm_query("SELECT `on`,`poker`,`bet`,`time`,`card`,`total` FROM ibwf_rooms WHERE id='".$rid."'"));
	     $credit=getplusses($uid);
if($otp[2]>$credit){
echo"<b><u>You don't have enough credits.</b></u><br>
<a href=\"lists.php?action=faqs&amp;sid=$sid\">How to Earn Much Credits??</a><br/> 
Or if ur credits in bank, you can take credits from this. <a href=\"SMbank.php?action=main&amp;sid=$sid\">**ATM machine**<a/><br/>";
	}else{ 
		 
		 
		 $cardz = $otp[4]+1; 
		
		 $jake = mysqli_fetch_array(sm_query("SELECT `card`,`card2`,`take` FROM ibwf_jakemate WHERE uid='".$uid."'"));
	     echo"<center><b><u>Starting the Game</b></u></center><br/>";

         if($otp[0]==1){
if($jake[2]==1){
     
          $res = sm_query("UPDATE ibwf_jakemate SET card2='".$card."', take='2' WHERE uid='".$uid."'");
		  $plu = $credit-$otp[2];
		  $res = sm_query("UPDATE ibwf_users SET plusses='".$plu."' WHERE id='".$uid."'");
          $bet = $otp[2]+$otp[5]; 
		  
         $res = sm_query("UPDATE `ibwf_rooms` SET `total` = '".$bet."',`card` = '".$cardz."' WHERE `ibwf_rooms`.`id` =2358");
	
		  
		  echo"you have successfully took another card(last card)your Card is : <b>$card</b><br/>";
         echo"<br/>($otp[2] credits were subtracted from you for one card)<br/>";
              }else{
 echo "You Are Not pick uped First Card <br/> ";
                   }

                                             }else{
 echo"Time Out,Try onther time<br/>";
                                             } }

        echo "<small><a href=\"chat.php?sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">&#171;Go Back</a></small></p>";
        echo "<p align=\"center\"><a href=\"index.php?action=chat&amp;sid=$sid\"><img src=\"images/chat.gif\" alt=\"*\"/>Chat Menu</a><br/>";
        echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a></p>";
        echo xhtmlfoot();
}
/////////////////////////////////////////////////////////////////////////////////////////////

else if($action=="coin")
{
 $pstyle = gettheme($sid);
echo xhtmlhead("SM Coin Catched",$pstyle);
///////////////////////////////////////////////////////////
$magicuid = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='magicuid'"));
$niv=getnick_uid($magicuid[0]);
$lastcoin = mysqli_fetch_array(sm_query("SELECT coin FROM ibwf_users WHERE id='".$magicuid[0]."'"));
$magic = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='magic'"));
if($magic[0]=="on"){

$magictime = mysqli_fetch_array(sm_query("SELECT value FROM ibwf_settings WHERE name='magictime'"));
if($magictime[0]<time())
{
////////////////////////////////////////////////////////////////////////////////////////
 $coin = mysqli_fetch_array(sm_query("SELECT coin FROM ibwf_users WHERE id='".$uid."'"));
 $cointotal=$coin[0]+1;
  $magictimez=time()+60*15;

 
sm_query("UPDATE ibwf_settings SET value='".$magictimez."' WHERE name='magictime'");
sm_query("UPDATE ibwf_settings SET value='".$uid."' WHERE name='magicuid'");

$sql="UPDATE `ibwf_users` SET `coin` = '".$cointotal."' WHERE `ibwf_users`.`id` ='".$uid."'";
$res = sm_query($sql);
if($res){
$name = mysqli_fetch_array(sm_query("SELECT name FROM ibwf_users WHERE id='".$uid."'"));
$name = $name[0];
$msg = "Congratulations!! [u]$name.[/u] has catched Golden Coin.[u]$name.[/u] Has [b]$cointotal coins[/b]";
sm_query("INSERT INTO ibwf_chat SET  chatter='5', who='', timesent='".time()."', msgtext='".$msg."', rid='".$rid."';");
echo "$coinimg Coin Catched successfully!<br/>$starimg<b>Total:</b>$cointotal<br/>";
}



}else{echo"$starimg<b>Last coin catched:</b>$niv<br/>$starimg total:<b>$lastcoin[0]<b><br/>";}}else{echo"$coinimg Coin Was Offline Now<br/>";}

echo "<small><a href=\"chat.php?sid=$sid&amp;rid=$rid&amp;rpw=$rpw\">&#171;Go Back</a></small>";
        echo "<p align=\"center\"><a href=\"index.php?action=chat&amp;sid=$sid\"><img src=\"images/chat.gif\" alt=\"*\"/>Chat Menu</a><br/>";
        echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a></p>";

////////////////////////////////////////////////////////////
  echo xhtmlfoot();
}
else if($action=="crih"){
addonline(getuid_sid($sid),"Cricket Help Section","");
   $pstyle = gettheme($sid);
      echo xhtmlhead("$stitle",$pstyle);
echo '<p align="center"><img src="images/cri/cricket.jpeg" alt="*"/><br/><b>
What is Online srimobile Cricket chat??</b><br/>
srimobile Cricket is the 1st w@p ONLINE Cricket game in a Wapsite. in another words, in Millions of wap sites, ONE and ONLY ONLINE Cricket game that you can WIN credits!!<br/><br/>

<b>How to Play it??</b><br/>
You can Single play or Two play with ur friend
* If u play two players mode Go to chat inside list / Click on user nick then type ur Bet<br/>
*and select match type then Start the match then u need to wait until ur opponent accept ur challange<br/><br/>

* you can see <b>.((((-HiT BaLL-)))</b> Button .Click it<br/>
*You will get below actions when u play it<br/>
- No Runs<br/>
- 1 Run<br/>
- 2 Runs<br/>
- 3 Runs<br/>
- Boundary (4 Runs)<br/>
- Sixer (6 Runs)<br/>
- Wide Ball<br/>
- No Ball<br/>
- Out<br/><br/>

<b>How To Win it??</b><br/>
*if u play single player match .u must score More than 15 Runs in 6 balls ,
*if u play two players mode, u must get highest score than ur opponent<br/><br/>

<b>how much Credits i will win??</b><br/>
*It depends on how much credits u bet.<br/><br/>

<b>Cricket Rules</b><br/>
* If u accept someones challange in two play mode, u must continue play. if u unable to play in 180 sec.s in Idle time. then automaticaly will be select highest scored user as the winner
* So if u do two player mode dont get any delay to play!<br/><br/> 
<a href="chat.php?action=&amp;sid='.$sid.'&amp;rid='.$rid.'&amp;rpw=">&#171; Back To Playground</a><br/>
</p>';
        echo "<p align=\"center\"><a href=\"index.php?action=chat&amp;sid=$sid\"><img src=\"images/chat.gif\" alt=\"*\"/>Chat Menu</a><br/>";
        echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>Home</a></p>";

////////////////////////////////////////////////////////////
  echo xhtmlfoot();

}




///////////////////////////////////////////////////////////////////////////////////////////

?>