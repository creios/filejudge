<?php

namespace Creios\FileJudge\Judgement;

use Creios\FileJudge\Judgement\Traits\ImageJudgementTrait;

class ImageJudgement extends FileJudgement
{

    use ImageJudgementTrait;

    /**
     * FileJudgement constructor.
     * @param string $actualMediaType
     * @param string $actualMediaTypeSubtype
     * @param int $actualFileSize
     * @param string[] $assertedMediaTypes
     * @param string[] $assertedMediaTypeSubtypes
     * @param int $assertedMaxFileSize
     * @param int $assertedMinFileSize
     * @param bool $mediaTypeFailed
     * @param bool $mediaTypeSubtypeFailed
     * @param bool $maxFileSizeFailed
     * @param bool $minFileSizeFailed
     * @param $actualWidth
     * @param $actualHeight
     * @param $assertedMinWidth
     * @param $assertedMaxWidth
     * @param $assertedMinHeight
     * @param $assertedMaxHeight
     * @param $minWidthFailed
     * @param $maxWidthFailed
     * @param $minHeightFailed
     * @param $maxHeightFailed
     * @param bool $passed
     */
    public function __construct($actualMediaType, $actualMediaTypeSubtype, $actualFileSize, array $assertedMediaTypes, array $assertedMediaTypeSubtypes, $assertedMaxFileSize, $assertedMinFileSize, $mediaTypeFailed, $mediaTypeSubtypeFailed, $maxFileSizeFailed, $minFileSizeFailed, $actualWidth, $actualHeight, $assertedMinWidth, $assertedMaxWidth, $assertedMinHeight, $assertedMaxHeight, $minWidthFailed, $maxWidthFailed, $minHeightFailed, $maxHeightFailed, $passed)
    {
        parent::__construct($actualMediaType, $actualMediaTypeSubtype, $actualFileSize, $assertedMediaTypes, $assertedMediaTypeSubtypes, $assertedMaxFileSize, $assertedMinFileSize, $mediaTypeFailed, $mediaTypeSubtypeFailed, $maxFileSizeFailed, $minFileSizeFailed, $passed);
        $this->actualWidth = $actualWidth;
        $this->actualHeight = $actualHeight;
        $this->assertedMinWidth = $assertedMinWidth;
        $this->assertedMaxWidth = $assertedMaxWidth;
        $this->assertedMinHeight = $assertedMinHeight;
        $this->assertedMaxHeight = $assertedMaxHeight;
        $this->minWidthFailed = $minWidthFailed;
        $this->maxWidthFailed = $maxWidthFailed;
        $this->minHeightFailed = $minHeightFailed;
        $this->maxHeightFailed = $maxHeightFailed;
        $this->passed = $passed;
    }

    /**
     * @return string
     */
    public function getActualMediaType()
    {
        return $this->actualMediaType;
    }

    /**
     * @return string
     */
    public function getActualMediaTypeSubtype()
    {
        return $this->actualMediaTypeSubtype;
    }

    /**
     * @return int
     */
    public function getActualFileSize()
    {
        return $this->actualFileSize;
    }

    /**
     * @return \string[]
     */
    public function getAssertedMediaTypes()
    {
        return $this->assertedMediaTypes;
    }

    /**
     * @return \string[]
     */
    public function getAssertedMediaTypeSubtypes()
    {
        return $this->assertedMediaTypeSubtypes;
    }

    /**
     * @return int
     */
    public function getAssertedMaxFileSize()
    {
        return $this->assertedMaxFileSize;
    }

    /**
     * @return int
     */
    public function getAssertedMinFileSize()
    {
        return $this->assertedMinFileSize;
    }

    /**
     * @return boolean
     */
    public function isMediaTypeFailed()
    {
        return $this->mediaTypeFailed;
    }

    /**
     * @return boolean
     */
    public function isMediaTypeSubtypeFailed()
    {
        return $this->mediaTypeSubtypeFailed;
    }

    /**
     * @return boolean
     */
    public function isMaxFileSizeFailed()
    {
        return $this->maxFileSizeFailed;
    }

    /**
     * @return boolean
     */
    public function isMinFileSizeFailed()
    {
        return $this->minFileSizeFailed;
    }

    /**
     * @return boolean
     */
    public function isPassed()
    {
        return $this->passed;
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
     * @return int
     */
    public function getAssertedMinWidth()
    {
        return $this->assertedMinWidth;
    }

    /**
     * @return int
     */
    public function getAssertedMaxWidth()
    {
        return $this->assertedMaxWidth;
    }

    /**
     * @return int
     */
    public function getAssertedMinHeight()
    {
        return $this->assertedMinHeight;
    }

    /**
     * @return int
     */
    public function getAssertedMaxHeight()
    {
        return $this->assertedMaxHeight;
    }

    /**
     * @return boolean
     */
    public function isMinWidthFailed()
    {
        return $this->minWidthFailed;
    }

    /**
     * @return boolean
     */
    public function isMaxWidthFailed()
    {
        return $this->maxWidthFailed;
    }

    /**
     * @return boolean
     */
    public function isMinHeightFailed()
    {
        return $this->minHeightFailed;
    }

    /**
     * @return boolean
     */
    public function isMaxHeightFailed()
    {
        return $this->maxHeightFailed;
    }

}