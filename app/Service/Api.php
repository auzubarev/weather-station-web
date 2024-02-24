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

    static public function get($data) {
        $res = [];
        $readings = SensorsData::where('timestamp', '>', '2024-02-20')->where('timestamp', '<', '2024-02-23')->get();
        foreach ($readings as $reading) {
            $y = $reading->temperature;
            if($data['reading'] === 'pressure')
                $y = $reading->pressure;
            elseif($data['reading'] === 'humidity')
                $y = $reading->humidity;
            $res[] = [
                'x' => $reading->timestamp,
                'y' => $y
            ];
        }
        return $res;
    }

}