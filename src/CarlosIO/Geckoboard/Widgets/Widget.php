<?php
namespace CarlosIO\Geckoboard\Widgets;

/**
 * Class Widget
 * @package CarlosIO\Geckoboard\Widgets
 */
abstract class Widget
{
    /**
     * @var string Widget id
     */
    protected $id;

    /**
     * Set widget id
     *
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get widget id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Format a number.
     * 
     * If >= 100, will return an int
     * If >= 10 will return a single decimal digit if fractional part, int otherwise
     * If >= 10 will return a single decimal digit if fractional part, int otherwise
     */
    public function formatNumber($x)
    {
		if ($x >= 0.1) $nDigits = 3;
		if ($x >= 1) $nDigits = 2;
		if ($x >= 10) $nDigits = 1;
        if ($x >= 100) $nDigits = 0;
		return sprintf("%0.${nDigits}f", $x);
    }

    /**
     * Get data in array format
     *
     * @return array
     */
    abstract public function getData();
}
