<?php
/**
 * SettingsInterface
 * @version     0.1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 */

namespace Tapakan\Settings;

/**
 * Interface SettingsInterface
 */
interface SettingsInterface
{
    /**
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return mixed
     */
    public function set($key, $value);

    /**
     * @param string $key
     *
     * @return boolean
     */
    public function exists($key);
}
