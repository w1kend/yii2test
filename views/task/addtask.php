<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Task;

$model = $model ?? new Task();
$model->setScenario(Task::SCENARIO_ADD);
$form = ActiveForm::begin([
    'id' => 'add-task-form',
    'action' => '/task/add-task',
]);

echo $form->field($model, 'name', ['enableAjaxValidation' => true])->textInput();
echo $form->field($model, 'email')->textInput();
echo $form->field($model, 'text')->textInput();
echo Html::submitButton("Добавить задачу", ['class' => 'btn btn-primary']);

ActiveForm::end();
