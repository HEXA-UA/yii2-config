<?php
/**
 * TestUnit
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexaua\yiiconfig\tests\unit;

use AspectMock\Test;
use Codeception\Specify;
use Codeception\Test\Unit;
use hexaua\yiiconfig\services\GroupService;
use hexaua\yiiconfig\services\KeyService;
use hexaua\yiiconfig\services\SettingService;
use hexaua\yiiconfig\services\TypeService;
use yii\helpers\ArrayHelper;

/**
 * Class TestUnit
 */
class TestUnit extends Unit
{
    use Specify;
    use ActiveRecordTrait;

    /**
     * @inheritdoc
     */
    protected function _after()
    {
        Test::clean();
    }

    /**
     * Set dependencies for models.
     */
    protected function registerServices()
    {
        \Yii::$container->setSingleton('hexaua\yiiconfig\services\KeyService', KeyService::className());
        \Yii::$container->setSingleton('hexaua\yiiconfig\services\GroupService', GroupService::className());
        \Yii::$container->setSingleton('hexaua\yiiconfig\services\TypeService', TypeService::className());
        \Yii::$container->setSingleton('hexaua\yiiconfig\services\SettingService', SettingService::className());
    }

    /**
     * @param array  $config
     * @param string $appClass
     */
    protected function mockApplication($config = [], $appClass = '\yii\web\Application')
    {
        new $appClass(ArrayHelper::merge([
            'id'         => 'UnitTests',
            'basePath'   => __DIR__,
            'vendorPath' => $this->getVendorPath(),
            'components' => [
                'db'    => [
                    'class' => 'yii\db\Connection',
                    'dsn'   => 'sqlite::memory:',
                ],
                'cache' => 'yii\caching\DummyCache'
            ],
        ], $config));
    }

    /**
     * @return string
     */
    protected function getVendorPath()
    {
        return dirname(__DIR__) . '/vendor';
    }
}
