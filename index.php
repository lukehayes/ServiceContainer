<?php

require "vendor/autoload.php";

use ServiceContainer\ServiceContainer;
use ServiceContainer\ServiceProvider;
use Services\TwigService;
use Services\DoctrineService;

$c = new ServiceContainer();

$c->register('twig', TwigService::class);
$c->register('doctrine', DoctrineService::class);

$db = $c->get('doctrine')->fetchAll("select * from posts");

dump($db);



