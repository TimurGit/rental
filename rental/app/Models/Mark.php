<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Mark
 * @package App\Models
 */
class Mark extends Model {
    protected $guarded=[];


    public function transport()
    {
        return $this->hasMany('App\Models\Transport');
    }
}