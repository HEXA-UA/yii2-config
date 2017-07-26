<?php
/**
 * Group update view
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

use yii\helpers\Html;

echo Html::beginTag('div', [
    'class' => 'update-key js-update-key'
]);
echo $this->context->renderPartial('_form', [
    'model'  => $model
]);
echo Html::endTag('div');
