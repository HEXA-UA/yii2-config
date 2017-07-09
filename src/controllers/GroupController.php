<?php
/**
 * GroupController
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
use hexa\yiiconfig\models\Group;
use hexa\yiiconfig\models\search\GroupSearch;

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
