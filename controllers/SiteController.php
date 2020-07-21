<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\RegForm;

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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */

    /**
     * Logout action.
     *
     * @return Response
     */

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        return $this->render('contact');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionSayer($ms= 'Hello, my Kekos'){
        return $this->render('sayer', ['mes' => $ms]);
    }
    public function actionFormer(){
        $model = new RegForm();

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            return $this->render('form-ok', ['model' => $model]);
        }else{
            return $this->render('form', ['model' => $model]); 
        }
    }
    public function actionAdmin(){
        if((Yii::$app->request->isPost) && ($_SESSION['logged'] ?? 0 != 1)){
            if($_POST['login'] == "admin" && $_POST['password'] == "123"){
                $_SESSION['logged'] = 1;
                header('Location: /?r=shop');
                print 'lol';
                exit;
            }else{
                return $this->render('adminform');
            }
        }else{
            if($_SESSION['logged'] == 1){
                header('Location: /?r=shop');
                print 'lol';
                exit;
            }
            return $this->render('adminform');
        }
    }
}
