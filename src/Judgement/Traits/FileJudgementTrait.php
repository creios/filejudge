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
    protected $mediaTypeFailed;

    /**
     * @var bool
     */
    protected $mediaTypeSubtypeFailed;

    /**
     * @var bool
     */
    protected $maxFileSizeFailed;

    /**
     * @var bool
     */
    protected $minFileSizeFailed;

    /**
     * @var bool
     */
    protected $passed;

}