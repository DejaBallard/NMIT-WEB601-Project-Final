<?php

class ImageController
{
// ------------- Declaring Top Level -----------
    private $_view = "ImagesView.php";
    private $_title= "Images - Folded";
    
// ------------ Contruction -------------------
    function __construct(){
        if(isset($_REQUEST["cmd"]))
            switch($_REQUEST["cmd"]){
                case "home":
                    $this->_view = "HomeView.php";
                    break;
                default:
                    this->_view = "ImagesView.php";
            }
        require_once ("View//".$this->_view);
    }
    $ImageController = new ImageController();
}