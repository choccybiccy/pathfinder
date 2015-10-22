<?php

namespace Choccybiccy\Pathfinder\Set;

/**
 * Class ItemTest
 * @package Choccybiccy\Pathfinder\Set
 */
class ItemTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test construct and gets work
     */
    public function testGets()
    {

        $node = $this->getMock('Choccybiccy\Pathfinder\NodeInterface');
        $g = rand(1, 10);
        $f = rand(1, 10);

        $item = new Item($node, $g, $f);

        $this->assertEquals($node, $item->getNode());
        $this->assertEquals($g, $item->getG());
        $this->assertEquals($f, $item->getF());

    }
}
