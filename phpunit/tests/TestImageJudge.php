<?php

namespace Creios\FileJudge;

use Creios\FileJudge\Judgement\ImageJudgementBuilder;

class TestImageJudge extends \PHPUnit_Framework_TestCase
{

    public function testApplyProperties()
    {
        $imageJudgement = (new ImageJudge())->judge(__DIR__ . "/../assets/image.png");

        $assertedImageJudgement = (new ImageJudgementBuilder())
            ->setMediaType("image")
            ->setMediaTypeSubtype("png")
            ->setFileSize(5447)
            ->setHeight(100)
            ->setWidth(100)
            ->passed()
            ->build();

        $this->assertEquals($assertedImageJudgement, $imageJudgement);
        
        $this->assertTrue($imageJudgement->hasPassed());

        $this->assertFalse($imageJudgement->hasMaxFileSizeConstraintFailed());
        $this->assertFalse($imageJudgement->hasMinFileSizeConstraintFailed());
        $this->assertFalse($imageJudgement->hasMediaTypeConstraintFailed());
        $this->assertFalse($imageJudgement->hasMediaTypeSubtypeConstraintFailed());
        $this->assertFalse($imageJudgement->hasMaxWidthConstraintFailed());
        $this->assertFalse($imageJudgement->hasMinWidthConstraintFailed());
        $this->assertFalse($imageJudgement->hasMaxHeightConstraintFailed());
        $this->assertFalse($imageJudgement->hasMinHeightConstraintFailed());

        $this->assertEquals(5447, $imageJudgement->getFileSize());
        $this->assertEquals(100, $imageJudgement->getWidth());
        $this->assertEquals(100, $imageJudgement->getHeight());
        $this->assertEquals("image", $imageJudgement->getMediaType());
        $this->assertEquals("png", $imageJudgement->getMediaTypeSubtype());
    }

    public function testMaxMinWidth()
    {
        $imageJudgement = (new ImageJudge())
            ->setMaxWidthConstraint(100)
            ->setMinWidthConstraint(99)->judge(__DIR__ . "/../assets/image.png");
        $this->assertTrue($imageJudgement->hasPassed());
        $this->assertFalse($imageJudgement->hasMaxWidthConstraintFailed());
        $this->assertFalse($imageJudgement->hasMinWidthConstraintFailed());
        $this->assertEquals(100, $imageJudgement->getMaxWidthConstraint());
        $this->assertEquals(99, $imageJudgement->getMinWidthConstraint());
        $this->assertEquals(100, $imageJudgement->getWidth());
    }

    public function testMaxMinHeight()
    {
        $imageJudgement = (new ImageJudge())
            ->setMaxHeightConstraint(101)
            ->setMinHeightConstraint(99)->judge(__DIR__ . "/../assets/image.png");
        $this->assertTrue($imageJudgement->hasPassed());
        $this->assertFalse($imageJudgement->hasMaxHeightConstraintFailed());
        $this->assertFalse($imageJudgement->hasMinHeightConstraintFailed());
        $this->assertEquals(101, $imageJudgement->getMaxHeightConstraint());
        $this->assertEquals(99, $imageJudgement->getMinHeightConstraint());
        $this->assertEquals(100, $imageJudgement->getHeight());
    }

    public function testMinWidth()
    {
        $imageJudgement = (new ImageJudge())
            ->setMinWidthConstraint(101)->judge(__DIR__ . "/../assets/image.png");
        $this->assertFalse($imageJudgement->hasPassed());
        $this->assertTrue($imageJudgement->hasMinWidthConstraintFailed());
        $this->assertEquals(100, $imageJudgement->getWidth());
    }

    public function testMinHeight()
    {
        $imageJudgement = (new ImageJudge())
            ->setMinHeightConstraint(101)->judge(__DIR__ . "/../assets/image.png");
        $this->assertFalse($imageJudgement->hasPassed());
        $this->assertTrue($imageJudgement->hasMinHeightConstraintFailed());
        $this->assertEquals(100, $imageJudgement->getHeight());
    }

    public function testMaxWidth()
    {
        $imageJudgement = (new ImageJudge())
            ->setMaxWidthConstraint(99)->judge(__DIR__ . "/../assets/image.png");
        $this->assertFalse($imageJudgement->hasPassed());
        $this->assertTrue($imageJudgement->hasMaxWidthConstraintFailed());
        $this->assertEquals(100, $imageJudgement->getWidth());
    }

    public function testMaxHeight()
    {
        $imageJudgement = (new ImageJudge())
            ->setMaxHeightConstraint(99)->judge(__DIR__ . "/../assets/image.png");
        $this->assertFalse($imageJudgement->hasPassed());
        $this->assertTrue($imageJudgement->hasMaxHeightConstraintFailed());
        $this->assertEquals(100, $imageJudgement->getHeight());
    }

}
