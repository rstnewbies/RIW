<?php

use yii\helpers\Html;
use common\models\Image;
use common\models\Group;

$this->title = 'Obrazek';
$this->params['breadcrumbs'][] = $this->title;
$loggedUserGroupPoints = Group::find()->where(['id' => Yii::$app->user->identity->group_id])->one();
$currentImagePath = Image::getCurrentImage($loggedUserGroupPoints->score);

?>

<?php echo Html::a("Powrót do Panelu", ["site/index"],['class'=>'btn btn-lg task-btn dashboard-btn'])?>  <br><br>

<div class = 'row'>
    <?= Html::img($currentImagePath);?>
</div>