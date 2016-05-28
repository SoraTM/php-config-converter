<?php

namespace File\Tests;

use function File\getFileName;
use function File\getFileFormat;

class FileTest extends  \PHPUnit_Framework_TestCase
{
    public function testFile()
    {
        $file = "file.ext";

        $this->assertEquals("file", getFileName($file));
        $this->assertEquals("ext", getFileFormat($file));
    }
}
