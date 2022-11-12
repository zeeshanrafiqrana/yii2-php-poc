<?php

/* @var $this yii\web\View */  

use yii\helpers\Html;
use app\assets\TestAsset;
TestAsset::register($this);
use yii\widgets\Breadcrumbs;

use app\widgets\Form;


$this->title = 'Home';
$this->params['breadcrumbs'][] = $this->title;
  
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= Breadcrumbs::widget([
            'itemTemplate'=>"<li><b>{link}</b></li>\n",
            'links' =>  [ 
                    [
                        'label'=>'Info',
                        'url'=>'info',
                        'template'=>"<li><span class='test2'>{link}</span></li>\n"
                    ],
                    [
                        'label'=>'About',
                        'url'=>'about',
                        'template'=>"<li><span class='test'>{link}</span></li>\n"
                    ],
                    [
                        'label'=>'Edit',
                        'url'=> [ 'about','id'=>10]
                    ],
            ],
        ]) ?>
    <p>
    
        This is Home View
    </p>
    
    <?= Form::widget(['pageType'=>'Information Page','records'=>[1,2,3,4]]); ?>

    <?php // echo  Form::widget([]); ?>
</div>
