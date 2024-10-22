<?php
    use yii\bootstrap5\Html;
    $path = '/img/';
?>

<h1>Япония</h1>
<div class="mt-5 d-flex flex-row justify-content-between">
    <h3><?= array_keys($data)[0]?></h3>
    <img class="w-50" src="<?= $path . $data['Девушка в традиционной одежде'] ?>" alt="ddf">
</div>
<div class="mt-5 d-flex flex-row  justify-content-between">
    <img class="w-50" src="<?= $path . $data['Цветение сакуры'] ?>" alt="ddf">
    <h3><?= array_keys($data)[1]?></h3>
</div>
<div class="mt-5 d-flex flex-row justify-content-between">
    <h3><?= array_keys($data)[2]?></h3>
    <img class="w-50" src="<?= $path . $data['Японское искусство'] ?>" alt="ddf">
</div>

