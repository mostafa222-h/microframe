<?php
namespace App\Models\Contracts ;


abstract class BaseModel implements CrudInterface
{
   protected $connection;
   protected $table;
   protected $primaryKey = 'id';
   protected $pageSize = 10;
   protected $attributes = [] ;

 
   public function getAttribute($key)
   {
        if(!$key || !array_key_exists($key,$this->attributes))
        {
            return null ;
        }
        return $this->attributes[$key];
   }

   public function getAttributes()
   {
       
        return $this->attributes;
   }

   public function __get($key)
   {
     return $this->getAttribute($key);
   
   }
   public function __set($name,$value)
   {
    if(!array_key_exists($name,$this->attributes))
    {
        return null ;
    }
    $this->attributes[$name] = $value;
   
   }
}