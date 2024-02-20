<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class SensorsData extends Model {
    protected $table = 'sensors_data';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['temperature', 'humidity', 'pressure', 'timestamp'];

}