<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\AuthAssignment;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

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
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>
	
	Uprawnienia: <?= AuthAssignment::find()->where(['user_id' => $model->id])->one()->item_name ?>
	<br>
	<a href="<?= Url::to(['user/auth', 'id' => $model->id, 'role_id' => 0]) ?>">Nadaj usera</a><br>
	<a href="<?= Url::to(['user/auth', 'id' => $model->id, 'role_id' => 2]) ?>">Nadaj admina</a><br>
	<a href="<?= Url::to(['user/auth', 'id' => $model->id, 'role_id' => 1]) ?>">Nadaj autora</a>

</div>
