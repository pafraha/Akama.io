<?php

use function DI\factory;
use function DI\get;
use function DI\object;
use Framework\Renderer\RendererInterface;
use Framework\Renderer\TwigRendererFactory;
use Framework\Router;

return [
    'database.host' => 'localhost',
    'database.username' => 'root',
    'database.password' => '',
    'database.name' => 'monsupersite',
    'views.path' => dirname(__DIR__) . '/views',
    'twig.extensions' => [
        get(Router\RouterTwigExtension::class)
    ],
    Router::class => object(),
    // RendererInterface::class => object(TwigRenderer::class)->constructor(get('config.view_path'))
    RendererInterface::class => factory(TwigRendererFactory::class)
];
