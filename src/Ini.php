<?php

namespace Ini;

use Piwik\Ini\IniReader;
use Piwik\Ini\IniWriter;

function iniDecode($content)
{
    $reader = new IniReader();
    return $reader->readString($content);
}

function iniEncode($arr)
{
    $writer = new IniWriter();
    $arr = array_map(function ($item) {
        if (!is_array($item)) {
            return array($item);
        }
        return $item;
    }, $arr);

    return trim($writer->writeToString($arr));
}
