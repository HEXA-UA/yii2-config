<?php
/**
 * AbstractConfig
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\components\config;

use yii\base\Component;

/**
 * Class AbstractConfig
 */
abstract class AbstractConfig extends Component implements ConfigInterface
{
    /**
     * @var string
     */
    public $providerClass;
}
