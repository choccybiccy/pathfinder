<?php

namespace Choccybiccy\Pathfinder;

use Choccybiccy\Pathfinder\Path\Step;

/**
 * Class Path
 * @package Choccybiccy\Pathfinder
 */
class Path
{

    /**
     * @var NodeInterface
     */
    protected $start;

    /**
     * @var NodeInterface
     */
    protected $goal;

    /**
     * Constructor
     *
     * @param NodeInterface $start
     * @param NodeInterface $goal
     */
    public function __construct(NodeInterface $start, NodeInterface $goal)
    {
        $this->start = $start;
        $this->goal = $goal;
    }

    /**
     * Run the pathfinder algorithm
     *
     * @return \SplStack
     */
    public function run()
    {

        $start = $this->start;
        $goal = $this->goal;

        $open = new Set([$start], function (NodeInterface $node) use ($goal) {
            return $this->getHeuristic($goal, $node);
        });
        $closed = new Set();

        $open->add($start);

        $path = new \SplStack();

        $step = null;

        while (!$open->isEmpty()) {
            $current = $open->current();
            $path->push($current->getNode());
            $step = new Step($current->getNode(), $step);

            if ($current->getNode() == $goal) {
                break;
            }

            $closed->add($current->getNode());

            $neighbours = $current->getNode()->getNeighbours();
            foreach ($neighbours as $neighbour) {
                if ($closed->has($neighbour)) {
                    continue;
                }
                if (!$open->has($neighbour)) {
                    $open->add(
                        $neighbour,
                        $this->getHeuristic($current->getNode(), $neighbour) + $neighbour->getCost()
                    );
                }

            }

        }

        return $path;

    }

    /**
     * @param NodeInterface $node
     * @return string
     */
    protected function getNodeKey(NodeInterface $node)
    {
        return $node->getX() . "," . $node->getY();
    }

    /**
     * @return NodeInterface
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return NodeInterface
     */
    public function getGoal()
    {
        return $this->goal;
    }

    /**
     * @param NodeInterface $goal
     * @param NodeInterface $current
     * @return number
     */
    protected function getHeuristic(NodeInterface $goal, NodeInterface $current)
    {
        return abs($goal->getX() - $current->getX()) + abs($goal->getY() - $current->getY());
    }
}
