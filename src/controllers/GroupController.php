<?php
/**
 * GroupController
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 **/

namespace hexaua\yiiconfig\controllers;

use hexaua\yiiconfig\actions\CreateAction;
use hexaua\yiiconfig\actions\DeleteAction;
use hexaua\yiiconfig\actions\IndexAction;
use hexaua\yiiconfig\actions\UpdateAction;
use hexaua\yiiconfig\models\Group;
use hexaua\yiiconfig\models\search\GroupSearch;

/**
 * Class GroupController
 */
class GroupController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        $className = Group::className();

        return [
            'index'  => [
                'class'            => IndexAction::className(),
                'searchModelClass' => GroupSearch::className(),
                'modelClass'       => $className
            ],
            'update' => [
                'class'      => UpdateAction::className(),
                'modelClass' => $className,
            ],
            'create' => [
                'class'      => CreateAction::className(),
                'modelClass' => $className,
            ],
            'delete' => [
                'class'      => DeleteAction::className(),
                'modelClass' => $className,
            ]
        ];
    }
}
