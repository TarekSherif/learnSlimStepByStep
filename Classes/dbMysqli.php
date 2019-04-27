<?php


class dbMysqli extends DB {
    
  public function __construct($dbConfig)
    {
        $this->con = new mysqli($dbConfig['host'] , $dbConfig["username"] ,  $dbConfig["password"] , $dbConfig["database"] );
        $this->con->query("SET CHARACTER SET utf8");
    }


    public function getList($sql,$fetchType=fetchType::fetch_array)
    { 
        $result = $this->con->query($sql);
        $rows = [];
        if ($result->num_rows > 0) {
            if ($fetchType==fetchType::fetch_array) {
    while($row = $result->fetch_array()) {
               $rows[] = $row;
            }
}elseif ($fetchType==fetchType::fetch_assoc) {
   while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
}
     
           
        }

        return $rows ;
    }

    public function execute($sql)
    {
        $rows = [];
        if ($this->con->query($sql) === TRUE) {
            $rows ['Message']="successfully";
        } else {
            $rows  ['Message']= $this->con->error;
        }
        return json_encode($rows) ;
    }

    public  function  __destruct()
    {
        // TODO: Implement __destruct() method.

         $this->con->close();
    }
}