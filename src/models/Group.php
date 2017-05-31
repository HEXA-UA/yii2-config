<?php
/**
 * Group model
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\models;

use hexa\yiiconfig\interfaces\ListInterface;

/**
 * This is the model class for table "groups".
 *
 * @property integer $id
 * @property string  $name
 */
class Group extends ActiveRecord implements ListInterface
{
    /**
     * CORE group unique name.
     */
    const CORE = 'core';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%groups}}';
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

    /**
     * Return list of groups
     * @return array
     */
    public static function list()
    {
        return [
            static::CORE => static::CORE
        ];
    }
}
