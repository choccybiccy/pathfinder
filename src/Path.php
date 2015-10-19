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
     */
    public function run()
    {

        $start = $this->start;
        $goal = $this->goal;

        $open = new Set([$start], function(NodeInterface $node) use ($goal) {
            $this->getHeuristic($goal, $node);
        });
        $closed = new Set();

        $open->add($start);

        $step = new Step($start, null);

        while(!$open->isEmpty()) {

            $current = $open->current();
            echo $current->getNode() . "\n";

            if($current->getNode() == $goal) {
                break;
            }

            $closed->add($current->getNode());

            $neighbours = $current->getNode()->getAdjacentNodes();
            foreach($neighbours as $neighbour) {

                // Check if already evaluated
                if($closed->has($neighbour)) {
                    die("HERE");
                    continue;
                }

                $distance = $this->getHeuristic($current->getNode(), $neighbour);
                $score = $current->getG() + $distance;

                if(!$open->has($neighbour)) {
                    $open->add($neighbour, $distance);
                } elseif($score >= $open->get($neighbour)->getG()) {
                    continue;
                }

                $step = new Step($neighbour, $step);

            }
        }

        die(":(");

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
