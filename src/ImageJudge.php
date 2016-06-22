<?php

namespace Creios\FileJudge;

use Creios\FileJudge\Judgement\ImageJudgementBuilder;

/**
 * Class ImageJudge
 * @package Creios\FileJudge
 */
class ImageJudge extends FileJudge
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
     * @param $filepath
     * @return Judgement\ImageJudgement
     * @throws \Exception
     */
    public function judge($filepath)
    {
        $this->setFilepath($filepath);
        $imageJudgementBuilder = (new ImageJudgementBuilder())->passed();
        $imageJudgementBuilder = $this->applyFileProperties($imageJudgementBuilder);
        /** @var ImageJudgementBuilder $imageJudgementBuilder */
        $imageJudgementBuilder = $this->applyImageProperties($imageJudgementBuilder);
        /** @var ImageJudgementBuilder $imageJudgementBuilder */
        $imageJudgementBuilder = $this->actualFileJudge($imageJudgementBuilder);
        $imageJudgementBuilder = $this->actualImageJudge($imageJudgementBuilder);
        return $imageJudgementBuilder->build();
    }

    /**
     * @param ImageJudgementBuilder $imageJudgementBuilder
     * @return ImageJudgementBuilder
     */
    protected function applyImageProperties(ImageJudgementBuilder $imageJudgementBuilder)
    {
        $this->actualWidth = getimagesize($this->filepath)[0];
        $this->actualHeight = getimagesize($this->filepath)[1];
        $imageJudgementBuilder->setHeight($this->actualHeight);
        $imageJudgementBuilder->setWidth($this->actualWidth);
        return $imageJudgementBuilder;
    }

    /**
     * @param ImageJudgementBuilder $imageJudgementBuilder
     * @return ImageJudgementBuilder
     */
    protected function actualImageJudge(ImageJudgementBuilder $imageJudgementBuilder)
    {
        if ($this->maxHeightConstraint != null) {
            if ($this->judgeMaxHeight() == false) $imageJudgementBuilder->maxHeightFailed()->failed();
            $imageJudgementBuilder->setMaxHeightConstraint($this->maxHeightConstraint);
        }
        if ($this->minHeightConstraint != null) {
            if ($this->judgeMinHeight() == false) $imageJudgementBuilder->minHeightFailed()->failed();
            $imageJudgementBuilder->setMinHeightConstraint($this->minHeightConstraint);
        }
        if ($this->maxWidthConstraint != null) {
            if ($this->judgeMaxWidth() == false) $imageJudgementBuilder->maxWidthFailed()->failed();
            $imageJudgementBuilder->setMaxWidthConstraint($this->maxWidthConstraint);
        }
        if ($this->minWidthConstraint != null) {
            if ($this->judgeMinWidth() == false) $imageJudgementBuilder->minWidthFailed()->failed();
            $imageJudgementBuilder->setMinWidthConstraint($this->minWidthConstraint);
        }
        return $imageJudgementBuilder;
    }

    /**
     * @return bool
     */
    protected function judgeMaxHeight()
    {
        return $this->lesserEquals($this->actualHeight, $this->maxHeightConstraint);
    }

    /**
     * @return bool
     */
    protected function judgeMinHeight()
    {
        return $this->greaterEquals($this->actualHeight, $this->minHeightConstraint);
    }

    /**
     * @return bool
     */
    protected function judgeMaxWidth()
    {

        return $this->lesserEquals($this->actualWidth, $this->maxWidthConstraint);
    }

    /**
     * @return bool
     */
    protected function judgeMinWidth()
    {
        return $this->greaterEquals($this->actualWidth, $this->minWidthConstraint);
    }

    /**
     * @param int $minWidth
     * @return $this
     */
    public function setMinWidthConstraint($minWidth)
    {
        $this->minWidthConstraint = $minWidth;
        return $this;
    }

    /**
     * @param int $maxWidth
     * @return $this
     */
    public function setMaxWidthConstraint($maxWidth)
    {
        $this->maxWidthConstraint = $maxWidth;
        return $this;
    }

    /**
     * @param int $minHeight
     * @return $this
     */
    public function setMinHeightConstraint($minHeight)
    {
        $this->minHeightConstraint = $minHeight;
        return $this;
    }

    /**
     * @param int $maxHeight
     * @return $this
     */
    public function setMaxHeightConstraint($maxHeight)
    {
        $this->maxHeightConstraint = $maxHeight;
        return $this;
    }

}