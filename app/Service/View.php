<?php


namespace App\Service;

use Jenssegers\Blade\Blade;

class View {

    static private $blade = null;

    static public function r($template, $params = []): string {
        if(!self::$blade) {
            self::$blade = new Blade(__DIR__.'/../../templates', __DIR__.'/../../cache');
        }
        return self::$blade->render($template, $params);
    }

}