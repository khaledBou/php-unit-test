<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase {

    public function testNewQueueIsEmpty() {
        $queue = new Queue;
        $this->assertEquals(0, $queue->getCount());

        return $queue;
    }

    /**
     * @depends testNewQueueIsEmpty
     *
     * @param Queue $queue
     */
    public function testAnItemIsAddedToTheQueue(Queue $queue) {
        $queue->push("item");
        $this->assertEquals(1, $queue->getCount());
        return $queue;
    }

    /**
     * @depends testAnItemIsAddedToTheQueue
     *
     * @param Queue $queue
     */
    public function testAnItemIsRemovedFromTheQueue(Queue $queue) {
        $queue->pop();
        $this->assertEquals(0, $queue->getCount());
    }

}
