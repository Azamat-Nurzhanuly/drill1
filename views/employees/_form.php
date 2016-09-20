<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Employees */
/* @var $form yii\widgets\ActiveForm */
?>

<?php

    $this->registerJs(
        '$("document").ready(function(){
            $("#new_employeeInfo").on("pjax:end", function(){
                $.pjax.reload({container: "#employeeGrid"});
            });
        });'
    );
?>

<div class="employees-form">

    <?php  Pjax::begin(['id' => 'new_employeeInfo']) ?>
        <?php
            $form = ActiveForm::begin([
                'options' => [
                    'data-pjax' => true,
                ],
            ]);
        ?>

        <?= $form->field($model, 'name')->textInput() ?>

        <?= $form->field($model, 'number')->textInput() ?>

        <?= $form->field($model, 'floor')->textInput() ?>

        <?= $form->field($model, 'cabinet')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>

</div>
