<?php
/**
 * Group model
 * @version     1.0.0-alpha.3
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\models;

use hexa\yiiconfig\interfaces\GroupInterface;

/**
 * This is the model class for table "groups".
 *
 * @property integer $id
 * @property string  $name
 */
class Group extends ActiveRecord implements GroupInterface
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
        return '{{%settings_groups}}';
    }

    /**
     * @inheritdoc
     * @codeCoverageIgnore
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['name', 'string', 'max' => 255],
            ['name', 'filter', 'filter' => 'strtolower'],
            ['name', 'unique'],
        ];
    }

    /**
     * Returns unique group name.
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        return !($this->getOldAttribute('name') === static::CORE);
    }

    /**
     * @inheritdoc
     */
    public function beforeDelete()
    {
        if (!parent::beforeDelete()) {
            return false;
        }

        return !($this->name === static::CORE);
    }
}
