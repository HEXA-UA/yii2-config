<?php
/**
 * Setting model
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\models;

use hexa\yiiconfig\interfaces\SettingInterface;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "setting".
 *
 * @property integer $id
 * @property string  $name
 * @property mixed   $value
 * @property string  $group
 *
 * @property Key     $key
 */
class Setting extends ActiveRecord implements SettingInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%settings}}';
    }

    /**
     * @inheritdoc
     * @codeCoverageIgnore
     */
    public function rules()
    {
        return [
            ['name', 'in', 'range' => Key::find()->all()],
            ['value', 'in', 'range' => []],
        ];
    }

    /**
     * @inheritdoc
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->key->type;
    }

    /**
     * @inheritdoc
     */
    public function getGroup()
    {
        return $this->key->group;
    }

    /**
     * Relation with key.
     * @return \yii\db\ActiveQuery
     */
    public function getKey()
    {
        return $this->hasOne(Key::className(), ['name' => 'name']);
    }
}
