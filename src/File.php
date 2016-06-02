<?php

namespace File;

function getFileContent($file)
{
    if (file_exists($file) && is_readable($file)) {
        return file_get_contents($file);
    } else {
        throw new \Exception("Unable to read file or not exist");
    }
}

function fileWrite($string, $fileName)
{
    file_put_contents($fileName, $string);
}

function getFileName($file)
{
    return pathinfo($file, PATHINFO_FILENAME);
}

function getFileFormat($file)
{
    return pathinfo($file, PATHINFO_EXTENSION);
}

function fileConvert($fileData, $formatInput, $formatOutput, $coders)
{
    return fileEncode(fileDecode($fileData, $formatInput, $coders), $formatOutput, $coders);
}

function fileDecode($fileData, $formatInput, $coders)
{
    return call_user_func($coders[$formatInput]['decode'], $fileData);
}

function fileEncode($fileDecoded, $formatOutput, $coders)
{
    return call_user_func($coders[$formatOutput]['encode'], $fileDecoded);
}
