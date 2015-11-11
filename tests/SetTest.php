<?php

namespace Choccybiccy\Pathfinder;

use Choccybiccy\Pathfinder\Stubs\Node;

/**
 * Class SetTest
 * @package Choccybiccy\Pathfinder
 */
class SetTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test constructor adds nodes and the heuristic callback
     */
    public function testConstruct()
    {
        $nodes = [
            new Node(1, 1)
        ];
        $heuristic = function (NodeInterface $node) {
            return rand(1, 10);
        };
        $set = new Set($nodes, $heuristic);
        $this->assertEquals($heuristic, $set->getHeuristic());
        $this->assertEquals(current($nodes), current($set->getItems())->getNode());
    }
}
