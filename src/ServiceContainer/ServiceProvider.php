<?php 
namespace ServiceContainer;

/**
 * Load all of the services in this file
 */
class ServiceProvider 
{
    /**
     * ---------------------------------------------------
     * Service Providers
     * ---------------------------------------------------
     *
     */
    public $services = [
        /** 
         * Example:
         *
         * Twig service
         *
         * 'twig'=> \Symfony\Service\TwigService::class
         */
    ];


    /**
     * Register a new service inside the service provider. This method 
     * is meant to be used when defined as an object inside another class.
     *
     * @param string $key The name of the key to register the service with.
     * @param string $class The name of the class to register.
     *
     * @return bool
     */
    public function register(string $key, string $class) 
    {
        if(array_key_exists($key, $this->services)) {
            return false;
        } else {
            $this->services[$key] = $class;
            return true;
        }
    }
}

