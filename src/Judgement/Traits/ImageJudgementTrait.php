<?php

namespace Creios\FileJudge\Judgement\Traits;

/**
 * Class ImageJudgementTrait
 * @package Creios\FileJudge\Judgement\Traits
 */
trait ImageJudgementTrait
{

    /**
     * @var int
     */
    protected $width;

    /**
     * @var int
     */
    protected $height;

    /**
     * @var int
     */
    protected $minWidthConstraint;

    /**
     * @var int
     */
    protected $maxWidthConstraint;

    /**
     * @var int
     */
    protected $minHeightConstraint;

    /**
     * @var int
     */
    protected $maxHeightConstraint;

    /**
     * @var bool
     */
    protected $minWidthConstraintFailed = false;

    /**
     * @var bool
     */
    protected $maxWidthConstraintFailed = false;

    /**
     * @var bool
     */
    protected $minHeightConstraintFailed = false;

    /**
     * @var bool
     */
    protected $maxHeightConstraintFailed = false;

}