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
    protected $actualWidth;

    /**
     * @var int
     */
    protected $actualHeight;

    /**
     * @var int
     */
    protected $assertedMinWidth;

    /**
     * @var int
     */
    protected $assertedMaxWidth;

    /**
     * @var int
     */
    protected $assertedMinHeight;

    /**
     * @var int
     */
    protected $assertedMaxHeight;

    /**
     * @var bool
     */
    protected $minWidthFailed=false;

    /**
     * @var bool
     */
    protected $maxWidthFailed=false;

    /**
     * @var bool
     */
    protected $minHeightFailed=false;

    /**
     * @var bool
     */
    protected $maxHeightFailed=false;

}