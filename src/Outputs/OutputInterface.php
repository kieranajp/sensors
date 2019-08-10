<?php declare(strict_types=1);

namespace Sensor\Outputs;

interface OutputInterface
{
    public function write(string $name, float $value);
}
