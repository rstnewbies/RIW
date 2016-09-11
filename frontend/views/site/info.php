<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use \common\models\User;

$this->title = 'Informacje';
$this->params['breadcrumbs'][] = $this->title;
$loggedUser = Yii::$app->user->identity->group_id; 
$friendlyUsers = User::find()->where(['in', 'group_id', $loggedUser])->orderBy('leader_points DESC')->all();

?>
<div class="site-about">
    <div class="col-lg-12 text-center info-title">
        <t><?= Html::encode($this->title) ?></t>
    </div>
    
    <div class="col-lg-12 text-center info-1">
        <t class="info-1-t"> Dekalog wyjazdu </t>
        <br>
        <t class="info-1-d">
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
    
    <div class="col-lg-12 text-center info-2">
        <t class="info-2-t"> Twoj kolor</t>
        <br>
        <div class="col-lg-4"></div>
        <div class="col-lg-4 info-color">
            <br>
            <br>
            (nazwa)
            <br>
            <br>
        </div>
        <div class="col-lg-4"></div>
    </div>
    
    <div class="col-lg-12 text-center info-3">
        <t class="info-3-t"> Twoja kompania </t>
        <br>
        <t class="info-3-d">
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
        </t>
    </div>
    
    <div class="col-lg-12 text-center info-end">
        <t>Miłej zabawy!</t>
    </div>
    
</div>
    
