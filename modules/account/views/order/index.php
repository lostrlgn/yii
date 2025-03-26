<?php

use app\models\Order;
use app\models\Outpost;
use app\models\Status;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\i18n\Formatter;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\account\models\OrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Личный кабинет пользователя';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <h4 class="mt-5">Заказы</h4>

    <?= Html::a('избранное', ['/account/favorite'], ['class' => 'btn btn-outline-primary'])?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => [
            'class' => Formatter::class,
            'nullDisplay' => '',
        ],
        'pager' => [
            'class' => LinkPager::class,
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'created_at',
            [
                'label' => 'Дата и время получения',
                'attribute' => 'date_order',
                'value' => fn($model) =>
                Yii::$app->formatter->asDate($model->date_order, 'php:d.m.Y ')
                    . Yii::$app->formatter->asTime($model->time_order, 'php:H:i:s'),
            ],
            [
                'attribute' => 'status_id',
                'value' => fn($model) => $model->status->title,
                'filter' => Status::getStatuses(),
                'headerOptions' => [
                    'width' => 200,
                ],
            ],
            [
                'attribute' => 'comment',
                'value' => fn($model) => $model->comment,

            ],
            [
                'attribute' => 'outpost_id',
                'value' => fn($model) => $model->outpost?->title,
                'filter' => Outpost::getOutposts(),
                'headerOptions' => [
                    'width' => 200,
                ],
            ],
            //'status_id',
            //'outpost_id',
            //'comment',


            //'product_id',
            //'pay_type_id',
            //'comment_admin',
            [
                'label' => 'Действия',
                'format' => 'raw',
                'value' => function ($model) {
                    $view = Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => 'btn btn-outline-primary']);
                    $delete = $model->status_id == Status::getStatusId('Новый')
                        ? Html::a('Удалить', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-outline-danger',
                            'data' => [
                                'confirm' => 'Вы точно хотите удалить данный заказ?',
                                'method' => 'post',
                            ],
                        ])
                        : '';
                    return "<div class='d-flex gap-3'>$view $delete</div>";
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>