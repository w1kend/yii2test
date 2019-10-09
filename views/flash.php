<?php foreach (\Yii::$app->session->getAllFlashes() as $type => $messages): ?>
    <div class="alert alert-<?= $type ?> alert-dismissible" role="alert"><?= $messages ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endforeach ?>