<?php

namespace App\Controllers;

use Interop\Container\ContainerInterface;

abstract class Controller
{
    /**
     * The container instance.
     *
     * @var \Interop\Container\ContainerInterface
     */
    protected $container;

    /**
     * Set up controllers to have access to the container.
     *
     * @param \Interop\Container\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function __get( $property)
    {
        if($this->container->{$property})
        return $this->container->{$property};
    }
}
