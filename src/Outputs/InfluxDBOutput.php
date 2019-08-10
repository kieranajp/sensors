<?php declare(strict_types=1);

namespace Sensor\Outputs;

use InfluxDB\Point;
use InfluxDB\Database;

class InfluxDBOutput implements OutputInterface
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    private function createPoint(string $name, float $value): Point
    {
        $point = new Point(
            $name,
            $value
        );
        $point->setTimestamp(time());

        return $point;
    }

    public function write(string $name, float $value): void
    {
        $point = $this->createPoint($name, $value);

        $this->database->writePoints([ $point ], Database::PRECISION_SECONDS);
    }
}
