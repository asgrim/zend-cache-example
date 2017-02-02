<?php
declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Zend\Cache\Service\StorageCacheAbstractServiceFactory;
use Zend\Cache\Storage\Adapter\Redis;

$config = [
    'abstract_factories' => [
        StorageCacheAbstractServiceFactory::class,
    ],
    'caches' => [
        'mycache' => [
            'adapter' => Redis::class,
            'options' => [
                'server' => [
                    'host' => 'localhost',
                ],
                'password' => 'foobared',
            ],
        ],
    ],
];

$sm = new \Zend\ServiceManager\ServiceManager($config);
$sm->setService('config', $config); // to stop lol-recursion wtf

$r = $sm->get('mycache');

$r->addItem('mykey', uniqid('value', true));
var_dump($r->getItem('mykey'));
