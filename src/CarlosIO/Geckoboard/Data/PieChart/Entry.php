<?php
namespace CarlosIO\Geckoboard\Data\PieChart;

/**
 * Class Entry
 * @package CarlosIO\Geckoboard\Data\PieChart
 */
class Entry
{
    /**
     * @var
     */
    protected $value = null;
    /**
     * @var
     */
    protected $label = null;
    /**
     * @var
     */
    protected $colour = null;

    /**
     * @param $colour
     */
    public function setColour($colour)
    {
        $this->colour = $colour;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getColour()
    {
        return $this->colour;
    }

    /**
     * @param $label
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    public function toArray()
    {
        $result = array();
        $label = $this->getLabel();
        if (null !== $label) {
            $result['label'] = $label;
        }

        $value = $this->getValue();
        if (null !== $value) {
            $result['value'] = $value;
        }

        $colour = $this->getColour();
        if (null !== $colour) {
            $result['colour'] = $colour;
        }

        return $result;
    }
}