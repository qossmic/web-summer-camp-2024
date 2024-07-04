<?php

namespace Workshop;

use Psr\Container\ContainerInterface;
use Workshop\Starfleet\Device\Warp;

class Starfleet implements ContainerInterface
{
    private array $starfleet = [];

    public function set($id, $object, array $config = [])
    {
        $this->starfleet[$id] = $this->make($object, $config);
    }

    public function get(string $id)
    {
        return $this->starfleet[$id];
    }

    public function has(string $id): bool
    {
        return isset($this->starfleet[$id]);
    }

    private function make($object, $config = [])
    {
        $reflectionClass = new \ReflectionClass($object);

        $args = [];

        $parameters = $reflectionClass->getConstructor() ? $reflectionClass->getConstructor()->getParameters() : [];

        $i = 0;
        foreach ($parameters as $parameter) {

            if(isset($config[$i])){
                $args[] = $config[$i];
            } else {
                if (!$parameter->getType()->isBuiltin()) {
                    $args[] = $this->make($parameter->getType()->getName(), $config);
                }
            }

            $i++;
        }

        return $reflectionClass->newInstance(...$args);
    }
}