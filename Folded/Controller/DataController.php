<?php
// ---------------- Get Models ----------------
require_once "Model/CompModel.php";
require_once "Model/NavModel.php";
require_once "Model/ProfileModel.php";

class DataController{
// -------- Declaring Top Level ---------------
    public $_NavModel;
// --------- Contruction ---------------------
    function __construct(){
        if( isset($_REQUEST['Send'])){
            switch($_REQUEST['Send']){
    
                case 'Comp':
                    $_compModel = new CompModel();
                    // Save Data to Sessions
                    $_compModel->SetValue($_REQUEST['Classroom'],'Classroom');
                    $_compModel->SetValue($_REQUEST['School'],'School');
                    $_compModel->SetValue($_REQUEST['StudentEmail'],'StudentEmail');
                    $_compModel->SetValue($_REQUEST['SchoolContact'],'SchoolContact');
                    $_compModel->SetValue($_REQUEST['Answer'],'UserAnswer');
                    // Insert into database
                    $_compModel->InsertValue();
                    $this->_NavModel = new NavModel();
                    $this->_title = "Competitions";
                    $this->_NavModel->SaveCurrentView("CompEnteredView.php");
                    require_once ("View/CompEnteredView.php");
                    break;
                    
                case 'SignUp':
                    $_signupModel = new ProfileModel();
                    //Save data to Sessions
                    $_signupModel->SetValue($_REQUEST['Email'],'Email');
                    $_signupModel->SetValue($_REQUEST['Password'],'Password');
                    $_signupModel->SetValue($_REQUEST['AccountType'],'AccountType');
                    $_signupModel->SetValue($_REQUEST['TeacherCode'],'TeacherCode');
                    $_signupModel->SetValue($_REQUEST['DisplayName'],'DisplayName');
                    // Check to see if Account already exists, if not true, log user in and insert into database
                    if($_signupModel->AccountExists($_REQUEST['Email'])==0){
                        $_signupModel->InsertSignUp();
                        $_signupModel->SetValue('True','LoggedIn');
                        $_signupModel->CheckLogin($_REQUEST['Email'],$_REQUEST['Password']);
                        $this->_NavModel = new NavModel();
                        $this->_NavModel->SaveCurrentView("HomeView.php");
                        require_once ("View/HomeView.php");
                    }else{
                         $this->_NavModel = new NavModel();
                        $this->_title = "Sign Up";
                        $this->_NavModel->SaveCurrentView("SignupView.php");
                        require_once ("View/SignupView.php");
                    }
                    break;
                    
                case 'LogOut':
                    $_logoutModel = new ProfileModel();
                    //log user out
                    $_logoutModel->ForgetValue('LoggedIn');
                    $_logoutModel->ForgetValue('AccountID');
                    $this->_NavModel = new NavModel();
                    $this->_NavModel->SaveCurrentView("HomeView.php");
                    require_once ("View/HomeView.php");
                    break;
                    
                case 'LogIn':
                    $_loginModel = new ProfileModel();
                    //check to see if login details are correct, if true, log user in.
                        if($_loginModel->CheckLogin($_REQUEST['Email'],$_REQUEST['Password']) == 1){
                        $_loginModel->SetValue('True','LoggedIn');
                        $this->_NavModel = new NavModel();
                        $this->_title = "Home";
                        $this->_NavModel->SaveCurrentView("HomeView.php");
                        require_once ("View/HomeView.php");
                    }
                    else{
                        $this->_title ="Login";
                        $this->_NavModel = new NavModel();
                        $this->_NavModel->SaveCurrentView("LoginView.php");
                        require_once ("View/LoginView.php"); 
                    }
                    break;
                    
                case'SubmitComment':
                    $this->_NavModel = new NavModel();
                    $this->_NavModel->SaveCurrentView("View/CommentView.php");
                    require_once ("View/CommentView.php");
                    break; 
                    
                default:
                    $this->_NavModel = new NavModel();
                    $this->_NavModel->SaveCurrentView("HomeView.php");
                    require_once ("View/HomeView.php");
                    break;
            }
        }else{
                $this->_NavModel = new NavModel();
                $this->_title = "Home";
                $this->_NavModel->SaveCurrentView("HomeView.php");
                require_once ("View/HomeView.php");
        }
    }
}
$DataController = new DataController(); 
?>