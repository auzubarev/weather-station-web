<?php


namespace Tests;


use App\Model\Record;
use PHPUnit\Framework\TestCase;

class DummyTest extends TestCase {

    public function testAssertEquals() {
        $record = Record::create([
            'temperature' => 0,
            'pressure' => 5,
            'humidity' => 0,
            'period' => 'day',
            'end_time' => date('Y-m-d')
        ]);
        $record = Record::where('id', $record->id)->first();
        $this->assertEquals($record['pressure'], 5);
        $record->delete();
    }
}