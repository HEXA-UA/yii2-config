<?php
/**
 * CreateAction
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\actions;

use hexa\yiiconfig\models\Group;
use hexa\yiiconfig\models\Type;

/**
 * Class CreateAction
 */
class CreateAction extends BaseAction
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
     * @return mixed
     */
    public function run()
    {
        $model = new $this->modelClass();
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return call_user_func($this->callbackSuccess, $model);
        }

        return $this->controller->render($this->view, [
            'model'  => $model,
            'types'  => Type::list(),
            'groups' => Group::list(),
        ]);
    }
}
