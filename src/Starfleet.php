<?php

namespace Workshop;

use Psr\Container\ContainerInterface;

class Starfleet implements ContainerInterface
{
    private array $starfleet = [];

    public function set($id, $object)
    {
        $this->starfleet[$id] = $object;
    }

    public function get(string $id)
    {
        return $this->starfleet[$id];
    }

    public function has(string $id): bool
    {
        return isset($this->starfleet[$id]);
    }
}