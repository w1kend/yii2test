<?php
use yii\helpers\Html;
?>

<div class="container">
    <div class="row task-container">
            <div class="col-1 task__user-info">
                <div class="row">
                    <p><?=Html::encode($model->name) ?? "name"?></p> 
                </div>
                <div class="row">
                    <p><?=Html::encode($model->email) ?? "email"?></p>
                </div>
            </div>
            <div class="col offset-1 task__text">
                <div class="row">
                    <p> <?=Html::encode($model->text) ?? "text"?></p>
                </div>
            </div>
            <div class="col-1">
                <div class="row edit-task">
                    <a href="/task/edit-task?id=<?=$model->id?>" class="btn btn-primary">Редактировать</a>
                </div>
                <?php if ($model->edited) :?>
                <div class="row task__edited-info">
                    <p><em>Отредактирована администратором</em></p>
                </div>
                <?php endif ?>
                <?php if ($model->completed): ?>
                <div class="row task__edited-info">
                    <p><em>Выполнена</em></p>
                </div>
                <?php endif;?>

            </div>
    </div>
</div>