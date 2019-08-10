<?php declare(strict_types=1);

return [
    'sensors' => [
        'temperature' => '/sys/bus/w1/devices/28-01187ae70eff/w1_slave',
        // 'temperature' => BASEDIR . '/data.txt',
    ],

    'database' => [
        'dsn' => sprintf(
            'influxdb://%s:%s/%s',
            '192.168.0.10',
            '8086',
            'grafana'
        ),
    ],
];
