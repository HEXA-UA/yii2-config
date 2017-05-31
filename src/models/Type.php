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
class Type extends ActiveRecord implements ListInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%types}}';
    }

    /**
     * Return list of groups
     * @return array
     */
    public static function list()
    {
        return [
            'string'  => 'string',
            'integer' => 'integer',
            'boolean' => 'boolean',
            'float'   => 'number',
            'email'   => 'email',
            'ip'      => 'ip',
            'url'     => 'url',
        ];
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
