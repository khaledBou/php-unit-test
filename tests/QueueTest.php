<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase {

    public function testNewQueueIsEmpty() {
        $queue = new Queue;
        $this->assertEquals(0, $queue->getCount());
    }

}
