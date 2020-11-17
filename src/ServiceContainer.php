<?php
namespace ServiceContainer;

use Psr\Container\ContainerInterface; 
use ServiceContainer\Exception\ServiceNotFoundException;
use ServiceContainer\ServiceProvider;

/**
 * Service Container holds all of the services that extend ServiceContainer\ServiceProvider and
 * have been registered inside it.
 *
 * @package ServiceContainer
 */
class ServiceContainer implements ContainerInterface
{
    /* @var array<Object> All of the services available to the service container.*/
    private $services = [];

    public function __construct() 
    {
        //$this->initialize();
    }

    /**
     * Instantiate all of the services available inside the service provider.
     *
     * @return void
     */
    public function initialize() 
    {
        foreach ($this->services as $key => $service) {
            $serviceInstance = new $service();
            $serviceInstance->boot();
            $this->services[$key] = $serviceInstance;
        }
    }

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @throws NotFoundExceptionInterface  No entry was found for **this** identifier.
     * @throws ContainerExceptionInterface Error while retrieving the entry.
     *
     * @return mixed Entry.
     */
    public function get($id)
    {
        if (!array_key_exists($id, $this->services)) {
            throw new ServiceNotFoundException($id);
        }else {
            // Adding the () calls the services __invoke() magic method
            // TODO Tidy the invoke call up
            return $this->services[$id]();
        }
    }

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * `has($id)` returning true does not mean that `get($id)` will not throw an exception.
     * It does however mean that `get($id)` will not throw a `NotFoundExceptionInterface`.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return bool
     */
    public function has($id)
    {
        return isset($this->services[$id]) ?? 0;
    }

    /**
     * Register a service to the service container so that it is available to use.
     *
     * @param string $id Identifier of the entry to registered.
     *
     * @param string $service The service to registered inside the container.
     *
     */
    public function register($id, $service) 
    {
        if ($this->has($id)) {
            return false;
        }else {
            $this->services[$id] = new $service;
            $this->services[$id]->boot();
            return true;
        }
    }
}
