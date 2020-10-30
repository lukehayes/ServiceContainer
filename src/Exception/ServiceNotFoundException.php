<?php
namespace ServiceContainer\Exception;

use Exception;
use Psr\Container\NotFoundExceptionInterface;

class ServiceNotFoundException extends Exception implements NotFoundExceptionInterface
{

    public function __construct(string $serviceID = null, $message = null, $code = 0, Exception $previous = null) {
        $message = "The service: $serviceID could not be found.";
        parent::__construct($message, $code, $previous);

    }
}

