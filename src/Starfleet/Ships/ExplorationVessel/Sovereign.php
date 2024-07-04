<?php

namespace Workshop\Starfleet\Ships\ExplorationVessel;

use Workshop\Starfleet\Device\Warp;

class Sovereign
{
    public function __construct(
        private Warp $drive
    )
    {
    }
}