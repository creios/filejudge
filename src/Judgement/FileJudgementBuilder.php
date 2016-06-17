<?php

namespace Creios\FileJudge\Judgement;

use Creios\FileJudge\Judgement\Traits\FileJudgementTrait;

/**
 * Class FileJudgementBuilder
 * @package Creios\FileJudge\Judgement
 */
class FileJudgementBuilder
{

    use FileJudgementTrait;

    /**
     * @return FileJudgement
     */
    public function build()
    {
        return new FileJudgement(
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
            $this->passed);
    }

    /**
     * @param string $mediaType
     * @return $this
     */
    public function setMediaType($mediaType)
    {
        $this->mediaType = $mediaType;
        return $this;
    }

    /**
     * @param string $mediaTypeSubtype
     * @return $this
     */
    public function setMediaTypeSubtype($mediaTypeSubtype)
    {
        $this->mediaTypeSubtype = $mediaTypeSubtype;
        return $this;
    }

    /**
     * @param int $fileSize
     * @return $this
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;
        return $this;
    }

    /**
     * @param string[] $mediaTypesConstraint
     * @return $this
     */
    public function setMediaTypesConstraint($mediaTypesConstraint)
    {
        $this->mediaTypesConstraint = $mediaTypesConstraint;
        return $this;
    }

    /**
     * @param string[] $mediaTypeSubtypesConstraint
     * @return $this
     */
    public function setMediaTypeSubtypesConstraint($mediaTypeSubtypesConstraint)
    {
        $this->mediaTypeSubtypesConstraint = $mediaTypeSubtypesConstraint;
        return $this;
    }

    /**
     * @param int $maxFileSizeConstraint
     * @return $this
     */
    public function setMaxFileSizeConstraint($maxFileSizeConstraint)
    {
        $this->maxFileSizeConstraint = $maxFileSizeConstraint;
        return $this;
    }

    /**
     * @param int $minFileSizeConstraint
     * @return $this
     */
    public function setMinFileSizeConstraint($minFileSizeConstraint)
    {
        $this->minFileSizeConstraint = $minFileSizeConstraint;
        return $this;
    }

    /**
     * @return $this
     */
    public function mediaTypeConstraintFailed()
    {
        $this->mediaTypeConstraintFailed = true;
        return $this;
    }

    /**
     * @return $this
     */
    public function mediaTypeSubtypeConstraintFailed()
    {
        $this->mediaTypeSubtypeConstraintFailed = true;
        return $this;
    }

    /**
     * @return $this
     */
    public function maxFileSizeConstraintFailed()
    {
        $this->maxFileSizeConstraintFailed = true;
        return $this;
    }

    /**
     * @return $this
     */
    public function minFileSizeConstraintFailed()
    {
        $this->minFileSizeConstraintFailed = true;
        return $this;
    }

    /**
     * @return $this
     */
    public function failed()
    {
        $this->passed = false;
        return $this;
    }

    /**
     * @return $this
     */
    public function passed()
    {
        $this->passed = true;
        return $this;
    }
    
}