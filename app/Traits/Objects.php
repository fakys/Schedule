<?php
namespace App\Traits;

trait Objects
{
    public static function object($data = [])
    {
        $class = get_class();
        if($data){
            return new $class($data);
        }
        return new $class();
    }
}
