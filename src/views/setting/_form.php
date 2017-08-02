<?php
/**
 * Setting form view
 * @version     1.0.0-alpha.3
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

use hexa\yiiconfig\models\Setting;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var View       $this
 * @var Setting    $model
 * @var ActiveForm $form
 * @var array      $keys
 * @var array      $groups
 */

$config = isset($config) ? $config : [];
$form   = ActiveForm::begin($config); ?>

<?php echo $form->field($model, 'group')->dropDownList($groups); ?>
<?php echo $form->field($model, 'name')->dropDownList($keys); ?>
<?php echo $form->field($model, 'value')->textInput(); ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('app', 'Save'), [
            'class' => 'btn btn-primary'
        ]); ?>
    </div>

<?php $form->end();
