<?php declare(strict_types=1);

namespace Sensor;

use Sensor\Outputs\OutputInterface;
use Sensor\Sensors\SensorInterface;

final class SensorApp
{
    private $sensor;
    private $output;

    public function __construct(SensorInterface $sensor, OutputInterface $output)
    {
        $this->sensor = $sensor;
        $this->output = $output;
    }

    public function __invoke(): void
    {
        $this->output->write($this->sensor->getName(), $this->sensor->getValue());
    }
}
