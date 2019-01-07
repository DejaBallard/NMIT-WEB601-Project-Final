<?php
// ---------------- Get Models ----------------
require_once "Model/SwanModel.php";
require_once "Model/NavModel.php";

class SwanController
{
    // -------- Declaring Top Level ---------------
    public $_NavModel;
    public $_SwanModel;
    
    private $_title = "Swan Guide";
    
    // --------- Contruction ---------------------
    function __construct(){
        $this->_SwanModel = new SwanModel($this);
        $this->_title = "Swan Guide";
        $lcView = "SwanView.php";
        $this->_NavModel = new NavModel();
        
        if(isset($_REQUEST["cmd"]))
            switch($_REQUEST["cmd"])
            {
                case "next":
                    $this->_SwanModel->next();
                    break;
                case "prev":
                    $this->_SwanModel->prev();
                    break;
                default:
                    $lcView = "SwanView.php";
            }
        $this->_NavModel->SaveCurrentView($lcView);
        require_once("View//".$lcView);
    }
}
$SwanController = new SwanController();
?>