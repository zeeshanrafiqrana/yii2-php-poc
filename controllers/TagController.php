<?php

namespace app\controllers;

use app\models\Employee;
use yii\web\Controller;  
use Yii;
use app\models\Student;
class TagController extends Controller
{
    public function actionIndex(){ 

        
        
        $data = Employee::find()
        ->select(['tag','count(*) AS num'])
        
        ->groupBy(['tag'])
        // ->groupBy('tag')
        ->orderBy('num DESC')
        ->limit(1)
        ->all()
        
        ;  // IN
        //echo $data->createCommand()->getRawSql(); die;
            //->all();
        // echo $data;
       $list=array();
        foreach($data as $val){
            //echo $val->name.'<br/>';
            $list= $val['tag'].'<br/>';
        } 
        $response=[];
        $response['name']=$list;
        return $this->render('index',$response);
        
    } 
}
