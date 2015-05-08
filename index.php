<?php
defined('APP_DEBUG') or define('APP_DEBUG', true);
defined('APP_PATH') or define('APP_PATH', __DIR__);
defined("APP_MODE") or define("APP_MODE", 'HTTP');

defined('DEFAULT_CONTROLLER') or define('DEFAULT_CONTROLLER', 'Default');
defined('DEFAULT_METHOD') or define('DEFAULT_METHOD' , 'Index');

require(__DIR__ . '/vendor/autoload.php');
//require(__DIR__ . '/config/routes.php');

$app = new Router();
$app->run();