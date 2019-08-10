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
        $fp = fopen($this->filename, 'r');
        fseek($fp, -1, SEEK_END);
        $pos = ftell($fp);
        $temp = "";

        while ((($char = fgetc($fp)) != "=") && ($pos > 0)) {
            $temp = $char . $temp;
            fseek($fp, $pos--);
        }

        return ((int) $temp) / 1000 ;
    }
}
