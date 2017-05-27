<?php
/**
 * IndexAction
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\actions;

use hexa\yiiconfig\interfaces\SearchModelInterface;

/**
 * Class IndexAction
 */
class IndexAction extends BaseAction
{
    /**
     * Search model class.
     * @var string
     */
    public $searchModelClass;

    /**
     * View template.
     * @var string
     */
    public $view;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (!isset($this->view)) {
            $this->view = $this->id;
        }
    }

    /**
     * Runs this action without/with the specified parameters.
     */
    public function run()
    {
        /** @var SearchModelInterface $searchModel */
        $searchModel  = new $this->searchModelClass();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams, [
            'query' => $this->modelClass::find()
        ]);

        return $this->controller->render($this->view, [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel
        ]);
    }
}
