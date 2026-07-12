<?php

$lang = mysqli_fetch_array(sm_query("SELECT lang FROM ibwf_users WHERE id='".$uid."'"));
if($lang[0]=="1"){
///////ENGLISH//////////////////////////////////////////////////////
///////INDEX.PHP////////////////////////////////////////////////////

///////bcon
$lang1 = "ERROR! cannot connect to database";
$lang2 = "This error happens usually when backing up the database, please be patient, The site will be up any minute";
$lang3 = "THANK YOU VERY MUCH";

///////isshield
$lang4 = "This IP address is blocked";
$lang5 = "How ever we grant a shield against IP-Ban for our great users, you can try to see if you are shielded by trying to log-in, if you kept coming to this page that means you are not shielded, so come back when the ip-ban period is over";
$lang6 = "Time to unblock the IP:";
$lang7 = "UserName:";
$lang8 = "Password:";
$lang9 = "LOGIN";

///////islogged
$lang10 = "You are not logged in";
$lang11 = "Or Your session has been expired";
$lang12 = "Login";

///////isbanned
$lang13 = "You are <b>Banned</b>";
$lang14 = "Time to finish your penalty:";
$lang15 = "Ban Reason:";

///////main
$lang16 = "you night owl!";
$lang17 = "Good morning ";
$lang18 = "Enjoy your lunch ";
$lang19 = "Good afternoon ";
$lang20 = "Good Evening ";
$lang21 = "Messages";
$lang21a = "New Message";
$lang21b = "New Messages";
$lang22 = "Friends";
$lang23 = "Chat";
$lang24 = "Forums";
$lang25 = "Groups";
$lang26 = "Fun/Games";
$lang27 = "Downloads";
$lang28 = "User Gallery";
$lang29 = "MY controls";
$lang30 = "Site Stats";
$lang31 = "Search";
$lang32 = "ShoutBox";
$lang33 = "user:";
$lang34 = "Staff:";
$lang35 = "VIP:";
$lang36 = "Mod R/L";
$lang37 = "xHTML Version";
$lang37a = "WML Version";
$lang38 = "Log Out";
$lang39 = "AdminCP";
$lang40 = "Menu";
$lang41 = "Online Stats";
$lang42 = "Shortcuts";
$lang43 = "Upload anything";
$lang44 = "Extras";
$lang45 = "Shop";
$lang46 = "Bank ";
$lang47 = "WarZone ";
$lang48 = "Head Admin cp ";
$lang49 = "Owner cp";
$lang50 = "Newest";
$lang51 = "Last 10 posts";
$lang52 = "Last Post";
$lang53 = "BY";
$lang54 = "Home";
$lang55 = "Profile";
}else
{
///////Sinhala////////////////////////////////////////////////////


///////INDEX.PHP////////////////////////////////////////////////////
///////bcon
$lang1 = "ERROR! database ekata sambanda kala nohaka";
$lang2 = "Kanagaatui mea mohothe arawap eke backup gannawa. thawa tikakin wap eka wada karai.. chuttak iwasanna.";
$lang3 = "GODAK STHUTHI!";

///////isshield
$lang4 = "Mea IP eka block karala thiyanne!";
$lang5 = "kohoma unath oyaa ape wap ekata aththatama kamathi nam api oyaawa aayeth arawap ekata saadaren piligannawa.. contact -araa-";
$lang6 = "Time to unblock the IP:";
$lang7 = "Mage Nick eka:";
$lang8 = "Mura padaya:";
$lang9 = "Log Wenna";

///////islogged
$lang10 = "Oyaa thawama log wela na";
$lang11 = "Ehema naththam Oyage login session ek expire wela";
$lang12 = "Log wenna";

///////isbanned
$lang13 = "Oyaawa <b>Ban karala!</b>";
$lang14 = "Oyaage daduwam kaalaya iwara wenna thawa:";
$lang15 = "Ban karapu hethuwa:";

///////main
$lang16 = "Doi matha nadda?";
$lang17 = "Aubowan!";
$lang18 = "Suba Udaasanak";
$lang19 = "Lunch eka gaththada? ";
$lang20 = "Suba sandawak!";
$lang21 = "ලියුම් පෙට්ටිය";
$lang21a = "අලුත් ලියුමක්";
$lang21b = "අලුත් ලියුම්";
$lang22 = "මගේ යාළුවෝ";
$lang23 = "අපේ චැට් එක";
$lang24 = "අපේ කතා";
$lang25 = "අපේ සමාජය";
$lang26 = "ක්‍රීඩා";
$lang27 = "බාගත කිරීම්";
$lang28 = "අපේ පින්තුර";
$lang29 = "මගේ  සැකසීම්";
$lang30 = "විස්තර";
$lang31 = "සොයන්න";
$lang32 = "කතා පෙට්ටිය";
$lang33 = "කට්ටිය:";
$lang34 = "කාර්ය මණ්ඩලය:";
$lang35 = "විශේෂ අය:";
$lang36 = "Mod R/L";
$lang37 = "xHTML version eka";
$lang37a = "WML Version eka";
$lang38 = "පස්සේ එන්නම්";
$lang39 = "Admin සැකසුම් ";
$lang40 = "MENU එක";
$lang41 = "Online තත්වය";
$lang42 = "කෙටි මාර්ග";
$lang43 = "ඔබට මගෙන්";
$lang44 = "අතිරේක";
$lang45 = "කඩය";
$lang46 = "බැංකුව";
$lang47 = "අංගම් පොර [Aluth!]";
$lang48 = "Head Admin සැකසුම් ";
$lang49 = "Owner සැකසුම් ";
$lang50 = "අලුත් ආපු කෙනා";
$lang51 = "අවසාන කතා(පෝස්ට්ස්) 10 ";
$lang52 = "අවසාන කථාව";
$lang53 = "කෙනා";
$lang54 = "ප්‍රධාන පිටුව";
$lang55 = "මගේ  විස්තර";
}
?>
