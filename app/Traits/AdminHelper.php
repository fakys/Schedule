<?php
namespace App\Traits;

trait AdminHelper
{
    public function SearchInModel($model, $search, $fields = [])
    {

        if(!$fields){
            $fields = $model::getMainFields();
        }
        $search = "%$search%";
        foreach ($fields as $field){
            $val = $model::where($field, 'LIKE', $search)->get();
            if(!$val->isEmpty()){
                return$val;
            }
        }

        return $val;
    }
}
