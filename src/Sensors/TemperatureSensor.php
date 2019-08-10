<?php declare(strict_types=1);

namespace Sensor\Sensors;

class TemperatureSensor implements SensorInterface
{
    private const SENSOR_NAME = 'temperature';

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function getName(): string
    {
        return self::SENSOR_NAME;
    }

    public function getValue(): float
    {
        $contents = file_get_contents($this->filename);
        preg_match('/t=\d+/', $contents, $temp);

        return ((int) str_replace('t=', '', $temp[0])) / 1000;
    }
}
