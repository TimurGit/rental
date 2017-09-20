<?php
namespace App\Models\Enum;
/**
 * Class TransportType
 * @package App\Models\Enum
 */
abstract class TransportType extends Enum {
    const __default = 1;
    // Our enum values
    const Car = 1;
    const Jeep = 2;
    const Truck = 3;
}