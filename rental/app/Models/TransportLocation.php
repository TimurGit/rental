<?php namespace App\Models;
use App\Models\Enum\TransportType;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Coordinate
 * @package App\Models
 */
class TransportLocation extends Model {
    protected $guarded=[];

    public function transport()
    {
        return $this->belongsTo('App\Models\Transport');
    }


    public function getTypeNameAttribute()
    {
        return static::$types_list[$this->getAttribute('type_id')];
    }

}
