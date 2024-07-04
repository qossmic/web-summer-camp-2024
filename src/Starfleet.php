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
                    if(!$this->has($parameter->getType()->getName())){
                        $this->set($parameter->getType()->getName(),$parameter->getType()->getName(),[]);
                    }
                    $args[] = $this->get($parameter->getType()->getName());
                }
            }

            $i++;
        }

        return $reflectionClass->newInstance(...$args);
    }
}