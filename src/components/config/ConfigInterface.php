<?php
/**
 * ConfigInterface
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\components\config;

/**
 * Interface ConfigInterface
 */
interface ConfigInterface
{
    /**
     * @return ProviderInterface
     */
    public function getProvider();

    /**
     * @param $key
     * @param $default
     *
     * @return ConfigInterface
     */
    public function get($key, $default);
}
