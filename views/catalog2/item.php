<?php

use yii\bootstrap5\Html;
?>

<div class="card" style="width: 18rem;">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
   <?php #Html::a(Html::img('/img/' . $model->photo, ['alt' => 'photo', 'class' => "card-img-top"]), ['view', 'id' => $model->id], ['class' => ""]) ?>
  <div class="card-body">    
    <h5 class="card-title">
        <?= Html::a($model->title, ['view', 'id' => $model->id], ['class' => "text-decoration-none"]) ?>
    </h5>
    <p class="card-text"><?= $model->category->title ?> </p>
    <div>
      <div class="d-flex">
        <?= Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => "btn btn-outline-primary"]) ?>
        <?= ( ! Yii::$app->user->isGuest && ! Yii::$app->user->identity->isAdmin)
              ? Html::a(
                empty($model->favorites[0]->status) 
                ? '🤍'
                : '🧡'
                , ['index', 'id' => $model->id, 'action' => 'favorite'], ['class' => "btn-catalog btn-outline-primary"]) 
              : ""
        ?>
      </div>
        <?= !Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin
          ? Html::a('Заказать', ['/account/order/create', 'product_id' => $model->id], ['class' => "btn btn-outline-success w-100 mt-2", 'data-pjax' => 0])
          : "" ?>
        <?= !Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin
          ? Html::a('Заказать вариант 2', ['/account/order/create2', 'product_id' => $model->id], ['class' => "btn btn-outline-success w-100 mt-2", 'data-pjax' => 0])
          : '' ?>
          
        
    </div>
  </div>
</div>