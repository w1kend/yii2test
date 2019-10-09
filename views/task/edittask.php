<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Task;

$model = $model ?? new Task();
$model->setScenario(Task::SCENARIO_EDIT);
$form = ActiveForm::begin([
    'id' => 'add-task-form',
    'action' => '/task/edit-task?id=' . $model->id,
]);
echo $form->field($model,'name')->textInput();
echo $form->field($model,'email')->textInput();
echo $form->field($model,'text')->textInput();
echo $form->field($model,'completed')->checkbox();
echo Html::submitButton("Сохранить",['class' => 'btn btn-primary']);

ActiveForm::end();  
?>