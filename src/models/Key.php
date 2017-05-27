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

use hexa\yiiconfig\interfaces\KeyInterface;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "keys".
 *
 * @property integer $id
 * @property string  $name
 * @property string  $group
 * @property string  $type
 */
class Key extends ActiveRecord implements KeyInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%keys}}';
    }

    /**
     * @inheritdoc
     * @codeCoverageIgnore
     */
    public function rules()
    {
        return [
            ['group', 'in', 'range' => Group::list()],
            ['type', 'in', 'range' => []],
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
}