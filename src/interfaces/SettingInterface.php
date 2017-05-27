<?php
/**
 * SettingInterface
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\interfaces;

/**
 * Interface SettingInterface
 */
interface SettingInterface extends KeyInterface
{
    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @return string
     */
    public function getKey();
}
