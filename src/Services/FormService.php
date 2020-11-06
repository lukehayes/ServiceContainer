<?php
namespace Services;

use ServiceContainer\ServiceProvider;
use Nette\Forms\Form;

/**
 * Form service provider adds the Nette\Form library.
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

