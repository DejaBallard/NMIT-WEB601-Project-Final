<?php
// ---------------- Get Models ----------------
    require_once "Model/NavModel.php";
    require_once "Model/PlaneModel.php";
    require_once "Model/BoatModel.php";
    require_once "Model/SwanModel.php";
    require_once "Model/ProfileModel.php";
    require_once "Model/CompModel.php";

class NavController
    {
// -------- Declaring Top Level ------------
    public $_PlaneModel;
    public $_SwanModel;
    public $_BoatModel;
    public $_ProfileModel;
    
    private $_navModel;
    private $_title = "Home - Folded";
    
    
// -------- Construction --------------    
    function __construct(){
        $this->_navModel = new NavModel();
        $this->_PlaneModel = new PlaneModel($this);
        $this->_SwanModel = new SwanModel($this);
        $this->_BoatModel = new BoatModel($this);
        $this->_ProfileModel = new ProfileModel();
        $this->_CompModel = new CompModel();
        
        $lcView = $this->_navModel->_CurrentView;
        
    // ------- Navigating to correct view based on the request
        if(isset($_REQUEST["cmd"]))
            switch($_REQUEST["cmd"])
            {
                case "home":
                    $lcView = "HomeView.php";
                    break;
                case "guides":
                    $this->_title = "Guides";
                    $lcView = "GuidesView.php";
                    break;
                case "images":
                    $this->_title = "Images";
                    $lcView = "ImagesView.php";
                    break;
                case "upload":
                    $this->_title = "Upload";
                    $lcView = "UploadView.php";
                    break;
                case "login":
                    $this->_title = "Login";
                    $lcView = "LoginView.php";
                    break;
                case "signup":
                    $this->_title = "Sign Up";
                    $lcView = "SignupView.php";
                    break;
                case "profile":
                    $this->_title = "Profile";
                    $lcView = "ProfileView.php";
                    break;
                case "plane":
                    $this->_title="Plane Guide";
                    $lcView = "PlaneView.php";
                    break;
                case "swan":
                    $this->_title="Swan Guide";
                    $lcView = "SwanView.php";
                    break;
                case "boat":
                    $this->_title="Boat Guide";
                    $lcView = "BoatView.php";
                    break;
                case "comp":
                    $this->_title="Competitions";
                    $this->_CompModel->SelectQuestion();
                    $lcView = "CompView.php";
                    break;
                default:
                    $lcView = "HomeView.php";
                    break;     
            }
        $this->_navModel->SaveCurrentView($lcView);
        require_once("View//".$lcView);
    }
}
$NavController = new NavController();