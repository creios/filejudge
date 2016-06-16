<?php

namespace Creios\FileJudge;

class TestFileJudge extends \PHPUnit_Framework_TestCase
{

    public function testMediaType()
    {
        $fileJudgement = (new FileJudge())
            ->addMediaTypeConstraint("image")
            ->addMediaTypeSubtypeConstraint("png")
            ->addMediaTypeSubtypeConstraint("jpg")->judge(__DIR__ . "/../assets/image.png");

        $this->assertTrue($fileJudgement->hasPassed());
        $this->assertFalse($fileJudgement->hasMediaTypeConstraintFailed());
        $this->assertFalse($fileJudgement->hasMediaTypeSubtypeConstraintFailed());
        $this->assertEquals(["image"], $fileJudgement->getMediaTypesConstraint());
        $this->assertEquals(["png", "jpg"], $fileJudgement->getMediaTypeSubtypesConstraint());
        $this->assertEquals("image", $fileJudgement->getMediaType());
        $this->assertEquals("png", $fileJudgement->getMediaTypeSubtype());
    }

    public function testMediaTypeFailed()
    {
        $fileJudgement = (new FileJudge())
            ->addMediaTypeConstraint("text")
            ->addMediaTypeSubtypeConstraint("html")
            ->addMediaTypeSubtypeConstraint("xml")->judge(__DIR__ . "/../assets/image.png");

        $this->assertFalse($fileJudgement->hasPassed());
        $this->assertTrue($fileJudgement->hasMediaTypeConstraintFailed());
        $this->assertTrue($fileJudgement->hasMediaTypeSubtypeConstraintFailed());
        $this->assertEquals(["text"], $fileJudgement->getMediaTypesConstraint());
        $this->assertEquals(["html", "xml"], $fileJudgement->getMediaTypeSubtypesConstraint());
        $this->assertEquals("image", $fileJudgement->getMediaType());
        $this->assertEquals("png", $fileJudgement->getMediaTypeSubtype());
    }

    public function testFileSize()
    {
        $fileJudgement = (new FileJudge())
            ->setMaxFileSizeConstraint(2479123)
            ->setMinFileSizeConstraint(1000)->judge(__DIR__ . "/../assets/image.png");
        $this->assertTrue($fileJudgement->hasPassed());
        $this->assertFalse($fileJudgement->hasMaxFileSizeConstraintFailed());
        $this->assertFalse($fileJudgement->hasMinFileSizeConstraintFailed());
        $this->assertEquals(2479123, $fileJudgement->getMaxFileSizeConstraint());
        $this->assertEquals(1000, $fileJudgement->getMinFileSizeConstraint());
        $this->assertEquals(5447, $fileJudgement->getFileSize());
        $this->assertEquals(5447, $fileJudgement->getFileSize());
    }

    public function testFileSizeFailed()
    {
        $fileJudgement = (new FileJudge())
            ->setMaxFileSizeConstraint(5000)
            ->setMinFileSizeConstraint(6000)->judge(__DIR__ . "/../assets/image.png");
        $this->assertFalse($fileJudgement->hasPassed());
        $this->assertTrue($fileJudgement->hasMaxFileSizeConstraintFailed());
        $this->assertTrue($fileJudgement->hasMinFileSizeConstraintFailed());
        $this->assertEquals(5000, $fileJudgement->getMaxFileSizeConstraint());
        $this->assertEquals(6000, $fileJudgement->getMinFileSizeConstraint());
        $this->assertEquals(5447, $fileJudgement->getFileSize());
        $this->assertEquals(5447, $fileJudgement->getFileSize());
    }

    public function testException()
    {
        $this->setExpectedException('\Exception', 'File does not exist');
        (new FileJudge())->judge(__DIR__ . "/nicht-vorhanden.png");
    }

}
