<?php

namespace Workshop\Starfleet\Ships\ExplorationVessel;


use Workshop\Starfleet\Device\Warp;

class Galaxy
{

    public function __construct(
        private Warp $drive
    )
    {
    }
}