<?php

namespace Choccybiccy\Pathfinder\Set;

use Choccybiccy\Pathfinder\NodeInterface;

/**
 * Class Item
 * @package Choccybiccy\Pathfinder\Set
 */
class Item
{

    /**
     * @var NodeInterface
     */
    protected $node;

    /**
     * @var int
     */
    protected $g;

    /**
     * @var int
     */
    protected $f;

    /**
     * @param NodeInterface $node
     * @param int $g
     * @param int $f
     */
    public function __construct(NodeInterface $node, $g, $f)
    {
        $this->node = $node;
        $this->g = $g;
        $this->f = $f;
    }

    /**
     * @return NodeInterface
     */
    public function getNode()
    {
        return $this->node;
    }

    /**
     * @return int
     */
    public function getG()
    {
        return $this->g;
    }

    /**
     * @return int
     */
    public function getF()
    {
        return $this->f;
    }
}
