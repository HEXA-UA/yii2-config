<?php
/**
 * Key index view
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

use yii\data\BaseDataProvider;
use yii\db\ActiveRecordInterface;
use yii\grid\GridView;
use yii\web\View;

/**
 * @var View                  $this
 * @var BaseDataProvider      $dataProvider
 * @var ActiveRecordInterface $searchModel
 */

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns'      => [
        'name',
        'type',
        'group'
    ]
]);
