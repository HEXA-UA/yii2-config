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
use hexa\yiiconfig\actions\DeleteAction;
use hexa\yiiconfig\actions\IndexAction;
use hexa\yiiconfig\actions\UpdateAction;
use hexa\yiiconfig\models\Key;
use hexa\yiiconfig\models\search\SettingSearch;
use hexa\yiiconfig\models\Setting;

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
        $params    = [
            'keys' => Key::list()
        ];

        return [
            'index'  => [
                'class'            => IndexAction::className(),
                'searchModelClass' => SettingSearch::className(),
                'modelClass'       => $className
            ],
            'update' => [
                'class'      => UpdateAction::className(),
                'modelClass' => $className,
                'params'     => $params
            ],
            'create' => [
                'class'      => CreateAction::className(),
                'modelClass' => $className,
                'params'     => $params
            ],
            'delete' => [
                'class'      => DeleteAction::className(),
                'modelClass' => $className,
            ]
        ];
    }
}
