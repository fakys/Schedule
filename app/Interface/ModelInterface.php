<?php
namespace App\Interface;

interface ModelInterface
{
    public static function getMainFields():array;
    public static function nameTable():string;
    public static function ru_nameTable():string;
    public static function rules():array;
}
