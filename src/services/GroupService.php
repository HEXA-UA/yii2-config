<?php
/**
 * GroupService
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexaua\yiiconfig\services;

use hexaua\yiiconfig\interfaces\ListInterface;
use hexaua\yiiconfig\models\Group;
use yii\base\Object;

/**
 * Class GroupService
 */
class GroupService extends Object implements ListInterface
{
    /**
     * @return array
     */
    public function list()
    {
        return Group::find()->indexBy('name')->column();
    }
}
