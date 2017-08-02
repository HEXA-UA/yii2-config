<?php
/**
 * Key model
 * @version     1.0.0-alpha.3
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\models;

use hexa\yiiconfig\db\KeyQuery;
use hexa\yiiconfig\interfaces\KeyInterface;
use hexa\yiiconfig\services\GroupService;
use hexa\yiiconfig\services\TypeService;

/**
 * This is the model class for table "keys".
 *
 * @property integer $id
 * @property string  $name
 * @property string  $group
 * @property string  $type
 * @property string  $description
 */
class Key extends ActiveRecord implements KeyInterface
{
    /**
     * @inheritdoc
     * @codeCoverageIgnore
     */
    public function rules()
    {
        return [
            ['type', 'in', 'range' => \Yii::$container->get(TypeService::className())->list()],
            [['type', 'name'], 'required'],
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%settings_keys}}';
    }

    /**
     * @inheritdoc
     */
    public static function find()
    {
        return \Yii::createObject(KeyQuery::className(), [get_called_class()]);
    }
}
