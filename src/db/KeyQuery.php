<?php
/**
 * KeyQuery
 * @version     1.0.0-alpha.3
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\db;

/**
 * Class KeyQuery
 */
class KeyQuery extends ActiveQuery
{
    /**
     * @param string $name
     *
     * @return $this
     */
    public function byName($name)
    {
        return $this->byAttribute('name', $name);
    }
}
