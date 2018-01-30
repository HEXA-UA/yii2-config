<?php
/**
 * Config module
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexaua\yiiconfig;

use hexaua\yiiconfig\services\GroupService;
use hexaua\yiiconfig\services\KeyService;
use hexaua\yiiconfig\services\TypeService;

/**
 * Class Module
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $version = '1.0.0-alpha.2';

    /**
     * @inheritdoc
     */
    public $defaultRoute = 'setting';

    /**
     * Array of validation rules.
     * @var array
     */
    public $validators = [
        'string'  => [],
        'integer' => [],
        'boolean' => [],
        'number'  => [],
        'email'   => [],
        'ip'      => [],
        'url'     => [],
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        \Yii::setAlias('@yiiconfig', __DIR__);
        \Yii::configure($this, require(__DIR__ . '/config/main.php'));

        $this->registerServices();
    }

    /**
     * Register services.
     */
    public function registerServices()
    {
        \Yii::$container->setSingleton('hexaua\yiiconfig\services\KeyService', KeyService::className());
        \Yii::$container->setSingleton('hexaua\yiiconfig\services\GroupService', GroupService::className());
        \Yii::$container->setSingleton('hexaua\yiiconfig\services\TypeService', TypeService::className());
        \Yii::$container->setSingleton('hexaua\yiiconfig\services\SettingService', TypeService::className());
    }
}
