<?php
use yii\helpers\Html;
use common\models\Image;
use common\models\Group;
use common\models\ShowImage;

$this->title = 'Obrazek';
$allScore = Group::find()->select('score')->sum('score') ;
$currentImagePath = Image::getCurrentImage($allScore);
?>

<?php echo Html::a("Powrót do Panelu", ["site/index"],['class'=>'btn btn-lg task-btn dashboard-btn'])?>  <br><br>

<div>
    <?= Html::img('/images/'.$currentImagePath, ['class'=>'img-responsive center-block']);?>
</div>
</div>