<?PHP
session_start();
if(isset($_GET[i])) $_SESSION[img]=$_GET[i];
header("location:/");
?>