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
use hexa\yiiconfig\models\search\KeySearch;
use hexa\yiiconfig\services\GroupService;
use hexa\yiiconfig\services\TypeService;

/**
 * Class KeyController
 */
class KeyController extends Controller
{
    /**
     * @var TypeService
     */
    protected $typeService;

    /**
     * @var GroupService
     */
    protected $groupService;

    /**
     * KeyController constructor.
     *
     * @param TypeService  $typeService
     * @param GroupService $groupService
     *
     * @inheritdoc
     */
    public function __construct($id, $module, TypeService $typeService, GroupService $groupService, $config = [])
    {
        parent::__construct($id, $module, $config);

        $this->typeService  = $typeService;
        $this->groupService = $groupService;
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $className = Key::className();
        $params    = [
            'types'  => $this->typeService->list(),
            'groups' => $this->groupService->list(),
        ];

        return [
            'index'  => [
                'class'            => IndexAction::className(),
                'searchModelClass' => KeySearch::className(),
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
