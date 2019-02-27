<?php

namespace Building;

/**
 * Interface BuildingInterface
 * @package Building
 */
interface BuildingInterface
{

    /**
     * @return int
     */
    public function getHealth ();

    /**
     * @param int $health
     * @return BuildingInterface
     */
    public function setHealth ($health);

    /**
     * @return int
     */
    public function getMaxHealth ();

    /**
     * @param $maxHealth
     * @return int
     */
    public function setMaxHealth ($maxHealth);

    /**
     * @return int
     */
    public function getDamage ();

    /**
     * @param int $damage
     * @return BuildingInterface
     */
    public function setDamage ($damage);

    /**
     * @return string
     */
    public function getName ();

    /**
     * @param string $name
     * @return BuildingInterface
     */
    public function setName ($name);

    /**
     * @return boolean
     */
    public function isHit ();

    /**
     * @return boolean
     */
    public function isTarget ();

    public function setTarget ($target);

}
