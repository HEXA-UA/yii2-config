<?php
/**
 * ProviderInterface
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\component\providers;

/**
 * Interface ProviderInterface
 */
interface ProviderInterface
{
    /**
     * Load settings.
     * @return mixed
     */
    public function load();

    /**
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get($key, $default = null);
}
