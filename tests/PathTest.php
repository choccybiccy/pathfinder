<?php

namespace Choccybiccy\Pathfinder;

use Choccybiccy\Pathfinder\Stubs\Node;

class PathTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testRun()
    {

        $start = new Node(1,1);
        $goal = new Node(rand(10, 20), rand(10, 20));

        $pathFinder = new Path($start, $goal);
        var_dump($pathFinder->run());die();

    }
}
