<?php

use yii\helpers\Html;
use common\models\Image;
use common\models\Group;
use common\models\ShowImage;

$this->title = 'Obrazek';
$this->params['breadcrumbs'][] = $this->title;
$allScore = Group::find()->select('score')->sum('score');
$currentImagePath = Image::getCurrentImage($allScore);
$show = ShowImage::findOne(['id' => 0]);

?>

<?php echo Html::a("Powrót do Panelu", ["site/index"],['class'=>'btn btn-lg task-btn dashboard-btn'])?>  <br><br>

<div class = 'row'>
    <?php
        Html::img('/images/'.$currentImagePath);
    ?>
</div>