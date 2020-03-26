<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require("vendor/autoload.php");

$setting = [
    'meta' => [
        'entity_path' => [ ROOT . "app/Entities"],
        'auto_generate_proxies' => true,
        'proxy_dir' => ROOT . "app/proxies",
        'cache' => null
    ],
    'connection' => [
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'port' => '3306',
        'user' => 'root',
        'password' => '',
        'dbname' => 'php_training',
        'charset' => 'utf8',
    ]
];

$config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    $setting['meta']['entity_path'],
    $setting['meta']['auto_generate_proxies'],
    $setting['meta']['proxy_dir'],
    $setting['meta']['cache'],
    false
);

$em = \Doctrine\ORM\EntityManager::create($setting['connection'],$config);

try{
    $em->getConnection()->connect();
}catch (\Exception $e){
    echo $e->getMessage();
    die;
}
