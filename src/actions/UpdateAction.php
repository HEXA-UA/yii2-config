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

/**
 * Class ViewAction
 */
class UpdateAction extends BaseAction
{
    /**
     * Runs this action without/with the specified parameters.
     *
     * @param int $id Entity id
     *
     * @return string
     */
    public function run($id)
    {
        $model = $this->findModel($id);
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return call_user_func($this->callbackSuccess, $model);
        }

        return call_user_func($this->callbackError, $model);
    }
}
