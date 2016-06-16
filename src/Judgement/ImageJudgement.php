<?php

namespace Creios\FileJudge\Judgement;

use Creios\FileJudge\Judgement\Traits\ImageJudgementTrait;

/**
 * Class ImageJudgement
 * @package Creios\FileJudge\Judgement
 */
class ImageJudgement extends FileJudgement
{

    use ImageJudgementTrait;

    /**
     * FileJudgement constructor.
     * @param string $mediaType
     * @param string $mediaTypeSubtype
     * @param int $fileSize
     * @param string[] $mediaTypes
     * @param string[] $mediaTypeSubtypes
     * @param int $maxFileSize
     * @param int $minFileSize
     * @param bool $mediaTypeConstraintFailed
     * @param bool $mediaTypeSubtypeConstraintFailed
     * @param bool $maxFileSizeConstraintFailed
     * @param bool $minFileSizeConstraintFailed
     * @param $width
     * @param $height
     * @param $minWidthConstraint
     * @param $maxWidthConstraint
     * @param $minHeightConstraint
     * @param $maxHeightConstraint
     * @param $minWidthConstraintFailed
     * @param $maxWidthConstraintFailed
     * @param $minHeightConstraintFailed
     * @param $maxHeightConstraintFailed
     * @param bool $passed
     */
    public function __construct($mediaType, $mediaTypeSubtype, $fileSize, array $mediaTypes, array $mediaTypeSubtypes, $maxFileSize, $minFileSize, $mediaTypeConstraintFailed, $mediaTypeSubtypeConstraintFailed, $maxFileSizeConstraintFailed, $minFileSizeConstraintFailed, $width, $height, $minWidthConstraint, $maxWidthConstraint, $minHeightConstraint, $maxHeightConstraint, $minWidthConstraintFailed, $maxWidthConstraintFailed, $minHeightConstraintFailed, $maxHeightConstraintFailed, $passed)
    {
        parent::__construct($mediaType, $mediaTypeSubtype, $fileSize, $mediaTypes, $mediaTypeSubtypes, $maxFileSize, $minFileSize, $mediaTypeConstraintFailed, $mediaTypeSubtypeConstraintFailed, $maxFileSizeConstraintFailed, $minFileSizeConstraintFailed, $passed);
        $this->width = $width;
        $this->height = $height;
        $this->minWidthConstraint = $minWidthConstraint;
        $this->maxWidthConstraint = $maxWidthConstraint;
        $this->minHeightConstraint = $minHeightConstraint;
        $this->maxHeightConstraint = $maxHeightConstraint;
        $this->minWidthConstraintFailed = $minWidthConstraintFailed;
        $this->maxWidthConstraintFailed = $maxWidthConstraintFailed;
        $this->minHeightConstraintFailed = $minHeightConstraintFailed;
        $this->maxHeightConstraintFailed = $maxHeightConstraintFailed;
        $this->passed = $passed;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return int
     */
    public function getMinWidthConstraint()
    {
        return $this->minWidthConstraint;
    }

    /**
     * @return int
     */
    public function getMaxWidthConstraint()
    {
        return $this->maxWidthConstraint;
    }

    /**
     * @return int
     */
    public function getMinHeightConstraint()
    {
        return $this->minHeightConstraint;
    }

    /**
     * @return int
     */
    public function getMaxHeightConstraint()
    {
        return $this->maxHeightConstraint;
    }

    /**
     * @return boolean
     */
    public function hasMinWidthConstraintFailed()
    {
        return $this->minWidthConstraintFailed;
    }

    /**
     * @return boolean
     */
    public function hasMaxWidthConstraintFailed()
    {
        return $this->maxWidthConstraintFailed;
    }

    /**
     * @return boolean
     */
    public function hasMinHeightConstraintFailed()
    {
        return $this->minHeightConstraintFailed;
    }

    /**
     * @return boolean
     */
    public function hasMaxHeightConstraintFailed()
    {
        return $this->maxHeightConstraintFailed;
    }

}