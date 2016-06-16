<?php

namespace Creios\FileJudge;

class TestFileJudge extends \PHPUnit_Framework_TestCase
{

    public function testMediaType()
    {
        $fileJudgement = (new FileJudge())
            ->addAssertedMediaType("image")
            ->addAssertedMediaTypeSubtype("png")
            ->addAssertedMediaTypeSubtype("jpg")->judge(__DIR__ . "/../assets/image.png");

        $this->assertTrue($fileJudgement->isPassed());
        $this->assertFalse($fileJudgement->isMediaTypeFailed());
        $this->assertFalse($fileJudgement->isMediaTypeSubtypeFailed());
        $this->assertEquals(["image"], $fileJudgement->getAssertedMediaTypes());
        $this->assertEquals(["png", "jpg"], $fileJudgement->getAssertedMediaTypeSubtypes());
        $this->assertEquals("image", $fileJudgement->getActualMediaType());
        $this->assertEquals("png", $fileJudgement->getActualMediaTypeSubtype());
    }

    public function testMediaTypeFailed()
    {
        $fileJudgement = (new FileJudge())
            ->addAssertedMediaType("text")
            ->addAssertedMediaTypeSubtype("html")
            ->addAssertedMediaTypeSubtype("xml")->judge(__DIR__ . "/../assets/image.png");

        $this->assertFalse($fileJudgement->isPassed());
        $this->assertTrue($fileJudgement->isMediaTypeFailed());
        $this->assertTrue($fileJudgement->isMediaTypeSubtypeFailed());
        $this->assertEquals(["text"], $fileJudgement->getAssertedMediaTypes());
        $this->assertEquals(["html", "xml"], $fileJudgement->getAssertedMediaTypeSubtypes());
        $this->assertEquals("image", $fileJudgement->getActualMediaType());
        $this->assertEquals("png", $fileJudgement->getActualMediaTypeSubtype());
    }

    public function testFileSize()
    {
        $fileJudgement = (new FileJudge())
            ->setAssertedMaxFileSize(2479123)
            ->setAssertedMinFileSize(1000)->judge(__DIR__ . "/../assets/image.png");
        $this->assertTrue($fileJudgement->isPassed());
        $this->assertFalse($fileJudgement->isMaxFileSizeFailed());
        $this->assertFalse($fileJudgement->isMinFileSizeFailed());
        $this->assertEquals(2479123, $fileJudgement->getAssertedMaxFileSize());
        $this->assertEquals(1000, $fileJudgement->getAssertedMinFileSize());
        $this->assertEquals(5447, $fileJudgement->getActualFileSize());
        $this->assertEquals(5447, $fileJudgement->getActualFileSize());
    }

    public function testFileSizeFailed()
    {
        $fileJudgement = (new FileJudge())
            ->setAssertedMaxFileSize(5000)
            ->setAssertedMinFileSize(6000)->judge(__DIR__ . "/../assets/image.png");
        $this->assertFalse($fileJudgement->isPassed());
        $this->assertTrue($fileJudgement->isMaxFileSizeFailed());
        $this->assertTrue($fileJudgement->isMinFileSizeFailed());
        $this->assertEquals(5000, $fileJudgement->getAssertedMaxFileSize());
        $this->assertEquals(6000, $fileJudgement->getAssertedMinFileSize());
        $this->assertEquals(5447, $fileJudgement->getActualFileSize());
        $this->assertEquals(5447, $fileJudgement->getActualFileSize());
    }

    public function testException()
    {
        $this->setExpectedException('\Exception', 'File does not exist');
        (new FileJudge())->judge(__DIR__ . "/nicht-vorhanden.png");
    }

}
