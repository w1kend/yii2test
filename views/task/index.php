<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\widgets\ListView;
echo Url::to();
?>
<h1>Tasks</h1> 
<div class="row sort-links">
    
<a href="" id="sort_name" class="sort-link btn btn-primary btn-sm">name</a>
<a href="" id="sort_email" class="sort-link btn btn-primary btn-sm">email</a>
<a href="" id="sort_text" class="sort-link btn btn-primary btn-sm">text</a>
</div>
<?php 
    echo ListView::widget([
        'dataProvider' => $provider,
        'itemView' => '_task',
    ]);
?>
<a href="/task/add-task" class="btn btn-primary">Добавить задачу</a>
