<?php

use yii\bootstrap5\Html;
?>

<div class="card" style="width: 18rem;">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
   <?= Html::a(Html::img('/img/' . $model->product->photo, ['alt' => 'photo', 'class' => "card-img-top"]), ['view', 'id' => $model->id], ['class' => ""]) ?>
  <div class="card-body">    
    <h5 class="card-title">
        <?= Html::a($model->product->title, ['view', 'id' => $model->id], ['class' => "text-decoration-none"]) ?>
    </h5>
    <p class="card-text"><?= $model->product->category->title ?> </p>
    <div>
      <div class="d-flex">
        <?= Html::a('Просмотр', ['/catalog2/view', 'id' => $model->id], ['class' => "btn btn-outline-primary"]) ?>
        <?= ( !Yii::$app->user->isGuest && ! Yii::$app->user->identity->isAdmin)
              ? Html::a(
                empty($model->status) 
                ? '🤍'
                : '🧡'
                , ['index', 'id' => $model->product->id, 'action' => 'favorite'], ['class' => "btn-favorite btn-outline-primary"]) 
              : ""
        ?>
      </div>      
    </div>
  </div>
</div>