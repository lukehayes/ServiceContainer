<?php

require "vendor/autoload.php";

use ServiceContainer\ServiceContainer;
use ServiceContainer\ServiceProvider;

class App extends ServiceProvider
{
    public function boot()
    {
    }

    public function __invoke()
    {
    }
}

$c = new ServiceContainer();
$c->register('app', App::class );

dump($c);
dump($c->get('app'));



