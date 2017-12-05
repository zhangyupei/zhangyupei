<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use DfaFilter\SensitiveHelper;

class SiteController extends Controller
{
     public $enableCsrfValidation=false;//在类里面方法外面加上此句话
    /**
     * @inheritdoc
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
     * @inheritdoc
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
     * @return string
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
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
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


    public function actionAdd()
    {
        
        return $this->render('add');
    }

    public function actionAdd_to(){
        $request = \Yii::$app->request;
        $user = $request->post('user');
        $pwd = $request->post('pwd');
      /*$rows = (new \yii\db\Query())
    ->select(['id', 'email'])
    ->from('user')
    ->where(['last_name' => 'Smith'])
    ->limit(10)
    ->all();**/
        $command = \Yii::$app->db->createCommand("SELECT * FROM user WHERE user=".$user);
        $po = $command->queryOne();
            if($po)
            {
               echo "登录成功";
               $session = Yii::$app->session;
               $session->open();
               $session->set('id',$po['id']);
               $session->set('user',$po['user']);
               $this->redirect('?r=site/show');


            }else{
                echo "登录失败";
            }
    }


    public function actionShow(){
        // $session = Yii::$app->session;
        // $session->open();
        // $id = $session->get('id');
        // $command = \Yii::$app->db->createCommand("SELECT * FROM user WHERE id=".$id);
        // $po = $command->queryOne();
        // $user = $po['user'];

        $command = \Yii::$app->db->createCommand('SELECT * FROM ping');
        $po = $command->queryAll();

        


        return $this->render('show.html',['show'=>$po]);
    }

    public function actionTian(){
      // echo 1;
  
        $request = \Yii::$app->request;
        $content = $request->post('content');

        $u_name = $request->post('u_name');
 
                  $wordData = array(
                  '麻痹',
                  'sb',
                  'sx',
                  'av',
                  '成人卡通',
                );
            $i = SensitiveHelper::init()->setTree($wordData)->replace($content, '***');
          
           // $is = SensitiveHelper::init()->setTree($wordData)->replace($u_name, '***');

        $res = \Yii::$app->db->createCommand()->insert('ping', ['content' => $i,'u_name' => $u_name,])->execute();
        if($res)
        {
            echo 1;
        }else{
            echo 0;
        }
    }


    public function actionDel(){
         $request = \Yii::$app->request;
        $id = $request->post('id');
        $res = \Yii::$app->db->createCommand()->delete('ping', "id =".$id)->execute();
        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }
}
