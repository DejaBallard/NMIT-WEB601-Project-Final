<?php
// NOTES:
// I have tried testing the database connection without establishing a new connection at every instance of a query and ran into issues, even after clearing the RS.

class NavModel
{
// -------- Declaring Top Level -------------
    public $_CurrentView = "HomeView.php";
 
        
// -------- Contruction ---------------------
     function __contruct(){
        $this->_CurrentView = $this->getCurrentView();
    }
        
// ------- Functions -----------------------   
        
    private function getCurrentView(){
        $lcResult = $this->_CurrentView ;
        
        if(isset($_SESSION["view"])){
            $lcResult = $_SESSION["view"];
        }
        return $lcResult;
    }
    
    
    public function SaveCurrentView($prViewName){
        $_SESSION["view"] = $prViewName;
        $this->_CurrentView = $prViewName;
    }
    
}
?>