<?php
include("config.php");
include("core.php");
include("xhtmlfunctions.php");

echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\"\"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">";

connectdb();
$action = $_GET["action"];
$sid = $_GET["sid"];

//////////////////////////////////////////////////////////////
mylog($sid);
///////////////////////////////////////////////////
if(!isadmin(getuid_sid($sid)))
  {
    $pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
      echo "<p align=\"center\">";
      echo "You are not an admin<br/>";
      echo "<br/>";
      echo "<a href=\"index.php\">Home</a>";
      echo "</p>";
      echo "</body>";
      echo "</html>";
      exit();
    }
    addonline(getuid_sid($sid),"Admin CP","");
 if($action=="admincp")
{

    $pstyle = gettheme($sid);
    echo xhtmlhead("Admin CP!",$pstyle);
  echo "<p align=\"center\">";
  echo "<b>Admin CP</b>";
  echo "</p>";
 
  echo "<p>";

    echo "<a href=\"admincp.php?action=general&amp;sid=$sid\">&#187;General Settings</a><br/>";
	echo "<a href=\"admincp.php?action=pmall&amp;sid=$sid\">&#187;Pm all</a><br/>";
	echo "<a href=\"admincp.php?action=logo&amp;sid=$sid\">&#187;Logo Uploader!</a><br/>";
	echo "<a href=\"admincp.php?action=shop&amp;sid=$sid\">&#187;Shop Uploader!</a><br/>";
	echo "<a href=\"admincp.php?action=avatar&amp;sid=$sid\">&#187;Avatar Uploader!</a><br/>";
		echo "<a href=\"admincp.php?action=chatmoods&amp;sid=$sid\">&#187;Chatmoods Uploader!</a><br/>";
	echo "<a href=\"admincp.php?action=addfaq&amp;sid=$sid\">&#187;Add Faq</a><br/>";
	
	
    echo "<a href=\"admincp.php?action=fcats&amp;sid=$sid\">&#187;Forum Categories</a><br/>";
    echo "<a href=\"admincp.php?action=forums&amp;sid=$sid\">&#187;Forums</a><br/>";

    echo "<a href=\"admincp.php?action=ugroups&amp;sid=$sid\">&#187;User groups</a><br/>";
    echo "<a href=\"admincp.php?action=addperm&amp;sid=$sid\">&#187;Add permissions</a><br/>";
  
    echo "<a href=\"admincp.php?action=chuinfo&amp;sid=$sid\">&#187;Change user info</a><br/>";
    echo "<a href=\"admincp.php?action=manrss&amp;sid=$sid\">&#187;Manage RSS Sources</a><br/>";
  
  echo "<a href=\"admincp.php?action=addsml&amp;sid=$sid\">&#187;Add Smilies</a><br/>";
   echo "<a href=\"admincp.php?action=blocksites&amp;sid=$sid\">&#187;Spam Fiter</a><br/>";


    echo "<a href=\"admincp.php?action=chrooms&amp;sid=$sid\">&#187;Chatrooms</a><br/>";
      echo "<a href=\"admincp.php?action=clrdta&amp;sid=$sid\">&#187;Clear Data</a><br/>";

 
  echo "</p>";
  echo "<p align=\"center\">";
  
    
    echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p>";
  echo xhtmlfoot();
}	
///////////////////////////////////////////	

	else if ($action=="chatmoods")
 {

$pstyle = gettheme($sid);
    echo xhtmlhead("Chatmoods",$pstyle);
	
	
        echo "<br/><h2>";
        echo "$stitle CHATMOODS Uploder</h2><br/>";

div();
    echo "<form enctype=\"multipart/form-data\" method=\"post\" action=\"admproc.php?action=chatmoods&amp;sid=$sid\">";
    echo "<input type=\"file\" name=\"f1\" size=\"15\"><br/>";
	 echo "Text :<input name=\"text\"  maxlength=\"255\"/><br/>";
	echo "desr :<input name=\"desr\"  maxlength=\"255\"/><br/>";
	
    echo "<input type=\"hidden\" name=\"action\" value=\"image\" /><br/>";

    echo "<INPUT TYPE=\"submit\" name=\"upl\" VALUE=\"upload\"></form>";   


  echo "<br/>Note:<br/>";   
      echo "* File size limit 512kb. If your upload does not work, try a smaller Photo.<br/>";
      echo "* Allowed formats: <b>.jpg, .gif, .bmp, .png</b><br/>";
       echo "* Do not upload<b> spam pics,Adults pics,insults pics</b><br/>";
  echo "</center></div>";
  
        echo "<p align=\"center\">";
  echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
    echo "<br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";
        echo xhtmlfoot();
}



///////////////////////////////////////
	else if ($action=="shop")
 {
addonline(getuid_sid($sid),"Shop Uploder - xHTML","");
$pstyle = gettheme($sid);
    echo xhtmlhead("Shop Uploder",$pstyle);
	
	
        echo "<br/><h2>";
        echo "$stitle Shop Uploder</h2><br/>";

div();
    echo "<form enctype=\"multipart/form-data\" method=\"post\" action=\"admproc.php?action=shop&amp;sid=$sid\">";
    echo "<input type=\"file\" name=\"f1\" size=\"15\"><br/>";
	 echo "Name :<input name=\"itemname\"  maxlength=\"255\"/><br/>";
	echo "price :<input name=\"itmeprice\"  maxlength=\"255\"/><br/>";
	echo "availble :<input name=\"avail\"  maxlength=\"255\"/><br/>";
	echo "<br/>Catagary: ";
  echo "<select name=\"itemshopid\">";
  echo "<option value=\"1\">Cards</option>";
  echo "<option value=\"2\">Gifts</option>";
  echo "<option value=\"3\">Moto Traders</option>";
  echo "<option value=\"4\">Fun@adluts</option>";
  
  echo "</select><br/>";
    echo "<input type=\"hidden\" name=\"action\" value=\"image\" /><br/>";

    echo "<INPUT TYPE=\"submit\" name=\"upl\" VALUE=\"upload\"></form>";   


  echo "<br/>Note:<br/>";   
      echo "* File size limit 512kb. If your upload does not work, try a smaller Photo.<br/>";
      echo "* Allowed formats: <b>.jpg, .gif, .bmp, .png</b><br/>";
       echo "* Do not upload<b> spam pics,Adults pics,insults pics</b><br/>";
  echo "</center></div>";
  
        echo "<p align=\"center\">";
  echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
    echo "<br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";
        echo xhtmlfoot();
}


////////////////////////////////////////////
	else if ($action=="logo")
 {
addonline(getuid_sid($sid),"Logo Uploder - xHTML","");
$pstyle = gettheme($sid);
    echo xhtmlhead("Logo Uploder",$pstyle);
	
	
        echo "<br/><h2>";
        echo "$stitle Logo Uploder</h2><br/>";

div();
    echo "<form enctype=\"multipart/form-data\" method=\"post\" action=\"admproc.php?action=logo&amp;sid=$sid\">";
    echo "<input type=\"file\" name=\"f1\" size=\"15\"><br/>";
    echo "<input type=\"hidden\" name=\"action\" value=\"image\" /><br/>";

    echo "<INPUT TYPE=\"submit\" name=\"upl\" VALUE=\"upload\"></form>";   


  echo "<br/>Note:<br/>";   
      echo "* File size limit 512kb. If your upload does not work, try a smaller Photo.<br/>";
      echo "* Allowed formats: <b>.jpg, .gif, .bmp, .png</b><br/>";
       echo "* Do not upload<b> spam pics,Adults pics,insults pics</b><br/>";
  echo "</center></div>";
  
        echo "<p align=\"center\">";
  echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
    echo "<br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";
        echo xhtmlfoot();
}
//////////////////////////////////////////
else if ($action=="avatar")
 {
addonline(getuid_sid($sid),"avatar Uploder - xHTML","");
$pstyle = gettheme($sid);
    echo xhtmlhead("avatar Uploder",$pstyle);
	
	
        echo "<br/><h2>";
        echo "$stitle avatar Uploder</h2><br/>";

div();
    echo "<form enctype=\"multipart/form-data\" method=\"post\" action=\"admproc.php?action=avatar&amp;sid=$sid\">";
    echo "<input type=\"file\" name=\"f1\" size=\"15\"><br/>";
    echo "<input type=\"hidden\" name=\"action\" value=\"image\" /><br/>";

    echo "<INPUT TYPE=\"submit\" name=\"upl\" VALUE=\"upload\"></form>";   


  echo "<br/>Note:<br/>";   
      echo "* File size limit 512kb. If your upload does not work, try a smaller Photo.<br/>";
      echo "* Allowed formats: <b>.jpg, .gif, .bmp, .png</b><br/>";
       echo "* Do not upload<b> spam pics,Adults pics,insults pics</b><br/>";
  echo "</center></div>";
  
        echo "<p align=\"center\">";
  echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
    echo "<br/><a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
        echo "</p>";
        echo xhtmlfoot();
}
//////////////////////////////////////
else if($action=="general")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);

    $xtm = getsxtm();
    $paf = getpmaf();
    $fvw = getfview();
    $fmsg = htmlspecialchars(getfmsg());
	$logmsg = htmlspecialchars(getlogmsg());
	
    if(canreg())
    {
      $arv = "e";
    }else{
      $arv= "d";
    }
  echo "<form action=\"admproc.php?action=general&amp;sid=$sid\" method=\"post\">";
  echo "Session Period: ";
  echo "<input name=\"sesp\" format=\"*N\" maxlength=\"3\" size=\"3\ value=\"$xtm\"/>";
  echo "<br/>PM Antiflood<input name=\"pmaf\" format=\"*N\" maxlength=\"3\" size=\"3\" value=\"$paf\"/>";
  echo "<br/>Forum Message: ";
  echo "<input name=\"fmsg\"  maxlength=\"255\" value=\"$fmsg\"/>";
echo "<br/>Login Message: ";
  echo "<input name=\"lmsg\"  maxlength=\"255\" value=\"$logmsg\"/>";
  
  echo "<br/>Registration: ";
  echo "<select name=\"areg\" value=\"$arv\">";
  echo "<option value=\"e\">Enabled</option>";
  echo "<option value=\"d\">Disabled</option>";
  echo "</select><br/>";


  

echo "<input type=\"submit\" value=\"submit\"/>";
echo "</form>";

  echo "</p>";
  echo "<p align=\"center\">";
  echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p></body>";
}
//////////////////////////////////////////////////////

else if($action=="addperm")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);

    echo "<p align=\"center\">";
    echo "<b>Add permission</b>";
    $forums = sm_query("SELECT id, name FROM ibwf_forums ORDER BY position, id, name");
    echo "<form action=\"admproc.php?action=addperm&amp;sid=$sid\" method=\"post\">";
    echo "<br/><br/>Forum: <select name=\"fid\">";
    while ($forum=mysqli_fetch_array($forums))
    {
        echo "<option value=\"$forum[0]\">$forum[1]</option>";
    }
    echo "</select>";
    $forums = sm_query("SELECT id, name FROM ibwf_groups ORDER BY  name, id");
    echo "<br/>UGroups: <select name=\"gid\">";
    while ($forum=mysqli_fetch_array($forums))
    {
        echo "<option value=\"$forum[0]\">$forum[1]</option>";
    }
    echo "</select>";
echo "<input type=\"submit\" value=\"Submit\"/>";
echo "</form>";

    echo "<br/><br/><a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}

else if($action=="addfaqs")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
 boxstart("Add FAQ");
 
       echo "<p align=\"center\">";
echo "<form action=\"admproc.php?action=addfaqs&amp;sid=$sid\" method=\"post\">";


 
 echo "<b>question :</b> <br/><textarea rows=\"2\" cols=\"20\" name=\"question\"></textarea><br/>";
 echo "<b>answer :</b> <br/><textarea rows=\"2\" cols=\"20\" name=\"answer\"></textarea><br/>";
 
 

     $forums = sm_query("SELECT id, name FROM ibwf_faq ORDER BY  name, id");
   echo "<b>category:</b> <select name=\"cid\">";
    while ($forum=mysqli_fetch_array($forums))
    {
        echo "<option value=\"$forum[0]\">$forum[1]</option>";
    }
    echo "</select><br/>";
	
 
echo "<input type=\"submit\" value=\"Submit\"/>";
echo "</form>";

    echo "<br/><br/><a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}

else if($action=="addfaq")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
 boxstart("Add FAQ");
    
    echo "<p align=\"center\">";

    echo "<form action=\"admproc.php?action=addfaq&amp;sid=$sid\" method=\"post\">";
  echo "FAQ:<input name=\"pmtou\" maxlength=\"250\"/><br/>";
  
  echo "<input type=\"submit\" value=\"Update\"/>";
  echo "</form>";

    echo "<br/><br/><a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}


//////////////////////////////////////////////////////////////////////////
else if($action=="pmall")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);

    
    echo "<p align=\"center\">";

    echo "<form action=\"admproc.php?action=pmall&amp;sid=$sid\" method=\"post\">";
  echo "PM:<input name=\"pmtou\" maxlength=\"250\"/><br/>";
  echo "TO:<select name=\"who\">";
  echo "<option value=\"online\">Online users</option>";
  echo "<option value=\"staff\">staff</option>";
 echo "<option value=\"owners\">owners</option>";
 echo "<option value=\"admin\">admin</option>";
 echo "<option value=\"mods\">mods</option>";
 echo "<option value=\"headadmin\">headadmin</option>";
  echo "<option value=\"all\">all members</option>";
  echo "</select><br/>";
  echo "<input type=\"submit\" value=\"Update\"/>";
  echo "</form>";

    echo "<br/><br/><a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}

////////////////////////////////////////////////////////
else if($action=="fcats")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);

    echo "<p>";
    echo "<a href=\"admincp.php?action=addcat&amp;sid=$sid\">&#187;Add Category</a><br/>";
    echo "<a href=\"admincp.php?action=edtcat&amp;sid=$sid\">&#187;Edit Category</a><br/>";
    echo "<a href=\"admincp.php?action=delcat&amp;sid=$sid\">&#187;Delete Category</a><br/>";
    echo "</p>";
    echo "<p align=\"center\">";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}

else if($action=="club")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);

	$clid = $_GET["clid"];
    echo "<p>";
    echo "<a href=\"admincp.php?action=gccp&amp;sid=$sid&amp;clid=$clid\">&#187;Give Credit Plusses</a><br/>";
    echo "<a href=\"admproc.php?action=delclub&amp;sid=$sid&amp;clid=$clid\">&#187;Delete Club</a><br/>";
    echo "</p>";
    echo "<p align=\"center\">";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}

else if($action=="manrss")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);

    echo "<p>";
    echo "<a href=\"admincp.php?action=addrss&amp;sid=$sid\">&#187;Add Source</a><br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_rss"));
    if($noi[0]>0)
    {echo "<form action=\"admincp.php?action=edtrss&amp;sid=$sid\" method=\"post\">";
        echo "<br/><select name=\"rssid\">";
        while($rs=mysqli_fetch_array($rss))
        {
            echo "<option value=\"$rs[1]\">$rs[0]</option>";
        }
      echo "</select><br/>";
echo "<input type=\"submit\" value=\"Edit\"/>";
echo "<form action=\"admproc.php?action=delrss&amp;sid=$sid\" method=\"post\">";
echo "<br/><select name=\"rssid\">";
while($rs1=mysqli_fetch_array($rss1))
        {
            echo "<option value=\"$rs1[1]\">$rs1[0]</option>";
        }
      echo "</select><br/>";
echo "<input type=\"submit\" value=\"Delete\"/>";
echo "<br/>";
echo "</form>";
    }
    echo "</p>";
    echo "<p align=\"center\">";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}

else if($action=="chrooms")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);

    echo "<p>";
    echo "<a href=\"admincp.php?action=addchr&amp;sid=$sid\">&#187;Add Room</a><br/>";
    $noi = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_rooms"));
    if($noi[0]>0)
    {
        $rss = sm_query("SELECT name, id FROM ibwf_rooms");
        echo "<form action=\"admproc.php?action=delchr&amp;sid=$sid\" method=\"post\">";
        echo "<br/><select name=\"chrid\">";
        while($rs=mysqli_fetch_array($rss))
        {
           $rs0 = htmlspecialchars("$rs[0]");
          $rs1 = htmlspecialchars("$rs[1]");
          echo "<option value=\"$rs1\">$rs0</option>";
        }
      echo "</select><br/>";
echo "<input type=\"submit\" value=\"Delete\"/>";
echo "</form>";

    }
    echo "</p>";
    echo "<p align=\"center\">";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}

else if($action=="forums")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
 
    echo "<p>";
    echo "<a href=\"admincp.php?action=addfrm&amp;sid=$sid\">&#187;Add Forum</a><br/>";
    echo "<a href=\"admincp.php?action=edtfrm&amp;sid=$sid\">&#187;Edit Forum</a><br/>";
    echo "<a href=\"admincp.php?action=delfrm&amp;sid=$sid\">&#187;Delete Forum</a><br/>";
    echo "</p>";
    echo "<p align=\"center\">";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}

else if($action=="clrdta")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);


    echo "<p>";
    echo "<a href=\"admproc.php?action=delpms&amp;sid=$sid\">&#187;Deleted PMs</a><br/>";
    echo "<a href=\"admproc.php?action=clrmlog&amp;sid=$sid\">&#187;Clear ModLog</a><br/>";
    echo "<a href=\"admproc.php?action=delsht&amp;sid=$sid\">&#187;Delete Old Shouts</a><br/>";
    echo "</p>";
    echo "<p align=\"center\">";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}

else if($action=="addcat")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
boxstart("Catagories");
     echo "<p align=\"center\">";
    echo "<form action=\"admproc.php?action=addcat&amp;sid=$sid\" method=\"post\">";
    echo "Name:<input name=\"fcname\" maxlength=\"30\"/><br/>";
    echo "Position:<input name=\"fcpos\" format=\"*N\" size=\"3\"  maxlength=\"3\"/><br/>";
echo "<input type=\"submit\" value=\"Add\"/>";
    echo "</form>";
    echo "<br/><br/><a href=\"admincp.php?action=fcats&amp;sid=$sid\">";
  echo "Forum Categories</a><br/>";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}
else if($action=="addfrm")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);


    echo "<p align=\"center\">";
    echo "<b>Add Forum</b><br/><br/>";
    echo "<form action=\"admproc.php?action=addfrm&amp;sid=$sid\" method=\"post\">";
    echo "Name:<input name=\"frname\" maxlength=\"30\"/><br/>";
    echo "Position:<input name=\"frpos\" format=\"*N\" size=\"3\"  maxlength=\"3\"/><br/>";
   $fcats = sm_query("SELECT id, name FROM ibwf_fcats ORDER BY position, id, name");
    echo "Category: <select name=\"fcid\">";

    while ($fcat=mysqli_fetch_array($fcats))
    {
        echo "<option value=\"$fcat[0]\">$fcat[1]</option>";
    }
    echo "</select><br/>";
echo "<input type=\"submit\" value=\"Add\"/>";
echo "</form>";
    echo "<br/><br/><a href=\"admincp.php?action=forums&amp;sid=$sid\">";
  echo "Forums</a><br/>";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}
else if($action=="gccp")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);

    echo "<p align=\"center\">";
    echo "<b>Add club plusses</b><br/><br/>";
	$clid = $_GET["clid"];
    echo "<form action=\"admproc.php?action=gccp&amp;sid=$sid&amp;clid=$clid\" method=\"post\">";
    echo "Plusses:<input name=\"plss\" maxlength=\"3\" size=\"3\" format=\"*N\"/><br/>";
echo "<input type=\"submit\" value=\"Give\"/>";
echo "</form>";
    echo "<br/><br/><a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}
else if($action=="addsml")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
 
    echo "<p align=\"center\">";
    echo "<b>Add Smilies</b><br/><br/>";
    echo "<form enctype=\"multipart/form-data\" action=\"admproc.php?action=addsml&amp;sid=$sid\" method=\"post\">";
    echo "Code:<input name=\"smlcde\" maxlength=\"30\"/><br/>";
    echo "Image Source:<input type=\"file\" name=\"f1\" size=\"15\"><br/>";
	echo "<input type=\"hidden\" name=\"action\" value=\"image\" /><br/>";
    echo "<input id=\"inputButton\" type=\"submit\" value=\"Add\"/>";
   echo "</form>";

echo"<br/>";

    echo "<br/><br/><a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
    }



else if($action=="addrss")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);

    echo "<p align=\"center\">";
    echo "<b>Add RSS</b><br/><br/>";
    echo "<form action=\"admproc.php?action=addrss&amp;sid=$sid\" method=\"post\">";
    echo "Name:<input name=\"rssnm\" maxlength=\"50\"/><br/>";
    echo "Source:<input name=\"rsslnk\" maxlength=\"255\"/><br/>";
    echo "Image:<input name=\"rssimg\" maxlength=\"255\"/><br/>";
    echo "Description:<input name=\"rssdsc\"  maxlength=\"255\"/><br/>";
    $forums = sm_query("SELECT id, name FROM ibwf_forums ORDER BY position, id, name");
    echo "Forum: <select name=\"fid\">";
    echo "<option value=\"0\">NO FORUM</option>";
    while ($forum=mysqli_fetch_array($forums))
    {
        echo "<option value=\"$forum[0]\">$forum[1]</option>";
    }
    echo "</select><br/>";
echo "<input type=\"submit\" value=\"Add\"/>";
echo "</form>";

    echo "<br/><br/><a href=\"admincp.php?action=manrss&amp;sid=$sid\">";
  echo "<img src=\"images/rss.gif\" alt=\"rss\"/>Manage RSS</a><br/>";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}

else if($action=="addchr")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);

    echo "<p align=\"center\">";
    echo "<b>Add Room</b><br/><br/>";
    echo "<form action=\"admproc.php?action=addchr&amp;sid=$sid\" method=\"post\">";
    echo "Name:<input name=\"chrnm\" maxlength=\"30\"/><br/>";
    echo "Minimum Age:<input name=\"chrage\" format=\"*N\" maxlength=\"3\" size=\"3\"/><br/>";
    echo "Minimum Chat Posts:<input name=\"chrpst\" format=\"*N\" maxlength=\"4\" size=\"4\"/><br/>";
    echo "Permission:<select name=\"chrprm\">";
    echo "<option value=\"0\">Normal</option>";
    echo "<option value=\"1\">Moderators</option>";
    echo "<option value=\"2\">Admins</option>";
echo "<option value=\"3\">Head Admin</option>";
echo "<option value=\"4\">Owners</option>";
    echo "</select><br/>";
    echo "Censored:<select name=\"chrcns\">";
    echo "<option value=\"1\">Yes</option>";
    echo "<option value=\"0\">No</option>";
    echo "</select><br/>";

	
    echo "Fun:<select name=\"chrfun\">";
    echo "<option value=\"0\">No</option>";
    echo "<option value=\"1\">esreveR</option>";
    echo "<option value=\"2\">Fun Babe</option>";
    echo "</select><br/>";
echo "<input type=\"submit\" value=\"Add\"/>";
    echo "<form>";
    echo "<br/><br/><a href=\"admincp.php?action=chrooms&amp;sid=$sid\">";
  echo "<img src=\"images/chat.gif\" alt=\"chat\"/>Chatrooms</a><br/>";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}

else if($action=="edtrss")
{$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);

  $rssid = $_POST["rssid"];
  $rsinfo = mysqli_fetch_array(sm_query("SELECT title, link, imgsrc, fid, dscr FROM ibwf_rss WHERE id='".$rssid."'"));
    echo "<form action=\"admproc.php?action=edtrss&amp;sid=$sid\" method=\"post\">";
    echo "Name:<input name=\"rssnm\" maxlength=\"50\" value=\"$rsinfo[0]\"/><br/>";
    echo "Source:<input name=\"rsslnk\" maxlength=\"255\" value=\"$rsinfo[1]\"/><br/>";
    echo "Image:<input name=\"rssimg\" maxlength=\"255\" value=\"$rsinfo[2]\"/><br/>";
    echo "Description:<input name=\"rssdsc\"  maxlength=\"255\" value=\"$rsinfo[4]\"/><br/>";
    $forums = sm_query("SELECT id, name FROM ibwf_forums ORDER BY position, id, name");
    echo "Forum: <select name=\"fid\" value=\"$rsinfo[3]\">";
    echo "<option value=\"0\">NO FORUM</option>";
    while ($forum=mysqli_fetch_array($forums))
    {
        echo "<option value=\"$forum[0]\">$forum[1]</option>";
    }
    echo "</select><br/>";
echo "<input type=\"submit\" value=\"Edit\"/>";
echo "<input type=\"hidden\" name=\"fid\" value=\"$fid\"/>";
echo "<input type=\"hidden\" name=\"rssid\" value=\"$rssid\"/>";
echo "</form>";
    echo "<br/><br/><a href=\"admincp.php?action=manrss&amp;sid=$sid\">";
  echo "<img src=\"images/rss.gif\" alt=\"rss\"/>Manage RSS</a><br/>";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}

else if($action=="addgrp")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);
    echo "<p align=\"center\">";
    echo "<b>Add Group</b><br/><br/>";
    echo "<form action=\"admproc.php?action=addgrp&amp;sid=$sid\" method=\"post\">";
    echo "Name:<input name=\"ugname\" maxlength=\"30\"/><br/>";
    echo "Auto Assign:<select name=\"ugaa\">";
    echo "<option value=\"1\">Yes</option>";
    echo "<option value=\"0\">No</option>";
    echo "</select><br/>";
    echo "<br/><small><b>For Auto Assign Only</b></small><br/>";
    echo "Allow:<select name=\"allus\">";
    echo "<option value=\"0\">Normal Users</option>";
    echo "<option value=\"1\">Mods</option>";
    echo "<option value=\"2\">Admins</option>";
    echo "</select><br/>";
    echo "Min. Age:";
    echo "<input name=\"mage\" format=\"*N\" maxlength=\"3\" size=\"3\"/>";
    echo "<br/>Min. Posts:";
    echo "<input name=\"mpst\" format=\"*N\" maxlength=\"3\" size=\"3\"/>";
    echo "<br/>Min. Plusses:";
    echo "<input name=\"mpls\" format=\"*N\" maxlength=\"3\" size=\"3\"/><br/>";
echo "<input type=\"submit\" value=\"Add\"/>";
echo "</form>";
    echo "<br/><br/><a href=\"admincp.php?action=ugroups&amp;sid=$sid\">";
  echo "UGroups</a><br/>";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}



else if($action=="edtfrm")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);

    echo "<p align=\"center\">";
    echo "<b>Edit Forum</b><br/><br/>";
    $forums = sm_query("SELECT id,name FROM ibwf_forums ORDER BY position, id, name");
    echo "<form action=\"admproc.php?action=edtfrm&amp;sid=$sid\" method=\"post\">";
    echo "Forum: <select name=\"fid\">";
    while($forum=mysqli_fetch_array($forums))
    {
      echo "<option value=\"$forum[0]\">$forum[1]</option>";
    }
    echo "</select>";
    echo "<br/>Name:<input name=\"frname\" maxlength=\"30\"/><br/>";
    echo "Position:<input name=\"frpos\" format=\"*N\" size=\"3\"  maxlength=\"3\"/><br/>";
    $fcats = sm_query("SELECT id, name FROM ibwf_fcats ORDER BY position, id, name");
    echo "Category: <select name=\"fcid\">";
    while ($fcat=mysqli_fetch_array($fcats))
    {
        echo "<option value=\"$fcat[0]\">$fcat[1]</option>";
    }
    echo "</select><br/>";
echo "<input type=\"submit\" value=\"Edit\"/>";
echo "</form>";
    echo "<br/><br/><a href=\"admincp.php?action=forums&amp;sid=$sid\">";
  echo "Forums</a><br/>";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}
else if($action=="delfrm")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);

    echo "<p align=\"center\">";
    echo "<b>Delete Forum</b><br/><br/>";
    $forums = sm_query("SELECT id,name FROM ibwf_forums ORDER BY position, id, name");
   echo "<form action=\"admproc.php?action=delfrm&amp;sid=$sid\" method=\"post\">";
    echo "Forum: <select name=\"fid\">";
    while($forum=mysqli_fetch_array($forums))
    {
      $forum0 = htmlspecialchars("$forum[0]");
      $forum1 = htmlspecialchars("$forum[1]");
         echo "<option value=\"$forum0\">$forum1</option>";
    }
    echo "</select><br/>";
echo "<input type=\"submit\" value=\"Delete\"/>";
    echo "</form>";

    echo "<br/><br/><a href=\"admincp.php?action=forums&amp;sid=$sid\">";
  echo "Forums</a><br/>";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}
else if($action=="delgrp")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);

    echo "<p align=\"center\">";
    echo "<b>Delete UGroup</b><br/><br/>";
    $forums = sm_query("SELECT id,name FROM ibwf_groups ORDER BY name, id");
    echo "<form action=\"admproc.php?action=delgrp&amp;sid=$sid\" method=\"post\">";
    echo "UGroup: <select name=\"ugid\">";
    while($forum=mysqli_fetch_array($forums))
    {
      echo "<option value=\"$forum[0]\">$forum[1]</option>";
    }
    echo "</select><br/>";
echo "<input type=\"submit\" value=\"Delete\"/>";
echo "</form>";
    echo "<br/><br/><a href=\"admincp.php?action=forums&amp;sid=$sid\">";
  echo "Forums</a><br/>";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}
else if($action=="edtcat")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);

    echo "<p align=\"center\">";
    echo "<b>Edit Category</b><br/><br/>";
    $fcats = sm_query("SELECT id, name FROM ibwf_fcats ORDER BY position, id, name");
    echo "<form action=\"admproc.php?action=edtcat&amp;sid=$sid\" method=\"post\">";
    echo "Edit: <select name=\"fcid\">";
    while ($fcat=mysqli_fetch_array($fcats))
    {
        echo "<option value=\"$fcat[0]\">$fcat[1]</option>";
    }
    echo "</select><br/>";
    echo "Name:<input name=\"fcname\" maxlength=\"30\"/><br/>";
    echo "Position:<input name=\"fcpos\" format=\"*N\" size=\"3\"  maxlength=\"3\"/><br/>";
echo "<input type=\"submit\" value=\"Edit\"/>";
echo "</form>";
    echo "<br/><br/><a href=\"admincp.php?action=fcats&amp;sid=$sid\">";
  echo "Forum Categories</a><br/>";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}else if($action=="delcat")
{
    echo "<p align=\"center\">";
    echo "<b>Delete Category</b><br/><br/>";
    $fcats = sm_query("SELECT id, name FROM ibwf_fcats ORDER BY position, id, name");
    echo "<form action=\"admproc.php?action=delcat&amp;sid=$sid\" method=\"post\"/>";
    echo "Delete: <select name=\"fcid\">";

    while ($fcat=mysqli_fetch_array($fcats))
    {
        echo "<option value=\"$fcat[0]\">$fcat[1]</option>";
    }
    echo "</select><br/>";
echo "<input type=\"submit\" value=\"Delete\"/>";
    echo "</form>";

    echo "<br/><br/><a href=\"admincp.php?action=fcats&amp;sid=$sid\">";
  echo "Forum Categories</a><br/>";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}
/////////////////////////////////user info

else if($action=="chuinfo")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);

    echo "<p align=\"center\">";
    echo "Type user nickname<br/><br/>";
   echo "<form action=\"admincp.php?action=acui&amp;sid=$sid\" method=\"post\">";
    echo "User: <input name=\"unick\" format=\"*x\" maxlength=\"15\"/><br/>";
echo "<input type=\"submit\" value=\"find\"/>";
echo "</form>";
    echo "<br/><br/><a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}

//////////////////////////////////////Change User info

else if($action=="acui")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("Change User info",$pstyle);

    echo "<p align=\"center\">";
    if(isset($_POST["unick"])){
	$unick = $_POST["unick"];
	$tid = getuid_nick($unick);
	}else{
	$who = isnum($_GET["who"]);
	$tid = $who;
	$unick = getnick_uid($tid);
	
	}
	
	
	
    if($tid==0)
    {
      echo "<img src=\"images/notok.gif\" alt=\"x\"/>User Does Not exist<br/>";
    }else{
      echo "</p>";
      echo "<p>";
     
      $judg = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_judges WHERE uid='".$tid."'"));
      if($judg[0]>0)
      {
      echo "<a href=\"admproc.php?action=deljdg&amp;sid=$sid&amp;who=$tid\">&#187;Remove $unick Chat Mod</a><br/>";
      }else{
        echo "<a href=\"admproc.php?action=addjdg&amp;sid=$sid&amp;who=$tid\">&#187;Make $unick Chat Mod</a><br/>";
      }
     
	 
	  echo "<a href=\"admproc.php?action=delu&amp;sid=$sid&amp;who=$tid\">&#187;Delete $unick</a><br/>";
	 
	  echo "<a href=\"admproc.php?action=delxp&amp;sid=$sid&amp;who=$tid\">&#187;Delete $unick's posts</a><br/>";
      echo "<a href=\"admincp.php?action=chubi&amp;sid=$sid&amp;who=$tid\">&#187;Edit $unick</a><br/>";
       echo "<a href=\"admincp.php?action=apruim&amp;sid=$sid&amp;who=$tid\">&#187;Add $unick Premium User</a><br/>";
     
 echo "<a href=\"admincp.php?action=astaff&amp;sid=$sid&amp;who=$tid\">&#187;Add $unick Staff</a><br/>";
     

 




	 echo "</p>";
      echo "<p align=\"center\">";
    }
	
	
	 echo "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$tid\">$unick's Profile</a><br/>";
    echo "<a href=\"admincp.php?action=chuinfo&amp;sid=$sid\">";
  echo "Users Info</a><br/>";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}

////////////////////////////////////////////
else if($action=="apruim")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("Change User info",$pstyle);

    echo "<p align=\"center\">";
    if(isset($_POST["unick"])){
	$unick = $_POST["unick"];
	$tid = getuid_nick($unick);
	}else{
	$who = isnum($_GET["who"]);
	$tid = $who;
	$unick = getnick_uid($tid);
	
	}
	
	
	
    if($tid==0)
    {
      echo "<img src=\"images/notok.gif\" alt=\"x\"/>User Does Not exist<br/>";
    }else{
      echo "</p>";
      echo "<p>";
     
 
     
$specialid = mysqli_fetch_array(sm_query("SELECT specialid FROM ibwf_users WHERE id='".$tid."'"));

 
 echo "<form action=\"admproc.php?action=upprem&amp;sid=$sid&amp;who=$tid\" method=\"post\">";
 echo "Add Premium : <select name=\"specialid\" value=\"$specialid[0]\">";

    echo "<option value=\"0\">Normal</option>";
if($specialid[0]=="1"){$selected=" selected=\"selected\"";}else{$selected="";}
    echo "<option value=\"1\"$selected>1 Month</option>";
if($specialid[0]=="2"){$selected=" selected=\"selected\"";}else{$selected="";}
    echo "<option value=\"3\"$selected>3 Month</option>";
if($specialid[0]=="3"){$selected=" selected=\"selected\"";}else{$selected="";}
    echo "<option value=\"6\"$selected>6 Month</option>";
if($specialid[0]=="12"){$selected=" selected=\"selected\"";}else{$selected="";}
    echo "<option value=\"12\"$selected>1 years</option>";
if($specialid[0]=="20"){$selected=" selected=\"selected\"";}else{$selected="";}
    echo "<option value=\"20\"$selected>LiFe Time</option>";
    echo "</select><br/>";
 
echo "<input type=\"submit\" value=\"Update\"/>";
echo "</form>";


	 echo "</p>";
      echo "<p align=\"center\">";
    }
	
	
	 echo "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$tid\">$unick's Profile</a><br/>";
    echo "<a href=\"admincp.php?action=chuinfo&amp;sid=$sid\">";
  echo "Users Info</a><br/>";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}

else if($action=="astaff")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("Change User info",$pstyle);

    echo "<p align=\"center\">";
    if(isset($_POST["unick"])){
	$unick = $_POST["unick"];
	$tid = getuid_nick($unick);
	}else{
	$who = isnum($_GET["who"]);
	$tid = $who;
	$unick = getnick_uid($tid);
	
	}
	
	
	
    if($tid==0)
    {
      echo "<img src=\"images/notok.gif\" alt=\"x\"/>User Does Not exist<br/>";
    }else{
      echo "</p>";
      echo "<p>";
     
 
     

$perm = mysqli_fetch_array(sm_query("SELECT perm FROM ibwf_users WHERE id='".$tid."'"));

$staff = mysqli_fetch_array(sm_query("SELECT staff FROM ibwf_users WHERE id='".$tid."'"));


 
 echo "<form action=\"admproc.php?action=upsaff&amp;sid=$sid&amp;who=$tid\" method=\"post\">";
 echo "Add Privileges:<br/><select name=\"perm\" value=\"$perm[0]\">";
    echo "<option value=\"0\">Normal</option>";
if($perm[0]=="1"){$selected=" selected=\"selected\"";}else{$selected="";}
    echo "<option value=\"1\"$selected>Moderators</option>";
if($perm[0]=="2"){$selected=" selected=\"selected\"";}else{$selected="";}
    echo "<option value=\"2\"$selected>Admin</option>";
if($perm[0]=="3"){$selected=" selected=\"selected\"";}else{$selected="";}
    echo "<option value=\"3\"$selected>Head Admin</option>";
if($perm[0]=="4"){$selected=" selected=\"selected\"";}else{$selected="";}
    echo "<option value=\"4\"$selected>Owners</option>";
echo "</select><br/>";
	
echo "Display Privileges:<br/><select name=\"staff\" value=\"$staff[0]\">";
    echo "<option value=\"0\">Normal</option>";
if($staff[0]=="1"){$selected=" selected=\"selected\"";}else{$selected="";}
    echo "<option value=\"1\"$selected>Moderators</option>";
if($staff[0]=="2"){$selected=" selected=\"selected\"";}else{$selected="";}
    echo "<option value=\"2\"$selected>Admin</option>";
if($staff[0]=="3"){$selected=" selected=\"selected\"";}else{$selected="";}
    echo "<option value=\"3\"$selected>Head Admin</option>";
if($staff[0]=="4"){$selected=" selected=\"selected\"";}else{$selected="";}
    echo "<option value=\"4\"$selected>Owners</option>";
echo "</select><br/>";
	
	
	
 
echo "<input type=\"submit\" value=\"Update\"/>";
echo "</form>";


	 echo "</p>";
      echo "<p align=\"center\">";
    }
	
	
	 echo "<a href=\"index.php?action=viewuser&amp;sid=$sid&amp;who=$tid\">$unick's Profile</a><br/>";
    echo "<a href=\"admincp.php?action=chuinfo&amp;sid=$sid\">";
  echo "Users Info</a><br/>";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";
}
/////////////////////////////////
else if($action=="chubi")
{
$pstyle = gettheme($sid);
    echo xhtmlhead("$stitle",$pstyle);

    $who = $_GET["who"];
    $unick = getnick_uid($who);

    $avat = getavatar($who);
    $email = mysqli_fetch_array(sm_query("SELECT email FROM ibwf_users WHERE id='".$who."'"));
    $site = mysqli_fetch_array(sm_query("SELECT site FROM ibwf_users WHERE id='".$who."'"));
    $bdy = mysqli_fetch_array(sm_query("SELECT birthday FROM ibwf_users WHERE id='".$who."'"));
    $uloc = mysqli_fetch_array(sm_query("SELECT location FROM ibwf_users WHERE id='".$who."'"));
    $usig = mysqli_fetch_array(sm_query("SELECT signature FROM ibwf_users WHERE id='".$who."'"));
    $sx = mysqli_fetch_array(sm_query("SELECT sex FROM ibwf_users WHERE id='".$who."'"));
    
    echo "<form action=\"admproc.php?action=uprof&amp;sid=$sid&amp;who=$who\" method=\"post\">";
    echo "Nickname: <input name=\"unick\" maxlength=\"15\" value=\"$unick\"/><br/>";

    echo "E-Mail: <input name=\"semail\" maxlength=\"100\" value=\"$email[0]\"/><br/>";
    echo "Site: <input name=\"usite\" maxlength=\"100\" value=\"$site[0]\"/><br/>";
    echo "Birthday<small>(YYYY-MM-DD)</small>: <input name=\"ubday\" maxlength=\"50\" value=\"$bdy[0]\"/><br/>";
    echo "Location: <input name=\"uloc\" maxlength=\"50\" value=\"$uloc[0]\"/><br/>";
    echo "Signature: <input name=\"usig\" maxlength=\"100\" value=\"$usig[0]\"/><br/>";
    echo "Sex: <select name=\"usex\" value=\"$sx[0]\">";
    echo "<option value=\"M\">Male</option>";
    echo "<option value=\"F\">Female</option>";
    echo "</select><br/>";
	


echo "<input type=\"submit\" value=\"Update\"/>";
echo "</form>";

    echo "</p>";
    echo "<p align=\"center\">";
    echo "<a href=\"admincp.php?action=chuinfo&amp;sid=$sid\">";
  echo "Users Info</a><br/>";
    echo "<a href=\"admincp.php?action=admincp&amp;sid=$sid\"><img src=\"images/admn.gif\" alt=\"*\"/>";
  echo "Admin CP</a><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
  echo "Home</a>";
  echo "</p>";
    echo "</body>";

}

else if($action=="botusrr")
{
	$pstyle = gettheme($sid);
    echo xhtmlhead("kickout a user",$pstyle);
	$who=$_GET["who"];
    echo "<p align=\"center\">";
 
    $whonick=getnick_uid($who);
    echo "Kicking out $whonick<br/>";
    $sq = sm_query("DELETE FROM ibwf_ses WHERE uid='".$who."'");
    if($sq)
    {

	 $unick = getname_uid($who);
          
		  
		  $msg="[user=".getuid_sid($sid)."]".getname_uid(getuid_sid($sid))."[/user] Kicked Out The user [user=".$who."]".$unick."[/user]";
		  modlog("penalties","$msg");

	Echo "User logout from $stitle Successfully<br/>";
	}
	
	
	  echo "<a href=\"index.php?action=chat&amp;sid=$sid\">Back to Chat</a><br/>";
	  
	  
	echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
	echo "Home</a>";
    echo "</p>";
 echo xhtmlfoot();

}



else{
   echo "<p align=\"center\">";
  echo "I don't know how did you get into here, but there's nothing to show<br/><br/>";
  echo "<a href=\"index.php?action=main&amp;sid=$sid\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
  echo "</p></body>";
}

?>
</html>
