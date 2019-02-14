<?php

namespace Building;

use LIB\BuildingAction\BuildingActions;

/**
 * Class BaseBuilding
 * @package Building
 */
class BaseBuilding implements BuildingInterface
{

    use BuildingActions;

    /**
     * @var int
     */
    protected $health;

    /**
     * @var int
     */
    protected $damage;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $hit = false;

    /**
     * @var bool
     */
    protected $target = false;

    public function __construct ($building = null)
    {
        if ($building) {
            $this->health = $building['health'];
            $this->name = $building['name'];
            $this->damage = $building['damage'];
        }
    }

    /**
     * @return int
     */
    public function getHealth ()
    {
        return $this->health;
    }

    /**
     * @param int $health
     * @return BaseBuilding
     */
    public function setHealth ($health)
    {
        $this->health = $health;
        return $this;
    }

    /**
     * @return int
     */
    public function getDamage ()
    {
        return $this->damage;
    }

    /**
     * @param int $damage
     * @return BaseBuilding
     */
    public function setDamage ($damage)
    {
        $this->damage = $damage;
        return $this;
    }

    /**
     * @return string
     */
    public function getName ()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return BaseBuilding
     */
    public function setName ($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return bool
     */
    public function isHit ()
    {
        return $this->hit;
    }

    /**
     * @return bool
     */
    public function isTarget ()
    {
        return $this->target;
    }

    /**
     * @param $target
     * @return $this
     */
    public function setTarget($target) {
        $this->target = $target;
        return $this;
    }

}
