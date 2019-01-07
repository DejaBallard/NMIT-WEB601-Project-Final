<?php
session_start();
if(isset($_REQUEST["ctr"])){
    $lcControllerName = $_REQUEST["ctr"];
    require_once("Controller//".$lcControllerName.".php");
}
else
    require_once "Controller/NavController.php";

?>