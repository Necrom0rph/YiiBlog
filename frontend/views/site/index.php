<?php
use common\models\Post;
use yii\widgets\LinkPager;
use common\models\User;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<?php
foreach($posts as $post):
?>
<div id="post">
<h1><a href="<?= Url::to(['site/post', 'id' => $post->id]) ?>"><?= $post->name ?></a></h1>
<h4><?= $post->content ?></h4>
<?= User::find()->where(['id' => $post->created_by])->one()->username ?> - <?= date('d/m/Y H:i:s', $post->created_at) ?>
</div>
<hr>
<?php endforeach; ?>
<?= LinkPager::widget(['pagination' => $pagination]) ?>