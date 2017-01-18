<?php
use yii\helpers\Url;
use common\models\User;
use common\models\Comment;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div id="post">
<h1><a href="<?= Url::to(['site/post', 'id' => $post->id]) ?>"><?= $post->name ?></a></h1>
<h4><?= $post->content ?></h4>
<?= User::find()->where(['id' => $post->created_by])->one()->username ?> - <?= date('d/m/Y H:i:s', $post->created_at) ?><?php if (\Yii::$app->user->can('createPost')): ?> - <b><a href="<?= Yii::$app->urlManagerBackend->createAbsoluteUrl('index.php?r=post%2Fview&id=') ?><?= $post->id ?>">Zarządzaj postem</a></b><?php endif; ?>
</div>
<hr>
<div id="comments">
<div class="panel-group">
<?php foreach(Comment::find()->where(['post_id' => $post->id])->all() as $comment): ?>
<div class="panel panel-primary">
<div class="panel-heading"><?= User::find()->where(['id' => $comment->created_by])->one()->username ?></div>
<div class="panel-body">
<?= $comment->content ?>
<br>
<h6><?= date('d/m/Y H:i:s', $comment->created_at) ?><?php if (\Yii::$app->user->can('createPost')): ?> - <a href="<?= Yii::$app->urlManagerBackend->createAbsoluteUrl('index.php?r=comment%2Fview&id=') ?><?= $comment->id ?>">Zarządzaj komentarzem</a><?php endif; ?></h6>
</div>
</div>
<?php endforeach; ?>
</div>
</div>
<?php if(\Yii::$app->user->can('comment')): ?>
<div id="commentadd">
<div class="panel panel-default">
  <div class="panel-heading">Dodaj komentarz</div>
  <div class="panel-body">
  <?php $form = ActiveForm::begin(); ?>
  <?= $form->field($model, 'content')->textarea(['rows' => 3]) ?>
  <div class="form-group">
  <?= Html::submitButton('Wyślij', ['class' => 'btn btn-primary']) ?>
  </div>
  <?php ActiveForm::end(); ?>
  </div>
</div>
</div>
<?php endif; ?>