<?php
namespace Creios\FileJudge;

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
     * @var string
     */
    protected $assertedMediaType;
    /**
     * @var string
     */
    protected $assertedMediaTypeSubtype;
    /**
     * @var int
     */
    protected $assertedMaxFileSize;
    /**
     * @var int
     */
    protected $assertedMinFileSize;

    /**
     * @param string $filepath
     * @throws \Exception
     */
    public function __construct($filepath)
    {
        if (!file_exists($filepath)) {
            throw new \Exception("File does not exist");
        }
        $this->filepath = $filepath;
    }

    /**
     * @return bool
     */
    public function judge()
    {
        if ($this->assertedMaxFileSize != null && !$this->judgeMaxFileSize()) return false;
        if ($this->assertedMinFileSize != null && !$this->judgeMinFileSize()) return false;
        if ($this->assertedMediaType != null && !$this->judgeMediaType()) return false;
        if ($this->assertedMediaTypeSubtype != null && !$this->judgeMediaTypeSubtype()) return false;
        return true;
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
    protected function lesser($actual, $asserted)
    {
        return $actual < $asserted;
    }

    protected function greaterEquals($actual, $asserted)
    {
        return $this->greater($actual, $asserted) || $this->equal($actual, $asserted);
    }

    protected function lesserEquals($actual, $asserted)
    {
        return $this->lesser($actual, $asserted) || $this->equal($actual, $asserted);
    }

    /**
     * @return bool
     */
    protected function judgeMediaType()
    {
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $this->actualMediaType = explode("/", $finfo->file($this->filepath))[0];
        return $this->equal($this->assertedMediaType, $this->actualMediaType);
    }

    /**
     * @return bool
     */
    protected function judgeMediaTypeSubtype()
    {
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $this->actualMediaTypeSubtype = explode("/", $finfo->file($this->filepath))[1];
        return $this->equal($this->assertedMediaTypeSubtype, $this->actualMediaTypeSubtype);
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
     * @return bool
     */
    protected function judgeMinFileSize()
    {
        $this->actualFileSize = filesize($this->filepath);
        return $this->greaterEquals($this->actualFileSize, $this->assertedMinFileSize);
    }

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
     * @param string $assertedMediaTypeSubtype
     * @return $this
     */
    public function setAssertedMediaTypeSubtype($assertedMediaTypeSubtype)
    {
        $this->assertedMediaTypeSubtype = $assertedMediaTypeSubtype;
        return $this;
    }

    /**
     * @param string $assertedMediaType
     * @return $this
     */
    public function setAssertedMediaType($assertedMediaType)
    {
        $this->assertedMediaType = $assertedMediaType;
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

}