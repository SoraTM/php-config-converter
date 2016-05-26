<?php

namespace Json;

function jsonDecode($content)
{
    return json_decode($content, true);
}

function jsonEncode($arr)
{
    return json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";
}
