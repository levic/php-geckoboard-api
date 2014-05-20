<?php
namespace CarlosIO\Geckoboard\Widgets;

use CarlosIO\Geckoboard\Widgets\Widget;

class PieChart extends Widget
{
    protected $dataset = array();

    public function addEntry($entry)
    {
        $this->dataset[] = $entry;
    }

    public function getData()
    {
        $data = array();
        foreach($this->dataset as $entry) {
            $data[] = $entry->toArray();
        }

        $result = array();

        $result['item'] = $data;
        return $result;
    }
}