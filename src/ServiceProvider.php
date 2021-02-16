<?php 
namespace ServiceContainer;

/**
 * ServiceProvider is an wrapper class based around the Adapter Pattern.
 * It is intended to be implemented by any third party functionality
 * that the user wants to make available inside their application.
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

