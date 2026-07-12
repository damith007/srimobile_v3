<?php


function gettheme2($uid)
{ 

$thid = mysqli_fetch_array(sm_query("SELECT themeid FROM ibwf_users WHERE id='".$uid."'"));
if($thid[0]==""||$thid[0]==0)$thid[0]=1;
$thinfo = mysqli_fetch_array(sm_query("SELECT bgc, txc, lnk, hdc, hbg, boxbg,bgurl FROM ibwf_mainthemes WHERE id='".$thid[0]."'"));	
$ret = "<style type=\"text/css\">\n";
$ret .= "body {background-color:#$thinfo[0]; background-image: url($thinfo[6]);font-family : Verdana;font-size: small;margin : 0; padding : 0;color:#$thinfo[1]}
p {padding:0px;}
h5 {padding:0px;background-color: #$thinfo[4];color:#$thinfo[3];border-top-color: #$thinfo[3];border-top-style: solid;border-top-width: 1px;border-radius:0 0 px 0;-moz-border-radius:4px;-webkit-border-radius:0 0 4px 4px;-khtml-border-radius:4px 4px 0 0;font-size: 100%;font-weight: 700;margin-bottom: 0.3em;margin-top: -0.65em;padding-bottom: 0.1em;padding-left: 0.6em;padding-right: 0.6em;padding-top: 0.1em;text-align: center;}
a:link {color:#$thinfo[2]; text-decoration: none; }
a:visited {color:#$thinfo[2]; text-decoration: none;}
a:hover {color:#$thinfo[2];  text-decoration:underline;}
img {border: 0;}
hr {background-color: #afcddc ;border: none;height: 1px;}
div.mblock1 {margin: 8px 0px 2px 0px; padding: 0px 0px 0px 0px; background-color: #$thinfo[5]; border: 1px solid #$thinfo[4]; text-align: left;border-radius: 0px 0px 0px 0px;}";
$ret .=" div.mblock2 {margin: 8px 0px 2px 0px; padding: 0px 0px 0px 0px; background-color: #$thinfo[5]; border: 1px solid #$thinfo[4]; text-align: left;border-radius: 0px 0px 0px 0px;}";
$ret .= ".bmenu, .phdr, .hdr { color : #ffffff; background-color : #3b5998; background-repeat : repeat-x; background-position : 50% top; margin-top : 1px; margin-bottom : 1px; padding : 2px; border : 1px solid #E0E6FF; }";
$ret .= ".bmenu a, .phdr a, .hdr a { color : #fff; border-bottom : 1px dotted #243E60; }";
$ret .= "</style>";
$ret .= "\n</head>\n<body>\n";
return $ret;


}
function gettheme($sid)
{ 
$ret .= gettheme1("1");
$ret .= "\n</head>\n<body>\n";

	if(islogged($sid))
{
$uid = getuid_sid($sid);
$ret .= "<div class=\"phdr\"><table width=\"100%\"><tr>";
$ret .= "<td align=\"left\" style=\"width:50%\">";
$ret .= "<img src=\"images/sm_logo.jpg\"></td>";
$ret .= "<td align=\"right\" valign=\"bottom\" style=\"widh:30%\">";
$ret .= "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$uid\">Profile</a> ";
$ret .= "</td></tr></table><div style=\"text-align:left;\">";
$ret .= "<a href=\"index.php?action=main&amp;sid=$sid\">Home</a> ";
$ret .= "<a href=\"index.php?action=clmenu&amp;sid=$sid\">Groups</a> ";
 $ret .= "</div><div style=\"text-align:left;\">";
  $mybuds = getnbuds($uid);
  $onbuds = getonbuds($uid);
 $reqs = getnreqs($uid);
  if($reqs>0)
  {$ret .="<b><font color=\"#FFFF00\"><a href=\"lists.php?action=reqs&amp;sid=$sid\">$reqs Req.</a></font></b> ";}else{$ret .= "<a href=\"lists.php?action=buds&amp;sid=$sid\">Friends</a> ";}
  $ret .= "</div><div style=\"text-align:left;\">";
$tmsg = getpmcount(getuid_sid($sid));
$umsg = getunreadpm(getuid_sid($sid));
if($umsg==1)
{
$ret .= "<a href=\"inbox.php?action=display&amp;sid=$sid&amp;view=urd\"><b><font color=\"#FFFF00\">$umsg $lang21a</font></b></a> ";
}
if($umsg>1)
{
 $ret .= "<a href=\"inbox.php?action=display&amp;sid=$sid&amp;view=urd\"><b><font color=\"#FFFF00\">$umsg $lang21b</font></b></a> ";
}if($umsg==0){$ret .= "<a href=\"inbox.php?action=main&amp;sid=$sid\"> Messages</a> ";}
  
$chs = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_chonline"));
if($chs[0]>0){
 $ret .="<a href=\"index.php?action=chat&amp;sid=$sid\"><font color=\"#FFFF00\"><b>Chat</a>($chs[0])</font></b>";
}else{$ret .="<a href=\"index.php?action=chat&amp;sid=$sid\">Chat</a>";}
$ret .= "</div></div>";
return $ret;
	}
}

function geticonsetid($sid)
{ 
    $uid = getuid_sid($sid);
	$thid = mysqli_fetch_array(sm_query("SELECT themeid FROM ibwf_users WHERE id='".$uid."'"));
	$iconsetid = mysqli_fetch_array(sm_query("SELECT iconset FROM ibwf_mainthemes WHERE id='".$thid[0]."'"));
	return $iconsetid[0];
}

function xhtmlhead($page_title, $page_style="")
{//Notifications
	$ret = "<html xmlns=\"http://www.w3.org/1999/xhtml\">";
	$ret .= "\n<head>\n<title>$page_title</title>\n";
$ret .= "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />\n";
	$ret .= "<meta http-equiv=\"Cache-Control\" content=\"must-revalidate\" />\n";
    $ret .= "<meta http-equiv=\"Cache-Control\" content=\"no-cache\" />\n";
	$ret .= "<meta name=\"authors\" content=\"Damith Priyankara\" />\n";
$ret .= "<meta name=\"web_author\" content=\"SM creation\" />\n";
$ret .= "<meta name=\"Rating\" content=\"General\" />\n";
$ret .= "<meta name=\"robots\" content=\"all,follow\" />\n";
$ret .= "<meta name=\"Expires\" content=\"never\" />\n";
$ret .= "<meta name=\"Languages\" content=\"Sinhala , English , Sinhalese\" />\n";
$ret .= "<meta name=\"Robots\" content=\"INDEX,FOLLOW\" />\n";
$ret .= "<meta name=\"Distribution\" content=\"Global\" />\n";
$ret .= "<meta name=\"Revisit-after\" content=\"3 Days\" />\n";
$ret .= "<meta name=\"Classification\" content=\"Mobile Social Community\" />\n";
$ret .= "<meta name=\"target\" content=\"Best Mobile Social Community\" />\n";
    $ret .= "<meta name=\"description\" content=\"SriMobile Mobile Community\" />\n";
    $ret .= "<meta name=\"keywords\" content=\"
	         Sri Lanka Chat, Sri Lanka Chat Room,
	         Sinhala Chat, Sinhala Chat Room, Lanka Chat, 
	         Sri Lankan Chat, Sri Lankan Chat Room, Chat, Room,
	         Chat Room, Asia Chat, Chat Asia, India Chat, Chat India,
	         Indian Chat, Asian Chat, discuss, discussion, discussing, 
	         talk, talking, girl, boy, lanka girl, lanka boy, lankan girls,
	         lankan boys,chat,srichat,chat room,flash chat,sinhala,sinhala chat,sri lanka,lanka,
	         Sri Lanka Local Mobile Site chat, Free, sinhala, lanka, wap, download, mp3, chat, news, girls, polytones, mobile, sinhalawap ,  sri lanka wap sinhala wap sinhala chat latest poly,free hindi poly, latest hindi poly,free tamil poly,amr,mp3,free punjabi mp3 amr,polly free ringing tones,free hindi ringtones,free ringing tones,free bollywood ringtones,free ringtones free bollywood new ringtones, free bollywood new songs,free hindi songs,free new hindi songs mp3free mp3,free bollywood mp3,free new mp3,free new bollywood mp3,free hindi ringing tones,free mp3 free wallpapers,free bollywood wallpapers,free new actors wallpapers,free movie wallpapers,free act free bollywood actors,free bollywood actress,free movies wallpapers,free new wallpapers free movie trailers,free bollywood movie trailers,free new movies trailers,free movie trailers free amr, realtones,hindi truetones,free wav ringtones,free bollywoo new wav, bollywood mp3,amr,wav,nokia themes,Softwares,Bollywood News,Movie Reviews,Box Office Report
	         \" />\n";
			 
/* $ret .= '<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.css">
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.js"></script>';
	  */
			 
      $ret .='<link rel="shortcut icon" href="images/sm.ico" />';
      $ret .= "\n".$page_style;
	 
      return $ret;
}
function xhtmlheadchat1($page_title, $page_style="",$rid,$sid)
{
	$ret = "<html xmlns=\"http://www.w3.org/1999/xhtml\">";
	$ret .= "\n<head>\n<title>$page_title</title>\n";
	$ret .= "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />";
	$ret .= "<meta http-equiv=\"Cache-Control\" content=\"must-revalidate\" />";
    $ret .= "<meta http-equiv=\"Cache-Control\" content=\"no-cache\"/>";
    $ret .= "<meta http-equiv=\"refresh\" content=\"50; URL=chat.php?sid=$sid&amp;rid=$rid\"/>";
	$ret .= "\n".$page_style;
	$ret .= "\n</head>\n<body>";
	return $ret;
}
function xhtmlheadchat2($page_title, $page_style="",$rid,$sid)
{
	$ret = "<html xmlns=\"http://www.w3.org/1999/xhtml\">";
	$ret .= "\n<head>\n<title>$page_title</title>\n";
	$ret .= "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />";
	$ret .= "<meta http-equiv=\"Cache-Control\" content=\"must-revalidate\" />";
    $ret .= "<meta http-equiv=\"Cache-Control\" content=\"no-cache\"/>";
	$ret .= '<meta content="Damith Priyankara" name="authors" />
             <meta content="General" name="Rating" />
             <meta content="all,follow" name="robots" />
             <meta content="never" name="Expires" />
             <meta content="Sinhala , English , Sinhalese" name="Languages" />
             <meta content="INDEX,FOLLOW" name="Robots" />
             <meta content="Global" name="Distribution" />
             <meta content="3 Days" name="Revisit-after" />
             <meta name="Classification" content="Mobile Social Community" />
             <meta name="target" content="Best Mobile Social Community"/>';
	
    $ret .= "<meta http-equiv=\"refresh\" content=\"0; URL=chat.php?sid=$sid&amp;rid=$rid\"/>";
	$ret .= "<meta name=\"description\" content=\"SriMobile Mobile Community\" />";
    $ret .= "<meta name=\"keywords\" content=\"
	Sri Lanka Chat, Sri Lanka Chat Room,
	Sinhala Chat, Sinhala Chat Room, Lanka Chat, 
	Sri Lankan Chat, Sri Lankan Chat Room, Chat, Room,
	Chat Room, Asia Chat, Chat Asia, India Chat, Chat India,
	Indian Chat, Asian Chat, discuss, discussion, discussing, 
	talk, talking, girl, boy, lanka girl, lanka boy, lankan girls,
	lankan boys,chat,srichat,chat room,flash chat,sinhala,sinhala chat,sri lanka,lanka,
	Sri Lanka Local Mobile Site chat, Free, sinhala, lanka, wap, download, mp3, chat, news, girls, polytones, mobile, sinhalawap ,  sri lanka wap sinhala wap sinhala chat latest poly,free hindi poly, latest hindi poly,free tamil poly,amr,mp3,free punjabi mp3 amr,polly free ringing tones,free hindi ringtones,free ringing tones,free bollywood ringtones,free ringtones free bollywood new ringtones, free bollywood new songs,free hindi songs,free new hindi songs mp3free mp3,free bollywood mp3,free new mp3,free new bollywood mp3,free hindi ringing tones,free mp3 free wallpapers,free bollywood wallpapers,free new actors wallpapers,free movie wallpapers,free act free bollywood actors,free bollywood actress,free movies wallpapers,free new wallpapers free movie trailers,free bollywood movie trailers,free new movies trailers,free movie trailers free amr, realtones,hindi truetones,free wav ringtones,free bollywoo new wav, bollywood mp3,amr,wav,nokia themes,Softwares,Bollywood News,Movie Reviews,Box Office Report
	\" />";


	$ret .= "\n".$page_style;
	$ret .= "\n</head>\n<body>";
	return $ret;
}
function xhtmlheadchat($page_title, $page_style="")
{
	$ret = "<html xmlns=\"http://www.w3.org/1999/xhtml\">";
	$ret .= "\n<head>\n<title>$page_title</title>\n";
	$ret .= "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />";
	$ret .= "<meta http-equiv=\"Cache-Control\" content=\"must-revalidate\" />";
    $ret .= "<meta http-equiv=\"Cache-Control\" content=\"no-cache\"/>";
	$ret .= "\n".$page_style;
	$ret .= "<meta name=\"description\" content=\"Riderz wap dating portal and community containg chat, forums, blogs and much more\" />";
    $ret .= "<meta name=\"keywords\" content=\"chat, forums, wap, dating, games, blogs, polls, quiz, lavalair, news, rap, goth\" />";

	$ret .= "\n</head>\n<body>";
	return $ret;
}
function xhtmlfoot()
{	
	$ret = "\n</body>\n</html>";
	exit();
	return $ret;
}
function gettheme1($thid)
{ 
$ret = "<style type=\"text/css\">\n";
$ret .= "body {background-color:#D7F2FF; font-family : Verdana;font-size: small;margin : 0; padding : 0;color:#000000}
p {padding:0px;}
a:link {color:#1d4088; text-decoration: none; }
a:visited {color:#3b5998; text-decoration: none;}
a:hover {color:#1d4088;  text-decoration:underline;}
img {border: 0;}
hr {background-color: #afcddc ;border: none;height: 1px;}
h2 {font-size: 100%;font-weight: 700; background-color:#6CA6cd;color:#ffffff;border-top:1px outset 1px; #6Ca6Cd;margin-bottom:0.3em;margin-top:-0.61em;padding-top:0.1em;padding-bottom:0.1em;padding-left:0.6em;padding-right:0.6em;font-weight:bold;text-align:center;}
h5 {background-color: #1d4088;color:#FFFFFF;border-top-color: #9fcded;border-top-style: solid;border-top-width: 1px;border-radius:0 0 px 0;-moz-border-radius:4px;-webkit-border-radius:0 0 4px 4px;-khtml-border-radius:4px 4px 0 0;font-size: 100%;font-weight: 700;margin-bottom: 0.3em;margin-top: -0.65em;padding-bottom: 0.1em;padding-left: 0.6em;padding-right: 0.6em;padding-top: 0.1em;text-align: center;}
div.mblock1 {margin: 8px 0px 2px 0px; padding: 0px 0px 0px 0px; background-color: #ffffff; border: 1px solid #6699cc; text-align: left;border-radius: 0px 0px 0px 0px;}
div.mblock2 {margin: 8px 0px 2px 0px; padding: 0px 0px 0px 0px; background-color: #ffffff; border: 1px solid #6699cc; text-align: left;border-radius: 0px 0px 0px 0px;}";
$ret .= "input[type='text'], input[type='password'], textarea{font-family: tahoma, arial, verdana, sans-serif, Lucida Sans;font-size: small;margin: 3px 1px 5px 3px;padding: 2px 2px 2px 2px;display: inline-block;color: #616683;width:90%;background: #FAFAFF url(form.gradient.gif) repeat-x top;border: 1px #5FB6FF solid;border-radius: 3px;box-shadow: 1px 1px 3px 0px #A6C1D6;} 
input[type='text']:focus, input[type='password']:focus, textarea:focus {color: #3F4B5C;border: 1px #738797 solid;border-radius: 3px;box-shadow: 1px 1px 3px 0px #94B1C7;outline: none;} 
input[type='submit']{margin: 3px 1px 5px 3px;padding: 1px 5px 1px 5px;display: inline-block; cursor: default;color: #FAFAFF;text-shadow: 1px 1px 1px #8992A3;background: #5FB6FF;border: none;border-radius: 3px;box-shadow: 0px 0px 0px 0px #7183A6;} 
input[type='submit']:hover {color: #FFFFFF;text-decoration: none;box-shadow: 1px 1px 4px 0px #3E4F6B;outline: none;}"; 
$ret .= ".bmenu, .phdr, .hdr { color : #ffffff; background-color : #3b5998; background-repeat : repeat-x; background-position : 50% top; margin-top : 1px; margin-bottom : 1px; padding : 2px; border : 1px solid #E0E6FF; }";
$ret .= ".bmenu a, .phdr a, .hdr a { color : #fff; border-bottom : 0px dotted #243E60; }";
$ret .= "div.catRow	{ border-top:1px dashed #bbb; padding:3px;}";
$ret .= "div.alert{margin: 8px 0px 2px 0px; padding: 0px 0px 0px 0px; background-color: #fffbe2; border:1px dashed #e2c822;text-align: center;border-radius: 0px 0px 0px 0px;}";
$ret .= "div.ok{margin: 8px 0px 2px 0px; padding: 0px 0px 0px 0px; background-color: #EBF8A4; border:1px dashed #A2D246;text-align: center;border-radius: 0px 0px 0px 0px;}";
$ret .= "div.error{text-align: center;margin: 8px 0px 2px 0px; padding: 0px 0px 0px 0px; background-color: #FEEBEF; border:1px dashed #F55878; border-radius: 0px 0px 0px 0px;}";
$ret .= "</style>";

	return $ret;
}

?> 