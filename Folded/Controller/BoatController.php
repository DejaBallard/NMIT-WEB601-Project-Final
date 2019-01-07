<?php
// ---------------- Get Models ----------------
require_once "Model/BoatModel.php";
require_once "Model/NavModel.php";

class BoatController
{
// -------- Declaring Top Level ---------------
    public $_NavModel;
    public $_BoatModel;
      
    private $_title = "Boat Guide";

// --------- Contruction ---------------------
    function __construct(){
        $this->_BoatModel = new BoatModel($this);
        $this->_title = "Boat Guide";
        $lcView = "BoatView.php";
        $this->_NavModel = new NavModel();
         
        if(isset($_REQUEST["cmd"]))
            switch($_REQUEST["cmd"])
            {
                case "next":
                    $this->_BoatModel->next();
                    break;
                case "prev":
                    $this->_BoatModel->prev();
                    break;
                default:
                    $lcView = "BoatView.php";
            }
        $this->_NavModel->SaveCurrentView($lcView);
        require_once("View//".$lcView);
    }
}
$BoatController = new BoatController();
?>