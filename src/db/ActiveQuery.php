<?php
/**
 * ActiveQuery
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexaua\yiiconfig\db;

use \yii\db\ActiveQuery as BaseActiveQuery;

/**
 * Class ActiveQuery
 */
class ActiveQuery extends BaseActiveQuery
{
    /**
     * @param $attribute
     * @param $value
     *
     * @return $this
     */
    public function not($attribute, $value)
    {
        return $this->andWhere(['NOT', [$attribute => $value]]);
    }

    /**
     * @param $attribute
     * @param $value
     *
     * @return $this
     */
    public function orNot($attribute, $value)
    {
        return $this->orWhere(['NOT', [$attribute => $value]]);
    }

    /**
     * @param $attribute
     *
     * @return $this
     */
    public function notNull($attribute)
    {
        return $this->andWhere(['NOT', [$attribute => null]]);
    }

    /**
     * @param mixed $key
     * @param mixed $value
     *
     * @return $this
     */
    public function byAttribute($key, $value)
    {
        return $this->andWhere([$key => $value]);
    }

    /**
     * @param integer $id
     *
     * @return ActiveQuery
     */
    public function byId($id)
    {
        return $this->byAttribute('id', $id);
    }
}
