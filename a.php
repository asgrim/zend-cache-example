<?php
declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

$r = new Zend\Cache\Storage\Adapter\Redis([
    'server' => [
        'host' => 'localhost',
    ],
    'password' => 'foobared',
]);

$r->addItem('mykey', uniqid('value', true));
