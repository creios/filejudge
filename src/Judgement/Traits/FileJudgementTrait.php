<?php

namespace Creios\FileJudge\Judgement\Traits;

/**
 * Class FileJudgementTrait
 * @package Creios\FileJudge\Judgement\Traits
 */
trait FileJudgementTrait
{

    /**
     * @var string
     */
    protected $actualMediaType;

    /**
     * @var string
     */
    protected $actualMediaTypeSubtype;

    /**
     * @var int
     */
    protected $actualFileSize;

    /**
     * @var string[]
     */
    protected $assertedMediaTypes = array();

    /**
     * @var string[]
     */
    protected $assertedMediaTypeSubtypes = array();

    /**
     * @var int
     */
    protected $assertedMaxFileSize;

    /**
     * @var int
     */
    protected $assertedMinFileSize;

    /**
     * @var bool
     */
    protected $mediaTypeFailed = false;

    /**
     * @var bool
     */
    protected $mediaTypeSubtypeFailed = false;

    /**
     * @var bool
     */
    protected $maxFileSizeFailed = false;

    /**
     * @var bool
     */
    protected $minFileSizeFailed = false;

    /**
     * @var bool
     */
    protected $passed;

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

}