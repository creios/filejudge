<?php

namespace Creios\FileJudge;

class TestFileJudge extends \PHPUnit_Framework_TestCase
{

    public function testMediaType()
    {
        $fileJudge = (new FileJudge(__DIR__ . "/../assets/image.png"))
            ->addAssertedMediaType("image")
            ->addAssertedMediaTypeSubtype("png")
            ->addAssertedMediaTypeSubtype("jpg");
        $this->assertTrue($fileJudge->judge());
        $this->assertEquals("image", $fileJudge->getActualMediaType());
        $this->assertEquals("png", $fileJudge->getActualMediaTypeSubtype());
    }

    public function testGreater()
    {
        $fileJudge = (new FileJudge(__DIR__ . "/../assets/image.png"))
            ->setAssertedMaxFileSize(2479123)
            ->setAssertedMinFileSize(1000);
        $this->assertTrue($fileJudge->judge());
        $this->assertEquals(5447, $fileJudge->getActualFileSize());
    }

    public function testException()
    {
        $this->setExpectedException('\Exception', 'File does not exist');
        new FileJudge(__DIR__ . "/nicht-vorhanden.png");
    }

}
