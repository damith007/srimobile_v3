<?php
include("config.php");
include("core.php");
connectdb();

$id = $_GET['id'];
$action = $_GET["action"];
$sid = $_GET["sid"];

 $downloads = mysqli_fetch_array(sm_query("SELECT downloads FROM ibwf_vault WHERE id='".$id."'"));
 $incresedownload = $downloads[0] + 1;
 sm_query("UPDATE ibwf_vault SET downloads='".$incresedownload."' WHERE id='".$id."'");
 $link = mysqli_fetch_array(sm_query("SELECT itemurl FROM ibwf_vault WHERE id='".$id."'"));
 header("Location:$link[0]");

?> 