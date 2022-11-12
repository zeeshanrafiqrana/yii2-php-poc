 
 
 
drop table if exists `auth_assignment`;
drop table if exists `auth_item_child`;
drop table if exists `auth_item`;
drop table if exists `auth_rule`;

    4) RBCA 


    1)  php yii migrate --migrationPath=@yii/rbac/migrations
    2) common/config.php 

    component-> 
    'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],

        ctr:- 


use yii\web\ForbiddenHttpException;

public function actionAbout()
    {
        if(Yii::$app->user->can('create-branch')){
            return $this->render('about');
        }else{
             throw new ForbiddenHttpException;
        } 
    }