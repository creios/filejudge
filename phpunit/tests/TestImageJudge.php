<?php

namespace Creios\FileJudge;

class TestImageJudge extends \PHPUnit_Framework_TestCase
{

    public function testMaxMinWidth()
    {
        $imageJudgement = (new ImageJudge(__DIR__ . "/../assets/image.png"))
            ->setAssertedMaxWidth(100)
            ->setAssertedMinWidth(99)->judge();
        $this->assertTrue($imageJudgement->isPassed());
        $this->assertEquals(100, $imageJudgement->getActualWidth());
    }

    public function testMaxMinHeight()
    {
        $imageJudgement = (new ImageJudge(__DIR__ . "/../assets/image.png"))
            ->setAssertedMaxHeight(101)
            ->setAssertedMinHeight(99)->judge();
        $this->assertTrue($imageJudgement->isPassed());
        $this->assertEquals(100, $imageJudgement->getActualHeight());
    }

    public function testMinWidth()
    {
        $imageJudgement = (new ImageJudge(__DIR__ . "/../assets/image.png"))
            ->setAssertedMinWidth(101)->judge();
        $this->assertFalse($imageJudgement->isPassed());
        $this->assertEquals(100, $imageJudgement->getActualWidth());
    }

    public function testMinHeight()
    {
        $imageJudgement = (new ImageJudge(__DIR__ . "/../assets/image.png"))
            ->setAssertedMinHeight(101)->judge();
        $this->assertFalse($imageJudgement->isPassed());
        $this->assertEquals(100, $imageJudgement->getActualHeight());
    }

    public function testMaxWidth()
    {
        $imageJudgement = (new ImageJudge(__DIR__ . "/../assets/image.png"))
            ->setAssertedMaxWidth(99)->judge();
        $this->assertFalse($imageJudgement->isPassed());
        $this->assertEquals(100, $imageJudgement->getActualWidth());
    }

    public function testMaxHeight()
    {
        $imageJudgement = (new ImageJudge(__DIR__ . "/../assets/image.png"))
            ->setAssertedMaxHeight(99)->judge();
        $this->assertFalse($imageJudgement->isPassed());
        $this->assertEquals(100, $imageJudgement->getActualHeight());
    }

}
