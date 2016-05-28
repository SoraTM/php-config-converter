<?php

namespace File\Tests;

use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use function File\getFileName;
use function File\getFileFormat;
use function File\fileWrite;
use function File\getFileContent;
use function File\fileConvert;

class FileTest extends \PHPUnit_Framework_TestCase
{
    private $root;
    private $fileJson;
    private $fileYaml;
    private $string;

    public function setUp()
    {
        $this->root = vfsStream::setup("dir");
        $this->fileJson = "inputFiles/example.json";
        $this->fileYaml = "inputFiles/example.yml";
        $this->text = "some text";
    }

    public function testFileNameAndExt()
    {
        $this->assertEquals("example", getFileName($this->fileJson));
        $this->assertEquals("json", getFileFormat($this->fileJson));
    }

    public function testFileWrite()
    {
        fileWrite($this->string, vfsStream::url("dir") . DIRECTORY_SEPARATOR . "filename");
        $this->assertTrue($this->root->hasChild("filename"));
    }

    public function testFileGetFileContent()
    {
        fileWrite($this->text, vfsStream::url("dir") . DIRECTORY_SEPARATOR . "filename");
        $this->assertTrue($this->root->hasChild("filename"));
        $this->assertEquals($this->text, getFileContent(vfsStream::url("dir/filename")));
    }

    public function testFileConvert()
    {
        $contentJson = getFileContent(__DIR__ . DIRECTORY_SEPARATOR . $this->fileJson);
        $contentYaml = getFileContent(__DIR__ . DIRECTORY_SEPARATOR . $this->fileYaml);
        $this->assertEquals($contentYaml, fileConvert($contentJson, 'json', 'yml'));
    }
}
