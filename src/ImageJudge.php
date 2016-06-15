<?php

namespace Creios\FileJudge;

use Creios\FileJudge\Judgement\ImageJudgementBuilder;

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

    /**
     * @param $filepath
     * @return Judgement\ImageJudgement
     * @throws \Exception
     */
    public function judge($filepath)
    {
        $this->setFilepath($filepath);
        $imageJudgementBuilder = (new ImageJudgementBuilder())->passed();
        /** @var ImageJudgementBuilder $imageJudgementBuilder */
        $imageJudgementBuilder = parent::actualJudge($imageJudgementBuilder);
        $imageJudgementBuilder = $this->actualImageJudge($imageJudgementBuilder);
        return $imageJudgementBuilder->build();
    }

    /**
     * @param ImageJudgementBuilder $imageJudgementBuilder
     * @return ImageJudgementBuilder
     */
    protected function actualImageJudge(ImageJudgementBuilder $imageJudgementBuilder)
    {
        if ($this->assertedMaxHeight != null) {
            if ($this->judgeMaxHeight() == false) $imageJudgementBuilder->maxHeightFailed()->failed();
            $imageJudgementBuilder->setAssertedMaxHeight($this->assertedMaxHeight);
            $imageJudgementBuilder->setActualHeight($this->actualHeight);
        }
        if ($this->assertedMinHeight != null) {
            if ($this->judgeMinHeight() == false) $imageJudgementBuilder->minHeightFailed()->failed();
            $imageJudgementBuilder->setAssertedMinHeight($this->assertedMinHeight);
            $imageJudgementBuilder->setActualHeight($this->actualHeight);
        }
        if ($this->assertedMaxWidth != null) {
            if ($this->judgeMaxWidth() == false) $imageJudgementBuilder->maxWidthFailed()->failed();
            $imageJudgementBuilder->setAssertedMaxWidth($this->assertedMaxWidth);
            $imageJudgementBuilder->setActualWidth($this->actualWidth);
        }
        if ($this->assertedMinWidth != null) {
            if ($this->judgeMinWidth() == false) $imageJudgementBuilder->minWidthFailed()->failed();
            $imageJudgementBuilder->setAssertedMinWidth($this->assertedMinWidth);
            $imageJudgementBuilder->setActualWidth($this->actualWidth);
        }
        return $imageJudgementBuilder;
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