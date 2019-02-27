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
        if ($this->health > 0) {
            $this->health = $this->health - $this->damage > 0 ? $this->health - $this->damage : 0;
        }
        $this->hit = true;
    }
}
