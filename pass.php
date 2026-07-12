<?php 
include("gzcompress.php");
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
include("config.php");
include("core.php");
include("xhtmlfunctions.php");
connectdb();
$action = $_GET["action"];
$pstyle = gettheme1("1");
echo xhtmlhead("Forget Password or User name",$pstyle);
echo"<center><img src=\"images/Customer-Care.gif\" alt=\"*\"/></center><br/>";

	  
	 echo"<h5>Forget Password!!</h5>";

if($action==""){

echo"<center><b>PS:</b>U must be give us Ur valid Email</center><br/>";
$user=trim($_POST["user"]);
$email=trim($_POST["email"]);


if(($user!=="") and ($email!=="")){
   $uinf = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE name='".$user."'"));
  if($uinf[0]==0)
{
echo"<div class=\"error\"><img src=\"images/notok.gif\" alt=\"*\"/>Enter Username Invalid</div><br/>";

}else{
 $uinf = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE name='".$user."' AND email='".$email."'"));
    if($uinf[0]==0)
{
echo"<div class=\"error\"><img src=\"images/notok.gif\" alt=\"*\"/>Enter Invalid Email</div><br/>";

}else{
$uinf = mysqli_fetch_array(sm_query("SELECT name,pass2 FROM ibwf_users WHERE email='".$email."'"));

echo"<div class=\"ok\"><img src=\"images/ok.gif\" alt=\"*\"/>Login Informetion Was Sent <u>$email</u><br/>";
echo"Check Ur Mail <u>$user</u><br/></div>";
mail("$email","From srimobile.net","Your login details login username $user &Password $uinf[1]");  
}
}

}else{

echo"<div class=\"error\"><img src=\"images/notok.gif\" alt=\"*\"/>Enter Username and email</div><br/>";
}
div();

echo'<form id="form1" name="form1" method="post" action="">
  User name :<br/>
    <input type="text" name="user" id="textfield" /><br/>

   Email :<br/>
    <input type="text" name="email" id="textfield2" /><br/>

    <input type="submit" name="button" id="button" value="Submit" />
 
</form></div>';

//mail("$email","From Retrivewa.co.za","Your login details login $getinfo3[login] &Password $pass");  

 echo "<a href=\"pass.php?action=user\">Oh i also Forget My Username !!</a>(Email)<br/>";
 

}
else if($action=="user"){


$email=trim($_POST["email"]);
if($email!==""){
   $uinf = mysqli_fetch_array(sm_query("SELECT COUNT(*) FROM ibwf_users WHERE email='".$email."'"));
  if($uinf[0]==0)
{

echo"<div class=\"error\"><img src=\"images/notok.gif\" alt=\"*\"/>Enter Invalid Email</div><br/>";
}else{
$uinf = mysqli_fetch_array(sm_query("SELECT name,pass2 FROM ibwf_users WHERE email='".$email."'"));
echo"<div class=\"ok\"><img src=\"images/ok.gif\" alt=\"*\"/>Login Informetion Was Sent <u>$email</u><br/>";
echo"Check Ur Mail <br/></div>";
mail("$email","From srimobile.net","Your login details login username $uinf[0] &Password $uinf[1]");  
}
}





div();
echo'<form id="form1" name="form1" method="post" action="">
  

   Email :<br/>
    <input type="text" name="email" id="textfield2" /><br/>

    <input type="submit" name="button" id="button" value="Submit" />
 
</form></div>';



}
echo "<br/><br/><a href=\"register.php?\">";
echo "Get New Account !!</a><br/>";
echo "<a href=\"index.php?\"><img src=\"images/home.gif\" alt=\"*\"/>";
echo "Home</a>";
?>