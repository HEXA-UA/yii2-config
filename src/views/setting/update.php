<?php
/**
 * Setting update view
 * @version     1.0.0-alpha.3
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
 * @var array   $groups
 */

echo Html::beginTag('div', [
    'class' => 'update-setting js-update-setting'
]);
echo $this->context->renderPartial('_form', [
    'model'  => $model,
    'keys'   => $keys,
    'groups' => $groups
]);
echo Html::endTag('div');
