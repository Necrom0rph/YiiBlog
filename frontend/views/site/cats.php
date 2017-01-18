<?php
use yii\helpers\Url;
use common\models\Category;
?>
<div class="list-group">
  <?php foreach(Category::find()->all() as $cat): ?>
  <a href="<?= Url::to(['site/index', 'id' => $cat->id]) ?>" class="list-group-item"><?= $cat->name ?></a>
  <?php endforeach; ?>
</div>