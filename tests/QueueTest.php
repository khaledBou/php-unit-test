<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase {

    protected $queue;

    /**
     * The setUp method is run before every single test method
     */
    protected function setUp(): void
    {
        $this->queue = new Queue;
    }

    protected function tearDown(): void
    {
        unset($this->queue);
    }

    public function testNewQueueIsEmpty() {
        $this->assertEquals(0, $this->queue->getCount());
    }


    public function testAnItemIsAddedToTheQueue() {
        $this->queue->push('green');
        $this->assertEquals(1, $this->queue->getCount());
    }


    public function testAnItemIsRemovedFromTheQueue() {
        $this->queue->push('green');
        $this->queue->pop();
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue() {
        $this->queue->push('first');
        $this->queue->push('second');
        $this->assertEquals('first', $this->queue->pop());
    }

}
