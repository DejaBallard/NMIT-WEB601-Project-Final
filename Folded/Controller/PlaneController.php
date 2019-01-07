<?php
// ---------------- Get Models ----------------
require_once "Model/PlaneModel.php";
require_once "Model/NavModel.php";

class PlaneController
{
    // -------- Declaring Top Level ---------------
    public $_NavModel;
    public $_PlaneModel;
    
    private $_title = "Plane Guide";

    // --------- Contruction ---------------------
    function __construct(){
        $this->_PlaneModel = new PlaneModel($this);
        $this->_title = "Plane Guide";
        $lcView = "PlaneView.php";
        $this->_NavModel = new NavModel();
        
        if(isset($_REQUEST["cmd"]))
            switch($_REQUEST["cmd"])
            {
                case "next":
                    $this->_PlaneModel->next();
                    break;
                case "prev":
                    $this->_PlaneModel->prev();
                    break;
                default:
                    $lcView = "PlaneView.php";
            }
        $this->_NavModel->SaveCurrentView($lcView);
        require_once("View//".$lcView);
    }
}
$PlaneController = new PlaneController();
?>