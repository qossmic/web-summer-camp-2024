<?php

namespace Workshop;

use Psr\Container\ContainerInterface;
use Workshop\Starfleet\Device\Warp;

class Starfleet implements ContainerInterface
{
    private array $starfleet = [];

    public function set($id, $object)
    {
        $this->starfleet[$id] = $this->make($object);
    }

    public function get(string $id)
    {
        return $this->starfleet[$id];
    }

    public function has(string $id): bool
    {
        return isset($this->starfleet[$id]);
    }

    private function make($object)
    {
        $reflectionClass = new \ReflectionClass($object);

        $args = [];

        $parameters = $reflectionClass->getConstructor()? $reflectionClass->getConstructor()->getParameters(): [];

        foreach ($parameters as $parameter){
            if(!$parameter->getType()->isBuiltin()){
                $args[] = $this->make($parameter->getType()->getName());
            }
        }

        return $reflectionClass->newInstance(...$args);
    }
}