<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class SensorsData extends Model {
    protected $table = 'sensors_data';
    protected $primaryKey = 'id';

    protected $fillable = ['reading', 'sensor_code', 'measure_code', 'timestamp'];

}