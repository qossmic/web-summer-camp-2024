<?php

use Workshop\Starfleet;
use Workshop\Starfleet\Ships\ExplorationVessel\Galaxy;
use Workshop\Starfleet\Ships\ExplorationVessel\NX;

error_reporting(E_ALL ^ E_DEPRECATED);

require_once dirname(__DIR__) . '/vendor/autoload.php';


$starfleet = new Starfleet();
$starfleet->set('NCC-1701 D', Galaxy::class);
$starfleet->set('NX-01', NX::class);

dd($starfleet);