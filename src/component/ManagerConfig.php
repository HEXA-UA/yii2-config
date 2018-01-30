<?php
/**
 * BaseConfig
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexaua\yiiconfig\component;

use yii\base\NotSupportedException;

/**
 * Class ManagerConfig
 */
class ManagerConfig extends BaseConfig
{
    /**
     * @param string $name
     *
     * @return mixed
     * @throws NotSupportedException
     */
    public function addGroup($name)
    {
        throw new NotSupportedException("Not implemented yet");
    }

    /**
     * @param $name
     *
     * @return mixed
     * @throws NotSupportedException
     */
    public function addKey($name)
    {
        throw new NotSupportedException("Not implemented yet");
    }
}
