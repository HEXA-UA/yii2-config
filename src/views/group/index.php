<?php
/**
 * Group index view
 * @version     1.0.0-alpha.3
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

use yii\data\BaseDataProvider;
use yii\db\ActiveRecordInterface;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\Pjax;

/**
 * @var View                  $this
 * @var BaseDataProvider      $dataProvider
 * @var ActiveRecordInterface $searchModel
 */

Pjax::begin([
    'id' => 'group-index'
]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns'      => [
        [
            'class' => 'yii\grid\SerialColumn'
        ],
        'name',
        [
            'class'    => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}'
        ]
    ]
]);
Pjax::end();
