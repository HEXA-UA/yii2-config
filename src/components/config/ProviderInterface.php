<?php
/**
 * ProviderInterface
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\components\config;

/**
 * Interface ProviderInterface
 */
interface ProviderInterface
{
    /**
     * @return mixed
     */
    public function load();
}
