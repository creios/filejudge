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
    protected $mediaType;

    /**
     * @var string
     */
    protected $mediaTypeSubtype;

    /**
     * @var int
     */
    protected $fileSize;

    /**
     * @var string[]
     */
    protected $mediaTypesConstraint = array();

    /**
     * @var string[]
     */
    protected $mediaTypeSubtypesConstraint = array();

    /**
     * @var int
     */
    protected $maxFileSizeConstraint;

    /**
     * @var int
     */
    protected $minFileSizeConstraint;

    /**
     * @var bool
     */
    protected $mediaTypeConstraintFailed = false;

    /**
     * @var bool
     */
    protected $mediaTypeSubtypeConstraintFailed = false;

    /**
     * @var bool
     */
    protected $maxFileSizeConstraintFailed = false;

    /**
     * @var bool
     */
    protected $minFileSizeConstraintFailed = false;

    /**
     * @var bool
     */
    protected $passed;

    /**
     * @return string
     */
    public function getMediaType()
    {
        return $this->mediaType;
    }

    /**
     * @return string
     */
    public function getMediaTypeSubtype()
    {
        return $this->mediaTypeSubtype;
    }

    /**
     * @return int
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * @return \string[]
     */
    public function getMediaTypesConstraint()
    {
        return $this->mediaTypesConstraint;
    }

    /**
     * @return \string[]
     */
    public function getMediaTypeSubtypesConstraint()
    {
        return $this->mediaTypeSubtypesConstraint;
    }

    /**
     * @return int
     */
    public function getMaxFileSizeConstraint()
    {
        return $this->maxFileSizeConstraint;
    }

    /**
     * @return int
     */
    public function getMinFileSizeConstraint()
    {
        return $this->minFileSizeConstraint;
    }

    /**
     * @return boolean
     */
    public function hasMediaTypeConstraintFailed()
    {
        return $this->mediaTypeConstraintFailed;
    }

    /**
     * @return boolean
     */
    public function hasMediaTypeSubtypeConstraintFailed()
    {
        return $this->mediaTypeSubtypeConstraintFailed;
    }

    /**
     * @return boolean
     */
    public function hasMaxFileSizeConstraintFailed()
    {
        return $this->maxFileSizeConstraintFailed;
    }

    /**
     * @return boolean
     */
    public function hasMinFileSizeConstraintFailed()
    {
        return $this->minFileSizeConstraintFailed;
    }

    /**
     * @return boolean
     */
    public function hasPassed()
    {
        return $this->passed;
    }

}