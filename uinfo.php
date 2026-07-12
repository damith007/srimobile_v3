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
$page = $_GET["page"];
$who = $_GET["who"];
mylog($sid);
$uid = getuid_sid($sid);

 $pstyle = gettheme($sid);
echo xhtmlhead("View Profile",$pstyle);

if($action=="")
{
  addonline($uid,"Viewing User Profile","");
  
  echo "<p align=\"center\">";
  $whonick = getnick_uid($who);
  echo "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$who\">$whonick's Basic Profile</a>";
  echo "</p>";
  echo "<p>";
  ///////////////////////////////////////////////////////////////////////
   $inf1 = mysqli_fetch_array(sm_query("SELECT Work, city, street, phoneno, realname,College,School FROM ibwf_xinfo WHERE uid='".$who."'"));
   $inf2 = mysqli_fetch_array(sm_query("SELECT site, email FROM ibwf_users WHERE id='".$who."'"));

    echo "Real Name: $rln<br/>";
    echo "Work: $inf1[0]<br/>";
	//////////////////////////////////////////
    echo "<b><u>Places Lived</b></u><br/>";
    echo "Current City: $inf1[1]<br/>";
    echo "Home Town: $str<br/>";
	///////////////////////////////////////////////////////////////////
	echo "<b><u>Education</b></u><br/>";
    echo "College: $inf2[0]<br/>";
    echo "High School: $inf1[6]<br/>";
   ////////////////////////////////
	echo "<b>Contact Info</b><br/>";
	echo "Phone No.: $phn<br/>";
    echo "E-Mail: $inf2[1]<br/>";
 ///////////////////////////////////////////////////////////////////////////////////////////////////
   $inf1 = mysqli_fetch_array(sm_query("SELECT Movies, Books, Shows, favsport, favmusic FROM ibwf_xinfo WHERE uid='".$who."'"));
   echo "Movies: ".parsemsg($inf1[0])."<br/>";
    echo "Books:".parsemsg($inf1[1])."<br/>";
    echo "TV Shows: ".parsemsg($inf1[2])."<br/>";
    echo "Sport: ".parsemsg($inf1[3])."<br/>";
    echo "Music: ".parsemsg($inf1[4])."<br/>";
  echo "<u><b>About You</b></u><br/>";
  $nopl = mysqli_fetch_array(sm_query("SELECT signature FROM ibwf_users WHERE id='".$who."'"));
  echo parsepm($nopl[0], $sid);
   
  
  echo "</p>";
  echo "<p align=\"center\">";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();;
}else{

/*  (None)
Single
In a relationship
Engaged
Married
In a civil union
In a domestic partnership
In an open relationship
It's complicated
Separated
Divorced
Widowed */
  echo "<p align=\"center\">";
  echo "I don't know how did you get into here, but there's nothing to show<br/><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p></card>";
}
?>