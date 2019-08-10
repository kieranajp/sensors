<?php declare(strict_types=1);

namespace Sensor\Providers;

use InfluxDB\Client;
use Sensor\Outputs\InfluxDBOutput;
use Sensor\Outputs\OutputInterface;
use Sensor\Sensors\SensorInterface;
use Sensor\Sensors\TemperatureSensor;
use League\Container\ServiceProvider\AbstractServiceProvider;
use InfluxDB\Database;

class ServiceProvider extends AbstractServiceProvider
{
    protected $provides = [
        SensorInterface::class,
        OutputInterface::class,
        Database::class,
    ];

    public function register()
    {
        $config = require(BASEDIR . '/config.php');
        $container = $this->getContainer();

        $container->add(Database::class, function () use ($config) {
            return Client::fromDSN($config['database']['dsn']);
        });

        $container->add(SensorInterface::class, function () use ($config) {
            return new TemperatureSensor($config['sensors']['temperature']);
        });

        $container->add(OutputInterface::class, function () use ($container) {
            return new InfluxDBOutput($container->get(Database::class));
        });
    }
}
