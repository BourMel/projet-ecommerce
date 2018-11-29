<?php

/**
 * this file allows us to use Doctrine console line tools
 */

require_once "./bootstrap.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);

