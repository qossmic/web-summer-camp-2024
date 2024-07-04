<?php

use Workshop\Starfleet;

error_reporting(E_ALL ^ E_DEPRECATED);

require_once dirname(__DIR__) . '/vendor/autoload.php';


$starfleet = new Starfleet();
$starfleet->set('NCC-1701 D', new Starfleet\Ships\ExplorationVessel\Galaxy());
$starfleet->set('NCC-5567', new Starfleet\Ships\ExplorationVessel\Galaxy());
$starfleet->set('NX-01', new Starfleet\Ships\ExplorationVessel\NX());

dd($starfleet);