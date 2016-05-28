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
    return trim($writer->writeToString($arr));
}
