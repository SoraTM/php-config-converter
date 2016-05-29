<?php

namespace Json;

function jsonDecode($content)
{
    $result = json_decode($content, true);
    if ($result === null) {
        throw new \Exception("Unable to parse the JSON string");
    }

    return json_decode($content, true);
}

function jsonEncode($arr)
{
    return trim(json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
}
