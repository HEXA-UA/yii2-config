<?php
/**
 * TestUnit
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\tests\unit;

use AspectMock\Test;
use Codeception\Specify;
use Codeception\Test\Unit;
use hexa\yiiconfig\services\GroupService;
use hexa\yiiconfig\services\KeyService;
use hexa\yiiconfig\services\SettingService;
use hexa\yiiconfig\services\TypeService;

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
        \Yii::$container->setSingleton('hexa\yiiconfig\services\KeyService', KeyService::className());
        \Yii::$container->setSingleton('hexa\yiiconfig\services\GroupService', GroupService::className());
        \Yii::$container->setSingleton('hexa\yiiconfig\services\TypeService', TypeService::className());
        \Yii::$container->setSingleton('hexa\yiiconfig\services\SettingService', SettingService::className());
    }
}
