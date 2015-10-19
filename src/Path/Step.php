<?php

namespace Choccybiccy\Pathfinder\Path;

use Choccybiccy\Pathfinder\NodeInterface;

/**
 * Class Step
 * @package Choccybiccy\Pathfinder\Path
 */
class Step
{

    /**
     * @var Step
     */
    protected $parent;

    /**
     * @var NodeInterface
     */
    protected $node;

    /**
     * @param NodeInterface $node
     * @param Step|null $parent
     */
    public function __construct(NodeInterface $node, $parent)
    {
        $this->node = $node;
        $this->parent = $parent;
    }

    /**
     * @return Step|null
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return NodeInterface
     */
    public function getNode()
    {
        return $this->node;
    }
}
