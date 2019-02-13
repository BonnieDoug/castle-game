<?php

namespace LIB\BuildingAction;

/**
 * Trait BuildingActions
 * @package LIB\BuildingAction
 */
trait BuildingActions {
    /**
     *
     */
    public function hit()
    {
        $this->health -= $this->damage;
    }
}