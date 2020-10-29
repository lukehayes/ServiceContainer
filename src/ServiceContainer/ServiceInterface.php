<?php
namespace ServiceContainer;

/**
 * Wrapper interface that all services should implement
 */
interface ServiceInterface {
    
    /**
     * Any setup for the service should be defined in this method.
     *
     * @return void
     */
    public function boot();
    
    /**
     * __invoke() magic method has been defined as abstract here
     * so that all services will return the service property
     * when it has been called.
     *
     * i.e return $this->service;
     *
     * @return mixed Access to the underlying service.
     */
    public function __invoke();
}

