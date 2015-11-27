<?php

namespace Choccybiccy\Pathfinder;

use Choccybiccy\Pathfinder\Stubs\Node;

/**
 * Class PathTest
 * @package Choccybiccy\Pathfinder
 */
class PathTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test construct sets start/goal
     */
    public function testConstruct()
    {
        $start = $this->getMock('Choccybiccy\Pathfinder\NodeInterface');
        $goal = $this->getMock('Choccybiccy\Pathfinder\NodeInterface');
        $path = new Path($start, $goal);
        $this->assertEquals($path->getStart(), $path->getGoal());
    }

    /**
     * Test run goes along the expected path
     */
    public function testRun()
    {

        $start = new Node(2, 2);
        $goal = new Node(4, 4);

        $path = new Path($start, $goal);

        $stack = $path->run();

        $step = $stack->bottom();
        $stack->shift();
        $this->assertEquals(2, $step->getX());
        $this->assertEquals(2, $step->getY());

        $step = $stack->bottom();
        $stack->shift();
        $this->assertEquals(3, $step->getX());
        $this->assertEquals(3, $step->getY());

        $step = $stack->bottom();
        $stack->shift();
        $this->assertEquals(4, $step->getX());
        $this->assertEquals(4, $step->getY());

    }
}
