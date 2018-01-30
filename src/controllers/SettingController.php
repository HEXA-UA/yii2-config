<?php
/**
 * KeyController
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
use hexaua\yiiconfig\models\search\SettingSearch;
use hexaua\yiiconfig\models\Setting;
use hexaua\yiiconfig\services\GroupService;
use hexaua\yiiconfig\services\KeyService;

/**
 * Class SettingController
 */
class SettingController extends Controller
{
    /**
     * @var KeyService
     */
    protected $keyService;

    /**
     * @var GroupService
     */
    protected $groupService;

    /**
     * SettingController constructor.
     *
     * @param KeyService   $keyService
     * @param GroupService $groupService
     *
     * @inheritdoc
     */
    public function __construct($id, $module, KeyService $keyService, GroupService $groupService, $config = [])
    {
        parent::__construct($id, $module, $config = []);

        $this->keyService   = $keyService;
        $this->groupService = $groupService;
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $className = Setting::className();
        $params    = [
            'keys'   => $this->keyService->list(),
            'groups' => $this->groupService->list()
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
