<?php 
namespace ServiceContainer;

/**
 * Service Provider is an abstract class based around the adapter pattern 
 * that is designed to be used as a wrapper around third party functionality
 * making it available in your own code base.
 *
 * @package ServiceContainer
 */
abstract class ServiceProvider 
{
    /**
     * @var Object | NULL The underlying instance of the service.
     */
    protected $service = NULL;

    /**
     * Any setup for the service should be defined in this method.
     *
     * @return void
     */
    abstract public function boot();
    
    /**
     * __invoke() magic method has been defined as abstract here
     * so that all services will return the service property
     * when it has been called.
     *
     * i.e return $this->service;
     *
     * @return mixed Access to the underlying service.
     */
    public function __invoke()
    {
        return $this->service;
    }
}

