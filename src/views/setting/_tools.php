<?php
/**
 * Group tools view
 * @version     1.0.0-alpha.4
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

echo \yii\helpers\Html::beginTag('div', ['class' => 'hexa-config-tools']);
echo \yii\helpers\Html::a('Create', ['group/create'], ['class' => 'btn btn-success']);
echo \yii\helpers\Html::endTag('div');