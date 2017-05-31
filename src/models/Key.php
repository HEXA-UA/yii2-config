<?php
/**
 * Key model
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\models;

use hexa\yiiconfig\db\KeyQuery;
use hexa\yiiconfig\interfaces\KeyInterface;
use hexa\yiiconfig\interfaces\ListInterface;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "keys".
 *
 * @property integer $id
 * @property string  $name
 * @property string  $group
 * @property string  $type
 * @property string  $description
 */
class Key extends ActiveRecord implements KeyInterface, ListInterface
{
    /**
     * @inheritdoc
     * @codeCoverageIgnore
     */
    public function rules()
    {
        return [
            ['group', 'in', 'range' => Group::list()],
            ['type', 'in', 'range' => Type::list()],
            [['group', 'type', 'name'], 'required'],
            ['description', 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return $this->type;
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
        return $this->description;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%keys}}';
    }

    /**
     * @inheritdoc
     */
    public static function find()
    {
        return \Yii::createObject(KeyQuery::className(), [get_called_class()]);
    }

    /**
     * @inheritdoc
     */
    public static function list()
    {
        return ArrayHelper::map(static::find()->asArray()->all(), 'name', 'name');
    }
}
