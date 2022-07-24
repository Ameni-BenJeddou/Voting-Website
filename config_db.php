<?php
class DBconnect
{
    private $datasrc ="mysql:host=localhost;dbname=projectisie";
    private $username = "Ameni";
    private $mot_de_passe = "ameni";
    private $DBconn;
    private $sqlRequest;
    public function __construct()
   { 
        try {
            $this->DBconn=new PDO($this->datasrc,$this->username,$this->mot_de_passe);
        } catch (PDOException $ex) {
            echo ($ex->getMessage());
            exit();
        }
    }
    public function getDbCon()
        {
            return $this->DBconn;
        }
    public function insert($table,$data)
    {
        try {
            if(!empty($data) && is_array($data)){
                $columnString = '';
                $valueString  = '';
                $i = 0;
                $columnString = implode(',', array_keys($data));
                $valueString = ":".implode(',:', array_keys($data));
                print_r($valueString);
                $this->sqlRequest = "INSERT INTO ".$table." (".$columnString.") VALUES (".$valueString.")";
                 //Execute the SQL request
                $stmt = $this->DBconn->prepare($this->sqlRequest);
                $insert = $stmt->execute($data);
                return $insert?$this->DBconn->lastInsertId():false;
            }else{
                return false;
            }
        } catch (PDOException $ex) {
          echo  $ex->getMessage();
        }
        
    }
}

?>