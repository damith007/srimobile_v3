<?php
/////SriMobile@Damith priyankara////////
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML Basic 1.0//EN\" \"http://www.w3.org/TR/xhtml-basic/xhtml-basic10.dtd\">";
include("config.php");
include("core.php");
include("xhtmlfunctions.php");
$bcon = connectdb();

$action = $_GET["action"];
$sid = $_GET["sid"];
$artid = $_GET["artid"];
$page = $_GET["page"];

mylog($sid);
$uid = getuid_sid($sid);

   
if($action=="main")
{
    addonline(getuid_sid($sid),"Articles","index.php?action=$action");
       $pstyle = gettheme($sid);
    echo xhtmlhead("SM Magazine!",$pstyle);
 

  print'<h5>SM Magazine</h5>';
  //////////////////////////////////////////////////
   $month=date("F");
  
  dival();
    echo"<b>$month</b> Magazine Cover!!";
  
  echo"</div>";
  
  ////////////////////////////
     $uinf = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_mag_buy WHERE uid='".$uid."'"));
  if($uinf[0]==0)
  {
  dival();
 echo"<u><b>Our Aim(Vision)</b></u><br/>
When you surf Wap(internet) You Spend much money as Internet Cost, You mostly do downloads and chatting, But Our aim is to Give You Good knowlegde about most things in a short time during you enjoying other wap stuff</div>";

  
 div();
  echo "SrIMOBILE Magazine Is a very usefull E-Magazine which updating month with Very Usefull Articles!<br/>
it Costs 5000 SM credits For monthly Subscription!<br/><br/>

(From your Subscription We pay to our SM journalits to give you a Better Service)<br/>
 <a href=\"sm_articles.php?action=by&amp;sid=$sid\">Buy Magazine Now(1000 Cdtz)</a></div><br/>";
 }else{

/////////////////////////////////////////////////
 div();
  $fcats = sm_query("SELECT id, name FROM ibwf_articles ORDER BY id");
  while($fcat=mysqli_fetch_array($fcats))
  {
  //echo date("Y-m-d")." 00:00:00. '<br/>';
///echo date('m-t-Y 12:59:59') . '<br/>';

 $start=date("Y-m-d")." 00:00:00";
$end=date('m-t-Y 12:59:59');
$tstamp1=strtotime($start);
$tstamp2=strtotime($end); 
   $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_readart WHERE cid='".$fcat[0]."' AND crdate>='".$tstamp1."'"));
    $catlink = "<img src=\"images/art/$fcat[0].png\" alt=\"\"/> <a href=\"sm_articles.php?action=cat&amp;sid=$sid&amp;cid=$fcat[0]\">$fcat[1][$noi[0]]</a>";
    echo "<br/>$catlink";

  }
 echo "</div><br/>";
}	
	
	
 echo "<p align=\"center\">";
 echo "<a href=\"index.php?action=main&amp;sid=$sid\">";
    echo "Main menu</a>";
 echo "</p>";


}
/////////////////////////////////////////////////////////
//////////////////////////////////View Topic

else if($action=="viewart")
{
    $id = $_GET["cid"];

$cinfo = mysqli_fetch_array(sm_query("SELECT name from ibwf_readart WHERE id='".$id."'"));
    addonline(getuid_sid($sid),"Reading article $cinfo[0]","sm_articles.php?action=$action");
    $pstyle = gettheme($sid);
    echo xhtmlhead("SM Magazine!",$pstyle);
 
 
  print'<h5>SM Magazine</h5>';
 div();
 $tinfo = mysqli_fetch_array(sm_query("SELECT name, authorid, crdate, id ,text from ibwf_readart WHERE id='".$id."'"));
    $tnm = htmlspecialchars($tinfo[0]);
echo "<h3>$cinfo[0]</h3><br/>";
    echo "<p align=\"left\">";

$unick = getnick_uid($tinfo[1]);
    $usl = "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$tinfo[1]\">$unick</a>";


$text = parsemsg($tinfo[4], $sid);


 echo "$text<br/>";



    ///to here

echo "<hr/>Submitted by: $usl</div><br/>";
echo "<form method=\"post\" action=\"genproc.php?action=shout&amp;sid=$sid\">
<input name=\"shtxt\" value=\".article. [art=$id]$tnm [/art]\" maxlength=\"500\" type=\"hidden\">
<input name=\"Submit\" value=\"[( Shout This Article )]\" type=\"submit\">
<br></form><br>";

echo "<h3><u>Next Article</u></h3>";



$cinfo = mysqli_fetch_array(sm_query("SELECT name from ibwf_articles WHERE id='".$cid."'"));
   echo "<a href=\"sm_articles.php?&amp;action=cwart&amp;sid=$sid&amp;cid=$cid\">$cinfo[0]</a>";
echo "<br/>";

echo "<a href=\"sm_articles.php?action=main&amp;sid=$sid\">";
    echo "Back To Magazine</a><br/>";


 echo "<br/>";
    echo "<a href=\"index.php?action=main&amp;sid=$sid\">";
echo "Main menu</a>";
  echo "</p>";

}





//////////////////////////////////ONLINE USERS

else if($action=="newart")
{
  $cid = $_GET["cid"];
 
    addonline(getuid_sid($sid),"Making new article","index.php?action=$action&amp;fid=$fid");
 $pstyle = gettheme($sid);
    echo xhtmlhead("SM Magazine!",$pstyle);

 
  print'<h5>SM Magazine</h5>';
    if (ischecker(getuid_sid($sid)))
  {
  div();
  
$cinfo = mysqli_fetch_array(sm_query("SELECT name from ibwf_articles WHERE id='".$cid."'"));
 echo "<b><u>Add Articles $cinfo[0]</b></u>";

echo "<form action=\"sm_articles.php?action=done&amp;sid=$sid&amp;cid=$cid\" method=\"post\">";
echo "Tittle: <input name=\"ntitle\" maxlength=\"60\"/><br/>";
echo "Message: <textarea name=\"tpctxt\"  maxlength=\"300\" rows=\"2\" cols=\"20\"/></textarea><br/>";


    echo "<input type=\"hidden\" name=\"cid\" value=\"$cid\"/>";
 echo "<input type=\"submit\" value=\"SUBMIT\"/>";
           echo "</form>";
		   
	}	   
echo "<br/></div><a href=\"sm_articles.php?action=main&amp;sid=$sid\">";
    echo "Back To Magazine</a>";
    echo "<br/><a href=\"index.php?action=main&amp;sid=$sid\">";
echo "Main menu</a>";

    echo "</p>";

}


/////////////////////////////////////////////////////new tops
else if($action=="done")
{
      $pstyle = gettheme($sid);
    echo xhtmlhead("SM Magazine!",$pstyle);
 

  print'<h5>SM Magazine</h5>';
 div();
 
  $cid = $_POST["cid"];
  $ntitle = $_POST["ntitle"];
  $tpctxt = $_POST["tpctxt"];

    if (ischecker(getuid_sid($sid)))
  {
  addonline(getuid_sid($sid),"Making New Article","index.php?action=main");
  
      echo "<p align=\"center\">";
      $crdate = time();
      $uid = getuid_sid($sid);
      $texst = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_readart WHERE name LIKE '".$ntitle."' AND cid='".$cid."'"));
      if($texst[0]==0)
      {
        $res = false;

  if((trim($ntitle)!="")||(trim($tpctxt)!=""))
      {
      $res = sm_query("INSERT INTO ibwf_readart SET name='".$ntitle."', cid='".$cid."', authorid='".$uid."', text='".$tpctxt."', crdate='".$crdate."'");
      }
       if($res)
      {
        $tnm = htmlspecialchars($ntitle);

        echo "Article <b>$tnm</b> Submitted Successfully<br/>";

     }else{
        echo "Article could not submit";
      }
      }else{
        echo "Article name Already submitted";
      }
	  }
echo "<br/></div><a href=\"sm_articles.php?action=main&amp;sid=$sid\">";
    echo "Back To Magazine</a>";
echo "<br/>";


      echo "<br/><a href=\"index.php?action=main&amp;sid=$sid\">";
echo "Main menu</a>";
      echo "</p>";
      echo xhtmlfoot();
}

//////////////////////////////////Buddies

else if($action=="cat")
{
$cid = $_GET["cid"];
    $cinfo = mysqli_fetch_array(sm_query("SELECT name from ibwf_articles WHERE id='".$cid."'"));
    addonline(getuid_sid($sid),"Viewing article $cinfo[0]","");
      $pstyle = gettheme($sid);
    echo xhtmlhead("SM Magazine!",$pstyle);
	
  print'<h5>SM Magazine</h5>';
   
   div();
$cinfo = mysqli_fetch_array(sm_query("SELECT name from ibwf_articles WHERE id='".$cid."'"));
 echo "<h3>$cinfo[0]</h3>";
 /////////////////////////////////
  if (ischecker(getuid_sid($sid)))
  {
 echo "<center><a href=\"sm_articles.php?action=newart&amp;sid=$sid&amp;cid=$cid\"><b>Make New Article</b></a></center>";
}
 //////////////////////////////////////////////////////
   echo "<p align=\"left\">";


 $start=date("Y-m-d")." 00:00:00";
$tstamp1=strtotime($start);


$ibwf = mysqli_fetch_array(sm_query("SELECT COUNT(distinct id) FROM ibwf_readart WHERE cid='".$cid."' AND crdate>='".$tstamp1."'"));
    if($page=="" || $page<=0)$page=1;
    $num_items = $ibwf[0]; //changable
    $items_per_page= 10;
    $num_pages = ceil($num_items/$items_per_page);
    if(($page>$num_pages)&&$page!=1)$page= $num_pages;
    $limit_start = ($page-1)*$items_per_page;

$cou = $limit_start+1;
////////////////////////////////////////


$ibwfsites = sm_query("SELECT id, name, crdate FROM ibwf_readart WHERE cid='".$cid."' AND crdate>='".$tstamp1."' ORDER BY cid, crdate DESC LIMIT $limit_start, $items_per_page");

  while($ibwfsite=mysqli_fetch_array($ibwfsites))
  {

 if (ischecker(getuid_sid($sid)))
  {
    $hm = "<a href=\"sm_articles.php?action=delart1&amp;sid=$sid&amp;cid=$ibwfsite[0]\">[x]</a>,";
    $hm2 = "<a href=\"sm_articles.php?action=edit&amp;sid=$sid&amp;cid=$ibwfsite[0]\">Edit</a>";
 }
$sitelink = "$cou. <a href=\"sm_articles.php?action=viewart&amp;cid=$ibwfsite[0]&amp;sid=$sid\">$ibwfsite[1]</a> $hm$hm2";
    echo "<br/>$sitelink";
$cou++;
}

echo "</p>";
echo "<p align=\"center\">";
     if($page>1)
    {
      $ppage = $page-1;
       echo "<a href=\"sm_articles.php?action=$action&amp;page=$ppage&amp;sid=$sid&amp;cid=$cid\">&#171;PREV</a> ";
    }
    if($page<$num_pages)
    {
      $npage = $page+1;
      echo "<a href=\"sm_articles.php?action=$action&amp;page=$npage&amp;sid=$sid&amp;cid=$cid\">Next&#187;</a>";
    }
     echo "<br/>Page $page of $num_pages";

   if($num_pages>2)
    {

        $rets = "<form action=\"sm_articles.php\" method=\"get\">";
      $rets .= "Jump to page<input name=\"page\" format=\"*N\" size=\"3\"/>";
        $rets .= "<input type=\"submit\" value=\"GO\"/>";
        $rets .= "<input type=\"hidden\" name=\"action\" value=\"$action\"/>";
        $rets .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\"/>";
        $rets .= "<input type=\"hidden\" name=\"cid\" value=\"$cid\"/>";
       $rets .= "</form>";

        echo $rets;
    }

echo "<br/><a href=\"sm_articles.php?action=main&amp;sid=$sid\">";
    echo "Back To Magazine</a><br/>";


 echo "<br/>";
    echo "<a href=\"index.php?action=main&amp;sid=$sid\">";
echo "Main menu</a>";
  echo "</p>";
    echo xhtmlfoot();
}
else if($action=="edit")
{
      $pstyle = gettheme($sid);
    echo xhtmlhead("SM Magazine!",$pstyle);
 

  print'<h5>SM Magazine</h5>';
 div();
$cid = $_GET["cid"];
   if (ischecker(getuid_sid($sid)))
  {
    addonline(getuid_sid($sid),"Article Checker Tool ","index.php?action=main");
    $pinfo= mysqli_fetch_array(sm_query("SELECT name,text  FROM ibwf_readart WHERE id='".$cid."'"));
 
    $ptext = htmlspecialchars($pinfo[1]);

echo "<p align=\"center\">";
echo "<form action=\"sm_articles.php?action=edit2&amp;sid=$sid&amp;cid=$cid\" method=\"post\">";
echo "Edit: <input name=\"ptext\" value=\"$ptext\" maxlength=\"2000\"/><br/>";
 echo "<input type=\"submit\" value=\"SUBMIT\"/>";
           echo "</form>";
		 }  
		   
 echo "</div>";
echo "<p align=\"center\">";
    echo "<a href=\"index.php?action=main&amp;sid=$sid\">";
echo "Main menu</a>";
  echo "</p>";

}




else if($action=="delart1")
{
 
 $id = $_GET["cid"];
  addonline(getuid_sid($sid),"Secret ehem","index.php?action=main");
      $pstyle = gettheme($sid);
    echo xhtmlhead("SM Magazine!",$pstyle);
 

  print'<h5>SM Magazine</h5>';
 div();
   if (ischecker(getuid_sid($sid)))
  {
  $res = sm_query("DELETE FROM ibwf_readart WHERE id ='".$id."'");
  if($res)
          {
            echo "Article deleted";
          $tpci = mysqli_fetch_array(sm_query("SELECT name, authorid FROM ibwf_readart WHERE id='".$id."'"));
         $tname = htmlspecialchars($tpci[0]);
         $msg = "Your article was $tname  is deleted"." due to non-sense or not in correct category!";
         autopm($msg, $tpci[1]);
          }else{
            echo "Database Error";
          }
  echo "<br/><br/>";
}
echo "<div><a href=\"sm_articles.php?action=main&amp;sid=$sid\">";
    echo "Articles</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\">";
echo "Main menu</a>";
  echo "</p>";

}

else if($action=="by")
{
 if(getplusses(getuid_sid($sid))<1000)
    {

      echo "<p align=\"center\">";
      echo "You Need 1000+s To Access Articles.!<br/><br/>";
      echo "<a accesskey=\"0\" href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"\"/>Home</a>";
      echo "</p>";
      echo "</body>";
      echo "</html>";
      exit();
  }

  addonline(getuid_sid($sid),"SM Magazine","index.php?action=main");
      $pstyle = gettheme($sid);
    echo xhtmlhead("SM Magazine!",$pstyle);
   $month=date("F");

  print'<h5>SM Magazine</h5>';
 div();
     $uinf = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_mag_buy WHERE uid='".$uid."'"));
  if($uinf[0]==0)
{
 $res = sm_query("INSERT INTO `ibwf_mag_buy` (`id`, `uid`, `extime`) VALUES (NULL, '".$uid."', '".time()."')");

  if($res){
  $pls=getplusses($uid);
  $upl=$pls-1000;
 sm_query("UPDATE ibwf_users SET plusses='".$upl."' WHERE id='".$uid."'");
  echo "Thank You Buy In <b>$month</b>  Magazine ";

   $msg = "Your are Buyed [b]".$month."[/b] SM Magazine.. /smmag !!!";
         autopm($msg,$uid);
  
  }else echo"db failed <br/>";

//echo date('m-01-Y 00:00:00') . '<br/>';
//echo date('m-t-Y 12:59:59') . '<br/>';


  
 }else echo"U are Already Buyed SM <b>$month</b> Magazine";
echo "</div>";
echo "<p align=\"center\">

<a href=\"sm_articles.php?action=main&amp;sid=$sid\">";
    echo "Articles</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\">";
echo "Main menu</a>";
  echo "</p>";

}



   echo "</body>";
   echo "</html>";
?>
