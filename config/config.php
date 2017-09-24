<?php

use function DI\factory;
use function DI\get;
use function DI\object;
use Framework\Renderer\RendererInterface;
use Framework\Renderer\TwigRendererFactory;
use Framework\Router;

return [
    'views.path' => dirname(__DIR__) . '/views',
    Router::class => object(),
    'twig.extensions' => [
        get(Router\RouterTwigExtension::class)
    ],
    // RendererInterface::class => object(TwigRenderer::class)->constructor(get('config.view_path'))
    RendererInterface::class => factory(TwigRendererFactory::class)
];
