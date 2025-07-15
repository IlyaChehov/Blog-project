<?php

namespace Core\ServiceContainer;

use Exception;

class ServiceContainer
{
    private array $services = [];
    private array $singletons = [];
    private static self $container;

    public function bind(string $key, callable $service): void
    {
        $this->services[$key] = $service;
    }

    public function bindSingleton(string $key, callable $service): void
    {
        $this->services[$key] = $service;
        $this->singletons[$key] = null;
    }

    /**
     * @template T
     * @param class-string<T> $key
     * @return T
     * @throws Exception
     */
    public function getServices(string $key)
    {
        if (!isset($this->services[$key])) {
            throw new Exception("Service not found: {$key}");
        }

        if (array_key_exists($key, $this->singletons)) {
            if ($this->singletons[$key] === null) {
                $this->singletons[$key] = call_user_func($this->services[$key]);
            }
            return $this->singletons[$key];
        }
        return call_user_func($this->services[$key]);
    }

    public static function setContainer(ServiceContainer $container): void
    {
        static::$container = $container;
    }

    public static function getContainer(): ServiceContainer
    {
        return static::$container;
    }
}