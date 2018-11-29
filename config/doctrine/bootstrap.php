<?php

/**
 * Doctrine Setup
 */

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = $settings['devMode'];

// the entities informations are found in the models directory
$configDb = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/models"), $isDevMode);

$dbParams = array(
    'driver'   => $settings['db']['driver'],
    'user'     => $settings['db']['username'],
    'password' => $settings['db']['password'],
    'dbname'   => $settings['db']['database']
);

$entityManager = EntityManager::create($dbParams, $configDb);