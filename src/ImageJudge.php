<?php

namespace Creios\FileJudge;

/**
 * Class ImageJudge
 * @package Creios\FileJudge
 */
class ImageJudge extends FileJudge
{

    /**
     * @var int
     */
    protected $actualWidth;
    /**
     * @var int
     */
    protected $actualHeight;
    /**
     * @var int
     */
    protected $assertedMinWidth;
    /**
     * @var int
     */
    protected $assertedMaxWidth;
    /**
     * @var int
     */
    protected $assertedMinHeight;
    /**
     * @var int
     */
    protected $assertedMaxHeight;

    public function judge()
    {
        if ($this->assertedMaxHeight != null && !$this->judgeMaxHeight()) return false;
        if ($this->assertedMinHeight != null && !$this->judgeMinHeight()) return false;
        if ($this->assertedMaxWidth != null && !$this->judgeMaxWidth()) return false;
        if ($this->assertedMinWidth != null && !$this->judgeMinWidth()) return false;
        return parent::judge();
    }

    /**
     * @return bool
     */
    protected function judgeMaxHeight()
    {
        $this->actualHeight = getimagesize($this->filepath)[1];
        return $this->lesserEquals($this->actualHeight, $this->assertedMaxHeight);
    }

    /**
     * @return bool
     */
    protected function judgeMinHeight()
    {
        $this->actualHeight = getimagesize($this->filepath)[1];
        return $this->greaterEquals($this->actualHeight, $this->assertedMinHeight);
    }

    /**
     * @return bool
     */
    protected function judgeMaxWidth()
    {
        $this->actualWidth = getimagesize($this->filepath)[0];
        return $this->lesserEquals($this->actualWidth, $this->assertedMaxWidth);
    }

    /**
     * @return bool
     */
    protected function judgeMinWidth()
    {
        $this->actualWidth = getimagesize($this->filepath)[0];
        return $this->greaterEquals($this->actualWidth, $this->assertedMinWidth);
    }

    /**
     * @return int
     */
    public function getActualWidth()
    {
        return $this->actualWidth;
    }

    /**
     * @return int
     */
    public function getActualHeight()
    {
        return $this->actualHeight;
    }

    /**
     * @param int $assertedMinWidth
     * @return $this
     */
    public function setAssertedMinWidth($assertedMinWidth)
    {
        $this->assertedMinWidth = $assertedMinWidth;
        return $this;
    }

    /**
     * @param int $assertedMaxWidth
     * @return $this
     */
    public function setAssertedMaxWidth($assertedMaxWidth)
    {
        $this->assertedMaxWidth = $assertedMaxWidth;
        return $this;
    }

    /**
     * @param int $assertedMinHeight
     * @return $this
     */
    public function setAssertedMinHeight($assertedMinHeight)
    {
        $this->assertedMinHeight = $assertedMinHeight;
        return $this;
    }

    /**
     * @param int $assertedMaxHeight
     * @return $this
     */
    public function setAssertedMaxHeight($assertedMaxHeight)
    {
        $this->assertedMaxHeight = $assertedMaxHeight;
        return $this;
    }

}