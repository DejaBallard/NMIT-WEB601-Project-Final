<?php
// NOTES:
// I have tried testing the database connection without establishing a new connection at every instance of a query and ran into issues, even after clearing the RS.

// ------------- Get Database connection ---------
require_once("DB/DBConnection.php");

class BoatModel
{
// -------- Declaring Top Level ------------
    public $_MaxStep = 4;
    
    private $_CurrentStep =1;
    private $_myController;
    private $_DB;
    private $_Guide = 'boat';
  
// -------- Contruction ---------------------

    function __construction($prController){
        $this->_DB = new DBConnection('dbFolded');
        $this->_myController = $prController;
        $this->_CurrentStep = $this->getCurrentStep();
    }
    
//--------------- Functions -------------------
    //Get current progres and load it.
    public function GetCurrentStep(){
        //put current step into a local variable
        $lcResult = $this->_CurrentStep;
        //if user is logged in, search database for saved point
        if(isset($_SESSION['AccountID'])){
            $AccountID = $_SESSION['AccountID'];
            $SQL = "SELECT * FROM tbltrack WHERE tra_account_id = '$AccountID' AND tra_guide = '$this->_Guide';";
            $_DB = new DBConnection('dbFolded');
            $_DB->query($SQL);
            //if user has save point, change local variable
            if($_DB->lastCount() > 0){
                $row = $_DB->next();
                $lcResult =  $row['tra_page_no'];
            }
        }
        //save local variable into session
        $_SESSION["boat"] = $lcResult;
        $_SESSION['Guide'] = $this->_Guide;
        return $lcResult;
    }

    //save the users progress locally on the website
    private function saveCurrentStep($prStep){
        $this->_CurrentStep = $prStep;
        //if user is loged in
        if(isset($_SESSION['AccountID'])){
            //set account id to local variable
            $AccountID = $_SESSION['AccountID'];
            //set teacher code to null
            $TeacherCode = 1;
            //if teacher code is in session, assign to local
            if(isset($_SESSION['TeacherCode']) && $_SESSION['TeacherCode'] > 1 ){
                $TeacherCode = $_SESSION['TeacherCode'];
            }
         
            $_DB = new DBConnection('dbFolded');
            //check to see if any save points are stored
            $SQL ="SELECT * FROM tbltrack WHERE tra_account_id ='$AccountID' AND tra_guide = '$this->_Guide';";
            $_DB->query($SQL);
            //if no save point, create one, else update
            if($_DB->lastcount() ==0){
                $SQL ="INSERT INTO tbltrack (tra_account_id,tra_teacher_code,tra_guide,tra_page_no) VALUES('$AccountID','$TeacherCode','$this->_Guide','$prStep');";
                $_DB->query($SQL);
            }else{
                $SQL = "UPDATE tbltrack SET tra_page_no = '$prStep' WHERE tra_account_id ='$AccountID' AND tra_guide = '$this->_Guide';";
                $_DB->query($SQL);
            }
        }
        
        $_SESSION['Guide'] = $this->_Guide;
    }
    
    //go to next page
    public function next(){
        $lcProStep = $this->GetCurrentStep();
        if(($lcProStep +1) <= $this->_MaxStep)
            $lcProStep = $lcProStep +1;
        $this->saveCurrentStep($lcProStep);
    }
    
    // go to previous page
    public function prev(){
        $lcProStep = $this->getCurrentStep();
        if(($lcProStep - 1) >= 1)
            $lcProStep = $lcProStep -1;
        $this->saveCurrentStep($lcProStep);
    }

}