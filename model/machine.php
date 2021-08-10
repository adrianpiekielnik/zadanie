<?php

class Machine
{
    private $iCurrentState;

    private static $aStates = [
        0 => 'NEUTRAL',
        1 => 'OPEN',
        2 => 'CLOSED',
    ];

    private static $aCoins = [
        1 => '1zł',
        2 => '2zł',
        5 => '5zł',
    ];

    private $iCashBox = 0;
    private $iCandyBox = 0;

    public function __construct()
    {
        $this->iCurrentState = 0;
    }

    public function addCash()
    {
        $this->iCashBox += 2;
    }

    public function addCandy()
    {
        $this->iCandyBox += 1;
    }


    public function removeCandy()
    {
        $this->iCandyBox -= 1;
    }

    public function setStateNeutral()
    {
        $this->iCurrentState = 0;
    }

    public function setStateOpen()
    {
        $this->iCurrentState = 1;
    }

    public function setStateClosed()
    {
        $this->iCurrentState = 2;
    }

    public function getCoinCount()
    {
        return $this->iCashBox;
    }

    public function getCandyCount()
    {
        return $this->iCandyBox;
    }

    public function getState()
    {
        return self::$aStates[$this->iCurrentState];
    }

    public function getStateId()
    {
        return $this->iCurrentState;
    }

    public static function getCoins()
    {
        return self::$aCoins;
    }
}
