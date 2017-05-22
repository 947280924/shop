<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\captcha\CaptchaAction;
use yii\captcha\CaptchaValidator;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    
    // public $layout = false;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','captcha'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            //  'captcha' => [ 
            //     'class' => 'yii\captcha\CaptchaAction',
            //     'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            //     // 'backColor'=>0xffffff,//背景颜色
            //     // 'maxLength' => 6, //最大显示个数
            //     // 'minLength' => 5,//最少显示个数
            //     // 'padding' => 5,//间距
            //     // 'height'=>40,//高度
            //     // 'width' => 150,  //宽度  
            //     // 'foreColor'=>0x000000,     //字体颜色
            //     // 'offset'=>4,        //设置字符偏移量 有效果
            // ], 
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






    // /**
    //  * Login action.
    //  *
    //  * @return string
    //  */
    public function actionLogin()
    {   
        // 判断用户是访客还是认证用户 
        // isGuest为真表示访客，isGuest非真表示认证用户，认证过的用户表示已经登录了，这里跳转到主页面
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('?r=index/index');
        }

        // 实例化登录模型 common\models\LoginForm
        $model = new LoginForm();

        //通过post给model数据，并用login方法去判断是否能登录
        // 接收表单数据并调用LoginForm的login方法
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            return $this->redirect('?r=index/index');
        } else {
            // 非post直接渲染登录表单
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();       
        return $this->redirect('?r=site/index');
    }

}
