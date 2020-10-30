# Service Container

This is my simple service container that I have abstracted out of another project.

The goal of this project is to give me a way to add other projects code by wrapping it in the container 
and making them available to my own projects enabling me to build projects a lot more quickly.

## Usage

Create a class that extends ServiceContainer\ServiceProvider and setup the to be wrapped object code
in the ServiceProvider::boot() method:

```php
<?php

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
```

Then register the newly created service into the service container:

```php
<?php

    $container = new ServiceContainer();
    $container->register('twig', TwigService::class );
    
    // The object can be retrieved like this:
    $twig = $container->get('twig');

```
