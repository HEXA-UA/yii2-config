<?php
/**
 * GroupInterface
 * @version     1.0.0-alpha.3
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\interfaces;

/**
 * Interface GroupInterface
 */
interface GroupInterface
{
    /**
     * Returns unique group name.
     * @return string
     */
    public function getName();
}
