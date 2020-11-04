# Service Container

#### MVP-Ready Branch

This branch currently includes these services built in:

* Symfony/Twig template library `Services\TwigService`
* Doctrine/DBAL database library `Services\DoctrineService`

---


This is my simple service container that I have abstracted out of another project.

The goal of this project is to give me a way to add other projects code by wrapping it in the container 
and making them available to my own projects enabling me to build projects a lot more quickly.

## Usage

Clone the repository first then `cd` into it and run `composer install` to install all of its dependencies.

When the project is ready, create a class that extends ServiceContainer\ServiceProvider class and setup the to-be wrapped object code inside the ServiceProvider::boot() method:

#### Example using twig:

```php
<?php

    use ServiceContainer\ServiceProvider;

    class TwigService extends ServiceProvider
    {
        public function boot()
        {
            $loader = new \Twig\Loader\FilesystemLoader('templates');
            $this->service = new \Twig\Environment($loader, []);
        }
    }
```

Then register the newly created service into the service container:

```php
<?php

    use ServiceContainer\ServiceContainer;

    $container = new ServiceContainer();

    $container->register('twig', TwigService::class );
    
    // The object can be retrieved like this:
    $twig = $container->get('twig');
```
Behind the scenes, the __invoke() magic method has been called on the wrapped ServiceProvider instance and gives access to that services underlying functionality.
