<?php
namespace Services;

use ServiceContainer\ServiceProvider;
use Nette\Forms\Form;

/**
 * Form service provider adds the Nette\Form library.
 *
 * TODO Additionally, a Form Factory Service would be nice to work with 
 * similar to Symfony where a pre-defined form could be injected into the template.
 *
 * @package Services;
 */
class FormService extends ServiceProvider
{

    public function boot()
    {
        $this->service = new Form();
    }

    public function __invoke()
    {
        return $this->service;
    }

}

