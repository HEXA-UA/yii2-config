<?php
/**
 * Setting model
 * @version     1.0.0-alpha.4
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\models;

use hexa\yiiconfig\db\SettingQuery;
use hexa\yiiconfig\interfaces\SettingInterface;
use yii\base\DynamicModel;
use yii\behaviors\AttributeBehavior;

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
     * @codeCoverageIgnore
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['value', 'safe'],
            [
                'group',
                'exist',
                'targetClass'     => Group::className(),
                'targetAttribute' => 'name'
            ],
            [
                'name',
                'exist',
                'targetClass'     => Key::className(),
                'targetAttribute' => 'name'
            ],
            ['name', 'unique', 'targetAttribute' => ['group', 'name']],
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
    public function beforeSave($insert)
    {
        $model = DynamicModel::validateData(
            [
                'value' => $this->value
            ],
            [
                $this->getValidator()
            ]
        );

        if ($model->hasErrors()) {
            $this->addError('value', $model->getFirstError('value'));

            return false;
        }

        return parent::beforeSave($insert);
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
     * @return mixed
     */
    protected function getValidator()
    {
        $validator = \Yii::$app->controller->module->validators[$this->key->type];
        array_unshift($validator, $this->key->type);
        array_unshift($validator, 'value');

        return $validator;
    }
}
