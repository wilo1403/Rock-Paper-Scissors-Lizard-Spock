<?php

namespace Uniqoders\Game\Console;

interface StatsInterface{
    public function getStats(): array;
    public function setDrawCUp():void;
    public function setVictoryCUp():void;
    public function setDefeatCUp():void;
    public function setDrawPUp():void;
    public function setVictoryPUp():void;
    public function setDefeatPUp():void;
    public function return_array():array;
}