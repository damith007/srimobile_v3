<?php
include("gzcompress.php");
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
include("config.php");
include("core.php");
include("xhtmlfunctions.php");

$bcon = connectdb();

///////////////////////////////////////////////////////////////////////////////
///////////////////////////////Main images pack //////////////////////////////
////////////////////////////////////////////////////////////////////////////////
$farmimg="farm/apple.png";//////////////farm home image/////////////////////
$landsellerimg="";////land seller image//////////
$plantsimg="farm/harvest.png";//////////palnts image
$landsimg="farm/landpic.png";//////////land image
$lockimg="lock.png";//////lock image////////////////
$farmaimg="farm/water.png";
$farmbimg="farm/boost.png";
$farmcimg="farm/fertilize.png";
$farmreimg="farm/time.png";
$myfarmimg="farm/apple.png";
$timeimg="farm/time.png";
$robimg="farm/rob.png";
$helpimg="farm/help.png";
//my farm/////////////////
$stockimg="farm/lorry.png";//stock imges
/////////////refresh imges///////
////////////////////////////farm words///////////
$farma="Water";
$farmb="Boost";
$farmc="Fertilize";
/////////////////////////////////////////////////
;
$action = $_GET["action"];
$sid = $_GET["sid"];
$page = $_GET["page"];
$who = $_GET["who"];
$ac = $_GET["ac"];
$lang = $_GET["la"];
mylog($sid);
  $uid = getuid_sid($sid);
$crdiz=getplusses($uid);

 $pstyle = gettheme($sid);
    echo xhtmlhead("$stitle Farm",$pstyle);
	
	if(($action!="byland")&&($action!="land")){
	 $frdf = mysqli_fetch_array(sm_query("SELECT time FROM ibwf_farm WHERE uid='".$uid."'"));
	  $uinf = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_farm WHERE uid='".$uid."'"));
  
	 
if(($frdf[0]<time())or($uinf[0]==0))
    {
 div();
 echo"<img src=\"images/$landsellerimg\" alt=\"*\"/><br/>";
echo"<b><u>Mr.land seller :</b></u><br/>";	
echo"<b>1) </b>You Must Buy The Farm Land For me<br/>";	
echo"<b>2) </b>Then Select the plant what u need it<br/>";		
echo"<b>3) </b>Try To safe Your Crops Form Thifes<br/>";		
echo "<img src=\"images/$landsimg\" alt=\"*\"/><a href=\"farm.php?action=land&amp;sid=$sid\">Get Land</a><br/></div>";	
    echo "<p align=\"center\">";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";
 echo xhtmlfoot();
      exit();

}}
	if(($action!="plants")&&($action!="stock")){
$plants = mysqli_fetch_array(sm_query("SELECT plants FROM ibwf_farm WHERE uid='".$uid."'"));
if($plants[0]==0){

 div();
    echo "<b><u>U Dont Select Plants Or U Competed Level</u></b><br/>";	
echo "<img src=\"images/$plantsimg\" alt=\"*\"/><a href=\"farm.php?action=plants&amp;sid=$sid\">Plants</a><br/></div>";	
    echo "<p align=\"center\">";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";
 echo xhtmlfoot();
      exit();
	  }

}
///////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////Farm start//////////////////////////////////////
///////////////////////////////////////////////////////////////////////////// 
if($action=="main"){

	$nick=getnick_uid($uid);
	//Welcome to SM Farm Game $nick
	echo"<h5>SM Farm</h5>";
	


	
	
	
 $farm = mysqli_fetch_array(sm_query("SELECT lev,fp,time FROM ibwf_farm WHERE uid='".$uid."'"));
 

 div();
 ECHO"<center><img src=\"images/farm/farm.jpg\" alt=\"*\"/></center><br/>";
dival(); 
echo"<small><b>My Level : $farm[0]</b><br/>";	
echo"<b>My FP:$farm[1]</b><br/>";
echo"<b>Land Time:".gettimemsg($farm[2]-time())."</b><br/>";



 echo "</small></div>";
  echo "<img src=\"images/$myfarmimg\" alt=\"*\"/><a href=\"?action=burn&amp;sid=$sid\">My Farm</a><br/>";
   echo "<img src=\"images/$plantsimg\" alt=\"*\"/><a href=\"?action=plants&amp;sid=$sid\">Plants</a><br/>";
   //echo "<img src=\"images/$plantsimg\" alt=\"*\"/><a href=\"?action=animal&amp;sid=$sid\">Animal Farm</a><br/>";
 echo "<img src=\"images/$stockimg\" alt=\"*\"/><a href=\"?action=stock&amp;sid=$sid\">Sell Stock</a><br/>";
 echo "<img src=\"images/$robimg\" alt=\"*\"/><a href=\"?action=robstock&amp;sid=$sid\">Rob Stock</a><br/>";
 echo "<img src=\"images/$helpimg\" alt=\"*\"/><a href=\"?action=help&amp;sid=$sid\">How To Play</a><br/>";
 
 

 echo "</div>";	
	
    echo "<p align=\"center\">";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";
 echo xhtmlfoot();
      exit();
}
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////Land SELLER/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
else if($action=="land"){

	$nick=getnick_uid($uid);
	//Welcome to SM Farm Game $nick
echo"<h5>Farm Land Seller</h5>";
 div();	
	
echo"<b>Land Cost:</b> 1000 fp for a Month<br/><br/>";	
	

	
echo "<b><u>Buy Land</b></u><form action=\"farm.php?action=byland&amp;sid=$sid\" method=\"post\">";

 	echo "<input type=\"Submit\" value=\"Get Land\" Name=\"Submit\"/></form>";
	 echo "</div>";
	
	  echo "<p align=\"center\">";
	  echo "<a href=\"farm.php?action=main&amp;sid=$sid\"><img src=\"images/$farmimg\" alt=\"*\"/>";
echo "Farm</a><br/>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";


 echo xhtmlfoot();
      exit();
}
///////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////BUY LAND///////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($action=="byland"){

	$nick=getnick_uid($uid);
	
	$dcrdit=-1000;
    $crdiz=getplusses($uid);
	$gtime=1*30*24*60*60;
    $landt=time()+$gtime;
	

	
	//Welcome to SM Farm Game $nick
	echo"<h5>Buy Farm Land</h5>";
 div();

	$res=sm_query("INSERT INTO `ibwf_farm` ( `uid`, `time`,`fp`) VALUES ('".$uid."', '".$landt."', '".$dcrdit."')");
	if(!$res){
	$res=sm_query("UPDATE `ibwf_farm` SET `time` = '".$landt."',`fp` = '".$landt."' WHERE `ibwf_farm`.`id` ='".$uid."'");
	}
	if($res){
	divok();
	echo "<img src=\"images/ok.gif\" alt=\"*\"/>Thank U get Farm Land For 1 Month</div>";
	}else{
	diver();
	 echo "<img src=\"images/notok.gif\" alt=\"*\"/>u Cant Get Farm Land THIS TIME</div>";
	
	}
	

	//////////////////////////////////////////////////////

	 echo "</div>";
/////////////////////////////////////////////////////////////////////////////
echo "<p align=\"center\">";
echo "<a href=\"farm.php?action=main&amp;sid=$sid\"><img src=\"images/$farmimg\" alt=\"*\"/>";
echo "Farm</a><br/>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";
 echo xhtmlfoot();
      exit();
}
//////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////Select Plants//////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
else if($action=="plants"){

echo"<h5>Plants</h5>";
$info = mysqli_fetch_array(sm_query("SELECT lev FROM ibwf_farm WHERE uid='".$uid."'"));
$pid = isnum($_GET["pid"]);
if($ac=="get"){
$noi = mysqli_fetch_array(sm_query("SELECT level,name,icon FROM ibwf_farm_plants where id='".$pid."'"));
  if($noi[0]<=$info[0])
{
sm_query("UPDATE `ibwf_farm` SET `plants` = '".$pid."' WHERE `ibwf_farm`.`uid` ='".$uid."'");
divok();
echo"<img src=\"images/$noi[2]\" alt=\"*\"/><br/>";

echo"U Select $noi[1] to burn<br/>";
 echo "<img src=\"images/$myfarmimg\" alt=\"*\"/><a href=\"farm.php?action=burn&amp;sid=$sid\">My Farm</a></div><br/><br/>";
 echo "<p align=\"center\">";
echo "<a href=\"farm.php?action=main&amp;sid=$sid\"><img src=\"images/$farmimg\" alt=\"*\"/>";
echo "Farm</a><br/>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
exit();
 
}else{
diver();
echo"U dont Have Level To Get This</div>";
}


}
	echo"<h5>Select Plants</h5>";
 div();
///////////////////////////////////

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_farm_plants"));
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;
 $sql = "SELECT id, name, icon, level,fp FROM ibwf_farm_plants ORDER BY id LIMIT $limit_start, $items_per_page";
 $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
	
echo"<img src=\"images/$item[2]\" alt=\"*\"/><br/>";
echo"<b>$item[1]</b><br/>";

  if($item[3]<=$info[0])
{
 echo"<b>Level :</b> $item[3] Unlocked<br/>";
 echo"<b>FP :</b> $item[4]<br/>";
 echo "<a href=\"farm.php?action=$action&amp;pid=$item[0]&amp;sid=$sid&amp;ac=get\">Select</a><hr/>";
 
 
}else{
 echo"<b>Level :</b> $item[3] <img src=\"images/$lockimg\" alt=\"*\"/>locked<br/>";
echo"<b>FP :</b> $item[4]<hr/>";
 
 }

 
    }
  }

    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"farm.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"farm.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"farm.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }
 ////////////////////////////////
	 echo "</div>";
/////////////////////////////////////////////////////////////////////////////
echo "<p align=\"center\">";
echo "<a href=\"farm.php?action=main&amp;sid=$sid\"><img src=\"images/$farmimg\" alt=\"*\"/>";
echo "Farm</a><br/>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";
 echo xhtmlfoot();
      exit();
}

/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////// plants burn                 ////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

else if($action=="burn"){
echo"<h5>My Farm</h5>";
 $frdf = mysqli_fetch_array(sm_query("SELECT plants,stock,a,b,c FROM ibwf_farm WHERE uid='".$uid."'"));
 if($frdf[1]>=100){
 div();
  echo "<center><b><u>Ur Stock Is Full Plz Sell Them</b></u><br/>";

 echo "<a href=\"farm.php?action=stock&amp;sid=$sid\">";
echo "Sell Stock</a></center></div><br/><br/>";
 
 
 echo "<p align=\"center\">";
echo "<a href=\"farm.php?action=main&amp;sid=$sid\"><img src=\"images/$farmimg\" alt=\"*\"/>";
echo "Farm</a><br/>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";
 echo xhtmlfoot();
      exit();
 }
 
 
 
 $frd = mysqli_fetch_array(sm_query("SELECT name,icon FROM ibwf_farm_plants WHERE id='".$frdf[0]."'"));

	
	//Welcome to SM Farm Game $nick

 echo "<div class=\"mblock1\"><center>";
 echo "U are Select <u>$frd[0]</u><br/>
 U Stock <u>$frdf[1]</u> %<br/>
 </center><br/>";
$atime =time()+5*60;
$btime =time()+10*60;
$ctime =time()+15*60;
$stok =$frdf[1]+10;
 //////////////////////////////////////
if(($ac=="a") and ($frdf[2]<time())){
sm_query("UPDATE `ibwf_farm` SET `a` = '".$atime."',`stock` = '".$stok."' WHERE `ibwf_farm`.`uid` ='".$uid."'");
}else{
if($frdf[2]>time()){
echo "Wait ".gettimemsg($frdf[2]-time())." for $farma<br/>";
}else{
echo "<img src=\"images/$farmaimg\" alt=\"*\"/><a href=\"farm.php?action=$action&amp;sid=$sid&amp;ac=a\">$farma</a><br/>";
}}
////////////////////////////////////
if(($ac=="b") and ($frdf[3]<time())){
sm_query("UPDATE `ibwf_farm` SET `b` = '".$btime."',`stock` = '".$stok."'  WHERE `ibwf_farm`.`uid` ='".$uid."'");
}else{
if($frdf[3]>time()){
echo "Wait ".gettimemsg($frdf[3]-time())." for $farmb<br/>";
}else{
echo "<img src=\"images/$farmbimg\" alt=\"*\"/><a href=\"farm.php?action=$action&amp;sid=$sid&amp;ac=b\">$farmb</a><br/>";
}}
///////////////////////////////////////////////////
if(($ac=="c") and ($frdf[4]<time())){
sm_query("UPDATE `ibwf_farm` SET `c` = '".$ctime."',`stock` = '".$stok."' WHERE `ibwf_farm`.`uid` ='".$uid."'");
}else{
if($frdf[4]>time()){
echo "Wait ".gettimemsg($frdf[4]-time())." for $farmc<br/>";
}else{
echo "<img src=\"images/$farmcimg\" alt=\"*\"/><a href=\"farm.php?action=$action&amp;sid=$sid&amp;ac=c\">$farmc</a><br/>";
}}

echo "<img src=\"images/$farmreimg\" alt=\"*\"/><a href=\"farm.php?action=$action&amp;sid=$sid&amp;time=".time()."\">";
echo "ReFresh</a><br/>";

	
	 echo "</div>";
/////////////////////////////////////////////////////////////////////////////
echo "<p align=\"center\">";
echo "<a href=\"farm.php?action=main&amp;sid=$sid\"><img src=\"images/$farmimg\" alt=\"*\"/>";
echo "Farm</a><br/>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";
 echo xhtmlfoot();
      exit();
}

////////////////////////////////
else if($action=="stock"){

 $frdf = mysqli_fetch_array(sm_query("SELECT plants,stock,fp,lev FROM ibwf_farm WHERE uid='".$uid."'"));
  $frd = mysqli_fetch_array(sm_query("SELECT name,fp FROM ibwf_farm_plants WHERE id='".$frdf[0]."'"));
  $fp=$frdf[2]+$frd[1];
  $lev=$frdf[3]+1;
$max = mysqli_fetch_array(sm_query("SELECT max(stocktime),uid FROM ibwf_farm"));
$hh=time()+60*60*1;
if($max[0]<time()){

  if($frdf[1]>=100){
  divok();
 echo "Ur <u>$frd[0]</u> Stock Is Now Our Shop Now<br/>";
  echo "Now Ur Level:<u>$lev</u><br/>";
  echo "Now Ur fp:<u>$fp</u><br/>";
 echo "<img src=\"images/$plantsimg\" alt=\"*\"/><a href=\"farm.php?action=plants&amp;sid=$sid\">";
echo "Select Plants</a><br/><br/>";
echo "</div>";
$res = sm_query("UPDATE `ibwf_farm` SET `a` = '0' ,`b` = '0' ,`c` = '0' ,`plants` = '0' ,`lev` = '".$lev."' ,`fp` = '".$fp."' ,`stock` = '0' ,`stocktime` = '".$hh."' WHERE `ibwf_farm`.`uid` ='".$uid."'");
 }else{
 diver();
 echo "Ur Stock Is Not Full</div><br/><br/>";
 
 }
}
else{
 diver();
 echo "Plz Wait.. We Have ".getnick_uid($max[1])." Stock...SO After Sell that plz Come ".gettimemsg($max[0]-time())."</div><br/><br/>";
 
}


 
 
 

	

	
	 echo "</div>";
/////////////////////////////////////////////////////////////////////////////
echo "<p align=\"center\">";
 echo "<img src=\"images/$myfarmimg\" alt=\"*\"/><a href=\"?action=burn&amp;sid=$sid\">My Farm</a><br/>";

echo "<a href=\"farm.php?action=main&amp;sid=$sid\"><img src=\"images/$farmimg\" alt=\"*\"/>";
echo "Farm</a><br/>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";
 echo xhtmlfoot();
      exit();
}
///////////////////////////////////////////////////////////////////////////////////////////
else if($action=="robstock"){

	echo"<h5>Rob stock</h5>";
 div();
///////////////////////////////////

    if($page=="" || $page<=0)$page=1;
    $noi = mysqli_fetch_array(sm_query("SELECT count(*) FROM ibwf_farm"));
    $num_items = $noi[0]; //changable
    $items_per_page= 5;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;
 $sql = "SELECT uid,fp,lev FROM ibwf_farm ORDER BY stocktime LIMIT $limit_start, $items_per_page";
 $items = sm_query($sql);
    
    if(mysqli_num_rows($items)>0)
    {
    while ($item = mysqli_fetch_array($items))
    {
	echo "<a href=\"index.php?action=viewuser&amp;who=$item[0]&amp;sid=$sid\">".getnick_uid($item[0])."</a><br/>";
echo "<b>FP :</b> $item[1]<br/>";
echo "<b>Lev :</b> $item[2] <br/>";
 echo "<a href=\"?action=rob&amp;who=$item[0]&amp;sid=$sid\"> Rob Stock</a><br/><hr/>";   
	}
  }

    echo "</p>";
    echo "<p align=\"center\">";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"farm.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;view=$view\">&#171;Prev</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"farm.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;view=$view\">Next&#187;</a>";
    }
    echo "<br/>$page/$num_pages<br/>";
    if($num_pages>2)
    {
      $rets = "<form action=\"farm.php\" method=\"get\">";
        $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/><br/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";

        $rets .= "</form>";

        echo $rets;
    }

	

/////////////////////////////////////////////////////////////////////////////
echo "<p align=\"center\">";
 echo "<img src=\"images/$myfarmimg\" alt=\"*\"/><a href=\"?action=burn&amp;sid=$sid\">My Farm</a><br/>";

echo "<a href=\"farm.php?action=main&amp;sid=$sid\"><img src=\"images/$farmimg\" alt=\"*\"/>";
echo "Farm</a><br/>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";
 echo xhtmlfoot();
      exit();
}

else if($action=="rob"){

	echo"<h5>Rob User</h5>";
 div();
///////////////////////////////////
if(isuser($who)){

sm_query("INSERT INTO `ibwf_farm_rob` (`id`, `robber`, `robed`, `catch`, `time`) VALUES (NULL, '".$uid."', '".$who."', '0', '".time()."')");
$nick=getname_uid($uid);
$lol=substr($nick,0,1);
$msg="Ur Farm Was Rob By Nick Stared [b]".$lol."[/b] Go Farm Now!!";
autopm($msg,$who);

}else{
echo "User Not Exit<br/>";

}

/////////////////////////////////////////////////////////////////////////////
echo "<p align=\"center\">";
 echo "<img src=\"images/$myfarmimg\" alt=\"*\"/><a href=\"?action=burn&amp;sid=$sid\">My Farm</a><br/>";

echo "<a href=\"farm.php?action=main&amp;sid=$sid\"><img src=\"images/$farmimg\" alt=\"*\"/>";
echo "Farm</a><br/>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";
 echo xhtmlfoot();
      exit();
}
else if($action=="animal"){

	echo"<h5>Aimal Farm</h5>";
 div();
///////////////////////////////////




/////////////////////////////////////////////////////////////////////////////
echo "<p align=\"center\">";
 echo "<img src=\"images/$myfarmimg\" alt=\"*\"/><a href=\"?action=burn&amp;sid=$sid\">My Farm</a><br/>";

echo "<a href=\"farm.php?action=main&amp;sid=$sid\"><img src=\"images/$farmimg\" alt=\"*\"/>";
echo "Farm</a><br/>";
echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";
 echo xhtmlfoot();
      exit();
}
?>