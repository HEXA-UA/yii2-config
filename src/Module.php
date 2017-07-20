<?php
/**
 * Config module
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig;

/**
 * Class Module
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $version = '1.0.0';

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
    }
}
