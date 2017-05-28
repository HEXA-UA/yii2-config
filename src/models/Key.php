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
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "keys".
 *
 * @property integer $id
 * @property string  $name
 * @property string  $group
 * @property string  $type
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
            [['group', 'type', 'name'], 'required']
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
    public static function tableName()
    {
        return '{{%keys}}';
    }

    /**
     * @inheritdoc
     * @return KeyQuery
     */
    public static function find()
    {
        return new KeyQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public static function list()
    {
        return ArrayHelper::map(static::find()->asArray()->all(), 'name', 'name');
    }
}
