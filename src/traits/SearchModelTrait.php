<?php
/**
 * SearchModelTraitTest
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\traits;

use yii\data\DataProviderInterface;

/**
 * Trait SearchModelTrait
 */
trait SearchModelTrait
{
    /**
     * Class name of data provider.
     * @var string
     */
    public $dataProviderClass = 'yii\data\ActiveDataProvider';

    /**
     * DataProvider params.
     * @var array
     */
    public $dataProviderParams = [
        'pagination' => [
            'pageSize' => 20
        ],
        'sort'       => [
            'defaultOrder' => [
                'name' => SORT_DESC
            ]
        ]
    ];

    /**
     * @inheritdoc
     */
    public function search(array $queryParams = [], array $params = [], \Closure $filterCallback = null)
    {
        $dataProvider = $this->getDataProvider($params);

        if (!$this->load($queryParams) || !$this->validate()) {
            return $dataProvider;
        }

        if (is_callable($filterCallback)) {
            call_user_func($filterCallback, $dataProvider);
        }

        return $dataProvider;
    }

    /**
     * @param array $params
     *
     * @return DataProviderInterface
     */
    abstract public function getDataProvider($params = []);
}
