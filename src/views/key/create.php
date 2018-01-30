<?php
/**
 * Key create view
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

use hexaua\yiiconfig\models\Key;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View  $this
 * @var Key   $model
 * @var array $groups
 * @var array $types
 */

echo Html::beginTag('div', [
    'class' => 'key-form-container hexa-form-container js-key-form-container js-hexa-form-container'
]);
echo $this->context->renderPartial('_form', [
    'model'  => $model,
    'groups' => $groups,
    'types'  => $types,
]);
echo Html::endTag('div');
