<?php
use yii\helpers\Html;
use common\models\Image;
use common\models\Group;
$this->title = 'Obrazek';
$allScore = Group::find()->select('score')->sum('score');
$currentImagePath = Image::getCurrentImage($allScore);
?>

<?php echo Html::a("Powrót do Panelu", ["site/index"],['class'=>'btn btn-lg task-btn dashboard-btn'])?>  <br><br>

<div class = 'img-responsive center-block text-center'>
    <?= Html::img('/images/'.$currentImagePath);?>
</div>
</div>