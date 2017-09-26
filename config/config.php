<?php

use function DI\factory;
use function DI\get;
use function DI\object;
use Framework\Renderer\RendererInterface;
use Framework\Renderer\TwigRendererFactory;
use Framework\Router;
use Psr\Container\ContainerInterface;

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
    RendererInterface::class => factory(TwigRendererFactory::class),
    PDO::class => function (ContainerInterface $c) {
        return new PDO(
            'mysql:host=' . $c->get('database.host') . ';dbname=' . $c->get('database.name'),
            $c->get('database.username'),
            $c->get('database.password'),
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }
];
