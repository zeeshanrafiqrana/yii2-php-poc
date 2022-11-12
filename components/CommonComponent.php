<?php

namespace app\components;

use yii\base\Component;
use Yii;
Class CommonComponent extends Component{

    public function getToken(){
        return 'ABCXSDGJA';
    }

    public function getToken2(){
        return 'ABCXSDGJA';
    }

    public function getData(){
        $data = Yii::$app->db->createCommand("select * from student")->queryAll();
         return $data;
    }

    
}