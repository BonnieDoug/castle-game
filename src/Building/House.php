<?php

namespace Building;


use LIB\BuildingAction\BuildingActions;

/**
 * Class House
 * @package Building
 */
class House extends BaseBuilding
{

    /**
     * @var int
     */
    protected $health = 75;

    /**
     * @var int
     */
    protected $maxHealth = 75;
    /**
     * @var int
     */
    protected $damage = 20;

    /**
     * @var string
     */
    protected $name = 'House';

}
