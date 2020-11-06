<?php
require "vendor/autoload.php";

use ServiceContainer\ServiceContainer;
use Services\TwigService;
use Services\DoctrineService;
use Services\FormService;

$c = new ServiceContainer();
$c->register('twig', TwigService::class);
$c->register('doctrine', DoctrineService::class);
$c->register('form', FormService::class);


$form = $c->get('form');

$form->addText('name', 'Name');
$form->addPassword('password', 'Password:');
$form->addSubmit('send', 'Sign up');

$form->render();
