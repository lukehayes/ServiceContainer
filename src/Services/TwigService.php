<?php
namespace Services;

use ServiceContainer\ServiceProvider;

/**
 * Twig service provider adds the twig templating library available
 * when registered inside the service container.
 *
 * @package Services;
 */
class TwigService extends ServiceProvider
{

    public function boot()
    {
        $loader = new \Twig\Loader\FilesystemLoader('templates');
        $this->service = new \Twig\Environment($loader, []);
    }

    public function __invoke()
    {
        return $this->service;
    }

}

