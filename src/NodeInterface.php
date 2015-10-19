<?php

namespace Choccybiccy\Pathfinder;

/**
 * Interface NodeInterface
 * @package Choccybiccy\Pathfinder
 */
interface NodeInterface
{

    /**
     * Fetch an array of adjacent nodes
     *
     * @return NodeInterface[]
     */
    public function getAdjacentNodes();

    /**
     * @return int
     */
    public function getX();

    /**
     * @return int
     */
    public function getY();

    /**
     * @return int
     */
    public function getCost();
}
