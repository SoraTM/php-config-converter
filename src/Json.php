<?php

namespace Json;

function jsonToArr($content)
{
    return json_decode($content, true);
}

function arrToJson($arr)
{
    return json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}
