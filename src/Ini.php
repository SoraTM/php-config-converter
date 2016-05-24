<?php

namespace Ini;

use Piwik\Ini\IniReader;
use Piwik\Ini\IniWriter;

function iniToArr($content)
{
    $reader = new IniReader();
    return $reader->readString($string);
}

function arrToIni($arr)
{
    $writer = new IniWriter();
    $arr = array_map(function ($item) {
        if (!is_array($item)) {
            return array($item);
        }
        return $item;
    }, $arr);

    return $writer->writeToString($arr);
}
