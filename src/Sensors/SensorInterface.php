<?php declare(strict_types=1);

namespace Sensor\Sensors;

interface SensorInterface
{
    public function getName(): string;
    public function getValue(): float;
}
