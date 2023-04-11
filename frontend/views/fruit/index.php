<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

use yii\bootstrap4\Button;
use yii\web\JsExpression;
use yii\helpers\Url;



/**
 * @var yii\web\View $this
 * @var common\models\FruitsSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Fruits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fruits-index">
    <div class="card">
        <div class="card-body p-0">
            <?php  echo $this->render('_search', ['model' => $searchModel]); 
            ?>
            <?php echo GridView::widget([
                'layout' => "{items}\n{pager}",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'name',
                    'genus',
                    'family',
                    'order',
                    // 'carbohydrates',
                    // 'protein',
                    // 'fat',
                    // 'calories',
                    // 'is_favourite',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{favorite}',
                        'buttons' => [
                            'favorite' => function ($url, $model, $key) {
                                if($model->is_favourite === 0 ) {
                                    $icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M20.49 9.29l-5.49-.48L12 3.14 9.99 8.81l-5.49.48 4 3.46L5.88 20.01 12 16.62l6.12 3.39-1.63-7.86z" fill="currentColor"/></svg>';
                                    $title = 'Add to favorites';

                                    return Html::a($icon, ['favorite', 'id' => $key], [
                                        'title' => $title,
                                        'data' => [
                                            'method' => 'post',
                                        ],
                                    ]);
                                }
                            },
                        ],
                    ],                                               
                                       
                ],
            ]); ?>
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
