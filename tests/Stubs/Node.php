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
    public function getNeighbours()
    {
        $nodes = [];
        $coordinates = [
            [$this->x+1, $this->y],   // Right
            [$this->x+1, $this->y+1],   // Bottom right
            [$this->x, $this->y+1],   // Bottom
            [$this->x-1, $this->y-1],   // Bottom left
            [$this->x-1, $this->y],   // Left
            [$this->x-1, $this->y-1],   // Top left
            [$this->x, $this->y-1],   // Top
            [$this->x+1, $this->y-1],   // Top right
        ];
        foreach ($coordinates as $axis) {
            if ($axis[0] > 0 && $axis[1] > 0) {
                $nodes[] = new Node($axis[0], $axis[1]);
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
