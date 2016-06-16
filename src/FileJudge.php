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
     * @param $filepath
     * @return Judgement\FileJudgement
     * @throws \Exception
     */
    public function judge($filepath)
    {
        $this->setFilepath($filepath);
        $fileJudgementBuilder = (new FileJudgementBuilder())->passed();
        $fileJudgementBuilder = $this->actualFileJudge($fileJudgementBuilder);
        return $fileJudgementBuilder->build();
    }

    /**
     * @param FileJudgementBuilder $fileJudgementBuilder
     * @return FileJudgementBuilder
     */
    protected function actualFileJudge(FileJudgementBuilder $fileJudgementBuilder)
    {
        if ($this->assertedMaxFileSize != null) {
            if ($this->judgeMaxFileSize() == false) $fileJudgementBuilder->maxFileSizeFailed()->failed();
            $fileJudgementBuilder->setAssertedMaxFileSize($this->assertedMaxFileSize);
            $fileJudgementBuilder->setActualFileSize($this->actualFileSize);
        }
        if ($this->assertedMinFileSize != null) {
            if ($this->judgeMinFileSize() == false) $fileJudgementBuilder->minFileSizeFailed()->failed();
            $fileJudgementBuilder->setAssertedMinFileSize($this->assertedMinFileSize);
            $fileJudgementBuilder->setActualFileSize($this->actualFileSize);
        }
        if (count($this->assertedMediaTypes) > 0) {
            if ($this->judgeMediaType() == false) $fileJudgementBuilder->mediaTypeFailed()->failed();
            $fileJudgementBuilder->setAssertedMediaTypes($this->assertedMediaTypes);
            $fileJudgementBuilder->setActualMediaType($this->actualMediaType);
        }
        if (count($this->assertedMediaTypeSubtypes) > 0) {
            if ($this->judgeMediaTypeSubtype() == false) $fileJudgementBuilder->mediaTypeSubtypeFailed()->failed();
            $fileJudgementBuilder->setAssertedMediaTypeSubtypes($this->assertedMediaTypeSubtypes);
            $fileJudgementBuilder->setActualMediaTypeSubtype($this->actualMediaTypeSubtype);
        }
        return $fileJudgementBuilder;
    }

    /**
     * @return bool
     */
    protected function judgeMaxFileSize()
    {
        $this->actualFileSize = filesize($this->filepath);
        return $this->lesserEquals($this->actualFileSize, $this->assertedMaxFileSize);
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
    protected function equal($actual, $asserted)
    {
        return $actual === $asserted;
    }

    /**
     * @return bool
     */
    protected function judgeMinFileSize()
    {
        $this->actualFileSize = filesize($this->filepath);
        return $this->greaterEquals($this->actualFileSize, $this->assertedMinFileSize);
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
     * @return bool
     */
    protected function judgeMediaType()
    {
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $this->actualMediaType = explode("/", $finfo->file($this->filepath))[0];
        return in_array($this->actualMediaType, $this->assertedMediaTypes);
    }

    /**
     * @return bool
     */
    protected function judgeMediaTypeSubtype()
    {
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $this->actualMediaTypeSubtype = explode("/", $finfo->file($this->filepath))[1];
        return in_array($this->actualMediaTypeSubtype, $this->assertedMediaTypeSubtypes);
    }

    /**
     * @param string $assertedMediaTypeSubtype
     * @return $this
     */
    public function addAssertedMediaTypeSubtype($assertedMediaTypeSubtype)
    {
        $this->assertedMediaTypeSubtypes[] = $assertedMediaTypeSubtype;
        return $this;
    }

    /**
     * @param string $assertedMediaType
     * @return $this
     */
    public function addAssertedMediaType($assertedMediaType)
    {
        $this->assertedMediaTypes[] = $assertedMediaType;
        return $this;
    }

    /**
     * @param string $assertedMaxFileSize
     * @return $this
     */
    public function setAssertedMaxFileSize($assertedMaxFileSize)
    {
        $this->assertedMaxFileSize = $assertedMaxFileSize;
        return $this;
    }

    /**
     * @param string $assertedMinFileSize
     * @return $this
     */
    public function setAssertedMinFileSize($assertedMinFileSize)
    {
        $this->assertedMinFileSize = $assertedMinFileSize;
        return $this;
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


}