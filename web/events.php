<?php 

use yii\base\Event;

function  upperData(Event $event){
    $response = ucwords($event->data);
    echo $response;
    echo " This is Global Event";
    return $response;
}