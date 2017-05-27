<?php
/**
 * KeyController
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 **/

namespace hexa\yiiconfig\controllers;

use hexa\yiiconfig\actions\CreateAction;
use hexa\yiiconfig\actions\IndexAction;
use hexa\yiiconfig\models\search\SettingSearch;
use hexa\yiiconfig\models\Setting;
use yii\web\View;

/**
 * Class SettingController
 */
class SettingController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        $className = Setting::className();

        return [
            'index'  => [
                'class'            => IndexAction::className(),
                'searchModelClass' => SettingSearch::className(),
                'modelClass'       => $className
            ],
            'view'   => [
                'class'      => View::className(),
                'modelClass' => $className
            ],
            'create' => [
                'class'      => CreateAction::className(),
                'modelClass' => $className
            ]
        ];
    }
}
