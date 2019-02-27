<?php

namespace Building;


use LIB\BuildingAction\BuildingActions;

/**
 * Class Castle
 * @package Building
 */
class Castle extends BaseBuilding
{

    /**
     * @var int
     */
    protected $health = 100;

    /**
     * @var int
     */
    protected $maxHealth = 100;

    /**
     * @var int
     */
    protected $damage = 10;

    /**
     * @var string
     */
    protected $name = 'Castle';



}
