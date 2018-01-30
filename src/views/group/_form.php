<?php
/**
 * Key form view
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

use hexaua\yiiconfig\models\Key;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var View       $this
 * @var Key        $model
 * @var ActiveForm $form
 * @var array      $groups
 * @var array      $types
 */

$config = isset($config) ? $config : [];
$form   = ActiveForm::begin($config); ?>

<?php echo $form->field($model, 'name')->textInput(); ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('app', 'Save'), [
            'class' => 'btn btn-primary'
        ]); ?>
    </div>

<?php $form->end();
