<?php namespace App\Models;
use App\Models\Enum\TransportType;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transport
 * @package App\Models
 */
class Transport extends Model {
    protected $guarded=[];


    public static $types_list = [
        TransportType::Car=>'Легковой',
        TransportType::Jeep=>'Джип',
        TransportType::Truck=>'Грузовой',
    ];

    public function getTypeNameAttribute()
    {
        return static::$types_list[$this->getAttribute('type_id')];
    }

    public function mark()
    {
        return $this->belongsTo(\App\Models\Mark::class);
    }

    public function opportunities()
    {
        return $this->hasMany(\App\Models\Opportunity::class);
    }

    public function transportLocations()
    {
        return $this->hasMany(\App\Models\TransportLocation::class);
    }
}
