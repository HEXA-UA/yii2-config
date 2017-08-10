<?php
/**
 * KeyController
 * @version     1.0.0-alpha.5
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
use hexa\yiiconfig\models\search\SettingSearch;
use hexa\yiiconfig\models\Setting;
use hexa\yiiconfig\services\GroupService;
use hexa\yiiconfig\services\KeyService;

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
