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
        $this->assertEquals("image", $fileJudgement->getActualMediaType());
        $this->assertEquals("png", $fileJudgement->getActualMediaTypeSubtype());
    }

    public function testGreater()
    {
        $fileJudgement = (new FileJudge())
            ->setAssertedMaxFileSize(2479123)
            ->setAssertedMinFileSize(1000)->judge(__DIR__ . "/../assets/image.png");
        $this->assertTrue($fileJudgement->isPassed());
        $this->assertEquals(5447, $fileJudgement->getActualFileSize());
    }

    public function testException()
    {
        $this->setExpectedException('\Exception', 'File does not exist');
        (new FileJudge())->judge(__DIR__ . "/nicht-vorhanden.png");
    }

}
