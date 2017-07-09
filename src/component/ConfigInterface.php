<?php
/**
 * ConfigInterface
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\component;

use hexa\yiiconfig\component\providers\ProviderInterface;

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
     * @param string $key
     * @param mixed  $default
     *
     * @return ConfigInterface
     */
    public function get($key, $default = null);

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return ConfigInterface
     */
    public function set($key, $value);
}
