<?php
/**
 * DeleteAction
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\actions;

/**
 * Class DeleteAction
 */
class DeleteAction extends BaseAction
{
    const REDIRECT_TO = 'index';

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
        if (!isset($this->view)) {
            $this->view = static::REDIRECT_TO;
        }

        if (!is_callable($this->callbackSuccess)) {
            $this->callbackSuccess = function ($model) {
                return $this->controller->redirect([$this->view]);
            };
        }

        parent::init();
    }

    /**
     * Runs this action without/with the specified parameters.
     *
     * @param string $id
     *
     * @return mixed
     */
    public function run($id)
    {
        $isOk = $this->findModel($id)->delete();

        if ($isOk) {
            return call_user_func($this->callbackSuccess, $isOk);
        }

        return call_user_func($this->callbackError, $isOk);
    }
}
