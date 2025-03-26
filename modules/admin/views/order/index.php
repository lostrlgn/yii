<?php

use app\models\Order;
use app\models\Outpost;
use app\models\Status;
use yii\bootstrap5\LinkPager;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\i18n\Formatter;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\OrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Панель администатора';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Управление товарами', ['/admin/product'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Управление категориями', ['/admin/category'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
            [
                'attribute' => 'created_at',
                'format' => ['datetime', 'php:d.m.Y H:i:s']
            ],
            [
                'attribute' => 'user_id',
                'value' => fn($model) => $model->user->name,
            ],
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

                    $cancel = '';
                    $apply = '';

                    if ($model->status_id == Status::getStatusId('Новый')) {
                        $apply = Html::a('Подтвердить', ['apply', 'id' => $model->id], ['class' => 'btn btn-outline-primary']);
                        $cancel = Html::a('Отменить', ['cancel', 'id' => $model->id], ['class' => 'btn btn-outline-primary']);

                    } 
        
                    return "<div class='d-flex gap-3'>$view $apply $cancel</div>";
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

<?php

Modal::begin([
    'id' => 'cancel-modal',
    'title' => 'Отмена заказа',
    'size' => 'modal-lg'
]);

echo 'Напишите причину...';

Modal::end();
?>
