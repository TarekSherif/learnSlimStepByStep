<?php

class dbPdo extends DB 
{

    
    public function __construct($dbConfig)
    {
        $this->con = new PDO("mysql:host={$dbConfig['host']};dbname={$dbConfig["database"]}",
                                $dbConfig["username"] ,  $dbConfig["password"],
                                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
                                
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
   }


    public function getList($sql,$fetchType=fetchType::fetch_array)
    {

        $result = $this->con->prepare($sql);
         $result->execute();
        $rows = [];
if ($fetchType==fetchType::fetch_array) {
    while($row =  $result->fetch(PDO::FETCH_BOTH)) {
                 $rows[] = $row;
             }

}elseif ($fetchType==fetchType::fetch_assoc) {
   foreach($result as $row){
               $rows[] = $row;
           }
}
            
     
        

         return $rows ;
    }



    public function execute($sql)
    {
        $rows = [];
        try {

            $this->con->exec($sql);
            $rows ['Message']="successfully";
        }
        catch(PDOException $e)
        {
            $rows ['Message']= $e->getMessage();
        }


        return json_encode($rows) ;
    }

    public  function  __destruct()
    {
        // TODO: Implement __destruct() method.
         $this->con=null;
         
    }
}
