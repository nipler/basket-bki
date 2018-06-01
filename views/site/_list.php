<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
 
<div class="col-lg-4">
  <h2><?= Html::encode($model->title) ?></h2>
  <img class="img-responsive img-thumbnail" src="/images/goods/<?=$model->goodImages[0]->file;?>">
  <p><?= HtmlPurifier::process($model->description) ?></p>
  <button type="button" class="btn btn-primary addtoBasket" data-good="<?=$model->id;?>">Купить за - <?=$model->price;?></button>

</div>