<?php
/**
 * BaseProvider
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexaua\yiiconfig\component\providers;

use yii\base\Object;

/**
 * Class BaseProvider
 */
abstract class BaseProvider extends Object implements ProviderInterface
{
    /**
     * @inheritdoc
     */
    public function get($key, $default = null)
    {
        return $this->getValue($key, $default);
    }

    /**
     * @param string $key
     * @param null   $default
     *
     * @return mixed
     */
    abstract protected function getValue($key, $default = null);
}
