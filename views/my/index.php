<?php
    use yii\bootstrap5\Html;
    $path = '/img/';
?>
<div>
    <img src="/img/drea.jpg" alt="">
</div>
<div>
    <img src="<?= $path . $data[0] ?>" alt="ddf">
</div>

<div>
    <?= Html::img("/img/milk.jpg", ['class' => 'w-25', 'alt' => "milk"]) ?>
</div>