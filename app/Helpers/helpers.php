<?php

use Illuminate\Support\Facades\Validator;

if(!function_exists('validate')){
    function validate($data, $rules)
    {
        foreach ($data as $key=>$i){
            if(!$i){
                unset($data[$key]);
            }
        }
        return validator($data, $rules)->validate();
    }
}
