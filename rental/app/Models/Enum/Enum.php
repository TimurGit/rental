<?php
namespace App\Models\Enum;

/**
 * Class Enum
 * @package App\Models\Enum
 */
abstract class Enum {
    static function getKeys(){
        $class = new \ReflectionClass(get_called_class());
        return array_keys($class->getConstants());
    }
}