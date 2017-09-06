<?php
namespace Tests\Framework\Modules;

use Framework\Router;

class StringModules
{
    public function __construct(Router $router)
    {
        $router->get('/demo', function () {
            return 'DEMO';
        }, 'demo');
    }
}