<?php
/**
 * Group model
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexaua\yiiconfig\models;

/**
 * @property integer $id
 * @property string  $name
 */
class Type extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%types}}';
    }

    /**
     * @inheritdoc
     * @codeCoverageIgnore
     */
    public function rules()
    {
        return [
            ['name', 'unique'],
            ['name', 'required'],
        ];
    }
}
