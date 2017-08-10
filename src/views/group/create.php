<?php
/**
 * Group create view
 * @version     1.0.0-alpha.5
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
    'class' => 'group-form-container hexa-form-container js-group-form-container js-hexa-form-container'
]);
echo $this->context->renderPartial('_form', [
    'model' => $model,
]);
echo Html::endTag('div');
