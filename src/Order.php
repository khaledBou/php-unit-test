<?php


class Order
{

    /**
     * @var int
     */
    public $amount = 0;

    /**
     * @var
     */
    protected $gateway;

    public function __construct($gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * @return boolean
     */
    public function process() {
        return $this->gateway->charge($this->amount);
    }
}
