<?php

define('ROOT_DIR', dirname(__DIR__) . DIRECTORY_SEPARATOR);

require_once ROOT_DIR . 'vendor'. DIRECTORY_SEPARATOR . 'autoload.php';

use NoOrm\EntityGenerator;
use Nap\Configuration\Configuration;

echo 'Getting db config' . PHP_EOL;

$iniFile = ROOT_DIR . 'config'. DIRECTORY_SEPARATOR . 'config.ini';
$jsonFile = ROOT_DIR . 'config'. DIRECTORY_SEPARATOR . 'config.json';

if(file_exists($jsonFile)) {
    Configuration::initByJson($jsonFile);
} else {
    Configuration::initByIni($iniFile);
}

echo 'Getting no orm config' . PHP_EOL;

$dbConfig = Configuration::getData('db');
$noOrmConfig = Configuration::getData('no_orm');
$targetFolder = ROOT_DIR . 'src' . DIRECTORY_SEPARATOR . $noOrmConfig['target_folder'] . DIRECTORY_SEPARATOR;

echo 'Generating' . PHP_EOL;

$result = EntityGenerator::process($dbConfig['host'], $dbConfig['db_name'], $dbConfig['username'], $dbConfig['password'],
    $targetFolder, $noOrmConfig['namespace']);

echo 'Generation finished' . PHP_EOL;