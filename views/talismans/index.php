<?php

use app\models\Talismans;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TalismansSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Talismans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="talismans-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Talismans', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
            'photo',
            'mes',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Talismans $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
