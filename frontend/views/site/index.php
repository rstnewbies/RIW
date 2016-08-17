<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'My Yii Application';
?>
<div class="site-index">
    
    <div class="jumbotron">
        <div class="col-xs-12 text-center kafelek time-arena ">
            <t>47:23:32</t>
        </div>
        <div class ="kafelek col-xs-12">
           <div class="col-xs-4 text-center cos-btn">
             <t>Cos</t>
           </div>
           <a href = "<?php  echo Url::toRoute('site/qrskaner')?>" class= "col-xs-4 text-center qr-btn" >
             <t>QR</t>
           </a>
           <a href = "<?php echo Url::toRoute('site/info')?>" class="col-xs-4 text-center info-btn">
             <t>Info</t>
           </a>
        </div>
        <div class="col-xs-12 text-center kafelek zadania-btn">
            <t>Zadania</t>
            <t class ="zadania">
            <br>
            -Zadanie 1*
            <br>
            -Zadanie 2*
            <br>
            -Zadanie 3*
            <br>
            -Zadanie 4*
            <br>
            -Zadanie 5*
            <br>
            <a href = "<?php  echo Url::toRoute('site/tasks')?>">
            Pokaż wszystkie zadania
            </a>

            
            
        </div>
    </div>
    
   