<?php

/* @var $this yii\web\View */
use yii\widgets\ListView;
$this->title = 'My Yii Application';

?>
<div class="row">
<?= 
    ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'tags' => 'div',
            'class' => 'list-wrapper',
            'id' => 'list-wrapper',
        ],
        'itemView' => '_list',
    ]);
?>

  <!-- Example row of columns -->
  
  
  </div>
  
  <div class="basket"></div>

 