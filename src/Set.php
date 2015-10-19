<?php

namespace Choccybiccy\Pathfinder;

use Choccybiccy\Pathfinder\Set\Item;

/**
 * Class Set
 * @package Choccybiccy\Pathfinder
 */
class Set
{

    /**
     * @var Item[]
     */
    protected $items = [];

    /**
     * @var callable
     */
    protected $heuristic;

    /**
     * Constructor
     *
     * @param array $nodes
     * @param callable $heuristic
     */
    public function __construct($nodes = [], $heuristic = null)
    {
        if(!is_callable($heuristic)) {
            $heuristic = function(NodeInterface $node) {
                return 1;
            };
        }
        $this->heuristic = $heuristic;
        foreach($nodes as $node) {
            $this->add($node);
        }
    }

    /**
     * Get current item and remove it from the array
     *
     * @return Item
     */
    public function current()
    {
        $items = $this->getSortedItems();
        unset($this->items[key($items)]);
        return current($items);
    }

    /**
     * @return Item[]
     */
    public function getSortedItems()
    {
        $f = [];
        foreach($this->items as $key => $node) {
            $f[$key] = $node->getF();
        }
        array_multisort($f, SORT_ASC, $this->items);
        return $this->items;
    }

    /**
     * @param NodeInterface $node
     * @param int $distanceFromStart
     * @return $this
     */
    public function add(NodeInterface $node, $distanceFromStart = 0)
    {
        $this->items[$this->hash($node)] = new Item($node, $distanceFromStart, $this->heuristic($node));
        return $this;
    }

    /**
     * @param NodeInterface $node
     * @return NodeInterface
     */
    public function remove(NodeInterface $node)
    {
        if($this->has($node)) {
            return $this->items[$this->hash($node)];
        }
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return !(bool) count($this->items);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * @param NodeInterface $node
     * @return bool
     */
    public function has(NodeInterface $node)
    {
        return array_key_exists($this->hash($node), $this->items);
    }

    /**
     * @param NodeInterface $node
     * @return Item|null
     */
    public function get(NodeInterface $node)
    {
        if($this->has($node)) {
            return $this->items[$this->hash($node)];
        }
        return null;
    }

    /**
     * @param NodeInterface $node
     * @return string
     */
    protected function hash(NodeInterface $node)
    {
        return spl_object_hash($node);
    }

    /**
     * @param NodeInterface $node
     * @return mixed
     */
    protected function heuristic(NodeInterface $node)
    {
        return call_user_func($this->heuristic, $node);
    }
}
