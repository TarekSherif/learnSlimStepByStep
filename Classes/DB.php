<?php


 final class fetchType
{
    const fetch_array = 0;
    const fetch_assoc = 1;
}


 abstract class DB 
{
   
   public $con;

   abstract public function getList($sql,$fetchType=fetchType::fetch_array);
   abstract public function execute($sql);
}
