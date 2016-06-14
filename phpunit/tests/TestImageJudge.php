<?php

namespace Creios\FileJudge;

class TestImageJudge extends \PHPUnit_Framework_TestCase
{

    public function testMaxMinWidth()
    {
        $fileJudge = (new ImageJudge(__DIR__ . "/../assets/image.png"))
            ->setAssertedMaxWidth(100)
            ->setAssertedMinWidth(99);
        $this->assertTrue($fileJudge->judge());
        $this->assertEquals(100, $fileJudge->getActualWidth());
    }

    public function testMaxMinHeight()
    {
        $fileJudge = (new ImageJudge(__DIR__ . "/../assets/image.png"))
            ->setAssertedMaxHeight(101)
            ->setAssertedMinHeight(99);
        $this->assertTrue($fileJudge->judge());
        $this->assertEquals(100, $fileJudge->getActualHeight());
    }

    public function testMinWidth()
    {
        $fileJudge = (new ImageJudge(__DIR__ . "/../assets/image.png"))
            ->setAssertedMinWidth(101);
        $this->assertFalse($fileJudge->judge());
        $this->assertEquals(100, $fileJudge->getActualWidth());
    }

    public function testMinHeight()
    {
        $fileJudge = (new ImageJudge(__DIR__ . "/../assets/image.png"))
            ->setAssertedMinHeight(101);
        $this->assertFalse($fileJudge->judge());
        $this->assertEquals(100, $fileJudge->getActualHeight());
    }

    public function testMaxWidth()
    {
        $fileJudge = (new ImageJudge(__DIR__ . "/../assets/image.png"))
            ->setAssertedMaxWidth(99);
        $this->assertFalse($fileJudge->judge());
        $this->assertEquals(100, $fileJudge->getActualWidth());
    }

    public function testMaxHeight()
    {
        $fileJudge = (new ImageJudge(__DIR__ . "/../assets/image.png"))
            ->setAssertedMaxHeight(99);
        $this->assertFalse($fileJudge->judge());
        $this->assertEquals(100, $fileJudge->getActualHeight());
    }

}
