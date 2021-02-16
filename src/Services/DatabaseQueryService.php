<?php
namespace ServiceContainer\Service;

use ServiceContainer\ServiceProvider;
use ServiceContainer\Service\DoctrineService;

/**
 * Retrieve a connection to the database through the Doctrine Service class.
 *
 * @package Service;
 */
class DatabaseQueryService extends ServiceProvider
{

    public function boot()
    {
        $conn = new DoctrineService();
        //$this->service = $conn->createQueryBuilder();
    }

    public function __invoke()
    {
        return $this->service;
    }

}

