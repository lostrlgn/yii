<?php

use app\models\Product;
use yii\bootstrap5\Html;
use yii\bootstrap5\LinkPager;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\web\JqueryAsset;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\Product2Search $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Каталог';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php Pjax::begin([
        'id' => 'catalog-pjax',
        'enablePushState' => false
    ]); ?>
    <?php // $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'layout' => "{pager}\n{summary}\n<div class='d-flex flex-wrap gap-3 justify-content-center mt-3'>{items}</div>\n{pager}",
        'pager' => [
            'class' => LinkPager::class,
        ],
        // ver 1
        // 'itemView' => function ($model, $key, $index, $widget) {
        //     return Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);
        // },
        'itemView' => 'item'        
    ]) ?>

    <?php Pjax::end(); ?>

</div>

<?php

        $this->registerJsFile('/js/catalog.js', ['depends' => JqueryAsset::class]);