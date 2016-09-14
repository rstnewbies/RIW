<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use \common\models\User;
use frontend\assets\AppAsset;

$this->title = 'Informacje';
$this->params['breadcrumbs'][] = $this->title;
$loggedUser = Yii::$app->user->identity->group_id; 
$friendlyUsers = User::find()->where(['in', 'group_id', $loggedUser])->orderBy('leader_points DESC')->all();

?>
<div class="site-about">
    <div class ="panel panel-primary text-center margin-bottom-">
    <div class="col-lg-12 panel-heading ">
        <t class = "inf-text"><?= Html::encode($this->title) ?></t>
    </div>
    </div>
    <br>
    <br>
    <div class ="panel panel-info ">
    <div class="col-lg-12 panel-heading">
        Dekalog wyjazdu
    </div>
    <div class ="panel-body">
       <t>
                -Opis wyjazdu*
                <br>
                -Opis wyjazdu*
                <br>
                -Opis wyjazdu*
                <br>
                -Opis wyjazdu*
                <br>
                -Opis wyjazdu*
                <br>
                -Opis wyjazdu*
                <br>
                -Opis wyjazdu*
             <br>
            </t>
        </div>
    </div>
    <div class ="panel panel-info">
        <div class="col-lg-12 panel-heading">
        Twój kolor
        </div>
        <div class ="panel-body">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 info-color <?php GroupColor();?>">
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
    
    <div class="panel panel-info">
        <div class="panel-heading"> 
        Twoja kompania 
        </div>

        <div class="panel-body">
			<?php
			$foundLeader = false;
			foreach($friendlyUsers as $users){
				if(!$foundLeader){
					//if more than one leader have same leader_points, The fisrt User become a leader 
					echo $users->name, " ", $users->last_name, " (lider) <br>";
					$foundLeader = true;
				}
				else {
					echo $users->name, " ", $users->last_name, "<br>";
				}
			}
            
				
			?>
        </div>
    </div>
    
    <div class="panel panel-danger inf-dng">
        <div class ="panel-heading text-center">
       Miłej zabawy!
        </div>
    </div>
    
</div>
<?php 
function GroupColor(){
if(!Yii::$app->user->isGuest){
    echo "color-".common\models\Group::findOne(Yii::$app->user->identity->group_id)->color."";
}
}
?>    
