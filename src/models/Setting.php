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

use hexa\yiiconfig\db\SettingQuery;
use hexa\yiiconfig\interfaces\ListInterface;
use hexa\yiiconfig\interfaces\SettingInterface;
use yii\behaviors\AttributeBehavior;
use yii\helpers\ArrayHelper;

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
class Setting extends ActiveRecord implements SettingInterface, ListInterface
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class'      => AttributeBehavior::className(),
                'attributes' => [
                    static::EVENT_BEFORE_INSERT => 'group',
                    static::EVENT_BEFORE_UPDATE => 'group'
                ],
                'value'      => function ($event) {
                    return Key::find()
                        ->select('group')
                        ->asArray(true)
                        ->byName($event->sender->name)
                        ->scalar();
                }
            ]
        ];
    }

    /**
     * @inheritdoc
     * @codeCoverageIgnore
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['name', 'exist', 'targetClass' => Key::className()],
            ['value', 'safe'],
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
        return $this->group;
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return $this->key->description;
    }

    /**
     * Relation with key.
     * @return \yii\db\ActiveQuery
     */
    public function getKey()
    {
        return $this->hasOne(Key::className(), ['name' => 'name']);
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%settings}}';
    }

    /**
     * @inheritdoc
     */
    public static function find()
    {
        return \Yii::createObject(SettingQuery::className(), [get_called_class()]);
    }

    /**
     * @inheritdoc
     * @codeCoverageIgnore
     */
    public static function list()
    {
        $list = static::find()->asArray()->all();

        return ArrayHelper::map($list, 'name', 'name');
    }
}
