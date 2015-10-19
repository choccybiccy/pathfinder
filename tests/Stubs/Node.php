<?php

namespace Choccybiccy\Pathfinder\Stubs;

use Choccybiccy\Pathfinder\NodeInterface;

/**
 * Class Node
 * @package Choccybiccy\Pathfinder\Stubs
 */
class Node implements NodeInterface
{

    /**
     * @var int
     */
    protected $x;

    /**
     * @var int
     */
    protected $y;

    /**
     * @var int
     */
    protected $cost = 0;

    /**
     * @param int $x
     * @param int $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return Node[]
     */
    public function getAdjacentNodes()
    {
        $nodes = [];
        $directions = ["x" => [-1, 1], "y" => [-1, 1]];
        foreach($directions['x'] as $x) {
            $newX = $this->x + $x;
            if($newX > 0) {
                $nodes[] = new Node($newX, $this->y);
            }
        }
        foreach($directions['y'] as $y) {
            $newY = $this->y + $y;
            if($newY > 0) {
                $nodes[] = new Node($this->x, $newY);
            }
        }
        return $nodes;
    }

    /**
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @return int
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->x . "," . $this->y;
    }
}
