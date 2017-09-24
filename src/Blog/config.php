<?php

use App\Blog\BlogModule;
use App\Blog\DemoExtension;
use function DI\add;
use function DI\get;
use function DI\object;

return [
    'blog.prefix' => '/blog',
    BlogModule::class => object()->constructorParameter('prefix', get('blog.prefix'))
];
