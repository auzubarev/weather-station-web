<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Record extends Model {
    protected $table = 'records';
    protected $primaryKey = 'id';

    protected $fillable = ['temperature', 'pressure', 'humidity', 'period', 'end_time'];

}