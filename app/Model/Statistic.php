<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Statistic extends Model {
    protected $table = 'statistics';
    protected $primaryKey = 'id';

    protected $fillable = ['average', 'minimum', 'maximum', 'sensor_code', 'measure_code', 'period', 'start_time', 'end_time'];

}