<?php
namespace CarlosIO\Geckoboard\Widgets;

use CarlosIO\Geckoboard\Widgets\Widget;

/**
 * Class NumberAndSecondaryStat
 * @package CarlosIO\Geckoboard\Widgets
 */
class NumberAndSecondaryStat extends Widget
{
    const TYPE_REGULAR = null;
    const TYPE_REVERSE = 'reverse';

    /**
     * @var null Main value
     */
    private $mainValue = null;
    /**
     * @var null Secondary value
     */
    private $secondaryValue = null;
    /**
     * @var null Main value prefix
     */
    private $mainPrefix = null;
    /**
     * @var null Set to 'reversed' to reverse 
     */
    private $type = null;
	/**
	 * @var null Text (only relevant for sparklines?) 
	 */
	private $text = null;

    /**
     * Set data main prefix (€, $, etc.)
     *
     * @param string $mainPrefix
     * @return $this
     */
    public function setMainPrefix($mainPrefix)
    {
        $this->mainPrefix = $mainPrefix;

        return $this;
    }

    /**
     * Get data main prefix (€, $, etc.)
     *
     * @return string
     */
    public function getMainPrefix()
    {
        return $this->mainPrefix;
    }

    /**
     * Set main value
     *
     * @param int $mainValue
     * @return $this
     */
    public function setMainValue($mainValue)
    {
        $this->mainValue = $mainValue;

        return $this;
    }

    /**
     * Get main value
     *
     * @return int
     */
    public function getMainValue()
    {
        return $this->mainValue;
    }

    /**
     * Set secondary value
     *
     * @param int|array(int) $secondaryValue
     * @return $this
     */
    public function setSecondaryValue($secondaryValue)
    {
        $this->secondaryValue = $secondaryValue;

        return $this;
    }

    /**
     * Get secondary value
     *
     * @return string
     */
    public function getSecondaryValue()
    {
        return $this->secondaryValue;
    }

    /**
     * @param string|null $prefix
     */
    public function setType($prefix)
    {
        $this->type = $prefix;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

	/**
	 * @param string|null $text
	 */
	public function setText($text)
	{
		$this->text = $text;
	}

	/**
	 * @return string|null
	 */
	public function getText()
	{
		return $this->text;
	}

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        $data = array(
            'text' => $this->getText(),
            'value' => Widget::formatNumber($this->getMainValue()),
        );
        $prefix = $this->getMainPrefix();
        if (null !== $prefix) {
            $data['prefix'] = (string) $prefix;
        }

        $result = array(
            'item' => array($data),
            'type' => $this->getType(),
        );
        $secondaryValue = $this->getSecondaryValue();
        if (null !== $secondaryValue) {
			if (is_array($secondaryValue)) {
				// sparkline
				$result['item'][] = $secondaryValue;
			} else {
				// secondary text
				$result['item'][] = array(
					'text' => '',
					'value' => Widget::formatNumber($secondaryValue),
				);
			}
        }
		
        return $result;
    }
}
