<?php
/**
 * GroupSearch class
 * @version     1.0.0-alpha.3
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\models\search;

use hexa\yiiconfig\interfaces\SearchModelInterface;
use hexa\yiiconfig\models\Group;
use hexa\yiiconfig\traits\SearchModelTrait;
use yii\data\DataProviderInterface;
use yii\helpers\ArrayHelper;

/**
 * Class GroupSearch
 */
class GroupSearch extends Group implements SearchModelInterface
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
