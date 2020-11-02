<?php

require "vendor/autoload.php";

use ServiceContainer\ServiceContainer;
use ServiceContainer\ServiceProvider;

class App implements ServiceInterface
{
    public function boot()
    {
    }

    public function __invoke()
    {
    }
}


$p = new ServiceProvider();

//$p->register('app', App::class );

$c = new ServiceContainer($p);
$c->register('app', App::class );

dump($p);
dump($c);
dump($c->get('app'));



