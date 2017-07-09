<?php
// This is global bootstrap for autoloading

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');
defined('YII_APP_BASE_PATH') or define('YII_APP_BASE_PATH', __DIR__ . '/../');

require_once(YII_APP_BASE_PATH . '/vendor/autoload.php');

$kernel = \AspectMock\Kernel::getInstance();
$kernel->init([
    'debug'        => true,
    'includePaths' => [__DIR__ . '/../src']
]);
