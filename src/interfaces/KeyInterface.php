<?php
/**
 * KeyInterface
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\interfaces;

/**
 * Interface KeyInterface
 */
interface KeyInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getGroup();

    /**
     * @return string
     */
    public function getType();
}