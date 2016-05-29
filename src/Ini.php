<?php

namespace Ini;

use Piwik\Ini\IniReader;
use Piwik\Ini\IniWriter;
use Piwik\Ini\IniReadingException;

function iniDecode($content)
{
    $reader = new IniReader();
    try {
        $result =  $reader->readString($content);
    } catch (IniReadingException $e) {
        throw new \Exception("Unable to parse the INI string");
    }

    return $reader->readString($content);
}

function iniEncode($arr)
{
    $writer = new IniWriter();
    return trim($writer->writeToString($arr));
}
