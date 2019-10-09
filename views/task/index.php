<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
echo Url::to();
?>
<h1>Tasks</h1> 
<div class="row sort-links">
    
<a href="" id="sort_name" class="sort-link btn btn-primary btn-sm">name</a>
<a href="" id="sort_email" class="sort-link btn btn-primary btn-sm">email</a>
<a href="" id="sort_text" class="sort-link btn btn-primary btn-sm">text</a>
</div>
<?php foreach ($tasks as $t): ?>
<div class="container">
    <div class="row task-container">
            <div class="col-1 task__user-info">
                <div class="row">
                    <p><?=Html::encode($t->name) ?? "name"?></p> 
                </div>
                <div class="row">
                    <p><?=Html::encode($t->email) ?? "email"?></p>
                </div>
            </div>
            <div class="col offset-1 task__text">
                <div class="row">
                    <p> <?=Html::encode($t->text) ?? "text"?></p>
                </div>
            </div>
            <div class="col-1">
                <div class="row edit-task">
                    <a href="/task/edit-task/?id=<?=$t->id?>" class="btn btn-primary">Редактировать</a>
                </div>
                <?php if ($t->edited) :?>
                <div class="row task__edited-info">
                    <p><em>Отредактирована администратором</em></p>
                </div>
                <?php endif ?>
                <?php if ($t->completed): ?>
                <div class="row task__edited-info">
                    <p><em>Выполнена</em></p>
                </div>
                <?php endif;?>

            </div>
    </div>
</div>
<?php endforeach; ?>
<a href="/task/add-task" class="btn btn-primary">Добавить задачу</a>
<?= LinkPager::widget(['pagination' => $pagination]) ?>