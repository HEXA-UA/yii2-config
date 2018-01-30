<?php
/**
 * SettingSearch
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexaua\yiiconfig\models\search;

use hexaua\yiiconfig\interfaces\SearchModelInterface;
use hexaua\yiiconfig\models\Setting;
use hexaua\yiiconfig\traits\SearchModelTrait;
use yii\data\DataProviderInterface;
use yii\helpers\ArrayHelper;

/**
 * Class SettingSearch
 */
class SettingSearch extends Setting implements SearchModelInterface
{
    use SearchModelTrait;

    /**
     * @param array $params
     *
     * @return DataProviderInterface
     */
    public function getDataProvider($params = [])
    {
        $params = ArrayHelper::merge([
            'query' => static::find()
        ], $this->dataProviderParams, $params);

        return new $this->dataProviderClass($params);
    }
}