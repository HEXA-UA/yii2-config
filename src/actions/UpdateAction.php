<?php
/**
 * ViewAction
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\actions;

use yii\helpers\ArrayHelper;

/**
 * Class ViewAction
 */
class UpdateAction extends BaseAction
{
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
     *
     * @param string $id Entity id
     *
     * @return string
     */
    public function run($id)
    {
        $model = $this->findModel($id);
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return call_user_func($this->callbackSuccess, $model);
        }

        return $this->controller->render($this->view, ArrayHelper::merge([
            'model' => $model,
        ], $this->params));
    }
}
