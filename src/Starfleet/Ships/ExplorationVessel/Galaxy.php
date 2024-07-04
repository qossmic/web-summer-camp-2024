<?php

namespace Workshop\Starfleet\Ships\ExplorationVessel;


use Workshop\Starfleet\Device\Warp;
use Workshop\Starfleet\Ships\Starship;

class Galaxy implements Starship
{

    public function __construct(
        private string $registration,
        private string $name,
        private Warp $drive
    )
    {
    }

    public function getRegistration(): string
    {
        return $this->registration;
    }

    public function getName(): string
    {
        return $this->name;
    }
}