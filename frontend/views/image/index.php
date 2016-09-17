<?php
use yii\helpers\Html;
use common\models\Image;
use common\models\Group;
use common\models\ShowImage;

$this->title = 'Obrazek';
$allScore;
$ShowImage = ShowImage::find()->select('show_me_image')->asArray()->all();
$values = Array();

foreach ($ShowImage as $show){
    $values[] = $show['show_me_image'];
}
if($values == null){
    $allScore = Group::find()->select('score')->sum('score') ;
}else {
    $allScore = 100;
}

$currentImagePath = Image::getCurrentImage($allScore);
?>

<?php echo Html::a("Powrót do Panelu", ["site/index"],['class'=>'btn btn-lg task-btn dashboard-btn'])?>  <br><br>

<div class = 'img-responsive center-block text-center'>
    <?= Html::img('/images/'.$currentImagePath);?>
</div>
</div>