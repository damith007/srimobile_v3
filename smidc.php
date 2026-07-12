<?php
include("gzcompress.php");
header("Content-type: image/jpeg");
$id = $_GET["id"];
include("config.php");
include("core.php");
connect();
$uinfo = mysqli_fetch_array(sm_query("SELECT plusses, posts, name, avatar FROM ibwf_users WHERE id='".$id."'"));
$bgpic = imagecreatefromjpeg("images/rwidc.jpg");
$textcolor = imagecolorallocate($bgpic,0x00,0,0x99);
$infcolor = imagecolorallocate($bgpic,0,0,0);
$stscolor = imagecolorallocate($bgpic,0x00,0x55,0x00);
$idinfo = "ID: $id";
$postsinfo = "Posts: $uinfo[1]";
$creditsinfo = "plusses: $uinfo[0]";
imagestring($bgpic,2,10,1,$uinfo[2],$textcolor);
imagestring($bgpic,1,54,15,$idinfo,$infcolor);
imagestring($bgpic,1,54,24,$postsinfo,$infcolor);
imagestring($bgpic,1,54,33,$creditsinfo,$infcolor);
imagestring($bgpic,1,53,45,strip_tags(getStatus($id)),$stscolor);
$avl = $uinfo[3];
if(trim($avl!=""))
{
  $avl = strtolower($avl);
  if(substr_count($avl,"rwidc.php")==0)
  $imgi = getimagesize($avl);
  if($imgi[0]>0)
  {
      if($imgi[2]==1)
      {
        $av = imagecreatefromgif($avl);
        imagecopyresized($bgpic, $av,10,16,0,0,40,40,$imgi[0], $imgi[1]);
      }else if($imgi[2]==2)
      {
        $av = imagecreatefromjpeg($avl);
        imagecopyresized($bgpic, $av,10,16,0,0,40,40,$imgi[0], $imgi[1]);
      }
  }
}
imagejpeg($bgpic);
imagedestroy($bgpic);
?>


