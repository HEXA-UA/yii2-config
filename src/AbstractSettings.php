<?php
/**
 * AbstractSettings
 * @version     0.1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 */

namespace Tapakan\Settings;

use yii\base\Object;

/**
 * Class AbstractSettings
 */
abstract class AbstractSettings extends Object implements SettingsInterface
{
    /**
     * @inheritdoc
     */
    public function get($key, $default = null)
    {
        $value = $this->getValue($key);

        if ($value === null && $default !== null) {
            $value = $default;
        }

        return $value;
    }

    /**
     * @inheritdoc
     */
    public function set($key, $value)
    {
        return $this->setValue($key, $value);
    }

    /**
     * @inheritdoc
     */
    public function exists($key)
    {
        return $this->existsKey($key);
    }

    /**
     * Set value
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return mixed
     */
    abstract protected function setValue($key, $value);

    /**
     * Returns value by key
     *
     * @param string $key Scalar value
     *
     * @return mixed
     */
    abstract protected function getValue($key);

    /**
     * @param string $key
     *
     * @return boolean
     */
    abstract protected function existsKey($key);
}
