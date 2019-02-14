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
    public function setHealth (int $health);

    /**
     * @return int
     */
    public function getDamage ();

    /**
     * @param int $damage
     * @return BuildingInterface
     */
    public function setDamage (int $damage);

    /**
     * @return string
     */
    public function getName ();

    /**
     * @param string $name
     * @return BuildingInterface
     */
    public function setName (string $name);

    /**
     * @return boolean
     */
    public function isHit ();

    /**
     * @return boolean
     */
    public function isTarget ();

    public function setTarget (bool $target);

}
