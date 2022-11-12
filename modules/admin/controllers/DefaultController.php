<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

use app\modules\admin\models\Student; ///

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
       /*  $data = Student::find()->asArray()->one();
        echo "<pre>"; print_r($data); die; */
        return $this->render('index');
    }
}
