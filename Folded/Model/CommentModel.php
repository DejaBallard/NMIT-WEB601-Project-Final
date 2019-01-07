<?php
// NOTES:
// I have tried testing the database connection without establishing a new connection at every instance of a query and ran into issues, even after clearing the RS.
// ------------- Get Database connection ---------
require_once("DB/DBConnection.php");

class CommentModel  
{
    // -------- Declaring Top Level ------------
        private $ID;
        private $Guide;
        private $Comment;
        private $_DB;
  // -------- Contruction ---------------------  
    public function __construct(){
        $this->_DB = new DBConnection('dbFolded');
        $this->Guide = $_SESSION['Guide'];
        $this->ID = $this->GetValue('AccountID');
        
        if( isset($_REQUEST['Comment'])){
            $this->Comment = $_REQUEST['Comment'];
            unset($_REQUEST['Comment']);
        }
        
        if(isset($this->ID) && $this->ID != null && isset($this->Comment) && $this->Comment != ""){
            $this->InsertComment();
        }
    }
 
//--------------- Functions -------------------  
    
    public function GetValue($prSession){
        $lcResult = null;
        if(isset($_SESSION[$prSession])){
            $lcResult = $_SESSION[$prSession];
        }
        return $lcResult;
    }
    public function GetComments(){
        $Guide = $_SESSION['Guide'];
        $SQL = "SELECT acc_name, DATE(com_timestamp), com_comment FROM tblaccount INNER JOIN tblcomment ON tblaccount.acc_id =  tblcomment.com_account_id WHERE com_guide = '$Guide' ORDER BY com_timestamp DESC;";
        $this->_DB->query($SQL);
    }
    
    public function InsertComment(){
        $SQL = "INSERT INTO tblcomment(com_account_id,com_guide,com_comment) VALUES('$this->ID','$this->Guide','$this->Comment');";
        $_DB = new DBConnection('dbFolded');
        $this->_DB->query($SQL);
    }
    
    public function NextMessage(){
        return $this->_DB->next();
    }
    
    public function FreeMessages(){
        $this->_DB->free();
    }
    
}
?>