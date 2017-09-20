<?php namespace App\Models;
use App\Models\Enum\TransportType;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Opportunity
 * @package App\Models
 */
class Opportunity extends Model {
    protected $guarded=[];



    public function transport()
    {
        return $this->belongsTo(\App\Models\Transport::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
