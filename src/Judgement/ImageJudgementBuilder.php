<?php

namespace Creios\FileJudge\Judgement;

use Creios\FileJudge\Judgement\Traits\ImageJudgementTrait;

/**
 * Class ImageJudgementBuilder
 * @package Creios\FileJudge\Judgement
 */
class ImageJudgementBuilder extends FileJudgementBuilder
{

    use ImageJudgementTrait;

    /**
     * @return ImageJudgement
     */
    public function build()
    {
        return new ImageJudgement(
            $this->mediaType,
            $this->mediaTypeSubtype,
            $this->fileSize,
            $this->mediaTypesConstraint,
            $this->mediaTypeSubtypesConstraint,
            $this->maxFileSizeConstraint,
            $this->minFileSizeConstraint,
            $this->mediaTypeConstraintFailed,
            $this->mediaTypeSubtypeConstraintFailed,
            $this->maxFileSizeConstraintFailed,
            $this->minFileSizeConstraintFailed,
            $this->width,
            $this->height,
            $this->minWidthConstraint,
            $this->maxWidthConstraint,
            $this->minHeightConstraint,
            $this->maxHeightConstraint,
            $this->minWidthConstraintFailed,
            $this->maxWidthConstraintFailed,
            $this->minHeightConstraintFailed,
            $this->maxHeightConstraintFailed,
            $this->passed);
    }

    /**
     * @param $width
     * @return $this
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param $height
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @param int $minWidthConstraint
     * @return $this
     */
    public function setMinWidthConstraint($minWidthConstraint)
    {
        $this->minWidthConstraint = $minWidthConstraint;
        return $this;
    }

    /**
     * @param int $maxWidthConstraint
     * @return $this
     */
    public function setMaxWidthConstraint($maxWidthConstraint)
    {
        $this->maxWidthConstraint = $maxWidthConstraint;
        return $this;
    }

    /**
     * @param int $minHeightConstraint
     * @return $this
     */
    public function setMinHeightConstraint($minHeightConstraint)
    {
        $this->minHeightConstraint = $minHeightConstraint;
        return $this;
    }

    /**
     * @param int $maxHeightConstraint
     * @return $this
     */
    public function setMaxHeightConstraint($maxHeightConstraint)
    {
        $this->maxHeightConstraint = $maxHeightConstraint;
        return $this;
    }

    /**
     * @return $this
     */
    public function minWidthFailed()
    {
        $this->minWidthConstraintFailed = true;
        return $this;
    }

    /**
     * @return $this
     */
    public function maxWidthFailed()
    {
        $this->maxWidthConstraintFailed = true;
        return $this;
    }

    /**
     * @return $this
     */
    public function minHeightFailed()
    {
        $this->minHeightConstraintFailed = true;
        return $this;
    }

    /**
     * @return $this
     */
    public function maxHeightFailed()
    {
        $this->maxHeightConstraintFailed = true;
        return $this;
    }

}