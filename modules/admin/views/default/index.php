<?php

use yii\bootstrap5\Html;

?>

<div class="admin-default-index">
    <h1>Панель администратора</h1>
    <?= Html::a('Управление категориями', ['/admin/category'], ['class' => 'btn btn-primary']) ?>
</div>
