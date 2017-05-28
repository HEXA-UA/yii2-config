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
use hexa\yiiconfig\models\Key;
use hexa\yiiconfig\models\search\KeySearch;
use yii\web\View;

/**
 * Class KeyController
 */
class KeyController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        $className = Key::className();

        return [
            'index'  => [
                'class'            => IndexAction::className(),
                'searchModelClass' => KeySearch::className(),
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
