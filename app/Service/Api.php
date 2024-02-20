<?php


namespace App\Service;


use App\Model\SensorsData;

class Api {

    static public function add($data) {
        $d = date('Y-m-d H:i:00', floor(time()/600)*600);
        if(SensorsData::where('timestamp', $d)->get()->isEmpty()) {
            $sensorData = SensorsData::create([
                'temperature' => $data['temperature'],
                'humidity' => $data['humidity'],
                'pressure' => $data['pressure'],
                'timestamp' => $d
            ]);
            return $sensorData->id;
        }
        return 0;
    }

}