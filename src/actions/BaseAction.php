<?php
/**
 * BaseAction
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\actions;

use yii\base\Action;
use yii\base\InvalidConfigException;
use yii\web\NotFoundHttpException;

/**
 * Class BaseAction
 */
abstract class BaseAction extends Action
{
    /**
     * Callback function for success scenario.
     * @var \Closure
     */
    public $callbackSuccess;

    /**
     * Callback function for error scenario.
     * @var \Closure
     */
    public $callbackError;

    /**
     * @var string
     */
    public $modelClass;

    /**
     * Rendering params.
     * @var array
     */
    public $params;

    /**
     * @inheritdoc
     * @throws InvalidConfigException If $modelClass not configure exception will thrown.
     */
    public function init()
    {
        parent::init();

        if (!$this->modelClass) {
            throw new InvalidConfigException('"modelClass" must be configure.');
        }

        if (!is_callable($this->callbackSuccess)) {
            $this->callbackSuccess = function ($model) {
                return $this->controller->redirect(['index']);
            };
        }

        if (!is_callable($this->callbackError)) {
            $this->callbackError = function ($model) {
                return $this->controller->redirect(['index']);
            };
        }
    }

    /**
     * @param string $name
     *
     * @return mixed
     * @throws NotFoundHttpException
     */
    protected function findModel($name)
    {
        if (($model = $this->modelClass::findOne($name)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist');
    }
}
