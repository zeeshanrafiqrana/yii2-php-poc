<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use GuzzleHttp\Psr7\Request;
use app\models\SmsJob;
use yii\data\ArrayDataProvider;
use yii\db\Query;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    { 
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function beforeAction($action)
    {
      //  echo "before action ";  
        if(!parent::beforeAction($action)){
            return false;
        }
        /// custom code
        $data = 2;
        if($data == 2){
            return true;
        }
        return false; 
    }

    public function afterAction($action, $result)
    { 
       // echo "after action";
        $result = parent::afterAction($action, $result);
        return $result;
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    { 
       // echo "index";   
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionSmsTest()
    {
        //// data
        // sms
        Yii::$app->queue->push(new SmsJob([
            'message'=>'Code Improve test message',
            'phone'=>'9090909090'
        ]));
    } 

    public function actionProvider()
    { 
        $query = new Query;
       $data = $query->from('subject')->all();
       $provider = new ArrayDataProvider([
           'allModels'=>$data,
           'pagination'=>[
               'pagesize'=>10,  // limit
               'page'=>1   // per page limit
           ]
       ]); 
      // echo $provider->getTotalCount(); die;  /// total count
    //  echo $provider->pagination->getPage(); die;  // current page
       $record = $provider->getModels();
       echo "<pre>"; print_r($record); die;
    } 

    public function actionUrlManager(){
      // $url = \Yii::$app->urlManagerMySite->createUrl(['site/product']);

      $url = \Yii::$app->urlManagerMySite->createUrl(['site/category','phone'=>'iphone']);
      $url2 = \Yii::$app->urlManagerMySite->createUrl(['site/category','phone'=>'mi']);

      $url3 = \Yii::$app->urlManagerMySite->createUrl(['phone/detail','phone'=>'iphone','modelNo'=>11]);


      $url4 = \Yii::$app->urlManagerMySite->createUrl(['phone/detail','phone'=>'mi','modelNo'=>4]);
       echo $url.'<br/>'.$url2.'<br/>'.$url3.'<br/>'.$url4;
    }
 
}
