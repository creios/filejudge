<?php

namespace Creios\FileJudge\Judgement;

use Creios\FileJudge\Judgement\Traits\ImageJudgementTrait;

class ImageJudgementBuilder extends FileJudgementBuilder
{

    use ImageJudgementTrait;

    /**
     * @return ImageJudgement
     */
    public function build()
    {
        return new ImageJudgement(
            $this->actualMediaType,
            $this->actualMediaTypeSubtype,
            $this->actualFileSize,
            $this->assertedMediaTypes,
            $this->assertedMediaTypeSubtypes,
            $this->assertedMaxFileSize,
            $this->assertedMinFileSize,
            $this->mediaTypeFailed,
            $this->mediaTypeSubtypeFailed,
            $this->maxFileSizeFailed,
            $this->minFileSizeFailed,
            $this->actualWidth,
            $this->actualHeight,
            $this->assertedMinWidth,
            $this->assertedMaxWidth,
            $this->assertedMinHeight,
            $this->assertedMaxHeight,
            $this->minWidthFailed,
            $this->maxWidthFailed,
            $this->minHeightFailed,
            $this->maxHeightFailed,
            $this->passed);
    }

    /**
     * @param $actualWidth
     * @return $this
     */
    public function setActualWidth($actualWidth)
    {
        $this->actualWidth = $actualWidth;
        return $this;
    }

    /**
     * @param $actualHeight
     * @return $this
     */
    public function setActualHeight($actualHeight)
    {
        $this->actualHeight = $actualHeight;
        return $this;
    }

    /**
     * @param $assertedMinWidth
     * @return $this
     */
    public function setAssertedMinWidth($assertedMinWidth)
    {
        $this->assertedMinWidth = $assertedMinWidth;
        return $this;
    }

    /**
     * @param $assertedMaxWidth
     * @return $this
     */
    public function setAssertedMaxWidth($assertedMaxWidth)
    {
        $this->assertedMaxWidth = $assertedMaxWidth;
        return $this;
    }

    /**
     * @param $assertedMinHeight
     * @return $this
     */
    public function setAssertedMinHeight($assertedMinHeight)
    {
        $this->assertedMinHeight = $assertedMinHeight;
        return $this;
    }

    /**
     * @param $assertedMaxHeight
     * @return $this
     */
    public function setAssertedMaxHeight($assertedMaxHeight)
    {
        $this->assertedMaxHeight = $assertedMaxHeight;
        return $this;
    }

    /**
     * @return $this
     */
    public function minWidthFailed()
    {
        $this->minWidthFailed = true;
        return $this;
    }

    /**
     * @return $this
     */
    public function maxWidthFailed()
    {
        $this->maxWidthFailed = true;
        return $this;
    }

    /**
     * @return $this
     */
    public function minHeightFailed()
    {
        $this->minHeightFailed = true;
        return $this;
    }

    /**
     * @return $this
     */
    public function maxHeightFailed()
    {
        $this->maxHeightFailed = true;
        return $this;
    }

}