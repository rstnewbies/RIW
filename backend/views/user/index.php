<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'name',
            'last_name',
            //'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            ['attribute' => 'email','header' => 'Email(login)','format' => 'email',],
            ['header' => 'Password',
             'value' => function($data) {return $data->getPassword();}],
            // 'status',
            // 'created_at',
            // 'updated_at',
            [
            'attribute' => 'group',
            'enableSorting'=>true,
            'format' => 'raw',
            'header' => 'Group',
            'value' => function($data) {
            return $data->group->name;
            }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
