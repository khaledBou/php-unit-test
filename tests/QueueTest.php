<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    /**
     * @var Queue
     *
     * L'accès aux éléments protégés est limité à la classe elle-même, ainsi qu'aux classes qui en héritent et parente.
     *
     * Declaring class properties or methods as static makes them accessible without needing an instantiation of the class. A property declared as static cannot be accessed with an instantiated class object
     */
    protected static $queue;

    /**
     * The setUp method is run before every single test method
     */
    protected function setUp(): void
    {
        static::$queue->clear();
    }

    protected function tearDown(): void
    {

    }

    /**
     * Le fait de déclarer des propriétés ou des méthodes comme statiques vous permet d'y accéder sans avoir besoin d'instancier la classe
     * On ne peut pas accéder à des propriétés statiques à travers l'objet en utilisant l'opérateur ->.
     */
    public static function setUpBeforeClass(): void
    {
        /**
         * static::$queue, puisque $queue est statique, on utilise l'operateur :: pour y acceder
         */
        static::$queue = new Queue;
    }

    public static function tearDownAfterClass(): void
    {
        static::$queue = null;
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, static::$queue->getCount());
    }


    public function testAnItemIsAddedToTheQueue()
    {
        static::$queue->push('green');
        $this->assertEquals(1, static::$queue->getCount());
    }


    public function testAnItemIsRemovedFromTheQueue()
    {
        static::$queue->push('green');
        static::$queue->pop();
        $this->assertEquals(0, static::$queue->getCount());
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        static::$queue->push('first');
        static::$queue->push('second');
        $this->assertEquals('first', static::$queue->pop());
    }

    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }
        $this->assertEquals(Queue::MAX_ITEMS, static::$queue->getCount());
    }

    public function testExceptionThrowWhenAddingAnItemToFullQueue()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }

        $this->expectException(QueueException::class);

        $this->expectExceptionMessage("Queue is full");

        static::$queue->push("wafer thin min");
    }
}
