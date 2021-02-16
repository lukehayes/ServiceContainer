<?php
namespace ServiceContainer\Services;

use ServiceContainer\ServiceProvider;
use Doctrine\DBAL\DriverManager;

/**
 * Doctrine service provider adds the Doctrine database abstraction layer
 * as a service once registered inside the service container.
 *
 * @package Services;
 */
class DoctrineService extends ServiceProvider
{

    public function boot()
    {
        $connectionParams = array(
            'user' => '',
            'password' => '',
            'driver' => 'pdo_sqlite',
            'path' => './database.sqlite'
        );

        $config = new \Doctrine\DBAL\Configuration();

        $this->service = DriverManager::getConnection($connectionParams, $config);
    }

    public function getQueryBuilder()
    {
        return $this->service->createQueryBuilder();
    }

    public function __invoke()
    {
        return $this->service;
    }

}

