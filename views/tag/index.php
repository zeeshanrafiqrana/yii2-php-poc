<?php

/* @var $this yii\web\View */  

use yii\helpers\Html;
use app\assets\TestAsset;
TestAsset::register($this);
use yii\widgets\Breadcrumbs;

use app\widgets\Form;


$this->title = 'Most used tag';
$this->params['breadcrumbs'][] = $this->title;

 echo "The most used tag is : : $name"; 
?>
<div class="site-about">
 
    
    
   
    
   

    <?php // echo  Form::widget([]); ?>
</div>
