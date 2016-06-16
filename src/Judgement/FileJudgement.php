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
     * @param string $mediaType
     * @param string $mediaTypeSubtype
     * @param int $fileSize
     * @param \string[] $mediaTypesConstraint
     * @param \string[] $mediaTypeSubtypesConstraint
     * @param int $maxFileSizeConstraint
     * @param int $minFileSizeConstraint
     * @param bool $mediaTypeConstraintFailed
     * @param bool $mediaTypeSubtypeConstraintFailed
     * @param bool $maxFileSizeConstraintFailed
     * @param bool $minFileSizeConstraintFailed
     * @param bool $passed
     */
    public function __construct($mediaType, $mediaTypeSubtype, $fileSize, array $mediaTypesConstraint, array $mediaTypeSubtypesConstraint, $maxFileSizeConstraint, $minFileSizeConstraint, $mediaTypeConstraintFailed, $mediaTypeSubtypeConstraintFailed, $maxFileSizeConstraintFailed, $minFileSizeConstraintFailed, $passed)
    {
        $this->mediaType = $mediaType;
        $this->mediaTypeSubtype = $mediaTypeSubtype;
        $this->fileSize = $fileSize;
        $this->mediaTypesConstraint = $mediaTypesConstraint;
        $this->mediaTypeSubtypesConstraint = $mediaTypeSubtypesConstraint;
        $this->maxFileSizeConstraint = $maxFileSizeConstraint;
        $this->minFileSizeConstraint = $minFileSizeConstraint;
        $this->mediaTypeConstraintFailed = $mediaTypeConstraintFailed;
        $this->mediaTypeSubtypeConstraintFailed = $mediaTypeSubtypeConstraintFailed;
        $this->maxFileSizeConstraintFailed = $maxFileSizeConstraintFailed;
        $this->minFileSizeConstraintFailed = $minFileSizeConstraintFailed;
        $this->passed = $passed;
    }

}