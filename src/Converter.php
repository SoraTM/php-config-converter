<?php

namespace Converter;

use function File\getFileContent;
use function File\getFileName;
use function File\getFileFormat;
use function File\fileConvert;
use function File\fileWrite;

function startConvert($file, $formatOutput)
{
    $fileData = getFileContent($file);
    $formatInput = getFileFormat($file);
    $fileNameInput = getFileName($file);
    $formatOutput = strtolower($formatOutput);
    $convertedData = fileConvert($fileData, $formatInput, $formatOutput);
    fileWrite($convertedData, $fileNameInput, $formatOutput);
}
