<?php


namespace App\Service;


use App\Model\SensorsData;

class Api {

    static public function add($data) {
        $sensorData = SensorsData::create([
            'reading' => $data['value'],
            'sensor_code' => $data['sensor'],
            'measure_code' => $data['measure']
        ]);
        return $sensorData->id;
    }

}