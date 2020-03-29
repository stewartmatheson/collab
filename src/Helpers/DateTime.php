<?php

namespace Collab\Helpers;

class DateTime {

    public static function format (string $rawDbTime, string $timeZone) {
        $date = new \DateTime($rawDbTime);
        $date->setTimezone(new \DateTimeZone($timeZone));
        return $date->format('l j F Y');
    }

}
