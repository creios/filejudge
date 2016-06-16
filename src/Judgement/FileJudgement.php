<?php

namespace Creios\FileJudge\Judgement;

use Creios\FileJudge\Judgement\Traits\FileJudgementTrait;

/**
 * Class FileJudgement
 * @package Creios\FileJudge\Judgement
 */
class FileJudgement
{

    use FileJudgementTrait;

    /**
     * FileJudgement constructor.
     * @param string $actualMediaType
     * @param string $actualMediaTypeSubtype
     * @param int $actualFileSize
     * @param \string[] $assertedMediaTypes
     * @param \string[] $assertedMediaTypeSubtypes
     * @param int $assertedMaxFileSize
     * @param int $assertedMinFileSize
     * @param bool $mediaTypeFailed
     * @param bool $mediaTypeSubtypeFailed
     * @param bool $maxFileSizeFailed
     * @param bool $minFileSizeFailed
     * @param bool $passed
     */
    public function __construct($actualMediaType, $actualMediaTypeSubtype, $actualFileSize, array $assertedMediaTypes, array $assertedMediaTypeSubtypes, $assertedMaxFileSize, $assertedMinFileSize, $mediaTypeFailed, $mediaTypeSubtypeFailed, $maxFileSizeFailed, $minFileSizeFailed, $passed)
    {
        $this->actualMediaType = $actualMediaType;
        $this->actualMediaTypeSubtype = $actualMediaTypeSubtype;
        $this->actualFileSize = $actualFileSize;
        $this->assertedMediaTypes = $assertedMediaTypes;
        $this->assertedMediaTypeSubtypes = $assertedMediaTypeSubtypes;
        $this->assertedMaxFileSize = $assertedMaxFileSize;
        $this->assertedMinFileSize = $assertedMinFileSize;
        $this->mediaTypeFailed = $mediaTypeFailed;
        $this->mediaTypeSubtypeFailed = $mediaTypeSubtypeFailed;
        $this->maxFileSizeFailed = $maxFileSizeFailed;
        $this->minFileSizeFailed = $minFileSizeFailed;
        $this->passed = $passed;
    }

}