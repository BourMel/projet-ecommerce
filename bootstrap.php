<?php

/**
 * Doctrine Setup
 */

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;
$configDb = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/models"), $isDevMode);

$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'ephedra'
);

$entityManager = EntityManager::create($dbParams, $configDb);