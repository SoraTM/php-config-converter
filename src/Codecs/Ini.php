<?php

namespace Converter\Codecs\Ini;

use Piwik\Ini\IniReader;
use Piwik\Ini\IniWriter;
use Piwik\Ini\IniReadingException;

function decode($content)
{
    $reader = new IniReader();
    return $reader->readString($content);
}

function encode($arr)
{
    $writer = new IniWriter();
    return trim($writer->writeToString($arr));
}

function getSupportedFormat()
{
    return 'ini';
}
