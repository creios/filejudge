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
            $this->passed);
    }

    /**
     * @param string $actualMediaType
     * @return $this
     */
    public function setActualMediaType($actualMediaType)
    {
        $this->actualMediaType = $actualMediaType;
        return $this;
    }

    /**
     * @param string $actualMediaTypeSubtype
     * @return $this
     */
    public function setActualMediaTypeSubtype($actualMediaTypeSubtype)
    {
        $this->actualMediaTypeSubtype = $actualMediaTypeSubtype;
        return $this;
    }

    /**
     * @param int $actualFileSize
     * @return $this
     */
    public function setActualFileSize($actualFileSize)
    {
        $this->actualFileSize = $actualFileSize;
        return $this;
    }

    /**
     * @param string[] $assertedMediaTypes
     * @return $this
     */
    public function setAssertedMediaTypes($assertedMediaTypes)
    {
        $this->assertedMediaTypes = $assertedMediaTypes;
        return $this;
    }

    /**
     * @param string[] $assertedMediaTypeSubtypes
     * @return $this
     */
    public function setAssertedMediaTypeSubtypes($assertedMediaTypeSubtypes)
    {
        $this->assertedMediaTypeSubtypes = $assertedMediaTypeSubtypes;
        return $this;
    }

    /**
     * @param int $assertedMaxFileSize
     * @return $this
     */
    public function setAssertedMaxFileSize($assertedMaxFileSize)
    {
        $this->assertedMaxFileSize = $assertedMaxFileSize;
        return $this;
    }

    /**
     * @param int $assertedMinFileSize
     * @return $this
     */
    public function setAssertedMinFileSize($assertedMinFileSize)
    {
        $this->assertedMinFileSize = $assertedMinFileSize;
        return $this;
    }

    /**
     * @return $this
     */
    public function mediaTypeFailed()
    {
        $this->mediaTypeFailed = true;
        return $this;
    }

    /**
     * @return $this
     */
    public function mediaTypeSubtypeFailed()
    {
        $this->mediaTypeSubtypeFailed = true;
        return $this;
    }

    /**
     * @return $this
     */
    public function maxFileSizeFailed()
    {
        $this->maxFileSizeFailed = true;
        return $this;
    }

    /**
     * @return $this
     */
    public function minFileSizeFailed()
    {
        $this->minFileSizeFailed = true;
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