<?php
require '../vendor/autoload.php';

use App\Blog\BlogModule;
use DI\ContainerBuilder;
use Framework\App;
use GuzzleHttp\Psr7\ServerRequest;
use function Http\Response\send;

$modules = [
    BlogModule::class
];

$builder = new ContainerBuilder();
$builder->addDefinitions(dirname(__DIR__) . '/config/config.php');
$builder->addDefinitions(dirname(__DIR__) . '/config.php');

foreach ($modules as $module) {
    if ($module::DEFINITIONS) {
        $builder->addDefinitions($module::DEFINITIONS);
    }
}

$container = $builder->build();

$app = new App($container, $modules);

$response = $app->run(ServerRequest::fromGlobals());
send($response);
