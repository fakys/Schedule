<?php
namespace App\Traits;

trait ObjectModel
{
    private $data_technical_fields=[];
    public static function object($data =[])
    {
        $class = get_class();
        $model = new $class($data);
        $model->set_technical_fields($data);
        return $model;
    }
    public function set_technical_fields($data)
    {
        if(self::$technical_fields){
            foreach ($data as $key=>$val){
                if(in_array($key, self::$technical_fields)){
                    unset($this->$key);
                    $this->data_technical_fields[$key]=$val;
                }
            }
        }
    }
    public function get_technical_fields($field)
    {
        if(isset($this->data_technical_fields[$field])){
            return $this->data_technical_fields[$field];
        }
        return [];
    }
}
