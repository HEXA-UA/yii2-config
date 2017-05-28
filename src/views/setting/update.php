<?php
/**
 * Setting update view
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

use hexa\yiiconfig\models\Setting;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View    $this
 * @var Setting $model
 * @var array   $keys
 */

echo Html::beginTag('div', [
    'class' => 'update-setting js-update-setting'
]);
echo $this->context->renderPartial('_form', [
    'model' => $model,
    'keys'  => $keys
]);
echo Html::endTag('div');
