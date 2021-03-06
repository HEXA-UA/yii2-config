<?php
/**
 * ActiveRecord
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexaua\yiiconfig\models;

use hexaua\yiiconfig\db\ActiveQuery;
use yii\db\ActiveRecord as BaseActiveRecord;

/**
 * Class ActiveRecord
 * @codeCoverageIgnore
 */
class ActiveRecord extends BaseActiveRecord
{
    /**
     * @return ActiveQuery|Object
     */
    public static function find()
    {
        return \Yii::createObject(ActiveQuery::className(), [get_called_class()]);
    }
}
