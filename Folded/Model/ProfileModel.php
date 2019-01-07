<?php
// NOTES:
// I have tried testing the database connection without establishing a new connection at every instance of a query and ran into issues, even after clearing the RS.
// ---- Get Database connection
require_once("DB/DBConnection.php");

class ProfileModel{
// -------- Declaring Top Level ------------
    private $_CurrentPage = "Profile";
    private $_DB;
//--------------- Functions -------------------
     public function __construct(){
        $this->_DB = new DBConnection('dbFolded');
     }
    //Set value into a session
    public function SetValue($prNewValue, $prSession){
        $_DB = new DBConnection('dbFolded');
        $_DB->Escape($prNewValue);
        $_SESSION[$prSession] = $prNewValue;
    }
    //Get value from a sesion
    public function GetValue($prSession){
        $lcResult = "null";
        if(isset($_SESSION[$prSession])){
            $lcResult = $_SESSION[$prSession];
        }
        return $lcResult;
    }
    //remove a session
    public function ForgetValue($prSession){
        if(isset($_SESSION[$prSession])){
            unset($_SESSION[$prSession]);
        }
    }
    
    //insert user details into datbase
    public function InsertSignUp(){
        $Email = $_SESSION['Email'];
        $Password = $_SESSION['Password'];
        $Type = $_SESSION['AccountType'];
        $Code = 1;
        if(isset($_SESSION['TeacherCode']) && ($_SESSION['TeacherCode'] > 1)){
            $Code = $_SESSION['TeacherCode'];
        }
        $Name = $_SESSION['DisplayName'];
        $SQL ="INSERT INTO tblAccount(acc_email, acc_password, acc_type, acc_code, acc_name) VALUES ('$Email', '$Password', '$Type', '$Code','$Name')";
        $_DB = new DBCOnnection('dbFolded');
        $_DB->query($SQL);
    }
    //check to see if login was successful
    public function CheckLogin($prEmail, $prPass){
            $result = 0;
            $SQL = "SELECT * FROM tblAccount WHERE acc_email='$prEmail' and acc_password='$prPass';";
             $_DB = new DBConnection("dbFolded");
            $_DB->query($SQL);
            //echo "RAN QUERY ".$SQL;
            if($_DB->lastCount() > 0){
                $result = 1;
                $_SESSION['Email'] = $prEmail;
                $row = $_DB->next();
                $_SESSION['AccountID'] = $row['acc_id'];
                $_SESSION['AccountType'] =$row['acc_type'];
                $_SESSION['TeacherCode'] =$row['acc_code'];
            }
            else{
                $_SESSION['LoginError'] = "Incorrect login details";
            }
            echo $result;
            return $result;
        }
    //check to see if account allready exists
    public function AccountExists($prEmail){
        $result =1;
        $SQL = "SELECT * FROM tblAccount WHERE acc_email='$prEmail';";
         $_DB = new DBConnection("dbFolded");
            $_DB->query($SQL);
            //echo "RAN QUERY ".$SQL;
            if($_DB->lastCount() == 0){
                $result = 0;
                $_SESSION['Email'] = $prEmail;
            }else{
                $_SESSION['EmailError'] = "Sorry, this email is already taken"; 
            }
            echo $result;
            return $result;
    }
    
    //save the page that the user is currently on, to one of the presets under profile details view
    public function SetProfilePage($prPage){
        $_SESSION["Page"] = $prPage;
    $this->_CurrentPage = $prPage;    
    }
    //get current page for the profile
    public function GetCurrentPage(){
        $lcResult = $this->_CurrentPage;
        if(isset($_SESSION["Page"])){
            $lcResult = ($_SESSION["Page"]);
        }
    return $lcResult;
    }

    public function GetSavedGuides(){
        $AccountID = $_SESSION['AccountID'];
        $SQL = "SELECT tra_guide,tra_page_no FROM tblTrack WHERE tra_account_id = '$AccountID';";
        $_DB = new DBCOnnection('dbFolded');
        $this->_DB->query($SQL);
    }
    
    public function NextGuide(){
        return $this->_DB->next();
    }
    
    public function FreeGuide(){
        $this->_DB->free();
    }
    
    public function GetStudentGuides(){
        $AccountID = $_SESSION['AccountID'];
        $SQL = "SELECT acc_name,tra_guide,tra_page_no FROM tbltrack INNER JOIN tblaccount ON tbltrack.tra_account_id = tblaccount.acc_id WHERE tra_teacher_code = '$AccountID';";
        $_DB = new DBCOnnection('dbFolded');
        $this->_DB->query($SQL);
    }
/*
    $aModel = new ProfileModel();
    
    echo "Value is:".$aModel->CheckLogin("deja99@windowslive.com","123"); // test to see if there is a value
    # echo $aSomething->forget(); // include this to test the forget method
*/
}
?>