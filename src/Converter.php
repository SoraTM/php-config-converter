<?php

namespace Converter;

use function File\getFileContent;
use function File\getFileName;
use function File\getFileFormat;
use function File\fileConvert;
use function File\fileWrite;

function startConvert($fileInput, $fileOutput)
{
    $fileData = getFileContent($fileInput);
    $formatInput = getFileFormat($fileInput);
    $fileNameInput = getFileName($fileInput);
    $formatOutput = getFileFormat($fileOutput);
    $fileNameOutput = getFileName($fileOutput);
    $convertedData = fileConvert($fileData, $formatInput, $formatOutput);

    fileWrite($convertedData, $fileOutput);
}
