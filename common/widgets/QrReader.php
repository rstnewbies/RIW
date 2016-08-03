<?php

namespace common\widgets;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;

class QrReader extends \yii\base\Widget
{
    public $readerWidth;
    public $readerHeight;
    public $name;
    public $options;
    public $successCallback;
    
    public function init() {
        if($this->readerWidth === null){
            $this->readerWidth = '300px';
        }
        if($this->readerHeight === null){
            $this->readerHeight = '250px';
        }
        if($this->successCallback === null){
            $this->successCallback = 'function(data){console.log(data)}';
        }
        QrReaderAsset::register($this->getView());
    }
    
    public function run()
    {
        $this->registerJsOptions();
        
        echo Html::tag('div', '', [
            'id' => $this->id."-reader",
            'class' => 'qr-reader',
            'style' => "width:$this->readerWidth;height:$this->readerHeight;"
        ]);
        $this->options['id'] = $this->id;
        echo Html::button('Start scan', $this->name, '', $this->options);
    }
    
    protected function registerJsOptions(){
        $view = $this->getView();
        $view->registerJs("$('#$this->id').yii2qrcodereader({readerId: '".$this->id."-reader',readerWidth: '".$this->readerWidth."',readerHeight: '".$this->readerHeight."',".
            "successCallback: ".$this->successCallback."})");
    }
}
