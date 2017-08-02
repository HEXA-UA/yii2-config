<?php
/**
 * KeyService
 * @version     1.0.0-alpha.3
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\services;

use hexa\yiiconfig\interfaces\ListInterface;
use hexa\yiiconfig\models\Key;
use yii\base\Object;

/**
 * Class KeyService
 */
class KeyService extends Object implements ListInterface
{
    /**
     * @return array
     */
    public function list()
    {
        return Key::find()->indexBy('name')->column();
    }
}
