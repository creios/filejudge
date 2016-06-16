<?php

namespace Creios\FileJudge;

class TestImageJudge extends \PHPUnit_Framework_TestCase
{

    public function testMaxMinWidth()
    {
        $imageJudgement = (new ImageJudge())
            ->setAssertedMaxWidth(100)
            ->setAssertedMinWidth(99)->judge(__DIR__ . "/../assets/image.png");
        $this->assertTrue($imageJudgement->isPassed());
        $this->assertFalse($imageJudgement->isMaxWidthFailed());
        $this->assertFalse($imageJudgement->isMinWidthFailed());
        $this->assertEquals(100, $imageJudgement->getAssertedMaxWidth());
        $this->assertEquals(99, $imageJudgement->getAssertedMinWidth());
        $this->assertEquals(100, $imageJudgement->getActualWidth());
    }

    public function testMaxMinHeight()
    {
        $imageJudgement = (new ImageJudge())
            ->setAssertedMaxHeight(101)
            ->setAssertedMinHeight(99)->judge(__DIR__ . "/../assets/image.png");
        $this->assertTrue($imageJudgement->isPassed());
        $this->assertFalse($imageJudgement->isMaxHeightFailed());
        $this->assertFalse($imageJudgement->isMinHeightFailed());
        $this->assertEquals(101, $imageJudgement->getAssertedMaxHeight());
        $this->assertEquals(99, $imageJudgement->getAssertedMinHeight());
        $this->assertEquals(100, $imageJudgement->getActualHeight());
    }

    public function testMinWidth()
    {
        $imageJudgement = (new ImageJudge())
            ->setAssertedMinWidth(101)->judge(__DIR__ . "/../assets/image.png");
        $this->assertFalse($imageJudgement->isPassed());
        $this->assertTrue($imageJudgement->isMinWidthFailed());
        $this->assertEquals(100, $imageJudgement->getActualWidth());
    }

    public function testMinHeight()
    {
        $imageJudgement = (new ImageJudge())
            ->setAssertedMinHeight(101)->judge(__DIR__ . "/../assets/image.png");
        $this->assertFalse($imageJudgement->isPassed());
        $this->assertTrue($imageJudgement->isMinHeightFailed());
        $this->assertEquals(100, $imageJudgement->getActualHeight());
    }

    public function testMaxWidth()
    {
        $imageJudgement = (new ImageJudge())
            ->setAssertedMaxWidth(99)->judge(__DIR__ . "/../assets/image.png");
        $this->assertFalse($imageJudgement->isPassed());
        $this->assertTrue($imageJudgement->isMaxWidthFailed());
        $this->assertEquals(100, $imageJudgement->getActualWidth());
    }

    public function testMaxHeight()
    {
        $imageJudgement = (new ImageJudge())
            ->setAssertedMaxHeight(99)->judge(__DIR__ . "/../assets/image.png");
        $this->assertFalse($imageJudgement->isPassed());
        $this->assertTrue($imageJudgement->isMaxHeightFailed());
        $this->assertEquals(100, $imageJudgement->getActualHeight());
    }

}
