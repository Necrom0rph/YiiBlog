<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'content:ntext',
            'created_at:datetime',
            [
				'label' => 'Created By',
				'value' => User::find()->where(['id' => $model->created_by])->one()->username
			],
            'updated_at:datetime',
            [
				'label' => 'Updated By',
				'value' => User::find()->where(['id' => $model->updated_by])->one()->username
			],
            [
				'label' => 'Category',
				'value' => Category::find()->where(['id' => $model->category_id])->one()->name
			],
        ],
    ]) ?>

</div>
