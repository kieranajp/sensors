<?php declare(strict_types=1);

use Sensor\SensorApp;
use League\Container\Container;
use Sensor\Providers\ServiceProvider;

require_once 'vendor/autoload.php';

define('BASEDIR', __DIR__);

$container = new Container;
$container->delegate(
    (new League\Container\ReflectionContainer)->cacheResolutions()
);
$container->addServiceProvider(new ServiceProvider);

($container->get(SensorApp::class))();
