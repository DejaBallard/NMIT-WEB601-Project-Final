<?php
// ---------------- Get Models ----------------
require_once "Model/NavModel.php";
require_once "Model/ProfileModel.php";

class ProfileController{
// -------- Declaring Top Level ---------------
    public $_NavModel;
    public $_ProfileModel;
    private $_title = "Profile";
// --------- Contruction ---------------------
    function __construct(){
        $this->_NavModel = new NavModel();
        $this->_ProfileModel = new ProfileModel();
        $lcView = "ProfileView.php";
        if( isset($_REQUEST['Send'])){
            switch($_REQUEST['Send']){
                case "Profile":
                    $this->_title = "Profile Settings";
                    $this->_ProfileModel->SetProfilePage("Profile");
                    break;
                    
                case "Guide":
                    $this->_title = "Saved Guides";
                    $this->_ProfileModel->SetProfilePage("Guide");
                    break;
                    
                case "Upload":
                    $this->_title = "Manage Uploads";
                    $this->_ProfileModel->SetProfilePage("Upload");
                    break;
                    
                case "Teacher":
                    $this->_title = "Teacher Settings";
                    $this->_ProfileModel->SetProfilePage("Teacher");
                    break;
            }
        $this->_NavModel->SaveCurrentView($lcView);
        require_once("View//".$lcView);
        }
    }
}
$ProfileController = new ProfileController();
?>