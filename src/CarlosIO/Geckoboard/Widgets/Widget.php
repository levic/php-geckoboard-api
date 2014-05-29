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
     * Format a number with an appropriate number of significant digits.
     */
    static public function formatNumber($x)
    {
		if (abs($x) <= 0.000001) return 0;
		
		$nDigits = 5;
		if (abs($x) >= 0.01) $nDigits = 4;
		if (abs($x) >= 0.1) $nDigits = 3;
		if (abs($x) >= 1) $nDigits = 2;
		if (abs($x) >= 10) $nDigits = 1;
        if (abs($x) >= 100) $nDigits = 0;
		return sprintf("%0.${nDigits}f", $x);
    }

    /**
     * Get data in array format
     *
     * @return array
     */
    abstract public function getData();
}
