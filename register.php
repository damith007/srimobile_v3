<?php
include("gzcompress.php");
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
?>

<?php

include ("config.php");
include ("core.php");
$id= $_GET["id"];

$uid = $_POST["uid"];
$action = $_GET["action"];
$pwd = $_POST["pwd"];
$cpw = $_POST["cpw"];
$refer = $_POST["refer"];
$usx = $_POST["usx"];

$bdyy = $_POST["bdyy"];
$bdym = $_POST["bdym"];
$bdyd = $_POST["bdyd"];
$bdy = "$bdyy-$bdym-$bdyd";
$ulc = $_POST["ulc"];
$lang = $_POST["lang"];

connectdb();
include("xhtmlfunctions.php");


$ubr = br();
$pstyle = gettheme1("1");
      echo xhtmlhead("$stitle",$pstyle);
	  
	 echo"<h5>Register!!</h5>";
if(!canreg())
{
    echo "<p>";
    echo "<img src=\"images/notok.gif\" alt=\"X\"/>Registration for this IP range is disabled at the moment, please check later";
    echo "</p>";
}else{

$shad0w= isnum($_GET["id"]);
$user = getnick_uid($shad0w);

 if ($user!="")
{
echo "<div class=\"ok\">You were invited to SriMoBILE by <b> $user</b></div>";

}



echo "<p>";
if ($action==""){
echo "<div class=\"alert\">";
echo "<img src=\"images/point.gif\" alt=\"!\"/>";
echo "Allowed Only 10-30 Adults Only<br/>";

echo "<img src=\"images/point.gif\" alt=\"!\"/>";
echo "UserName must be simple and English letters only<br/>";

echo "<img src=\"images/point.gif\" alt=\"!\"/>";
echo "Password and Username Cannot be same<br/>";


echo "</div>";
}else

$tolog = false;
if(trim($uid)=="")
{
    echo registerform(1);
}else if(trim($pwd)=="")
{
    echo registerform(2);
}else if(trim($cpw)=="")
{
    echo registerform(3);
}else if(spacesin($uid)||scharin($uid))
{
    echo registerform(4);
}else if(spacesin($pwd)||scharin($pwd))
{
    echo registerform(5);
}else if($pwd!=$cpw)
{
    echo registerform(6);
}else if(strlen($uid)<4)
{
    echo registerform(7);
}else if(strlen($pwd)<4)
{
    echo registerform(8);
}else if(isdigitf($uid))
{
    echo registerform(11);
}else if(checknick($uid)==1)
{
    echo registerform(12);

}else if(checknick($uid)==2)
{
    echo registerform(13);

}

else if($uid==$pwd)
{
    echo registerform(14);

}



else if(register($uid,$pwd,$usx,$bdy,$ulc,$lang,$email, $ubr)==1)
{
    echo registerform(9);
}else if(register($uid,$pwd,$usx,$bdy,$ulc,$lang,$email, $ubr)==2)
{
    echo registerform(10);
}else{


  echo "<i>Registration completed successfully!</i> Now you are a proud member in <u>SriMobile !</u><br/><br/><b>Bookmark next page</b> for auto login <br/>and Be online at least 20 minutes in SriMobile.net to get validate ur account, If not ur profile will be deleted in 3 Days";

 $tolog = true;
}
echo "</p>";
}
echo "<p align=\"center\">";
if($tolog)
{

 sm_query("UPDATE ibwf_users SET ref='".$id."' WHERE name='".$uid."'"); 
echo"UserName : <u>$uid</u><br/>";
echo"Password : <u>$pwd</u><br/>";
 
    echo "<a href=\"login.php?loguid=$uid&amp;logpwd=$pwd\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Login Now!!</a>";
}else{
echo "<a href=\"index.php?id=$id\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
}
echo "</p>";
  echo xhtmlfoot();
?>
