<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '博客';
$this->params['breadcrumbs'][] = $this->title;
backend\assets\TestAsset::register($this);// 资源包管理
?>
<div class="blog-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('创建博客', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'content:ntext',
            'views',
            'is_delete',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

<!--Url工具类的使用-->
<!--<a href="<?/*= Url::to(['site/index']) */?>">Yii Forum1</a>
<br>
<a href="<?/*= Url::toRoute('site/index') */?>">Yii Forum2</a>
<br>
<a href="<?/*= Url::toRoute(['site/index']) */?>">Yii Forum3</a>
<br>
<a href="<?/*= Url::to(['/blog']) */?>">Yii Forum4</a>
<br>
<a href="<?/*= Url::to(['blog/view', 'id' => 2]) */?>">Yii Forum5</a>-->
