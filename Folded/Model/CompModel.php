<?php
// NOTES:
// I have tried testing the database connection without establishing a new connection at every instance of a query and ran into issues, even after clearing the RS.
// ------------- Get Database connection ---------
require_once("DB/DBConnection.php");

class CompModel{
// -------- Declaring Top Level ------------
    //set a vaule into a session
    public function SetValue($prNewValue, $prSession){
        $_DB = new DBConnection('dbFolded');
        $_DB->Escape($prNewValue);
        $_SESSION[$prSession] = $prNewValue;
    }
    // get value from session
    public function GetValue($prSession){
        $lcResult = "null";
        if(isset($_SESSION[$prSession])){
            $lcResult = $_SESSION[$prSession];
        }
        return $lcResult;
    }
    //remove session
    public function ForgetValue($prSession){
        if(isset($_SESSION[$prSession])){
            unset($_SESSION[$prSession]);
        }
    }
    
    //insert into database
    public function InsertValue(){
        $Classroom = $_SESSION['Classroom'];
        $School = $_SESSION['School'];
        $Email = $_SESSION['StudentEmail'];
        $Contact = $_SESSION['SchoolContact'];
        $QuestionId = $_SESSION['QuestionId'];
        $Answer = $_SESSION['UserAnswer'];
        $SQL ="INSERT INTO tblComp(com_question_id, com_answer, com_classroom, com_school, com_student_email, com_school_contact) VALUES ('$QuestionId','$Answer','$Classroom', '$School', '$Email', '$Contact');";
        $_DB = new DBConnection('dbFolded');
        $_DB->query($SQL);
    }
    
    //get ID's from database
    public function SelectID(){
        $Classroom = $_SESSION['Classroom'];
        $School = $_SESSION['School'];
        $Email = $_SESSION['StudentEmail'];
        $Contact = $_SESSION['SchoolContact'];
        $Answer = $_SESSION['UserAnswer'];
        $SQL = "SELECT tblComp.com_entry_id,tblQuestion.que_question FROM (tblComp INNER JOIN tblQuestion ON tblComp.com_question_id = tblQuestion.que_id) WHERE com_classroom = '$Classroom' AND com_school = '$School' AND com_student_email = '$Email' AND com_school_contact = '$Contact'  AND com_answer = '$Answer';";
        $_DB = new DBConnection('dbFolded');
        $_DB->query($SQL);
        $row = $_DB->next();
        $entryId = $row['com_entry_id'];
        $Question = $row['que_question'];
        $_SESSION['Question'] = $Question;
        $_SESSION['EntryId'] = $entryId;
    }
    
    //Get question from database
    public function SelectQuestion(){
        $QuestionId = rand(1,3);
        $SQL = "SELECT * FROM tblquestion WHERE que_id = '$QuestionId';";
        $_DB = new DBConnection('dbFolded');
        $_DB->query($SQL);
        $row = $_DB->next();
        $Question = $row['que_question'];
        $OptionOne = $row['que_option_one'];
        $OptionTwo = $row['que_option_two'];
        $OptionThree = $row['que_option_three'];
        $Answer = $row['que_answer'];
        $_SESSION['QuestionId'] = $QuestionId;
        $_SESSION['Question'] = $Question;
        $_SESSION['OptionOne'] = $OptionOne;
        $_SESSION['OptionTwo'] = $OptionTwo;
        $_SESSION['OptionThree'] = $OptionThree;
        $_SESSION['QuestionAnswer'] = $Answer;
    }
}
/*
    $aComp = new CompModel();
    
    echo "Value is:".$aComp->SelectQuestion();
    echo $_SESSION['Question'];// test to see if there is a value
    
    # echo $aSomething->forget(); // include this to test the forget method
    */
?>
