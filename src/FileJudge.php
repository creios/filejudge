<?php
namespace Creios\FileJudge;

use Creios\FileJudge\Judgement\FileJudgementBuilder;

/**
 * Class FileJudge
 * @package Creios\FileJudge
 */
class FileJudge
{

    /**
     * @var string
     */
    protected $filepath;
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
     * @param $filepath
     * @return Judgement\FileJudgement
     * @throws \Exception
     */
    public function judge($filepath)
    {
        $this->setFilepath($filepath);

        $fileJudgementBuilder = (new FileJudgementBuilder())->passed();
        $fileJudgementBuilder = $this->applyFileProperties($fileJudgementBuilder);
        $fileJudgementBuilder = $this->actualFileJudge($fileJudgementBuilder);
        return $fileJudgementBuilder->build();
    }

    /**
     * @param FileJudgementBuilder $fileJudgementBuilder
     * @return FileJudgementBuilder
     */
    protected function applyFileProperties(FileJudgementBuilder $fileJudgementBuilder)
    {
        $this->actualFileSize = filesize($this->filepath);
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $this->actualMediaType = explode("/", $finfo->file($this->filepath))[0];
        $this->actualMediaTypeSubtype = explode("/", $finfo->file($this->filepath))[1];
        $fileJudgementBuilder->setFileSize($this->actualFileSize);
        $fileJudgementBuilder->setMediaType($this->actualMediaType);
        $fileJudgementBuilder->setMediaTypeSubtype($this->actualMediaTypeSubtype);
        return $fileJudgementBuilder;
    }
   
    /**
     * @param FileJudgementBuilder $fileJudgementBuilder
     * @return FileJudgementBuilder
     */
    protected function actualFileJudge(FileJudgementBuilder $fileJudgementBuilder)
    {
        if ($this->maxFileSizeConstraint != null) {
            if ($this->judgeMaxFileSize() == false) $fileJudgementBuilder->maxFileSizeConstraintFailed()->failed();
            $fileJudgementBuilder->setMaxFileSizeConstraint($this->maxFileSizeConstraint);
        }
        if ($this->minFileSizeConstraint != null) {
            if ($this->judgeMinFileSize() == false) $fileJudgementBuilder->minFileSizeConstraintFailed()->failed();
            $fileJudgementBuilder->setMinFileSizeConstraint($this->minFileSizeConstraint);
        }
        if (count($this->mediaTypesConstraint) > 0) {
            if ($this->judgeMediaType() == false) $fileJudgementBuilder->mediaTypeConstraintFailed()->failed();
            $fileJudgementBuilder->setMediaTypesConstraint($this->mediaTypesConstraint);
        }
        if (count($this->mediaTypeSubtypesConstraint) > 0) {
            if ($this->judgeMediaTypeSubtype() == false) $fileJudgementBuilder->mediaTypeSubtypeConstraintFailed()->failed();
            $fileJudgementBuilder->setMediaTypeSubtypesConstraint($this->mediaTypeSubtypesConstraint);
        }
        return $fileJudgementBuilder;
    }

    /**
     * @return bool
     */
    protected function judgeMaxFileSize()
    {
        return $this->lesserEquals($this->actualFileSize, $this->maxFileSizeConstraint);
    }

    /**
     * @return bool
     */
    protected function judgeMinFileSize()
    {
        return $this->greaterEquals($this->actualFileSize, $this->minFileSizeConstraint);
    }

    /**
     * @return bool
     */
    protected function judgeMediaType()
    {
        return in_array($this->actualMediaType, $this->mediaTypesConstraint);
    }

    /**
     * @return bool
     */
    protected function judgeMediaTypeSubtype()
    {

        return in_array($this->actualMediaTypeSubtype, $this->mediaTypeSubtypesConstraint);
    }

    /**
     * @param $actual
     * @param $asserted
     * @return bool
     */
    protected function lesserEquals($actual, $asserted)
    {
        return $this->lesser($actual, $asserted) || $this->equal($actual, $asserted);
    }

    /**
     * @param $actual
     * @param $asserted
     * @return bool
     */
    protected function lesser($actual, $asserted)
    {
        return $actual < $asserted;
    }

    /**
     * @param $actual
     * @param $asserted
     * @return bool
     */
    protected function greaterEquals($actual, $asserted)
    {
        return $this->greater($actual, $asserted) || $this->equal($actual, $asserted);
    }

    /**
     * @param $actual
     * @param $asserted
     * @return bool
     */
    protected function greater($actual, $asserted)
    {
        return $actual > $asserted;
    }

    /**
     * @param $actual
     * @param $asserted
     * @return bool
     */
    protected function equal($actual, $asserted)
    {
        return $actual === $asserted;
    }

    /**
     * @param string $filepath
     * @throws \Exception
     */
    protected function setFilepath($filepath)
    {
        if (!file_exists($filepath)) {
            throw new \Exception("File does not exist");
        }
        $this->filepath = $filepath;
    }

    /**
     * @param string $mediaTypeSubtype
     * @return $this
     */
    public function addMediaTypeSubtypeConstraint($mediaTypeSubtype)
    {
        $this->mediaTypeSubtypesConstraint[] = $mediaTypeSubtype;
        return $this;
    }

    /**
     * @param string $mediaType
     * @return $this
     */
    public function addMediaTypeConstraint($mediaType)
    {
        $this->mediaTypesConstraint[] = $mediaType;
        return $this;
    }

    /**
     * @param string $maxFileSize
     * @return $this
     */
    public function setMaxFileSizeConstraint($maxFileSize)
    {
        $this->maxFileSizeConstraint = $maxFileSize;
        return $this;
    }

    /**
     * @param string $minFileSize
     * @return $this
     */
    public function setMinFileSizeConstraint($minFileSize)
    {
        $this->minFileSizeConstraint = $minFileSize;
        return $this;
    }

}