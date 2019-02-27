<?php

namespace Game;

use Building\BaseBuilding;
use Building\Castle;
use Building\Farm;
use Building\House;

/**
 * Class Play
 * @package Game
 */
class Play
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var array
     */
    private $buildings = [];

    /**
     * @var bool
     */
    private $hit = false;

    /**
     * @var int
     */
    private $progress = 600;

    /**
     * @var int
     */
    private $maxHealth = 600;

    /**
     * Play constructor.
     * @param int $castleCount
     * @param int $houseCount
     * @param int $farmCount
     */
    public function __construct ($castleCount = 1, $houseCount = 4, $farmCount = 4)
    {
        $this->setId();
        $this->buildCity($castleCount, $houseCount, $farmCount);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Play
     */
    public function setId($id = null)
    {
        if (!$id) {
            $id = uniqid();
        }
        $this->id = $id;
        return $this;
    }

    /**
     * @param int $repeat
     */
    public function attack ($repeat = 1)
    {
        for ($i = 0; $i < $repeat; $i++) {
            $building = $this->buildings[array_rand($this->buildings)];
            $building->setTarget(true);
            if (rand(0,99) > 9) {
                $building->hit();
                $this->hit = true;
            } else {
                $this->hit = false;
            }
        }
        $this->setProgress();
    }

    /**
     * @param $castleCount
     * @param $houseCount
     * @param $farmCount
     */
    public function buildCity ($castleCount, $houseCount, $farmCount)
    {
        $this->buildings[] = $castleCount ? new Castle() : null;
        for ($i = 0; $i < $houseCount; $i++) {
            $this->buildings[] = new House();
        }
        for ($i = 0; $i < $farmCount; $i++) {
            $this->buildings[] = new Farm();
        }
        $this->maxHealth = $this->calculateHealth();
    }

    /**
     * @return array
     */
    public function getBuildings ()
    {
        return $this->buildings;
    }

    /**
     * @param $buildings
     * @return $this
     */
    public function setBuildings ($buildings)
    {
        $this->buildings = [];
        foreach ($buildings as $building) {
            $this->buildings[] = new BaseBuilding($building);
        }
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
     * @return int
     */
    public function getMaxHealth () {
        return $this->maxHealth;
    }

    /**
     * @param $maxHealth
     * @return $this
     */
    public function setMaxHealth ($maxHealth) {
        $this->maxHealth = $maxHealth;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProgress ()
    {
        return $this->progress;
    }

    /**
     * @param mixed $progress
     * @return Play
     */
    public function setProgress ()
    {
        $this->progress = $this->calculateHealth();
        return $this;
    }

    /**
     * @return mixed
     */
    public function calculateHealth () {
        return array_reduce($this->getBuildings(), function($in, $building){
            return $in += $building->getHealth();
        });
    }

}
