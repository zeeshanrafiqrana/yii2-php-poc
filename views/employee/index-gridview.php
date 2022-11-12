<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\EmployeeCrud;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeCrud */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        //'showHeader'=>false,
        'showFooter'=>true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

             [
                 'attribute'=>'id',
                 'label'=>'E ID',
              //   'visible'=>false,
                 'footer'=>'100'
                 //'header'=>'Employee ID'
             ],
             [
                 'attribute'=>'name',
                 'footer'=>'Blank'
             ],
            'email:email',
            [
                'attribute'=>'phone',
                'format'=>'html'
            ],
             [
                 'attribute'=>'gender',
                 'label'=>'Male/Female',
               /*  'value'=>function($data,$key,$index){
                    $newData = ucwords($data->gender);
                    return $newData;
                } */
                'value'=>[EmployeeCrud::className(),'genderData'],
                'contentOptions'=>['style'=>'background-color:red'],
                'filter'=>['male'=>'Select Male','female'=>'Select Female'],
                'footer'=>'Total'

             ],
            
            //'address:ntext',
            //'created_at',
            //'ref_id',

            [ 
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Action',
                'headerOptions'=>['width'=>'90'],
                'template'=>' {view} {delete} {update}'
            ], 
        ],
       // 'layout'=>"{summary}\n{items}\n\n{pager}"
       'rowOptions'=>function($data,$key,$index){
           $class =  $index%2?'even':'odd';
           return ['key'=>$key,'index'=>$index,'class'=>$class];
       },
      //'showOnEmpty'=>false,
      'emptyCell'=>'--'
    ]); ?>


</div>
