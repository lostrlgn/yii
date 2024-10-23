<?php
    use yii\bootstrap5\Html;
    $path = '/img/';
?>

<h1 class="text-white bg-dark opacity-25 p-3 text-center">Откройте для себя очарование Японии</h1>
<div  class="shadow p-3 mb-5 bg-white rounded mt-5 d-flex flex-row justify-content-evenly">
    <h3><?= array_keys($data)[0]?></h3>
    <img class="w-50" src="<?= $path . $data['Девушка в традиционной одежде'] ?>" alt="ddf">
</div>
<div  class="shadow p-3 mb-5 bg-white rounded mt-5 d-flex flex-row justify-content-evenly">
    <img class="w-50" src="<?= $path . $data['Цветение сакуры'] ?>" alt="ddf">
    <h3><?= array_keys($data)[1]?></h3>
</div>
<div  class="shadow p-3 mb-5 bg-white rounded mt-5 d-flex flex-row justify-content-evenly">
    <h3><?= array_keys($data)[2]?></h3>
    <img class="w-50" src="<?= $path . $data['Японское искусство'] ?>" alt="ddf">
</div>

