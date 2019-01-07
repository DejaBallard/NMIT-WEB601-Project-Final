<?php
class DBconnection{
 private $rs; // Procedural "handle" or "resource" to database
        private $connectRs;
        private $fetchResult;
        private $DBi;
        function __construct($pStrDatabase)
        {
            $this->connectDb($pStrDatabase);
            
        }
    
        private function connectDb($pStrDatabase)
        {
            $this->connectRs = mysqli_connect("localhost","root","");
            if(!$this->connectRs)
            {
                echo "Error connecting to the database server".mysqli_error($this->connectRs);
                $this->connectRs = -1;
            }
            //else
            //    echo "Connected </br>";
            $dbRs = mysqli_select_db($this->connectRs,$pStrDatabase);
            if(! $dbRs)
            {
                echo "Error selecting the database".mysql_error($this->connectRs);
                
            }
           // else
           //     echo "Selected ".$pStrDatabase."</br>";
        }
        
        
        public function query($pStrSQL)
        {
        
            $this->rs = -1;// BAD RECORDSET
        
            $this->rs = mysqli_query($this->connectRs,$pStrSQL);
            if( !$this->rs)
            {
                echo "Error running query [$pStrSQL] ".mysqli_error($this->connectRs)."<br>";
                $this->rs = -1;
            
            }
        
        
        }
        
        public function lastCount(){
            $result = mysqli_num_rows($this->rs);
            return $result;
        }

        
        public function next(){
            $aRow = mysqli_fetch_assoc($this->rs);
            return $aRow;
        }
    
        
        public function free(){
            mysqli_free_result($this->rs);
        }
    public function Escape($prString){
        $prString = mysqli_real_escape_string($this->connectRs,$prString);
        return $prString;
    }
    }// end of database class