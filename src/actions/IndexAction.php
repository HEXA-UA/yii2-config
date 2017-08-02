<?php
/**
 * IndexAction
 * @version     1.0.0-alpha.3
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
        $searchModel  = $this->getSearchModel();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams, [
            'query' => $this->modelClass::find()
        ]);

        return $this->controller->render($this->view, [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel
        ]);
    }

    /**
     * @return SearchModelInterface
     */
    private function getSearchModel()
    {
        return new $this->searchModelClass();
    }
}
