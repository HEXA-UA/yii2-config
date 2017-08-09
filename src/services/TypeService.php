<?php
/**
 * KeyService
 * @version     1.0.0-alpha.4
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\services;

use hexa\yiiconfig\interfaces\ListInterface;
use yii\base\Object;

/**
 * Class TypeService
 */
class TypeService extends Object implements ListInterface
{
    /**
     * @return array
     */
    public function list()
    {
        return [
            'string'  => 'string',
            'integer' => 'integer',
            'boolean' => 'boolean',
            'float'   => 'number',
            'email'   => 'email',
            'ip'      => 'ip',
            'url'     => 'url',
        ];
    }
}
