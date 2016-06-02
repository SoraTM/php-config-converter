<?php

namespace Converter\Codecs\Json;

function decode($content)
{
    $result = json_decode($content, true);

    if (json_last_error()) {
        throw new \Exception(json_last_error_msg());
    }

    return $result;
}

function encode($arr)
{
    return trim(json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
}

function getSupportedFormat()
{
    return 'json';
}
