<?php
namespace CarlosIO\Geckoboard\Data\ListChart;

/**
 * Class Entry
 * @package CarlosIO\Geckoboard\Data\ListChart
 */

class Entry
{
	/**
	 * @var string
	 */
	protected $text = null;
	
	/**
	 * @var bool
	 */
	protected $highlight = null;
	
	/**
	 * @var string
	 */
	protected $name = null;

	/**
	 * @var string CSS color
	 */
	protected $color = null;

	/**
	 * @var string
	 */
	protected $description = null;

	/**
	 * @param string $text
	 */
	public function setText($text)
	{
		$this->text = $text;
	}

	/**
	 * @return string
	 */
	public function getText()
	{
		return $this->text;
	}

	/**
	 * @param boolean $highlight
	 */
	public function setHighlight($highlight)
	{
		$this->highlight = $highlight;
	}

	/**
	 * @return boolean
	 */
	public function getHighlight()
	{
		return $this->highlight;
	}

	/**
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $color
	 */
	public function setColor($color)
	{
		$this->color = $color;
	}

	/**
	 * @return string
	 */
	public function getColor()
	{
		return $this->color;
	}

	/**
	 * @param string $description
	 */
	public function setDescription($description)
	{
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}
	

    public function toArray()
    {
        $result = array();
		
		$name = $this->getName();
		if (null !== $name) {
            $result['label']['name'] = $name;
        }
		
		$color = $this->getName();
		if (null !== $color) {
			$result['label']['color'] = $color;
		}
		
		$text = $this->getText();
		if (null !== $text) {
			$result['title']['text'] = $text;
		}
		
		$highlight = $this->getHighlight();
		if (null !== $highlight) {
			$result['title']['highlight'] = $highlight;
		}

		$description = $this->getDescription();
		if (null !== $description) {
			$result['description'] = $description;
		}

        return $result;
    }
}