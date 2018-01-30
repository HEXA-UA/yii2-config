<?php
/**
 * ConfigInterface
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexaua\yiiconfig\component;

/**
 * Interface ConfigInterface
 */
interface ConfigInterface
{
    /**
     * @param string $key
     * @param mixed  $default
     *
     * @return ConfigInterface
     */
    public function get($key, $default = null);
    
    /**
     * @param string $name
     *
     * @return mixed
     */
    public function addGroup($name);

    /**
     * @param $name
     *
     * @return mixed
     */
    public function addKey($name);
}
