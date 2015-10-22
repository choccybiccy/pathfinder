<?php

namespace Choccybiccy\Pathfinder\Path;

/**
 * Class StepTest
 * @package Choccybiccy\Pathfinder\Path
 */
class StepTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testGets()
    {
        $node = $this->getMock('Choccybiccy\Pathfinder\NodeInterface');
        $parent = new Step($node, null);
        $step = new Step($node, $parent);
        $this->assertEquals($node, $parent->getNode());
        $this->assertEquals($parent, $step->getParent());
    }
}
