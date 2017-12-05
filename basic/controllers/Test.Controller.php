<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use DfaFilter\SensitiveHelper;

class TestController extends Controller
{
	public $enableCsrfValidation=false;//在类里面方法外面加上此句话

    public function actionOne(){
    	return $this->render('one');
    }



}