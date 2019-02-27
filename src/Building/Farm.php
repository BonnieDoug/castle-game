<?php

namespace Building;


use LIB\BuildingAction\BuildingActions;

/**
 * Class Farm
 * @package Building
 */
class Farm extends BaseBuilding
{

    /**
     * @var int
     */
    protected $health = 50;

    /**
     * @var int
     */
    protected $maxHealth = 50;
    /**
     * @var int
     */
    protected $damage = 25;

    /**
     * @var string
     */
    protected $name = 'Farm';

}
